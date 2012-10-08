<?php

require_once('../mendeleyoauth/mendeleyoauth.php');
require_once(dirname(__FILE__) . '/config.inc.php');

$connection = NULL;

// We store access tokens in file. If file exists then we should be authenticated, if not
// we need to get a token from the Mendeley site.
$filename = dirname(__FILE__) . '/tokens.json';
if (file_exists($filename))
{
	$file = @fopen($filename, "a+") or die("could't open file --\"$filename\"");
	$json = fread($file, filesize($filename));
	fclose($file);
	$access_token = json_decode($json);
	
	$connection = new MendeleyOauth(CONSUMER_KEY, CONSUMER_SECRET, $access_token->oauth_token, $access_token->oauth_token_secret, HTTP_PROXY);
}
else
{
	/* Get temporary credentials. */
	$connection = new MendeleyOauth(CONSUMER_KEY, CONSUMER_SECRET, NULL, NULL, HTTP_PROXY);
	
	$request_token = $connection->getRequestToken();
	
	$request_token['oauth_token'];
	$request_token['oauth_token_secret'];

	$url = $connection->getAuthorizeURL($request_token['oauth_token']); 
 
 	// URL to get token...(paste this into browser)
 	echo "Paste this URL into your web browser, then enter token below\n";
 	echo $url . "\n";
	$f=popen("read; echo \$REPLY","r");
	$input=fgets($f,100);
	pclose($f);        
	echo "Entered: $input\n"; 
	$request_token['oauth_verifier'] = trim($input);
	
	$access_token = $connection->getAccessToken($request_token['oauth_verifier']);
	
	$file = fopen($filename, "w") or die("could't open file --\"$filename\"");
	fwrite($file, json_encode($access_token));
	fclose($file);
}  


// Public resources 

// Look up a DOI
$doi = '10.1186/2047-217X';
$url = 'http://api.mendeley.com/oapi/documents/details/' . urlencode(urlencode($doi)) . '/?type=doi&consumer_key=' . CONSUMER_KEY;
echo "Fetch document with DOI $doi:\n";
echo json_format($connection->http($url, 'GET'));
echo "\n";

// Look up a PMID
$pmid = 17397521;
$url = 'http://api.mendeley.com/oapi/documents/details/' . $pmid . '/?type=pmid&consumer_key=' . CONSUMER_KEY;
echo "Fetch document with PMID $pmid:\n";
echo json_format($connection->http($url, 'GET'));
echo "\n";


?>
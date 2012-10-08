<?php
/**
 * @file
 * User has successfully authenticated with Twitter. Access tokens saved to session and DB.
 */

/* Load required lib files. */
session_start();
require_once('../mendeleyoauth/mendeleyoauth.php');
require_once('config.inc.php');

/* If access tokens are not available redirect to connect page. */
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
    header('Location: ./clearsessions.php');
}
/* Get user access tokens out of the session. */
$access_token = $_SESSION['access_token'];

/* Create a MendeleyOauth object with consumer/user tokens. */
$connection = new MendeleyOauth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret'], HTTP_PROXY);

$content = '';

// Public methods

$content .='<h2>Public methods</h2>';
$content .= '<p>Look up reference using DOI</p>';
$doi = '10.1186/2047-217X';
$url = 'http://api.mendeley.com/oapi/documents/details/' . urlencode(urlencode($doi)) . '/?type=doi&consumer_key=CONSUMER_KEY';
$content .= '<h3>' . $url . '</h3>';
$url = str_replace('CONSUMER_KEY', 'cd1634437de8f30a429210b45678647b04c62a4d4', $url);
$content .=  '<pre>' . json_format($connection->http($url, 'GET')) . '</pre>';


$url = 'http://api.mendeley.com/oapi/documents/tagged/' . urlencode('phylogeny') . '/?consumer_key=CONSUMER_KEY';
$content .= '<h3>' . $url . '</h3>';
$url = str_replace('CONSUMER_KEY', 'cd1634437de8f30a429210b45678647b04c62a4d4', $url);
$content .=  '<pre>' . json_format($connection->http($url, 'GET')) . '</pre>';



/* Include HTML to display on the page */
include('html.inc');

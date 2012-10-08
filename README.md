Mendeley API PHP client
=======================

Roderic D. M. Page (rdmpage@gmail.com)

This is a simple Mendeley API client, heavily based on Abraham Williams' PHP library for working with Twitter's OAuth API (see http://github.com/abraham/twitteroauth). His copyright notice is reproduced below. 

I've provided two examples using this code. One is a command line client that can be used to test the API, inspired by the test file that comes with the mendeley Python client (available from http://github.com/Mendeley/mendeley-oapi-example). The second is a web client that you can run on a publicly accessible web server.

Before you start
----------------
To run these examples you will need to register at http://dev.mendeley.com/ to get your consumer key and consumer secret. These must be stored in the "config.inc.php" files. 

HTTP proxy
----------

If you are running behind a HTTP proxy (e.g., at a UK university) then make sure you edit the config.inc.php file to reflect this. Change the line

define ('HTTP_PROXY', NULL);

by replacing "NULL" by your proxy (for example at Glasgow it is wwwcache.gla.ac.uk:8080)


Command line test
-----------------
To run this test application, go to the folder "test" and type

php test.php 

at the command line. If you are running this for the first time you will be given a URL to paste into your web browser. This will give you a verification code from Mendeley. Paste the code into the command line, and the application should then perform some basic tasks using the Mendeley API.

Your authentication keys are stored in plain text in the file tokens.json.


Browser client
--------------

The folder 'example' is a web-based client. To use this you will need to place the code on a machine running a web server (it can be running as "localhost", it doesn't need to be accessible by the outside world). In addition to storing your consumer key and consumer secrets in the file "config.inc.php" you need to provide the URL for the file "callback.php" as the value of OAUTH_CALLBACK.

Place mendeley-oapi-php folder somewhere accessible by your web server (on a Mac make sure Web sharing is on and drop the folder in your "Sites" folder, then point your browser at the "website" folder. You will be asked to click on the Mendeley logo, which takes you to Mendeley's site for authentication. You will then be bounced back to your machine where, if authentication succeeded, you will see the output of some basic API queries.

License
-------

The code in the folder mendeleyoauth, and the web client example are lightly modified versions of Abraham Williams' code, and his copyright notice is reproduced here.

Copyright (c) 2009 Abraham Williams - http://abrah.am - abraham@poseurte.ch
 
Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
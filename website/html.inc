<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Mendeley OAuth in PHP</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      img {border-width: 0}
      body {font-family:'Lucida Grande', sans-serif;}
      pre { font-size:11px;border:1px solid rgb(128,128,128);background-color:rgb(240,240,240); }
    </style>
  </head>
  <body>
    <div>
      <h2>Welcome to a Mendeley OAuth PHP example.</h2>

      <p>This site is a test of the Mendeley OAuth authentication method. If you are having issues try <a href='./clearsessions.php'>clearing your session</a>.</p>

      <p>Code based on <a href='http://github.com/abraham/twitteroauth'>twitteroauth</a> by @<a href='http://twitter.com/abraham'>abraham</a>
      </p>
      <hr />
      <?php if (isset($menu)) { ?>
        <?php echo $menu; ?>
      <?php } ?>
    </div>
    <?php if (isset($status_text)) { ?>
      <?php echo '<h3>'.$status_text.'</h3>'; ?>
    <?php } ?>
    <p>
      
       
        <?php echo $content; ?>
      
    </p>

  </body>
</html>

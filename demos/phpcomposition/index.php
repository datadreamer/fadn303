<!doctype html>
<html>
  <head>
    <title>PHP Page Composition</title>
  </head>
  <body>
  <?php
    include("header.html");
    echo "My dynamic content goes here!<br/>";
    $a = 1;
    while($a <= 10){
      echo $a . "<br/>\n";
      $a++;
    }
    echo "And we out!<br/>\n";
    include("footer.html");
  ?>
</body>
</html>

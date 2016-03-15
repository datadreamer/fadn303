<!doctype html>
<html>
  <head>
      <title>
        Basic PHP Demo
      </title>
  </head>
  <body>
    This is the basic php demo. This text was added to the page in the usual way.<br/>
    <br/>
    <?php
      echo "This is text that was added to the page using a PHP echo statement!<br/><br/>";
      $a = 2;
      $b = 3;
      $c = $a + $b;
      echo "There are three variables in this document: a, b, and c. A has a value of {$a}, B has a value of {$b}, and C has a value of {$c}.<br/><br/>";
      echo "A multiplied by B equals " . $a * $b . ".<br/><br/>";
    ?>
    When you view the source code of this page, all you will see is HTML. However when you view the PHP file, you will see the server-side code.<br/>
  </body>
</html>

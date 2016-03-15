<!doctype html>
<html>
  <head>
      <title>
        Basic SQL Demo
      </title>
  </head>
  <body>
    This is the basic sql demo. This text was added to the page in the usual way. Below is text from the database.<br/>
    <br/>
    <?php
      // this bit of code connects to the database on the local server and spits out an error if there's a problem.
      $mysqli = new mysqli("localhost", "roskiweb_aaronsi", "demopass", "roskiweb_aaronsie");
      if($mysqli->connect_errno){
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
      }

      // this bit of code checks the database for content using a query.
      $res = $mysqli->query("SELECT * FROM test WHERE id = 1");
      $row = $res->fetch_assoc();
      echo $row['body'] . "<br/>";
      echo "It has been accessed and updated " . $row['hits'] . " times.<br/><br/>";

      // this bit of code updates a value in our row so that it's different next time it's accessed.
      $res = $mysqli->query("UPDATE test SET hits = hits + 1 WHERE id = 1");
    ?>
    When you view the source code of this page, all you will see is HTML. However when you view the PHP file, you will see the server-side code.<br/>
  </body>
</html>

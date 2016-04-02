<?php
  // this bit of code checks the $_GET variable for which blog entry we should display.
  $id = $_GET["id"];

  // this bit of code connects to the database on the local server and spits out an error if there's a problem.
  // the properties passed into mysqli() are the server address, username, password, and database name.
  $servername = "localhost";
  $username = "roskiweb_aaronsi";
  $password = "demopass";
  $dbname = "roskiweb_aaronsie";
  $mysqli = new mysqli($servername, $username, $password, $dbname);
  if($mysqli->connect_errno){
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  }
  // this bit of code fetches content from the database using a query and holds it in a variable.
  $result = $mysqli->query("SELECT * FROM blogtest WHERE id = " . $id);
  $row = $result->fetch_assoc();
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Blog Test</title>
    <link rel="stylesheet" type="text/css" href="blog.css">
  </head>
  <body>
    <?php
      // this bit of code iterates over our database entries we fetched earlier
      echo "<img src='uploads/" . $row['imgfile'] . "' class='bigimg'><br/><br/>";
      echo "<h3>" . $row['title'] . "</h3>";
      $date = date('F jS, Y',strtotime($row['dt']));
      echo "<span class='date'>" . $date . "</span><br/><br/>";
      echo "<p class='bodytext'>" . $row['body'] . "<br/><br/><a href='index.php'>Home</a></p><br/><br/>";
    ?>
  </body>
</html>

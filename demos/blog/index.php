<?php
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
  $result = $mysqli->query("SELECT * FROM blogtest ORDER BY id DESC");
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Blog Test</title>
    <link rel="stylesheet" type="text/css" href="blog.css">
  </head>
  <body>
    <h1>AARON'S BLOG!</h1>
    <?php
      // this bit of code iterates over our database entries we fetched earlier
      while($row = $result->fetch_assoc()){
        echo "<div class='entry'>";
        echo "<h3><a href='item.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h3>";
        echo "<img src='uploads/" . $row['imgfile'] . "'><br/><br/>";
        $date = date('F jS, Y',strtotime($row['dt']));
        echo "<span class='date'>" . $date . "</span><br/><br/>";
        echo "<p>" . $row['body'] . "</p><br/>";
        echo "</div>";
      }
    ?>
  </body>
</html>

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
  //$result = $mysqli->query("SELECT * FROM portfolio WHERE id = " . $id);
  $result = $mysqli->query("SELECT * FROM portfolio WHERE id={$id}");
  $row = $result->fetch_assoc();
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>
      <?php
        echo $row['title'];
      ?>
    </title>
    <link rel="stylesheet" type="text/css" href="portfolio.css">
  </head>
  <body>
    <?php
      // we do a second query on the IMAGES table in order to get images
      //  where the PORTFOLIO_ID field is equal to the ID field in the PORTFOLIO table.
      $imgresults = $mysqli->query("SELECT * FROM images WHERE portfolio_id={$id} ORDER BY num ASC");
    	while($imgrow = $imgresults->fetch_assoc()){
    		echo "<img src='images/{$imgrow['thumb']}' />";
    	}
      echo "<br/><br/>";
      echo "<span class='title'>" . $row['title'] . "</span><br/>";
      $date = date('F jS, Y',strtotime($row['dt']));
      echo "<span class='date'>" . $date . "</span><br/><br/>";
      echo "<p class='bodytext'>" . $row['body'] . "<br/><br/><a href='index.php'>Home</a></p><br/><br/>";
    ?>
  </body>
</html>

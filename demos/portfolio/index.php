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
  // it does a JOIN operation in order to fetch data from the IMAGE table based on the value of the ID column.
  $result = $mysqli->query("SELECT portfolio.id, portfolio.title, portfolio.dt, images.thumb FROM portfolio JOIN images ON portfolio.id=images.portfolio_id WHERE images.num=1");
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Portfolio Test</title>
    <link rel="stylesheet" type="text/css" href="portfolio.css">
  </head>
  <body>
    <?php
      // this bit of code iterates over our database entries we fetched earlier
      while($row = $result->fetch_assoc()){
        echo "<div class='entry'>";
        echo "<a href='item.php?id=" . $row['id'] . "'>";
        echo "<img src='images/" . $row['thumb'] . "'>";
        echo "<span class='title'>" . $row['title'] . "</span><br/>";
        $date = date("F Y", strtotime($row['dt']));
        echo "<span class='date'>" . $date . "</span></a>";
        echo "</div>";
      }
    ?>
  </body>
</html>

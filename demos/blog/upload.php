<!doctype html>
<html>
  <body>

    <?php
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }

      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["image"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      if ($uploadOk == 0) {
        // Check if $uploadOk is set to 0 by an error
        echo "Sorry, your file was not uploaded.";
      } else {
        // if everything is ok, try to upload file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          // if the line above works, then the file has been uploaded successfully.
          // connect to the database so we can insert the rest of the data.
          $title = test_input($_POST["title"]);
          $body = test_input($_POST["body"]);
          $imgfilename = basename( $_FILES["image"]["name"]);

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
          // this insert query places the data into our database table
          $result = $mysqli->query("INSERT INTO blogtest (title, body, imgfile) VALUES ('{$title}', '{$body}', '{$imgfilename}')");

          // spit something out to the users display.
          echo "The file ". $imgfilename . " has been uploaded.<br/>";
          echo "<a href='index.php'>See your post!</a><br/>";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }


      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    ?>

  </body>
</html>

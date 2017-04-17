<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
      $conn = new PDO("mysql:host=$servername;dbname=db_o2cm", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_POST["submit"])) {
        if(isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["email"]) && isset($_POST["host"]) && isset($_POST["llevel"]) && isset($_POST["flevel"])){
          echo "All fields have been filled out";
          $statement = $conn->prepare("INSERT INTO users(first_name, last_name, email, university_id, leader_level, follow_level)
          VALUES(:fname, :lname, :email, :univ, :llevel, :flevel)");
          $statement->execute(array(
              "fname" => $_POST['fname'],
              "lname" => $_POST['lname'],
              "email" => $_POST['email'],
              "univ" => $_POST['host'],
              "llevel" => $_POST['llevel'],
              "flevel" => $_POST['flevel']
          ));
          header('Location: index.php'); //We could alternatively make a thank you page or success page
        }
        else{
          echo "ERR: Not all fields were filled out";
        }
      }
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fix O2CM</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Angular -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular-animate.min.js"></script>
</head>
<body>
  <div class="well">
    <div class="text-center">
        <h1>Register a New Dancer</h1>
        <h4><small>Please enter all the following required information<small></h4>
    </div>
        <form class="form-group" method="post" action="">
            <label for="fname">First name:</label>
            <input class="form-control" id="fname" name="fname" required/>
            <label for="lname">Last name:</label>
            <input class="form-control" id="lname" name="lname" required/>
            <label for="email">E-mail:</label>
            <input class="form-control" type="email" id="email" name="email" required/>
            <label for="univ">University ID:</label>
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              try {
                $conn = new PDO("mysql:host=$servername;dbname=db_o2cm", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT university_id, name FROM university";
                $result = $conn->query($sql);
                echo "<select class='form-control' id='host' name='host'>";
                while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                  echo "<option value='".$row['university_id']."'>".$row['name']."</option>";
                }
                echo "</select>";
              }
              catch(PDOException $e){
                echo "Connection failed: " . $e->getMessage();
              }
            ?>

            <label for="llevel">Leader Level:</label>
            <p class="form-text text-muted">Please enter the level that this person leads at.</p>
            <input class="form-control" id="llevel" name="llevel" required/>
            <label for="flevel">Follower Level:</label>
            <p class="form-text text-muted">Please enter the level that this person follows at.</p>
            <input class="form-control" id="flevel" name="flevel" required/>
            <div class = "text-center">
            <input type="submit" class="btn btn-primary text-center" name="submit"></input>
            </div>
          </form>
</body>
</html>

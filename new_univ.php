<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
      $conn = new PDO("mysql:host=$servername;dbname=db_o2cm", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_POST["submit"])) {
        if(isset($_POST["name"]) & isset($_POST["a1"]) & isset($_POST["city"]) & isset($_POST["state"]) & isset($_POST["zip"]) & isset($_POST["country"])){
          echo "All fields have been filled out";
          $statement = $conn->prepare("INSERT INTO university(name, address_1, address_2, city, state, zip, country)
          VALUES(:name, :a1, :a2, :city, :state, :zip, :country)");
          $statement->execute(array(
              "name" => $_POST['name'],
              "a1" => $_POST['a1'],
              "a2" => $_POST['a2'],
              "city" => $_POST['city'],
              "state" => $_POST['state'],
              "zip" => $_POST['zip'],
              "country" => $_POST['country']
          ));
          header('Location: home.php'); //We could alternatively make a thank you page or success page
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
        <h1>Register a New University</h1>
        <h4><small>Please enter all the following required information<small></h4>
    </div>
        <form class="form-group" method="post" action="">
            <label for="name">University name:</label>
            <input class="form-control" id="name" name="name" required/>
            <label for="a1">Address 1:</label>
            <input class="form-control" id="a1" name="a1" required/>
            <label for="a2">Address 2:</label>
            <input class="form-control" id="a2" name="a2"/>
            <label for="city">City:</label>
            <input class="form-control" id="city" name="city" required/>
            <label for="state">State:</label>
            <input class="form-control" id="state" name="state" required/>
            <label for="zip">Zip Code:</label>
            <input class="form-control" id="zip" name="zip" required/>
            <label for="country">Country:</label>
            <input class="form-control" id="country" name="country" required/>
            <div class = "text-center">
            <input type="submit" class="btn btn-primary text-center" name="submit"></input>
            </div>
          </form>
</body>
</html>

<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
      $conn = new PDO("mysql:host=$servername;dbname=db_o2cm", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_POST["submit"])) {
        if(isset($_POST["host"]) & isset($_POST["name"]) & isset($_POST["sdate"]) & isset($_POST["edate"])){
          echo "All fields have been filled out";
          $statement = $conn->prepare("INSERT INTO competitions(university_id, start_date, end_date, name)
          VALUES(:host, :sdate, :edate, :name)");
          $statement->execute(array(
              "host" => $_POST['host'],
              "sdate" => $_POST['sdate'],
              "edate" => $_POST['edate'],
              "name" => $_POST['name']
          ));
          header('Location: index.html'); //We could alternatively make a thank you page or success page
        }
        else{
          echo "ERROR: Not all fields were filled out";
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
        <h1>Register for a New Competition</h1>
        <h4><small>Please enter all the following required information<small></h4>
    </div>
        <form class="form-group" method="post" action="">
          <label for="host">Host University ID:</label>
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
          <label for="name">Name:</label>
          <p class="form-text text-muted">Please enter the name of the competition.</p>
          <input class="form-control" id="name" name="name" required/>
          <label for="sdate">Start Date</label>
          <p class="form-text text-muted">Please enter the start date of the competition.</p>
          <input class="form-control" type="date" id="sdate" name="sdate" required/>
          <label for="edate"> End Date:</label>
          <p class="form-text text-muted">Please enter the end date of the competition.</p>
          <input class="form-control" type="date" id="edate" name="edate" required/>
          <div class = "text-center">
          <input type="submit" class="btn btn-primary text-center" name="submit"></input>
          </div>
        </form>
</body>
</html>

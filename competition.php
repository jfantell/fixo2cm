<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
      $conn = new PDO("mysql:host=$servername;dbname=db_o2cm", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_POST["submit"])) {
        if(isset($_POST["cid"]) & isset($_POST["lid"]) & isset($_POST["fid"]) & isset($_POST["level"]) & isset($_POST["event"])){
          echo "All fields have been filled out";

          //Create new entry in partnerships table
          $statement = $conn->prepare("INSERT INTO partnerships(competition_id, leader_id, follower_id)
          VALUES(:cid, :lid, :fid)");
          $statement->execute(array(
              "cid" => $_POST['cid'],
              "lid" => $_POST['lid'],
              "fid" => $_POST['fid']
          ));
          //Get the partner id
          $partner_id = $conn->lastInsertId();


          //Create new event in events table
          $statement = $conn->prepare("INSERT INTO events(name)
          VALUES(:event)");
          $statement->execute(array(
              "event" => $_POST['event']
          ));
          //Get the event id
          $event_id = $conn->lastInsertId();


          //Create new level in levels table
          $statement = $conn->prepare("INSERT INTO levels(name)
          VALUES(:level)");
          $statement->execute(array(
              "level" => $_POST['level']
          ));
          //Get the level id
          $level_id = $conn->lastInsertId();

          //now let's register each dance

          //check if the user registered for Foxtrot, create a new entry in the dance table
          if(isset($_POST["Foxtrot"])){
            $statement = $conn->prepare("INSERT INTO dances(name, event_id, level_id)
            VALUES(:Foxtrot, :event_id, :level_id)");
            $statement->execute(array(
              "Foxtrot" => $_POST['Foxtrot'],
              "event_id" => $event_id,
              "level_id" => $level_id
            ));

            //get the dance id
            $dance_id = $conn->lastInsertId();

            //insert the dance id and partner id into the partnerdances table
            //many-to-many relationship
            $statement = $conn->prepare("INSERT INTO partnerdances(partner_id, dance_id)
            VALUES(:partner_id, :dance_id)");
            $statement->execute(array(
              "partner_id" => $partner_id,
              "dance_id" => $dance_id
            ));
          }

          //check if the user registered for Foxtrot, create a new entry in the dance table
          if(isset($_POST["Quickstep"])){
            $statement = $conn->prepare("INSERT INTO dances(name, event_id, level_id)
            VALUES(:Quickstep, :event_id, :level_id)");
            $statement->execute(array(
              "Quickstep" => $_POST['Quickstep'],
              "event_id" => $event_id,
              "level_id" => $level_id
            ));

            //get the dance id
            $dance_id = $conn->lastInsertId();

            //insert the dance id and partner id into the partnerdances table
            //many-to-many relationship
            $statement = $conn->prepare("INSERT INTO partnerdances(partner_id, dance_id)
            VALUES(:partner_id, :dance_id)");
            $statement->execute(array(
              "partner_id" => $partner_id,
              "dance_id" => $dance_id
            ));
          }

          //check if the user registered for Foxtrot, create a new entry in the dance table
          if(isset($_POST["Tango"])){
            $statement = $conn->prepare("INSERT INTO dances(name, event_id, level_id)
            VALUES(:Tango, :event_id, :level_id)");
            $statement->execute(array(
              "Tango" => $_POST['Tango'],
              "event_id" => $event_id,
              "level_id" => $level_id
            ));

            //get the dance id
            $dance_id = $conn->lastInsertId();

            //insert the dance id and partner id into the partnerdances table
            //many-to-many relationship
            $statement = $conn->prepare("INSERT INTO partnerdances(partner_id, dance_id)
            VALUES(:partner_id, :dance_id)");
            $statement->execute(array(
              "partner_id" => $partner_id,
              "dance_id" => $dance_id
            ));
          }

           //check if the user registered for Foxtrot, create a new entry in the dance table
          if(isset($_POST["Waltz"])){
            $statement = $conn->prepare("INSERT INTO dances(name, event_id, level_id)
            VALUES(:Waltz, :event_id, :level_id)");
            $statement->execute(array(
              "Waltz" => $_POST['Waltz'],
              "event_id" => $event_id,
              "level_id" => $level_id
            ));

            //get the dance id
            $dance_id = $conn->lastInsertId();

            //insert the dance id and partner id into the partnerdances table
            //many-to-many relationship
            $statement = $conn->prepare("INSERT INTO partnerdances(partner_id, dance_id)
            VALUES(:partner_id, :dance_id)");
            $statement->execute(array(
              "partner_id" => $partner_id,
              "dance_id" => $dance_id
            ));
          }
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
        <h1>Register a Couple for a Competition</h1>
        <h4><small>Please enter all the following required information<small></h4>
    </div>
        <form class="form-group" method="post" action="">
          <label for="cid">Competition ID:</label>
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            try {
              $conn = new PDO("mysql:host=$servername;dbname=db_o2cm", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $sql = "SELECT competitions.competition_id, competitions.name AS comp_name, competitions.university_id, university.name AS univ_name FROM competitions INNER JOIN university ON competitions.university_id = university.university_id";
              $result = $conn->query($sql);
              echo "<select class='form-control' id='cid' name='cid'>";
              while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='".$row['competition_id']."'>".$row['comp_name']." @ ".$row['univ_name']."</option>";
              }
              echo "</select>";
            }
            catch(PDOException $e){
              echo "Connection failed: " . $e->getMessage();
            }
          ?>
          <label for="lid">Leader ID:</label>
          <p class="form-text text-muted">Please enter the user ID of the leader.</p>
          <input class="form-control" id="lid" name="lid" required/>
          <label for="fid">Follower ID:</label>
          <p class="form-text text-muted">Please enter the user ID of the follower.</p>
          <input class="form-control" id="fid" name="fid" required/>
          <label for="level">Registered Level</label>
          <p class="form-text text-muted">Please select level that this couple will dance at.</p>
          <input class="form-control" id="level" name="level" required/>
          <label for"event">Event:</label>
          <select class="form-control" id="event" name="event">
            <option value="smooth" id="smooth">Smooth</option>
            <option value="standard" id="standard">Standard</option>
            <option value="rhythm" id="rhythm">Rhythm</option>
            <option value="latin" id="latin">Latin</option>
          </select>
          <h4>Dance:</h4>
          <input type="checkbox" value="Foxtrot" name="Foxtrot" id="Foxtrot"/>
          <label for="Foxtrot" style="font-size: 150%">Foxtrot</label>
          <input type="checkbox" value="Quickstep" name="Quickstep" id="Quickstep"/>
          <label for="Quickstep" style="font-size: 150%">Quickstep</label>
          <input type="checkbox" value="Tango" name="Tango" id="Tango"/>
          <label for="Tango" style="font-size: 150%">Tango</label>
          <input type="checkbox" value="Waltz" name="Waltz" id="Waltz"/>
          <label for="Waltz" style="font-size: 150%">Waltz</label>
          <div class = "text-center">
          <input type="submit" name="submit" class="btn btn-primary text-center"></input>
          </div>
        </form>
</body>
</html>

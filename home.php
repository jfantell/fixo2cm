<?php

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
        <h1>Welcome to the RPI O2CM Fix</h1>
        <h4><small>Please select if you'd like to add a new dancer or register for a new competion<small><h4>
        <button type="button" id="comp" class="btn btn-default">Register a Couple for a Compeititon</button>
        <button type="button" id="newcomp" class="btn btn-basic">Register for a New Competition</button>
        <button type="button" id="dancer" class="btn btn-basic">New Dancer</button>
      </div>
  </div>
  <script>
  $('#comp').click(function(e){
    location.assign('./competition.php');
  });
  $('#newcomp').click(function(e){
    location.assign('./new.php');
  });
  $('#dancer').click(function(e){
    location.assign('./dancer.php');
  });
  </script>
</body>
</html>

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
      <div class="center">
        <img class="img-rounded" src="https://scontent.xx.fbcdn.net/v/t1.0-9/17799453_1904458669767073_5514341174671551245_n.jpg?oh=672148d26a9452100ecf4c599ecbc27f&oe=5991B578" alt="RPI Team Photo">
        <div>
          <button type="button" id="comp" class="btn btn-primary">Register a Couple for a Compeititon</button>
          <button type="button" id="newcomp" class="btn btn-info">Register for a New Competition</button>
          <button type="button" id="dancer" class="btn btn-default">New Dancer</button>
          <button type="button" id="univ" class="btn btn-success">New University</button>
          <button type="button" id="users" class="btn btn-basic">View All Dancers</button>
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
      $('#users').click(function(e){
        location.assign('./lookup.php');
      });
      $('#univ').click(function(e){
        location.assign('./new_univ.php');
      });
      </script>
    </body>
    </html>

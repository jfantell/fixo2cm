<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fix O2CM</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link href="css/lab6.css" rel="stylesheet">

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
  <h1>Users</h1>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  try {
        $dbconn = new PDO("mysql:host=$servername;dbname=db_o2cm", $username, $password);
        // set the PDO error mode to exception
        $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //display all users by selecting all users with a value of 1
  $queryString = "SELECT fname,lname,univ,llevel,flevel FROM users WHERE 1";
  $stmt = $dbconn->prepare($queryString);
  $stmt->execute();
  $num = 0;
  //create a table to display the users in using bootstrap
  $print = '<Table class = "table"><tr><th>First Name</th><th>Last Name</th><th>University</th><th>Lead Level</th><th>Follow Level</th></tr>';
  //add each user to the table
  while($result = $stmt->fetch()){
    $num +=1;
    $print = $print.'<tr><td>'.$result['fname'].'</td><td>'.$result['lname'].'</td><td>'.$result['univ'].'</td><td>'.$result['llevel'].'</td><td>'.$result['flevel'].'</td></tr>';
  }
  $print = $print.'</table>';
  //if no users exist, then display that there are no users to display
  if($num == 0){
    $print = '<div class="jumbotron"><p>No users to display.</p></div>';
  }
  //display the text
  echo $print;
  ?>
</body>

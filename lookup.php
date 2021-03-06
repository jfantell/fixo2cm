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
  <h1>Users</h1>
  <div class="text-centered">
    <button type="button" id="home" class="btn btn-primary">Home</button>
    <script>
    $('#home').click(function(e){
      location.assign('./index.html');
    });
    </script>
  </div>

  <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
      $dbconn = new PDO("mysql:host=$servername;dbname=db_o2cm", $username, $password);
      // set the PDO error mode to exception
      $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //display all users by selecting all users with a value of 1
      $queryString = "SELECT u.user_id, u.first_name, u.last_name, c.name, u.leader_level, u.follow_level FROM users u, university c WHERE u.university_id=c.university_id ORDER BY u.last_name";
      $stmt = $dbconn->prepare($queryString);
      $stmt->execute();
      $num = 0;
      //create a table to display the users in using bootstrap
      $print = '<Table class = "table"><tr><th>User ID</th><th>First Name</th><th>Last Name</th><th>University</th><th>Lead Level</th><th>Follow Level</th></tr>';
      //add each user to the table
      while($result = $stmt->fetch()){
        $num +=1;
        $print = $print.'<tr><td>'.$result['user_id'].'</td><td>'.$result['first_name'].'</td><td>'.$result['last_name'].'</td><td>'.$result['name'].'</td><td>'.$result['leader_level'].'</td><td>'.$result['follow_level'].'</td></tr>';
      }
      $print = $print.'</table>';
      //if no users exist, then display that there are no users to display
      if($num == 0){
        $print = '<div class="jumbotron"><p>No users to display.</p></div>';
      }
      //display the text
      echo $print;
    }
    catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
    }
  ?>
</div>
</body>
<style>
.well{
  background-color: white;
  border-color: white;
}
</style>
</html>

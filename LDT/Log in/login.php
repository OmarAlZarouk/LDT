<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login page</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<div class="login-page">
      <form class="form" action="login.php" method="post">   
        <input type="text" name="user_id" placeholder="user id" required />
        <input type="password" name="password"  placeholder="password" required/><br> 
        <span id = "message" style="color:red"></span> <br> 
        <button type="submit" name="Login">login</button>
      </form>
    </div>
</body>
</html>
<?php

if(isset($_POST["Login"]))
{
  require_once 'dbconn.php';

  $user_id =$_POST["user_id"];
  $password =$_POST["password"]; 

  $conn =new mysqli($sn, $un, $pw, $db);
  if ($conn->connect_error)
    {
      die("Fatal Error");
    }
  $sql = "SELECT user_type FROM users WHERE user_id=$user_id and user_password='$password'";
  $result = $conn->query($sql);
  if ($result)
  {
    $rows = $result->num_rows;
    if($rows == 1)
     {   
    $row = $result->fetch_array(MYSQLI_ASSOC);
    switch ($row["user_type"]) 
       {
       case 1:
          header('Location:../call center/main.php');
          exit;      
          break;
       case 2:
          header('Location:home.html');
          exit;      
          break;
       case 3:
          header('Location:home.html');
          exit;      
          break;
       }   
     }
  }
  else
  {
    $sql = "SELECT * FROM admin1 WHERE admin_id='$user_id' and admin_password='$password'";
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
    if($count == 1)
    {   
      header('Location:../Admin/main.html');
      exit;
    }  
    else
    {  
      echo '<script> document.getElementById("message").innerHTML=" Login failed. Invalid username or password"; </script>';
    }   
  }
  $conn -> close();
}  
?>
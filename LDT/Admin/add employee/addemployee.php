<!DOCTYPE html>
<html lang="en">
<head>
    <title>add employee</title>
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>
<div class="login-page">
      <form class="form" action="addemployee.php" method="post">   
        <input type="text" name="user_id" placeholder="id" required />
        <input type="password" name="user_password"  placeholder="password" required/>
        <input type="text" name="user_name" placeholder="user name" required />
        <input type="text" name="user_phone" placeholder="phone" required />
        <input type="email" name="user_email" placeholder="email" required />
        <input type="text" name="user_adress" placeholder="adress" required />
        <INPUT type="radio" name="user_type" VALUE="1" required>Call Center
        <br>   <span id = "message" style="color:red"></span> <br> 
        <button type="submit" name="submit">submit</button>
      </form>
      <a class="btn btn1" href="../main.html"  style="text-align: center;" >go back? </a>
    </div>
</body>
</html>
<?php

if(isset($_POST["submit"]))
{
  require_once '../../Log in/dbconn.php';

  $user_id =$_POST["user_id"];
  $user_password =$_POST["user_password"];
  $user_name =$_POST["user_name"];
  $user_phone =$_POST["user_phone"];
  $user_email =$_POST["user_email"];
  $user_adress =$_POST["user_adress"];
  $user_type =$_POST["user_type"];

  $conn =new mysqli($sn, $un, $pw, $db);
  if ($conn->connect_error)
    {
      die("Fatal Error");
    }
  $sql = "SELECT * FROM users WHERE user_id=$user_id";
  $result = $conn->query($sql);
  if ($result)
  {
    $rows = $result->num_rows;
    if($rows == 1)
    {
        echo '<script> document.getElementById("message").innerHTML="this user id already exists"; </script>';
    }  
    else
    {  
        $query = "INSERT INTO users(user_id,user_password,user_name,user_phone,user_email,user_adress,user_type) VALUES 
        ($user_id,'$user_password','$user_name',$user_phone,'$user_email','$user_adress',$user_type)";
        $result = $conn->query($query);
        if (!$result)
        {
        echo '<script> document.getElementById("message").innerHTML="error please try again"; </script>';
        }  
        else
        {
          echo '<script> document.getElementById("message").innerHTML="Successfully added"; </script>';
        }
   }

$conn -> close();
}
}
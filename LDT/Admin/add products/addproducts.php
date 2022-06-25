<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Products</title>
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>
<div class="login-page">
      <form class="form" action="addproducts.php" method="post">   
         <input type="text" name="product_name" placeholder="product name" required /> 
         <input type="text" name="price" placeholder="price" required />
         <input type="text" name="quantity" placeholder="quantity" required />
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

  $product_name =$_POST["product_name"];
  $price =$_POST["price"];
  $quantity =$_POST["quantity"];
  

  $conn =new mysqli($sn, $un, $pw, $db);
  if ($conn->connect_error)
    {
      die("Fatal Error");
    }
  $query = "INSERT INTO products(product_name,price,quantity) VALUES 
        ('$product_name',$price,$quantity)";
        $result = $conn->query($query);
        if (!$result)
        {
        echo '<script> document.getElementById("message").innerHTML="error please try again; </script>';
        }  
        else
        {
          echo '<script> document.getElementById("message").innerHTML="Successfully added"; </script>';
        }
        $conn -> close();
}


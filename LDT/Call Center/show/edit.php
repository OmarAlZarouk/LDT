<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<table class="table">
            <thead>
                <tr>
                    <td>order id</td>
                    <td>product id</td>
                    <td>quantity</td>
                    <td>edit</td>
                    <td>drop</td>
                </tr>
            </thead>
            
            <tbody>
                <form  method="post" >
                <?php
                    if(isset($_GET['id']))
                    {
                        $id=$_GET['id'];
                        require_once '../../Log in/dbconn.php';
                
                        $conn = new mysqli($sn, $un, $pw, $db );
                
                        if ($conn->connect_errno)
                            die("Fatal Error");
                
                        $sql_oc="SELECT * FROM order_contents WHERE order_id=$id";
                        $resulte_oc=$conn->query($sql_oc);
                

                        if(!$resulte_oc){
                            die($conn->error);
                        }

                        while($row = $resulte_oc->fetch_assoc())
                        {
                            echo "<tr>
                                    <td>$row[order_id]</td>
                                    <td>$row[product_id]</td>
                                    <td>$row[quantity]</td>
                                    <td><a href='edit_pro.php?order_id=$row[order_id] & product_id=$row[product_id]'>edit</a></td>
                                    <td><a href='delete_pro.php?order_id=$row[order_id] & product_id=$row[product_id]'>drop</a></td>
                                </tr>";
                        }
                        
                        $conn->close();
                    }
                ?>
                </form>
                
            </tbody>
</body>
</html>
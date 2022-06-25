<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div>
        <h3>add order</h3>
        <table class="table">
            <thead>
                <tr>
                    <td>product name</td>
                    <td>product price</td>
                    <td>the quantity</td>
                    <td>amount</td>
                </tr>
            </thead>
            
            <tbody>
                <form action="takeorder.php"  method="post" >
                <?php
                    require_once '../../Log in/dbconn.php';

                    $conn = new mysqli($sn, $un, $pw, $db );

                    if ($conn->connect_errno)
                        die("Fatal Error");

                    $sql="SELECT * FROM products";

                    $result=$conn->query($sql);

                    if(!$result){
                        die($conn->error);
                    }

                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr>
                                <td>".$row["product_name"]."</td>
                                <td>".$row["price"]."</td>
                                <td>".$row["quantity"]."</td>
                                <td><input type='number' name='order[]' value='0' min='0'></td>
                            </tr>";
                    }
                    
                    $conn->close();
                ?>
                <input type="submit" value="submit">
                </form>
            </tbody>

        </table>
    </div>
</body>
</html>
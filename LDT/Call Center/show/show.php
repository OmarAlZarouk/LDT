<!DOCTYPE html>
<html lang="en">
<head>
    <title>show</title>
    <link rel="stylesheet" href="../../CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <h3>show</h3>
    <table class="table">
            <thead>
                <tr>
                    <td>order id</td>
                    <td>customer id</td>
                    <td>total</td>
                    <td>time</td>
                    <td>deleverd</td>
                    <td>edit</td>
                    <td>drop</td>
                </tr>
            </thead>
            
            <tbody>
                <form  method="post" >
                <?php
                    require_once '../../Log in/dbconn.php';

                    $conn = new mysqli($sn, $un, $pw, $db );

                    if ($conn->connect_errno)
                        die("Fatal Error");

                    $sql="SELECT * FROM orders";

                    $result=$conn->query($sql);

                    if(!$result){
                        die($conn->error);
                    }

                    while($row = $result->fetch_assoc())
                    {
                        if($row["devlivered"]==0)
                        {
                            $devlver='no';
                        }
                        else
                        {
                            $devlver='yes';
                        }
                        echo "<tr>
                                <td>$row[order_id]</td>
                                <td>$row[customer_id]</td>
                                <td>$row[total]</td>
                                <td>$row[date_time]</td>
                                <td>$devlver</td>
                                <td><a href='edit.php?id=$row[order_id]'>edit</a></td>
                                <td><a href='delete.php?id=$row[order_id]'>drop</a></td>
                            </tr>";
                    }
                    
                    $conn->close();
                ?>
                </form>
                
            </tbody>
            <a class="btn btn1" href="../main.php"  style="text-align: center;" >go back? </a>
</body>
</html>
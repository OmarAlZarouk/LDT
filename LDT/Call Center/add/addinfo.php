<?php
    if(isset($_POST['submit']))
    {
        $customerName=$_POST['customer_name'];
        $customerPhone=$_POST['customer_phone'];
        $customeraddress=$_POST['customer_address'];

        require_once '../../Log in/dbconn.php';

        $conn = new mysqli($sn, $un, $pw, $db );

        if ($conn->connect_errno)
            die("Fatal Error");

        $sql="SELECT * FROM customers WHERE customer_name ='$customerName' AND customer_phone = '$customerPhone'";

        $result=$conn->query($sql);

        if (!$result)
        {
            echo "<p>Unable to execute the query.</p> ".$conn->connect_errno;
        }
        else
        {
            if($result->num_rows===1)
            {
                $conn->close();
                //sends the user to home page
                header('Location: addorder.php');
            }
            else
            {
                $sql_add="INSERT INTO customers (customer_name, customer_phone, customer_address) 
                VALUES('$customerName','$customerPhone','$customeraddress');";

                $result_add=$conn->query($sql_add);

                if (!$result_add)
                {
                    echo "<p>Unable to execute the query.</p> ".$conn->connect_errno;
                }
                else 
                {
                    //close the connection
                    $conn->close();

                    //sends the user to home page
                    header('Location: addorder.php');
                }
            }
        }
    }
?>
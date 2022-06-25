<?php 
    if(isset($_GET['order_id'] ) and isset($_GET['product_id']))
    {
        $order_id=$_GET['order_id'];
        $product_id=$_GET['product_id'];
        require_once '../../Log in/dbconn.php';

        $conn = new mysqli($sn, $un, $pw, $db );

        if ($conn->connect_errno)
            die("Fatal Error");
            
        $sql_delete="DELETE FROM order_contents WHERE order_id=$order_id AND product_id=$product_id";
        $resulte_delete=$conn->query($sql_delete);

        $conn->close();
    }
    header("location: show.php?");
?>

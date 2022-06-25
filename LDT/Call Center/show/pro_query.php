<?php
        $newval=$_POST['newval'];
        $order_id=$_POST['order_id'];
        $product_id=$_POST['product_id'];

        require_once '../../Log in/dbconn.php';

        $conn = new mysqli($sn, $un, $pw, $db );

        if ($conn->connect_errno)
            die("Fatal Error");

        $sql_edit="UPDATE order_contents SET quantity=$newval WHERE order_id=$order_id AND product_id=$product_id";
        $resulte_edit=$conn->query($sql_edit);

        header("location: show.php?");
?>

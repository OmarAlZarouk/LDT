<?php 
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        require_once '../../Log in/dbconn.php';

        $conn = new mysqli($sn, $un, $pw, $db );

        if ($conn->connect_errno)
            die("Fatal Error");

        $sql_delete="DELETE FROM orders WHERE order_id=$id";
        $resulte_delete=$conn->query($sql_delete);

        $conn->close();
    }
    header("location: show.php");
?>

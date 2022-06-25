<form action="pro_query.php" method="post">
    <input type="hidden" value="<?php echo $_GET['order_id']?>" name="order_id">
    <input type="hidden" value="<?php echo $_GET['product_id']?>" name="product_id">
    <?php 
        $order_id=$_GET['order_id'];
        $product_id=$_GET['product_id'];
        require_once '../../Log in/dbconn.php';

        $conn = new mysqli($sn, $un, $pw, $db );

        if ($conn->connect_errno)
            die("Fatal Error");
        $sql_show="SELECT * FROM order_contents WHERE order_id=$order_id AND product_id=$product_id";
        $resulte_show=$conn->query($sql_show);
        $row=$resulte_show->fetch_assoc();
        echo "<input type='number' name='newval' value='$row[quantity]' min=0>";

    ?>
    <input type="submit" value="submit">
    
</form>


<?php
   
   
?>
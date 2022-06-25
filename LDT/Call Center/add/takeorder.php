<?php

// use LDAP\Result;

    $val=array();
    $total=0;
    foreach ($_POST['order'] as $key => $value) {
        $val[]=$value;
        if($value>0){
            $total+=$value;
        }
    }
    require_once '../../Log in/dbconn.php';

    $conn= new mysqli($sn,$un,$pw,$db);

    if($conn->connect_errno)
        die("Fatal Error");


    $sql_cid="SELECT *
    FROM customers
    ORDER BY  customer_id DESC
    LIMIT 1";

    $result_cid=$conn->query($sql_cid);

    if(!$result_cid){
        die($conn->error);
    }

    $row_cid = $result_cid->fetch_assoc();

    $customer_id=$row_cid['customer_id'];    
    

    $sql_order="INSERT INTO orders(customer_id,total,date_time,devlivered)
    VALUE($customer_id,'$total',now(),0)";

    $result_order=$conn->query($sql_order);

    if(!$result_order){
        die($conn->error);
    }

    $sql_oid="SELECT *
        FROM orders
        ORDER BY order_id DESC
        LIMIT 1";

    $result_oid=$conn->query($sql_oid);

    if(!$result_oid){
        die($conn->error);
    }

    $row_oid = $result_oid->fetch_assoc();

    $order_id=$row_oid['order_id'];



    $sql_products="SELECT * FROM products";

    $result_products=$conn->query($sql_products);

    if(!$result_products)
        die($conn->error);

    $i=0;
    while($row = $result_products->fetch_assoc())
    {   
        if($val[$i]>0){
            $product_id=$row['product_id'];
            $sql_oc="INSERT INTO order_contents (order_id,product_id,quantity)
            values('$order_id','$product_id','$val[$i]')";

            $result_oc=$conn->query($sql_oc);
        }
        $i++;
    }
    $conn->close();

    header("location: ../main.php");
?>
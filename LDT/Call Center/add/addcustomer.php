<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADD</title>
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>
    <div class="login-page">
    <form class="form" action="addinfo.php" method="post" onsubmit="">
        <h3>add customer</h3>
            <label for="cutomer_name">customer name</label><br>
            <input type"text" name="customer_name" required><br>
            <label for="customer_number">customer number</label><br>
            <input type="text" name="customer_phone" required><br>
            <label for="customer_address">customer address</label><br>
            <textarea name="customer_address"cols="20" rows="4" required></textarea><br>
            <input  type="submit" name="submit" >
        </form>
        <a href="../main.php" class="btn btn1"    style="text-align: center;">cancel</a>
    </div>

</body>
</html>

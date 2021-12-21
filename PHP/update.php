<?php
include_once 'conn.php';
if (isset($_POST['submit'])) {
    $result = mysqli_query($conn, "SELECT * FROM customers WHERE id='" . $_POST['id'] . "'");
    $row = mysqli_fetch_array($result);
}
if (isset($_POST['update'])) {
    mysqli_query($conn, "UPDATE customers set id='" . $_POST['id'] . "', name='" . $_POST['name'] . "', address='" . $_POST['address'] . "' ,phone='" . $_POST['phone'] . "' WHERE id='" . $_POST['id'] . "'");
    $message = "Record Modified Successfully";
    
}

?>
<html>

<head>
    <title>Update Customers Data</title>
</head>

<body>
    <form method="post" action="">
        Customer ID to be updated:
        <input type="text" name="id">
        <br />
        <input type="submit" name="submit" value="submit" />
    </form>
    <form name="frmUser" method="post" action="">
        <div><?php if (isset($message)) {
                    echo $message;
                } ?>
        </div>
        <div style="padding-bottom:5px;">
            <a href="retrieve.php">Customers List</a>
        </div>
        <!-- ID: <br>
        <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
        <input type="text" name="id" value="<?php echo $row['id']; ?>">
        <br> -->
        Name: <br>
        <input type="text" name="name" class="txtField" value="<?php echo $row['name']; ?>">
        <br>
        Address:<br>
        <input type="text" name="address" class="txtField" value="<?php echo $row['address']; ?>">
        <br>
        Phone:<br>
        <input type="text" name="phone" class="txtField" value="<?php echo $row['phone']; ?>">
        <br>
        <input type="submit" name="update" value="Update" class="buttom">
    </form>
</body>

</html>
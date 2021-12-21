<?php
include_once 'conn.php';
if (isset($_POST['submit'])) {
    $cust_id = $_POST['id'];
    $sql = "DELETE FROM customers WHERE id = $cust_id";
    if (mysqli_query($conn, $sql)) {
        echo "Record DELETED successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
}
    
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title> Delete Records!</title>
</head>

<body>
    <form method="post" action="">
        Customer ID to be deleted from life:
        <input type="text" name="id">
        <br />
        <input type="submit" name="submit" value="submit" />
    </form>
</body>
</html>
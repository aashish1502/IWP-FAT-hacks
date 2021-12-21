<?php
include_once 'conn.php';
if (isset($_POST['submit'])) {
    $cust_id = $_POST['id'];
    $result = mysqli_query($conn, "SELECT * FROM products where cust_ID = $cust_id");
}

?>
<!DOCTYPE html>
<html>

<head>
    <title> Retrive data from Two Different Tables</title>
</head>

<body>
    <form method="post" action="">
        Customer ID :
        <input type="text" name="id">
        <br />
        <input type="submit" name="submit" value="submit" />
    </form>
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Value</td>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["purchase_ID"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["value"]; ?></td>
                </tr>
            <?php
                $i++;
            }
            ?>
        </table>
    <?php
    } else {
        echo "No result found";
    }
    ?>
</body>

</html>
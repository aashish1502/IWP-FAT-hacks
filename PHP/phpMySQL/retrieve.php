<?php
include_once 'conn.php';
$result = mysqli_query($conn, "SELECT * FROM customers");
?>
<!DOCTYPE html>
<html>
<head>
    <title> Retrive data</title>
</head>
<body>
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Address</td>
                <td>Phone</td>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
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
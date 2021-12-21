<?php
include_once 'conn.php';
$result = mysqli_query($conn,"SELECT * FROM CUSTOMERS INNER JOIN PRODUCTS ON PRODUCTS.CUST_ID=customers.id");

?>
<!DOCTYPE html>
<html>

<head>
    <title> JOIN Two Different Tables</title>
</head>

<body>
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>
        <table>
            <tr>
                <td>Customer ID</td>
                <td>Customer Name</td>
                <td>Customer Address</td>
                <td>Customer Phone</td>
                <td>Product Name</td>
                <td>Product Value</td>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
                // print_r($row);
            ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["phone"]; ?></td>
                    <td><?php echo $row["pname"]; ?></td>
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
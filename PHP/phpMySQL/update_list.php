<?php
include_once 'conn.php';
$result = mysqli_query($conn, "SELECT * FROM customers");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Customer Data</title>
</head>

<body>
    <table>
        <tr>
            <td>Customer Id</td>
            <td>Name</td>
            <td>Address</td>
            <td>Phone</td>
            <td>Action</td>
        </tr>
        <?php
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            if ($i % 2 == 0)
                $classname = "even";
            else
                $classname = "odd";
        ?>
            <tr class="<?php if (isset($classname)) echo $classname; ?>">
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["phone"]; ?></td>
                <td><a href="update-process.php?id=<?php echo $row["id"]; ?>">Update</a></td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </table>
</body>

</html>
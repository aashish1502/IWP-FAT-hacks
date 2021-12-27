<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

//Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$output='';
if (isset($_POST['submit'])) {
    $lname = $_POST['lname'];
    $query ="SELECT * FROM actors WHERE lastname = '$lname' ";
    // get result
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
    <table width="100%" cellspacing="0" cellpadding="18">
    <div class="header">
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Movie</th>
        <th>Rating</th>
    </div>
';
        while ($row = mysqli_fetch_array($result)) {
            $output .= '
<tr>
    <td>' . $row['firstname'] . '</td>
    <td>' . $row['middlename'] . '</td>
    <td>' . $row['lastname'] . '</td>
    <td>' . $row['movie'] . '</td
    <td>' . $row['rating'] . '</td>';
        }
    }
    echo $output;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
        Enter Last Name:
        <input type="text" name="lname" required><br/><br/>
        <input type="submit" name="submit" >
    </form>
</body>
</html>
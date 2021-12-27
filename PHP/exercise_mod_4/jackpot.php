<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "jackpot";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {

    $digit = mysqli_real_escape_string($conn, $_POST['digit']);
    $jack = mysqli_real_escape_string($conn, $_POST['jack']);
    $query = "SELECT * FROM prize WHERE digit LIKE '$digit'";
    // get result
    $result = mysqli_query($conn, $query);

    // Fetch data
    $res = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (empty($res)) {
        $query = "INSERT INTO prize(digit,jack) VALUES('$digit','$jack')";
        if (mysqli_query($conn, $query)) {
            $message = 'Successfully Inserted';
        } else {
            echo 'ERROR: ' . mysqli_error($conn);
        }
    }else{
        $query = "UPDATE prize SET digit=$digit, jack=$jack WHERE digit LIKE '$digit'";
        if (mysqli_query($conn, $query)) {
            $message = 'Successfully Updated';
        } else {
            echo 'ERROR: ' . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jackpot</title>
</head>

<body>
    <form action="" method="POST">
        <label>Digit</label>
        <input type="text" name="digit" id="digit" />
        <label>Jackpot</label>
        <input type="text" name="jack" id="jack" />
        <p id="demo"></p>
        <button name="submit" id="submit">Submit</button>
    </form>
</body>

</html>
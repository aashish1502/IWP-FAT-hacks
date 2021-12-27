<?php
$conn = mysqli_connect("localhost","root","root","movie");
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $movie = $_POST['movie'];
    $rating = $_POST['rate'];
    $sql = "INSERT INTO actors (firstname,middlename,lastname,movie,rating)
	VALUES ('$fname','$mname','$lname','$movie','$rating')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
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
    <title>Document</title>
</head>
<body>
    <form method="POST" action="/">
        <label>First Name</label>
        <input type="text" name="fname" id="fname" required><br/><br/>
        <label>Middle Name</label>
        <input type="text" name="mname" id="mname" required><br/><br/>
        <label>Last Name</label>
        <input type="text" name="lname" id="lname" required><br/><br/>
        <label>Movie Name</label>
        <input type="text" name="movie" id="movie" required><br/><br/>
        <label>Rating</label>
        <input type="number" step="0.01" name="rate" id="rate" required><br/><br/>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>
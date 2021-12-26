<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "user";
//Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// check for submit
if (isset($_POST['submit'])) {
    // Get form data
    $user_id = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['npassword']);
    $query = "SELECT * FROM users WHERE username LIKE '$user_id'";
    // get result
    $result = mysqli_query($conn, $query);
    // Fetch data
    $creds = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if ($creds) {
        foreach ($creds as $cred) {
            if ($cred['password'] === $pass) {
                if ($new_pass > 8 && ctype_alnum($new_pass)) {
                    $new = "UPDATE users SET password='$new_pass' WHERE username='$user_id'";
                    if (mysqli_query($conn, $new) === TRUE) {
                        echo "New Password Set Successfully";
                    } else {
                        echo "Error updating password: " . $conn->error;
                    }
                } else {
                    echo "Wrong format for Password!";
                }
            }
        }
    }
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
    <h1 class=" mx-2 my-2">Sign In</h1>
    <div class="card px-4 py-4 my-3">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <fieldset>
                <div class="form-group">
                    <label class="form-label mt-4">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">Old Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter old password" required>
                </div>
                <div class="form-group">
                    <label class="form-label mt-4">New Password</label>
                    <input type="password" class="form-control" name="npassword" placeholder="Enter new password" required>
                </div>
                <input type="submit" name="submit" value="Login" class="btn btn-success my-4">
            </fieldset>
        </form>
    </div>
</body>

</html>
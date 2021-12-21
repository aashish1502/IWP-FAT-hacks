<?php
session_start ();
if(isset($_POST['submit']))
{
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if(login($user, $pass)){
        echo "Successfully logged in with user: " . $_SESSION ['user'] . " and pass: " . $_SESSION ['pass'];
    }
    else{
        echo "Incorrect password or username";
        // header("location: login.html");
    }
}
function login($username, $password) {
  if (strcmp ( $username, "aashish" ) == 0 && strcmp ( $password, "1234" ) == 0) {
    session_start();
    $_SESSION ['user'] = $username;
    $_SESSION ['pass'] = md5 ( $password );
    return true;
  } else {
    return false;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <a href="./logout.php">Logout</a>
</body>
</html>
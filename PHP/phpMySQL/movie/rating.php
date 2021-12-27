<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "movie";

//Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$output='';
$query ="SELECT movie,rating FROM actors";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
    <table width="100%" cellspacing="0" cellpadding="18" border="1px solid #000">
    <div class="header">
        <th>Movie</th>
        <th>Rating</th>
    </div>
';
while ($row = mysqli_fetch_array($result)) {
    if ($row['rating']<=4) {
        $output .= '
        <tr style="color:red">
        <td>' . $row['movie'] . '</td>
        <td>' . $row['rating'] . '</td>
        </tr>';
    }
    else if ($row['rating']<7) {
        $output .= '
        <tr style="color:yellow">
        <td>' . $row['movie'] . '</td>
        <td>' . $row['rating'] . '</td>
        </tr>';
    } else {
        $output .= '
        <tr style="color:green">
        <td>' . $row['movie'] . '</td>
        <td>' . $row['rating'] . '</td>
        </tr>';
    }
    
}
echo $output;
}
?>
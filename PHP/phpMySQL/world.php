<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "world";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "select district from cities where country_code = 'JPN' and population > 2500000";
$result = $conn->query($sql);
$citiesArray = array();
$sql2 = "SELECT countries.name FROM countries natural JOIN cities Natural JOIN countrieslanguages ON countrieslanguages.language = 'English' ";
$result2 = $conn->query($sql2);
if ($result->num_rows > 0) {
    // output data of each row
    // $ans=mysqli_fetch_array($result);
    // var_dump($ans);
    while ($row = $result->fetch_assoc()) {
        array_push($citiesArray, $row);
        echo  $row['district'] . "<br>";
    }
    if (count($citiesArray)) {   
        createXMLfile($citiesArray);
    }  
} else {
    echo "0 results";
}
// $ans=mysqli_fetch_array($result2);
//     var_dump($ans);
if ($result2->num > 0) {
    // output data of each row
    $ans=mysqli_fetch_array($result2);
    var_dump($ans);
    while ($row = $result->fetch_assoc()) {
        echo  $row['district'] . "<br>";
    }
} else {
    echo "0 results";
}

function createXMLfile($citiesArray)
    {
    
        $filePath = 'cities.xml';
        $dom     = new DOMDocument('1.0', 'utf-8');
    
        $root      = $dom->createElement('cities');
        for ($i = 0; $i < count($citiesArray); $i++) {
    
    
            $cities = $dom->createElement('cities');
    }
$conn->close();
?>
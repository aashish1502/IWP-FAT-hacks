<?php
    if (isset($_POST["submit"])) {
        $string = htmlspecialchars($_POST['string']);
        for ($i=0; $i < strlen($string); $i++) { 
            $string[$i] = rand(0,1)?strtoupper($string[$i]):$string[$i]; 
        }
        echo $string.'<br>';
    }
?>
<html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css" integrity="sha512-5fsy+3xG8N/1PV5MIJz9ZsWpkltijBI48gBzQ/Z2eVATePGHOkMIn+xTDHIfTZFVb9GMpflF2wOWItqxAP2oLQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <form method="post">
        <label>Enter the string</label>
        <input type="text" name="string">
        <input type="submit" value="Submit" name="submit">
    </form>
</html>
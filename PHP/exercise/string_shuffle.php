<?php
    if (isset($_POST["submit"])) {
        # code...
        $str = htmlspecialchars($_POST['str']);
        //shuffling
        $str = strtolower($str);
        $count=0;
        while( $str[1] != 'a' && $str[1] != 'e' && $str[1] != 'i' && $str[1] != 'o' && $str[1] != 'u'){

            $str = str_shuffle($str);
            echo "The string is :". $str ."<br>";
            $count++;
        }
        echo "The number of times it took for the second letter as vowel is: $count <br>";
        // counting the vowels
        $count =0;
        for ($i=0; $i <strlen($str); $i++) { 
            if($str[$i]=='a'||$str[$i]=='e'||$str[$i]=='i'||$str[$i]=='o'||$str[$i]=='u') {
                $count++;
            }
        }
        echo "The number of vowels present in string is : $count";
    }
?>
<html>
    <form method="post">
        <label>Input a string</label>
        <input type="text" name="str">
        <input type="submit" value="Submit" name="submit">
    </form>
</html>
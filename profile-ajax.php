<?php
include_once("php/db_connect.php");

$alumni_id = $_GET['alumni_id'];
$curusername = $_GET['user'];
$curpassword = $_GET['pass'];

$result = mysqli_query($conn, "SELECT * FROM alumni WHERE ALUMNI_ID='$alumni_id'");
while($res = mysqli_fetch_array($result)){
    $username = $res['USERNAME'];
    $email = $res['EMAIL'];
    $password = $res['PASSWORD'];
}

if($_GET['do'] == "delA"){
    if($curusername === $username || $curusername === $email){
        echo "";
    }
    else{
        echo "Wrong username"."<br>";
    }

    if(!password_verify($curpassword, $password)){
        echo "Wrong password"."<br>";
    }
    else{
        echo "";
    }

    if(($username === $curusername || $email == $curusername) && (password_verify($curpassword, $password))){
        $result = mysqli_query($conn, "DELETE FROM alumni WHERE ALUMNI_ID = '$alumni_id'");
        $result = mysqli_query($conn, "DELETE FROM job WHERE ALUMNI_ID = '$alumni_id'");
        $result = mysqli_query($conn, "DELETE FROM experience WHERE ALUMNI_ID = '$alumni_id'");
        header("location: php/logout.php");
    }
}


?>
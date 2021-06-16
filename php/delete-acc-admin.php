<?php
include_once("db_connect.php");
$admin_id = $_GET["alumni_id"];

if(isset($_POST['delAcc'])){
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE ADMIN_ID='$admin_id'");
    while($res = mysqli_fetch_array($result)){
        $username = $res['ADMIN_USERNAME'];
        $email = $res['ADMIN_EMAIL'];
        $password = $res['PASSWORD'];
    }
    $curusername = mysqli_real_escape_string($conn, $_POST['username']);
    if(($username != $curusername) || ($email != $curusername)){
        echo "Your username or email did not match!";
    }
    $curpassword = mysqli_real_escape_string($conn, $_POST['password']);
    if($curpassword != $password){
        echo("Oops! Password did not match! Try again!");
    } 
    if((($username == $curusername) || ($email == $curusername)) && ($curpassword != $password)){
        $result = mysqli_query($conn, "DELETE FROM admin WHERE ADMIN_ID = '$admin_id'");
        echo 'Your account is deleted';
    }
}
?>
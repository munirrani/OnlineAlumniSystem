<?php
include_once("db_connect.php");
$alumni_id = $_GET["alumni_id"];

if(isset($_POST['delAcc'])){
    $result = mysqli_query($conn, "SELECT * FROM alumni WHERE ALUMNI_ID='$alumni_id'");
    while($res = mysqli_fetch_array($result)){
        $username = $res['USERNAME'];
        $email = $res['EMAIL'];
        $password = $res['PASSWORD'];
    }
    $curusername = mysqli_real_escape_string($conn, $_POST['username']);
    if(($username != $curusername) || ($email != $curusername)){
        echo "Your username or email did not match!";
    }
    $curpassword = mysqli_real_escape_string($conn, $_POST['password']);
    if(!password_verify($curpassword, $password)){
        echo("Oops! Password did not match! Try again!");
    } 
    if((($username == $curusername) || ($email == $curusername)) && (password_verify($curpassword, $password))){
        $result = mysqli_query($conn, "DELETE FROM alumni WHERE ALUMNI_ID = '$alumni_id'");
        echo 'Your account is deleted';
    }
}
?>
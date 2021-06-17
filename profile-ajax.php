<?php
include_once("php/db_connect.php");

//$alumni_id = $_POST['alumni_id'];


if(isset($_POST['delAcc'])){
    session_start();
    $curusername = $_POST['username'];
    $curpassword = $_POST['password'];

    if($curusername == $_SESSION['userUsername']){
        $result = mysqli_query($conn, "SELECT * FROM alumni WHERE USERNAME='$curusername'");
        if(mysqli_num_rows($result) >= 1){
            while($res = mysqli_fetch_array($result)){
                $alumni_id = $res['ALUMNI_ID'];
                $username = $res['USERNAME'];
                $email = $res['EMAIL'];
                $password = $res['PASSWORD'];
            }
            if(password_verify($curpassword, $password)){
                $result = mysqli_query($conn, "DELETE FROM alumni WHERE ALUMNI_ID = '$alumni_id'");
                $result = mysqli_query($conn, "DELETE FROM job WHERE ALUMNI_ID = '$alumni_id'");
                $result = mysqli_query($conn, "DELETE FROM experience WHERE ALUMNI_ID = '$alumni_id'");
                header("location: php/logout.php");
            }
            else{
                echo "<script>window.location.href = 'profile-settings.php?error=wrongpass';</script>";
                exit();
            }

            
        }
    }
    else{
        echo "<script>window.location.href = 'profile-settings.php?error=wronguname';</script>";
        exit();
    }
    
}
?>
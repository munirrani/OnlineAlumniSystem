<?php
include_once("db_connect.php");


if(isset($_POST['delAcc'])){
    session_start();
    $curusername = $_POST['username'];
    $curpassword = $_POST['password'];

    if($curusername == $_SESSION["userUsername"]) {
        $result = mysqli_query($conn, "SELECT * FROM admin WHERE ADMIN_USERNAME='$curusername'");
        if(mysqli_num_rows($result) >= 1){
            while($res = mysqli_fetch_array($result)){
                $alumni_id = $res['ADMIN_ID'];
                $username = $res['ADMIN_USERNAME'];
                $email = $res['ADMIN_EMAIL'];
                $password = $res['PASSWORD'];
            }
            if(password_verify($curpassword, $password)){
                $result = mysqli_query($conn, "DELETE FROM admin WHERE ADMIN_ID = '$alumni_id'");
                header("location: logout.php");
                exit();
            }
            else{
                echo "<script>window.location.href = 'admin-profile-settings.php?error=wrongpass';</script>";
                exit();
            }

            
        }
    }
    
}
?>
<?php

function emptyInputRegister($firstname, $lastname, $username, $email, $password, $confirmpw) {
    $result = false;
    if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($confirmpw)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username) {
    $result = false;
    if(!preg_match("/^[a-zA-z0-9\s]*$/", $username)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result = false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function pwdMatch($password,$confirmpw) {
    $result = false;
    if($password !== $confirmpw){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function usernameExists($conn,$username,$email) {
    $sqlusername = "SELECT * FROM alumni WHERE USERNAME = ? OR EMAIL = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sqlusername)) {
        echo "<script>window.location.href = '../register.php?error=stmtfailed';</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function checkRoles($userperm) {
    $result = false;
    if($userperm == "Role"){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function rolesAdmin($userperm) {
    $result = false;
    if($userperm == "admin"){
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}


function emptyInputLogin($username, $password) {
    $result = false;
    if(empty($username) || empty($password)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}



function loginUser($conn, $username, $password,$remember) {
    $usernameExists = usernameExists($conn,$username,$username);

    if($usernameExists === false) {
        echo "<script>window.location.href = '../login.php?error=usernamedoesntexists';</script>";
        echo "<script>console.log('username exists');</script>";
        exit();
    }
    if($usernameExists["REG_STATUS"] === "Pending") {
        echo "<script>window.location.href = '../login.php?error=pendingstatus';</script>";
        exit();
    }
    if($usernameExists["REG_STATUS"] === "Rejected") {
        echo "<script>window.location.href = '../login.php?error=rejectedstatus';</script>";
        exit();
    }
    
    $verify = password_verify($password,$usernameExists["PASSWORD"]);

    if($verify === false) {
        echo "<script>window.location.href = '../login.php?error=passwordWrong';</script>";
        exit();
    }
    else if($verify === true) {

        $sql = 'SELECT ALUMNI_IMG FROM alumni WHERE ALUMNI_ID = '.$usernameExists["ALUMNI_ID"];
        $result = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
        $record = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION["userid"] = $usernameExists["ALUMNI_ID"]; 
        $_SESSION["userUsername"] = $usernameExists["USERNAME"]; 
        $_SESSION["alumniimg"] = $record["ALUMNI_IMG"];
        $_SESSION["remember"] = $remember;
        $_SESSION['LAST_ACTIVITY'] = time();
        echo "<script>sessionStorage.setItem('loggedin', true);</script>";
        echo "<script>window.location.href = '../index.php';</script>";
    }
}


function adminExists($conn,$username,$email) {
    $sqlusername = "SELECT * FROM admin WHERE ADMIN_USERNAME = ? OR ADMIN_EMAIL = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sqlusername)) {
        echo "<script>window.location.href = '../register.php?error=stmtfailed';</script>";
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}




function logAdmin($conn, $username, $password,$remember) {
    $usernameExists = adminExists($conn,$username,$username);

    if($usernameExists === false) {
        echo "<script>window.location.href = '../login.php?error=usernamedoesntexists';</script>";
        echo "<script>console.log('username exists');</script>";
        exit();
    }

    $verify = ($password === $usernameExists["PASSWORD"]);

    if($verify === false) {
        echo "<script>window.location.href = '../login.php?error=passwordWrong';</script>";
        exit();
    }
    else if($verify === true) {

        $fh = fopen("../img/icon.jpg", "r");
        $alumni_img_id = addslashes(fread($fh, filesize("../img/icon.jpg")));
        fclose($fh);
        session_start();
        $_SESSION["userid"] = $usernameExists["ADMIN_ID"]; 
        $_SESSION["userUsername"] = $usernameExists["ADMIN_USERNAME"]; 
        $_SESSION["alumniimg"] = $alumni_img_id;
        $_SESSION["remember"] = $remember;
        $_SESSION['LAST_ACTIVITY'] = time();
        echo "<script>sessionStorage.setItem('loggedin', true);</script>";
        echo "<script>window.location.href = '../admindash.php';</script>";
    }

}







<?php

function emptyInputRegister($firstname, $lastname, $username, $email, $password, $confirmpw, $matricid) {
    $result = false;
    if(empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($password) || empty($confirmpw) || empty($matricid)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username) {
    $result = false;
    if(!preg_match("/^[a-zA-z0-9]*$/", $username)){
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


function emptyInputLogin($username, $password) {
    $result = false;
    if(empty($username) || empty($password)) {
        $result = true;
    }else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $username, $password) {
    $usernameExists = usernameExists($conn,$username,$username);


    if($usernameExists === false) {
        echo "<script>window.location.href = '../login.php?error=usernamedoesntexists';</script>";
        echo "<script>console.log('username exists');</script>";
        exit();
    }

    $verify = password_verify($password,$usernameExists["PASSWORD"]);

    if($verify === false) {
        echo "<script>window.location.href = '../login.php?error=passwordWrong';</script>";
        exit();
    }
    else if($verify === true) {
        session_start();
        $_SESSION["userid"] = $usernameExists["ALUMNI_ID"]; 
        $_SESSION["userUsername"] = $usernameExists["USERNAME"]; 
        echo "<script>sessionStorage.setItem('loggedin', true);</script>";
        echo "<script>console.log(' ".  $_SESSION["userUsername"] ." ');</script>";
        // echo "<script>window.location.href = '../index.php';</script>";
    }


}




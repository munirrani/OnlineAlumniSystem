<?php

include_once("db_connect.php");

if(isset($_POST["submit"])) {

    $username = $_POST["userOrEmail"];
    $password = $_POST["password"];
    $userperm = $_POST["userperm"];

    if(isset($_POST["rememberMe"])) {
        $remember = "remember";
    }else {
        $remember = "notremember";
    }

    require_once 'validation.inc.php';

    if(emptyInputLogin($username, $password) !== false) {
        echo "<script>window.location.href = '../login.php?error=emptyinput';</script>";
        exit();
    } 
    if(checkRoles($userperm) !== false) {
        echo "<script>window.location.href = '../login.php?error=chooserole';</script>";
        echo "<script>$('#login-modal-warning').modal('show');</script>";
        exit();
    }
    if(rolesAdmin($userperm) !== false) {
        logAdmin($conn, $username, $password,$remember);
        exit();
    }

    loginUser($conn, $username, $password,$remember);
}
else {
    echo "<script>window.location.href = '../login.php';</script>";
    exit();
}



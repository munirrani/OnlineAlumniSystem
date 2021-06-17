<?php


if (isset($_POST["reset-password-submit"])) {


    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];


    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token) . "&error=emptyinput");
        exit();
    } else if ($password != $passwordRepeat) {
        header("Location: ../create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token) . "&error=passwordnotequal");
        exit();
    }

    $currentDate = date("U");

    include_once("db_connect.php");

    $sql = "SELECT * FROM pwdreset WHERE pwdResetSelector =? AND pwdResetExpires >= ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {
            echo "You need to resubmit your reset request";
            exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
            if ($tokenCheck === false) {
                echo "You need to resubmit your reset request";
                exit();
            } else if ($tokenCheck === true) {
                $tokenEmail = $row["pwdResetEmail"];
                $sql = "SELECT * FROM alumni WHERE EMAIL=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error!";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row = mysqli_fetch_assoc($result)) {
                        echo "There was an error";
                        exit();
                    } else {

                        $sql = "UPDATE alumni SET PASSWORD=? WHERE EMAIL=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error!";
                            exit();
                        } else {

                            $newPwdHash = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);

                            echo $tokenEmail;
                            echo "<br>";
                            echo $_POST["pwd"];
                            echo "<br>";
                            echo $newPwdHash;

                            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error!";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../login.php?newpwd=passwordupdated");
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location: ../index.php");
}

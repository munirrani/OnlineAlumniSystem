<?php



if (isset($_POST["reset-request-submit"])) {
    include_once("php/db_connect.php");

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    // CHANGE IF WANT TO USE LOCALHOST
    $url = "https://online-alumni-system.herokuapp.com/create-new-password.php?selector=" . $selector . "&validator=" . 
    bin2hex($token);

    // expires the link 1 hour from when they request
    $expires = date("U") + 1800; 

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    }else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES 
    (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    }else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = 'Reset your password for online-alumni-system';

    $message = '<p>We received a password reset request. The link to reset your password is below, 
    if you did not make this request, you can ignore this email</p>';

    $message .= '<p>Here is your password reset link: </br>';

    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From: online-alumni-system <fsktmalumnisys@gmail.com>\r\n";
    $headers .= "Reply-To: fsktmalumnisys@gmail.com\r\n"; 
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../login.php?reset=success");




} else {
    header("Location: ../index.php");
}



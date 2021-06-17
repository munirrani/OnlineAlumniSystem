<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


if (isset($_POST["reset-request-submit"])) {
    include_once("db_connect.php");

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    // CHANGE IF WANT TO USE LOCALHOST
    $url = "localhost/onlinealumnisystem/create-new-password.php?selector=" . $selector . "&validator=" .
        bin2hex($token);

    // expires the link 1 hour from when they request
    $expires = date("U") + 1800;

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error! geh 1";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
        exit();
    } else {
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

    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";


    //PHPMailer Object
    $mail = new PHPMailer(true); //Argument true in constructor enables exceptions

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "fsktmalumnisys@gmail.com";
    $mail->Password = 'p@ssw0rd12345';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    //From email address and name
    $mail->From = "fsktmalumnisys@gmail.com";
    $mail->FromName = "online-alumni-system";

    //To address and name
    $mail->addAddress($userEmail); //Recipient name is optional

    //Address to which recipient will reply
    $mail->addReplyTo("fsktmalumnisys@gmail.com", "Reply");

    // //CC and BCC
    // $mail->addCC("cc@example.com");
    // $mail->addBCC("bcc@example.com");
    //Send HTML or Plain Text email
    $mail->isHTML(true);
    $mail->Subject = "Reset your password for online-alumni-system";
    $mail->Body = $message;
    $mail->AltBody = "This is the plain text version of the email content";

    try {
        $mail->send();
        header("Location: ../login.php?reset=success");
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }






} else {
    header("Location: ../index.php");
}

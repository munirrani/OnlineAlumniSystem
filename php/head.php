<?php

session_start();

if(isset($_SESSION["userid"])) {
    if(isset($_SESSION['LAST_ACTIVITY'])) {
        // last request was more than x seconds ago
        $lastrequesttime = 600;
        if($_SESSION["remember"] == "remember") {
            if (time() - $_SESSION['LAST_ACTIVITY'] > $lastrequesttime*3) {
                echo "<script>window.location.href = 'php/logout.php';</script>";
            }
        }else if (time() - $_SESSION['LAST_ACTIVITY'] > $lastrequesttime) {
            echo "<script>window.location.href = 'php/logout.php';</script>";
        }
    }
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" href="css/main.css">
<link rel="icon" href="img/logo_um_without_text.png" type="image/png">
<script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/map.js"></script>
<?php
    require_once("db_connect.php");

    echo $_POST['EVENT_TITLE'];
    $sql = "DELETE FROM event WHERE EVENT_TITLE = '{$_POST['EVENT_TITLE']}'";
    $result = mysqli_query($conn, $sql);

    header("Location: ../event_admin.php");
?>
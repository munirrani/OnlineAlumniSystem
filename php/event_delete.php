

<?php
    require_once("db_connect.php");

    $title = $_POST['EVENT_TITLE'];

    if(!isset($title))
        header("Location: ../event_admin.php");
    
    $fetchSQL = "SELECT IMAGE FROM event WHERE EVENT_TITLE = '$title'";
    $result = mysqli_query($conn, $fetchSQL);
    $path = mysqli_fetch_assoc($result);
    $filePath = (string)$path['IMAGE'];
    unlink("../".$filePath);

    $sql = "DELETE FROM event WHERE EVENT_TITLE = '{$title}'";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
    header("Location: ../event_admin.php?RESPONSE='Event successfully deleted'");
?>
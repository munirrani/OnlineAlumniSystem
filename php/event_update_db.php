<?php
    require_once("db_connect.php");
    try 
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_POST["eventTitle"]) && isset($_POST["startDate"]) && isset($_POST["endDate"]) && isset($_POST["description"]) && isset($_FILES["eventImg"]) && isset($_POST["eventMode"]))
            {
                session_start();
                $adminId = (string)$_SESSION['userid'];
                if(isset($_SESSION['userid']) === false || $adminId == null)
                    header("Location: ../event_admin.php");
                    
                $eventTitle = mysqli_real_escape_string($conn, $_POST['eventTitle']);
                $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
                $endDate = mysqli_real_escape_string($conn, $_POST['endDate']);
                $eventMode = mysqli_real_escape_string($conn, $_POST['eventMode']);
                $description = mysqli_real_escape_string($conn, $_POST['description']);
                $todayDate = date('Y-m-d');
                $eventImg = json_encode($_FILES['eventImg']);

                if(isset($_POST['eventImg']))
                {
                    $fileExt = explode(".", $_FILES["eventImg"]["name"]);
                    $ext = strtolower(end($fileExt));

                    $imagesArr = array("png", "jpg", "jpeg");
                    if(in_array($ext, $imagesArr) === false)
                        header("Location: ../event_admin.php");

                    $imageName = uniqid().".".$ext;
                    $imagePath = "uploads/images/".$imageName;
                    $imagePath = (string)$imagePath;

                    $fetchSQL = "SELECT IMAGE FROM event WHERE EVENT_TITLE = '$eventTitle'";
                    $result = mysqli_query($conn, $fetchSQL);
                    $path = mysqli_fetch_assoc($result);
                    $filePath = (string)$path['IMAGE'];
                    !unlink("../".$filePath);

                    $sql =  "UPDATE event SET START_DATE = '$startDate', END_DATE = '$endDate', MODE = '$eventMode', IMAGE = '$imagePath', DESCRIPTION = '$description' WHERE EVENT_TITLE = '$eventTitle'";
                }
                else
                    $sql =  "UPDATE event SET START_DATE = '$startDate', END_DATE = '$endDate', MODE = '$eventMode', DESCRIPTION = '$description' WHERE EVENT_TITLE = '$eventTitle'";
                $result = mysqli_query($conn, $sql);

                $sql = "INSERT INTO event_modification (EVENT_TITLE, ADMIN_ID, MODIFICATION_TYPE, MODIFICATION_DATE) VALUES ('$eventTitle', '$adminId', 'Update', '$todayDate')";
                $result = mysqli_query($conn, $sql);
            }
        }
        mysqli_close($conn);
        header("Location: ../event_admin.php");
    }
    catch(PDOEXCEPTION $e)
    {
        die("Error: " . $e->getMessage());
    }
?> 
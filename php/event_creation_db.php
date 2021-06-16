<?php
    require_once("db_connect.php");
    try 
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            // TODO: Store php array in IMAGE (actual filename and temporary filename)
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

                $fileExt = explode(".", $_FILES["eventImg"]["name"]);
                $ext = strtolower(end($fileExt));

                // Add modal for this function
                $imagesArr = array("png", "jpg", "jpeg");
                if(in_array($ext, $imagesArr) === false)
                    header("Location: ../event_creation.php");
                // 

                $imageName = uniqid("", true).".".$ext;
                $imagePath = "uploads/images/".$imageName;
                $imagePath = (string)$imagePath;
                move_uploaded_file($_FILES['eventImg']['tmp_name'], "../".$imagePath);

                $sql =  "INSERT INTO event (EVENT_TITLE, START_DATE, END_DATE, MODE, IMAGE, DESCRIPTION) VALUES ('$eventTitle', '$startDate', '$endDate', '$eventMode', '$imagePath', '$description')";
                $result = mysqli_query($conn, $sql);

                $sql = "INSERT INTO event_modification (EVENT_TITLE, ADMIN_ID, MODIFICATION_TYPE, MODIFICATION_DATE) VALUES ('$eventTitle', '$adminId', 'Create', '$todayDate')";
                $result = mysqli_query($conn, $sql);

                mysqli_close($conn);
            }
        }

        header("Location: ../event_admin.php");
    }
    catch(PDOEXCEPTION $e)
    {
        die("Error: " . $e->getMessage());
    }
?>
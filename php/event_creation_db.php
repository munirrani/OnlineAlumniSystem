<?php
    require_once("db_connect.php");
    try 
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            // TODO: Add invited accounts && $_POST["invitedAccounts"]
            // TODO: Add admin id
            // TODO: Do validation of file
            // TODO: Store php array in IMAGE (actual filename and temporary filename)
            if(isset($_POST["eventTitle"]) && isset($_POST["startDate"]) && isset($_POST["endDate"]) && isset($_POST["description"]) && isset($_FILES["eventImg"]) && isset($_POST["eventMode"]) && isset($_POST["location"]))
            {
                $eventTitle = mysqli_real_escape_string($conn, $_POST['eventTitle']);
                $invitedAccounts = NULL;
                $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
                $endDate = mysqli_real_escape_string($conn, $_POST['endDate']);
                $eventMode = mysqli_real_escape_string($conn, $_POST['eventMode']);
                $eventImg = json_encode($_FILES['eventImg']);
                $location = mysqli_real_escape_string($conn, $_POST['location']);
                $description = mysqli_real_escape_string($conn, $_POST['description']);
                $todayDate = date('Y-m-d');

                $fileExt = explode(".", $_FILES["eventImg"]["name"]);
                $ext = strtolower(end($fileExt));
                $imageName = uniqid("", true).".".$ext;
                $imagePath = "uploads/images/".$imageName;
                move_uploaded_file($_FILES['eventImg']['tmp_name'], "../".$imagePath);

                $sql =  "INSERT INTO event (EVENT_TITLE, START_DATE, END_DATE, MODE, IMAGE, LOCATION, DESCRIPTION) VALUES ('$eventTitle', '$startDate', '$endDate', '$eventMode', '$imagePath', '$location', '$description')";
                $result = mysqli_query($conn, $sql);
                // if($result === false)
                //     echo mysqli_error($conn);
                // else    
                //     echo "hurray";

                $sql = "INSERT INTO event_modification (EVENT_TITLE, ADMIN_ID, MODIFICATION_TYPE, MODIFICATION_DATE) VALUES ('$eventTitle', '420', 'Create', '$todayDate')";
                $result = mysqli_query($conn, $sql);
                // if($result === false)
                //     echo mysqli_error($conn);
                // else    
                //     echo "hurray";

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
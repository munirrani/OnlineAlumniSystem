<?php
    require_once("db_connect.php");
    try 
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            // TODO: add invited accounts && $_POST["invitedAccounts"]
            // TODO: add admin id
            // TODO: do validation of file
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

                $sql =  "INSERT INTO event (EVENT_TITLE, START_DATE, END_DATE, MODE, IMAGE, LOCATION, DESCRIPTION) VALUES ('$eventTitle', '$startDate', '$endDate', '$eventMode', '$eventImg', '$location', '$description')";
                move_uploaded_file()
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
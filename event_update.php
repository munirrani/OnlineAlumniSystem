<?php
    require_once("php/db_connect.php");
    $json = "";
    if(isset($_POST["EVENT_TITLE"]))
    {
        $title = $_POST["EVENT_TITLE"];
        $sql = "SELECT * FROM event WHERE EVENT_TITLE = '$title'";
        $result = mysqli_query($conn, $sql);
        if($result === false)
            echo mysqli_error($conn);
        $json = mysqli_fetch_assoc($result);
    }
    mysqli_close($conn);

    $words = explode('/', $json['IMAGE']);
    $fileName = end($words);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php");
        if (!isset($_SESSION["admin"])) {
            header("location: index.php");
        }
    ?>

    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <style>
        main {
            min-height: calc(100vh - 52px - 110px - 72px);
        }

        footer {
            padding-top: 0px;
        }
    </style>
    <title>Update Event | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/admin_heading.php") ?>

        <main id="event-section">
            <div class="container form-reg-container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="breadcrumb-background mt-5">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item breadcrumb-admin"> <a href="admindash.html">Admin-Dashboard</a></li>
                        <li class="breadcrumb-item breadcrumb-admin"><a href="admin-events-dash.html">Events-Dashboard</a></li>
                        <li class="breadcrumb-item breadcrumb-admin"><a href="event_admin.php">Manage Events</a></li>
                        <li class="breadcrumb-item breadcrumb-admin-current active" aria-current="page">Update Event</li>
                    </ol>
                </nav>

                <div class="row mb-4">
                    <h1 class="form-reg-heading">UPDATE EVENT</h1>
                    <hr>
                </div>

                <form class="form" id="form" method="POST" action="php/event_update_db.php" enctype="multipart/form-data">
                    <div class="row event-row">
                        <div>
                            <div class="col-sm mb-3">
                                <label class="form-label" for="eventTitle">Event Title</label>
                                <input class="form-control" id="eventTitle" type="text" name="eventTitle" placeholder="" readonly="readonly">
                                <small class="error-msg">Event title must be descriptive</small>
                            </div>
                        </div>

                        <div class="row mt-2 event-row m-0 p-0">
                            <div class="col-sm event-row">
                                <label class="form-label" for="startDate">Start Date</label>
                                <div class="input-group event-date">
                                    <input type="date" class="form-control" id="startDate" name="startDate" placeholder="" required>
                                </div>
                                <small class="error-msg">Please select an appropriate start date</small>
                            </div>

                            <div class="col-sm event-row">
                                <label class="form-label" for="endDate">End Date</label>
                                <div class="input-group event-date">
                                    <input type="date" class="form-control" id="endDate" name="endDate" placeholder="" required>
                                </div>
                                <small class="error-msg">Please select an appropriate end date</small>
                            </div>

                            <div class="row event-row p-0 m-0" style="margin-top: -1.5em;">
                                <div class="col-sm">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" cols="25" rows="10" placeholder="Reminder: Provide the location/url of the event"></textarea>
                                </div>
                            </div>
                            <br>

                            <div class="row mt-4 event-row p-0 m-0">
                                <div class="col-sm">
                                    <label class="form-label" for="eventImg">Event Image</label>
                                    <input class="form-control" type="file" name="eventImg" id="eventImg">
                                    <small class="mt-1"><span>Past image: <?php echo $fileName ?></span></small>
                                    <small class="error-msg">Please provide an image</small>
                                </div>
                            </div>

                            <div class="row mt-4 mb-4 event-row p-0 m-0">
                                <label class="form-label" for="eventMode" style="margin-bottom: 2em;">Mode</label>
                                <div class="col radio-label">
                                    <input type="radio" class="event-mode" id="physical" name="eventMode" value="Physical" required>
                                    <label class="event-label" for="physical">Physical</label>
                                </div>
                                <div class="col radio-label">
                                    <input type="radio" class="event-mode" id="virtual" name="eventMode" value="Virtual" required>
                                    <label class="event-label" for="virtual">Virtual</label>
                                </div>
                            </div>

                            <div class="row form-reg-submit justify-content-center mt-2">
                                <input class="submitreg" id="submit-event" type="submit" value="Update Event">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>

        <?php include_once("php/admin_footer.php") ?>
    </div>

    <?php include_once("php/scripts.php")?>
    <script type="text/javascript" src="js/eventValidator.js"></script>
    <script>
        // The navbar profile dropdown
        function myFunction() {
            myDropdown.classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches(".dropbtn")) {
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains("show")) {
                        openDropdown.classList.remove("show");
                    }
                }
            }
        };
        //
        let logoutbutton = document.querySelector("#logoutbutton");
        // when clicking the logout button it will set loggedin to false and sent user to homepage
        logoutbutton.onclick = function() {
            let loggedin = false;
            sessionStorage.setItem("loggedin", loggedin);
            window.location.href = "index.html";
        };
        //
    </script>
    <script>
        var event_details = <?php echo json_encode($json); ?>;

        ClassicEditor
        .create(document.querySelector('#description'))
        .then(editor => {editor.setData(event_details['DESCRIPTION']);})
        .catch(error => {console.error(error);});
        document.querySelector("#eventTitle").value = event_details['EVENT_TITLE'];
        document.querySelector("#startDate").value = event_details['START_DATE'];
        document.querySelector("#endDate").value = event_details['END_DATE'];

        var radioButtons = document.querySelectorAll(".event-mode");
        for(var i = 0; i < radioButtons.length; i++)
            if(radioButtons[i].value == event_details['MODE'])
            {
                radioButtons[i].checked = true;
                break;
            } 
    </script>
</body>
</html>

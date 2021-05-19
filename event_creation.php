<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>

    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <style>
        main {
          min-height: calc(100vh - 52px - 110px - 72px);
        }
        footer {
          padding-top: 0px;
        }
    </style>
    <title>New Event | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/admin_heading.php")?>

        <main id="event-section">
            <div class="container form-reg-container">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="breadcrumb-background mt-5">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item breadcrumb-admin"> <a href="admindash.html">Admin-Dashboard</a></li>
                        <li class="breadcrumb-item breadcrumb-admin"><a href="admin-events-dash.html">Events-Dashboard</a></li>
                        <li class="breadcrumb-item breadcrumb-admin"><a href="event_admin.html">Manage Events</a></li>
                        <li class="breadcrumb-item breadcrumb-admin-current active" aria-current="page">/New Event</li>
                    </ol>
                </nav>
                <div class="row mb-4">
                    <h1 class="form-reg-heading">NEW EVENT</h1>
                    <hr>
                </div>
                <form action="" method="POST" class="form" id="form">
                    <div class="row event-row">
                        <div class="col-sm">
                            <label class="form-label" for="eventTitle">Event Title</label>
                            <input class="form-control" id="eventTitle" type="text" name="eventTitle" placeholder=""
                                required>
                            <small class="error-msg">Error Message</small>
                        </div>
                        <div class="row mt-2 event-row m-0 p-0">
                            <div class="col-sm event-row">
                                <label class="form-label" for="startDate">Start Date</label>
                                <div class="input-group event-date">
                                    <input type="date" class="form-control" id="startDate" placeholder="" required>
                                </div>
                                <small class="error-msg">Error Message</small>
                            </div>
                            <div class="col-sm event-row">
                                <label class="form-label" for="endDate">End Date</label>
                                <div class="input-group event-date">
                                    <input type="date" class="form-control" id="endDate" placeholder="" required>
                                </div>
                                <small class="error-msg">Error Message</small>
                            </div>
                            <div class="row event-row p-0 m-0" style="margin-top: -1.5em;">
                                <div class="col-sm">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" class="form-control" id="description" cols="25"
                                        rows="10"></textarea>
                                    <small class="error-msg">Error Message</small>
                                </div>
                            </div>
                            <br>
                            <div class="row mt-4 event-row p-0 m-0">
                                <div class="col-sm">
                                    <label class="form-label" for="eventImg">Event Image</label>
                                    <input class="form-control" type="file" name="eventImg" id="eventImg">
                                    <small class="error-msg">Error Message</small>
                                </div>
                            </div>
                            <div class="row mt-4 event-row p-0 m-0">
                                <label class="form-label" for="eventMode">Mode</label>
                                <div class="col radio-label">
                                    <input type="radio" class="event-mode" id="physical" name="eventMode" value="physical" required>
                                    <label class="event-label" for="physical">Physical</label>
                                </div>
                                <div class="col radio-label">
                                    <input type="radio" class="event-mode" id="virtual" name="eventMode" value="virtual" required>
                                    <label class="event-label" for="virtual">Virtual</label>
                                </div>
                            </div>
                            <div class="row form-reg-submit justify-content-center mt-2">
                                <button class="submitreg" id="submit-event" type="submit">Create Event</button>
                            </div>  
                        </div>
                    </div>
                </form>
            </div>
        </main>

        <?php include_once("php/admin_footer.php")?>
    </div>

    <?php include_once("php/scripts.php")?>

    <script type="text/javascript" src="js/eventValidator.js"></script>
    <script>
        // The navbar profile dropdown
        function myFunction() {
            myDropdown.classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
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
        logoutbutton.onclick = function () {
            let loggedin = false;
            sessionStorage.setItem("loggedin", loggedin);
            window.location.href = "index.html";
        };
      //
    </script>
</body>

<script type="text/javascript" src="js/eventFiller.js"></script>
</html>

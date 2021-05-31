<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/b-1.7.0/r-2.2.7/datatables.min.css"/>
    <link rel="stylesheet" href="css/event_admin.css">

    <style>
        main {
            min-height: calc(100vh - 52px - 110px - 72px);
        }

        footer {
            padding-top: 0px;
        }
    </style>

    <title>Manage Events | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/admin_heading.php")?>

        <main>
            <div id="event-main" class="pt-3">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="breadcrumb-background">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item breadcrumb-admin"> <a href="admindash.html">Admin-Dashboard</a></li>
                        <li class="breadcrumb-item breadcrumb-admin"><a href="admin-events-dash.html">Events-Dashboard</a></li>
                        <li class="breadcrumb-item breadcrumb-admin-current active" aria-current="page">/Manage Events
                        </li>
                    </ol>
                </nav>
                
                <section id="event-admin-page-intro" class="rounded-3">
                    <h2 id="page-title" class="mb-0">Event management</h2>
                    <span class="meta-text">Where events are managed</span>
                    <hr>
                </section>

                <section id="event-table">
                    <table id="my-table" class="display">
                    </table>
                </section>
          
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                    <div class="modal-dialog warning">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                You're about to delete this event. Are you sure?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php include_once("php/admin_footer.php")?>
    </div>

    <?php include_once("php/scripts.php")?>

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/b-1.7.0/r-2.2.7/datatables.min.js"></script>
    <script type="text/javascript" src="js/event_admin.js"></script>
    <script>
        document.querySelector("#dropdown-username").innerHTML = `Signed in as <strong>Admin</strong>`;
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
</html>
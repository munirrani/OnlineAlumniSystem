<header>
    <nav id="topNavbar" class="navbar navbar-dark navbar-expand-md">
        <div class="container h4">
            <div class="mx-auto order-0">
                <a class="navbar-brand" href="admindash.html">Faculty of Computer Science and Information Technology
                    Alumni</a>
            </div>
        </div>
    </nav>
</header>

<?php
include_once("php/db_connect.php");
$admin_id = $_SESSION["userid"];
$result = mysqli_query($conn, "SELECT * FROM admin WHERE ADMIN_ID = $admin_id");
while ($res = mysqli_fetch_array($result)) {
  $username = $res['ADMIN_USERNAME'];
  $password = $res['PASSWORD'];
}
?>

<nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-lg" id="botNavbar">
    <div class="container h5">
        <a class="navbar-brand" href="admindash.php">
            <img src="img/FSKTM-Vector.svg" alt="" width="150" height="150" class="d-inline-block" id="logo-img">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <hr>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/admindash.php') echo 'active'?>" aria-current="page" href="admindash.php">
                        <b>
                            Dashboard
                        </b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/event_admin.php') echo 'active'?>" href="event_admin.php">
                        <b>
                            Manage Events
                        </b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/admin-profile-dash.php') echo 'active'?>" href="admin-profile-dash.php">
                        <b>
                            Manage Profiles
                        </b>
                    </a>
                </li>
            </ul>
            <hr>
            <div class="fl-right event-buttons navbar-nav">
                <div class="d-flex gap-2">
                    <div class="dropdown">
                        <button onclick="myFunction()" id="profilebtn" class="btn">
                            <img src="img/icon.jpg" alt="Admin" id="profileIcon" class="dropbtn shadow">
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="admin-profile-settings.php" id="dropdown-username">Signed in as <strong> <?php echo $username; ?></strong></a>
                            <hr class="no-margin">
                            <a href="admin-profile-settings.php">Settings & Privacy</a>
                            <hr class="no-margin">
                            <a href="php/logout.php" id="logoutbutton">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<header>
    <nav id="topNavbar" class="navbar navbar-dark navbar-expand-md">
        <div class="container h4">
            <div class="mx-auto order-0">
                <a class="navbar-brand" href="index.php">Faculty of Computer Science and Information Technology Alumni</a>
            </div>
        </div>
    </nav>
</header>

<nav class=" navbar navbar-expand-lg navbar-light sticky-top shadow-lg" id="botNavbar">
    <div class="container h5">
        <a class="navbar-brand" href="index.php">
            <img src="img/FSKTM-Vector.svg" alt="" width="150" height="150" class="d-inline-block" id="logo-img">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <hr>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/index.php') echo 'active' ?>" aria-current="page" href="index.php">
                        <b>
                            Home
                        </b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/upcoming_events.php') echo 'active' ?>" href="upcoming_events.php">
                        <b>
                            Events
                        </b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/jobs.php') echo 'active' ?>" href="jobs.php">
                        <b>
                            Jobs
                        </b>
                    </a>
                </li>
                <?php
                    if (isset($_SESSION["userid"])) 
                    {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link';
                        if ($_SERVER["PHP_SELF"] == "/OnlineAlumniSystem/alumnisearch.php") 
                            echo ' active';
                        echo '"';
                        echo "href='alumnisearch.php'><b>Search Alumni</b></a>";
                        echo '</li>';
                    }
                ?>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/about.php') echo 'active' ?>" href="about.php">
                        <b>
                            About
                        </b>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/contact.php') echo 'active' ?>" href="contact.php">
                        <b>
                            Contact Us
                        </b>
                    </a>
                </li>
            </ul>
            <hr>
            <div class="navbar-nav fl-right event-buttons">
                <div class="d-flex gap-2">
                    <?php
                    if (isset($_SESSION["userid"])) {
                        echo '
                                <div class="navbar-nav dropdown">
                                <button onclick="myFunction()" id="profilebtn" class="btn">
                                    <img src="data:image/jpeg;base64,' . base64_encode($_SESSION["alumniimg"]) . '" alt="Null-Image" id="profileIcon" class="dropbtn shadow imgcoverobject">
                                </button>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a href="profile.php" id="dropdown-username">Signed in as <strong>'; echo $_SESSION["userUsername"]; echo'</strong></a>
                                        <hr class="no-margin">
                                        <a href="profile.php">Profile</a>
                                        <a href="profile-settings.php">Settings & Privacy</a>
                                        <hr class="no-margin">
                                        <a href="jobs-activity.php">Job Activity</a>
                                        <a href="jobs-bookmark.php">Bookmarks</a>
                                        <hr class="no-margin">
                                        <a href="php/logout.php" id="logoutbutton">Log Out</a>
                                    </div>
                                    ';

                        } 
                        else {
                            echo '<a href="login.php"><button id="logbutton" class="btn shadow" type="button">Login</button></a>';
                            echo '<a href="register.php"><button id="regbutton" class="btn shadow" type="button">Register</button></a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</nav>
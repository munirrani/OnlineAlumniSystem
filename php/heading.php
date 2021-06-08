<header>
    <nav id="topNavbar" class="navbar navbar-dark navbar-expand-md">
        <div class="container h4">
            <div class="mx-auto order-0">
                <a class="navbar-brand" href="index.php">Faculty of Computer Science and Information Technology
                    Alumni</a>
            </div>
        </div>
    </nav>
</header>

<nav class=" navbar navbar-expand-lg navbar-light sticky-top shadow-lg" id="botNavbar">
    <div class="container h5">
        <a class="navbar-brand" href="index.php">
            <img src="img/FSKTM-Vector.svg" alt="" width="150" height="150" class="d-inline-block"
                id="logo-img">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <hr>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/index.php') echo ' active'?>" aria-current="page" href="index.php"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/upcoming_events.php') echo ' active'?>" href="upcoming_events.php"><b>Events</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/jobs.html') echo ' active'?>" href="jobs.html"><b>Jobs</b></a>
                </li>
                <li class="nav-item nav-hide-logged">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/alumnisearch.html') echo ' active'?>" href="alumnisearch.html"><b>Search Alumni</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/about.html') echo ' active'?>" href="about.html"><b>About</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_SERVER['PHP_SELF'] == '/OnlineAlumniSystem/contact.php') echo ' active'?>" href="contact.php"><b>Contact Us</b></a>
                </li>
            </ul>
            <hr>
            <div class="navbar-nav fl-right event-buttons">
                <div class="d-flex gap-2">
                    <a href="login.php"><button id="logbutton" class="btn shadow nav-button-bar"
                            type="button">Login</button></a>
                    <a href="register.php"><button id="regbutton" class="btn shadow nav-button-bar"
                            type="button">Register</button></a>
                    <div class="navbar-nav dropdown nav-prof-bar">
                        <button onclick="myFunction()" id="profilebtn" class="btn">
                            <img src="img/icon.jpg" alt="Admin" id="profileIcon" class="dropbtn shadow">
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="profile.html" id="dropdown-username"></a>
                            <hr class="no-margin">
                            <a href="profile.html">Profile</a>
                            <a href="profile-settings.html">Settings & Privacy</a>
                            <hr class="no-margin">
                            <a href="jobs-activity.html">Job Activity</a>
                            <a href="jobs-bookmark.html">Bookmarks</a>
                            <hr class="no-margin">
                            <a href="#" id="logoutbutton">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="icon" href="img/logo_um_without_text.png" type="image/png" />
  <style>
    main {
      min-height: calc(100vh - 52px - 110px - 72px);
    }

    footer {
      padding-top: 0px;
    }
  </style>
  <title>Manage Profiles | FSKTM Alumni</title>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <header>
      <nav id="topNavbar" class="navbar navbar-dark navbar-expand-md">
        <div class="container h4">
          <div class="mx-auto order-0">
            <a class="navbar-brand" href="admindash.php">Faculty of Computer Science and Information Technology
              Alumni</a>
          </div>
        </div>
      </nav>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top shadow-lg" id="botNavbar">
      <div class="container h5">
        <a class="navbar-brand" href="admindash.php">
          <img src="img/FSKTM-Vector.svg" alt="" width="150" height="150" class="d-inline-block" id="logo-img">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            <hr>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="admindash.php"><b>Dashboard</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="event_admin.php"><b>Manage Events</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="admin-profile-dash.php"><b>Manage Profiles</b></a>
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
                  <a href="profile.php" id="dropdown-username"></a>
                  <hr class="no-margin">
                  <a href="admin-profile-settings.php">Settings & Privacy</a>
                  <hr class="no-margin">
                  <a href="#" id="logoutbutton">Log Out</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>



    <main>
      <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="breadcrumb-background">
          <ol class="breadcrumb">
            <li class="breadcrumb-item breadcrumb-admin"> <a href="admindash.php">Admin-Dashboard</a></li>
            <li class="breadcrumb-item breadcrumb-admin-current active" aria-current="page">/Profiles Dashboard</li>
          </ol>
        </nav>
        <div class="jumbotron-events">
        <div class="row justify-content-center">
            <h1 class="display-5" id="alumni-search-heading">MANAGE ALUMNI PROFILES</h1>
        </div>
        <div class="row d-lg-flex justify-content-center align-items-center mt-4">
          <?php
          include_once("php/db_connect.php");
          $sql = "SELECT COUNT(REG_STATUS) FROM alumni WHERE REG_STATUS = 'Active'";
          $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
          $active_count = mysqli_fetch_assoc($resultset)['COUNT(REG_STATUS)'];

          $sql = "SELECT COUNT(REG_STATUS) FROM alumni WHERE REG_STATUS = 'Pending'";
          $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
          $pending_count = mysqli_fetch_assoc($resultset)['COUNT(REG_STATUS)'];

          $sql = "SELECT COUNT(REG_STATUS) FROM alumni WHERE REG_STATUS = 'Rejected'";
          $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
          $rejected_count = mysqli_fetch_assoc($resultset)['COUNT(REG_STATUS)'];
          ?>
          <div class="col-lg">
              <div class="counter">
                  <div class="counter-icon">
                      <i class="fa fa-check"></i>
                  </div>
                  <div class="counter-content">
                      <h3>Approved</h3>
                      <span class="counter-value"><?php echo $active_count ?></span>
                  </div>
                  
              </div>
          </div>
          <div class="col-lg">
              <div class="counter yellow">
                  <div class="counter-icon">
                      <i class="fa fa-info"></i>
                  </div>
                  <div class="counter-content">
                      <h3>Pending</h3>
                      <span class="counter-value"><?php echo $pending_count ?></span>
                  </div>
                  
              </div>
          </div>
          <div class="col-lg">
            <div class="counter red">
                <div class="counter-icon">
                    <i class="fa fa-close"></i>
                </div>
                <div class="counter-content">
                    <h3>Rejected</h3>
                    <span class="counter-value"><?php echo $rejected_count ?></span>
                </div>
            </div>
        </div>
      </div>
      <div class="row align-items-center justify-content-center mt-3 button-in-profile-dash">
        <div class="col-lg">
          <div class="jumbotron-admin-approved upcoming admin-welcome-cards d-flex justify-content-center align-items-center">
            <a href="admin-approved-alumni.php"><button class="btn btn-lg btn-admin green shadow admin-profile-btn">View Approved</button></a>
          </div>
        </div>
        <div class="col-lg">
          <div class="jumbotron-admin-pending past admin-welcome-cards d-flex justify-content-center align-items-center">
            <a href="admin-pending-alumni.php"><button class="btn btn-lg btn-admin yellow shadow admin-profile-btn">View Pending</button></a>
          </div>
        </div>
        <div class="col-lg">
          <div class="jumbotron-admin-rejected past admin-welcome-cards d-flex justify-content-center align-items-center">
            <a href="admin-rejected-alumni.php"><button class="btn btn-lg btn-admin red shadow admin-profile-btn">View Rejected</button></a>
          </div>
        </div>
      </div>
      </div>
    </div>


    </main>

    <footer class="page-footer shadow-lg">
      <div class="footer-copyright text-center py-3" style="background-color: #f3f3f3; font-weight: 800;">
        <p>Copyright &copy; FSKTM 2021</p>
      </div>
    </footer>
  </div>



  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
    integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
    integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
    integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
    crossorigin="anonymous"></script>
  <!-- <script type="text/javascript" src="js/main.js"></script> -->
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
      window.location.href = "index.php";
    };
  //
  </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("php/head.php") ?>

  <?PHP

  // if (!isset($_SESSION["userid"])) {
  //   header("location: index.php");
  // }

  ?>
  <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
  <title>Admin Alumni Profiles | FSKTM Alumni</title>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <header>
      <nav id="topNavbar" class="navbar navbar-dark navbar-expand-md">
        <div class="container h4">
          <div class="mx-auto order-0">
            <a class="navbar-brand" href="admindash.php">Faculty of Computer Science and Information
              Technology
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

      <div id="home-container" class="container-fluid">
        <div class="container mb-3">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="breadcrumb-background">
            <ol class="breadcrumb">
              <li class="breadcrumb-item breadcrumb-admin"> <a href="admindash.php">Admin-Dashboard</a></li>
              <li class="breadcrumb-item breadcrumb-admin"> <a href="admin-profile-dash.php">Profiles Dashboard</a></li>
              <li class="breadcrumb-item breadcrumb-admin-current active" aria-current="page">/Rejected Profiles</li>
            </ol>
          </nav>
        </div>
        
        <div class="row justify-content-center">
          <h1 class="display-4" id="alumni-search-heading">REJECTED ALUMNI PROFILES</h1>
        </div>

        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm alumni-search-form" method ="GET">
              <div class="card-body row no-gutters align-items-center">
                <div class="col">
                  <input id="alumni-search-bar" class="form-control form-control-lg form-control-borderless" name="search" type="search" placeholder="Search alumni profiles (Name / Department / Level of Study)">
                </div>
                <!--end of col-->
                <div class="col-md-1">
                  <button type="submit" name="submit" class="jumbotron-button"><i><img src="img/search_black_24dp.svg" alt=""></i></button>
                </div>
              </div>
            </form>
          </div>
          <!--end of col-->
        </div>

        <div class="row">
          <ul id="alumniList" class="the-alumni-cards">
            <?php
            include_once("php/db_connect.php");

            if (isset($_GET["reapproveProfile"])) {
              $alumni_id = $_GET["reapproveProfile"];
              $sql = "UPDATE alumni SET REG_STATUS='Active' WHERE ALUMNI_ID=$alumni_id";
              $result = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
            }

            $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, LEVEL, ALUMNI_IMG FROM alumni WHERE REG_STATUS = 'Rejected' ORDER BY FULL_NAME";
            $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
            $number_of_results = mysqli_num_rows($resultset);
            $result_per_page = 4;

            $number_of_pages =  ceil($number_of_results / $result_per_page);

            if (!isset($_GET['page'])) {
              $page = 1;
            } else {
              $page = $_GET['page'];
            }
            $starting_limit_number = ($page - 1) * $result_per_page;
            if (isset($_GET["submit"])) {
              $str = $_GET["search"];
              $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, LEVEL, ALUMNI_IMG FROM alumni WHERE (FULL_NAME LIKE '%$str%' OR DEPT LIKE '%$str%' OR LEVEL LIKE '%$str%') AND REG_STATUS='Rejected' ORDER BY FULL_NAME";
              $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
            } else {
              $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, LEVEL, ALUMNI_IMG FROM alumni WHERE REG_STATUS = 'Rejected' ORDER BY FULL_NAME LIMIT " . $starting_limit_number . "," . $result_per_page;
              $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
            }
            showCard($resultset);

            function showCard($resultset) {
              while ($record = mysqli_fetch_assoc($resultset)) {
            ?>
              <li>
                <div class="contact-box center-version shadow-lg">
                  <div class="body-alumni-card">
                    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($record['ALUMNI_IMG']) . '" class="img-circle"/>'; ?>
                    <h2 class="m-b-xs profile-card-name"><?php echo $record['FULL_NAME'] ?></h2>
                    <h4 class="card-department-alumni pb-1"><?php echo $record['DEPT'] ?></h4>
                    <hr>
                    <div class="row">
                      <div class="col col-card-alumni-val">
                        <p class="lead"><?php echo 'Batch of ' . $record['ENROL_YEAR'] ?></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col col-card-alumni-val">
                        <p class="lead"><?php echo $record['LEVEL'] ?></p>
                      </div>
                    </div>

                    <div class="alumni-card-footer mt-1 mx-2 mb-3">
                      <button type="button" class="btn shadow btn-admin green" data-bs-toggle="modal" data-bs-target="#reapprove-modal-<?php echo $record['ALUMNI_ID']; ?>"><i class="fa fa-check"></i> Reapprove</button>
                    </div>
                  </div>
                </div>
              </li>

              <!-- Modal Starts -->
              <div class="modal fade alumni-modal" id="reapprove-modal-<?php echo $record['ALUMNI_ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div id="modal-content-admin-alumni" class="modal-content shadow">

                    <!-- Modal Header -->
                    <div class="modal-header mb-3">
                        <h4 class="modal-title" id="modal-title" style="color: black;">Reapprove Alumni Registration</h4>
                    </div>  
                    <!--  -->

                    <div class="container modal-container-alumni">

                      <div id="reapprove-modal" style="display: block">
                        <p class="lead">Are you sure you would like to reapprove <?php echo $record['FULL_NAME']?>'s alumni profile?</p>
                        <div class="d-flex gap-2 justify-content-center">
                          <form method="GET">
                            <button type="submit" name="reapproveProfile" value="<?php echo $record['ALUMNI_ID']?>" class="btn btn-admin green shadow admin-profile-btn">Reapprove Profile</button>
                          </form>
                          <button class="btn btn-admin yellow shadow admin-profile-btn" data-bs-dismiss="modal">Cancel</button>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <!-- Modal Ends -->
            <?php } ?>
          </ul>
        </div>

        <?php } ?>


        <!-- Pagination -->
        <?php
        if (!isset($_GET["submit"])) { ?>
          <div class="text-center mt-3">
            <div class="row justify-content-md-center mx auto btn-group">
              <?php
              for ($page = 1; $page <= $number_of_pages; $page++) {
                echo '<a href="admin-approved-alumni.php?page=' . $page . '"class="col page-nav-alumni page-nav-text">' . $page . '</a>';
              }
              ?>
            </div>
          </div>

        <?php } ?>
    
      </div>

    </main>

  <?php include_once("php/footer.php") ?>
  </div>

  <?php include_once("php/scripts.php") ?>
</body>

</html>
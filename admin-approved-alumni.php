<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("php/head.php") ?>

  <?PHP

  // if (!isset($_SESSION["admin"])) {
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
              <li class="breadcrumb-item breadcrumb-admin"> <a href="admin-profile-dash.php">Profiles Dashboard</a>
              </li>
              <li class="breadcrumb-item breadcrumb-admin-current active" aria-current="page">/Approved Profiles</li>
            </ol>
          </nav>
        </div>

        <div class="row justify-content-center">
          <h1 class="display-4" id="alumni-search-heading">APPROVED ALUMNI PROFILES</h1>
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

            if (isset($_GET["deleteProfile"])) {
              $alumni_id = $_GET["deleteProfile"];
              $sql = "DELETE FROM experience WHERE ALUMNI_ID=$alumni_id; ";
              $sql .= "DELETE FROM alumni WHERE ALUMNI_ID=$alumni_id; ";
              $result = mysqli_multi_query($conn, $sql);
              while(mysqli_next_result($conn)){;} //flush multi_queries
            }

            $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, LEVEL, ALUMNI_IMG, GITHUB_ID, LINKEDIN_ID, BIO FROM alumni WHERE REG_STATUS = 'Active' ORDER BY FULL_NAME";
            $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
            $number_of_results = mysqli_num_rows($resultset);
            $result_per_page = 4;

            $number_of_pages = ceil($number_of_results / $result_per_page);

            if (!isset($_GET['page'])) {
              $page = 1;
            } else {
              $page = $_GET['page'];
            }
            $starting_limit_number = ($page - 1) * $result_per_page;
            if (isset($_GET["submit"])) {
              $str = $_GET["search"];
              $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, LEVEL, ALUMNI_IMG, GITHUB_ID, LINKEDIN_ID, BIO FROM alumni WHERE FULL_NAME LIKE '%$str%' OR DEPT LIKE '%$str%' OR LEVEL LIKE '%$str%'";
              $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
              showCard($resultset);
            } else {
              $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, LEVEL, ALUMNI_IMG, GITHUB_ID, LINKEDIN_ID, BIO FROM alumni WHERE REG_STATUS = 'Active' ORDER BY FULL_NAME LIMIT " . $starting_limit_number . "," . $result_per_page;
              $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
              showCard($resultset);
            }

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
                      <button type="button" class="btn shadow btn-admin alumni-card-view-profile-button" data-bs-toggle="modal" data-bs-target="#alumni-modal-<?php echo $record['ALUMNI_ID']; ?>"> View Alumni Profile</button>
                      <button type="button" class="btn shadow btn-admin red" data-bs-toggle="modal" data-bs-target="#alumni-delete-modal-<?php echo $record['ALUMNI_ID']; ?>"><i class="fa fa-close"></i> Delete</button>
                    </div>
                  </div>
                </div>
              </li>

              <!-- Modal Starts -->
              <div class="modal fade alumni-modal" id="alumni-modal-<?php echo $record['ALUMNI_ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div id="modal-content-admin-alumni" class="modal-content shadow">

                    <!-- Modal Header -->
                    <div class="modal-header mb-3">
                      <h4 class="modal-title" id="modal-title" style="color: black">Alumni Profile</h4>
                      <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <!--  -->


                    <div class="container modal-container-alumni">
                      <div class="row d-flex justify-content-center">

                        <!-- Profile Card -->
                        <div class="contact-box center-version shadow">
                          <div class="row d-flex align-items-center ">

                            <div class="col-lg-4 d-flex justify-content-center">
                              <div class="body-alumni-card-modal">
                                <img alt="image" id="modal-profile-img" <?php echo 'src=data:image/jpeg;base64,' . base64_encode($record['ALUMNI_IMG']); ?>>
                                <h2 id="modal-profile-name" class="m-b-xs profile-card-name mt-3" style="text-align: center;">
                                  <?php echo $record['FULL_NAME'] ?>
                                  </h1>
                                  <h4 id="modal-profile-dept" class="card-department-alumni pb-1">
                                    <?php echo $record['DEPT'] ?>
                                  </h4>


                                  <div class="row">
                                    <div class="col col-card-alumni-val">
                                      <p id="modal-profile-level" class="lead">
                                        <?php echo $record['LEVEL'] ?>
                                      </p>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col col-card-alumni-val">
                                      <p id="modal-profile-level">
                                        <?php echo $record['BIO'] ?>
                                      </p>
                                    </div>
                                  </div>
                              </div>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-center">
                              <div class="body-alumni-card-modal">
                                <div class="row d-grid justify-content-center align-items-center" id="bot-row-modal-alumni-header" style="border: 1px dashed;">
                                  <h2 class="text-center">Academic Background</h1>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col">
                                    <p class="h4 text-end">Course</p>
                                  </div>
                                  :
                                  <div class="col">
                                    <p class="h4" id="modal-profile-course">Computer Science</p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col">
                                    <p class="h4 text-end">Major</p>
                                  </div>
                                  :
                                  <div class="col">
                                    <p class="h4" id="modal-profile-major">
                                      <?php echo $record['DEPT'] ?>
                                    </p>
                                  </div>
                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col text-center">
                                    <p class="h4" id="modal-profile-batch">
                                      <?php echo 'Batch of ' . $record['ENROL_YEAR'] ?>
                                    </p>
                                  </div>
                                  <div class="col text-center">
                                    <p class="h4" id="modal-profile-gradYear">
                                      <?php echo 'Graduation Year: ' . $record['GRAD_YEAR'] ?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-4 d-flex justify-content-center">
                              <div class="body-alumni-card-modal">
                                <div class="row d-grid justify-content-center align-items-center" id="bot-row-modal-alumni-header" style="border: 1px dashed;">
                                  <h2 class="text-center">Contact Details</h1>
                                </div>
                                <?php
                                if ($record['LINKEDIN_ID'] != '') {
                                    ?>
                                  <hr>
                                  <div class="row">
                                    <div class="col">
                                    <p class="h6"><a id="linkedin1" href="<?php echo $record['LINKEDIN_ID']; ?>" target="_blank" style="color: inherit;"><img src="img/linkedin_color.png" alt="LinkedIn" id="bio-icons-prof"><?php echo $record['LINKEDIN_ID']; ?></a></p>
                                    </div>
                                  </div>
                                <?php
                                } ?>
                                <?php
                                if ($record['GITHUB_ID'] != '') {
                                    ?>
                                  <div class="row">
                                    <div class="col">
                                    <p class="h6"><a id="github1" href="<?php echo $record['GITHUB_ID']; ?>" target="_blank" style="color: inherit;"><img src="img/github_black.png" alt="Github" id="bio-icons-prof"><?php echo $record['GITHUB_ID']; ?></a></p>
                                    </div>
                                  </div>
                                <?php
                                } ?>
                                <?php
                                if ($record['GITHUB_ID'] == '' && $record['LINKEDIN_ID'] == '') {
                                    ?>
                                  <hr>
                                  <div class="row">
                                    <div class="col">
                                      <p class="h5"><?php echo $record['FULL_NAME'] ?> has not provided any public contact information!</p>
                                    </div>
                                  </div>
                                <?php
                                } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Profile Card -->


                        <div class="container mt-4 shadow-lg" id="bottom-box">

                          <h3 id="exp-alumni-modal">Experience and Recent Project</h3>
                          <div style="overflow-x:auto">
                            <table class="content-table" id="modal-table-alumni">
                              <colgroup>
                                <col span="1" style="width: 20%;">
                                <col span="1" style="width: 20%;">
                                <col span="1" style="width: 21%;">
                                <col span="1" style="width: 31%;">
                                <col span="1" style="width: 8%;">
                              </colgroup>
                              <thead>
                                <tr>
                                  <th>Company / Instituition</th>
                                  <th>Work / Activity</th>
                                  <th>Position</th>
                                  <th>Description</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                include("php/db_connect.php");
                                $experiencequery = "SELECT * FROM experience WHERE ALUMNI_ID = " . $record['ALUMNI_ID'];
                                $experienceset = mysqli_query($conn, $experiencequery) or die("database error: " . mysqli_error($conn));
                                while ($experience = mysqli_fetch_assoc($experienceset)) {
                                    ?>
                                  <tr>
                                    <td><?php echo $experience['COMPANY'] ?></td>
                                    <td><?php echo $experience['WORK_TITLE'] ?></td>
                                    <td><?php echo $experience['POSITION'] ?></td>
                                    <td><?php echo $experience['DESCRIPTION'] ?></td>
                                    <td></td>
                                  </tr>
                                <?php } ?>



                              </tbody>
                            </table>
                          </div>
                        </div>

                        <div class="container modal-container-alumni">
                          <div class="d-flex gap-2 justify-content-center">
                            <!-- <button class="btn btn-admin green shadow admin-profile-btn" data-bs-dismiss="modal" style="color: black;">Update Profile</button> -->
                            <button class="btn btn-admin yellow shadow" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="modal fade alumni-modal" id="alumni-delete-modal-<?php echo $record['ALUMNI_ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div id="modal-content-admin-alumni" class="modal-content shadow">

                    <!-- Modal Header -->
                    <div class="modal-header mb-3">
                      <h4 class="modal-title" id="modal-title" style="color: black;">Delete Alumni Profile</h4>
                    </div>
                    <!--  -->

                    <div class="container modal-container-alumni">
                      
                      <div id ="delete-modal" style="display: block">
                        <p class="lead">Are you sure you want to delete <?php echo $record['FULL_NAME']."?";?>'s profile?</p>
                        <div class="d-flex gap-2 justify-content-center">
                          <form method="GET">
                            <button type="submit" name="deleteProfile" value="<?php echo $record['ALUMNI_ID']?>" class="btn btn-admin red shadow admin-profile-btn">Delete Profile</button>
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
  </div>
  </div>
  </div>

  </main>

  <?php include_once("php/footer.php") ?>
  </div>

  <?php include_once("php/scripts.php") ?>
</body>

</html>
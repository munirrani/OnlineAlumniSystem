<!DOCTYPE html>
<html lang="en">

<head>
<?php include_once("php/head.php");

if (!isset($_SESSION["admin"])) {
    header("location: index.php");
}

?>
  <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
  <title>Admin Alumni Profiles | FSKTM Alumni</title>
</head>

<body>
  <div class="container-fluid p-0 m-0">
  <?php include_once("php/admin_heading.php") ?>

    <main>

      <div id="home-container" class="container-fluid">
        <div class="container mb-3">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="breadcrumb-background">
            <ol class="breadcrumb">
              <li class="breadcrumb-item breadcrumb-admin"> <a href="admindash.php">Admin-Dashboard</a></li>
              <li class="breadcrumb-item breadcrumb-admin"> <a href="admin-profile-dash.php">Profiles Dashboard</a></li>
              <li class="breadcrumb-item breadcrumb-admin-current active" aria-current="page">/Pending Profiles</li>
            </ol>
          </nav>
        </div>
        
        <div class="row justify-content-center">
          <h1 class="display-4" id="alumni-search-heading">PENDING ALUMNI PROFILES</h1>
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

            if (isset($_GET["approveProfile"])) {
              $alumni_id = $_GET["approveProfile"];
              $sql = "UPDATE alumni SET REG_STATUS='Active' WHERE ALUMNI_ID=$alumni_id";
              $result = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
            } else if (isset($_GET["rejectProfile"])) {
              $alumni_id = $_GET["rejectProfile"];
              $sql = "UPDATE alumni SET REG_STATUS='Rejected' WHERE ALUMNI_ID='$alumni_id'";
              $result = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
            }

            $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, LEVEL, ALUMNI_IMG FROM alumni WHERE REG_STATUS = 'Pending' ORDER BY FULL_NAME";
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
              $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, LEVEL, ALUMNI_IMG FROM alumni WHERE (FULL_NAME LIKE '%$str%' OR DEPT LIKE '%$str%' OR LEVEL LIKE '%$str%') AND REG_STATUS='Pending' ORDER BY FULL_NAME";
              $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
            } else {
              $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, LEVEL, ALUMNI_IMG FROM alumni WHERE REG_STATUS = 'Pending' ORDER BY FULL_NAME LIMIT " . $starting_limit_number . "," . $result_per_page;
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
                      <!-- <button type="button" class="btn shadow alumni-card-view-profile-button" data-bs-toggle="modal" data-bs-target="#alumni-modal-<?php echo $record['ALUMNI_ID']; ?>">View Alumni Profile</button> -->
                      <button type="button" class="btn shadow btn-admin green" data-bs-toggle="modal" data-bs-target="#approve-modal-<?php echo $record['ALUMNI_ID']; ?>"><i class="fa fa-check"></i> Approve</button>
                      <button type="button" class="btn shadow btn-admin red" data-bs-toggle="modal" data-bs-target="#reject-modal-<?php echo $record['ALUMNI_ID']; ?>"><i class="fa fa-close"></i> Reject</button>
                    </div>
                  </div>
                </div>
              </li>

              <!-- Modal Starts -->
              <div class="modal fade alumni-modal" id="approve-modal-<?php echo $record['ALUMNI_ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div id="modal-content-admin-alumni" class="modal-content shadow">

                    <!-- Modal Header -->
                    <div class="modal-header mb-3">
                        <h4 class="modal-title" id="modal-title" style="color: black;">Pending Alumni Registration</h4>
                    </div>  
                    <!--  -->

                    <div class="container modal-container-alumni">

                      <div id="approve-modal" style="display: block">
                        <p class="lead">Are you sure you would like to approve the alumni profile of <?php echo $record['FULL_NAME']."?";?></p>
                        <div class="d-flex gap-2 justify-content-center">
                          <form method="GET">
                            <button type="submit" name="approveProfile" value="<?php echo $record['ALUMNI_ID']?>" class="btn btn-admin green shadow admin-profile-btn">Approve Profile</button>
                          </form>
                          <button class="btn btn-admin yellow shadow admin-profile-btn" data-bs-dismiss="modal">Cancel</button>
                        </div>
                      </div>         
                    </div>

                  </div>
                </div>
              </div>

              <div class="modal fade alumni-modal" id="reject-modal-<?php echo $record['ALUMNI_ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div id="modal-content-admin-alumni" class="modal-content shadow">

                    <!-- Modal Header -->
                    <div class="modal-header mb-3">
                        <h4 class="modal-title" id="modal-title" style="color: black;">Pending Alumni Registration</h4>
                    </div>  
                    <!--  -->

                    <div class="container modal-container-alumni">

                      <div id="reject-modal" style="display: block">
                        <p class="lead">Are you sure you would like to reject the alumni profile of <?php echo $record['FULL_NAME']."?";?></p>
                        <div class="d-flex gap-2 justify-content-center">
                          <form method="GET">
                            <button type="submit" name="rejectProfile" value="<?php echo $record['ALUMNI_ID']?>" class="btn btn-admin red shadow admin-profile-btn">Reject Profile</button>
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
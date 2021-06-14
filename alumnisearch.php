<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("php/head.php") ?>

  <?PHP

  if (!isset($_SESSION["userid"])) {
    header("location: index.php");
  }

  ?>
  <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
  <title>Alumni Search | FSKTM Alumni</title>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <?php include_once("php/heading.php") ?>
    <main>
      <div id="home-container" class="container-fluid">

        <div class="row justify-content-center">
          <h1 class="display-4" id="alumni-search-heading">SEARCH ALUMNI PROFILES</h1>
        </div>

        <div class="row justify-content-center">
          <div class="col-12 col-md-10 col-lg-8">
            <form class="card card-sm alumni-search-form" method="GET">
              <div class="card-body row no-gutters align-items-center">
                <div class="col">
                  <input id="alumni-search-bar" class="form-control form-control-lg form-control-borderless" name="search" type="search" placeholder="Search alumni profiles (Name / Department / Level of Study)">
                </div>
                <!--end of col-->
                <div class="col-1">
                  <button type="submit" name="submit" class="jumbotron-button"><i><img src="img/search_black_24dp.svg" alt=""></i></button>
                </div>
              </div>
            </form>
          </div>
          <!--end of col-->
        </div>

        <div class="row">
          <ul id="alumniList" class="the-alumni-cards ">


            <?php
            include_once("php/db_connect.php");
            $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, EMAIL, LEVEL, ALUMNI_IMG FROM alumni WHERE REG_STATUS = 'Active' ORDER BY FULL_NAME";
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
              $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, EMAIL, LEVEL, ALUMNI_IMG FROM alumni WHERE FULL_NAME LIKE '%$str%' OR DEPT LIKE '%$str%' OR LEVEL LIKE '%$str%'";
              $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
              showCard($resultset);
            } else {
              $sql = "SELECT ALUMNI_ID, FULL_NAME, DEPT, ENROL_YEAR, GRAD_YEAR, EMAIL, LEVEL, ALUMNI_IMG FROM alumni WHERE REG_STATUS = 'Active' ORDER BY FULL_NAME LIMIT " . $starting_limit_number . "," . $result_per_page;
              $resultset = mysqli_query($conn, $sql) or die("database error: " . mysqli_error($conn));
              showCard($resultset);
            }




            function showCard($resultset)
            {
              while ($record = mysqli_fetch_assoc($resultset)) {
            ?>
                <li>
                  <div class="contact-box center-version shadow-lg">
                    <div class="body-alumni-card">
                      <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($record['ALUMNI_IMG']) . '" class="img-circle"/>'; ?>
                      <h1 class="m-b-xs profile-card-name"><?php echo $record['FULL_NAME'] ?></h1>
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
                      <div class="row">
                        <div class="col col-card-alumni-val">
                          <p class="lead"><?php echo $record['EMAIL'] ?></p>
                        </div>
                      </div>
                      <div class="alumni-card-footer mt-1 mx-2 mb-3">
                        <button type="button" class="btn shadow alumni-card-view-profile-button" data-bs-toggle="modal" data-bs-target="#alumni-modal-<?php echo $record['ALUMNI_ID']; ?>">View Alumni Profile</button>
                      </div>
                    </div>
                  </div>
                </li>

                <!-- Modal Starts -->
                <div class="modal fade alumni-modal" id="alumni-modal-<?php echo $record['ALUMNI_ID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div id="modal-content-alumni" class="modal-content shadow">

                      <!-- Modal Header -->
                      <div class="modal-header mb-3">
                        <h4 class="modal-title" id="modal-title">Alumni Profile</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <!--  -->


                      <div class="container modal-container-alumni">
                        <div class="row justify-content-center">

                          <!-- Profile Card -->
                          <div class="col-auto col-left-modal-alumni justify-content-center">
                            <div class="contact-box center-version shadow">
                              <div class="body-alumni-card-modal">
                                <img alt="image" id="modal-profile-img" <?php echo 'src=data:image/jpeg;base64,' . base64_encode($record['ALUMNI_IMG']); ?>>
                                <h1 id="modal-profile-name" class="m-b-xs profile-card-name mt-3" style="text-align: center;">
                                  <?php echo $record['FULL_NAME'] ?>
                                </h1>
                                <h4 id="modal-profile-dept" class="card-department-alumni pb-1">
                                  <?php echo $record['DEPT'] ?>
                                </h4>
                                <div class="prof-icon-modal d-flex justify-content-center" id="social-prof-icon">

                                </div>
                                <hr>
                                <div class="row">
                                  <div class="col col-card-alumni-val">
                                    <p id="modal-profile-level" class="lead">
                                      <?php echo $record['LEVEL'] ?>
                                    </p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col col-card-alumni-val">
                                    <p id="modal-profile-mail" class="lead">
                                      <?php echo $record['EMAIL'] ?>
                                    </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Profile Card -->


                          <!-- Right Col -->
                          <div class="col-lg d-grid justify-content-center" id="right-col-alumni-modal">



                            <!-- Bot Row -->
                            <div class="row contact-box d-flex" id="bot-row-modal-alumni">
                              <div class="row" id="bot-row-modal-alumni-header">
                                <h1 class="display-6 text-center">Academic Background</h1>
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
                            <!-- Bot Row -->

                          </div>
                          <!-- Right Col -->
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
                                      <td><?php echo $experience['DESC'] ?></td>
                                      <td></td>
                                    </tr>
                                  <?php } ?>



                                </tbody>
                              </table>
                            </div>
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
              echo '<a href="alumnisearch.php?page=' . $page . '"class="col page-nav-alumni page-nav-text">' . $page . '</a>';
            }
            ?>
          </div>
        </div>

      <?php } ?>


      <!-- Pagination -->





      </div>

    </main>

    <?php include_once("php/footer.php") ?>
  </div>

  <?php include_once("php/scripts.php") ?>
</body>

</html>
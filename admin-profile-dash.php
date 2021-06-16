<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("php/head.php");

  if (!isset($_SESSION["admin"])) {
    header("location: index.php");
  }

  ?>
  <?PHP

  if (!isset($_SESSION["userid"])) {
    header("location: index.php");
  }

  ?>
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
    <?php include_once("php/admin_heading.php") ?>



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



  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <!-- <script type="text/javascript" src="js/main.js"></script> -->
  <script>
    // The navbar profile dropdown
    function myFunction() {
      myDropdown.classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
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
  </script>
</body>

</html>
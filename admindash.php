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
  <title>Admin Dashboard | FSKTM Alumni</title>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <?php include_once("php/admin_heading.php") ?>



    <main>
      <div class="container">
        <div class="row justify-content-center">
          <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="breadcrumb-background">
            <ol class="breadcrumb">
              <li class="breadcrumb-item breadcrumb-admin-current active">/Admin-Dashboard</li>
              <!-- <li class="breadcrumb-item breadcrumb-admin active" aria-current="page">Library</li> -->
            </ol>
          </nav>
          <h1 class="display-5" id="alumni-search-heading">Welcome Admin! What would you like to do today?</h1>
        </div>
        <div class="row align-items-center justify-content-center">
          <div class="col-lg">
            <div class="jumbotron-admin-profile admin-welcome-cards d-flex justify-content-center align-items-center">
              <a href="admin-profile-dash.php"><button class="btn btn-lg btn-admin shadow">Manage Profiles</button></a>
            </div>
          </div>
          <div class="col-lg">
            <div class="jumbotron-admin-event admin-welcome-cards d-flex justify-content-center align-items-center">
              <a href="event_admin.php"><button class="btn btn-lg btn-admin shadow">Manage Events</button></a>
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
    // document.querySelector("#dropdown-username").innerHTML = `Signed in as <strong>Admin</strong>`;


    let dropdowns = document.querySelector(".dropdown-content");
    let myDropdown = document.querySelector("#myDropdown");

    function myFunction() {
      myDropdown.classList.add("show");
    }

    window.onclick = function(event) {
      if (!event.target.matches(".dropbtn")) {
        dropdowns.classList.remove("show");
      }
    };

    // let logoutbutton = document.querySelector("#logoutbutton");
    // // when clicking the logout button it will set loggedin to false and sent user to homepage
    // logoutbutton.onclick = function() {
    //   let loggedin = false;
    //   sessionStorage.setItem("loggedin", loggedin);
    //   window.location.href = "index.html";
    // };
    //
  </script>
</body>

</html>
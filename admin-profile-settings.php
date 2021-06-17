<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("php/head.php");

  if (!isset($_SESSION["admin"])) {
    header("location: index.php");
  }

  ?>
  <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
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
  <title>Admin Settings | FSKTM Alumni</title>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <?php include_once("php/admin_heading.php"); ?>
    <?php
    include_once("php/db_connect.php");
    $admin_id = $_SESSION["userid"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE ADMIN_ID = $admin_id");
    while ($res = mysqli_fetch_array($result)) {
      $username = $res['ADMIN_USERNAME'];
      $password = $res['PASSWORD'];
    }

    if (isset($_POST['chgUsername'])) {
      $username = mysqli_real_escape_string($conn, $_POST['username']);
      $result = mysqli_query($conn, "UPDATE admin SET ADMIN_USERNAME='$username' WHERE ADMIN_ID='$admin_id'");
    }
    if (isset($_POST['chgPassword'])) {
      $curpassword = mysqli_real_escape_string($conn, $_POST['password']);
      if (!password_verify($curpassword, $password)) {
        //echo "Your current password did not match!";
        echo "<script>window.location.href = 'admin-profile-settings.php?error=incorectpass';</script>";
        exit();
      }
      $newpassword1 = mysqli_real_escape_string($conn, $_POST['password1']);
      $newpassword2 = mysqli_real_escape_string($conn, $_POST['password2']);
      if ($newpassword1 != $newpassword2) {
        //echo ("Oops! Password did not match! Try again. ");
        echo "<script>window.location.href = 'admin-profile-settings.php?error=mismatchpass';</script>";
        exit();
      }
      if (password_verify($curpassword, $password) && ($newpassword1 == $newpassword2)) {
        $newpassword = password_hash($newpassword2, PASSWORD_DEFAULT);
        $result = mysqli_query($conn, "UPDATE admin SET PASSWORD='$newpassword' WHERE ADMIN_ID='$admin_id'");
      }
    }
    mysqli_close($conn);

    ?>

    <main>
      <div class="container mt-3">
        <ul class="nav nav-tabs">
          <li id="inactive" class="nav-item">
            <a id="profileNav-inactive" class="nav-link active" aria-current="page" href="admin-profile-settings.html">Settings & Privacy</a>
          </li>
        </ul>
      </div>

      <div class="container" style="margin-top: 20px;">
        <div class="main-body">
          <div id="round-corner-left" class="row gutters-sm shadow-lg">
            <div class="col-md-4 mb-3">
              <div class="card-body mt-3">
                <div class="d-flex flex-column align-items-center text-center">
                  <a href="profile.html"><img src="img/icon.jpg" alt="Admin" id="profileImg" class="shadow"></a>
                  <div class="mt-3">
                    <h2 class="profile-name" id="userName-admin"><?php echo $username; ?></h2>
                    <div class="container">
                      <div class="container">
                        <p id="bio-admin" style="color: #f3f3f3;">Admin Profile</p>
                      </div>
                    </div>
                    <div class="container">
                      <div class="container">
                        <hr class="profileBio-line">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="right-col" class="col-md-8">
              <div id="right-col" class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <h2 id="profile-heading">SETTINGS AND PRIVACY</h2>
                  </div>
                  <div class="row">
                    <h5 class="mb-0" style="font-weight: bold;">Change username</h5>
                  </div>
                  <hr>
                  <button type="button" class="collapsible">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0" style="font-weight: bold">Username</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <h6 class="mb-0" id="userName2"><?php echo $username ?></h6>
                      </div>
                    </div>
                  </button>
                  <div class="content mb-35">
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <label for="userName">
                          <h6 class="mt-2 mb-4">New username</h6>
                        </label>
                      </div>
                      <div class="col-sm-9 text-secondary mt-2 mb-4">
                        <form method="POST" action="admin-profile-settings.php">
                          <input name="username" type="text" class="form-control purplemodalinput" id="userName" required>
                          <button name="chgUsername" class="btn confirmbuttonModalSetting" type="submit" style="margin-top: 15px">
                            Confirm username</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <h5 class="mb-0" style="font-weight: bold;">Change password</h5>
                  </div>
                  <hr>
                  <button type="button" class="collapsible" id="collapsePass">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0" style="font-weight: bold">Password</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        <h6 class="mb-0" style="font-weight: bolder;">. . . . . . . . . .</h6>
                      </div>
                    </div>
                  </button>
                  <div class="content mb-35">
                    <hr>
                    <form action="admin-profile-settings.php" method="POST">
                      <div class="row">
                        <div class="col-sm-3">
                          <label for="currentPass">
                            <h6 class="mt-2 mb-4">Current password</h6>
                          </label>
                        </div>
                        <div class="col-sm-9 text-secondary mt-2 mb-2">
                          <input name="password" type="password" class="form-control" placeholder="" required />
                        </div>
                        <div class="col-sm-3">
                          <label for="newPassModal">
                            <h6 class="mt-2 mb-2">New password</h6>
                          </label>
                        </div>
                        <div class="col-sm-9 text-secondary mt-2 mb-2">
                          <input id="password" type="password" class="form-control" name="password1" required />
                        </div>
                        <div class="col-sm-3">
                          <label for="newPassConfirmModal">
                            <h6 class="mt-2 mb-4">Re-enter password</h6>
                          </label>
                        </div>
                        <div class="col-sm-9 text-secondary mt-2 mb-4">
                          <input id="confirmpw" type="password" class="form-control" name="password2" required />
                          <button name="chgPassword" class="btn confirmbuttonModalSetting" type="submit" style="margin-top: 15px;">Confirm password</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="row">
                    <h5 class="mb-0" style="font-weight: bold;">Delete account</h5>
                  </div>
                  <hr>
                  <div class="row">
                    <h6 style="margin-bottom: 20px;">Please be certain before you delete your
                      account. </h6>
                  </div>
                  <button type="button" class="btn shadow confirmbuttonModalSetting" style="margin-bottom: 20px;" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Delete your
                    account</button>

                  <form action="php/logoutadmin.php?alumni_id=<?php echo $admin_id ?>" autocomplete="off" method="POST">
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete account?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <div id="deleteAcc" class="alert">
                                <span class="closebtn"></span>
                                <strong>Warning!</strong> Your account may be deleted.
                                <br>You could lose all your account data.
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="usernameModalSettings" class="col-form-label">Your username or email:</label>
                              <input name="username" type="text" class="form-control purplemodalinput" id="usernameModalSettings" required>
                            </div>
                            <div class="mb-3">
                              <label for="verifydelete" class="col-form-label">To verify, type <i>delete my account</i> below:</label>
                              <input type="text" class="form-control purplemodalinput" id="verifydelete" pattern="delete my account" required>
                            </div>
                            <div class="mb-3">
                              <label for="passwordModalSettings" class="col-form-label">Confirm your password:</label>
                              <input name="password" type="password" class="form-control purplemodalinput" id="passwordModalSettings" required>
                            </div>
                            <div class="modal-footer">
                              <button type="button" id="cancelbuttonmodal" class="btn confirmbuttonModalSetting" data-bs-dismiss="modal">Cancel</button>
                              <button name="delAcc" type="submit" class="btn confirmbuttonModalSetting">Delete this account</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                  <div class="modal fade" id="modal-warning" tabindex="-1" aria-labelledby="warning" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header" style="text-align: center;">
                          <h5 class="modal-title">Warning!</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center" style="font-weight: 800;">
                          <?php
                            if ($_GET["error"] == "incorectpass") {
                              echo "Please enter the correct password";
                            } 
                            else if ($_GET["error"] == "mismatchpass") {
                              echo "There was a password mismatch. Please retype your password";
                            } 
                          ?>
                        </div>
                        <div class="modal-footer">
                          <button type="button" id="login-warning-modal-button" class="btn" data-bs-dismiss="modal">Okay</button>
                          <!-- <button type="button" class="btn btn-primary btn-danger">Okay</button> -->
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
    </main>
  </div>
  <footer class="page-footer shadow-lg">
    <div class="footer-copyright text-center py-3" style="background-color: #f3f3f3; font-weight: 800;">
      <p>Copyright &copy; FSKTM 2021</p>
    </div>
  </footer>


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

    // Collapsible part of the Profile Page
    var coll = document.getElementsByClassName("collapsible");
    var i;
    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.maxHeight) {
          content.style.maxHeight = null;
        } else {
          content.style.maxHeight = content.scrollHeight + "px";
        }
      });
    }
    
    //
  </script>
  <?php
    if (isset($_GET["error"])) {
      echo "<script type='text/javascript'>
            $(document).ready(function(){
            $('#modal-warning').modal('show');
            });
            </script>";
    }
    ?>
</body>

</html>
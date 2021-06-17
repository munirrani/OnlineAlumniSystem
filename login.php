<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("php/head.php");

  if (isset($_SESSION["admin"])) {
    header("location: admindash.php");
  }

  ?>
  <?PHP

  if (isset($_SESSION["userid"])) {
    header("location: index.php");
  }


  ?>
  <title>Login | FSKTM Alumni</title>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <?php include_once("php/heading.php") ?>

    <main>

      <div class="login">
        <form class="form-signin shadow-lg" action="php/login.inc.php" method="POST">
          <h1 class="form-signin-heading">LOGIN</h1>
          <input id="usernameloginpage" type="text" class="form-control mb-4 shadow" name="userOrEmail" placeholder="Username or Email" required autofocus="" />
          <input id="usernamepwpage" type="password" class="form-control shadow" name="password" placeholder="Password" required />
          <select class="form-control form-select shadow" id="userperm" name="userperm" required>
            <option value="Role" hidden="" selected>Role</option>
            <option value="alumni">Alumni</option>
            <option value="admin">Admin</option>
          </select>

          <div class="bottom-log">
          
            <label class="checkbox">
              <input type="checkbox" id="rememberme" name="rememberMe" value="remember"> Remember me
            </label>
            <p class="message mt-0 mb-2">Forgot your password? <a href="reset-password.php">Click here</a></p>
            <button class="submitlog" type="submit" name="submit">Login</button>
            <p class="message">Not registered? <a href="register.php">Create an account</a></p>
          </div>
        </form>
      </div>
      </form>



      <div class="modal fade" id="login-modal-warning" tabindex="-1" aria-labelledby="warning" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
              <h5 class="modal-title">Warning!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" style="font-weight: 800;">
              <?php
                if ($_GET["error"] == "emptyinput") {
                  echo "Please enter Username and Password!";
                } 
                else if ($_GET["error"] == "chooserole") {
                  echo "Please Choose a Role!";
                } 
                else if ($_GET["error"] == "usernamedoesntexists") {
                  echo "Please enter the correct login info!";
                } 
                else if ($_GET["error"] == "passwordWrong") {
                  echo "Please enter the correct password!";
                } 
                else if ($_GET["error"] == "pendingstatus") {
                  echo "Your account is still being processed by the Admin.";
                } 
                else if ($_GET["error"] == "rejectedstatus") {
                  echo "Your account is unfortunately rejected by the Admin, If you have any inquiry please contact us.";
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

      <div class="modal fade" id="login-modal-warning2" tabindex="-1" aria-labelledby="warning" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
              <h5 class="modal-title">Warning!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" style="font-weight: 800;">
              <?php
                if ($_GET["reset"] == "success") {
                  echo "Check your e-mail!";
                }
                else if ($_GET["newpwd"] == "passwordupdated") {
                  echo "Your new password has been updated, you may now use your new password for login";
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

      <div class="modal fade" id="login-modal-warning3" tabindex="-1" aria-labelledby="warning" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="text-align: center;">
              <h5 class="modal-title">Warning!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" style="font-weight: 800;">
              <?php

                if ($_GET["newpwd"] == "passwordupdated") {
                  echo "Your new password has been updated, you may now use your new password for login";
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
  </main>

  <?php include_once("php/footer.php") ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/main.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
  <?php
  if (isset($_GET["error"])) {
    echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#login-modal-warning').modal('show');
          });
          </script>";
  }
  if (isset($_GET["reset"])) {
    echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#login-modal-warning2').modal('show');
          });
          </script>";
  }
  if (isset($_GET["newpwd"])) {
    echo "<script type='text/javascript'>
          $(document).ready(function(){
          $('#login-modal-warning3').modal('show');
          });
          </script>";
  }

  ?>
</body>

</html>
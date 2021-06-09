<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="icon" href="img/logo_um_without_text.png" type="image/png" />
  <script src="https://kit.fontawesome.com/d4305da033.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/map.js"></script>
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
              <input type="checkbox" id="rememberme" name="rememberMe"> Remember me
            </label>
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
              } else if ($_GET["error"] == "chooserole") {
                echo "Please Choose a Role!";
              } else if ($_GET["error"] == "usernameexists") {
                echo "Please enter the correct login info!";
              } else if ($_GET["error"] == "passwordWrong") {
                echo "Please enter the correct password!";
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
  ?>
</body>

</html>
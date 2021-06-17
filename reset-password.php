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
  <title>Reset Password | FSKTM Alumni</title>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <?php include_once("php/heading.php") ?>

    <main>

      <div class="login">
        <form class="form-signin shadow-lg" action="php/reset-request.inc.php" method="POST">
          <h1 class="form-signin-heading">Reset Your Password</h1>
          <p class="mb-4" style="text-align: center;">An e-mail will be send to you with instructions on how to reset your password.</p>
          <input id="usernameloginpage" type="text" class="form-control mb-4 shadow" required name="email" placeholder="Enter your email address" required autofocus="" />
          <div class="bottom-log">
            <button class="resetpw" type="submit" name="reset-request-submit">Receive new password by e-mail</button>
            <p class="message">Not registered? <a href="register.php">Create an account</a></p>
          </div>
        </form>
      </div>
      </form>


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
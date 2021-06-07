<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("php/head.php") ?>

  <link rel="stylesheet" href="css/event.css">

  <title>Login | FSKTM Alumni</title>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <?php include_once("php/heading.php") ?>

    <main>

      <div class="login">
        <form class="form-signin shadow-lg" id="submitloggin" action="">
          <h1 class="form-signin-heading">LOGIN</h1>
          <input id="usernameloginpage" type="text" class="form-control mb-4 shadow" name="username" placeholder="Username or Matric ID" required="Username is required!" autofocus="" />
          <input id="usernamepwpage" type="password" class="form-control shadow" name="password" placeholder="Password" required="Password is required!" />
          <select class="form-control form-select shadow" id="userperm" required>
            <option disabled="" hidden="" selected>Role</option>
            <option value="alumni">Alumni</option>
            <option value="admin">Admin</option>
          </select>

          <div class="bottom-log">
            <label class="checkbox">
              <input type="checkbox" id="rememberme" name="rememberMe"> Remember me
            </label>
            <button class="submitlog" type="submit">Login</button>
            <p class="message">Not registered? <a href="register.html">Create an account</a></p>
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
              Please Choose a Role!
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

  <?php include_once("php/footer.php")?>
  </div>

  <?php include_once("php/scripts.php")?>
  <script type="text/javascript" src="js/login.js"></script>
</body>

</html>
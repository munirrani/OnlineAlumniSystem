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
    $selector = $_GET["selector"];
    $validator = $_GET["validator"];


    ?>
    <title>Create New Password| FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php") ?>

        <main>

            <div class="login">

                <?PHP
                if (empty($selector) || empty($validator)) {
                    echo "Could not validate your request!";
                } else {
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
                ?>
                        <form class="form-signin shadow-lg" action="php/reset-password.inc.php" method="POST">
                            <!-- <h1 class="form-signin-heading">Reset Your Password</h1>
                            <p class="message">An e-mail will be send to you with instructions on how to reset your password.</p> -->
                            <input type="hidden" name="selector" value="<?php echo $selector ?>">
                            <input type="hidden" name="validator" value="<?php echo $validator ?>">
                            <input type="password" name="pwd" value="" required placeholder="Enter a new password...">
                            <input type="password" name="pwd-repeat" value="" required placeholder="Repeat new password...">
                            <div class="bottom-log">
                                <button class="submitlog" type="submit" name="reset-password-submit">Reset Password</button>
                            </div>
                        </form>
                <?php
                    }
                }
                ?>
            </div>



    </div>
    </main>

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
                        echo "Empty Input!";
                    }
                    if ($_GET["error"] == "passwordnotequal") {
                        echo "PASSWORD NOT EQUAL!";
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
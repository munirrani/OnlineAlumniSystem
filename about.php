<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("php/head.php");

  if (isset($_SESSION["admin"])) {
    header("location: admindash.php");
  }

  ?>
  <title>About | FSKTM Alumni</title>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <?php include_once("php/heading.php") ?>

    <main>
      <div id="home-container" class="container-fluid">
        <div class="jumbotron-news shadow">
          <h2 class="display-5" style="text-align: center">ABOUT US</h2>
          <br />
          <div class="row featurette align-items-center justify-content-center">
            <div class="col-md-9 announcement-sec order-2 order-md-1">
              <img class="featurette-image news-img img-fluid mx-auto shadow-lg" src="img/fsktm.jpg" alt="" height="110%" width="110%" />
            </div>
          </div>
          <div class="row featurette align-items-center mt-5 justify-content-center">
            <div class="col-md-9 announcement-sec order-1 order-md-2">
              <h2 class="featurette-heading display-7 mb-5" style="text-align: center">
                Faculty of Computer Science & Information Technology Alumni
                Department
              </h2>
              <p class="lead">
                Formed in 1965, the Faculty of Computer Science & Information
                Technology made the university one of the pioneers in computer
                usage in Malaysia. Since its establishment, the Faculty of
                Computer Science and Information Technology has been led by a
                number of distinguished persons.
              </p>
              <p class="lead">
                The FSKTM Alumni Department was formed in 2020, to help and
                facilitate various alumni elements. This would allow alumnus
                to have formal reunion sessions, help them search new job
                opportunities as well as provide them with fun interactive
                events in which they could be a part of.
              </p>
              <p class="lead">
                You can register for an account if you have completed your
                Bachelor's, Master's or PhD program in FSKTM. We welcome you
                to our beautiful alumni portal for all your alumni needs!
              </p>
              <p class="lead">
                For more information feel free to contact
                <strong> +60 12-345 6789 </strong> or email us at
                <strong><a href="mailto:fsktmalumnisys@gmail.com" class="about-mail">
                    fsktmalumnisys@gmail.com</a></strong>
              </p>
              <br />
            </div>
          </div>
          <hr class="featurette-divider" />
        </div>
      </div>
    </main>

    <?php include_once("php/footer.php") ?>
  </div>

  <?php include_once("php/scripts.php") ?>
</body>

</html>
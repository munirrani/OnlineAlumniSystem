<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>

    <link rel="stylesheet" href="css/event.css">

    <title>Home | FSKTM Alumni</title>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php")?>

        <main>
            <div id="home-container" class="container-fluid">
                <!--First welcome jumbotron on home page-->
                <div class="jumbotron-main shadow">
                    <div class="row">
                        <div class="col">
                            <h2 class="display-6">Welcome to the FSKTM Alumni Portal. A place to connect and interact
                                with other alumnus!</h2>
                            <br>
                            <p class="lead">This is where you can find updated information about alumni events, find new
                                job opportunities and
                                even connect with other alumnus from FSKTM.</p>
                            <hr class="my-4">
                            <p class="lead">Don't forget to register for an account to better utilise the opportunities
                                of this
                                website!</p>
                            <br>
                            <p class="lead">
                            <div class="d-flex gap-2">
                                <a id="main-jumbotron-register" class="btn jumbotron-button btn-lg" href="register.html"
                                    role="button">Register
                                    Now!</a>
                                <a class="btn jumbotron-button btn-lg" href="about.html" role="button">Learn more</a>
                            </div>
                            </p>
                        </div>
                        <div id="jumbo-col" class="col"></div>
                    </div>
                </div>
                <hr class="featurette-divider">

                <!--Recent events jumbotron on home page-->
                <div class="jumbotron-events shadow">
                    <h2 class="display-5" style="text-align: center;">UPCOMING EVENTS</h2>
                    <br>
                    <div class="row">
                        <div class="col-lg-3 d-flex align-items-stretch event-card">
                            <div class="card">
                                <a href="event.php"><img src="img/hackathon.png" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h4 class="card-title">FSKTM Annual Hackathon 2021</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">30th April 2021</h6>
                                    <p class="card-text">Our annual FSKTM Hackathon now has an alumni category. Hope to
                                        see you there. Learn more about the event by clicking
                                        the link below!
                                    </p>
                                    <p class="event-info">
                                        <a href="event.php" class="card-link">Learn More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex align-items-stretch event-card">
                            <div class="card">
                                <a href="#"><img src="img/MyTech.jpg" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h4 class="card-title">MyTech Career Fair 2021</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">18th May 2021</h6>
                                    <p class="card-text">Join the MyTech Career Fair 2021 and get amazing job
                                        opportunities in Malaysia. Learn more about the event by clicking the link
                                        below.
                                    </p>
                                    <p class="event-info">
                                        <a href="#" class="card-link">Learn More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex align-items-stretch event-card">
                            <div class="card">
                                <a href="#"><img src="img/alumni_reunion.jpg" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h4 class="card-title">Reunion Session</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">30th May 2021</h6>
                                    <p class="card-text">Fancy meeting some of your old batch mates? Join us for the
                                        reunion event at our faculty.
                                        Learn more about the event by cliking the link below.
                                    </p>
                                    <p class="event-info">
                                        <a href="#" class="card-link">Learn More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex align-items-stretch event-card">
                            <div class="card">
                                <a href="#"><img src="img/sports_event.png" class="card-img-top" alt="..."></a>
                                <div class="card-body">
                                    <h4 class="card-title">Alumni Sports Meet 2021</h4>
                                    <h6 class="card-subtitle mb-2 text-muted">6th June 2021</h6>
                                    <p class="card-text">Have a friendly competition among other alumnis in various
                                        sports - futsal, basketball
                                        and much more! Learn more about the event by clicking the link below.
                                    </p>
                                    <p class="event-info">
                                        <a href="#" class="card-link">Learn More</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex align-items-center justify-content-center">
                        <p class="lead">
                        <h4>Browse all our upcoming events by clicking below.</h4>
                        </p>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                        <a class="btn jumbotron-button px-4" href="upcoming_events.php" role="button">Events</a>
                    </div>
                </div>
                <hr class="featurette-divider">

                <!--Latest Anouncements jumbotron on home page-->
                <div class="jumbotron-news shadow">
                    <h2 class="display-5" style="text-align: center;">ANNOUNCEMENTS & NEWS</h2>
                    <br>

                    <div class="row featurette align-items-center">
                        <div class="col-md-7 announcement-sec order-2 order-md-1">
                            <h2 class="featurette-heading display-7 mb-5"> Universiti Malaya to hold 60th Convocation
                                Ceremony at Dewan Tunku Cancelor
                                in May 2021 </h2>
                            <p class="lead">1st April 2021 - Taking into account and safety aspects of all parties,
                                Universiti Malaya is hereby with great contentment to announce
                                the upcoming 60th Convocation Ceremony, which will be held from 22 to 29 May 2021 at the
                                Dewan Tunku Cancelor, Universiti Malaya.
                            </p>
                            <br>
                        </div>
                        <div class="col-md-5 announcement-sec order-1 order-md-2">
                            <img class="featurette-image news-img img-fluid mx-auto shadow-lg" src="img/um_dtc.png"
                                alt="" height="110%" width="110%">
                        </div>
                    </div>
                    <hr class="featurette-divider">
                    <div class="row featurette align-items-center">
                        <div class="col-md-5 announcement-sec">
                            <img class="featurette-image news-img img-fluid mx-auto shadow-lg" src="img/um_qs.png"
                                alt="" height="110%" width="110%">
                        </div>
                        <div class="col-md-7 announcement-sec">
                            <h2 class="featurette-heading display-7 mb-5"> Universiti Malaya Ranks 59th in the world in
                                QS World University
                                Rankings </h2>
                            <p class="lead">10th June 2020 - The Quacquarelli Symonds World University Rankings (QS WUR)
                                2021 has ranked the
                                Universiti Malaya (UM) 59th globally. UM has leapt 11 spots up from 70 in 2020 and shows
                                a consistent, steady
                                rise in its recognition as one of the world’s leading universities in teaching and
                                learning, research and
                                internationalization.
                            </p>
                            <br>
                        </div>
                    </div>
                    <hr class="featurette-divider">

                </div>
                <hr class="featurette-divider">

            </div>
        </main>

        <?php include_once("php/footer.php")?>
    </div>

    <?php include_once("php/scripts.php")?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>

    <link rel="stylesheet" href="css/upcoming_events.css">

    <title>Upcoming Events | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php")?>

        <main>
            <div id="event-main">
                <section id="event-page-intro" class="rounded-3">
                    <h2 id="page-title" class="mb-0">Upcoming Events</h2>
                    <span class="meta-text">Events that will occur</span>
                    <hr>
                </section>
            
                <section id="highlighted-section" class="card">
                </section>
            
                <section id="events">
                    <div id="search-container" class="rounded-2 form-control form-control-lg form-control-borderless">
                        <input id="search-bar" class="rounded-3" type="search" placeholder="Search events">
                    </div>
            
                    <ul id="event-list" class="mb-0">
                    </ul>

                    <!-- <div id="loader-container">
                        <form action="">
                            <button id="load-events" class="mt-4">
                                More Events
                            </button>
                        </form>
                    </div> -->
                </section>
            </div>
        </main>

        <?php include_once("php/footer.php")?>
    </div>

    <?php include_once("php/scripts.php")?>
    <?php include_once("php/upcoming_events_db.php")?>
</body>
</html>
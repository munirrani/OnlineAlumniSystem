<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php")?>

    <link rel="stylesheet" href="css/event.css">

    <title>Event | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php")?>

        <main id="event-section">
            <section id="event-intro">
                <div>
                    <div id="title-separator">
                        <small class="text-muted">Start date - end date</small>
                        <h4 class="event-title card-title mb-0">Event title</h4>
                        <small class="text-muted">Mode</small>
                    </div>
    
                    <figure class="text-center">
                        <img class="rounded-3 img-fluid" src="img/faculty_image.jpg" alt="Main image of the event" width="800" height="500">
                    </figure>
                </div>
            </section>
    
            <article class="m-2 align-items-center">
                <p class="event-text m-4">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi optio molestias dolor aliquid incidunt voluptas molestiae quos et, ratione sed repellat quae mollitia quisquam consequatur dignissimos cumque voluptatibus? Quam, dolores.
                </p>
    
                <div class="event-table m-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>
        </main>

        <?php include_once("php/footer.php")?>
    </div>

    <?php include_once("php/scripts.php")?>
</body>

</html>
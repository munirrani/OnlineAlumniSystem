<?php
require_once("php/db_connect.php");

    $row = "";
    try
    {
        $sql = "SELECT * FROM event WHERE EVENT_TITLE = '{$_GET['EVENT_TITLE']}'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    catch(PDOEXCEPTION $e)
    {
        die("Error: " . $e->getMessage());
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("php/head.php");

    if (isset($_SESSION["admin"])) {
        header("location: admindash.php");
    }

    ?>

    <link rel="stylesheet" href="css/event.css">
    <?PHP

    if (!isset($_GET['EVENT_TITLE'])) {
        header("location: upcoming_events.php");
    }

    ?>
    <title>Event | FSKTM Alumni</title>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <?php include_once("php/heading.php") ?>

        <main id="my-event-section" class="rounded-3">
            <section id="event-intro">
                <div>
                    <div id="title-separator">
                        <small id="date" class="text-muted">Start date - end date</small>
                        <h4 class="mb-0"><?php echo $row['EVENT_TITLE']; ?></h4>
                        <small class="text-muted"><?php echo $row['MODE']; ?></small>
                    </div>

                    <figure class="text-center">
                        <img class="rounded-3 img-fluid" src="<?php echo $row['IMAGE']; ?>" alt="Main image of the event">
                    </figure>
                </div>
            </section>

            <article class="m-2 align-items-center description">
                <?php echo $row['DESCRIPTION']; ?>
            </article>
        </main>

        <?php include_once("php/footer.php") ?>
    </div>

    <?php include_once("php/scripts.php") ?>

    <script>
        function date(start_date, end_date) {
            let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
            let startDateValues = start_date.split("-");
            let endDateValues = end_date.split("-");
            if (start_date == end_date)
                return months[startDateValues[1].replace(/^0+/, '')] + " " + startDateValues[2] + ", " + startDateValues[0];
            else
                return months[startDateValues[1].replace(/^0+/, '')] + " " + startDateValues[2] + ", " + startDateValues[0] + " - " + months[endDateValues[1].replace(/^0+/, '')] + " " + endDateValues[2] + ", " + endDateValues[0];
        }
        let theDate = date('<?php echo $row['START_DATE'] ?>', '<?php echo $row['END_DATE'] ?>');
        document.querySelector("#date").textContent = String(theDate);
    </script>
</body>

</html>
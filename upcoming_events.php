<?php
    require_once("php/db_connect.php");

    $sql = "SELECT EVENT_TITLE, START_DATE, END_DATE, MODE, IMAGE, DESCRIPTION FROM event";
    $result = mysqli_query($conn, $sql);

    $jsarray = array();
    while($row = mysqli_fetch_assoc($result))
        $jsarray[] = $row;
?>

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

                    <div id="loader-container">
                        <form action="">
                            <button id="load-events" class="mt-4">
                                More Events
                            </button>
                        </form>
                    </div>
                </section>
            </div>
        </main>

        <?php include_once("php/footer.php")?>
    </div>

    <?php include_once("php/scripts.php")?>
    <script>
        // TODO: Figure out how to make the pages of the event

        // --------------------------- //
        // Getting the necessary items //
        // --------------------------- //

        function date(START_DATE, END_DATE)
        {
            let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
            let startDateValues = START_DATE.split("-");
            let endDateValues = END_DATE.split("-");
            if(START_DATE == END_DATE)
                return months[startDateValues[1]] + " " + startDateValues[2] + ", " + startDateValues[0];
            else
                return months[startDateValues[1]] + " " + startDateValues[2] + ", " + startDateValues[0] + " - " + months[endDateValues[1]] + " " + endDateValues[2] + ", " + endDateValues[0];
        }
        const eventList = document.querySelector("#event-list");
        const highlighted = document.querySelector("#highlighted-section");
        var eventData = <?php echo json_encode($jsarray);?>;
        const temp_event_page = "event.php";

        // ------------------------------------- //
        // Populate the page with event contents //
        // ------------------------------------- //

        highlighted.innerHTML = 
            `<div class="row g-0 highlighted-event">
                <div class="col-md-4">
                    <a href="${temp_event_page}"> 
                        <img id="highlighted-event-img" class="img-fluid rounded-4" src="${eventData[0]["IMAGE"]}" alt="" width="540" height="340">
                    </a>
                </div>
                
                <div class="col-md-8">
                    <div class="card-body">
                        <div id="highlighted-event-text">
                            <div>
                                <div class="mb-3">
                                    <h4>Highlighted event</h4>
                                </div>
                                <div id="highlighted-event-header" class="mb-3">
                                    <span class="text-muted">${date(eventData[0]["START_DATE"], eventData[0]["END_DATE"])}</span>
                                    <a href="${temp_event_page}"><h3 class="mb-0">${eventData[0]["EVENT_TITLE"]}</h3></a>
                                    <span class="text-muted">${eventData[0]["MODE"]}</span>
                                </div>
                                <article>
                                    ${eventData[0]["DESCRIPTION"]}
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
        var events = "";
        for(var i = 1; i < eventData.length; i++)
        {
            var currentCard = 
                `<li>
                    <div class="my-event-card card mt-3">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <p class="mb-0">
                                            <small class="text-muted">${date(eventData[i]["START_DATE"], eventData[i]["END_DATE"])}</small>
                                            <a href="${temp_event_page}"><h4 class="event-title card-title mb-0">${eventData[i]["EVENT_TITLE"]}</h4></a>
                                            <small class="text-muted">${eventData[i]["MODE"]}</small>
                                        </p>
                                    </div>

                                    <p class="card-text limit-text">
                                        ${eventData[i]["DESCRIPTION"]}
                                    </p>
                                </div>
                            </div>
                            <figure class="col-md-4 mb-0 event-img-container" >
                                <div class="event-img-align">
                                    <a href="${temp_event_page}">
                                        <img class="img-fluid rounded-3 event-img" src="${eventData[i]["IMAGE"]}" alt="">
                                    </a>
                                </div>
                            </figure>
                        </div>
                    </div>
                </li>`;

            events += currentCard;
        }
        eventList.innerHTML = events;

        // --------------------------- //
        // Search function of the page //
        // --------------------------- //

        const searchBar = document.querySelector("#search-bar")
            .addEventListener("keyup", (e) => {
                const searchString = e.target.value.toLowerCase();
                const filteredEventData = eventData.slice(1, eventData.length).filter((event) => {
                    return (
                        event.EVENT_TITLE.toLowerCase().includes(searchString) ||
                        event.MODE.toLowerCase().includes(searchString) ||
                        event.DESCRIPTION.toLowerCase().includes(searchString)
                    );
                });
                displayEvent(filteredEventData);
            });
        const displayEvent = (event) => {
            const htmlString = event
                .map((event) => {
                    return `
                    <li> 
                        <div class="my-event-card card mt-4">
                            <div class="row g-0">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <p class="mb-0">
                                                <small class="text-muted">${date(event["START_DATE"], event["END_DATE"])}</small>
                                                    <a href="${temp_event_page}">
                                                        <h4 class="event-title card-title mb-0">
                                                            ${event["EVENT_TITLE"]}
                                                        </h4>
                                                    </a>
                                                <small class="text-muted">${event["MODE"]}</small>
                                            </p>
                                        </div>

                                        <article class="card-text">
                                            ${event["DESCRIPTION"]}
                                        </article>
                                    </div>
                                </div>
                                <figure class="col-md-4 mb-0 event-img-container" >
                                    <div class="event-img-align">
                                        <a href="${temp_event_page}">
                                            <img class="img-fluid rounded-3 event-img" src="${event["IMAGE"]["tmp_name"]}" alt="">
                                        </a>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </li>`;
                })
                .join("");
            eventList.innerHTML = htmlString;
        };
    </script>
</body>
</html>
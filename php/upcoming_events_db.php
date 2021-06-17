<?php
    require_once("php/db_connect.php");

    $result = "";
    try
    {
        // $sql = "SELECT EVENT_TITLE, START_DATE, END_DATE, MODE, IMAGE, DESCRIPTION FROM event WHERE START_DATE >= CURDATE() ORDER BY START_DATE";
        $sql = "SELECT EVENT_TITLE, START_DATE, END_DATE, MODE, IMAGE, DESCRIPTION FROM event ORDER BY START_DATE";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
    catch(PDOEXCEPTION $e)
    {
        die("Error: " . $e->getMessage());
    }

    $jsarray = array();
    while($row = mysqli_fetch_assoc($result))
        $jsarray[] = $row;
?>

<script>
    // --------------------------- //
    // Getting the necessary items //
    // --------------------------- //

    function date(start_date, end_date)
    {
        let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
        let startDateValues = start_date.split("-");
        let endDateValues = end_date.split("-");
        if(start_date == end_date)
            return months[startDateValues[1].replace(/^0+/, '')] + " " + startDateValues[2] + ", " + startDateValues[0];
        else
            return months[startDateValues[1].replace(/^0+/, '')] + " " + startDateValues[2] + ", " + startDateValues[0] + " - " + months[endDateValues[1].replace(/^0+/, '')] + " " + endDateValues[2] + ", " + endDateValues[0];
    }
    const eventList = document.querySelector("#event-list");
    const highlighted = document.querySelector("#highlighted-section");
    var eventData = <?php echo json_encode($jsarray);?>;
    for(var i = 0; i < eventData.length; i++)
    {
        // TODO: Are the arbitrary values good?
        if(eventData[i]['DESCRIPTION'] !== null && eventData[i]['DESCRIPTION'].length > 100)
        {
            let startIndex = eventData[i]['DESCRIPTION'].indexOf('<p>');
            let endIndex = eventData[i]['DESCRIPTION'].indexOf('</p>');
            if(startIndex === -1)
                eventData[i]['DESCRIPTION'] = "";
            else
            {
                if(endIndex - startIndex >= 200)
                    eventData[i]['DESCRIPTION'] = eventData[i]['DESCRIPTION'].substring(startIndex, startIndex + 200) + "...</p>";
                else
                    eventData[i]['DESCRIPTION'] = eventData[i]['DESCRIPTION'].substring(startIndex, endIndex + 4);
            }
        }
    }

    // ------------------------------------- //
    // Populate the page with event contents //
    // ------------------------------------- //

    highlighted.innerHTML = `
        <div class="row g-0 highlighted-event">
            <div class="col-md-4">
                <a href="event.php?EVENT_TITLE=${eventData[0]["EVENT_TITLE"]}">
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
                                <a href="event.php?EVENT_TITLE=${eventData[0]["EVENT_TITLE"]}">
                                    <h3 class="mb-0">${eventData[0]["EVENT_TITLE"]}</h3>
                                </a>
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
                    <div class="row g-0 full-height">
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="mb-4">
                                    <p class="mb-0">
                                        <small class="text-muted">${date(eventData[i]["START_DATE"], eventData[i]["END_DATE"])}</small>
                                        <a href="event.php?EVENT_TITLE=${eventData[i]["EVENT_TITLE"]}">
                                            <h4 class="event-title card-title mb-0">
                                                ${eventData[i]["EVENT_TITLE"]}
                                            </h4>
                                        </a>
                                        <small class="text-muted">${eventData[i]["MODE"]}</small>
                                    </p>
                                </div>
                                <p class="card-text limit-text">
                                    ${eventData[i]["DESCRIPTION"]}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <figure class="event-img-container" >
                                <div class="event-img-align">
                                    <a href="event.php?EVENT_TITLE=${eventData[i]["EVENT_TITLE"]}">
                                        <img class="img-fluid rounded-3 event-img" src="${eventData[i]["IMAGE"]}" alt="" width="310" height="100">
                                    </a>
                                </div>
                            </figure>
                        </div>
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
                    <div class="my-event-card card mt-3">
                        <div class="row g-0 full-height">
                            <div class="col-md-8">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <p class="mb-0">
                                            <small class="text-muted">${date(event["START_DATE"], event["END_DATE"])}</small>
                                            <a href="event.php?EVENT_TITLE=${event["EVENT_TITLE"]}">
                                                <h4 class="event-title card-title mb-0">
                                                    ${event["EVENT_TITLE"]}
                                                </h4>
                                            </a>
                                            <small class="text-muted">${event["MODE"]}</small>
                                        </p>
                                    </div>
                                    <p class="card-text limit-text">
                                        ${event["DESCRIPTION"]}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <figure class="event-img-container" >
                                    <div class="event-img-align">
                                        <a href="event.php?EVENT_TITLE=${event["EVENT_TITLE"]}">
                                            <img class="img-fluid rounded-3 event-img" src="${event["IMAGE"]}" alt="" width="310" height="100">
                                        </a>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </li>`;
            })
            .join("");
        eventList.innerHTML = htmlString;
    };
</script>
<!-- TODO: Figure out how to make the pages of the event -->
<?php
    require_once("db_connect.php");

    $sql = "SELECT EVENT_TITLE, START_DATE, END_DATE, MODE, IMAGE, DESCRIPTION FROM event";
    $result = mysqli_query($conn, $sql);
?>

<script>
    // --------------------------- //
    // Getting the necessary items //
    // --------------------------- //

    function date(START_DATE, END_DATE)
    {
        let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
        let START_DATEValues = START_DATE.split("-");
        let END_DATEValues = END_DATE.split("-");
        if(START_DATE == END_DATE)
            return months[START_DATEValues[1]] + " " + START_DATEValues[2] + ", " + START_DATEValues[0];
        else
            return months[START_DATEValues[1]] + " " + START_DATEValues[2] + ", " + START_DATEValues[0] + " - " + months[END_DATEValues[1]] + " " + END_DATEValues[2] + ", " + END_DATEValues[0];
    }
    const eventList = document.querySelector("#event-list");
    const highlighted = document.querySelector("#highlighted-section");
    var eventData = <?php echo $jsarray; ?>;

    // ------------------------------------- //
    // Populate the page with event contents //
    // ------------------------------------- //

    highlighted.innerHTML = 
    // third line from here, 18th line from here
        `<div class="row g-0 highlighted-event">
            <div class="col-md-4">
                <a href="event.php"> 
                    <IMAGE id="highlighted-event-IMAGE" class="IMAGE-fluid rounded-4" src="${eventData[0].IMAGE}" alt="" width="540" height="340">
                </a>
            </div>
            
            <div class="col-md-8">
                <div class="card-body">
                    <div id="highlighted-event-text">
                        <div>
                            <div class="mb-3">
                                <h4>Highlighted event</h4>
                            </div>
                            <!-- TODO: Decide whether to change the order of these things -->
                            <div id="highlighted-event-header" class="mb-3">
                                <span class="text-muted">${date(eventData[0].START_DATE, eventData[0].END_DATE)}</span>
                                <a href="event.php"><h3 class="mb-0">${eventData[0].EVENT_TITLE}</h3></a>
                                <span class="text-muted">${eventData[0].MODE}</span>
                            </div>
                            <article>
                                ${eventData[0].DESCRIPTION}
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
            '<li>' +
                '<div class="my-event-card card mt-3">' +
                    '<div class="row g-0">' +
                        '<div class="col-md-8">' +
                            '<div class="card-body">' +
                                '<div class="mb-4">' +
                                    '<p class="mb-0">' +
                                        '<small class="text-muted">' + date(eventData[i].START_DATE, eventData[i].END_DATE) + '</small>' +
                                        '<a href="event.php"><h4 class="event-EVENT_TITLE card-EVENT_TITLE mb-0">' + eventData[i].EVENT_TITLE + '</h4></a>' + //here
                                        '<small class="text-muted">' + eventData[i].MODE + '</small>' +
                                    '</p>' +
                                '</div>' +

                                '<p class="card-text limit-text">' +
                                    eventData[i].DESCRIPTION +
                                '</p>' +
                            '</div>' +
                        '</div>' +
                        '<!-- Implementing this was a bitch but its really about knowing where to apply which class and how many divs do you need to nest -->' +
                        '<figure class="col-md-4 mb-0 event-IMAGE-container" >' +
                            '<div class="event-IMAGE-align">' +
                                '<a href="event.php">' + //here
                                    '<IMAGE class="IMAGE-fluid rounded-3 event-IMAGE" src="' + eventData[i].IMAGE + '" alt="">' +
                                '</a>' +
                            '</div>' +
                        '</figure>' +
                    '</div>' +
                '</div>' +
            '</li>';

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
                                            <small class="text-muted">${date(event.START_DATE, event.END_DATE)}</small>
                                            <a href=""><h4 class="event-EVENT_TITLE card-EVENT_TITLE mb-0">${event.EVENT_TITLE}</h4></a>
                                            <small class="text-muted">${event.MODE}</small>
                                        </p>
                                    </div>

                                    <article class="card-text">
                                        ${event.DESCRIPTION}
                                    </article>
                                </div>
                            </div>
                            <figure class="col-md-4 mb-0 event-IMAGE-container" >
                                <div class="event-IMAGE-align">
                                    <a href="">
                                        <IMAGE class="IMAGE-fluid rounded-3 event-IMAGE" src="${event.IMAGE}" alt="">
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
// TODO: Figure out how to make the pages of the event
const eventList = document.querySelector("#event-list");
const highlighted = document.querySelector("#highlighted-section");
var eventData =
[
    {
        eventPage: "event.html",
        title: "Lorem ipsum dolor sit, amet consectetur.",
        startDate: "2021-4-1",
        endDate: "2021-4-3",
        img: "img/Bacaan-Yassin.jpg",
        mode: "Virtual",
        description: "Lorem ipsum, dolor sit amet consectetur adipisicing elit."
    },
    {
        eventPage: "event.html",
        title: "Lorem ipsum dolor sit, amet consectetur adipisicing.",
        startDate: "2021-4-7",
        endDate: "2021-4-7",
        img: "img/upcoming-event-dash.jpg",
        mode: "Virtual",
        description: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ad sunt impedit odio! Dignissimos dolor minus deserunt eum sapiente tempore id consequatur ea libero fugit eveniet architecto et maxime, quod illum!"
    },
    {
        eventPage: "event.html",
        title: "Lorem ipsum dolor sit",
        startDate: "2021-4-16",
        endDate: "2021-4-17",
        img: "img/Pendidikan Sepanjang Hayat Bersama UMCCed.png",
        mode: "Physical",
        description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsum alias saepe ullam deserunt impedit corrupti voluptas totam illum? Adipisci?"
    },
    {
        eventPage: "event.html",
        title: "Lorem ipsum dolor sit",
        startDate: "2021-4-16",
        endDate: "2021-4-17",
        img: "img/Pendidikan Sepanjang Hayat Bersama UMCCed.png",
        mode: "Physical",
        description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsum alias saepe ullam deserunt impedit corrupti voluptas totam illum? Adipisci?"
    },
    {
        eventPage: "event.html",
        title: "Lorem ipsum dolor sit",
        startDate: "2021-4-16",
        endDate: "2021-4-17",
        img: "img/Pendidikan Sepanjang Hayat Bersama UMCCed.png",
        mode: "Physical",
        description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsum alias saepe ullam deserunt impedit corrupti voluptas totam illum? Adipisci?"
    },
    {
        eventPage: "event.html",
        title: "Lorem ipsum dolor sit",
        startDate: "2021-4-16",
        endDate: "2021-4-17",
        img: "img/Pendidikan Sepanjang Hayat Bersama UMCCed.png",
        mode: "Physical",
        description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsum alias saepe ullam deserunt impedit corrupti voluptas totam illum? Adipisci?"
    },
    {
        eventPage: "event.html",
        title: "Lorem ipsum dolor sit",
        startDate: "2021-4-16",
        endDate: "2021-4-17",
        img: "img/Pendidikan Sepanjang Hayat Bersama UMCCed.png",
        mode: "Physical",
        description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsum alias saepe ullam deserunt impedit corrupti voluptas totam illum? Adipisci?"
    },
    {
        eventPage: "event.html",
        title: "Lorem ipsum dolor sit",
        startDate: "2021-4-16",
        endDate: "2021-4-17",
        img: "img/Pendidikan Sepanjang Hayat Bersama UMCCed.png",
        mode: "Physical",
        description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed ipsum alias saepe ullam deserunt impedit corrupti voluptas totam illum? Adipisci?"
    }
];
function date(startDate, endDate)
{
    let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
    let startDateValues = startDate.split("-");
    let endDateValues = endDate.split("-");
    if(startDate == endDate)
        return months[startDateValues[1]] + " " + startDateValues[2] + ", " + startDateValues[0];
    else
        return months[startDateValues[1]] + " " + startDateValues[2] + ", " + startDateValues[0] + " - " + months[endDateValues[1]] + " " + endDateValues[2] + ", " + endDateValues[0];
}

// ------------------------------------- //
// Populate the page with event contents //
// ------------------------------------- //

highlighted.innerHTML = 
    `<div class="row g-0 highlighted-event">
        <div class="col-md-4">
            <a href="${eventData[0].eventPage}">
                <img id="highlighted-event-img" class="img-fluid rounded-4" src="${eventData[0].img}" alt="" width="540" height="340">
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
                            <span class="text-muted">${date(eventData[0].startDate, eventData[0].endDate)}</span>
                            <a href="${eventData[0].eventPage}"><h3 class="mb-0">${eventData[0].title}</h3></a>
                            <span class="text-muted">${eventData[0].mode}</span>
                        </div>
                        <article>
                            ${eventData[0].description}
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
                                    '<small class="text-muted">' + date(eventData[i].startDate, eventData[i].endDate) + '</small>' +
                                    '<a href="' + eventData[i].eventPage + '"><h4 class="event-title card-title mb-0">' + eventData[i].title + '</h4></a>' +
                                    '<small class="text-muted">' + eventData[i].mode + '</small>' +
                                '</p>' +
                            '</div>' +

                            '<p class="card-text limit-text">' +
                                eventData[i].description +
                            '</p>' +
                        '</div>' +
                    '</div>' +
                    '<!-- Implementing this was a bitch but its really about knowing where to apply which class and how many divs do you need to nest -->' +
                    '<figure class="col-md-4 mb-0 event-img-container" >' +
                        '<div class="event-img-align">' +
                            '<a href="' + eventData[i].eventPage + '">' +
                                '<img class="img-fluid rounded-3 event-img" src="' + eventData[i].img + '" alt="">' +
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
                event.title.toLowerCase().includes(searchString) ||
                event.mode.toLowerCase().includes(searchString) ||
                event.description.toLowerCase().includes(searchString)
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
                                        <small class="text-muted">${date(event.startDate, event.endDate)}</small>
                                        <a href=""><h4 class="event-title card-title mb-0">${event.title}</h4></a>
                                        <small class="text-muted">${event.mode}</small>
                                    </p>
                                </div>

                                <article class="card-text">
                                    ${event.description}
                                </article>
                            </div>
                        </div>
                        <figure class="col-md-4 mb-0 event-img-container" >
                            <div class="event-img-align">
                                <a href="">
                                    <img class="img-fluid rounded-3 event-img" src="${event.img}" alt="">
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
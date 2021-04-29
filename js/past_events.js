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
var eventData =  
[
    {
        eventPage: "event.html",
        title: "Pendidikan Sepanjang Hayat Bersama UMCCed",
        startDate: "2020-8-22",
        endDate: "2020-8-22",
        img: "img/Pendidikan Sepanjang Hayat Bersama UMCCed.png",
        mode: "Virtual",
        description: ""
    },
    {
        eventPage: "event.html",
        title: "Keselamatan Siber Di Kalangan Kanak-Kanak",
        startDate: "2021-4-16",
        endDate: "2021-4-16",
        img: "img/unnamed.png",
        mode: "Virtual",
        description: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem doloribus eaque enim quia voluptas fugiat ducimus aspernatur, quod dignissimos perferendis deleniti reprehenderit itaque ea fuga quae reiciendis dolores illo sunt!"
    },
    {   
        eventPage: "event.html",
        title: "SE Innovation Day",
        startDate: "2021-4-17",
        endDate: "2021-4-17",
        img: "img/sports_event.png",
        mode: "Physical",
        description: 
            "<p>In conjunction to our SE Innovation Day, we will have a competition where we will award the best FYP-2 projects. The top 3 SE Projects who are selected as the WINNERS of FYP Competition will be invited to give a sharing session on the event day.</p>"
    },
    {
        eventPage: "event.html",
        title: "UM3MT Competition (Faculty Level)",
        startDate: "2021-4-18",
        endDate: "2021-4-20",
        img: "img/hackathon.png",
        mode: "Virtual",
        description: "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus aperiam maiores iusto reiciendis!</p>"
    },
    {
        eventPage: "event.html",
        title: "Saringan Kesihatan",
        startDate: "2021-4-21",
        endDate: "2021-4-22",
        img: "img/Nixser.png",
        mode: "Physical",
        description: "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit sapiente neque, voluptas ab ullam deleniti eaque ea magnam" +
            "tempora fuga inventore eum reprehenderit porro distinctio numquam repellat labore, quas ipsum.</p>"
    },
    {
        eventPage: "event.html",
        title: "Cyber Crime Hands-on Workshop: Introduction to Blockchain, Cryptocurrency & Computer Penetration",
        startDate: "2021-4-27",
        endDate: "2021-4-30",
        img: "img/MyTech.jpg",
        mode: "Virtual",
        description:
            "<p><span>Tajuk :&nbsp; Persidangan Kebangsaan Jenayah Komersil : Ancaman dan Pendekatan Teknologi Siber 2019<br>" +
            "Anjuran Universiti Malaya dan Polis Diraja Malaysia<br>" +
            "Tempat : FSKTM<br>" +
            "<a data-saferedirecturl='https://www.google.com/url?q=https://umconference.um.edu.my/jkom2019&amp;source=gmail&amp;ust=1570767604220000&amp;usg=AFQjCNHOrIeALjBI8pRoAQ2gq3Tss0AyAw' href='https://umconference.um.edu.my/jkom2019' target='_blank'>https://umconference.um.edu.<wbr />my/jkom2019</a></span></p>"
    }
];

var wholeSection = "";
for(var i = 0; i < eventData.length; i++)
{
    var currentCard = 
        '<div class="vertical-event-card"> <div class="event-text">' + 
        '<a href="' + eventData[i].eventPage + '" class="event-title"><h4>' + eventData[i].title + '</h4></a>' +
        '<p class="event-meta">' + date(eventData[i].startDate, eventData[i].endDate) + ' | ' + eventData[i].mode + '</p>' + eventData[i].description + 
        '</div> <div class="event-img"> <a href="' + eventData[i].eventPage + '"><img src="' + eventData[i].img + '" class="img-fluid rounded-3" width="500" height="280" alt=""></a> </div> </div>';

    wholeSection += currentCard;
}

const eventContainer = document.querySelector("#event-container");
eventContainer.innerHTML = wholeSection;

const searchBar = document.querySelector("#alumni-search-bar")
.addEventListener("keyup", (e) => {
    const searchString = e.target.value.toLowerCase();
    const filteredEventData = eventData.filter((event) => {
      return (
        event.title.toLowerCase().includes(searchString) ||
        event.mode.toLowerCase().includes(searchString) ||
        event.description.toLowerCase().includes(searchString)
      );
    });
    displayEvent(filteredEventData);
  });

  document.querySelector
  const displayEvent = (event) => {
    const htmlString = event
      .map((event) => {
        return `
            <div class="vertical-event-card">
                <div class="event-text">
                    <a href="${event.eventPage}" class="event-title">
                        <h4>${event.title}</h4>
                    </a>
                    <p class="event-meta">
                        ${date(event.startDate, event.endDate)} | ${event.mode}
                    </p>
                    ${event.description}
                </div>
                <div class="event-img">
                    <a href="${event.eventPage}"><img src="${event.img}" class="img-fluid rounded-3" width="500" height="280" alt=""></a>
                </div>
            </div>
            `;
      })
      .join("");
    eventContainer.innerHTML = htmlString;
  };
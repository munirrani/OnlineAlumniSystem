const form = document.querySelector("form");
const eventTitle = document.querySelector("#eventTitle");
const startDate = document.querySelector("#startDate");
const endDate = document.querySelector("#endDate");
const description = document.querySelector("#description");
const eventImg = document.querySelector("#eventImg");
const eventMode = document.querySelectorAll(".event-mode");

form.addEventListener("submit", function(e) {
    e.preventDefault();
    checkInputs();
});

function checkInputs() 
{
    const eventTitleValue = eventTitle.value.trim();
    const startDateValue = startDate.value;
    const endDateValue = endDate.value;
    const descriptionValue = description.value.trim();
    const eventImgValue = eventImg.value;
    const eventModeValue = eventMode.value;

    if(eventTitleValue.length <= 6) 
        setErrorFor(eventTitle, "Event title must be descriptive");
    else
        setSuccessFor(eventTitle);

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    today = yyyy + "-" + mm + "-" + dd;

    if(startDateValue < today)
        setErrorFor(startDate, "Start date must be bigger than, or equal to, today's date");
    else
        setSuccessFor(startDate);

    if(endDateValue < startDateValue || endDateValue < today)
        setErrorFor(endDate, "End date must be greater than, or equal to, start date");
    else
        setSuccessFor(endDate)

    if(descriptionValue.length <= 6) 
        setErrorFor(description, "Description must be descriptive");
    else
        setSuccessFor(description);

    var imgFormat = ["jpg", "png", "jpeg"];
    if(imgFormat.indexOf(eventImgValue.split('.').pop()) !== -1)
        setSuccessFor(eventImg);
    else    
        setErrorFor(eventImg, "Please provide an image")
}

function setErrorFor(input, message) 
{
    const parent = input.parentElement.parentElement;
    parent.classList.add("error")
    const small = parent.querySelector("small");
    small.innerText = message;
}

function setSuccessFor(input)
{
    const parent = input.parentElement.parentElement;
    parent.classList.add("success");
}
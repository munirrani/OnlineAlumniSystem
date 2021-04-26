const eventTitle = document.querySelector("#eventTitle");
const startDate = document.querySelector("#startDate");
const endDate = document.querySelector("#endDate");
const description = document.querySelector("#description");
const eventImg = document.querySelector("#eventImg");

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();
today = yyyy + "-" + mm + "-" + dd;

eventTitle.addEventListener("input", function() {
    const eventTitleValue = eventTitle.value.trim();
    if(eventTitleValue.length <= 6) 
        setErrorFor(eventTitle, "Event title must be descriptive");
    else
        setSuccessFor(eventTitle);
});

var datePlaceholder = today;
startDate.addEventListener("input", function() {
    const startDateValue = startDate.value;
    datePlaceholder = startDateValue
    if(startDateValue < today)
        setErrorFor(startDate, "Must be bigger than, or equal to, today's date");
    else
        setSuccessFor(startDate);
});

endDate.addEventListener("input", function() {
    const endDateValue = endDate.value;
    if(endDateValue < datePlaceholder || endDateValue < today)
        setErrorFor(endDate, "Must be greater than, or equal to, start date");
    else
        setSuccessFor(endDate)
});

// Problematic
description.addEventListener("input", function() {
    const descriptionValue = description.value.innerText.trim();
    console.log(descriptionValue)
    if(descriptionValue.length <= 6) 
        setErrorFor(description, "Description must be descriptive");
    else
        setSuccessFor(description);
});

eventImg.addEventListener("input", function() {
    const eventImgValue = eventImg.value;
    var imgFormat = ["jpg", "png", "jpeg", "svg"];
    if(imgFormat.indexOf(eventImgValue.split('.').pop()) !== -1)
        setSuccessFor(eventImg);
    else    
        setErrorFor(eventImg, "Please provide an image")
});

function setErrorFor(input, message) 
{
    const parent = input.parentElement.parentElement;
    parent.classList.remove("success");
    parent.classList.add("error");
    const small = parent.querySelector("small");
    small.innerText = message;
}
function setSuccessFor(input)
{
    const parent = input.parentElement.parentElement;
    parent.classList.remove("error");
    parent.classList.add("success");
}
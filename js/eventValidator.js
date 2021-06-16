function setErrorFor(input) 
{
    const parent = input.parentElement.parentElement;
    parent.classList.remove("success");
    parent.classList.add("error");
}
function setSuccessFor(input)
{
    const parent = input.parentElement.parentElement;
    parent.classList.remove("error");
    parent.classList.add("success");
}

const eventTitle = document.querySelector("#eventTitle");
const startDate = document.querySelector("#startDate");
const endDate = document.querySelector("#endDate");
const eventImg = document.querySelector("#eventImg");

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();
today = yyyy + "-" + mm + "-" + dd;

eventTitle.addEventListener("input", function() 
{
    const eventTitleValue = eventTitle.value.trim();
    if(eventTitleValue.length <= 6) 
        setErrorFor(eventTitle);
    else
        setSuccessFor(eventTitle);
});

var datePlaceholder = today;
startDate.addEventListener("input", function() 
{
    const startDateValue = startDate.value;
    datePlaceholder = startDateValue;
    if(startDateValue < today)
        setErrorFor(startDate);
    else
        setSuccessFor(startDate);
    checkEndDate();
});

function checkEndDate() 
{
    endDate.addEventListener("input", function() {
        const endDateValue = endDate.value;
        if(endDateValue < datePlaceholder || endDateValue < today)
            setErrorFor(endDate);
        else
            setSuccessFor(endDate)
    });
}

checkEndDate();

eventImg.addEventListener("input", function() 
{
    const eventImgValue = eventImg.value;
    var imgFormat = ["jpg", "png", "jpeg", "svg"];
    if(imgFormat.indexOf(eventImgValue.split('.').pop()) !== -1)
        setSuccessFor(eventImg);
    else    
        setErrorFor(eventImg)
});
//photo
function loadfile(event) {
    var output = document.getElementById('photo');
    output.src = URL.createObjectURL(event.target.files[0]);
};

//decription box
ClassicEditor
    .create(document.querySelector('#description'))
    .catch(error => {
        console.error(error);
    });
ClassicEditor
    .create(document.querySelector('#qualification'))
    .catch(error => {
        console.error(error);
    });
  
//validate
function validateForm() {
    var myModal = new bootstrap.Modal(document.getElementById("warning"))
    var s = checkSalary();
    var d = checkDate();
    var c = checkCmpSize();

    if(s === true && d === true && c === true){
        myModal.show();
        return true;
    }
    else{
        alert("You have incorrect input/s. Please check the information you entered.");
        return false;
    }
    
}
function checkSalary() {
    var minS = parseInt(document.getElementById("minS").value);
    var maxS = parseInt(document.getElementById("maxS").value);
    if(minS > maxS || minS < 0 || maxS < 0){
        document.getElementById("salarytxt").innerHTML = "Please specify the right value";
        return false;
    }
    else{
        document.getElementById("salarytxt").innerHTML = "";
        return true;
    }        
} 
function checkCmpSize(){
    var minC = parseInt(document.getElementById("minC").value);
    var maxC = parseInt(document.getElementById("maxC").value);
    if(minC > maxC){
        document.getElementById("cmpSizetxt").innerHTML = "Please specify the right value";
        return false;
    }
    else{
        document.getElementById("cmpSizetxt").innerHTML = "";
        return true;
    }   
}
function checkDate() {
    var GivenDate = document.getElementById("dateline").value;
    var CurrentDate = new Date();
    GivenDate = new Date(GivenDate);
    if(GivenDate <= CurrentDate){
        document.getElementById("datelinetxt").innerHTML = "Please enter the correct date";
        return false;
    }
    else{
        document.getElementById("datelinetxt").innerHTML = "";
        return true;
    }
}
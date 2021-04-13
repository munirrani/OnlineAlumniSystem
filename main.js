$(function () {
    $(document).scroll(function () {
        var $nav = $("#botNavbar");
        $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
    });
});


let checkPassEmpty = function () {
    if (document.getElementById('password').value == "") {
        document.getElementById('error-text-reg').style.display = "none";
        return true;
    }
}

let check = function () {
    if (document.getElementById('confirmpw').value != "") {
        if (document.getElementById('password').value != document.getElementById('confirmpw').value) {
            document.getElementById('error-text-reg').style.display = "block";
            document.getElementById('error-text-reg').classList.add("text-danger");
            document.getElementById('error-text-reg').innerHTML = 'Confimed Password Does Not Match';
            return false;
        } else {
            document.getElementById('error-text-reg').style.display = "none";
            return true;
        }
    } else {
        document.getElementById('error-text-reg').style.display = "none";
    }
}
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
// firstname
// lastname

let check = function () {


    if (document.getElementById('confirmpw').value != "") {
        if (document.getElementById('password').value != document.getElementById('confirmpw').value) {
            document.getElementById('error-text-reg').classList.add("error-reg-text");
            document.getElementById('confirmpw').classList.add("input-error");
            document.getElementById('error-text-reg').innerHTML = 'Confimed Password Does Not Match';
            return false;
        } else {
            document.getElementById('confirmpw').classList.remove("input-error");
            document.getElementById('error-text-reg').classList.remove("error-reg-text");
            return true;
        }
    } else {
        document.getElementById('confirmpw').classList.remove("input-error");
        document.getElementById('error-text-reg').classList.remove("error-reg-text");
    }


}
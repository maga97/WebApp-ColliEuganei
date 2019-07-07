
function menuMobile() {
    document.getElementById("menuprincipale").classList.toggle("responsive");
}

function clx(str, obj) {
    scroll = str + "-text";
    variable = "#" + scroll;
    $('.hide').not(variable).hide();
    $(variable).fadeToggle("slow");
    document.getElementById(scroll).scrollIntoView();
}


$(document).ready(function () {
    document.getElementById("menuprincipale").removeAttribute("class");
    setTimeout(function () {
        $(".success").hide();
    }, 10000);
    $("#mobile").click(function (e) {
        e.preventDefault();
        menuMobile();
    });
    $('.hide').css("display", "none");
    $(window).scroll(function () {
        if ($(window).width() > 600 && $(this).scrollTop() > 20) {
            $('#scroll-top-btn').fadeIn();
        } else {
            $('#scroll-top-btn').fadeOut();
        }
    });
});

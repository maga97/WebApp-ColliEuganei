function detectIE() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
        return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }

    return false;
}
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
    document.getElementById("menuprincipale").classList.toggle("responsive");
    setTimeout(function () {
        $(".success").hide();
    }, 10000);
    $("#scroll-top-btn").css("display", "none");
    $(".dropdown, .dropdown-content").hover(function() {
        if(detectIE()) {
            $('.dropdown-content').css('display', 'inline-block');
            $('.dropdown-content li a').css("display", "block");
        }
    }, function () {
        $('.dropdown-content').css('display', 'none');
        $('.dropdown-content li a').css("display", "none");
    });
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

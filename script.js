function menuMobile() {
	document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}

function clx(str, obj) {
	let variable = "#" + str + "-text";
	$('.hide').not(variable).hide();
	$(obj).addClass("galleryframe-active");
	$(variable).fadeToggle("slow");
}

$(document).ready(function() {
	$("#scroll-top-btn").css("display", "none");
	$('.hide').css("display", "none");
	$(window).scroll(function(){
		if ($(window).width() > 600 && $(this).scrollTop() > 20) {
			$('#scroll-top-btn').fadeIn();
		} else {
			$('#scroll-top-btn').fadeOut();
		}
	});
});

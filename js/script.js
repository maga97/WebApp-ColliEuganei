function menuMobile() {
	document.getElementById("menuprincipale").classList.toggle("responsive");
}

function clx(str, obj) {
	let scroll=str+"-text";
	let variable = "#" + scroll;
	$('.hide').not(variable).hide();
	$(obj).addClass("galleryframe-active");
	$(variable).fadeToggle("slow");
	document.getElementById(scroll).scrollIntoView();
}

$(document).ready(function() {
	$("#scroll-top-btn").css("display", "none");
	$("#mobile").click(function(e) {
		e.preventDefault();
		menuMobile();
	});
	$('.hide').css("display", "none");
	$(window).scroll(function(){
		if ($(window).width() > 600 && $(this).scrollTop() > 20) {
			$('#scroll-top-btn').fadeIn();
		} else {
			$('#scroll-top-btn').fadeOut();
		}
	});
});

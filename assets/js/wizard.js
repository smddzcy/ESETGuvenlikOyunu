$(document).ready(function() {
	$("#main-aunt").animate({
		width: '1000px',
		height: '500px',
		left: '-=450',
		top: '-=250',
		opacity: 1
	}, 2000, 'easeOutBack', function() {
		$(".main-mid .social-media").animate({
			opacity: 1
		}, 500);
	});
});
$("#password").keypress(function() {
	var val = Math.random()*100;
	progress_bar = $("#password-strength").find(".progress-bar");
	progress_bar.attr('aria-valuenow', val);
	progress_bar.css('width', val+"%");

	var bar_class = "danger";
	if(val > 25 && val < 50) {
		bar_class = "warning";
	} else if(val > 50) {
		bar_class = "success";
	}

	progress_bar.attr('class', 'progress-bar progress-bar-'+bar_class);
});
function getPasswordStrength(string) {
	return 7;
}
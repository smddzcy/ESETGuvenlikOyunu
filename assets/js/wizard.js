$(document).ready(function() {
	$("#main-aunt").animate({
		width: '800px',
		height: '400px',
		left: '-=400',
		top: '-=200',
		opacity: 1
	}, 2000, 'easeOutBack', function() {
		$(".main-mid .social-media").animate({
			opacity: 1
		}, 500);
	});
});
function getPasswordStrength(string) {
	return 7;
}
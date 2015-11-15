$(document).ready(function () {
    $("#main-aunt").animate({
        width: '1000px',
        height: '500px',
        left: '-=450',
        top: '-=250',
        opacity: 1
    }, 2000, 'easeOutBack', function () {
        $(".main-mid .social-media").animate({
            opacity: 1
        }, 500);
    });
});
$("#password").keypress(function () {
    var val = calculatePoint($("#password").val());
    progress_bar = $("#password-strength").find(".progress-bar");
    progress_bar.attr('aria-valuenow', val);
    progress_bar.css('width', val + "%");

    var bar_text = $("#password-strength-text");
    var bar_class = "danger";

    bar_text.html("Çok kısa");
    if (val > 25 && val < 50) {
        bar_class = "warning";
        bar_text.html("Yetersiz");
    } else if (val > 50) {
        bar_class = "success";
        bar_text.html("Güçlü");
    }

    progress_bar.attr('class', 'progress-bar progress-bar-' + bar_class);
});

function nextLevel() {
    var nextLevelData = process("nextLevel", $("#levelCode").val()).levelData;
    if (nextLevelData != null) {
        $("#level-container").animate({
            left: "-=400",
            opacity: 0
        }, 500, function () {
            $("#level-container").html(nextLevelData);
            $("#level-container").css('left', '400');
            $("#level-container").animate({
                left: "-=400",
                opacity: 1
            }, 500, function () {
            });
        });
    }
}

function calculatePoint(data) {
    return process("calculatePoint", data).point;
}

function getIntoLevel() {
	$("#pre-level").fadeOut(500, function() {
		$("#level").animate({
			opacity: 1
		}, 1000, function() {

		});
	});
}
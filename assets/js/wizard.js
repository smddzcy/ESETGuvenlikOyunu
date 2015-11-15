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
$("#password").keyup(function () {
    var val = calculatePoint($("#password").val());
    progress_bar = $("#password-strength").find(".progress-bar");
    progress_bar.attr('aria-valuenow', val);
    progress_bar.css('width', val + "%");

    var bar_text = $("#password-strength-text");
    var bar_class = "danger";

    bar_text.html("Çok yetersiz");
    if (val > 25 && val < 50) {
        bar_class = "warning";
        bar_text.html("Fena değil");
    } else if (val > 50) {
        bar_class = "success";
        bar_text.html("Güçlü");
    }

    progress_bar.attr('class', 'progress-bar progress-bar-' + bar_class);
});

function nextLevel(level) {
    var pointsData;
    switch (level) {
        case 1:
            pointsData = {
                "level": 1,
                "password": $("#password").val()
            };
            break;
        case 2:
            pointsData = {
                "level": 2,
                "c": c
            };
            break;
        case 3:
            pointsData = {
                "level": 3,
                "mails": js_mails
            };
            break;
        default:
            break;
    }
    var processData = process("nextLevel", {
        "levelCode": $("#levelCode").val(),
        "pointsData": pointsData
    });
    var nextLevelData = processData.levelData;
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
    $("#pre-level").fadeOut(500, function () {
        $("#level").animate({
            opacity: 1
        }, 1000, function () {

        });
    });
}

var c = 0;
$("#level-container").on('click', '.level-2 img', function () {
    ++c;
    swal({
        title: 'Zararlı İçerik!',
        text: 'Bu tarz reklamlar bilgi hırsızlığı amacıyla oluşturulmuş ya da insanları kandırmaya yönelik içerikler barındırıyor olabilir.',
        type: 'error',
        confirmButtonText: 'Tamam'
    });
});

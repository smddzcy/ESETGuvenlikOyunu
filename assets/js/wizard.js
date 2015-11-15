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
                "mails": c
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
$(".level-2 img").on('click', function () {
    ++c;
    swal({
        title: 'Zararlı İçerik!',
        text: 'Bu tarz reklamlar bilgi hırsızlığı amacıyla oluşturulmuş ya da insanları kandırmaya yönelik içerikler barındırıyor olabilir.',
        type: 'error',
        confirmButtonText: 'Tamam'
    });
});
$mail_list = $("#mail-list");
$js_mails = [];
for(var i = 0; i<15; i++) {
    $mail = $('<div class="panel panel-default">'+
            '<div class="panel-heading" role="tab" id="headingOne">'+
              '<h4 class="panel-title">'+
                '<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse'+i+'" aria-expanded="true" aria-controls="#collapse'+i+'">'+
                    '<div class="mail-sender"><b>I6 Promotion</b></div>'+
                    '<div class="mail-title">İPHONE 6 KAZANDINIZ, ALMAK İÇİN TIKLAYIN</div>'+
                    '<div class="btn btn-danger mark-as-spam" onclick="markSpam('+i+')">'+
                        '<i class="fa fa-times"></i>'+
                        'Spam Olarak İşaretle'+
                    '</div>'+
                    '<div class="btn btn-success mark-as-safe" onclick="markSafe('+i+')">'+
                        '<i class="fa fa-check"></i>'+
                        'Spam Değil'+
                    '</div>'+
                    '<div class="clearfix"></div>'+
                '</a>'+
              '</h4>'+
            '</div>'+
            '<div id="#collapse'+i+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">'+
              '<div class="panel-body">'+
                'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven\'t heard of them accusamus labore sustainable VHS.'+
              '</div>'+
            '</div>'+
        '</div>');
    $js_mails.push($mail);
    $mail_list.append($mail);
}
var markSpam = function(i) {
    $js_mails[i]['state'] = 0;
}
var markSafe = function(i) {
    $js_mails[i]['state'] = 1;
}

function process(funcName, data) {
    var ret;
    $.ajax({
        type: "POST",
        url: "http://localhost/ESETGuvenlikOyunu/controller/Process.php",
        async: false,
        data: {
            'function': funcName,
            'data': data
        },
        dataType: "json",
        success: function (returnData) {
            ret = returnData.levelData;
        }
    });
    return ret;
}

function nextLevel() {
    var nextLevelData = process("nextLevel", $("#levelCode").val());
    if (nextLevelData != null) {
        console.log($("#level-container").innerHTML);
        $("#level-container").animate({
            left: "-=400",
            opacity: 0
        }, 500, function() {
            $("#level-container").html(nextLevelData);
            $("#level-container").css('left', '400');
            $("#level-container").animate({
                left: "-=400",
                opacity: 1
            }, 500, function() {});
        });
    }
}
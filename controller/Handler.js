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
        $("#level-container").html(nextLevelData);
    }
}
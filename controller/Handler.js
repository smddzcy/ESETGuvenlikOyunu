function process(funcName, data) {
    var ret;
    $.ajax({
        type: "POST",
        url: "../controller/Process.php",
        data: {
            'function': funcName,
            'data': data
        },
        dataType: "json",
        success: function (returnData) {
            ret = returnData;
        }
    });
    return ret;
}

function nextLevel() {
    var nextLevelData = process("nextLevel", $("#levelCode").val());
    console.log(nextLevelData);
    if (nextLevelData.levelData != null) {
        $("#level-container").innerHTML = nextLevelData.levelData;
    }
}
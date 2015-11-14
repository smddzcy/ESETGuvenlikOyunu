function process(funcName, data) {
    var ret;
    $.ajax({
        type: "POST",
        url: "Process.php",
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
    if (nextLevelData.levelData != null) {
        $("#level-container").innerHTML = nextLevelData.levelData;
    }
}

function increasePoint(point) {
    process("increasePoint", point);
}

function decreasePoint(point){
    process("decreasePoint", point);
}
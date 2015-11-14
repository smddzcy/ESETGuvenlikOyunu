const CONTENT_DIV_ID = "#oyun";

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
    process("nextLevel", $("#levelCode").val());
}
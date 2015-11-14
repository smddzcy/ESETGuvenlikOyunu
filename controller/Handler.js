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
            ret = returnData;
        }
    });
    return ret;
}
var currentLevel; // Current level number
var social_Platform; // Facebook=0 Twitter=1
var social_ID; // ID

const CONTENT_DIV_ID = "";
const PROCESS_FILE = "Process.php";

var dataTest = {
    'id': 123,
    'test': 'test123'
};

function process(funcName, data) {
    $.ajax({
        type: "POST",
        url: PROCESS_FILE,
        data: {
            'function': funcName,
            'data': dataTest
        },
        dataType: "json",
        success: function (returnData) {
            //todo: do things with return
        }
    });
}


process("increasePoint", 123);


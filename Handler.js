var currentLevel; // Current level number
var social_Platform; // Facebook=0 Twitter=1
var social_ID; // ID

const CONTENT_DIV_ID = "";
const SOCIAL_MANAGER_FILE = "";
const PROCESS_FILE = "Process.php";


function process(funcName,data){
    $.ajax({
        type: "POST",
        url: PROCESS_FILE,
        data: {
            'function': funcName,
            'data': data
        },
        dataType: "json",
        success: function (data) {
            //todo: do things with return
        }
    });
}

<?php
error_reporting(0); // good enough for demo
require_once("Config.php");
require_once(Config::HELPER_FILE_USERDB);
$function = $_POST['function'];
$data = $_POST['data'];
$returnData = array();

if (in_array($function,Config::$VALID_FUNCTIONS)) {

    $userDBHelper = new User_DB_Helper();
    switch ($function) {
        case "increasePoint":
            if (isset($_COOKIE['platform_id'])) {
                $socialID = (int)$_COOKIE['platform_id'];
                $userDBHelper->increasePoint($socialID, 10); // Puan sayısı burda değiştirilebilir
            }
            break;

        case "decreasePoint":
            if (isset($_COOKIE['platform_id'])) {
                $socialID = (int)$_COOKIE['platform_id'];
                $userDBHelper->decreasePoint($socialID, 10); // Puan sayısı burda değiştirilebilir
            }
            break;

        case "addUser":
            $userDBHelper->addUser(array(
                'platform' => (int)$data['platform'],
                'platform_id' => (int)$data['platform_id'],
                'name' => (string)$data['name'],
                'email' => (string)$data['email'],
                'level' => 1
            ));
            break;

        // Have no idea what it does, but "Mahmut: lazım olur"
        case "getUser":
            if (isset($_COOKIE['platform_id'])) {
                $socialID = (int)$_COOKIE['platform_id'];
                $userDBHelper->getUser($socialID);
            }
            break;

        case "nextLevel":
            if (isset($_COOKIE['platform_id'])) {
                $socialID = (int)$_COOKIE['platform_id'];
                $levelCode = (int)$data;
                $isCodeOK = $userDBHelper->checkLevelCode($levelCode);
                if ($isCodeOK !== false) {
                    $userDBHelper->increaseLevel($socialID);
                    $newLevel = $userDBHelper->getLevel($socialID);

                }
            }
            break;

    }

}

if (!empty($returnData))
    echo json_encode($returnData);

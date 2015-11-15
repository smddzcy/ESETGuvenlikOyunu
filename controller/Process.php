<?php

require_once("Config.php");
require_once(Config::HELPER_FILE_USERDB);
$function = $_POST['function'];
$data = $_POST['data'];
$returnData = array();
if (in_array($function, Config::$VALID_FUNCTIONS)) {

    $userDBHelper = new User_DB_Helper();
    switch ($function) {
        case "increasePoint":
            if (isset($_COOKIE['platform_id'])) {
                $socialID = (int)$_COOKIE['platform_id'];
                $points = (int)$data;
                if ($points > Config::MAX_POINT || $points < Config::MIN_POINT)
                    break;
                $userDBHelper->increasePoint($socialID, $points); // Puan sayısı burda değiştirilebilir
            }
            break;

        case "decreasePoint":
            if (isset($_COOKIE['platform_id'])) {
                $socialID = (int)$_COOKIE['platform_id'];
                $points = (int)$data;
                if ($points > Config::MAX_POINT || $points < Config::MIN_POINT)
                    break;
                $userDBHelper->decreasePoint($socialID, $points); // Puan sayısı burda değiştirilebilir
            }
            break;

        case "addUser":
            if (empty($userDBHelper->getUser((int)$data['platform_id'])->fetch_assoc()['_ID'])) {
                $userDBHelper->addUser(array(
                    'name' => (string)$data['name'],
                    'platform' => (int)$data['platform'],
                    'platform_id' => (int)$data['platform_id'],
                    'email' => (string)$data['email'],
                    '_level' => 1
                ));

            }
            break;

        // Have no idea what it does, but "Mahmut: lazım olur"
        case "getUser":
            if (isset($_COOKIE['platform_id'])) {
                $socialID = (int)$_COOKIE['platform_id'];
                $userDBHelper->getUser($socialID);
            }
            break;

        case "calculatePoint":
            if (isset($_COOKIE['platform_id'])) {
                $socialID = (int)$_COOKIE['platform_id'];
                $currentLevel = $userDBHelper->getLevel($socialID);
                require_once("PointCalculator.php");
                $calculatePoint = new CalculatePoint($currentLevel, $data);
                $point = $calculatePoint->calculate();
                $returnData["point"] = $point;
            }
            break;

        case "nextLevel": // todo: puanı hesaplatıp burada dbye yaz
            if (isset($_COOKIE['platform_id'])) { //todo: platform id'yi cookieye at
                $socialID = (int)$_COOKIE['platform_id'];
                $levelCode = (int)$data;
                $isCodeOK = $userDBHelper->checkLevelCode($levelCode);
                if ($isCodeOK === true) {
                    require_once("PointCalculator.php");
                    // Add points
                    $currentLevel = $userDBHelper->getLevel($socialID);
                    $calculatePoint = new CalculatePoint($currentLevel, $data);
                    $point = $calculatePoint->calculate();
                    $userDBHelper->increasePoint($socialID, $point / 5);
                    // Increase level & get to new level
                    $userDBHelper->increaseLevel($socialID);
                    $newLevel = $userDBHelper->getLevel($socialID);
                    $newLevelFile = Config::LEVELS_DIRECTORY . "level-{$newLevel}.html";
                    if (file_exists($newLevelFile)) {
                        $returnData["levelData"] = file_get_contents($newLevelFile);
                    }
                }
            }
            break;

    }

}
if (!empty($returnData))
    echo json_encode($returnData);
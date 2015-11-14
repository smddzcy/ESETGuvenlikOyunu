<?php  


require_once("../Helpers/users_db_helper.php");
//require_once("Config.php");

require_once("../Helpers/SM_Helper.php");

//$users = new User_DB_Helper();

$data = array(
	"name" => "Zaa",
	"surname" => "XD",
	"platform" => 0,
	"platform_id" => 12,
	"email" => "zaaxd95@mynet.com",
	"points" => 0
);

$sm_helper = new SM_Helper();

$sm_helper->connectFacebook();

//var_dump($users->addUser($data));


?>
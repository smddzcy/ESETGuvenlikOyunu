<?php

$code = $_GET["code"];

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://graph.facebook.com/v2.3/oauth/access_token?" .
    "client_id=1665895287021960" .
    "&redirect_uri=http://localhost/ESETGuvenlikOyunu/controller/facebook_return.php" .
    "&client_secret=c636846ef008ff87150aa3883622e298" .
    "&code=" . $code);

curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_RETURNTRANSFER => true
));

$json = json_decode(curl_exec($curl));
curl_close($curl);

checkPermissions($json);

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "https://graph.facebook.com/v2.5/me?fields=id,name,email&access_token=" . $json->access_token);
curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_RETURNTRANSFER => true
));

$user_data = json_decode(curl_exec($curl));

curl_close($curl);

$data = array(
    "function" => "addUser",
    "data" => array(
        "name" => $user_data->name,
        "platform" => 0,
        "platform_id" => $user_data->id,
        "email" => $user_data->email
    )
);

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "http://localhost/ESETGuvenlikOyunu/controller/Process.php");
curl_setopt_array($curl, array(
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => http_build_query($data)
));

echo curl_exec($curl);

function rerequestPermissions()
{
    header("Location: https://www.facebook.com/dialog/oauth?" .
        "client_id=1665895287021960&" .
        "redirect_uri=http://localhost/ESETGuvenlikOyunu/facebook_return.php&" .
        "auth_type=rerequest&" .
        "scope=email,user_friends");
}

function checkPermissions($json)
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, "https://graph.facebook.com/v2.5/me/permissions?access_token=" . $json->access_token);
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_RETURNTRANSFER => true
    ));

    $perms = json_decode(curl_exec($curl));

    foreach ($perms->data as $key => $value) {
        if ($value->status !== "granted") {
            rerequestPermissions();
        }
    }
}

header("Location: http://localhost/ESETGuvenlikOyunu/oyun");
die();

?>
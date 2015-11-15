<?php  

$callbackUrl = "http://localhost/ESETGuvenlikOyunu/";
$oauthTimestamp = time();
$nonce = md5(mt_rand()); 
$oauthSignatureMethod = "HMAC-SHA1"; 
$oauthVersion = "1.0";

$oauthToken = "1088476568-78jdCjuukHwLBLKqhNlWGh5BJxwUKu99Kg5ebRD";

$consumerKey = "yZxCVq8fAUiRW7sJcCCkI16Fi";

$oauthTokensString = twitterRequest("POST", "https://api.twitter.com/oauth/access_token",
		array("oauth_verifier" => $_GET["oauth_verifier"]),
		array(
			"oauth_consumer_key" => $consumerKey,
			"oauth_nonce" => $nonce,
			"oauth_signature_method" => $oauthSignatureMethod,
			"oauth_timestamp" => $oauthTimestamp,
			"oauth_token" => $_GET["oauth_token"],
			"oauth_version" => $oauthVersion
		));

var_dump($oauthTokensString);

parse_str($oauthTokensString);

var_dump($oauth_token);
var_dump($oauth_token_secret);

$oauthTimestamp = time();
$nonce = md5(mt_rand()); 



$infoJson = json_decode(twitterRequest("GET", "https://api.twitter.com/1.1/account/verify_credentials.json", array(),
	array(
		"oauth_consumer_key" => $consumerKey,
		"oauth_nonce" => $nonce,
		"oauth_signature_method" => $oauthSignatureMethod,
		"oauth_timestamp" => $oauthTimestamp,
		"oauth_token" => $oauth_token,
		"oauth_version" => $oauthVersion
	), $oauth_token_secret));

setcookie('platform_id', (int)$infoJson->id, (time() + 86400), "/");


function twitterRequest($method, $requestTokenUrl, $params, $oauthParams,
	 $oauthTokenSecret = "2OW7cq5mQanDUxw49ln6pU8HZorzWF37eu0D18jdn0deh") {
	$curl = curl_init();

	$sigBaseArray = array();

	$consumerSecret = "vP9ECrfJWxN36xASz9RS2gD2ouyf7thH3yfcbHRkHGrLm2YMJJ";

	foreach ($params as $key => $value) {
		$sigBaseArray[$key] = $value;
	}

	foreach ($oauthParams as $key => $value) {
		$sigBaseArray[$key] = $value;	
	}

	$sigBaseArray = array_map("rawurlencode", $sigBaseArray);

	asort($sigBaseArray);
	ksort($sigBaseArray);

	$sigBase = $method."&".rawurlencode($requestTokenUrl);
	$sigParamString = urldecode(http_build_query($sigBaseArray, '', '&'));

	$sigBase = $sigBase."&".rawurlencode($sigParamString);

	var_dump($sigBase);

	$sigKey = rawurlencode($consumerSecret) . "&" . rawurlencode($oauthTokenSecret);
	$oauthSig = base64_encode(hash_hmac("sha1", $sigBase, $sigKey, true));

	var_dump($oauthSig);

	$oauthParams["oauth_signature"] = $oauthSig;
	var_dump(buildAuthorizationHeader($oauthParams));
	$headers = array(
		"Authorization: ".buildAuthorizationHeader($oauthParams)
	);

	curl_setopt($curl, CURLOPT_URL, $requestTokenUrl);
	curl_setopt_array($curl, array(
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => false,
		CURLOPT_HTTPHEADER => $headers,
		CURLOPT_RETURNTRANSFER => true
	));
	if($method === "POST") {
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
	}

	$resultString = curl_exec($curl);

	curl_close($curl);
	return $resultString;
}

function buildAuthorizationHeader($oauthParams) {
	$oauthString = "OAuth ";
	$first = true;
	foreach ($oauthParams as $key => $value) {
		$oauthString .= (($first)?"":", ").$key."="."\"".rawurlencode($value)."\"";
		$first = false;
	}
	return $oauthString;
}

$data = array(
	"function" => "addUser",
	"data" => array(
		"name" => $infoJson->name,
		"platform" => 1,
		"platform_id" => $infoJson->id,
		"email" => "NULL"
	)
);

$ch = curl_init();

curl_setopt_array($ch, array(
	CURLOPT_URL => "http://localhost/ESETGuvenlikOyunu/controller/Process.php",
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => http_build_query($data),
	CURLOPT_RETURNTRANSFER => true
));

curl_exec($ch);

curl_close($ch);

header("Location: http://localhost/ESETGuvenlikOyunu/oyun");
die();

?>
<?php  

class SM_Helper {

	public function __construct() {

	}

	public function connectFacebook() {
		header("Location: https://www.facebook.com/dialog/oauth?".
		    "client_id=1665895287021960".
		    "&redirect_uri=http://localhost/ESETGuvenlikOyunu/controller/facebook_return.php");
	}

	public function connectTwitter() {
		$oauth_token = $this->twitterRequestToken();
		header("Location: https://api.twitter.com/oauth/authenticate?oauth_token=".$oauth_token);
	}

	function twitterRequestToken() {
		$curl = curl_init();

		$requestTokenUrl = "https://api.twitter.com/oauth/request_token";
		$callbackUrl = "http://localhost/ESETGuvenlikOyunu/controller/twitter_return.php";
		$oauthTimestamp = time();
		$nonce = md5(mt_rand()); 
		$oauthSignatureMethod = "HMAC-SHA1"; 
		$oauthVersion = "1.0";

		$oauthToken = "1088476568-78jdCjuukHwLBLKqhNlWGh5BJxwUKu99Kg5ebRD";
		$oauthTokenSecret = "2OW7cq5mQanDUxw49ln6pU8HZorzWF37eu0D18jdn0deh";

		$consumerKey = "yZxCVq8fAUiRW7sJcCCkI16Fi";
		$consumerSecret = "vP9ECrfJWxN36xASz9RS2gD2ouyf7thH3yfcbHRkHGrLm2YMJJ";

		$sigBaseArray = array(
			"oauth_consumer_key" => $consumerKey,
			"oauth_callback" => $callbackUrl,
			"oauth_nonce" => $nonce,
			"oauth_signature_method" => $oauthSignatureMethod,
			"oauth_timestamp" => $oauthTimestamp,
			"oauth_token" => $oauthToken,
			"oauth_version" => $oauthVersion
		);

		ksort($sigBaseArray);

		$sigBase = "POST&".rawurlencode($requestTokenUrl);
		$sigParamString = "";
		$first = true;
		foreach ($sigBaseArray as $key => $value) {
			$sigParamString .= (($first)?"":"&").$key."=".$value;
			$first = false;
		}

		$sigBase = $sigBase."&".rawurlencode($sigParamString);

		var_dump($sigBase);

		$sigKey = rawurlencode($consumerSecret) . "&" . rawurlencode($oauthTokenSecret);
		$oauthSig = base64_encode(hash_hmac("sha1", $sigBase, $sigKey, true));

		var_dump($oauthSig);

		$headers = array(
			"Authorization: OAuth oauth_consumer_key=\"".$consumerKey."\", ".
				"oauth_callback=\"".$callbackUrl."\", ".
				"oauth_nonce=\"".$nonce."\", ".
				"oauth_signature_method=\"".$oauthSignatureMethod."\", ".
				"oauth_timestamp=\"".$oauthTimestamp."\", ".
				"oauth_token=\"".$oauthToken."\", ".
				"oauth_signature=\"". rawurlencode($oauthSig)."\", ".
				"oauth_version=\"".$oauthVersion."\""
		);

		curl_setopt($curl, CURLOPT_URL, $requestTokenUrl);
		curl_setopt_array($curl, array(
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_HTTPHEADER => $headers,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true
		));

		$array = parse_str(curl_exec($curl));

		return $oauth_token;
		
	}

}

?>
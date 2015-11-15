<?php  

class SM_Helper {

	public function __construct() {

	}

	public function connectFacebook() {
		header("Location: https://www.facebook.com/dialog/oauth?".
		    "client_id=1665895287021960".
		    "&redirect_uri=http://localhost/esetGuvenlik/facebook_return.php");
	}

	public function connectTwitter() {
		
	}

}

?>
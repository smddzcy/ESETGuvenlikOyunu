<?php
const BASE_URL = "http://localhost/ESETGuvenlikOyunu/";
?>
<html>
	<head>
		<title>ESET Güvenlik Oyunu</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
		<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/sweetalert2.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

	</head>
	<body>
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '1665895287021960',
	      xfbml      : true,
	      version    : 'v2.5'
	    });
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));

	  function shareFacebook() {
	    FB.ui({
	      method: 'share',
	      href: 'http://localhost/ESETGuvenlikOyunu/',
	    }, function(response){

	    });
	  }
	</script>
	<script>window.twttr = (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0],
	    t = window.twttr || {};
	  if (d.getElementById(id)) return t;
	  js = d.createElement(s);
	  js.id = id;
	  js.src = "https://platform.twitter.com/widgets.js";
	  fjs.parentNode.insertBefore(js, fjs);
	 
	  t._e = [];
	  t.ready = function(f) {
	    t._e.push(f);
	  };
	 
	  return t;
	}(document, "script", "twitter-wjs"));</script>
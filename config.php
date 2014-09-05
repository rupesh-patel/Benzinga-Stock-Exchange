<?php 
	///////////////////////
	// SITE CONFIGURATION//
	///////////////////////
	
    $path_http = pathinfo('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);	
	$path_https = pathinfo('https://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
   
    define("BASE_PATH",$_SERVER['DOCUMENT_ROOT']);
	define("SITE_URL", $path_http['dirname']);
	define("STOCK_URL",'http://data.benzinga.com/stock/');
	define("SITE_NAME", 'Benzinga Stock Exchange');
	// setting the sessions for portfolio
	session_start();
	unset($_SESSION['cash']);
	if(!isset($_SESSION['portfolio'])){
	    
	    $_SESSION['portfolio'] = array();
		$_SESSION['portfolio']['cash'] = 100000;
		$_SESSION['portfolio']['stocks'] = array();
	}
	
	// valid actions in stock exchange
	$validActions = array('sell','buy');
?>
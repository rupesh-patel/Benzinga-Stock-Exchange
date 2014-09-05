<?php require_once('config.php');?>
<?php require_once('functions.php');?>
<?php 
    
    header('Content-Type: application/json');
	
	if(!isset( $_GET['sym'] ) || $_GET['sym'] == ''){
		echo json_encode(array('status' => 'error', 'msg' => 'Please enter symbol'));
		exit;
	}
	$sym = $_GET['sym'];
	$url = STOCK_URL.$sym;
	if(is_url_exist($url)){
		echo file_get_contents($url);
	}
	else
	{
	   echo json_encode(array('status' => 'error', 'msg' => 'Symbol not found'));
	}
	
?>
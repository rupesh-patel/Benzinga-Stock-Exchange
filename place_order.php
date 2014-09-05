<?php 
	require_once('config.php');
    require_once('functions.php');
	$post = $_POST;
	header('Content-Type: application/json');
	// validating the order request //
    if(!isset($post['sym']) || !isset($post['qty']) || (int)$post['qty'] == 0 )
	{
		echo json_encode(array('status' => 'error', 'msg' => 'Please enter valid quantity greater than zero'));
		exit;
	}
	
	if(!isset($post['action']) || !in_array($post['action'],$validActions))
	{
		echo json_encode(array('status' => 'error', 'msg' => 'Invalid Operation'));
		exit;
	}
	//////////////////////////////////
	
	$sym = $post['sym'];
	$qty = (int)$post['qty'];
	$action = $post['action'];
	$url = STOCK_URL.$sym;
	
	if(is_url_exist($url)){
		$data = file_get_contents($url);
		$data = json_decode($data);
		if(isset($data->status) && $data->status == 'error'){
			echo json_encode($data);
			exit;
		}
		
		$response = placeOrder($data,$qty,$action);
		echo json_encode($response);
		exit;
		
	}
	else
	{
	   echo json_encode(array('status' => 'error', 'msg' => 'Symbol not found'));
	   exit;
	}
	


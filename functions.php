<?php 
/* Function to check if url is exist or 404 */
function is_url_exist($url){
    $ch = curl_init($url);    
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($code == 200){
       $status = true;
    }else{
      $status = false;
    }
    curl_close($ch);
   return $status;
}

function placeOrder($data,$qty,$action){
    $data = json_decode(json_encode($data), true);
	$cash = $_SESSION['portfolio']['cash'];
	$response = array();
	if($action == 'buy')
	{
		
		$ask = $data['ask'];
		$asksize = $data['asksize'];
		$possibleQty = min($asksize,$qty);
		$orderAmount = $possibleQty*$ask;
		
		if($possibleQty == 0)
		{
			return array('status' => 'error' , 'msg' => 'Orders is not possible as no bids are found' );
		}
		
		if( $cash < $orderAmount)
		{
			return array('status' => 'error' , 'msg' => 'Not enough cash to make purchase of $'.$orderAmount );
		}
		$cash = $cash - $orderAmount;
		$response = array('status' => 'success' , 'msg' => $possibleQty .' share(s) are bought at price $'.$ask);
	}
	elseif( $action == 'sell' )
	{
		if(!isset($_SESSION['portfolio']['stocks'][$data['symbol']]))
		{
			return array('status' => 'error' , 'msg' => 'Orders is not possible as You do not have current stock in portfolio.' );
		}
		$stock = $_SESSION['portfolio']['stocks'][$data['symbol']];
		if($qty>$stock['qty'])
		{
			return array('status' => 'error' , 'msg' => 'You have only '.$stock['qty'].' shares of the current stock to sell.' );
		}
		
		$bid = $data['bid'];
		$bidsize = $data['bidsize'];
		$possibleQty = min($bidsize,$stock['qty'],$qty);
		$orderAmount = $possibleQty*$bid;
		$cash = $cash + $orderAmount;
		$response = array('status' => 'success' , 'msg' => $possibleQty .' share(s) are sold at price $'.$bid);
	}
	$_SESSION['portfolio']['cash'] = $cash;
	updatePortfolioStock($data,$possibleQty,$action);
	return $response;
}

function updatePortfolioStock($data,$qty,$action){
    $qty = $action == 'buy' ? $qty : -1*$qty;
	$priceKey = $action == 'buy' ? 'ask' : 'bid'; 
	if(isset($_SESSION['portfolio']['stocks'][$data['symbol']]))
	{
		$stock = $_SESSION['portfolio']['stocks'][$data['symbol']];
		$stock['qty'] = $stock['qty']+$qty;
		$stock['bid'] = $data['bid'];
		$stock['bidsize'] = $data['bidsize'];
		$stock['ask'] = $data['ask'];
		$stock['asksize'] = $data['asksize'];
		$stock['purchase_price'] = $data[$priceKey];
	}
	else
	{
		$stock['symbol'] = $data['symbol'];
		$stock['name'] = $data['name'];
		$stock['bid'] = $data['bid'];
		$stock['bidsize'] = $data['bidsize'];
		$stock['ask'] = $data['ask'];
		$stock['asksize'] = $data['asksize'];
		$stock['purchase_price'] = $data[$priceKey];
		$stock['qty'] = $qty;
	}
	$_SESSION['portfolio']['stocks'][$data['symbol']] = $stock;
}
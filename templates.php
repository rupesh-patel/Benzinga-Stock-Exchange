<script type="text/html" id="right_template">
	<div id="info">
		<h3 style="float:left" > Current Portfolio</h3>
		<h3 style="float:right" > <span>$</span>${cash}</h3>
	</div>
	
	<div id="cur_stock_tabel" class="container">
		<div class="heading">
			<div class="col">Company</div>
			<div class="col">Symbol</div>
			<div class="col">Quantity </div>
			<div class="col">Price Paid</div>
			<div class="col">&nbsp; </div>
		</div>
		{{each stocks}}
		<div id="cur_stock" class="table-row">
			 <div class="col">${name}</div>
			 <div class="col">${symbol}</div>
			 <div class="col">${qty}</div>
			 <div class="col">${purchase_price}</div>
			 <div class="col"><a class="btn" onclick="getStock('${symbol}')">View Stock</a></div>
		</div>
		{{/each}}
	</div>
</script>

<script type="text/html" id="left_template">
	<div id="stock_details">
		<h3> ${name} (${symbol}) </h3>
	</div>
	
	<div id="cur_stock_tabel" class="container">
		<div class="heading">
			 <div class="col">Bid</div>
			 <div class="col">Bid Size </div>
			 <div class="col">Ask</div>
			 <div class="col">Ask Size </div>
		</div>
		<div id="cur_stock" class="table-row">
			 <div class="col">${bid}</div>
			 <div class="col">${bidsize}</div>
			 <div class="col">${ask}</div>
			 <div class="col">${asksize}</div>
		</div>
	</div>
	
	<div class="container">
	   <div  class="table-row">
			 <div class="col"> <input type="text" placeholder="Quantity" id="qty_input"></div>
			 <div class="col"> <a class="btn" onclick="placeOrder('${symbol}','buy')">Buy</a></div>
			 <div class="col"><a class="btn"  onclick="placeOrder('${symbol}','sell')">Sell</a></div>
		</div>
	</div>
	<br/>
	 <a class="btn" href="<?php echo SITE_URL?>/developers_notes.php">My Notes</a>
</script>
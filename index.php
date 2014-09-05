<?php require_once('config.php');?>
<?php 
//var_dump($_SESSION);
?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery.js"></script>
	<script src="js/template/tmpl.min.js"></script>
	<script>
		var portfolio = <?php echo json_encode($_SESSION['portfolio']);?>;
		var cur_stock = {};
		var SITE_URL = '<?php echo SITE_URL;?>';
	</script>
	<?php require_once('templates.php');?>
	<script src="js/script.js"></script>
	<title> Stock Exchange</title>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>
					<?php echo SITE_NAME;?>
				</h1>
				 <form class="form-wrapper" onsubmit="return lookup();">
					<input type="text" id="search" placeholder="Enter Symbol" required>
					<input type="submit" value="Lookup" id="submit">
				</form>
			</div>
			
			<div id="content">
			   
				<div class="left">
					<div id="stock_details">
						<h3>  </h3>
					</div>
					
					<div id="cur_stock_tabel" class="container">
						<div class="heading">
							 <div class="col">Bid</div>
							 <div class="col">Bid Size </div>
							 <div class="col">Ask</div>
							 <div class="col">Ask Size </div>
						</div>
						<div id="cur_stock" class="table-row">
							 <div class="col"></div>
							 <div class="col"></div>
							 <div class="col"></div>
							 <div class="col"></div>
						</div>
					</div>
					
					<div class="container">
					   <div  class="table-row">
							 <div class="col"> <input type="text" id="qty_input"></div>
							 <div class="col"> <a class="btn">Buy</a></div>
							 <div class="col"><a class="btn">Sell</a></div>
						</div>
					</div>
				</div>
				
				<div class="right">
					
					<div id="info">
						<h3 style="float:left" > Current Portfolio</h3>
						<h3 style="float:right" > $100000</h3>
					</div>
					
					<div id="cur_stock_tabel" class="container">
						<div class="heading">
							 <div class="col">Company</div>
							 <div class="col">Quantity </div>
							 <div class="col">Price Paid</div>
							 <div class="col">&nbsp; </div>
						</div>
						<div id="cur_stock" class="table-row">
							 <div class="col"></div>
							 <div class="col"></div>
							 <div class="col"></div>
							 <div class="col"><a class="btn">View Stock</a></div>
						</div>
					</div>
				</div>

			
			</div>
			<img src="images/ajax-loader.gif" class="loading" alt="loading"/>
			<div class="message">Welcome to <?php echo SITE_NAME;?></div>
			<div id="footer">
				Copyright © <?php echo SITE_NAME;?>, 2014
			</div>
		</div>
	</body>
</html>
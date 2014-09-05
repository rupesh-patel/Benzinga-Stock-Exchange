<?php require_once('config.php');?>
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
	<style>
	.col{font-size: 20px;
    height: 50px;
    padding: 15px;
    text-align: left;}
	</style>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>
					Developer's Notes
				</h1>
				
			</div>
			
			<div id="content">
			   <a class="btn" href="<?php echo SITE_URL?>">Back</a>
			   <div  class="container">
						<div class="heading">
							 <div class="col">Here is the details what I have understood from the document, and implemented accordingly.</div>
							 
						</div>
						<div  class="table-row">
						    <div class="col">Portfolio data is stored in session</div>
						</div>
						<div  class="table-row">
							<div class="col">Session Time out of this server : <?php echo (ini_get("session.gc_maxlifetime")/60);?> Mins </div>
						</div>
						<div  class="table-row">	
							<div class="col">In case of inactivity portfolio will be refreshed in <?php echo (ini_get("session.gc_maxlifetime")/60);?> Mins </div>
						</div>
						<div  class="table-row">	
							<div class="col">Stock information is retrived from "<?php echo STOCK_URL?>{symbol}"</div>
						</div>
						<div  class="table-row">	
							<div class="col">Buy/Sell Orders are based on ask/bid values </div>
						</div>
						<div  class="table-row">	
							<div class="col">Buy/Sell will occur on maximum possible quantity (qty = 10 , asksize =4 , maximum possible quantity=4  for buy order)</div>
						</div>
					</div>
				

			
			</div>
			<div id="footer">
				Copyright © <?php echo SITE_NAME;?>, 2014
			</div>
		</div>
	</body>
</html>
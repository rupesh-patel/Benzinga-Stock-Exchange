$(document).ready(function(){
	console.log(portfolio);
	$('.right').html('');
	$('#right_template').tmpl([portfolio]).appendTo('.right');
	getStock('AAPL');
	$('.message').hide();
	$('.message').click(function(){
		$(this).fadeOut('slow',function(){
			$('.message').hide();
		});
	});
	
	$('.message').mousemove(function(){
		$(this).fadeOut('slow',function(){
			$('.message').hide();
		});
	});
});

function getStock(sym){
    loading();
	$.get(SITE_URL+'/get_stock.php?sym='+sym,function(data){
		if(data.status && data.status == 'error')
		{
			showMessage(data);
			return false;
		}
		cur_stock = data;
		$('.left').html('');
		$('#left_template').tmpl([cur_stock]).appendTo('.left');
		stopLoading();
	}).error(function(){
		 stopLoading();
		 showMessage({msg:'Something went wrong, Please try again later'});
	});
	
}

function lookup(){
	getStock($('#search').val());
	return false;
}

function placeOrder(sym,action){
	var qty = $('#qty_input').val();
	qty = parseInt(qty);
	if(qty ==0)
	{
		showMessage({msg:'Please Enter valid quantity.'});
		return false;
	}
	loading();
	var pData = { sym : sym , action : action , qty : qty};
	$.post(SITE_URL+'/place_order.php',pData,function(data){
	    stopLoading();
		refreshPortfolioData();
		showMessage(data);
	}).error(function(){
		 stopLoading();
		 showMessage({msg:'Something went wrong, Please try again later'});
	});
}

function refreshPortfolioData(){
	loading();
	$.get(SITE_URL+'/get_portfolio.php',function(data){
		portfolio = data;
		$('.right').html('');
		$('#right_template').tmpl([portfolio]).appendTo('.right');
		stopLoading();
	});
}

function showMessage(data){
    $('.message').html(data.msg);
	$('.message').show();
	$('.message').fadeIn('slow');
	
}
function loading(){
	$('.loading').show();
}
function stopLoading(){
	$('.loading').hide();
}
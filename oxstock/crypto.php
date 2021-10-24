<?php

require_once 'classes/configure.php'; 

include('header.php'); ?>

<!---------------------- end priching ---------------->
<style type="text/css">
	.table {
		display: table;
		text-align: center;
		margin: 10% auto 0;
		border-collapse: separate;
		font-family: 'Roboto', sans-serif;
		font-weight: 400;
	}

	.table_row {
		display: table-row;
	}

	.theader {
		display: table-row;
	}

	.table_header {
		display: table-cell;
		background: #293143;
		color: #9daabf;
		padding-top: 10px;
		padding-bottom: 10px;
		font-weight: 700;
	}

	.table_header:first-child {
		border-top-left-radius: 5px;
	}

	.table_header:last-child {
		border-right: #ccc 1px solid;
		border-top-right-radius: 5px;
	}

	.table_small {
		display: table-cell;
	}

	.table_row > .table_small > .table_cell:nth-child(odd) {
		display: none;
		background: #bdbdbd;
		color: #e5e5e5;
		padding-top: 10px;
		padding-bottom: 10px;
	}

	.table_row > .table_small > .table_cell {
		padding-top: 5px;
		padding-bottom: 5px;
		color: #9daabf;
		border-bottom: #ccc 1px solid;
	}

	.table_row > .table_small:first-child > .table_cell {
		border-left: #ccc 1px solid;
	}

	.table_row > .table_small:last-child > .table_cell {
		border-right: #ccc 1px solid;
	}

	.table_row:last-child > .table_small:last-child > .table_cell:last-child {
		border-bottom-right-radius: 5px;
	}

	.table_row:last-child > .table_small:first-child > .table_cell:last-child {
		border-bottom-left-radius: 5px;
	}
	.pagination-page{
		margin-top: 20px !important;
		float: right !important;
	}
	.table_cell img{
		max-width: 40px !important;
	}
	.red-txt{
		color: #e15241!important;
	}
	.green-txt{
		color: #4eaf0a!important;
	}
	.table_cellimg{
		float: left;
		height: auto;
	}
	.table_cellimg .left{
		float: left;
	}
	.table_cellimg .right{
		float: right;
	}

	@media screen and (max-width: 900px) {
		.table {
			width: 90%
		}
	}

	@media screen and (max-width: 650px) {
		.table {
			display: block;
		}
		.table_row:nth-child(2n+3) {
			background: none;
		}
		.theader {
			display: none;
		}
		.table_row > .table_small > .table_cell:nth-child(odd) {
			display: table-cell;
			width: 50%;
		}
		.table_cell {
			display: table-cell;
			width: 50%;
		}
		.table_row {
			display: table;
			width: 100%;
			border-collapse: separate;
			padding-bottom: 20px;
			margin: 5% auto 0;
			text-align: center;
		}
		.table_small {
			display: table-row;
		}
		.table_row > .table_small:first-child > .table_cell:last-child {
			border-left: none;
		}
		.table_row > .table_small > .table_cell:first-child {
			border-left: #ccc 1px solid;
		}
		.table_row > .table_small:first-child > .table_cell:first-child {
			border-top-left-radius: 5px;
			border-top: #ccc 1px solid;
		}
		.table_row > .table_small:first-child > .table_cell:last-child {
			border-top-right-radius: 5px;
			border-top: #ccc 1px solid;
		}
		.table_row > .table_small:last-child > .table_cell:first-child {
			border-right: none;
		}
		.table_row > .table_small > .table_cell:last-child {
			border-right: #ccc 1px solid;
		}
		.table_row > .table_small:last-child > .table_cell:first-child {
			border-bottom-left-radius: 5px;
		}
		.table_row > .table_small:last-child > .table_cell:last-child {
			border-bottom-right-radius: 5px;
		}
	}
</style>

<section class="cript_body">

	<div class="container">

		<!-- <img src="plugin/images/cript-body.png"> -->
		<div class="col-md-12">
			<div class="col-md-3">
				<div class="form-group">
					<label for="pwd">Filter By Keyword:</label>
					<input type="text" class="form-control" name="search_keyword" id="search_keyword">
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="page_size">Page Size :</label>
					<select class="form-control" id="page_size" name="page_size">
						<option value="10">10</option>
						<option value="20">20</option>
						<option value="50">50</option>
						<option value="100">100</option>
					</select>
				</div>
			</div>
		</div>
		<div class="table" id="currency_listing">
			<div class='theader'>
				<div class='table_header'>Rank</div>
				<div class='table_header'>Coin</div>
				<div class='table_header'>Price</div>
				<div class='table_header'>Market Cap</div>
				<div class='table_header'>Volume 24h</div>
				<div class='table_header'>All Time High</div>
				<div class='table_header'>1h</div>
				<div class='table_header'>24h</div>
				<div class='table_header'>Weekly</div>
			</div>
		</div>
		<div class="pagination-page"></div>
	</div>

</section>



<!---------------------- footer ---------------->

<?php include('footer.php'); ?>

<script type="text/javascript">
	var MAIN_URL = 'http://93.177.64.191/oxstock/';
	var API_END_POINT = 'http://93.177.64.191/oxstock/nomics.php';
	var pageNo = 1;
	function getCurrencyListingData(){
		$("div#currency_listing .table_row").remove();
		var perPage = $("#page_size").val();
        $.ajax({
            cache: false,
            url: API_END_POINT,
            type: "POST",
            dataType: "json",
            data: {action:'get_currency_listing',perPage:perPage,pageNo:pageNo},
            success: function (response) {
                var html = '';
                if(response.status && response.data.length > 0){
                    for (var i = 0; i <= (response.data.length - 1); i++) {
                        html += `
                        	<div class='table_row'>
								<div class='table_small'>
									<div class='table_cell'>Rank</div>
									<div class='table_cell'>`+response.data[i].rank+`</div>
								</div>
								<div class='table_small' onclick="window.location.href = '`+MAIN_URL+`crypto-details.php?code=`+response.data[i].currency+`'" style="cursor: pointer;">
									<div class='table_cell'>Coin</div>
									<div class='table_cell table_cellimg'>
										<div class="left">
											<img src="`+response.data[i].logo_url+`" width="25" height="25">
										</div>
										<div class="right">
											<span>
												`+response.data[i].currency+`
												<br/>
												`+response.data[i].name+`
											</span>
										</div>
									</div>
								</div>
								<div class='table_small'>
									<div class='table_cell'>Price</div>
									<div class='table_cell'>$`+convertToInternationalCurrencySystem(response.data[i].price)+`</div>
								</div>
								<div class='table_small'>
									<div class='table_cell'>Market Cap</div>
									<div class='table_cell'>$`+convertToInternationalCurrencySystem(response.data[i].market_cap)+`</div>
								</div>
								<div class='table_small'>
									<div class='table_cell'>Volume 24h</div>
									<div class='table_cell'>$`+convertToInternationalCurrencySystem(response.data[i]['1d'].volume)+`</div>
								</div>
								<div class='table_small'>
									<div class='table_cell'>All Time High</div>
									<div class='table_cell'>$`+convertToInternationalCurrencySystem(response.data[i].high)+`</div>
								</div>
								<div class='table_small'>
									<div class='table_cell'>1h</div>
									<div class='table_cell `+((response.data[i]['1h'] && response.data[i]['1h'].price_change_pct) ? 'green-txt' : 'red-txt')+`'>`+((response.data[i]['1h'] && response.data[i]['1h'].price_change_pct) ? parseFloat(response.data[i]['1h'].price_change_pct).toFixed(3)+'%' : '')+`
									</div>
								</div>
								<div class='table_small'>
									<div class='table_cell'>24h</div>
									<div class='table_cell `+((response.data[i]['1d'] && response.data[i]['1d'].price_change_pct) ? 'green-txt' : 'red-txt')+`'>`+((response.data[i]['1d'] && response.data[i]['1d'].price_change_pct) ? parseFloat(response.data[i]['1d'].price_change_pct).toFixed(3)+'%' : '')+`
									</div>
								</div>
								<div class='table_small'>
									<div class='table_cell'>Weekly</div>
									<div class='table_cell'>
										<img class="" alt="bitcoin (BTC) 7d chart" src="https://www.coingecko.com/coins/1/sparkline">
									</div>
								</div>
							</div>`;
						if(i == (response.data.length - 1)){
	                    	$("div#currency_listing").append(html);
	                    	response.totalItems = parseInt(response.totalItems);
	                    	paginationTable(response.totalItems);
	                    }
                    }
                }
                else{
                	html =+ `<div class='table_row'><p>No Data Available to show </p></div>`;
                    console.log(response.message);
                    $("div#currency_listing").append(html);
                    paginationTable(0);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log("Something went wrong! Please try again.");
            }
        });
    }
	function paginationTable(totalItems){
		var items = $("div#currency_listing .table_row");
		console.log('items',items)
		var tablaeBody = $("div#currency_listing .tbody");
		console.log('tablaeBody',tablaeBody)
		var numItems = (totalItems > 0 ? totalItems : items.length);
		console.log('numItems',numItems)
		var perPage = $("#page_size").val();

		/*Only show the first 20 (or first `per_page`) items initially.*/
		//tablaeBody.html(items.slice(0,20));
		/*Now setup the pagination using the `.pagination-page` div.*/
		$(".pagination-page").pagination({
			currentPage : pageNo,
			items: numItems,
			itemsOnPage: perPage,
			cssStyle: "light-theme",

            // This is the actual page changing functionality.
            onPageClick: function(pageNumber) {
            	pageNo = pageNumber;
                // We need to show and hide `tr`s appropriately.
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;
                getCurrencyListingData();
                //tablaeBody.html(items.slice(showFrom,showTo));

            }
        });
	}
	$(document).ready(function(){
		setTimeout(function(){
			getCurrencyListingData();
		},1500)
	});
	$(document).on('change','#page_size',function(){
		pageNo = 1;
		getCurrencyListingData();
	})
</script>

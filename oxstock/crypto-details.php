<?php

require_once 'classes/configure.php'; 

include('header.php'); 

$code = isset($_GET['code']) && trim($_GET['code']) != '' ? trim($_GET['code']) : '';
$data = array();

function number_shorten($number, $precision = 3, $divisors = null) {

    // Setup default $divisors if not provided
    if (!isset($divisors)) {
        $divisors = array(
            pow(1000, 0) => '', // 1000^0 == 1
            pow(1000, 1) => 'K', // Thousand
            pow(1000, 2) => 'M', // Million
            pow(1000, 3) => 'B', // Billion
            pow(1000, 4) => 'T', // Trillion
            pow(1000, 5) => 'Qa', // Quadrillion
            pow(1000, 6) => 'Qi', // Quintillion
        );    
    }

    // Loop through each $divisor and find the
    // lowest amount that matches
    foreach ($divisors as $divisor => $shorthand) {
        if (abs($number) < ($divisor * 1000)) {
            // We found a match!
            break;
        }
    }

    // We found our match, or there were no matches.
    // Either way, use the last defined value for $divisor.
    return number_format($number / $divisor, $precision) . $shorthand;
}

if($code != ''){
	$api_key = '4d6309bd25541bc203a94472a080638a3d3d1b24';
	$service_url     = 'https://api.nomics.com/v1/currencies/ticker?key='.$api_key.'&interval=1h,1d,7d&convert=USD&ids='.$code;
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	$curl_response   = curl_exec($curl);
	if (curl_errno($curl)) {
		header('Location: index.php');
		exit;
	}
	curl_close($curl);
	$currencyData = json_decode($curl_response,true);
	if(count($currencyData) > 0){
		$data = $currencyData[0];
	}
	else{
		header('Location: index.php');
		exit;
	}
}
else{
	header('Location: index.php');
	exit;
}

?>	

    <!---------------------- end priching ---------------->

<!--
    <section class="cript_dtls">

        <div class="container">
    		<h2><?php echo $data['id'];?></h2>
    		<div class="list-group">
    			<a href="javascript:void(0);" class="list-group-item cryptodtltitle">
    				<img src="<?php echo $data['logo_url'];?>" height="50px" width="50px" alt="<?php echo $data['name'];?>">
    				<h6>Name : <?php echo $data['name'];?></h6>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Rank : </strong><?php echo $data['rank'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Price : </strong>$<?php echo number_shorten($data['price'],3);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Price DateTime : </strong><?php echo $data['price_date'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>High : </strong>$<?php echo number_shorten($data['high']);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>High Timestamp : </strong><?php echo $data['high_timestamp'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Circulating Supply : </strong> <?php echo $data['circulating_supply'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Max Supply : </strong>$<?php echo number_shorten($data['max_supply'],3);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Market Cap : </strong>$<?php echo number_shorten($data['market_cap'],3);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Market Cap Dominance : </strong><?php echo number_shorten($data['market_cap_dominance'],3);?>%
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Num Exchanges : </strong><?php echo $data['num_exchanges'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Num Pairs : </strong><?php echo $data['num_pairs'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>First Candle : </strong><?php echo $data['first_candle'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>First Trade : </strong><?php echo $data['first_trade'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>First Order Book : </strong><?php echo $data['first_order_book'];?>
    			</a>
    		</div>
  

    		<h4 style="color: #fff;">Last 7 Days</h4>
    		<div class="list-group">

    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Volume : </strong> $<?php echo number_shorten($data['7d']['volume'],3);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Price Change : </strong> $<?php echo number_shorten($data['7d']['price_change'],3);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Price Change Pct : </strong> <?php echo number_shorten($data['7d']['price_change_pct'],3);?>%
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Volume Change : </strong> $<?php echo number_shorten($data['7d']['volume_change'],3);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Volume Change Pct : </strong> <?php echo number_shorten($data['7d']['volume_change_pct'],3);?>%
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Market Cap Change : </strong> $<?php echo number_shorten($data['7d']['market_cap_change'],3);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Carket Cap Change Pct : </strong> <?php echo number_shorten($data['7d']['market_cap_change_pct'],3);?>
    			</a>
    		</div>
        </div>

    </section>

 <div class="cript_dtls">
            <div class="row">
                <div class="col-md-6">
        		  <h4 style="color: #fff;">Last Hour</h4>
            		<div class="list-group">
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Volume : </strong> $<?php echo number_shorten($data['1h']['volume'],3);?>
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Price Change : </strong> <?php echo number_shorten($data['1h']['price_change'],3);?>%
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Price Change Pct : </strong> <?php echo number_shorten($data['1h']['price_change_pct'],3);?>%
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Volume Change : </strong> $<?php echo number_shorten($data['1h']['volume_change'],3);?>
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Volume Change Pct : </strong> <?php echo number_shorten($data['1h']['volume_change_pct'],3);?>%
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Market Cap Change : </strong> $<?php echo number_shorten($data['1h']['market_cap_change'],3);?>
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Carket Cap Change Pct : </strong> <?php echo number_shorten($data['1h']['market_cap_change_pct'],3);?>
            			</a>
            		</div>
                </div>
                <div class="col-md-6">
            		<h4 style="color: #fff;">Last 24 Hours</h4>
            		<div class="list-group">
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Volume : </strong> $<?php echo number_shorten($data['1d']['volume'],3);?>
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Price Change : </strong> $<?php echo number_shorten($data['1d']['price_change'],3);?>
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Price Change Pct : </strong> <?php echo number_shorten($data['1d']['price_change_pct'],3);?>
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Volume Change : </strong> $<?php echo number_shorten($data['1d']['volume_change'],3);?>
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Volume Change Pct : </strong> <?php echo number_shorten($data['1d']['volume_change_pct'],3);?>%
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Market Cap Change : </strong> $<?php echo number_shorten($data['1d']['market_cap_change'],3);?>
            			</a>
            			<a href="javascript:void(0);" class="list-group-item">
            				<strong>Carket Cap Change Pct : </strong> <?php echo number_shorten($data['1d']['market_cap_change_pct'],3);?>
            			</a>
            		</div>
                </div>    
            </div>  
            </div>
-->


<section class="cript_bitcoin">
 <div class="container">
     <div class="row">
     <div class="col-lg-4">
         <div class="headdi-bit">
                    <img src="plugin/images/bitcoin_img.png">
                   <h2>Bitcoin</h2>
             <span>BTC</span>
             <button class="wishlist"><i class="fa fa-star-o" aria-hidden="true"></i></button>
         </div>
         <div class="rank">
         <span>Rank #1</span>
             <span>coin</span>
             <span>On 2,248,318 watchlists </span>
         </div>
         <div class="expolora">
         <button class="bitcoin"><i class="fa fa-link" aria-hidden="true"></i>bitcoin.org<i class="fa fa-external-link" aria-hidden="true"></i></button>      
             <select class="exp">
             <option value="">Explorers</option>
                 <option value=""><a target="_blank" href="blockchain.coinmarketcap.com">blockchain.coinmarketcap.com <i class="fa fa-external-link" aria-hidden="true"></i></a></option>
                 <option value=""><a target="_blank" href="blockchain.info">blockchain.info <i class="fa fa-external-link" aria-hidden="true"></i></a></option>
                 <option value=""><a target="_blank" href="live.blockcypher.com">live.blockcypher.com <i class="fa fa-external-link" aria-hidden="true"></i></a></option>
                 <option value=""><a target="_blank" href="blockchair.com">blockchair.com <i class="fa fa-external-link" aria-hidden="true"></i></a></option>
                 <option value=""><a target="_blank" href="explorer.viabtc.com">explorer.viabtc.com <i class="fa fa-external-link" aria-hidden="true"></i></a></option>
                 
             </select>
              <select class="exp">
                  <option value="">Community</option>
                  <option value=""><a target="_blank" href="bitcointalk.org">bitcointalk.org <i class="fa fa-external-link" aria-hidden="true"></i></a></option>
                  <option value=""><a target="_blank" href="reddit.com">reddit.com <i class="fa fa-external-link" aria-hidden="true"></i></a></option>                  
             </select>
             
                <button class="bitcoin"><i class="fa fa-code" aria-hidden="true"></i> Source code<i class="fa fa-external-link" aria-hidden="true"></i></button>
                <button class="bitcoin"><i class="fa fa-file-text-o" aria-hidden="true"></i> Whitepaper<i class="fa fa-external-link" aria-hidden="true"></i></button>
         </div>
         
         <div class="tag">
         <h4>Tag</h4>
            <span> Mineable</span>
             <span>PoW</span>
                <span>SHA-256</span>
                <span>Store of Value</span>
                <span>View all</span>
         </div>
         </div>
         <div class="col-lg-8">
         <div class="bitcoin_price">
             <div class="left_pric">
                 <h2><span>Bitcoin Price (BTC)</span>$43,929.52</h2>
                 <h5>14.53 ETH</h5>
                 <div class="low_div">
                 <span class="low">
                     Low:<b>$42,787.79</b>
                     </span>
                     <span class=underline> </span>
                     <span class="low">
                     High:<b>:$44,092.60</b>
                     </span>
                     <span class="hours">24h</span>
                 </div>
             </div>             
             <div class="right_price">
             <button class="buy">Buy</button>
             <button class="Exchange">Exchange</button>
             <button class="Gaming">Gaming</button>
             <button class="Earn_rypto">Earn Crypto</button>
             </div>
             </div>
           <div class="bitcoin_value">
               <div class="market-cap value_cap">
               <h4>Market Cap <i class="fa fa-info-circle" aria-hidden="true"></i></h4>
                <p>$826,667,110,155</p>
                <span class="green"><i class="fa fa-caret-up" aria-hidden="true"></i> 0.71%</span>
               </div>
               
                <div class="fully-dilute value_cap">
               <h4>Fully Diluted Market Cap <i class="fa fa-info-circle" aria-hidden="true"></i></h4>
                <p>$921,873,949,590</p>
                <span class="green"><i class="fa fa-caret-up" aria-hidden="true"></i> 0.71%</span>
               </div>
               
                <div class="volume value_cap">
               <h4>Volume<span>24h</span> <i class="fa fa-info-circle" aria-hidden="true"></i></h4>
                    <p>$28,319,776,082</p>
                <span class="read"><i class="fa fa-caret-down" aria-hidden="true"></i>  13.42%</span> 
               </div>
                 <div class="circulating-supply value_cap">
               <h4>Circulating Supply <i class="fa fa-info-circle" aria-hidden="true"></i></h4>
                    <p>$28,319,776,082</p>
                <span class="green"><i class="fa fa-caret-up" aria-hidden="true"></i> 90%</span>
               </div>
             </div>
         </div>
     </div>
    </div>
</section>
<section class="cript_menu">
<div class="container">
    <div class="row ">
    <div class="col-lg-10">
        <div class="menu">
        <ul>
            <li class="active"><a href="#">Overview</a></li>
            <li><a href="#">Market</a></li>
            <li><a href="#">Historical Data</a></li>
            <li><a href="#">Holders</a></li>
            <li><a href="#">Project Info</a></li>
            <li><a href="#">Wallets</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Socials</a></li>
            <li><a href="#">Ratings</a></li>
            <li><a href="#">Analysis</a></li>
            <li><a href="#">Price Estimates</a></li>
            </ul>
        </div>
        </div>
    <div class="col-lg-2">
        <div class="share_menu">
        <a href="#"><i class="fa fa-share" aria-hidden="true"></i> Share</a>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="cript_grap">
<div class="container">
    <div class="row">
    <div class="col-lg-8 col-md-7 col-sm-12">
        <div class="grap_con">
        <img src="plugin/images/price_grap.png">
        </div>
        <div class="btc_price_date">
        <h2>BTC Price Live Data</h2>
        <p>The live Bitcoin price today is $43,921.59 USD with a 24-hour trading volume of $28,346,862,598 USD. We update our BTC to USD price in real-time. Bitcoin is up 0.69% in the last 24 hours. The current CoinMarketCap ranking is #1, with a live market cap of $827,097,098,925 USD. It has a circulating supply of 18,831,218 BTC coins and a max. supply of 21,000,000 BTC coins.</p>

        <p>If you would like to know where to buy Bitcoin, the top exchanges for trading in Bitcoin are currently Binance, Huobi Global, Mandala Exchange, OKEx, and FTX. You can find others listed on our crypto exchanges page.</p>
          <h2> What Is Bitcoin (BTC)?</h2>
            <p>Bitcoin is a decentralized cryptocurrency originally described in a 2008 whitepaper by a person, or group of people, using the alias Satoshi Nakamoto. It was launched soon after, in January 2009.</p>

            <p>Bitcoin is a peer-to-peer online currency, meaning that all transactions happen directly between equal, independent network participants, without the need for any intermediary to permit or facilitate them. Bitcoin was created, according to Nakamoto’s own words, to allow “online payments to be sent directly from one party to another without going through a financial institution.”</p>

            <p>Some concepts for a similar type of a decentralized electronic currency precede BTC, but Bitcoin holds the distinction of being the first-ever cryptocurrency to come into actual use.</p>

            

        </div>
               
        
        
        </div>
    <div class="col-lg-4 col-md-5 col-sm-12">
        <div class="bit_convart">
        <h3>BTC to USD Converter</h3>
            <ul>
            <li>
                <div class="convart_img">
                    <div class="img">
                          <img src="plugin/images/bitcoin_img.png">
                    </div>
                   <div class="cont">
                       <p>btc</p>
                       <h2>Bitcoin</h2>                        
                   </div>
                </div>
                <span>1</span>
                </li>
            <li>
                <div class="convart_img">
                    <div class="img">
                          <img src="plugin/images/USD.svg">
                    </div>
                   <div class="cont">
                       <p>USD</p>
                       <h2>United States Dollar</h2>                        
                   </div>
                </div>
                <span>43970.85</span>
                </li>
            </ul>
        </div>
        
         <div class="cript_dtls">
    		<div class="list-group">
    			<a href="javascript:void(0);" class="list-group-item cryptodtltitle">
    				<img src="<?php echo $data['logo_url'];?>" height="50px" width="50px" alt="<?php echo $data['name'];?>">
    				<h6>Name : <?php echo $data['name'];?></h6>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Rank : </strong><?php echo $data['rank'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Price : </strong>$<?php echo number_shorten($data['price'],3);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Price DateTime : </strong><?php echo $data['price_date'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>High : </strong>$<?php echo number_shorten($data['high']);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>High Timestamp : </strong><?php echo $data['high_timestamp'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Circulating Supply : </strong> <?php echo $data['circulating_supply'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Max Supply : </strong>$<?php echo number_shorten($data['max_supply'],3);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Market Cap : </strong>$<?php echo number_shorten($data['market_cap'],3);?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Market Cap Dominance : </strong><?php echo number_shorten($data['market_cap_dominance'],3);?>%
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Num Exchanges : </strong><?php echo $data['num_exchanges'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>Num Pairs : </strong><?php echo $data['num_pairs'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>First Candle : </strong><?php echo $data['first_candle'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>First Trade : </strong><?php echo $data['first_trade'];?>
    			</a>
    			<a href="javascript:void(0);" class="list-group-item">
    				<strong>First Order Book : </strong><?php echo $data['first_order_book'];?>
    			</a>
    		</div>
<!--
             <div class="show_more">
             <a href="#">Show more</a>
             </div>
-->
             </div>
        </div>
    </div>
    </div>
</section>

<section class="bitcoin_mark_val">
<div class="container">
    <div class="row">
    <div class="col-lg-12">
        <div class="market_tab">
            <h2>Bitcoin Markets</h2>
            <ul class="nav nav-tabs" role="tablist" id="myTab">             
                <li><a href="#spot" role="tab" data-toggle="tab">Spot</a></li>
                <li class="active"><a href="#perpetual" role="tab" data-toggle="tab">Perpetual</a></li>
                <li><a href="#futures" role="tab" data-toggle="tab">Futures</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane" id="spot">
            <table>
                <tr>
                <th>#</th>
                <th>Source</th>
                <th>Pairs</th>
                <th>Price</th>
                <th>+2% Depth</th>
                <th>-2% Depth</th>
                <th>Volume</th>
                <th>Volume %</th>
                <th>Confidence</th>
                <th>Liquidity</th>
                <th>Updated</th>
                </tr>
                <tr>
                <td>1</td>
                <td><img src="plugin/images/con_1.png"><h4>Binance</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,972.15</td>
                <td>$25,882,008.72</td>
                <td>$15,056,199.63</td>
                <td>$1,988,181,751</td>
                <td>6.50%</td>
                <td class="green"><span>High</span></td>
                <td>506</td>
                <td>Recently</td>
                </tr>
                
                <tr>                
                <td>2</td>
                    <td><img src="plugin/images/con_2.png"><h4>Huobi Global</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,966.28</td>
                <td>$19,318,941.71</td>
                <td>$12,734,825.91</td>	
                <td>$812,598,489</td>
                <td>2.66%</td>
                    <td class="read"><span>Low</span></td>
                <td>908</td>
                <td>Recently</td>
                </tr>
                
                    <tr>
                <td>1</td>
                <td><img src="plugin/images/con_3.png"><h4>Binance</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,972.15</td>
                <td>$25,882,008.72</td>
                <td>$15,056,199.63</td>
                <td>$1,988,181,751</td>
                <td>6.50%</td>
                        <td class="green"><span>High</span></td>
                <td>506</td>
                <td>Recently</td>
                </tr>
                
                    <tr>
                <td>1</td>
                <td><img src="plugin/images/con4.png"><h4>Binance</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,972.15</td>
                <td>$25,882,008.72</td>
                <td>$15,056,199.63</td>
                <td>$1,988,181,751</td>
                <td>6.50%</td>
                        <td class="green"><span>High</span></td>
                <td>506</td>
                <td>Recently</td>
                </tr>
                <tr>                
                <td>2</td>
                    <td><img src="plugin/images/con_1.png"><h4>Huobi Global</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,966.28</td>
                <td>$19,318,941.71</td>
                <td>$12,734,825.91</td>	
                <td>$812,598,489</td>
                <td>2.66%</td>
                    <td class="read"><span>Low</span></td>
                <td>908</td>
                <td>Recently</td>
                </tr>
                    <tr>
                <td>1</td>
                <td><img src="plugin/images/con_2.png"><h4>Binance</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,972.15</td>
                <td>$25,882,008.72</td>
                <td>$15,056,199.63</td>
                <td>$1,988,181,751</td>
                <td>6.50%</td>
                        <td class="green"><span>High</span></td>
                <td>506</td>
                <td>Recently</td>
                </tr>
                </table>
            </div>
            <div class="tab-pane active" id="perpetual">
      <table>
                <tr>
                <th>#</th>
                <th>Source</th>
                <th>Pairs</th>
                <th>Price</th>
                <th>+2% Depth</th>
                <th>-2% Depth</th>
                <th>Volume</th>
                <th>Volume %</th>
                <th>Confidence</th>
                <th>Liquidity</th>
                <th>Updated</th>
                </tr>
                <tr>
                <td>1</td>
                <td><img src="plugin/images/con_1.png"><h4>Binance</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,972.15</td>
                <td>$25,882,008.72</td>
                <td>$15,056,199.63</td>
                <td>$1,988,181,751</td>
                <td>6.50%</td>
                <td class="green"><span>High</span></td>
                <td>506</td>
                <td>Recently</td>
                </tr>
                
                <tr>                
                <td>2</td>
                    <td><img src="plugin/images/con_2.png"><h4>Huobi Global</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,966.28</td>
                <td>$19,318,941.71</td>
                <td>$12,734,825.91</td>	
                <td>$812,598,489</td>
                <td>2.66%</td>
                    <td class="read"><span>Low</span></td>
                <td>908</td>
                <td>Recently</td>
                </tr>
                
                    <tr>
                <td>1</td>
                <td><img src="plugin/images/con_3.png"><h4>Binance</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,972.15</td>
                <td>$25,882,008.72</td>
                <td>$15,056,199.63</td>
                <td>$1,988,181,751</td>
                <td>6.50%</td>
                        <td class="green"><span>High</span></td>
                <td>506</td>
                <td>Recently</td>
                </tr>
                
                    <tr>
                <td>1</td>
                <td><img src="plugin/images/con4.png"><h4>Binance</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,972.15</td>
                <td>$25,882,008.72</td>
                <td>$15,056,199.63</td>
                <td>$1,988,181,751</td>
                <td>6.50%</td>
                        <td class="green"><span>High</span></td>
                <td>506</td>
                <td>Recently</td>
                </tr>
               
                </table>
            </div>
            <div class="tab-pane" id="futures">
                     <table>
                <tr>
                <th>#</th>
                <th>Source</th>
                <th>Pairs</th>
                <th>Price</th>
                <th>+2% Depth</th>
                <th>-2% Depth</th>
                <th>Volume</th>
                <th>Volume %</th>
                <th>Confidence</th>
                <th>Liquidity</th>
                <th>Updated</th>
                </tr>
                <tr>
                <td>1</td>
                <td><img src="plugin/images/con_1.png"><h4>Binance</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,972.15</td>
                <td>$25,882,008.72</td>
                <td>$15,056,199.63</td>
                <td>$1,988,181,751</td>
                <td>6.50%</td>
                <td class="green"><span>High</span></td>
                <td>506</td>
                <td>Recently</td>
                </tr>
                
                <tr>                
                <td>2</td>
                    <td><img src="plugin/images/con_2.png"><h4>Huobi Global</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,966.28</td>
                <td>$19,318,941.71</td>
                <td>$12,734,825.91</td>	
                <td>$812,598,489</td>
                <td>2.66%</td>
                    <td class="read"><span>Low</span></td>
                <td>908</td>
                <td>Recently</td>
                </tr>
                
                    <tr>
                <td>1</td>
                <td><img src="plugin/images/con_3.png"><h4>Binance</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,972.15</td>
                <td>$25,882,008.72</td>
                <td>$15,056,199.63</td>
                <td>$1,988,181,751</td>
                <td>6.50%</td>
                        <td class="green"><span>High</span></td>
                <td>506</td>
                <td>Recently</td>
                </tr>
                
                    <tr>
                <td>1</td>
                <td><img src="plugin/images/con4.png"><h4>Binance</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,972.15</td>
                <td>$25,882,008.72</td>
                <td>$15,056,199.63</td>
                <td>$1,988,181,751</td>
                <td>6.50%</td>
                        <td class="green"><span>High</span></td>
                <td>506</td>
                <td>Recently</td>
                </tr>
                <tr>                
                <td>2</td>
                    <td><img src="plugin/images/con_1.png"><h4>Huobi Global</h4></td>
                <td><a href="#">BTC/USDT</a></td>
                <td>$44,966.28</td>
                <td>$19,318,941.71</td>
                <td>$12,734,825.91</td>	
                <td>$812,598,489</td>
                <td>2.66%</td>
                    <td class="read"><span>Low</span></td>
                <td>908</td>
                <td>Recently</td>
                </tr>
                 
                </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

 
<section class=" bloc_cript_sec">
  
            <div class="container">
                  <div class="row">
    <div class="col-lg-12">
        <div class="blog_sec_headd">
         <h2>Bitcoin Markets</h2>
            <ul class="nav nav-tabs" role="tablist" id="myTab">             
                <li><a href="#latest-news" role="tab" data-toggle="tab">Latest News</a></li>
                <li class="active"><a href="#alexandria" role="tab" data-toggle="tab">Alexandria</a></li>
            </ul>
        </div>
        </div>
    </div>
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-12">
                          
<div class="singel_blog ">
    <a target="_blank" href="#">
        <div class="singel_blog_img ">
            <img src="plugin/images/blog-img.png">
        </div>
        <div class="singel_blog_cont">
            <h3>Bitfarms surges on record quarterly BTC production in Q3</h3>
            <p >Bitfarms (NASDAQ:BITF) gains&nbsp;11.1%&nbsp;premarket on Q3 bitcoin production growth of 38% Q/Q to1,050 BTC. The company mined 305 new Bitcoin in the month of September and 2,407 on YTD basis. Through Septmber, 30, the company deposited 2,312 BTC into custody, ~96% of company's BTC produ...</p>
            <div class="svowul-4 ">
                <span >Seeking Alpha</span>
                <span>44 minutes ago</span>
                <div class="svowul-9 ">
                  <img src="plugin/images/biticon-icon-img.png">
                    Bitcoin
                </div>
            </div>
        </div>
        
        
    </a>
</div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12">
                     <div class="right_blog">
<div class="svowul-5 ">
    <a target="_blank" href="#">
        <div class="svowul-2">
            <h3>Bitfarms surges on record quarterly BTC production in Q3</h3>
            <p >Bitfarms (NASDAQ:BITF) gains&nbsp;11.1%&nbsp;premarket on Q3 bitcoin production growth of 38% Q/Q to1,050 BTC. The company mined 305 new Bitcoin in the month of September and 2,407 on YTD basis. Through Septmber, 30, the company deposited 2,312 BTC into custody, ~96% of company's BTC produ...</p>
            <div class="svowul-4 ">
                <span >Seeking Alpha</span>
                <span>44 minutes ago</span>
                <div class="svowul-9 ">
                    <img src="plugin/images/biticon-icon-img.png">
                    Bitcoin
                </div>
            </div>
        </div>
        
        <div class="svowul-1 ">
            <img src="plugin/images/blog-img.png">
        </div>
    </a>
</div>
    
<div class="svowul-5 ">
    <a target="_blank" href="#">
        <div class="svowul-2">
            <h3>Bitfarms surges on record quarterly BTC production in Q3</h3>
            <p >Bitfarms (NASDAQ:BITF) gains&nbsp;11.1%&nbsp;premarket on Q3 bitcoin production growth of 38% Q/Q to1,050 BTC. The company mined 305 new Bitcoin in the month of September and 2,407 on YTD basis. Through Septmber, 30, the company deposited 2,312 BTC into custody, ~96% of company's BTC produ...</p>
            <div class="svowul-4 ">
                <span >Seeking Alpha</span>
                <span>44 minutes ago</span>
                <div class="svowul-9 ">
                  <img src="plugin/images/biticon-icon-img.png">
                    Bitcoin
                </div>
            </div>
        </div>
        
        <div class="svowul-1 ">
            <img src="plugin/images/blog-img.png">
        </div>
    </a>
</div>
    
<div class="svowul-5 ">
    <a target="_blank" href="#">
        <div class="svowul-2">
            <h3>Bitfarms surges on record quarterly BTC production in Q3</h3>
            <p >Bitfarms (NASDAQ:BITF) gains&nbsp;11.1%&nbsp;premarket on Q3 bitcoin production growth of 38% Q/Q to1,050 BTC. The company mined 305 new Bitcoin in the month of September and 2,407 on YTD basis. Through Septmber, 30, the company deposited 2,312 BTC into custody, ~96% of company's BTC produ...</p>
            <div class="svowul-4 ">
                <span >Seeking Alpha</span>
                <span>44 minutes ago</span>
                <div class="svowul-9 ">
                    <img src="plugin/images/biticon-icon-img.png">
                    Bitcoin
                </div>
            </div>
        </div>
        
        <div class="svowul-1 ">
                <img src="plugin/images/blog-img.png">
        </div>
    </a>
</div>
    
    </div>
                    </div>
                </div>
            </div>
        </section>
     <!---------------------- footer ---------------->

<?php include('footer.php'); ?>
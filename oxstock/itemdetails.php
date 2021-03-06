<?php require_once 'classes/configure.php'; 
error_reporting(E_ERROR|E_WARNING);
?>

<!DOCTYPE html>

<html>



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OKSTOCKS</title>

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/bootstrap.min.css">

    <link id="bootstrap" href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link id="bootstrap-grid" href="css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" />

    <link id="bootstrap-reboot" href="css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />

    

    

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/style.css">

    

    <!--<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/responsive.css">-->

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>css/responsive.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/font.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/owl.carousel.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/animate.css">

    

    

    

    

    

    <link href="css/animate.css" rel="stylesheet" type="text/css" />

    <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" />

    

    <link href="css/owl.theme.css" rel="stylesheet" type="text/css" />

    <link href="css/owl.transitions.css" rel="stylesheet" type="text/css" />

    <link href="css/magnific-popup.css" rel="stylesheet" type="text/css" />

    <link href="css/jquery.countdown.css" rel="stylesheet" type="text/css" />

    <link href="css/style.css" rel="stylesheet" type="text/css" />

   

    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css" />

    <link href="css/coloring.css" rel="stylesheet" type="text/css" />

    

    

    

    

    

    

    <!--- google font cdn link --------------------->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700;800&family=Yantramanav:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!--------------------------------------------->

    

    <!--<script src="<?php echo URL_BASE;?>plugin/js/jquery-3.6.0.min.js"></script>

    <script src="<?php echo URL_BASE;?>plugin/js/bootstrap.min.js"></script>

    <script src="<?php echo URL_BASE;?>plugin/js/owl.carousel.min.js"></script>-->

    <script src="<?php echo URL_BASE;?>plugin/js/main.js"></script>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

</head>



<body>

    <section class="top-bear">

        <div class="Container">

            <div class="row">

                <div class="col-md-4">

                    <div class="logo">

                        <a href="<?php echo URL_BASE;?>"><img src="<?php echo URL_BASE;?>plugin/images/logo.png"> </a>

                    </div>

                </div>

                <div class="col-md-8">

                    <form action="/action_page.php">

                        <span class="search">

                            <input type="search" name="gsearch" placeholder="Search">

                            <buttom class="search_h"><img src="<?php echo URL_BASE;?>plugin/images/search.png"></buttom>

                        </span>

                        <select name="currence" id="currency">

                            <option value="volvo">USD</option>

                            <option value="saab">GBP</option>

                            <option value="mercedes">EUR</option>

                            <option value="audi">AUD</option>

                        </select>

                    </form>

                </div>

            </div>

        </div>

    </section>

    <!------------------- header ------------------>

    <header class="header">

        <div class="container">

            <nav class="navbar-default"><!--navbar -->

                <div class="container-fluid">

                    <!-- Brand and toggle get grouped for better mobile display -->

                    <div class="navbar-header">

                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                            <span class="sr-only">Toggle navigation</span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                            <span class="icon-bar"></span>

                        </button>

                    </div>



                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav nav-info"> <!-- navbar-nav-->

                            <li><a href="<?php echo URL_BASE;?>" class="active">Home</a></li>

                            <!--<li><a href="<?php echo URL_BASE;?>news.php">News</a></li>-->

                            <li><a href="<?php echo URL_BASE;?>crypto.php">Crypto</a></li>

                            <li><a href="<?php echo URL_BASE;?>shares.php">Shares</a></li>

                            <li><a href="<?php echo URL_BASE;?>exchanges.php">Exchanges</a></li>
                            
                            <li><a href="<?php echo URL_BASE;?>nft.php">NFT</a></li>
                            
                            <li><a href="<?php echo URL_BASE;?>oxcoin">Ox Coin</a></li>



                        </ul>



                    </div><!-- /.navbar-collapse -->

                    <div class="nav-rr">

                        <ul class="navbar-right">

                            <li><a href="<?php echo URL_BASE;?>log-in.php">Login</a></li>

                            <li class="Register"><a href="<?php echo URL_BASE;?>register.php">Register</a></li>

                        </ul>

                    </div>

                </div><!-- /.container-fluid -->

            </nav>

        </div>



    </header>

    <!---------------- end header ----------------------->

    <!---------------------- priching ---------------->
               <script type="text/javascript">
        var API_END_POINT = '<?php echo URL_BASE;?>nomics.php';

        function convertToInternationalCurrencySystem(labelValue) {

            // Nine Zeroes for Billions
            return Math.abs(Number(labelValue)) >= 1.0e+9

                ?
                (Math.abs(Number(labelValue)) / 1.0e+9).toFixed(3) + "B"
                // Six Zeroes for Millions 
                :
                Math.abs(Number(labelValue)) >= 1.0e+6

                ?
                (Math.abs(Number(labelValue)) / 1.0e+6).toFixed(3) + "M"
                // Three Zeroes for Thousands
                :
                Math.abs(Number(labelValue)) >= 1.0e+3

                ?
                (Math.abs(Number(labelValue)) / 1.0e+3).toFixed(3) + "K"

                :
                Math.abs(Number(labelValue)).toFixed(3);

        }

        function getCurrencyData() {
            $.ajax({
                cache: false,
                url: API_END_POINT,
                type: "POST",
                dataType: "json",
                data: {
                    action: 'get_currency_live_data'
                },
                success: function(response) {
                    var html = '';
                    if (response.status) {
                        for (var i = 0; i <= (response.data.length - 1); i++) {
                            html += `
                            <li>
                                <h3>
                                    <img src="` + response.data[i].logo_url + `" width="25" height="25">&nbsp; &nbsp;
                                    ` + response.data[i].name + `
                                </h3>
                                <p class="blink_me">$` + convertToInternationalCurrencySystem(response.data[i].price) + ` <span>` + parseFloat(response.data[i]['1h'].price_change_pct).toFixed(3) + `%</span> </p>
                            </li>`;
                        }
                    } else {
                        console.log(response.message);
                        if (currencyInterval)
                            clearInterval(currencyInterval);
                    }
                    $("ul.live_currency_data").html(html);
                    setTimeout(function() {
                        $("ul.live_currency_data li p").removeClass('blink_me');
                    }, 2000)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    if (currencyInterval)
                        clearInterval(currencyInterval);
                    console.log("Something went wrong! Please try again.");
                }
            });
        }
        $(document).ready(function() {
            getCurrencyData();
            var currencyInterval = setInterval(function() {
                getCurrencyData();
            }, 60000)
        });

    </script>

    <section class="pricing-wrapper" style="padding: 50px 0px 0px;">

        <div class="Container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="priching">

                        <ul class="live_currency_data">

                            <!--<li>

                                <h3>Bitcoin 24h</h3>

                                <p>$49,006.16 <span>+4.17%</span> </p>

                            </li>

                            <li>

                                <h3>Ethereum 24h</h3>

                                <p>$3,299.92 <span>+2.60%</span> </p>

                            </li>

                            <li>

                                <h3>XRP 24h</h3>

                                <p>$1.27<span>+4.49%</span> </p>

                            </li>

                            <li>

                                <h3>Cardano 24h</h3>

                                <p>$2.51<span>+0.78%</span> </p>

                            </li>

                            <li>

                                <h3>Dogecoin 24h</h3>

                                <p>$0.325727<span>+3.17%</span> </p>

                            </li>-->

                        </ul>


                        <!--<div class="arrow">

                            <a href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>

                        </div>-->

                    </div>

                </div>

               

            </div>

          

        </div>

    </section>

    

    

  <div class="drop-down-grap">

      <div class="Container">

                <div class="row">

                    <!--<div class="col-lg-12">

                    <div class="priching">

                        <ul>

                            <li>

                                <h3>Bitcoin 24h</h3>

                                <p>$49,006.16 <span>+4.17%</span> </p>

                            </li>

                            <li>

                                <h3>Ethereum 24h</h3>

                                <p>$3,299.92 <span>+2.60%</span> </p>

                            </li>

                            <li>

                                <h3>XRP 24h</h3>

                                <p>$1.27<span>+4.49%</span> </p>

                            </li>

                            <li>

                                <h3>Cardano 24h</h3>

                                <p>$2.51<span>+0.78%</span> </p>

                            </li>

                            <li>

                                <h3>Dogecoin 24h</h3>

                                <p>$0.325727<span>+3.17%</span> </p>

                            </li>

                        </ul>

                    </div>

                    </div>-->

                    <!--<div class="col-lg-12">

                    <div class="priching">

                        <ul>

                            <li>

                                <h3>Bitcoin 24h</h3>

                                <p>$49,006.16 <span>+4.17%</span> </p>

                            </li>

                            <li>

                                <h3>Ethereum 24h</h3>

                                <p>$3,299.92 <span>+2.60%</span> </p>

                            </li>

                            <li>

                                <h3>XRP 24h</h3>

                                <p>$1.27<span>+4.49%</span> </p>

                            </li>

                            <li>

                                <h3>Cardano 24h</h3>

                                <p>$2.51<span>+0.78%</span> </p>

                            </li>

                            <li>

                                <h3>Dogecoin 24h</h3>

                                <p>$0.325727<span>+3.17%</span> </p>

                            </li>

                        </ul>

                    </div>

                    </div> -->

                    <!--<div class="col-lg-12">

                    <div class="priching">

                        <ul>

                            <li>

                                <h3>Bitcoin 24h</h3>

                                <p>$49,006.16 <span>+4.17%</span> </p>

                            </li>

                            <li>

                                <h3>Ethereum 24h</h3>

                                <p>$3,299.92 <span>+2.60%</span> </p>

                            </li>

                            <li>

                                <h3>XRP 24h</h3>

                                <p>$1.27<span>+4.49%</span> </p>

                            </li>

                            <li>

                                <h3>Cardano 24h</h3>

                                <p>$2.51<span>+0.78%</span> </p>

                            </li>

                            <li>

                                <h3>Dogecoin 24h</h3>

                                <p>$0.325727<span>+3.17%</span> </p>

                            </li>

                        </ul>

                    </div> 

                    </div>-->

                </div>

            </div>

            </div>

            <!-- header close -->




        <!-- content begin -->

        <!--item details -->
           <div class="no-bottom no-top iteamdetailpage" id="content">
            <div id="top"></div>
            

            <section aria-label="section" class="mt90 sm-mt-0">
                <div class="container">
                    <div class="row">
                        
                        
                        <?php if($_REQUEST['id'] == '1'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/items/nft1.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                               
                                <h2>Pinky Ocean</h2>
                                <!-- <div class="topprice"><img src="images/iconox.png" alt=""><a href="">Price</a></div> -->

                            <div class="pricebtn">
                                <!-- <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div> -->
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX </label>
                                        <!-- <input type="text" placeholder="($0.00)">      -->
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>


                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>

                                <!--<h6>Creator</h6>
                                <div class="item_author">                                    
                                    <div class="author_list_pp">
                                        <a href="author.html">
                                            <img class="lazy" src="images/author/author-1.jpg" alt="">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </div>                                    
                                    <div class="author_list_info">
                                        <a href="author.html">Monica Lucas</a>
                                    </div>
                                </div>-->

                                <!--<div class="spacer-40"></div>

                                <div class="de_tab">
    
                                <ul class="de_nav">
                                    <li class="active"><span>Bids</span></li>
                                    <li><span>History</span></li>
                                    <li><span>Buy Now</span></li>
                                </ul>
                                
                                <div class="de_tab_content">
                                    
                                    <div class="tab-1">
                                        <div class="p_list">
                                            <div class="p_list_pp">
                                                <a href="author.html">
                                                    <img class="lazy" src="images/author/author-1.jpg" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="p_list_info">
                                                Bid accepted <b>0.005 ETH</b>
                                                <span>by <b>Monica Lucas</b> at 6/15/2021, 3:20 AM</span>
                                            </div>
                                        </div>

                                        <div class="p_list">
                                            <div class="p_list_pp">
                                                <a href="author.html">
                                                    <img class="lazy" src="images/author/author-2.jpg" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="p_list_info">
                                                Bid <b>0.005 ETH</b>
                                                <span>by <b>Mamie Barnett</b> at 6/14/2021, 5:40 AM</span>
                                            </div>
                                        </div>

                                        <div class="p_list">
                                            <div class="p_list_pp">
                                                <a href="author.html">
                                                    <img class="lazy" src="images/author/author-3.jpg" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="p_list_info">
                                                Bid <b>0.004 ETH</b>
                                                <span>by <b>Nicholas Daniels</b> at 6/13/2021, 5:03 AM</span>
                                            </div>
                                        </div>

                                        <div class="p_list">
                                            <div class="p_list_pp">
                                                <a href="author.html">
                                                    <img class="lazy" src="images/author/author-4.jpg" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="p_list_info">
                                                Bid <b>0.003 ETH</b>
                                                <span>by <b>Lori Hart</b> at 6/12/2021, 12:57 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-2">
                                        <div class="p_list">
                                            <div class="p_list_pp">
                                                <a href="author.html">
                                                    <img class="lazy" src="images/author/author-5.jpg" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="p_list_info">
                                                Bid <b>0.005 ETH</b>
                                                <span>by <b>Jimmy Wright</b> at 6/14/2021, 6:40 AM</span>
                                            </div>
                                        </div>

                                        <div class="p_list">
                                            <div class="p_list_pp">
                                                <a href="author.html">
                                                    <img class="lazy" src="images/author/author-1.jpg" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="p_list_info">
                                                Bid accepted <b>0.005 ETH</b>
                                                <span>by <b>Monica Lucas</b> at 6/15/2021, 3:20 AM</span>
                                            </div>
                                        </div>

                                        <div class="p_list">
                                            <div class="p_list_pp">
                                                <a href="author.html">
                                                    <img class="lazy" src="images/author/author-2.jpg" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="p_list_info">
                                                Bid <b>0.005 ETH</b>
                                                <span>by <b>Mamie Barnett</b> at 6/14/2021, 5:40 AM</span>
                                            </div>
                                        </div>

                                        <div class="p_list">
                                            <div class="p_list_pp">
                                                <a href="author.html">
                                                    <img class="lazy" src="images/author/author-3.jpg" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="p_list_info">
                                                Bid <b>0.004 ETH</b>
                                                <span>by <b>Nicholas Daniels</b> at 6/13/2021, 5:03 AM</span>
                                            </div>
                                        </div>

                                        <div class="p_list">
                                            <div class="p_list_pp">
                                                <a href="author.html">
                                                    <img class="lazy" src="images/author/author-4.jpg" alt="">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                            </div>                                    
                                            <div class="p_list_info">
                                                Bid <b>0.003 ETH</b>
                                                <span>by <b>Lori Hart</b> at 6/12/2021, 12:57 AM</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>-->
                                
                            </div>
                        </div>
                        <?php }else if($_REQUEST['id'] == '2'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/items/nft2.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                               
                                <h2>Deep Sea Phantasy</h2>
                                <!-- <div class="topprice"><img src="images/iconox.png" alt=""><a href="">Price</a></div> -->

                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>


                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php }else if($_REQUEST['id'] == '3'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/items/nft3.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                               
                                <h2>Rainbow Style</h2>
                                <!-- <div class="topprice"><img src="images/iconox.png" alt=""><a href="">Price</a></div> -->

                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>


                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php }else if($_REQUEST['id'] == '4'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/items/nft4.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                               
                                <h2>Two Tigers</h2>
                                <!-- <div class="topprice"><img src="images/iconox.png" alt=""><a href="">Price</a></div> -->

                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>


                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php }else if($_REQUEST['did'] == '1'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/domain/1.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                                <h2>here2escape.com</h2>
                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php }else if($_REQUEST['did'] == '2'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/domain/2.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                                <h2>brewerykegs.com</h2>
                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php }else if($_REQUEST['did'] == '3'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/domain/3.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                                <h2>footballviral.com</h2>
                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php }else if($_REQUEST['did'] == '4'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/domain/4.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                                <h2>topservicehits.com</h2>
                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php }else if($_REQUEST['did'] == '5'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/domain/5.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                                <h2>brokersstock.com</h2>
                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php }else if($_REQUEST['did'] == '6'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/domain/6.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                                <h2>mealscombined.com</h2>
                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php }else if($_REQUEST['did'] == '7'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/domain/7.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                                <h2>site-task.com</h2>
                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php }else if($_REQUEST['did'] == '8'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/domain/8.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                                <h2>footballtouring.com</h2>
                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php }else if($_REQUEST['did'] == '9'){ ?>
                        <div class="col-md-6 text-center">
                            <img src="images/domain/9.png" class="img-fluid img-rounded mb-sm-30" alt="">
                        </div>
                        <div class="col-md-6">
                            <div class="item_info">
                                <h2>nipify.com</h2>
                            <div class="pricebtn">
                                <div class="minbidtitle">Minimum bid  -- Reserve price not met.</div>
                                <div class="price-dtl">
                                    <img src="images/iconox.png" alt="">
                                    <!-- <div class="pricetag">0<sub>($0.00)</sub></div> -->
                                    <div class="pricetag">
                                        <label>40 OX ($20.00)</label>
                                        <input type="text" placeholder="($0.00)">     
                                    </div>
                                   
                                </div>
                                <a href="" class="combtn" tabindex="0">Buy Now</a>
                            </div>
                                <div class="item_info_counts">
                                    <div class="item_info_type"><i class="fa fa-image"></i>NFT</div>
                                    <div class="item_info_views"><i class="fa fa-eye"></i>250</div>
                                    
                                </div>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
            </section>
            
            
        </div>
        <!--item details end-->

        <!-- content close -->



        <a href="#" id="back-to-top"></a>

        

        <!-- footer begin -->

        <footer class="footer">

        <div class="container" style="width:1170px">

            <div class="row">

                <div class="col-lg-5">

                    <div class="footer-logo">



                        <img src="http://kpve.com.au/oxstock/plugin/images/footer_logo.png">



                    </div>



                    <div class="foot_cc">

                        <a href="#">Sign up for our newsletters</a>



                    </div>



                    <div class="foot_bb">



                        <div class="left">

                            <p>Follow us</p>



                        </div>

                        <div class="right">

                            <ul>

                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>

                                    </a></li>

                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>

                                    </a></li>

                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i>

                                    </a></li>



                            </ul>





                        </div>



                    </div>

                </div>



                <div class="col-lg-7">

                    <div class="f_menu">



                        <ul>

                            <li><a href="http://kpve.com.au/oxstock/">Home </a></li>



                            <li><a href="<?php echo URL_BASE;?>nft.php">NFT</a></li>
                            
                            <li><a href="<?php echo URL_BASE;?>oxcoin">Ox Coin</a></li>

                            <li><a href="http://kpve.com.au/oxstock/crypto.php">Crypto </a></li>

                            <li><a href="http://kpve.com.au/oxstock/shares.php">Shares </a></li>

                            <li><a href="http://kpve.com.au/oxstock/exchanges.php">Exchanges </a></li>

                            <li><a href="http://kpve.com.au/oxstock/contact.php">Contact Us</a></li>



                        </ul>

                    </div>



                    <div class="ff_menu">



                        <ul>

                            <li><a href="http://kpve.com.au/oxstock/terms-and-conditions.php"> Terms &amp; Conditions </a></li>

                            <li><a href="http://kpve.com.au/oxstock/privacy.php"> Privacy Policy</a></li>

                            <li><a href="http://kpve.com.au/oxstock/news.php">Newsletters</a></li>

                        </ul>

                    </div>





                    <div class="foo_text">



                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tincidunt massa id turpis dignissim facilisis. Mauris diam metus, sodales at mauris ac, pharetra pellentesque neque. <span>Donec ut leo ac felis feugiat facilisis.</span> Ut eget neque vel <span>sapien eleifend fringilla</span> a sit amet leo. Morbi tincidunt tincidunt lectus, id dapibus lacus vulputate et. Praesent et dolor eu lacus tempus placerat. Cras vel fringilla nisl.</p>



                    </div>









                </div>

                <div class="col-lg-12">



                    <div class="copy_r">

                        <p>Copyright ?? 2021 OXSTOCKS. by <a href="https://www.kpve.com/" target="_blank">KPVE PTY</a> LTD</p>



                    </div>

                </div>



            </div>

        </div>











    </footer>

            <!-- footer close -->

        

  

    

    <!-- Javascript Files

    ================================================== -->

    <script src="js/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>

    <script src="js/wow.min.js"></script>

    <script src="js/jquery.isotope.min.js"></script>

    <script src="js/easing.js"></script>

    <script src="js/owl.carousel.js"></script>

    <script src="js/validation.js"></script>

    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/enquire.min.js"></script>

    <script src="js/jquery.plugin.js"></script>

    <script src="js/jquery.countTo.js"></script>

    <script src="js/jquery.countdown.js"></script>

    <script src="js/jquery.lazy.min.js"></script>

    <script src="js/jquery.lazy.plugins.min.js"></script>

    <script src="js/designesia.js"></script>

    <script src="js/particles.js"></script>

    <script src="js/particles-settings-2.js"></script>





</body>

<script>

$('.arrow a').click( function() {

 $(".drop-down-grap").slideToggle(1000);

});

</script>



</html>
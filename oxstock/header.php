<!DOCTYPE html>

<html>



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OXSTOCKS</title>

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/style.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/responsive.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>css/responsive.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/font.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/owl.carousel.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>css/simplePagination.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/toastr.min.css">

    <!--- google font cdn link --------------------->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700;800&family=Yantramanav:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!--------------------------------------------->

    <script src="<?php echo URL_BASE;?>plugin/js/jquery-3.6.0.min.js"></script>

    <script src="<?php echo URL_BASE;?>plugin/js/bootstrap.min.js"></script>

    <script src="<?php echo URL_BASE;?>plugin/js/owl.carousel.min.js"></script>

    <script src="<?php echo URL_BASE;?>plugin/js/main.js"></script>

    <script src="<?php echo URL_BASE;?>js/jquery.simplePagination.js"></script>

    <script src="<?php echo URL_BASE;?>plugin/js/jquery.validate.min.js"></script>
    <script src="<?php echo URL_BASE;?>plugin/js/additional-methods.min.js"></script>
    <script src="<?php echo URL_BASE;?>plugin/js/toastr.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> -->
    <style type="text/css">
        .blink_me {
            animation: blinker 2s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0.2;
            }
        }
    </style>

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

            <nav class="navbar navbar-default">

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

                        <ul class="nav navbar-nav nav-info">

                            <li><a href="<?php echo URL_BASE;?>" class="active">Home</a></li>

                            <!--<li><a href="<?php echo URL_BASE;?>news.php">News</a></li>-->

                            <li><a href="<?php echo URL_BASE;?>crypto">Crypto</a></li>

                            <li><a href="<?php echo URL_BASE;?>shares">Shares</a></li>

                            <!--<li><a href="<?php // echo URL_BASE;?>exchanges">Exchanges</a></li>-->

                            <li><a href="<?php echo URL_BASE;?>nft">Marketplace</a></li>

                            <li><a href="<?php echo URL_BASE;?>mining.php">Mining</a></li>

                            <li><a href="<?php echo URL_BASE;?>oxcoin">Ox Coin</a></li>



                        </ul>



                    </div><!-- /.navbar-collapse -->

                    <div class="nav-rr">

                        <ul class="navbar-right">
                            <?php
                            /*if(isset($userId) && $userId > 0){*/
                            ?>
                                <li>
                                    <a href="<?php echo URL_BASE;?>wallet">
                                        <img src="<?php echo URL_BASE;?>plugin/images/wallet.png"/><span>Wallet</span>
                                    </a>
                                </li>
                            <?php
                            /*}*/
                            ?>
                            <?php
                            if(!isset($userId) || $userId <= 0){
                            ?>
                                <li><a href="<?php echo URL_BASE;?>login">Login</a></li>

                                <li class="Register"><a href="<?php echo URL_BASE;?>register">Register</a></li>
                            <?php
                            }
                            ?>
                        </ul>

                    </div>

                </div><!-- /.container-fluid -->

            </nav>

        </div>



    </header>

    <!---------------- end header ----------------------->

    <?php

      /*  $api_key = '4d6309bd25541bc203a94472a080638a3d3d1b24';

        $service_url     = 'https://api.nomics.com/v1/prices?key='.$api_key.'&ids=BTC,ETH,XRP';

        $curl            = curl_init($service_url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($curl, CURLOPT_POST, false);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_response   = curl_exec($curl);

        curl_close($curl);

        $json_objekat    = json_decode($curl_response,true);

        echo "<pre>";print_r($json_objekat);

        die;*/

    ?>

    <!---------------------- priching ---------------->
    <section class="pricing-wrapper">

        <div class="Container">

            <div class="row">

                <div class="col-lg-12">

                    <div class="priching">

                        <ul class="live_currency_data" id="prisingcarousel">
                            <!-- <li>

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

                            </li> -->

                        </ul>



                        <!--  <div class="arrow">

                            <a href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>



                        </div> -->





                    </div>

                </div>

                <!--

                <div class="col-lg-4 col-md-4">

                    <div class="right-bottom">

                        <a href="#">INDEXES <i class="fa fa-line-chart" aria-hidden="true"></i></a>

                        <a href="#">TOP ASSETS<i class="fa fa-arrow-right" aria-hidden="true"></i></a>

                    </div>

                </div>

-->





            </div>



        </div>

    </section>

    <div class="drop-down-grap">

        <!--  <div class="Container">

                <div class="row">

                    <div class="col-lg-12">

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

                    </div>

                    <div class="col-lg-12">

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

                    </div>

                    <div class="col-lg-12">

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

                    </div>

                </div>

            </div> -->

    </div>

    <!---------------------- end priching ---------------->

    <script type="text/javascript">
        var API_END_POINT = '<?php echo URL_BASE;?>nomics.php';
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
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
            <?php 
                if($_SESSION['message_type'] != '' && $_SESSION['message'] != ''){
                    echo "toastr['".$_SESSION['message_type']."']('".$_SESSION['message']."');";
                    $_SESSION['message_type'] = '';
                    $_SESSION['message'] = '';
                }
            ?>
            getCurrencyData();
            var currencyInterval = setInterval(function() {
                getCurrencyData();
            }, 60000)
        });

    </script>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OXSTOCKS</title>

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/wallet/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>css/simplePagination.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/css/toastr.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;600;700;800&family=Yantramanav:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo URL_BASE;?>plugin/wallet/css/style.css">


    <script src="<?php echo URL_BASE;?>plugin/js/jquery-3.6.0.min.js"></script>

    <script src="<?php echo URL_BASE;?>plugin/js/bootstrap.min.js"></script>

    <script src="<?php echo URL_BASE;?>plugin/js/owl.carousel.min.js"></script>

    <script src="<?php echo URL_BASE;?>plugin/js/main.js"></script>

    <script src="<?php echo URL_BASE;?>js/jquery.simplePagination.js"></script>

    <script src="<?php echo URL_BASE;?>plugin/js/jquery.validate.min.js"></script>
    <script src="<?php echo URL_BASE;?>plugin/js/additional-methods.min.js"></script>
    <script src="<?php echo URL_BASE;?>plugin/js/toastr.min.js"></script>
    <script src="<?php echo URL_BASE;?>js/jquery-slim.min.js"></script>
    <script src="<?php echo URL_BASE;?>js/popper.min.js"></script>

</head>
<body>

<header class="header_menu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="header_wal">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="<?php echo URL_BASE;?>">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo URL_BASE;?>crypto">Crypto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="<?php echo URL_BASE;?>shares">Shares</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="<?php echo URL_BASE;?>nft">Marketplace</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="<?php echo URL_BASE;?>mining.php">Mining</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="<?php echo URL_BASE;?>oxcoin">Ox Coin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="<?php echo URL_BASE;?>contact">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="top-bear">
                    <form action="">
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
    </div>
</header>
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
    $(document).ready(function() {
        $('#sidebarToggle').click(function() {
            $('.list-group').toggle("slide");
            $(".owallet-left").toggleClass("main");
        });

    }); 
    $(window).scroll(function() {
        var sticky = $('.top-nav'),
        scroll = $(window).scrollTop();

        if (scroll >= 50) sticky.addClass('fixed');
        else sticky.removeClass('fixed');
    });
</script>


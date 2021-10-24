<?php require_once 'classes/configure.php'; ?>

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

    <section class="pricing-wrapper" style="padding: 50px 0px 0px;">

        <div class="Container">

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



                        <div class="arrow">

                            <a href="#"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>



                        </div>





                    </div>

                </div>

               

            </div>

          

        </div>

    </section>

    

    

  <div class="drop-down-grap">

      <div class="Container">

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

            </div>

            </div>

            <!-- header close -->



       <!-- content begin -->
        <div class="no-bottom no-top" id="content">
            <div id="top"></div>
            
            <!-- section begin -->
            <section id="subheader" class="text-light" data-bgimage="url(images/background/subheader.jpg) top">
                    <div class="center-y relative text-center">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-md-12 text-center">
                                    <h1>Create</h1>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- section close -->
            

            <!-- section begin -->
            <section aria-label="section">
                <div class="container">
                    <div class="row wow fadeIn">
                        <div class="col-lg-7 offset-lg-1">
                            <form id="form-create-item" class="form-border" method="post" action="email.php">
                                <div class="field-set">
                                    <h5>Upload file</h5>

                                    <div class="d-create-file">
                                        <p id="file_name">PNG, JPG, GIF, WEBP or MP4. Max 200mb.</p>
                                        <input type="button" id="get_file" class="btn-main" value="Browse">
                                        <input type="file" id="upload_file">
                                    </div>

                                    <div class="spacer-single"></div>

                                    <h5>Title</h5>
                                    <input type="text" name="item_title" id="item_title" class="form-control" placeholder="e.g. 'Crypto Funk" />

                                    <div class="spacer-10"></div>

                                    <h5>Description</h5>
                                    <textarea data-autoresize name="item_desc" id="item_desc" class="form-control" placeholder="e.g. 'This is very limited item'"></textarea>

                                    <div class="spacer-10"></div>

                                    <h5>Price</h5>
                                    <input type="text" name="item_price" id="item_price" class="form-control" placeholder="enter price for one item (ETH)" />

                                    <div class="spacer-10"></div>

                                    <h5>Royalties</h5>
                                    <input type="text" name="item_royalties" id="item_royalties" class="form-control" placeholder="suggested: 0, 10%, 20%, 30%. Maximum is 70%" />

                                    <div class="spacer-10"></div>

                                    <input type="button" id="submit" class="btn-main" value="Create Item">
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-xs-12">
                                <h5>Preview item</h5>
                                <div class="nft__item">
                                    <div class="de_countdown" data-year="2021" data-month="9" data-day="16" data-hour="8"></div>
                                    <div class="author_list_pp">
                                        <a href="#">                                    
                                            <img class="lazy" src="images/author/author-1.jpg" alt="">
                                            <i class="fa fa-check"></i>
                                        </a>
                                    </div>
                                    <div class="nft__item_wrap">
                                        <a href="#">
                                            <img src="images/collections/coll-item-3.jpg" id="get_file_2" class="lazy nft__item_preview" alt="">
                                        </a>
                                    </div>
                                    <div class="nft__item_info">
                                        <a href="#">
                                            <h4>Pinky Ocean</h4>
                                        </a>
                                        <div class="nft__item_price">
                                            0.08 ETH<span>1/20</span>
                                        </div>
                                        <div class="nft__item_action">
                                            <a href="#">Place a bid</a>
                                        </div>
                                        <div class="nft__item_like">
                                            <i class="fa fa-heart"></i><span>50</span>
                                        </div>                            
                                    </div> 
                                </div>
                            </div>                                         
                    </div>
                </div>
            </section>

        </div>
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

                        <p>Copyright © 2021 OXSTOCKS. by <a href="https://www.kpve.com/" target="_blank">KPVE PTY</a> LTD</p>



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
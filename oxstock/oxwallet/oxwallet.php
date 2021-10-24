<?php require_once '../classes/configure.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css\bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yantramanav:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css\font-awesome.min.css">
    <link rel="stylesheet" href="css\style.css">

    <title>OXWallet</title>
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
        <a class="nav-link" href="<?php echo URL_BASE;?>crypto.php">Crypto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="<?php echo URL_BASE;?>shares.php">Shares</a>
      </li>
        <li class="nav-item">
        <a class="nav-link disabled" href="<?php echo URL_BASE;?>exchanges.php">Exchanges</a>
      </li>
        <li class="nav-item">
        <a class="nav-link disabled" href="<?php echo URL_BASE;?>contact.php">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>
            </div>

            <div class="top-bear">
<form action="/action_page.php">

                        <span class="search">

                            <input type="search" name="gsearch" placeholder="Search">

                            <buttom class="search_h"><img src="http://www.kpve.com.au/oxstock/plugin/images/search.png"></buttom>

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
    <div class="dashboard-main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="owallet-wrap">
                        <div class="owallet-left" id="sidebar">
                            <a id="sidebarToggle">
                                <img src="images/square.png">
                            </a>
                            <div class="list-group">
                                <a href="index.php" class="logo">
                                    <img src="images/logo.png" alt="" />
                                </a>
                                <a href="index.php" class="mobile-logo">
                                    <img src="images/mobile-logo.png" alt="" />
                                </a>
                                <a href="index.php" class="list-group-item">
                                    <i class="far fa-chart-bar"></i>
                                    <span>Dashboard</span>
                                </a>
                                <a href="#" class="list-group-item ">
                                    <i class="fas fa-chart-line"></i>
                                    <span>Marketplace</span>
                                </a>
                                <a href="oxexchange.php" class="list-group-item">
                                    <i class="fas fa-exchange-alt"></i>
                                    <span>Exchange</span></a>

                                <a href="#" class="list-group-item">
                                    <i class="far fa-heart"></i>
                                    <span>NFT’s</span>
                                </a>
                                <a href="oxwallet.php" class="list-group-item active">
                                    <i class="fas fa-wallet"></i>
                                    <span>Wallet</span>
                                </a>
                                <a href="oxsetting.php" class="list-group-item">
                                    <i class="fas fa-wrench"></i>
                                    <span>Settings</span>
                                </a>

                            </div>
                        </div>
                        <div class="owallet-right main">
                            <div class="top-nav">
                                <div class="owt-left">
                                    <h5>Hi Dimitrios Welcome Back!</h5>
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="search">
                                            <span><i class="fa fa-search"></i></span>
                                        </div>
                                    </form>
                                </div>
                                <div class="owt-right">
                                    <a href="javascript:;" class="upload"><span><i class="fas fa-upload"></i></span>sell
                                        your artwork</a>
                                    <div class="owt-option">
                                        <a href="javascript:;">
                                            <img src="images/bell-icol.png" />
                                        </a>
                                        <a href="javascript:;">
                                            <img src="images/options-icon.png" />
                                        </a>
                                        <a href="javascript:;">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-body oxwallet-body">
                                <div class="owallet-offer">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="debit-card">
                                               <figure>
                                                   <img src="images/debitcard.png" alt="">
                                               </figure>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <a href="#" class="oxwallet-card" data-toggle="modal"
                                                data-target="#cardmodal">
                                                <i class="fa fa-plus"></i>
                                                <span>Add New Card!!!</span>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="app-stocks">
                                                <div class="oxwalllet-as">downloading our<span> Ox Wallet app
                                                        only</span></div>
                                                <div class="app-subscribe">
                                                    <a href="javascript:;">
                                                        <img src="images/google-play.png" alt="" />
                                                    </a>
                                                    <a href="javascript:;">
                                                        <img src="images/app-store.png" alt="" />
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="owallet-operation">
                                    <h6>Send OX</h6>
                                    <div class="owallet-btn">
                                        <div class="ow-send">
                                            <a href="#"><i class="fas fa-arrow-up"></i>Send</a>
                                        </div>
                                        <div class="ow-address">
                                            <a href="#" data-toggle="modal"
                                            data-target="#addressmodal"><i class="fa fa-plus"></i>Add an Address</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="owallet-table">
                                    <h5>History</h5>
                                    <div class="ow-transation-title">
                                        <p>Recent transactions</p>
                                        <p class="orange">More</p>
                                    </div>
                                    <div class="owt-table">
                                        <table class="table ">
                                            <thead>
                                                <th>Price Ox</th>
                                                <th>Amount USD</th>
                                                <th></th>
                                                <th>Time</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="green"><i
                                                                class="fas fa-sort-up"></i></span>0.259842</td>
                                                    <td>0.068241</td>
                                                    <td class="green">Buy</td>
                                                    <td>12 Mins</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="green"><i
                                                                class="fas fa-sort-up"></i></span>0.347204</td>
                                                    <td>0.002482</td>
                                                    <td class="green">Buy</td>
                                                    <td>10 Mins</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="green"><i
                                                                class="fas fa-sort-up"></i></span>0.024842</td>
                                                    <td>0.086242</td>
                                                    <td class="green">Buy</td>
                                                    <td>27 Mins</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="red"><i
                                                                class="fas fa-sort-down"></i></span>0.272418</td>
                                                    <td>0.001871</td>
                                                    <td class="red">Sell</td>
                                                    <td>32 Mins</td>
                                                </tr>
                                                <tr>
                                                    <td><span class="red"><i
                                                                class="fas fa-sort-down"></i></span>0.272418</td>
                                                    <td>0.001871</td>
                                                    <td class="red">Sell</td>
                                                    <td>32 Mins</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="cardmodal" tabindex="-1" role="dialog"
                                    aria-labelledby="cardmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="cardmodalLabel">Add New Card</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form>
                                                   <div class="row">
                                                       <div class="col-md-12">
                                                           <div class="form-group">
                                                               <input type="text" class="form-control" placeholder="Full Name">
                                                           </div>
                                                       </div>
                                                       <div class="col-md-12">
                                                           <div class="form-group">
                                                               <input type="number" class="form-control" placeholder="Card Number">
                                                           </div>
                                                       </div>
                                                       <div class="col-md-6">
                                                           <div class="form-group">
                                                               <input type="number" class="form-control" placeholder="MM / YY">
                                                           </div>
                                                       </div>
                                                       <div class="col-md-6">
                                                           <div class="form-group">
                                                               <input type="number" class="form-control" placeholder="CVV">
                                                           </div>
                                                       </div>
                                                       <div class="col-md-12">
                                                           <button class="btn btn-orange"><i class="fa fa-plus"></i>To Wallet</button>
                                                       </div>
                                                   </div>
                                               </form>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="addressmodal" tabindex="-1" role="dialog"
                                    aria-labelledby="addressmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addressmodalLabel">Add New Address</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <form>
                                                   <div class="row">
                                                       <div class="col-md-12">
                                                           <div class="form-group">
                                                               <input type="text" class="form-control addnewadd" placeholder="Address">
                                                               <div class="icons">
                                                              <img src="images/user2.png">
                                                              <img src="images/scan.png">
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-12">
                                                           <div class="form-group">
                                                               <input type="number" class="form-control addnewadd" placeholder="Amount">
                                                               <div class="avalue">
                                                                   <span>OX</span>
                                                                   <span class="orange">MAX</span>
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="col-md-12">
                                                           <div class="form-group">
                                                               <input type="password" class="form-control" placeholder="Password">
                                                           </div>
                                                       </div>
                                                       <p>Transaction Fee 0.00</p>
                                                      
                                                       <div class="col-md-12">
                                                           <button class="btn btn-orange">Submit</button>
                                                       </div>
                                                   </div>
                                               </form>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js\jquery-slim.min.js"></script>
    <script src="js\popper.min.js"></script>
    <script src="js\bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarToggle').click(function () {
                $('.list-group').toggle("slide");
                $(".owallet-left").toggleClass("main");
            });
        });
        $(window).scroll(function () {
            var sticky = $('.top-nav'),
                scroll = $(window).scrollTop();

            if (scroll >= 50) sticky.addClass('fixed');
            else sticky.removeClass('fixed');
        });
    </script>
</body>

</html>
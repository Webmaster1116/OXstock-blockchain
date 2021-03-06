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

    <title>OXSetting</title>
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
                                <a href="#" class="list-group-item">
                                    <i class="fas fa-chart-line"></i>
                                    <span>Marketplace</span>
                                </a>
                                <a href="oxexchange.php" class="list-group-item">
                                    <i class="fas fa-exchange-alt"></i>
                                    <span>Exchange</span></a>

                                <a href="#" class="list-group-item ">
                                    <i class="far fa-heart"></i>
                                    <span>NFT???s</span>
                                </a>
                                <a href="oxwallet.php" class="list-group-item ">
                                    <i class="fas fa-wallet"></i>
                                    <span>Wallet</span>
                                </a>
                                <a href="oxsetting.php" class="list-group-item active">
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
                            <div class="owl-body">
                                <div class="ow-tab">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="pill" href="#profile" role="tab"
                                                aria-controls="pills-profile" aria-selected="true">Change Profile
                                                Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="pill" href="#contact" role="tab"
                                                aria-controls="pills-contact" aria-selected="false">Contact us</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <div class="form-detail">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="uprofile-detail">
                                                            <figure>
                                                                <img src="images/user.png" alt="">

                                                            </figure>
                                                            <div class="usrpencl"><a href=""> <i class="fas fa-pencil-alt"></i></a></div>
                                                            <!-- <form>
                                                                <div class="file-input">
                                                                    <input type="file" id="file" class="file">
                                                                    <label for="file">Select file</label>
                                                                </div>
                                                            </form> -->
                                                        </div>
                                                        <form class="upform oxwalletprofile">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="First Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Middle Name">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Surname">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="date" class="form-control"
                                                                    placeholder="DOB">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Email">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Mobile">
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea type="text" class="form-control"
                                                                    placeholder="Address"></textarea> 
                                                            </div>

                                                           <div class="form-group">
                                                                <textarea type="text" class="form-control"
                                                                    placeholder="Appartment, suite, etc."></textarea> 
                                                            </div>

                                                            <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="City">
                                                            </div>

                                                        <div class="form-group">
                                                            <!-- <label>State/province</label> -->
                                                            <select id="state">
                                                              <option value="0" selected>State/province</option>
                                                              <option value="1">state 2</option>
                                                              <option value="2">state 3</option>
                                                              <option value="3" >state 4</option>
                                                            </select>
                                                        </div> 

                                                         <div class="form-group">
                                                            <!-- <label>Country</label> -->
                                                            <select id="country">
                                                              <option value="c0" selected>Country</option>
                                                              <option value="c1">country 2</option>
                                                              <option value="c2">country 3</option>
                                                              <option value="c3" >country 4</option>
                                                            </select>
                                                        </div>   

                                                         <div class="form-group">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Zip/postal code">
                                                            </div>

                                                                    
                                                            <!-- <div class="form-group">
                                                                <textarea class="form-control" rows="3"
                                                                    placeholder="About Us"></textarea>
                                                            </div> -->
                                                            <button type="button" class="btn btn-orange">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="contact" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-6">
                                                    <form class="upform">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Full Name">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" class="form-control"
                                                                placeholder="Mobile number">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="email" class="form-control"
                                                                placeholder="Email">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Location">
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="3"
                                                                placeholder="About Us"></textarea>
                                                        </div>
                                                        <button type="button" class="btn btn-orange">Update</button>
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
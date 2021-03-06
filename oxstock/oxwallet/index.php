<?php require_once '../classes/configure.php'; ?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Yantramanav:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

	<title>OKSTOCKS</title>
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
								<a href="index.php"class="logo" >
									<img src="images/logo.png"alt=""/>
								</a>
								<a href="index.php" class="mobile-logo">
									<img src="images/mobile-logo.png" alt="" />
								</a>
								<a href="index.php" class="list-group-item active">
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
										<span>NFT???s</span>
									</a>
									<a href="oxwallet.php" class="list-group-item">
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
										<a href="javascript:;" class="upload"><span><i class="fas fa-upload"></i></span>sell your artwork</a>
										<div class="owt-option">
											<a href="javascript:;">
												<img src="images/bell-icol.png"/>
											</a>
											<a href="javascript:;">
												<img src="images/options-icon.png"/>
											</a>
											<a href="javascript:;">
												<i class="fas fa-user"></i>
											</a>
										</div>
									</div>
								</div>
								<div class="owl-body">
									<div class="owallet-offer">
										<div class="row">
											<div class="col-md-4">
												<div class="discover-part">
													<p>OX Stocksa NFT Marketplace</p>
													<h4>Discover & Collect Rate digital Artwork</h4>
													<a href="javascript:;" class="btn btn-orange">Get Started</a>
												</div>
											</div>
											<div class="col-md-4">
												<div class="join-part">
													<h4>Join our discord</h4>
													<a href="https://discord.gg/5H4DTMY4" class="btn btn-orange">Join Now</a>
												</div>
											</div>
											<div class="col-md-4">
												<div class="app-stocks">
													<h4>ox stocks app</h4>
													<div class="app-subscribe">
														<a href="javascript:;">
															<img src="images/google-play.png" alt=""/>
														</a>
														<a href="javascript:;">
															<img src="images/app-store.png" alt=""/>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="nft-feature-main">
										<h2>Featured NFTs,</h2>
										<div class="nft-feature-list">
											<div class="row">
												<div class="col-lg-3 col-sm-6">
													<div class="nf-list-item">
														<div class="nfli-top">
															<div class="nfi-detail">
																<p>Abstract Digital Art project</p>
																<span>Owner : iDoodleArt-C</span>
															</div>
															<a href="javascript:;"><i class="far fa-heart"></i><span>212</span></a>
														</div>
														<div class="nfi-middle">
															<div class="nfim-top-info">
																<a href="javascript:;"><i class="fas fa-share-alt"></i></a>
																<div class="countdown">02 : 10 : 40 : 52 left</div>
															</div>
															<div class="nfi-item-image">
																<img src="images/fp1.png" alt="">
															</div>
														</div>
														<div class="nfi-bottom">
															<div class="bid-detail">
																<span>Current Bid</span>
																<p>0.08935 ETH</p>
															</div>
															<div class="nfi-profile">
																<img src="images/fp1-user.png" alt=""/>
															</div>
															<span class="uname">iDoodleStudio</span>
															<div class="check-icon">
																<img src="images/Check.png" alt="">
															</div>
														</div>
													</div>
												</div>
												<div class="col-lg-3 col-sm-6">
													<div class="nf-list-item">
														<div class="nfli-top">
															<div class="nfi-detail">
																<p>Abstract Digital Art project</p>
																<span>Owner : iDoodleArt-C1994</span>
															</div>
															<a href="javascript:;"><i class="far fa-heart"></i><span>212</span></a>
														</div>
														<div class="nfi-middle">
															<div class="nfim-top-info">
																<a href="javascript:;"><i class="fas fa-share-alt"></i></a>
																<div class="countdown">02 : 10 : 40 : 52 left</div>
															</div>
															<div class="nfi-item-image">
																<img src="images/fp2.png" alt="">
															</div>
														</div>
														<div class="nfi-bottom">
															<div class="bid-detail">
																<span>Current Bid</span>
																<p>0.08935 ETH</p>
															</div>
															<div class="nfi-profile">
																<img src="images/fp2-user.png" alt=""/>
															</div>
															<span class="uname">iDoodleStudio</span>
															<div class="check-icon"> <img src="images/Check.png" alt=""></div>
														</div>
													</div>
												</div>
												<div class="col-lg-3 col-sm-6">
													<div class="nf-list-item">
														<div class="nfli-top">
															<div class="nfi-detail">
																<p>Abstract Digital Art project</p>
																<span>Owner : iDoodleArt-C1994</span>
															</div>
															<a href="javascript:;"><i class="far fa-heart"></i><span>212</span></a>
														</div>
														<div class="nfi-middle">
															<div class="nfim-top-info">
																<a href="javascript:;"><i class="fas fa-share-alt"></i></a>
																<div class="countdown">02 : 10 : 40 : 52 left</div>
															</div>
															<div class="nfi-item-image">
																<img src="images/fp3.png" alt="">
															</div>
														</div>
														<div class="nfi-bottom">
															<div class="bid-detail">
																<span>Current Bid</span>
																<p>0.08935 ETH</p>
															</div>
															<div class="nfi-profile">
																<img src="images/fp3-user.png" alt=""/>
															</div>
															<span class="uname">iDoodleStudio</span>
															<div class="check-icon"> <img src="images/Check.png" alt=""></div>
														</div>
													</div>
												</div>
												<div class="col-lg-3 col-sm-6">
													<div class="nf-list-item">
														<div class="nfli-top">
															<div class="nfi-detail">
																<p>Abstract Digital Art project</p>
																<span>Owner : iDoodleArt-C</span>
															</div>
															<a href="javascript:;"><i class="far fa-heart"></i><span>212</span></a>
														</div>
														<div class="nfi-middle">
															<div class="nfim-top-info">
																<a href="javascript:;"><i class="fas fa-share-alt"></i></a>
																<div class="countdown">02 : 10 : 40 : 52 left</div>
															</div>
															<div class="nfi-item-image">
																<img src="images/fp1.png" alt="">
															</div>
														</div>
														<div class="nfi-bottom">
															<div class="bid-detail">
																<span>Current Bid</span>
																<p>0.08935 ETH</p>
															</div>
															<div class="nfi-profile">
																<img src="images/fp1-user.png" alt=""/>
															</div>
															<span class="uname">iDoodleStudio</span>
															<div class="check-icon"> <img src="images/Check.png" alt=""></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<a href="javascript:;" class="btn btn-orange see-nf-btn">see more</a>
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
	</body>

	</html>
<?php 
require_once 'classes/configure.php'; 
include(DIR_BASE.'user_header.php');
if(!isset($userId) || $userId <= 0){
	$_SESSION['message_type'] = 'error';
	$_SESSION['message'] = 'Please login first!';
	header('Location: '.URL_BASE."login");
	exit;
}
$UserData = fetchqry('*',TB_USER,array("id="=>$userId));
?>
<div class="dashboard-main">   
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="owallet-wrap">
					<?php require_once DIR_BASE.'sidebar.php'; ?>
					<div class="owallet-right main">
						<div class="top-nav">
							<div class="owt-left">
                            <h5>Hi <?php echo $UserData['firstname'].' '.$UserData['lastname'];?> Welcome Back!</h5>
								<!--<form>
									<div class="form-group">
										<input type="text" class="form-control" placeholder="search">
										<span><i class="fa fa-search"></i></span>
									</div>
								</form>-->
							</div>
							<div class="owt-right">
								<!--<a href="javascript:;" class="upload"><span><i class="fas fa-upload"></i></span>sell your artwork</a>
								<div class="owt-option">
									<a href="javascript:;">
										<img src="<?php echo URL_BASE;?>images/wallet/bell-icol.png"/>
									</a>
									<a href="javascript:;">
										<img src="<?php echo URL_BASE;?>images/wallet/options-icon.png"/>
									</a>
									<a href="javascript:;">
										<i class="fas fa-user"></i>
									</a>
								</div>-->
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
													<img src="<?php echo URL_BASE;?>images/wallet/google-play.png" alt=""/>
												</a>
												<a href="javascript:;">
													<img src="<?php echo URL_BASE;?>images/wallet/app-store.png" alt=""/>
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
														<p>Pinky Ocean</p>
														<!--<span>Owner : iDoodleArt-C</span>-->
													</div>
													<!--<a href="javascript:;"><i class="far fa-heart"></i><span>212</span></a>-->
												</div>
												
												<div class="nfi-middle">
													<!--<div class="nfim-top-info">
														<a href="javascript:;"><i class="fas fa-share-alt"></i></a>
														<div class="countdown">02 : 10 : 40 : 52 left</div>
													</div>-->
													<div class="nfi-item-image">
														<img src="<?php echo URL_BASE;?>images/items/nft1.png" alt="">
													</div>
												</div>
												<div class="nfi-bottom">
													<div class="bid-detail">
														<span>Current Bid</span>
														<p>0.08935 ETH</p>
													</div>
													<!--<div class="nfi-profile">
														<img src="<?php echo URL_BASE;?>images/wallet/fp1-user.png" alt=""/>
													</div>
													<span class="uname">iDoodleStudio</span>
													<div class="check-icon">
														<img src="<?php echo URL_BASE;?>images/wallet/Check.png" alt="">
													</div>-->
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-sm-6">
											<div class="nf-list-item">
												<div class="nfli-top">
													<div class="nfi-detail">
														<p>Deep Sea Phantasy</p>
														<!--<span>Owner : iDoodleArt-C1994</span>-->
													</div>
													<!--<a href="javascript:;"><i class="far fa-heart"></i><span>212</span></a>-->
												</div>
												<div class="nfi-middle">
													<!--<div class="nfim-top-info">
														<a href="javascript:;"><i class="fas fa-share-alt"></i></a>
														<div class="countdown">02 : 10 : 40 : 52 left</div>
													</div>-->
													<div class="nfi-item-image">
														<img src="<?php echo URL_BASE;?>images/items/nft2.png" alt="">
													</div>
												</div>
												<div class="nfi-bottom">
													<div class="bid-detail">
														<span>Current Bid</span>
														<p>0.08935 ETH</p>
													</div>
													<!--<div class="nfi-profile">
														<img src="<?php echo URL_BASE;?>images/wallet/fp2-user.png" alt=""/>
													</div>
													<span class="uname">iDoodleStudio</span>
													<div class="check-icon"> <img src="<?php echo URL_BASE;?>images/wallet/Check.png" alt=""></div>-->
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-sm-6">
											<div class="nf-list-item">
												<div class="nfli-top">
													<div class="nfi-detail">
														<p>Rainbow Style</p>
														<!--<span>Owner : iDoodleArt-C1994</span>-->
													</div>
													<!--<a href="javascript:;"><i class="far fa-heart"></i><span>212</span></a>-->
												</div>
												<div class="nfi-middle">
													<!--<div class="nfim-top-info">
														<a href="javascript:;"><i class="fas fa-share-alt"></i></a>
														<div class="countdown">02 : 10 : 40 : 52 left</div>
													</div>-->
													<div class="nfi-item-image">
														<img src="<?php echo URL_BASE;?>images/items/nft3.png" alt="">
													</div>
												</div>
												<div class="nfi-bottom">
													<div class="bid-detail">
														<span>Current Bid</span>
														<p>0.08935 ETH</p>
													</div>
													<!--<div class="nfi-profile">
														<img src="<?php echo URL_BASE;?>images/wallet/fp3-user.png" alt=""/>
													</div>
													<span class="uname">iDoodleStudio</span>
													<div class="check-icon"> <img src="<?php echo URL_BASE;?>images/wallet/Check.png" alt=""></div>-->
												</div>
											</div>
										</div>

										<div class="col-lg-3 col-sm-6">
											<div class="nf-list-item">
												<div class="nfli-top">
													<div class="nfi-detail">
														<p>Two Tigers</p>
														<!--<span>Owner : iDoodleArt-C</span>-->
													</div>
													<!--<a href="javascript:;"><i class="far fa-heart"></i><span>212</span></a>-->
												</div>
												<div class="nfi-middle">
													<!--<div class="nfim-top-info">
														<a href="javascript:;"><i class="fas fa-share-alt"></i></a>
														<div class="countdown">02 : 10 : 40 : 52 left</div>
													</div>-->
													<div class="nfi-item-image">
														<img src="<?php echo URL_BASE;?>images/items/nft4.png" alt="">
													</div>
												</div>
												<div class="nfi-bottom">
													<div class="bid-detail">
														<span>Current Bid</span>
														<p>0.08935 ETH</p>
													</div>
													<!--<div class="nfi-profile">
														<img src="<?php echo URL_BASE;?>images/wallet/fp1-user.png" alt=""/>
													</div>
													<span class="uname">iDoodleStudio</span>
													<div class="check-icon"> <img src="<?php echo URL_BASE;?>images/wallet/Check.png" alt=""></div>-->
												</div>
											</div>
										</div>

									</div>
								</div>
								<!--<a href="javascript:;" class="btn btn-orange see-nf-btn">see more</a>-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>
<div class="owallet-left" id="sidebar">
	<a id="sidebarToggle">
		<img src="<?php echo URL_BASE;?>plugin/wallet/images/square.png">
	</a>
	<?php 
	   	$link = $_SERVER['PHP_SELF'];
	    $link_array = explode('/',$link);
	    $get_url = end($link_array);
    ?>
	<div class="list-group">
		<a href="<?php echo URL_BASE;?>"class="logo" >
			<img src="<?php echo URL_BASE;?>plugin/wallet/images/logo.png"alt=""/>
		</a>
		<a href="<?php echo URL_BASE;?>" class="mobile-logo">
			<img src="<?php echo URL_BASE;?>plugin/wallet/images/mobile-logo.png" alt="" />
		</a>
		
		<a href="<?php echo URL_BASE;?>dashboard" class="list-group-item <?php if($get_url == 'dashboard.php') { echo 'active'; } ?>">
			<i class="far fa-chart-bar"></i>
			<span>Dashboard</span> 
		</a>                                
		<a href="<?php echo URL_BASE;?>nft" class="list-group-item <?php if($get_url == 'nft.php') { echo 'active'; } ?>">
			<i class="fas fa-chart-line"></i>
			<span>Marketplace</span>
		</a>
		<!-- <a href="<?php echo URL_BASE;?>exchange" class="list-group-item <?php if($get_url == 'exchange.php') { echo 'active'; } ?>">
			<i class="fas fa-exchange-alt"></i>
			<span>Exchange</span>
		</a> -->

		<!--<a href="<?php echo URL_BASE;?>wallet" class="list-group-item">
			<i class="far fa-heart"></i>
			<span>NFT’s</span>
		</a>-->
		<a href="<?php echo URL_BASE;?>wallet" class="list-group-item <?php if($get_url == 'wallet.php') { echo 'active'; } ?>">
			<i class="fas fa-wallet"></i>
			<span>Wallet</span>
		</a>
		<a href="<?php echo URL_BASE;?>setting" class="list-group-item <?php if($get_url == 'setting.php') { echo 'active'; } ?>">
			<i class="fas fa-wrench"></i>
			<span>Settings</span>
		</a>
		<a href="<?php echo URL_BASE;?>logout" class="list-group-item <?php if($get_url == 'logout.php') { echo 'active'; } ?>">
			<i class="fas fa-sign-out-alt"></i>
			<span>Logout</span>
		</a>
	</div>
</div>
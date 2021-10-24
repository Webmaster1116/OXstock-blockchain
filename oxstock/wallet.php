<?php 
require_once 'classes/configure.php';
require_once "includes/braintree_init.php";
error_reporting(E_ERROR|E_WARNING);

include(DIR_BASE.'user_header.php');

$conn = mysqli_connect("localhost", "root", "", "oxstock");
if($conn === false){
	die("ERROR: Could not connect. " 
		. mysqli_connect_error());
}

if(!isset($userId) || $userId <= 0){
	$_SESSION['message_type'] = 'error';
	$_SESSION['message'] = 'Please login first!';
	header('Location: '.URL_BASE."login");
	exit;
}
$UserData = fetchqry('*',TB_USER,array("id="=>$userId));

if(isset($_REQUEST['send'])){
	
	$address_token = $_REQUEST['address_token'];
	$amount = $_REQUEST['amount'];
	$amount_usd = 0.5 * $_REQUEST['amount'];
	$from_wallet = $UserData['wallet'];
	$user_balance = shell_exec("oxcoin-cli.exe getbalance ".$UserData['wallet']."");
	if($address_token != '' && $amount != ''){
		if((intval($user_balance) - intval($amount)) >= 0){
			shell_exec("oxcoin-cli.exe move ".$UserData['wallet']." ".$address_token." ".($amount  - 1)." ");
			shell_exec("oxcoin-cli.exe move ".$UserData['wallet']." XKggPfmf9BEJhTi2KM84dZdJQ9FJu3pDNP 1");

			$sql = "INSERT INTO wallet_data (amount_ox, amount_usd, from_wallet, to_wallet, method) VALUES ('$amount','$amount_usd','$from_wallet','$address_token','OUT')";
        	mysqli_query($conn, $sql);
        	// mysqli_close($conn);
			header('Location: http://3.70.110.37/oxstock/wallet?error=true');
			exit;	
		}else{
			header('Location: http://3.70.110.37/oxstock/wallet?error=false');
			exit;
		}
	}else{
		header('Location: http://3.70.110.37/oxstock/wallet?error=empty');
		exit;
	}
}

// $CardData = fetchqry('*',TB_CARDS,array("user_id="=>$userId));

$link = mysqli_connect("localhost", "root", "", "oxstock");
  
if($link === false){
    die("ERROR: Could not connect. "
                . mysqli_connect_error());
}
  
$sql = "SELECT * FROM cards WHERE user_id=$userId";
if($res = mysqli_query($link, $sql)){
    if(mysqli_num_rows($res) > 0){
        
        while($row = mysqli_fetch_array($res)){
          echo $row['card_number'];
        }
        mysqli_free_result($res);
    } else{
      //   echo "No Matching records are found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql";
    mysqli_error($link);
}
  
mysqli_close($link);
?>

<style>
	.braintree-option__paypal{
		display: none;
	}
	.braintree-heading{
		display: none;
	}
	.amount-wrapper input{
		color: #000;
    font-size: 16px;
	}
	.pay_button{
		color: #000;
		padding: 5px 10px;
	}
</style>

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
                                    <!--<a href="javascript:;" class="upload"><span><i class="fas fa-upload"></i></span>sell
                                    your artwork</a>
                                    <div class="owt-option">
                                        <a href="javascript:;">
                                            <img src="<?php echo URL_BASE;?>images/wallet/bell-icol.png" />
                                        </a>
                                        <a href="javascript:;">
                                            <img src="<?php echo URL_BASE;?>images/wallet/options-icon.png" />
                                        </a>
                                        <a href="javascript:;">
                                            <i class="fas fa-user"></i>
                                        </a>
                                    </div>-->
                                </div>
								<br />
								<span style="color: white;margin-top: 20px;font-size: 20px;"><?php echo $UserData['wallet'];?></span>
                            </div>
                            <div class="owl-body oxwallet-body oxexchange-body">
                                <div class="owallet-offer">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <div class="oxbalance-card">
                                                <p>Ox Balance (Coin Balance)</p>
                                                <h3><?php echo $balance = shell_exec("oxcoin-cli.exe getbalance ".$UserData['wallet']."");?></h3>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <div class="oxproduct-sell">
                                                <h4> Buy/Sell Ox : $0.50 USD</h4>
                                                <div class="oxp-btn">
                                                    <button class="btn btn-orange" data-toggle="modal"
                                                    data-target="#buymodal">Buy</button>
                                                    <button class="btn btn-orange" data-toggle="modal"
                                                    data-target="#paymentmodal">Sell</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="owallet-operation">
							<h6>Send OX</h6>
							<div class="owallet-btn">
								<div class="ow-send">
									<a href="#" data-toggle="modal"
									data-target="#sendmodal"><i class="fas fa-arrow-up"></i>Send</a>
								</div>
								<!-- <div class="ow-address">
									<a href="#" data-toggle="modal"
									data-target="#addressmodal"><i class="fa fa-plus"></i>Add an Address</a>
								</div> -->
							</div>
						</div>
						<?php
							$sql_data = "SELECT * FROM `wallet_data`";
							$res_data = mysqli_query($conn, $sql_data);
						?>
						<div class="owallet-table">
							<h5>History</h5>
							<div class="ow-transation-title">
								<p>Recent transactions</p>
								<!--<p class="orange">More</p>-->
							</div>
							<div class="owt-table">
								<table class="table ">
									<thead>
										<th>Price Ox</th>
										<th>Amount USD</th>
										<th>From</th>
										<th>To</th>
										<th></th>
										<th>Time</th>
									</thead>
									<tbody>
										<?php
											if(mysqli_num_rows($res_data) > 0){
											while($row = mysqli_fetch_array($res_data)){
										?>
														<tr>
															<td><span class="green"><i class="fas fa-sort-up"></i></span><?php echo $row['amount_ox'];?></td>
															<td><?php echo $row['amount_usd'];?></td>
															<td><?php echo $row['from_wallet'];?></td>
															<td><?php echo $row['to_wallet'];?></td>
															<td class="green">Sell</td>
															<td><?php echo $row['created_at'];?></td>
														</tr>
										<?php } }else{ ?>
												<tr>
													<td colspan="6">No Record Found.</td>
												</tr>

										<?php } ?>	
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
													<form action="insert_card.php" method="post">
														<div class="row">
															<div class="col-md-12">
																<div class="form-group">
																	<input type="text" class="form-control" name="full_name" placeholder="Full Name">
																</div>
															</div>
															<div class="col-md-12">
																<div class="form-group">
																	<input type="number" class="form-control" name="card_number" placeholder="Card Number">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="number" min="" class="form-control" name="expire_date" placeholder="MM / YY">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group">
																	<input type="number" class="form-control" name="cvv" placeholder="CVV">
																</div>
															</div>
															<input type="number" name="user_id" value="{{$user_id}}" style="display: none" />
															<div class="col-md-12">
																<button type="submit" class="btn btn-orange"><i class="fa fa-plus"></i>To Wallet</button>
															</div>
														</div>
													</form>
												</div>

											</div>
										</div>
                                        
									</div>
									<div class="modal fade" id="sendmodal" tabindex="-1" role="dialog"
									aria-labelledby="sendmodalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal"
												aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form method="post">
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<input type="text" class="form-control addnewadd" placeholder="Address" name="address_token" require>
															<div class="icons">
																<img src="<?php echo URL_BASE;?>images/wallet/user2.png">
																<img src="<?php echo URL_BASE;?>images/wallet/scan.png">
															</div>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<input type="number" class="form-control addnewadd" placeholder="Amount" name="amount" require>
															<div class="avalue">
																<span>OX</span>
																<span class="orange">MAX</span>
															</div>
														</div>
													</div>
													<!-- <div class="col-md-12">
														<div class="form-group">
															<input type="password" class="form-control" placeholder="Password">
														</div>
													</div> -->
													<!-- <p>Transaction Fee 0.00</p> -->

													<div class="col-md-12">
														<button class="btn btn-orange" type="submit" name="send" id="send">Submit</button>
													</div>
												</div>
											</form>
										</div>

									</div>
								</div>
							</div>
                            <div class="modal fade" id="buymodal" tabindex="-1" role="dialog"
                                                aria-labelledby="buymodalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="buymodalLabel">Buy</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" id="payment-form" action="checkout.php">
                                                                <section>
                                                                    <label for="amount">
                                                                        <span class="input-label">Amount</span>
                                                                        <div class="input-wrapper amount-wrapper">
                                                                            <input id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
                                                                        </div>
                                                                    </label>

                                                                    <div class="bt-drop-in-wrapper">
                                                                        <div id="bt-dropin"></div>
                                                                    </div>
                                                                </section>
                                                                <input id="nonce" name="payment_method_nonce" type="hidden" />
                                                                <button class="button pay_button" type="submit"><span>Buy</span></button>
                                                                
                                                                
                                                            
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
						</div>
                        
						<div class="modal fade" id="bankmodal" tabindex="-1" role="dialog"
                        aria-labelledby="bankmodalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="payment-wrap">
                                        
                                        <h4>Australian Residents Only</h4>
                                        <p>BSB : *** ***</p>
										<p>ACC : *** ***</p>
										<p>Description : Your Email Address</p>

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
</div>

<div class="modal fade" id="paymentmodal" tabindex="-1" role="dialog"
                                aria-labelledby="paymentmodalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="payment-wrap">
				<figure>
					<img src="<?php echo URL_BASE;?>images/wallet/check-orange.png" alt="">
				</figure>
				<h4>Payment Success</h4>
				<p>Your Payment for 0.0214 OX was Successfully Completed</p>
				<a href="oxwallet.html" class="btn btn-orange">Go To Wallet</a>

			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(function () {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function (start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
</script>
<script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = "<?php echo($gateway->ClientToken()->generate()); ?>";

        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
          }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
    </script>
<script>
	$("#bt-dropin").on('click', '.braintree-large-button', function(){
		if($(".bank-transfer").length == 0){
			$(".braintree-option__card").after("<div class='bank-transfer' data-toggle='modal' data-target='#bankmodal' style='display:block; padding: 10px 12px; cursor:pointer;'><img style='width:50px'  src='images/banktransfer.png'/><span style='color:#000; padding-left: 25px; font-size: 16px;'>Bank Transfer</span></div>");
		} 
	});
</script>
</body>

</html>
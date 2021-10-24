<?php 
require_once 'classes/configure.php';
require_once "includes/braintree_init.php";

include(DIR_BASE.'user_header.php');
if(!isset($userId) || $userId <= 0){
    $_SESSION['message_type'] = 'error';
    $_SESSION['message'] = 'Please login first!';
    header('Location: '.URL_BASE."login");
    exit;
}
$UserData = fetchqry('*',TB_USER,array("id="=>$userId));
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
                                <div class="oxe-chartwrap">
                                    <div class="oxe-chart-detail">
                                        <div class="chart-name">
                                            <h4>Exchange Chart</h4>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                        <div class="oxe-chart-form-info">
                                            <form>
                                                <div class="form-group">
                                                    <input type="text" name="daterange" value="01/01/2018 - 01/15/2018"
                                                    class="form-control drp" />
                                                    <span><img src="<?php echo URL_BASE;?>images/wallet/calnder.png"></span>
                                                </div>

                                                <div class="form-group">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>USD ($ US Dollar)1</option>
                                                        <option>USD ($ US Dollar)2</option>
                                                        <option>USD ($ US Dollar)3</option>
                                                    </select>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <figure>
                                        <img src="<?php echo URL_BASE;?>images/wallet/chart.png" alt="">
                                    </figure>
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
                                                                <td>18 Mins</td>
                                                            </tr>
                                                            <tr>
                                                                <td><span class="green"><i
                                                                    class="fas fa-sort-up"></i></span>0.024842</td>
                                                                    <td>0.086242</td>
                                                                    <td class="green">Buy</td>
                                                                    <td>27 Mins</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
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
                                                            
                                                            <!-- <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input type="number" class="form-control"
                                                                        placeholder="Enter Your Amount">
                                                                        <span>OX</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <select class="form-control"
                                                                        placeholder="Choose Currency">
                                                                        <option>Choose Currency</option>
                                                                        <option>$</option>
                                                                        <option>RS</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <select class="form-control"
                                                                    placehlder="Choose Card">
                                                                    <option>Choose Card</option>
                                                                    <?php 
                                                                    $link = mysqli_connect("localhost", "root", "", "oxstock");
  
                                                                    if($link === false){
                                                                        die("ERROR: Could not connect. "
                                                                                    . mysqli_connect_error());
                                                                    }
                                                                      
                                                                    $sql = "SELECT * FROM cards WHERE user_id=$userId";
                                                                    if($res = mysqli_query($link, $sql)){
                                                                        if(mysqli_num_rows($res) > 0){
                                                                            
                                                                            while($row = mysqli_fetch_array($res)){
                                                                                echo "<option>" . $row['card_number'] . "</option>";
                                                                            
                                                                            }
                                                                            mysqli_free_result($res);
                                                                        } else{
                                                                            echo "No Matching records are found.";
                                                                        }
                                                                    } else{
                                                                        echo "ERROR: Could not able to execute $sql. " 
                                                                                                    . mysqli_error($link);
                                                                    }
                                                                      
                                                                    mysqli_close($link);
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button class="btn btn-orange">Buy</button>
                                                        </div>
                                                    </div> -->
                                                </form>
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
                        </div>
                    </div>
                </div>
            </div>
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
</body>

</html>
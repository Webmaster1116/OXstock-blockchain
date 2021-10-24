<?php 
require_once 'classes/configure.php';
require_once("includes/braintree_init.php");

include(DIR_BASE.'user_header.php');
if(!isset($userId) || $userId <= 0){
    $_SESSION['message_type'] = 'error';
    $_SESSION['message'] = 'Please login first!';
    header('Location: '.URL_BASE."login");
    exit;
}
$UserData = fetchqry('*',TB_USER,array("id="=>$userId));

    //require_once("includes/header.php");
    if (isset($_GET["id"])) {
        $transaction = $gateway->transaction()->find($_GET["id"]);
       // print_r($transaction);exit;
        $conn = mysqli_connect("localhost", "root", "", "oxstock");
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

        $payment_id =  $transaction->id;
        $pay_type = $transaction->type;
        $curr_isocode = $transaction->currencyIsoCode;
        $amount =  $transaction->amount;
        $status = $transaction->status;
          
        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO payment_success_data (payment_id, payment_type, currencyIsoCode, amount, payment_status) VALUES ('$payment_id','$pay_type','$curr_isocode','$amount','$status')";
        mysqli_query($conn, $sql);
          
        // Close connection
        mysqli_close($conn);

        $transactionSuccessStatuses = [
            Braintree\Transaction::AUTHORIZED,
            Braintree\Transaction::AUTHORIZING,
            Braintree\Transaction::SETTLED,
            Braintree\Transaction::SETTLING,
            Braintree\Transaction::SETTLEMENT_CONFIRMED,
            Braintree\Transaction::SETTLEMENT_PENDING,
            Braintree\Transaction::SUBMITTED_FOR_SETTLEMENT
        ];

        /*if (in_array($transaction->status, $transactionSuccessStatuses)) {
            $header = "Sweet Success!";
            $icon = "success";
            $message = "Your transaction has been successfully processed. See the Braintree API response and try again.";
        } else {
            $header = "Transaction Failed";
            $icon = "fail";
            $message = "Your transaction has a status of " . $transaction->status . ". See the Braintree API response and try again.";
        }*/
    }

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
					
                                    <form>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="search">
                                            <span><i class="fa fa-search"></i></span>
                                        </div>
                                    </form>
                                </div>
                                <div class="owt-right">
                                    <!--<a href="javascript:;" class="upload"><span><i class="fas fa-upload"></i></span>sellyour artwork</a>
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
                                        <!--<div class="col-sm-6 col-md-4">
                                            <div class="oxbalance-card">
                                                <p>Ox Balance (Coin Balance)</p>
                                                <h3><?php // echo $balance = shell_exec("oxcoin-cli.exe getbalance '".$UserData['wallet']."'");?></h3>
                                            </div>
                                        </div>-->
                                        <div class="col-sm-12 col-md-10">
                                            <div class="oxproduct-sell">
                                                <h4> Payment Success</h4>
                                                <p><?php $coin_value=$transaction->amount/1.022/0.5;
                                                    shell_exec('oxcoin-cli.exe move "" '.$UserData['wallet'].' '.$coin_value.'');
                                                ?>
                                                </p>
						                            <p>Payment of $ <?php echo($transaction->amount)?> has been successfully processed!. <?php // echo($transaction->amount)?> OX Coin has been added to your wallet.</p>
						                            <a href="<?php echo URL_BASE;?>wallet" class="btn btn-orange">Go To Wallet</a>			
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
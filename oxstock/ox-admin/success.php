<?php require_once 'classes/configure.php'; ?>
<?php include('includes/header.php');?>
<?php
if($_POST['payment_status'] == 'Completed' && $_POST['payer_status'] == 'VERIFIED')
			{
				print_r($_POST);exit;
			}

?>
		
		<!-- Banner Area Start -->
		<section class="banner-area text-left">	
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="banner-content-wrapper">
                            <div class="banner-content">
                                <h2>Payment Success</h2>
                                <div class="banner-breadcrumb">
                                    <ul>
                                        <li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].str_replace($_SERVER['DOCUMENT_ROOT'],'', dirname($_SERVER['SCRIPT_FILENAME'])); ?>">home </a> <i class="zmdi zmdi-chevron-right"></i></li>
                                        <li>Payment Success</li>
                                    </ul>
                                </div>
                            </div>  
                        </div> 
                    </div>
                </div>
            </div>
		</section>
		<!-- Banner Area End -->
        
        <section class="about-area pt-95 pb-95 res-pb40">
           <div class="container">
           
           		 <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12">
                       <div class="about-content usebout pt-60 res-40">
                            <h3 class="text-center pb-40">Your payment is successful</h3>
                            <p>We have sent you an email with the confirmation of the payment. After we verify your booking details, we will send you another email with the access details of the smartpress.</p>
                            <p>Have fun.</p>
                       </div>
                   </div>
				</div>
           
           </div>
        </section>
<?php include('includes/footer.php');?>

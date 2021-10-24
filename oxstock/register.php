<?php 
require_once 'classes/configure.php'; 
include('header.php');
if(isset($userId) && $userId > 0){
	header('Location: '.URL_BASE);
	exit;
}
if(isset($_POST) && isset($_POST['subBtnRegister']) && $_POST['subBtnRegister'] != ''){
    $firstname = isset($_POST['firstname']) ? trim($_POST['firstname']) : '';
    $lastname = isset($_POST['lastname']) ? trim($_POST['lastname']) : '';
    $phoneno = isset($_POST['phoneno']) && $_POST['phoneno'] > 0 ? $_POST['phoneno'] : 0;
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $birthdate = isset($_POST['birthdate']) ? trim($_POST['birthdate']) : '';
	$referral = isset($_POST['referral']) ? trim($_POST['referral']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $cpassword = isset($_POST['cpassword']) ? $_POST['cpassword'] : '';
    
    if($firstname != '' && $lastname != '' && $phoneno > 0 && $email != '' && $birthdate != '' && $password != '' && $cpassword != ''){
    	if($password == $cpassword){
    		//
    		$q = $db->pdoQuery("SELECT 1 FROM user WHERE email = ? LIMIT 1 ",array($email));
    		if($q->affectedRows() <= 0){
    			$output = shell_exec('oxcoin-cli.exe getnewaddress 2>&1');
				$wAddress = substr($output, 0, -1);
				shell_exec("oxcoin-cli.exe setaccount $wAddress $wAddress");
    			$insertData = array(
    				'firstname' => $firstname,
    				'lastname' => $lastname,
    				'phoneno' => $phoneno,
    				'email' => $email,
    				'birthdate' => $birthdate,
					'referral' => $referral,
    				'password' => encode($password),
    				'ondatetime' => date('Y-m-d H:i:s'),
					'wallet' => $wAddress
    			);
    			$userId = $db->insert("user",$insertData)->getLastInsertId();
    			if($userId > 0){
    				$_SESSION['message_type'] = 'success';
    				$_SESSION['message'] = 'Registered successfully';
    				header('Location: '.URL_BASE);
    				exit();
    			}
    			else{
    				$_SESSION['message_type'] = 'error';
    				$_SESSION['message'] = 'Something went wrong!';
    				header('Location: '.URL_BASE."register/");
    				exit();
    			}
    		}
    		else{
    			$_SESSION['message_type'] = 'error';
    			$_SESSION['message'] = 'Email already exists!';
    			header('Location: '.URL_BASE."register/");
    			exit();
    		}
    	}
    	else{
    		$_SESSION['message_type'] = 'error';
    		$_SESSION['message'] = 'Passwords are not matching';
    		header('Location: '.URL_BASE."register/");
    		exit();
    	}
    }
    else{
        $_SESSION['message_type'] = 'error';
        $_SESSION['message'] = 'Please fill all values';
        header('Location: '.URL_BASE."register/");
        exit();
    }
}
?>

<section class="contact-dtls regester-dtls">

	<div class="container">

		<div class="row">

			<div class="col-md-6">
				<div class="cont-form">

					<h2>Register</h2>

					<form action="" method="POST" name="register-form" id="register-form">
						<div class="form-group half-width">
							<input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
						</div>
						<div class="form-group half-width">
							<input type="last-name" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
						</div>
						<div class="form-group half-width">
							<input type="number" class="form-control" name="phoneno" id="phoneno" placeholder="Mobile Number">
						</div>
						<div class="form-group half-width">
							<input type="text" class="form-control" name="email" id="email" placeholder="Email Adress">
						</div>
						<div class="form-group full-width">
							<input type="date" class="form-control" id="birthdate" name="birthdate" placeholder="DOB" max="<?php echo date('Y-m-d');?>">
						</div>
						<div class="form-group full-width">
							<input type="text" class="form-control" name="referral" id="referral" placeholder="Referral Code">
						</div>
						<div class="form-group full-width">
							<input type="password" class="form-control" id="password" name="password"  placeholder="Password">
						</div>
						<div class="form-group full-width">
							<input type="password" class="form-control" id="cpassword" name="cpassword"  placeholder="Confirm Password">
						</div>
						<div class="contain full-width">
							<p>Already have an Account? <a href="<?php echo URL_BASE;?>login">Log in</a></p>
							<p><input type="checkbox" class="form-control" id="terms" name="terms">I agree to the  <a href="<?php echo URL_BASE;?>terms-and-conditions" target="_blank">Terms & Conditions</a></p>
						</div>
						<div class="pp-btn">
							<button type="submit" name="subBtnRegister" id="subBtnRegister" value="submit" class="btn btn-default">register</button>
						</div>
					</form>
				</div>   
			</div>

			<div class="col-md-6">
				<div class="right-img">
					<img src="<?php echo URL_BASE;?>plugin/images/register.png">
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$("#register-form").validate({
			ignore:[],
			errorClass: 'help-block',
			rules : {
				firstname : {
					required : true
				},
				lastname : {
					required : true
				},
				phoneno : {
					required : true,
					digits: true
				},
				birthdate : {
					required : true
				},
				referral : {
					required : false
				},
				password : {
					required : true,
					minlength: 6
				},
				cpassword:{
					required : true,
					minlength: 6,
					equalTo : "#password"
				},
				terms : {
					required : true
				}
			},
			messages : {
				firstname : {
					required : "Please enter first name"
				},
				lastname : {
					required : "Please enter last name"
				},
				phoneno : {
					required : "Please enter phone no",
					digits: "Please enter digits only"
				},
				birthdate : {
					required : "Please enter birthdate"
				},
				password : {
					required : "Please enter password",
					minlength: "Minlength should be 6"
				},
				cpassword:{
					required : "Please enter llast name",
					minlength: "Minlength should be 6",
					equalTo : "Passwords not matching"
				},
				terms : {
					required : "Please checked terms and condition"
				}
			},
			highlight: function (element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight: function (element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			errorPlacement: function (error, element) { 
				if (element.attr("data-error-container")) { 
					error.appendTo(element.attr("data-error-container"));
				} else {
					error.insertAfter(element);
				}
				error.addClass('error');
			}
		});
	});
</script>
<?php include('footer.php'); ?>
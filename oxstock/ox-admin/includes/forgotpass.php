<?php
	include('script_top.php'); 	
	
		if($_REQUEST['ptype']=='sendmail')
	{
		if($_REQUEST['type']=='forgot')
		{
			$value = $_REQUEST['email']; 
			if($value!="")
			{
				$chkqry = "SELECT * FROM `".TB_USER."` WHERE email  = '".$value."' ";
				if($_REQUEST['notid'])
					$chkqry .= "and id != '".$_REQUEST['notid']."' ";
						
				$check=mysqli_num_rows(mysqli_query($con,$chkqry));
				if($check == 0)
					echo '';
				else
					echo '<span class="alertredmsg" style="color:red;">Email already exist.</span>|';
					return false;
			}
		}
	}
	
		
	
/*	if($_REQUEST['ptype']=='sendmail')
	{
		if($_REQUEST['type']=='forgot')
		{
			$email = fetchqry('*',TB_USER,array("email="=>$_REQUEST['email']));
			$check=mysqli_num_rows(mysqli_query($con,$email));
			
			if($check > 0)
			{ 
			    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
				$password = substr( str_shuffle( $chars ), 0, 8 );
				updateqry(array("password =" => encode($password)),array("email="=>$_REQUEST['email']),TB_USER);
				
				$body = '<div style="font:12px/20px Arial, Helvetica, sans-serif;">';
                $body .= 'Hi '.$fetch_data['name'].','.'
        
                 <table border="0">
				        <tr>
					   		<td>Username:</td>
							<td>'.$email['username'].'</td>
					   </tr>
					   <tr>
					   		<td>Email</td>
							<td>'.$email['email'].'</td>
					   </tr>
					   <tr>
					   		<td>Password</td>
							<td>'.$password.'</td>
					   </tr>
				</table>
				 
				 
                 </div>';
                
                require_once("tadmin/smtp/class.phpmailer.php");
        
                $mail = new PHPMailer();
                $mail->IsSMTP(); // set mailer to use Mail
                $mail->Host = 'mail.harshatilva.com'; // specify main and backup server
                $mail->SMTPAuth = 'true'; // turn on SMTP authentication
                $mail->SMTPSecure = "ssl";   
                $mail->Username = 'noreply@harshatilva.com'; // SMTP username
                $mail->Password = '123456789'; // SMTP password
                $mail->Port = 465;
        
                $mail->From =  'noreply@harshatilva.com';
                $mail->FromName = 'Smart Press';
                $mail->AddAddress($_POST['forgot_email']);  
                
                $mail->Subject = "Forgot Password";
                $mail->Body = $body;
                
                if(!$mail->Send()){
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    header("Location:".URL_BASE.USER_LOGIN."?error=fail");
                    die();
                }else{
					echo '<span class="text-success" style="cursor:pointer">Email not found</span>';
                }
				
			}
			else
			{ 
				echo '<span class="alertredmsg" style="color:red;">Email already exist.</span>|';
				return false;	
			}
		}
	} */
?>

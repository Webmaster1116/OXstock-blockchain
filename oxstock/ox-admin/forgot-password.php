<?php 
include('include/config.php');


if(isset($_POST['submit']))
{
        $qry = mysqli_query($conn,"select * from admin_user where email = '".$_POST['email']."' ");
		if(mysqli_num_rows($qry)>0)
		{
            $res = mysqli_fetch_assoc($qry);
            $_SESSION['errormsg'] = "Password send successfully";
            
            $body = 'Hello,';
            $body .= '<br/><br/><br/>';
            $body .= '<strong>CRM</strong> <br/> Your Password is : <strong>'.$res['password'].'</strong>';
            $to= $res['email'];
            $subject='CRM : Forgot Password';
            $headers='MIME-Version: 1.0' . "\r\n";
            $headers.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers.= 'From: <KPVE-TEST.com.au>' . "\r\n";
            mail($to,$subject,$body,$headers);
		}
		else
		{
			$_SESSION['errormsg'] = "Email not match";
		}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRM</title>

    <meta http-equiv="X-UA-Compatible" content=="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="libs/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/open-sans/styles.css">
    <link rel="stylesheet" type="text/css" href="libs/tether/css/tether.min.css">
    <link rel="stylesheet" type="text/css" href="assets/styles/common.min.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/pages/auth.min.css">
</head>
<body>

<div class="ks-page">
    <div class="ks-page-content">
        <div class="ks-logo"><img src="images/klogo.png" /></div>

        <div class="card panel panel-default ks-light ks-panel ks-login">
            <div class="card-block">
                <form class="form-container" action="" method="post" >
                    <h4 class="ks-header">Forgot Password</h4>
                    <?php 
					if(isset($_SESSION['errormsg']))
					{
						echo '<h5 class="card-title text-danger" align="center">'.$_SESSION['errormsg'].'</h5>';
					}
					unset($_SESSION['errormsg']);
					?>
                    <div class="form-group">
                        <div class="input-icon icon-left icon-lg icon-color-primary">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                            <span class="icon-addon">
                                <span class="la la-at"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Send</button>
                    </div>
                    <div class="ks-text-center">
                        <!--Don't have an account. <a href="pages-signup.html">Sign Up</a>-->
                    </div>
                    <div class="ks-text-center">
                        <a href="index.php">Login</a>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
    <div class="ks-footer">
        <span class="ks-copyright">&copy; <?php //echo date('Y'); ?> KPVE PTY LTD.</span>        
    </div>
</div>

<script src="libs/jquery/jquery.min.js"></script>
<script src="libs/tether/js/tether.min.js"></script>
<script src="libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
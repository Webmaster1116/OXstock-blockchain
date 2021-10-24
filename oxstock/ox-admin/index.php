<?php 

    include('includes/script_top.php');	

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<title>Oxstocks ADMIN</title>

<meta http-equiv="X-UA-Compatible" content=="IE=edge"/>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>libs/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/fonts/line-awesome/css/line-awesome.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/fonts/open-sans/styles.css">

<link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>libs/tether/css/tether.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/styles/common.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/styles/pages/auth.min.css">

<link rel="stylesheet" href="<?php echo URL_BASEADMIN.DIR_VALIDTIPS; ?>src/tip-red/tip-red.css" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>libs/izi-modal/css/iziModal.min.css"> <!-- Original -->

<link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/styles/libs/izi-modal/izi-modal.min.css"> <!-- Original -->

</head>

<body>

<div class="ks-page">

    <div class="ks-page-content">

        <div class="ks-logo"><img src="images/klogo.png" height="150" width="300"/></div>        

        <div class="card panel panel-default ks-light ks-panel ks-login">

            <div class="card-block">

                <form class="form-container" action="<?php echo URL_BASEADMIN.LOGIN_PAGE; ?>" id="login" name="login" onsubmit="return chkrequired();" method="post" >

                    <h4 class="ks-header">Admin Login</h4>                    

                    <div class="form-group">

                        <div class="input-icon icon-left icon-lg icon-color-primary">

                            <input type="text" class="form-control" placeholder="User / Email Address" id="email" name="email" />

                            <span class="icon-addon">

                                <span class="la la-at"></span>

                            </span>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="input-icon icon-left icon-lg icon-color-primary">

                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" />

                            <span class="icon-addon">

                                <span class="la la-key"></span>

                            </span>

                        </div>

                    </div>

                    <div class="form-group">

                        <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>

                    </div>

                    <div class="ks-text-center">

                        <!--Don't have an account. <a href="pages-signup.html">Sign Up</a>-->

                    </div>

                    <div class="ks-text-center">

                        <a href="forgot-password.php">Forgot your password?</a>

                    </div>                    

                </form>

            </div>

        </div>

    </div>

    <div class="ks-footer">

        <span class="ks-copyright">&copy; <?php echo BASSOCCIATES; ?></span>        

    </div>

</div>

<script src="<?php echo URL_BASEADMIN; ?>libs/jquery/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo URL_BASEADMIN.DIR_VALIDTIPS; ?>src/jquery.mjstip.js"></script>

<?php include(DIR_BASEADMIN.DIR_FUNCTIONS.'jsfunction.php'); ?>

<script src="<?php echo URL_BASEADMIN; ?>libs/tether/js/tether.min.js"></script>

<script src="<?php echo URL_BASEADMIN; ?>libs/bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo URL_BASEADMIN; ?>libs/izi-modal/js/iziModal.min.js"></script>

<script type="text/javascript">

function chkrequired()

{

	var chk = new Array();

	chk['e:email'] = "E-mail.";

	chk['t:password'] = "Password.";

	return check(chk,1);

}

</script>

</body>

</html>
<?php 
require_once 'classes/configure.php'; 
include('header.php'); ?>
    <!---------------------- end priching ---------------->
    <section class="login_form">
        <div class="container">
<div class="row">
            <div class="col-md-6">   
            <div class="login-form">
                <h2>Log In</h2>
                <form action="/action_page.php" id="form1">

                    <div class="form-group half-width">
                        <input type="user" class="form-control" placeholder="user Name">
                    </div>
                    <div class="form-group half-width">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="chekbox">
                        <input type="checkbox" id="Remember" name="Remember" value="Remember">
                        <label for="Remember">Remember Me</label>
                    </div>
                    <div class="pp-btn">
                        <button type="button" class="btn btn-default">Submit</button>

                    </div>
                </form>
                <div class="none-user">
                    <div class="left-sign">
                        <p>New User? <a href="#">SignUp</a></p>
                    </div>
                    <div class="right-passn">
                        <a href="#">Forgot Your Password ?</a>
                    </div>
                </div>
            </div>
                 </div>
    <div class="col-md-6">
    <div class="login-image">
        <img src="<?php echo URL_BASE;?>plugin/images/login-page.png">
        </div>
    </div>
            </div>
        </div>
    </section>


  <!---------------------- footer ---------------->
  <?php include('footer.php'); ?>
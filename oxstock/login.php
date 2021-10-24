<?php 
require_once 'classes/configure.php'; 
include(DIR_BASE.'header.php');
if(isset($userId) && $userId > 0){
    header('Location: '.URL_BASE);
    exit;
}
if(isset($_POST) && isset($_POST['subBtnLogin']) && $_POST['subBtnLogin'] != ''){
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    if($email != '' && $password != ''){
        $q = $db->pdoQuery("SELECT * FROM user WHERE email = ? AND password = ? LIMIT 1 ",array($email,encode($password)));
        if($q->affectedRows() > 0){
            $data = $q->result();
            setcookie('email', $email, time() + (86400 * 30), "/");
            setcookie('password', $password, time() + (86400 * 30), "/");
            setcookie('remember', 'y', time() + (86400 * 30), "/");
            $_SESSION['userId'] = $data['id'];
            $_SESSION['message_type'] = 'success';
            $_SESSION['message'] = 'Login successfully';
            header('Location: '.URL_BASE);
            exit();
        }
        else{
            $_SESSION['message_type'] = 'error';
            $_SESSION['message'] = 'Invalid email or password';
            header('Location: '.URL_BASE."login/");
            exit();
        }
    }
    else{
        $_SESSION['message_type'] = 'error';
        $_SESSION['message'] = 'Please fill all values';
        header('Location: '.URL_BASE."login/");
        exit();
    }
}
?>

<section class="login_form">

    <div class="container">

        <div class="row">

            <div class="col-md-6">   

                <div class="login-form">

                    <h2>Log In</h2>

                    <form action="" method="POST" name="login-form" id="login-form">
                        <div class="form-group half-width">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email*" <?php echo ((isset($_COOKIE['email']) && $_COOKIE['email'] != '') ? "value='".$_COOKIE['email']."'" : ''); ?> >
                        </div>
                        <div class="form-group half-width">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" <?php echo ((isset($_COOKIE['password']) && $_COOKIE['password'] != '') ? "value='".$_COOKIE['password']."'" : ''); ?> >
                        </div>
                        <div class="chekbox">
                            <input type="checkbox" id="remember" name="remember" value="y" <?php echo ((isset($_COOKIE['remember']) && $_COOKIE['remember'] == 'y') ? "checked" : ''); ?>>
                            <label for="Remember">Remember Me</label>
                        </div>
                        <div class="pp-btn">
                            <button type="submit" name="subBtnLogin" id="subBtnLogin" value="submit" class="btn btn-default">Submit</button>
                        </div>
                    </form>
                    <div class="none-user">
                        <div class="left-sign">
                            <p>New User? <a href="<?php echo URL_BASE;?>register">SignUp</a></p>
                        </div>
                        <div class="right-passn">
                            <a href="<?php echo URL_BASE;?>forgot-password">Forgot Your Password ?</a>
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
<script type="text/javascript">
    $(document).ready(function(){
        $("#login-form").validate({
            ignore:[],
            errorClass: 'help-block',
            rules : {
                email : {
                    required : true,
                    email: true
                },
                password : {
                    required : true
                }
            },
            messages : {
                email : {
                    required : "Please enter user name.",
                    email: "Enter valid email address"
                },
                password : {
                    required : "Please enter password."
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
<?php 
include('footer.php');
?>
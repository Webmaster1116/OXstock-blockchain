<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "User";
    $listpagename = USER_LIST;
    $table = TB_USER;
    $created_at = date('Y-m-d H:i:s');
    $status = "active";

    if ($_REQUEST['id']) {
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
        
        $first_name = $data['firstname'];
        $middlename = $data['middlename'];
        $last_name = $data['lastname'];
        $email = $data['email'];
        $phone = $data['phoneno'];
        $address = $data['address'];
        $address_data = $data['address_data'];
        $birthdate = $data['birthdate'];
        $referral = $data['referral'];

        $city = $data['city'];
        $state = $data['state'];
        $country = $data['country'];
        $zipcode = $data['zipcode'];
        $wallet = $data['wallet'];
    } else {
        $pagetype = "New";
        
        $first_name = $_REQUEST['first_name'];
        $middlename = $_REQUEST['middlename'];
        $last_name = $_REQUEST['last_name'];
        $email = $_REQUEST['email'];
        $phone = $_REQUEST['phone'];
        $address = $_REQUEST['address'];
        $address_data = $_REQUEST['address_data'];
        $birthdate = $_REQUEST['birthdate'];
        $referral = $data['referral'];

        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $country = $_REQUEST['country'];
        $zipcode = $_REQUEST['zipcode'];
    }
    if (strpos($_SERVER['REQUEST_URI'], "?true") != 0) {
        $temp = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?true"));
        $backurlfirstpart = substr($temp, strpos($temp, "?true"), strpos($temp, "&id"));
        $temp = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "&id") + 4);
        if (strpos($temp, "&") != 0)
            $backurllastpart = substr($temp, strpos($temp, "&"));
        $gobackurl = $backurlfirstpart . $backurllastpart;
    }
    else {
        $gobackurl = "?true";
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <!-- BEGIN HEAD -->
        <head>
             <?php include('includes/head.php'); ?>  
        </head>

        <body class="customer-add-page invoice-list-page ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> 
            <!-- remove ks-page-header-fixed to unfix header -->
            <?php include('includes/header.php'); ?>
            <div class="ks-page-container ks-dashboard-tabbed-sidebar-fixed-tabs"> 
                 <?php include('includes/sidebar.php'); ?>
                <div class="ks-column ks-page">
                    <div class="ks-page-header">
                        <section class="ks-title">
                            <h3><?php echo $pagetype . ' ' . $pagename; ?></h3>
                        </section>
                    </div>

                    <div class="ks-page-content">
                        <div class="ks-page-content-body">
                            <div class="ks-nav-body-wrapper">
                                <div class="container-fluid">
                                    <form action="" name="mainform" id="mainform" method="post" enctype="multipart/form-data" onsubmit="return submitform();">
                                        <div class="row">
                                            <div class="col-lg-8 ks-panels-column-section">   
                                                <!-- start:- First Slide -->
                                                <div class="card">                                                
                                                    <div class="card-block">
                                                        <div>
                                                            <h5 class="card-title"><?php echo "User Deails"; ?></h5>
                                                            
                                                           
                                                            
                                                            <div class="form-group row">
                                                                <label for="first_name" class="col-sm-2 form-control-label">Name</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo $first_name; ?>" placeholder="First Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="middlename" name="middlename" class="form-control" value="<?php echo $middlename; ?>" placeholder="First Name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="last_name" name="last_name" class="form-control" value="<?php echo $last_name; ?>" placeholder="Last Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email" class="col-sm-2 form-control-label">email</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="email" name="email" class="form-control" value="<?php echo $email; ?>" <?php if($_REQUEST['id'] != ""){ echo "disabled"; }?> >
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label for="email" class="col-sm-2 form-control-label">Wallet ID</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" class="form-control" value="<?php echo $wallet; ?>" disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="phone" class="col-sm-2 form-control-label">Phone</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $phone; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="phone" class="col-sm-2 form-control-label">Birthdate</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">                                                               
                                                                        <input type="date" id="birthday" name="birthday" placeholder="DOB" value="<?php echo $birthdate; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="referral" class="col-sm-2 form-control-label">Referral Code</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">                                                               
                                                                        <input class="form-control" type="text" id="referral" name="referral" placeholder="Referral Code" value="<?php echo $referral; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            
                                                            <?php  if ($_REQUEST['id'] == "") { ?>
                                                                <div class="form-group row">
                                                                    <label for="password " class="col-sm-2 form-control-label">Password</label>
                                                                    <div class="col-sm-9">
                                                                        <div class="input-group">                                                               
                                                                            <input type="password" id="password" name="password" class="form-control" value="<?php echo $password; ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php  } ?>
                                                            
                                                           
                                                            <div class="form-group row">
                                                                <label for="city" class="col-sm-2 form-control-label">City</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="city" name="city" class="form-control" value="<?php echo $city; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="state" class="col-sm-2 form-control-label">State</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="state" name="state" class="form-control" value="<?php echo $state; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="country" class="col-sm-2 form-control-label">Country</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="country" name="country" class="form-control" value="<?php echo $country; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="zipcode" class="col-sm-2 form-control-label">Zipcode</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="zipcode" name="zipcode" class="form-control" value="<?php echo $zipcode; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                          
                                                            
                                                            <div class="form-group row">
                                                                <label for="address" class="col-sm-2 form-control-label">Address</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="address" name="address" class="form-control" value="<?php echo $address; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="address" class="col-sm-2 form-control-label">Appartment</label>
                                                                <div class="col-sm-9">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="address" name="address_data" class="form-control" value="<?php echo $address_data; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                           
                                                            
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <button class="btn btn-success right" type="button" onclick="return savennew(0);">Save</button>
                                                            </div>
                                                            <div class="col-sm-6 text-right">
                                                                <a class="btn btn-danger right" href="<?php echo URL_BASEADMIN . $listpagename . $gobackurl; ?>">Back</a>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end:- First Slide -->
                                                <input type="hidden" name="addnew" id="addnew" value="0" />
                                                <input type="submit" style="display:none" name="hidesubmit" />                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php include('includes/script_bottom.php'); ?>
        </body>
    </html>
    <?php
    /*     * Check Page Authantication * */
} else {
    include(DIR_BASEADMIN . DIR_INCLUDES . INC_DONTACCESSMSG);
}
?>
<script type="text/javascript">
    function chkrequired() {
        var chk = new Array();
            chk['e:email'] = "Email";
            chk['t:phone'] = "Phone";
            chk['t:password'] = "Password";
        if (check(chk, 1))
            document.mainform.submit();
    }
    //CKEDITOR.replace('description_one', {toolbar: 'Basic', height: 100});
     $('#imagetrigger').click(function (e) {
            $('#image').trigger('click');
    });
    $('#image').on('change', function () {
        $('#imagefilename').html($(this).val());
    });
    $('#logotrigger').click(function (e) {
            $('#logo').trigger('click');
    });
    $('#logo').on('change', function () {
        $('#logofilename').html($(this).val());
    });
</script>
<?php
if (isset($_POST['addnew'])) {
    // print_r($_POST);exit;
    $password = encode($_POST['password']);
    if ($_REQUEST['id'] == "") {
        $arr = array( "firstname" => $_POST['first_name'],"middlename" => $_POST['middlename'], "lastname" => $_POST['last_name'], "email" => $_POST['email'], "phoneno" => $_POST['phone'],"address" => $_POST['address'],"address_data" => $_POST['address_data'],"birthdate" => $_POST['birthday'], "referral" => $_POST['referral'],"password" => $password,"city" => $_POST['city'],"state" => $_POST['state'],"country" => $_POST['country'],"zipcode" => $_POST['zipcode'], "ondatetime"=> $created_at );
    }else{
        $arr = array( "firstname" => $_POST['first_name'],"middlename" => $_POST['middlename'], "lastname" => $_POST['last_name'], "email" => $_POST['email'], "phoneno" => $_POST['phone'],"address" => $_POST['address'],"address_data" => $_POST['address_data'],"birthdate" => $_POST['birthday'],"referral" => $_POST['referral'],"city" => $_POST['city'],"state" => $_POST['state'],"country" => $_POST['country'],"zipcode" => $_POST['zipcode'], "ondatetime"=> $created_at );        
    }
    //Check Unique Email 
    if ($_REQUEST['id']) {
            $arr = array("firstname" => $_POST['first_name'],"middlename" => $_POST['middlename'], "lastname" => $_POST['last_name'],"phoneno" => $_POST['phone'],"address" => $_POST['address'],"address_data" => $_POST['address_data'],"birthdate" => $_POST['birthday'],"referral" => $_POST['referral'],"city" => $_POST['city'],"state" => $_POST['state'],"country" => $_POST['country'],"zipcode" => $_POST['zipcode'], "ondatetime"=> $created_at );
            $update = updateqry($arr, array("id=" => $_REQUEST['id']), $table);
        } 
        else {
             if(isset($_POST['email']) && $_POST['email'] != "" ){
                    $remail = fetchqry("email", $table, array("email=" => $_REQUEST['email']));
                    if($remail['email'] != ""){
                        $_SESSION['msg'] = 'Email already registered.|alert-error';
                          header("Location:" . $_SERVER['PHP_SELF'] . '?true&id=' . $_REQUEST['id']);
                          exit();
                    }else{                    
                        $insert = insertqry($arr, $table);
                        $insertedid = getfieldmaxvalue('id', $table);
                    }
                }
        }
    
    $updateid = ($_REQUEST['id']) ? $_REQUEST['id'] : $insertedid;

    if ($update || $insert)
        $_SESSION['msg'] = 'Action performed successfully.|alert-success';
    else
        $_SESSION['msg'] = 'Action not performed successfully.|alert-error';

    if ($_POST['addnew'] == 1)
        header("Location:" . $_SERVER['PHP_SELF'] . $gobackurl . '&id=' . $updateid);
    else if ($_POST['addnew'] == 2)
        header("Location:" . $_SERVER['PHP_SELF']);
    else
        header("Location:" . $listpagename . $gobackurl);
    
}
?>
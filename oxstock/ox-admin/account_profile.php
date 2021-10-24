<?php

include('includes/script_top.php');

?>

<?php

if (($permission['add'] && !$user['id']) || ($permission['edit'] && $user['id'])) {

    ?>

    <?php

    $pagename = "Account Profile";

    $listpagename = ACCOUNT_PROFILE;

    $table = TB_USERS;



    $pagetype = "Edit";

    $data = fetchqry("*", $table, array("id=" => $user['id']));

    $cname = $data['cname'];

    $fname = $data['fname'];

    $mname = $data['mname'];

    $lname = $data['lname'];

    $address1 = $data['address1'];

    $postalcode = $data['postalcode'];

    $city = $data['city'];

	

    

    /** Get Province and Country **/

    extract(getLocations($data['locations_id'], TB_LOCATIONS));

    $phone = $data['phone'];

    $fax = $data['fax'];

    $email = $data['email'];

	$country = $data['country'];

    $password = decode($data['password']);



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



        <body class="customer-add-page invoice-list-page ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> <!-- remove ks-page-header-fixed to unfix header -->

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

                                                <div class="card">                                                

                                                    <div class="card-block">

                                                        <h5 class="card-title"><?php echo $pagename; ?></h5>

                                                        <div>

                                                           

                                                            <div class="form-group row">

                                                                <label for="" class="col-sm-2 form-control-label">Name</label>

                                                                <div class="col-sm-3">

                                                                    <div class="input-group">                                                               

                                                                        <input type="text" id="fname" name="fname"  class="form-control" value="<?php echo $fname; ?>" placeholder="First">

                                                                    </div>

                                                                </div>

                                                                <div class="col-sm-3">

                                                                    <div class="input-group">                                                               

                                                                        <input type="text" id="mname" name="mname"  class="form-control" value="<?php echo $mname; ?>" placeholder="Middle">

                                                                    </div>

                                                                </div>

                                                                <div class="col-sm-3">

                                                                    <div class="input-group">                                                               

                                                                        <input type="text" id="lname" name="lname"  class="form-control" value="<?php echo $lname; ?>" placeholder="Last">

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="form-group row">

                                                                <label for="email" class="col-sm-2 form-control-label">Link</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">      

                                                                        <input type="text" id="email" name="email" value="<?php echo $email; ?>"  class="form-control" >

                                                                        <input type="hidden" name="existemail" id="existemail" value="0" />

                                                                        <p id="resultEmail" style="padding-left:15px;"><p>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="form-group row">

                                                                <label for="password" class="col-sm-2 form-control-label">Password</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">      

                                                                        <input type="text" id="password" name="password"  class="form-control" value="<?php echo $password; ?>">

                                                                        <p style="padding-left:5px;"><a href="javascript:" onclick="generatepassword(10, 'password');">Generate Password</a></p>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="form-group row">

                                                                <label for="address1" class="col-sm-2 form-control-label">Address</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">      

                                                                        <input type="text" name="address1" id="address1"  class="form-control" value="<?php echo $address1; ?>" placeholder="Line1" />

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="form-group row">

                                                                <label for="city" class="col-sm-2 form-control-label">City</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">      

                                                                        <input type="text" name="city" id="city"  class="form-control" value="<?php echo $city; ?>" placeholder="City"  />

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="form-group row">

                                                                <label for="postalcode" class="col-sm-2 form-control-label">Postal Code</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">      

                                                                        <input type="text" name="postalcode" id="postalcode"  class="form-control" value="<?php echo $postalcode; ?>" placeholder="Postal Code"  />

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="form-group row">

                                                                <label for="country" class="col-sm-2 form-control-label">Country</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">      

                                                                        <input type="text" name="country" id="country" class="form-control" value="<?php echo $country; ?>" placeholder="Country"  />

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

                                                </div>                                        

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

                chk['t:fname'] = "first Name.";

                chk['s:users_groups_id'] = "User Group.";

                chk['e:email'] = "E-mail.";

                chk['t:existemail:email'] = "Another E-mail.";

                chk['p:password'] = "Password.";

        if (check(chk, 1))

            document.mainform.submit();

    }

</script>

<?php

if (isset($_POST['addnew'])) {

    

     /** Check Unique Fields * */

        $checkduplicate = getrows('*', $table, array("email=" => $_POST['email'], "id!=" => $user['id']));

        if ($checkduplicate > 0) {

            $_SESSION['msg'] = 'Email already exist please use another Email.';

            header("Location:" . $_SERVER['REQUEST_URI']);

            exit();

        }



       $arr = array("fname" => $_POST['fname'], "mname" => $_POST['mname'], "lname" => $_POST['lname'], "email" => $_POST['email'], "password" => encode($_POST['password']), "address1" => $_POST['address1'], "city" => $_POST['city'],"country" => $_POST['country'], "postalcode" => $_POST['postalcode'], "phone" => $_POST['phone'], "fax" => $_POST['fax']);



    if ($user['id']) {

        

        $update = updateqry($arr, array("id=" => $user['id']), $table);

        if ($update) {

            updateqry(array("rootwaysusername" => encode($_POST['email'])), array("rootwaysusername=" => $_SESSION['rootwaysusername']), TB_USERS_LOGINS);

            $_SESSION['rootwaysusername'] = encode($_POST['email']);

        }

        

        //$update = updateqry($arr, array("id=" => $user['id']), $table);



    } else {

        $insert = insertqry($arr, $table);

        $insertedid = getfieldmaxvalue('id', $table);

    }



    $updateid = ($user['id']) ? $user['id'] : $insertedid;



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
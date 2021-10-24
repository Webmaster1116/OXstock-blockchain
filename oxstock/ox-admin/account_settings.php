<?php include('includes/script_top.php'); ?>

    <?php

if (($permission['add'] && !$user['id']) || ($permission['edit'] && $user['id'])) {

    ?>

        <?php

    $pagename = "Setting";

    $listpagename = ACCOUNT_SETTIINGS;

    $table = TB_SETTING;

	$ondatetime = date('Y-m-d H:i:s');

    $pagetype = "Edit";

    $data = fetchqry("*", $table, array("id=" => '1'));

	$image = $data['image'];
	
	$banner_image = $data['banner_image'];
	
    $name = $data['name'];

    $email = $data['email'];

    $phone1 = $data['phone1'];
	
	$phone2 = $data['phone2'];

    $fax = $data['fax'];
	
	$address = $data['address'];
	
	$pro_title = $data['pro_title'];
	
	$pro_content = $data['pro_content'];
	
	$w_hours = $data['w_hours'];

	$content = $data['content'];	
	
	$map = $data['map'];	

	$facebook = $data['facebook'];

	$linkedin = $data['linkedin'];

	$twitter = $data['twitter'];

	$pinterest = $data['pinterest'];

	$google = $data['google'];
	
	$copyright = $data['copyright'];	
	
	

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

                                                            <div class="card">

                                                                <div class="card-block">

                                                                    <h5 class="card-title"><?php echo $pagename; ?></h5>

                                                                    <div>
                                                                    <?php
																		$setting_data = selectqry('*', TB_SETTING, array("id =" => '1'), 'name');
																		$setting_data_res = mysqli_fetch_array($setting_data);
																	 ?>

                                                                        
                                                                        
                                                                        
                                                                        <div class="form-group row">

                                                                            <label for="imagetrigger" class="col-sm-2 form-control-label">Logo</label>

                                                                            <div class="col-sm-5">

                                                                                <div class="input-group file-group">

                                                                                    <button id="imagetrigger" class="btn btn-primary" type="button">

                                                                                        <span class="la la-cloud-upload ks-icon"></span>

                                                                                        <span class="ks-text">Choose file</span>

                                                                                    </button>

                                                                                    <span id="imagefilename" class="filepath"></span>

                                                                                    <input type="file" name="image" id="image" value="" accept="image/*" style="display:none;" />

                                                                                    <input type="hidden" name="himage" id="himage" value="<?php echo $image; ?>" />

                                                                                </div>

                                                                                <div class="input-group"><small>(Size: W 240px X  H 80px)</small></div>

                                                                            </div>
                                                                            

                                                                                <?php if($setting_data_res['image'] != ""){?>

                                                                                    <div class="col-sm-5">

                                                                                        <img src="<?php echo URL_BASE.DIR_UPLOADS.$setting_data_res['image']; ?>" width="100" />

                                                                                    </div>

                                                                                    <?php }?>

                                                                        </div>
                                                                        
                                                                        
                                                                  <?php /*      <div class="form-group row">

                                                                            <label for="banner_imagetrigger" class="col-sm-2 form-control-label">Other Page Banner</label>

                                                                            <div class="col-sm-5">

                                                                                <div class="input-group file-group">

                                                                                    <button id="banner_imagetrigger" class="btn btn-primary" type="button">

                                                                                        <span class="la la-cloud-upload ks-icon"></span>

                                                                                        <span class="ks-text">Choose file</span>

                                                                                    </button>

                                                                                    <span id="banner_imagefilename" class="filepath"></span>

                                                                                    <input type="file" name="banner_image" id="banner_image" value="" accept="image/*" style="display:none;" />

                                                                                    <input type="hidden" name="banner_himage" id="banner_himage" value="<?php echo $banner_image; ?>" />

                                                                                </div>

                                                                                <div class="input-group"><small>(Size: W 820px X  H 156px)</small></div>

                                                                            </div>
                                                                            

                                                                                <?php if($setting_data_res['banner_image'] != ""){?>

                                                                                    <div class="col-sm-5">

                                                                                        <img src="<?php echo URL_BASE.DIR_UPLOADS.$setting_data_res['banner_image']; ?>" width="100" />

                                                                                    </div>

                                                                                    <?php }?>

                                                                        </div>
                                                                        */ ?>
                                                                        

                                                                        <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Name</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>" placeholder="Name" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="email" class="col-sm-2 form-control-label">Email</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" id="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="Email">

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="country" class="col-sm-2 form-control-label">Phone1</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="phone1" id="phone1" class="form-control" value="<?php echo $phone1; ?>" placeholder="Phone1" />

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        
                                                                        <div class="form-group row">

                                                                            <label for="country" class="col-sm-2 form-control-label">Phone2</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="phone2" id="phone2" class="form-control" value="<?php echo $phone2; ?>" placeholder="Phone2" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="country" class="col-sm-2 form-control-label">Fax</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="fax" id="fax" class="form-control" value="<?php echo $fax; ?>" placeholder="Fax" />

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        
                                                                        <div class="form-group row">

                                                                            <label for="country" class="col-sm-2 form-control-label">Address</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="address" id="address" class="form-control" value="<?php echo $address; ?>" placeholder="Address" />

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        
                                                                        <div class="form-group row">

                                                                            <label for="country" class="col-sm-2 form-control-label">Working Hours</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="w_hours" id="w_hours" class="form-control" value="<?php echo $w_hours; ?>" placeholder="Working Hours" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Footer Content</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="content" id="content" class="form-control" value="<?php echo $content; ?>" placeholder="Content" />

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        
                                                                        <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Sidebar Title</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="pro_title" id="pro_title" class="form-control" value="<?php echo $pro_title; ?>" placeholder="Sidebar Title" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="email" class="col-sm-2 form-control-label">Sidebar Content</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <textarea name="pro_content" id="pro_content" cols="200"><?php echo $pro_content; ?></textarea>

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        
                                                                        <div class="form-group row">

                                                                            <label for="map" class="col-sm-2 form-control-label">Contact Map</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <textarea name="map" id="map" cols="200"><?php echo $map; ?></textarea>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="address1" class="col-sm-2 form-control-label">Facebook</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="facebook" id="facebook" class="form-control" value="<?php echo $facebook; ?>" placeholder="Facebook" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Youtube</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="linkedin" id="linkedin" class="form-control" value="<?php echo $linkedin; ?>" placeholder="Linkedin" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Instagram</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="twitter" id="twitter" class="form-control" value="<?php echo $twitter; ?>" placeholder="Twitter" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                       <?php /* <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Pinterest</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="pinterest" id="pinterest" class="form-control" value="<?php echo $pinterest; ?>" placeholder="Pinterest" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Google +</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="google" id="google" class="form-control" value="<?php echo $google; ?>" placeholder="Google" />

                                                                                </div>

                                                                            </div>

                                                                        </div> */ ?>
                                                                        
                                                                        <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Copy Right</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="copyright" id="copyright" class="form-control" value="<?php echo $copyright; ?>" placeholder="Copy Right" />

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

                        chk['t:name'] = "Name.";

                        chk['e:email'] = "E-mail.";

                        chk['t:phone'] = "Phone.";

                        chk['t:fax'] = "Fax.";

                        if (check(chk, 1))

                            document.mainform.submit();

                    }

                    $('#imagetrigger').click(function(e) {

                        $('#image').trigger('click');

                    });

                    $('#image').on('change', function() {

                        $('#imagefilename').html($(this).val());

                    });

                    $('#imagetrigger').click(function(e) {

                        $('#image').trigger('click');

                    });

                    $('#image').on('change', function() {

                        $('#imagefilename').html($(this).val());

                    });
					
					
					
					
					$('#banner_imagetrigger').click(function(e) {

                        $('#banner_image').trigger('click');

                    });

                    $('#banner_image').on('change', function() {

                        $('#banner_imagefilename').html($(this).val());

                    });

                    $('#banner_imagetrigger').click(function(e) {

                        $('#banner_image').trigger('click');

                    });

                    $('#banner_image').on('change', function() {

                        $('#banner_imagefilename').html($(this).val());

                    });
					
					
					
                </script>

                <?php

if (isset($_POST['addnew'])) {

	  $image = uploadfile("image", $image, array("jpeg", "jpg", "gif", "png"));
	  
	  $banner_image = uploadfile("banner_image", $banner_image, array("jpeg", "jpg", "gif", "png"));
	  
      $arr = array("image" => $image,"banner_image" => $banner_image,"name" => $_POST['name'], "email" => $_POST['email'], "phone1" => $_POST['phone1'], "phone2" => $_POST['phone2'], "fax" => $_POST['fax'], "address" => $_POST['address'],"pro_title" => $_POST['pro_title'],"pro_content" => $_POST['pro_content'], "w_hours" => $_POST['w_hours'], "content" => $_POST['content'], "map" => $_POST['map'],"facebook" => $_POST['facebook'], "linkedin" => $_POST['linkedin'],"twitter" => $_POST['twitter'],"pinterest" => $_POST['pinterest'],"google" => $_POST['google'],"copyright" => $_POST['copyright'], "ondatetime" => $ondatetime);

     $update = updateqry($arr, array("id=" => '1'), $table);

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
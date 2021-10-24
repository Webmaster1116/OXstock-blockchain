<?php include('includes/script_top.php'); ?>

    <?php

if (($permission['add'] && !$user['id']) || ($permission['edit'] && $user['id'])) {

    ?>

        <?php

    $pagename = "Home Content";

    $listpagename = HOME_CONTENT;

    $table = TB_HOME_CONTENT;

	$ondatetime = date('Y-m-d H:i:s');

    $pagetype = "Edit";

    $data = fetchqry("*", $table, array("id=" => '1'));

	$title1 = $data['title1'];
	
	$content1 = $data['content1'];
	
    $title2 = $data['title2'];

    $content2 = $data['content2'];

    $title3 = $data['title3'];
	
	$content3 = $data['content3'];

    $title4 = $data['title4'];
	
	$content4 = $data['content4'];
   
	
	

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
																		$home_data = selectqry('*', TB_HOME_CONTENT, array("id =" => '1'));
																		$home_data_res = mysqli_fetch_array($home_data);
																	 ?>

                                                                        <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Title</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="title1" id="title1" class="form-control" value="<?php echo $home_data_res['title1']; ?>" placeholder="Title" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="email" class="col-sm-2 form-control-label">Content</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <textarea name="content1" id="content1" cols="200"><?php echo $home_data_res['content1']; ?></textarea>

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        
                                                                        
                                                                         <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Title</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="title2" id="title2" class="form-control" value="<?php echo $home_data_res['title2']; ?>" placeholder="Title" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="email" class="col-sm-2 form-control-label">Content</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <textarea name="content2" id="content2" cols="200"><?php echo $home_data_res['content2']; ?></textarea>

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        
                                                                        <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Title</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="title3" id="title3" class="form-control" value="<?php echo $home_data_res['title3']; ?>" placeholder="Title" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="email" class="col-sm-2 form-control-label">Content</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <textarea name="content3" id="content3" cols="200"><?php echo $home_data_res['content3']; ?></textarea>

                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        
                                                                        <div class="form-group row">

                                                                            <label for="city" class="col-sm-2 form-control-label">Title</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <input type="text" name="title4" id="title4" class="form-control" value="<?php echo $home_data_res['title4']; ?>" placeholder="Title" />

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="form-group row">

                                                                            <label for="email" class="col-sm-2 form-control-label">Content</label>

                                                                            <div class="col-sm-10">

                                                                                <div class="input-group">

                                                                                    <textarea name="content4" id="content4" cols="200"><?php echo $home_data_res['content4']; ?></textarea>

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

                        chk['t:title1'] = "Title.";

                        chk['t:content1'] = "Content.";
						
						chk['t:title2'] = "Title.";

                        chk['t:content2'] = "Content.";

                        chk['t:title3'] = "Title.";

                        chk['t:content3'] = "Content.";

                        chk['t:title4'] = "Title.";

                        chk['t:content4'] = "Content.";


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

	  
      $arr = array("title1" => $_POST['title1'], "content1" => $_POST['content1'], "title2" => $_POST['title2'], "content2" => $_POST['content2'], "title3" => $_POST['title3'], "content3" => $_POST['content3'],"title4" => $_POST['title4'], "content4" => $_POST['content4'], "ondatetime" => $ondatetime);

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
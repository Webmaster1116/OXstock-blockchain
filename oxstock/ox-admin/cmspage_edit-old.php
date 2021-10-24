<?php

include('includes/script_top.php');

?>

<?php

if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {

    ?>

    <?php

    $pagename = "Cmspages";

    $listpagename = CMSPAGE_LIST;

    $table = TB_CMSPAGES;

    $ondatetime = date('Y-m-d H:i:s');



    if ($_REQUEST['id']) {

        $pagetype = "Edit";

        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));

        

		$title=$data['title'];

		$titlebar=$data['titlebar'];

		$metad=$data['metad'];

		$metak=$data['metak'];

		$h1=$data['h1'];

		$extheader=$data['extheader'];

		$url=$data['url'];

		$content=$data['content'];

		

    } else {

        $pagetype = "New";

		

        $title=$_REQUEST['title'];

		$titlebar=$_REQUEST['titlebar'];

		$metad=$_REQUEST['metad'];

		$metak=$_REQUEST['metak'];

		$url=$_REQUEST['url'];

		$content=$_REQUEST['content'];		

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

            <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>libs/prism/prism.css"> <!-- original -->

            <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>libs/flatpickr/flatpickr.min.css"> <!-- original -->

            <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/styles/libs/flatpickr/flatpickr.min.css"> <!-- customization -->

            <link rel="stylesheet" href="<?php echo URL_BASEADMIN; ?>dropzone/dropzone.css" type="text/css" />

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

                                            <!-- start:- First Colum -->

                                            <div class="col-lg-8 ks-panels-column-section">   

                                                <!-- start:- First Slide -->

                                                <div class="card">                                                

                                                    <div class="card-block">

                                                        <div>

                                                            <h5 class="card-title"><?php echo $pagename; ?></h5>

                                                            

                                                            

                                                            <div class="form-group row">

                                                                <label for="subject" class="col-sm-2 form-control-label">Title</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">

                                                                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>" /> 

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="form-group row">

                                                                <label for="subject" class="col-sm-2 form-control-label">Title Bar</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">

                                                                        <input type="text" name="titlebar" id="titlebar" class="form-control" value="<?php echo $titlebar; ?>" /> 

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="form-group row">

                                                                <label for="subject" class="col-sm-2 form-control-label">Meta Keywords</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">

                                                                        <input type="text" name="metak" id="metak" class="form-control" value="<?php echo $metak; ?>" /> 

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            

                                                            <div class="form-group row">

                                                                <label for="subject" class="col-sm-2 form-control-label">Meta Description</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">

                                                                        <input type="text" name="metad" id="metad" class="form-control" value="<?php echo $metad; ?>" /> 

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            

                                                            <?php if(!$_REQUEST['id']){ ?>

                                                            <div class="form-group row">

                                                                <label for="subject" class="col-sm-2 form-control-label">Url</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">

                                                                        <input type="text" name="url" id="url" value="<?php echo $url; ?>" class="form-control" />

                                                                        <input type="hidden" name="existurl" id="existurl" value="1" />

                                                                        <div id="resultUrl" style="padding-left:15px;"></div>   

                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <?php }else {

															?>

																<div class="form-group row">

                                                                <label for="subject" class="col-sm-2 form-control-label">Url</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">

                                                                        <input type="text" name="url" id="url" value="<?php echo $url; ?>" class="form-control" />																	

																		 <input type="hidden" name="existurl" id="existurl" value="1" />

                                                                        <div id="resultUrl" style="padding-left:15px;"></div>  
                                                                    </div>

                                                                </div>

                                                            </div>

																

															<?php	

															} ?>

                                                            

                                                            <div class="form-group row">

                                                                <label for="message" class="col-sm-2 form-control-label">Description</label>

                                                                <div class="col-sm-10">

                                                                    <div class="input-group">   

                                                                        <textarea name="content" id="content" class="form-control"><?php echo $content; ?></textarea>

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

    <script type="text/javascript" src="<?php echo URL_BASEADMIN; ?>dropzone/dropzone.js"></script>

        </body>

    </html>



    <?php

    /*     * Check Page Authantication * */

} else {

    include(DIR_BASEADMIN . DIR_INCLUDES . INC_DONTACCESSMSG);

}

?>

<script src="<?php echo URL_BASEADMIN; ?>libs/flatpickr/flatpickr.min.js"></script>

<script src="<?php echo URL_BASEADMIN; ?>libs/prism/prism.js"></script>   





<script type="text/javascript">

$("#url").blur(function(){

	$('#resultUrl').html('Checking....');

			$.post('<?php echo URL_BASEADMIN.DIR_INCLUDES; ?>cmspage_ajax.php?ptype=edit&type=checkurl&value='+$('#url').val()+'&notid=<?php echo $_REQUEST['id']; ?>', function(retdata) {

		var dataarr = retdata.split('|');

		$('#resultUrl').html(dataarr[0]);

		$('#existurl').val(dataarr[1]);

		

	});

});





function chkrequired()

{				

		var chk=new Array();		

		chk['t:title'] = "Title.";
		
		chk['t:titlebar'] = "Title Bar.";

		chk['t:url'] = "Url.";

		if(check(chk,1))

		document.mainform.submit();



}



CKEDITOR.replace('content', {toolbar: 'Basic', height: 250});

	

</script>



 

<?php

if (isset($_POST['addnew'])) {

	/* * Check Unique Fields * */

	if(isset($_POST['url']) && $_POST['url']) 

	{

		$add_url_value = genrateURL($_POST['url']);

		$checkduplicate = getrows('*',$table,array("url="=>$add_url_value,"id!="=>$_REQUEST['id']));

		if($checkduplicate>0)

		{

			$_SESSION['msg']='Url already exist please use another url.';

			header("Location:".$_SERVER['REQUEST_URI']);

			exit();

		}		

	}

	
	$arr = array("title"=>replacequoteb($_POST['title']),"titlebar"=>$_POST['titlebar'],"metad"=>$_POST['metad'],"metak"=>$_POST['metak'],"content"=>replacequoteb($_POST['content']));


    if ($_REQUEST['id']) {
	
        $update = updateqry($arr, array("id=" => $_REQUEST['id']), $table);
	
		if($update)
		{

			if($_POST['url']) 
				{ 
					/* For Auto Genrated URL */
					$url = genrateURL($_POST['url'],replacequoteb($_POST['title']).'-'.$_REQUEST['id']);
					updateqry(array("url"=>$url), "`id`='".$_REQUEST['id']."'", $table);
				}
		}

    } else {

        $insert = insertqry($arr, $table);

        $insertedid = getfieldmaxvalue('id', $table);

		if($insert)

		{

			/* For Auto Genrated URL */

			$url = genrateURL($_POST['url'],replacequoteb($_POST['title']).'-'.$insertedid);

			updateqry(array("url"=>$url), "`id`='".$insertedid."'", $table);

		}

    }



    $updateid = ($_REQUEST['id']) ? $_REQUEST['id'] : $insertedid;



    if ($update || $insert) {

        $_SESSION['msg'] = 'Action performed successfully.|alert-success';

    } else

        $_SESSION['msg'] = 'Action not performed successfully.|alert-error';



    if ($_POST['addnew'] == 1)

        header("Location:" . $_SERVER['PHP_SELF'] . $gobackurl . '&id=' . $updateid);

    else if ($_POST['addnew'] == 2)

        header("Location:" . $_SERVER['PHP_SELF']);

    else

        header("Location:" . $listpagename . $gobackurl);

}

?>






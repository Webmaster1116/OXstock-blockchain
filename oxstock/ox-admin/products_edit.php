<?php

include('includes/script_top.php');

?>

<?php

if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {

    ?>

    <?php

    $pagename = "Categories";

    $listpagename = PRODUCTS_LIST;

    $table = TB_PRODUCTS;

	$ondatetime = date('Y-m-d H:i:s');

    

    

    if ($_REQUEST['id']) {

        $pagetype = "Edit";

        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));

       $parent_id = $data['parent_id'];

        $title = $data['title'];
		
		$url = $data['url'];

        $status = $data['status'];
		
		 $image = $data['image'];

		

    } else {

        $pagetype = "New";

       $parent_id = $_REQUEST['parent_id'];

        $title = $_REQUEST['title'];
		
		$url = $_REQUEST['url'];

        $status = $_REQUEST['status'];
		
		 $image = $_REQUEST['image'];

    }

    if (strpos($_SERVER['REQUEST_URI'], "?true") != 0) {

        $temp = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?true"));

        $backurlfirstpart = substr($temp, strpos($temp, "?true"), strpos($temp, "&id"));

        $temp = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "&id") + 4);

        if (strpos($temp, "&") != 0)

            $backurllastpart = substr($temp, strpos($temp, "&"));

        $gobackurl = $backurlfirstpart . $backurllastpart;

    }else {

        $gobackurl = "?true";

    }

    ?>



    <!DOCTYPE html>

    <html lang="en">

        <!-- BEGIN HEAD -->

        <head>

             <?php include('includes/head.php'); ?>  

            <link rel="stylesheet" href="<?php echo URL_BASEADMIN; ?>dropzone/dropzone.css" type="text/css" />

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

                                                              <label for="title" class="col-sm-2 form-control-label">Name<span>*</span></label>

                                                              <div class="col-sm-10">

                                                                  <div class="input-group">                                                               

                                                                      <input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>" /> 

                                                                  </div>

                                                              </div>

                                                          </div>
                                                          
                                                          <div class="form-group row">

                                                              <label for="parent_id" class="col-sm-2 form-control-label">Categories</label>

                                                              <div class="col-sm-10">

                                                                  <div class="input-group">                                                               

                                                                      <select name="parent_id" id="parent_id" class="form-control">

                                                                          <option value="">- - - Select Categories - - -</option>

                                                                          <?php

                                                                          $selProduct = selectqry('*', TB_PRODUCTS, array(), 'title');

																		  while ($resPro = mysqli_fetch_array($selProduct)) {

																			  ?>

                                                                              <option value="<?php echo $resPro['id']; ?>" <?php if ($parent_id == $resPro['id']) { ?> selected <?php } ?> ><?php echo $resPro['title']; ?></option>

                                                                              <?php

                                                                          }

                                                                          ?>

                                                                      </select>

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

                                                              <label for="status" class="col-sm-2 form-control-label">Status</label>

                                                              <div class="col-sm-10">

                                                                  <div class="input-group">                                                               

                                                                      <select name="status" id="status" class="form-control">

                                                                          <option value="1" <?php if($status == 1){ echo 'selected=""'; } ?> >Active</option>

                                                                          <option value="0" <?php if($status <  1){ echo 'selected=""'; } ?>  >Inactive</option>

                                                                      </select> 

                                                                  </div>

                                                              </div>

                                                          </div>
                                                          
                                                          <div class="form-group row">

                                                        <label for="imagetrigger" class="col-sm-2 form-control-label">Image</label>

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

                                                        <?php if($image != ""){?>

                                                                <div class="col-sm-5">

                                                                    <img src="<?php echo URL_BASE.DIR_UPLOADS.$image; ?>" width="100" />

                                                                </div>

                                                        <?php }?>

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

          <script type="text/javascript" src="<?php echo URL_BASEADMIN; ?>dropzone/dropzone.js"></script>

        </body>

    </html>

            <?php

            /*             * Check Page Authantication * */

        } else {

            include(DIR_BASEADMIN . DIR_INCLUDES . INC_DONTACCESSMSG);

        }

        ?>

<script type="text/javascript">

$("#url").blur(function(){

	$('#resultUrl').html('Checking....');

			$.post('<?php echo URL_BASEADMIN.DIR_INCLUDES; ?>product_ajax.php?ptype=url&type=checkurl&value='+$('#url').val()+'&notid=<?php echo $_REQUEST['id']; ?>', function(retdata) {

		var dataarr = retdata.split('|');

		$('#resultUrl').html(dataarr[0]);

		$('#existurl').val(dataarr[1]);

		

	});

});


var check_id = '<?php echo $_REQUEST['id']; ?>';

    function chkrequired(){

        var chk = new Array();

//        chk['s:categories_id'] = "Category.";

        chk['t:title'] = "Title.";
		
		chk['t:url'] = "Url.";

        //chk['t:himage#image'] = "Thumbnail.";
		
		if(check_id == ''){
			chk['t:imagetrigger'] = "Image.";	
		}

        if (check(chk, 1))

            document.mainform.submit();

    }
	
	
$('#imagetrigger').click(function (e) {
        $(this).val('addedText');
    });
    //Image
    $('#imagetrigger').click(function (e) {
        $('#image').trigger('click');
    });    
    $('#image').on('change', function () {
        $('#imagefilename').html($(this).val());
    });

  



</script>

<?php

if (isset($_POST['addnew'])) {
	
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

    

//    $arr = array( "categories_id" => $_POST['categories_id'], "title" => $_POST['title'], "status" => $_POST['status'], "ondatetime" => $ondatetime);

	$image = uploadfile("image", $image, array("jpeg", "jpg", "gif", "png"));  

	$arr = array( "parent_id" => $_POST['parent_id'],"title" => replacequoteb($_POST['title']), "status" => $_POST['status'], "image" => $image,"ondatetime" => $ondatetime);
	
/*
    if ($_REQUEST['id']) {

         $update = updateqry($arr, array("id=" => $_REQUEST['id']), $table);

    } else {

         $insert = insertqry($arr, $table);

         $insertedid = getfieldmaxvalue('id', $table);

    }*/

	 if ($_REQUEST['id']) {
	
        $update = updateqry($arr, array("id=" => $_REQUEST['id']), $table);
	
		if($update)
		{
			if($_POST['url']) 
				{ 
				    $check_url = fetchqry('*',$table,array("id="=>$_REQUEST['id']));
				    if($_POST['url'] != $check_url['url']){
						$url = genrateURL($_POST['url'], replacequotes($_POST['title'])). '-c' . $_REQUEST['id'];
	 					updateqry(array("url"=>$url), "`id`='".$_REQUEST['id']."'", $table);
				}
				}
		}

    } else {

        $insert = insertqry($arr, $table);

        $insertedid = mysqli_insert_id($con);
		
		if($insert)

		{

			/* For Auto Genrated URL */
        //    $url = replacequoteb(strtolower($_POST['title'])).'-'.$insertedid;
			$url = genrateURL($_POST['url'], replacequotes($_POST['title'])). '-c' . $insertedid;

			updateqry(array("url"=>$url), "`id`='".$insertedid."'", $table);

		}

    }



    $updateid = ($_REQUEST['id']) ? $_REQUEST['id'] : $insertedid;

 

    if ($update || $insert){

           $_SESSION['msg'] = 'Action performed successfully.|alert-success';

    }    

    else{

          $_SESSION['msg'] = 'Action not performed successfully.|alert-error';

    }    



    if ($_POST['addnew'] == 1)

        header("Location:" . $_SERVER['PHP_SELF'] . $gobackurl . '&id=' . $updateid);

    else if ($_POST['addnew'] == 2)

        header("Location:" . $_SERVER['PHP_SELF']);

    else

        header("Location:" . $listpagename . $gobackurl);

}

?>
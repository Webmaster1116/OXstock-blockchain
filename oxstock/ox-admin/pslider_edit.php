<?php 
include('includes/script_top.php');
?>
<?php	
	if(($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])){
?>
<?php
	$pagename = "Product Slider";
	$listpagename = PSLIDER_LIST;
	$table = TB_PRO_SLIDER;
         
         $categories_id = $_REQUEST['id'];
	if($_REQUEST['id'])
	{
		$pagetype = "Edit";
		$data=fetchqry("*", $table, array("id="=>$_REQUEST['id']));

		$title=$data['title'];		
		$product_id=$data['product_id'];				
		$status = $data['status'];	
		$image = $data['image'];
		
	}
	else
	{
		$pagetype = "New";
		
		$title=$_REQUEST['title'];	
		$product_id=$_REQUEST['product_id'];	
		$image = $_REQUEST['image'];
        $status = $_REQUEST['status'];
	}
	if(strpos($_SERVER['REQUEST_URI'], "?true")!=0)
	{
		$temp = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "?true"));
		$backurlfirstpart = substr($temp, strpos($temp, "?true"),strpos($temp, "&id"));
		$temp = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "&id")+4);
		if(strpos($temp, "&")!=0)
			$backurllastpart = substr($temp,strpos($temp, "&"));
		$gobackurl = $backurlfirstpart.$backurllastpart;
	}
	else
	{
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
                    <h3><?php echo $pagetype.' '.$pagename; ?></h3>
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
                                                        <label for="title" class="col-sm-2 form-control-label">Title</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">                                                               
                                                                <input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>" /> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label for="status" class="col-sm-2 form-control-label">Product</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">                                                               
                                                                <select name="product_id" id="product_id" class="form-control">
                                                                    <option value="">-- Please Select Product--</option>
                                                                    <option value="1" <?php if($product_id == 1){ echo 'selected=""'; } ?> >SKARCMASTER DC INVERTER WELDER</option>
                                                                    <option value="2" <?php if($product_id == 2){ echo 'selected=""'; } ?>  >SKARCMASTER BOSS WATERPROOF WELDER</option>
                                                                    <option value="3" <?php if($product_id == 3){ echo 'selected=""'; } ?>  >INSTRA POWER TOOLS</option>
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
                                                        <label for="message" class="col-sm-2 form-control-label">Description</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group">   
                                                                <textarea name="description" id="description" class="form-control" value="<?php echo $description; ?>" ><?php echo $description; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
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
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-success right" type="button" onclick="return savennew(0);">Save</button>
                                                        </div>
                                                        <div class="col-sm-6 text-right">
                                                            <a class="btn btn-danger right" href="<?php echo URL_BASEADMIN.$listpagename.$gobackurl;?>">Back</a>
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
	/* * Check Page Authantication * */
	}
	else
	{
		include(DIR_BASEADMIN.DIR_INCLUDES.INC_DONTACCESSMSG);
	}
?>
<script type="text/javascript">
var check_id = '<?php echo $_REQUEST['id']; ?>';

function chkrequired(){
	var chk=new Array();
	chk['t:title'] = "Title.";	
	chk['s:product_id'] = "Product.";	
	
	if(check_id == ''){
		chk['t:imagetrigger'] = "Image.";	
	}
	
    if(check(chk,1))
		document.mainform.submit();
}

CKEDITOR.replace('description', {toolbar: 'Basic', height: 250});

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
if(isset($_POST['addnew']))
{
        $image = uploadfile("image", $image, array("jpeg", "jpg", "gif", "png"));   
    	$arr = array( "title"=>$_POST['title'], "product_id"=>$_POST['product_id'],"image" => $image,"status"=>$_POST['status']);

	
	if($_REQUEST['id']){
		$update=updateqry($arr, array("id="=>$_REQUEST['id']), $table);
	}
	else{		
		$insert=insertqry($arr, $table);	
		$insertedid = getfieldmaxvalue('id',$table);
	}		
	
	$updateid = ($_REQUEST['id']) ? $_REQUEST['id'] : $insertedid;	
	
	if($update || $insert)
		$_SESSION['msg']='Action performed successfully.|alert-success';
	else
		$_SESSION['msg']='Action not performed successfully.|alert-error';		
	
	if($_POST['addnew']==1)
		header("Location:".$_SERVER['PHP_SELF'].$gobackurl.'&id='.$updateid);
	else if($_POST['addnew']==2)
		header("Location:".$_SERVER['PHP_SELF']);
	else
		header("Location:".$listpagename.$gobackurl);
		
}
?>
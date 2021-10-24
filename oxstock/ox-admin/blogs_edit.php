<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Blog";
    $listpagename = BLOGS_LIST;
    $table = TB_BLOGS;

    if ($_REQUEST['id']) {
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
        $title = $data['title'];
		$author_id = $data['author_id'];
		$category_id = $data['category_id'];
		
		$facebook = $data['facebook'];
		$twitter = $data['twitter'];
		$linkedin = $data['linkedin'];
		
		
//		$b_date = $data['b_date'];
        $description = $data['description'];
        $image = $data['image'];        
    } else {
        $pagetype = "New";
        $title = $_REQUEST['title'];
		$author_id = $_REQUEST['author_id'];
		$category_id = $_REQUEST['category_id'];
		
		$facebook = $_REQUEST['facebook'];
		$twitter = $_REQUEST['twitter'];
		$linkedin = $_REQUEST['linkedin'];    
		
//		$b_date = $_REQUEST['b_date'];		
        $description = $_REQUEST['description'];
        $image = $_REQUEST['image'];        
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
                                                                <label for="title" class="col-sm-2 form-control-label">Name</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>" /> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                            
                                                            <div class="form-group row">
                                                                <label for="title" class="col-sm-2 form-control-label">Author</label>
                                                                <div class="col-sm-10">
                                                                    
                                                                    <select name="author_id" id="author_id" class="form-control">

                                                                          <option value="">- - - Select Author - - -</option>

                                                                          <?php

                                                                          $selAuthor = selectqry('*', TB_AUTHOR, array(), 'title');

																		  while ($resPro = mysqli_fetch_array($selAuthor)) {

																			  ?>

                                                                              <option value="<?php echo $resPro['id']; ?>" <?php if ($author_id == $resPro['id']) { ?> selected <?php } ?> ><?php echo $resPro['title']; ?></option>

                                                                              <?php

                                                                          }

                                                                          ?>

                                                                      </select>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="form-group row">
                                                                <label for="title" class="col-sm-2 form-control-label">Category</label>
                                                                <div class="col-sm-10">
                                                                    
                                                                    <select name="category_id" id="category_id" class="form-control">

                                                                          <option value="">- - - Select Categories - - -</option>

                                                                          <?php

                                                                          $selProduct = selectqry('*', TB_CATEGORIES, array(), 'title');

																		  while ($resPro = mysqli_fetch_array($selProduct)) {

																			  ?>

                                                                              <option value="<?php echo $resPro['id']; ?>" <?php if ($category_id == $resPro['id']) { ?> selected <?php } ?> ><?php echo $resPro['title']; ?></option>

                                                                              <?php

                                                                          }

                                                                          ?>

                                                                      </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="title" class="col-sm-2 form-control-label">Facebook</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <input type="text" name="facebook" id="facebook" class="form-control" value="<?php echo $facebook; ?>" /> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="title" class="col-sm-2 form-control-label">Twitter</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <input type="text" name="twitter" id="twitter" class="form-control" value="<?php echo $twitter; ?>" /> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="title" class="col-sm-2 form-control-label">Linkedin</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <input type="text" name="linkedin" id="linkedin" class="form-control" value="<?php echo $linkedin; ?>" /> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                          <?php /*?>  
                                              				<div class="form-group row">
                                                                <label for="title" class="col-sm-2 form-control-label">Blog Date</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <input type="text" name="b_date" id="b_date" class="form-control" value="<?php echo $b_date; ?>" /> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <?php */?>
                                                            <div class="form-group row">
                                                                <label for="description" class="col-sm-2 form-control-label">Description</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <textarea id="description" name="description"><?php echo $description; ?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="imagetrigger" class="col-sm-2 form-control-label">Blog Image</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group file-group">
                                                                        <button id="imagetrigger" class="btn btn-primary" type="button">
                                                                            <span class="la la-cloud-upload ks-icon"></span>
                                                                            <span class="ks-text">Choose file</span>                                                                    
                                                                        </button>         
                                                                        <span id="imagefilename" class="filepath"></span>                        
                                                                        <input type="file" name="image" id="image" value="" accept="image/*" style="display:none;" />                             
                                                                        <input type="hidden" name="himage" id="himage" value="<?php echo $image; ?>" />
                                                                    </div>
                                                                    <div class="input-group"><small>(Size Min: W 700px X  H 500px)</small></div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                            if ($image) {
                                                                ?>
                                                                <div class="form-group row">                                                            
                                                                    <label class="col-sm-2 form-control-label">&nbsp;</label>
                                                                    <div class="col-sm-10">                                                            	
                                                                        <div class="input-group">
                                                                            <a href="<?php echo URL_BASE . DIR_UPLOADS . $image; ?>" rel="viewimage"><img src="<?php echo URL_BASE . DIR_UPLOADS . $image; ?>" width="100"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
    
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

var check_id = '<?php echo $_REQUEST['id']; ?>';

    function chkrequired()
    {
        var chk = new Array();
        chk['t:title'] = "Name.";
		
        // chk['t:author'] = "Author.";
        chk['t:category'] = "Category.";
        
		
    //    chk['t:b_date'] = "Blog date.";				
		
		if(check_id == ''){
			chk['t:imagetrigger'] = "Image.";	
		}
        
        if (check(chk, 1))
            document.mainform.submit();
    }
   CKEDITOR.replace('description', {toolbar: 'Basic', height: 300});
    
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
    
    $image = uploadfile("image", $image, array("jpeg", "jpg", "gif", "png"));
    // "b_date" => $_POST['b_date']
    
    $arr = array( "title" => $_POST['title'],"author_id" => $_POST['author_id'],"category_id" => $_POST['category_id'],"facebook" => $_POST['facebook'],"twitter" => $_POST['twitter'],"linkedin" => $_POST['linkedin'],"description" => replacequoteb($_POST['description']), "image" => $image, "created_at" => date('Y-m-d H:i:s') );
   
    if ($_REQUEST['id']) {
        $update = updateqry($arr, array("id=" => $_REQUEST['id']), $table);
        /* For Auto Genrated URL */
        $url = genrateURL($_POST['url'], replacequotes($_POST['title']) . '-b' . $_REQUEST['id']);
        updateqry(array("url" => $url), "`id`='" . $_REQUEST['id'] . "'", $table);
    } 
    else {        
        $insert = insertqry($arr, $table);
        $insertedid = getfieldmaxvalue('id', $table);
        /* For Auto Genrated URL */
        $url = genrateURL($_POST['url'], replacequotes($_POST['title']) . '-b' . $insertedid);
        updateqry(array("url" => $url), "`id`='" . $insertedid . "'", $table);
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

<!--
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( "#b_date" ).datepicker({
	  dateFormat: "dd/mm/yy"
	});
</script>
-->
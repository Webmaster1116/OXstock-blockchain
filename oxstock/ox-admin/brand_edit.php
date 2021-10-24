<?php
    include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Brand";
    $listpagename = BRAND_LIST;
    $table = TB_BRAND;
    $created_at = date('Y-m-d h:i:s');
    
    if ($_REQUEST['id']) {        
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id="=>$_REQUEST['id']));
        $image = $data['image'];        
        
    } else {
        $pagetype = "New";
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
            
            <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>libs/prism/prism.css"> <!-- original -->
            <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>libs/flatpickr/flatpickr.min.css"> <!-- original -->
            <link rel="stylesheet" type="text/css" href="<?php echo URL_BASEADMIN; ?>assets/styles/libs/flatpickr/flatpickr.min.css"> <!-- customization -->
            <!--  jQuery -->
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

            <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
            <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

            <!-- Bootstrap Date-Picker Plugin -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
            
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
                                            <div class="col-lg-10 ks-panels-column-section">
                                                <div class="card">                                                
                                                    <div class="card-block">
                                                        <h5 class="card-title"><?php echo $pagename; ?></h5>
                                                        <div>
                                                            
                                                            <div class="form-group row">
                                                                <label for="imagetrigger" class="col-sm-2 form-control-label">Select Image</label>
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
                                                                    <div class="input-group"><small>(Size: W 300px X  H 300px)</small></div>
                                                                </div>
                                                                <?php 
                                                                if(!empty($image)){    
                                                                ?>
                                                                    <div class="col-sm-5">
                                                                        <img src="<?php echo URL_BASE.DIR_UPLOADS.$image; ?>" height="100" width="100" />
                                                                    </div>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <button class="btn btn-success right" type="button" onclick="return savennew(0);" id="save_data" style="text-align:center;">Save</button>
                                                                </div>
                                                                <div class="col-sm-4" style="text-align: center;"></div>
                                                                <div class="col-sm-4 text-right">
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
            <script src="<?php echo URL_BASEADMIN; ?>libs/flatpickr/flatpickr.min.js"></script>
            <script src="<?php echo URL_BASEADMIN; ?>libs/prism/prism.js"></script>
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
    
    function chkrequired() {
        var chk = new Array();
       
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
    
        $image = uploadfile("image", $image, array("jpeg", "jpg", "gif", "png"));
        $arr = array( "image" => $image, "created_at"=>$created_at );

        if ($_REQUEST['id']) {                           
            $update = updateqry($arr, array("id=" => $_REQUEST['id']), $table);
        } 
        else {
                $insert = insertqry($arr, $table);
                $insertedid = getfieldmaxvalue('id', $table);                  
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

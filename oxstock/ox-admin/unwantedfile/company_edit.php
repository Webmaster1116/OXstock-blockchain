<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Company";
    $listpagename = COMPANY_LIST;
    $table = TB_COMPANY;
    $created_at = date('Y-m-d H:i:s');
    
    if ($_REQUEST['id']) {
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
        $company_name = $data['company_name'];     
        $status = $data['status'];
        $company_logo = $data['company_logo'];
    } else {
        $pagetype = "New";
        $company_name = $_REQUEST['company_name'];     
        $status = !empty($_REQUEST['status']) ? $_REQUEST['status'] : "active";
         $company_logo = $_REQUEST['company_logo'];
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
                                                            <h5 class="card-title"><?php echo $pagename; ?></h5>
                                                            <div class="form-group row">
                                                                <label for="company_name" class="col-sm-2 form-control-label">Name</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <input type="text" id="company_name" name="company_name" class="form-control" value="<?php echo $company_name; ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label for="company_logotrigger" class="col-sm-2 form-control-label">Logo</label>
                                                                <div class="col-sm-3">
                                                                    <div class="input-group file-group">
                                                                        <button id="company_logotrigger" class="btn btn-primary" type="button">
                                                                            <span class="la la-cloud-upload ks-icon"></span>
                                                                            <span class="ks-text">Choose file</span>                                                                    
                                                                        </button>         
                                                                        <span id="company_logofilename" class="filepath"></span>                        
                                                                        <input type="file" name="company_logo" id="company_logo" value="" accept="image/*" style="display:none;" />                             
                                                                        <input type="hidden" name="hcompany_logo" id="hcompany_logo" value="<?php echo $company_logo; ?>" />
                                                                    </div>
                                                                    <div class="input-group"><small>(Size: W 240px X  H 80px)</small></div>
                                                                </div>
                                                                <?php if ($company_logo != "") { ?>
                                                                    <div class="col-sm-5">
                                                                        <img src="<?php echo URL_BASE . DIR_UPLOADS . $company_logo; ?>" width="100" />
                                                                    </div>
                                                                <?php } ?>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="status" class="col-sm-2 form-control-label">Status</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group">                                                               
                                                                        <div class="ks-items-block">
                                                                            <div class="btn-group" data-toggle="buttons">
                                                                                <label class="btn btn-primary-outline <?php if($status == "active"){ echo "active";}  ?>"><input type="radio" name="status" id="status" autocomplete="off" value="active" <?php if($status == "active"){ echo "checked"; }?> >Active</label>
                                                                                <label class="btn btn-primary-outline <?php if($status == "deactive"){ echo "active";}?>"><input type="radio" name="status" id="status" autocomplete="off" value="deactive" <?php if($status == "deactive"){ echo "checked";}?> >Deactive</label>
                                                                            </div>
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
            chk['t:company_name'] = "Name";
        if (check(chk, 1))
            document.mainform.submit();
    }
    $('#company_logotrigger').click(function (e) {
            $('#company_logo').trigger('click');
    });
    $('#company_logo').on('change', function () {
        $('#company_logofilename').html($(this).val());
    });
</script>
<?php
if (isset($_POST['addnew'])) {
    
    //upload logo
    $company_logo = uploadfile( "company_logo", $company_logo, array("jpeg", "jpg", "gif", "png") );
    $arr = array( "company_name" => $_POST['company_name'], "company_logo" => $company_logo, "status"=> $_POST['status'], "created_at"=> $created_at );

    if ($_REQUEST['id']) {
        $update = updateqry($arr, array("id=" => $_REQUEST['id']), $table);
    } 
    else {
        $insert = insertqry($arr, $table);
        $insertedid = getfieldmaxvalue('id', $table);
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
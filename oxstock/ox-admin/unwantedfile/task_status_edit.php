<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Tasks";
    $listpagename = TASK_STATUS_LIST;
    $table = TB_TASKS_STATUS;
    $created_at = date('Y-m-d H:i:s');

    if ($_REQUEST['id']) {
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
        $company_id = $data['company_id'];
        $status_name = $data['status_name'];
    } else {
        $pagetype = "New";
        $company_id = $_REQUEST['company_id'];
        $status_name = $data['status_name'];
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
                                                                <label for="company_id" class="col-sm-2 form-control-label">Company</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <select name="company_id" id="company_id" class="form-control">
                                                                            <option value="">- - - Select Company - - -</option>
                                                                            <?php
                                                                            $resc = selectqry('*', TB_COMPANY, array(), 'company_name');
                                                                            while ($rowc = mysqli_fetch_array($resc)) {
                                                                                ?>
                                                                                <option value="<?php echo $rowc['id']; ?>" <?php if ($company_id == $rowc['id']) { ?> selected <?php } ?> ><?php echo $rowc['company_name']; ?></option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="status_name" class="col-sm-2 form-control-label">Status Name</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <input type="text" name="status_name" id="status_name" class="form-control" value="<?php echo $status_name; ?>" /> 
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
        //Date and Time Picker  
        $(".calendar").flatpickr();
        function chkrequired() {
            var chk = new Array();
            chk['s:company_id'] = "Company";
            chk['t:status_name'] = "Status Name";
            if (check(chk, 1))
                document.mainform.submit();
        }
</script>
<?php
if (isset($_POST['addnew'])) {
 
    $arr = array( "company_id" => $_POST['company_id'], "status_name" => $_POST['status_name'], "created_at" => $created_at );
    
    if ($_REQUEST['id']) {
        $update = updateqry($arr, array("id=" => $_REQUEST['id']), $table);
    } else {
        $insert = insertqry($arr, $table);
        $insertedid = getfieldmaxvalue('id', $table);
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
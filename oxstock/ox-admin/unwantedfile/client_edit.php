<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Client";
    $listpagename = CLIENT_LIST;
    $table = TB_CLIENT;
    $created_at = date('Y-m-d H:i:s');
    
    if ($_REQUEST['id']) {
        $pagetype = "Edit";
        $row = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
    } else {
        $pagetype = "New";
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
                                                                <label for="clientName" class="col-sm-2 form-control-label">Client Name</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <div class="form-control"><?php echo $row['client_name'];?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="email" class="col-sm-2 form-control-label">Email</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <div class="form-control"><?php echo $row['email'];?></div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 form-control-label">Billing Address</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <div class="form-control"><?php echo $row['billing_address'];?></div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 form-control-label">Contact Name</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <div class="form-control"><?php echo $row['contact_name'];?></div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 form-control-label">Phone</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <div class="form-control"><?php echo $row['phone'];?></div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 form-control-label">Mobile</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <div class="form-control"><?php echo $row['mobile'];?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 form-control-label">Website</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <div class="form-control"><?php echo $row['website'];?></div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 form-control-label">Tax No.</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <div class="form-control"><?php echo $row['tax_no'];?></div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 form-control-label">Note</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <div class="form-control"><?php echo $row['note'];?></div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                            
                                                            <div class="form-group row">
                                                                <label for="" class="col-sm-2 form-control-label">Created At</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <div class="form-control"><?php echo date( 'F j Y', strtotime($row['created_at']) ); ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>    
                                                            
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6"></div>
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
        chk['t:city_name'] = "City Name";
        if (check(chk, 1))
            document.mainform.submit();
    }
</script>
<?php
if (isset($_POST['addnew'])) {

    $arr = array("city_name" => $_POST['city_name'], "state_id" => $_POST['state_id'], "created_at" => $created_at );

    if ($_REQUEST['id']) {
        $update = updateqry($arr, array("id=" => $_REQUEST['id']), $table);
    } else {
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
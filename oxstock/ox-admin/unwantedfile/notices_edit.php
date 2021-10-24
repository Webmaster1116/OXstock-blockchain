<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Notices";
    $listpagename = NOTICES_LIST;
    $table = TB_NOTICES;
    $created_at = date('Y-m-d H:i:s');

    if ($_REQUEST['id']) {
        $pagetype = "Edit";
        $data = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
        $company_id = $data['company_id'];
        $user_id = $data['user_id'];
        $title = $data['title'];
        $start_date = $data['start_date'];
        $description = $data['description'];
    } else {
        $pagetype = "New";
        $company_id = $_REQUEST['company_id'];
        $user_id = $_REQUEST['user_id'];
        $title = $_REQUEST['title'];
        $image = $_REQUEST['image'];
        $start_date = $_REQUEST['start_date'];
        $description = $_REQUEST['description'];
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
                                                                <label for="title" class="col-sm-2 form-control-label">Title</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <input type="text" name="title" id="title" class="form-control" value="<?php echo $title; ?>" /> 
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                                <label for="user_id" class="col-sm-2 form-control-label">User</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">                                                               
                                                                        <select name="user_id" id="user_id" class="form-control">
                                                                            <option value="0">- - - Select User - - -</option>
                                                                            <?php
                                                                            $resu = selectqry('*', TB_USER, array('company_id='=>$company_id), 'username');
                                                                            while ($rowu = mysqli_fetch_array($resu)) {
                                                                                ?>
                                                                                <option value="<?php echo $rowu['id']; ?>" <?php if ($user_id == $rowu['id']) { ?> selected <?php } ?> >
                                                                                    <?php if($rowu['first_name'] != ""){ echo $rowu['first_name']. ' ' .$rowu['last_name']; }else{ echo $rowu['username']; }; ?>
                                                                                </option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="start_date" class="col-sm-2 form-control-label">Start Date</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">
                                                                        <input type="text" name="start_date" id="start_date" class="form-control calendar" data-enable-time="false" data-enable-seconds="false"  value="<?php if (empty($start_date)) { echo date('Y-m-d'); } else { echo $start_date; } ?>" data-date-format="Y-m-d" /> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="description" class="col-sm-2 form-control-label">Description</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group">   
                                                                        <textarea name="description" id="description" class="form-control" value="<?php echo $description; ?>" ><?php echo $description; ?></textarea>
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
            chk['t:title'] = "Job title";
            if (check(chk, 1))
                document.mainform.submit();
        }
        CKEDITOR.replace('description', {toolbar: 'Basic', height: 250});
        $('#imagetrigger').click(function (e) {
            $('#image').trigger('click');
        });
        $('#image').on('change', function () {
            $('#imagefilename').html($(this).val());
        });        
        //Ajax call
        $('#state_id').change(function(){
            $.post('<?php echo URL_BASEADMIN.DIR_INCLUDES; ?>resetsublocation.php?id='+this.value, function(retdata){
                    $('#city_id').html(retdata);
            });
        }); 
        $('#company_id').change(function(){
            $.post('<?php echo URL_BASEADMIN.DIR_INCLUDES; ?>otherAjax.php?id='+this.value, function(retdata){
                    $('#user_id').html(retdata);
            });
        });
</script>
<?php
if (isset($_POST['addnew'])) {
 
    $arr = array( "company_id" => $_POST['company_id'], "user_id" => $_POST['user_id'], "title" => $_POST['title'], "description" => $_POST['description'], "start_date" => $_POST['start_date'], "created_at" => $created_at );
    
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
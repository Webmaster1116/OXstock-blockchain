<?php
include('includes/script_top.php');
?>
<?php
if ($permission['view']) {
    ?>
    <?php
    $pagename = "Tasks Status";
    $listpagename = TASK_STATUS_LIST;
    $editpagename = TASK_STATUS_EDIT;
    $table = TB_TASKS_STATUS;
    $created_at = date('Y-m-d H:i:s');
    
    /** On Delete Action **/
    if ($delete['id']) {
         //Unlink image       
    }

    $Limit = 50;
    $qry = "select t.* from " . $table . " t where 1 ";
    if ($swords) {
        $qry .= "and 1 ";
        $paginationback .= "&s=" . $swords;
    }
    /** For Group By * */
    $qry .= "group by t.id ";
    /** For Ordering * */
    $qry .= " order by t.id";

    $page = $_REQUEST['page'];
    $sel = mysqli_query($con, $qry);
    if ($page == "")
        $page = 1;
    $NumberOfResults = mysqli_num_rows($sel);
    $NumberOfPages = ceil($NumberOfResults / $Limit);
    $sel = mysqli_query($con, $qry . " LIMIT " . ($page - 1) * $Limit . ",$Limit");
    $display = mysqli_num_rows($sel);
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <!-- BEGIN HEAD -->
        <head>
             <?php include('includes/head.php'); ?> 
        </head>
        <body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> <!-- remove ks-page-header-fixed to unfix header -->
             <?php include('includes/header.php'); ?>
            <div class="ks-page-container ks-dashboard-tabbed-sidebar-fixed-tabs"> 
                 <?php include('includes/sidebar.php'); ?>  
                <div class="ks-column ks-page">
                    <div class="ks-page-header">
                        <section class="ks-title-and-subtitle">
                            <div class="ks-title-block">
                                <h3 class="ks-main-title">List of <?php echo $pagename; ?></h3>
                            </div>
                        </section>
                    </div>
                    <div class="ks-page-content">
                        <div class="ks-page-content-body">

                            <div class="ks-dashboard-tabbed-sidebar">
                                <div class="ks-dashboard-tabbed-sidebar-widgets">                 
                                    <div class="row">
                                        <div class="col-lg-12">
                                             <a href="<?php echo TASK_STATUS_EDIT ?>">
                                                   <button class="btn btn-success right" type="button" onclick="return savennew(0);" style="float: right;">Add New Status For Task</button>
                                             </a>   
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                           
                                            <div class="card ks-card-widget ks-widget-table">
                                                <div class="card-block">
                                                    <table class="table ks-payment-table-invoicing">
                                                            <thead>
                                                                <tr>
                                                                   <th width="1">#</th>
                                                                   <th>Company</th>
                                                                   <th>Status Name</th>
                                                                   <th>Created At</th>
                                                                   <th width="5%">Action</th>
                                                               </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            if (mysqli_num_rows($sel) > 0) {
                                                                $n = ($page - 1) * $Limit;
                                                                while ($row = mysqli_fetch_array($sel)) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $i + 1; ?></td>
                                                                            <td>
                                                                                <?php
                                                                                    $company = fetchqry( '*', TB_COMPANY, array('id='=>$row['company_id']) );
                                                                                    echo $company['company_name']; ?>
                                                                            </td>
                                                                            <td><?php echo $row['status_name'];?></td>
                                                                            <td><?php echo date( "F j, Y", strtotime($row['created_at']) ); ?></td>
                                                                            <td class="text-center">
                                                                                <?php if ($permission['edit']) { ?><a href="<?php echo URL_BASEADMIN . $editpagename . $paginationback . '&id=' . $row['id'] . '&page=' . $page; ?>" class="btn btn-primary btn-sm">Edit</a><?php } ?>   
                                                                                <?php if($permission['del']) { ?><a class="btn btn-danger btn-sm" href="javascript:" onclick="return deletesure('<?php echo $row['id'];?>', '<?php echo $table; ?>', '');">Delete</a><?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    $i++;
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                    <?php
                                                    if ($display <= 0)
                                                        include(DIR_BASEADMIN . DIR_INCLUDES . INC_NORECORD);
                                                    ?>
                                                </div>
                                            </div>
                                            <?php include(DIR_BASEADMIN . DIR_FUNCTIONS . INC_PAGINATION); ?>
                                        </div>
                                    </div>
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
}
else {
    include(DIR_BASEADMIN . DIR_INCLUDES . INC_DONTACCESSMSG);
}
?>

<?php
include('includes/script_top.php');
?>
<?php
if ($permission['view']) {
    ?>
    <?php
    $pagename = "Quote";
    $listpagename = QUOTE_LIST;
    $editpagename = QUOTE_EDIT;
    $table = TB_QUOTE;
    /** On Delete Action **/
    if ($delete['id']) {
         //Unlink image       
        $data = fetchqry("*", $table, array("id="=>$delete['id']));
        $image = $data['image'];
        deletefile($image);
    }
    $Limit = 50;
    $qry = "select `quote`.`id`, `quote`.`status`, `quote`.`item`, `quote`.`sub_total`, `quote`.`comments`, `quote`.`image`, `quote`.`quote_date`, `quote`.`share_status`, `quote`.`created_at`, `quote`.`url_pdf`, ";
    $qry .= " `company`.`company_name`, `client`.`client_name`, `user`.`username`, `user`.`first_name`, `user`.`last_name`";
    $qry .= " from " . $table . " ";
    $qry .= " LEFT JOIN `" . TB_USER . "` ON  `quote`.`user_id`=`user`.`id`"; 
    $qry .= " LEFT JOIN `" . TB_COMPANY . "` ON  `quote`.`company_id`=`company`.`id`"; 
    $qry .= " LEFT JOIN `". TB_CLIENT."` ON `quote`.`client_id`=`client`.`id`";
    $qry .= " where 1 ";
    if ($swords) {
        $qry .= "and 1 ";
        $paginationback .= "&s=" . $swords;
    }
    /** For Group By **/
    $qry .= "group by `quote`.`id` ";
    /** For Ordering **/
    $qry .= " order by `quote`.`id` DESC";
   
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
                                            <div class="card ks-card-widget ks-widget-table">
                                                <div class="card-block">
                                                    <table class="table ks-payment-table-invoicing">
                                                        <tbody>
                                                            <tr>
                                                                <th width="1">#</th>
                                                                <th>Company</th>
                                                                <th>Director/User</th>
                                                                <th>Client</th>
                                                                <th>Status</th>
                                                                <th>Quote Date</th>
                                                                <th>PDF</th>
                                                                <th>Created At</th>  
                                                                <th width="5%">Action</th>
                                                            </tr>
                                                            <?php
                                                            if (mysqli_num_rows($sel) > 0) {
                                                                $n = ($page - 1) * $Limit;
                                                                while ($row = mysqli_fetch_array($sel)) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $i + 1; ?></td>
                                                                        <td><?php echo $row['company_name'];?></td>
                                                                        <td><?php echo $row['client_name'];?></td>
                                                                        <td><?php if(empty($row['first_name'])) echo $row['username']; else echo $row['first_name'].' '.$row['last_name']; ?></td>
                                                                        <td class="<?php if($row['status'] == 'paid') echo 'text-success'; else echo 'text-danger'; ?>"> <strong><?php echo $row['status'];?></strong> </td>
                                                                        <td><?php echo date( 'd F, Y', strtotime($row['quote_date']) ); ?></td>
                                                                        <td>
                                                                            <a href="<?php echo URL_BASEADMIN . 'generate_quote_pdf.php?true&id='.$row['id'].'&page=1' ?>" target="_blank">
                                                                                <img src="<?php echo URL_BASE.DIR_UPLOADS.'pdf.png';?>" width="60" height="auto" >
                                                                            </a>
                                                                        </td>
                                                                        <td><?php echo date( 'd F, Y', strtotime($row['created_at']) ); ?></td>
                                                                        <td class="text-center">
                                                                            <?php if ($permission['edit']) { ?><a href="<?php echo URL_BASEADMIN . $editpagename . $paginationback . '&id=' . $row['id'] . '&page=' . $page; ?>" class="btn btn-primary btn-sm">Details</a><?php } ?>   
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
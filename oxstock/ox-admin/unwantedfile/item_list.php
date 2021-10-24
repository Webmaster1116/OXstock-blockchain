<?php
include('includes/script_top.php');
?>
<?php
if ($permission['view']) {
    ?>
    <?php
    $pagename = "Item";
    $listpagename = ITEM_LIST;
    $editpagename = ITEM_EDIT;
    $table = TB_ITEM;
    
    /** On Delete Action **/
    if ($delete['id']) {
         //Unlink image       
        $data = fetchqry("*", $table, array("id="=>$delete['id']));
        $image = $data['image'];
        deletefile($image);
    }

    $Limit = 50;
    $qry = "select `item`.`id`, `item`.`description`, `item`.`rate`, `item`.`cost`, `item`.`qty`, `item`.`total`, `item`.`created_at`, `company`.`company_name`, `user`.`username`, `user`.`first_name`, `user`.`last_name` from `".TB_ITEM."`";
    $qry .= " LEFT JOIN `" . TB_USER . "` ON  `item`.`user_id`=`user`.`id`"; 
    $qry .= " LEFT JOIN `" . TB_COMPANY . "` ON  `item`.`company_id`=`company`.`id`"; 
    $qry .= " where 1 ";
    if ($swords) {
        $qry .= "and 1 ";
        $paginationback .= "&s=" . $swords;
    }
    /** For Group By **/
    $qry .= "group by `item`.`id` ";
    /** For Ordering **/
    $qry .= " order by `item`.`id` DESC";
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
                                                                <td width="1">#</td>
                                                                <td>Company</td>
                                                                <td>Director/User</td>
                                                                <td>Rate</td>
                                                                <td>Cost</td>
                                                                <td>Qty</td>
                                                                <td>Total</td>
                                                                <td>Description</td>
                                                                <td>Created</td>  
                                                            </tr>
                                                            <?php
                                                            if (mysqli_num_rows($sel) > 0) {
                                                                $n = ($page - 1) * $Limit;
                                                                while ($row = mysqli_fetch_array($sel)) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $i + 1; ?></td>
                                                                        <td><?php echo $row['company_name']; ?></td>
                                                                        <td>
                                                                            <?php if(!empty($row['first_name'])) echo $row['first_name'].' '.$row['last_name']; else echo $row['username']; ?>
                                                                        </td>
                                                                        <td><?php echo $row['rate']; ?></td>
                                                                        <td><?php echo $row['cost']; ?></td>
                                                                        <td><?php echo $row['qty']; ?></td>
                                                                        <td><?php echo $row['total']; ?></td>
                                                                        <td><?php echo $row['description']; ?></td>
                                                                        <td><?php echo date( 'd F, Y', strtotime($row['created_at']) ); ?></td>
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
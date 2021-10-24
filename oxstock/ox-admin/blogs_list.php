<?php
include('includes/script_top.php');
?>
<?php
if ($permission['view']) {
    ?>
    <?php
    $pagename = "Blogs";
    $editpagename = BLOGS_EDIT;
    $table = TB_BLOGS;
    /*     * On Delete Action * */
    if ($delete['id']) {
         //Unlink image
            $data = fetchqry("*", $table, array("id="=>$_REQUEST['did']));
            $image = $data['image'];
            if($image){
                        @unlink(DIR_BASE.DIR_UPLOADS.$image);   
            }
            //deletefile($image);
    }
    $Limit = 50;
    $qry = "select b.* from " . $table . " b where 1 ";
    if ($swords) {
        $qry .= "and 1 ";
        $paginationback .= "&s=" . $swords;
    }
    /** For Group By * */
    $qry .= "group by b.id ";

    /*     * For Ordering * */
    $qry .= " order by b.id";

    $page = $_REQUEST['page'];
    $sel = mysqli_query($con, $qry);
    if ($page == "")
        $page = 1;
    $NumberOfResults = mysqli_num_rows($sel);
    $NumberOfPages = ceil($NumberOfResults / $Limit);
    $qry . " LIMIT " . ($page - 1) * $Limit . ",$Limit";
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
                                        <div class="col-sm-0"></div>
                                        <div class="col-sm-2">
                                            <a class="btn btn-primary btn-sm" href="<?php echo URL_BASEADMIN.BLOGS_EDIT;?>" >Add Blogs</a>
                                        </div>
                                    </div>              
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card ks-card-widget ks-widget-table">
                                                <div class="card-block">
                                                    <table class="table ks-payment-table-invoicing">
                                                        <tbody>
                                                            <tr>
                                                                <th width="5%">#</th>
                                                                <th>Name</th>
                                                                <th width="15%" class="text-center">Action</th>
                                                            </tr>
                                                            <?php
                                                            if (mysqli_num_rows($sel) > 0) {
                                                                $n = ($page - 1) * $Limit;
                                                                while ($res = mysqli_fetch_array($sel)) {
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $i + 1; ?></td>
                                                                        <td><?php echo $res['title']; ?></td>	                                                                        												
                                                                        <td class="text-center">
                                                                        <?php if ($permission['edit']) { ?><a href="<?php echo URL_BASEADMIN . $editpagename . $paginationback . '&id=' . $res['id'] . '&page=' . $page; ?>" class="btn btn-primary btn-sm">Edit</a><?php } ?>
                                                                        
                                                                        <?php if ($permission['del']) { ?><a class="btn btn-danger btn-sm" href="javascript:" onclick="return deletesure('<?php echo $res['id']; ?>', '<?php echo $table; ?>', '');">Delete</a><?php } ?>																
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
    /** Check Page Authantication **/
}
else {
    include(DIR_BASEADMIN . DIR_INCLUDES . INC_DONTACCESSMSG);
}
?>
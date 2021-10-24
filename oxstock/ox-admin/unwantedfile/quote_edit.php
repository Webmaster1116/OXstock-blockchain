<?php
include('includes/script_top.php');
?>
<?php
if (($permission['add'] && !$_REQUEST['id']) || ($permission['edit'] && $_REQUEST['id'])) {
    ?>
    <?php
    $pagename = "Quote";
    $listpagename = QUOTE_LIST;
    $table = TB_QUOTE;
    $created_at = date('Y-m-d H:i:s');

    if ($_REQUEST['id']) {
        $pagetype = "Edit";
        //$row = fetchqry("*", $table, array("id=" => $_REQUEST['id']));
        $qry = "select `quote`.`id`, `quote`.`status`, `quote`.`item`, `quote`.`sub_total`, `quote`.`comments`, `quote`.`image`, `quote`.`quote_date`, `quote`.`share_status`, `quote`.`created_at`";
        $qry .= ", `company`.`company_name`, `company`.`company_logo`, `client`.`client_name`, `user`.`username`, `user`.`first_name`, `user`.`last_name`, `user`.`logo` ";
        $qry .= ", `client`.`client_name`, `client`.`email`, `client`.`billing_address`, `client`.`phone`, `client`.`mobile` ";
        $qry .= " from " . $table . " ";
        $qry .= " LEFT JOIN `" . TB_USER . "` ON  `quote`.`user_id`=`user`.`id`";
        $qry .= " LEFT JOIN `" . TB_COMPANY . "` ON  `quote`.`company_id`=`company`.`id`";
        $qry .= " LEFT JOIN `" . TB_CLIENT . "` ON `quote`.`client_id`=`client`.`id`";
        $qry .= " where 1 ";
        $qry .= " AND `quote`.`id`=" . $_REQUEST['id'];
        if ($swords) {
            $qry .= "and 1 ";
            $paginationback .= "&s=" . $swords;
        }
        /** For Group By * */
        $qry .= " group by `quote`.`id` ";
        /** For Ordering * */
        $qry .= " order by `quote`.`id` DESC";

        $page = $_REQUEST['page'];
        $sel = mysqli_query($con, $qry);
        $display = mysqli_num_rows($sel);
        $row = mysqli_fetch_array($sel);
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

        <body class="customer-add-page quote-list-page ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> 
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
                                            <div class="col-lg-12 ks-panels-column-section">   
                                                <!-- start:- First Slide -->
                                                <div class="card">                                                
                                                    <div class="card-block">
                                                        <div style="padding: 20px;">
                                                             <?php if ($display == 1) { ?>                                                                       
                                                                <br><br>
                                                                <center>
                                                                        <?php if(!empty($row['company_logo'])){ ?>
                                                                            <img src="<?php echo URL_BASE . DIR_UPLOADS . $row['company_logo']; ?>" width="100" />
                                                                        <?php }else{?>   
                                                                             <img src="<?php echo URL_BASE . DIR_UPLOADS . 'not-available.png'; ?>" width="100" />
                                                                        <?php }?>    
                                                                </center>
                                                                <br><br>
                                                                <div class="row">
                                                                        <div class="col-sm-6" style="text-align: center">
                                                                            <h3><?php echo $row['username'] ?></h3>
                                                                        </div>
                                                                        <div class="col-sm-6" style="text-align: center">
                                                                            <h3>Quote</h3>
                                                                        </div>
                                                                </div>
                                                                <hr style="height:1px;border:none;color:#333;background-color:#333;">
                                                                <div class="row" style="margin-top: 10px;">
                                                                    <div class="col-sm-2 text-right ">For:</div> 
                                                                    <div class="col-sm-4 text-left"><?php echo $row['client_name']; ?></div> 
                                                                    <div class="col-sm-2 text-right">Quote No:</div> 
                                                                    <div class="col-sm-4 text-left"><?php echo $row['id']; ?></div>                                                                             
                                                                </div>
                                                                <div class="row" style="margin-top: 10px;">
                                                                    <div class="col-sm-2 text-right"></div> 
                                                                    <div class="col-sm-4 text-left"></div> 
                                                                    <div class="col-sm-2 text-right">Quote Date:</div> 
                                                                    <div class="col-sm-4 text-left"><?php echo date('F j, Y', strtotime($row['quote_date'])); ?></div>                                                                             
                                                                </div>
                                                                <div class="row" style="margin-top: 10px;"> 
                                                                        <div class="col-sm-6"></div>
                                                                        <div class="col-sm-2 text-right">Status:</div> 
                                                                        <div class="col-sm-4 text-left">
                                                                            <?php 
                                                                                if($row['status'] == "pending"){
                                                                                    echo '<span class="text-danger">'.$row['status'].'</span>'; 
                                                                                }
                                                                                else{
                                                                                    echo '<span class="text-success">'.$row['status'].'</span>'; 
                                                                                }
                                                                             ?>
                                                                        </div>
                                                                </div>
                                                                <div class="row" style="margin-top: 10px;">
                                                                    <div class="col-sm-6"></div>
                                                                     <div class="col-sm-2 text-right">Share Status:</div> 
                                                                     <div class="col-sm-4 text-left"><?php echo $row['share_status']; ?></div>        
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="ks-widget-table">
                                                                            <table class="table ks-payment-table-invoicing">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th>Description</th>
                                                                                        <th>Rate</th>
                                                                                        <th>Quantity</th>
                                                                                        <th>Total</th>
                                                                                    </tr>
                                                                                    <?php
                                                                                    $items = explode(',', $row['item']);
                                                                                    $full_total = 0;
                                                                                    foreach ($items as $item):
                                                                                        $irow = fetchqry('*', TB_ITEM, array('id=' => $item));
                                                                                        $full_total += $irow['total'];
                                                                                        ?>
                                                                                        <tr>
                                                                                            <td><?php echo $irow['description']; ?></td>
                                                                                            <td><?php echo $irow['rate']; ?></td>
                                                                                            <td><?php echo $irow['qty']; ?></td>    
                                                                                            <td><?php echo $irow['total']; ?></td>    
                                                                                        </tr>
                                                                                        <?php
                                                                                    endforeach;
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td>Total</td>
                                                                                        <td><?php echo $full_total; ?></td>
                                                                                    </tr>            
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>        
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-1 text-right">Comments:</div> 
                                                                    <div class="col-sm-10 text-left"><?php echo $row['comments']; ?></div>        
                                                                </div>
                                                            <?php }else {
                                                                ?>
                                                                <div class="text-center">
                                                                    <h3>Record not found</h3>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
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

    $arr = array("city_name" => $_POST['city_name'], "state_id" => $_POST['state_id'], "created_at" => $created_at);

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
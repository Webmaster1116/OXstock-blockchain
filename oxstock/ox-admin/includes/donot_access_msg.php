<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('includes/head.php'); ?> 
</head>
<body class="ks-navbar-fixed ks-sidebar-default ks-sidebar-position-fixed ks-page-header-fixed ks-theme-primary ks-page-loading"> <!-- remove ks-page-header-fixed to unfix header -->
<?php include('includes/header.php'); ?>
<div class="ks-page-container">
	<?php include('includes/sidebar.php'); ?>
    <div class="ks-column ks-page">
        <div class="ks-page-content">
            <div class="ks-page-content-body ks-error-page">
                <div class="ks-error-code">404</div>
                <div class="ks-error-description">Sorry, but this page doesn't exists</div>
                <a href="<?php echo URL_BASEADMIN; ?>" class="btn btn-primary ks-light">Go to the main page</a>
            </div>
        </div>
    </div>
</div>
<?php include('includes/script_bottom.php'); ?>
</body>
</html>
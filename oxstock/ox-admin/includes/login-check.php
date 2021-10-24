<?php 
include('config.php');
if(!isset($_SESSION['adminLoginUser']))
{
    header('location:index.php');
	exit;
}

if(isset($_SESSION['adminLoginUser']))
{
    $sel_user = mysqli_fetch_assoc(mysqli_query($conn,"select * from `customer` where `username` ='".$_SESSION['adminLoginUser']."'"));
}


?>
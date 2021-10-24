<?php
	require_once 'classes/configure.php';
    if(!isset($_SESSION['userId']) || $_SESSION['userId'] <= 0 ||  $_SESSION['userId'] == ''){
    	$_SESSION['message_type'] = 'error';
		$_SESSION['message'] = 'Please Login to continue!!';
    	header('Location: '.URL_BASE."login/");
    	exit();
    }
    session_unset();
    $_SESSION['message_type'] = 'success';
	$_SESSION['message'] = 'You are successfully logged out!!';
    header('Location: '.URL_BASE."login/");
    exit();

?>
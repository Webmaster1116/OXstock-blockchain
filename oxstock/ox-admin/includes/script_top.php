<?php

	include(dirname(__FILE__).'/../classes/configure.php'); 
	$conClass = new Connect;
	$con = $conClass->dbconnect();	

	include(DIR_BASEADMIN.DIR_CLASSES.'definefilename.php');
	include(DIR_BASEADMIN.DIR_CLASSES.'definetablename.php');	
	include(DIR_BASEADMIN.DIR_FUNCTIONS.'mysqlfunction.php');	
	include(DIR_BASEADMIN.DIR_FUNCTIONS.'utilityfunction.php');	
         include(DIR_BASEADMIN.DIR_CLASSES.'login.php');	
	$loginUser = new Login;	
	$loginUser->loginStatus();	
	
	$user = fetchqry('*',TB_USERS,array("email="=>decode($_SESSION['rootwaysusername'])));	
	$usergroup = fetchqry('*',TB_USERS_GROUPS,array("id="=>$user['users_groups_id']));		
	$permission = getPermission($_SERVER["SCRIPT_NAME"],$user['users_groups_id']);		
		
	/** For Permenant Delete From Trash **/
	if($permission['del'] && $_REQUEST['did']!="" && $_REQUEST['tabnm']!="")
	{
		$delete = fetchqry('*',$_REQUEST['tabnm'],array("id="=>$_REQUEST['did']));
		mysqli_query($con,"delete from `".$_REQUEST['tabnm']."` where `id`='".$_REQUEST['did']."'");
		if(mysqli_affected_rows($con)>0)
		{
			$perdelresult = true;
			$_SESSION['msg']='Action performed successfully.|alert-success';
		}		
	}
		
	/* Variable List */
	$paginationback = "?true";
	$oderby = $_REQUEST['oby'];
	$swords = $_REQUEST['s'];
	
	if($_REQUEST['trash']==1):
		$trash = true;
		$paginationback .= "&trash=1";
	else:
		$trash = false;
	endif;
	
	if($_REQUEST['popup']==1):
		$popup = true;
		$paginationback .= "&popup=1";
	else:
		$popup = false;	
	endif;	
?>
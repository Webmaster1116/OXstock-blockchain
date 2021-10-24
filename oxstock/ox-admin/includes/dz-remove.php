<?php
	include('script_top.php'); 		
	
	@unlink(DIR_BASE.DIR_UPLOADS.'tmp/'.$_REQUEST['file']);
?>
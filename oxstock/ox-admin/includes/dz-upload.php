<?php
	include('script_top.php'); 		

	if (!empty($_FILES)) 
	{  
		if(is_array($_FILES['myfile']['tmp_name']))   
		{
			foreach($_FILES['myfile']['tmp_name'] as $key => $val)	 
			{
				$tempFile = $_FILES['myfile']['tmp_name'][$key];
				$targetPath = DIR_BASE.DIR_UPLOADS.'tmp/';
				$targetFile =  $targetPath.$_FILES['myfile']['name'][$key];
				move_uploaded_file($tempFile,$targetFile);
			}
		}
		else
		{			
			$tempFile = $_FILES['myfile']['tmp_name'];
			$targetPath = DIR_BASE.DIR_UPLOADS.'tmp/';
			$targetFile =  $targetPath.$_FILES['myfile']['tmp_name'];
			move_uploaded_file($tempFile,$targetFile);			
		}
	}
?>
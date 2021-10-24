<?php
	include('../includes/script_top.php');

	$fname = ($_REQUEST['name']) ? str_replace(array(' ','-'),'_',$_REQUEST['name']) : basename($_REQUEST['myfile']);
	
	$fpath = $_REQUEST['fullmyfile'] ? $_REQUEST['fullmyfile'] : DIR_BASEADMIN.DIR_UPLOADS.$_REQUEST['myfile'];
	
	$fileext = substr($fpath, strrpos($fpath, '.'));
	$fname = $fname.$fileext;
	
	downloadfile($fpath,$fname);
	
	function downloadfile($fpath,$fname)
	{
		/* * required for IE, otherwise Content-disposition is ignored * */
		if(ini_get('zlib.output_compression'))
		{
			ini_set('zlib.output_compression', 'Off');
		}
	
		/* * addition by Jorg Weske * */
		$fileextension = strtolower(substr(strrchr($fname,"."),1));
	
		if($fname=="") 
		{
			echo "Error : Download file not specified";
			exit;
		} 
		else if(!file_exists($fpath)) 
		{
			echo "Error : File not founded !!";
			exit;
		};
		if($fileextension=="php")
		{
			echo "Error : File not founded !!";
			exit;
		};
		
		switch( $fileextension )
		{
			case "pdf": $ctype="application/pdf"; break;
			case "exe": $ctype="application/octet-stream"; break;
			case "zip": $ctype="application/zip"; break;
			case "doc": $ctype="application/msword"; break;
			case "xls": $ctype="application/vnd.ms-excel"; break;
			case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
			case "gif": $ctype="image/gif"; break;
			case "png": $ctype="image/png"; break;
			case "jpeg":
			case "jpg": $ctype="image/jpg"; break;
			default: $ctype="application/force-download";
		}
		
		header("Pragma: public"); // required
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private",false); // required for certain browsers 
		header("Content-Type: $ctype");
		header("Content-Disposition: attachment; filename=".$fname.";" );
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".filesize($fpath));
	
		readfile("$fpath");
	
		exit();
	}
?> 
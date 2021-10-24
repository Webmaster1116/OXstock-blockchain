<?php
	include('script_top.php'); 		
	
	if($_REQUEST['ptype']=='list')
	{
		if($_REQUEST['type']=='statuschange')
		{
			$status = fetchqry('*',TB_OUR_CLIENTS,array("id="=>$_REQUEST['id']));;
			if($status['status']=='0')
			{ 
				updateqry(array("status"=>1),array("id="=>$_REQUEST['id']),TB_OUR_CLIENTS);
				echo '<span class="text-error" style="cursor:pointer">Active</span>';		
			}
			else
			{ 
				updateqry(array("status"=>0),array("id="=>$_REQUEST['id']),TB_OUR_CLIENTS);
				echo '<span class="text-success" style="cursor:pointer">Inactive</span>';				
			}
		}
	}
?>
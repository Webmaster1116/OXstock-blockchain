<?php

	include('script_top.php'); 		

	

	if($_REQUEST['ptype']=='list')

	{

		if($_REQUEST['type']=='statuschange')

		{

			$status = fetchqry('*',TB_TEAM,array("id="=>$_REQUEST['id']));;

			if($status['status']=='0')

			{ 

				updateqry(array("status"=>1),array("id="=>$_REQUEST['id']),TB_TEAM);

				echo '<span class="text-success" style="cursor:pointer">Active</span>';		

			}

			else

			{ 

				updateqry(array("status"=>0),array("id="=>$_REQUEST['id']),TB_TEAM);

				echo '<span class="text-error" style="cursor:pointer">Inactive</span>';				

			}

		}

	}

?>
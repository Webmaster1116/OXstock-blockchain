<?php

	include('script_top.php'); 		

	

	if($_REQUEST['ptype']=='list')

	{

		if($_REQUEST['type']=='statuschange')

		{

			$status = fetchqry('*',TB_CATEGORIES,array("id="=>$_REQUEST['id']));;

			if($status['status']=='0')

			{ 

				updateqry(array("status"=>1),array("id="=>$_REQUEST['id']),TB_CATEGORIES);

				echo '<span class="text-success" style="cursor:pointer">Active</span>';		

			}

			else

			{ 

				updateqry(array("status"=>0),array("id="=>$_REQUEST['id']),TB_CATEGORIES);

				echo '<span class="text-error" style="cursor:pointer">Inactive</span>';				

			}

		}

	}

	
	
	if($_REQUEST['ptype']=='url'){

		if($_REQUEST['type']=='checkurl')

		{

			$value = $_REQUEST['value']; 

			if($value!="")

			{

				$value = genrateURL($value);

				

				$chkqry = "SELECT * FROM `".TB_CATEGORIES."` WHERE url = '".$value."' ";

				if($_REQUEST['notid'])

					$chkqry .= "and id != '".$_REQUEST['notid']."' ";

						

				$check=mysqli_num_rows(mysqli_query($con,$chkqry));

				if($check == 0)

					echo '|1';

				else

					echo '<span class="alertredmsg" style="color:red;">This url already exist.</span>|';

					return false;

			}

		}

	}

?>
<?php
	include('script_top.php'); 		
	if($_REQUEST['ptype']=='edit')
	{
		if($_REQUEST['type']=='removeimage')
		{
			$name = $_REQUEST['name']; 
			deletefile($name);
			deleteqry(TB_PRODUCTS_IMAGES,array("product_id="=>$_REQUEST['sid'],"image="=>$name));
		}
	}
	
	if($_REQUEST['ptype']=='url'){

		if($_REQUEST['type']=='checkurl')

		{

			$value = $_REQUEST['value']; 

			if($value!="")

			{

				$value = genrateURL($value);

				

				$chkqry = "SELECT * FROM `".TB_PRODUCTS."` WHERE url = '".$value."' ";

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
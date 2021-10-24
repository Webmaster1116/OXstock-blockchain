<?php 
	include('includes/script_top.php');	
			
	if($_SERVER["HTTP_REFERER"]==URL_BASEADMIN.INDEX_PAGE || $_SERVER["HTTP_REFERER"]==URL_BASEADMIN)
		$loginUser = new Login;

	if(isset($_POST['email']))
	{		
			
		if($loginUser)
		{
			$loginresult = $loginUser->checkAuthantication();		
			if($loginresult==1)
			{
				header("Location:".HOME_PAGE);
			}
			else if($loginresult==2)
			{
				$_SESSION['msg']="Your Acount disable please contact to admin.|alert-info";
				header("Location:".INDEX_PAGE);
			}
			else
			{
			//	$_SESSION['msg']="Username or Password is wrong...Try Again.";
				header("Location:".INDEX_PAGE);
			}
		}
		else
		{
		//	$_SESSION['msg']="Username or Password is wrong...Try Again.";
			header("Location:".INDEX_PAGE);
		}
	}
?>
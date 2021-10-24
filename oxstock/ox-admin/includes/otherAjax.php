<?php
	include('script_top.php');
        //Select city base on state id
        if( isset($_REQUEST['id']) && $_REQUEST['id'] != "" ){
                $company_id = empty($_REQUEST['id']) ? "" : $_REQUEST['id'];  
                $res = selectqry('*', TB_USER, array('company_id='=>$company_id), 'first_name');
                if(mysqli_num_rows($res) > 0){
                   echo '<option value="0">- - - Select User - - -</option>';
                    while($row = mysqli_fetch_assoc($res)){
                            $names = "";
                            if($row['first_name'] != ""){
                                $names = $row['first_name']. ' ' .$row['last_name'];
                            }else{
                                $names = $row['username'];
                            }
                            echo '<option value="'.$row['id'].'" >'. $names .'</option>';
                    }
                }
        }
?>
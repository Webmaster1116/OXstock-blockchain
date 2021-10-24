<?php
	include('script_top.php');
        //Select city base on state id
        if( isset($_REQUEST['id']) && $_REQUEST['id'] != "" ){
                $state_id = empty($_REQUEST['id']) ? "" : $_REQUEST['id'];  
                echo $state_id;
                $res = selectqry('*', TB_CITY, array('state_id='=>$state_id), 'city_name');
                if(mysqli_num_rows($res) > 0){
                    while($row = mysqli_fetch_assoc($res)){
                            echo '<option value="0">- - - Select City - - -</option>';
                            echo '<option value="'.$row['id'].'" >'.$row['city_name'].'</option>';
                    }
                }
        }
?>
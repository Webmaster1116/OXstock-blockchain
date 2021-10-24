<?php
/* * DB Action Function Start * */
function insertqry($arr, $tblnm, $return="")
{
	global $con;
	foreach ($arr as $key => $val)
	{
		$field.=",`".$key."`";
		$value.=",'".str_replace("'","\'",stripslashes(stripslashes($val)))."'";
	}
	$qry="insert into `".$tblnm."` (".substr($field,1).") values (".substr($value,1).")";
        
	if($return=='1')
		return $qry;
	else
		return mysqli_query($con,$qry);
}
function updateqry($arr, $condition, $tblnm, $return="")
{
	global $con;
	$i=0;
	$qry="update `".$tblnm."` set ";
	foreach ($arr as $key => $val)
	{
		if($i!=0)
			$qry.=",";
		$qry.=" `".$key."`='".str_replace("'","\'",stripslashes(stripslashes($val)))."'";
		$i++;
	}
	$qry.=" where 1"; 
	if(is_array($condition))
	{
		foreach ($condition as $key => $val)
			$qry.=" and ".$key."'".$val."'"; 
	}
	else
	{
		if($condition):
			$qry.=" and ".$condition; 
		endif;
	}
                    
	if($return=='1')
		return $qry;
	else
		return mysqli_query($con,$qry);
}
function deleteqry($tblnm, $arr="1", $return="")
{
	global $con;
	$qry="delete from `".$tblnm."` where 1";
	if(is_array($arr))
	{
		foreach ($arr as $key => $val)
			$qry.=" and ".$key."'".$val."'"; 
	}
	else
	{
		$qry.=" and ".$arr; 
	}
	if($return=='1')
	{
		return $qry;
	}
	else
	{
		if($arr)
			return mysqli_query($con,$qry);
	}
}
function fetchqry($getitem, $tblnm, $arr="1", $orderby="", $extra="", $return="")
{
	global $con;
	$qry="select ".$getitem." from `".$tblnm."` where 1";
	if(is_array($arr))
	{
		foreach ($arr as $key => $val)
			$qry.=" and ".$key."'".$val."'";
	}
	else
	{
		$qry.=" and ".$arr; 
	}
	if($orderby!="")
		$qry.=" order by ".$orderby;
	
                    $qry.=" ".$extra;
                    
	if($return=='1')
		return $qry;
	else
		return mysqli_fetch_assoc(mysqli_query($con,$qry));
}
function selectqry($getitem, $tblnm, $arr="1", $orderby="", $extra="", $return="")
{
	global $con;
	$qry="select ".$getitem." from `".$tblnm."` where 1";
	if(is_array($arr))
	{
		foreach ($arr as $key => $val)
			$qry.=" and ".$key."'".$val."'";
	}
	else
	{
		$qry.=" and ".$arr; 
	}
	if($orderby!="")
		$qry.=" order by ".$orderby;
 	$qry.=" ".$extra;
	if($return=='1')
		return $qry;
	else
		return mysqli_query($con,$qry);
}
function getrows($getitem, $tblnm, $arr=array(), $orderby="", $extra="")
{
	global $con;
	$qry="select ".$getitem." from `".$tblnm."` where 1";	
	if(is_array($arr))
	{
		foreach ($arr as $key => $val)
			$qry.=" and ".$key."'".$val."'";
	}
	else
	{
		$qry.=" and ".$arr; 
	}
	if($orderby!="")
		$qry.=" order by ".$orderby;
	$qry.=" ".$extra;	
	if(mysqli_num_rows(mysqli_query($con,$qry)))
		return mysqli_num_rows(mysqli_query($con,$qry));
	else
		return mysqli_error();
}
function getfieldvalue($field,$table,$id,$idfield="")
{
	global $con;
	if(!$idfield)
		$temp = fetchqry($field,$table,array('id='=>$id));
	else
		$temp = fetchqry($field,$table,array($idfield=>$id));
	return $temp[$field];
}
function getfieldmaxvalue($field,$table)
{
	$temp = fetchqry('max('.$field.')',$table);
	return $temp['max('.$field.')'];
}
/* * DB Action Function End * */
function getPermission($page,$group,$type='')
{
	global $con;
	$pagearr = explode('/',$page);
	$currentPage = $pagearr[count($pagearr) - 1];
	$currentModule = $currentPage;
	if(strrpos($currentModule,'_'))
		$currentModule1 = substr($currentModule,0,strrpos($currentModule,'_'));
	if(strrpos($currentModule1,'.php'))
		$currentModule1 = substr($currentModule1,0,strrpos($currentModule1,'.php'));
		
	if(strrpos($currentModule,'.php'))
		$currentModule2 = substr($currentModule,0,strrpos($currentModule,'.php'));

	$permission = fetchqry('*',TB_USERS_PERMISSION,("users_groups_id='".$group."' and (filename='".$currentModule1."' or filename='".$currentModule2."')"));			
	
	if($type=='all')
	{
		if($permission['view'] && $permission['add'] && $permission['edit'] && $permission['del'])
			return 1;
	}
	else if($type=='any')
	{
		if($permission['view'] || $permission['add'] || $permission['edit'] || $permission['del'])
			return 1;
	}
	else if($type=='view')
		return $permission['view'];
	else if($type=='add')
		return $permission['add'];
	else if($type=='edit')
		return $permission['edit'];
	else if($type=='del')
		return $permission['del'];	
	else
		return $permission;	
}

/**
 * @generateInvoicePdf = function For generate pdf of invoice
 * @value = value to Invoice id
 * @return = Returns url of generated pdf
 */
// function to get  the address
function generateInvoicePdf($invoiceId){
    
        global $con;
    
        $qry = "select `invoice`.`id`, `invoice`.`status`, `invoice`.`item`, `invoice`.`sub_total`, `invoice`.`comments`, `invoice`.`image`, `invoice`.`invoice_date`, `invoice`.`due_date`, `invoice`.`share_status`, `invoice`.`created_at`, `invoice`.`url_pdf`";
        $qry .= ", `company`.`company_name`, `company`.`company_logo`, `client`.`company_name`, `user`.`username`, `user`.`first_name`, `user`.`last_name`, `user`.`logo` as user_logo ";
        $qry .= ", `client`.`company_name`, `client`.`email`, `client`.`billing_address`, `client`.`suburb`, `client`.`postcode`, `client`.`state`, `client`.`country`, `client`.`phone`, `client`.`mobile` ";
        $qry .= " from " . TB_INVOICE . " ";
        $qry .= " LEFT JOIN `" . TB_USER . "` ON  `invoice`.`user_id`=`user`.`id`";
        $qry .= " LEFT JOIN `" . TB_COMPANY . "` ON  `invoice`.`company_id`=`company`.`id`";
        $qry .= " LEFT JOIN `" . TB_CLIENT . "` ON `invoice`.`client_id`=`client`.`id`";
        $qry .= " where 1 ";
        $qry .= " AND `invoice`.`id`=" . $invoiceId;
       
        $res = mysqli_query($con, $qry);
        $display = mysqli_num_rows(mysqli_query($con, $qry));
        $row = mysqli_fetch_array(mysqli_query($con, $qry));
        
        $logo = "";
//         if( !empty($row['user_logo']) ){
//                $logo = URL_BASE . 'uploads/' .$row['user_logo'];
//         }else if( !empty($row['company_logo']) ){
//                $logo = URL_BASE . 'uploads/' .$row['company_logo'];
//         }else{
//             $logo = URL_BASE.'uploads/'.'tradetrack.jpg';
//         }
        
           $billingAddress =  $row['billing_address'];
           $suburb = "";
           $state = "";
           
           if($row['suburb'] != ""){
                    $suburb .= $row['suburb'];
           }
           if($row['postcode'] != ""){
                    $suburb .= ', '.$row['postcode'];
           }
           if($row['state'] != ""){
                    $suburb .= ', '.$row['state'];
           }
           if($row['country'] != ""){
                    $suburb .= ', '.$row['country'];
           }
         
         $logo = URL_BASE.'uploads/'.'tradetrack.jpg';
         
         //Delete old pdf file
         if( !empty($row['url_pdf']) ):
             $pdfName = substr($row['url_pdf'], strpos($row['url_pdf'], 'invoice'));
             $deleted = unlink( DIR_BASE.'uploads/pdf/'.$pdfName);
         endif;
                
        //*********** Generate pdf ***********//
        include( DIR_BASEADMIN . 'tcpdf/tcpdf.php');
        
        $pdf = new TCPDF();
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->AddPage();
        $html = '';
        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td align="center"><img src="'. $logo .'" width="150px" height="auto" /></td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br/><br/>';

        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td width="50%" align="center" style="font-size:15px"><h3>'. $row['username'] .'</h3></td>';
        $html .= '<td width="50%" align="center" style="font-size:15px"><h3>Invoice</h3></td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br/>';
        $html .= '<hr/>';

        $html .= '<table cellpadding="3px" cellspacing="0" width="100%" align="center">';
        $html .= '<tr><td></td></tr>';
        $html .= '<tr>';
        $html .= '<td width="25%" align="right">Bill To:</td>';
        $html .= '<td width="25%" align="left">'.$row['company_name'].'</td>';
        $html .= '<td width="25%" align="right">Invoice No:</td>';
        $html .= '<td width="15%" align="right">'.$row['id'].'</td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td width="25%" align="right">Billing Address:</td>';
        $html .= '<td width="25%" align="left">'.$billingAddress.'</td>';
        $html .= '<td width="25%" align="right">Invoice Date:</td>';
        $html .= '<td width="15%" align="right">'.date('M j, Y', strtotime($row['invoice_date'])).'</td>';
        $html .= '</tr>';
        
        $html .= '<tr>';
        $html .= '<td width="25%" align="right"></td>';
        $html .= '<td width="25%" align="left">'.$suburb.'</td>';
        $html .= '<td width="25%" align="right">Due Date:</td>';
        $html .= '<td width="15%" align="right">'.date('M j, Y', strtotime($row['due_date'])).'</td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td width="50%" align="right"></td>';
        $html .= '<td width="25%" align="right">Status:</td>';
        $html .= '<td width="15%" align="right">'.$row['status'].'</td>';
        $html .= '</tr>';

        $html .= '<tr><td></td></tr>';

        $html .= '<tr style="background-color:#dce6ef;font-size:15px;color:#007cf6;padding:40px 0px;">';
        $html .= '<td width="25%" align="center">Description</td>';
        $html .= '<td width="25%" align="center">Rate</td>';
        $html .= '<td width="25%" align="center">Quantity</td>';
        $html .= '<td width="25%" align="center">Amount</td>';
        $html .= '</tr>';

         $items = explode(',', $row['item']);
         $full_total = 0;
            foreach ($items as $item):
                    $irow = fetchqry('*', TB_ITEM, array('id=' => $item));
                    $full_total += $irow['total'];
                         $html .= '<tr>';
                            $html .= '<td width="5%" ></td>';
                            $html .= '<td width="20%" align="left">'.$irow['description'].'</td>';
                            $html .= '<td width="20%" align="right">'.$irow['rate'].'</td>';
                            $html .= '<td width="20%" align="right">'.$irow['qty'].'</td>';
                            $html .= '<td width="25%" align="right">'.$irow['total'].'</td>';
                         $html .= '</tr>';
            endforeach;    

         $html .= '<tr><td></td></tr>';   
         $html .= '<hr/>';   

         $html .= '<tr>';
         $html .= '<td width="50%" align="right"></td>';
         $html .= '<td width="25%"  style="font-size:15px">Total:</td>';
         $html .= '<td width="25%" align="center" style="font-size:15px">$'.$full_total.'</td>';
         $html .= '</tr>';   
         $html .= '<hr/>';

         $html .= '<tr><td></td></tr>';   

         $html .= '<tr>';
         $html .= '<td width="15%">Comments:</td>';
         $html .= '<td width="85%" align="left">'.$row['comments'].'</td>';
         $html .= '</tr>';

         $html .= '</table>';
         
        // Download PDF
        $pdf_name =  'invoice-' . $invoiceId . '-' . date('Y-m-d') . '.pdf';
        $path = DIR_BASE.'uploads/pdf/';
        $pdf->writeHTML($html, true, false, true, false, '');
        $filelocation = $path.$pdf_name;
        $pdf->Output($filelocation, 'F');        
        $pdfUrl = URL_BASE.'uploads/pdf/'.$pdf_name;
    
         //add pdf url to database
         updateqry( array("url_pdf"=>$pdfUrl), array("id="=>$invoiceId), TB_INVOICE );
        
    return $pdfUrl;
    
}

/**
 * @generateQuotePdf = function For generate pdf of quote
 * @value = value to Quote id
 * @return = Returns url of generated pdf
 */
// function to get  the address
function generateQuotePdf($quoteId){
    
        global $con;
    
        $qry = "select `quote`.`id`, `quote`.`status`, `quote`.`item`, `quote`.`sub_total`, `quote`.`comments`, `quote`.`image`, `quote`.`quote_date`, `quote`.`share_status`, `quote`.`created_at`, `quote`.`url_pdf`";
        $qry .= ", `company`.`company_name`, `company`.`company_logo`, `client`.`company_name`, `user`.`username`, `user`.`first_name`, `user`.`last_name`, `user`.`logo` as user_logo ";
        $qry .= ", `client`.`company_name`, `client`.`email`, `client`.`billing_address`, `client`.`phone`, `client`.`mobile` ";
        $qry .= " from " . TB_QUOTE . " ";
        $qry .= " LEFT JOIN `" . TB_USER . "` ON  `quote`.`user_id`=`user`.`id`";
        $qry .= " LEFT JOIN `" . TB_COMPANY . "` ON  `quote`.`company_id`=`company`.`id`";
        $qry .= " LEFT JOIN `" . TB_CLIENT . "` ON `quote`.`client_id`=`client`.`id`";
        $qry .= " where 1 ";
        $qry .= " AND `quote`.`id`=" . $quoteId;
       
        $res = mysqli_query($con, $qry);
        $display = mysqli_num_rows(mysqli_query($con, $qry));
        $row = mysqli_fetch_array(mysqli_query($con, $qry));
        
        $logo = "";
         if( !empty($row['user_logo']) ){
                $logo = URL_BASE . 'uploads/' .$row['user_logo'];
         }else if( !empty($row['company_logo']) ){
                $logo = URL_BASE . 'uploads/' .$row['company_logo'];
         }else{
             $logo = URL_BASE.'uploads/'.'tradetrack.jpg';
         }
         
         //Delete old pdf file
         if( !empty($row['url_pdf']) ):
             $pdfName = substr($row['url_pdf'], strpos($row['url_pdf'], 'quote'));
             $deleted = unlink( DIR_BASE.'uploads/pdf/'.$pdfName);
         endif;
                
        //*********** Generate pdf ***********//
        include( DIR_BASEADMIN . 'tcpdf/tcpdf.php');
        
        $pdf = new TCPDF();
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->AddPage();
        $html = '';
        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td align="center"><img src="'. $logo .'" width="150px" height="auto" /></td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br/><br/>';

        $html .= '<table>';
        $html .= '<tr>';
        $html .= '<td width="50%" align="left" style="font-size:15px"><h3>'.$row['username'] .'</h3></td>';
        $html .= '<td width="50%" align="right" style="font-size:15px"><h3>Quote</h3></td>';
        $html .= '</tr>';
        $html .= '</table>';
        $html .= '<br/>';
        $html .= '<hr/>';

        $html .= '<table cellpadding="3px" cellspacing="0" width="100%" align="center">';
        $html .= '<tr><td></td></tr>';
        $html .= '<tr>';
        $html .= '<td width="25%" align="center">For:</td>';
        $html .= '<td width="25%" align="left">'.$row['company_name'].'</td>';
        $html .= '<td width="25%" align="right">Quote No:</td>';
        $html .= '<td width="15%" align="right">'.$row['id'].'</td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td width="25%" align="right"></td>';
        $html .= '<td width="25%" align="left"></td>';
        $html .= '<td width="25%" align="right">Date:</td>';
        $html .= '<td width="15%" align="right">'.date('M j, Y', strtotime($row['quote_date'])).'</td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td width="25%" align="right"></td>';
        $html .= '<td width="25%" align="left"></td>';
        $html .= '<td width="25%" align="right"></td>';
        $html .= '<td width="15%" align="right"></td>';
        $html .= '</tr>';

//        $html .= '<tr>';
//        $html .= '<td width="50%" align="right"></td>';
//        $html .= '<td width="25%" align="right">Status:</td>';
//        $html .= '<td width="15%" align="right">'.$row['status'].'</td>';
//        $html .= '</tr>';

        $html .= '<tr><td></td></tr>';

        $html .= '<tr style="background-color:#dce6ef;font-size:15px;color:#007cf6;padding:40px 0px;">';
        $html .= '<td width="25%" align="center">Description</td>';
        $html .= '<td width="25%" align="center">Quantity</td>';
        $html .= '<td width="25%" align="center">Rate</td>';
        $html .= '<td width="25%" align="center">Amount</td>';
        $html .= '</tr>';

         $items = explode(',', $row['item']);
         $full_total = 0;
            foreach ($items as $item):
                    $irow = fetchqry('*', TB_ITEM, array('id=' => $item));
                    $full_total += $irow['total'];
                         $html .= '<tr>';
                            $html .= '<td width="5%" ></td>';
                            $html .= '<td width="20%" align="left">'.$irow['description'].'</td>';
                            $html .= '<td width="20%" align="center">'.$irow['qty'].'</td>';
                            $html .= '<td width="20%" align="right">'.$irow['rate'].'</td>';
                            $html .= '<td width="25%" align="right">'.$irow['total'].'</td>';
                         $html .= '</tr>';
            endforeach;    

         $html .= '<tr><td></td></tr>';   
         $html .= '<hr/>';   

         $html .= '<tr>';
         $html .= '<td width="50%" align="right"></td>';
         $html .= '<td width="25%"  style="font-size:15px">Total:</td>';
         $html .= '<td width="25%" align="center" style="font-size:15px">$'.$full_total.'</td>';
         $html .= '</tr>';   
         $html .= '<hr/>';

         $html .= '<tr><td></td></tr>';   

//         $html .= '<tr>';
//         $html .= '<td width="15%">Comments:</td>';
//         $html .= '<td width="85%" align="left">'.$row['comments'].'</td>';
//         $html .= '</tr>';

         $html .= '</table>';
        
        // Download PDF
        $pdf_name =  'quote-' . $quoteId . '-' . date('Y-m-d') . '.pdf';
        $path = DIR_BASE.'uploads/pdf/';
        $pdf->writeHTML($html, true, false, true, false, '');
        $filelocation = $path.$pdf_name;
        $pdf->Output($filelocation, 'F');        
        $pdfUrl = URL_BASE.'uploads/pdf/'.$pdf_name;
    
         //add pdf url to database
         updateqry( array("url_pdf"=>$pdfUrl), array("id="=>$quoteId), TB_QUOTE );
        
    return $pdfUrl;
    
}

?>
<?php
    include('includes/script_top.php');
    
    $invoiceId = $_REQUEST['id'];
    
    if(!empty($invoiceId)){
            $pdfUrl = generateInvoicePdf($invoiceId);     
            header("Location:" . $pdfUrl); 
    }else{
            echo "<center><h1>PDF NOT FOUND</h1></center>";
    }

?>
   
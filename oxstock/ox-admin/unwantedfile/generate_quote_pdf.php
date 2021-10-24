<?php
    include('includes/script_top.php');
    
    $quoteId = $_REQUEST['id'];
    
    if(!empty($quoteId)){
            $pdfUrl = generateQuotePdf($quoteId);     
            header("Location:" . $pdfUrl); 
    }else{
            echo "<center><h1>PDF NOT FOUND</h1></center>";
    }

?>
   
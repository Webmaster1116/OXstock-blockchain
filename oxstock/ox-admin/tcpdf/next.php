<?php
session_start();
include 'tcpdf.php';
$pdf = new TCPDF();
$pdf->AddPage('P', 'A4');
$html = '<html>
<head>
</head>
<body>
<table border="1">
 <tr>
  <th>name</th>
  <td>'.$_POST['name'].'</td>
 </tr>
</table>
</body>
</html>';

$email_body = $pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('doc', 'D');

$filename = "doc/NameOfFile.pdf";
$to      = 'hiren@rootways.com';
$subject = 'TC-PDF';
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Donuts Order <hiren@rootways.com>';
$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
// Mail it
if(mail($to, $subject, $email_body,$headers))
{
	$_SESSION['sucess'] = "Mail sent successfully";
}
else
{
	$_SESSION['error'] = "Mail not sent";
}
?>

<?php
require_once '../includes/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
//$text = file_get_contents('http://'.$_SERVER['SERVER_NAME'].'/esusu/includes/pdf.php?id='.$user_id.'&type='.$report_type);
$text = file_get_contents('https://'.$_SERVER['SERVER_NAME'].'/includes/pdf.php?id='.$user_id.'&type='.$report_type);
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($text);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
?>
<?php 
error_reporting(0);
$company = "Universal Network";
$address = "Camp, Abeokuta, Ogun state.";
$telephone = "01-345-7987";

session_start();
require '../includes/config.php';
$ser = mysqli_query($con,"SELECT * FROM $deposit_table where user_id='".$_SESSION['user_id']."'");
$s = mysqli_fetch_assoc(mysqli_query($con,"select * from $user_table where user_id='".$_SESSION['user_id']."'"));
$email = $s['email'];
require('../includes/pdf/fpdf.php');

class PDF extends FPDF
{
function Header()
{
if(!empty($_FILES["file"]))
  {
$uploaddir = "../uploads/";
$nm = $_FILES["file"]["name"];
$random = rand(1,99);
move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir.$random.$nm);
$this->Image($uploaddir.$random.$nm,10,10,20);
unlink($uploaddir.$random.$nm);
}
$this->SetFont('Arial','B',12);
$this->Ln(1);
}
function Footer()
{
$this->SetY(-15);
$this->SetFont('Arial','I',8);
$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
function ChapterTitle($num, $label)
{
$this->SetFont('Arial','',12);
$this->SetFillColor(200,220,255);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
function ChapterTitle2($num, $label)
{
$this->SetFont('Arial','',12);
$this->SetFillColor(249,249,249);
$this->Cell(0,6,"$num $label",0,1,'L',true);
$this->Ln(0);
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetTextColor(32);
$pdf->Cell(0,5,$company,0,1,'R');
$pdf->Cell(0,5,$address,0,1,'R');
$pdf->Cell(0,5,$email,0,1,'R');
$pdf->Cell(0,5,'Tel: '.$telephone,0,1,'R');
$pdf->Cell(0,10,'',0,1,'R');
$pdf->SetFillColor(200,220,255);
$pdf->ChapterTitle('Email: ',$email);
$pdf->ChapterTitle('Date ',date('d M Y g:i a'));
$pdf->Cell(0,10,'',0,1,'R');
$pdf->SetFillColor(224,235,255);
$pdf->SetDrawColor(192,192,192);
$pdf->Cell(50,7,'Date',1,0,'L');
$pdf->Cell(50,7,'Amount',1,1,'C');
$pdf->Cell(50,7,'ToGet',-1,-1,'R');
while($r = mysqli_fetch_assoc($ser))
{
$total +=$r['amount']; 
$pdf->Cell(50,7,date('d M Y g:i a',$r['add_time']),1,0,'L',0);
$pdf->Cell(50,7,number_format($r['amount'],8)." BTC",1,1,'C',0);
$pdf->Cell(50,7,number_format($r['toget'],8)." BTC",-1,-1,'R',0);
}
$pdf->Cell(80,7,'Total',1,0,'L',0);
$pdf->Cell(70,7,number_format($total,8)." BTC",1,0,'C',0);

$filename="invoice.pdf";
$pdf->Output($filename,'F');
header("location: invoice.pdf");
?>
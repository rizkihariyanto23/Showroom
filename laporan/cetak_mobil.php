<?php
include "fpdf.php";
include "../inc/koneksi.php";

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0,5,'CV. Rizki Mobil','0','1','C',false);
$pdf->SetFont('Arial','i',8);
$pdf->Cell(0,5,'Alamat : Jl. Masjid Darusalam Rt 13/11 Ciputat Kota tangerang Selatan','0','1','C',false);
$pdf->Cell(0,2,'Code by http://yukcoding.blogspot.com','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50,5,'Laporan Data Mobil','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell(8,6,'No.',1,0,'C');
$pdf->Cell(35,6,'Kode Mobil',1,0,'C');
$pdf->Cell(37,6,'Merk Mobil',1,0,'C');
$pdf->Cell(35,6,'Type Mobil',1,0,'C');
$pdf->Cell(35,6,'Warna Plihan Mobil',1,0,'C');
$pdf->Cell(40,6,'Harga Mobil',1,0,'C');
$pdf->	Ln(2);
$no = 0;
$sql = mysql_query("select * from tb_mobil order by kode_mobil asc");
while ($data = mysql_fetch_array($sql)) {
	$no++;
	$pdf->Ln(4);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(8,4,$no.".",1,0,'C');
	$pdf->Cell(35,4,$data['kode_mobil'],1,0,'C');
	$pdf->Cell(37,4,$data['merk'],1,0,'C');
	$pdf->Cell(35,4,$data['type'],1,0,'C');
	$pdf->Cell(35,4,$data['warna'],1,0,'C');
	$pdf->Cell(40,4,$data['harga'],1,0,'C');
}



$pdf->Output();

?>
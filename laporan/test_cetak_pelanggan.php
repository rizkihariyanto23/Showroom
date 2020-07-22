<?php

/* Laporan table motor */
include "fpdf.php";
include "../inc/koneksi.php";

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'.= Clasic Motor =.','0','1','C',false);
$pdf->SetFont('Arial','i',8);
$pdf->Cell(0,5,'Alamat : Jl. Hasibuan No 182 , Bekasi . Jawa barat ','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,5,'Laporan Data Pelanggan','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','B',7);
$pdf->Cell(8,6,'No.',1,0,'c');
$pdf->Cell(35,6,'No Identitas',1,0,'C');
$pdf->Cell(37,6,'Nama Lengkap',1,0,'C');
$pdf->Cell(35,6,'Alamat',1,0,'C');
$pdf->Cell(35,6,'Jenis Kelamin',1,0,'C');
$pdf->Cell(40,6,'No Telpon',1,0,'C');
$pdf->Ln(2);
$no = 0;
$sql = mysqli_query($con, "select * from tb_pelanggan order by no_identitas asc");
while($data = mysqli_fetch_array($sql)) {
	$no++;
	$pdf->Ln(4);
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(8,4,$no.".",1,0,'C');
	$pdf->Cell(35,4,$data['no_identitas'],1,0,'C');
	$pdf->Cell(37,4,$data['nama_lengkap'],1,0,'C');
	$pdf->Cell(35,4,$data['alamat'],1,0,'C');
	$pdf->Cell(35,4,$data['jenis_kelamin'],1,0,'C');
	$pdf->Cell(40,4,$data['no_telp'],1,0,'C');
}

$pdf->Output();

?>
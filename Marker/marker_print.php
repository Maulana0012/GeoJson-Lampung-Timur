<?php
require ('../fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->SetLeftMargin(20);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN Geojson', 0, 10, 'C');
$pdf->Cell(10, 7, '', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 6, 'No.', 1, 0);
$pdf->Cell(70, 6, 'Kode Kecamatan', 1, 0);
$pdf->Cell(70, 6, 'Nama Kecamatan', 1, 0);
$pdf->Cell(70, 6, 'File Name', 1, 0);
$pdf->SetFont('Arial', '', 10);
include '../connection.php';
$no = 1;
$result = mysqli_query($conn, "SELECT * FROM kecamatan");
while ($data = mysqli_fetch_array($result)) {
    $pdf->Cell(10, 6, "", 0, 1);
    $pdf->Cell(10, 6, $no++, 1, 0);
    $pdf->Cell(70, 6, $data['kode_kecamatan'], 1, 0);
    $pdf->Cell(70, 6, $data['nama_kecamatan'], 1, 0);
    $pdf->Cell(20, 6, $data['geojson_file_name'], 1, 0);
}
$pdf->Output();
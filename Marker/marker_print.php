<?php
require ('../fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->SetLeftMargin(20);
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN MARKER GEOJSON', 0, 10, 'C');
$pdf->Cell(10, 7, '', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10, 6, 'No.', 1, 0);
$pdf->Cell(50, 6, 'Kode Kecamatan', 1, 0);
$pdf->Cell(50, 6, 'Keterangan', 1, 0);
$pdf->Cell(50, 6, 'Latitude Position', 1, 0);
$pdf->Cell(50, 6, 'Longitude Position', 1, 0);
$pdf->Cell(50, 6, 'Tanggal Input', 1, 0);
$pdf->SetFont('Arial', '', 10);
include '../connection.php';
$no = 1;
$result = mysqli_query($conn, "SELECT * FROM marker");
while ($data = mysqli_fetch_array($result)) {
    $pdf->Cell(10, 6, "", 0, 1);
    $pdf->Cell(10, 6, $no++, 1, 0);
    $pdf->Cell(50, 6, $data['kode_kecamatan'], 1, 0);
    $pdf->Cell(50, 6, $data['keterangan'], 1, 0);
    $pdf->Cell(50, 6, $data['lat_pos'], 1, 0);
    $pdf->Cell(50, 6, $data['lng_pos'], 1, 0);
    $pdf->Cell(50, 6, $data['tanggal'], 1, 0);
}
$pdf->Output();
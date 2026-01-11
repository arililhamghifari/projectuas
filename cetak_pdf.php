<?php
require __DIR__ . '/fpdf186/fpdf.php';
require 'koneksi.php';

class PDF extends FPDF {
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 9);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Query data peserta event
$sql = "SELECT * FROM peserta_event ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

$pdf = new PDF('L','mm','A4'); // Landscape agar tabel muat
$pdf->AddPage();

// Judul
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN DATA PESERTA EVENT', 0, 1, 'C');
$pdf->Ln(5);

// Header tabel
$pdf->SetFillColor(230, 230, 230);
$pdf->SetFont('Arial', 'B', 11);

$pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
$pdf->Cell(45, 10, 'Nama', 1, 0, 'C', true);
$pdf->Cell(60, 10, 'Email', 1, 0, 'C', true);
$pdf->Cell(35, 10, 'No HP', 1, 0, 'C', true);
$pdf->Cell(55, 10, 'Event', 1, 0, 'C', true);
$pdf->Cell(90, 10, 'Alasan', 1, 1, 'C', true);

// Isi tabel
$pdf->SetFont('Arial', '', 10);
$no = 1;

while ($row = mysqli_fetch_assoc($result)) {

    $pdf->Cell(10, 10, $no++, 1, 0, 'C');
    $pdf->Cell(45, 10, $row['nama'], 1, 0);
    $pdf->Cell(60, 10, $row['email'], 1, 0);
    $pdf->Cell(35, 10, $row['no_hp'], 1, 0);
    $pdf->Cell(55, 10, $row['event'], 1, 0);
    $pdf->Cell(90, 10, substr($row['alasan'], 0, 50).'...', 1, 1);
}

$pdf->Output();
?>

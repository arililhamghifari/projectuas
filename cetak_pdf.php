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

// Query data
$sql = "SELECT * FROM peserta_event ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

$pdf = new PDF('L','mm','A4');
$pdf->AddPage();

// Judul
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'LAPORAN DATA PESERTA EVENT', 0, 1, 'C');
$pdf->Ln(5);

// Header tabel
$pdf->SetFillColor(230,230,230);
$pdf->SetFont('Arial','B',11);

$pdf->Cell(10, 12, 'No', 1, 0, 'C', true);
$pdf->Cell(30, 12, 'Foto', 1, 0, 'C', true);
$pdf->Cell(45, 12, 'Nama', 1, 0, 'C', true);
$pdf->Cell(60, 12, 'Email', 1, 0, 'C', true);
$pdf->Cell(35, 12, 'No HP', 1, 0, 'C', true);
$pdf->Cell(50, 12, 'Event', 1, 0, 'C', true);
$pdf->Cell(60, 12, 'Alasan', 1, 1, 'C', true);

// Isi tabel
$pdf->SetFont('Arial','',10);
$no = 1;
$rowHeight = 25;

while ($row = mysqli_fetch_assoc($result)) {

    $yBefore = $pdf->GetY();

    // No
    $pdf->Cell(10, $rowHeight, $no++, 1, 0, 'C');

    // Foto
    $xFoto = $pdf->GetX();
    $yFoto = $pdf->GetY();
    $pdf->Cell(30, $rowHeight, '', 1, 0, 'C');

    if (!empty($row['foto']) && file_exists('uploads/'.$row['foto'])) {
        $pdf->Image(
            'uploads/'.$row['foto'],
            $xFoto + 3,
            $yFoto + 3,
            20,
            20
        );
    }

    // Data lain
    $pdf->Cell(45, $rowHeight, $row['nama'], 1, 0);
    $pdf->Cell(60, $rowHeight, $row['email'], 1, 0);
    $pdf->Cell(35, $rowHeight, $row['no_hp'], 1, 0);
    $pdf->Cell(50, $rowHeight, $row['pilihan_event'], 1, 0);
    $pdf->Cell(60, $rowHeight, substr($row['alasan'], 0, 40), 1, 1);
}

$pdf->Output();
?>

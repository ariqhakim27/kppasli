<?php
include('../../conf/config.php');
require 'fpdf/fpdf.php';

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('img/padang.png', 10, 10, 20, 25); // Ganti 'logo.png' dengan path dan nama file logo Anda

        // Kop surat
        $this->SetFont('Times', 'B', 10); // Ukuran font normal
        $this->Cell(0, 5, 'PEMERINTAH KOTA PADANG', 0, 1, 'C');
        $this->SetFont('Times', 'B', 15); // Ukuran font normal
        $this->Cell(0, 10, 'DINAS KOMUNIKASI DAN INFORMATIKA', 0, 1, 'C');
        $this->SetFont('Times', '', 10); // Ukuran font normal
        $this->Cell(0, 5, 'Komp. Balaikota Lt. III Jl. By Pass Aie Pacah, Kota Padang - Sumatera Barat', 0, 1, 'C');
        $this->Cell(0, 5, 'Telp. : 0751 4640800 Email : diskominfo@padang.go.id', 0, 1, 'C');
        $this->Line(10, 38, $this->GetPageWidth() - 10, 38);



        $this->Ln(10); // Jarak antar baris

        $this->SetFont('Times', 'B', 14); // Ukuran font normal
        $this->Cell(0, 10, 'LAPORAN DATA KATEGORI BARANG', 0, 1, 'C');
        $this->Ln(10); // Jarak antar baris

        // Header tabel
        $this->SetFont('Times', 'B', 12); // Ukuran font header
        $this->Cell(10, 10, 'No.', 1, 0, 'C');
        $this->Cell(100, 10, 'Kode Kategori', 1, 0, 'C');
        $this->Cell(0, 10, 'Nama Kategori', 1, 1, 'C');
    }

    function Content($koneksi)
    {
        $this->SetFont('Times', '', 12); // Ukuran font normal
        $qbarang = mysqli_query($koneksi, "SELECT * FROM tb_kategori");

        $no = 1;
        while ($tampil = mysqli_fetch_assoc($qbarang)) {
            $this->Cell(10, 10, $no++, 1, 0, 'C');
            $this->Cell(100, 10, $tampil['id_kategori'], 1, 0, 'C');
            $this->Cell(0, 10, $tampil['nama_kategori'], 1, 1, 'C');
        }
    }
}

$pdf = new PDF('L', 'mm', 'A4'); // Ukuran halaman
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($koneksi);
// Tampilkan preview PDF
$pdf->Output('I', 'Laporan Kategori.pdf');

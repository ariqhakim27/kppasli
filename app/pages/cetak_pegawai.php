<?php
include ('../../conf/config.php');
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


        $this->Ln(5 * 0.8); // Perkecil jarak antar baris

        $this->SetFont('Times', 'B', 14 * 0.8); // Perkecil ukuran font
        $this->Cell(0, 10, 'LAPORAN DATA PEGAWAI', 0, 1, 'C');
        $this->Ln(3); // Perkecil jarak antar baris

        $this->SetFont('Times', 'B', 10 * 0.8); // Perkecil ukuran font
        $this->Cell(10 * 0.8, 6 * 0.8, 'No.', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(30 * 0.8, 6 * 0.8, 'Nip', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(50 * 0.8, 6 * 0.8, 'Nama Pegawai', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(50 * 0.8, 6 * 0.8, 'Jabatan', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(100 * 0.8, 6 * 0.8, 'Nama Bidang', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(30 * 0.8, 6 * 0.8, 'Jenis Kelamin', 1, 1, 'C'); // Perkecil ukuran cell
        
    }

    function Content($koneksi)
    {
        $this->SetFont('Times', '', 10 * 0.8); // Perkecil ukuran font
        $qpegawai = mysqli_query($koneksi, "SELECT * FROM tb_pegawai 
        JOIN tb_bidang ON tb_bidang.id_bidang = tb_pegawai.id_bidang");

        $no = 1;
        while ($tampil = mysqli_fetch_assoc($qpegawai)) {
            $this->Cell(10 * 0.8, 6 * 0.8, $no++, 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(30 * 0.8, 6 * 0.8, $tampil['nip'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(50 * 0.8, 6 * 0.8, $tampil['nama_pegawai'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(50 * 0.8, 6 * 0.8, $tampil['jabatan'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(100 * 0.8, 6 * 0.8, $tampil['nama_bidang'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(30 * 0.8, 6 * 0.8, $tampil['jenis_kelamin'], 1, 1, 'C'); // Perkecil ukuran cell

        }
    }
}

$pdf = new PDF('L', 'mm', 'A4'); // Ukuran halaman
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($koneksi);
// Tampilkan preview PDF
$pdf->Output('I', 'Laporan Barang.pdf');

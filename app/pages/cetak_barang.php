<?php
require '../../conf/config.php';
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
        $this->Cell(0, 10, 'LAPORAN DATA BARANG', 0, 1, 'C');
        $this->Ln(3); // Perkecil jarak antar baris

        $this->SetFont('Times', 'B', 8.0 * 0.8); // Perkecil ukuran font
        $this->Cell(7 * 0.8, 6 * 0.8, 'No.', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(20 * 0.8, 6 * 0.8, 'Kode Barang', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(30 * 0.8, 6 * 0.8, 'Nama Barang', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(22 * 0.8, 6 * 0.8, 'Kategori', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(22 * 0.8, 6 * 0.8, 'Merek', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(22 * 0.8, 6 * 0.8, 'No. Seri', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(15 * 0.8, 6 * 0.8, 'Jumlah', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(15 * 0.8, 6 * 0.8, 'Ukuran', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(15 * 0.8, 6 * 0.8, 'Bahan', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(20 * 0.8, 6 * 0.8, 'Harga', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(12 * 0.8, 6 * 0.8, 'Kondisi', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(25 * 0.8, 6 * 0.8, 'Tahun Pembuatan', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(30 * 0.8, 6 * 0.8, 'Penanggung Jawab', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(17 * 0.8, 6 * 0.8, 'Keterangan', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(20 * 0.8, 6 * 0.8, 'Tanggal Input', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(25 * 0.8, 6 * 0.8, 'Nama Ruangan', 1, 0, 'C'); // Perkecil ukuran cell
        $this->Cell(25 * 0.8, 6 * 0.8, 'Nama Bidang', 1, 1, 'C'); // Perkecil ukuran cell

    }

    function Content($conn)
    {
        $this->SetFont('Times', '', 7.5 * 0.8); // Perkecil ukuran font
        $qbarang = mysqli_query($conn, "SELECT * FROM tb_barang 
        JOIN tb_kategori ON tb_barang.id_kategori = tb_kategori.id_kategori
        JOIN tb_pegawai ON tb_barang.nip = tb_pegawai.nip
        JOIN tb_ruangan ON tb_barang.id_ruangan = tb_ruangan.id_ruangan 
        JOIN tb_bidang ON tb_bidang.id_bidang = tb_ruangan.id_bidang");

        $no = 1;
        while ($tampil = mysqli_fetch_assoc($qbarang)) {
            $this->Cell(7 * 0.8, 6 * 0.8, $no++, 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(20 * 0.8, 6 * 0.8, $tampil['id_barang'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(30 * 0.8, 6 * 0.8, $tampil['nama_barang'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(22 * 0.8, 6 * 0.8, $tampil['nama_kategori'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(22 * 0.8, 6 * 0.8, $tampil['merek'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(22 * 0.8, 6 * 0.8, $tampil['no_seri'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(15 * 0.8, 6 * 0.8, $tampil['jumlah'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(15 * 0.8, 6 * 0.8, $tampil['ukuran'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(15 * 0.8, 6 * 0.8, $tampil['bahan'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(20 * 0.8, 6 * 0.8, $tampil['harga'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(12 * 0.8, 6 * 0.8, $tampil['kondisi'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(25 * 0.8, 6 * 0.8, $tampil['thn_pembuatan'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(30 * 0.8, 6 * 0.8, $tampil['nama_pegawai'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(17 * 0.8, 6 * 0.8, $tampil['keterangan'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(20 * 0.8, 6 * 0.8, $tampil['tgl_input'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(25 * 0.8, 6 * 0.8, $tampil['nama_ruangan'], 1, 0, 'C'); // Perkecil ukuran cell
            $this->Cell(25 * 0.8, 6 * 0.8, $tampil['nama_bidang'], 1, 1, 'C'); // Perkecil ukuran cell
        }
    }
}

$pdf = new PDF('L', 'mm', 'A4'); // Ukuran halaman
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Content($koneksi);
// Tampilkan preview PDF
$pdf->Output('I', 'Laporan Barang.pdf');

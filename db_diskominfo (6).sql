-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2024 pada 15.45
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_diskominfo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(255) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `no_seri` varchar(100) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(255) NOT NULL,
  `nama_bidang` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`, `lokasi`) VALUES
(4, 'EGOV', 'lt 2'),
(5, 'INTI', 'LT2'),
(6, 'IKP', 'LT2'),
(7, 'SP', 'Lantai 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(10, 'wdaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mutasi`
--

CREATE TABLE `tb_mutasi` (
  `id_mutasi` int(255) NOT NULL,
  `id_barang` int(255) NOT NULL,
  `nip` int(255) NOT NULL,
  `tanggal_mutasi` timestamp NOT NULL DEFAULT current_timestamp(),
  `mutasi_keberapa` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` int(255) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_ruangan` int(255) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `id_bidang`, `id_ruangan`, `nama_pegawai`, `jabatan`, `jenis_kelamin`) VALUES
(13432, 5, 6, 'fila inti', 'inti', 'Perempuan'),
(324321, 5, 5, 'linda intii', 'pp', 'Perempuan'),
(436452, 4, 7, 'ipanegop', 'keren', 'Perempuan'),
(3214132, 5, 5, 'fikranintii', 'inti', 'Laki-laki'),
(7587647, 6, 1, 'loukep', 'pp', 'Laki-laki'),
(32121423, 4, 9, 'budiegop', 'kepala', 'Laki-laki'),
(88994890, 5, 6, 'cicinti', 'inti', 'Perempuan'),
(432243534, 5, 6, 'abdulinti', 'inti', 'Perempuan'),
(687564563, 6, 1, 'hihukep', 'pp', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` int(255) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `id_bidang` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `id_bidang`) VALUES
(1, 'komp', 6),
(2, 'sekre', 6),
(5, 'intii', 5),
(6, 'inti', 5),
(7, 'BIDDING', 4),
(9, 'training', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_barang`
--

CREATE TABLE `tb_transaksi_barang` (
  `id_transaksi_barang` int(255) NOT NULL,
  `id_kategori` int(50) NOT NULL,
  `id_barang` int(255) NOT NULL,
  `id_bidang` int(50) NOT NULL,
  `id_ruangan` int(50) NOT NULL,
  `nip` int(255) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `register_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '12345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indeks untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- Indeks untuk tabel `tb_transaksi_barang`
--
ALTER TABLE `tb_transaksi_barang`
  ADD PRIMARY KEY (`id_transaksi_barang`),
  ADD KEY `id_bidang` (`id_bidang`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  MODIFY `id_mutasi` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi_barang`
--
ALTER TABLE `tb_transaksi_barang`
  MODIFY `id_transaksi_barang` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  ADD CONSTRAINT `tb_mutasi_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`),
  ADD CONSTRAINT `tb_mutasi_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `tb_pegawai_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `tb_ruangan` (`id_ruangan`),
  ADD CONSTRAINT `tb_pegawai_ibfk_3` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`);

--
-- Ketidakleluasaan untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD CONSTRAINT `tb_ruangan_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi_barang`
--
ALTER TABLE `tb_transaksi_barang`
  ADD CONSTRAINT `tb_transaksi_barang_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `tb_barang` (`id_barang`),
  ADD CONSTRAINT `tb_transaksi_barang_ibfk_3` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`),
  ADD CONSTRAINT `tb_transaksi_barang_ibfk_4` FOREIGN KEY (`id_ruangan`) REFERENCES `tb_ruangan` (`id_ruangan`),
  ADD CONSTRAINT `tb_transaksi_barang_ibfk_5` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`),
  ADD CONSTRAINT `tb_transaksi_barang_ibfk_6` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

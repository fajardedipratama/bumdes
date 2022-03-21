-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2022 pada 13.50
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_bumdes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_bgmart`
--

CREATE TABLE `id_bgmart` (
  `id` int(11) NOT NULL,
  `tgl_setor` date DEFAULT NULL,
  `nama_setoran` varchar(100) NOT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_bgmart`
--

INSERT INTO `id_bgmart` (`id`, `tgl_setor`, `nama_setoran`, `jumlah`) VALUES
(3, '2022-03-15', 'Setoran BGmart Maret', 4000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_kios`
--

CREATE TABLE `id_kios` (
  `id` int(11) NOT NULL,
  `no_kios` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `jenis_dagang` varchar(100) NOT NULL,
  `awal_sewa` date DEFAULT NULL,
  `akhir_sewa` date DEFAULT NULL,
  `biaya_sewa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_kios`
--

INSERT INTO `id_kios` (`id`, `no_kios`, `nama`, `no_ktp`, `no_hp`, `alamat`, `jenis_dagang`, `awal_sewa`, `akhir_sewa`, `biaya_sewa`) VALUES
(1, 4, 'Fajar Dedi Pratama', '31525020205000001', '083173388708', 'Sambiroto Balongpangggang', 'Makanan', '2022-03-04', '2022-02-01', NULL),
(3, 2, 'Pratama', '123456789000', '0812345678', 'Giri', 'Pakaian', '2022-03-06', '2023-03-06', 5000000),
(5, 1, 'Aca', '352409910293900', '087888999000', 'Giri', 'Makanan', '2021-07-06', '2022-01-02', 6000000),
(6, 1, 'Fajar Dedi Pratama', '31525020205000001', '083173388708', 'Sambiroto Balongpangggang', 'Makanan', '2022-03-01', '2023-03-01', 4000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_lain_keluar`
--

CREATE TABLE `id_lain_keluar` (
  `id` int(11) NOT NULL,
  `tgl_setor` date DEFAULT NULL,
  `nama_setoran` varchar(100) NOT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_lain_keluar`
--

INSERT INTO `id_lain_keluar` (`id`, `tgl_setor`, `nama_setoran`, `jumlah`) VALUES
(1, '2022-03-14', 'ongkos kuli', 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_lain_masuk`
--

CREATE TABLE `id_lain_masuk` (
  `id` int(11) NOT NULL,
  `tgl_setor` date DEFAULT NULL,
  `nama_setoran` varchar(100) NOT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_lain_masuk`
--

INSERT INTO `id_lain_masuk` (`id`, `tgl_setor`, `nama_setoran`, `jumlah`) VALUES
(1, '2022-03-12', 'Setoran kios mayora maret', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_laporan`
--

CREATE TABLE `id_laporan` (
  `id` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `dana` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_laporan`
--

INSERT INTO `id_laporan` (`id`, `bulan`, `tahun`, `tgl_awal`, `tgl_akhir`, `dana`) VALUES
(5, 3, '2022', '2022-03-01', '2022-03-31', 6330000),
(6, 4, '2022', '2022-04-01', '2022-04-29', 6830000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_mobil`
--

CREATE TABLE `id_mobil` (
  `id` int(11) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `nopol` varchar(100) NOT NULL,
  `no_rangka` varchar(100) NOT NULL,
  `no_mesin` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_mobil`
--

INSERT INTO `id_mobil` (`id`, `merek`, `nama_pemilik`, `nopol`, `no_rangka`, `no_mesin`, `tahun`, `warna`, `status`) VALUES
(1, 'Daihatsu Xenia', 'Fajar', 'W 3991 JM', 'NJXSAN32893ND', '83DWUQNE3HHJ', 2019, 'Hitam', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_mobil_servis`
--

CREATE TABLE `id_mobil_servis` (
  `id` int(11) NOT NULL,
  `tgl_servis` date NOT NULL,
  `mobil_id` int(11) DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_mobil_servis`
--

INSERT INTO `id_mobil_servis` (`id`, `tgl_servis`, `mobil_id`, `keterangan`, `biaya`) VALUES
(1, '2022-03-12', 1, 'ganti oli', 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_mobil_sewa`
--

CREATE TABLE `id_mobil_sewa` (
  `id` int(11) NOT NULL,
  `mobil_id` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `no_identitas` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `tgl_sewa` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_mobil_sewa`
--

INSERT INTO `id_mobil_sewa` (`id`, `mobil_id`, `nama`, `no_identitas`, `alamat`, `no_hp`, `keperluan`, `tgl_sewa`, `tgl_selesai`, `biaya`) VALUES
(2, 1, 'Fajar', '35123456789000', 'Sambiroto Balongpangggang', '083173388708', 'Ke Jawa Tengah', '2022-03-09', '2022-03-13', 800000),
(3, 1, 'Fajar', '35123456789000', 'Sambiroto Balongpangggang', '083173388708', 'Ke Jawa Tengah', '2022-03-17', '2022-03-18', 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_ponten`
--

CREATE TABLE `id_ponten` (
  `id` int(11) NOT NULL,
  `tgl_setor` date DEFAULT NULL,
  `nama_setoran` varchar(100) NOT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_ponten`
--

INSERT INTO `id_ponten` (`id`, `tgl_setor`, `nama_setoran`, `jumlah`) VALUES
(1, '2022-03-16', 'Setoran ponten pasar', 800000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_setoran_kios`
--

CREATE TABLE `id_setoran_kios` (
  `id` int(11) NOT NULL,
  `nama_setoran` varchar(100) NOT NULL,
  `tgl_setoran` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_setoran_kios`
--

INSERT INTO `id_setoran_kios` (`id`, `nama_setoran`, `tgl_setoran`) VALUES
(1, 'Setoran Minggu-1 Bulan Maret 2022', '2022-03-07'),
(4, 'Setoran Minggu-1 Bulan April 2022', '2022-04-13'),
(6, 'Setoran Minggu 1 Bulan Maret 2023', '2023-03-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_setoran_kios_detail`
--

CREATE TABLE `id_setoran_kios_detail` (
  `id` int(11) NOT NULL,
  `setoran_id` int(11) NOT NULL,
  `kios_id` int(11) NOT NULL,
  `tgl_setoran` date DEFAULT NULL,
  `tagihan` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_setoran_kios_detail`
--

INSERT INTO `id_setoran_kios_detail` (`id`, `setoran_id`, `kios_id`, `tgl_setoran`, `tagihan`, `biaya`) VALUES
(1, 1, 3, '2022-03-07', 5000000, 200000),
(5, 4, 3, '2022-04-14', 5000000, 500000),
(7, 6, 3, '2023-03-18', 6000000, 250000),
(8, 1, 3, '2022-03-07', 6000000, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_user`
--

CREATE TABLE `id_user` (
  `id` int(11) NOT NULL,
  `profilname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `authKey` varchar(100) NOT NULL,
  `accessToken` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_user`
--

INSERT INTO `id_user` (`id`, `profilname`, `username`, `password`, `authKey`, `accessToken`) VALUES
(1, 'Admin Bumdes', 'admin', '$2y$13$Jb3PNaownlRYECbuhReQBe6EvhpY0Jrjg15hu4URIRB/483UsVAF2', '21232f297a57a5a743894a0e4a801fc3', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `id_bgmart`
--
ALTER TABLE `id_bgmart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_kios`
--
ALTER TABLE `id_kios`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_lain_keluar`
--
ALTER TABLE `id_lain_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_lain_masuk`
--
ALTER TABLE `id_lain_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_laporan`
--
ALTER TABLE `id_laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_mobil`
--
ALTER TABLE `id_mobil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_mobil_servis`
--
ALTER TABLE `id_mobil_servis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_mobil_sewa`
--
ALTER TABLE `id_mobil_sewa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_ponten`
--
ALTER TABLE `id_ponten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_setoran_kios`
--
ALTER TABLE `id_setoran_kios`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_setoran_kios_detail`
--
ALTER TABLE `id_setoran_kios_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_user`
--
ALTER TABLE `id_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `id_bgmart`
--
ALTER TABLE `id_bgmart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `id_kios`
--
ALTER TABLE `id_kios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `id_lain_keluar`
--
ALTER TABLE `id_lain_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `id_lain_masuk`
--
ALTER TABLE `id_lain_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `id_laporan`
--
ALTER TABLE `id_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `id_mobil`
--
ALTER TABLE `id_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `id_mobil_servis`
--
ALTER TABLE `id_mobil_servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `id_mobil_sewa`
--
ALTER TABLE `id_mobil_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `id_ponten`
--
ALTER TABLE `id_ponten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `id_setoran_kios`
--
ALTER TABLE `id_setoran_kios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `id_setoran_kios_detail`
--
ALTER TABLE `id_setoran_kios_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `id_user`
--
ALTER TABLE `id_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

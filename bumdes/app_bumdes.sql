-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Mar 2022 pada 16.05
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
(1, '2022-03-30', 'Setoran BGmart Maret 2022', 4000000);

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
(1, 1, 'Fajar Dedi Pratama', '3502020202020200', '083173388708', 'Sambiroto Balongpangggang', 'Pakaian', '2022-03-01', '2024-03-01', 5000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_kios_kontrak`
--

CREATE TABLE `id_kios_kontrak` (
  `id` int(11) NOT NULL,
  `kios_id` int(11) NOT NULL,
  `awal_kontrak` date DEFAULT NULL,
  `akhir_kontrak` date DEFAULT NULL,
  `tagihan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_kios_kontrak`
--

INSERT INTO `id_kios_kontrak` (`id`, `kios_id`, `awal_kontrak`, `akhir_kontrak`, `tagihan`) VALUES
(1, 1, '2022-03-01', '2024-03-01', 5000000);

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
(1, '2022-03-17', 'ongkos kuli', 1500000);

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
(1, '2022-03-21', 'Hasil jual barang bekas', 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_laporan`
--

CREATE TABLE `id_laporan` (
  `id` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `dana` int(11) DEFAULT NULL,
  `dana_kemarin` varchar(100) NOT NULL,
  `dana_tahun_lalu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_laporan_bagian`
--

CREATE TABLE `id_laporan_bagian` (
  `id` int(11) NOT NULL,
  `tahun_id` int(11) DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `jenis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_laporan_tahun`
--

CREATE TABLE `id_laporan_tahun` (
  `id` int(11) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `dana` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `id_laporan_user`
--

CREATE TABLE `id_laporan_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `id_laporan_user`
--

INSERT INTO `id_laporan_user` (`id`, `nama`, `jabatan`) VALUES
(1, 'Suis Iswati', 'Direktur'),
(2, 'Syahida Auliya Rahma', 'Bendahara');

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
(1, 'Daihatsu Xenia', 'Fajar Dedi', 'W 3991 JM', 'NJXSAN32893ND', '83DWUQNE3HHJ', 2019, 'Hitam', 'Aktif');

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
(1, '2022-03-11', 1, 'ganti oli', 250000);

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
(1, 1, 'Fajar', '35123456789000', 'Sambiroto Balongpangggang', '083173388708', 'Ke Jawa Tengah', '2022-03-04', '2022-03-07', 1000000),
(2, 1, 'Tama', '78321789382918000', 'Giri', '0812345678', 'Ke Bali', '2022-03-25', '2022-03-27', 1500000);

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
(1, '2022-03-30', 'Setoran uang ponten pasar maret 2022', 3000000);

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
(1, 'Setoran Minggu 1 Bulan Maret 2022', '2022-03-30');

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
(1, 1, 1, '2022-03-30', 5000000, 2000000),
(2, 1, 1, '2022-03-30', 5000000, 1500000);

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
-- Indeks untuk tabel `id_kios_kontrak`
--
ALTER TABLE `id_kios_kontrak`
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
-- Indeks untuk tabel `id_laporan_bagian`
--
ALTER TABLE `id_laporan_bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_laporan_tahun`
--
ALTER TABLE `id_laporan_tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `id_laporan_user`
--
ALTER TABLE `id_laporan_user`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `id_kios`
--
ALTER TABLE `id_kios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `id_kios_kontrak`
--
ALTER TABLE `id_kios_kontrak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `id_laporan_bagian`
--
ALTER TABLE `id_laporan_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `id_laporan_tahun`
--
ALTER TABLE `id_laporan_tahun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `id_laporan_user`
--
ALTER TABLE `id_laporan_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `id_mobil`
--
ALTER TABLE `id_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `id_mobil_servis`
--
ALTER TABLE `id_mobil_servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `id_mobil_sewa`
--
ALTER TABLE `id_mobil_sewa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `id_ponten`
--
ALTER TABLE `id_ponten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `id_setoran_kios`
--
ALTER TABLE `id_setoran_kios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `id_setoran_kios_detail`
--
ALTER TABLE `id_setoran_kios_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `id_user`
--
ALTER TABLE `id_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

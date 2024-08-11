-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2024 pada 20.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si-outdoor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat_kemah`
--

CREATE TABLE `alat_kemah` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `stok` int(10) DEFAULT NULL,
  `harga_sewa_per_hari` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `alat_kemah`
--

INSERT INTO `alat_kemah` (`id_alat`, `nama_alat`, `deskripsi`, `stok`, `harga_sewa_per_hari`, `gambar`) VALUES
(1, 'Tenda Dome (Kubah)', 'Tenda berbentuk kubah dengan dua atau lebih tiang melengkung yang bersilangan. Mudah dipasang dan stabil, cocok untuk berkemah di alam terbuka.', 10, '200000', 'Tenda2.png'),
(2, 'Tenda Backpacking', 'Tenda yang ringan dan ringkas, dirancang untuk dibawa dalam perjalanan jauh. Mudah dibawa oleh pendaki dan pejalan kaki.', 5, '100000', 'Tenda4.jpg'),
(3, 'Tenda Kanvas', 'Tenda yang terbuat dari bahan kanvas yang tebal dan tahan lama. Baik untuk perkemahan jangka panjang, namun lebih berat dibanding tenda lainnya.', 3, '150000', 'Tenda1.JPG'),
(4, 'Matras Putih', 'Warnanya Putih', 5, '50000', 'Matras3.jpg'),
(5, 'Matras Orange', 'Warna Orange', 10, '60000', 'Matras1.jpg'),
(6, 'Carrier 45L', 'Kapasitas 45L', 3, '45000', 'carrier 45L JPG.JPG'),
(7, 'Carrier 55L', 'Kapasitas 55L', 2, '55000', 'carrier 55 liter.png'),
(8, 'Carrier 65L', 'Kapasitas 65L', 10, '65000', 'carrier 65 liter .jpg'),
(9, 'Kompor Jenis 1', 'Jenis 1', 3, '50000', 'K0MP0R.JPG'),
(10, 'Kompor Jenis 2', 'Jenis 2', 5, '70000', 'K0MP0R 3.JPG'),
(11, 'Kursi Lipat', 'Kursi hitam', 10, '50000', 'kursi lipat.JPG'),
(12, 'Meja Lipat', 'Meja hitam', 5, '70000', 'meja lipat.JPG'),
(13, 'Sleeping Bag', 'Untuk tidur', 10, '100000', 'sleeping bag.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyewaan`
--

CREATE TABLE `detail_penyewaan` (
  `id_detail_penyewaan` int(11) NOT NULL,
  `id_alat` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `durasi_sewa` int(11) DEFAULT NULL,
  `total_harga` varchar(255) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `operasional`
--

CREATE TABLE `operasional` (
  `id_operasional` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `operasional`
--

INSERT INTO `operasional` (`id_operasional`, `nama`, `email`, `no_telepon`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '08123456789', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `no_telepon`, `password`, `alamat`) VALUES
(1, 'Dinar', 'dinar@gmail.com', '08234212442', 'dinar', 'Jl. Kalimantan No.9');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik`
--

CREATE TABLE `pemilik` (
  `id_pemilik` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL DEFAULT 'Pemilik'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemilik`
--

INSERT INTO `pemilik` (`id_pemilik`, `nama`, `email`, `password`, `jabatan`) VALUES
(1, 'Joko', 'joko@gmail.com', '123', 'Pemilik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `bukti_transaksi` varchar(255) DEFAULT NULL,
  `tanggal_pengembalian` varchar(255) DEFAULT NULL,
  `jam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_pelanggan`, `bukti_transaksi`, `tanggal_pengembalian`, `jam`) VALUES
(1, 1, 'Nota1.jpg', '2024-06-14', '09:00'),
(2, 1, 'Nota2.jpg', '2024-06-17', '15:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_penyewaan` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_operasional` int(11) DEFAULT 1,
  `foto_identitas` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'Ditinjau',
  `tanggal_penyewaan` varchar(255) DEFAULT NULL,
  `tanggal_pengembalian` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyewaan`
--

INSERT INTO `penyewaan` (`id_penyewaan`, `id_pelanggan`, `id_operasional`, `foto_identitas`, `status`, `tanggal_penyewaan`, `tanggal_pengembalian`, `catatan`) VALUES
(1, 1, 1, 'KTP.jpg', 'Ditinjau', '2024-06-13', NULL, 'Untuk Sehari'),
(2, 1, 1, 'KTP2.jpg', 'Ditinjau', '2024-06-14', NULL, 'Untuk Kemah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat_kemah`
--
ALTER TABLE `alat_kemah`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  ADD PRIMARY KEY (`id_detail_penyewaan`);

--
-- Indeks untuk tabel `operasional`
--
ALTER TABLE `operasional`
  ADD PRIMARY KEY (`id_operasional`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  ADD PRIMARY KEY (`id_pemilik`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_penyewaan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat_kemah`
--
ALTER TABLE `alat_kemah`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `detail_penyewaan`
--
ALTER TABLE `detail_penyewaan`
  MODIFY `id_detail_penyewaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id_operasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemilik`
--
ALTER TABLE `pemilik`
  MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id_penyewaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

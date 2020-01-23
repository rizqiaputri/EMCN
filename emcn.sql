-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2020 pada 06.14
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emcn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `posisi`) VALUES
(1, 'admin', '123', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `no_akun` varchar(50) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `header_akun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`no_akun`, `nama_akun`, `header_akun`) VALUES
('111', 'Kas', '1'),
('112', 'Persediaan Bahan Baku', '1'),
('113', 'Persediaan Bahan Penolong', '1'),
('114', 'Persediaan Barang Jadi', '1'),
('602', 'Beban BOP yang sesungguhnya', '6'),
('603', 'Biaya Bahan Baku', '6'),
('604', 'Biaya Tenaga Kerja Langsung', '6'),
('605', 'Biaya Overhead Pabrik', '6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `kd_bahan` varchar(50) NOT NULL,
  `nama_bahan` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`kd_bahan`, `nama_bahan`, `stok`, `jenis`, `satuan`) VALUES
('BHN-00001', 'Kain Jersey', 0, 'Utama', 'meter'),
('BHN-00002', 'Benang', 6, 'Penolong', 'pcs'),
('BHN-00003', 'Kain Katun', 0, 'Utama', 'meter'),
('BHN-00004', 'Kancing', 6, 'Penolong', 'pcs'),
('BHN-00005', 'Benang', 0, 'Penolong', 'pcs'),
('BHN-00006', 'Bahan banner', -9, 'Utama', 'meter'),
('BHN-00007', 'tinta', -9, 'Penolong', 'pcs'),
('BHN-00008', 'Cotton Combed', 6, 'Utama', 'meter'),
('BHN-00009', 'Kancing', 0, 'Penolong', 'pcs'),
('BHN-00010', 'Benang', 0, 'Penolong', 'pcs'),
('BHN-00011', 'Baby Terry', 0, 'Utama', 'meter'),
('BHN-00012', 'Benang', 0, 'Penolong', 'pcs'),
('BHN-00013', 'Resleting', 0, 'Penolong', 'pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bom`
--

CREATE TABLE `bom` (
  `kd_bahan` varchar(50) NOT NULL,
  `kd_produk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bom`
--

INSERT INTO `bom` (`kd_bahan`, `kd_produk`, `jumlah`) VALUES
('BHN-00001', 'PRD-00001', 5),
('BHN-00002', 'PRD-00001', 2),
('BHN-00003', 'PRD-00002', 3),
('BHN-00002', 'PRD-00002', 1),
('BHN-00004', 'PRD-00002', 3),
('BHN-00006', 'PRD-00003', 3),
('BHN-00007', 'PRD-00003', 3),
('BHN-00008', 'PRD-00003', 3),
('BHN-00002', 'PRD-00003', 3),
('BHN-00004', 'PRD-00003', 3),
('BHN-00011', 'PRD-00004', 5),
('BHN-00012', 'PRD-00004', 5),
('BHN-00013', 'PRD-00004', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `no_transaksi` varchar(50) NOT NULL,
  `kd_bahan` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`no_transaksi`, `kd_bahan`, `jumlah`, `harga`, `subtotal`) VALUES
('PBL-00001', 'BHN-00001', 50, 100000, 5000000),
('PBL-00001', 'BHN-00002', 20, 15000, 300000),
('PBL-00002', 'BHN-00003', 15, 150000, 2250000),
('PBL-00002', 'BHN-00002', 5, 15000, 75000),
('PBL-00002', 'BHN-00004', 15, 5000, 75000),
('PBL-00003', 'BHN-00003', 15, 50000, 750000),
('PBL-00003', 'BHN-00002', 5, 40000, 200000),
('PBL-00003', 'BHN-00004', 15, 20000, 300000),
('PBL-00004', 'BHN-00008', 15, 20000, 300000),
('PBL-00004', 'BHN-00002', 15, 15000, 225000),
('PBL-00004', 'BHN-00004', 15, 12000, 180000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `kd_produk` varchar(50) NOT NULL,
  `kd_pesanan` varchar(50) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`kd_produk`, `kd_pesanan`, `subtotal`, `jumlah`) VALUES
('PRD-00001', 'PSN-00001', 500000, 10),
('PRD-00002', 'PSN-00002', 300000, 5),
('PRD-00003', 'PSN-00003', 30000, 3),
('PRD-00002', 'PSN-00003', 200000, 5),
('PRD-00003', 'PSN-00004', 150000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `no_transaksi` varchar(50) NOT NULL,
  `no_akun` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `posisi_dr_cr` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal`
--

INSERT INTO `jurnal` (`no_transaksi`, `no_akun`, `tanggal`, `posisi_dr_cr`, `nominal`) VALUES
('PBL-00001', '112', '2019-12-11', 'D', 5000000),
('PBL-00001', '111', '2019-12-11', 'K', 5000000),
('PBL-00001', '113', '2019-12-11', 'D', 300000),
('PBL-00001', '111', '2019-12-11', 'K', 300000),
('PBL-00002', '112', '2019-12-11', 'D', 2250000),
('PBL-00002', '111', '2019-12-11', 'K', 2250000),
('PBL-00002', '113', '2019-12-11', 'D', 150000),
('PBL-00002', '111', '2019-12-11', 'K', 150000),
('PRD-00001', '114', '2019-12-11', 'D', 5070000),
('PRD-00001', '603', '2019-12-11', 'K', 5000000),
('PRD-00001', '604', '2019-12-11', 'K', 40000),
('PRD-00001', '605', '2019-12-11', 'K', 30000),
('PRD-00002', '114', '2019-12-11', 'D', 2312500),
('PRD-00002', '603', '2019-12-11', 'K', 2250000),
('PRD-00002', '604', '2019-12-11', 'K', 45000),
('PRD-00002', '605', '2019-12-11', 'K', 17500),
('PBL-00003', '112', '2019-12-17', 'D', 750000),
('PBL-00003', '111', '2019-12-17', 'K', 750000),
('PBL-00003', '113', '2019-12-17', 'D', 500000),
('PBL-00003', '111', '2019-12-17', 'K', 500000),
('PRD-00003', '114', '2019-12-17', 'D', 830000),
('PRD-00003', '603', '2019-12-17', 'K', 750000),
('PRD-00003', '604', '2019-12-17', 'K', 30000),
('PRD-00003', '605', '2019-12-17', 'K', 50000),
('PBL-00004', '112', '2019-12-17', 'D', 300000),
('PBL-00004', '111', '2019-12-17', 'K', 300000),
('PBL-00004', '113', '2019-12-17', 'D', 405000),
('PBL-00004', '111', '2019-12-17', 'K', 405000),
('PRD-00004', '114', '2019-12-17', 'D', 330000),
('PRD-00004', '603', '2019-12-17', 'K', 300000),
('PRD-00004', '604', '2019-12-17', 'K', 30000),
('PRD-00004', '605', '2019-12-17', 'K', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `no_transaksi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`no_transaksi`, `tanggal`, `total`) VALUES
('PBL-00001', '2019-12-11', 5300000),
('PBL-00002', '2019-12-11', 2400000),
('PBL-00003', '2019-12-17', 1250000),
('PBL-00004', '2019-12-17', 705000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `kd_pesanan` varchar(50) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`kd_pesanan`, `nama_pemesan`, `tanggal_pesan`, `tanggal_selesai`, `total`) VALUES
('PSN-00001', 'Rizqia Putri', '2019-12-11', '2019-12-22', 500000),
('PSN-00002', 'Rizqia Putri', '2019-12-11', '2019-11-25', 300000),
('PSN-00003', 'zulfa', '2019-12-17', '2020-02-12', 200000),
('PSN-00004', 'Panji', '2019-12-17', '2019-12-23', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `kd_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `ukuran` varchar(5) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`kd_produk`, `nama_produk`, `ukuran`, `harga`) VALUES
('PRD-00001', 'Baju Bola', 'M', 5323500),
('PRD-00002', 'Kemeja', 'L', 871500),
('PRD-00003', 'Kaos Polo', 'XL', 346500),
('PRD-00004', 'Jaket', 'L', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksi`
--

CREATE TABLE `produksi` (
  `no_transaksi` varchar(50) NOT NULL,
  `kd_produk` varchar(50) NOT NULL,
  `kd_pesanan` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `bbb` int(11) NOT NULL,
  `btkl` int(11) NOT NULL,
  `bop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produksi`
--

INSERT INTO `produksi` (`no_transaksi`, `kd_produk`, `kd_pesanan`, `tanggal`, `total`, `bbb`, `btkl`, `bop`) VALUES
('PRD-00001', 'PRD-00001', 'PSN-00001', '2019-12-11', 5070000, 5000000, 40000, 30000),
('PRD-00002', 'PRD-00002', 'PSN-00002', '2019-12-11', 2312500, 2250000, 45000, 17500),
('PRD-00003', 'PRD-00002', 'PSN-00003', '2019-12-17', 830000, 750000, 30000, 50000),
('PRD-00004', 'PRD-00003', 'PSN-00003', '2019-12-17', 330000, 300000, 30000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `no_transaksi` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no_transaksi`, `tanggal`, `total`) VALUES
('PBL-00001', '2019-12-11', 5300000),
('PBL-00002', '2019-12-11', 2400000),
('PBL-00003', '2019-12-17', 1250000),
('PBL-00004', '2019-12-17', 705000),
('PRD-00001', '2019-12-11', 5070000),
('PRD-00002', '2019-12-11', 2312500),
('PRD-00003', '2019-12-17', 830000),
('PRD-00004', '2019-12-17', 330000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`no_akun`);

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`kd_bahan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`kd_pesanan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_produk`);

--
-- Indeks untuk tabel `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

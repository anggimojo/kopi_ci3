-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2022 pada 12.08
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisi-jalan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat`, `no_hp`, `username`, `password`, `level_admin`) VALUES
(2, 'Dahlan', 'Kuningan', '0875698745633', 'admin', 'admin', 1),
(4, 'Pemilik', 'Jalaksana, Kuningan', '0897665654345', 'pemilik', 'pemilik', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `chatting`
--

CREATE TABLE `chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `pelanggan_send` text NOT NULL,
  `admin_send` text NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chatting`
--

INSERT INTO `chatting` (`id_chatting`, `id_pelanggan`, `id_admin`, `pelanggan_send`, `admin_send`, `time`) VALUES
(1, 1, 2, 'hai', '0', '2022-04-19 02:45:00'),
(2, 1, 2, '0', 'hai juga', '2022-04-19 02:55:43'),
(3, 1, 2, 'apakah ready produk coffe latte?', '0', '2022-04-19 02:58:06'),
(4, 1, 2, 'hai', '0', '2022-06-22 00:45:14'),
(5, 3, 2, 'hai', '0', '2022-07-05 02:18:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_produk`, `id_transaksi`, `qty`) VALUES
(1, 'KMIL', '20220418PTVV42C5', 2),
(2, 'KMIL', '20220419TSHAMBVQ', 1),
(3, 'GH2K', '20220419TSHAMBVQ', 1),
(4, 'KMIL', '20220419VY1B345C', 1),
(5, 'GH2K', '20220419VY1B345C', 1),
(6, 'GH2K', '20220614WVSUWOEG', 2),
(7, 'KMIL', '20220614WVSUWOEG', 1),
(8, 'GH2K', '20220614V4AAD7D2', 3),
(9, 'GH2K', '20220615BWXFROZI', 2),
(10, 'KMIL', '20220615Z0R5YDTV', 1),
(11, 'GH2K', '20220615PLN1CH2I', 1),
(12, 'KMIL', '20220615PLN1CH2I', 1),
(13, 'GH2K', '20220615AOJVGBEX', 1),
(14, 'GH2K', '20220627UUXOESHY', 1),
(15, 'GH2K', '20220627ET1KLUXD', 1),
(16, 'NVYR', '20220627ET1KLUXD', 1),
(17, 'GH2K', '20220627V2JCV71N', 1),
(18, 'JWKS', '20220627V2JCV71N', 1),
(19, 'GH2K', '202206272YJEQZL6', 2),
(20, 'KMIL', '202206272YJEQZL6', 1),
(21, 'GH2K', '20220627FXLGOJCY', 1),
(22, 'NVYR', '20220627FXLGOJCY', 1),
(23, 'GH2K', '20220702EOFS2YQL', 1),
(24, 'GH2K', '20220704VSZ8YJSQ', 1),
(25, 'NVYR', '20220704YFBDHIWL', 1),
(26, 'JWKS', '20220704YFBDHIWL', 1),
(27, 'GH2K', '2022070461MJDTQ5', 1),
(28, 'GH2K', '20220705W65PZYG2', 1),
(29, 'JWKS', '20220705W65PZYG2', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kritik_saran`
--

CREATE TABLE `kritik_saran` (
  `id_kritik` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kritik_saran` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kritik_saran`
--

INSERT INTO `kritik_saran` (`id_kritik`, `id_pelanggan`, `kritik_saran`, `time`) VALUES
(1, 1, 'coffe nya enakkk', '2022-04-19 03:07:29'),
(2, 1, 'recommmedd bangett', '2022-04-19 03:13:49'),
(3, 2, 'coffe nya enakkk banget', '2022-06-14 12:16:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `member` varchar(10) NOT NULL,
  `create_member` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `alamat`, `no_hp`, `username`, `password`, `member`, `create_member`) VALUES
(1, 'Sinta ', 'P', 'Kuningan, Jawa Barat', '085156727368', 'upimariani', 'upi12345', '0', '2022-07-05 02:22:23'),
(2, 'Bambang Ahmad ', 'L', 'Ciawigebang', '087675454321', 'bambang', 'ahmad12345', '1', '2022-06-14 12:44:23'),
(3, 'Lita Pujianti', 'P', 'Subang, Jawa Barat', '0897656787654', 'lita', 'lita12345', '0', '2022-06-26 22:39:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_transaksi` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(10) NOT NULL,
  `rw` varchar(10) NOT NULL,
  `kota` varchar(125) NOT NULL,
  `ongkir` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_transaksi`, `alamat`, `rt`, `rw`, `kota`, `ongkir`) VALUES
(3, '202206272YJEQZL6', 'LINK.KRAMAT JAYA RT/RW 007/003', '12', '2', 'Kuningan', '9000'),
(4, '20220702EOFS2YQL', 'LINK.KRAMAT JAYA RT/RW 007/003', '12', '03', 'Banjar', '19000'),
(5, '2022070461MJDTQ5', 'LINK.KRAMAT JAYA RT/RW 007/003', '12', '21', 'Bekasi', '14000'),
(6, '20220705W65PZYG2', 'Jalan Gurame ', '12', '03', 'Bandung', '14000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` varchar(12) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(125) NOT NULL,
  `tipe_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `stok`, `deskripsi`, `foto`, `tipe_produk`) VALUES
('GH2K', 'Cappucino', '15000', 29, '<div>Capuccino High Premium</div>', 'caffe_late_dingin.jpg', 0),
('JWKS', 'V60', '30000', 37, '<div>Dark Coffe</div>', 'hghg.jpg', 0),
('KMIL', 'Kopi Latte', '25000', 6, '<div>Kopi Latte <strong>Premium Edition</strong></div>', 'cappucino_dingin1.jpg', 0),
('NVYR', 'Hazelnut Latte', '25000', 27, '<div>Hazelnut Coffe fresh milk</div>', 'ghghg.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id_promo` int(11) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `nama_promo` varchar(50) NOT NULL,
  `besar` varchar(15) NOT NULL,
  `tgl_mulai` varchar(15) NOT NULL,
  `tgl_selesai` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id_promo`, `id_produk`, `nama_promo`, `besar`, `tgl_mulai`, `tgl_selesai`) VALUES
(2, 'KMIL', '0', '0', '0', '0'),
(4, 'GH2K', 'Day Sale', '15', '2022-07-18', '23-09-2022'),
(5, 'NVYR', 'Day Sale', '15', '2022-07-18', '03-09-2022'),
(6, 'JWKS', 'Every Day', '5', '2022-07-18', '22-10-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tgl_transaksi` varchar(20) NOT NULL,
  `total_bayar` varchar(50) NOT NULL,
  `status_order` int(2) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `pembayaran` int(11) NOT NULL,
  `bukti_pembayaran` varchar(125) NOT NULL,
  `status_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `tgl_transaksi`, `total_bayar`, `status_order`, `time`, `pembayaran`, `bukti_pembayaran`, `status_pesan`) VALUES
('20220418PTVV42C5', 1, '2022-04-18', '50000', 4, '2022-04-18 02:07:19', 3, 'link.jpg', 1),
('20220614V4AAD7D2', 2, '2022-06-14', '45000', 1, '2022-06-14 12:13:13', 1, 'gambar.gif', 1),
('20220614WVSUWOEG', 2, '2022-06-14', '52250', 0, '2022-06-14 11:58:50', 2, '0', 1),
('20220615AOJVGBEX', 2, '2022-06-15', '11400', 0, '2022-06-15 12:30:02', 2, '0', 1),
('20220615BWXFROZI', 2, '2022-06-15', '25650', 0, '2022-06-15 00:58:18', 2, '0', 1),
('20220615PLN1CH2I', 2, '2022-06-15', '31587.5', 0, '2022-06-15 10:52:37', 2, '0', 1),
('20220615Z0R5YDTV', 1, '2022-06-15', '20187.5', 1, '2022-06-15 04:51:39', 2, '?Pinterest?_@lalalalizax1.jpg', 1),
('202206272YJEQZL6', 3, '2022-06-27', '49637.5', 1, '2022-06-27 02:23:12', 2, '31084499740-bukti_transfer1.jpg', 2),
('20220627FXLGOJCY', 3, '2022-06-27', '40000', 0, '2022-06-27 02:25:24', 1, '0', 1),
('20220702EOFS2YQL', 3, '2022-07-02', '13537.5', 4, '2022-07-02 01:39:22', 2, '31084499740-bukti_transfer.jpg', 2),
('2022070461MJDTQ5', 3, '2022-07-04', '13537.5', 0, '2022-07-04 13:10:25', 2, '0', 2),
('20220704VSZ8YJSQ', 3, '2022-07-04', '15000', 0, '2022-07-04 07:33:59', 1, '0', 1),
('20220704YFBDHIWL', 3, '2022-07-04', '55000', 4, '2022-07-04 07:48:50', 1, '0', 1),
('20220705W65PZYG2', 3, '2022-07-05', '40612.5', 0, '2022-07-05 02:17:17', 2, '0', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  ADD PRIMARY KEY (`id_kritik`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `kritik_saran`
--
ALTER TABLE `kritik_saran`
  MODIFY `id_kritik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

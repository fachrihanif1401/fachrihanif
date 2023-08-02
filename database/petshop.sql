-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 10:35 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `id_bank` int(11) NOT NULL,
  `nama_pemilik_rekening` varchar(50) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(50) NOT NULL,
  `logo_bank` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id_bank`, `nama_pemilik_rekening`, `nama_bank`, `nomor_rekening`, `logo_bank`, `id_user`, `tanggal_update`) VALUES
(1, 'Purnama Amelia', 'BNI', '0395019090', '1200px-BNI_logo.svg.png', 1, '2021-07-22 09:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `gambar`) VALUES
(1, 'KOPET.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_pengiriman`
--

CREATE TABLE `tbl_data_pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `deadline_pembayaran` datetime NOT NULL,
  `status_pembelian` varchar(30) NOT NULL,
  `alasan_ditolak` text NOT NULL,
  `promo` int(11) NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `total_ongkir` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `distrik` varchar(150) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `kodepos_pengiriman` varchar(10) NOT NULL,
  `ekspedisi_pengiriman` varchar(100) NOT NULL,
  `paket_pengiriman` varchar(100) NOT NULL,
  `lama_pengiriman` int(50) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `telepon_penerima` varchar(15) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `tanggal_pengiriman` datetime NOT NULL,
  `tanggal_diterima` datetime NOT NULL,
  `resi_pengiriman` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_data_pengiriman`
--

INSERT INTO `tbl_data_pengiriman` (`id_pengiriman`, `id_pelanggan`, `tanggal_pembelian`, `deadline_pembayaran`, `status_pembelian`, `alasan_ditolak`, `promo`, `total_belanja`, `total_ongkir`, `total_pembelian`, `catatan`, `provinsi`, `distrik`, `tipe`, `kodepos_pengiriman`, `ekspedisi_pengiriman`, `paket_pengiriman`, `lama_pengiriman`, `nama_penerima`, `telepon_penerima`, `alamat_penerima`, `tanggal_pengiriman`, `tanggal_diterima`, `resi_pengiriman`) VALUES
(12, 4, '2021-08-04 02:56:18', '2021-08-05 02:56:18', 'Barang return disetujui', '', 0, 105000, 39000, 144000, '', 'Kalimantan Selatan', 'Banjarbaru', 'Kota', '70712', 'JNE', 'REG', 2, 'Rastafarcode', '089531290044', 'Jl. Sekumpul Gg. Purnama RT/RW 002/001 Kec. Martapura Kab. Banjar Kalimantan Selatan', '2021-08-03 22:01:46', '0000-00-00 00:00:00', '123456789'),
(13, 5, '2021-08-04 05:09:59', '2021-08-05 05:09:59', 'Barang return disetujui', '', 19950, 86000, 47000, 113050, '', 'Kalimantan Selatan', 'Banjar', 'Kabupaten', '70619', 'JNE', 'REG', 5, 'Alwi Ahmad', '082158408140', 'Banjarbaru', '2021-08-04 00:11:53', '0000-00-00 00:00:00', '1234986498895'),
(14, 5, '2021-08-04 07:19:23', '2021-08-05 07:19:23', 'Selesai', '', 23250, 119000, 36000, 131750, '', 'Kalimantan Selatan', 'Banjarbaru', 'Kota', '70712', 'JNE', 'OKE', 4, 'Alwi Ahmad', '082158408140', 'Banjarbaru', '2021-08-04 02:20:35', '2021-08-17 09:50:51', '1234986498895'),
(15, 5, '2021-08-17 14:38:26', '2021-08-18 14:38:26', 'Barang return disetujui', '', 18000, 105000, 15000, 102000, '', 'Jawa Timur', 'Gresik', 'Kabupaten', '61115', 'TIKI', 'ECO', 5, 'Alwi Ahmad', '082158408140', 'Banjarbaru', '2021-08-17 09:42:07', '0000-00-00 00:00:00', '1234986498895'),
(16, 6, '2021-08-18 07:56:37', '2021-08-19 07:56:37', 'Dikirim', '', 1678500, 10290000, 900000, 9511500, '', 'Kalimantan Selatan', 'Banjarbaru', 'Kota', '70712', 'JNE', 'OKE', 4, 'Raisa', '082158408140', 'Banjarbaru', '2021-08-18 03:01:59', '0000-00-00 00:00:00', '1234986498895');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_gambar`, `id_produk`, `judul`, `gambar`) VALUES
(1, 15, 'Baju Gamis Wanita Tania Set Setelan Celana Muslim Muslimah', 'batch-upload_e8977e53-fba5-4dd6-b982-a217298a28b9.jpg'),
(2, 15, 'Baju Gamis Wanita Tania Set Setelan Celana Muslim Muslimah', 'batch-upload_a27f2f57-2b8f-4a51-8710-0f0395f4fa2c.jpg'),
(3, 15, 'Baju Gamis Wanita Tania Set Setelan Celana Muslim Muslimah', 'batch-upload_44f4d942-6850-4837-b4b3-40c7a229e003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instansi`
--

CREATE TABLE `tbl_instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `pimpinan_instansi` varchar(50) NOT NULL,
  `email_instansi` varchar(50) NOT NULL,
  `telepon_instansi` varchar(15) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `instagram` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `logo_instansi` text NOT NULL,
  `alamat_instansi` text NOT NULL,
  `maps` text NOT NULL,
  `tentang` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_instansi`
--

INSERT INTO `tbl_instansi` (`id_instansi`, `nama_instansi`, `pimpinan_instansi`, `email_instansi`, `telepon_instansi`, `facebook`, `instagram`, `website`, `logo_instansi`, `alamat_instansi`, `maps`, `tentang`, `id_user`, `tanggal_update`) VALUES
(1, 'Petshop', 'Dinda', 'petshop@gmail.com', '08129999000', 'https://www.facebook.com/petshop', 'https://www.instagram.com/petshop', 'https://www.petshop.com', 'pet-shop.png', 'FWMX+2XM, Jl. Cilik Riwut, Baamang Tengah, Kec. Baamang, Kabupaten Kotawaringin Timur, Kalimantan Tengah 74311', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.967793627119!2d112.94735617569138!3d-2.5174222974610516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de2befe8361f27b%3A0x33355941a6e188df!2sGolden%20PETSHOP!5e0!3m2!1sid!2sid!4v1688779707392!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Petshop  adalah . . .', 1, '2023-07-08 01:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `id_user`, `tanggal_update`) VALUES
(23, 'MAKANAN KERING', 1, '2023-07-08 01:50:24'),
(24, 'MAKANAN BASAH', 1, '2023-07-08 01:50:35'),
(25, 'SNACK CREAMY', 1, '2023-07-08 01:50:59'),
(26, 'PASIR DAN PENGHILANG BAU', 1, '2023-07-08 01:51:12'),
(27, 'GROOMING', 1, '2023-07-08 01:51:23'),
(28, 'OBAT & VITAMIN', 1, '2023-07-08 01:51:34'),
(29, 'AKSESORIS HEWAN', 1, '2023-07-08 01:51:44'),
(30, 'PAKET BUNDLING', 1, '2023-07-08 01:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`id`, `gambar`) VALUES
(1, 'PETSHOP.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifikasi`
--

CREATE TABLE `tbl_notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(60) NOT NULL,
  `telepon_pelanggan` varchar(15) NOT NULL,
  `foto_pelanggan` text NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `tgl_konfirmasi` datetime NOT NULL,
  `tgl_verifikasi` datetime NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` tinytext NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subberat_produk` int(11) NOT NULL,
  `subharga_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengadaan_produk`
--

CREATE TABLE `tbl_pengadaan_produk` (
  `id_pengadaan` int(11) NOT NULL,
  `nomor_transaksi` varchar(30) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengadaan_produk_detail`
--

CREATE TABLE `tbl_pengadaan_produk_detail` (
  `id_pengadaan_detail` int(11) NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` tinytext NOT NULL,
  `harga_produk` int(11) NOT NULL DEFAULT 0,
  `berat_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar_produk` text NOT NULL,
  `terjual` int(11) NOT NULL DEFAULT 0,
  `stok` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `deskripsi_produk`, `gambar_produk`, `terjual`, `stok`, `id_user`, `tanggal_update`) VALUES
(19, 23, 'CAT CHOIZE ADULT BENTUK IKAN RASA TUNA', 17999, 800, '<p>&nbsp;</p>\r\n\r\n<p>Cat Choize Tuna Repack 800gr Makanan untuk kucing dewasa Bentuk ikan Crude protein: min 27% Crude fat: min 9% Crude fiber: max 4% Moisture: max 10% Expired panjang (Tertera dalam kemasan) Variasi cat choize + vitamin kucing alami (merk IMMUNE SUPPORT)</p>\r\n', 'id-11134201-23030-nz26xxht24nvb8.jpg', 0, 100, 1, '2023-07-08 01:56:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promo`
--

CREATE TABLE `tbl_promo` (
  `id_promo` int(11) NOT NULL,
  `kode_promo` varchar(20) NOT NULL,
  `tgl_promo` date NOT NULL,
  `diskon` int(11) NOT NULL,
  `foto_promo` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return`
--

CREATE TABLE `tbl_return` (
  `id_retur` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `alasan` text NOT NULL,
  `bukti` text NOT NULL,
  `jenis_retur` enum('Tukar Barang','Uang Kembali','Kirim Kembali','') NOT NULL,
  `status` enum('Disetujui','Ditolak','Pending','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `telepon_supplier` varchar(15) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `keterangan` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimoni`
--

CREATE TABLE `tbl_testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_pengiriman` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `testimoni` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal_ulasan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `foto` text NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `telepon`, `jk`, `foto`, `alamat`, `tanggal_update`) VALUES
(1, 'Administrator', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '0812345689', 'Laki-Laki', 'pet-shop.png', 'Banjarbaru', '2023-07-08 01:57:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id_bank`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_data_pengiriman`
--
ALTER TABLE `tbl_data_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  ADD PRIMARY KEY (`id_instansi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notifikasi`
--
ALTER TABLE `tbl_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pengiriman` (`id_pengiriman`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tbl_pengadaan_produk`
--
ALTER TABLE `tbl_pengadaan_produk`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `tbl_pengadaan_produk_detail`
--
ALTER TABLE `tbl_pengadaan_produk_detail`
  ADD PRIMARY KEY (`id_pengadaan_detail`),
  ADD KEY `id_pengadaan` (`id_pengadaan`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `tbl_return`
--
ALTER TABLE `tbl_return`
  ADD PRIMARY KEY (`id_retur`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `id_pengiriman` (`id_pengiriman`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_data_pengiriman`
--
ALTER TABLE `tbl_data_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_instansi`
--
ALTER TABLE `tbl_instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_notifikasi`
--
ALTER TABLE `tbl_notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_pengadaan_produk`
--
ALTER TABLE `tbl_pengadaan_produk`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pengadaan_produk_detail`
--
ALTER TABLE `tbl_pengadaan_produk_detail`
  MODIFY `id_pengadaan_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_return`
--
ALTER TABLE `tbl_return`
  MODIFY `id_retur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 05:09 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `argopuro`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori_user`
--

CREATE TABLE `kategori_user` (
  `id` int(11) NOT NULL,
  `kategori_user` varchar(100) NOT NULL,
  `beranda` int(11) NOT NULL,
  `insentif` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_user`
--

INSERT INTO `kategori_user` (`id`, `kategori_user`, `beranda`, `insentif`) VALUES
(31, 'Manager', 1, '0'),
(32, 'Sales', 49, '0'),
(33, 'User', 16, '0');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_user_modul`
--

CREATE TABLE `kategori_user_modul` (
  `id` int(11) NOT NULL,
  `kategori_user` int(11) NOT NULL,
  `modul` int(11) NOT NULL,
  `akses` enum('read','add','edit','delete') NOT NULL DEFAULT 'read'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_user_modul`
--

INSERT INTO `kategori_user_modul` (`id`, `kategori_user`, `modul`, `akses`) VALUES
(11956, 31, 1, 'read'),
(11957, 31, 2, 'read'),
(11958, 31, 3, 'read'),
(11959, 31, 4, 'read'),
(11960, 31, 5, 'read'),
(11961, 31, 6, 'read'),
(11962, 31, 7, 'read'),
(11963, 31, 8, 'read'),
(11964, 31, 9, 'read'),
(11965, 31, 10, 'read'),
(11966, 31, 11, 'read'),
(11967, 31, 12, 'read'),
(11968, 31, 13, 'read'),
(11969, 31, 14, 'read'),
(11970, 31, 15, 'read'),
(11971, 31, 16, 'read'),
(11972, 31, 17, 'read'),
(11973, 31, 18, 'read'),
(11974, 31, 19, 'read'),
(11975, 31, 20, 'read'),
(11976, 31, 21, 'read'),
(11977, 31, 22, 'read'),
(11978, 31, 23, 'read'),
(11979, 31, 24, 'read'),
(11980, 31, 25, 'read'),
(11981, 31, 26, 'read'),
(11982, 31, 27, 'read'),
(11983, 31, 28, 'read'),
(11984, 31, 29, 'read'),
(11985, 31, 30, 'read'),
(11986, 31, 31, 'read'),
(11987, 31, 32, 'read'),
(11988, 31, 33, 'read'),
(11989, 31, 34, 'read'),
(11990, 31, 35, 'read'),
(11991, 31, 36, 'read'),
(11992, 31, 37, 'read'),
(11993, 31, 38, 'read'),
(11994, 31, 39, 'read'),
(11995, 31, 40, 'read'),
(11996, 31, 41, 'read'),
(11997, 31, 42, 'read'),
(11998, 31, 43, 'read'),
(11999, 31, 3, 'add'),
(12000, 31, 4, 'add'),
(12001, 31, 5, 'add'),
(12002, 31, 6, 'add'),
(12003, 31, 7, 'add'),
(12004, 31, 8, 'add'),
(12005, 31, 9, 'add'),
(12006, 31, 10, 'add'),
(12007, 31, 12, 'add'),
(12008, 31, 13, 'add'),
(12009, 31, 14, 'add'),
(12010, 31, 15, 'add'),
(12011, 31, 17, 'add'),
(12012, 31, 18, 'add'),
(12013, 31, 19, 'add'),
(12014, 31, 23, 'add'),
(12015, 31, 24, 'add'),
(12016, 31, 27, 'add'),
(12017, 31, 28, 'add'),
(12018, 31, 29, 'add'),
(12019, 31, 38, 'add'),
(12020, 31, 39, 'add'),
(12021, 31, 42, 'add'),
(12022, 31, 3, 'edit'),
(12023, 31, 4, 'edit'),
(12024, 31, 5, 'edit'),
(12025, 31, 6, 'edit'),
(12026, 31, 7, 'edit'),
(12027, 31, 8, 'edit'),
(12028, 31, 9, 'edit'),
(12029, 31, 10, 'edit'),
(12030, 31, 12, 'edit'),
(12031, 31, 13, 'edit'),
(12032, 31, 15, 'edit'),
(12033, 31, 24, 'edit'),
(12034, 31, 27, 'edit'),
(12035, 31, 29, 'edit'),
(12036, 31, 38, 'edit'),
(12037, 31, 39, 'edit'),
(12038, 31, 41, 'edit'),
(12039, 31, 43, 'edit'),
(12040, 31, 3, 'delete'),
(12041, 31, 4, 'delete'),
(12042, 31, 5, 'delete'),
(12043, 31, 6, 'delete'),
(12044, 31, 7, 'delete'),
(12045, 31, 8, 'delete'),
(12046, 31, 9, 'delete'),
(12047, 31, 10, 'delete'),
(12048, 31, 12, 'delete'),
(12049, 31, 13, 'delete'),
(12050, 31, 14, 'delete'),
(12051, 31, 15, 'delete'),
(12052, 31, 17, 'delete'),
(12053, 31, 18, 'delete'),
(12054, 31, 19, 'delete'),
(12055, 31, 23, 'delete'),
(12056, 31, 24, 'delete'),
(12057, 31, 27, 'delete'),
(12058, 31, 28, 'delete'),
(12059, 31, 29, 'delete'),
(12060, 31, 38, 'delete'),
(12061, 31, 39, 'delete'),
(12062, 32, 14, 'read'),
(12063, 32, 25, 'read'),
(12064, 32, 14, 'add'),
(12065, 33, 16, 'read'),
(12066, 33, 2, 'read'),
(12067, 33, 9, 'read'),
(12068, 33, 43, 'read'),
(12069, 33, 43, 'edit'),
(12070, 31, 44, 'read'),
(12071, 31, 44, 'add'),
(12072, 31, 44, 'edit'),
(12073, 31, 44, 'delete'),
(12074, 31, 45, 'read'),
(12075, 31, 46, 'read'),
(12076, 31, 46, 'add'),
(12077, 31, 46, 'edit'),
(12078, 31, 46, 'delete'),
(12079, 31, 1, 'edit'),
(12080, 31, 47, 'read'),
(12081, 31, 47, 'add'),
(12082, 31, 47, 'edit'),
(12083, 31, 47, 'delete'),
(12090, 31, 21, 'add'),
(12091, 31, 48, 'read'),
(12092, 31, 48, 'add'),
(12093, 31, 48, 'edit');

-- --------------------------------------------------------

--
-- Table structure for table `master_admin`
--

CREATE TABLE `master_admin` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `aktif` enum('0','1') NOT NULL DEFAULT '1',
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_admin`
--

INSERT INTO `master_admin` (`id`, `kategori`, `username`, `password`, `nama_admin`, `email`, `aktif`, `waktu_update`) VALUES
(1, 31, 'admin', '$2y$10$GqSP/ynXwcWbmyAwz0yKluIXG7Nv3S18l6D7btXxIhTeRolAi0nh6', 'admin', 'kantorposku@gmail.com', '1', '2020-05-04 12:04:44'),
(2, 32, 'user_kasir', '$2y$10$l1yNDeXjOcFP5jUAvp/be.C4aiC4J.5kwr26wiupnzbkduT4IKe3y', 'Andika', 'andika@gmail.com', '1', '2019-07-05 04:24:09'),
(3, 33, 'users', '$2y$10$l1yNDeXjOcFP5jUAvp/be.C4aiC4J.5kwr26wiupnzbkduT4IKe3y', 'Sang User', 'iniemail@mail.com', '1', '2020-01-07 11:58:10'),
(8, 32, 'paiji', '$2y$10$fKlRi23Ce.jT58viE34Ua.btJyCaPWAsIZx7kJtjiR/QRAK5SCHXi', 'paiji', 'aa@a.com', '1', '2020-06-03 15:19:43'),
(9, 32, 'suprapno', '$2y$10$twwTJzH3.Sw73Okt3hXRe.fDU520dBR9sGt7DuKB7Ngs8PH3JV0uK', 'Supratno', 'aa@a.com', '1', '2020-06-03 15:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `master_distributor`
--

CREATE TABLE `master_distributor` (
  `id` int(11) NOT NULL,
  `nama_distributor` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_distributor`
--

INSERT INTO `master_distributor` (`id`, `nama_distributor`, `alamat`, `telepon`, `id_regional`, `id_sales`, `waktu_update`) VALUES
(8, 'distributor 1', 'alamat jember', '123', 1, 1, '2020-06-04 00:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `master_item`
--

CREATE TABLE `master_item` (
  `kode_item` int(11) NOT NULL,
  `nama_item` varchar(200) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `nama_penjual` varchar(100) NOT NULL,
  `nama_surat_tanah` varchar(100) NOT NULL,
  `status_surat_tanah` int(11) NOT NULL,
  `no_gambar` int(11) NOT NULL,
  `jumlah_bidang` int(11) DEFAULT '1',
  `luas_surat` int(11) DEFAULT '1',
  `luas_ukur` int(11) DEFAULT '1',
  `no_pbb` varchar(100) NOT NULL,
  `luas_pbb` int(11) NOT NULL,
  `njop` varchar(100) NOT NULL,
  `total_harga_pengalihan` varchar(100) DEFAULT '0',
  `nama_makelar` varchar(100) NOT NULL,
  `nilai` varchar(100) DEFAULT '0',
  `tanggal_pengalihan` date DEFAULT NULL,
  `akta_pengalihan` varchar(100) DEFAULT NULL,
  `nama_pengalihan` varchar(100) DEFAULT NULL,
  `pematangan` varchar(100) DEFAULT '0',
  `ganti_rugi` varchar(100) DEFAULT '0',
  `pbb` varchar(100) DEFAULT '0',
  `lain` varchar(100) DEFAULT '0',
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` varchar(100) NOT NULL,
  `id_perumahan` int(11) NOT NULL DEFAULT '0',
  `id_posisi_surat` int(11) DEFAULT NULL,
  `status_order_akta` enum('belum','proses','selesai') NOT NULL DEFAULT 'belum',
  `jenis_pengalihan_hak` enum('pribadi','pt') NOT NULL DEFAULT 'pribadi',
  `status_teknik` enum('belum','sudah') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_item`
--

INSERT INTO `master_item` (`kode_item`, `nama_item`, `tanggal_pembelian`, `nama_penjual`, `nama_surat_tanah`, `status_surat_tanah`, `no_gambar`, `jumlah_bidang`, `luas_surat`, `luas_ukur`, `no_pbb`, `luas_pbb`, `njop`, `total_harga_pengalihan`, `nama_makelar`, `nilai`, `tanggal_pengalihan`, `akta_pengalihan`, `nama_pengalihan`, `pematangan`, `ganti_rugi`, `pbb`, `lain`, `waktu_update`, `keterangan`, `id_perumahan`, `id_posisi_surat`, `status_order_akta`, `jenis_pengalihan_hak`, `status_teknik`) VALUES
(1, 'deni', '2020-01-01', 'Deni Yana', '', 1, 76, 1, 220, 220, '78/56/2020', 2020, '98/235/23', '200000', 'buna', '100000', '2020-04-22', 'Un/34', 'yani', '12000', '200000', '150000', '50000', '2020-06-17 07:47:48', 'test', 1, 0, 'proses', 'pribadi', 'sudah'),
(2, 'tanah 1', '2020-02-05', 'ach saubari', 'ach saubari', 1, 45, 1, 220, 220, '123/51.2/34/1998', 220, '34578', '55000000', 'rahayu', '0', '2020-06-05', '', '', '', '0', '0', '0', '2020-06-15 06:00:59', 'test', 1, 0, 'belum', 'pt', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `master_pembeli`
--

CREATE TABLE `master_pembeli` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `stok_awal` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jenis_pembeli` int(11) NOT NULL,
  `luas_sawah` varchar(100) NOT NULL,
  `id_penjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_pembeli`
--

INSERT INTO `master_pembeli` (`id`, `nama_pembeli`, `alamat`, `hp`, `stok_awal`, `total`, `waktu_update`, `jenis_pembeli`, `luas_sawah`, `id_penjual`) VALUES
(1, 'Diana', 'jakarta', '12', 1, 1, '2020-06-01 03:10:10', 1, '1', 1),
(2, 'Anisa', 'bekasi utara', '', 0, 0, '2020-06-01 03:03:09', 0, '', 1),
(9, 'Rian', '-', '', 0, 0, '2020-06-01 03:03:09', 0, '', 1),
(14, 'Andika', '-', '', 0, 0, '2020-06-01 03:03:09', 0, '', 1),
(15, 'Jonas', '-', '', 0, 0, '2020-06-01 03:03:09', 0, '', 1),
(16, 'Ratna', '-', '', 0, 0, '2020-06-01 03:03:09', 0, '', 1),
(17, 'ANI', 'JEMBER', '', 0, 0, '2020-06-01 03:03:09', 0, '', 1),
(18, 'Senyum Gelas', 'Jember Kota', '', 0, 0, '2020-06-01 03:03:09', 2, '', 1),
(20, 'Strakasia ', 'Nevada', '', 0, 0, '2020-06-01 03:03:09', 2, '', 1),
(22, 'Apotek baru', 'babarabu', '', 0, 0, '2020-06-01 03:03:09', 2, '', 1),
(23, 'APOTEK SEMESTA COKROAMINOTO', 'JALAN HOS COKROAMINOTO NO 8 JEMBER', '', 0, 0, '2020-06-01 03:03:09', 2, '', 1),
(24, 'abcd', 'jember', '123', 1, 1, '2020-06-01 03:03:09', 1, '', 1),
(25, 'siapa', 'jember', '123', 12, 1, '2020-06-01 03:05:01', 1, '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_penjual`
--

CREATE TABLE `master_penjual` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL DEFAULT '0',
  `nama_penjual` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nik` varchar(50) NOT NULL,
  `target` int(11) NOT NULL DEFAULT '0',
  `regional` int(11) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_penjual`
--

INSERT INTO `master_penjual` (`id`, `id_admin`, `nama_penjual`, `alamat`, `nik`, `target`, `regional`, `kontak`, `waktu_update`) VALUES
(1, 9, 'Supratno', 'Jember', '35203123100', 1000, 1, '08123121', '2020-03-19 12:06:16'),
(2, 8, 'paiji', 'jember', '123', 0, 1, '123123', '2020-05-14 15:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `master_regional`
--

CREATE TABLE `master_regional` (
  `id` int(11) NOT NULL,
  `nama_regional` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `status_regional` int(11) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_regional`
--

INSERT INTO `master_regional` (`id`, `nama_regional`, `lokasi`, `status_regional`, `waktu_update`) VALUES
(1, 'Mangli Residence', 'jember', 1, '2020-06-14 07:12:30'),
(3, 'Bumi Mangli Permai 5', 'mangli', 3, '2020-06-14 07:13:10'),
(4, 'Bumi Mangli Permai 4', 'mangli', 1, '2020-06-14 07:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `master_serah_terima`
--

CREATE TABLE `master_serah_terima` (
  `id_serah_terima` int(11) NOT NULL,
  `id_master_item` int(11) NOT NULL,
  `tgl_serah_terima` date NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `waktu_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_status_regional`
--

CREATE TABLE `master_status_regional` (
  `id_status_regional` int(11) NOT NULL,
  `nama_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_status_regional`
--

INSERT INTO `master_status_regional` (`id_status_regional`, `nama_status`) VALUES
(1, 'Dalam Ijin'),
(2, 'Luar Ijin'),
(3, 'Lokasi\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `master_status_tanah`
--

CREATE TABLE `master_status_tanah` (
  `id_status_tanah` int(11) NOT NULL,
  `nama_status_tanah` varchar(100) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_supplier`
--

CREATE TABLE `master_supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_supplier`
--

INSERT INTO `master_supplier` (`id`, `nama_supplier`, `alamat`, `telepon`, `id_regional`, `id_sales`, `waktu_update`) VALUES
(1, 'siapa', 'jember', '1', 1, 1, '2020-06-01 04:55:53'),
(3, 'PT Maju Sejahtera Senantiasa', '', '', 1, 1, '2020-06-01 04:51:54'),
(4, 'PT Pelangi Jaya Bersinar', '', '', 1, 1, '2020-06-01 04:51:57'),
(5, 'PT. Besar', 'disini', '08881231', 1, 1, '2020-06-01 04:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `controller` varchar(100) NOT NULL,
  `nama_function` varchar(100) NOT NULL,
  `aksi_edit` enum('0','1') NOT NULL DEFAULT '1',
  `aksi_hapus` enum('0','1') NOT NULL DEFAULT '1',
  `aksi_tambah` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id`, `label`, `controller`, `nama_function`, `aksi_edit`, `aksi_hapus`, `aksi_tambah`) VALUES
(1, 'Dashboard', 'dashboard', 'index', '1', '0', '1'),
(2, 'Master Data Beranda', 'master', 'index', '0', '0', '0'),
(3, 'Master Data Dokter', 'master', 'dokter', '1', '1', '1'),
(4, 'Master Data pembeli', 'master', 'pembeli', '1', '1', '1'),
(5, 'Master Data Supplier', 'master', 'supplier', '1', '1', '1'),
(6, 'Master Data Kategori Item', 'master', 'perumahan', '1', '1', '1'),
(7, 'Master Data Satuan Item', 'master', 'satuan', '1', '1', '1'),
(8, 'Master Data Merk', 'master', 'merk', '1', '1', '1'),
(9, 'Master Data Obat dan Alkes', 'master', 'items', '1', '1', '1'),
(10, 'Master Racikan', 'master', 'racikan', '1', '1', '1'),
(11, 'Pembelian Beranda', 'pembelian', 'index', '0', '0', '0'),
(12, 'Purchase Order', 'pembelian', 'po', '1', '1', '1'),
(13, 'Pembelian ke Supplier', 'pembelian', 'langsung', '1', '1', '1'),
(14, 'Penerimaan Barang', 'pembelian', 'penerimaan', '0', '1', '1'),
(15, 'Retur Pembelian', 'pembelian', 'retur', '1', '1', '1'),
(16, 'Stok Beranda', 'stok', 'index', '0', '0', '0'),
(17, 'Stok Keluar Retur Pembelian', 'stok', 'keluar', '0', '1', '1'),
(18, 'Stok Adjustment', 'stok', 'adjustment', '0', '1', '1'),
(19, 'Stok Opname', 'stok', 'opname', '0', '1', '1'),
(20, 'Cetak Barcode', 'stok', 'barcode', '0', '0', '0'),
(21, 'Kartu Stok', 'stok', 'kartustok', '1', '1', '1'),
(22, 'Penjualan Beranda', 'penjualan', 'index', '0', '0', '0'),
(23, 'Diskon Produk', 'penjualan', 'diskon', '0', '1', '1'),
(24, 'Jenis Pembayaran', 'penjualan', 'jenispembayaran', '1', '1', '1'),
(25, 'Kasir / Point Of Sales', 'penjualan', 'kasir', '0', '0', '0'),
(26, 'Keuangan Beranda', 'keuangan', 'index', '0', '0', '0'),
(27, 'Kode Rekening', 'keuangan', 'koderekening', '1', '1', '1'),
(28, 'Hutang', 'keuangan', 'hutang', '0', '1', '1'),
(29, 'Cash in Cash Out', 'keuangan', 'cashinout', '1', '1', '1'),
(30, 'Laporan Beranda', 'laporan', 'index', '0', '0', '0'),
(31, 'Laporan Purchase Order', 'laporan', 'po', '0', '0', '0'),
(32, 'Laporan Pembelian', 'laporan', 'pembelian', '0', '0', '0'),
(33, 'Laporan Penerimaan Barang', 'laporan', 'penerimaan', '0', '0', '0'),
(34, 'Laporan Stok', 'laporan', 'stok', '0', '0', '0'),
(35, 'Laporan Penjualan', 'laporan', 'penjualan', '0', '0', '0'),
(36, 'Laporan Keuangan', 'laporan', 'keuangan', '0', '0', '0'),
(37, 'User Beranda', 'user', 'index', '0', '0', '0'),
(38, 'Kategori User', 'user', 'kategori', '1', '1', '1'),
(39, 'Data User', 'user', 'user', '1', '1', '1'),
(40, 'Tools Beranda', 'tools', 'index', '0', '0', '0'),
(41, 'Profil Apotek', 'tools', 'profil', '1', '0', '0'),
(42, 'Import Produk', 'tools', 'import_item', '0', '0', '1'),
(43, 'Edit Password', 'password', 'index', '1', '0', '0'),
(44, 'SPG', 'master', 'spg', '0', '0', '0'),
(45, 'Laporan SPG', 'laporan', 'spg', '0', '0', '0'),
(46, 'Master Biaya Operasional', 'master', 'serah_terima', '1', '1', '1'),
(47, 'Stok Utility', 'stok', 'utility', '1', '0', '1'),
(48, 'Target', 'penjualan', 'target', '1', '0', '1'),
(49, 'Dashboard sales', 'dashboard_sales', 'index', '1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `isi` text,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `isi`, `waktu_update`) VALUES
(1, 'ashahahah', '2020-03-24 05:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `profil_apotek`
--

CREATE TABLE `profil_apotek` (
  `id` varchar(2) NOT NULL,
  `nama_apotek` varchar(300) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `no_npwp` varchar(20) NOT NULL,
  `nama_npwp` varchar(20) NOT NULL,
  `alamat_npwp` text NOT NULL,
  `bank` varchar(10) NOT NULL,
  `rekening` varchar(20) NOT NULL,
  `an` varchar(30) NOT NULL,
  `no_apoteker` varchar(20) NOT NULL,
  `tgl_masa` date NOT NULL,
  `apoteker` varchar(50) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `alamat_tinggal` text NOT NULL,
  `no_sipa` varchar(20) NOT NULL,
  `tgl_sipa` date NOT NULL,
  `nama_ttk` varchar(20) NOT NULL,
  `footer_struk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_apotek`
--

INSERT INTO `profil_apotek` (`id`, `nama_apotek`, `alamat`, `logo`, `telepon`, `hp`, `no_npwp`, `nama_npwp`, `alamat_npwp`, `bank`, `rekening`, `an`, `no_apoteker`, `tgl_masa`, `apoteker`, `alamat_ktp`, `alamat_tinggal`, `no_sipa`, `tgl_sipa`, `nama_ttk`, `footer_struk`) VALUES
('1', 'PT Argopuro', 'Jalan Manggis No 11 Jemberargopuro', '1591596570.png', '0811212121', '089999', 'FP.01.04/IV/0045-e/2', 'PT Airlangga Sentral', 'Kelurahan Kawangrejo Mumbulsari Jember', 'Mandiri', '01231111', 'PT Airlangga Sentral Internasi', '0123199121112', '2025-11-27', 'riza putri agustina, S.Farm.Apt', 'disana', 'disini', '100321923', '2028-11-30', 'Katakuri', 'Terimakasih telah berbelanja');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pembayaran`
--

CREATE TABLE `tabel_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `kode_item` int(11) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `total_bayar` varchar(100) NOT NULL,
  `waktu_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sertifikat_tanah`
--

CREATE TABLE `tbl_sertifikat_tanah` (
  `id_sertifikat_tanah` int(11) NOT NULL,
  `kode_sertifikat` varchar(10) NOT NULL,
  `nama_sertifikat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sertifikat_tanah`
--

INSERT INTO `tbl_sertifikat_tanah` (`id_sertifikat_tanah`, `kode_sertifikat`, `nama_sertifikat`) VALUES
(0, 'kosong', 'kosong'),
(1, 'SHM', 'Sertifikat Hak Milik'),
(2, 'SHSRS', 'Sertifikat Hak Satuan Rumah Susun'),
(3, 'SHGB', 'Sertifikat Hak Guna Bangunan'),
(4, 'Petok', 'Girik atau Petok'),
(5, 'AJB', 'Akta Jual Beli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_user`
--
ALTER TABLE `kategori_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_user` (`kategori_user`),
  ADD KEY `beranda` (`beranda`);

--
-- Indexes for table `kategori_user_modul`
--
ALTER TABLE `kategori_user_modul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_user` (`kategori_user`),
  ADD KEY `modul` (`modul`);

--
-- Indexes for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `master_distributor`
--
ALTER TABLE `master_distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_item`
--
ALTER TABLE `master_item`
  ADD PRIMARY KEY (`kode_item`);

--
-- Indexes for table `master_pembeli`
--
ALTER TABLE `master_pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_penjual`
--
ALTER TABLE `master_penjual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_regional`
--
ALTER TABLE `master_regional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_serah_terima`
--
ALTER TABLE `master_serah_terima`
  ADD PRIMARY KEY (`id_serah_terima`);

--
-- Indexes for table `master_status_regional`
--
ALTER TABLE `master_status_regional`
  ADD PRIMARY KEY (`id_status_regional`);

--
-- Indexes for table `master_supplier`
--
ALTER TABLE `master_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_apotek`
--
ALTER TABLE `profil_apotek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_pembayaran`
--
ALTER TABLE `tabel_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tbl_sertifikat_tanah`
--
ALTER TABLE `tbl_sertifikat_tanah`
  ADD PRIMARY KEY (`id_sertifikat_tanah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_user`
--
ALTER TABLE `kategori_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `kategori_user_modul`
--
ALTER TABLE `kategori_user_modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12094;
--
-- AUTO_INCREMENT for table `master_admin`
--
ALTER TABLE `master_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master_distributor`
--
ALTER TABLE `master_distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `master_item`
--
ALTER TABLE `master_item`
  MODIFY `kode_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_pembeli`
--
ALTER TABLE `master_pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `master_penjual`
--
ALTER TABLE `master_penjual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `master_regional`
--
ALTER TABLE `master_regional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `master_serah_terima`
--
ALTER TABLE `master_serah_terima`
  MODIFY `id_serah_terima` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_status_regional`
--
ALTER TABLE `master_status_regional`
  MODIFY `id_status_regional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_supplier`
--
ALTER TABLE `master_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabel_pembayaran`
--
ALTER TABLE `tabel_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sertifikat_tanah`
--
ALTER TABLE `tbl_sertifikat_tanah`
  MODIFY `id_sertifikat_tanah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori_user`
--
ALTER TABLE `kategori_user`
  ADD CONSTRAINT `kategori_user_ibfk_1` FOREIGN KEY (`beranda`) REFERENCES `modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kategori_user_modul`
--
ALTER TABLE `kategori_user_modul`
  ADD CONSTRAINT `kategori_user_modul_ibfk_1` FOREIGN KEY (`kategori_user`) REFERENCES `kategori_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategori_user_modul_ibfk_2` FOREIGN KEY (`modul`) REFERENCES `modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `master_admin`
--
ALTER TABLE `master_admin`
  ADD CONSTRAINT `master_admin_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori_user` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

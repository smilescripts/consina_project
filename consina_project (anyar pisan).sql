-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Nov 2015 pada 13.58
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `consina_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_aset`
--

CREATE TABLE IF NOT EXISTS `as_aset` (
  `kode_barang` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nm_barang` varchar(40) CHARACTER SET latin1 NOT NULL,
  `kode_golongan` varchar(3) CHARACTER SET latin1 NOT NULL,
  `sub_golongan` int(11) NOT NULL DEFAULT '0',
  `merk` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `tipe` varchar(35) CHARACTER SET latin1 DEFAULT NULL,
  `tahun` varchar(4) CHARACTER SET latin1 DEFAULT NULL,
  `volume` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_entry` date NOT NULL,
  `user_posting` varchar(10) CHARACTER SET latin1 NOT NULL,
  `total_unit` int(11) NOT NULL,
  `masa_servis` int(11) DEFAULT NULL,
  `poto` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_aset`
--

INSERT INTO `as_aset` (`kode_barang`, `nm_barang`, `kode_golongan`, `sub_golongan`, `merk`, `tipe`, `tahun`, `volume`, `tgl_entry`, `user_posting`, `total_unit`, `masa_servis`, `poto`) VALUES
('AST0010002', 'KURSI HIDROLIK ', '4', 25, 'FUTURE', 'HIDROLIK', '2012', NULL, '2012-08-25', 'ADMIN', 15, 0, ''),
('AST0010003', 'KOMPUTER I CORE', '3', 23, 'LENOVO', 'INTEL I CORE 5', '2012', NULL, '2012-08-25', 'ADMIN', 442, 6, ''),
('AST0010004', 'MESIN HITUNG UANG', '3', 22, 'KIMIKA', 'BESAR', '2007', '-', '2012-08-25', 'ADMIN', 6, 0, ''),
('AST0010005', 'AIR CONDITIONER ', '4', 28, 'SHARP', '2 PK', '2008', '-', '0000-00-00', 'admin', 1, 6, NULL),
('AST0010006', 'MOBIL OPERASONAL', '4', 28, 'TOYOTA ', 'KIJANG INOVA', '2010', '2000 CC', '2012-08-25', 'ADMIN', 3, 6, ''),
('AST0010008', 'Kursi Kantor', '3', 21, 'Olimpik2', '-', '2013', '', '2015-10-06', 'Admin', 36, 0, 'AST0008.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_cabang`
--

CREATE TABLE IF NOT EXISTS `as_cabang` (
  `kode_cabang` varchar(5) NOT NULL,
  `nm_cabang` varchar(35) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `propinsi` varchar(35) NOT NULL,
  `kabupaten` varchar(35) NOT NULL,
  `telepon` varchar(10) NOT NULL,
  `pincab` varchar(35) NOT NULL,
  `user_posting` varchar(11) DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_cabang`
--

INSERT INTO `as_cabang` (`kode_cabang`, `nm_cabang`, `alamat`, `propinsi`, `kabupaten`, `telepon`, `pincab`, `user_posting`, `tgl_posting`) VALUES
('CB001', 'PT. MAJU MUNDUR', 'JAKARTA', 'JAKARTA TIMUR', '-', '-', '-', NULL, '2013-10-24'),
('CB002', 'PT. AGUNG PEKANBARU', 'JLN DR SUTOMO NO . 13', 'RIAU ', 'PEKANBARU', '8889990', 'TONI PURNAMA', 'admin', '2011-12-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_cabangpusat`
--

CREATE TABLE IF NOT EXISTS `as_cabangpusat` (
  `kode_cabang` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_cabangpusat`
--

INSERT INTO `as_cabangpusat` (`kode_cabang`) VALUES
('800');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_golongan`
--

CREATE TABLE IF NOT EXISTS `as_golongan` (
  `kode_golongan` varchar(3) NOT NULL,
  `kode_harta` int(11) DEFAULT '0',
  `nm_golongan` varchar(30) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `persen_susut` double DEFAULT NULL,
  `masa_manfaat` int(11) DEFAULT NULL,
  `tgl_posting` date NOT NULL,
  `user_posting` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_golongan`
--

INSERT INTO `as_golongan` (`kode_golongan`, `kode_harta`, `nm_golongan`, `keterangan`, `persen_susut`, `masa_manfaat`, `tgl_posting`, `user_posting`) VALUES
('1', 2, 'BANGUNAN PERMANEN', 'BANGUNAN PERMANEN', 5, 20, '2012-08-24', 'admin'),
('2', 2, 'BANGUNAN TIDAK PERMANEN', 'BANGUNAN TIDAK PERMA', 10, 10, '2012-08-24', 'admin'),
('3', 1, 'GOLONGAN 1', 'INVENTARIS GOLONGAN ', 25, 4, '2012-08-24', 'admin'),
('4', 3, 'GOLONGAN 2', 'INVENTARIS GOLONGAN ', 14, 8, '2012-08-24', 'admin'),
('5', 3, 'Golongan 3', '-', 2, 10, '2013-10-22', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_harta_berwujud`
--

CREATE TABLE IF NOT EXISTS `as_harta_berwujud` (
  `kode_harta` varchar(4) NOT NULL,
  `nm_harta` varchar(25) DEFAULT NULL,
  `ket` varchar(50) DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL,
  `user_posting` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_harta_berwujud`
--

INSERT INTO `as_harta_berwujud` (`kode_harta`, `nm_harta`, `ket`, `tgl_posting`, `user_posting`) VALUES
('001', 'BUKAN BANGUNAN', '<p>ss1</p>\n', '2015-10-06', 'Admin'),
('002', 'BANGUNAN ', '-', '2010-05-16', 'UUS010713'),
('003', 'KAYU', 'Barang yang terbuat dari kayu', '2013-10-21', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_head_pengadaan`
--

CREATE TABLE IF NOT EXISTS `as_head_pengadaan` (
  `kode_pengadaan` varchar(18) NOT NULL,
  `tanggal_pengadaan` date NOT NULL,
  `user_posting` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `as_head_pengadaan`
--

INSERT INTO `as_head_pengadaan` (`kode_pengadaan`, `tanggal_pengadaan`, `user_posting`) VALUES
('BRS-001-0000000001', '2015-10-01', 'Admin'),
('BRS-001-0000000002', '2015-10-09', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_history_ubah`
--

CREATE TABLE IF NOT EXISTS `as_history_ubah` (
  `id_history` varchar(16) NOT NULL,
  `kode_inventarisasi` varchar(50) DEFAULT NULL,
  `status_before` int(2) DEFAULT NULL,
  `status_after` int(2) DEFAULT NULL,
  `tgl_ubah` date DEFAULT NULL,
  `keterangan_ubah` longtext,
  `user_ubah` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_history_ubah`
--

INSERT INTO `as_history_ubah` (`id_history`, `kode_inventarisasi`, `status_before`, `status_after`, `tgl_ubah`, `keterangan_ubah`, `user_ubah`) VALUES
('1', '820-AST0003-RNG001-1-000001', 0, 0, '2012-06-06', NULL, 'admin'),
('2', '800-AST0004-RNG001-1-000003', 0, 0, '2012-08-24', NULL, 'admin'),
('3', '800-AST0004-RNG001-1-000003', 0, 0, '2012-08-24', 'bbb', 'admin'),
('4', '800-AST0004-RNG001-1-000001', 0, 0, '2012-08-24', NULL, 'admin'),
('5', '800-AST0004-RNG001-1-000003', 0, 0, '2012-08-24', NULL, 'admin'),
('6', '800-AST0004-RNG001-1-000001', 0, 0, '2012-08-24', NULL, 'admin'),
('7', '800-AST0004-RNG001-1-000003', 0, 0, '2012-08-24', NULL, 'admin'),
('8', '800-AST0006-RNG005-3-0000003', 1, 0, '2013-11-03', '-', NULL),
('9', '800-AST0002-RNG001-1-0000002', 1, 3, '2013-11-03', NULL, NULL),
('PRB0010000000001', 'CB002-AST0010002-RNG002-UN002-0000000001', 0, 1, '2015-10-22', '', 'Admin'),
('PRB0010000000002', 'CB001-AST0010002-RNG001-UN001-0000000002', 0, 1, '2015-10-22', '', 'Admin');

--
-- Trigger `as_history_ubah`
--
DELIMITER //
CREATE TRIGGER `hapus history` AFTER DELETE ON `as_history_ubah`
 FOR EACH ROW BEGIN
	update as_inventarisasi set `status`= old.status_before where kode_inventarisasi=old.kode_inventarisasi ;
    END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `update_status_inv` AFTER INSERT ON `as_history_ubah`
 FOR EACH ROW BEGIN
	update as_inventarisasi set `status`= new.status_after where kode_inventarisasi=new.kode_inventarisasi ;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_inventarisasi`
--

CREATE TABLE IF NOT EXISTS `as_inventarisasi` (
  `kode_inventarisasi` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kode_barang` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `kode_cabang` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `kode_unit` varchar(5) DEFAULT NULL,
  `kode_ruangan` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `kondisi` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL,
  `user_posting` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_inventarisasi`
--

INSERT INTO `as_inventarisasi` (`kode_inventarisasi`, `kode_barang`, `kode_cabang`, `kode_unit`, `kode_ruangan`, `jumlah`, `kondisi`, `tgl_posting`, `user_posting`, `status`) VALUES
('CB001-AST0010002-RNG001-UN001-0000000001', 'AST0010002', 'CB001', 'UN001', 'RNG001', 1, NULL, '2013-10-06', 'admin', '0'),
('CB001-AST0010002-RNG001-UN001-0000000002', 'AST0010002', 'CB001', 'UN001', 'RNG001', 1, '', '2015-10-22', 'Admin', '1'),
('CB001-AST0010002-RNG001-UN001-0000000003', 'AST0010002', 'CB001', 'UN001', 'RNG001', 1, '', '2015-10-22', 'Admin', '0'),
('CB001-AST0010002-RNG001-UN001-0000000005', 'AST0010002', 'CB001', 'UN001', 'RNG001', 1, '', '2015-10-22', 'Admin', '0'),
('CB001-AST0010002-RNG001-UN001-0000000006', 'AST0010002', 'CB001', 'UN001', 'RNG001', 1, '', '2015-10-22', 'Admin', '0'),
('CB001-AST0010003-RNG002-UN001-0000000001', 'AST0010003', 'CB001', 'UN001', 'RNG002', 1, '', '2015-10-22', 'Admin', '0'),
('CB002-AST0010002-RNG002-UN002-0000000001', 'AST0010002', 'CB002', 'UN002', 'RNG002', 1, '', '2015-10-22', 'Admin', '1'),
('CB002-AST0010003-RNG003-UN002-0000000001', 'AST0010003', 'CB002', 'UN002', 'RNG003', 1, '', '2015-10-22', 'Admin', '0');

--
-- Trigger `as_inventarisasi`
--
DELIMITER //
CREATE TRIGGER `kembalistok` AFTER DELETE ON `as_inventarisasi`
 FOR EACH ROW BEGIN
     update as_aset set total_unit= (total_unit + old.jumlah ) where (kode_barang=old.kode_barang)  ;
    END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `kurangstokaset` AFTER INSERT ON `as_inventarisasi`
 FOR EACH ROW BEGIN
	update as_aset set total_unit= (total_unit - new.jumlah) where kode_barang= new.kode_barang ;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_maintenance`
--

CREATE TABLE IF NOT EXISTS `as_maintenance` (
  `id_pemeliharaan` varchar(16) NOT NULL,
  `kode_inventarisasi` varchar(50) DEFAULT NULL,
  `tgl_servis` date DEFAULT NULL,
  `tgl_servis_berikutnya` date DEFAULT NULL,
  `tempat_servis` varchar(40) DEFAULT NULL,
  `keluhan` varchar(80) DEFAULT NULL,
  `keterangan_pem` varchar(80) DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL,
  `user_posting` varchar(50) DEFAULT NULL,
  `biaya_servis` int(11) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_maintenance`
--

INSERT INTO `as_maintenance` (`id_pemeliharaan`, `kode_inventarisasi`, `tgl_servis`, `tgl_servis_berikutnya`, `tempat_servis`, `keluhan`, `keterangan_pem`, `tgl_posting`, `user_posting`, `biaya_servis`, `flag`) VALUES
('1', '800-AST0003-RNG001-1-000001', '2012-08-25', '2013-02-25', '-', '-', 'INVENTARISASI', '2012-08-25', 'admin', 0, 0),
('11', '800-AST0006-RNG005-3-0000003', '2013-11-03', '2014-05-03', 'palu', '-', '-', '2013-11-03', NULL, 200, NULL),
('2', '800-AST0003-RNG002-2-000001', '2012-08-25', '2013-02-25', '-', '-', 'INVENTARISASI', '2012-08-25', 'admin', 0, 1),
('3', '800-AST0001-RNG001-1-000001', '2012-08-25', '2012-08-25', '-', '-', 'INVENTARISASI', '2012-08-25', 'admin', 0, 0),
('4', '800-AST0002-RNG001-1-000001', '2012-08-25', '2012-08-25', '-', '-', 'INVENTARISASI', '2012-08-25', 'admin', 0, 0),
('5', '800-AST0002-RNG003-3-000001', '2012-08-25', '2012-08-25', '-', '-', 'INVENTARISASI', '2012-08-25', 'admin', 0, 0),
('6', '800-AST0005-RNG002-2-000001', '2012-08-25', '2013-02-25', '-', '-', 'INVENTARISASI', '2012-08-25', 'admin', 0, 1),
('7', '800-AST0005-RNG002-2-000001', '2012-08-25', '2013-02-25', 'LG CENTER', 'KURANG DINGIN', '-', '2012-08-25', 'admin', 50000, 0),
('8', '800-AST0003-RNG002-2-000001', '2012-08-25', '2013-02-25', 'BAGIAN IT KANTOR', 'MATI TOTAL', 'MB USAK , SO BELI BARI', '2012-08-25', 'admin', 300000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_mutasi`
--

CREATE TABLE IF NOT EXISTS `as_mutasi` (
  `id_mutasi` varchar(16) CHARACTER SET latin1 NOT NULL,
  `tgl_mutasi` date DEFAULT NULL,
  `kode_cabang_lama` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `kode_cabang_baru` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `kode_inventarisasi` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `kode_inventarisasi_baru` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `kode_aset` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `ruang_lama` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `ruang_baru` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `unit_lama` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `unit_baru` varchar(5) CHARACTER SET latin1 DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `user_posting` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `keterangan` text CHARACTER SET latin1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_mutasi`
--

INSERT INTO `as_mutasi` (`id_mutasi`, `tgl_mutasi`, `kode_cabang_lama`, `kode_cabang_baru`, `kode_inventarisasi`, `kode_inventarisasi_baru`, `kode_aset`, `ruang_lama`, `ruang_baru`, `unit_lama`, `unit_baru`, `jumlah`, `user_posting`, `keterangan`) VALUES
('MTS0010000000001', '2015-10-22', 'CB001', 'CB002', 'CB001-AST0010002-RNG001-UN001-0000000004', 'CB002-AST0010002-RNG002-UN002-0000000001', 'AST0010002', 'RNG001', 'RNG002', 'UN001', 'UN002', 1, 'Admin', ''),
('MTS0010000000002', '2015-10-22', 'CB002', 'CB001', 'CB002-AST0010003-RNG003-UN002-0000000002', 'CB001-AST0010003-RNG002-UN001-0000000001', 'AST0010003', 'RNG003', 'RNG002', 'UN002', 'UN001', 1, 'Admin', '');

--
-- Trigger `as_mutasi`
--
DELIMITER //
CREATE TRIGGER `mutashapus` AFTER DELETE ON `as_mutasi`
 FOR EACH ROW BEGIN
     
     delete from as_inventarisasi where kode_inventarisasi=old.kode_inventarisasi_baru;
     END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `mutasi` AFTER INSERT ON `as_mutasi`
 FOR EACH ROW BEGIN
  update 
    as_inventarisasi 
  set
    kode_unit = new.unit_baru,
    kode_ruangan = new.ruang_baru,
    kode_cabang = new.kode_cabang_baru,
    `kode_inventarisasi` = new.kode_inventarisasi_baru
   where kode_inventarisasi=new.kode_inventarisasi;
  END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_pengadaan`
--

CREATE TABLE IF NOT EXISTS `as_pengadaan` (
  `kode_pengadaan` varchar(18) NOT NULL,
  `kode_barang` varchar(12) NOT NULL,
  `kode_cabang` varchar(3) NOT NULL,
  `kode_suplier` varchar(5) NOT NULL,
  `no_polisi` varchar(25) DEFAULT NULL,
  `no_bpkb` varchar(15) DEFAULT NULL,
  `no_sertifikat` varchar(60) DEFAULT NULL,
  `no_faktur` varchar(15) NOT NULL,
  `tgl_beli` date NOT NULL,
  `harga_beli` decimal(18,0) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sisa_jumlah` int(11) DEFAULT NULL,
  `user_posting` varchar(11) NOT NULL,
  `luas` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `as_pengadaan`
--
DELIMITER //
CREATE TRIGGER `kembali_jumlahaset` AFTER DELETE ON `as_pengadaan`
 FOR EACH ROW BEGIN
	update as_aset set total_unit= (total_unit - old.jumlah) where kode_barang= old.kode_barang ;
    END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `tambah_aset` AFTER INSERT ON `as_pengadaan`
 FOR EACH ROW BEGIN
     update as_aset set total_unit= (total_unit + new.jumlah ) where (kode_barang=new.kode_barang)  ;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_penyusutan`
--

CREATE TABLE IF NOT EXISTS `as_penyusutan` (
  `kode_barang` varchar(12) NOT NULL,
  `tgl_pengadaan` datetime NOT NULL,
  `kode_cabang` varchar(3) DEFAULT NULL,
  `jumlah_unit` decimal(18,0) DEFAULT NULL,
  `nilai_buku` decimal(18,0) DEFAULT NULL,
  `1` double DEFAULT NULL,
  `2` double DEFAULT NULL,
  `3` double DEFAULT NULL,
  `4` double DEFAULT NULL,
  `5` double DEFAULT NULL,
  `6` double DEFAULT NULL,
  `7` double DEFAULT NULL,
  `8` double DEFAULT NULL,
  `9` double DEFAULT NULL,
  `10` double DEFAULT NULL,
  `11` double DEFAULT NULL,
  `12` double DEFAULT NULL,
  `tahun_buku` decimal(18,0) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `kode_pengadaan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_penyusutan`
--

INSERT INTO `as_penyusutan` (`kode_barang`, `tgl_pengadaan`, `kode_cabang`, `jumlah_unit`, `nilai_buku`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `tahun_buku`, `status`, `kode_pengadaan`) VALUES
('AST0003', '2012-08-25 00:00:00', '800', '2', '9000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2012', '1', 'BRS-800-0000000001'),
('AST0003', '2012-08-25 00:00:00', '800', '2', '9000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013', '1', 'BRS-800-0000000001'),
('AST0003', '2012-08-25 00:00:00', '800', '2', '9000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014', '1', 'BRS-800-0000000001'),
('AST0003', '2012-08-25 00:00:00', '800', '2', '9000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015', '1', 'BRS-800-0000000001'),
('AST0003', '2012-08-25 00:00:00', '800', '2', '9000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016', '1', 'BRS-800-0000000001'),
('AST0001', '2012-08-25 00:00:00', '800', '1', '2000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2012', '1', 'BRS-800-0000000002'),
('AST0001', '2012-08-25 00:00:00', '800', '1', '2000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013', '1', 'BRS-800-0000000002'),
('AST0001', '2012-08-25 00:00:00', '800', '1', '2000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014', '1', 'BRS-800-0000000002'),
('AST0001', '2012-08-25 00:00:00', '800', '1', '2000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015', '1', 'BRS-800-0000000002'),
('AST0001', '2012-08-25 00:00:00', '800', '1', '2000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016', '1', 'BRS-800-0000000002'),
('AST0002', '2012-08-25 00:00:00', '800', '2', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2012', '1', 'BRS-800-0000000002'),
('AST0002', '2012-08-25 00:00:00', '800', '2', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013', '1', 'BRS-800-0000000002'),
('AST0002', '2012-08-25 00:00:00', '800', '2', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014', '1', 'BRS-800-0000000002'),
('AST0002', '2012-08-25 00:00:00', '800', '2', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015', '1', 'BRS-800-0000000002'),
('AST0002', '2012-08-25 00:00:00', '800', '2', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016', '1', 'BRS-800-0000000002'),
('AST0002', '2012-08-25 00:00:00', '800', '2', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017', '1', 'BRS-800-0000000002'),
('AST0002', '2012-08-25 00:00:00', '800', '2', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018', '1', 'BRS-800-0000000002'),
('AST0002', '2012-08-25 00:00:00', '800', '2', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019', '1', 'BRS-800-0000000002'),
('AST0002', '2012-08-25 00:00:00', '800', '2', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2020', '1', 'BRS-800-0000000002'),
('AST0005', '2012-08-25 00:00:00', '800', '1', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2012', '1', 'BRS-800-0000000003'),
('AST0005', '2012-08-25 00:00:00', '800', '1', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2013', '1', 'BRS-800-0000000003'),
('AST0005', '2012-08-25 00:00:00', '800', '1', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2014', '1', 'BRS-800-0000000003'),
('AST0005', '2012-08-25 00:00:00', '800', '1', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015', '1', 'BRS-800-0000000003'),
('AST0005', '2012-08-25 00:00:00', '800', '1', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016', '1', 'BRS-800-0000000003'),
('AST0005', '2012-08-25 00:00:00', '800', '1', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2017', '1', 'BRS-800-0000000003'),
('AST0005', '2012-08-25 00:00:00', '800', '1', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2018', '1', 'BRS-800-0000000003'),
('AST0005', '2012-08-25 00:00:00', '800', '1', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2019', '1', 'BRS-800-0000000003'),
('AST0005', '2012-08-25 00:00:00', '800', '1', '4000000', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2020', '1', 'BRS-800-0000000003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_pertumbuhan`
--

CREATE TABLE IF NOT EXISTS `as_pertumbuhan` (
  `kode_barang` varchar(12) DEFAULT NULL,
  `kode_cabang` varchar(3) DEFAULT NULL,
  `tgl_pengadaan` datetime DEFAULT NULL,
  `jum_awal` decimal(18,0) DEFAULT NULL,
  `nilai_awal` double DEFAULT NULL,
  `jum_kurang` decimal(10,0) DEFAULT NULL,
  `nilai_kurang` double DEFAULT NULL,
  `jum_tambah` decimal(18,0) DEFAULT NULL,
  `nilai_tambah` double DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_pertumbuhan`
--

INSERT INTO `as_pertumbuhan` (`kode_barang`, `kode_cabang`, `tgl_pengadaan`, `jum_awal`, `nilai_awal`, `jum_kurang`, `nilai_kurang`, `jum_tambah`, `nilai_tambah`, `status`) VALUES
('AST0003', '800', '2012-08-25 00:00:00', '2', 9000000, '0', 0, '0', 0, '1'),
('AST0001', '800', '2012-08-25 00:00:00', '1', 2000000, '0', 0, '0', 0, '1'),
('AST0002', '800', '2012-08-25 00:00:00', '2', 4000000, '0', 0, '0', 0, '1'),
('AST0005', '800', '2012-08-25 00:00:00', '1', 4000000, '0', 0, '0', 0, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_ruangan`
--

CREATE TABLE IF NOT EXISTS `as_ruangan` (
  `kode_ruangan` varchar(6) NOT NULL,
  `nm_ruangan` varchar(30) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `user_posting` varchar(11) DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_ruangan`
--

INSERT INTO `as_ruangan` (`kode_ruangan`, `nm_ruangan`, `keterangan`, `user_posting`, `tgl_posting`) VALUES
('RNG001', 'PELAYANAN NASABAH', 'PELNAS', 'ADMIN', '2012-08-25'),
('RNG002', 'BACK OFFICE', 'RUANG KERJA BAC', 'ADMIN', '2012-08-25'),
('RNG003', 'PEMIMPIN CABANG', 'RUANG PINCAB', 'ADMIN', '2012-08-25'),
('RNG004', 'MUSHOLA', 'RUANG MUSHOLA K', 'ADMIN', '2012-08-25'),
('RNG005', 'OUTDOOR', 'KENDERAAN', 'ADMIN', '2012-08-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_status`
--

CREATE TABLE IF NOT EXISTS `as_status` (
  `status` int(11) NOT NULL DEFAULT '0',
  `nm_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_status`
--

INSERT INTO `as_status` (`status`, `nm_status`) VALUES
(0, 'Baik'),
(1, 'Rusak'),
(3, 'Jual'),
(4, 'Hilang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_subgolongan`
--

CREATE TABLE IF NOT EXISTS `as_subgolongan` (
  `sub_golongan` varchar(4) NOT NULL,
  `kode_golongan` varchar(3) NOT NULL,
  `nm_subgolongan` varchar(50) NOT NULL,
  `tgl_posting` date NOT NULL,
  `user_posting` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_subgolongan`
--

INSERT INTO `as_subgolongan` (`sub_golongan`, `kode_golongan`, `nm_subgolongan`, `tgl_posting`, `user_posting`) VALUES
('20', '6', 'MESIN KANTOR', '2012-08-10', 'admin'),
('21', '3', 'PERABOTAN KANTOR GOLONGAN 1', '2015-10-06', 'Admin'),
('22', '3', 'MESIN KANTOR GOLONGAN 1', '2012-08-25', 'admin'),
('23', '3', 'KOMPUTER', '2012-08-25', 'admin'),
('24', '3', 'KENDERAAN RODA DUA', '2012-08-25', 'admin'),
('25', '4', 'PERABOTAN KANTOR GOLONGAN 2', '2012-08-25', 'admin'),
('26', '4', 'MESIN KANTOR GOLONGAN 2', '2012-08-25', 'admin'),
('27', '1', 'GEDUNG KANTOR', '2012-08-25', 'ADMIN'),
('28', '5', 'KENDERAAN RODA EMPAT', '2012-08-25', 'ADMIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_suplier`
--

CREATE TABLE IF NOT EXISTS `as_suplier` (
  `kode_suplier` varchar(8) NOT NULL,
  `nm_suplier` varchar(60) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `kota` varchar(35) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_suplier`
--

INSERT INTO `as_suplier` (`kode_suplier`, `nm_suplier`, `alamat`, `kota`, `telepon`) VALUES
('SP002', 'PLAZA MEBEL', 'DUMAI', 'DUMAI', '07685646'),
('SP003', 'SARANA TEKNISI', 'JL.HANGTUAH IV NO.38 B', 'PEKANBARU', '909090'),
('SP004', 'BATAM JAYA ELEKTRONIK', 'JL.TUANKU TAMBUSAI', 'PEKANBARU', '345678'),
('SP005', 'PT ANGKASA PURA1', '<p>Jln. Ahmad Yani NO. 30</p>\n', 'PALEMBANG', '071100788');

-- --------------------------------------------------------

--
-- Struktur dari tabel `as_unit_kerja`
--

CREATE TABLE IF NOT EXISTS `as_unit_kerja` (
  `kode_unit` varchar(5) NOT NULL DEFAULT '0',
  `nm_unit` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `user_posting` varchar(11) DEFAULT NULL,
  `tgl_posting` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `as_unit_kerja`
--

INSERT INTO `as_unit_kerja` (`kode_unit`, `nm_unit`, `keterangan`, `user_posting`, `tgl_posting`) VALUES
('UN001', 'PELAYANAN NASABAH', '<p>PELNAS1</p>\n', 'Admin', '2015-10-06'),
('UN002', 'BACK OFFICE', '', 'ADMIN', '2012-08-25'),
('UN003', 'MANAJER', '-', 'ADMIN', '2012-08-25'),
('UN004', 'OPERASIONAL', 'OPERASIONAL', NULL, '2012-08-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE IF NOT EXISTS `bahan` (
  `ID_BAHAN` varchar(30) NOT NULL,
  `NAMA_BAHAN` varchar(100) NOT NULL,
  `SATUAN` varchar(100) NOT NULL,
  `STOCK` int(100) NOT NULL,
  `STOCK_BAYANGAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`ID_BAHAN`, `NAMA_BAHAN`, `SATUAN`, `STOCK`, `STOCK_BAYANGAN`) VALUES
('BHN-00001', 'BENANG', 'ROL', 410, 410),
('BHN-00002', 'KANCING', 'Lusin', 410, 410),
('BHN-00003', 'KAIN', 'ROLL', 340, 340);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_outlet`
--

CREATE TABLE IF NOT EXISTS `barang_outlet` (
  `KODE_BARANG` varchar(100) NOT NULL,
  `BARCODE` varchar(100) DEFAULT NULL,
  `NAMA_BARANG` varchar(100) NOT NULL,
  `KETERANGAN` text,
  `HARGA_MODAL` int(11) NOT NULL,
  `HARGA_JUAL` int(11) NOT NULL,
  `STOK` int(11) NOT NULL,
  `ID_KATEGORI` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `ID_SATUAN` int(11) NOT NULL,
  `OUTLET` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_outlet`
--

INSERT INTO `barang_outlet` (`KODE_BARANG`, `BARCODE`, `NAMA_BARANG`, `KETERANGAN`, `HARGA_MODAL`, `HARGA_JUAL`, `STOK`, `ID_KATEGORI`, `DISKON`, `ID_SATUAN`, `OUTLET`) VALUES
('CSI.116.002.009', '51600209', 'TREKING FUTURA-BK-38', 'KET', 950000, 950000, 0, 5, 0, 1, 1),
('CSI.116.002.010', '51600210', 'TREKING FUTURA-BK-39', 'KET', 950000, 950000, 0, 5, 0, 1, 1),
('CSI.116.002.013', '51600213', 'TREKING FUTURA-BK-42', 'KET', 950000, 950000, 0, 5, 0, 1, 1),
('CSI.116.002.014', '51600214', 'TREKING FUTURA-BK-43', 'KET', 950000, 950000, 0, 5, 0, 1, 1),
('CSI.116.002.015', '51600215', 'TREKING FUTURA-BK-44', 'KET', 950000, 950000, 0, 5, 0, 1, 1),
('CSI.116.001.001', '51600101', 'TREKKING EXPLORER-38', 'KET', 1700000, 1700000, 0, 5, 0, 1, 1),
('CSI.116.001.002', '51600102', 'TREKKING EXPLORER-39', 'KET', 1700000, 1700000, 0, 5, 0, 1, 1),
('CSI.116.001.003', '51600103', 'TREKKING EXPLORER-40', 'KET', 1700000, 1700000, 0, 5, 0, 1, 1),
('CSI.116.001.004', '51600104', 'TREKKING EXPLORER-41', 'KET', 1700000, 1700000, 0, 5, 0, 1, 1),
('CSI.116.001.005', '51600105', 'TREKKING EXPLORER-42', 'KET', 1700000, 1700000, 0, 5, 0, 1, 1),
('CSI.116.001.006', '51600106', 'TREKKING EXPLORER-43', 'KET', 1700000, 1700000, 1, 5, 0, 1, 1),
('CSI.116.001.007', '51600107', 'TREKKING EXPLORER-44', 'KET', 1700000, 1700000, 1, 5, 0, 1, 1),
('CSI.116.002.001', '51600201', 'TREKING FUTURA-GY-38', 'KET', 950000, 950000, 2, 5, 0, 1, 1),
('CSI.116.002.002', '51600202', 'TREKING FUTURA-GY-39', 'KET', 950000, 950000, 0, 5, 0, 1, 1),
('CSI.116.002.003', '51600203', 'TREKING FUTURA-GY-40', 'KET', 950000, 950000, 2, 5, 0, 1, 1),
('CSI.116.002.004', '51600204', 'TREKING FUTURA-GY-41', 'KET', 950000, 950000, 1, 5, 0, 1, 1),
('CSI.116.002.005', '51600205', 'TREKING FUTURA-GY-42', 'KET', 950000, 950000, 1, 5, 0, 1, 1),
('CSI.116.002.006', '51600206', 'TREKING FUTURA-GY-43', 'KET', 950000, 950000, 1, 5, 0, 1, 1),
('CSI.116.002.007', '51600207', 'TREKING FUTURA-GY-44', 'KET', 950000, 950000, 0, 5, 0, 1, 1),
('CSI.116.002.008', '51600208', 'TREKING FUTURA-GY-45', 'KET', 950000, 950000, 0, 5, 0, 1, 1),
('CSI.116.003.001', '51600301', 'TREKKING TRANGO-38', 'KET', 1300000, 1300000, 0, 5, 0, 1, 1),
('CSI.116.003.002', '51600302', 'TREKKING TRANGO-39', 'KET', 1300000, 1300000, 2, 5, 0, 1, 1),
('CSI.116.003.003', '51600303', 'TREKKING TRANGO-40', 'KET', 1300000, 1300000, 2, 5, 0, 1, 1),
('CSI.116.003.004', '51600304', 'TREKKING TRANGO-41', 'KET', 1300000, 1300000, 1, 5, 0, 1, 1),
('CSI.116.003.005', '51600305', 'TREKKING TRANGO-42', 'KET', 1300000, 1300000, 0, 5, 0, 1, 1),
('CSI.116.003.006', '51600306', 'TREKKING TRANGO-43', 'KET', 1300000, 1300000, 2, 5, 0, 1, 1),
('CSI.116.003.007', '51600307', 'TREKKING TRANGO-44', 'KET', 1300000, 1300000, 2, 5, 0, 1, 1),
('CSI.116.003.008', '51600308', 'TREKKING TRANGO-45', 'KET', 1300000, 1300000, 0, 5, 0, 1, 1),
('BAG.003.033.002', '30303302', 'Car. Extraterres-BL', 'KET', 475000, 475000, 14, 3, 0, 1, 1),
('BAG.003.033.001', '30303301', 'Car. Extraterres-GR', 'KET', 475000, 475000, 5, 3, 0, 1, 1),
('ACF.010.002.001', '11000201-2', 'Jepit Tundra BK-38', 'KET', 90000, 90000, 0, 1, 0, 1, 1),
('ACF.010.002.002', '11000202-2', 'Jepit Tundra BK-39', 'KET', 90000, 90000, 0, 1, 0, 1, 1),
('ACF.010.002.003', '11000203-2', 'Jepit Tundra BK-40', 'KET', 90000, 90000, 27, 1, 0, 1, 1),
('ACF.010.002.004', '11000204-2', 'Jepit Tundra BK-41', 'KET', 90000, 90000, 28, 1, 0, 1, 1),
('ACF.010.002.005', '11000205-2', 'Jepit Tundra BK-42', 'KET', 90000, 90000, 3, 1, 0, 1, 1),
('ACF.010.002.006', '11000206-2', 'Jepit Tundra BK-43', 'KET', 90000, 90000, 26, 1, 0, 1, 1),
('ACF.010.047.005', '11004705', 'Yosemit Valley-GR-42', 'KET', 180000, 180000, 1, 1, 0, 1, 1),
('ACF.010.047.002', '11004702', 'Yosemit Valley-GR-39', 'KET', 180000, 180000, 2, 1, 0, 1, 1),
('ACF.010.047.003', '11004703', 'Yosemit Valley-GR-40', 'KET', 180000, 180000, 1, 1, 0, 1, 1),
('ACF.010.047.010', '11004710', 'Yosemit Valley-RD-41', 'KET', 180000, 180000, 6, 1, 0, 1, 1),
('ACF.010.047.011', '11004711', 'Yosemit Valley-RD-42', 'KET', 180000, 180000, 9, 1, 0, 1, 1),
('ACF.010.047.006', '11004706', 'Yosemit Valley-GR-43', 'KET', 180000, 180000, 7, 1, 0, 1, 1),
('ACF.010.040.022', '11004022', 'SM. Adventure-RD-41', 'KET', 195000, 195000, 1, 1, 0, 1, 1),
('CSI.045.001.001', '54500101', 'CSN-HEFF', 'KET', 65000, 65000, 47, 5, 0, 1, 1),
('ACF.018.002.001', '11800201', 'KAOS KAKI CONSINA 02', 'KET', 65000, 65000, 17, 1, 0, 1, 1),
('ACT.007.004.002', '20700402-1', 'Cover 40-OR', 'KET', 60000, 60000, 5, 1, 0, 1, 1),
('ACF.008.007.001', '8007001-2', 'SRT. Polar 01-RD', 'KET', 65000, 65000, 0, 1, 0, 1, 1),
('CSI.129.001.001', '52900101', 'SRT. Iron Clad', 'KET', 185000, 185000, 2, 5, 0, 1, 1),
('CSI.126.001.001', '52600101', 'SRT. Mont Bell 01', 'KET', 95000, 95000, 8, 5, 0, 1, 1),
('CSI.126.002.001', '52600201', 'SRT. Mont Bell 02', 'KET', 185000, 185000, 2, 5, 0, 1, 1),
('ACF.016.001.001', '11600101-1', 'Manset-BK-M', 'KET', 55000, 55000, 4, 1, 0, 1, 1),
('ACF.016.001.002', '11600102-1', 'Manset-BK-L', 'KET', 55000, 55000, 1, 1, 0, 1, 1),
('ACF.016.001.012', '11600112-1', 'Manset-RD-M', 'KET', 55000, 55000, 2, 1, 0, 1, 1),
('ACF.016.001.010', '11600110-1', 'Manset-RD-S', 'KET', 55000, 55000, 5, 1, 0, 1, 1),
('ACF.016.001.009', '11600109-1', 'Manset-BL-S', 'KET', 55000, 55000, 10, 1, 0, 1, 1),
('8998127514123', '8998127514123', 'Dunhill Mild ', '', 15000, 19000, 97, 4, 0, 1, 5),
('8992304015298', '8992304015298', 'Garnier Men Red', '', 19000, 22000, 143, 4, 0, 1, 5),
('8886008101053', '8886008101053', 'Mineral Aqua ', '', 2500, 7500, 225, 4, 10, 1, 2),
('8992761141059', '8992761141059', 'Fresh Tea 800Ml', '', 4500, 5400, 498, 4, 10, 1, 2),
('8991002103238', '8991002103238', 'Good day capucino', '', 1500, 7500, 80, 4, 4, 1, 5),
('6948375900423', '6948375900423', 'Laser Barcode scanner', '', 450000, 550000, 248, 4, 10, 1, 5),
('8992806851899', '8992806851899', 'NEXCARE', '', 2500, 55000, 89, 4, 10, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_pusat`
--

CREATE TABLE IF NOT EXISTS `barang_pusat` (
`ID_BARANG` int(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `BARCODE` varchar(100) DEFAULT NULL,
  `NAMA_BARANG` varchar(100) NOT NULL,
  `KETERANGAN` text,
  `HARGA_MODAL` int(11) NOT NULL,
  `HARGA_JUAL` int(11) NOT NULL,
  `STOK` int(11) NOT NULL,
  `ID_KATEGORI` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `ID_SATUAN` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16302 ;

--
-- Dumping data untuk tabel `barang_pusat`
--

INSERT INTO `barang_pusat` (`ID_BARANG`, `KODE_BARANG`, `BARCODE`, `NAMA_BARANG`, `KETERANGAN`, `HARGA_MODAL`, `HARGA_JUAL`, `STOK`, `ID_KATEGORI`, `DISKON`, `ID_SATUAN`) VALUES
(16245, 'CSI.116.002.009', '51600209', 'TREKING FUTURA-BK-38', 'KET', 950000, 950000, 1, 5, 0, 1),
(16246, 'CSI.116.002.010', '51600210', 'TREKING FUTURA-BK-39', 'KET', 950000, 950000, 2, 5, 0, 1),
(16247, 'CSI.116.002.013', '51600213', 'TREKING FUTURA-BK-42', 'KET', 950000, 950000, 2, 5, 0, 1),
(16248, 'CSI.116.002.014', '51600214', 'TREKING FUTURA-BK-43', 'KET', 950000, 950000, 1, 5, 0, 1),
(16249, 'CSI.116.002.015', '51600215', 'TREKING FUTURA-BK-44', 'KET', 950000, 950000, 2, 5, 0, 1),
(16250, 'CSI.116.001.001', '51600101', 'TREKKING EXPLORER-38', 'KET', 1700000, 1700000, 1, 5, 0, 1),
(16251, 'CSI.116.001.002', '51600102', 'TREKKING EXPLORER-39', 'KET', 1700000, 1700000, 1, 5, 0, 1),
(16252, 'CSI.116.001.003', '51600103', 'TREKKING EXPLORER-40', 'KET', 1700000, 1700000, 1, 5, 0, 1),
(16253, 'CSI.116.001.004', '51600104', 'TREKKING EXPLORER-41', 'KET', 1700000, 1700000, 0, 5, 0, 1),
(16254, 'CSI.116.001.005', '51600105', 'TREKKING EXPLORER-42', 'KET', 1700000, 1700000, 2, 5, 0, 1),
(16255, 'CSI.116.001.006', '51600106', 'TREKKING EXPLORER-43', 'KET', 1700000, 1700000, 1, 5, 0, 1),
(16256, 'CSI.116.001.007', '51600107', 'TREKKING EXPLORER-44', 'KET', 1700000, 1700000, 1, 5, 0, 1),
(16257, 'CSI.116.002.001', '51600201', 'TREKING FUTURA-GY-38', 'KET', 950000, 950000, 2, 5, 0, 1),
(16258, 'CSI.116.002.002', '51600202', 'TREKING FUTURA-GY-39', 'KET', 950000, 950000, 0, 5, 0, 1),
(16259, 'CSI.116.002.003', '51600203', 'TREKING FUTURA-GY-40', 'KET', 950000, 950000, 3, 5, 0, 1),
(16260, 'CSI.116.002.004', '51600204', 'TREKING FUTURA-GY-41', 'KET', 950000, 950000, 1, 5, 0, 1),
(16261, 'CSI.116.002.005', '51600205', 'TREKING FUTURA-GY-42', 'KET', 950000, 950000, 1, 5, 0, 1),
(16262, 'CSI.116.002.006', '51600206', 'TREKING FUTURA-GY-43', 'KET', 950000, 950000, 2, 5, 0, 1),
(16263, 'CSI.116.002.007', '51600207', 'TREKING FUTURA-GY-44', 'KET', 950000, 950000, 1, 5, 0, 1),
(16264, 'CSI.116.002.008', '51600208', 'TREKING FUTURA-GY-45', 'KET', 950000, 950000, 0, 5, 0, 1),
(16265, 'CSI.116.003.001', '51600301', 'TREKKING TRANGO-38', 'KET', 1300000, 1300000, 0, 5, 0, 1),
(16266, 'CSI.116.003.002', '51600302', 'TREKKING TRANGO-39', 'KET', 1300000, 1300000, 2, 5, 0, 1),
(16267, 'CSI.116.003.003', '51600303', 'TREKKING TRANGO-40', 'KET', 1300000, 1300000, 2, 5, 0, 1),
(16268, 'CSI.116.003.004', '51600304', 'TREKKING TRANGO-41', 'KET', 1300000, 1300000, 1, 5, 0, 1),
(16269, 'CSI.116.003.005', '51600305', 'TREKKING TRANGO-42', 'KET', 1300000, 1300000, 0, 5, 0, 1),
(16270, 'CSI.116.003.006', '51600306', 'TREKKING TRANGO-43', 'KET', 1300000, 1300000, 2, 5, 0, 1),
(16271, 'CSI.116.003.007', '51600307', 'TREKKING TRANGO-44', 'KET', 1300000, 1300000, 2, 5, 0, 1),
(16272, 'CSI.116.003.008', '51600308', 'TREKKING TRANGO-45', 'KET', 1300000, 1300000, 0, 5, 0, 1),
(16273, 'BAG.003.033.002', '30303302', 'Car. Extraterres-BL', 'KET', 475000, 475000, 15, 3, 0, 1),
(16274, 'BAG.003.033.001', '30303301', 'Car. Extraterres-GR', 'KET', 475000, 475000, 5, 3, 0, 1),
(16275, 'ACF.010.002.001', '11000201-2', 'Jepit Tundra BK-38', 'KET', 90000, 90000, 0, 1, 0, 1),
(16276, 'ACF.010.002.002', '11000202-2', 'Jepit Tundra BK-39', 'KET', 90000, 90000, 0, 1, 0, 1),
(16277, 'ACF.010.002.003', '11000203-2', 'Jepit Tundra BK-40', 'KET', 90000, 90000, 30, 1, 0, 1),
(16278, 'ACF.010.002.004', '11000204-2', 'Jepit Tundra BK-41', 'KET', 90000, 90000, 30, 1, 0, 1),
(16279, 'ACF.010.002.005', '11000205-2', 'Jepit Tundra BK-42', 'KET', 90000, 90000, 5, 1, 0, 1),
(16280, 'ACF.010.002.006', '11000206-2', 'Jepit Tundra BK-43', 'KET', 90000, 90000, 28, 1, 0, 1),
(16281, 'ACF.010.047.005', '11004705', 'Yosemit Valley-GR-42', 'KET', 180000, 180000, 1, 1, 0, 1),
(16282, 'ACF.010.047.002', '11004702', 'Yosemit Valley-GR-39', 'KET', 180000, 180000, 4, 1, 0, 1),
(16283, 'ACF.010.047.003', '11004703', 'Yosemit Valley-GR-40', 'KET', 180000, 180000, 1, 1, 0, 1),
(16284, 'ACF.010.047.010', '11004710', 'Yosemit Valley-RD-41', 'KET', 180000, 180000, 6, 1, 0, 1),
(16285, 'ACF.010.047.011', '11004711', 'Yosemit Valley-RD-42', 'KET', 180000, 180000, 9, 1, 0, 1),
(16286, 'ACF.010.047.006', '11004706', 'Yosemit Valley-GR-43', 'KET', 180000, 180000, 7, 1, 0, 1),
(16287, 'ACF.010.040.022', '11004022', 'SM. Adventure-RD-41', 'KET', 195000, 195000, 1, 1, 0, 1),
(16288, 'CSI.045.001.001', '54500101', 'CSN-HEFF', 'KET', 65000, 65000, 47, 5, 0, 1),
(16289, 'ACF.018.002.001', '11800201', 'KAOS KAKI CONSINA 02', 'KET', 65000, 65000, 17, 1, 0, 1),
(16290, 'ACT.007.004.002', '20700402-1', 'Cover 40-OR', 'KET', 60000, 60000, 5, 1, 0, 1),
(16291, 'ACF.008.007.001', '8007001-2', 'SRT. Polar 01-RD', 'KET', 65000, 65000, 1, 1, 0, 1),
(16292, 'CSI.129.001.001', '52900101', 'SRT. Iron Clad', 'KET', 185000, 185000, 2, 5, 0, 1),
(16293, 'CSI.126.001.001', '52600101', 'SRT. Mont Bell 01', 'KET', 95000, 95000, 8, 5, 0, 1),
(16294, 'CSI.126.002.001', '52600201', 'SRT. Mont Bell 02', 'KET', 185000, 185000, 2, 5, 0, 1),
(16295, 'ACF.016.001.001', '11600101-1', 'Manset-BK-M', 'KET', 55000, 55000, 4, 1, 0, 1),
(16296, 'ACF.016.001.002', '11600102-1', 'Manset-BK-L', 'KET', 55000, 55000, 1, 1, 0, 1),
(16297, 'ACF.016.001.012', '11600112-1', 'Manset-RD-M', 'KET', 55000, 55000, 2, 1, 0, 1),
(16298, 'ACF.016.001.010', '11600110-1', 'Manset-RD-S', 'KET', 55000, 55000, 1, 1, 0, 1),
(16299, 'ACF.016.001.009', '11600109-1', 'Manset-BL-S', 'KET', 55000, 55000, 5, 1, 0, 1),
(16300, 'KSY.005.072.001', '51600209', 'COBA', 'KET', 950000, 950000, 1, 5, 0, 1),
(16301, 'KSY.005.140.001', '51600101', 'Coba Lagi', 'KET', 1700000, 1700000, 1, 5, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cetak_barcode`
--

CREATE TABLE IF NOT EXISTS `cetak_barcode` (
`ID` int(11) NOT NULL,
  `BARCODE` varchar(100) NOT NULL,
  `LEBAR` int(11) NOT NULL,
  `TINGGI` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `cetak_barcode`
--

INSERT INTO `cetak_barcode` (`ID`, `BARCODE`, `LEBAR`, `TINGGI`) VALUES
(1, 'B210815001', 15, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bhn_masuk`
--

CREATE TABLE IF NOT EXISTS `detail_bhn_masuk` (
`URUT` int(11) NOT NULL,
  `DET_ID_BHN_MASUK` varchar(30) NOT NULL,
  `DET_ID_BAHAN` varchar(30) NOT NULL,
  `HARGA_BAHAN` int(11) NOT NULL,
  `JUMLAH_BAHAN` int(11) NOT NULL,
  `JUMLAH_MASUK` int(11) NOT NULL,
  `JUMLAH_SELISIH` int(11) NOT NULL,
  `HARGA_SELISIH` int(11) NOT NULL,
  `KERUGIAN` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `detail_bhn_masuk`
--

INSERT INTO `detail_bhn_masuk` (`URUT`, `DET_ID_BHN_MASUK`, `DET_ID_BAHAN`, `HARGA_BAHAN`, `JUMLAH_BAHAN`, `JUMLAH_MASUK`, `JUMLAH_SELISIH`, `HARGA_SELISIH`, `KERUGIAN`) VALUES
(1, 'BM10/19/150001-5', 'BHN-00001', 11100000, 1110, 1110, 0, 0, 0),
(2, 'BM10/19/150001-5', 'BHN-00003', 15000, 200, 200, 0, 0, 0),
(5, 'BM10/19/150002-5', 'BHN-00001', 1500000, 500, 500, 0, 0, 0),
(6, 'BM10/19/150002-5', 'BHN-00002', 2000000, 200, 200, 0, 0, 0),
(7, 'BM10/19/150002-5', 'BHN-00003', 3000000, 300, 300, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_item_transfer`
--

CREATE TABLE IF NOT EXISTS `detail_item_transfer` (
`ID_DETAIL_TRANSFER` int(11) NOT NULL,
  `NO_TRANSFER` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `GRAND_PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kalkulasi_angsur`
--

CREATE TABLE IF NOT EXISTS `detail_kalkulasi_angsur` (
  `ANGSUR` varchar(50) NOT NULL,
  `TANGGAL` date NOT NULL,
  `ID_PETUGAS` varchar(30) NOT NULL,
  `JUMLAH_ANGSUR` int(11) NOT NULL,
  `ANGSUR_KE` int(11) NOT NULL,
  `ID_KALKULASI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_kalkulasi_angsur`
--

INSERT INTO `detail_kalkulasi_angsur` (`ANGSUR`, `TANGGAL`, `ID_PETUGAS`, `JUMLAH_ANGSUR`, `ANGSUR_KE`, `ID_KALKULASI`) VALUES
('PRD-1020150001BHN-00003', '2015-10-22', '6', 50, 1, 'PRD-1020150001'),
('PRD-1020150001BHN-00001', '2015-10-22', '6', 10, 1, 'PRD-1020150001'),
('PRD-1020150001BHN-00002', '2015-10-22', '6', 10, 1, 'PRD-1020150001'),
('PRD-1020150001BHN-00003', '2015-10-22', '6', 20, 2, 'PRD-1020150001'),
('PRD-1020150001BHN-00001', '2015-10-22', '6', 20, 2, 'PRD-1020150001'),
('PRD-1020150001BHN-00002', '2015-10-22', '6', 20, 2, 'PRD-1020150001'),
('PRD-1020150001BHN-00003', '2015-10-22', '6', 10, 3, 'PRD-1020150001'),
('PRD-1020150001BHN-00001', '2015-10-22', '6', 10, 3, 'PRD-1020150001'),
('PRD-1020150001BHN-00002', '2015-10-22', '6', 10, 3, 'PRD-1020150001'),
('PRD-1020150002BHN-00003', '2015-10-22', '6', 50, 1, 'PRD-1020150002'),
('PRD-1020150002BHN-00001', '2015-10-22', '6', 20, 1, 'PRD-1020150002'),
('PRD-1020150002BHN-00002', '2015-10-22', '6', 20, 1, 'PRD-1020150002'),
('PRD-1020150003BHN-00003', '2015-10-22', '6', 10, 1, 'PRD-1020150003'),
('PRD-1020150003BHN-00001', '2015-10-22', '6', 10, 1, 'PRD-1020150003'),
('PRD-1020150003BHN-00002', '2015-10-22', '6', 10, 1, 'PRD-1020150003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kalkulasi_bahan`
--

CREATE TABLE IF NOT EXISTS `detail_kalkulasi_bahan` (
`URUT` int(11) NOT NULL,
  `ID_KALKULASI` varchar(50) NOT NULL,
  `ID_BAHAN` varchar(30) NOT NULL,
  `JML_TOTAL` int(11) NOT NULL,
  `JML_DIPAKAI` int(11) NOT NULL,
  `JML_FINAL` int(11) NOT NULL,
  `JML_LEBIH` int(11) NOT NULL,
  `ANGSUR` varchar(30) NOT NULL,
  `JML_ANGSURAN` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data untuk tabel `detail_kalkulasi_bahan`
--

INSERT INTO `detail_kalkulasi_bahan` (`URUT`, `ID_KALKULASI`, `ID_BAHAN`, `JML_TOTAL`, `JML_DIPAKAI`, `JML_FINAL`, `JML_LEBIH`, `ANGSUR`, `JML_ANGSURAN`) VALUES
(46, 'PRD-1020150001', 'BHN-00003', 60, 80, 100, 40, 'PRD-1020150001BHN-00003', 3),
(47, 'PRD-1020150001', 'BHN-00001', 20, 40, 60, 40, 'PRD-1020150001BHN-00001', 3),
(48, 'PRD-1020150001', 'BHN-00002', 20, 40, 60, 40, 'PRD-1020150001BHN-00002', 3),
(49, 'PRD-1020150002', 'BHN-00003', 60, 50, 50, 0, 'PRD-1020150002BHN-00003', 1),
(50, 'PRD-1020150002', 'BHN-00001', 20, 20, 20, 0, 'PRD-1020150002BHN-00001', 1),
(51, 'PRD-1020150002', 'BHN-00002', 20, 20, 20, 0, 'PRD-1020150002BHN-00002', 1),
(52, 'PRD-1020150003', 'BHN-00003', 60, 10, 10, 0, 'PRD-1020150003BHN-00003', 1),
(53, 'PRD-1020150003', 'BHN-00001', 20, 10, 10, 0, 'PRD-1020150003BHN-00001', 1),
(54, 'PRD-1020150003', 'BHN-00002', 20, 10, 10, 0, 'PRD-1020150003BHN-00002', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kalkulasi_barang`
--

CREATE TABLE IF NOT EXISTS `detail_kalkulasi_barang` (
`URUT` int(11) NOT NULL,
  `ID_KALKULASI` varchar(30) NOT NULL,
  `KODE_BARANG` varchar(30) NOT NULL,
  `JML_PROD` int(11) NOT NULL,
  `JML_PROD_FINAL` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data untuk tabel `detail_kalkulasi_barang`
--

INSERT INTO `detail_kalkulasi_barang` (`URUT`, `ID_KALKULASI`, `KODE_BARANG`, `JML_PROD`, `JML_PROD_FINAL`) VALUES
(31, 'PRD-1020150001', 'KSY.005.072.001', 1, 1),
(32, 'PRD-1020150001', 'KSY.005.140.001', 1, 1),
(33, 'PRD-1020150002', 'KSY.005.072.001', 1, 1),
(34, 'PRD-1020150002', 'KSY.005.140.001', 1, 1),
(35, 'PRD-1020150003', 'KSY.005.072.001', 1, 1),
(36, 'PRD-1020150003', 'KSY.005.140.001', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kalkulasi_penyesuaian`
--

CREATE TABLE IF NOT EXISTS `detail_kalkulasi_penyesuaian` (
  `PENYESUAIAN` varchar(50) NOT NULL,
  `TANGGAL` date NOT NULL,
  `ID_PETUGAS` varchar(30) NOT NULL,
  `JUMLAH_PENYESUAIAN` int(11) NOT NULL,
  `ID_KALKULASI` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_kalkulasi_penyesuaian`
--

INSERT INTO `detail_kalkulasi_penyesuaian` (`PENYESUAIAN`, `TANGGAL`, `ID_PETUGAS`, `JUMLAH_PENYESUAIAN`, `ID_KALKULASI`) VALUES
('PRD-1020150001BHN-00003', '2015-10-22', '6', 20, 'PRD-1020150001'),
('PRD-1020150001BHN-00001', '2015-10-22', '6', 20, 'PRD-1020150001'),
('PRD-1020150001BHN-00002', '2015-10-22', '6', 20, 'PRD-1020150001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_konsinyasi`
--

CREATE TABLE IF NOT EXISTS `detail_konsinyasi` (
`ID_DETAIL_KONSINYASI` int(11) NOT NULL,
  `NO_NOTA_KONSINYASI` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `GRAND_PRICE` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `detail_konsinyasi`
--

INSERT INTO `detail_konsinyasi` (`ID_DETAIL_KONSINYASI`, `NO_NOTA_KONSINYASI`, `KODE_BARANG`, `HARGA_BARANG`, `DISKON`, `JUMLAH`, `GRAND_PRICE`) VALUES
(9, 'KN10/23/150001-1', 'ACF.016.001.009', 55000, 0, 6, 330000),
(10, 'KN10/23/150001-1', 'ACF.016.001.010', 55000, 0, 4, 220000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_manufacturing`
--

CREATE TABLE IF NOT EXISTS `detail_manufacturing` (
`URUT` int(11) NOT NULL,
  `DET_MAN_ID_MAN` varchar(100) NOT NULL,
  `DET_ID_BAHAN` varchar(30) NOT NULL,
  `DET_JUMLAH_BAHAN` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `detail_manufacturing`
--

INSERT INTO `detail_manufacturing` (`URUT`, `DET_MAN_ID_MAN`, `DET_ID_BAHAN`, `DET_JUMLAH_BAHAN`) VALUES
(6, 'PSN-201500001', 'BHN-00003', 30),
(8, 'PSN-201500002', 'BHN-00001', 10),
(9, 'PSN-201500002', 'BHN-00002', 20),
(10, 'PSN-201500002', 'BHN-00003', 30),
(11, 'PSN-201500001', 'BHN-00001', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_mutasi_prod`
--

CREATE TABLE IF NOT EXISTS `detail_mutasi_prod` (
  `KODE_MUTASI` varchar(50) NOT NULL,
  `KODE_BARANG` varchar(30) NOT NULL,
  `JUMLAH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_mutasi_prod`
--

INSERT INTO `detail_mutasi_prod` (`KODE_MUTASI`, `KODE_BARANG`, `JUMLAH`) VALUES
('MTB-10201500001', 'KSY.005.072.001', 3),
('MTB-10201500001', 'KSY.005.140.001', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_ofname_outlet`
--

CREATE TABLE IF NOT EXISTS `detail_ofname_outlet` (
  `id_head` varchar(13) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `stok_apl` int(11) NOT NULL DEFAULT '0',
  `stok_fisik` int(11) NOT NULL DEFAULT '0',
  `selisih` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_ofname_outlet`
--

INSERT INTO `detail_ofname_outlet` (`id_head`, `kode_barang`, `stok_apl`, `stok_fisik`, `selisih`) VALUES
('STO0010000001', 'CSI.116.002.009', 0, 1, -1),
('STO0010000001', 'CSI.116.002.010', 0, 2, -2),
('STO0010000001', 'CSI.116.002.013', 0, 3, -3),
('STO0010000001', 'CSI.116.002.014', 0, 4, -4),
('STO0010000001', 'CSI.116.002.015', 0, 5, -5),
('STO0010000001', 'CSI.116.001.001', 0, 6, -6),
('STO0010000001', 'CSI.116.001.002', 0, 7, -7),
('STO0010000001', 'CSI.116.001.003', 0, 8, -8),
('STO0010000001', 'CSI.116.001.004', 0, 9, -9),
('STO0010000001', 'CSI.116.001.005', 0, 10, -10),
('STO0010000001', 'CSI.116.001.006', 1, 11, -10),
('STO0010000001', 'CSI.116.001.007', 1, 12, -11),
('STO0010000001', 'CSI.116.002.001', 2, 13, -11),
('STO0010000001', 'CSI.116.002.002', 0, 14, -14),
('STO0010000001', 'CSI.116.002.003', 2, 15, -13),
('STO0010000001', 'CSI.116.002.004', 1, 16, -15),
('STO0010000001', 'CSI.116.002.005', 1, 17, -16),
('STO0010000001', 'CSI.116.002.006', 1, 18, -17),
('STO0010000001', 'CSI.116.002.007', 0, 19, -19),
('STO0010000001', 'CSI.116.002.008', 0, 20, -20),
('STO0010000001', 'CSI.116.003.001', 0, 21, -21),
('STO0010000001', 'CSI.116.003.002', 2, 22, -20),
('STO0010000001', 'CSI.116.003.003', 2, 23, -21),
('STO0010000001', 'CSI.116.003.004', 1, 24, -23),
('STO0010000001', 'CSI.116.003.005', 0, 25, -25),
('STO0010000001', 'CSI.116.003.006', 2, 26, -24),
('STO0010000001', 'CSI.116.003.007', 2, 27, -25),
('STO0010000001', 'CSI.116.003.008', 0, 28, -28),
('STO0010000001', 'BAG.003.033.002', 14, 29, -15),
('STO0010000001', 'BAG.003.033.001', 5, 30, -25),
('STO0010000001', 'ACF.010.002.001', 0, 31, -31),
('STO0010000001', 'ACF.010.002.002', 0, 32, -32),
('STO0010000001', 'ACF.010.002.003', 27, 33, -6),
('STO0010000001', 'ACF.010.002.004', 28, 34, -6),
('STO0010000001', 'ACF.010.002.005', 3, 35, -32),
('STO0010000001', 'ACF.010.002.006', 26, 36, -10),
('STO0010000001', 'ACF.010.047.005', 1, 37, -36),
('STO0010000001', 'ACF.010.047.002', 2, 38, -36),
('STO0010000001', 'ACF.010.047.003', 1, 39, -38),
('STO0010000001', 'ACF.010.047.010', 6, 40, -34),
('STO0010000001', 'ACF.010.047.011', 9, 41, -32),
('STO0010000001', 'ACF.010.047.006', 7, 42, -35),
('STO0010000001', 'ACF.010.040.022', 1, 43, -42),
('STO0010000001', 'CSI.045.001.001', 47, 44, 3),
('STO0010000001', 'ACF.018.002.001', 17, 45, -28),
('STO0010000001', 'ACT.007.004.002', 5, 46, -41),
('STO0010000001', 'ACF.008.007.001', 0, 47, -47),
('STO0010000001', 'CSI.129.001.001', 2, 48, -46),
('STO0010000001', 'CSI.126.001.001', 8, 49, -41),
('STO0010000001', 'CSI.126.002.001', 2, 50, -48),
('STO0010000001', 'ACF.016.001.001', 4, 51, -47),
('STO0010000001', 'ACF.016.001.002', 1, 52, -51),
('STO0010000001', 'ACF.016.001.012', 2, 53, -51),
('STO0010000001', 'ACF.016.001.010', 1, 54, -53),
('STO0010000001', 'ACF.016.001.009', 4, 55, -51);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_ofname_pusat`
--

CREATE TABLE IF NOT EXISTS `detail_ofname_pusat` (
  `id_head` varchar(10) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `stok_apl` int(11) NOT NULL,
  `stok_fisik` int(11) NOT NULL,
  `selisih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_ofname_pusat`
--

INSERT INTO `detail_ofname_pusat` (`id_head`, `id_barang`, `stok_apl`, `stok_fisik`, `selisih`) VALUES
('STO0000001', 16245, 1, 1, 0),
('STO0000001', 16246, 2, 2, 0),
('STO0000001', 16247, 2, 3, -1),
('STO0000001', 16248, 1, 4, -3),
('STO0000001', 16249, 2, 5, -3),
('STO0000001', 16250, 1, 6, -5),
('STO0000001', 16251, 1, 7, -6),
('STO0000001', 16252, 1, 8, -7),
('STO0000001', 16253, 0, 9, -9),
('STO0000001', 16254, 2, 10, -8),
('STO0000001', 16255, 1, 11, -10),
('STO0000001', 16256, 1, 12, -11),
('STO0000001', 16257, 2, 13, -11),
('STO0000001', 16258, 0, 14, -14),
('STO0000001', 16259, 3, 15, -12),
('STO0000001', 16260, 1, 16, -15),
('STO0000001', 16261, 1, 17, -16),
('STO0000001', 16262, 2, 18, -16),
('STO0000001', 16263, 1, 19, -18),
('STO0000001', 16264, 0, 20, -20),
('STO0000001', 16265, 0, 21, -21),
('STO0000001', 16266, 2, 22, -20),
('STO0000001', 16267, 2, 23, -21),
('STO0000001', 16268, 1, 24, -23),
('STO0000001', 16269, 0, 25, -25),
('STO0000001', 16270, 2, 26, -24),
('STO0000001', 16271, 2, 27, -25),
('STO0000001', 16272, 0, 28, -28),
('STO0000001', 16273, 15, 29, -14),
('STO0000001', 16274, 5, 30, -25),
('STO0000001', 16275, 0, 31, -31),
('STO0000001', 16276, 0, 32, -32),
('STO0000001', 16277, 30, 33, -3),
('STO0000001', 16278, 30, 34, -4),
('STO0000001', 16279, 5, 35, -30),
('STO0000001', 16280, 28, 36, -8),
('STO0000001', 16281, 1, 37, -36),
('STO0000001', 16282, 4, 38, -34),
('STO0000001', 16283, 1, 39, -38),
('STO0000001', 16284, 6, 40, -34),
('STO0000001', 16285, 9, 41, -32),
('STO0000001', 16286, 7, 42, -35),
('STO0000001', 16287, 1, 43, -42),
('STO0000001', 16288, 47, 44, 3),
('STO0000001', 16289, 17, 45, -28),
('STO0000001', 16290, 5, 46, -41),
('STO0000001', 16291, 1, 47, -46),
('STO0000001', 16292, 2, 48, -46),
('STO0000001', 16293, 8, 49, -41),
('STO0000001', 16294, 2, 50, -48),
('STO0000001', 16295, 4, 51, -47),
('STO0000001', 16296, 1, 52, -51),
('STO0000001', 16297, 2, 53, -51),
('STO0000001', 16298, 1, 54, -53),
('STO0000001', 16299, 5, 55, -50),
('STO0000001', 16300, 1, 56, -55),
('STO0000001', 16301, 1, 57, -56);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengiriman_barang`
--

CREATE TABLE IF NOT EXISTS `detail_pengiriman_barang` (
`ID_PENGIRIMAN` int(11) NOT NULL,
  `NO_NOTA_PENGIRIMAN` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `SESSION_PENJUALAN` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `detail_pengiriman_barang`
--

INSERT INTO `detail_pengiriman_barang` (`ID_PENGIRIMAN`, `NO_NOTA_PENGIRIMAN`, `KODE_BARANG`, `HARGA_BARANG`, `DISKON`, `JUMLAH`, `SESSION_PENJUALAN`) VALUES
(10, '25/08/JB-000001', 'BAG.002.036.001', 275000, 0, 50, ''),
(11, '25/08/JB-000002', 'CSI.009.014.001', 285000, 0, 50, ''),
(12, '25/08/JB-000002', 'BAG.002.036.001', 275000, 0, 22, ''),
(13, '25/08/JB-000002', 'ACF.010.047.003', 180000, 0, 100, ''),
(14, '25/08/JB-000002', 'ACF.010.047.009', 180000, 0, 50, ''),
(15, '25/08/JB-000002', 'ACF.010.047.012', 180000, 0, 22, ''),
(16, '25/08/JB-000002', 'CSI.102.011.001', 23000, 0, 50, ''),
(17, '25/08/JB-000002', 'CSI.102.014.001', 14000, 0, 50, ''),
(18, '25/08/JB-000002', 'CSI.102.005.001', 75000, 0, 200, ''),
(19, '25/08/JB-000002', 'ACF.010.047.018', 180000, 0, 30, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
`ID_DETAIL_PENJUALAN` int(11) NOT NULL,
  `NO_NOTA_PENJUALAN` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `GRAND_PRICE` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`ID_DETAIL_PENJUALAN`, `NO_NOTA_PENJUALAN`, `KODE_BARANG`, `HARGA_BARANG`, `DISKON`, `JUMLAH`, `GRAND_PRICE`) VALUES
(9, 'JR08/30/150001-5', '6948375900423', 550000, 10, 2, 990000),
(10, 'JR08/30/150001-5', '8991002103238', 7500, 4, 3, 21600),
(11, 'JR08/30/150002-1', '8991002103238', 7500, 4, 10, 72000),
(12, 'JR08/30/150003-5', '8991002103238', 7500, 4, 7, 50400),
(13, 'JR08/30/150004-1', 'CSI.116.002.009', 950000, 0, 1, 950000),
(14, 'JR08/31/150005-5', '8998127514123', 19000, 0, 1, 19000),
(15, 'JR09/01/150006-5', '8992806851899', 55000, 10, 11, 544500),
(16, 'JR10/20/150007-1', 'CSI.116.002.010', 950000, 0, 1, 950000),
(17, 'JR10/20/150007-1', 'CSI.116.002.013', 950000, 0, 1, 950000),
(18, 'JR10/20/150007-1', 'CSI.116.002.015', 950000, 0, 1, 950000),
(19, 'JR10/22/150008-1', 'CSI.116.001.005', 1700000, 0, 1, 1700000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penjualan_grosir`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan_grosir` (
`ID_detail_penjualan_grosir` int(11) NOT NULL,
  `NO_NOTA_PENJUALAN` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `GRAND_PRICE` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `detail_penjualan_grosir`
--

INSERT INTO `detail_penjualan_grosir` (`ID_detail_penjualan_grosir`, `NO_NOTA_PENJUALAN`, `KODE_BARANG`, `HARGA_BARANG`, `DISKON`, `JUMLAH`, `GRAND_PRICE`) VALUES
(13, 'GR10/23/150001-1', 'BAG.003.033.002', 475000, 0, 1, 475000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_retur_konsinyasi`
--

CREATE TABLE IF NOT EXISTS `detail_retur_konsinyasi` (
`ID` int(11) NOT NULL,
  `NO_RETUR` varchar(50) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `JUMLAH_RETUR` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `detail_retur_konsinyasi`
--

INSERT INTO `detail_retur_konsinyasi` (`ID`, `NO_RETUR`, `KODE_BARANG`, `JUMLAH_RETUR`) VALUES
(3, 'RK10/23/150001', 'ACF.016.001.010', 2),
(4, 'RK10/23/150001', 'ACF.016.001.009', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_retur_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_retur_penjualan` (
`ID` int(11) NOT NULL,
  `NO_RETUR` varchar(50) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `JUMLAH_RETUR` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `detail_retur_penjualan`
--

INSERT INTO `detail_retur_penjualan` (`ID`, `NO_RETUR`, `KODE_BARANG`, `JUMLAH_RETUR`) VALUES
(14, 'RT10/20/150001', 'CSI.116.002.010', 1),
(15, 'RT10/20/150001', 'CSI.116.002.013', 1),
(16, 'RT10/20/150001', 'CSI.116.002.015', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon_mitra`
--

CREATE TABLE IF NOT EXISTS `diskon_mitra` (
`ID` int(11) NOT NULL,
  `ID_KATEGORI` int(11) NOT NULL,
  `PRESENTASE` int(11) NOT NULL,
  `KODE_PELANGGAN` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `diskon_mitra`
--

INSERT INTO `diskon_mitra` (`ID`, `ID_KATEGORI`, `PRESENTASE`, `KODE_PELANGGAN`) VALUES
(1, 1, 54, 'P0000001'),
(2, 2, 2, 'P0000001'),
(3, 3, 3, 'P0000001'),
(4, 4, 4, 'P0000001'),
(5, 5, 5, 'P0000001'),
(6, 6, 6, 'P0000001'),
(7, 7, 7, 'P0000001'),
(8, 8, 8, 'P0000001'),
(9, 9, 9, 'P0000001'),
(10, 10, 10, 'P0000001'),
(11, 11, 11, 'P0000001'),
(12, 12, 12, 'P0000001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang_produksi`
--

CREATE TABLE IF NOT EXISTS `gudang_produksi` (
`PRD_ID_BARANG` int(100) NOT NULL,
  `PRD_KODE_BARANG` varchar(100) NOT NULL,
  `PRD_BARCODE` varchar(100) NOT NULL,
  `PRD_NAMA_BARANG` varchar(100) NOT NULL,
  `KATEGORI` varchar(30) NOT NULL,
  `PRD_STOCK` int(100) NOT NULL,
  `PRD_STOCK_BAYANGAN` int(11) NOT NULL,
  `STATUS` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `gudang_produksi`
--

INSERT INTO `gudang_produksi` (`PRD_ID_BARANG`, `PRD_KODE_BARANG`, `PRD_BARCODE`, `PRD_NAMA_BARANG`, `KATEGORI`, `PRD_STOCK`, `PRD_STOCK_BAYANGAN`, `STATUS`) VALUES
(1, 'KSY.005.072.001', '-', '-', '-', 7, 7, '-'),
(2, 'KSY.005.140.001', '-', '-', '-', 6, 6, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `head_bhn_masuk`
--

CREATE TABLE IF NOT EXISTS `head_bhn_masuk` (
  `ID_BHN_MASUK` varchar(30) NOT NULL,
  `ID_PETUGAS` varchar(30) NOT NULL,
  `ID_PETUGAS_PENERIMA` varchar(30) NOT NULL,
  `TGL_PEMBELIAN` datetime NOT NULL,
  `TGL_MASUK` datetime NOT NULL,
  `TOTAL_HARGA` int(11) NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `head_bhn_masuk`
--

INSERT INTO `head_bhn_masuk` (`ID_BHN_MASUK`, `ID_PETUGAS`, `ID_PETUGAS_PENERIMA`, `TGL_PEMBELIAN`, `TGL_MASUK`, `TOTAL_HARGA`, `STATUS`) VALUES
('BM10/19/150001-5', '1', '1', '2015-10-19 10:15:53', '2015-10-19 15:57:04', 2015000, 'Masuk (ACC)'),
('BM10/19/150002-5', '1', '1', '2015-10-19 15:54:35', '2015-10-19 15:57:08', 6500000, 'Masuk (ACC)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `head_kalkulasi_produksi`
--

CREATE TABLE IF NOT EXISTS `head_kalkulasi_produksi` (
  `ID_KALKULASI` varchar(30) NOT NULL,
  `TGL_KALKULASI` date NOT NULL,
  `TGL_BERES_PROD` date NOT NULL,
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `head_kalkulasi_produksi`
--

INSERT INTO `head_kalkulasi_produksi` (`ID_KALKULASI`, `TGL_KALKULASI`, `TGL_BERES_PROD`, `STATUS`) VALUES
('PRD-1020150001', '2015-10-22', '2015-10-22', 'SELESAI PRODUKSI'),
('PRD-1020150002', '2015-10-22', '2015-10-22', 'SELESAI PRODUKSI'),
('PRD-1020150003', '2015-10-22', '2015-10-22', 'SELESAI PRODUKSI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `head_mutasi_prod`
--

CREATE TABLE IF NOT EXISTS `head_mutasi_prod` (
  `KODE_MUTASI` varchar(50) NOT NULL,
  `TANGGAL_KELUAR` date NOT NULL,
  `TANGGAL_DITERIMA` date NOT NULL,
  `ID_PTGS_KELUAR` varchar(30) NOT NULL,
  `ID_PTGS_TERIMA` varchar(30) NOT NULL,
  `STATUS` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `head_mutasi_prod`
--

INSERT INTO `head_mutasi_prod` (`KODE_MUTASI`, `TANGGAL_KELUAR`, `TANGGAL_DITERIMA`, `ID_PTGS_KELUAR`, `ID_PTGS_TERIMA`, `STATUS`) VALUES
('MTB-10201500001', '2015-10-20', '2015-10-21', '1', '1', 'Selesai Mutasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `head_ofname_outlet`
--

CREATE TABLE IF NOT EXISTS `head_ofname_outlet` (
  `id` varchar(13) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `user_posting` varchar(30) DEFAULT NULL,
  `outlet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `head_ofname_outlet`
--

INSERT INTO `head_ofname_outlet` (`id`, `tanggal`, `user_posting`, `outlet`) VALUES
('STO0010000001', '2015-10-23', 'Adminpusat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `head_ofname_pusat`
--

CREATE TABLE IF NOT EXISTS `head_ofname_pusat` (
  `id` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `user_posting` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `head_ofname_pusat`
--

INSERT INTO `head_ofname_pusat` (`id`, `tanggal`, `user_posting`) VALUES
('STO0000001', '2015-10-24', 'Adminpusat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_transfer`
--

CREATE TABLE IF NOT EXISTS `item_transfer` (
`ID_TRANSFER` int(11) NOT NULL,
  `NO_TRANSFER` varchar(50) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `OPERATOR_KASIR` int(11) NOT NULL,
  `SUB_TOTAL_PENJUALAN` int(11) NOT NULL,
  `TIPE_PEMBAYARAN` varchar(10) NOT NULL,
  `DISKON_PENJUALAN` int(11) NOT NULL,
  `TAX_SALES` int(11) NOT NULL,
  `UANG_BAYAR` int(11) NOT NULL,
  `UANG_KEMBALI` int(11) NOT NULL,
  `PELANGGAN` varchar(100) NOT NULL,
  `CATATAN` text NOT NULL,
  `STATUS` text NOT NULL,
  `DISKON_PELANGGAN` int(11) NOT NULL,
  `NAMA_BANK` text NOT NULL,
  `NO_KARTU` text NOT NULL,
  `OUTLET` int(11) NOT NULL,
  `JATUH_TEMPO` date NOT NULL,
  `BIAYA_KIRIM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
`ID` int(11) NOT NULL,
  `KODE_JENIS` text NOT NULL,
  `KODE_GOLONGAN` text NOT NULL,
  `NAMA_JENIS` text NOT NULL,
  `KETERANGAN` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234 ;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`ID`, `KODE_JENIS`, `KODE_GOLONGAN`, `NAMA_JENIS`, `KETERANGAN`) VALUES
(1, 'CSI.063', 'CSI', 'ADIDAS', 'keterangan'),
(2, 'CSI.115', 'CSI', 'ADVENTURE', 'keterangan'),
(3, 'CSI.059', 'CSI', 'ARCTERYX', 'keterangan'),
(4, 'CSI.131', 'CSI', 'ARM BAND', 'keterangan'),
(5, 'CSI.085', 'CSI', 'AXO', 'keterangan'),
(6, 'ACF.002', '2', 'BANDANA', 'keterangan'),
(7, 'TEN.014', 'TEN', 'BASECAMP', 'keterangan'),
(8, 'CSI.072', 'CSI', 'BEAL', 'keterangan'),
(9, 'ACF.003', 'CSI', 'BELT', 'keterangan'),
(10, 'CSI.076', 'CSI', 'BERGHAUS', 'keterangan'),
(11, 'INV.001', 'INV', 'BIAYA BORDIR', 'keterangan'),
(12, 'INV.002', 'INV', 'BIAYA SABLON', 'keterangan'),
(13, 'CSI.020', 'CSI', 'BINOCULAR', 'keterangan'),
(14, 'CSI.112', 'CSI', 'BLACK DIAMOND', 'keterangan'),
(15, 'CSI.097', 'CSI', 'BMC', 'keterangan'),
(16, 'BAG.007', 'BAG', 'BODY PACK', 'keterangan'),
(17, 'CSI.029', 'CSI', 'BOOK', 'keterangan'),
(18, 'CSI.120', 'CSI', 'BOTTLE', 'keterangan'),
(19, 'CSI.056', 'CSI', 'BRAVO', 'keterangan'),
(20, 'TEN.003', 'TEN', 'BREAKOUT', 'keterangan'),
(21, 'CSI.070', 'CSI', 'BUAT', 'keterangan'),
(22, 'CSI.134', 'CSI', 'BUFO', 'keterangan'),
(23, 'CSI.128', 'CSI', 'BURTON', 'keterangan'),
(24, 'CSI.077', 'CSI', 'CALIFORNIA PAK', 'keterangan'),
(25, 'CSI.096', 'CSI', 'CAMP', 'keterangan'),
(26, 'CSI.030', 'CSI', 'CAMP GEAR', 'keterangan'),
(27, 'CSI.104', 'CSI', 'CAMPING STOVE', 'keterangan'),
(28, 'BAG.003', 'BAG', 'CARRIER', 'keterangan'),
(29, 'FSH.005', 'FSH', 'CELANA 7/8', 'keterangan'),
(30, 'FSH.004', 'FSH', 'CELANA PANJANG', 'keterangan'),
(31, 'FSH.006', 'FSH', 'CELANA PENDEK', 'keterangan'),
(32, 'FSH.008', 'FSH', 'CELANA RAINCOAT', 'keterangan'),
(33, 'FSH.007', 'FSH', 'CELANA SEPEDA', 'keterangan'),
(34, 'CSI.137', 'CSI', 'CHAIR', 'keterangan'),
(35, 'ACT.014', 'ACT', 'CHALK BAG', 'keterangan'),
(36, 'CSI.123', 'CSI', 'CLIMBING GEAR', 'keterangan'),
(37, 'ACF.011', 'ACF', 'CLOTHING PACK', 'keterangan'),
(38, 'CSI.011', 'CSI', 'COGHLANS', 'keterangan'),
(39, 'CSI.066', 'CSI', 'COLUMBIA', 'keterangan'),
(40, 'CSI.102', 'CSI', 'COMPASS', 'keterangan'),
(41, 'BZR.009', 'BZR', 'CONSINA IMPORT', 'keterangan'),
(42, 'ACT.007', 'ACT', 'COVER BAG', 'keterangan'),
(43, 'BZR.004', 'BZR', 'COVER BAG', 'keterangan'),
(44, 'CSI.074', 'CSI', 'CRUMPLER', 'keterangan'),
(45, 'BAG.001', 'BAG', 'DAY PACK', 'keterangan'),
(46, 'BAG.002', 'BAG', 'DAY PACK LAPTOP', 'keterangan'),
(47, 'DPK.001', 'DPK', 'DAYPACK', 'keterangan'),
(48, 'BAG.015', 'BAG', 'DAYPACK CAMERA', 'keterangan'),
(49, 'CSI.027', 'CSI', 'DAYUNG', 'keterangan'),
(50, 'CSI.012', 'CSI', 'DEUTER', 'keterangan'),
(51, 'CSI.026', 'CSI', 'DIRECTOR  CHAIR', 'keterangan'),
(52, 'ACF.004', 'ACF', 'DOMPET BIASA', 'keterangan'),
(53, 'ACF.005', 'ACF', 'DOMPET KULIT', 'keterangan'),
(54, 'ACF.013', 'ACF', 'DOMPET KUNCI', 'keterangan'),
(55, 'CSI.092', 'CSI', 'DRY BAG', 'keterangan'),
(56, 'CSI.113', 'CSI', 'E-CASE', 'keterangan'),
(57, 'CSI.087', 'CSI', 'EXOFFICIO', 'keterangan'),
(58, 'CSI.048', 'CSI', 'FILA', 'keterangan'),
(59, 'CSI.141', 'CSI', 'FIRE TRAP', 'keterangan'),
(60, 'CSI.093', 'CSI', 'FIVE TEN', 'keterangan'),
(61, 'CSI.091', 'CSI', 'FIZAN', 'keterangan'),
(62, 'CSI.061', 'CSI', 'FLY SHEET', 'keterangan'),
(63, 'TEN.010', 'TEN', 'FLY SHEET', 'keterangan'),
(64, 'CSI.035', 'CSI', 'FRAME', 'keterangan'),
(65, 'TEN.006', 'TEN', 'FRAME TENDA', 'keterangan'),
(66, 'BAG.016', 'BAG', 'GADGET SERRIES', 'keterangan'),
(67, 'ACF.001', '2', 'GAITER', 'keterangan'),
(68, 'CSI.124', 'CSI', 'GARMIN', 'keterangan'),
(69, 'CSI.046', 'CSI', 'GARMONT', 'keterangan'),
(70, 'CSI.065', 'CSI', 'GLEESTEP', 'keterangan'),
(71, 'CSI.084', 'CSI', 'GO PRO', 'keterangan'),
(72, 'CSI.082', 'CSI', 'HAMMOCK', 'keterangan'),
(73, 'ACF.014', 'ACF', 'HAND BAN', 'keterangan'),
(74, 'ACT.006', 'ACT', 'HANDPHONE CASE', 'keterangan'),
(75, 'CSI.103', 'CSI', 'HEADLAMP', 'keterangan'),
(76, 'CSI.045', 'CSI', 'HEFF', 'keterangan'),
(77, 'CSI.008', 'CSI', 'HELM', 'keterangan'),
(78, 'CSI.031', 'CSI', 'HI-TECH', 'keterangan'),
(79, 'CSI.024', 'CSI', 'HOTHANDS', 'keterangan'),
(80, 'CSI.044', 'CSI', 'HYDRA KNIGHT', 'keterangan'),
(81, 'BAG.010', 'BAG', 'HYDRO PACK', 'keterangan'),
(82, 'CSI.138', 'CSI', 'INTEX', 'keterangan'),
(83, 'CSI.129', 'CSI', 'IRON CLAD', 'keterangan'),
(84, 'CSI.073', 'CSI', 'JACK WOLFSKIN', 'keterangan'),
(85, 'BZR.006', 'BZR', 'JACKET ATASAN', 'keterangan'),
(86, 'CSI.106', 'CSI', 'JACKET BULU ANGSA', 'keterangan'),
(87, 'FSH.013', 'FSH', 'JAKET ATASAN', 'keterangan'),
(88, 'FSH.010', 'FSH', 'JAKET POLAR', 'keterangan'),
(89, 'FSH.014', 'FSH', 'JAKET SET', 'keterangan'),
(90, 'FSH.009', 'FSH', 'JAKET SOFT SHELL', 'keterangan'),
(91, 'JAM.001', 'JAM', 'JAM TANGAN', 'keterangan'),
(92, 'FSH.017', 'FSH', 'JERSEY', 'keterangan'),
(93, 'CSI.132', 'CSI', 'JISHUI HUAXIN', 'keterangan'),
(94, 'CSI.036', 'CSI', 'KACAMATA', 'keterangan'),
(95, 'BAG.013', 'BAG', 'KAMERA SLEMPANG', 'keterangan'),
(96, 'ACF.018', 'ACF', 'KAOS KAKI', 'keterangan'),
(97, 'CSI.081', 'CSI', 'KARRIMOR', 'keterangan'),
(98, 'CSI.099', 'CSI', 'KATADYN', 'keterangan'),
(99, 'CSI.071', 'CSI', 'KBOW', 'keterangan'),
(100, 'BZR.005', 'BZR', 'KEMEJA', 'keterangan'),
(101, 'FSH.003', 'FSH', 'KEMEJA', 'keterangan'),
(102, 'CSI.119', 'CSI', 'KERNMENTLE', 'keterangan'),
(103, 'TEN.013', 'TEN', 'KINGDOM', 'keterangan'),
(104, 'CSI.019', 'CSI', 'KNIFE', 'keterangan'),
(105, 'CSI.003', 'CSI', 'KONG', 'keterangan'),
(106, 'ACF.009', 'ACF', 'KUPLUK', 'keterangan'),
(107, 'CSI.015', 'CSI', 'LAFUMA', 'keterangan'),
(108, 'CSI.140', 'CSI', 'LANTERN', 'keterangan'),
(109, 'CSI.094', 'CSI', 'LATHERMAN', 'keterangan'),
(110, 'CSI.018', 'CSI', 'LED CAMPING LIGHT', 'keterangan'),
(111, 'CSI.017', 'CSI', 'LEKI', 'keterangan'),
(112, 'CSI.025', 'CSI', 'LIFESTRAW', 'keterangan'),
(113, 'CSI.135', 'CSI', 'LONG HAUL', 'keterangan'),
(114, 'CSI.033', 'CSI', 'LORPEN', 'keterangan'),
(115, 'CSI.075', 'CSI', 'LOWE ALPINE', 'keterangan'),
(116, 'TEN.001', '6', 'MAGNUM', 'keterangan'),
(117, 'CSI.110', 'CSI', 'MAMMUT', 'keterangan'),
(118, 'KSY.006', 'KSY', 'MANFROTTO', 'keterangan'),
(119, 'ACF.016', 'ACF', 'MANSET', 'keterangan'),
(120, 'ACT.009', 'ACT', 'MATRAS', 'keterangan'),
(121, 'BZR.008', 'BZR', 'MATRAS', 'keterangan'),
(122, 'MTS.001', 'MTS', 'MATRAS', 'keterangan'),
(123, 'CSI.118', 'CSI', 'MEINDL', 'keterangan'),
(124, 'CSI.062', 'CSI', 'MERRELL', 'keterangan'),
(125, 'CSI.014', 'CSI', 'MILLET', 'keterangan'),
(126, 'ACT.011', 'ACT', 'MINI TOTEM BAG', 'keterangan'),
(127, 'CSI.126', 'CSI', 'MONT BELL', 'keterangan'),
(128, 'CSI.058', 'CSI', 'MOUNTAIN TOP', 'keterangan'),
(129, 'CSI.068', 'CSI', 'MS', 'keterangan'),
(130, 'KSY.003', 'KSY', 'NALGENE', 'keterangan'),
(131, 'KSY.002', 'KSY', 'NATIONAL GEOGRAPHIC', 'keterangan'),
(132, 'CSI.121', 'CSI', 'NESTING', 'keterangan'),
(133, 'CSI.021', 'CSI', 'NIKWAX', 'keterangan'),
(134, 'CSI.142', 'CSI', 'NINGBO KINGPOOL', 'keterangan'),
(135, 'CSI.006', 'CSI', 'NITECSTICK', 'keterangan'),
(136, 'CSI.022', 'CSI', 'NO RINSE', 'keterangan'),
(137, 'CSI.032', 'CSI', 'NORTH FACE', 'keterangan'),
(138, 'CSI.004', 'CSI', 'OCEAN PACK', 'keterangan'),
(139, 'INV.003', 'INV', 'ONGKIR', 'keterangan'),
(140, 'ACF.015', 'ACF', 'ORDERAN', 'keterangan'),
(141, 'ACT.013', 'ACT', 'ORDERAN', 'keterangan'),
(142, 'BAG.014', 'BAG', 'ORDERAN', 'keterangan'),
(143, 'CSI.054', 'CSI', 'ORDERAN', 'keterangan'),
(144, 'FSH.015', 'FSH', 'ORDERAN', 'keterangan'),
(145, 'CSI.010', 'CSI', 'OUTDOOR', 'keterangan'),
(146, 'CSI.111', 'CSI', 'OUTDOOR RESEARCH', 'keterangan'),
(147, 'CSI.009', 'CSI', 'OVERBOARD', 'keterangan'),
(148, 'PTN.001', 'PTN', 'PACKING', 'keterangan'),
(149, 'CSI.122', 'CSI', 'PARAPIN', 'keterangan'),
(150, 'ACT.010', 'ACT', 'PASSPORT', 'keterangan'),
(151, 'CSI.064', 'CSI', 'PATAGONIA', 'keterangan'),
(152, 'CSI.001', 'CSI', 'PETZL', 'keterangan'),
(153, 'CSI.098', 'CSI', 'PIVOT', 'keterangan'),
(154, 'KSY.004', 'KSY', 'POLAR BOTTLE', 'keterangan'),
(155, 'CSI.083', 'CSI', 'PORTA LITE', 'keterangan'),
(156, 'CSI.052', 'CSI', 'QUECHUA', 'keterangan'),
(157, 'BZR.007', 'BZR', 'RAINCOAT ATASAN S.SEAL', 'keterangan'),
(158, 'FSH.001', 'FSH', 'RAINCOAT ATASAN SEAM SEAL', 'keterangan'),
(159, 'FSH.002', 'FSH', 'RAINCOAT SET', 'keterangan'),
(160, 'PTN.002', 'PTN', 'REPAIR', 'keterangan'),
(161, 'CSI.023', 'CSI', 'REPEL', 'keterangan'),
(162, 'KSY.001', 'KSY', 'RUFF', 'keterangan'),
(163, 'TEN.012', 'TEN', 'SAFARI', 'keterangan'),
(164, 'CSI.057', 'CSI', 'SALEWA', 'keterangan'),
(165, 'CSI.042', 'CSI', 'SALOMON', 'keterangan'),
(166, 'SPL.001', 'SPL', 'SAMPLE', 'keterangan'),
(167, 'ACF.010', 'ACF', 'SANDAL', 'keterangan'),
(168, 'CSI.040', 'CSI', 'SARANG MAINAN', 'keterangan'),
(169, 'ACF.008', 'ACF', 'SARUNG TANGAN', 'keterangan'),
(170, 'CSI.088', 'CSI', 'SCHOLFEL', 'keterangan'),
(171, 'CSI.139', 'CSI', 'SECURITY', 'keterangan'),
(172, 'CSI.060', 'CSI', 'SELIMUT', 'keterangan'),
(173, 'ACF.017', 'ACF', 'SEPATU', 'keterangan'),
(174, 'CSI.116', 'CSI', 'SEPATU', 'keterangan'),
(175, 'CSI.105', 'CSI', 'SHANGHAI ROCK', 'keterangan'),
(176, 'BAG.009', 'BAG', 'SHOULDER BAG', 'keterangan'),
(177, 'TEN.015', 'TEN', 'SHOWER TENT', 'keterangan'),
(178, 'CSI.002', 'CSI', 'SILVA', 'keterangan'),
(179, 'CSI.101', 'CSI', 'SKYGERS', 'keterangan'),
(180, 'ACF.012', 'ACF', 'SLEEPING BAG', 'keterangan'),
(181, 'BZR.003', 'BZR', 'SLEEPING BAG', 'keterangan'),
(182, 'BAG.008', 'BAG', 'SLEMPANG+DAY PACK', 'keterangan'),
(183, 'CSI.133', 'CSI', 'SPANSET', 'keterangan'),
(184, 'CSI.100', 'CSI', 'SPINSET', 'keterangan'),
(185, 'FSH.016', 'FSH', 'SPONSOR', 'keterangan'),
(186, 'TEN.004', 'TEN', 'SUMMER TIME', 'keterangan'),
(187, 'TEN.005', 'TEN', 'SUPERLIGHT', 'keterangan'),
(188, 'TEN.009', 'TEN', 'TALI FRAME', 'keterangan'),
(189, 'CSI.090', 'CSI', 'TALI LEMPAR', 'keterangan'),
(190, 'CSI.125', 'CSI', 'TALI PERUSIK', 'keterangan'),
(191, 'ACT.004', 'ACT', 'TAS PAHA', 'keterangan'),
(192, 'ACT.012', 'ACT', 'TAS PINGGANG', 'keterangan'),
(193, 'ACT.008', 'ACT', 'TAS POCKET', 'keterangan'),
(194, 'BAG.006', 'BAG', 'TAS SLEMPANG LAPTOP', 'keterangan'),
(195, 'CSI.109', 'CSI', 'TATONKA', 'keterangan'),
(196, 'TEN.008', 'TEN', 'TENDA MCK', 'keterangan'),
(197, 'CSI.069', 'CSI', 'TENDON', 'keterangan'),
(198, 'CSI.080', 'CSI', 'TIMBERLAND', 'keterangan'),
(199, 'CSI.038', 'CSI', 'TNF', 'keterangan'),
(200, 'ACF.006', 'ACF', 'TOPI', 'keterangan'),
(201, 'TEN.011', 'TEN', 'TRAIL LIGHT', 'keterangan'),
(202, 'CSI.049', 'CSI', 'TRAMONTINA', 'keterangan'),
(203, 'CSI.043', 'CSI', 'TRANGIA', 'keterangan'),
(204, 'CSI.107', 'CSI', 'TRANGO', 'keterangan'),
(205, 'BAG.004', 'BAG', 'TRAVEL BAG', 'keterangan'),
(206, 'BZR.001', 'BZR', 'TRAVEL HARRIS', 'keterangan'),
(207, 'CSI.095', 'CSI', 'TRAVEL JOHN', 'keterangan'),
(208, 'ACT.003', 'ACT', 'TRAVEL POUCH', 'keterangan'),
(209, 'CSI.086', 'CSI', 'TREKKING POLE', 'keterangan'),
(210, 'CSI.114', 'CSI', 'TREKMATES', 'keterangan'),
(211, 'CSI.041', 'CSI', 'TRESPASS', 'keterangan'),
(212, 'CSI.117', 'CSI', 'TREZETA', 'keterangan'),
(213, 'BZR.010', 'BZR', 'T-SHIRT', 'keterangan'),
(214, 'FSH.012', 'FSH', 'TSHIRT CEWEK', 'keterangan'),
(215, 'FSH.011', 'FSH', 'TSHIRT COWOK', 'keterangan'),
(216, 'FSH.018', 'FSH', 'TSHIRT MEN', 'keterangan'),
(217, 'TEN.007', 'TEN', 'TUNNEL', 'keterangan'),
(218, 'CSI.016', 'CSI', 'VAUDE', 'keterangan'),
(219, 'CSI.047', 'CSI', 'VELD BED', 'keterangan'),
(220, 'CSI.067', 'CSI', 'VIBRAM FINGER', 'keterangan'),
(221, 'KSY.005', 'KSY', 'VICTORINOX', 'keterangan'),
(222, 'ACT.015', 'ACT', 'WALL 25', 'keterangan'),
(223, 'ACT.005', 'ACT', 'WASH BAG', 'keterangan'),
(224, 'CSI.127', 'CSI', 'WATER BLADDER', 'keterangan'),
(225, 'CSI.136', 'CSI', 'WATER CARRIER', 'keterangan'),
(226, 'CSI.053', 'CSI', 'WATER TANK', 'keterangan'),
(227, 'CSI.051', 'CSI', 'WEBBING', 'keterangan'),
(228, 'CSI.007', 'CSI', 'WHITE LED', 'keterangan'),
(229, 'BZR.002', 'BZR', 'WOMEN HARRIS', 'keterangan'),
(230, 'CSI.055', 'CSI', 'ZEBEC', 'keterangan'),
(231, 'CSI.108', 'CSI', 'ZERO POINT', 'keterangan'),
(232, 'CSI.130', 'CSI', 'ZIENER', 'keterangan'),
(233, 'CSI.089', 'CSI', 'ZONA WIND', 'keterangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
`KODE_KASIR` int(11) NOT NULL,
  `NAMA_KASIR` varchar(100) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `STATE_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`KODE_KASIR`, `NAMA_KASIR`, `USERNAME`, `PASSWORD`, `STATE_ID`) VALUES
(1, 'fajar', 'fajar', 'fajar', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`ID_KATEGORI` int(11) NOT NULL,
  `KODE_KATEGORI` varchar(10) NOT NULL,
  `NAMA_KATEGORI` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `KODE_KATEGORI`, `NAMA_KATEGORI`) VALUES
(1, 'ACF', 'ACCES FASHION'),
(2, 'ACT', 'ACCES TAS'),
(3, 'BAG', 'TAS'),
(4, 'BZR', 'BAZZAR'),
(5, 'CSI', 'CONSINA IMPORT'),
(6, 'DPK', 'DAYPACK'),
(7, 'FSH', 'FASHION'),
(8, 'INV', 'INVENTARIS KANTOR'),
(9, 'JAM', 'JAM TANGAN'),
(10, 'PTN', 'POTONGAN'),
(11, 'SPL', 'SAMPLE'),
(12, 'TEN', 'TENDA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manufacturing`
--

CREATE TABLE IF NOT EXISTS `manufacturing` (
  `MAN_ID_MANUFACTURING` varchar(100) NOT NULL,
  `MAN_KODE_BARANG` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `manufacturing`
--

INSERT INTO `manufacturing` (`MAN_ID_MANUFACTURING`, `MAN_KODE_BARANG`) VALUES
('PSN-201500001', 'KSY.005.072.001'),
('PSN-201500002', 'KSY.005.140.001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlet`
--

CREATE TABLE IF NOT EXISTS `outlet` (
`KODE_OUTLET` int(11) NOT NULL,
  `NAMA_OUTLET` varchar(100) NOT NULL,
  `LOKASI` int(11) NOT NULL,
  `ALAMAT` text NOT NULL,
  `NO_TELEPON` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `outlet`
--

INSERT INTO `outlet` (`KODE_OUTLET`, `NAMA_OUTLET`, `LOKASI`, `ALAMAT`, `NO_TELEPON`) VALUES
(1, 'CONSINA Jakarta (Buaran)', 1, '<p>Jl. Buaran Raya No.4 Duren Sawit</p>\n', '021-86600464'),
(2, 'CONSINA Jakarta (Rawamangun)', 1, '<p>Jl. Pemuda No.40 Rawamangun</p>\n', '021-29833838'),
(3, 'CONSINA Jakarta (Warung Buncit)', 6, '<p>Jl. Warung Buncit No.2B Mampang</p>\n', '021-7975468'),
(4, 'CONSINA Jakarta (Cililitan)', 1, '<p>Jl. Dewi Sartika No.2 Cililitan</p>\n', ' 021-8003362'),
(5, 'CONSINA Bogor (Puncak)', 7, '<p>Jl. Raya Puncak KM.77 Leuwi Malang</p>\n', '0251-8257755 / 8257744 '),
(6, 'CONSINA Garut', 8, '<p>Komplek Ruko IBC, Jl. Pramuka No.C1</p>\n', ''),
(7, 'CONSINA Yogyakarta', 9, '<p>Jl. Mataram No.90 Yogyakarta. (Depan Golf Arena)</p>\n', '0274-561443'),
(8, 'CONSINA Malang (Panjaitan)', 10, '<p>Jl. Mayjen Panjaitan No.64B</p>\n', '0341-578487 '),
(9, 'CONSINA Malang (Kawi)', 10, '<p>Jl. Kawi 39-A1, Malang</p>\n', '0341-348066'),
(10, 'CONSINA Malang (Dinoyo)', 10, '<p>Jl. MT. Haryono No.97, Dinoyo</p>\n', '0341-571358'),
(11, 'CONSINA Surabaya', 11, '<p>Jl. Ngagel Jaya Selatan 159</p>\n', '031-5040617'),
(12, 'CONSINA Ubud', 12, '<p>Jl. Monkey Forest No.99, Pertigaan Bebek Bengil, Ubud</p>\n', '0361-483015'),
(13, 'CONSINA Store Mataram', 13, '<p>Jl. Panca Usaha No.15B Mataram</p>\n', '0370-648031'),
(14, 'CONSINA Store Aceh', 14, '<p>Jl. T. Nyak Arief No.4 Lamnyong</p>\n', ''),
(15, 'CONSINA Store Denpasar', 12, '<p>Jl. Cokrominoto No.11 Denpasar,Bali. (Depan Tiara Grosir)</p>\n', ' 0361-442889'),
(16, 'CONSINA Store Bengkulu', 15, '<p>Jl. Sudirman No.7 Pintu Batu</p>\n', ''),
(17, 'CONSINA Store Cikampek', 16, '<p>Jl. Cikampek - Karawang KM.8 No.47 Ds. Mekarjaya, Kec. Purwasari, Kab. Karawang, 41373</p>\n', '0267-8615952'),
(18, 'CONSINA Store Jember', 10, '<p>Jl. Gatot Subroto No.45 Jember</p>\n', '0331-427645'),
(19, 'CONSINA Store Palu', 17, '<p>Jl. Cumi-Cumi, Ruko Taman Ria, No.28-29</p>\n', '0451-4133388 ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`ID_PELANGGAN` int(100) NOT NULL,
  `GOLONGAN_PELANGGAN` text NOT NULL,
  `JENIS_PELANGGAN` text NOT NULL,
  `PRODUK_PELANGGAN` text NOT NULL,
  `KODE_PELANGGAN` varchar(50) NOT NULL,
  `NAMA_PELANGGAN` varchar(100) NOT NULL,
  `ALAMAT` text NOT NULL,
  `KOTA` varchar(50) NOT NULL,
  `NO_TELP` int(20) NOT NULL,
  `NO_TELP2` int(20) NOT NULL,
  `TANGGAL_TERDAFTAR` date NOT NULL,
  `BANK` varchar(100) NOT NULL,
  `NO_REKENING` text NOT NULL,
  `PEMILIK_REKENING` text NOT NULL,
  `KETERANGAN` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`ID_PELANGGAN`, `GOLONGAN_PELANGGAN`, `JENIS_PELANGGAN`, `PRODUK_PELANGGAN`, `KODE_PELANGGAN`, `NAMA_PELANGGAN`, `ALAMAT`, `KOTA`, `NO_TELP`, `NO_TELP2`, `TANGGAL_TERDAFTAR`, `BANK`, `NO_REKENING`, `PEMILIK_REKENING`, `KETERANGAN`) VALUES
(1, 'Golongan 1', 'Jenis 1', 'Produk 1', 'P0000001', 'Ahmad Saepudin', '<p>Jl.Muara</p>\n', 'Jakarta', 2147483647, 2147483647, '0000-00-00', 'BCA', '12332145127', 'Ahmad Saepudin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan_penjualan`
--

CREATE TABLE IF NOT EXISTS `pengaturan_penjualan` (
`PARAMETER_ID` int(11) NOT NULL,
  `PARAMETER_NAME` text NOT NULL,
  `PARAMETER_VALUE` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `pengaturan_penjualan`
--

INSERT INTO `pengaturan_penjualan` (`PARAMETER_ID`, `PARAMETER_NAME`, `PARAMETER_VALUE`) VALUES
(1, 'Pajak penjualan', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman_barang`
--

CREATE TABLE IF NOT EXISTS `pengiriman_barang` (
`ID` int(11) NOT NULL,
  `ID_PENGIRIMAN` varchar(100) NOT NULL,
  `OUTLET` int(11) NOT NULL,
  `TANGGAL_PENGIRIMAN` date NOT NULL,
  `TANGGAL_PENERIMAAN` date NOT NULL,
  `PENERIMA` int(11) NOT NULL,
  `PENGIRIM` int(11) NOT NULL,
  `STATUS_PENGIRIMAN` varchar(50) NOT NULL,
  `KETERANGAN` text NOT NULL,
  `DISKON` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `pengiriman_barang`
--

INSERT INTO `pengiriman_barang` (`ID`, `ID_PENGIRIMAN`, `OUTLET`, `TANGGAL_PENGIRIMAN`, `TANGGAL_PENERIMAAN`, `PENERIMA`, `PENGIRIM`, `STATUS_PENGIRIMAN`, `KETERANGAN`, `DISKON`) VALUES
(17, '25/08/JB-000001', 2, '2015-08-25', '2015-08-25', 1, 1, 'DITERIMA', '<p>LUNAS</p>\n', 0),
(18, '25/08/JB-000002', 2, '2015-08-25', '2015-08-25', 1, 1, 'DITERIMA', '<p>LUNAS</p>\n', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
`ID_PENJUALAN` int(11) NOT NULL,
  `NO_NOTA_PENJUALAN` varchar(50) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `OPERATOR_KASIR` int(11) NOT NULL,
  `SUB_TOTAL_PENJUALAN` int(11) NOT NULL,
  `TIPE_PEMBAYARAN` varchar(10) NOT NULL,
  `DISKON_PENJUALAN` int(11) NOT NULL,
  `TAX_SALES` int(11) NOT NULL,
  `UANG_BAYAR` int(11) NOT NULL,
  `UANG_KEMBALI` int(11) NOT NULL,
  `PELANGGAN` varchar(100) NOT NULL,
  `CATATAN` text NOT NULL,
  `STATUS` text NOT NULL,
  `DISKON_PELANGGAN` int(11) NOT NULL,
  `NAMA_BANK` text NOT NULL,
  `NO_KARTU` text NOT NULL,
  `OUTLET` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`ID_PENJUALAN`, `NO_NOTA_PENJUALAN`, `TANGGAL`, `OPERATOR_KASIR`, `SUB_TOTAL_PENJUALAN`, `TIPE_PEMBAYARAN`, `DISKON_PENJUALAN`, `TAX_SALES`, `UANG_BAYAR`, `UANG_KEMBALI`, `PELANGGAN`, `CATATAN`, `STATUS`, `DISKON_PELANGGAN`, `NAMA_BANK`, `NO_KARTU`, `OUTLET`) VALUES
(6, 'JR08/30/150001-5', '2015-08-30 16:01:13', 9, 1011600, 'CASH', 0, 0, 1100000, 88400, '', '', 'LUNAS', 0, '', '', 5),
(7, 'JR08/30/150002-1', '2015-08-30 16:11:28', 9, 72000, 'CASH', 0, 0, 72000, 0, '', '', 'LUNAS', 0, '', '', 5),
(8, 'JR08/30/150003-5', '2015-08-30 16:13:33', 9, 45360, 'CASH', 5040, 0, 46000, 640, '', '', 'LUNAS', 0, '', '', 5),
(9, 'JR08/30/150004-1', '2015-08-30 16:37:38', 6, 950000, 'CASH', 0, 0, 950000, 0, '', '', 'LUNAS', 0, '', '', 1),
(10, 'JR08/31/150005-5', '2015-08-31 12:31:28', 9, 19000, 'DEBET', 0, 0, 20000, 1000, '', '', 'LUNAS', 0, 'BCA ', '126152615276', 5),
(11, 'JR09/01/150006-5', '2015-09-01 16:30:22', 9, 544500, 'CASH', 0, 0, 600000, 55500, '', '', 'LUNAS', 0, '', '', 5),
(12, 'JR10/20/150007-1', '2015-10-20 18:51:06', 6, 2850000, 'CASH', 0, 0, 2900000, 50000, '', '', 'LUNAS', 0, '', '', 1),
(13, 'JR10/22/150008-1', '2015-10-22 21:57:44', 6, 1700000, 'CASH', 0, 0, 1700000, 0, '', '', 'LUNAS', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_grosir`
--

CREATE TABLE IF NOT EXISTS `penjualan_grosir` (
`ID_PENJUALAN` int(11) NOT NULL,
  `NO_NOTA_PENJUALAN` varchar(50) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `OPERATOR_KASIR` int(11) NOT NULL,
  `SUB_TOTAL_PENJUALAN` int(11) NOT NULL,
  `TIPE_PEMBAYARAN` varchar(10) NOT NULL,
  `DISKON_PENJUALAN` int(11) NOT NULL,
  `TAX_SALES` int(11) NOT NULL,
  `UANG_BAYAR` int(11) NOT NULL,
  `UANG_KEMBALI` int(11) NOT NULL,
  `PELANGGAN` varchar(100) NOT NULL,
  `CATATAN` text NOT NULL,
  `STATUS` text NOT NULL,
  `DISKON_PELANGGAN` int(11) NOT NULL,
  `NAMA_BANK` text NOT NULL,
  `NO_KARTU` text NOT NULL,
  `OUTLET` int(11) NOT NULL,
  `JATUH_TEMPO` date NOT NULL,
  `BIAYA_KIRIM` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `penjualan_grosir`
--

INSERT INTO `penjualan_grosir` (`ID_PENJUALAN`, `NO_NOTA_PENJUALAN`, `TANGGAL`, `OPERATOR_KASIR`, `SUB_TOTAL_PENJUALAN`, `TIPE_PEMBAYARAN`, `DISKON_PENJUALAN`, `TAX_SALES`, `UANG_BAYAR`, `UANG_KEMBALI`, `PELANGGAN`, `CATATAN`, `STATUS`, `DISKON_PELANGGAN`, `NAMA_BANK`, `NO_KARTU`, `OUTLET`, `JATUH_TEMPO`, `BIAYA_KIRIM`) VALUES
(5, 'GR10/23/150001-1', '2015-10-23 12:35:04', 6, 975000, 'HUTANG', 0, 0, 975000, 0, 'P0000001', '', 'LUNAS', 0, 'TIDAK ADA', '', 1, '2015-12-30', 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyesuaian_stok_outlet`
--

CREATE TABLE IF NOT EXISTS `penyesuaian_stok_outlet` (
  `id` varchar(13) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_penyesuaian` varchar(50) DEFAULT NULL,
  `id_barang` varchar(100) DEFAULT NULL,
  `tambah` int(11) NOT NULL DEFAULT '0',
  `kurang` int(11) NOT NULL DEFAULT '0',
  `keterangan` text,
  `user_posting` varchar(30) DEFAULT NULL,
  `outlet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `penyesuaian_stok_outlet`
--
DELIMITER //
CREATE TRIGGER `adjustoutlet` AFTER INSERT ON `penyesuaian_stok_outlet`
 FOR EACH ROW BEGIN
  update 
    barang_outlet
  set
    STOK = (STOK + new.tambah ),
    STOK = (STOK - new.kurang )
   where KODE_BARANG=new.id_barang 
   and OUTLET=new.outlet;
  END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `adjustoutlethapus` AFTER DELETE ON `penyesuaian_stok_outlet`
 FOR EACH ROW BEGIN
  update 
    barang_outlet
  set
    STOK = (STOK - old.tambah ),
    STOK = (STOK + old.kurang )
   where KODE_BARANG=old.id_barang 
   and OUTLET=old.outlet;
  END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyesuaian_stok_pusat`
--

CREATE TABLE IF NOT EXISTS `penyesuaian_stok_pusat` (
  `id` varchar(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `no_penyesuaian` varchar(50) DEFAULT NULL,
  `id_barang` int(100) DEFAULT NULL,
  `tambah` int(11) NOT NULL DEFAULT '0',
  `kurang` int(11) NOT NULL DEFAULT '0',
  `keterangan` text,
  `user_posting` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Trigger `penyesuaian_stok_pusat`
--
DELIMITER //
CREATE TRIGGER `hapusadjust` AFTER DELETE ON `penyesuaian_stok_pusat`
 FOR EACH ROW BEGIN
  update 
    barang_pusat 
  set
    STOK = (STOK - old.tambah ),
    STOK = (STOK + old.kurang )
   where ID_BARANG=old.id_barang;
  END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `tambahadjust` AFTER INSERT ON `penyesuaian_stok_pusat`
 FOR EACH ROW BEGIN
  update 
    barang_pusat 
  set
    STOK = (STOK + new.tambah ),
    STOK = (STOK - new.kurang )
   where ID_BARANG=new.id_barang;
  END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `printer_config`
--

CREATE TABLE IF NOT EXISTS `printer_config` (
`ID_CONFIG` int(11) NOT NULL,
  `OUTLET` int(11) NOT NULL,
  `PRINTER_NAME` text NOT NULL,
  `IP_ADRRESS` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `printer_config`
--

INSERT INTO `printer_config` (`ID_CONFIG`, `OUTLET`, `PRINTER_NAME`, `IP_ADRRESS`) VALUES
(1, 5, 'EPSON TM-U220', '127.0.0.1'),
(2, 6, 'Epson TX-001', '127.0.0.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_konsinyasi`
--

CREATE TABLE IF NOT EXISTS `retur_konsinyasi` (
  `NO_RETUR` varchar(50) NOT NULL,
  `NO_NOTA_KONSINYASI` varchar(50) NOT NULL,
  `TANGGAL_RETUR` datetime NOT NULL,
  `OPERATOR_KASIR` int(11) NOT NULL,
  `CATATAN` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retur_konsinyasi`
--

INSERT INTO `retur_konsinyasi` (`NO_RETUR`, `NO_NOTA_KONSINYASI`, `TANGGAL_RETUR`, `OPERATOR_KASIR`, `CATATAN`) VALUES
('RK10/23/150001', 'KN10/23/150001-1', '2015-10-23 23:45:43', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_penjualan`
--

CREATE TABLE IF NOT EXISTS `retur_penjualan` (
  `NO_RETUR` varchar(50) NOT NULL,
  `NO_NOTA_PENJUALAN` varchar(50) NOT NULL,
  `TANGGAL_RETUR` datetime NOT NULL,
  `OPERATOR_KASIR` int(11) NOT NULL,
  `CATATAN` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retur_penjualan`
--

INSERT INTO `retur_penjualan` (`NO_RETUR`, `NO_NOTA_PENJUALAN`, `TANGGAL_RETUR`, `OPERATOR_KASIR`, `CATATAN`) VALUES
('RT10/20/150001', 'JR10/20/150007-1', '2015-10-20 23:49:35', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_barang`
--

CREATE TABLE IF NOT EXISTS `satuan_barang` (
`KODE_SATUAN` int(11) NOT NULL,
  `NAMA_SATUAN` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `satuan_barang`
--

INSERT INTO `satuan_barang` (`KODE_SATUAN`, `NAMA_SATUAN`) VALUES
(1, 'PCS'),
(2, 'ROLL'),
(3, 'METER'),
(4, 'PACK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`ID_SUPPLIER` int(11) NOT NULL,
  `KODE_SUPPLIER` varchar(15) NOT NULL,
  `NAMA_SUPPLIER` varchar(100) NOT NULL,
  `ALAMAT` text NOT NULL,
  `NO_TELEPON` int(11) NOT NULL,
  `NAMA_PERUSAHAAN` varchar(50) NOT NULL,
  `TANGGAL_TERDAFTAR` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`ID_SUPPLIER`, `KODE_SUPPLIER`, `NAMA_SUPPLIER`, `ALAMAT`, `NO_TELEPON`, `NAMA_PERUSAHAAN`, `TANGGAL_TERDAFTAR`) VALUES
(1, 'PS00001', 'Wahyu', '<p>Jl.Muara Angke</p>\n', 2147483647, 'PT.Cahaya Alam', '2015-10-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_group_users`
--

CREATE TABLE IF NOT EXISTS `sys_group_users` (
`id` int(11) NOT NULL,
  `level` varchar(50) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `sys_group_users`
--

INSERT INTO `sys_group_users` (`id`, `level`, `deskripsi`) VALUES
(1, 'admin', 'Administrator'),
(4, 'users', 'some basic users'),
(5, 'Kasir', 'Melakukan Trasaksi Penjualan'),
(6, 'admin outlet', 'mengelola outlet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_menu`
--

CREATE TABLE IF NOT EXISTS `sys_menu` (
`id` int(11) NOT NULL,
  `nav_act` varchar(150) DEFAULT NULL,
  `page_name` varchar(150) DEFAULT NULL,
  `url` varchar(100) NOT NULL,
  `main_table` varchar(150) DEFAULT NULL,
  `urutan_menu` int(11) DEFAULT NULL,
  `modul_id` int(11) DEFAULT NULL,
  `dt_table` enum('Y','N') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data untuk tabel `sys_menu`
--

INSERT INTO `sys_menu` (`id`, `nav_act`, `page_name`, `url`, `main_table`, `urutan_menu`, `modul_id`, `dt_table`) VALUES
(24, 'kategori', 'kategori', 'kategori', 'kategori', 1, 21, 'Y'),
(25, 'supplier', 'supplier', 'supplier', 'supplier', 2, 22, 'Y'),
(33, 'outlet', 'outlet', 'outlet', 'outlet', 7, 29, 'Y'),
(34, 'satuan', 'satuan', 'satuan', 'satuan_barang', 9, 28, 'Y'),
(40, 'kasir', 'Transaksi Ritel', 'kasir', 'penjualan', 12, 36, 'Y'),
(41, 'penjualan', 'laporan penjualan ritel', 'penjualan', 'penjualan', 15, 37, 'Y'),
(42, 'pengaturan_penjualan', 'pengaturan penjualan', 'pengaturan-penjualan', 'pengaturan_penjualan', 16, 38, 'Y'),
(43, 'cetak_barcode', 'cetak barcode', 'cetak-barcode', 'cetak_barcode', 22, 39, 'Y'),
(44, 'barang_pusat', 'Barang Gudang', 'barang-pusat', 'barang_pusat', 19, 40, 'Y'),
(45, 'pengiriman_barang', 'pengiriman barang', 'pengiriman-barang', 'pengiriman_barang', 99, NULL, 'Y'),
(46, 'barang_outlet', 'barang outlet', 'barang-outlet', 'barang_outlet', 98, 42, 'Y'),
(48, 'jenis_barang', 'jenis barang', 'jenis-barang', 'jenis_barang', 191, 43, 'Y'),
(50, 'laporan', 'laporan', 'laporan', 'penjualan', 212, 45, 'Y'),
(51, 'printer', 'printer', 'printer', 'printer_config', 313, 46, 'Y'),
(52, 'retur_penjualan', 'Retur Penjualan', 'retur-penjualan', 'penjualan', 989, 47, 'Y'),
(53, 'laporan_retur', 'Laporan Retur', 'laporan-retur', 'retur_penjualan', 456, 47, 'Y'),
(62, 'manufacturing', 'manufacturing', 'manufacturing', 'manufacturing', 200, 49, 'Y'),
(63, 'master_bahan', 'master bahan', 'master-bahan', 'bahan', 800, 49, 'Y'),
(64, 'kalkulasi_bahan', 'produksi', 'kalkulasi-bahan', 'head_kalkulasi_produksi', 300, 50, 'Y'),
(65, 'bahan_masuk', 'pembelian bahan (div pembelian)', 'bahan-masuk', 'head_bhn_masuk', 200, 50, 'Y'),
(66, 'cek_bahan_masuk', 'cek bahan masuk', 'cek-bahan-masuk', 'head_bhn_masuk', 111, 50, 'Y'),
(67, 'gudang_produksi', 'gudang produksi', 'gudang-produksi', 'gudang_produksi', 555, 49, 'Y'),
(68, 'mutasi_barang', 'mutasi barang', 'mutasi-barang', 'head_mutasi_prod', 997, 50, 'Y'),
(69, 'laporan_produksi', 'laporan Produksi', 'laporan-produksi', '', 99911, 51, 'Y'),
(70, 'aset', 'aset', 'aset', 'as_aset', 0, 52, 'Y'),
(71, 'mitra_kerja', 'mitra kerja', 'mitra-kerja', 'as_suplier', 1, 52, 'Y'),
(72, 'jenis_aset_inventaris', 'jenis aset inventaris', 'jenis-aset-inventaris', 'as_harta_berwujud', 2, 52, 'Y'),
(73, 'golongan_inventaris', 'golongan inventaris', 'golongan-inventaris', 'as_golongan', 3, 52, 'Y'),
(74, 'sub_golongan_inventaris', 'sub golongan inventaris', 'sub-golongan-inventaris', 'as_subgolongan', 4, 52, 'Y'),
(75, 'data_unit_kerja', 'data unit kerja', 'data-unit-kerja', 'as_unit_kerja', 5, 52, 'Y'),
(76, 'data_ruangan', 'data ruangan', 'data-ruangan', 'as_ruangan', 6, 52, 'Y'),
(77, 'pengadaan_aset', 'pengadaan aset', 'pengadaan-aset', 'as_head_pengadaan', 0, 53, 'Y'),
(78, 'detail_pengadaan_aset', 'detail pengadaan aset', 'detail-pengadaan-aset', 'as_pengadaan', 1, NULL, 'N'),
(79, 'mutasi_aset', 'mutasi aset', 'mutasi-aset', 'as_mutasi', 4, 53, 'Y'),
(80, 'pemeliharaan_aset', 'pemeliharaan aset', 'pemeliharaan-aset', 'as_maintenance', 5, 53, 'Y'),
(81, 'perubahan_status_aset', 'perubahan status aset', 'perubahan-status-aset', 'as_history_ubah', 6, 53, 'Y'),
(82, 'laporan_aset', 'Laporan Aset', 'laporan-aset', 'as_aset', 0, 54, 'Y'),
(83, 'penempatan_aset', 'penempatan aset', 'penempatan-aset', 'as_inventarisasi', 2, 53, 'Y'),
(84, 'laporan_penempatan_aset', 'laporan penempatan aset', 'laporan-penempatan-aset', 'as_inventarisasi', 2, 54, 'Y'),
(85, 'laporan_mutasi_aset', 'laporan mutasi aset', 'laporan-mutasi-aset', 'as_mutasi', 53, 54, 'Y'),
(86, 'laporan_pemeliharaan_aset', 'laporan pemeliharaan aset', 'laporan-pemeliharaan-aset', 'as_maintenance', 4, 54, 'Y'),
(87, 'mitra_usaha', 'Mitra Usaha', 'mitra-usaha', 'pelanggan', 367, 55, 'Y'),
(88, 'transaksi_grosir', 'Transaksi Grosir', 'transaksi-grosir', 'penjualan_grosir', 753, 56, 'Y'),
(89, 'piutang_grosir', 'Data Transaksi Grosir', 'piutang-grosir', 'penjualan_grosir', 878, 57, 'Y'),
(90, 'transaksi_konsinyasi', 'Transaksi Konsinyasi', 'transaksi-konsinyasi', 'transaksi_konsinyasi', 833, 58, 'Y'),
(91, 'data_transaksi_konsinyasi', 'Data Transaksi Konsinyasi', 'data-transaksi-konsinyasi', 'transaksi_konsinyasi', 807, 59, 'Y'),
(92, 'retur_konsinyasi', 'Retur Konsinyasi', 'retur-konsinyasi', 'transaksi_konsinyasi', 660, 60, 'Y'),
(93, 'laporan_retur_konsinyasi', 'Laporan Retur Konsinyasi', 'laporan-retur-konsinyasi', 'retur_konsinyasi', 771, 60, 'Y'),
(94, 'stock_adjustment_pusat', 'stock adjustment pusat', 'stock-adjustment-pusat', 'penyesuaian_stok_pusat', 0, 61, 'Y'),
(95, 'stock_adjustment_outlet', 'stock adjustment outlet', 'stock-adjustment-outlet', 'penyesuaian_stok_outlet', 1, 61, 'Y'),
(96, 'stok_ofname_outlet', 'stok ofname outlet', 'stok-ofname-outlet', 'head_ofname_outlet', 2, 61, 'Y'),
(98, 'stok_ofname_pusat', 'stok ofname pusat', 'stok-ofname-pusat', 'head_ofname_pusat', 3, 61, 'Y'),
(101, 'item_transfer', 'Item Transfer', 'item-transfer', 'item_transfer', 9987, 64, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_menu_role`
--

CREATE TABLE IF NOT EXISTS `sys_menu_role` (
`id` int(11) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `read_act` enum('Y','N') DEFAULT NULL,
  `insert_act` enum('Y','N') DEFAULT NULL,
  `update_act` enum('Y','N') DEFAULT NULL,
  `delete_act` enum('Y','N') DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=237 ;

--
-- Dumping data untuk tabel `sys_menu_role`
--

INSERT INTO `sys_menu_role` (`id`, `id_menu`, `group_id`, `read_act`, `insert_act`, `update_act`, `delete_act`) VALUES
(47, 24, 1, 'Y', 'Y', 'Y', 'Y'),
(48, 24, 4, 'N', 'N', 'N', 'N'),
(49, 25, 1, 'Y', 'Y', 'Y', 'Y'),
(50, 25, 4, 'N', 'N', 'N', 'N'),
(63, 24, 5, 'N', 'N', 'N', 'N'),
(64, 25, 5, 'N', 'N', 'N', 'N'),
(71, 33, 1, 'Y', 'Y', 'Y', 'Y'),
(72, 33, 4, 'N', 'N', 'N', 'N'),
(73, 33, 5, 'N', 'N', 'N', 'N'),
(74, 34, 1, 'Y', 'Y', 'Y', 'Y'),
(75, 34, 4, 'N', 'N', 'N', 'N'),
(76, 34, 5, 'N', 'N', 'N', 'N'),
(92, 40, 1, 'Y', 'Y', 'Y', 'Y'),
(93, 40, 4, 'N', 'N', 'N', 'N'),
(94, 40, 5, 'Y', 'Y', 'N', 'N'),
(95, 41, 1, 'Y', 'Y', 'Y', 'Y'),
(96, 41, 4, 'N', 'N', 'N', 'N'),
(97, 41, 5, 'Y', 'N', 'N', 'N'),
(98, 42, 1, 'Y', 'Y', 'Y', 'Y'),
(99, 42, 4, 'N', 'N', 'N', 'N'),
(100, 42, 5, 'N', 'N', 'N', 'N'),
(101, 43, 1, 'Y', 'Y', 'Y', 'Y'),
(102, 43, 4, 'N', 'N', 'N', 'N'),
(103, 43, 5, 'N', 'N', 'N', 'N'),
(104, 44, 1, 'Y', 'Y', 'Y', 'Y'),
(105, 44, 4, 'N', 'N', 'N', 'N'),
(106, 44, 5, 'N', 'N', 'N', 'N'),
(107, 45, 1, 'Y', 'Y', 'Y', 'Y'),
(108, 45, 4, 'N', 'N', 'N', 'N'),
(109, 45, 5, 'N', 'N', 'N', 'N'),
(110, 46, 1, 'Y', 'Y', 'Y', 'Y'),
(111, 46, 4, 'N', 'N', 'N', 'N'),
(112, 46, 5, 'Y', 'Y', 'Y', 'N'),
(113, 24, 6, 'Y', 'Y', 'Y', 'N'),
(114, 25, 6, 'N', 'N', 'N', 'N'),
(116, 34, 6, 'Y', 'Y', 'Y', 'N'),
(117, 33, 6, 'N', 'N', 'N', 'N'),
(118, 40, 6, 'Y', 'Y', 'Y', 'Y'),
(119, 41, 6, 'Y', 'Y', 'Y', 'Y'),
(120, 42, 6, 'Y', 'Y', 'Y', 'Y'),
(121, 43, 6, 'Y', 'Y', 'Y', 'Y'),
(122, 44, 6, 'N', 'N', 'N', 'N'),
(123, 45, 6, 'Y', 'N', 'N', 'N'),
(124, 46, 6, 'Y', 'Y', 'Y', 'Y'),
(129, 48, 1, 'Y', 'Y', 'Y', 'Y'),
(130, 48, 4, 'N', 'N', 'N', 'N'),
(131, 48, 5, 'N', 'N', 'N', 'N'),
(132, 48, 6, 'N', 'N', 'N', 'N'),
(137, 50, 1, 'Y', 'Y', 'Y', 'Y'),
(138, 50, 4, 'N', 'N', 'N', 'N'),
(139, 50, 5, 'N', 'N', 'N', 'N'),
(140, 50, 6, 'N', 'N', 'N', 'N'),
(141, 51, 1, 'Y', 'Y', 'Y', 'Y'),
(142, 51, 4, 'N', 'N', 'N', 'N'),
(143, 51, 5, 'N', 'N', 'N', 'N'),
(144, 51, 6, 'N', 'N', 'N', 'N'),
(145, 52, 1, 'Y', 'Y', 'Y', 'Y'),
(146, 52, 4, 'N', 'N', 'N', 'N'),
(147, 52, 5, 'N', 'N', 'N', 'N'),
(148, 52, 6, 'N', 'N', 'N', 'N'),
(149, 53, 1, 'Y', 'Y', 'Y', 'Y'),
(150, 53, 4, 'N', 'N', 'N', 'N'),
(151, 53, 5, 'N', 'N', 'N', 'N'),
(152, 53, 6, 'N', 'N', 'N', 'N'),
(156, 62, 1, 'Y', 'Y', 'Y', 'Y'),
(157, 63, 1, 'Y', 'Y', 'Y', 'Y'),
(158, 64, 1, 'Y', 'Y', 'Y', 'Y'),
(159, 65, 1, 'Y', 'Y', 'Y', 'Y'),
(160, 66, 1, 'Y', 'Y', 'Y', 'Y'),
(161, 67, 1, 'Y', 'Y', 'Y', 'Y'),
(162, 68, 1, 'Y', 'Y', 'Y', 'Y'),
(163, 69, 1, 'Y', 'Y', 'Y', 'Y'),
(164, 70, 1, 'Y', 'Y', 'Y', 'Y'),
(165, 71, 1, 'Y', 'Y', 'Y', 'Y'),
(166, 72, 1, 'Y', 'Y', 'Y', 'Y'),
(167, 73, 1, 'Y', 'Y', 'Y', 'Y'),
(168, 74, 1, 'Y', 'Y', 'Y', 'Y'),
(169, 75, 1, 'Y', 'Y', 'Y', 'Y'),
(170, 76, 1, 'Y', 'Y', 'Y', 'Y'),
(171, 77, 1, 'Y', 'Y', 'Y', 'Y'),
(172, 78, 1, 'Y', 'Y', 'Y', 'Y'),
(173, 79, 1, 'Y', 'Y', 'Y', 'Y'),
(174, 80, 1, 'Y', 'Y', 'Y', 'Y'),
(175, 81, 1, 'Y', 'Y', 'Y', 'Y'),
(176, 82, 1, 'Y', 'Y', 'Y', 'Y'),
(177, 83, 1, 'Y', 'Y', 'Y', 'Y'),
(178, 84, 1, 'Y', 'Y', 'Y', 'Y'),
(179, 85, 1, 'Y', 'Y', 'Y', 'Y'),
(180, 86, 1, 'Y', 'Y', 'Y', 'Y'),
(181, 87, 1, 'Y', 'Y', 'Y', 'Y'),
(182, 87, 4, 'N', 'N', 'N', 'N'),
(183, 87, 5, 'N', 'N', 'N', 'N'),
(184, 87, 6, 'N', 'N', 'N', 'N'),
(185, 88, 1, 'Y', 'Y', 'Y', 'Y'),
(186, 88, 4, 'N', 'N', 'N', 'N'),
(187, 88, 5, 'N', 'N', 'N', 'N'),
(188, 88, 6, 'N', 'N', 'N', 'N'),
(189, 89, 1, 'Y', 'Y', 'Y', 'Y'),
(190, 89, 4, 'N', 'N', 'N', 'N'),
(191, 89, 5, 'N', 'N', 'N', 'N'),
(192, 89, 6, 'N', 'N', 'N', 'N'),
(193, 90, 1, 'Y', 'Y', 'Y', 'Y'),
(194, 90, 4, 'N', 'N', 'N', 'N'),
(195, 90, 5, 'N', 'N', 'N', 'N'),
(196, 90, 6, 'N', 'N', 'N', 'N'),
(197, 91, 1, 'Y', 'Y', 'Y', 'Y'),
(198, 91, 4, 'N', 'N', 'N', 'N'),
(199, 91, 5, 'N', 'N', 'N', 'N'),
(200, 91, 6, 'N', 'N', 'N', 'N'),
(201, 92, 1, 'Y', 'Y', 'Y', 'Y'),
(202, 92, 4, 'N', 'N', 'N', 'N'),
(203, 92, 5, 'N', 'N', 'N', 'N'),
(204, 92, 6, 'N', 'N', 'N', 'N'),
(205, 93, 1, 'Y', 'Y', 'Y', 'Y'),
(206, 93, 4, 'N', 'N', 'N', 'N'),
(207, 93, 5, 'N', 'N', 'N', 'N'),
(208, 93, 6, 'N', 'N', 'N', 'N'),
(209, 94, 1, 'Y', 'Y', 'Y', 'Y'),
(210, 94, 4, 'N', 'N', 'N', 'N'),
(211, 94, 5, 'N', 'N', 'N', 'N'),
(212, 94, 6, 'N', 'N', 'N', 'N'),
(213, 95, 1, 'Y', 'Y', 'Y', 'Y'),
(214, 95, 4, 'N', 'N', 'N', 'N'),
(215, 95, 5, 'N', 'N', 'N', 'N'),
(216, 95, 6, 'N', 'N', 'N', 'N'),
(217, 96, 1, 'Y', 'Y', 'Y', 'Y'),
(218, 96, 4, 'N', 'N', 'N', 'N'),
(219, 96, 5, 'N', 'N', 'N', 'N'),
(220, 96, 6, 'N', 'N', 'N', 'N'),
(221, 98, 1, 'Y', 'Y', 'Y', 'Y'),
(222, 98, 4, 'N', 'N', 'N', 'N'),
(223, 98, 5, 'N', 'N', 'N', 'N'),
(224, 98, 6, 'N', 'N', 'N', 'N'),
(233, 101, 1, 'Y', 'Y', 'Y', 'Y'),
(234, 101, 4, 'N', 'N', 'N', 'N'),
(235, 101, 5, 'N', 'N', 'N', 'N'),
(236, 101, 6, 'N', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_modul`
--

CREATE TABLE IF NOT EXISTS `sys_modul` (
`id` int(11) NOT NULL,
  `modul_name` varchar(100) NOT NULL DEFAULT '0',
  `urutan` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(50) NOT NULL DEFAULT '0',
  `tampil` enum('Y','N') NOT NULL DEFAULT 'Y',
  `application` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data untuk tabel `sys_modul`
--

INSERT INTO `sys_modul` (`id`, `modul_name`, `urutan`, `icon`, `tampil`, `application`) VALUES
(21, 'kategori', 1, 'glyphicon1 glyphicon-hdd', 'Y', 'POS'),
(22, 'supplier', 2, 'glyphicon1 glyphicon-user', 'Y', 'POS'),
(28, 'satuan', 8, 'glyphicon1 glyphicon-tags', 'Y', 'POS'),
(29, 'outlet', 7, 'glyphicon1 glyphicon-map-marker', 'Y', 'POS'),
(30, 'satuan', 9, 'glyphicon1 glyphicon-pushpin', 'Y', 'POS'),
(36, 'Transaksi Ritel', 12, 'glyphicon1 glyphicon-shopping-cart', 'Y', 'POS'),
(37, 'laporan penjualan ritel', 15, 'glyphicon1 glyphicon-book', 'Y', 'POS'),
(38, 'pengaturan penjualan', 16, 'glyphicon1 glyphicon-wrench', 'Y', 'POS'),
(39, 'cetak barcode', 22, 'glyphicon1 glyphicon-barcode', 'Y', 'POS'),
(40, 'barang gudang', 20, 'glyphicon1 glyphicon-hdd', 'Y', 'POS'),
(41, 'pengiriman barang', 99, 'glyphicon1 glyphicon-hdd', 'Y', 'POS'),
(42, 'barang outlet', 98, 'glyphicon1 glyphicon-import', 'Y', 'POS'),
(43, 'jenis barang', 192, 'glyphicon1 glyphicon-bookmark', 'Y', 'POS'),
(45, 'laporan ', 212, 'glyphicon1 glyphicon-book', 'Y', 'POS'),
(46, 'printer', 321, 'glyphicon1 glyphicon-print', 'Y', 'POS'),
(47, 'retur penjualan', 989, 'glyphicon1 glyphicon-book', 'Y', 'POS'),
(48, 'laporan retur', 456, 'glyphicon1 glyphicon-book', 'Y', 'POS'),
(49, 'master', 121, 'glyphicon1 glyphicon-list-alt', 'Y', 'MANUFACTURE'),
(50, 'proses', 122, 'glyphicon1 glyphicon-pencil', 'Y', 'MANUFACTURE'),
(51, 'laporan', 123, 'glyphicon1 glyphicon-stats', 'Y', 'MANUFACTURE'),
(52, 'master data', 0, 'glyphicon1 glyphicon-list-alt', 'Y', 'ASSET'),
(53, 'proses', 1, 'glyphicon1 glyphicon-pencil', 'Y', 'ASSET'),
(54, 'laporan', 2, 'glyphicon1 glyphicon-file', 'Y', 'ASSET'),
(55, 'Mitra Usaha', 376, 'glyphicon1 glyphicon-user', 'Y', 'POS'),
(56, 'Transaksi Grosir', 735, 'glyphicon1 glyphicon-shopping-cart', 'Y', 'POS'),
(57, 'Data Transaksi Grosir', 786, 'glyphicon1 glyphicon-calendar', 'Y', 'POS'),
(58, 'Transaksi Konsinyasi', 933, 'glyphicon1 glyphicon-user', 'Y', 'POS'),
(59, 'Data Transaksi Konsinyasi', 800, 'glyphicon1 glyphicon-book', 'Y', 'POS'),
(60, 'Retur Konsinyasi', 660, 'glyphicon1 glyphicon-arrow-right', 'Y', 'POS'),
(61, 'Stok', 777, 'glyphicon1 glyphicon-shopping-cart', 'Y', 'POS'),
(64, 'Item Transfer', 9918, 'glyphicon1 glyphicon-check', 'Y', 'POS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_profil_perusahaan`
--

CREATE TABLE IF NOT EXISTS `sys_profil_perusahaan` (
  `NAMA_PERUSAHAAN` text NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE_1` int(20) NOT NULL,
  `PHONE_2` int(20) NOT NULL,
  `KOTA` varchar(100) NOT NULL,
  `FAXIMILI` varchar(100) NOT NULL,
  `ALAMAT` text NOT NULL,
  `NEGARA` varchar(100) NOT NULL,
  `logo` varchar(50) DEFAULT NULL,
`id` int(11) NOT NULL,
  `STATE_ID` int(11) NOT NULL,
  `COLOR` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `sys_profil_perusahaan`
--

INSERT INTO `sys_profil_perusahaan` (`NAMA_PERUSAHAAN`, `EMAIL`, `PHONE_1`, `PHONE_2`, `KOTA`, `FAXIMILI`, `ALAMAT`, `NEGARA`, `logo`, `id`, `STATE_ID`, `COLOR`) VALUES
('CONSINA', 'consina2015@gmail.com', 2147483647, 2147483647, 'Bandung', '022-7561278', '<p>Jl.Soekarno Hatta no.456</p>\r\n', 'Indonesia', 'logo.png', 1, 1, '#147a04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_state`
--

CREATE TABLE IF NOT EXISTS `sys_state` (
`STATE_ID` int(11) NOT NULL,
  `STATE_NAME` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `sys_state`
--

INSERT INTO `sys_state` (`STATE_ID`, `STATE_NAME`) VALUES
(1, 'Jakarta Timur'),
(6, 'Jakarta Selatan'),
(7, 'Bogor'),
(8, 'Garut'),
(9, 'Yogyakarta'),
(10, 'Jawa Timur'),
(11, 'Surabaya'),
(12, 'Bali'),
(13, 'Lombok'),
(14, ' Banda Aceh'),
(15, 'Bengkulu'),
(16, 'Karawang'),
(17, 'Palu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_users`
--

CREATE TABLE IF NOT EXISTS `sys_users` (
`id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT '0',
  `last_name` varchar(50) NOT NULL DEFAULT '0',
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `foto_user` varchar(150) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `outlet` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `sys_users`
--

INSERT INTO `sys_users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `date_created`, `foto_user`, `id_group`, `state_id`, `outlet`) VALUES
(6, 'admin buaran', 'Consina', 'adminpusat', '5f070e44b4a535551380c8c15086a4eb', 'admin@gmail.com', '2015-08-29', '144536095130121.jpg', 1, 1, 1),
(7, 'adminoutlet', 'consina', 'adminoutlet', 'abf95baecd2bc6662b1341d30e84aa01', 'adminoutlet@gmail.com', '2015-08-29', '144093164719810.jpg', 6, 1, 1),
(8, 'adminbogor', 'adminbogor', 'adminbogor', 'ef0b8ccf257be38fd832ca366108ba25', 'adminbogor@gmail.com', '2015-08-29', '144093166032499.jpg', 6, 7, 5),
(9, 'kasirbogor', 'kasirbogor', 'kasirbogor', '166f4ef1dd8b0778d4f98ced2259369c', 'kasirbogor@gmail.com', '2015-08-29', '144207620814822.jpg', 5, 7, 5),
(10, 'adminrawamangun', 'rawamangun', 'rawamangun', '88530ddc93aa5cd6fc3d81dfb1d81dac', 'rawamangun@gmail.com', '2015-08-30', '144093170918352.jpg', 6, 6, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tampung_kalkulasi`
--

CREATE TABLE IF NOT EXISTS `tampung_kalkulasi` (
`URUT` int(100) NOT NULL,
  `TAM_HEAD` varchar(100) NOT NULL,
  `TAM_KODE_BARANG` varchar(100) NOT NULL,
  `TAM_NAMA_BARANG` varchar(100) NOT NULL,
  `TAM_JML_PROD` int(11) NOT NULL,
  `TAM_KAL_BAHAN` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tampung_kalkulasi`
--

INSERT INTO `tampung_kalkulasi` (`URUT`, `TAM_HEAD`, `TAM_KODE_BARANG`, `TAM_NAMA_BARANG`, `TAM_JML_PROD`, `TAM_KAL_BAHAN`) VALUES
(1, 'PRD-1020150004', 'KSY.005.072.001', 'COBA', 1, 'PRD-102015000416300'),
(2, 'PRD-1020150004', 'KSY.005.140.001', 'Coba Lagi', 1, 'PRD-102015000416301');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tampung_kalkulasi_detail`
--

CREATE TABLE IF NOT EXISTS `tampung_kalkulasi_detail` (
  `TAM_KAL_BAHAN` varchar(30) NOT NULL,
  `ID_KALKULASI` varchar(50) NOT NULL,
  `ID_BAHAN` varchar(30) NOT NULL,
  `NAMA_BAHAN` varchar(50) NOT NULL,
  `SATUAN` varchar(20) NOT NULL,
  `JML_PCS` int(11) NOT NULL,
  `JML_TOTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tampung_kalkulasi_detail`
--

INSERT INTO `tampung_kalkulasi_detail` (`TAM_KAL_BAHAN`, `ID_KALKULASI`, `ID_BAHAN`, `NAMA_BAHAN`, `SATUAN`, `JML_PCS`, `JML_TOTAL`) VALUES
('PRD-102015000416300', 'PRD-1020150004', 'BHN-00003', 'KAIN', 'ROLL', 30, 30),
('PRD-102015000416300', 'PRD-1020150004', 'BHN-00001', 'BENANG', 'ROL', 10, 10),
('PRD-102015000416301', 'PRD-1020150004', 'BHN-00001', 'BENANG', 'ROL', 10, 10),
('PRD-102015000416301', 'PRD-1020150004', 'BHN-00002', 'KANCING', 'Lusin', 20, 20),
('PRD-102015000416301', 'PRD-1020150004', 'BHN-00003', 'KAIN', 'ROLL', 30, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tampung_manufacturing`
--

CREATE TABLE IF NOT EXISTS `tampung_manufacturing` (
`urut` int(11) NOT NULL,
  `ID_MAN` varchar(100) NOT NULL,
  `ID_BARANG` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `ID_BAHAN` varchar(100) NOT NULL,
  `NAMA_BAHAN` varchar(100) NOT NULL,
  `SATUAN` varchar(30) NOT NULL,
  `JUMLAH_BAHAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_detail_bahan`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_bahan` (
`ID_TMP_BAHAN` int(11) NOT NULL,
  `NO_NOTA_BAHAN` varchar(50) NOT NULL,
  `ID_BAHAN` varchar(30) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `HARGA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_detail_item_transfer`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_item_transfer` (
`ID_TMP_TRANSFER` int(11) NOT NULL,
  `NO_TRANSFER` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `SESSION_PENJUALAN` text NOT NULL,
  `GRAND_PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_detail_konsinyasi`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_konsinyasi` (
`ID_TMP_DETAIL_KONSINYASI` int(11) NOT NULL,
  `NO_NOTA_KONSINYASI` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `GRAND_PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_penjualan` (
`ID_TMP_PENJUALAN` int(11) NOT NULL,
  `NO_NOTA_PENJUALAN` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `SESSION_PENJUALAN` text NOT NULL,
  `GRAND_PRICE` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tmp_detail_penjualan`
--

INSERT INTO `tmp_detail_penjualan` (`ID_TMP_PENJUALAN`, `NO_NOTA_PENJUALAN`, `KODE_BARANG`, `HARGA_BARANG`, `DISKON`, `JUMLAH`, `SESSION_PENJUALAN`, `GRAND_PRICE`) VALUES
(1, 'JR11/03/150009-1', 'CSI.116.002.009', 950000, 0, 1, '0', 950000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_detail_penjualan_grosir`
--

CREATE TABLE IF NOT EXISTS `tmp_detail_penjualan_grosir` (
`ID_TMP_PENJUALAN` int(11) NOT NULL,
  `NO_NOTA_PENJUALAN` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `SESSION_PENJUALAN` text NOT NULL,
  `GRAND_PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_mutasi_prd`
--

CREATE TABLE IF NOT EXISTS `tmp_mutasi_prd` (
`URUT` int(11) NOT NULL,
  `KODE_MUTASI` varchar(50) NOT NULL,
  `KODE_BARANG` varchar(30) NOT NULL,
  `JML_BARANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_pengiriman_barang`
--

CREATE TABLE IF NOT EXISTS `tmp_pengiriman_barang` (
`ID_TMP_PENGIRIMAN` int(11) NOT NULL,
  `NO_NOTA_PENGIRIMAN` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `JUMLAH` int(11) NOT NULL,
  `SESSION_PENJUALAN` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_konsinyasi`
--

CREATE TABLE IF NOT EXISTS `transaksi_konsinyasi` (
`ID_KONSINYASI` int(11) NOT NULL,
  `NO_NOTA_KONSINYASI` varchar(50) NOT NULL,
  `TANGGAL` datetime NOT NULL,
  `OPERATOR_KASIR` int(11) NOT NULL,
  `SUB_TOTAL_PENJUALAN` int(11) NOT NULL,
  `TIPE_PEMBAYARAN` varchar(10) NOT NULL,
  `DISKON_PENJUALAN` int(11) NOT NULL,
  `TAX_SALES` int(11) NOT NULL,
  `UANG_BAYAR` int(11) NOT NULL,
  `UANG_KEMBALI` int(11) NOT NULL,
  `SUPPLIER` varchar(100) NOT NULL,
  `CATATAN` text NOT NULL,
  `STATUS` text NOT NULL,
  `DISKON_SUPPLIER` int(11) NOT NULL,
  `OUTLET` int(11) NOT NULL,
  `JATUH_TEMPO` date NOT NULL,
  `BIAYA_KIRIM` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `transaksi_konsinyasi`
--

INSERT INTO `transaksi_konsinyasi` (`ID_KONSINYASI`, `NO_NOTA_KONSINYASI`, `TANGGAL`, `OPERATOR_KASIR`, `SUB_TOTAL_PENJUALAN`, `TIPE_PEMBAYARAN`, `DISKON_PENJUALAN`, `TAX_SALES`, `UANG_BAYAR`, `UANG_KEMBALI`, `SUPPLIER`, `CATATAN`, `STATUS`, `DISKON_SUPPLIER`, `OUTLET`, `JATUH_TEMPO`, `BIAYA_KIRIM`) VALUES
(3, 'KN10/23/150001-1', '2015-10-23 22:55:03', 6, 570000, 'HUTANG', 0, 0, 0, -570000, '1', '', 'LUNAS', 0, 1, '2015-12-30', 20000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
 ADD PRIMARY KEY (`ID_BAHAN`);

--
-- Indexes for table `barang_pusat`
--
ALTER TABLE `barang_pusat`
 ADD PRIMARY KEY (`ID_BARANG`), ADD KEY `ID_KATEGORI` (`ID_KATEGORI`);

--
-- Indexes for table `cetak_barcode`
--
ALTER TABLE `cetak_barcode`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `detail_bhn_masuk`
--
ALTER TABLE `detail_bhn_masuk`
 ADD PRIMARY KEY (`URUT`), ADD KEY `DET_ID_BHN_MASUK` (`DET_ID_BHN_MASUK`), ADD KEY `DET_ID_BHN_MASUK_2` (`DET_ID_BHN_MASUK`);

--
-- Indexes for table `detail_item_transfer`
--
ALTER TABLE `detail_item_transfer`
 ADD PRIMARY KEY (`ID_DETAIL_TRANSFER`);

--
-- Indexes for table `detail_kalkulasi_angsur`
--
ALTER TABLE `detail_kalkulasi_angsur`
 ADD KEY `ANGSUR` (`ANGSUR`);

--
-- Indexes for table `detail_kalkulasi_bahan`
--
ALTER TABLE `detail_kalkulasi_bahan`
 ADD PRIMARY KEY (`URUT`), ADD KEY `ID_KALKULASI` (`ID_KALKULASI`), ADD KEY `ANGSUR` (`ANGSUR`);

--
-- Indexes for table `detail_kalkulasi_barang`
--
ALTER TABLE `detail_kalkulasi_barang`
 ADD PRIMARY KEY (`URUT`), ADD KEY `ID_KALKULASI` (`ID_KALKULASI`);

--
-- Indexes for table `detail_kalkulasi_penyesuaian`
--
ALTER TABLE `detail_kalkulasi_penyesuaian`
 ADD KEY `PENYESUAIAN` (`PENYESUAIAN`);

--
-- Indexes for table `detail_konsinyasi`
--
ALTER TABLE `detail_konsinyasi`
 ADD PRIMARY KEY (`ID_DETAIL_KONSINYASI`);

--
-- Indexes for table `detail_manufacturing`
--
ALTER TABLE `detail_manufacturing`
 ADD PRIMARY KEY (`URUT`), ADD KEY `DET_MAN_ID_MAN` (`DET_MAN_ID_MAN`);

--
-- Indexes for table `detail_mutasi_prod`
--
ALTER TABLE `detail_mutasi_prod`
 ADD KEY `KODE_MUTASI` (`KODE_MUTASI`);

--
-- Indexes for table `detail_ofname_outlet`
--
ALTER TABLE `detail_ofname_outlet`
 ADD KEY `id_head` (`id_head`);

--
-- Indexes for table `detail_ofname_pusat`
--
ALTER TABLE `detail_ofname_pusat`
 ADD KEY `id_head` (`id_head`);

--
-- Indexes for table `detail_pengiriman_barang`
--
ALTER TABLE `detail_pengiriman_barang`
 ADD PRIMARY KEY (`ID_PENGIRIMAN`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
 ADD PRIMARY KEY (`ID_DETAIL_PENJUALAN`);

--
-- Indexes for table `detail_penjualan_grosir`
--
ALTER TABLE `detail_penjualan_grosir`
 ADD PRIMARY KEY (`ID_detail_penjualan_grosir`);

--
-- Indexes for table `detail_retur_konsinyasi`
--
ALTER TABLE `detail_retur_konsinyasi`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `detail_retur_penjualan`
--
ALTER TABLE `detail_retur_penjualan`
 ADD PRIMARY KEY (`ID`), ADD KEY `NO_RETUR` (`NO_RETUR`);

--
-- Indexes for table `diskon_mitra`
--
ALTER TABLE `diskon_mitra`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `gudang_produksi`
--
ALTER TABLE `gudang_produksi`
 ADD PRIMARY KEY (`PRD_ID_BARANG`);

--
-- Indexes for table `head_bhn_masuk`
--
ALTER TABLE `head_bhn_masuk`
 ADD PRIMARY KEY (`ID_BHN_MASUK`);

--
-- Indexes for table `head_kalkulasi_produksi`
--
ALTER TABLE `head_kalkulasi_produksi`
 ADD PRIMARY KEY (`ID_KALKULASI`);

--
-- Indexes for table `head_mutasi_prod`
--
ALTER TABLE `head_mutasi_prod`
 ADD PRIMARY KEY (`KODE_MUTASI`);

--
-- Indexes for table `head_ofname_outlet`
--
ALTER TABLE `head_ofname_outlet`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_ofname_pusat`
--
ALTER TABLE `head_ofname_pusat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_transfer`
--
ALTER TABLE `item_transfer`
 ADD PRIMARY KEY (`ID_TRANSFER`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
 ADD PRIMARY KEY (`KODE_KASIR`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `manufacturing`
--
ALTER TABLE `manufacturing`
 ADD PRIMARY KEY (`MAN_ID_MANUFACTURING`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
 ADD PRIMARY KEY (`KODE_OUTLET`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`ID_PELANGGAN`);

--
-- Indexes for table `pengaturan_penjualan`
--
ALTER TABLE `pengaturan_penjualan`
 ADD PRIMARY KEY (`PARAMETER_ID`);

--
-- Indexes for table `pengiriman_barang`
--
ALTER TABLE `pengiriman_barang`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`ID_PENJUALAN`);

--
-- Indexes for table `penjualan_grosir`
--
ALTER TABLE `penjualan_grosir`
 ADD PRIMARY KEY (`ID_PENJUALAN`);

--
-- Indexes for table `penyesuaian_stok_outlet`
--
ALTER TABLE `penyesuaian_stok_outlet`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyesuaian_stok_pusat`
--
ALTER TABLE `penyesuaian_stok_pusat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printer_config`
--
ALTER TABLE `printer_config`
 ADD PRIMARY KEY (`ID_CONFIG`), ADD KEY `OUTLET` (`OUTLET`);

--
-- Indexes for table `retur_konsinyasi`
--
ALTER TABLE `retur_konsinyasi`
 ADD PRIMARY KEY (`NO_RETUR`);

--
-- Indexes for table `retur_penjualan`
--
ALTER TABLE `retur_penjualan`
 ADD PRIMARY KEY (`NO_RETUR`);

--
-- Indexes for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
 ADD PRIMARY KEY (`KODE_SATUAN`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`ID_SUPPLIER`);

--
-- Indexes for table `sys_group_users`
--
ALTER TABLE `sys_group_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_menu`
--
ALTER TABLE `sys_menu`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_sys_menu_sys_modul` (`modul_id`);

--
-- Indexes for table `sys_menu_role`
--
ALTER TABLE `sys_menu_role`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_sys_menu_role_sys_menu` (`id_menu`), ADD KEY `FK_sys_menu_role_sys_users` (`group_id`);

--
-- Indexes for table `sys_modul`
--
ALTER TABLE `sys_modul`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_profil_perusahaan`
--
ALTER TABLE `sys_profil_perusahaan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_state`
--
ALTER TABLE `sys_state`
 ADD PRIMARY KEY (`STATE_ID`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_sys_users_sys_group_users` (`id_group`);

--
-- Indexes for table `tampung_kalkulasi`
--
ALTER TABLE `tampung_kalkulasi`
 ADD PRIMARY KEY (`URUT`), ADD KEY `TAM_KAL_BAHAN` (`TAM_KAL_BAHAN`);

--
-- Indexes for table `tampung_kalkulasi_detail`
--
ALTER TABLE `tampung_kalkulasi_detail`
 ADD KEY `TAM_KAL_BAHAN` (`TAM_KAL_BAHAN`);

--
-- Indexes for table `tampung_manufacturing`
--
ALTER TABLE `tampung_manufacturing`
 ADD PRIMARY KEY (`urut`);

--
-- Indexes for table `tmp_detail_bahan`
--
ALTER TABLE `tmp_detail_bahan`
 ADD PRIMARY KEY (`ID_TMP_BAHAN`);

--
-- Indexes for table `tmp_detail_item_transfer`
--
ALTER TABLE `tmp_detail_item_transfer`
 ADD PRIMARY KEY (`ID_TMP_TRANSFER`);

--
-- Indexes for table `tmp_detail_konsinyasi`
--
ALTER TABLE `tmp_detail_konsinyasi`
 ADD PRIMARY KEY (`ID_TMP_DETAIL_KONSINYASI`);

--
-- Indexes for table `tmp_detail_penjualan`
--
ALTER TABLE `tmp_detail_penjualan`
 ADD PRIMARY KEY (`ID_TMP_PENJUALAN`);

--
-- Indexes for table `tmp_detail_penjualan_grosir`
--
ALTER TABLE `tmp_detail_penjualan_grosir`
 ADD PRIMARY KEY (`ID_TMP_PENJUALAN`);

--
-- Indexes for table `tmp_mutasi_prd`
--
ALTER TABLE `tmp_mutasi_prd`
 ADD PRIMARY KEY (`URUT`);

--
-- Indexes for table `tmp_pengiriman_barang`
--
ALTER TABLE `tmp_pengiriman_barang`
 ADD PRIMARY KEY (`ID_TMP_PENGIRIMAN`);

--
-- Indexes for table `transaksi_konsinyasi`
--
ALTER TABLE `transaksi_konsinyasi`
 ADD PRIMARY KEY (`ID_KONSINYASI`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_pusat`
--
ALTER TABLE `barang_pusat`
MODIFY `ID_BARANG` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16302;
--
-- AUTO_INCREMENT for table `cetak_barcode`
--
ALTER TABLE `cetak_barcode`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_bhn_masuk`
--
ALTER TABLE `detail_bhn_masuk`
MODIFY `URUT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `detail_item_transfer`
--
ALTER TABLE `detail_item_transfer`
MODIFY `ID_DETAIL_TRANSFER` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_kalkulasi_bahan`
--
ALTER TABLE `detail_kalkulasi_bahan`
MODIFY `URUT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `detail_kalkulasi_barang`
--
ALTER TABLE `detail_kalkulasi_barang`
MODIFY `URUT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `detail_konsinyasi`
--
ALTER TABLE `detail_konsinyasi`
MODIFY `ID_DETAIL_KONSINYASI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `detail_manufacturing`
--
ALTER TABLE `detail_manufacturing`
MODIFY `URUT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `detail_pengiriman_barang`
--
ALTER TABLE `detail_pengiriman_barang`
MODIFY `ID_PENGIRIMAN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
MODIFY `ID_DETAIL_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `detail_penjualan_grosir`
--
ALTER TABLE `detail_penjualan_grosir`
MODIFY `ID_detail_penjualan_grosir` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `detail_retur_konsinyasi`
--
ALTER TABLE `detail_retur_konsinyasi`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detail_retur_penjualan`
--
ALTER TABLE `detail_retur_penjualan`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `diskon_mitra`
--
ALTER TABLE `diskon_mitra`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `gudang_produksi`
--
ALTER TABLE `gudang_produksi`
MODIFY `PRD_ID_BARANG` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item_transfer`
--
ALTER TABLE `item_transfer`
MODIFY `ID_TRANSFER` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=234;
--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
MODIFY `KODE_KASIR` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `outlet`
--
ALTER TABLE `outlet`
MODIFY `KODE_OUTLET` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `ID_PELANGGAN` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengaturan_penjualan`
--
ALTER TABLE `pengaturan_penjualan`
MODIFY `PARAMETER_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengiriman_barang`
--
ALTER TABLE `pengiriman_barang`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
MODIFY `ID_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `penjualan_grosir`
--
ALTER TABLE `penjualan_grosir`
MODIFY `ID_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `printer_config`
--
ALTER TABLE `printer_config`
MODIFY `ID_CONFIG` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
MODIFY `KODE_SATUAN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `ID_SUPPLIER` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sys_group_users`
--
ALTER TABLE `sys_group_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sys_menu`
--
ALTER TABLE `sys_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `sys_menu_role`
--
ALTER TABLE `sys_menu_role`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=237;
--
-- AUTO_INCREMENT for table `sys_modul`
--
ALTER TABLE `sys_modul`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `sys_profil_perusahaan`
--
ALTER TABLE `sys_profil_perusahaan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sys_state`
--
ALTER TABLE `sys_state`
MODIFY `STATE_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `sys_users`
--
ALTER TABLE `sys_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tampung_kalkulasi`
--
ALTER TABLE `tampung_kalkulasi`
MODIFY `URUT` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tampung_manufacturing`
--
ALTER TABLE `tampung_manufacturing`
MODIFY `urut` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_detail_bahan`
--
ALTER TABLE `tmp_detail_bahan`
MODIFY `ID_TMP_BAHAN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_detail_item_transfer`
--
ALTER TABLE `tmp_detail_item_transfer`
MODIFY `ID_TMP_TRANSFER` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_detail_konsinyasi`
--
ALTER TABLE `tmp_detail_konsinyasi`
MODIFY `ID_TMP_DETAIL_KONSINYASI` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_detail_penjualan`
--
ALTER TABLE `tmp_detail_penjualan`
MODIFY `ID_TMP_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tmp_detail_penjualan_grosir`
--
ALTER TABLE `tmp_detail_penjualan_grosir`
MODIFY `ID_TMP_PENJUALAN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_mutasi_prd`
--
ALTER TABLE `tmp_mutasi_prd`
MODIFY `URUT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_pengiriman_barang`
--
ALTER TABLE `tmp_pengiriman_barang`
MODIFY `ID_TMP_PENGIRIMAN` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_konsinyasi`
--
ALTER TABLE `transaksi_konsinyasi`
MODIFY `ID_KONSINYASI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_kalkulasi_angsur`
--
ALTER TABLE `detail_kalkulasi_angsur`
ADD CONSTRAINT `detail_kalkulasi_angsur_ibfk_1` FOREIGN KEY (`ANGSUR`) REFERENCES `detail_kalkulasi_bahan` (`ANGSUR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_kalkulasi_bahan`
--
ALTER TABLE `detail_kalkulasi_bahan`
ADD CONSTRAINT `detail_kalkulasi_bahan_ibfk_1` FOREIGN KEY (`ID_KALKULASI`) REFERENCES `head_kalkulasi_produksi` (`ID_KALKULASI`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_kalkulasi_barang`
--
ALTER TABLE `detail_kalkulasi_barang`
ADD CONSTRAINT `detail_kalkulasi_barang_ibfk_1` FOREIGN KEY (`ID_KALKULASI`) REFERENCES `head_kalkulasi_produksi` (`ID_KALKULASI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_kalkulasi_penyesuaian`
--
ALTER TABLE `detail_kalkulasi_penyesuaian`
ADD CONSTRAINT `detail_kalkulasi_penyesuaian_ibfk_1` FOREIGN KEY (`PENYESUAIAN`) REFERENCES `detail_kalkulasi_bahan` (`ANGSUR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_manufacturing`
--
ALTER TABLE `detail_manufacturing`
ADD CONSTRAINT `detail_manufacturing_ibfk_1` FOREIGN KEY (`DET_MAN_ID_MAN`) REFERENCES `manufacturing` (`MAN_ID_MANUFACTURING`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_mutasi_prod`
--
ALTER TABLE `detail_mutasi_prod`
ADD CONSTRAINT `detail_mutasi_prod_ibfk_1` FOREIGN KEY (`KODE_MUTASI`) REFERENCES `head_mutasi_prod` (`KODE_MUTASI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_ofname_outlet`
--
ALTER TABLE `detail_ofname_outlet`
ADD CONSTRAINT `detail_ofname_outlet_ibfk_1` FOREIGN KEY (`id_head`) REFERENCES `head_ofname_outlet` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_ofname_pusat`
--
ALTER TABLE `detail_ofname_pusat`
ADD CONSTRAINT `detail_ofname_pusat_ibfk_1` FOREIGN KEY (`id_head`) REFERENCES `head_ofname_pusat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sys_menu`
--
ALTER TABLE `sys_menu`
ADD CONSTRAINT `FK_sys_menu_sys_modul` FOREIGN KEY (`modul_id`) REFERENCES `sys_modul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sys_menu_role`
--
ALTER TABLE `sys_menu_role`
ADD CONSTRAINT `FK_sys_menu_role_sys_group_users` FOREIGN KEY (`group_id`) REFERENCES `sys_group_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_sys_menu_role_sys_menu` FOREIGN KEY (`id_menu`) REFERENCES `sys_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sys_users`
--
ALTER TABLE `sys_users`
ADD CONSTRAINT `FK_sys_users_sys_group_users` FOREIGN KEY (`id_group`) REFERENCES `sys_group_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tampung_kalkulasi_detail`
--
ALTER TABLE `tampung_kalkulasi_detail`
ADD CONSTRAINT `tampung_kalkulasi_detail_ibfk_1` FOREIGN KEY (`TAM_KAL_BAHAN`) REFERENCES `tampung_kalkulasi` (`TAM_KAL_BAHAN`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2020 at 09:18 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motorcyclestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiet_donhang`
--

DROP TABLE IF EXISTS `chitiet_donhang`;
CREATE TABLE IF NOT EXISTS `chitiet_donhang` (
  `mactdh` int(10) NOT NULL AUTO_INCREMENT,
  `ma_donhang` int(10) NOT NULL,
  `maxe` varchar(20) NOT NULL,
  `soluong` int(20) NOT NULL,
  `gia` int(50) NOT NULL,
  PRIMARY KEY (`mactdh`),
  KEY `chitiet_donhang_ibfk_1` (`ma_donhang`),
  KEY `chitiet_donhang_ibfk_2` (`maxe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `maloai` varchar(5) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  PRIMARY KEY (`maloai`),
  UNIQUE KEY `tenloai` (`tenloai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`) VALUES
('01', 'HONDA'),
('06', 'KAWASAKI'),
('03', 'PIAGGIO'),
('04', 'SUZUKI'),
('05', 'SYM'),
('07', 'Xe Nhập Khẩu'),
('02', 'YAMAHA');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `ma_donhang` int(10) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(150) NOT NULL,
  `ghichu` text DEFAULT NULL,
  `tongcong` int(50) NOT NULL,
  PRIMARY KEY (`ma_donhang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quantri`
--

DROP TABLE IF EXISTS `quantri`;
CREATE TABLE IF NOT EXISTS `quantri` (
  `username` varchar(30) NOT NULL,
  `matkhau` varchar(32) CHARACTER SET latin1 NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `quyen` int(2) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quantri`
--

INSERT INTO `quantri` (`username`, `matkhau`, `hoten`, `quyen`) VALUES
('nhan', '827ccb0eea8a706c4c34a16891f84e7b', 'Lê Trí Nhân', 1),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Tri Nhan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

DROP TABLE IF EXISTS `xe`;
CREATE TABLE IF NOT EXISTS `xe` (
  `maxe` varchar(10) NOT NULL,
  `tenxe` varchar(150) NOT NULL,
  `mota` text DEFAULT NULL,
  `gia` int(100) NOT NULL,
  `hinh` varchar(40) DEFAULT NULL,
  `maloai` varchar(5) NOT NULL,
  PRIMARY KEY (`maxe`),
  KEY `maloai` (`maloai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`maxe`, `tenxe`, `mota`, `gia`, `hinh`, `maloai`) VALUES
('AB19', 'Air Blade 2019', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.089.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           47.945.000 VNĐ', 42000000, 'ABlade.png,AB6.png,AB7.png,AB8.png', '01'),
('Add110', 'Address 110 FI', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 29000000, 'ADDRESS110.png', '04'),
('Cli125', 'Click 125i 2020', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.634.000 VNĐ\r\nPhí biển số:              2.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           66.700.000 VNĐ', 62000000, 'click125.png', '07'),
('Cli150', 'Click 150i 2020', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         4.634.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           106.700.000 VNĐ', 98000000, 'Click150.png', '07'),
('Ex19', 'Exciter 150 2019', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           53.405.000 VNĐ', 50000000, 'Exciter.png,Ex4.png,Ex5.png,Ex6.png', '02'),
('FreeDB', 'FreeGo (Phiên bản đặc biệt)', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         1.874.000 VNĐ\r\nPhí biển số:              2.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:             41.430.000 VNĐ', 39000000, 'FreegoDB.png', '02'),
('FreeTC', 'FreeGo (Phiên bản tiêu chuẩn)', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         1.874.000 VNĐ\r\nPhí biển số:              2.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:             41.430.000 VNĐ', 32000000, 'FreegoTC.png', '02'),
('Gran', 'Grande Hybrid', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           53.405.000 VNĐ', 45000000, 'GrandeH.png', '02'),
('GSXBand', 'GSX 150 Bandit', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 69000000, 'Gsx150.png', '04'),
('GSXS150', 'GSX S150', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 69000000, 'GSXS150.png', '04'),
('Imp125', 'Impulse 125 FI 2019', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 31500000, 'Impulse125.png', '04'),
('KawZ1000', 'Kawasaki Z1000 2018', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         27.834.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           430.900.000 VNĐ', 399000000, 'z1000.jpg', '06'),
('KawZ3', 'Kawasaki Z300 2018', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         6.300.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            139.366.000 VNĐ', 129000000, 'z300.jpg', '06'),
('KawZ6', 'Kawasaki Z650 ABS 2018', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         13.334.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           235.400.000 VNĐ', 218000000, 'z650.jpg', '06'),
('KawZ8', 'Kawasaki Z800 ABS 2018', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         18.734.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           307.800.000 VNĐ', 285000000, 'z800.jpg', '06'),
('KawZ9', 'Kawasaki Z900 2018', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         18.934.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           311.000.000 VNĐ', 288000000, 'z900.jpg', '06'),
('KawZX10R', 'Kawasaki ZX 10-RR 2018', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         49.134.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           813.200.000 VNĐ', 760000000, 'ZX10-RR.jpg', '06'),
('Lat125', 'LATTE 125 2019', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         1.874.000 VNĐ\r\nPhí biển số:              2.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:             41.430.000 VNĐ', 37000000, 'Latte.png,LA2.png,LA9.png,LA6.png', '02'),
('Lib125', 'Liberty 125 E3 ABS', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 57000000, 'Liberty125.png', '03'),
('Med150', 'Medley 150cc ABS', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 88000000, 'MEDLEY-ABS.png', '03'),
('NVX', 'NVX 155cc ABS', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           53.405.000 VNĐ', 52000000, 'NVX155cc.png', '02'),
('Rai', 'Raider FI 150 2019', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 58000000, 'RaiderFi.png,Rai3.png,Rai5.png,Rai9.png', '04'),
('SaF150', 'Satria F150 2020', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 63000000, 'SatriaF150.png,Sa7.png,Sa6.png,Sa12.png', '04'),
('Sh150', 'SH 150i ABS', 'Hệ thống chống bó cứng phanh ABS.\r\nBình xăng với dung tích cực đại.\r\nHệ thống phanh ABS được trang bị ở cả phanh trước và phanh sau.\r\nChưa bao gồm:\r\nThuế trước bạ:         3.399.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           97.465.000 VNĐ', 90000000, 'SH150.png,sh4.png,sh9.png,sh7.png', '01'),
('Va125', 'Vario 125i 2020', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.134.000 VNĐ\r\nPhí biển số:              2.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           46.400.000 VNĐ', 42200000, 'Vario125.png', '07'),
('Va150', 'Vario 150i 2020', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.634.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           60.900.000 VNĐ', 54200000, 'Vario150.png', '07'),
('VesGTS125', 'Vespa GTS SUPER', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 89000000, 'VespaGTS125.png', '03'),
('VesGTS300', 'Vespa GTS SUPER 300 ABS', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 129000000, 'VespaGTS300.png', '03'),
('VesLX', 'Vespa LX 125 IGET', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 68000000, 'VespaLX125.png', '03'),
('VesSprint', 'Vespa Sprint ABS 2019', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.349.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:            VNĐ', 75000000, 'Sprint-ABS.png', '03'),
('Vis19', 'Vision 2019', 'Hệ thống chống bó cứng phanh ABS.\r\nHệ thống phanh ABS được trang bị ở cả phanh trước và phanh sau.\r\nGiá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         1.599.000 VNĐ\r\nPhí biển số:              2.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           35.655.000 VNĐ', 32000000, 'vision.png,vs4,vs5,vs8', '01'),
('Wa110', 'Wave Alpha 110cc', NULL, 18000000, 'WaveA110.png', '01'),
('Wa125i', 'Wave 125i', 'Giá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.634.000 VNĐ\r\nPhí biển số:              2.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           66.700.000 VNĐ', 62000000, 'Wave125i.png', '07'),
('Win', 'Winner', 'Phần đầu xe thay đổi mạnh ở thiết kế, với đèn pha được mang xuống dưới, chuyển thành đèn đôi\r\nCông nghệ LED, cùng với đèn xi-nhan lắp rời hai bên hông xe.\r\nThiết kế này khiến Winner X dễ dàng tạo cảm giác giống những chiếc sportbike phân khối lớn.\r\nPhần đầu xe có khe hở thiết kế lạ mắt, bên trong là còi xe.\r\nThuế trước bạ:         3.399.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           52.955.000 VNĐ', 42000000, 'WinnerV1.png', '01'),
('WinX', 'Winner X', 'Hệ thống chống bó cứng phanh ABS.\r\nHệ thống phanh ABS được trang bị ở cả phanh trước và phanh sau.\r\nGiá bán lẻ đề xuất (đã có thuế GTGT)\r\nChưa bao gồm:\r\nThuế trước bạ:         2.299.000 VNĐ\r\nPhí biển số:              4.000.000 VNĐ\r\nBảo hiểm dân sự:          66.000 VNĐ\r\nTổng cộng:           52.355.000 VNĐ', 47000000, 'WinnerX.png,wX3,wX5,wX8', '01');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD CONSTRAINT `chitiet_donhang_ibfk_1` FOREIGN KEY (`ma_donhang`) REFERENCES `order` (`ma_donhang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiet_donhang_ibfk_2` FOREIGN KEY (`maxe`) REFERENCES `xe` (`maxe`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `xe_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

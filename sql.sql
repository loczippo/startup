-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 30, 2021 lúc 10:46 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

DROP TABLE IF EXISTS `CRM_accounts`;
CREATE TABLE IF NOT EXISTS `CRM_accounts` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `CRM_accounts`
--

INSERT INTO `CRM_accounts` (`userid`, `username`, `password`, `role`) VALUES
(1, 'admin', 'abc@123', 'admin'),
(2, 'nhanvien1', 'abc@123', 'nhanvien'),
(3, 'nhanvien2', 'abc@123', 'nhanvien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

DROP TABLE IF EXISTS `CRM_customers`;
CREATE TABLE IF NOT EXISTS `CRM_customers` (
  `customerid` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(30) NOT NULL,
  `cmnd` varchar(11) NOT NULL,
  `sodt` varchar(11) NOT NULL,
  `hanmuc` decimal(18,0) NOT NULL,
  `trangthai` varchar(30) DEFAULT NULL,
  `ghichu` varchar(30) DEFAULT NULL,
  `sotien` decimal(18,0) DEFAULT NULL,
  `ngayhen` datetime DEFAULT NULL,
  `ngaygoi` datetime DEFAULT NULL,
  `ngaythem` datetime DEFAULT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`customerid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

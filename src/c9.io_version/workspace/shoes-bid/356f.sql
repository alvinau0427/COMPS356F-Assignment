-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 建立日期: 2018 年 12 月 07 日 03:19
-- 伺服器版本: 5.5.57-0ubuntu0.14.04.1
-- PHP 版本: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `356f`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `userID` varchar(15) NOT NULL,
  `userName` varchar(35) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Address` varchar(80) DEFAULT NULL,
  `Phone` varchar(30) DEFAULT NULL,
  `Email` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `account`
--

INSERT INTO `account` (`userID`, `userName`, `password`, `sex`, `DOB`, `Address`, `Phone`, `Email`) VALUES
('A10000', 'Guest', '21321546798356487ewafdx', 'M', '2018-10-01', 'you', '12345678', '123@gmail.com'),
('A10001', '123', '123', 'M', '2018-10-01', 'you', '12345678', '123@gmail.com'),
('A10002', 'test', 'test', 'F', '2018-12-05', 'dllm', '45678912', 'test@gmail.com'),
('A10003', 'yo', '123456', 'M', '2015-03-11', 'yo', '22223333', 'yo@gmail.com'),
('A10004', 'stupid', 'stupid', 'M', '2018-12-04', 'No Address', '12345678', 'stpuid@gmail.com'),
('A10006', 'JohnDoe', '12345678', 'M', '1990-01-01', '81 Chung Hau Street, Ho Man Tin, Kowloon', '12345678', 'jdoe123@gmail.com');

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comID` varchar(15) NOT NULL,
  `productID` varchar(15) NOT NULL,
  `userID` varchar(15) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`comID`),
  UNIQUE KEY `comID` (`comID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `comment`
--

INSERT INTO `comment` (`comID`, `productID`, `userID`, `content`) VALUES
('C10001', 'P10011', 'A10002', 'beautiful'),
('C10002', 'P10001', '', ''),
('C10003', 'P10001', '', 'asd'),
('C10004', 'P10008', 'A10001', '123\r\n'),
('C10005', 'P10008', 'A10001', 'hi'),
('C10006', 'P10008', 'A10001', 'hi'),
('C10007', 'P10008', 'A10001', 'hi'),
('C10008', 'P10008', 'A10001', 'hi'),
('C10009', 'P10008', 'A10001', 'QQ'),
('C10010', 'P10001', 'A10000', 'I'),
('C10011', 'P10001', 'A10003', '123'),
('C10012', 'P10001', 'A10003', 'QQ'),
('C10013', 'P10001', 'A10003', '1'),
('C10014', 'P10001', 'A10003', '2'),
('C10015', 'P10001', 'A10003', '3'),
('C10016', 'P10001', 'A10003', '4'),
('C10017', 'P10001', 'A10003', '5'),
('C10018', 'P10001', '', 'ad\r\n'),
('C10019', 'P10001', '', 'dadas'),
('C10020', 'P10001', 'A10000', 'fasdsa'),
('C10021', 'P10001', 'A10004', 'test again\r\n'),
('C10022', 'P10002', 'A10001', 'hi~~'),
('C10023', 'P10016', 'A10006', 'Hi');

-- --------------------------------------------------------

--
-- 資料表結構 `favour`
--

CREATE TABLE IF NOT EXISTS `favour` (
  `userID` varchar(15) NOT NULL,
  `prodID` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `favour`
--

INSERT INTO `favour` (`userID`, `prodID`) VALUES
('A10001', 'P10002'),
('A10001', ' P10019'),
('A10006', 'P10017'),
('A10006', ' P10016');

-- --------------------------------------------------------

--
-- 資料表結構 `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `mailID` varchar(15) NOT NULL DEFAULT '',
  `recieverID` varchar(15) NOT NULL,
  `time` varchar(15) DEFAULT NULL,
  `content` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`mailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `mail`
--

INSERT INTO `mail` (`mailID`, `recieverID`, `time`, `content`) VALUES
('M10001', '', '2018-12-01', 'Your price on  are not the highest.'),
('M10002', '', '2018-12-01', 'Your price on  are not the highest.'),
('M10003', '', '2018-12-01', 'Your price on  are not the highest.'),
('M10004', 'A10001', '2018-12-03', 'Your price on  are not the highest.'),
('M10005', 'A10002', '2018-12-03', 'Your price on  are not the highest.'),
('M10006', 'A10001', '2018-12-05', 'Your price on  are not the highest.'),
('M10007', 'A10001', '2018-12-05', 'Your price on  are not the highest.'),
('M10008', 'A10001', '2018-12-05', 'Your price on  are not the highest.'),
('M10009', 'A10001', '2018-12-06', 'Your price on  are not the highest.'),
('M10010', 'A10001', '2018-12-07', 'Your price on  are not the highest.'),
('M10011', 'A10006', '2018-12-07', 'Your price on  are not the highest.'),
('M10012', 'A10001', '2018-12-07', 'Your price on  are not the highest.');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productID` varchar(15) NOT NULL,
  `productName` varchar(70) DEFAULT NULL,
  `postDate` date DEFAULT NULL,
  `productDur` int(4) DEFAULT NULL,
  `miniPrice` double(8,1) DEFAULT NULL,
  `curPrice` double(8,1) DEFAULT NULL,
  `paymentMethod` varchar(20) DEFAULT NULL,
  `highBidderID` varchar(15) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `size` double(3,1) DEFAULT NULL,
  `photoPath` varchar(300) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `delievry` varchar(25) DEFAULT NULL,
  `color` varchar(15) DEFAULT NULL,
  `style` varchar(20) DEFAULT NULL,
  `sellerID` varchar(15) DEFAULT NULL,
  `finalBuyerID` varchar(15) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`productID`, `productName`, `postDate`, `productDur`, `miniPrice`, `curPrice`, `paymentMethod`, `highBidderID`, `quantity`, `size`, `photoPath`, `brand`, `delievry`, `color`, `style`, `sellerID`, `finalBuyerID`, `type`) VALUES
('P10001', 'Air Jordan 1 Retro High OG Bred Toe', '2018-10-26', 15, 2220.0, NULL, 'BankTransfer', NULL, 2, 9.5, 'upload/img_air_jordan_1_OG.jpg', 'Nike', 'Delivery', 'Red', '555088 610', 'A10001', NULL, 'Sneakers'),
('P10002', '997 Kith', '2018-11-29', 100, 2500.0, 2503.0, 'Cash', 'A10001', 3, 9.5, 'upload/img_nb_997.jpg', 'New Balance', 'FaceToFace', 'Purple', 'm997kti', 'A10002', NULL, 'Sneakers'),
('P10003', 'Yeezy Boost 350 V2 Zebra', '2018-11-29', 0, 2698.0, NULL, 'CreditCard', NULL, 1, 10.5, 'upload/img_yeezy_350_white.jpg', 'Adidas', 'Delivery', 'White', 'cp9654', 'A10003', NULL, 'Sneakers'),
('P10004', 'Yeezy Boost 350 V2', '2018-11-29', 15, 8769.0, NULL, 'CreditCard', NULL, 1, 9.0, 'upload/img_yeezy_350_black.jpg', 'Adidas', 'Delivery', 'Black', 'cp9652', 'A10004', NULL, 'Sneakers'),
('P10005', 'Club C 85', '2018-11-30', 30, 860.0, NULL, 'CreditCard', NULL, 1, 8.5, 'upload/img_club_c_85.jpg', 'Reebok', 'Delivery', 'White', 'ar0457', 'A10004', NULL, 'Sneakers'),
('P10006', 'The Fontaine Pump', '2018-11-30', 12, 2893.0, NULL, 'CreditCard', NULL, 1, 8.0, 'upload/img_the_fontaine_pump.jpg', 'Stuart Weitzman', 'Delivery', 'Blue', NULL, 'A10004', NULL, 'HighHeels'),
('P10007', 'Vegan 1461', '2018-11-30', 8, 760.0, NULL, 'Cash', NULL, 1, 9.5, 'upload/img_vegan_1461.jpg', 'Dr Martens', 'FaceToFace', 'Brown', '14046001', 'A10004', NULL, 'Oxfords'),
('P10008', 'Ultra Boost W', '2018-11-30', 7, 1369.0, NULL, 'BankTransfer', NULL, 1, 10.0, 'upload/img_ultraboost_w.jpg', 'Adidas', 'Delivery', 'Blue', 'ba8928', 'A10004', NULL, 'Sneakers'),
('P10009', '1460 Pascal Virginia', '2018-12-01', 5, 950.0, NULL, 'BankTransfer', NULL, 1, 9.5, 'upload/img_1460_pascal_virginia.jpg', 'Dr Martens', 'Delivery', 'Black', '11822411', 'A10004', NULL, 'Boots'),
('P10010', 'Old Skool', '2018-12-01', 4, 470.0, NULL, 'CreditCard', NULL, 4, 9.0, 'upload/img_old_skool.jpg', 'Vans', 'Delivery', 'Blue', 'vn0a38g1u60', 'A10004', NULL, 'Sneakers'),
('P10011', 'All Star Hi', '2018-12-02', 30, 310.0, NULL, 'Cash', NULL, 2, 7.0, 'upload/img_all_star_hi.jpg', 'Converse', 'FaceToFace', 'Black', 'm9160', 'A10004', NULL, 'Sneakers'),
('P10012', 'Sparx SD0323G', '2018-12-03', 10, 6999.0, 7500.0, 'CreditCard', 'A10001', 1, 9.0, 'upload/img_sd0323g.jpg', 'Adidas', 'Delivery', 'White', 'sd0323g', 'A10004', NULL, 'Sneakers'),
('P10013', 'Nike Air Vapormax FK Off White', '2018-12-04', 14, 6600.0, NULL, 'CreditCard', NULL, 1, 9.0, 'upload/img_air_off_white.jpg', 'Nike', 'Delivery', 'White', 'aa3831 002', 'A10004', NULL, 'Sneakers'),
('P10014', 'The Hester Folsue', '2018-12-04', 12, 2600.0, NULL, 'BankTransfer', NULL, 1, 7.5, 'upload/img_hester_folsue.jpg', 'Stuart Weitzman', 'Delivery', 'Red', NULL, 'A10004', NULL, 'Sandals'),
('P10015', 'The Hester Sandal Black', '2018-12-04', 12, 2600.0, NULL, 'BankTransfer', NULL, 1, 7.5, 'upload/img_hester_blasue.jpg', 'Stuart Weitzman', 'Delivery', 'Black', NULL, 'A10004', NULL, 'Sandals'),
('P10016', 'Authentic SF', '2018-12-04', 15, 429.0, 470.0, 'CreditCard', 'A10006', 2, 9.0, 'upload/img_authentic_sf.jpg', 'Vans', 'Delivery', 'Green', 'vn0a3mu6ul8', 'A10004', NULL, 'Slippers'),
('P10017', 'Authentic', '2018-12-04', 15, 429.0, 430.0, 'CreditCard', 'A10001', 1, 9.5, 'upload/img_authentic_brown.jpg', 'Vans', 'Delivery', 'Brown', 'vn0a38emukt', 'A10004', NULL, 'Slippers'),
('P10018', 'CLASSIC SLIP ON', '2018-12-04', 15, 429.0, NULL, 'CreditCard', NULL, 1, 9.5, 'upload/img_classic_slipon.jpg', 'Vans', 'Delivery', 'Yellow', 'VN0A38F7QCP', 'A10004', NULL, 'Slippers'),
('P10019', 'Instapump Fury Tech', '2018-12-04', 15, 679.0, NULL, 'CreditCard', NULL, 1, 9.5, 'upload/img_instapump_fury.jpg', 'Reebok', 'Delivery', 'Grey', 'ar0625', 'A10004', NULL, 'Sneakers'),
('P10020', 'Suede Classic WNS', '2018-12-04', 15, 828.0, NULL, 'CreditCard', NULL, 1, 8.0, 'upload/img_suede_classic.jpg', 'Puma', 'Delivery', 'Pink', '35546238', 'A10004', NULL, 'Sneakers'),
('P10021', 'M997 Concepts Luxury Goods', '2018-12-04', 15, 1129.0, NULL, 'CreditCard', NULL, 1, 9.0, 'upload/img_m997_orange.jpg', 'New Balance', 'Delivery', 'Orange', 'm997tny', 'A10004', NULL, 'Sneakers'),
('P10022', 'Yeezy Boost 350 Turtle Dove', '2018-12-07', 30, 500.0, NULL, 'Cash', NULL, 1, 7.0, 'upload/yeezy_boost_turtle_dove.jpg', 'Adidas', 'FaceToFace', 'Grey', 'aq4832', 'A10006', NULL, 'Sneakers');

-- --------------------------------------------------------

--
-- 資料表結構 `rank`
--

CREATE TABLE IF NOT EXISTS `rank` (
  `productID` varchar(15) NOT NULL,
  `view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `rank`
--

INSERT INTO `rank` (`productID`, `view`) VALUES
('P10005', 12),
('P10002', 56),
('P10001', 74),
('P10011', 11),
('P10004', 7),
('P10003', 13),
('P10008', 36),
('P10006', 19),
('P10014', 1),
('P10016', 14),
('P10010', 1),
('P10012', 4),
('', 1),
('P10017', 4),
('P10022', 1),
('P10021', 3),
('P10019', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `trade`
--

CREATE TABLE IF NOT EXISTS `trade` (
  `tradeID` varchar(15) NOT NULL DEFAULT '',
  `seller` varchar(15) DEFAULT NULL,
  `buyer` varchar(15) DEFAULT NULL,
  `productID` varchar(15) DEFAULT NULL,
  `bidPrice` double(8,1) DEFAULT NULL,
  `tradeDate` date DEFAULT NULL,
  PRIMARY KEY (`tradeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `trade`
--

INSERT INTO `trade` (`tradeID`, `seller`, `buyer`, `productID`, `bidPrice`, `tradeDate`) VALUES
('T10001', 'A10001', NULL, 'P10001', 2220.0, '2018-10-26'),
('T10002', 'A10002', NULL, 'P10002', 2500.0, '2018-11-29'),
('T10003', 'A10003', NULL, 'P10003', 2698.0, '2018-11-29'),
('T10004', 'A10004', NULL, 'P10004', 8769.0, '2018-11-29'),
('T10005', 'A10004', NULL, 'P10005', 860.0, '2018-11-30'),
('T10006', 'A10004', NULL, 'P10006', 2893.0, '2018-11-30'),
('T10007', 'A10004', NULL, 'P10007', 760.0, '2018-11-30'),
('T10008', 'A10004', NULL, 'P10008', 1369.0, '2018-11-30'),
('T10009', 'A10004', NULL, 'P10009', 950.0, '2018-12-01'),
('T10010', 'A10004', NULL, 'P10010', 470.0, '2018-12-01'),
('T10011', 'A10004', NULL, 'P10011', 310.0, '2018-12-02'),
('T10012', 'A10004', NULL, 'P10012', 6999.0, '2018-12-03'),
('T10013', 'A10004', NULL, 'P10013', 6600.0, '2018-12-04'),
('T10014', 'A10004', NULL, 'P10014', 2600.0, '2018-12-04'),
('T10015', 'A10004', NULL, 'P10015', 2600.0, '2018-12-04'),
('T10016', 'A10004', NULL, 'P10016', 429.0, '2018-12-04'),
('T10017', 'A10004', NULL, 'P10017', 429.0, '2018-12-04'),
('T10018', 'A10004', NULL, 'P10018', 429.0, '2018-12-04'),
('T10019', 'A10004', NULL, 'P10019', 679.0, '2018-12-04'),
('T10020', 'A10004', NULL, 'P10020', 828.0, '2018-12-04'),
('T10021', 'A10004', NULL, 'P10021', 1129.0, '2018-12-04'),
('T10022', 'A10004', 'A10001', 'P10012', 7500.0, '2018-12-06'),
('T10023', 'A10004', 'A10001', 'P10017', 430.0, '2018-12-06'),
('T10024', 'A10002', 'A10001', 'P10002', 2502.0, '2018-12-06'),
('T10025', 'A10001', NULL, 'P10022', 22.0, '2018-12-06'),
('T10026', 'A10001', NULL, 'P10022', 213.0, '2018-12-06'),
('T10027', 'A10002', 'A10001', 'P10002', 2503.0, '2018-12-07'),
('T10028', 'A10006', NULL, 'P10022', 500.0, '2018-12-07'),
('T10029', 'A10004', 'A10006', 'P10016', 450.0, '2018-12-07'),
('T10030', 'A10004', 'A10001', 'P10016', 460.0, '2018-12-07'),
('T10031', 'A10004', 'A10006', 'P10016', 470.0, '2018-12-07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

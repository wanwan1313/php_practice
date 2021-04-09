-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-04-07 05:05:46
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `my_test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `address_book2`
--

CREATE TABLE `address_book2` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `address_book2`
--

INSERT INTO `address_book2` (`sid`, `name`, `email`, `mobile`, `address`, `birthday`, `create_at`) VALUES
(1, '吳宛蓉', 'wanwan1313@gmail.com', '0920288325', '新北市汐止區仁愛路152巷', '1989-01-13', '2021-04-07 04:31:57'),
(2, '項柏諭', 'andrew@gmail.com', '0917936538', '新北市汐止區仁愛路152巷', '1990-07-03', '2021-04-07 04:35:00'),
(3, 'momo', 'momo@gmail.com', '0912222222', '新北市汐止區仁愛路152巷', '1989-05-03', '2021-04-07 10:59:29'),
(4, 'fifi', 'fifi@gmail.com', '0913333333', '新北市汐止區仁愛路152巷', '1989-07-12', '2021-04-07 10:59:29'),
(5, 'emma', 'emma@gmail.com', '0914444444', '新北市汐止區仁愛路152巷', '1988-09-25', '2021-04-07 10:59:29'),
(6, 'melody', 'melody@gmail.com', '0915555555', '新北市汐止區仁愛路152巷', '1989-06-14', '2021-04-07 10:59:29'),
(7, 'yi', 'yi@gmail.com', '0916666666', '新北市汐止區仁愛路152巷', '1989-06-25', '2021-04-07 10:59:29'),
(8, 'roy', 'roy@gmail.com', '0917777777', '新北市汐止區仁愛路152巷', '1989-05-11', '2021-04-07 10:59:29'),
(9, 'carol', 'carol@gmail.com', '0918888888', '新北市汐止區仁愛路152巷', '1989-08-31', '2021-04-07 10:59:29');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `address_book`
--
ALTER TABLE `address_book2`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `address_book`
--
ALTER TABLE `address_book2`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

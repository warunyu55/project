-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 07:38 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id` int(10) NOT NULL,
  `m_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `bk_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bk_datefrom` date NOT NULL,
  `bk_dateto` date NOT NULL,
  `bk_status` int(11) NOT NULL,
  `cancel_detail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_pic` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_price` int(11) NOT NULL,
  `payment_datetime` datetime NOT NULL,
  `bk_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`id`, `m_id`, `room_id`, `bk_price`, `bk_datefrom`, `bk_dateto`, `bk_status`, `cancel_detail`, `payment_pic`, `payment_price`, `payment_datetime`, `bk_datetime`) VALUES
(9, 4, 12, '7000', '2021-02-04', '2021-02-06', 3, '', '1612512298payment.jpg', 500, '2021-02-05 15:04:00', '2021-02-05 15:53:12'),
(10, 4, 13, '8000', '2021-02-21', '2021-02-26', 3, '', '1612511918payment.jpg', 500, '2021-02-05 14:58:00', '2021-02-18 15:23:15'),
(11, 4, 13, '8000', '2021-02-28', '2021-03-01', 1, 'ยอดชำระเงินไม่ถูกต้อง', '1612512239payment.jpg', 500, '2021-02-13 15:03:00', '2021-03-09 07:31:28'),
(13, 4, 14, '8056', '2021-02-19', '2021-02-20', 1, '', '', 0, '0000-00-00 00:00:00', '2021-02-18 16:06:42'),
(14, 4, 14, '8056', '2021-02-23', '2021-02-24', 1, 'คุณได้ทำการยกเลิกรายการจองนี้', '', 0, '0000-00-00 00:00:00', '2021-02-22 11:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `con_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `con_tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `con_email` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `con_detail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `con_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `con_name`, `con_tel`, `con_email`, `con_detail`, `con_datetime`) VALUES
(1, '', '', '', '', '2020-10-26 13:12:49'),
(2, 'test', 'test', 'test', 'test', '2020-10-26 13:12:49'),
(3, 'test', 'test', 'test', 'test', '2020-10-26 13:12:49'),
(4, '', '', '', '', '2021-03-11 05:54:46'),
(5, '', '', '', '', '2021-03-11 05:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id` int(11) NOT NULL,
  `img_gallery` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_gallery`
--

INSERT INTO `tb_gallery` (`id`, `img_gallery`) VALUES
(1, 'ภาพวิว11.jpg'),
(2, 'wmm01m1494601.jpg'),
(3, 'Mountains-Nature-Forest-View-1920-x-1080.jpg'),
(4, 'image4.jpg'),
(5, 'image5.jpg'),
(6, 'image6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id` int(11) NOT NULL,
  `mem_user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mem_pass` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mem_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mem_tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mem_address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mem_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mem_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id`, `mem_user`, `mem_pass`, `mem_name`, `mem_tel`, `mem_address`, `mem_type`, `mem_datetime`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', 'admin', '2020-10-28 10:30:43'),
(3, 'test3', 'test3', 'test3', '0951568758', '27/331', 'member', '2020-10-26 13:13:30'),
(4, 'member', 'member', 'name member1', '123456', 'memaddress', 'member', '2021-02-02 08:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE `tb_room` (
  `id` int(11) NOT NULL,
  `room_img` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `room_img2` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `room_img3` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `room_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `room_detail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `room_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `room_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `room_status` int(11) NOT NULL,
  `room_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_room`
--

INSERT INTO `tb_room` (`id`, `room_img`, `room_img2`, `room_img3`, `room_name`, `room_detail`, `room_price`, `room_type`, `room_status`, `room_datetime`) VALUES
(1, '01-koh-chang-superior-02-640x457.jpg', '01-koh-chang-superior-02-640x457.jpg', '01-koh-chang-superior-02-640x457.jpg', 'Sweetroom 1', 'ห้องพักสุดหรู่ในราคาประหยัด', '500', 'Standard', 1, '2021-03-09 09:21:54'),
(12, '546b5d99280a409ab7b63eda3cf8977d.jpg', '546b5d99280a409ab7b63eda3cf8977d.jpg', '546b5d99280a409ab7b63eda3cf8977d.jpg', 'Standard room 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a', '3500', 'Standard', 1, '2021-03-09 09:24:52'),
(13, 'desea deluxe-2-1024x683.jpg', 'desea deluxe-2-1024x683.jpg', 'desea deluxe-2-1024x683.jpg', 'Sweet room 2', 'ห้องสุดหรู่พร้อมวิวแบบ 360 มีทั้งทีวี และ แอร์ภายในห้อง', '3000', 'Sweetroom', 1, '2021-03-09 09:33:30'),
(14, 'main-studio-3.jpg', 'main-studio-3.jpg', 'main-studio-3.jpg', 'Standard room 2', 'ห้องพักสไตล์โมเดิร์น', '2800', 'Standard', 1, '2021-03-09 09:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `id` int(11) NOT NULL,
  `room_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`id`, `room_type`) VALUES
(1, 'Standard'),
(2, 'Sweetroom');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

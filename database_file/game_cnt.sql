-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2024 at 12:14 PM
-- Server version: 10.6.15-MariaDB-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_cnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `about_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `about_topic` varchar(100) NOT NULL,
  `about_detail` text NOT NULL,
  `about_filename` varchar(100) NOT NULL,
  `about_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`about_id`, `about_topic`, `about_detail`, `about_filename`, `about_date`) VALUES
(004, 'Gameshopcnt', '<p>ในยุคดิจิทัลที่เทคโนโลยีมีบทบาทสำคัญในการดำเนินชีวิตของคนทุกช่วงวัย การศึกษาเองก็ไม่หยุดยั้งที่จะปรับตัวเพื่อให้เข้ากับการเปลี่ยนแปลงนี้ หนึ่งในแนวทางที่ได้รับความนิยมและมีประสิทธิภาพคือการนำเว็บเกมเพื่อการศึกษาเข้ามาใช้เป็นเครื่องมือเสริมการเรียนรู้ เว็บเกมเพื่อการศึกษาไม่เพียงแต่เป็นแหล่งความบันเทิงเท่านั้น แต่ยังเป็นแพลตฟอร์มที่มีศักยภาพในการเสริมสร้างทักษะและความรู้ในวิชาต่างๆ ได้อย่างน่าสนใจและท้าทาย</p><p>การนำเกมมาใช้ในการศึกษานั้นเป็นวิธีที่ช่วยกระตุ้นการเรียนรู้และสร้างแรงจูงใจให้กับผู้เรียน เกมเหล่านี้มักถูกออกแบบให้มีเนื้อหาที่สอดคล้องกับหลักสูตรการเรียนการสอน และสามารถปรับระดับความยากง่ายได้ตามความสามารถของผู้เล่น ซึ่งช่วยให้การเรียนรู้เป็นไปอย่างมีประสิทธิภาพและเหมาะสมกับผู้เรียนแต่ละคน นอกจากนี้ การเล่นเกมยังช่วยพัฒนาทักษะต่างๆ เช่น การคิดวิเคราะห์ การแก้ปัญหา การทำงานเป็นทีม และการตัดสินใจ ซึ่งเป็นทักษะสำคัญในการดำเนินชีวิตในโลกยุคปัจจุบัน</p><p>เว็บเกมเพื่อการศึกษามีหลากหลายประเภทและครอบคลุมเนื้อหาหลายวิชา ไม่ว่าจะเป็นคณิตศาสตร์ วิทยาศาสตร์ ภาษา ศิลปะ หรือสังคมศึกษา การใช้เกมในการเรียนรู้นั้นไม่เพียงแต่ทำให้การเรียนรู้เป็นเรื่องสนุก แต่ยังช่วยเสริมสร้างความรู้และทักษะต่างๆ ได้อย่างมีประสิทธิภาพและยั่งยืน</p><p>ในคำนำนี้ เราจะสำรวจและพิจารณาเว็บเกมเพื่อการศึกษาที่น่าสนใจ ประโยชน์ที่ได้รับจากการใช้เกมเพื่อการศึกษา และเหตุผลที่เว็บเกมเพื่อการศึกษาเป็นเครื่องมือที่มีประสิทธิภาพในการส่งเสริมการเรียนรู้ในยุคดิจิทัล</p>', 'about_66457584caa4c.png', '2024-05-16 10:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(100) UNSIGNED NOT NULL,
  `order_slip` varchar(150) NOT NULL,
  `order_datesave` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_status`, `user_id`, `order_slip`, `order_datesave`) VALUES
(00011, 1, 25, 'slip_66456dae4b670.png', '2024-05-16 09:20:16'),
(00012, 1, 25, 'slip_66456dd33b630.png', '2024-05-16 09:21:50'),
(00013, 1, 25, 'slip_66456e2b796f2.JPG', '2024-05-16 09:22:21'),
(00014, 1, 25, 'slip_66456e30a26c7.jpeg', '2024-05-16 09:22:29'),
(00015, 1, 25, 'slip_66456e37298da.png', '2024-05-16 09:22:41'),
(00016, 1, 25, 'slip_66456e3e668fe.jpeg', '2024-05-16 09:22:52'),
(00017, 1, 25, 'slip_66456e2305349.png', '2024-05-16 09:23:00'),
(00018, 1, 25, 'slip_66456e9bf3129.png', '2024-05-16 09:25:18'),
(00019, 1, 27, 'slip_66458b80e0e53.jpg', '2024-05-16 11:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `detail_id` int(10) NOT NULL,
  `order_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `product_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `product_qty` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`detail_id`, `order_id`, `product_id`, `product_qty`, `total`) VALUES
(25, 00011, 032, 1, 1250.00),
(26, 00012, 039, 1, 1790.00),
(27, 00013, 045, 1, 549.00),
(28, 00014, 044, 1, 1990.00),
(29, 00015, 037, 1, 1289.00),
(30, 00016, 039, 1, 1790.00),
(31, 00017, 036, 1, 315.00),
(32, 00018, 034, 1, 315.00),
(33, 00018, 032, 1, 1250.00),
(34, 00019, 032, 3, 3750.00),
(35, 00019, 047, 2, 1340.00),
(36, 00019, 039, 1, 1790.00);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `payment_bank` varchar(50) NOT NULL,
  `payment_fullname` varchar(100) NOT NULL,
  `payment_numbers` varchar(13) NOT NULL,
  `payment_type` enum('0','1','2') NOT NULL DEFAULT '0',
  `payment_telephone` varchar(11) NOT NULL,
  `payment_filename` varchar(100) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_bank`, `payment_fullname`, `payment_numbers`, `payment_type`, `payment_telephone`, `payment_filename`, `payment_date`) VALUES
(008, 'True Wallet ', 'VORAPUCH SRIMOSANR', '0942510941', '0', '-', 'payimg_664576818cfd6.jpg', '2024-05-16 09:59:13'),
(009, 'ธนาคารกรุงไทย', 'วรปรัชญ์ ศรีโมสาร', '2040664335', '0', '-', 'payimg_664576e55e047.jpg', '2024-05-16 10:01:08'),
(010, 'ธนาคารกสิกรไทย', 'วรปรัชญ์ ศรีโมสาร', '1073654346', '0', '-', 'payimg_66457799ddf3b.jpg', '2024-05-16 10:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `product_topic` varchar(100) NOT NULL,
  `typeproduct_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `product_price` decimal(50,2) NOT NULL,
  `product_detail` text NOT NULL,
  `product_filename` varchar(100) NOT NULL,
  `product_status` enum('0','1','2') NOT NULL DEFAULT '0',
  `product_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_topic`, `typeproduct_id`, `product_price`, `product_detail`, `product_filename`, `product_status`, `product_date`) VALUES
(031, 'Forza Horizon 5', 014, 1899.00, '<p>เกม Forza Horizon 5 เป็นเกมภาคต่อของซีรี่เกมขับรถชื่อดังอย่าง Forza Horizon&nbsp;</p>', 'game_6645642008358.jpeg', '1', '2024-05-16 08:52:27'),
(032, 'Alan Wake 2', 016, 1250.00, '<p>ภาคต่อของซีรี่ Alan Wake เรื่องราวที่สานต่อจากภาคแรก</p><p>key เกมเป็นของ epic game store</p>', 'game_6645652e4cd41.jpeg', '1', '2024-05-16 08:53:17'),
(033, 'Dave the Driver', 015, 400.00, '<p>เกมอินดี้น่าเล่น การันตีด้วยรางวัล game indie of the year 2023 จาก the game awards</p>', 'game_6645659a9a0f2.jpeg', '1', '2024-05-16 08:52:38'),
(034, 'Melatonin', 017, 315.00, '<p>This is some sample game detail.</p>', 'game_6645660df14fb.jpg', '0', '2024-05-16 08:49:01'),
(035, 'FC 24', 019, 1899.00, '<p>This is some sample game detail.</p>', 'game_6645667bbdd54.JPG', '0', '2024-05-16 08:50:51'),
(036, 'StardewValley', 015, 315.00, '<p>This is some sample game detail.</p>', 'game_664566fc88aba.jpg', '1', '2024-05-16 08:53:00'),
(037, 'Death Stranding', 021, 1289.00, '<p>This is some sample game detail.</p>', 'game_6645683504d08.jpeg', '0', '2024-05-16 08:58:13'),
(038, 'Cyberpunk 2077', 020, 1799.00, '<p>This is some sample game detail.</p>', 'game_6645686d9095f.JPG', '2', '2024-05-16 09:27:06'),
(039, 'Elden Ring', 022, 1790.00, '<p>This is some sample game detail.</p>', 'game_664568de6f6b5.jpeg', '2', '2024-05-16 09:01:02'),
(040, 'Starfield', 021, 2299.00, '<p>This is some sample game detail.</p>', 'game_66456973d5888.jpeg', '2', '2024-05-16 09:19:58'),
(041, 'The Little Nightmare', 023, 590.00, '<p>This is some sample game detail.</p>', 'game_664569cc281e5.jpg', '0', '2024-05-16 09:05:00'),
(042, 'The Little Nightmare 2', 023, 699.00, '<p>This is some sample game detail.</p>', 'game_664569f17091c.jpg', '0', '2024-05-16 09:05:37'),
(043, 'Octopart Traveler', 024, 1899.00, '<p>This is some sample game detail.</p>', 'game_66456a563e631.jpg', '0', '2024-05-16 09:07:18'),
(044, 'Octopart Traveler 2', 024, 1990.00, '<p>This is some sample game detail.</p>', 'game_66456a7d4be4a.jpg', '0', '2024-05-16 09:07:57'),
(045, 'Stray', 025, 549.00, '<p>This is some sample game detail.</p>', 'game_66456ace24369.jpg', '2', '2024-05-16 09:27:19'),
(046, 'Cocoon', 023, 459.00, '<p>This is some sample game detail.</p>', 'game_66456b043e12f.png', '2', '2024-05-16 09:26:59'),
(047, 'Ori and the Blind Forest ', 020, 670.00, '<p>This is some sample game detail.</p>', 'game_66456b756049b.jpg', '2', '2024-05-16 09:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `typeproduct`
--

CREATE TABLE `typeproduct` (
  `typeproduct_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `typeproduct_name` varchar(100) NOT NULL,
  `typeproduct_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `typeproduct`
--

INSERT INTO `typeproduct` (`typeproduct_id`, `typeproduct_name`, `typeproduct_date`) VALUES
(014, 'Racing', '2024-05-16 08:39:25'),
(015, 'Indie', '2024-05-16 08:41:12'),
(016, 'Horror', '2024-05-16 08:42:53'),
(017, 'rhythm', '2024-05-16 08:48:07'),
(018, 'FPS', '2024-05-16 08:48:12'),
(019, 'sports', '2024-05-16 08:50:21'),
(020, 'Action', '2024-05-16 08:54:16'),
(021, 'Open worlds', '2024-05-16 08:57:31'),
(022, 'Soulslike', '2024-05-16 09:00:23'),
(023, 'puzzle', '2024-05-16 09:04:19'),
(024, 'JRPG', '2024-05-16 09:06:46'),
(025, 'Adventure', '2024-05-16 09:08:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(100) UNSIGNED NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_telephone` varchar(11) NOT NULL,
  `user_address` text NOT NULL,
  `user_status` enum('0','1') NOT NULL DEFAULT '0',
  `user_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_email`, `user_password`, `user_telephone`, `user_address`, `user_status`, `user_date`) VALUES
(16, 'kittin', '6314921002@rbru.ac.th', '2fd2041e85670812e731d1f86ec91facb7f31b64ae5ad4d5b45217b48e38670c', '0931385645', '<p>หอพักบ้านพลอยใส 2/591 หมู่ 9 ซอยรักศักดิ์ชมูล 7 ตำบลท่าช้าง อำเภอเมืองจันทบุรี, จังหวัดจันทบุรี, 22000 ตำบลท่าช้าง</p>', '1', '2024-05-16 11:40:14'),
(17, 'vorapuch', '6314921011@rbru.ac.th', '4a0d20ae74f2e16f9c7004f7c9b003bd89fc16d6f303c80081b29ee361dac4a2', '-', '<p>-</p>', '1', '2024-05-16 08:35:15'),
(18, 'tan', 'krrch06@gmail.com', '3bcb93caa410586a860486154a90a4cb92ec3674d9c8232a03caf413a5e91e77', '0123456789', '<p>eeee</p>', '1', '2024-05-16 08:43:19'),
(25, 'keem', 'keemgamer@gmail.com', '4a0d20ae74f2e16f9c7004f7c9b003bd89fc16d6f303c80081b29ee361dac4a2', '0821466704', '<p>This is some sample user address.</p>', '0', '2024-05-16 09:18:56'),
(27, 'nueng', 'nueng@gmail.com', 'e42e4af3919903ebb55b1ccc6b18957fe20bb7eb75b75e4520502592e3100e8b', '0931385648', '<p>หอพักบ้านพลอยใส 2/591 หมู่ 9 ซอยรักศักดิ์ชมูล 7 ตำบลท่าช้าง อำเภอเมืองจันทบุรี, จังหวัดจันทบุรี, 22000 ตำบลท่าช้าง test</p>', '0', '2024-05-16 11:27:03'),
(30, 'แอดมินหนึ่ง', 'admin@gmail.com', 'e42e4af3919903ebb55b1ccc6b18957fe20bb7eb75b75e4520502592e3100e8b', '0123456788', '<p>This is some sample user address.</p>', '1', '2024-05-16 12:08:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `typeproduct`
--
ALTER TABLE `typeproduct`
  ADD PRIMARY KEY (`typeproduct_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_telephone` (`user_telephone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `about_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `detail_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `typeproduct`
--
ALTER TABLE `typeproduct`
  MODIFY `typeproduct_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

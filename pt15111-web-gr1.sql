-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 11:21 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pt15111-web-gr1`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `content`, `create_at`, `food_id`) VALUES
(1, 1, 'Chúng cũng là một nguồn protein rất tốt, khoảng 6 gram mỗi quả trứng, ngoài ra trứng có đầy đủ cá', '2020-03-06 00:00:00', 35),
(5, 1, 'aaaaa', '2020-03-06 17:09:12', 35),
(6, 1, 'bbbbb', '2020-03-06 17:10:36', 35),
(7, 1, 'nnnn', '2020-03-06 17:12:11', 35),
(8, 1, 'ád', '2020-03-06 17:12:34', 35),
(9, 1, 'nnnn', '2020-03-06 17:13:06', 35),
(10, 1, 'bbbb', '2020-03-06 17:13:19', 35),
(11, 1, 'hello', '2020-03-08 16:55:41', 36),
(12, 2, 'Test', '2020-03-08 17:16:48', 40);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `time_start` time DEFAULT NULL,
  `time_end` time NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `image`, `price`, `time_start`, `time_end`, `description`) VALUES
(35, 'Trứng ớt', 'public/images/5e63afad6d2db-1tl3.jpg', 10000, '00:00:00', '12:59:00', 'Bảng thành phần dinh dưỡng trứng cung cấp chúng là một loại thực phẩm khá ít calo. Trứng luộc chín chỉ c 77 calo, 5 gram chất béo và một lượng carbs rất nhỏ. Chúng cũng là một nguồn protein rất tốt, khoảng 6 gram mỗi quả trứng, ngoài ra trứng có đầy đủ cá'),
(36, 'Thịt bò hầm', 'public/images/5e612e4a25118-hoan-thanh-mon-bo-ham-tieu-xanh.jpg', 1234213, '01:00:00', '14:00:00', 'Món thịt bò hầm cà chua chỉ mới nhìn thôi đã thèm bởi màu sắc cực kì bắt bắt. Với cách làm thịt bò hầm cà chua này sẽ sử dụng phần thịt ức có cả phần nạc mềm lẫn mỡ, mùi bò không “nặng” lắm nên món ăn có mùi thơm dễ chịu và có thêm chút béo ngậy hấp dẫn, '),
(40, 'Cá rán', 'public/images/5e62384f28b47-2-min-1.jpg', 20000, '01:00:00', '12:59:00', 'Cá là loại thực phẩm phổ biến có hầu hết trong các bữa ăn gia đình Việt. Trong đó, cá rán hay cá rán giòn là những món ăn vô cùng lý tưởng, làm tăng sự hấp dẫn cho bữa cơm gia đình. Với mùi vị thơm phức cùng màu sắc phi rán vàng giòn khá bắt mắt, chắc hẳn');

-- --------------------------------------------------------

--
-- Table structure for table `food_place`
--

CREATE TABLE `food_place` (
  `place_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_place`
--

INSERT INTO `food_place` (`place_id`, `food_id`) VALUES
(1, 36),
(1, 40),
(2, 35);

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE `food_type` (
  `type_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` (`type_id`, `food_id`) VALUES
(1, 35),
(1, 40),
(2, 35),
(2, 40),
(3, 36);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`) VALUES
(1, 'Hàm Nghi'),
(2, 'Nguyễn Cơ Thạch'),
(3, 'Nguyễn Trãi'),
(4, 'Ba Đình'),
(12, 'Trúc Bạch');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`) VALUES
(1, 'Superadmin', b'0'),
(2, 'Quản trị viên', b'1'),
(3, 'Thành viên', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(1, 'Điểm tâm'),
(2, 'Hải sản'),
(3, 'Thịt'),
(7, 'Món lẩu'),
(8, 'Món nướng');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `phone_number`, `role_id`, `active`, `image`) VALUES
(1, 'abcd', '$2y$10$h8.sAHi4HuHkMLFeBSzf0OribINRKZvQkD15eVU5oWtfvK/5HI.ci', 'abc@gmail.com', '123456', 2, b'1', 'public/images/5e64c551e1484-15-cong-thuc-che-bien-mon-an-ngon-tu-trung-cho-tre-7-1474310242-width500height333.jpg'),
(2, 'demo', '$2y$10$Qprl4Vvekpbt4LAg2peMGucU6HDKeUPV3T63nE4eonJay48TzkY3K', 'demo@gmail.com', '0987456321', 3, b'1', 'public/images/5e64c5e90b8fa-15-cong-thuc-che-bien-mon-an-ngon-tu-trung-cho-tre-8-1474310267-width500height333.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_place`
--
ALTER TABLE `food_place`
  ADD PRIMARY KEY (`place_id`,`food_id`),
  ADD KEY `place_id` (`place_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `food_type`
--
ALTER TABLE `food_type`
  ADD PRIMARY KEY (`type_id`,`food_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_food` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food_place`
--
ALTER TABLE `food_place`
  ADD CONSTRAINT `food_place_f` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `food_place_p` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food_type`
--
ALTER TABLE `food_type`
  ADD CONSTRAINT `food_type-t` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `food_type_f` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

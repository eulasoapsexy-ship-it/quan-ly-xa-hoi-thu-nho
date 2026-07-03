-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2026 at 01:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utt_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `likes` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `parent_id`, `author`, `content`, `likes`, `created_at`) VALUES
(1, 5, 0, '74DCTT13636', 'Hihi', 1, '2026-07-03 10:34:29'),
(2, 5, 1, '74DCTT13636', 'Test', 0, '2026-07-03 10:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_code` varchar(20) NOT NULL,
  `attendance` float NOT NULL DEFAULT 0,
  `midterm` float NOT NULL DEFAULT 0,
  `final` float NOT NULL DEFAULT 0,
  `exam_status` varchar(50) NOT NULL DEFAULT 'Cho phép thi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_code`, `attendance`, `midterm`, `final`, `exam_status`) VALUES
(1, '74DCTT13636', 10, 10, 10, 'Cho phép thi');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `receiver`, `content`, `created_at`) VALUES
(1, 'Testter', 'Test 1', 'Hello', '2026-07-03 10:23:43'),
(2, '74DCTT13636', 'Thầy Quản Lý', 'Alo Thầy', '2026-07-03 10:56:48'),
(3, 'Thầy Quản Lý', '74DCTT13636', 'OKe e', '2026-07-03 10:59:52'),
(4, '74DCTT13636', 'Thầy Quản Lý', 'Chào iem nhoa', '2026-07-03 23:29:33'),
(5, '74DCTT13636', 'Thầy Quản Lý', 'Ừ', '2026-07-03 23:29:38'),
(6, 'Thầy Quản Lý', '74DCTT13636', 'Cc', '2026-07-03 23:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `likes` int(11) DEFAULT 0,
  `shares` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `content`, `likes`, `shares`, `created_at`) VALUES
(1, 'Admin_Truong', 'Chào mừng các tân sinh viên khóa mới đã gia nhập Đại học Công nghệ Giao thông Vận tải! Chúc các bạn có 4 năm thanh xuân thật rực rỡ.', 150, 24, '2026-07-01 01:30:00'),
(2, 'SV_TuanAnh', 'Khoa CNTT điểm danh cái nhỉ? Code bug nhiều quá cứu với anh em ơi 😭', 45, 2, '2026-07-02 07:15:00'),
(3, 'SV_MaiPhuong', 'Có ai ở Khoa Cầu Đường biết thầy Hùng điểm danh gắt không ạ? Sáng mai em định bùng học...', 89, 5, '2026-07-03 02:20:00'),
(4, 'CLB_Guitar', 'Tối nay 20h00 CLB Guitar UTT có buổi offline tại Sân A1 nhé. Mọi người nhớ mang theo nhạc cụ!', 210, 56, '2026-07-03 09:00:00'),
(5, 'SV_HoangOto', 'Pass lại giáo trình Cơ khí đại cương cho anh em Khoa Ô tô khóa dưới, giá pass bằng một cốc trà đá thôi nha!', 12, 0, '2026-07-03 10:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_code` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `dob` date DEFAULT NULL,
  `hometown` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_code`, `full_name`, `class_name`, `location`, `dob`, `hometown`, `phone`, `email`) VALUES
(4, '74DCTT13636', 'SV_74DCTT13636', '74DCTT11', 'Ngoại Trú', '2005-08-20', 'Phú Thọ', 'Không bt', 'Không có');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('manager','student') NOT NULL DEFAULT 'student',
  `department` varchar(100) NOT NULL DEFAULT 'Chưa rõ',
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `department`, `avatar`) VALUES
(3, '74DCTT13636', '$2y$10$19oBWakzpG.e3W2Xo3Nd/emPeFSu8RDZXOwQlsEj7.PXKhOXX3L9e', 'student', 'Chưa rõ', NULL),
(4, 'Thầy Quản Lý', '$2y$10$rYETin5HMPuox9sSA5EiquK7u2c3ixaGADjJT7HGEVo9jB.9QpgNm', 'manager', 'Chưa rõ', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_student` (`student_code`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_code` (`student_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

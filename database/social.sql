-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 12:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_user_send` int(11) NOT NULL,
  `id_user_recive` int(11) NOT NULL,
  `Date_chat` date NOT NULL,
  `content_message` varchar(255) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_user_send`, `id_user_recive`, `Date_chat`, `content_message`, `view`) VALUES
(1, 2, '2022-06-02', 'مرحبا', 0),
(3, 1, '2022-06-02', 'اهلا', 0),
(1, 3, '2022-06-02', 'السلام عليكم', 0);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id_picture` int(11) NOT NULL,
  `num_pic` int(11) NOT NULL,
  `date_pic` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id_picture`, `num_pic`, `date_pic`, `user_id`) VALUES
(1, 515, '2022-06-02', 1),
(2, 229, '2022-06-02', 1),
(3, 483, '2022-06-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `Date_Join` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `email`, `pass`, `town`, `age`, `status`, `Date_Join`) VALUES
(1, 'مندر', 'الجبالي', 'munder@gmail.com', '1234', 'طرابلس', 22, 'اعزب', '2022-06-08'),
(2, 'سالم', 'احمد', 'salem@gmail.com', '12345678', 'بنغازي', 29, 'اعزب', '2022-06-02'),
(3, 'احمد', 'عبد المطلب', 'ahmed@gmail.com', '12345678', 'الخمس', 33, 'متزوج', '2022-06-02'),
(4, 'خالد', 'محمد', 'kahled@gmail.com', '12345678', 'زليطن', 45, 'متزوج', '2022-06-02'),
(5, 'محمد', 'علي', 'mohamed@gmail.com', '12345678', 'الخمس', 34, 'مخطوب', '2022-06-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id_picture`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

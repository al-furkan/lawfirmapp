-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 02:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawfirm`
--

-- --------------------------------------------------------

--
-- Table structure for table `regkey`
--

CREATE TABLE `regkey` (
  `id` int(10) NOT NULL,
  `re_key` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `regkey`
--

INSERT INTO `regkey` (`id`, `re_key`) VALUES
(1, 10101010),
(2, 12121212);

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `issued_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `address_type` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `post_number` varchar(20) NOT NULL,
  `ward_village` varchar(100) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `office_id` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `full_name`, `dob`, `email`, `mobile`, `gender`, `father_name`, `id_type`, `id_number`, `image`, `cv`, `issued_date`, `expiry_date`, `address_type`, `nationality`, `state`, `district`, `post_number`, `ward_village`, `occupation`, `office_id`, `password`, `created_at`) VALUES
(1, 'Al FURKAN', '2024-06-05', 'mdalfurkan71@gmail.com', '01726014276', 'Female', 'fgsgsd', 'sgsgsgs', '45645456', 'uploads/fire-horse-silhouette-wallpaper-preview.jpg', 'uploads/horse-made-of-4k-fire-89jihtrdh4e5sn5t.jpg', '2024-06-16', '2024-06-20', 'sfgsfsd', 'sfdsfsfs', 'sdfsfs', 'sfsfsdsf', '47645646', 'sfsfds', 'Advocate', '123', '123456', '2024-06-07 19:05:21'),
(2, 'Nahid', '2024-06-03', 'nahid@gmail.com', '01726014276', 'Male', 'fgsgsd', 'sgsgsgs', '123456789', 'uploads/_DSC0489.JPG', 'uploads/Course-code_-CSE-401.pdf', '2024-06-10', '2024-06-20', 'sfgsfsd', 'sfdsfsfs', 'islam', 'sfsfsdsf', '634564', 'sfsfds', 'Manager', '123', '123456', '2024-06-07 22:28:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `regkey`
--
ALTER TABLE `regkey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regkey`
--
ALTER TABLE `regkey`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

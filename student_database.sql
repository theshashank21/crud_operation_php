-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2024 at 09:41 AM
-- Server version: 5.7.25
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` varchar(50) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `std_contact` varchar(10) NOT NULL,
  `std_email` varchar(50) NOT NULL,
  `std_aadhar` varchar(12) NOT NULL,
  `std_pan` varchar(10) NOT NULL,
  `std_address` varchar(200) NOT NULL,
  `std_designation` varchar(50) NOT NULL,
  `std_aadhar_front_url` varchar(200) NOT NULL,
  `std_aadhar_back_url` varchar(200) NOT NULL,
  `std_pan_front_url` varchar(200) NOT NULL,
  `std_image_url` varchar(200) NOT NULL,
  `std_aadhar_front_name` varchar(50) NOT NULL,
  `std_aadhar_back_name` varchar(50) NOT NULL,
  `std_pan_name` varchar(50) NOT NULL,
  `std_image_name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `on_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `std_name`, `std_contact`, `std_email`, `std_aadhar`, `std_pan`, `std_address`, `std_designation`, `std_aadhar_front_url`, `std_aadhar_back_url`, `std_pan_front_url`, `std_image_url`, `std_aadhar_front_name`, `std_aadhar_back_name`, `std_pan_name`, `std_image_name`, `status`, `on_date`) VALUES
('DKYT1001', 'Shashank Pandey', '8739002012', 'shashankpandey2103@gmail.com', '123412341234', 'jahs3457jw', 'SUZABAD, PARAO, VARANASI', 'Developer', 'upload/aadhar/', 'upload/aadhar/', 'upload/pan/', 'upload/image/', '172474055325.jpg', '172474055378.jpg', '1724740553.webp', '1724740553.png', 0, '2024-08-27 12:05:53'),
('DKYT1002', 'Ankit Pandey', '1234567890', 'ankit@gmail.com', '123456781234', 'ankit98765', 'Padao, Varanasi, UP', 'Marketing Head', 'upload/aadhar/', 'upload/aadhar/', 'upload/pan/', 'upload/image/', '172474069232.jpeg', '172474069260.jpeg', '1724740692.jpg', '1724740692.jpg', 0, '2024-08-27 12:08:12'),
('DKYT1003', 'Ayesha', '0987654321', 'ayesha@gmail.com', '123456789012', 'AYESH9876A', 'Near Anil baba aashram, Parao, Varanasi (221008),UP', 'HR', 'upload/aadhar/', 'upload/aadhar/', 'upload/pan/', 'upload/image/', '172474076356.jpg', '172474076314.jpg', '1724740763.png', '1724740763.webp', 0, '2024-08-27 12:09:23'),
('DKYT1004', 'Aman', '1234567812', 'aman@gmail.com', '123456785678', 'AMANA1234L', 'The Alstonia Apartment, Greater Noida, UP', 'INTERN', 'upload/aadhar/', 'upload/aadhar/', 'upload/pan/', 'upload/image/', '172474081965.png', '172474081995.jpeg', '1724740819.png', '1724740819.png', 0, '2024-08-27 12:10:19'),
('DKYT1005', 'Priyanshi', '0989098909', 'pri@gmail.com', '098765432312', 'DFRRE3422A', '2578, SUZABAD, PARAO, VARANASI', 'HR', 'upload/aadhar/', 'upload/aadhar/', 'upload/pan/', 'upload/image/', '172474088457.jpg', '172474088420.jpg', '1724740884.jpg', '1724740884.webp', 0, '2024-08-27 12:11:24'),
('DKYT1006', 'Jhon Doe', '0987678909', 'jhon@gmail.com', '123456789876', 'JHONW3425A', 'Near Anil baba aashram, Parao, Varanasi (221008),UP', 'INTERN', 'upload/aadhar/', 'upload/aadhar/', 'upload/pan/', 'upload/image/', '172474448512.jpg', '172474448567.jpg', '1724744485.webp', '1724744485.jpg', 0, '2024-08-27 13:11:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`std_email`),
  ADD UNIQUE KEY `pan` (`std_pan`),
  ADD UNIQUE KEY `phone` (`std_contact`),
  ADD UNIQUE KEY `aadhar` (`std_aadhar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

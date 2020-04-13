-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2020 at 03:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hisinformatics`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `phonenumber` varchar(200) NOT NULL,
  `doctor_schedule` datetime NOT NULL,
  `doctor_speciality` varchar(128) NOT NULL,
  `doctor_department` varchar(200) NOT NULL,
  `gender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `first_name`, `last_name`, `phonenumber`, `doctor_schedule`, `doctor_speciality`, `doctor_department`, `gender`) VALUES
(2, 'Markus', 'Star', '08121305959', '2020-03-01 12:38:50', 'Heart', 'Cardiology', 'male'),
(3, 'Noach', 'Lupin', '08121309292', '2020-04-13 13:27:04', 'Heart', 'Cardiology', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `drug_id` int(11) NOT NULL,
  `drug_name` varchar(128) NOT NULL,
  `drug_type` varchar(128) NOT NULL,
  `drug_price` int(128) NOT NULL,
  `drug_desc` varchar(128) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`drug_id`, `drug_name`, `drug_type`, `drug_price`, `drug_desc`, `supplier_id`) VALUES
(1, 'Tempra', 'Paracetamol', 70000, 'ENAK RASA ANGGUR', 1),
(2, 'Panadol', 'Paracetamol', 30000, 'Pait bro', 1),
(3, 'Ibu dan Anak', 'Obat Batuk', 50000, 'Enak bro mint mint gitu deh', 1),
(4, 'Tolak Angin', 'Masuk Angin', 20000, 'Biar gak aasuk angin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `DOB` date NOT NULL,
  `phonenum` varchar(128) NOT NULL,
  `date_added` varchar(200) NOT NULL,
  `patient_status` enum('discharged','outpatient','inpatient','') NOT NULL,
  `patient_address` varchar(128) NOT NULL,
  `diagnoses` varchar(200) NOT NULL,
  `drug_name` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dosage` int(11) NOT NULL,
  `prescriber` varchar(200) NOT NULL,
  `process_status` varchar(200) NOT NULL,
  `date_issued` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `first_name`, `last_name`, `gender`, `DOB`, `phonenum`, `date_added`, `patient_status`, `patient_address`, `diagnoses`, `drug_name`, `quantity`, `dosage`, `prescriber`, `process_status`, `date_issued`) VALUES
(1, 'Noach', 'Tjahjadi', 'male', '2020-03-10', '087853332920', '1586329474', 'outpatient', 'Jalan Bumi Indah Damai Nomor 5 Jakarta Barat Daya', '              Pilek', 'Ibu dan Anak', 2, 3, 'Markus-Star', 'on progress', 1586785189),
(2, 'Matius', 'Ebenhaezer', 'male', '2020-03-01', '08121030492', '1586329474', 'discharged', 'Jalan Binong Meledak Nomor 20 ', '              Sakit Kepala', 'Panadol', 1, 1, 'Markus-Star', 'on progress', 1586785139),
(3, 'Denny', 'Raymond', 'male', '2020-03-25', '081310430429', '1586329474', 'inpatient', 'Jalan Kebanggaan Mama Nomor 5 Jakarta Barat', '              Demam', 'Tolak Angin', 1, 1, 'Noach-Lupin', 'on progress', 1586785087);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(2, 'raymond', 'raymond@gmail.com', 'default.jpg', '$2y$10$WNrTKAOWSYy4BaB7t.km3.WClsO5FFMZ6TFaHqt8T8DDteeEBzyge', 2, 1, 1583908692),
(3, 'Hendra', 'hendra@gmail.com', 'default.jpg', '$2y$10$JccIBBXtCDuCpQEj24FTvOcWgtHe3wcGplVyzCKvGpzo6y4tuKSzi', 1, 1, 1583910893),
(4, 'testuser', 'test@gmail.com', 'default.jpg', '$2y$10$/jxlZ.cbcZC3sAgV1jgxVeLjGG6d/mET3PVmVMCJhaG9kbzYpRT9O', 1, 1, 1584411172),
(5, 'Denny Raymond', 'rayden@gmail.com', 'default.jpg', '$2y$10$wHrZvdbo.75oLNL5oefFAeZbMT3EY.71aSjpD3b6ux7b.JIq8BQFG', 1, 1, 1585471858),
(10, 'Test User 1', 'test1@gmail.com', 'default.jpg', '$2y$10$v3lpYaXBMhVrqpoUiVkymOrh5Ill3ZP0SkbbPm.RNJoFmvQWOO.pi', 2, 1, 1585709895),
(11, 'Test User 2', 'test2@gmail.com', 'default.jpg', '$2y$10$AxIFpralfdwhQDmqbe7ZNepzoaLHM.TMHg126fSOmdtaF7sghv8oe', 3, 1, 1585709923),
(12, 'Noach T', 'noach@gmail.com', '2986071.jpg', '$2y$10$ce.bZruCm2PBAD5utcIkuOm1j0oxX8nH3dQJ65kuyYwl6gFVDWN4e', 3, 1, 1585710770),
(13, 'Denny Edit', 'denny@gmail.com', 'default.jpg', '$2y$10$yOaZUZxhdhZl9m66Izp0E.4S6wYulKAJqcPSDf7sblQYrHWq9Oim6', 1, 1, 1585722596),
(14, 'testuser99', 'testuser99@gmail.com', 'default.jpg', '$2y$10$8kyJx4j6UDOBHcOTkE8L0.NV4fT/4.n0Be/99X/h698d8ncjU4Rv2', 3, 1, 1586343930);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 2, 3),
(5, 1, 4),
(6, 3, 3),
(12, 3, 2),
(13, 3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Patient'),
(4, 'Menu'),
(11, 'Medication');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Super Admin'),
(2, 'Admin Inpatient'),
(3, 'Doctor'),
(4, 'Pharmacy'),
(5, 'Lab'),
(9, 'Role test ');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard ', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user-md', 1),
(4, 2, 'Edit Profile', 'user/editprofile', 'fas fa-fw fa-user-edit', 1),
(5, 4, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(7, 3, 'View Patient List', 'patient', 'fas fa-fw fa-procedures', 1),
(8, 4, 'Submenu management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(13, 1, 'Role', 'admin/role', 'fas fa-user-tie', 1),
(15, 11, 'Request new prescription', 'medication/requestprescription', 'fas fa-fw fa-clipboard-list', 1),
(16, 11, 'View request', 'medication/viewrequest', 'fa-fw fas fa-eye', 1),
(17, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(19, 11, 'View completed request', 'medication/requestcompleted', 'fa-fw far fa-check-circle', 1);

-- --------------------------------------------------------

--
-- Table structure for table `view_completed_prescription`
--

CREATE TABLE `view_completed_prescription` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `diagnoses` varchar(200) NOT NULL,
  `drug_name` varchar(200) NOT NULL,
  `date_issued` int(11) NOT NULL,
  `quantity` int(50) NOT NULL,
  `dosage` int(50) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `view_completed_prescription`
--

INSERT INTO `view_completed_prescription` (`id`, `first_name`, `last_name`, `patient_id`, `diagnoses`, `drug_name`, `date_issued`, `quantity`, `dosage`, `status`) VALUES
(2, 'Denny', 'Raymond', 2, 'Sakit Kepala', 'Panadol', 1586329474, 1, 1, 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view_completed_prescription`
--
ALTER TABLE `view_completed_prescription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `view_completed_prescription`
--
ALTER TABLE `view_completed_prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

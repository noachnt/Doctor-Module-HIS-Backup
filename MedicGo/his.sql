-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 03:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `his`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `admission_status` enum('accepted','rejected','pending','') NOT NULL,
  `bills_id` int(11) NOT NULL,
  `payment_method` enum('cash','debit','installment','BPJS','insurance') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `bed_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `bed_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bills_id` int(11) NOT NULL,
  `total_price` int(128) NOT NULL,
  `bill_status` enum('done','not done','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diagnoses`
--

CREATE TABLE `diagnoses` (
  `diagnose_id` int(11) NOT NULL,
  `patient_id` int(128) NOT NULL,
  `diagnose_by_doctor_id` int(128) NOT NULL,
  `details` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `doctor_schedule` varchar(128) NOT NULL,
  `doctor_speciality` varchar(128) NOT NULL,
  `gender` enum('male','female','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctors_assigned_to_patient`
--

CREATE TABLE `doctors_assigned_to_patient` (
  `date_from` datetime NOT NULL,
  `patient_id` int(128) NOT NULL,
  `doctor_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `drugs_for_indications`
--

CREATE TABLE `drugs_for_indications` (
  `drugs_indications_id` int(11) NOT NULL,
  `diagnose_id` int(128) NOT NULL,
  `drug_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `nurse_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `gender` enum('male','female','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nurse_assign_to_room`
--

CREATE TABLE `nurse_assign_to_room` (
  `assign_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `bed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `outpatient`
--

CREATE TABLE `outpatient` (
  `outpatient_id` int(11) NOT NULL,
  `patient_id` int(128) NOT NULL,
  `doctor_id` int(128) NOT NULL,
  `visit_schedule` int(128) NOT NULL,
  `prescription_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `gender` enum('male','female','','') NOT NULL,
  `DOB` date NOT NULL,
  `phonenum` varchar(128) NOT NULL,
  `date_added` int(128) NOT NULL,
  `patient_status` enum('discharged','outpatient','inpatient','') NOT NULL,
  `patient_address` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_drug_treatment`
--

CREATE TABLE `patient_drug_treatment` (
  `patient_drug_treatment_id` int(11) NOT NULL,
  `patient_id` int(128) NOT NULL,
  `drug_id` int(128) NOT NULL,
  `diagnose_id` int(128) NOT NULL,
  `dosage` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_in_bed`
--

CREATE TABLE `patient_in_bed` (
  `bed_id` int(11) NOT NULL,
  `patient_id` int(128) NOT NULL,
  `date_in` date NOT NULL,
  `visit_schedule` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_record`
--

CREATE TABLE `patient_record` (
  `record_id` int(11) NOT NULL,
  `complaint` varchar(128) NOT NULL,
  `updated_date` date NOT NULL,
  `illness` varchar(128) NOT NULL,
  `blood_type` enum('A','B','AB','O') NOT NULL,
  `height` int(128) NOT NULL,
  `weight` int(128) NOT NULL,
  `blood_pressure` varchar(128) NOT NULL,
  `blood_glucose` varchar(128) NOT NULL,
  `allergies` varchar(128) NOT NULL,
  `patient_id` int(128) NOT NULL,
  `updated_by_staff_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_availability` tinyint(1) NOT NULL,
  `room_grade` enum('Regular (3)','Premium (2)','VIP (1)','VVIP (1)') NOT NULL,
  `room_price` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` int(11) NOT NULL,
  `other_detail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `symptoms_indications`
--

CREATE TABLE `symptoms_indications` (
  `symptoms_id` int(11) NOT NULL,
  `diagnose_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bills_id`);

--
-- Indexes for table `diagnoses`
--
ALTER TABLE `diagnoses`
  ADD PRIMARY KEY (`diagnose_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctors_assigned_to_patient`
--
ALTER TABLE `doctors_assigned_to_patient`
  ADD PRIMARY KEY (`date_from`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`drug_id`);

--
-- Indexes for table `drugs_for_indications`
--
ALTER TABLE `drugs_for_indications`
  ADD PRIMARY KEY (`drugs_indications_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`nurse_id`);

--
-- Indexes for table `nurse_assign_to_room`
--
ALTER TABLE `nurse_assign_to_room`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `outpatient`
--
ALTER TABLE `outpatient`
  ADD PRIMARY KEY (`outpatient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_drug_treatment`
--
ALTER TABLE `patient_drug_treatment`
  ADD PRIMARY KEY (`patient_drug_treatment_id`);

--
-- Indexes for table `patient_in_bed`
--
ALTER TABLE `patient_in_bed`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `patient_record`
--
ALTER TABLE `patient_record`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `symptoms_indications`
--
ALTER TABLE `symptoms_indications`
  ADD PRIMARY KEY (`symptoms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `bed_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bills_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnoses`
--
ALTER TABLE `diagnoses`
  MODIFY `diagnose_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drug_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drugs_for_indications`
--
ALTER TABLE `drugs_for_indications`
  MODIFY `drugs_indications_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `nurse_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nurse_assign_to_room`
--
ALTER TABLE `nurse_assign_to_room`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outpatient`
--
ALTER TABLE `outpatient`
  MODIFY `outpatient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_drug_treatment`
--
ALTER TABLE `patient_drug_treatment`
  MODIFY `patient_drug_treatment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_in_bed`
--
ALTER TABLE `patient_in_bed`
  MODIFY `bed_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_record`
--
ALTER TABLE `patient_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `symptoms_indications`
--
ALTER TABLE `symptoms_indications`
  MODIFY `symptoms_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 14, 2021 at 03:40 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Primehill`
--

-- --------------------------------------------------------

--
-- Table structure for table `Primehill_category`
--

CREATE TABLE `Primehill_category` (
  `categoryID` int(11) NOT NULL,
  `category_name` varchar(150) DEFAULT NULL,
  `category_desc` text,
  `dateCreated` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Primehill_photos`
--

CREATE TABLE `Primehill_photos` (
  `photoID` int(11) NOT NULL,
  `projectID` int(11) DEFAULT NULL,
  `image_url` varchar(200) DEFAULT NULL,
  `dateAdded` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Primehill_projects`
--

CREATE TABLE `Primehill_projects` (
  `projectID` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `project_desc` text NOT NULL,
  `project_image` varchar(300) NOT NULL,
  `project_category` varchar(100) NOT NULL,
  `dateCreated` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Primehill_users`
--

CREATE TABLE `Primehill_users` (
  `userID` int(11) NOT NULL,
  `name` varchar(90) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `is_approved` int(11) DEFAULT NULL,
  `dateAdded` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Primehill_category`
--
ALTER TABLE `Primehill_category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `Primehill_photos`
--
ALTER TABLE `Primehill_photos`
  ADD PRIMARY KEY (`photoID`);

--
-- Indexes for table `Primehill_projects`
--
ALTER TABLE `Primehill_projects`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `Primehill_users`
--
ALTER TABLE `Primehill_users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Primehill_category`
--
ALTER TABLE `Primehill_category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Primehill_photos`
--
ALTER TABLE `Primehill_photos`
  MODIFY `photoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Primehill_projects`
--
ALTER TABLE `Primehill_projects`
  MODIFY `projectID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Primehill_users`
--
ALTER TABLE `Primehill_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Database: `state_connections`
--
CREATE DATABASE IF NOT EXISTS `state_connections` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `state_connections`;

-- --------------------------------------------------------

--
-- Table structure for table `combinations8`
--

CREATE TABLE IF NOT EXISTS `combinations8` (
  `id` int(11) NOT NULL,
  `string` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

CREATE TABLE IF NOT EXISTS `connections` (
  `id` int(10) NOT NULL,
  `origin` varchar(2) NOT NULL,
  `destination` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matched_words`
--

CREATE TABLE IF NOT EXISTS `matched_words` (
  `id` int(11) NOT NULL,
  `st_string` varchar(8) NOT NULL,
  `word` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL,
  `state_abbr` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `combinations8`
--
ALTER TABLE `combinations8`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connections`
--
ALTER TABLE `connections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matched_words`
--
ALTER TABLE `matched_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `combinations8`
--
ALTER TABLE `combinations8`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `connections`
--
ALTER TABLE `connections`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matched_words`
--
ALTER TABLE `matched_words`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

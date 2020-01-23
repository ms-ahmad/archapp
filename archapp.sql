-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 يناير 2020 الساعة 21:21
-- إصدار الخادم: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `archapp`
--

-- --------------------------------------------------------

--
-- بنية الجدول `access`
--

CREATE TABLE `access` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL COMMENT 'Ø§Ù„Ø¹Ù†ÙˆØ§Ù†'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `access`
--

INSERT INTO `access` (`id`, `title`) VALUES
(4, 'Ø³Ø±ÙŠ'),
(6, 'Ø®Ø§Øµ'),
(7, 'Ø¹Ø§Ù…');

-- --------------------------------------------------------

--
-- بنية الجدول `audio`
--

CREATE TABLE `audio` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_Event` int(6) NOT NULL COMMENT 'Ø§Ù„Ø­Ø¯Ø«',
  `KeyWords` varchar(255) DEFAULT NULL COMMENT 'ÙƒÙ„Ù…Ø§Øª Ù…ÙØªØ§Ø­ÙŠØ©',
  `path` varchar(255) DEFAULT NULL COMMENT 'Ù…Ø³Ø§Ø± Ø§Ù„ØµÙˆØª'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `category`
--

CREATE TABLE `category` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL COMMENT 'Ø§Ù„Ø¹Ù†ÙˆØ§Ù†',
  `id_parent` int(6) NOT NULL COMMENT 'Ø§Ù„Ù…Ø¬Ù…ÙˆØ¹Ø© Ø§Ù„Ø£Ø¨'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `category`
--

INSERT INTO `category` (`id`, `title`, `id_parent`) VALUES
(1, 'Ø§Ù„Ù…Ø­Ø§Ø¶Ø±Ø§Øª', 0),
(2, 'Ù…Ø­Ø§Ø¶Ø±Ø§Øª Ø³Ù…Ø§Ø­Ø© Ø§Ù„Ø³ÙŠØ¯', 0),
(3, 'Ù…Ø­Ø¶Ø±Ø§Øª Ù…Ø­Ø±Ù…', 0),
(4, 'ØµÙØ§Øª Ø§Ù†ØµØ§Ø±', 0),
(5, 'Ù…Ø­Ø§Ø¶Ø±Ø§Øª', 0),
(6, 'dffd', 0),
(7, 'hjkkk', 0),
(8, 'tyy', 0),
(9, 'Ø®Ø·Ø§Ø¨Ø§Øª', 6),
(10, 'Ø®Ø·Ø§Ø¨Ø§Øª', 3),
(11, 'Ù…Ø¬Ù…ÙˆØ¹Ø© Ø¬Ø¯ÙŠØ¯Ø© ', 1),
(12, 'Ù…Ø¬Ù…ÙˆØ¹Ø©', 2);

-- --------------------------------------------------------

--
-- بنية الجدول `events`
--

CREATE TABLE `events` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_Access` int(6) NOT NULL COMMENT 'Ø§Ù„ÙˆØµÙˆÙ„',
  `id_Category` int(6) NOT NULL COMMENT 'Ø§Ù„Ù…Ø¬Ù…ÙˆØ¹Ø©',
  `Title` varchar(255) NOT NULL COMMENT 'Ø§Ù„Ø¹Ù†ÙˆØ§Ù†',
  `Date_M` varchar(15) NOT NULL COMMENT 'Ø§Ù„ØªØ§Ø±ÙŠØ® Ø§Ù„Ù…ÙŠÙ„Ø§Ø¯ÙŠ',
  `Date_H` varchar(15) NOT NULL COMMENT 'Ø§Ù„ØªØ§Ø±ÙŠØ® Ø§Ù„Ù‡Ø¬Ø±ÙŠ',
  `Subjects` varchar(250) NOT NULL COMMENT 'Ø§Ù„Ù…ÙˆØ¶ÙˆØ¹Ø§Øª',
  `Lecturer` varchar(250) NOT NULL COMMENT 'Ø§Ù„Ù…Ø­Ø§Ø¶Ø±',
  `Country` varchar(20) NOT NULL COMMENT 'Ø§Ù„Ø¯ÙˆÙ„Ø©',
  `State` varchar(20) NOT NULL COMMENT 'Ø§Ù„Ù…Ø­Ø§ÙØ¸Ø©',
  `Area` varchar(20) NOT NULL COMMENT 'Ø§Ù„Ù…Ù†Ø·Ù‚Ø©',
  `Point` varchar(100) DEFAULT NULL COMMENT 'Ø£Ù‚Ø±Ø¨ Ù†Ù‚Ø·Ø© Ø¯Ø§Ù„Ø©',
  `Persons` varchar(255) DEFAULT NULL COMMENT 'Ø§Ù„Ø£Ø´Ø®Ø§Øµ Ø§Ù„Ù…ÙˆØ¬ÙˆØ¯ÙŠÙ†',
  `KeyWords` varchar(255) DEFAULT NULL COMMENT 'ÙƒÙ„Ù…Ø§Øª Ù…ÙØªØ§Ø­ÙŠØ©',
  `Description` varchar(255) DEFAULT NULL COMMENT 'ØªÙˆØ¶ÙŠØ­',
  `id_user` int(4) NOT NULL COMMENT 'Ù…Ø¯Ø®Ù„ Ø§Ù„Ø¨ÙŠØ§Ù†Ø§Øª',
  `Date_Add` varchar(15) NOT NULL COMMENT 'ØªØ§Ø±ÙŠØ® Ø§Ù„Ø¥Ø¯Ø®Ø§Ù„',
  `image` varchar(255) NOT NULL COMMENT 'Ø§Ù„ØµÙˆØ±Ø© Ø§Ù„Ø¨Ø§Ø±Ø²Ø©',
  `Is_Not_active` tinyint(1) NOT NULL COMMENT 'غير فعال'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `events`
--

INSERT INTO `events` (`id`, `id_Access`, `id_Category`, `Title`, `Date_M`, `Date_H`, `Subjects`, `Lecturer`, `Country`, `State`, `Area`, `Point`, `Persons`, `KeyWords`, `Description`, `id_user`, `Date_Add`, `image`, `Is_Not_active`) VALUES
(15, 6, 2, 'ØµÙØ§Øª Ø§Ù†ØµØ§Ø±', '', '', '4', '', '', '', '', '', '', '', '', 11, '2020/01/11', '628763head-659652_960_720.png', 0),
(16, 4, 3, 'Ø¯ÙŠÙ†ÙŠ', '', '', '3,4,', '', '', '', '', '', '', '', '', 11, '2020/01/11', '831217add_customer.png', 0),
(17, 6, 3, 'Ø®Ø·Ø§Ø¨Ø§Øª', '', '', '2,3,', '', '', '', '', '', '', '', '', 11, '2020/01/11', '317235http___pluspng.com_img-png_customer-transparent-png-image-256.png', 0),
(18, 6, 3, 'Ø¨Ø¹Ø¯ ØªØºÙŠÙŠØ± Ø§Ù„Ø·Ø±ÙŠÙ‚Ø©', '', '', '2,3,4,', '', '', '', '', '', '', '', '', 11, '2020/01/11', '113226head-659652_960_720.png', 0),
(19, 6, 4, 'Ø¹Ø§Ù…', '2020-01-27', '', '1,3,5', 'Ø§Ù„Ø¯ÙƒØªÙˆØ±', 'Ø§Ù„Ø¹Ø±Ø§Ù‚', '', '', '', '', '', '', 11, '2020/01/11', '293669login-logo-png-5 (1).png', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `photo`
--

CREATE TABLE `photo` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_Event` int(6) NOT NULL COMMENT 'Ø§Ù„Ø­Ø¯Ø«',
  `KeyWords` varchar(255) DEFAULT NULL COMMENT 'ÙƒÙ„Ù…Ø§Øª Ù…ÙØªØ§Ø­ÙŠØ©',
  `path` varchar(255) DEFAULT NULL COMMENT 'Ù…Ø³Ø§Ø± Ø§Ù„ØµÙˆØ±Ø©'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `roles`
--

CREATE TABLE `roles` (
  `id` int(6) UNSIGNED NOT NULL,
  `Name` varchar(50) DEFAULT NULL COMMENT 'Ø§Ù„Ø§Ø³Ù…',
  `title` varchar(50) DEFAULT NULL COMMENT 'Ø§Ù„Ø¹Ù†ÙˆØ§Ù†'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `subjects`
--

CREATE TABLE `subjects` (
  `id` int(6) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL COMMENT 'Ø§Ù„Ù…ÙˆØ¶ÙˆØ¹'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `subjects`
--

INSERT INTO `subjects` (`id`, `title`) VALUES
(1, 'Ø¯ÙŠÙ†ÙŠ'),
(2, 'Ø³ÙŠØ§Ø³ÙŠ'),
(3, 'Ø«Ù‚Ø§ÙÙŠ'),
(4, 'Ø§Ø¬ØªÙ…Ø§Ø¹ÙŠ'),
(5, 'Ø§Ù‚ØªØµØ§Ø¯ÙŠ');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_Role` int(6) NOT NULL COMMENT 'Ø§Ù„ØµÙ„Ø§Ø­ÙŠØ§Øª',
  `id_Access` int(6) NOT NULL COMMENT 'Ø§Ù„ÙˆØµÙˆÙ„',
  `UserName` varchar(150) NOT NULL COMMENT 'Ø§Ø³Ù… Ø§Ù„Ù…Ø³ØªØ®Ø¯Ù…',
  `Password` varchar(150) NOT NULL COMMENT 'ÙƒÙ„Ù…Ø© Ø§Ù„Ù…Ø±ÙˆØ±',
  `image` varchar(150) DEFAULT NULL COMMENT 'ØµÙˆØ±Ø©',
  `Is_Not_Active` tinyint(1) DEFAULT NULL COMMENT 'ØºÙŠØ± ÙØ¹Ø§Ù„'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `video`
--

CREATE TABLE `video` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_Event` int(6) NOT NULL COMMENT 'Ø§Ù„Ø­Ø¯Ø«',
  `KeyWords` varchar(255) DEFAULT NULL COMMENT 'ÙƒÙ„Ù…Ø§Øª Ù…ÙØªØ§Ø­ÙŠØ©',
  `path` varchar(255) DEFAULT NULL COMMENT 'Ù…Ø³Ø§Ø± Ø§Ù„ÙÙŠØ¯ÙŠÙˆ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 11:05 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nxlrecruiting`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `file_type` varchar(120) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `parent_id`, `message`, `file_name`, `file_type`, `created_date`, `update_date`) VALUES
(20, 1, 0, 'asdfasdf', '', '', '2019-08-23 13:50:38', '2019-08-23 11:50:38'),
(21, 1, 0, 'asdfasdf', '', '', '2019-08-23 13:50:53', '2019-08-23 11:50:53'),
(22, 1, 0, '', '1566561060@Chrysanthemum.jpg', 'image', '2019-08-23 13:51:00', '2019-08-23 11:51:00'),
(23, 1, 0, 'sadasd', '1566561232@Hydrangeas.jpg', 'image', '2019-08-23 13:53:52', '2019-08-23 11:53:52'),
(25, 1, 0, '', '1566562169@SampleVideo_1280x720_1mb.mp4', 'video', '2019-08-23 14:09:29', '2019-08-23 12:09:29'),
(26, 1, 0, 'new video', '1566562833@SampleVideo_1280x720_1mb.mp4', 'video', '2019-08-23 14:20:33', '2019-08-23 12:20:33'),
(27, 1, 0, 'asdasd', '1566819653@Chrysanthemum.jpg', 'image', '2019-08-26 13:40:53', '2019-08-26 11:40:53'),
(28, 1, 0, 'SDFASDFASDF', '1566828758@Desert.jpg', 'image', '2019-08-26 16:12:38', '2019-08-26 14:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`post_id`, `comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(27, 22, 0, 'dsgsdfgsdfg', 'test', '2019-08-26 12:50:21'),
(27, 23, 22, 'fdfe', 'test', '2019-08-26 12:50:27'),
(25, 24, 0, 'fsdfasdf', 'test', '2019-08-26 12:50:51'),
(25, 25, 24, 'sdfsdfsdf', 'test', '2019-08-26 12:50:55'),
(25, 26, 25, 'sdfsdf', 'test', '2019-08-26 12:51:00'),
(27, 27, 23, 'dfhdfhdfg', 'test', '2019-08-26 12:51:23'),
(27, 28, 0, 'dfsdf', 'test', '2019-08-26 12:58:45'),
(25, 29, 0, 'sfsdf', 'test', '2019-08-26 12:59:48'),
(26, 30, 0, 'sdfsdf', 'test', '2019-08-26 13:05:57'),
(26, 31, 0, 'sdfsdf', 'test', '2019-08-26 13:05:59'),
(26, 32, 0, 'sdfsdf', 'test', '2019-08-26 13:06:03'),
(23, 33, 0, 'ttttttt', 'test', '2019-08-26 13:07:01'),
(23, 34, 0, 'ttttttt', 'test', '2019-08-26 13:07:04'),
(21, 35, 0, 'fgfg', 'test', '2019-08-26 13:08:21'),
(25, 36, 26, 'sdfsdf', 'test', '2019-08-27 04:26:04'),
(26, 37, 32, 'dfgsdf', 'test', '2019-08-27 04:26:38'),
(26, 38, 0, 'dfgsdfsdf', 'test', '2019-08-27 04:26:45'),
(26, 39, 37, 'dfgsdfsdfsdfsdf', 'test', '2019-08-27 04:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` int(250) NOT NULL COMMENT '0- like, 1-unlike',
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`id`, `post_id`, `user_id`, `action`, `created_date`) VALUES
(17, 26, 2, 0, '2019-08-26 13:06:11'),
(18, 25, 2, 0, '2019-08-26 13:08:14'),
(19, 23, 2, 0, '2019-08-26 13:08:38'),
(20, 22, 2, 0, '2019-08-26 13:08:39'),
(21, 26, 1, 0, '2019-08-26 13:09:12'),
(22, 25, 1, 1, '2019-08-26 13:09:17'),
(23, 23, 1, 0, '2019-08-26 13:09:19'),
(24, 22, 1, 0, '2019-08-26 13:09:22'),
(25, 21, 1, 0, '2019-08-26 13:09:24'),
(26, 27, 1, 0, '2019-08-26 13:40:58'),
(27, 28, 1, 0, '2019-08-26 16:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `post_share`
--

CREATE TABLE `post_share` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_share`
--

INSERT INTO `post_share` (`id`, `user_id`, `post_id`, `message`, `created_date`) VALUES
(2, 1, 27, 'dsfasdfasdf', '2019-08-26 10:39:46'),
(3, 1, 27, 'asdasdASD', '2019-08-26 10:39:59'),
(4, 1, 26, 'NICE', '2019-08-26 10:40:14'),
(5, 1, 26, 'SADASDASD', '2019-08-26 10:42:29'),
(6, 1, 28, 'SDFASFSADF', '2019-08-26 10:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(120) NOT NULL,
  `button_link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'administrator', 0),
(19, 'ravi', 'ravi@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'user', 0),
(20, 'nakul', 'nakul@gmail.com', 'd72829da10121ba261b616b986c13af1', 'user', 0),
(21, 'ravik', 'asdfasdf@gmail.com', '2a7401c49b45e3caf9187d0421e70a5c', 'user', 0),
(22, 'mohit', 'asdfdf@gmail.com', 'd8052f9e09a17e6907629e76bbd261cc', 'coach', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_billing_details`
--

CREATE TABLE `user_billing_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `city` varchar(120) NOT NULL,
  `state` varchar(120) NOT NULL,
  `postal_code` varchar(120) NOT NULL,
  `country` varchar(120) NOT NULL,
  `automatic_renewals` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `school` varchar(120) NOT NULL,
  `sports_coache` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `first_name`, `last_name`, `phone`, `address`, `school`, `sports_coache`) VALUES
(1, 1, 'admin', 'test', '9876543215', '', '', ''),
(19, 19, 'ravi', 'kumar', '3216549875', 'ravi - noida', '', ''),
(20, 20, 'nakul', 'kumar', '316459875', 'tset', '', ''),
(21, 21, 'asdfasdf', 'sadfsadf', '3216549875', 'asdfasdfasdf', '', ''),
(22, 22, 'mohit', 'kumar', '3216549785', 'tesfasdfasd fasdf', 'asdfsdf', 'asdfasdfsadf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_share`
--
ALTER TABLE `post_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_billing_details`
--
ALTER TABLE `user_billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `post_share`
--
ALTER TABLE `post_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_billing_details`
--
ALTER TABLE `user_billing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

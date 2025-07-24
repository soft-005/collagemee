-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2025 at 03:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finx`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `off` int(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dailyp`
--

CREATE TABLE `dailyp` (
  `id` int(11) NOT NULL,
  `profit` int(11) NOT NULL,
  `market` varchar(255) NOT NULL,
  `time` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_days`
--

CREATE TABLE `data_days` (
  `id` int(255) NOT NULL,
  `dated` varchar(255) NOT NULL,
  `ips` int(255) NOT NULL,
  `sessions` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `data_days`
--

INSERT INTO `data_days` (`id`, `dated`, `ips`, `sessions`) VALUES
(1, '2020-09-11', 23, 8),
(2, '2020-09-12', 234, 43),
(3, '2020-09-13', 22, 166),
(4, '2020-09-14', 0, 0),
(5, '2020-09-15', 53, 95),
(6, '2020-09-16', 0, 0),
(7, '2020-09-17', 0, 0),
(8, '2020-09-18', 0, 1),
(9, '2020-09-19', 0, 1),
(10, '2020-09-20', 0, 1),
(11, '2020-09-21', 0, 1),
(12, '2020-09-22', 0, 0),
(13, '2020-09-27', 0, 1),
(14, '2020-09-28', 0, 1),
(15, '2020-09-29', 0, 1),
(16, '2020-09-30', 0, 0),
(17, '2020-10-01', 0, 3),
(18, '2020-10-02', 0, 0),
(19, '2020-10-03', 0, 3),
(20, '2020-10-04', 0, 1),
(21, '2020-10-05', 0, 1),
(22, '2020-10-06', 0, 1),
(23, '2020-10-07', 2, 2),
(24, '2020-10-08', 3, 1),
(25, '2020-10-10', 3, 2),
(26, '2020-10-11', 1, 1),
(27, '2020-10-12', 1, 1),
(28, '2020-10-13', 1, 2),
(29, '2020-10-16', 2, 2),
(30, '2020-10-20', 1, 0),
(31, '2020-10-23', 0, 1),
(32, '2020-10-25', 0, 0),
(39, '2020-11-09', 0, 1),
(33, '2020-10-26', 2, 2),
(34, '2020-10-30', 0, 0),
(35, '2020-10-31', 0, 1),
(36, '2020-11-01', 0, 0),
(37, '2020-11-02', 3, 0),
(38, '2020-11-04', 1, 2),
(40, '2020-11-11', 0, 1),
(41, '2020-11-17', 1, 2),
(42, '2020-11-20', 0, 0),
(43, '2020-11-21', 0, 1),
(44, '2020-12-14', 0, 1),
(45, '2020-12-15', 0, 0),
(46, '2021-01-29', 0, 1),
(47, '2021-01-30', 0, 1),
(48, '2021-01-31', 1, 0),
(49, '2021-02-01', 1, 1),
(50, '2021-02-02', 0, 1),
(51, '2021-02-03', 0, 0),
(52, '2021-02-02', 0, 0),
(53, '2021-02-04', 2, 0),
(54, '2021-03-14', 1, 1),
(55, '2021-03-16', 0, 1),
(56, '2021-03-17', 0, 1),
(57, '2021-03-18', 3, 0),
(58, '2021-07-23', 1, 0),
(59, '2021-07-24', 2, 1),
(60, '2021-08-29', 1, 1),
(61, '2021-08-30', 1, 1),
(62, '2021-08-31', 1, 1),
(63, '2021-09-02', 1, 1),
(64, '2021-09-03', 0, 1),
(65, '2021-09-09', 2, 4),
(66, '2021-09-11', 1, 0),
(67, '2021-09-12', 3, 1),
(68, '2021-10-10', 1, 1),
(69, '2021-10-31', 4, 1),
(70, '2022-08-18', 2, 1),
(71, '2022-08-20', 1, 1),
(72, '2022-08-21', 0, 0),
(73, '2022-08-21', 1, 1),
(74, '2022-08-22', 0, 0),
(75, '2022-08-22', 1, 1),
(76, '2022-08-24', 7, 2),
(77, '2022-08-30', 4, 3),
(78, '2022-09-01', 0, 1),
(79, '2022-09-01', 2, 2),
(80, '2022-09-13', 2, 1),
(81, '2022-09-24', 2, 1),
(82, '2022-10-14', 1, 1),
(83, '2022-10-30', 9, 3),
(84, '2022-11-08', 1, 1),
(85, '2022-11-09', 4, 1),
(86, '2022-11-10', 0, 0),
(87, '2022-11-11', 1, 2),
(88, '2022-11-12', 3, 0),
(89, '2022-11-13', 15, 1),
(90, '2022-11-30', 0, 1),
(91, '2022-12-01', 1, 1),
(92, '2022-12-03', 1, 0),
(93, '2022-12-03', 0, 0),
(94, '2022-12-03', 0, 0),
(95, '2022-12-03', 0, 0),
(96, '2022-12-03', 0, 0),
(97, '2022-12-03', 1, 1),
(98, '2022-12-04', 2, 1),
(99, '2022-12-05', 2, 1),
(100, '2022-12-08', 4, 1),
(101, '2022-12-10', 1, 1),
(102, '2022-12-11', 1, 1),
(103, '2022-12-12', 1, 1),
(104, '2022-12-17', 3, 1),
(105, '2023-02-10', 4, 2),
(106, '2023-06-06', 0, 1),
(107, '2023-06-08', 0, 1),
(108, '2023-06-18', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_ip`
--

CREATE TABLE `data_ip` (
  `id` int(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date_added` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `coin` varchar(255) DEFAULT NULL,
  `type` int(255) DEFAULT NULL,
  `id_trans` int(255) DEFAULT NULL,
  `status` int(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nfts`
--

CREATE TABLE `nfts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `id` int(255) NOT NULL,
  `pin` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pin`
--

INSERT INTO `pin` (`id`, `pin`) VALUES
(1, 124943),
(2, 285483);

-- --------------------------------------------------------

--
-- Table structure for table `pro_click`
--

CREATE TABLE `pro_click` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `amount` int(255) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `iproof` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_main`
--

CREATE TABLE `site_main` (
  `id` int(255) DEFAULT NULL,
  `team1_img` varchar(255) DEFAULT NULL,
  `team1_cont` varchar(255) DEFAULT NULL,
  `team2_img` varchar(255) DEFAULT NULL,
  `team2_cont` varchar(255) DEFAULT NULL,
  `team3_img` varchar(255) DEFAULT NULL,
  `team3_cont` varchar(255) DEFAULT NULL,
  `team4_img` varchar(255) DEFAULT NULL,
  `team4_cont` varchar(255) DEFAULT NULL,
  `team5_img` varchar(255) DEFAULT NULL,
  `team5_cont` varchar(255) DEFAULT NULL,
  `pack1_p` int(255) DEFAULT NULL,
  `pack1_a` int(255) DEFAULT NULL,
  `pack1_d` int(255) DEFAULT NULL,
  `pack2_p` int(255) DEFAULT NULL,
  `pack2_a` int(255) DEFAULT NULL,
  `pack2_d` int(255) DEFAULT NULL,
  `pack3_p` int(255) DEFAULT NULL,
  `pack3_a` int(255) DEFAULT NULL,
  `pack3_d` int(255) DEFAULT NULL,
  `pack4_p` int(255) DEFAULT NULL,
  `pack4_a` int(255) DEFAULT NULL,
  `pack4_d` int(255) DEFAULT NULL,
  `adm_pass` varchar(255) DEFAULT NULL,
  `btc_i` varchar(255) DEFAULT NULL,
  `btc_c` varchar(255) DEFAULT NULL,
  `eth_i` varchar(255) DEFAULT NULL,
  `eth_c` varchar(255) DEFAULT NULL,
  `usdt_i` varchar(255) DEFAULT NULL,
  `usdt_c` varchar(255) DEFAULT NULL,
  `bch_c` varchar(255) DEFAULT NULL,
  `doge_c` varchar(255) DEFAULT NULL,
  `lite_c` varchar(255) DEFAULT NULL,
  `usdte_c` varchar(255) DEFAULT NULL,
  `bnb_i` varchar(255) DEFAULT NULL,
  `bnb_c` varchar(255) DEFAULT NULL,
  `ada_i` varchar(255) DEFAULT NULL,
  `ada_c` varchar(255) DEFAULT NULL,
  `usdc_i` varchar(255) DEFAULT NULL,
  `usdc_c` varchar(255) DEFAULT NULL,
  `adm_email` varchar(255) DEFAULT NULL,
  `chart_setting` int(255) DEFAULT NULL,
  `referal_amount` int(255) DEFAULT NULL,
  `new_user` int(255) DEFAULT NULL,
  `session_at_user` int(255) DEFAULT NULL,
  `depoc` int(255) DEFAULT NULL,
  `whataspp` int(255) DEFAULT NULL,
  `btc_i2` varchar(255) DEFAULT NULL,
  `btc_c2` varchar(255) DEFAULT NULL,
  `usdt_i2` varchar(255) DEFAULT NULL,
  `usdt_c2` varchar(255) DEFAULT NULL,
  `eth_i2` varchar(255) DEFAULT NULL,
  `eth_c2` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `site_main`
--

INSERT INTO `site_main` (`id`, `team1_img`, `team1_cont`, `team2_img`, `team2_cont`, `team3_img`, `team3_cont`, `team4_img`, `team4_cont`, `team5_img`, `team5_cont`, `pack1_p`, `pack1_a`, `pack1_d`, `pack2_p`, `pack2_a`, `pack2_d`, `pack3_p`, `pack3_a`, `pack3_d`, `pack4_p`, `pack4_a`, `pack4_d`, `adm_pass`, `btc_i`, `btc_c`, `eth_i`, `eth_c`, `usdt_i`, `usdt_c`, `bch_c`, `doge_c`, `lite_c`, `usdte_c`, `bnb_i`, `bnb_c`, `ada_i`, `ada_c`, `usdc_i`, `usdc_c`, `adm_email`, `chart_setting`, `referal_amount`, `new_user`, `session_at_user`, `depoc`, `whataspp`, `btc_i2`, `btc_c2`, `usdt_i2`, `usdt_c2`, `eth_i2`, `eth_c2`) VALUES
(1, '', '', '', '', 'unnamed.png', '', '', '', '', '', 25, 5000, 11, 35, 10000, 12, 50, 100000, 12, 65, 200000, 10, 'password', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'adm@collageme.com', 1000, 1000, 49, 254, 333, NULL, '', '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `refered` int(255) DEFAULT NULL,
  `last_seen` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `joined` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(255) DEFAULT NULL,
  `pazi` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `amount_total` int(255) DEFAULT NULL,
  `amount_eth` int(255) DEFAULT NULL,
  `amount_usdt` int(255) DEFAULT NULL,
  `amount_btc` int(255) DEFAULT NULL,
  `amount_ada` int(255) DEFAULT NULL,
  `amount_usdc` int(255) DEFAULT NULL,
  `amount_bnb` int(255) DEFAULT NULL,
  `refered_by` int(255) DEFAULT NULL,
  `noti` int(255) DEFAULT NULL,
  `paid` int(255) DEFAULT NULL,
  `last_paid` datetime DEFAULT NULL,
  `t_deposit` int(255) DEFAULT NULL,
  `t_withdraw` int(255) DEFAULT NULL,
  `t_trade` int(255) DEFAULT NULL,
  `t_profit` int(255) DEFAULT NULL,
  `initial_deposit` int(255) DEFAULT NULL,
  `display` int(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `acc_bal` int(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `semail` varchar(255) DEFAULT NULL,
  `bnoti` int(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `isKyc` int(255) DEFAULT NULL,
  `wallet` varchar(255) DEFAULT NULL,
  `iproof` text DEFAULT NULL,
  `kyc1` varchar(255) DEFAULT NULL,
  `kyc2` varchar(255) DEFAULT NULL,
  `kyc3` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailyp`
--
ALTER TABLE `dailyp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_days`
--
ALTER TABLE `data_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_ip`
--
ALTER TABLE `data_ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nfts`
--
ALTER TABLE `nfts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_click`
--
ALTER TABLE `pro_click`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dailyp`
--
ALTER TABLE `dailyp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_days`
--
ALTER TABLE `data_days`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `data_ip`
--
ALTER TABLE `data_ip`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nfts`
--
ALTER TABLE `nfts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pro_click`
--
ALTER TABLE `pro_click`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 年 7 朁E19 日 08:42
-- サーバのバージョン： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionnaire_system`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `answer_radio`
--

CREATE TABLE `answer_radio` (
  `id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `answer` int(1) NOT NULL,
  `respondent_id` int(2) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `answer_text`
--

CREATE TABLE `answer_text` (
  `id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `respondent_id` int(2) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `evaluations`
--

CREATE TABLE `evaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varbinary(64) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `age_group` int(2) UNSIGNED NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `impressions` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `members`
--

INSERT INTO `members` (`id`, `product_id`, `name`) VALUES
(1, 1, '佐藤太郎'),
(2, 1, '田中太郎'),
(3, 2, '斎藤太郎'),
(4, 3, '石垣太郎'),
(5, 1, '岩本太郎');

-- --------------------------------------------------------

--
-- テーブルの構造 `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `overview` text NOT NULL,
  `img` varchar(128) DEFAULT NULL,
  `delegate` varchar(256) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `product_name`, `overview`, `img`, `delegate`, `create_time`) VALUES
(1, 'イラスト', '夜景を書きました。色使いに意識して尚且つ建物もらしさを意識して描いてみました。コンセプトは「明け方」ということなので、雰囲気作りに苦労はしましたが、うまく表現出来たと思います。', 'img/480_800', '佐藤', '2016-04-27 06:21:29'),
(2, 'コミック', 'ここを頑張りました', NULL, '田中', '2016-04-27 06:23:16'),
(3, 'ゲーム', '作りました', NULL, '田中', '2016-05-01 23:24:32'),
(4, 'ロボット', 'ロボットを作りました', NULL, '田中', '2016-05-12 06:11:19');

-- --------------------------------------------------------

--
-- テーブルの構造 `questionnaire`
--

CREATE TABLE `questionnaire` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `year` year(4) NOT NULL,
  `type` varchar(12) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `content`, `year`, `type`, `create_time`) VALUES
(1, '会場はどうでしたか', 2017, 'radio', '2016-07-19 06:41:11'),
(2, '生徒の態度はどうでしたか', 2018, 'text', '2016-07-19 06:41:16');

-- --------------------------------------------------------

--
-- テーブルの構造 `respondents`
--

CREATE TABLE `respondents` (
  `id` int(11) NOT NULL,
  `respondent` varchar(24) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `respondents`
--

INSERT INTO `respondents` (`id`, `respondent`, `create_time`) VALUES
(1, '一般', '2016-07-19 05:54:12'),
(2, '新入生', '2016-07-19 05:54:12'),
(3, '企業', '2016-07-19 05:54:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer_radio`
--
ALTER TABLE `answer_radio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer_text`
--
ALTER TABLE `answer_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD UNIQUE KEY `user_id` (`user_id`,`product_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respondents`
--
ALTER TABLE `respondents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer_radio`
--
ALTER TABLE `answer_radio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answer_text`
--
ALTER TABLE `answer_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `respondents`
--
ALTER TABLE `respondents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

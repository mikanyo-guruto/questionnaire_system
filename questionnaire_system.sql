-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 年 10 朁E11 日 00:31
-- サーバのバージョン： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `questionnaire_system`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL,
  `questionnaire_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `respondent_id` int(2) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `answers`
--

INSERT INTO `answers` (`id`, `questionnaire_id`, `answer`, `respondent_id`, `create_time`) VALUES
(1, 1, '3', 1, '2016-08-02 07:32:52'),
(2, 1, '2', 1, '2016-08-03 02:54:25'),
(3, 3, '1', 1, '2016-08-03 02:56:54'),
(4, 1, '2', 1, '2016-08-04 21:39:42'),
(5, 4, 'よかった', 2, '2016-08-04 22:38:49'),
(6, 4, 'あんまし', 1, '2016-08-04 22:56:32'),
(7, 4, 'いいね', 2, '2016-08-06 20:28:04'),
(8, 4, 'いいと思います', 3, '2016-08-06 20:28:16');

-- --------------------------------------------------------

--
-- テーブルの構造 `evaluations`
--

CREATE TABLE IF NOT EXISTS `evaluations` (
  `id` int(10) unsigned NOT NULL,
  `user_id` varbinary(64) NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `age_group` int(2) unsigned NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `impression` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `evaluations`
--

INSERT INTO `evaluations` (`id`, `user_id`, `product_id`, `age_group`, `gender`, `impression`, `create_time`) VALUES
(3, '', 1, 1, 1, 'よかったです', '2016-07-30 07:51:05'),
(6, 0x02, 2, 1, 1, 'よかったです', '2016-07-30 07:53:41'),
(7, 0x3213, 1, 1, 1, 'kkk', '2016-07-30 07:54:00'),
(9, 0x02311231, 1, 0, 0, 'iii', '2016-07-30 10:50:58');

-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `overview` text NOT NULL,
  `genre` text NOT NULL,
  `value` int(10) unsigned NOT NULL,
  `img` varchar(128) DEFAULT NULL,
  `delegate` varchar(256) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `products`
--

INSERT INTO `products` (`id`, `product_name`, `overview`, `genre`, `value`, `img`, `delegate`, `create_time`) VALUES
(1, 'イラスト', '夜景を書きました。色使いに意識して尚且つ建物もらしさを意識して描いてみました。コンセプトは「明け方」ということなので、雰囲気作りに苦労はしましたが、うまく表現出来たと思います。', 'illust', 1, 'img/480_800', '佐藤', '2016-04-27 06:21:29'),
(2, 'コミック', 'ここを頑張りました', 'illust', 0, NULL, '田中', '2016-04-27 06:23:16'),
(3, 'ゲーム', '作りました', 'game', 0, NULL, '田中', '2016-05-01 23:24:32'),
(4, 'ロボット', 'ロボットを作りました', 'IT', 0, NULL, '田中', '2016-05-12 06:11:19');

-- --------------------------------------------------------

--
-- テーブルの構造 `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `year` year(4) NOT NULL,
  `type` varchar(12) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `content`, `year`, `type`, `create_time`) VALUES
(1, '会場はどうでしたか', 2017, 'radio', '2016-07-19 06:41:11'),
(2, '生徒の態度はどうでしたか', 2018, 'text', '2016-07-19 06:41:16'),
(3, '作品はどうでしたか', 2017, 'radio', '2016-08-03 02:43:08'),
(4, '会場の感想をどうぞ', 2017, 'text', '2016-08-04 21:02:58'),
(18, 'こんにちわ', 2016, 'radio', '2016-08-30 01:48:31'),
(19, 'ありがとう', 2016, 'text', '2016-08-30 01:48:31'),
(20, 'こんにちわ', 2016, 'radio', '2016-09-09 00:50:50'),
(21, 'こんにちわ', 2016, 'radio', '2016-09-09 00:51:07'),
(22, 'こんにちわ', 2016, 'radio', '2016-09-09 00:52:33'),
(23, 'こんにちわ', 2016, 'radio', '2016-09-09 00:52:40'),
(24, 'こんにちわ', 2016, 'radio', '2016-09-09 00:59:19');

-- --------------------------------------------------------

--
-- テーブルの構造 `respondents`
--

CREATE TABLE IF NOT EXISTS `respondents` (
  `id` int(11) NOT NULL,
  `respondent` varchar(24) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_id` (`user_id`,`product_id`);

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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `respondents`
--
ALTER TABLE `respondents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

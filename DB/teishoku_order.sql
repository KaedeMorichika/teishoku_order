-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: db
-- 生成日時: 2021 年 1 月 22 日 15:14
-- サーバのバージョン： 5.7.32-log
-- PHP のバージョン: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `teishoku_order`
--
CREATE DATABASE IF NOT EXISTS `teishoku_order` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `teishoku_order`;

-- --------------------------------------------------------

--
-- テーブルの構造 `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `category`
--

INSERT INTO `category` (`id`, `name`, `info`, `created`, `updated`) VALUES
(1, '唐揚げ', '唐揚げ用のソース', 1611317676, 1611317676);

-- --------------------------------------------------------

--
-- テーブルの構造 `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `info` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `dish`
--

INSERT INTO `dish` (`id`, `name`, `price`, `info`, `created`, `updated`) VALUES
(1, '唐揚げ定食', 720, 'オーソドックスな唐揚げ定食。サラリーマンに大人気。選べるソースも嬉しいポイント。', 1609073787, 1609073787),
(2, 'チキン南蛮定食', 840, '唐揚げ定食から生まれた新メニュー。ガッツリいきたいあなたに。', 1609073991, 1609073991),
(3, 'カレー定食', 550, '老若男女に人気なカレーをお手頃価格で。', 1609074039, 1609074039),
(4, '回鍋肉定食', 800, '回鍋肉定食', 1609330315, 1609330315);

-- --------------------------------------------------------

--
-- テーブルの構造 `option_menu`
--

CREATE TABLE `option_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `option_menu`
--

INSERT INTO `option_menu` (`id`, `name`, `price`, `category_id`, `created`, `updated`) VALUES
(1, 'チリソース', 200, 1, 1611319290, 1611319290),
(2, 'ペッパーソース', 200, 1, 1611319290, 1611319290),
(3, 'タルタルソース', 350, 1, 1611319290, 1611319290);

-- --------------------------------------------------------

--
-- テーブルの構造 `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `dish_num` int(11) NOT NULL DEFAULT '0',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `dish_id`, `dish_num`, `created`, `updated`) VALUES
(1, 1, 1, 1, 1610891334, 1610891334),
(2, 1, 1, 1, 1610891368, 1610891368),
(3, 1, 1, 1, 1610891368, 1610891368),
(4, 1, 1, 2, 1610891416, 1610891416),
(5, 1, 2, 2, 1610891416, 1610891416),
(6, 1, 4, 3, 1610891416, 1610891416),
(7, 1, 1, 2, 1610892129, 1610892129),
(8, 1, 2, 3, 1610892129, 1610892129),
(9, 1, 4, 2, 1610892129, 1610892129),
(10, 1, 1, 3, 1610892219, 1610892219),
(11, 1, 2, 2, 1610892219, 1610892219),
(12, 1, 3, 3, 1610892219, 1610892219),
(13, 1, 1, 1, 1611326864, 1611326864),
(14, 1, 1, 1, 1611326960, 1611326960),
(15, 1, 1, 1, 1611327101, 1611327101),
(16, 1, 1, 1, 1611327321, 1611327321),
(17, 1, 1, 1, 1611327353, 1611327353),
(18, 1, 1, 1, 1611327367, 1611327367),
(19, 1, 1, 1, 1611327392, 1611327392),
(20, 1, 1, 1, 1611327454, 1611327454),
(21, 1, 1, 1, 1611327475, 1611327475),
(22, 1, 1, 1, 1611327484, 1611327484),
(23, 1, 1, 1, 1611327548, 1611327548),
(24, 1, 1, 1, 1611327649, 1611327649),
(25, 1, 1, 1, 1611327660, 1611327660),
(26, 1, 1, 1, 1611327719, 1611327719),
(27, 1, 1, 1, 1611327771, 1611327771),
(28, 1, 1, 1, 1611327780, 1611327780),
(29, 1, 1, 1, 1611327851, 1611327851),
(30, 1, 1, 1, 1611327941, 1611327941),
(31, 1, 1, 1, 1611328042, 1611328042),
(32, 1, 1, 1, 1611328074, 1611328074),
(33, 1, 1, 1, 1611328143, 1611328143),
(34, 1, 1, 1, 1611328164, 1611328164);

-- --------------------------------------------------------

--
-- テーブルの構造 `order_options`
--

CREATE TABLE `order_options` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_num` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `order_options`
--

INSERT INTO `order_options` (`id`, `order_id`, `option_id`, `option_num`, `created`, `updated`) VALUES
(1, 33, 1, 1, 1611328143, 1611328143),
(2, 34, 1, 1, 1611328164, 1611328164),
(3, 34, 2, 1, 1611328164, 1611328164),
(4, 34, 3, 1, 1611328164, 1611328164);

-- --------------------------------------------------------

--
-- テーブルの構造 `relate_dish_category`
--

CREATE TABLE `relate_dish_category` (
  `id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `relate_dish_category`
--

INSERT INTO `relate_dish_category` (`id`, `dish_id`, `category_id`, `created`, `updated`) VALUES
(1, 1, 1, 1611318025, 1611318025);

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `user`
--

INSERT INTO `user` (`id`, `name`, `user_id`, `password`, `created`, `updated`) VALUES
(1, 'master', 'master', '$2y$10$Y.a3YC5FJLKYIaogmDUc/e4xDpzAa4W8Za5csn9FMTdk3NJCykBpu', 1609043280, 1609043280);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `option_menu`
--
ALTER TABLE `option_menu`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `order_options`
--
ALTER TABLE `order_options`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `relate_dish_category`
--
ALTER TABLE `relate_dish_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dish_id_category_id` (`dish_id`,`category_id`);

--
-- テーブルのインデックス `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `option_menu`
--
ALTER TABLE `option_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- テーブルの AUTO_INCREMENT `order_options`
--
ALTER TABLE `order_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `relate_dish_category`
--
ALTER TABLE `relate_dish_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: db
-- 生成日時: 2021 年 1 月 17 日 13:54
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

-- --------------------------------------------------------

--
-- テーブルの構造 `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `info` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `dish`
--

INSERT INTO `dish` (`id`, `name`, `price`, `main_category_id`, `info`, `created`, `updated`) VALUES
(1, '唐揚げ定食', 720, 0, 'オーソドックスな唐揚げ定食。サラリーマンに大人気。選べるソースも嬉しいポイント。', 1609073787, 1609073787),
(2, 'チキン南蛮定食', 840, 0, '唐揚げ定食から生まれた新メニュー。ガッツリいきたいあなたに。', 1609073991, 1609073991),
(3, 'カレー定食', 550, 0, '老若男女に人気なカレーをお手頃価格で。', 1609074039, 1609074039),
(4, '回鍋肉定食', 800, 0, '回鍋肉定食', 1609330315, 1609330315);

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
(6, 1, 4, 3, 1610891416, 1610891416);

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
-- テーブルのインデックス `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `relate_dish_category`
--
ALTER TABLE `relate_dish_category`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `relate_dish_category`
--
ALTER TABLE `relate_dish_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

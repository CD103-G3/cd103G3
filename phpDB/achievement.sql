-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018 年 11 月 19 日 13:13
-- 伺服器版本: 8.0.12
-- PHP 版本： 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cd103g3`
--

-- --------------------------------------------------------

--
-- 資料表結構 `achievement`
--

CREATE TABLE `achievement` (
  `achievement_No` int(5) NOT NULL,
  `achievement_Bonus` int(5) DEFAULT '0',
  `achievement_Name` varchar(10) NOT NULL,
  `achievement_Pic` varchar(255) NOT NULL,
  `meal_Total` int(5) NOT NULL,
  `isAchievable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `achievement`
--

INSERT INTO `achievement` (`achievement_No`, `achievement_Bonus`, `achievement_Name`, `achievement_Pic`, `meal_Total`, `isAchievable`) VALUES
(1, 0, '日食小雞', 'chickAchievement (1).png', 0, 0),
(2, 20, '日食初心者', 'chickAchievement (2).png', 20, 0),
(3, 40, '日食常客', 'chickAchievement (3).png', 40, 0),
(4, 80, '日食老顧客', 'chickAchievement (4).png', 80, 0),
(5, 200, '日食VIP', 'chickAchievement (5).png', 200, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`achievement_No`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `achievement`
--
ALTER TABLE `achievement`
  MODIFY `achievement_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

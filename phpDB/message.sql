-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018 年 11 月 19 日 20:22
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
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `message_No` int(5) NOT NULL,
  `member_No` int(11) DEFAULT NULL,
  `meal_No` int(11) DEFAULT NULL,
  `message_Content` varchar(255) NOT NULL,
  `message_Time` date NOT NULL,
  `message_Reported` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `message`
--

INSERT INTO `message` (`message_No`, `member_No`, `meal_No`, `message_Content`, `message_Time`, `message_Reported`) VALUES
(1, 1, 1, '好吃的日食義大利麵', '2018-10-17', 0),
(2, 1, 10, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 0),
(3, 1, 10, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-18', 0),
(4, 1, 10, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-18', 1),
(5, 1, 10, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 1),
(6, 1, 12, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-18', 0),
(7, 1, 12, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 0),
(8, 1, 12, '感謝父母讓我來這世上~', '2018-11-18', 1),
(9, 1, 12, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-18', 1),
(10, 1, 12, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 1),
(11, 1, 12, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-18', 1),
(12, 1, 12, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 0),
(13, 1, 12, '感謝父母讓我來這世上111121212121212', '2018-11-18', 0),
(14, 1, 12, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-18', 0),
(15, 1, 12, '感謝父母讓我來這世上~', '2018-11-18', 1),
(16, 1, 12, '感謝父母讓我來這世上~', '2018-11-18', 1),
(17, 1, 12, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-18', 1),
(18, 1, 12, '感謝父母讓我來這世上~', '2018-11-18', 0),
(19, 1, 12, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 1),
(30, 1, 12, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 1),
(20, 1, 12, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-18', 1),
(21, 1, 12, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-18', 0),
(22, 1, 12, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-18', 1),
(23, 1, 12, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 0),
(24, 1, 12, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 0),
(25, 1, 12, '感謝父母讓我來這世上~', '2018-11-18', 0),
(26, 1, 12, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 0),
(27, 1, 12, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-18', 0),
(28, 1, 12, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-18', 0),
(29, 1, 12, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-18', 1),
(31, 1, 12, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-18', 1),
(32, 1, 12, '感謝父母讓我來這世上~', '2018-11-18', 1),
(33, 1, 2, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-19', 0),
(34, 1, 2, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-19', 0),
(35, 1, 2, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-19', 1),
(36, 1, 2, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-19', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `messagereport`
--

CREATE TABLE `messagereport` (
  `report_No` int(5) NOT NULL,
  `message_No` int(5) DEFAULT NULL,
  `report_Content` char(255) NOT NULL,
  `report_Date` date NOT NULL,
  `report_Status` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'not' COMMENT '尚未審核(not) 審核通過(pass) 審核不通過(unpass) 預設：not'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `messagereport`
--

INSERT INTO `messagereport` (`report_No`, `message_No`, `report_Content`, `report_Date`, `report_Status`) VALUES
(1, 1, '日食義大利麵好好吃', '2018-10-17', 'pass'),
(2, 2, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 'pass'),
(3, 8, '感謝父母讓我來這世上~', '2018-11-18', 'unpass'),
(4, 9, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-18', 'unpass'),
(7, 2, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 'unpass'),
(6, 11, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-18', 'unpass'),
(8, 13, 'test', '2018-11-18', 'pass'),
(9, 18, '感謝父母讓我來這世上~', '2018-11-18', 'pass'),
(10, 20, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-18', 'pass'),
(11, 17, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-18', 'not'),
(12, 22, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-18', 'pass'),
(13, 29, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-18', 'unpass'),
(14, 16, '感謝父母讓我來這世上~', '2018-11-18', 'unpass'),
(15, 15, '感謝父母讓我來這世上~', '2018-11-18', 'unpass'),
(16, 31, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-18', 'unpass'),
(17, 32, '感謝父母讓我來這世上~', '2018-11-18', 'not'),
(18, 30, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-18', 'not'),
(19, 35, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-19', 'not');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_No`),
  ADD KEY `member_No` (`member_No`),
  ADD KEY `meal_No` (`meal_No`);

--
-- 資料表索引 `messagereport`
--
ALTER TABLE `messagereport`
  ADD PRIMARY KEY (`report_No`),
  ADD KEY `message_No` (`message_No`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `message_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- 使用資料表 AUTO_INCREMENT `messagereport`
--
ALTER TABLE `messagereport`
  MODIFY `report_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

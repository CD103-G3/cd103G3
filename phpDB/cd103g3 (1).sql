-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018 年 11 月 15 日 19:54
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

-- --------------------------------------------------------

--
-- 資料表結構 `groupon`
--

CREATE TABLE `groupon` (
  `groupon_No` int(5) NOT NULL,
  `groupon_Name` varchar(20) NOT NULL,
  `groupon_TagNo` int(11) DEFAULT NULL,
  `groupon_FounderId` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `groupon_Bonus` int(5) DEFAULT '0',
  `memberNow` int(5) DEFAULT '0',
  `discount` float DEFAULT '0.6',
  `groupon_MemberNeed` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `groupon`
--

INSERT INTO `groupon` (`groupon_No`, `groupon_Name`, `groupon_TagNo`, `groupon_FounderId`, `startDate`, `endDate`, `groupon_Bonus`, `memberNow`, `discount`, `groupon_MemberNeed`) VALUES
(1, '尚飽揪個飯團吧~', 6, 'ms0223944', '2018-11-16', '2018-11-24', 36, 53, 0.6, 45),
(2, '驚天霹靂拿購物金!', 7, 'ms0223933', '2018-11-11', '2018-11-19', 36, 46, 0.6, 45),
(3, '有錢就是任性', 7, 'dayCook01', '2018-11-13', '2018-11-21', 64, 20, 0.6, 80),
(4, '史無前例吃飽飽的拿購物金!', 6, 'ms0223922', '2018-11-13', '2018-11-24', 66, 5, 0.6, 60),
(9, '爽der吃飽飽的拿錢錢~', 3, 'ms0223900', '2018-11-17', '2018-11-24', 25, 0, 0.6, 35),
(5, '驚天霹靂吃飽飽的揪', 6, 'ms0223933', '2018-11-15', '2018-11-28', 130, 0, 0.6, 100),
(6, '開心前所未見揪飯團~', 5, 'dayCook01', '2018-11-17', '2018-11-27', 50, 0, 0.6, 50),
(7, '爽der前所未見拿錢錢~', 6, 'dayCook01', '2018-11-18', '2018-11-25', 14, 0, 0.6, 20),
(8, '開心驚天霹靂揪飯團~', 2, 'dayCook01', '2018-11-16', '2018-11-22', 15, 0, 0.6, 25),
(10, '爽der吃飽飽的拿錢錢~', 3, 'ms0223900', '2018-11-17', '2018-11-24', 25, 4, 0.6, 35),
(11, '開心呷尚飽拿錢錢~', 3, 'ms0223944', '2018-11-17', '2018-11-30', 65, 50, 0.6, 50),
(12, '開心史無前例拿錢錢~', 5, 'ms0223944', '2018-11-17', '2018-11-23', 60, 0, 0.6, 100),
(13, '爽der前所未見揪飯團~', 3, 'dayCook02', '2018-11-18', '2018-11-24', 24, 1, 0.4, 40),
(14, '官方吃爽爽', 8, 'dayCook01', '2018-11-20', '2018-11-29', 50, 1, 0.4, 55),
(15, '開心呷尚飽拿錢錢~', 8, 'dayCook01', '2018-11-17', '2018-11-23', 15, 1, 0.4, 25);

-- --------------------------------------------------------

--
-- 資料表結構 `grouponlist`
--

CREATE TABLE `grouponlist` (
  `grouponList_No` int(5) NOT NULL,
  `meal_No` int(11) DEFAULT NULL,
  `groupon_No` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `grouponlist`
--

INSERT INTO `grouponlist` (`grouponList_No`, `meal_No`, `groupon_No`) VALUES
(1, 2, 1),
(2, 3, 1),
(3, 6, 1),
(4, 5, 1),
(5, 36, 1),
(6, 38, 1),
(7, 37, 1),
(8, 33, 1),
(9, 71, 2),
(10, 8, 2),
(11, 46, 2),
(12, 45, 2),
(13, 43, 2),
(14, 42, 2),
(15, 34, 2),
(16, 33, 2),
(17, 3, 3),
(18, 1, 3),
(19, 4, 3),
(20, 5, 3),
(21, 6, 3),
(22, 56, 3),
(23, 52, 3),
(24, 45, 3),
(25, 68, 4),
(26, 67, 4),
(27, 62, 4),
(28, 60, 4),
(29, 45, 4),
(30, 46, 4),
(31, 47, 4),
(32, 31, 4),
(33, 30, 4),
(34, 66, 4),
(35, 65, 4),
(36, 8, 5),
(37, 7, 5),
(38, 72, 5),
(39, 70, 5),
(40, 69, 5),
(41, 61, 5),
(42, 68, 5),
(43, 67, 5),
(44, 60, 5),
(45, 63, 5),
(46, 62, 5),
(47, 51, 5),
(48, 52, 5),
(49, 72, 6),
(50, 63, 6),
(51, 66, 6),
(52, 67, 6),
(53, 65, 6),
(54, 68, 6),
(55, 70, 6),
(56, 64, 6),
(57, 62, 6),
(58, 56, 6),
(59, 16, 7),
(60, 17, 7),
(61, 18, 7),
(62, 21, 7),
(63, 32, 7),
(64, 30, 7),
(65, 26, 7),
(66, 6, 8),
(67, 5, 8),
(68, 7, 8),
(69, 9, 8),
(70, 1, 8),
(71, 8, 8),
(72, 20, 9),
(73, 21, 9),
(74, 18, 9),
(75, 11, 9),
(76, 70, 9),
(77, 69, 9),
(78, 64, 9),
(79, 20, 10),
(80, 21, 10),
(81, 18, 10),
(82, 11, 10),
(83, 70, 10),
(84, 69, 10),
(85, 64, 10),
(86, 35, 11),
(87, 27, 11),
(88, 31, 11),
(89, 34, 11),
(90, 32, 11),
(91, 30, 11),
(92, 33, 11),
(93, 36, 11),
(94, 29, 11),
(95, 26, 11),
(96, 25, 11),
(97, 24, 11),
(98, 28, 11),
(99, 20, 12),
(100, 19, 12),
(101, 21, 12),
(102, 18, 12),
(103, 16, 12),
(104, 17, 12),
(105, 16, 13),
(106, 17, 13),
(107, 14, 13),
(108, 12, 13),
(109, 65, 13),
(110, 66, 13),
(111, 20, 14),
(112, 21, 14),
(113, 17, 14),
(114, 16, 14),
(115, 18, 14),
(116, 19, 14),
(117, 12, 14),
(118, 14, 14),
(119, 15, 14),
(120, 14, 15),
(121, 15, 15),
(122, 11, 15),
(123, 10, 15),
(124, 35, 15),
(125, 13, 15);

-- --------------------------------------------------------

--
-- 資料表結構 `groupontag`
--

CREATE TABLE `groupontag` (
  `groupon_TagNo` int(5) NOT NULL,
  `groupon_TagName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `groupontag`
--

INSERT INTO `groupontag` (`groupon_TagNo`, `groupon_TagName`) VALUES
(1, '健康'),
(2, '素食'),
(3, '肥滋滋'),
(4, '痛風'),
(5, '挑戰'),
(6, '豪華'),
(7, '飯'),
(8, '官方飯團');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `member_No` int(5) NOT NULL,
  `member_Id` varchar(40) NOT NULL,
  `member_Psw` varchar(6) NOT NULL,
  `member_Nick` varchar(10) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `mobile` char(10) DEFAULT NULL,
  `member_Pic` varchar(255) DEFAULT NULL,
  `member_Bonus` int(10) NOT NULL DEFAULT '0',
  `member_buyCount` int(10) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`member_No`, `member_Id`, `member_Psw`, `member_Nick`, `email`, `mobile`, `member_Pic`, `member_Bonus`, `member_buyCount`) VALUES
(1, 'ke', 'ke', 'ke', 'a@a.com', NULL, NULL, 999999, 40),
(3, 'ms0223900', '1234', 'Penguin', NULL, NULL, NULL, 72, 30),
(4, 'ms0223911', '1234', 'Penguin2', NULL, NULL, NULL, 20, 0),
(5, 'ms0223922', '1234', 'Penguin3', NULL, NULL, NULL, 20, 12),
(6, 'ms0223933', '1234', '企鵝君4號', NULL, NULL, NULL, 20, 22),
(7, 'ms0223944', '1234', 'Penguin5', NULL, NULL, NULL, 245, 111),
(8, 'dayCook01', '1234', '日食小編', NULL, NULL, NULL, 20, 999),
(9, 'dayCook02', '1234', '日食腦闆', NULL, NULL, NULL, 1064, 10018);

-- --------------------------------------------------------

--
-- 資料表結構 `memberachievement`
--

CREATE TABLE `memberachievement` (
  `member_No` int(11) DEFAULT NULL,
  `achievement_No` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `memberachievement`
--

INSERT INTO `memberachievement` (`member_No`, `achievement_No`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `membercoll`
--

CREATE TABLE `membercoll` (
  `member_No` int(11) DEFAULT NULL,
  `meal_No` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `membercoll`
--

INSERT INTO `membercoll` (`member_No`, `meal_No`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `membergroupon`
--

CREATE TABLE `membergroupon` (
  `memberGrouponList_No` int(5) NOT NULL,
  `member_No` int(11) DEFAULT NULL,
  `groupon_No` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `membergroupon`
--

INSERT INTO `membergroupon` (`memberGrouponList_No`, `member_No`, `groupon_No`) VALUES
(1, 3, 2),
(2, 3, 1),
(3, 3, 4),
(4, 2, 1),
(5, 2, 2),
(6, 2, 4),
(7, 7, 4),
(8, 7, 4),
(9, 7, 2),
(10, 7, 2),
(11, 7, 2),
(12, 7, 2),
(13, 7, 2),
(14, NULL, 10),
(15, 3, 10),
(16, NULL, 1),
(17, NULL, 1),
(18, NULL, 1),
(19, NULL, 1),
(20, NULL, 1),
(21, NULL, 1),
(22, NULL, 1),
(23, 3, 1),
(24, 1, 3),
(25, 1, 3),
(26, NULL, 3),
(27, 1, 3),
(28, 1, 3),
(29, 1, 3),
(30, 7, 11),
(31, 9, 11),
(32, 9, 13),
(33, 3, 14),
(34, 3, 15);

-- --------------------------------------------------------

--
-- 資料表結構 `membergrouponmeallist`
--

CREATE TABLE `membergrouponmeallist` (
  `memberGrouponMealList_No` int(5) NOT NULL,
  `memberGrouponList_No` int(11) DEFAULT NULL,
  `meal_No` int(11) DEFAULT NULL,
  `isExchanged` tinyint(1) NOT NULL DEFAULT '0' COMMENT '型態為boolean,預設: false'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `membergrouponmeallist`
--

INSERT INTO `membergrouponmeallist` (`memberGrouponMealList_No`, `memberGrouponList_No`, `meal_No`, `isExchanged`) VALUES
(1, 1, 71, 1),
(2, NULL, NULL, 1),
(3, NULL, NULL, 1),
(4, NULL, NULL, 1),
(5, NULL, NULL, 1),
(6, 1, 42, 1),
(7, 1, 34, 1),
(8, 1, 33, 1),
(9, 2, 2, 0),
(10, 2, 3, 0),
(11, 2, 6, 1),
(12, 2, 5, 1),
(13, 2, 36, 1),
(14, 2, 38, 0),
(15, 2, 37, 0),
(16, 2, 33, 0),
(17, 3, 68, 0),
(18, 3, 67, 0),
(19, 3, 62, 0),
(20, 3, 60, 0),
(21, 3, 45, 0),
(22, 3, 46, 0),
(23, 3, 47, 0),
(24, 3, 31, 0),
(25, 3, 30, 0),
(26, 3, 66, 0),
(27, 3, 65, 0),
(28, 4, 2, 0),
(29, 4, 3, 0),
(30, 4, 6, 0),
(31, 4, 5, 0),
(32, 4, 36, 0),
(33, 4, 38, 0),
(34, 4, 37, 0),
(35, 4, 33, 0),
(36, 5, 71, 0),
(37, 5, 8, 0),
(38, 5, 46, 0),
(39, 5, 45, 0),
(40, 5, 43, 0),
(41, 5, 42, 0),
(42, 5, 34, 0),
(43, 5, 33, 0),
(44, 6, 68, 0),
(45, 6, 67, 0),
(46, 6, 62, 0),
(47, 6, 60, 0),
(48, 6, 45, 0),
(49, 6, 46, 0),
(50, 6, 47, 0),
(51, 6, 31, 0),
(52, 6, 30, 0),
(53, 6, 66, 0),
(54, 6, 65, 0),
(55, 7, 68, 1),
(56, 7, 67, 1),
(57, 7, 62, 1),
(58, 7, 60, 1),
(59, 7, 45, 1),
(60, 7, 46, 1),
(61, 7, 47, 1),
(62, 7, 31, 1),
(63, 7, 30, 1),
(64, 7, 66, 1),
(65, 7, 65, 1),
(66, 8, 68, 0),
(67, 8, 67, 0),
(68, 8, 62, 1),
(69, 8, 60, 1),
(70, 8, 45, 1),
(71, 8, 46, 1),
(72, 8, 47, 1),
(73, 8, 31, 1),
(74, 8, 30, 0),
(75, 8, 66, 0),
(76, 8, 65, 0),
(77, 9, 71, 0),
(78, 9, 8, 0),
(79, 9, 46, 1),
(80, 9, 45, 0),
(81, 9, 43, 0),
(82, 9, 42, 0),
(83, 9, 34, 0),
(84, 9, 33, 0),
(85, 10, 71, 1),
(86, 10, 8, 1),
(87, 10, 46, 1),
(88, 10, 45, 1),
(89, 10, 43, 1),
(90, 10, 42, 1),
(91, 10, 34, 1),
(92, 10, 33, 1),
(93, 11, 71, 0),
(94, 11, 8, 0),
(95, 11, 46, 1),
(96, 11, 45, 1),
(97, 11, 43, 1),
(98, 11, 42, 0),
(99, 11, 34, 0),
(100, 11, 33, 0),
(101, 12, 71, 0),
(102, 12, 8, 0),
(103, 12, 46, 1),
(104, 12, 45, 1),
(105, 12, 43, 1),
(106, 12, 42, 1),
(107, 12, 34, 0),
(108, 12, 33, 0),
(109, 13, 71, 0),
(110, 13, 8, 0),
(111, 13, 46, 0),
(112, 13, 45, 1),
(113, 13, 43, 0),
(114, 13, 42, 1),
(115, 13, 34, 0),
(116, 13, 33, 0),
(117, 14, 20, 0),
(118, 14, 21, 0),
(119, 14, 18, 0),
(120, 14, 11, 0),
(121, 14, 70, 0),
(122, 14, 69, 0),
(123, 14, 64, 0),
(124, 15, 20, 0),
(125, 15, 21, 0),
(126, 15, 18, 0),
(127, 15, 11, 0),
(128, 15, 70, 0),
(129, 15, 69, 0),
(130, 15, 64, 0),
(131, 16, 2, 0),
(132, 16, 3, 0),
(133, 16, 6, 0),
(134, 16, 5, 0),
(135, 16, 36, 0),
(136, 16, 38, 0),
(137, 16, 37, 0),
(138, 16, 33, 0),
(139, 17, 2, 0),
(140, 17, 3, 0),
(141, 17, 6, 0),
(142, 17, 5, 0),
(143, 17, 36, 0),
(144, 17, 38, 0),
(145, 17, 37, 0),
(146, 17, 33, 0),
(147, 18, 2, 0),
(148, 18, 3, 0),
(149, 18, 6, 0),
(150, 18, 5, 0),
(151, 18, 36, 0),
(152, 18, 38, 0),
(153, 18, 37, 0),
(154, 18, 33, 0),
(155, 19, 2, 0),
(156, 19, 3, 0),
(157, 19, 6, 0),
(158, 19, 5, 0),
(159, 19, 36, 0),
(160, 19, 38, 0),
(161, 19, 37, 0),
(162, 19, 33, 0),
(163, 20, 2, 0),
(164, 20, 3, 0),
(165, 20, 6, 0),
(166, 20, 5, 0),
(167, 20, 36, 0),
(168, 20, 38, 0),
(169, 20, 37, 0),
(170, 20, 33, 0),
(171, 21, 2, 0),
(172, 21, 3, 0),
(173, 21, 6, 0),
(174, 21, 5, 0),
(175, 21, 36, 0),
(176, 21, 38, 0),
(177, 21, 37, 0),
(178, 21, 33, 0),
(179, 22, 2, 0),
(180, 22, 3, 0),
(181, 22, 6, 0),
(182, 22, 5, 0),
(183, 22, 36, 0),
(184, 22, 38, 0),
(185, 22, 37, 0),
(186, 22, 33, 0),
(187, 23, 2, 0),
(188, 23, 3, 0),
(189, 23, 6, 0),
(190, 23, 5, 0),
(191, 23, 36, 0),
(192, 23, 38, 0),
(193, 23, 37, 0),
(194, 23, 33, 0),
(195, 24, 3, 0),
(196, 24, 1, 0),
(197, 24, 4, 1),
(198, 24, 5, 1),
(199, 24, 6, 0),
(200, 24, 56, 0),
(201, 24, 52, 0),
(202, 24, 45, 0),
(203, 25, 3, 1),
(204, 25, 1, 1),
(205, 25, 4, 1),
(206, 25, 5, 1),
(207, 25, 6, 0),
(208, 25, 56, 0),
(209, 25, 52, 0),
(210, 25, 45, 0),
(211, 26, 3, 0),
(212, 26, 1, 0),
(213, 26, 4, 0),
(214, 26, 5, 0),
(215, 26, 6, 0),
(216, 26, 56, 0),
(217, 26, 52, 0),
(218, 26, 45, 0),
(219, 27, 3, 0),
(220, 27, 1, 0),
(221, 27, 4, 0),
(222, 27, 5, 0),
(223, 27, 6, 0),
(224, 27, 56, 0),
(225, 27, 52, 0),
(226, 27, 45, 0),
(227, 28, 3, 0),
(228, 28, 1, 0),
(229, 28, 4, 0),
(230, 28, 5, 0),
(231, 28, 6, 0),
(232, 28, 56, 0),
(233, 28, 52, 0),
(234, 28, 45, 0),
(235, 29, 3, 0),
(236, 29, 1, 0),
(237, 29, 4, 0),
(238, 29, 5, 0),
(239, 29, 6, 0),
(240, 29, 56, 0),
(241, 29, 52, 0),
(242, 29, 45, 0),
(243, 30, 35, 0),
(244, 30, 27, 0),
(245, 30, 31, 1),
(246, 30, 34, 1),
(247, 30, 32, 1),
(248, 30, 30, 1),
(249, 30, 33, 0),
(250, 30, 36, 0),
(251, 30, 29, 0),
(252, 30, 26, 0),
(253, 30, 25, 0),
(254, 30, 24, 1),
(255, 30, 28, 1),
(256, 31, 35, 0),
(257, 31, 27, 0),
(258, 31, 31, 0),
(259, 31, 34, 0),
(260, 31, 32, 0),
(261, 31, 30, 0),
(262, 31, 33, 0),
(263, 31, 36, 0),
(264, 31, 29, 0),
(265, 31, 26, 0),
(266, 31, 25, 0),
(267, 31, 24, 0),
(268, 31, 28, 0),
(269, 32, 16, 0),
(270, 32, 17, 0),
(271, 32, 14, 0),
(272, 32, 12, 0),
(273, 32, 65, 0),
(274, 32, 66, 0),
(275, 33, 20, 0),
(276, 33, 21, 0),
(277, 33, 17, 0),
(278, 33, 16, 0),
(279, 33, 18, 0),
(280, 33, 19, 0),
(281, 33, 12, 0),
(282, 33, 14, 0),
(283, 33, 15, 0),
(284, 34, 14, 0),
(285, 34, 15, 0),
(286, 34, 11, 0),
(287, 34, 10, 0),
(288, 34, 35, 0),
(289, 34, 13, 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`achievement_No`);

--
-- 資料表索引 `groupon`
--
ALTER TABLE `groupon`
  ADD PRIMARY KEY (`groupon_No`),
  ADD KEY `groupon_TagNo` (`groupon_TagNo`);

--
-- 資料表索引 `grouponlist`
--
ALTER TABLE `grouponlist`
  ADD PRIMARY KEY (`grouponList_No`),
  ADD KEY `member_No` (`meal_No`),
  ADD KEY `groupon_No` (`groupon_No`);

--
-- 資料表索引 `groupontag`
--
ALTER TABLE `groupontag`
  ADD PRIMARY KEY (`groupon_TagNo`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_No`);

--
-- 資料表索引 `memberachievement`
--
ALTER TABLE `memberachievement`
  ADD KEY `member_No` (`member_No`),
  ADD KEY `achievement_No` (`achievement_No`);

--
-- 資料表索引 `membercoll`
--
ALTER TABLE `membercoll`
  ADD KEY `member_No` (`member_No`),
  ADD KEY `meal_No` (`meal_No`);

--
-- 資料表索引 `membergroupon`
--
ALTER TABLE `membergroupon`
  ADD PRIMARY KEY (`memberGrouponList_No`),
  ADD KEY `member_No` (`member_No`),
  ADD KEY `groupon_No` (`groupon_No`);

--
-- 資料表索引 `membergrouponmeallist`
--
ALTER TABLE `membergrouponmeallist`
  ADD PRIMARY KEY (`memberGrouponMealList_No`),
  ADD KEY `memberGrouponList_No` (`memberGrouponList_No`),
  ADD KEY `meal_No` (`meal_No`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `achievement`
--
ALTER TABLE `achievement`
  MODIFY `achievement_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `groupon`
--
ALTER TABLE `groupon`
  MODIFY `groupon_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表 AUTO_INCREMENT `grouponlist`
--
ALTER TABLE `grouponlist`
  MODIFY `grouponList_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- 使用資料表 AUTO_INCREMENT `groupontag`
--
ALTER TABLE `groupontag`
  MODIFY `groupon_TagNo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `member_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表 AUTO_INCREMENT `membergroupon`
--
ALTER TABLE `membergroupon`
  MODIFY `memberGrouponList_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- 使用資料表 AUTO_INCREMENT `membergrouponmeallist`
--
ALTER TABLE `membergrouponmeallist`
  MODIFY `memberGrouponMealList_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

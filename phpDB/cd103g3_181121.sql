-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018 年 11 月 21 日 02:25
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
-- 資料表結構 `chatbot`
--

CREATE TABLE `chatbot` (
  `keyword_No` int(5) NOT NULL,
  `keyword` varchar(20) NOT NULL,
  `content` varchar(100) NOT NULL,
  `is_Available` tinyint(1) NOT NULL DEFAULT '1' COMMENT '型態為boolean,預設: true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `chatbot`
--

INSERT INTO `chatbot` (`keyword_No`, `keyword`, `content`, `is_Available`) VALUES
(1, '參加飯團', '官方導覽列的\"參加飯團\"、\"發起飯團\"或是掃描朋友的QRcode都可以參加飯團拿優惠唷!', 1),
(2, '營業時間', '日食餐廳營業時間週一到週日，24小時不打烊，不論凌晨、早中傍晚，日食天天讓你吃得到美食', 1),
(3, '安安', '您好~ 我是日食客服雞，很高興為您服務，揪!', 1),
(4, '如何發起飯團', '發起飯團三步驟: 1.從官方導覽列點選\"發起飯團\"。 2.選擇飯團開始日期、飯團名稱、飯團的餐點 3.結帳後完成發起飯團。可以使用飯團QRcode邀請朋友一起來參加! 越多人參加，優惠越多唷!', 1),
(5, '如何取餐', '到店使用QRcode或是取餐代碼至櫃台取餐。 若有其他問題請來電詢問，聯絡電話:(03)-4257387。', 1),
(6, '如何使用購物金', '日食購物金1點等於台幣1元，於購物車結帳時自動使用，最多可享5%折扣唷!。', 1),
(7, '如何獲取購取金', '參加刮刮樂或是參加飯團都有機會獲得1:1台幣的日食購物金唷! 若有其他疑問可以來電聯絡(03)-4257387 ! 揪~', 1);

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
(3, '有錢就是任性', 7, 'dayCook01', '2018-11-13', '2018-11-21', 64, 21, 0.6, 80),
(4, '史無前例吃飽飽的拿購物金!', 6, 'ms0223922', '2018-11-13', '2018-11-24', 66, 5, 0.6, 60),
(9, '爽der吃飽飽的拿錢錢~', 3, 'ms0223900', '2018-11-17', '2018-11-24', 25, 1, 0.6, 35),
(5, '驚天霹靂吃飽飽的揪', 6, 'ms0223933', '2018-11-15', '2018-11-28', 130, 0, 0.6, 100),
(6, '開心前所未見揪飯團~', 5, 'dayCook01', '2018-11-17', '2018-11-27', 50, 0, 0.6, 50),
(7, '爽der前所未見拿錢錢~', 6, 'dayCook01', '2018-11-18', '2018-11-25', 14, 0, 0.6, 20),
(8, '開心驚天霹靂揪飯團~', 2, 'dayCook01', '2018-11-16', '2018-11-22', 15, 0, 0.6, 25),
(10, '爽der吃飽飽的拿錢錢~', 3, 'ms0223900', '2018-11-17', '2018-11-24', 25, 4, 0.6, 35),
(11, '開心呷尚飽拿錢錢~', 3, 'ms0223944', '2018-11-17', '2018-11-30', 65, 50, 0.6, 50),
(12, '開心史無前例拿錢錢~', 5, 'ms0223944', '2018-11-17', '2018-11-23', 60, 0, 0.6, 100),
(13, '爽der前所未見揪飯團~', 3, 'dayCook02', '2018-11-18', '2018-11-24', 24, 1, 0.4, 40),
(14, '官方吃爽爽', 8, 'dayCook01', '2018-11-20', '2018-11-29', 50, 1, 0.4, 55),
(15, '官方給你$$$!', 8, 'dayCook01', '2018-11-17', '2018-11-23', 15, 1, 0.4, 25),
(16, '開心吃飽飽的揪飯團~', 8, 'dayCook02', '2018-11-20', '2018-11-25', 23, 2, 0.4, 45),
(17, '開心前所未見拿錢錢~', 8, 'dayCook02', '2018-11-20', '2018-11-25', 5, 1, 0.4, 10),
(18, '想吃是吃，日食餐廳!', 8, 'dayCook01', '2018-11-26', '2018-12-01', 30, 1, 0.4, 60);

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
(125, 13, 15),
(126, 16, 16),
(127, 17, 16),
(128, 18, 16),
(129, 15, 16),
(130, 14, 16),
(131, 19, 17),
(132, 20, 17),
(133, 17, 17),
(134, 21, 17),
(135, 18, 17),
(136, 42, 18),
(137, 40, 18),
(138, 43, 18),
(139, 44, 18),
(140, 45, 18);

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
-- 資料表結構 `manager`
--

CREATE TABLE `manager` (
  `manager_No` int(5) NOT NULL,
  `manager_Id` char(10) NOT NULL,
  `manager_Psw` char(10) NOT NULL,
  `manager_Auth` int(5) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `manager`
--

INSERT INTO `manager` (`manager_No`, `manager_Id`, `manager_Psw`, `manager_Auth`) VALUES
(1, 'mag', '000', 5),
(2, 'cooker4', '000', 4),
(3, 'cooker3', '000', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `meal`
--

CREATE TABLE `meal` (
  `meal_No` int(5) NOT NULL,
  `mealGenre_No` int(11) DEFAULT NULL,
  `meal_Name` varchar(10) DEFAULT NULL,
  `meal_Pic` varchar(255) DEFAULT NULL,
  `meal_Price` int(5) DEFAULT NULL,
  `meal_Info` varchar(255) DEFAULT NULL,
  `meal_Cal` int(5) DEFAULT NULL,
  `meal_Sold` tinyint(1) NOT NULL DEFAULT '0' COMMENT '型態為boolean,預設: false',
  `meal_Count` int(5) NOT NULL DEFAULT '1',
  `meal_Total` int(5) NOT NULL DEFAULT '4'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `meal`
--

INSERT INTO `meal` (`meal_No`, `mealGenre_No`, `meal_Name`, `meal_Pic`, `meal_Price`, `meal_Info`, `meal_Cal`, `meal_Sold`, `meal_Count`, `meal_Total`) VALUES
(1, 4, '雜菌意大利燴飯', 'vg_01.png', 230, '我們在烹煮這道香滑意大利飯的過程中， 沒有添加任何奶製品， 嫩滑效果只靠一邊烹煮， 一邊不斷攪拌使米飯釋放出澱粉，之後再燴入四種不同的美味菇類，健康可口.', 400, 0, 1, 4),
(2, 2, '麻婆豆腐飯', 'vg_02.png', 160, '素食版本的中式麻婆豆腐飯，以菇菌代替肉類！加入花椒、辣椒製造出四川獨有的麻辣口味，刺激你的味覺感受！', 450, 0, 1, 4),
(3, 5, '雜豆彩椒燴糙米飯', 'vg_03.png', 150, '菜式靈感來自西班牙經典菜式，我們先以自家的蔬菜高湯慢燉紅白腰豆，燴以蕃茄、羽衣甘藍和紅椒黃椒，配合紅米和糙米混合而成的米飯，安坐家中也能輕鬆享用營養滿分的健康美食！', 500, 0, 1, 4),
(4, 5, '蘑菇燴藜麥飯', 'vg_04.png', 200, '當你沒有食欲的時候，嘗嘗這道健康可口的菜式吧! 以藜麥加入自製的番茄醬，配以枝豆和靈芝菇烹製而成.', 380, 1, 1, 4),
(5, 5, '起司鮮蔬花椰菜', 'vg_05.png', 210, '只含植物成分的起司花椰菜！起司般的幼滑口感令人一試難忘，再試傾心！', 500, 0, 1, 4),
(6, 5, '素食滷肉飯', 'vg_06.png', 220, '以大豆蛋白和菇菌代替肉碎創作出素食版本的滷肉飯，相同口感、同樣香濃，最適合講求健康的你！', 550, 1, 1, 4),
(7, 5, '素食蘑菇飯', 'vg_07.png', 250, '以牛肝菌和蘑菇為主要材料的素菜版俄式牛肉飯，保留香濃味道之餘卻不含任何肉類成分，100%素食！', 530, 0, 1, 4),
(8, 5, '南瓜胡蘿蔔薑湯', 'vg_08.png', 130, '由絕對新鮮的南瓜、胡蘿蔔及少量薑蓉製成的濃湯，加上烤過的南瓜粒，香甜綿滑的口味令大人和小朋友同樣一試傾心！', 250, 0, 1, 4),
(9, 2, '摩洛哥扁豆湯', 'vg_09.png', 160, '一道混入孜然與芫荽、暖入心窩的扁豆濃湯，適合注重健康飲食的你！', 260, 0, 1, 4),
(10, 1, '腰內肉燴黑醋醬便當', 'ben_01.png', 290, '口感軟嫩的腰內肉，以特製醬汁醃漬，將肉汁保留在肉裡，再加上日食的人氣黑醋醬，是日食最受歡迎的獨家料理', 615, 0, 1, 4),
(11, 1, '海陸炸物拼盤便當', 'ben_02.png', 340, '多汁緊實的北海道鮮干貝、Q彈味鮮的海老以及口感鮮嫩的腰內肉，麵衣酥脆且將食材鮮味完整保留，是個人獨享的最佳選擇.', 625, 0, 1, 4),
(13, 1, '雞肉和風蓋飯便當', 'ben_04.png', 270, '雞肉搭配現磨的蘿蔔泥，一起享用更加可口', 645, 0, 1, 4),
(14, 1, '炭烤鯖魚便當', 'ben_05.png', 320, '嚴選鯖魚用炭火燒烤，請細細品嘗美味的油脂', 655, 1, 1, 4),
(15, 1, '炭烤鯖魚便當', 'ben_06.png', 270, '各種蔬菜與炸雞塊用日食特製的黑醋醬精心拌炒.日食長久的人氣NO.1料理', 665, 0, 1, 4),
(16, 1, '雞肉蔬菜燴黑醋醬便當', 'ben_07.png', 240, '口感柔和香醇的炸豬排，可根據喜好，搭配特製的醬汁享用', 675, 1, 1, 4),
(17, 1, '豬里肌便當', 'ben_08.png', 250, '開業以來的人氣招牌料理', 685, 0, 1, 4),
(18, 1, '招牌便當', 'ben_09.png', 220, '特殊的鹽麴調理，讓五花肉柔軟不油膩', 695, 0, 1, 4),
(19, 1, '炭烤鹽麴五花肉便當', 'ben_10.png', 290, '鮮嫩多汁的炭燒雞肉搭配香橘醋與清爽的蔬菜，爽口無比', 705, 0, 1, 4),
(20, 1, '炭烤雞肉香橘醋便當', 'ben_11.png', 250, '鮮嫩多汁的炭燒雞肉加上青醬與清爽的蔬菜，爽口無比', 715, 1, 1, 4),
(21, 1, '炭烤青醬雞排便當', 'ben_12.png', 260, '日食獨家人氣料理：鹽麴豬五花以及醬油麴雞肉，分別以炭烤的方式讓鹽麴及醬油麴獨特的香氣擴散，兩種風味獨特的高人氣主餐一次就可以享用', 725, 0, 1, 4),
(22, 1, '炭烤雞豬雙麴便當', 'ben_13.png', 320, '將雞腿肉以丸大豆做成的醬油麴充分醃製', 735, 0, 1, 4),
(23, 1, '炭烤雞肉醬油麴便當', 'ben_14.png', 280, '利用炭火燒烤的方式調理，使醬油麴特有的芳醇香氣擴散，並帶出其特有的甜味與溫和的口味.', 745, 0, 1, 4),
(24, 2, '特級海鮮丼', 'don_01.png', 680, '海膽、干貝、牡丹蝦、鮭魚肚、鮪魚、紅甘肚、鮭魚卵等外加多款現流生魚片，滿滿的新鮮海味，隱藏首推的頂級美食.(附三品小菜及熱湯) ?本店均採用當日現流魚，若當日海膽不足將以同等食材替換，請見諒.', 755, 0, 1, 4),
(25, 2, '北海道火焰干貝丼', 'don_02.png', 420, '生鮮等級的鮮干貝，加上特調的醬汁，搭配師傅炙燒的手藝，交織成一碗美味的丼飯 (附三品小菜及熱湯)', 765, 1, 1, 4),
(26, 2, '炙比目魚鰭邊丼', 'don_03.png', 420, '炙比目魚鰭邊肉的豐富油脂入口即化，配上一口特調香米醋飯，令人食指大動回味無窮.(附三品小菜及熱湯)', 775, 0, 1, 4),
(27, 2, '海陸無雙炙燒丼', 'don_04.png', 480, '美國安格斯去骨牛小排搭配阿拉斯加炙燒比目魚鰭邊肉、花枝及鮭魚卵組合而成的海陸無雙炙燒丼，油脂多且香氣足、分量多，一次滿足多層口味，深受家庭客喜愛.(附三品小菜及熱湯)', 785, 0, 1, 4),
(28, 2, '骰子海鮮丼', 'don_05.png', 460, '炙燒過的干貝、花枝、蝦子與多款現流魚切成骰子狀大小，可以一口吃到不同海鮮的口感，灑上些許七味粉提味，與爆漿的鮭魚卵，滿滿海味.(附三品小菜及熱湯)', 795, 0, 1, 4),
(29, 2, '宮島星鰻丼', 'don_06.png', 350, '烤三尾日本星鰻，帶點甜味，是沒有刺的鰻魚，適合小孩、長輩食用.(均附三品小菜及熱湯)', 805, 0, 1, 4),
(30, 2, '隱藏鮭魚親子丼', 'don_07.png', 320, '新鮮鮭魚生魚片加上閃耀著新鮮光澤的鮭魚卵，一口吃進嘴裡大大滿足您的味蕾，有生食或炙燒兩種選擇喔!(均附三品小菜及熱湯)', 815, 1, 1, 4),
(31, 2, '炙燒鮭魚親子丼', 'don_08.png', 320, '炙燒過的鮭魚生魚片香氣四溢，加上閃耀著新鮮光澤的鮭魚卵，一口吃進嘴裡大大滿足您的味蕾!(均附三品小菜及熱湯)', 825, 0, 1, 4),
(32, 2, '招牌海鮮丼', 'don_09.png', 320, '多款當日現流生魚片與蝦卵的結合，新鮮美味.', 835, 0, 1, 4),
(33, 2, '月見牛丼', 'don_10.png', 180, '嚴選牛五花，肉質甜美，油脂分布均勻，搭配獨特醬汁香氣迷人搭上健康有機蛋，均勻拌飯入口滑順，鹹鹹甜甜好滋味，老少咸宜.', 845, 0, 1, 4),
(34, 2, '自慢麻香松阪豬丼', 'don_11.png', 280, '上選豬的背頸肉到腮幫子部位，每頭豬所生產的松板豬只有兩片，如雪花般的大理石油脂紋路分布均勻，肉質甜美而不膩，瘦肉不澀且Q彈帶有嚼勁，以特製帶有濃郁胡麻味醃料烤過，多層次的豐富口感.讓人愛不釋手.(均附三品小菜及熱湯)', 855, 0, 1, 4),
(35, 2, '味噌雞肉玉子丼', 'don_12.png', 250, '甜甜的味噌醬與洋蔥拌炒去骨雞腿肉，建議拌入養生有機蛋，能使肉質更滑順美味.(均附三品小菜及熱湯)', 865, 0, 1, 4),
(36, 2, '隱藏玉子燒肉丼', 'don_13.png', 180, '使用嚴選五花豬肉搭配新鮮洋蔥，加入獨門燒肉醬汁烹煮，金黃色澤、香氣四溢的燒肉，灑上新鮮蔥花與溫泉蛋，口感細膩順滑~~美味的饗宴令人意猶未盡！', 875, 0, 1, 4),
(37, 3, '招牌豚骨白湯拉麵', 'ra_01.png', 99, '用豬骨以大火長時間熬煮出乳白色卻又 不帶豬腥味的濃厚湯頭，因而又叫「白 湯」，加上蔥、蒜、麻油調味的湯頭， 濃厚的口味讓人讚不絕口.', 885, 0, 1, 4),
(38, 3, '招牌雞骨醬油拉麵', 'ra_02.png', 99, '湯頭是以雞骨為主原料，配以昆布 去除肉腥味，再加上風鰹節（柴魚） 小魚干、醬油一起熬製，整體的口 味較為清淡不油膩.', 895, 0, 1, 4),
(39, 3, '招牌肉味噌拉麵', 'ra_03.png', 99, '特色即在於甘醇香濃，並蘊含大豆強 烈的口感，混合了豬骨、雞骨及新鮮 蔬果的精華而成的湯頭油脂豐富、香 濃順口的甘美滋味令人入口不忘.', 905, 0, 1, 4),
(40, 3, '特製叉燒牛骨白湯拉麵', 'ra_04.png', 240, '最能喝到做原始的豚骨湯頭，喝一口湯，抿嘴唇時會有微微的黏稠感，是因為豚骨白湯的膠質的緣故.', 915, 1, 1, 4),
(41, 3, '特製叉燒雞骨醬油拉麵', 'ra_05.png', 240, '豚骨湯頭加上醬油香味，比原味豚骨拉麵湯頭更濃重一些.', 925, 0, 1, 4),
(42, 3, '叉燒肉味噌拉麵', 'ra_06.png', 200, '嚴選二十種食材及多種味噌所調製的湯頭，配上夠味的叉燒，即使是寒風細雨，也覺得好溫暖!', 935, 0, 1, 4),
(43, 3, '赤辛泡菜牛骨白湯拉麵', 'ra_07.png', 109, '使用豚骨的濃厚湯頭為基底加上獨家 秘製的招牌香辣泡菜，讓原本就濃厚 的豚骨白湯再增添一份香辣與脆感', 945, 0, 1, 4),
(44, 3, '蒙古紅湯黑芝麻擔擔麵', 'ra_08.png', 109, '使用豚骨的濃厚湯頭為基底加上孜然 等蒙古香料以及微微的香辣醬讓傳統 的日本拉麵覆上一層濃濃的中國色彩', 955, 0, 1, 4),
(45, 3, '牛骨白湯拉麵', 'ra_09.png', 450, '以精心熬製之豚骨湯頭為基底，佐以每隻豚僅取兩隻隻炙燒棒腿，為豚肉中之極品，每日限量', 965, 0, 1, 4),
(46, 4, '究醬雞腿排', 'tei_01.png', 220, '嚴選鮮嫩雞腿排，佐以日式特調醬料，精心燒烤，吱吱作響，彷彿音符在雞腿上舞動著酥嫩香甜的口感，拌著白飯大口吃，幸福滿分.', 975, 1, 1, 4),
(47, 4, '香辛醬炸雞塊蓋飯', 'tei_02.png', 320, '現炸新鮮冷藏雞肉與多種新鮮的野菜，加上日食特別調製的香辛醬，微微刺激味蕾的辛辣快感與酥脆的酥炸雞塊，絕妙的大人滋味', 985, 0, 1, 4),
(48, 4, '滑蛋豬排鍋定食', 'tei_03.png', 260, '現點現切當場料理的炸豬排，加上日食特製醬汁一起燉煮，半熟蛋與現炸豬排混合出香濃滑順又酥脆的多層次口感，是日食十分人氣的商品', 995, 0, 1, 4),
(49, 4, '炭烤醬油麴雞肉定食', 'tei_04.png', 250, '將雞腿肉以丸大豆做成的醬油麴充分醃製，利用炭火燒烤的方式調理，使醬油麴特有的芳醇香氣擴散，並帶出其特有的甜味與溫和的口味.', 835, 0, 1, 4),
(50, 4, '綜合鮮蔬定食', 'tei_05.png', 290, '現炸多種新鮮的野菜，加上日食特別調製的香辛醬，微微刺激味蕾的辛辣快感與酥脆的酥炸雞塊，絕妙的大人滋味', 845, 1, 1, 4),
(51, 4, '綜合天婦羅定食', 'tei_06.png', 390, '現炸現宰豬肉及多種新鮮的野菜，加上日食特別調製的香辛醬，微微刺激味蕾的辛辣快感與酥脆的酥炸雞塊，絕妙的大人滋味', 855, 0, 1, 4),
(52, 4, '鮮蝦天婦羅定食', 'tei_07.png', 390, '現炸當地現撈直送大白蝦，加上日食特別調製的香辛醬，微微刺激味蕾的辛辣快感與酥脆的酥炸雞塊，絕妙的大人滋味', 865, 0, 1, 4),
(53, 4, '黃金雞排定食', 'tei_08.png', 90, '私房推薦黃金雞排定食搭配私房菜，貢丸湯.', 875, 0, 1, 4),
(54, 4, '香雞咖哩定食', 'tei_09.png', 90, '獨家特製咖哩定食搭配私房菜，貢丸湯.', 885, 0, 1, 4),
(55, 4, '油香金絲定食', 'tei_10.png', 70, '雞絲飯搭配私房菜，貢丸湯.', 895, 0, 1, 4),
(56, 4, '海鮮拉麵定食', 'tei_11.png', 320, '味噌海鮮拉麵搭配私房菜，貢丸湯.', 905, 0, 1, 4),
(57, 4, '豚骨拉麵定食', 'tei_12.png', 290, '豚骨拉麵搭配私房菜，貢丸湯.', 915, 0, 1, 4),
(58, 4, '烤鮭魚', 'tei_13.png', 80, '現炸現宰豬肉及多種新鮮的野菜，加上日食特別調製的香辛醬，微微刺激味蕾的辛辣快感與酥脆的酥炸雞塊，絕妙的大人滋味', 925, 1, 1, 4),
(59, 4, '烤鯖魚', 'tei_14.png', 70, '現炸當地現撈直送大白蝦，加上日食特別調製的香辛醬，微微刺激味蕾的辛辣快感與酥脆的酥炸雞塊，絕妙的大人滋味', 935, 0, 1, 4),
(60, 4, '雞肉龍田炸', 'tei_15.png', 80, '調味好的雞肉灑上太白粉，油炸製成的料理.', 945, 0, 1, 4),
(61, 4, '起司漢堡排', 'tei_16.png', 70, '混合絞肉， 雞蛋， 麵包粉， 起司', 955, 0, 1, 4),
(62, 4, '燉牛舌', 'tei_17.png', 80, '牛舌， 馬鈴薯， 胡蘿蔔', 965, 0, 1, 4),
(63, 6, '和風昆布鍋', 'nabe_01.png', 120, '同樣不使用湯粉、市售高湯塊或味精，選用日本昆布、鰹魚、蘋果、香菇等多樣新鮮蔬果，熬製澄淨金黃色的原始好湯.', 975, 0, 1, 4),
(64, 6, '厚實龍骨鍋', 'nabe_02.png', 145, '數十種中藥為基底，豬大骨熬製.並加入奶水調味 使湯頭口感滑順.濃郁 養生.不加過多的調味.使湯頭加入食材後 食材的原味更能顯現於湯中.', 985, 0, 1, 4),
(65, 6, '港式沙茶鍋', 'nabe_03.png', 145, '濃 濃的高湯佐以精選的大白菜、扁魚、花生粉、金針、木耳、蝦米、豆腐、豆皮、蒜頭、辣椒、蔥、豬肉(三層肉)及獨家配方，再加上特製的沙茶醬，香濃醇口有點辣又不會太辣的味道...總是令人垂涎三呎，一嚐成主顧.', 995, 1, 1, 4),
(66, 6, '酒釀鮮茄鍋', 'nabe_04.png', 145, '蕃茄所含茄紅素提高人體的免疫力，減少癌症的發生.融合新鮮番茄與大骨高湯燉熬的湯頭，將番茄的酸甜滋味與大骨的營養融合，甘甜爽口，讓味覺散發清新「輕」感受！', 1175, 0, 1, 4),
(67, 6, '韓式泡菜鍋', 'nabe_05.png', 155, '老闆私房推薦，韓國真品平行輸入傳統泡菜與高湯熬煮而成，湯頭酸辣適中，口感堪稱一絕.', 1185, 0, 1, 4),
(68, 6, '泰式酸辣鍋', 'nabe_06.png', 155, '源自泰國道地美味，以香茅為底與青蔬及雞骨、豬骨共同燉熬，湯頭清澈散發檸檬香氣，輔以豐富食材，輕鬆品嚐來自大自然的清新精華.', 1195, 0, 1, 4),
(69, 6, '日式胡麻鍋', 'nabe_07.png', 155, '廚師從日本引進來的新吃法！這鍋米 白色的湯，不是牛奶也不是豆漿，它是用白芝麻和高湯一起熬煮十幾個小時的胡麻鍋！', 1205, 0, 1, 4),
(70, 6, '起司味噌鍋', 'nabe_08.png', 155, '滿堂紅特製、全國獨沽此味的日式白鍋風情，利用日式味噌、牛奶與奶油，湯頭入口香醇濃郁，非常適合以蘿蔔捲等蔬菜涮食，食蔬吸附了湯汁後則充滿乳香及天然甜味.若再搭配各式主餐涮煮，雋永美味，無與倫比.', 1215, 0, 1, 4),
(71, 6, '胡椒辛味鍋', 'nabe_09.png', 155, '胡椒辛香濃郁，經典粵式風味.', 1225, 1, 1, 4),
(72, 6, '麻辣窯燒鍋', 'nabe_10.png', 170, '不使用現成湯粉，以獨家配方：新鮮辣椒、辣椒籽、朝天椒、燈籠椒、花椒、青花椒、梅花椒、薑、蒜、山奈、大茴香等多種辛香料，加入洋蔥、胡蘿蔔、白菜、甘藍菜、番茄、玉米(因天災目前缺)等天然蔬果，與豬大骨湯一同熬製。六小時以上的慢火細熬，過程中不另添加味精或市售高湯塊，也不使用其他中藥材。湯頭呈現清爽不油膩，入喉亦不感燥熱，香辣帶麻卻回甘！麻辣湯上桌前還會加入一樣畫龍點睛的秘密武器，增添湯頭多樣香氣。除了讓人品嚐到最純粹的麻、辣，同時不影響各式食材涮煮辣湯後的風味。', 1235, 0, 1, 4),
(12, 1, '荷包蛋炸物便當', 'ben_03.png', 340, '多汁緊實的北海道鮮干貝、Q彈味鮮的海老以及口感鮮嫩的腰內肉，麵衣酥脆且將食材鮮味完整保留，是個人獨享的最佳選擇.', 625, 0, 1, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `meal_genre`
--

CREATE TABLE `meal_genre` (
  `mealGenre_No` int(5) NOT NULL,
  `mealGenre_Name` varchar(10) NOT NULL,
  `meal_genre_Pic` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `meal_genre`
--

INSERT INTO `meal_genre` (`mealGenre_No`, `mealGenre_Name`, `meal_genre_Pic`) VALUES
(1, '便當', ''),
(2, '丼飯', ''),
(3, '拉麵', ''),
(4, '定食', ''),
(5, '素食', ''),
(6, '鍋物', '');

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
  `member_Pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'logo3.png',
  `member_Bonus` int(10) NOT NULL DEFAULT '0',
  `member_buyCount` int(10) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`member_No`, `member_Id`, `member_Psw`, `member_Nick`, `email`, `mobile`, `member_Pic`, `member_Bonus`, `member_buyCount`) VALUES
(1, 'ke', 'ke', 'ke', 'a@a.com', NULL, 'logo3.png', 999999, 45),
(3, 'ms0223900', '1234', 'Penguin', NULL, NULL, 'logo3.png', 80, 30),
(4, 'ms0223911', '1234', 'Penguin2', NULL, NULL, 'logo3.png', 20, 0),
(5, 'ms0223922', '1234', 'Penguin3', NULL, NULL, 'logo3.png', 20, 12),
(6, 'ms0223933', '1234', '企鵝君4號', NULL, NULL, 'logo3.png', 20, 22),
(7, 'ms0223944', '1234', 'Penguin5', NULL, NULL, 'logo3.png', 245, 111),
(8, 'dayCook01', '1234', '日食小編', NULL, NULL, 'logo3.png', 20, 1019),
(9, 'dayCook02', '1234', '日食腦闆', NULL, NULL, 'logo3.png', 1064, 10023),
(10, 'dayCook03', '1234', '日食員工', NULL, NULL, 'logo3.png', 1064, 10023),
(11, 'g111', '1234', '1234', '1234@fff.com', NULL, 'logo3.png', 0, 0),
(12, 'g1112', '1234', '111', '111@lddl.com', NULL, 'logo3.png', 0, 0),
(13, 'g11122', '1234', '111', '11@gsg.com', NULL, 'logo3.png', 0, 0),
(14, 'asdasda', 'asdasd', 'asdasd', 'asdasd@asdasd.com', NULL, 'logo3.png', 0, 0),
(15, 'g111asd', '213123', '123', 'asdasd@asdasd.com', NULL, 'logo3.png', 0, 0),
(16, 'asdasdasda', 'asdasd', 'asdsasdad', 'asdasd@asdasd.com', NULL, 'logo3.png', 6850, 0),
(17, 'g111qwqeq', 'asdada', 'asdasd', 'asdasd@asdasd.com', NULL, 'logo3.png', 50, 5);

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
  `meal_No` int(11) DEFAULT NULL,
  `memberColl_No` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `membercoll`
--

INSERT INTO `membercoll` (`member_No`, `meal_No`, `memberColl_No`) VALUES
(1, 2, 1),
(2, 1, 2),
(2, 10, 3),
(2, 11, 4),
(2, 12, 5),
(2, 30, 6),
(2, 40, 7),
(2, 13, 8),
(6, NULL, 9),
(6, NULL, 10),
(6, NULL, 11);

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
(34, 3, 15),
(35, 9, 16),
(36, 8, 16),
(37, 8, 9),
(38, 8, 3),
(39, 1, 17),
(40, 17, 18);

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
(289, 34, 13, 0),
(290, 35, 16, 0),
(291, 35, 17, 0),
(292, 35, 18, 0),
(293, 35, 15, 0),
(294, 35, 14, 0),
(295, 36, 16, 0),
(296, 36, 17, 0),
(297, 36, 18, 1),
(298, 36, 15, 0),
(299, 36, 14, 1),
(300, 37, 20, 0),
(301, 37, 21, 0),
(302, 37, 18, 0),
(303, 37, 11, 1),
(304, 37, 70, 1),
(305, 37, 69, 0),
(306, 37, 64, 0),
(307, 38, 3, 0),
(308, 38, 1, 0),
(309, 38, 4, 0),
(310, 38, 5, 0),
(311, 38, 6, 0),
(312, 38, 56, 0),
(313, 38, 52, 0),
(314, 38, 45, 0),
(315, 39, 19, 1),
(316, 39, 20, 1),
(317, 39, 17, 1),
(318, 39, 21, 1),
(319, 39, 18, 1),
(320, 40, 42, 0),
(321, 40, 40, 0),
(322, 40, 43, 0),
(323, 40, 44, 0),
(324, 40, 45, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `memberorder`
--

CREATE TABLE `memberorder` (
  `memOrder_No` int(5) NOT NULL,
  `member_No` int(11) DEFAULT NULL,
  `memOrder_Time` datetime NOT NULL,
  `memOrder_TakeTime` datetime NOT NULL,
  `memOrder_status` char(10) NOT NULL DEFAULT 'ing',
  `memOrder_Amount` int(10) NOT NULL,
  `is_memOrder` tinyint(1) NOT NULL DEFAULT '0' COMMENT '型態為boolean,預設: false',
  `memOrder_QR` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `memberorder`
--

INSERT INTO `memberorder` (`memOrder_No`, `member_No`, `memOrder_Time`, `memOrder_TakeTime`, `memOrder_status`, `memOrder_Amount`, `is_memOrder`, `memOrder_QR`) VALUES
(1, 1, '1997-10-04 22:23:00', '1997-10-04 22:24:00', 'ing', 200, 0, ''),
(2, 1, '1997-10-04 22:23:00', '1997-10-04 22:25:00', 'ing', 23, 0, ''),
(3, 1, '1997-10-04 22:23:00', '1997-10-04 22:23:00', 'ing', 350, 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `memberorderlist`
--

CREATE TABLE `memberorderlist` (
  `memOrderList_No` int(5) NOT NULL,
  `memOrder_No` int(11) NOT NULL,
  `meal_No` int(11) NOT NULL,
  `meal_Quantity` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `memberorderlist`
--

INSERT INTO `memberorderlist` (`memOrderList_No`, `memOrder_No`, `meal_No`, `meal_Quantity`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 3),
(3, 1, 3, 5),
(4, 1, 4, 7),
(5, 1, 5, 9);

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
  `message_Reported` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `message`
--

INSERT INTO `message` (`message_No`, `member_No`, `meal_No`, `message_Content`, `message_Time`, `message_Reported`) VALUES
(1, 1, 1, '好吃的日食義大利麵', '2018-10-17', 0),
(2, 1, 1, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-16', 0),
(3, 1, 2, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-21', 0),
(4, 1, 2, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-21', 0),
(5, 1, 2, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-21', 0),
(6, 1, 2, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-21', 1),
(7, 1, 2, '感謝父母讓我來這世上~', '2018-11-21', 1),
(8, 1, 3, '感謝父母讓我來這世上~', '2018-11-21', 0),
(9, 1, 3, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-21', 0),
(10, 1, 16, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-21', 1),
(11, 1, 16, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-21', 1),
(12, 1, 16, '感謝父母讓我來這世上~', '2018-11-21', 1),
(13, 1, 16, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-21', 1),
(14, 1, 16, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-21', 1),
(15, 1, 13, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-21', 0),
(16, 1, 13, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-21', 0),
(17, 1, 13, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-21', 0),
(18, 3, 13, 'AABBCC', '2018-11-21', 1),
(19, 4, 13, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-21', 1),
(20, 1, 10, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-21', 0),
(21, 1, 10, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-21', 0),
(22, 1, 10, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-21', 0),
(23, 1, 10, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-21', 0),
(24, 1, 10, '感謝父母讓我來這世上~', '2018-11-21', 0),
(25, 1, 10, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-21', 0),
(26, 1, 10, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-21', 0),
(27, 1, 4, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-21', 0),
(28, 1, 4, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-21', 0),
(29, 1, 4, '感謝父母讓我來這世上~', '2018-11-21', 0),
(30, NULL, 4, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-21', 0),
(31, NULL, 4, '感謝父母讓我來這世上~', '2018-11-21', 0),
(32, 3, 4, '為什麼要讓我吃到一個這麼好的食物? 如果我以後吃不到怎麼辦啊~', '2018-11-21', 0),
(33, 8, 6, '0w0\n', '2018-11-21', 0),
(34, 8, 6, '尼好挖', '2018-11-21', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `messagereport`
--

CREATE TABLE `messagereport` (
  `report_No` int(5) NOT NULL,
  `message_No` int(5) DEFAULT NULL,
  `report_Content` char(255) NOT NULL,
  `report_Date` date NOT NULL,
  `report_Status` char(10) NOT NULL DEFAULT 'not' COMMENT '尚未審核(not) 審核通過(past) 審核不通過(unpast) 預設：not'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `messagereport`
--

INSERT INTO `messagereport` (`report_No`, `message_No`, `report_Content`, `report_Date`, `report_Status`) VALUES
(1, 1, '日食義大利麵好好吃', '2018-10-17', 'not'),
(2, 6, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-21', 'not'),
(3, 7, '感謝父母讓我來這世上~', '2018-11-21', 'not'),
(4, 12, '感謝父母讓我來這世上~', '2018-11-21', 'not'),
(5, 13, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-21', 'not'),
(6, 10, '救命啊~我從沒吃過這麼好吃的食物!!!', '2018-11-21', 'not'),
(7, 11, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-21', 'not'),
(8, 14, '節目中誇張的好吃表情真的不是騙人的，香氣咬兩下馬上在嘴中化開，甜味慢慢的滑入喉嚨，這味道真是太誘人了~', '2018-11-21', 'not'),
(9, 19, '太感動了，我一定要帶妹妹來吃!!阿~我沒有妹妹T_T', '2018-11-21', 'not'),
(10, 18, 'AABBCC', '2018-11-21', 'not');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`achievement_No`);

--
-- 資料表索引 `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`keyword_No`);

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
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_No`);

--
-- 資料表索引 `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`meal_No`),
  ADD KEY `mealGenre_No` (`mealGenre_No`);

--
-- 資料表索引 `meal_genre`
--
ALTER TABLE `meal_genre`
  ADD PRIMARY KEY (`mealGenre_No`);

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
  ADD PRIMARY KEY (`memberColl_No`),
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
-- 資料表索引 `memberorder`
--
ALTER TABLE `memberorder`
  ADD PRIMARY KEY (`memOrder_No`),
  ADD KEY `member_No` (`member_No`);

--
-- 資料表索引 `memberorderlist`
--
ALTER TABLE `memberorderlist`
  ADD PRIMARY KEY (`memOrderList_No`),
  ADD KEY `memOrder_No` (`memOrder_No`),
  ADD KEY `meal_No` (`meal_No`);

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
-- 使用資料表 AUTO_INCREMENT `achievement`
--
ALTER TABLE `achievement`
  MODIFY `achievement_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `keyword_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `groupon`
--
ALTER TABLE `groupon`
  MODIFY `groupon_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表 AUTO_INCREMENT `grouponlist`
--
ALTER TABLE `grouponlist`
  MODIFY `grouponList_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- 使用資料表 AUTO_INCREMENT `groupontag`
--
ALTER TABLE `groupontag`
  MODIFY `groupon_TagNo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表 AUTO_INCREMENT `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `meal`
--
ALTER TABLE `meal`
  MODIFY `meal_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- 使用資料表 AUTO_INCREMENT `meal_genre`
--
ALTER TABLE `meal_genre`
  MODIFY `mealGenre_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `member_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表 AUTO_INCREMENT `membercoll`
--
ALTER TABLE `membercoll`
  MODIFY `memberColl_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表 AUTO_INCREMENT `membergroupon`
--
ALTER TABLE `membergroupon`
  MODIFY `memberGrouponList_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用資料表 AUTO_INCREMENT `membergrouponmeallist`
--
ALTER TABLE `membergrouponmeallist`
  MODIFY `memberGrouponMealList_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- 使用資料表 AUTO_INCREMENT `memberorder`
--
ALTER TABLE `memberorder`
  MODIFY `memOrder_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `memberorderlist`
--
ALTER TABLE `memberorderlist`
  MODIFY `memOrderList_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `message_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- 使用資料表 AUTO_INCREMENT `messagereport`
--
ALTER TABLE `messagereport`
  MODIFY `report_No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

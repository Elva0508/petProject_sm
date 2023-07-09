-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-07-09 17:44:25
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `pet`
--

-- --------------------------------------------------------

--
-- 資料表結構 `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(30) NOT NULL,
  `account` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `company_location` varchar(50) NOT NULL,
  `logo_image` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `account`, `password`, `name`, `company_location`, `logo_image`, `created_at`, `updated_at`) VALUES
(1, 'SunnyDay2022', 'SunnyDay2022', '寵愛家', '台北市', 'vendorIcon1', '2023-07-06 11:53:00', '2023-07-06 11:53:00'),
(2, 'Sparkle123', 'Sparkle123', '貓狗天地', '台北市', 'vendorIcon2', '2023-07-07 11:53:00', '2023-07-07 11:53:00'),
(3, 'DreamySky77', 'DreamySky77', '快樂毛孩', '台北市', 'vendorIcon3', '2023-07-08 11:53:00', '2023-07-08 11:53:00'),
(4, 'HappyPaws99', 'HappyPaws99', '毛寶貝', '高雄市', 'vendorIcon4', '2023-07-09 11:53:00', '2023-07-09 11:53:00'),
(5, 'StarGazer2023', 'StarGazer2023', '尾巴樂園', '高雄市', 'vendorIcon5', '2023-07-10 11:53:00', '2023-07-10 11:53:00'),
(6, 'BlissfulHeart88', 'BlissfulHeart88', '擁抱毛絨絨', '高雄市', 'vendorIcon6', '2023-07-11 11:53:00', '2023-07-11 11:53:00'),
(7, 'MagicBreeze22', 'MagicBreeze22', '毛球王國', '高雄市', 'vendorIcon7', '2023-07-12 11:53:00', '2023-07-12 11:53:00'),
(8, 'ShiningStarlet', 'ShiningStarlet', '寵物天堂', '新竹市', 'vendorIcon8', '2023-07-13 11:53:00', '2023-07-13 11:53:00'),
(9, 'SweetWhisper55', 'SweetWhisper55', '永遠的愛寵', '新竹市', 'vendorIcon9', '2023-07-14 11:53:00', '2023-07-14 11:53:00'),
(10, 'RainbowDreams77', 'RainbowDreams77', '蓬鬆尾巴', '新竹市', 'vendorIcon10', '2023-07-15 11:53:00', '2023-07-15 11:53:00'),
(11, 'aa123123', 'aa123123', '喵喵狗狗樂園', '新竹市', 'vendorIcon11', '2023-07-16 11:53:00', '2023-07-16 11:53:00'),
(12, 'bb123123', 'bb123123', '汪星人', '台南市', 'vendorIcon12', '2023-07-17 11:53:00', '2023-07-17 11:53:00'),
(13, 'SunnyBeach2022', 'SunnyBeach2022', '完美寵物印記', '台南市', 'vendorIcon13', '2023-07-18 11:53:00', '2023-07-18 11:53:00'),
(14, 'SparklingStar123', 'SparklingStar123', '毛絨嘉年華', '台南市', 'vendorIcon14', '2023-07-19 11:53:00', '2023-07-19 11:53:00'),
(15, 'DreamyMoonlight77', 'DreamyMoonlight77', '搖尾巴', '台南市', 'vendorIcon15', '2023-07-20 11:53:00', '2023-07-20 11:53:00'),
(16, 'HappyPetLover99', 'HappyPetLover99', '歡樂寵物護理', '台中市', 'vendorIcon16', '2023-07-21 11:53:00', '2023-07-21 11:53:00'),
(17, 'StarryNight2023', 'StarryNight2023', '毛茸茸的朋友', '台中市', 'vendorIcon17', '2023-07-22 11:53:00', '2023-07-22 11:53:00'),
(18, 'BlissfulJourney88', 'BlissfulJourney88', '活潑小動物', '桃園市', 'vendorIcon1', '2023-07-23 11:53:00', '2023-07-23 11:53:00'),
(19, 'MagicalAdventure22', 'MagicalAdventure22', '寵印', '桃園市', 'vendorIcon2', '2023-07-24 11:53:00', '2023-07-24 11:53:00'),
(20, 'ShiningBrightStar', 'ShiningBrightStar', '寵物樂園', '桃園市', 'vendorIcon3', '2023-07-25 11:53:00', '2023-07-25 11:53:00'),
(21, 'SweetMelody55', 'SweetMelody55', '黑皮寵物', '新北市', 'vendorIcon4', '2023-07-26 11:53:00', '2023-07-26 11:53:00'),
(22, 'RainbowSunset77', 'RainbowSunset77', '寵物之家', '新北市', 'vendorIcon5', '2023-07-27 11:53:00', '2023-07-27 11:53:00'),
(23, 'Allicle215', 'Allicle215', '有一股奶貓味股份有限公司', 'company_location', 'vendorIcon6', '2023-04-11 19:26:24', '2023-04-11 19:26:24'),
(24, 'StarGazer123', 'StarGazer123', '悠閒貓生活用品有限公司', '台北市', 'vendorIcon4', '2023-05-09 10:21:00', '2023-05-09 10:21:00'),
(25, 'AdventureSeeker56', 'AdventureSeeker56', '喵喵食尚罐頭食品有限公司', '台北市', 'vendorIcon2', '2023-02-25 16:49:00', '2023-02-25 16:49:00'),
(26, 'DreamChaser789', 'DreamChaser789', '貓咪樂活生活用品有限公司', '台北市', 'vendorIcon3', '2023-03-20 09:37:00', '2023-03-20 09:37:00'),
(27, 'MusicLover2022', 'MusicLover2022', '細心貓糧罐頭食品有限公司', '高雄市', 'vendorIcon17', '2023-04-17 21:15:00', '2023-04-17 21:15:00'),
(28, 'Bookworm1998', 'Bookworm1998', '貓界時尚家居生活有限公司', '高雄市', 'vendorIcon1', '2023-03-27 12:04:00', '2023-03-27 12:04:00'),
(29, 'NatureExplorer77', 'NatureExplorer77', '貓樂園罐頭食品有限公司', '高雄市', 'vendorIcon2', '2023-01-24 08:53:00', '2023-01-24 08:53:00'),
(30, 'TechGeek2023', 'TechGeek2023', '愛貓寵物生活用品有限公司', '高雄市', 'vendorIcon7', '2023-03-06 19:32:00', '2023-03-06 19:32:00'),
(31, 'TravelEnthusiast12', 'TravelEnthusiast12', '乖乖貓食罐頭食品有限公司', '新竹市', 'vendorIcon8', '2023-04-01 14:40:00', '2023-04-01 14:40:00'),
(32, 'FitnessFanatic2021', 'FitnessFanatic2021', '貓咪寶貝家居生活有限公司', '新竹市', 'vendorIcon9', '2023-06-22 11:06:00', '2023-06-22 11:06:00'),
(33, 'HappyCamper555', 'HappyCamper555', '貓食優選罐頭食品有限公司', '新竹市', 'vendorIcon10', '2023-05-15 07:44:00', '2023-05-15 07:44:00'),
(34, 'ArtisticSoul88', 'ArtisticSoul88', '貓咪天地生活用品有限公司', '新竹市', 'vendorIcon11', '2023-02-08 17:29:00', '2023-02-08 17:29:00'),
(35, 'FoodieLicious2022', 'FoodieLicious2022', '美味貓食罐頭食品有限公司', '台南市', 'vendorIcon12', '2023-06-16 23:58:00', '2023-06-16 23:58:00'),
(36, 'WanderlustDreamer19', 'WanderlustDreamer19', '貓之樂家居生活專賣有限公司', '台南市', 'vendorIcon8', '2023-05-19 13:53:00', '2023-05-19 13:53:00'),
(37, 'PetLover2023', 'PetLover2023', '貓食美好生活用品有限公司', '台南市', 'vendorIcon9', '2023-03-29 05:28:00', '2023-03-29 05:28:00'),
(38, 'SunshineSmiles123', 'SunshineSmiles123', '快樂貓糧罐頭食品有限公司', '台南市', 'vendorIcon10', '2023-04-04 10:14:00', '2023-04-04 10:14:00'),
(39, 'CoffeeAddict99', 'CoffeeAddict99', '愛貓寵物居家生活有限公司', '台北市', 'vendorIcon11', '2023-03-11 18:59:00', '2023-03-11 18:59:00'),
(40, 'MovieBuff2024', 'MovieBuff2024', '貓食美味家居生活購物有限公司', '高雄市', 'vendorIcon17', '2023-01-11 20:42:00', '2023-01-11 20:42:00'),
(41, 'FashionistaStyle21', 'FashionistaStyle21', '貓樂園天地罐頭食品有限公司', '高雄市', 'vendorIcon1', '2023-02-26 06:25:00', '2023-02-26 06:25:00'),
(42, 'SportsFanatic777', 'SportsFanatic777', '樂活貓家居生活用品有限公司', '新竹市', 'vendorIcon2', '2023-06-01 15:13:00', '2023-06-01 15:13:00'),
(43, 'BeachBum2025', 'BeachBum2025', '貓食佳餚美食罐頭食品有限公司', '新竹市', 'vendorIcon3', '2023-03-14 22:07:00', '2023-03-14 22:07:00'),
(44, 'CreativeMind22', 'CreativeMind22', '貓咪愛寵生活用品有限公司', '新竹市', 'vendorIcon4', '2023-06-12 12:50:00', '2023-06-12 12:50:00'),
(45, 'HealthyLiving2026', 'HealthyLiving2026', '頂級貓糧罐頭食品有限公司', '高雄市', 'vendorIcon2', '2023-04-20 09:34:00', '2023-04-20 09:34:00'),
(46, 'AdventureAwaits23', 'AdventureAwaits23', '貓之樂家居生活購物專賣有限公司', '台北市', 'vendorIcon3', '2023-05-26 19:18:00', '2023-05-26 19:18:00'),
(47, 'GreenThumbGardener', 'GreenThumbGardener', '貓食美好生活時尚有限公司', '台北市', 'vendorIcon4', '2023-04-30 08:01:00', '2023-04-30 08:01:00'),
(48, 'AnimalRightsActivist', 'AnimalRightsActivist', '愉快貓食罐頭食品有限公司', '台北市', 'vendorIcon17', '2023-06-20 21:44:00', '2023-06-20 21:44:00'),
(49, 'MindfulMeditator2027', 'MindfulMeditator2027', '愛貓寵物生活時光有限公司', '新竹市', 'vendorIcon1', '2023-01-21 02:26:00', '2023-01-21 02:26:00'),
(50, 'HappyHomeMaker24', 'HappyHomeMaker24', '貓樂園佳餚罐頭食品有限公司', '新竹市', 'vendorIcon2', '2023-02-19 12:08:00', '2023-02-19 12:08:00'),
(51, 'ThrillSeeker101', 'ThrillSeeker101', '貓食天地家居生活寶貝有限公司', '新竹市', 'vendorIcon5', '2023-04-23 21:49:00', '2023-04-23 21:49:00'),
(52, 'TechWhizKid2028', 'TechWhizKid2028', '樂活貓糧食罐頭食品有限公司', '高雄市', 'vendorIcon6', '2023-03-03 06:30:00', '2023-03-03 06:30:00'),
(53, 'BlissfulSerenity25', 'BlissfulSerenity25', '貓之樂家居生活購物美食有限公司', '桃園市', 'vendorIcon7', '2023-05-11 14:10:00', '2023-05-11 14:10:00'),
(54, 'BlissfulSerenity24', 'BlissfulSerenity24', '貓食尚品罐頭食品購物有限公司', '台南市', 'vendorIcon8', '2023-02-14 05:51:00', '2023-02-14 05:51:00'),
(55, 'AnimalRightsActiviate', 'AnimalRightsActiviate', '快樂貓咪生活用品有限公司', '台南市', 'vendorIcon9', '2023-06-29 19:31:00', '2023-06-29 19:31:00'),
(56, 'WanderlustDreamer39', 'WanderlustDreamer39', '貓食美味時尚罐頭食品有限公司', '台南市', 'vendorIcon3', '2023-03-18 02:11:00', '2023-03-18 02:11:00'),
(57, 'WanderlustDreamer20', 'WanderlustDreamer20', '愛貓寵物生活用品佳餚有限公司', '台南市', 'vendorIcon4', '2023-04-10 09:51:00', '2023-04-10 09:51:00'),
(58, 'WanderlustDreamer21', 'WanderlustDreamer21', '貓界時尚家居生活美食有限公司', '台北市', 'vendorIcon17', '2023-02-04 19:31:00', '2023-02-04 19:31:00'),
(59, 'WanderlustDreamer22', 'WanderlustDreamer22', '貓樂園天地家居生活專賣有限公司', '高雄市', 'vendorIcon1', '2023-06-03 05:10:00', '2023-06-03 05:10:00'),
(60, 'WanderlustDreamer23', 'WanderlustDreamer23', '悠閒貓食罐頭食品有限公司', '新竹市', 'vendorIcon2', '2023-01-15 11:49:00', '2023-01-15 11:49:00'),
(61, 'WanderlustDreamer24', 'WanderlustDreamer24', '貓食佳餚寵物生活用品有限公司', '高雄市', 'vendorIcon5', '2023-05-24 19:28:00', '2023-05-24 19:28:00'),
(62, 'SunshineSmiles125', 'SunshineSmiles125', '貓咪專業生活用品有限公司', '高雄市', 'vendorIcon2', '2023-04-28 02:06:00', '2023-04-28 02:06:00'),
(63, 'SunshineSmiles124', 'SunshineSmiles124', '味道貓餐廳管理有限公司', '新竹市', 'vendorIcon5', '2023-03-08 08:44:00', '2023-03-08 08:44:00'),
(64, 'AnimalRightsActivist', 'AnimalRightsActivist', '愉快貓食罐頭食品有限公司', '台北市', 'vendorIcon17', '2023-06-20 21:44:00', '2023-06-20 21:44:00'),
(65, 'MindfulMeditator2027', 'MindfulMeditator2027', '愛貓寵物生活時光有限公司', '新竹市', 'vendorIcon1', '2023-01-21 02:26:00', '2023-01-21 02:26:00'),
(66, 'HappyHomeMaker24', 'HappyHomeMaker24', '貓樂園佳餚罐頭食品有限公司', '新竹市', 'vendorIcon2', '2023-02-19 12:08:00', '2023-02-19 12:08:00'),
(67, 'ThrillSeeker101', 'ThrillSeeker101', '貓食天地家居生活寶貝有限公司', '新竹市', 'vendorIcon5', '2023-04-23 21:49:00', '2023-04-23 21:49:00'),
(68, 'TechWhizKid2028', 'TechWhizKid2028', '樂活貓糧食罐頭食品有限公司', '高雄市', 'vendorIcon6', '2023-03-03 06:30:00', '2023-03-03 06:30:00'),
(69, 'BlissfulSerenity25', 'BlissfulSerenity25', '貓之樂家居生活購物美食有限公司', '桃園市', 'vendorIcon7', '2023-05-11 14:10:00', '2023-05-11 14:10:00'),
(70, 'BlissfulSerenity24', 'BlissfulSerenity24', '貓食尚品罐頭食品購物有限公司', '台南市', 'vendorIcon8', '2023-02-14 05:51:00', '2023-02-14 05:51:00'),
(71, 'AnimalRightsActiviate', 'AnimalRightsActiviate', '快樂貓咪生活用品有限公司', '台南市', 'vendorIcon9', '2023-06-29 19:31:00', '2023-06-29 19:31:00'),
(72, 'WanderlustDreamer39', 'WanderlustDreamer39', '貓食美味時尚罐頭食品有限公司', '台南市', 'vendorIcon3', '2023-03-18 02:11:00', '2023-03-18 02:11:00'),
(73, 'WanderlustDreamer20', 'WanderlustDreamer20', '愛貓寵物生活用品佳餚有限公司', '台南市', 'vendorIcon4', '2023-04-10 09:51:00', '2023-04-10 09:51:00'),
(74, 'WanderlustDreamer21', 'WanderlustDreamer21', '貓界時尚家居生活美食有限公司', '台北市', 'vendorIcon17', '2023-02-04 19:31:00', '2023-02-04 19:31:00'),
(75, 'WanderlustDreamer22', 'WanderlustDreamer22', '貓樂園天地家居生活專賣有限公司', '高雄市', 'vendorIcon1', '2023-06-03 05:10:00', '2023-06-03 05:10:00'),
(76, 'WanderlustDreamer23', 'WanderlustDreamer23', '悠閒貓食罐頭食品有限公司', '新竹市', 'vendorIcon2', '2023-01-15 11:49:00', '2023-01-15 11:49:00'),
(77, 'WanderlustDreamer24', 'WanderlustDreamer24', '貓食佳餚寵物生活用品有限公司', '高雄市', 'vendorIcon5', '2023-05-24 19:28:00', '2023-05-24 19:28:00'),
(78, 'SunshineSmiles125', 'SunshineSmiles125', '貓咪專業生活用品有限公司', '高雄市', 'vendorIcon2', '2023-04-28 02:06:00', '2023-04-28 02:06:00'),
(79, 'SunshineSmiles124', 'SunshineSmiles124', '味道貓餐廳管理有限公司', '新竹市', 'vendorIcon5', '2023-03-08 08:44:00', '2023-03-08 08:44:00');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

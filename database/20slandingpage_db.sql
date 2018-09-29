-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 06:49 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20slandingpage_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0: active; 1:deactive',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `description`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_activated`, `is_deleted`) VALUES
(37, '', 'banner mới', '{\"avata\":\"5f1722068792acf2b4c298c405c6f0dc.jpg\",\"image\":[\"5f1722068792acf2b4c298c405c6f0dc.jpg\",\"3b6185bdb676f2216b305b9c52a5ef79.jpg\"]}', '2018-09-29 10:45:40', 'administrator', '2018-09-29 10:45:40', 'administrator', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1d6d2ef5cbe48491b53b5c2ae95d1d4f14c98f82', '::1', 1516590779, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363539303735363b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353134333939313533223b);

-- --------------------------------------------------------

--
-- Table structure for table `creator`
--

CREATE TABLE `creator` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job` text COLLATE utf8_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8_unicode_ci NOT NULL,
  `youtube` text COLLATE utf8_unicode_ci NOT NULL,
  `instagram` text COLLATE utf8_unicode_ci NOT NULL,
  `is_activated` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `creator`
--

INSERT INTO `creator` (`id`, `name`, `image`, `job`, `facebook`, `youtube`, `instagram`, `is_activated`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Lyly Sury', '630a33db1d5f699e0d04620200d82068.jpeg', 'Creator mảng Game', '', '', '', 0, 0, '2018-09-27 09:28:12', 'administrator', '2018-09-27 09:28:12', 'administrator'),
(2, 'Phương Tân', 'd23bfb6fdef4add7a3c4ea4a883009a7.jpeg', 'Creator mảng Game', '', '', '', 0, 0, '2018-09-27 09:15:28', 'administrator', '2018-09-27 09:15:28', 'administrator'),
(3, 'PhươngTQ', '514e25c80569777f3e79dd1395b376ef.jpg', 'Creator mảng Game', '', '', '', 0, 0, '2018-09-27 09:16:08', 'administrator', '2018-09-27 09:16:08', 'administrator'),
(4, 'Phương Thảo', '5f3f6aa9ddd00b6d392b5f3a4db0c868.jpg', 'Creator mảng Game', 'https://www.facebook.com/', '', '', 0, 0, '2018-09-29 11:46:07', 'administrator', '2018-09-29 11:46:07', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0: active; 1:deactive',
  `is_deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `title`, `description`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_activated`, `is_deleted`) VALUES
(40, '', '', 'cd6b0842a40dfe7ea24f81a08fce8b6c.jpg', '2018-09-27 13:26:30', 'administrator', '2018-09-27 13:26:30', 'administrator', 0, 0),
(41, '', '', '319217a1cef77f6454f53bae0064b3ba.jpg', '2018-09-27 13:29:16', 'administrator', '2018-09-27 13:29:16', 'administrator', 0, 0),
(42, '', '', 'fa6cf3df7602a88784940b2cc6fcfa7a.jpg', '2018-09-27 13:31:17', 'administrator', '2018-09-27 13:31:17', 'administrator', 0, 0),
(43, '', '', '5722da5444e13756bb0288abb3e61c57.jpg', '2018-09-27 13:31:21', 'administrator', '2018-09-27 13:31:21', 'administrator', 0, 0),
(44, '', '', '7f1f36e307868a2b200bdceda61dc115.jpg', '2018-09-27 13:31:25', 'administrator', '2018-09-27 13:31:25', 'administrator', 0, 0),
(45, '', '', 'b4ce4ef47db6249a11122c412ef95994.jpg', '2018-09-27 13:31:31', 'administrator', '2018-09-27 13:31:31', 'administrator', 0, 0),
(46, '', '', '5c5819a99d804b01c8f948b04a02a68e.jpg', '2018-09-27 13:31:36', 'administrator', '2018-09-27 13:31:36', 'administrator', 0, 0),
(47, '', '', 'a88eabc0016ea1a82782b66a2a345127.jpg', '2018-09-27 13:31:41', 'administrator', '2018-09-27 13:31:41', 'administrator', 0, 0),
(48, '', '', '0733ae6c3a4f1b395c486a6a208ff5b0.jpg', '2018-09-27 13:31:46', 'administrator', '2018-09-27 13:31:46', 'administrator', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0 : active; 1 : deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_category_id`, `slug`, `title`, `description`, `content`, `avatar`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `is_activated`) VALUES
(22, 3, 'livestream', 'Livestream', '[\"20section s\\u1ebd l\\u1ef1a ch\\u1ecdn c\\u00e1c influencer c\\u00f3 h\\u00ecnh t\\u01b0\\u1ee3ng ph\\u00f9 h\\u1ee3p v\\u1edbi s\\u1ea3n ph\\u1ea9m, chi\\u1ebfn d\\u1ecbch c\\u1ee7a nh\\u00e3n h\\u00e0ng\",\"L\\u00ean k\\u1ecbch b\\u1ea3n v\\u00e0 t\\u1ed5 ch\\u1ee9c s\\u1ea3n xu\\u1ea5t c\\u00e1c bu\\u1ed5i livestream c\\u1ee7a c\\u00e1c creator c\\u00f3 l\\u1ed3ng gh\\u00e9p trao \\u0111\\u1ed5i v\\u1ec1 s\\u1ea3n ph\\u1ea9m, chi\\u1ebfn d\\u1ecbch c\\u1ee7a nh\\u00e3n h\\u00e0ng\",\"\\u0110\\u1ec3 influencer v\\u00e0 ng\\u01b0\\u1eddi xem trao \\u0111\\u1ed5i v\\u1ec1 s\\u1ea3n ph\\u1ea9m c\\u1ee7a nh\\u00e3n h\\u00e0ng tr\\u00ean livestream\"]', '<p>Thương hiệu muốn c&oacute; được sự tương t&aacute;c của người d&ugrave;ng mạng x&atilde; hội với sản phẩm của m&igrave;nh.</p>', 'abe8730523e1777d75392a8c1b23c909.jpg', '[\"abe8730523e1777d75392a8c1b23c909.jpg\",\"cd668ba9624bc89c4f47322ba45d7e87.jpg\"]', '2018-09-29 11:00:12', 'administrator', '2018-09-29 11:00:12', 'administrator', 0, 0),
(23, 3, 'tvc', 'TVC', '[\"Nghi\\u00ean c\\u1ee9u \\u0111\\u1eb7c t\\u00ednh s\\u1ea3n ph\\u1ea9m\",\"X\\u00e1c \\u0111\\u1ecbnh xu h\\u01b0\\u1edbng c\\u00f9ng th\\u1eddi \\u0111i\\u1ec3m tr\\u00ean truy\\u1ec1n th\\u00f4ng x\\u00e3 h\\u1ed9i\",\"S\\u1ea3n xu\\u1ea5t s\\u1ea3n ph\\u1ea9m v\\u1eeba mang t\\u00ednh gi\\u1ea3i tr\\u00ed, ph\\u00f9 h\\u1ee3p v\\u1edbi xu h\\u01b0\\u1edbng, xu th\\u1ebf. V\\u1eeba truy\\u1ec1n t\\u1ea3i \\u0111\\u01b0\\u1ee3c \\u0111\\u1eb7c t\\u00ednh s\\u1ea3n ph\\u1ea9m.\"]', '<p>Thương hiệu muốn quảng b&aacute; TVC th&ocirc;ng qua truyền th&ocirc;ng x&atilde; hội (social media), c&aacute;c hot fanpage, group, c&aacute;c influencer... khi kết hợp với 20section sẽ trải qua c&aacute;c qu&aacute; tr&igrave;nh:</p>', 'ffe7f723857c9572e740b4b365bd3617.jpg', '[\"428f8ec42c2aeb72946d45e2ef1f8f34.jpg\",\"ffe7f723857c9572e740b4b365bd3617.jpg\"]', '2018-09-29 11:03:34', 'administrator', '2018-09-29 11:03:34', 'administrator', 0, 0),
(24, 4, 'co-hoi-nghe-nghiep', 'CƠ HỘI  NGHỀ NGHIỆP', '[\"T\\u1ea1i 20sections v\\u00e0 Division X m\\u1ed7i th\\u00e0nh vi\\u00ean \\u0111\\u1ec1u l\\u00e0 nh\\u1eefng m\\u1ea3nh gh\\u00e9p v\\u00f4 c\\u00f9ng quan tr\\u1ecdng, t\\u1ea1i \\u0111\\u00e2y ch\\u00fang ta \\u0111\\u1ed1i \\u0111\\u1ea7u v\\u1edbi th\\u00e1ch th\\u1ee9c v\\u00e0 th\\u1eed th\\u00e1ch s\\u1ef1 phi th\\u01b0\\u1eddng c\\u1ee7a b\\u1ea3n th\\u00e2n.\",\"Kh\\u00f4ng c\\u00f3 gi\\u1edbi h\\u1ea1n \\u1edf DivisionX, t\\u1ea1i \\u0111\\u00e2y kh\\u00f4ng c\\u00f3 g\\u00ec l\\u00e0 b\\u1ea5t kh\\u1ea3 thi, DivisionX l\\u00e0 m\\u00f4i tr\\u01b0\\u1eddng \\u0111\\u1ec3 b\\u1ea1n ph\\u00e1t tri\\u1ec3n v\\u00e0 khai ph\\u00e1 nh\\u1eefng ti\\u1ec1m n\\u0103ng c\\u1ee7a b\\u1ea3n th\\u00e2n v\\u00e0 th\\u00e1ch th\\u1ee9c gi\\u1edbi h\\u1ea1n s\\u00e1ng t\\u1ea1o\",\"D\\u00f9 b\\u1ea1n \\u1edf v\\u1ecb tr\\u00ed c\\u00f4ng vi\\u1ec7c, thu\\u1ed9c team n\\u00e0o b\\u1ea1n c\\u0169ng \\u0111ang \\u0111\\u00f3ng g\\u00f3p s\\u1ee9c m\\u00ecnh \\u0111\\u1ec3 t\\u1ea1o ra \\u1ea3nh h\\u01b0\\u1edfng t\\u1edbi h\\u00e0ng tri\\u1ec7u ng\\u01b0\\u1eddi Vi\\u1ec7t tr\\u1ebb.\"]', '', '', '', '2018-09-29 10:54:42', 'administrator', '2018-09-29 10:54:42', 'administrator', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `sort` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT '0' COMMENT '0 : list; 1 : detail',
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0 : active; 1 : deactive',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `slug`, `title`, `content`, `parent_id`, `project`, `image`, `sort`, `type`, `is_activated`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 've-division-x', 'Về DIVISION X', '<p class=\"paragraph\">DIVISION X l&agrave; dự &aacute;n của c&ocirc;ng ty 20sections đ&agrave;o tạo c&aacute;c c&aacute; nh&acirc;n c&oacute; năng lực trở th&agrave;nh c&aacute;c người s&aacute;ng tạo nội dung thế hệ tiếp theo. Sứ mệnh của những người s&aacute;ng tạo nội dung n&agrave;y l&agrave; truyền cảm hứng, đặc biệt l&agrave; truyền cảm hứng cho thế hệ trẻ th&ocirc;ng qua c&aacute;c phương tiện truyền th&ocirc;ng dễ tiếp cận nhất.</p>\r\n<p class=\"paragraph\">Nội dung li&ecirc;n tục được đội ngũ s&aacute;ng tạo nội dung x&acirc;y dựng v&agrave; l&agrave;m mới, tạo ra c&aacute;c tr&agrave;o lưu trong cộng đồng</p>', 0, '', '0d0074266ba127ce07285c91432fca72.jpg', NULL, 0, 0, 0, '2018-09-29 11:25:28', 'administrator', '2018-09-29 11:25:28', 'administrator'),
(2, 'influence-marketing', 'Influence  Marketing', '<p class=\"paragraph\">Gi&uacute;p thương hiệu lựa chọn đ&uacute;ng ifluencers v&agrave; c&oacute; chiến lược, chiến dịch ph&ugrave; hợp v&agrave; hiệu quả</p>\r\n<p class=\"paragraph\">Ch&uacute;ng t&ocirc;i c&ugrave;ng c&aacute;c thương hiệu x&acirc;y dựng mối quan hệ l&acirc;u d&agrave;i, bền vũng v&agrave; hiệu quả với c&aacute;c influencers. Gi&uacute;p thương hiệu c&oacute; thể x&acirc;y dựng một chiến lược sử dụng influencers hiệu quả với những lượng tương t&aacute;c lớn. C&aacute;c creator của DivisionX sẽ trở th&agrave;nh in house influencers của nh&atilde;n h&agrave;ng, đồng h&agrave;nh với nh&atilde;n h&agrave;ng l&acirc;u d&agrave;i.</p>', 0, '', '542c68876365f321315dd09c026de898.jpg', NULL, 0, 0, 0, '2018-09-27 14:06:03', 'administrator', '2018-09-27 14:06:03', 'administrator'),
(3, 'dich-vu-cua-chung-toi', 'Dịch vụ của chúng tôi', '', 0, '', '60bbc9a81fbff55efa51d35811e9855e.jpg', NULL, 0, 0, 0, '2018-09-27 14:06:19', 'administrator', '2018-09-27 14:06:19', 'administrator'),
(4, 'co-hoi-nghe-nghiep', 'CƠ HỘI  NGHỀ NGHIỆP', '', 0, '', '3bd5055cbaf28af1e2e24cfbc08f21d7.jpg', NULL, 0, 0, 0, '2018-09-27 14:06:30', 'administrator', '2018-09-27 14:06:30', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `image_top` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_bottom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `question` text COLLATE utf8_unicode_ci NOT NULL,
  `is_activated` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `image_top`, `image_bottom`, `question`, `is_activated`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'bbf49fdc1645e4f4ca1794188c617aed.jpg', 'eac229ce7d5aba649bfb25a6a10d479b.jpg', '{\"question\":[\"B\\u1ea1n \\u1ea5n t\\u01b0\\u1ee3ng b\\u1edfi t\\u1ea7m nh\\u00ecn v\\u00e0 s\\u1ee9 m\\u1ec7nh c\\u1ee7a ch\\u00fang t\\u00f4i?\",\"B\\u1ea1n ph\\u00f9 h\\u1ee3p v\\u1edbi gi\\u00e1 tr\\u1ecb c\\u1ee7a ch\\u00fang t\\u00f4i\",\"B\\u1ea1n ph\\u00f9 h\\u1ee3p v\\u1edbi team n\\u00e0o\"],\"title\":[[],[\"T\\u00e1o b\\u1ea1o\",\"Ti\\u1ebfn ho\\u00e1\",\"Kh\\u00e1c bi\\u1ec7t\"],[]],\"content\":[[\"Yes\",\"No\"],[\"Kh\\u00f4ng ng\\u1ea1i d\\u01b0 lu\\u1eadn, kh\\u00f4ng ng\\u1ea1i r\\u00e0o c\\u1ea3n, lu\\u00f4n th\\u00e1ch th\\u1ee9c c\\u00e1c gi\\u1edbi h\\u1ea1n\",\"S\\u1ea3n ph\\u1ea9m c\\u1ee7a h\\u00f4m nay \\u0111\\u00e3 t\\u1ed1t h\\u01a1n h\\u00f4m qua nh\\u01b0ng kh\\u00f4ng th\\u1ec3 b\\u1eb1ng s\\u1ea3n ph\\u1ea9m c\\u1ee7a ng\\u00e0y mai\",\"Mu\\u1ed1n kh\\u00e1c bi\\u1ec7t, lu\\u00f4n kh\\u00e1c bi\\u1ec7t. Ngh\\u0129 v\\u00e0 l\\u00e0m nh\\u01b0 m\\u1ed9t ng\\u01b0\\u1eddi ti\\u00ean phong, m\\u1ed9t c\\u00e1 nh\\u00e2n xu\\u1ea5t ch\\u00fang\"],[\"TVC\"]]}', 0, 0, '2018-09-29 10:43:31', 'administrator', '2018-09-29 10:43:31', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `site_sessions`
--

CREATE TABLE `site_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `site_sessions`
--

INSERT INTO `site_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('2eqcf8umjtg1tbi69eu2gmic5jp4ndrb', '::1', 1538194720, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139343732303b6c616e67416262726576696174696f6e7c733a323a227669223b5f5f63695f766172737c613a313a7b733a333a223a3a31223b693a313533383139343836343b7d6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b3a3a317c733a333a223a3a31223b),
('4ismtqcfjlaedbiu01e9udtseigt1sp0', '::1', 1538193122, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139333132323b6c616e67416262726576696174696f6e7c733a323a227669223b5f5f63695f766172737c613a313a7b733a333a223a3a31223b693a313533383139343836343b7d6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b3a3a317c733a333a223a3a31223b),
('5pqejkqf2d7oa597m0h29i8sp0tjucp0', '::1', 1538194398, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139343339383b6c616e67416262726576696174696f6e7c733a323a227669223b5f5f63695f766172737c613a313a7b733a333a223a3a31223b693a313533383139343836343b7d6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b3a3a317c733a333a223a3a31223b),
('7pmq2vbbd858n65q00t7pjil3hvhq8hi', '::1', 1538196445, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139363434353b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b),
('aj9oca3go6ve1hfueneee20dld8ojan6', '::1', 1538194091, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139343039313b6c616e67416262726576696174696f6e7c733a323a227669223b5f5f63695f766172737c613a313a7b733a333a223a3a31223b693a313533383139343836343b7d6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b3a3a317c733a333a223a3a31223b),
('bmepfk1dj6tmbqvvg3monegdb9vthupi', '::1', 1538195072, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139353037323b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b),
('nu7dqtqpgh5j5v9s6j95c7ebhe9spl02', '::1', 1538195391, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139353339313b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b),
('nun54qc6vcfhsqing7im40jiv591rtsu', '::1', 1538193433, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139333433333b6c616e67416262726576696174696f6e7c733a323a227669223b5f5f63695f766172737c613a313a7b733a333a223a3a31223b693a313533383139343836343b7d6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b3a3a317c733a333a223a3a31223b),
('nvt41nmghoo767g91kbck24bu3v0994d', '::1', 1538193758, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139333735383b6c616e67416262726576696174696f6e7c733a323a227669223b5f5f63695f766172737c613a313a7b733a333a223a3a31223b693a313533383139343836343b7d6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b3a3a317c733a333a223a3a31223b),
('o3g7temu5oe02m6hhi7ud26hrs8qqqul', '::1', 1538195785, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139353738353b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b),
('o7to3rru6mfhv716ukibmb2t0g80i2r1', '::1', 1538191886, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139313838363b6c616e67416262726576696174696f6e7c733a323a227669223b5f5f63695f766172737c613a313a7b733a333a223a3a31223b693a313533383139343836343b7d6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b3a3a317c733a333a223a3a31223b),
('o9nq74ep3piqs5gj8vg1gmst4h705ha6', '::1', 1538196125, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139363132353b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b),
('oei3gosud0a3j533j3lbure3ne7n2gjq', '::1', 1538192196, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139323139363b6c616e67416262726576696174696f6e7c733a323a227669223b5f5f63695f766172737c613a313a7b733a333a223a3a31223b693a313533383139343836343b7d6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b3a3a317c733a333a223a3a31223b),
('s6167894sgi7367m63e3pv98uggg6cbu', '::1', 1538192820, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139323832303b6c616e67416262726576696174696f6e7c733a323a227669223b5f5f63695f766172737c613a313a7b733a333a223a3a31223b693a313533383139343836343b7d6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b3a3a317c733a333a223a3a31223b),
('st8am5st188me0tbpadb8cga0c0j2nmk', '::1', 1538196489, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139363434353b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b),
('v0gif4bv2nvkiol2tvrnvhv0kt7abbtt', '::1', 1538192506, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533383139323530363b6c616e67416262726576696174696f6e7c733a323a227669223b5f5f63695f766172737c613a313a7b733a333a223a3a31223b693a313533383139343836343b7d6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353338313034383835223b6c6173745f636865636b7c693a313533383138393337393b3a3a317c733a333a223a3a31223b);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `age` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `age`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1538189379, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL),
(2, '::1', 'asdas', '$2y$08$PpWSK2unjydxp3spURaQIeF0XLE0W70gsd0TD9pit699I.YgN2DAC', NULL, 'admin@admin.com1', NULL, NULL, NULL, NULL, 1527177316, NULL, 0, '', 'asdas', '', '121231', ''),
(3, '::1', 'minhtruong', '$2y$08$YPNhvgbGnA7jbd9HyjXO0./rYZmIXRje/UcB7523ZAy1xg5BOjfGa', NULL, 'minhtruong93gtvt@gmail.com', NULL, NULL, NULL, NULL, 1527177780, 1527179552, 1, '', 'minhtruong', 'mato', '123', '1'),
(4, '::1', 'a', '$2y$08$kDxKWvqs.XWwiD7LHvs2AuG.Uzu4NWhm498URqvjIUYfV3PzfQHim', NULL, 'minhtruong93gtvt@gmail.com1', NULL, NULL, NULL, NULL, 1527178136, NULL, 0, '', 'a', 'mato', '123123', '12'),
(5, '::1', 'Minh Trường', '$2y$08$RzELUGHvx8MtPpATO4/1xuQqG3iKiVsluuuuW9GHcd/lijGyPt8YC', NULL, 'minhtruong93gtvt@gmail.com2', NULL, NULL, NULL, NULL, 1527178552, NULL, 1, '', 'Minh Trường', 'mato', '0985767862', '25'),
(6, '::1', 'Minh Trường', '$2y$08$eFnAMTSd9nK8tyZQNcNlVeWv82KfRkF18pF8Lh7gxbJWCSZF3grMG', NULL, 'minhtruong93gtvt@gmail.com2', NULL, NULL, NULL, NULL, 1527178625, NULL, 1, '', 'Minh Trường', 'mato', '0985767862', '25'),
(7, '::1', 'asd', '$2y$08$VLybd2Ow93i3lknQtDqpIeoMf3xP7v38m9JYML2VM8dowCepDvyP.', NULL, 'a@gmail.com', NULL, NULL, NULL, NULL, 1527179462, NULL, 1, '', 'asd', '', '123', ''),
(8, '::1', 'Minh', '$2y$08$SbJuXh7GnCBqPBvYRTEcMONjoU8TZ8u0ZzDez2z3QP7TivGnE/iH.', NULL, 'hanguyen@user.com', NULL, NULL, NULL, NULL, 1527432498, NULL, 1, '', 'Minh', 'mato', '0985767862', '26'),
(9, '::1', '1232', '$2y$08$FF9cU4VevU3PqW8SJ39bcuVDOVvauKoECc68nn.3CDc6bl8GindX2', NULL, 'asdas@gmail.com', NULL, NULL, NULL, NULL, 1527433031, NULL, 1, '', '1232', '', '1231', ''),
(10, '::1', 'asdasd', '$2y$08$o/tFkN0LG5IxWpsDHNK0KemUM8OvGEiY3Ao1B7eJO6uvB5lrpYALm', NULL, 'aa@gmail.com', NULL, NULL, NULL, NULL, 1527504887, NULL, 1, '', 'asdasd', 'asda', '123123', '12'),
(11, '::1', 'Minh Truong', '$2y$08$Bi2qBwrxcSPkgFlq0xCwLOQbnQH348SZpZt5IRG5mT7/t/y3dbT6G', NULL, 'minhtruong93gtvt@gmail.com111', NULL, NULL, NULL, NULL, 1527523354, NULL, 1, '', 'Minh Truong', 'mato', '0985767862', '26'),
(12, '::1', 'Test', '$2y$08$WIF4VSIReuADjylqq0PeIO/0xapxmvMq9EL8/osUzL.X9MdnvFute', NULL, 'minhtruong93gtvt@gmail.com12', NULL, NULL, NULL, NULL, 1528288091, 1528295244, 1, '', 'Test', 'Mato', '0985767862', '25'),
(13, '::1', 'Do Minh Minh', '$2y$08$BconVYwp22s1nsQX8.X6iewac3bdgoQ4QPY2Qc8GaLrynqT4M7HfW', NULL, 'minhtruong93gtvt@gmail.com123', NULL, NULL, NULL, '/2NIvlwW8v3xZvePhIOIS.', 1528295320, 1528295517, 1, '', 'Do Minh Minh', 'MatoCreative', '0985767862', '25');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2),
(9, 8, 2),
(10, 9, 2),
(11, 10, 2),
(12, 11, 2),
(13, 12, 2),
(14, 13, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Indexes for table `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_id` (`post_category_id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_sessions`
--
ALTER TABLE `site_sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`) USING BTREE,
  ADD KEY `fk_users_groups_users1_idx` (`user_id`) USING BTREE,
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `creator`
--
ALTER TABLE `creator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`post_category_id`) REFERENCES `post_category` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2020 at 05:25 PM
-- Server version: 5.5.61-cll
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extrapow_restaur`
--

-- --------------------------------------------------------

--
-- Table structure for table `rest_commentmeta`
--

CREATE TABLE `rest_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rest_comments`
--

CREATE TABLE `rest_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rest_comments`
--

INSERT INTO `rest_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'A WordPress Commenter', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2020-05-17 04:39:12', '2020-05-17 04:39:12', 'Hi, this is a comment.\nTo get started with moderating, editing, and deleting comments, please visit the Comments screen in the dashboard.\nCommenter avatars come from <a href=\"https://gravatar.com\">Gravatar</a>.', 0, 'post-trashed', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rest_links`
--

CREATE TABLE `rest_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rest_options`
--

CREATE TABLE `rest_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rest_options`
--

INSERT INTO `rest_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://restaurant.extrapowers.in', 'yes'),
(2, 'home', 'http://restaurant.extrapowers.in', 'yes'),
(3, 'blogname', 'Travel Diaries', 'yes'),
(4, 'blogdescription', 'Follow Your Dreams', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'shreya.infotrench@gmail.com', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '1', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%year%/%monthnum%/%day%/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:91:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:12:\"robots\\.txt$\";s:18:\"index.php?robots=1\";s:13:\"favicon\\.ico$\";s:19:\"index.php?favicon=1\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:88:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$\";s:91:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:77:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:61:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:77:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:0:{}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', 'a:3:{i:0;s:78:\"/home/extrapow/restaurant.extrapowers.in/wp-content/themes/blogpecos/style.css\";i:1;s:77:\"/home/extrapow/restaurant.extrapowers.in/wp-content/themes/toocheke/style.css\";i:2;s:0:\"\";}', 'no'),
(40, 'template', 'polite', 'yes'),
(41, 'stylesheet', 'polite', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '47018', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '1', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'posts', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', 'full', 'yes'),
(68, 'image_default_align', 'none', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'widget_text', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(80, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:0:{}', 'no'),
(82, 'timezone_string', '', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '0', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '1', 'yes'),
(93, 'admin_email_lifespan', '1605242352', 'yes'),
(94, 'initial_db_version', '47018', 'yes'),
(95, 'rest_user_roles', 'a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:61:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}', 'yes'),
(96, 'fresh_site', '0', 'yes'),
(97, 'widget_search', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(98, 'widget_recent-posts', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(99, 'widget_recent-comments', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(100, 'widget_archives', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(101, 'widget_meta', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(102, 'sidebars_widgets', 'a:8:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:4:{i:0;s:8:\"search-2\";i:1;s:22:\"polite-featured-post-2\";i:2;s:10:\"archives-2\";i:3;s:12:\"categories-2\";}s:8:\"footer-1\";a:0:{}s:8:\"footer-2\";a:1:{i:0;s:21:\"polite-social-icons-2\";}s:8:\"footer-3\";a:0:{}s:8:\"footer-4\";a:0:{}s:9:\"offcanvas\";a:0:{}s:13:\"array_version\";i:3;}', 'yes'),
(201, '_site_transient_update_plugins', 'O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1589777202;s:7:\"checked\";a:2:{s:19:\"akismet/akismet.php\";s:5:\"4.1.5\";s:9:\"hello.php\";s:5:\"1.7.2\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:2:{s:19:\"akismet/akismet.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"4.1.5\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.4.1.5.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";s:2:\"1x\";s:59:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";}s:11:\"banners_rtl\";a:0:{}}s:9:\"hello.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/hello-dolly\";s:4:\"slug\";s:11:\"hello-dolly\";s:6:\"plugin\";s:9:\"hello.php\";s:11:\"new_version\";s:5:\"1.7.2\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/hello-dolly/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/hello-dolly.1.7.2.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-256x256.jpg?rev=2052855\";s:2:\"1x\";s:64:\"https://ps.w.org/hello-dolly/assets/icon-128x128.jpg?rev=2052855\";}s:7:\"banners\";a:1:{s:2:\"1x\";s:66:\"https://ps.w.org/hello-dolly/assets/banner-772x250.jpg?rev=2052855\";}s:11:\"banners_rtl\";a:0:{}}}}', 'no'),
(195, 'theme_mods_chained', 'a:4:{i:0;b:0;s:18:\"nav_menu_locations\";a:1:{s:7:\"primary\";i:2;}s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1589715307;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:9:\"sidebar-2\";a:0:{}}}}', 'yes'),
(196, 'widget_chained-about-me', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(197, 'widget_chained_facebook_widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(226, '_transient_health-check-site-status-result', '{\"good\":9,\"recommended\":7,\"critical\":1}', 'yes'),
(103, 'cron', 'a:7:{i:1589780353;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1589819953;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1589863153;a:1:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1589863170;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1589863172;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1590381553;a:1:{s:30:\"wp_site_health_scheduled_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"weekly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:604800;}}}s:7:\"version\";i:2;}', 'yes'),
(104, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(105, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(114, 'recovery_keys', 'a:0:{}', 'yes'),
(115, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.4.1.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.4.1.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.4.1-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-5.4.1-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.4.1\";s:7:\"version\";s:5:\"5.4.1\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1589777197;s:15:\"version_checked\";s:5:\"5.4.1\";s:12:\"translations\";a:0:{}}', 'no'),
(116, 'theme_mods_twentytwenty', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1589708858;s:4:\"data\";a:3:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:3:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";}s:9:\"sidebar-2\";a:3:{i:0;s:10:\"archives-2\";i:1;s:12:\"categories-2\";i:2;s:6:\"meta-2\";}}}}', 'yes'),
(223, '_site_transient_timeout_theme_roots', '1589778999', 'no'),
(224, '_site_transient_theme_roots', 'a:4:{s:7:\"chained\";s:7:\"/themes\";s:6:\"polite\";s:7:\"/themes\";s:15:\"twentyseventeen\";s:7:\"/themes\";s:12:\"twentytwenty\";s:7:\"/themes\";}', 'no'),
(168, 'theme_mods_blogpecos', 'a:5:{i:0;b:0;s:18:\"nav_menu_locations\";a:1:{s:6:\"menu-1\";i:2;}s:18:\"custom_css_post_id\";i:-1;s:11:\"custom_logo\";i:19;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1589714831;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes'),
(123, '_site_transient_timeout_browser_85f2b2fff1703c31700dde04017db4c4', '1590295171', 'no'),
(124, '_site_transient_browser_85f2b2fff1703c31700dde04017db4c4', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:13:\"81.0.4044.113\";s:8:\"platform\";s:5:\"Linux\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'no'),
(125, '_site_transient_timeout_php_check_a5907c2ea4d6fbd7e531b3aa7734f0e4', '1590295172', 'no'),
(126, '_site_transient_php_check_a5907c2ea4d6fbd7e531b3aa7734f0e4', 'a:5:{s:19:\"recommended_version\";s:3:\"7.3\";s:15:\"minimum_version\";s:6:\"5.6.20\";s:12:\"is_supported\";b:0;s:9:\"is_secure\";b:0;s:13:\"is_acceptable\";b:0;}', 'no'),
(130, 'can_compress_scripts', '1', 'no'),
(151, 'current_theme', 'Polite', 'yes'),
(152, 'theme_mods_toocheke', 'a:4:{i:0;b:0;s:18:\"nav_menu_locations\";a:0:{}s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1589709798;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:13:\"right-sidebar\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes'),
(153, 'theme_switched', '', 'yes'),
(154, 'widget_toocheke_about_widget', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(155, 'widget_toocheke_social_media', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(156, 'widget_toocheke-calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(159, 'toocheke-comics-navigation', '1', 'yes'),
(160, 'toocheke-first-button', 'http://restaurant.extrapowers.in/wp-content/plugins/toocheke-companion/img/no-image.png', 'yes'),
(161, 'toocheke-previous-button', 'http://restaurant.extrapowers.in/wp-content/plugins/toocheke-companion/img/no-image.png', 'yes'),
(162, 'toocheke-random-button', 'http://restaurant.extrapowers.in/wp-content/plugins/toocheke-companion/img/no-image.png', 'yes'),
(163, 'toocheke-next-button', 'http://restaurant.extrapowers.in/wp-content/plugins/toocheke-companion/img/no-image.png', 'yes'),
(164, 'toocheke-latest-button', 'http://restaurant.extrapowers.in/wp-content/plugins/toocheke-companion/img/no-image.png', 'yes'),
(187, 'polite_theme_notice_start_time', '1589714833', 'yes'),
(188, 'widget_polite-featured-post', 'a:2:{i:2;a:3:{s:5:\"title\";s:12:\"Recent Posts\";s:3:\"cat\";i:0;s:11:\"post-number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(189, 'widget_polite-author', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(190, 'widget_polite-social-icons', 'a:2:{i:2;a:1:{s:5:\"title\";s:9:\"Follow Us\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(225, '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1589777202;s:7:\"checked\";a:4:{s:7:\"chained\";s:5:\"1.0.5\";s:6:\"polite\";s:5:\"1.1.0\";s:15:\"twentyseventeen\";s:3:\"2.3\";s:12:\"twentytwenty\";s:3:\"1.2\";}s:8:\"response\";a:1:{s:12:\"twentytwenty\";a:6:{s:5:\"theme\";s:12:\"twentytwenty\";s:11:\"new_version\";s:3:\"1.3\";s:3:\"url\";s:42:\"https://wordpress.org/themes/twentytwenty/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/theme/twentytwenty.1.3.zip\";s:8:\"requires\";s:3:\"4.7\";s:12:\"requires_php\";s:5:\"5.2.4\";}}s:12:\"translations\";a:0:{}}', 'no'),
(199, '_transient_chained_categories', '2', 'yes'),
(186, 'theme_mods_polite', 'a:5:{i:0;b:0;s:18:\"nav_menu_locations\";a:1:{s:6:\"menu-1\";i:2;}s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1589715002;s:4:\"data\";a:7:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:8:\"footer-1\";a:0:{}s:8:\"footer-2\";a:0:{}s:8:\"footer-3\";a:0:{}s:8:\"footer-4\";a:0:{}s:9:\"offcanvas\";a:0:{}}}s:14:\"polite_options\";a:9:{s:20:\"polite_enable_search\";b:1;s:23:\"polite_enable_offcanvas\";b:1;s:22:\"polite-select-category\";i:3;s:28:\"polite-promo-select-category\";i:3;s:24:\"polite-sidebar-blog-page\";s:13:\"right-sidebar\";s:24:\"polite-blog-image-layout\";s:10:\"left-image\";s:32:\"polite-single-page-related-posts\";b:1;s:28:\"polite-enable-sticky-sidebar\";b:1;s:19:\"polite_enable_promo\";b:0;}}', 'yes'),
(217, 'category_children', 'a:0:{}', 'yes'),
(174, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}', 'yes'),
(175, 'recently_activated', 'a:1:{s:41:\"toocheke-companion/toocheke-companion.php\";i:1589712782;}', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `rest_postmeta`
--

CREATE TABLE `rest_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rest_postmeta`
--

INSERT INTO `rest_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '_wp_page_template', 'default'),
(2, 3, '_wp_page_template', 'default'),
(3, 5, '_wp_page_template', 'page-templates/comic-collections.php'),
(4, 6, '_wp_page_template', 'page-templates/comic-chapters.php'),
(5, 7, '_wp_page_template', 'page-templates/comic-characters.php'),
(6, 8, '_wp_page_template', 'page-templates/series-genres.php'),
(7, 9, '_wp_trash_meta_status', 'publish'),
(8, 9, '_wp_trash_meta_time', '1589709260'),
(9, 10, '_wp_trash_meta_status', 'publish'),
(10, 10, '_wp_trash_meta_time', '1589711226'),
(11, 11, '_edit_lock', '1589711438:1'),
(12, 11, '_wp_trash_meta_status', 'publish'),
(13, 11, '_wp_trash_meta_time', '1589711440'),
(14, 13, '_menu_item_type', 'taxonomy'),
(15, 13, '_menu_item_menu_item_parent', '0'),
(16, 13, '_menu_item_object_id', '3'),
(17, 13, '_menu_item_object', 'category'),
(18, 13, '_menu_item_target', ''),
(19, 13, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(20, 13, '_menu_item_xfn', ''),
(21, 13, '_menu_item_url', ''),
(94, 34, '_wp_attached_file', '2020/05/271.jpg'),
(95, 34, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:2050;s:6:\"height\";i:1372;s:4:\"file\";s:15:\"2020/05/271.jpg\";s:5:\"sizes\";a:10:{s:6:\"medium\";a:4:{s:4:\"file\";s:15:\"271-300x201.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:201;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:16:\"271-1024x685.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:685;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:15:\"271-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:15:\"271-768x514.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:514;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"1536x1536\";a:4:{s:4:\"file\";s:17:\"271-1536x1028.jpg\";s:5:\"width\";i:1536;s:6:\"height\";i:1028;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"2048x2048\";a:4:{s:4:\"file\";s:17:\"271-2048x1371.jpg\";s:5:\"width\";i:2048;s:6:\"height\";i:1371;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"polite-thumbnail-size\";a:4:{s:4:\"file\";s:15:\"271-800x800.jpg\";s:5:\"width\";i:800;s:6:\"height\";i:800;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:19:\"polite-related-size\";a:4:{s:4:\"file\";s:15:\"271-600x400.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:400;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:17:\"polite-promo-post\";a:4:{s:4:\"file\";s:15:\"271-800x500.jpg\";s:5:\"width\";i:800;s:6:\"height\";i:500;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:30:\"polite-related-post-thumbnails\";a:4:{s:4:\"file\";s:15:\"271-850x550.jpg\";s:5:\"width\";i:850;s:6:\"height\";i:550;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(25, 15, '_wp_attached_file', '2020/05/cropped-Download-Namaste-PNG-HD.png'),
(26, 15, '_wp_attachment_context', 'custom-logo'),
(27, 15, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:431;s:6:\"height\";i:650;s:4:\"file\";s:43:\"2020/05/cropped-Download-Namaste-PNG-HD.png\";s:5:\"sizes\";a:2:{s:6:\"medium\";a:4:{s:4:\"file\";s:43:\"cropped-Download-Namaste-PNG-HD-199x300.png\";s:5:\"width\";i:199;s:6:\"height\";i:300;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:43:\"cropped-Download-Namaste-PNG-HD-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(28, 16, '_edit_lock', '1589712858:1'),
(29, 16, '_wp_trash_meta_status', 'publish'),
(30, 16, '_wp_trash_meta_time', '1589712883'),
(33, 18, '_edit_lock', '1589713146:1'),
(34, 18, '_wp_trash_meta_status', 'publish'),
(35, 18, '_wp_trash_meta_time', '1589713157'),
(38, 20, '_wp_trash_meta_status', 'publish'),
(39, 20, '_wp_trash_meta_time', '1589713232'),
(40, 21, '_edit_lock', '1589715837:1'),
(48, 25, '_wp_trash_meta_status', 'publish'),
(47, 25, '_edit_lock', '1589715622:1'),
(49, 25, '_wp_trash_meta_time', '1589715627'),
(50, 26, '_wp_trash_meta_status', 'publish'),
(51, 26, '_wp_trash_meta_time', '1589715637'),
(52, 27, '_menu_item_type', 'custom'),
(53, 27, '_menu_item_menu_item_parent', '0'),
(54, 27, '_menu_item_object_id', '27'),
(55, 27, '_menu_item_object', 'custom'),
(56, 27, '_menu_item_target', ''),
(57, 27, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(58, 27, '_menu_item_xfn', ''),
(59, 27, '_menu_item_url', 'http://restaurant.extrapowers.in/'),
(93, 33, '_wp_trash_meta_time', '1589715823'),
(61, 28, '_menu_item_type', 'taxonomy'),
(62, 28, '_menu_item_menu_item_parent', '0'),
(63, 28, '_menu_item_object_id', '4'),
(64, 28, '_menu_item_object', 'category'),
(65, 28, '_menu_item_target', ''),
(66, 28, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(67, 28, '_menu_item_xfn', ''),
(68, 28, '_menu_item_url', ''),
(92, 33, '_wp_trash_meta_status', 'publish'),
(70, 29, '_menu_item_type', 'taxonomy'),
(71, 29, '_menu_item_menu_item_parent', '0'),
(72, 29, '_menu_item_object_id', '5'),
(73, 29, '_menu_item_object', 'category'),
(74, 29, '_menu_item_target', ''),
(75, 29, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(76, 29, '_menu_item_xfn', ''),
(77, 29, '_menu_item_url', ''),
(91, 32, '_wp_trash_meta_time', '1589715739'),
(79, 30, '_menu_item_type', 'taxonomy'),
(80, 30, '_menu_item_menu_item_parent', '0'),
(81, 30, '_menu_item_object_id', '6'),
(82, 30, '_menu_item_object', 'category'),
(83, 30, '_menu_item_target', ''),
(84, 30, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(85, 30, '_menu_item_xfn', ''),
(86, 30, '_menu_item_url', ''),
(90, 32, '_wp_trash_meta_status', 'publish'),
(88, 31, '_wp_trash_meta_status', 'publish'),
(89, 31, '_wp_trash_meta_time', '1589715699'),
(96, 34, '_wp_attachment_image_alt', 'nanini lake'),
(100, 36, '_wp_trash_meta_status', 'publish'),
(99, 21, '_thumbnail_id', '34'),
(101, 36, '_wp_trash_meta_time', '1589715963'),
(102, 37, '_edit_lock', '1589716655:1'),
(105, 39, '_wp_trash_meta_status', 'publish'),
(106, 39, '_wp_trash_meta_time', '1589716147'),
(107, 40, '_wp_trash_meta_status', 'publish'),
(108, 40, '_wp_trash_meta_time', '1589716180'),
(109, 41, '_edit_lock', '1589716437:1'),
(110, 42, '_edit_lock', '1589716866:1'),
(111, 43, '_wp_attached_file', '2020/05/e19419ebe1f505dfc8bc492502c57eb7.jpg'),
(112, 43, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:960;s:6:\"height\";i:1200;s:4:\"file\";s:44:\"2020/05/e19419ebe1f505dfc8bc492502c57eb7.jpg\";s:5:\"sizes\";a:8:{s:6:\"medium\";a:4:{s:4:\"file\";s:44:\"e19419ebe1f505dfc8bc492502c57eb7-240x300.jpg\";s:5:\"width\";i:240;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:45:\"e19419ebe1f505dfc8bc492502c57eb7-819x1024.jpg\";s:5:\"width\";i:819;s:6:\"height\";i:1024;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:44:\"e19419ebe1f505dfc8bc492502c57eb7-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:44:\"e19419ebe1f505dfc8bc492502c57eb7-768x960.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:960;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"polite-thumbnail-size\";a:4:{s:4:\"file\";s:44:\"e19419ebe1f505dfc8bc492502c57eb7-800x800.jpg\";s:5:\"width\";i:800;s:6:\"height\";i:800;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:19:\"polite-related-size\";a:4:{s:4:\"file\";s:44:\"e19419ebe1f505dfc8bc492502c57eb7-600x400.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:400;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:17:\"polite-promo-post\";a:4:{s:4:\"file\";s:44:\"e19419ebe1f505dfc8bc492502c57eb7-800x500.jpg\";s:5:\"width\";i:800;s:6:\"height\";i:500;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:30:\"polite-related-post-thumbnails\";a:4:{s:4:\"file\";s:44:\"e19419ebe1f505dfc8bc492502c57eb7-850x550.jpg\";s:5:\"width\";i:850;s:6:\"height\";i:550;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(118, 45, '_wp_attached_file', '2020/05/timthumb.jpeg'),
(117, 37, '_thumbnail_id', '43'),
(119, 45, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:400;s:6:\"height\";i:275;s:4:\"file\";s:21:\"2020/05/timthumb.jpeg\";s:5:\"sizes\";a:2:{s:6:\"medium\";a:4:{s:4:\"file\";s:21:\"timthumb-300x206.jpeg\";s:5:\"width\";i:300;s:6:\"height\";i:206;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:21:\"timthumb-150x150.jpeg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(123, 46, '_wp_attached_file', '2020/05/fROFGjW_MASOORI_790.jpg'),
(122, 42, '_thumbnail_id', '46'),
(124, 46, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:790;s:6:\"height\";i:480;s:4:\"file\";s:31:\"2020/05/fROFGjW_MASOORI_790.jpg\";s:5:\"sizes\";a:4:{s:6:\"medium\";a:4:{s:4:\"file\";s:31:\"fROFGjW_MASOORI_790-300x182.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:182;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:31:\"fROFGjW_MASOORI_790-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:31:\"fROFGjW_MASOORI_790-768x467.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:467;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:19:\"polite-related-size\";a:4:{s:4:\"file\";s:31:\"fROFGjW_MASOORI_790-600x400.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:400;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}'),
(129, 48, '_edit_lock', '1589717303:1'),
(130, 49, '_edit_lock', '1589717693:1'),
(131, 50, '_wp_attached_file', '2020/05/28872_8649.jpg'),
(132, 50, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:800;s:6:\"height\";i:602;s:4:\"file\";s:22:\"2020/05/28872_8649.jpg\";s:5:\"sizes\";a:6:{s:6:\"medium\";a:4:{s:4:\"file\";s:22:\"28872_8649-300x226.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:226;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:22:\"28872_8649-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:22:\"28872_8649-768x578.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:578;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:19:\"polite-related-size\";a:4:{s:4:\"file\";s:22:\"28872_8649-600x400.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:400;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:17:\"polite-promo-post\";a:4:{s:4:\"file\";s:22:\"28872_8649-800x500.jpg\";s:5:\"width\";i:800;s:6:\"height\";i:500;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:30:\"polite-related-post-thumbnails\";a:4:{s:4:\"file\";s:22:\"28872_8649-800x550.jpg\";s:5:\"width\";i:800;s:6:\"height\";i:550;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(133, 51, '_wp_attached_file', '2020/05/hemkunt-sahib.jpg'),
(134, 51, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:550;s:6:\"height\";i:366;s:4:\"file\";s:25:\"2020/05/hemkunt-sahib.jpg\";s:5:\"sizes\";a:2:{s:6:\"medium\";a:4:{s:4:\"file\";s:25:\"hemkunt-sahib-300x200.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:200;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:25:\"hemkunt-sahib-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(137, 48, '_thumbnail_id', '50'),
(140, 1, '_wp_trash_meta_status', 'publish'),
(141, 1, '_wp_trash_meta_time', '1589717547'),
(142, 1, '_wp_desired_post_slug', 'hello-world'),
(143, 1, '_wp_trash_meta_comments_status', 'a:1:{i:1;s:1:\"1\";}'),
(144, 55, '_wp_attached_file', '2020/05/2016_55580b56239800ashimla-qpr.jpg'),
(145, 55, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:500;s:6:\"height\";i:300;s:4:\"file\";s:42:\"2020/05/2016_55580b56239800ashimla-qpr.jpg\";s:5:\"sizes\";a:2:{s:6:\"medium\";a:4:{s:4:\"file\";s:42:\"2016_55580b56239800ashimla-qpr-300x180.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:180;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:42:\"2016_55580b56239800ashimla-qpr-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(146, 56, '_edit_lock', '1589719151:1'),
(147, 57, '_wp_attached_file', '2020/05/Shimla-in-Winter.png'),
(148, 57, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:800;s:6:\"height\";i:400;s:4:\"file\";s:28:\"2020/05/Shimla-in-Winter.png\";s:5:\"sizes\";a:4:{s:6:\"medium\";a:4:{s:4:\"file\";s:28:\"Shimla-in-Winter-300x150.png\";s:5:\"width\";i:300;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:28:\"Shimla-in-Winter-150x150.png\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:9:\"image/png\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:28:\"Shimla-in-Winter-768x384.png\";s:5:\"width\";i:768;s:6:\"height\";i:384;s:9:\"mime-type\";s:9:\"image/png\";}s:19:\"polite-related-size\";a:4:{s:4:\"file\";s:28:\"Shimla-in-Winter-600x400.png\";s:5:\"width\";i:600;s:6:\"height\";i:400;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(152, 59, '_edit_lock', '1589719296:1'),
(151, 49, '_thumbnail_id', '57'),
(153, 60, '_wp_attached_file', '2020/05/shareiq_1334473534.145534.jpg'),
(154, 60, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:1280;s:6:\"height\";i:960;s:4:\"file\";s:37:\"2020/05/shareiq_1334473534.145534.jpg\";s:5:\"sizes\";a:8:{s:6:\"medium\";a:4:{s:4:\"file\";s:37:\"shareiq_1334473534.145534-300x225.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:225;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:38:\"shareiq_1334473534.145534-1024x768.jpg\";s:5:\"width\";i:1024;s:6:\"height\";i:768;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:37:\"shareiq_1334473534.145534-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:37:\"shareiq_1334473534.145534-768x576.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:576;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:21:\"polite-thumbnail-size\";a:4:{s:4:\"file\";s:37:\"shareiq_1334473534.145534-800x800.jpg\";s:5:\"width\";i:800;s:6:\"height\";i:800;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:19:\"polite-related-size\";a:4:{s:4:\"file\";s:37:\"shareiq_1334473534.145534-600x400.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:400;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:17:\"polite-promo-post\";a:4:{s:4:\"file\";s:37:\"shareiq_1334473534.145534-800x500.jpg\";s:5:\"width\";i:800;s:6:\"height\";i:500;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:30:\"polite-related-post-thumbnails\";a:4:{s:4:\"file\";s:37:\"shareiq_1334473534.145534-850x550.jpg\";s:5:\"width\";i:850;s:6:\"height\";i:550;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(155, 61, '_wp_attached_file', '2020/05/manali-river-beas.jpg'),
(156, 61, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:700;s:6:\"height\";i:450;s:4:\"file\";s:29:\"2020/05/manali-river-beas.jpg\";s:5:\"sizes\";a:3:{s:6:\"medium\";a:4:{s:4:\"file\";s:29:\"manali-river-beas-300x193.jpg\";s:5:\"width\";i:300;s:6:\"height\";i:193;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:9:\"thumbnail\";a:4:{s:4:\"file\";s:29:\"manali-river-beas-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:19:\"polite-related-size\";a:4:{s:4:\"file\";s:29:\"manali-river-beas-600x400.jpg\";s:5:\"width\";i:600;s:6:\"height\";i:400;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(159, 56, '_thumbnail_id', '60'),
(162, 59, '_thumbnail_id', '61'),
(165, 64, '_edit_lock', '1589719293:1');

-- --------------------------------------------------------

--
-- Table structure for table `rest_posts`
--

CREATE TABLE `rest_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rest_posts`
--

INSERT INTO `rest_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2020-05-17 04:39:12', '2020-05-17 04:39:12', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'trash', 'open', 'open', '', 'hello-world__trashed', '', '', '2020-05-17 12:12:27', '2020-05-17 12:12:27', '', 0, 'http://restaurant.extrapowers.in/?p=1', 0, 'post', '', 1),
(2, 1, '2020-05-17 04:39:12', '2020-05-17 04:39:12', '<!-- wp:paragraph -->\n<p>This is an example page. It\'s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Hi there! I\'m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin\' caught in the rain.)</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>...or something like this:</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:paragraph -->\n<p>As a new WordPress user, you should go to <a href=\"http://restaurant.extrapowers.in/wp-admin/\">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>\n<!-- /wp:paragraph -->', 'Sample Page', '', 'publish', 'closed', 'open', '', 'sample-page', '', '', '2020-05-17 04:39:12', '2020-05-17 04:39:12', '', 0, 'http://restaurant.extrapowers.in/?page_id=2', 0, 'page', '', 0),
(3, 1, '2020-05-17 04:39:12', '2020-05-17 04:39:12', '<!-- wp:heading --><h2>Who we are</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Our website address is: http://restaurant.extrapowers.in.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What personal data we collect and why we collect it</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Comments</h3><!-- /wp:heading --><!-- wp:paragraph --><p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&#8217;s IP address and browser user agent string to help spam detection.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Media</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Contact forms</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &quot;Remember Me&quot;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Embedded content from other websites</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Analytics</h3><!-- /wp:heading --><!-- wp:heading --><h2>Who we share your data with</h2><!-- /wp:heading --><!-- wp:heading --><h2>How long we retain your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>What rights you have over your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Where we send your data</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Visitor comments may be checked through an automated spam detection service.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Your contact information</h2><!-- /wp:heading --><!-- wp:heading --><h2>Additional information</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>How we protect your data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What data breach procedures we have in place</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What third parties we receive data from</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>What automated decision making and/or profiling we do with user data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Industry regulatory disclosure requirements</h3><!-- /wp:heading -->', 'Privacy Policy', '', 'draft', 'closed', 'open', '', 'privacy-policy', '', '', '2020-05-17 04:39:12', '2020-05-17 04:39:12', '', 0, 'http://restaurant.extrapowers.in/?page_id=3', 0, 'page', '', 0),
(4, 1, '2020-05-17 04:39:32', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2020-05-17 04:39:32', '0000-00-00 00:00:00', '', 0, 'http://restaurant.extrapowers.in/?p=4', 0, 'post', '', 0),
(5, 1, '2020-05-17 09:49:28', '2020-05-17 09:49:28', '', 'Collections', '', 'publish', 'closed', 'closed', '', 'collections', '', '', '2020-05-17 09:49:28', '2020-05-17 09:49:28', '', 0, 'http://restaurant.extrapowers.in/collections/', 0, 'page', '', 0),
(6, 1, '2020-05-17 09:49:28', '2020-05-17 09:49:28', '', 'Chapters', '', 'publish', 'closed', 'closed', '', 'chapters', '', '', '2020-05-17 09:49:28', '2020-05-17 09:49:28', '', 0, 'http://restaurant.extrapowers.in/chapters/', 0, 'page', '', 0),
(7, 1, '2020-05-17 09:49:28', '2020-05-17 09:49:28', '', 'Characters', '', 'publish', 'closed', 'closed', '', 'characters', '', '', '2020-05-17 09:49:28', '2020-05-17 09:49:28', '', 0, 'http://restaurant.extrapowers.in/characters/', 0, 'page', '', 0),
(8, 1, '2020-05-17 09:49:28', '2020-05-17 09:49:28', '', 'Genres', '', 'publish', 'closed', 'closed', '', 'genres', '', '', '2020-05-17 09:49:28', '2020-05-17 09:49:28', '', 0, 'http://restaurant.extrapowers.in/genres/', 0, 'page', '', 0),
(9, 1, '2020-05-17 09:54:20', '2020-05-17 09:54:20', '{\n    \"blogname\": {\n        \"value\": \"Blog\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 09:54:20\"\n    },\n    \"blogdescription\": {\n        \"value\": \"Keep Blogging\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 09:54:20\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '4f054ff8-1b73-4eca-abc1-d6b1800e6ad6', '', '', '2020-05-17 09:54:20', '2020-05-17 09:54:20', '', 0, 'http://restaurant.extrapowers.in/2020/05/17/4f054ff8-1b73-4eca-abc1-d6b1800e6ad6/', 0, 'customize_changeset', '', 0),
(10, 1, '2020-05-17 10:27:06', '2020-05-17 10:27:06', '{\n    \"blogname\": {\n        \"value\": \"Travel Diaries\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 10:27:06\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'a8571be9-22e4-48d7-96b6-a8a4fd02e8a5', '', '', '2020-05-17 10:27:06', '2020-05-17 10:27:06', '', 0, 'http://restaurant.extrapowers.in/2020/05/17/a8571be9-22e4-48d7-96b6-a8a4fd02e8a5/', 0, 'customize_changeset', '', 0),
(11, 1, '2020-05-17 10:30:40', '2020-05-17 10:30:40', '{\n    \"blogdescription\": {\n        \"value\": \"Follow Your Dreams\",\n        \"type\": \"option\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 10:28:39\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '57a0a3a6-2ce3-43fd-94ee-0cb914282fc2', '', '', '2020-05-17 10:30:40', '2020-05-17 10:30:40', '', 0, 'http://restaurant.extrapowers.in/?p=11', 0, 'customize_changeset', '', 0),
(12, 1, '2020-05-17 10:50:24', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'closed', '', '', '', '', '2020-05-17 10:50:24', '0000-00-00 00:00:00', '', 0, 'http://restaurant.extrapowers.in/?post_type=series&p=12', 0, 'series', '', 0),
(13, 1, '2020-05-17 10:51:04', '2020-05-17 10:51:04', ' ', '', '', 'publish', 'closed', 'closed', '', '13', '', '', '2020-05-17 11:51:33', '2020-05-17 11:51:33', '', 0, 'http://restaurant.extrapowers.in/?p=13', 2, 'nav_menu_item', '', 0),
(34, 1, '2020-05-17 11:44:40', '2020-05-17 11:44:40', '', '271', '', 'inherit', 'open', 'closed', '', '271', '', '', '2020-05-17 11:44:55', '2020-05-17 11:44:55', '', 21, 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/271.jpg', 0, 'attachment', 'image/jpeg', 0),
(15, 1, '2020-05-17 10:53:50', '2020-05-17 10:53:50', 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/cropped-Download-Namaste-PNG-HD.png', 'cropped-Download-Namaste-PNG-HD.png', '', 'inherit', 'open', 'closed', '', 'cropped-download-namaste-png-hd-png', '', '', '2020-05-17 10:53:50', '2020-05-17 10:53:50', '', 0, 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/cropped-Download-Namaste-PNG-HD.png', 0, 'attachment', 'image/png', 0),
(16, 1, '2020-05-17 10:54:43', '2020-05-17 10:54:43', '{\n    \"blogpecos::custom_logo\": {\n        \"value\": 15,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 10:53:56\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '4080f455-bede-428b-beef-80fc926acb42', '', '', '2020-05-17 10:54:43', '2020-05-17 10:54:43', '', 0, 'http://restaurant.extrapowers.in/?p=16', 0, 'customize_changeset', '', 0),
(35, 1, '2020-05-17 11:45:28', '2020-05-17 11:45:28', '<!-- wp:paragraph -->\n<p>Commonly known as the “Lake District of India”, Nainital is one of the most beautiful hill stations in North India. Surrounded by mountains on three sides Nainital is located around the beautiful lake Naini Tal. This lake resort is situated at a height of 1,938 meters. There are many legends associated with the place. According to one, Nainital has derived its name from the Goddess Naina while the other legend says that when the Goddess Sati lost her eyes, she was being carried by Lord Shiva and a lake was formed. (‘Naina’ means eyes and ‘Tal’ means lake.) This beautiful small town in surrounded by seven hills, popularly known as ‘Sapta-Shring’ – Ayarpata, Deopata, Handi-Bandi, Naina, Alma, Lariya-Kanta and Sher-Ka-Danda. The majestic mountains and the sparkling waters of the lake add an immense lot to the beauty of the town.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Commonly known as the “Lake District of India”, Nainital is one of the most beautiful hill stations in North India. Surrounded by mountains on three sides Nainital is located around the beautiful lake Naini Tal. This lake resort is situated at a height of 1,938 meters. There are many legends associated with the place. According to one, Nainital has derived its name from the Goddess Naina while the other legend says that when the Goddess Sati lost her eyes, she was being carried by Lord Shiva and a lake was formed. (‘Naina’ means eyes and ‘Tal’ means lake.) This beautiful small town in surrounded by seven hills, popularly known as ‘Sapta-Shring’ – Ayarpata, Deopata, Handi-Bandi, Naina, Alma, Lariya-Kanta and Sher-Ka-Danda. The majestic mountains and the sparkling waters of the lake add an immense lot to the beauty of the town.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nainital has an advantage of being situated in vicinity of several other lesser known hill stations that are connected through all season motorable roads.Vantage points around Nainital offer a panoramic view of Himalayan peaks on one side and the plains spread out on the other. Narrow wooded lanes through forests of oak, pine and deodar are excellent for short refreshing walks. The older parts of Nainital also retain colonial vestiges, including sprawling bungalows, public schools, churches and the old Christian cemetery.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>On reaching the head of the town where the highway from the plains meets the main Mall at Tallital, one gets a dramatic view of the beautiful Naini Lake that seems to be nestled in a remote cocoon. Brightly coloured sails of yachts dot the calm waters of the lake while crowds of holiday makers throng the Mall at its edge. Boating in the lake is just one of the favourite activities of the tourists. Others come here for trekking in the densely forested mountains that surround the town.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->', 'Nainital', 'Commonly known as the “Lake District of India”, Nainital is one of the most beautiful hill stations in North India. Surrounded by mountains on three', 'inherit', 'closed', 'closed', '', '21-revision-v1', '', '', '2020-05-17 11:45:28', '2020-05-17 11:45:28', '', 21, 'http://restaurant.extrapowers.in/2020/05/17/21-revision-v1/', 0, 'revision', '', 0),
(18, 1, '2020-05-17 10:59:17', '2020-05-17 10:59:17', '{\n    \"blogpecos::custom_logo\": {\n        \"value\": 17,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 10:59:06\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '7d776a07-fba4-4169-b4b4-f0034811b92d', '', '', '2020-05-17 10:59:17', '2020-05-17 10:59:17', '', 0, 'http://restaurant.extrapowers.in/?p=18', 0, 'customize_changeset', '', 0),
(20, 1, '2020-05-17 11:00:32', '2020-05-17 11:00:32', '{\n    \"blogpecos::custom_logo\": {\n        \"value\": 19,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 11:00:32\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '0ab0766f-3981-4db2-8b99-e06e2b511840', '', '', '2020-05-17 11:00:32', '2020-05-17 11:00:32', '', 0, 'http://restaurant.extrapowers.in/2020/05/17/0ab0766f-3981-4db2-8b99-e06e2b511840/', 0, 'customize_changeset', '', 0),
(21, 1, '2020-05-17 11:03:52', '2020-05-17 11:03:52', '<!-- wp:paragraph -->\n<p>Commonly known as the “Lake District of India”, Nainital is one of the most beautiful hill stations in North India. Surrounded by mountains on three sides Nainital is located around the beautiful lake Naini Tal. This lake resort is situated at a height of 1,938 meters. There are many legends associated with the place. According to one, Nainital has derived its name from the Goddess Naina while the other legend says that when the Goddess Sati lost her eyes, she was being carried by Lord Shiva and a lake was formed. (‘Naina’ means eyes and ‘Tal’ means lake.) This beautiful small town in surrounded by seven hills, popularly known as ‘Sapta-Shring’ – Ayarpata, Deopata, Handi-Bandi, Naina, Alma, Lariya-Kanta and Sher-Ka-Danda. The majestic mountains and the sparkling waters of the lake add an immense lot to the beauty of the town.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Commonly known as the “Lake District of India”, Nainital is one of the most beautiful hill stations in North India. Surrounded by mountains on three sides Nainital is located around the beautiful lake Naini Tal. This lake resort is situated at a height of 1,938 meters. There are many legends associated with the place. According to one, Nainital has derived its name from the Goddess Naina while the other legend says that when the Goddess Sati lost her eyes, she was being carried by Lord Shiva and a lake was formed. (‘Naina’ means eyes and ‘Tal’ means lake.) This beautiful small town in surrounded by seven hills, popularly known as ‘Sapta-Shring’ – Ayarpata, Deopata, Handi-Bandi, Naina, Alma, Lariya-Kanta and Sher-Ka-Danda. The majestic mountains and the sparkling waters of the lake add an immense lot to the beauty of the town.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nainital has an advantage of being situated in vicinity of several other lesser known hill stations that are connected through all season motorable roads.Vantage points around Nainital offer a panoramic view of Himalayan peaks on one side and the plains spread out on the other. Narrow wooded lanes through forests of oak, pine and deodar are excellent for short refreshing walks. The older parts of Nainital also retain colonial vestiges, including sprawling bungalows, public schools, churches and the old Christian cemetery.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>On reaching the head of the town where the highway from the plains meets the main Mall at Tallital, one gets a dramatic view of the beautiful Naini Lake that seems to be nestled in a remote cocoon. Brightly coloured sails of yachts dot the calm waters of the lake while crowds of holiday makers throng the Mall at its edge. Boating in the lake is just one of the favourite activities of the tourists. Others come here for trekking in the densely forested mountains that surround the town.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->', 'Nainital', 'Commonly known as the “Lake District of India”, Nainital is one of the most beautiful hill stations in North India. Surrounded by mountains on three', 'publish', 'open', 'closed', '', 'nainital', '', '', '2020-05-17 11:45:28', '2020-05-17 11:45:28', '', 0, 'http://restaurant.extrapowers.in/?p=21', 0, 'post', '', 0),
(22, 1, '2020-05-17 11:03:52', '2020-05-17 11:03:52', '<!-- wp:paragraph -->\n<p>Commonly known as the “Lake District of India”, Nainital is one of the most beautiful hill stations in North India. Surrounded by mountains on three sides Nainital is located around the beautiful lake Naini Tal. This lake resort is situated at a height of 1,938 meters. There are many legends associated with the place. According to one, Nainital has derived its name from the Goddess Naina while the other legend says that when the Goddess Sati lost her eyes, she was being carried by Lord Shiva and a lake was formed. (‘Naina’ means eyes and ‘Tal’ means lake.) This beautiful small town in surrounded by seven hills, popularly known as ‘Sapta-Shring’ – Ayarpata, Deopata, Handi-Bandi, Naina, Alma, Lariya-Kanta and Sher-Ka-Danda. The majestic mountains and the sparkling waters of the lake add an immense lot to the beauty of the town.</p>\n<!-- /wp:paragraph -->', 'Nainital', '', 'inherit', 'closed', 'closed', '', '21-revision-v1', '', '', '2020-05-17 11:03:52', '2020-05-17 11:03:52', '', 21, 'http://restaurant.extrapowers.in/2020/05/17/21-revision-v1/', 0, 'revision', '', 0),
(23, 1, '2020-05-17 11:05:09', '2020-05-17 11:05:09', '<!-- wp:paragraph -->\n<p>Commonly known as the “Lake District of India”, Nainital is one of the most beautiful hill stations in North India. Surrounded by mountains on three sides Nainital is located around the beautiful lake Naini Tal. This lake resort is situated at a height of 1,938 meters. There are many legends associated with the place. According to one, Nainital has derived its name from the Goddess Naina while the other legend says that when the Goddess Sati lost her eyes, she was being carried by Lord Shiva and a lake was formed. (‘Naina’ means eyes and ‘Tal’ means lake.) This beautiful small town in surrounded by seven hills, popularly known as ‘Sapta-Shring’ – Ayarpata, Deopata, Handi-Bandi, Naina, Alma, Lariya-Kanta and Sher-Ka-Danda. The majestic mountains and the sparkling waters of the lake add an immense lot to the beauty of the town.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Commonly known as the “Lake District of India”, Nainital is one of the most beautiful hill stations in North India. Surrounded by mountains on three sides Nainital is located around the beautiful lake Naini Tal. This lake resort is situated at a height of 1,938 meters. There are many legends associated with the place. According to one, Nainital has derived its name from the Goddess Naina while the other legend says that when the Goddess Sati lost her eyes, she was being carried by Lord Shiva and a lake was formed. (‘Naina’ means eyes and ‘Tal’ means lake.) This beautiful small town in surrounded by seven hills, popularly known as ‘Sapta-Shring’ – Ayarpata, Deopata, Handi-Bandi, Naina, Alma, Lariya-Kanta and Sher-Ka-Danda. The majestic mountains and the sparkling waters of the lake add an immense lot to the beauty of the town.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nainital has an advantage of being situated in vicinity of several other lesser known hill stations that are connected through all season motorable roads.Vantage points around Nainital offer a panoramic view of Himalayan peaks on one side and the plains spread out on the other. Narrow wooded lanes through forests of oak, pine and deodar are excellent for short refreshing walks. The older parts of Nainital also retain colonial vestiges, including sprawling bungalows, public schools, churches and the old Christian cemetery.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>On reaching the head of the town where the highway from the plains meets the main Mall at Tallital, one gets a dramatic view of the beautiful Naini Lake that seems to be nestled in a remote cocoon. Brightly coloured sails of yachts dot the calm waters of the lake while crowds of holiday makers throng the Mall at its edge. Boating in the lake is just one of the favourite activities of the tourists. Others come here for trekking in the densely forested mountains that surround the town.</p>\n<!-- /wp:paragraph -->', 'Nainital', '', 'inherit', 'closed', 'closed', '', '21-revision-v1', '', '', '2020-05-17 11:05:09', '2020-05-17 11:05:09', '', 21, 'http://restaurant.extrapowers.in/2020/05/17/21-revision-v1/', 0, 'revision', '', 0),
(24, 1, '2020-05-17 11:05:51', '2020-05-17 11:05:51', '<!-- wp:paragraph -->\n<p>Commonly known as the “Lake District of India”, Nainital is one of the most beautiful hill stations in North India. Surrounded by mountains on three sides Nainital is located around the beautiful lake Naini Tal. This lake resort is situated at a height of 1,938 meters. There are many legends associated with the place. According to one, Nainital has derived its name from the Goddess Naina while the other legend says that when the Goddess Sati lost her eyes, she was being carried by Lord Shiva and a lake was formed. (‘Naina’ means eyes and ‘Tal’ means lake.) This beautiful small town in surrounded by seven hills, popularly known as ‘Sapta-Shring’ – Ayarpata, Deopata, Handi-Bandi, Naina, Alma, Lariya-Kanta and Sher-Ka-Danda. The majestic mountains and the sparkling waters of the lake add an immense lot to the beauty of the town.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Commonly known as the “Lake District of India”, Nainital is one of the most beautiful hill stations in North India. Surrounded by mountains on three sides Nainital is located around the beautiful lake Naini Tal. This lake resort is situated at a height of 1,938 meters. There are many legends associated with the place. According to one, Nainital has derived its name from the Goddess Naina while the other legend says that when the Goddess Sati lost her eyes, she was being carried by Lord Shiva and a lake was formed. (‘Naina’ means eyes and ‘Tal’ means lake.) This beautiful small town in surrounded by seven hills, popularly known as ‘Sapta-Shring’ – Ayarpata, Deopata, Handi-Bandi, Naina, Alma, Lariya-Kanta and Sher-Ka-Danda. The majestic mountains and the sparkling waters of the lake add an immense lot to the beauty of the town.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nainital has an advantage of being situated in vicinity of several other lesser known hill stations that are connected through all season motorable roads.Vantage points around Nainital offer a panoramic view of Himalayan peaks on one side and the plains spread out on the other. Narrow wooded lanes through forests of oak, pine and deodar are excellent for short refreshing walks. The older parts of Nainital also retain colonial vestiges, including sprawling bungalows, public schools, churches and the old Christian cemetery.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>On reaching the head of the town where the highway from the plains meets the main Mall at Tallital, one gets a dramatic view of the beautiful Naini Lake that seems to be nestled in a remote cocoon. Brightly coloured sails of yachts dot the calm waters of the lake while crowds of holiday makers throng the Mall at its edge. Boating in the lake is just one of the favourite activities of the tourists. Others come here for trekking in the densely forested mountains that surround the town.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p></p>\n<!-- /wp:paragraph -->', 'Nainital', '', 'inherit', 'closed', 'closed', '', '21-revision-v1', '', '', '2020-05-17 11:05:51', '2020-05-17 11:05:51', '', 21, 'http://restaurant.extrapowers.in/2020/05/17/21-revision-v1/', 0, 'revision', '', 0),
(25, 1, '2020-05-17 11:40:27', '2020-05-17 11:40:27', '{\n    \"polite::polite_options[polite_enable_search]\": {\n        \"value\": true,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 11:40:22\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '087e6053-2775-477b-82f3-dc5c1b5db6f3', '', '', '2020-05-17 11:40:27', '2020-05-17 11:40:27', '', 0, 'http://restaurant.extrapowers.in/?p=25', 0, 'customize_changeset', '', 0),
(26, 1, '2020-05-17 11:40:37', '2020-05-17 11:40:37', '{\n    \"polite::polite_options[polite_enable_offcanvas]\": {\n        \"value\": true,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 11:40:37\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'b507e7e8-c28f-4e2b-88c4-b2d2ea840914', '', '', '2020-05-17 11:40:37', '2020-05-17 11:40:37', '', 0, 'http://restaurant.extrapowers.in/2020/05/17/b507e7e8-c28f-4e2b-88c4-b2d2ea840914/', 0, 'customize_changeset', '', 0),
(27, 1, '2020-05-17 11:41:39', '2020-05-17 11:41:39', '', 'Home', '', 'publish', 'closed', 'closed', '', 'home', '', '', '2020-05-17 11:51:33', '2020-05-17 11:51:33', '', 0, 'http://restaurant.extrapowers.in/?p=27', 1, 'nav_menu_item', '', 0),
(28, 1, '2020-05-17 11:41:39', '2020-05-17 11:41:39', ' ', '', '', 'publish', 'closed', 'closed', '', '28', '', '', '2020-05-17 11:51:33', '2020-05-17 11:51:33', '', 0, 'http://restaurant.extrapowers.in/?p=28', 3, 'nav_menu_item', '', 0),
(29, 1, '2020-05-17 11:41:39', '2020-05-17 11:41:39', '', 'Jammu & Kashmir', '', 'publish', 'closed', 'closed', '', 'jammu-kashmir', '', '', '2020-05-17 11:51:33', '2020-05-17 11:51:33', '', 0, 'http://restaurant.extrapowers.in/?p=29', 4, 'nav_menu_item', '', 0),
(30, 1, '2020-05-17 11:41:39', '2020-05-17 11:41:39', ' ', '', '', 'publish', 'closed', 'closed', '', '30', '', '', '2020-05-17 11:51:33', '2020-05-17 11:51:33', '', 0, 'http://restaurant.extrapowers.in/?p=30', 5, 'nav_menu_item', '', 0),
(31, 1, '2020-05-17 11:41:39', '2020-05-17 11:41:39', '{\n    \"polite::polite_options[polite-select-category]\": {\n        \"value\": \"3\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 11:41:39\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'ddef5643-08e2-4f09-95a0-7c86147ba9a0', '', '', '2020-05-17 11:41:39', '2020-05-17 11:41:39', '', 0, 'http://restaurant.extrapowers.in/2020/05/17/ddef5643-08e2-4f09-95a0-7c86147ba9a0/', 0, 'customize_changeset', '', 0),
(32, 1, '2020-05-17 11:42:19', '2020-05-17 11:42:19', '{\n    \"polite::polite_options[polite-promo-select-category]\": {\n        \"value\": \"3\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 11:42:19\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', '45718ef7-2788-4bd7-9be7-d7f2337783c3', '', '', '2020-05-17 11:42:19', '2020-05-17 11:42:19', '', 0, 'http://restaurant.extrapowers.in/2020/05/17/45718ef7-2788-4bd7-9be7-d7f2337783c3/', 0, 'customize_changeset', '', 0),
(33, 1, '2020-05-17 11:43:43', '2020-05-17 11:43:43', '{\n    \"polite::polite_options[polite-sidebar-blog-page]\": {\n        \"value\": \"right-sidebar\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 11:43:43\"\n    },\n    \"polite::polite_options[polite-blog-image-layout]\": {\n        \"value\": \"left-image\",\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 11:43:43\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'a17c286b-5398-4733-86dc-7f6bff2ca98a', '', '', '2020-05-17 11:43:43', '2020-05-17 11:43:43', '', 0, 'http://restaurant.extrapowers.in/2020/05/17/a17c286b-5398-4733-86dc-7f6bff2ca98a/', 0, 'customize_changeset', '', 0),
(36, 1, '2020-05-17 11:46:03', '2020-05-17 11:46:03', '{\n    \"polite::polite_options[polite-single-page-related-posts]\": {\n        \"value\": true,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 11:46:03\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'd00b7d93-c51b-4c8d-b92f-d69b87fb54ed', '', '', '2020-05-17 11:46:03', '2020-05-17 11:46:03', '', 0, 'http://restaurant.extrapowers.in/2020/05/17/d00b7d93-c51b-4c8d-b92f-d69b87fb54ed/', 0, 'customize_changeset', '', 0),
(37, 1, '2020-05-17 11:48:07', '2020-05-17 11:48:07', '<!-- wp:paragraph -->\n<p>Diverse in topography, the district of Pauri Garhwal varies from the foothills of the Tarai of Kotdwar to the soul-lifting meadows of Dhanaulti, sprawling at an altitude of 3,000 m, which remains snowbound during the winter months. Pauri Garhwal is surrounded by the districts of Chamoli, Nainital, Bijnor, Haridwar, Dehradun, Rudraprayag and Tehri Garhwal. Filled with places of tourist’s interest, most locations in Pauri offer a breathtaking view of the snow-laden Himalayan splendour.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Pauri City Is situated at an elevation of 1814 m above sea-level on the northern slopes of Kandoliya hills, Pauri is the headquarter of the district Pauri Garhwal and the Garhwal Division. Pauri provides a panoramic view of the snow clad Himalayan peaks of Bander Punchh, Swarga-Rohini, Jonli, Gangotri Group, Jogin Group, Thalaiya-Sagar, Kedarnath, Kharcha Kund, Sumeru, Satopanth, Chaukhamba, Neelkanth, Ghoriparvat, Hathiparvat, Nandadevi and Trisul.</p>\n<!-- /wp:paragraph -->', 'Pauri', '', 'publish', 'open', 'open', '', 'pauri', '', '', '2020-05-17 11:58:59', '2020-05-17 11:58:59', '', 0, 'http://restaurant.extrapowers.in/?p=37', 0, 'post', '', 0),
(38, 1, '2020-05-17 11:48:07', '2020-05-17 11:48:07', '<!-- wp:paragraph -->\n<p>Diverse in topography, the district of Pauri Garhwal varies from the foothills of the Tarai of Kotdwar to the soul-lifting meadows of Dhanaulti, sprawling at an altitude of 3,000 m, which remains snowbound during the winter months. Pauri Garhwal is surrounded by the districts of Chamoli, Nainital, Bijnor, Haridwar, Dehradun, Rudraprayag and Tehri Garhwal. Filled with places of tourist’s interest, most locations in Pauri offer a breathtaking view of the snow-laden Himalayan splendour.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Pauri City Is situated at an elevation of 1814 m above sea-level on the northern slopes of Kandoliya hills, Pauri is the headquarter of the district Pauri Garhwal and the Garhwal Division. Pauri provides a panoramic view of the snow clad Himalayan peaks of Bander Punchh, Swarga-Rohini, Jonli, Gangotri Group, Jogin Group, Thalaiya-Sagar, Kedarnath, Kharcha Kund, Sumeru, Satopanth, Chaukhamba, Neelkanth, Ghoriparvat, Hathiparvat, Nandadevi and Trisul.</p>\n<!-- /wp:paragraph -->', 'Pauri', '', 'inherit', 'closed', 'closed', '', '37-revision-v1', '', '', '2020-05-17 11:48:07', '2020-05-17 11:48:07', '', 37, 'http://restaurant.extrapowers.in/2020/05/17/37-revision-v1/', 0, 'revision', '', 0),
(39, 1, '2020-05-17 11:49:07', '2020-05-17 11:49:07', '{\n    \"polite::polite_options[polite-enable-sticky-sidebar]\": {\n        \"value\": true,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 11:49:07\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'bfa93d36-0d87-4189-ace7-0955cee84dbd', '', '', '2020-05-17 11:49:07', '2020-05-17 11:49:07', '', 0, 'http://restaurant.extrapowers.in/2020/05/17/bfa93d36-0d87-4189-ace7-0955cee84dbd/', 0, 'customize_changeset', '', 0),
(40, 1, '2020-05-17 11:49:40', '2020-05-17 11:49:40', '{\n    \"polite::polite_options[polite_enable_promo]\": {\n        \"value\": false,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 11:49:40\"\n    }\n}', '', '', 'trash', 'closed', 'closed', '', 'c14946a2-fbcb-4200-8d5f-d3d7e238040f', '', '', '2020-05-17 11:49:40', '2020-05-17 11:49:40', '', 0, 'http://restaurant.extrapowers.in/2020/05/17/c14946a2-fbcb-4200-8d5f-d3d7e238040f/', 0, 'customize_changeset', '', 0),
(41, 1, '2020-05-17 11:53:57', '0000-00-00 00:00:00', '', 'Auto Draft', '', 'auto-draft', 'open', 'open', '', '', '', '', '2020-05-17 11:53:57', '0000-00-00 00:00:00', '', 0, 'http://restaurant.extrapowers.in/?p=41', 0, 'post', '', 0),
(42, 1, '2020-05-17 11:58:48', '2020-05-17 11:58:48', '<!-- wp:paragraph -->\n<p>Mussoorie is a hill station and a municipal board in the Dehradun District of the Indian state of Uttarakhand. It is about 35 kilometres from the state capital of Dehradun and 290 km north of the national capital of New Delhi. The hill station is in the foothills of the Garhwal Himalayan range. The adjoining town of Landour, which includes a military cantonment, is considered part of \'greater Mussoorie\', as are the townships of Barlowganj and Jharipani. The pin code for Mussoorie is 248179. Mussoorie is at an average altitude of 2,005 metres. To the northeast are the Himalayan snow ranges, and to the south, the Doon Valley and Shiwalik ranges. The second highest point is the original Lal Tibba in Landour, with a height of over 2,275 metres. Mussoorie is popularly known as The Queen of the Hills.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:gallery {\"ids\":[45]} -->\n<figure class=\"wp-block-gallery columns-1 is-cropped\"><ul class=\"blocks-gallery-grid\"><li class=\"blocks-gallery-item\"><figure><img src=\"http://restaurant.extrapowers.in/wp-content/uploads/2020/05/timthumb.jpeg\" alt=\"\" data-id=\"45\" data-full-url=\"http://restaurant.extrapowers.in/wp-content/uploads/2020/05/timthumb.jpeg\" data-link=\"http://restaurant.extrapowers.in/2020/05/17/mussoorie/timthumb/\" class=\"wp-image-45\"/></figure></li></ul></figure>\n<!-- /wp:gallery -->', 'Mussoorie', '', 'publish', 'open', 'open', '', 'mussoorie', '', '', '2020-05-17 12:03:08', '2020-05-17 12:03:08', '', 0, 'http://restaurant.extrapowers.in/?p=42', 0, 'post', '', 0),
(43, 1, '2020-05-17 11:55:20', '2020-05-17 11:55:20', '', 'e19419ebe1f505dfc8bc492502c57eb7', '', 'inherit', 'open', 'closed', '', 'e19419ebe1f505dfc8bc492502c57eb7', '', '', '2020-05-17 11:55:20', '2020-05-17 11:55:20', '', 37, 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/e19419ebe1f505dfc8bc492502c57eb7.jpg', 0, 'attachment', 'image/jpeg', 0),
(44, 1, '2020-05-17 11:58:48', '2020-05-17 11:58:48', '<!-- wp:paragraph -->\n<p>Mussoorie is a hill station and a municipal board in the Dehradun District of the Indian state of Uttarakhand. It is about 35 kilometres from the state capital of Dehradun and 290 km north of the national capital of New Delhi. The hill station is in the foothills of the Garhwal Himalayan range. The adjoining town of Landour, which includes a military cantonment, is considered part of \'greater Mussoorie\', as are the townships of Barlowganj and Jharipani. The pin code for Mussoorie is 248179. Mussoorie is at an average altitude of 2,005 metres. To the northeast are the Himalayan snow ranges, and to the south, the Doon Valley and Shiwalik ranges. The second highest point is the original Lal Tibba in Landour, with a height of over 2,275 metres. Mussoorie is popularly known as The Queen of the Hills.</p>\n<!-- /wp:paragraph -->', 'Mussoorie', '', 'inherit', 'closed', 'closed', '', '42-revision-v1', '', '', '2020-05-17 11:58:48', '2020-05-17 11:58:48', '', 42, 'http://restaurant.extrapowers.in/2020/05/17/42-revision-v1/', 0, 'revision', '', 0),
(45, 1, '2020-05-17 12:01:01', '2020-05-17 12:01:01', '', 'timthumb', '', 'inherit', 'open', 'closed', '', 'timthumb', '', '', '2020-05-17 12:01:01', '2020-05-17 12:01:01', '', 42, 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/timthumb.jpeg', 0, 'attachment', 'image/jpeg', 0),
(46, 1, '2020-05-17 12:02:18', '2020-05-17 12:02:18', '', 'fROFGjW_MASOORI_790', '', 'inherit', 'open', 'closed', '', 'frofgjw_masoori_790', '', '', '2020-05-17 12:02:18', '2020-05-17 12:02:18', '', 42, 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/fROFGjW_MASOORI_790.jpg', 0, 'attachment', 'image/jpeg', 0),
(47, 1, '2020-05-17 12:03:08', '2020-05-17 12:03:08', '<!-- wp:paragraph -->\n<p>Mussoorie is a hill station and a municipal board in the Dehradun District of the Indian state of Uttarakhand. It is about 35 kilometres from the state capital of Dehradun and 290 km north of the national capital of New Delhi. The hill station is in the foothills of the Garhwal Himalayan range. The adjoining town of Landour, which includes a military cantonment, is considered part of \'greater Mussoorie\', as are the townships of Barlowganj and Jharipani. The pin code for Mussoorie is 248179. Mussoorie is at an average altitude of 2,005 metres. To the northeast are the Himalayan snow ranges, and to the south, the Doon Valley and Shiwalik ranges. The second highest point is the original Lal Tibba in Landour, with a height of over 2,275 metres. Mussoorie is popularly known as The Queen of the Hills.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:gallery {\"ids\":[45]} -->\n<figure class=\"wp-block-gallery columns-1 is-cropped\"><ul class=\"blocks-gallery-grid\"><li class=\"blocks-gallery-item\"><figure><img src=\"http://restaurant.extrapowers.in/wp-content/uploads/2020/05/timthumb.jpeg\" alt=\"\" data-id=\"45\" data-full-url=\"http://restaurant.extrapowers.in/wp-content/uploads/2020/05/timthumb.jpeg\" data-link=\"http://restaurant.extrapowers.in/2020/05/17/mussoorie/timthumb/\" class=\"wp-image-45\"/></figure></li></ul></figure>\n<!-- /wp:gallery -->', 'Mussoorie', '', 'inherit', 'closed', 'closed', '', '42-revision-v1', '', '', '2020-05-17 12:03:08', '2020-05-17 12:03:08', '', 42, 'http://restaurant.extrapowers.in/2020/05/17/42-revision-v1/', 0, 'revision', '', 0),
(48, 1, '2020-05-17 12:07:09', '2020-05-17 12:07:09', '<!-- wp:paragraph -->\n<p>Chamoli, the abode of Gods, reputed for its shrines and temples, birth place of ‘Chipko Movement ‘ with its strategic significance is one of the hill districts of Uttarakhand. Chamoli has proved itself to be the most spectacular in its natural assets; be it maintaining the scenery, valley aspects, water edges, floristic varieties, dramatic landform or the climatic cardinalities.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":5} -->\n<h5>Geography of Chamoli</h5>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Chamoli, carved as a seperate revenue district in 1960 out of the erstwhile Garhwal district, lies in the Central Himalayan region and constitutes a part of the celebrated ‘Kedar Kshetra’. The District Chamoli is surrounded by Uttarkashi in the North-West, Pithoragarh in South-West,Almora in South East,Rudraprayag in South-West and Tehri Grahwal in West. The geographical area of the District is around 7520 sq.kms.</p>\n<!-- /wp:paragraph -->', 'Chamoli', '', 'publish', 'open', 'open', '', 'chamoli', '', '', '2020-05-17 12:08:12', '2020-05-17 12:08:12', '', 0, 'http://restaurant.extrapowers.in/?p=48', 0, 'post', '', 0),
(49, 1, '2020-05-17 12:16:42', '2020-05-17 12:16:42', '<!-- wp:paragraph -->\n<p>Swathed by cedar, rhododendron, fir and Himalayan oak trees, the state capital of Himachal Pradesh is one of the most popular hill stations of India. Basking in the grandeur of the British era with apparent influences in its architecture, Shimla did charm the British colonisers of the 19th century so much that they elevated the small township into the summer capital of an empire sprawling the sub-continent.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>In its heyday Shimla attracted princes, merchants, diplomats and political leaders from Afghanistan, Tibet, China, Myanmar and other countries. Several heritage buildings in the city are witness to historical moments that have shaped the history of south Asia.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><br>Leaders of the freedom movement led by Mahatma Gandhi, Pandit Nehru, Sardar Patel, Maulana Azad, C. Rajagopalachari and others frequently visited Shimla in their struggle to gain independence from British rule. Hard contested deliberations over the partition of India and Pakistan at Viceregal Lodge, now the Indian Institute of Advanced Studies, between the resident Viceroy and leaders of the freedom struggle finally won the country its Independence on 15th August, 1947.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>An engineering marvel, the Kalka-Shimla railway line with 102 tunnels constructed between 1898 to 1903 has been recognised by UNESCO as World Heritage mountain railway site. The Ridge and The Mall are still popular landmarks just as they were in the pre-Independence era. The imperial Viceregal Lodge, the graceful Christ Church, Gaiety Theatre, Gorton Castle, Barnes Court and several buildings are part of the colonial architectural heritage of the town.</p>\n<!-- /wp:paragraph -->', 'Shimla', '', 'publish', 'open', 'open', '', 'shimla', '', '', '2020-05-17 12:16:42', '2020-05-17 12:16:42', '', 0, 'http://restaurant.extrapowers.in/?p=49', 0, 'post', '', 0),
(50, 1, '2020-05-17 12:05:22', '2020-05-17 12:05:22', '', '-28872_8649', '', 'inherit', 'open', 'closed', '', '28872_8649', '', '', '2020-05-17 12:05:22', '2020-05-17 12:05:22', '', 48, 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/28872_8649.jpg', 0, 'attachment', 'image/jpeg', 0),
(51, 1, '2020-05-17 12:05:26', '2020-05-17 12:05:26', '', 'hemkunt-sahib', '', 'inherit', 'open', 'closed', '', 'hemkunt-sahib', '', '', '2020-05-17 12:05:26', '2020-05-17 12:05:26', '', 48, 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/hemkunt-sahib.jpg', 0, 'attachment', 'image/jpeg', 0),
(52, 1, '2020-05-17 12:07:09', '2020-05-17 12:07:09', '', 'Chamoli', '', 'inherit', 'closed', 'closed', '', '48-revision-v1', '', '', '2020-05-17 12:07:09', '2020-05-17 12:07:09', '', 48, 'http://restaurant.extrapowers.in/2020/05/17/48-revision-v1/', 0, 'revision', '', 0),
(53, 1, '2020-05-17 12:08:12', '2020-05-17 12:08:12', '<!-- wp:paragraph -->\n<p>Chamoli, the abode of Gods, reputed for its shrines and temples, birth place of ‘Chipko Movement ‘ with its strategic significance is one of the hill districts of Uttarakhand. Chamoli has proved itself to be the most spectacular in its natural assets; be it maintaining the scenery, valley aspects, water edges, floristic varieties, dramatic landform or the climatic cardinalities.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":5} -->\n<h5>Geography of Chamoli</h5>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Chamoli, carved as a seperate revenue district in 1960 out of the erstwhile Garhwal district, lies in the Central Himalayan region and constitutes a part of the celebrated ‘Kedar Kshetra’. The District Chamoli is surrounded by Uttarkashi in the North-West, Pithoragarh in South-West,Almora in South East,Rudraprayag in South-West and Tehri Grahwal in West. The geographical area of the District is around 7520 sq.kms.</p>\n<!-- /wp:paragraph -->', 'Chamoli', '', 'inherit', 'closed', 'closed', '', '48-revision-v1', '', '', '2020-05-17 12:08:12', '2020-05-17 12:08:12', '', 48, 'http://restaurant.extrapowers.in/2020/05/17/48-revision-v1/', 0, 'revision', '', 0),
(54, 1, '2020-05-17 12:12:27', '2020-05-17 12:12:27', '<!-- wp:paragraph -->\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n<!-- /wp:paragraph -->', 'Hello world!', '', 'inherit', 'closed', 'closed', '', '1-revision-v1', '', '', '2020-05-17 12:12:27', '2020-05-17 12:12:27', '', 1, 'http://restaurant.extrapowers.in/2020/05/17/1-revision-v1/', 0, 'revision', '', 0),
(55, 1, '2020-05-17 12:14:51', '2020-05-17 12:14:51', '', '2016_55580b56239800ashimla-qpr', '', 'inherit', 'open', 'closed', '', '2016_55580b56239800ashimla-qpr', '', '', '2020-05-17 12:14:51', '2020-05-17 12:14:51', '', 49, 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/2016_55580b56239800ashimla-qpr.jpg', 0, 'attachment', 'image/jpeg', 0),
(56, 1, '2020-05-17 12:20:14', '2020-05-17 12:20:14', '<!-- wp:paragraph -->\n<p>Lying on the banks of River Jhelum with deep and mesmerizing valleys cascaded in sky scraping mountains and evergreen beauty, Srinagar blends together the tints of nature, beauty, harmony and romance.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>With deep and mesmerising valleys cascaded in sky-scraping mountains and evergreen beauty, this heaven on Earth leaves you absolutely mesmerised. Right from Chashm-E-Shahi to the exotic Shalimar garden, Srinagar offers bountiful of places to visit. Surrounded by mountains for the adventurous lot to lakes for photoholics to shopping markets for the spendthrifts, Srinagar does not disappoint anyone.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>The snow clad peaks in the Himalaya and the undulated hilly mountainous regions are perfectly suitable for all types of trekking expeditions. Sonamarg is the base camp for many trekking expeditions. The major treks passing through various mountain lakes such as Gangabal, Vishansar, Gadsar, Satsar and Kishansar has its base at Sonamarg.</p>\n<!-- /wp:paragraph -->', 'Srinagar', '', 'publish', 'open', 'open', '', 'srinagar', '', '', '2020-05-17 12:20:14', '2020-05-17 12:20:14', '', 0, 'http://restaurant.extrapowers.in/?p=56', 0, 'post', '', 0),
(57, 1, '2020-05-17 12:16:25', '2020-05-17 12:16:25', '', 'Shimla-in-Winter', '', 'inherit', 'open', 'closed', '', 'shimla-in-winter', '', '', '2020-05-17 12:16:25', '2020-05-17 12:16:25', '', 49, 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/Shimla-in-Winter.png', 0, 'attachment', 'image/png', 0);
INSERT INTO `rest_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(58, 1, '2020-05-17 12:16:42', '2020-05-17 12:16:42', '<!-- wp:paragraph -->\n<p>Swathed by cedar, rhododendron, fir and Himalayan oak trees, the state capital of Himachal Pradesh is one of the most popular hill stations of India. Basking in the grandeur of the British era with apparent influences in its architecture, Shimla did charm the British colonisers of the 19th century so much that they elevated the small township into the summer capital of an empire sprawling the sub-continent.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>In its heyday Shimla attracted princes, merchants, diplomats and political leaders from Afghanistan, Tibet, China, Myanmar and other countries. Several heritage buildings in the city are witness to historical moments that have shaped the history of south Asia.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><br>Leaders of the freedom movement led by Mahatma Gandhi, Pandit Nehru, Sardar Patel, Maulana Azad, C. Rajagopalachari and others frequently visited Shimla in their struggle to gain independence from British rule. Hard contested deliberations over the partition of India and Pakistan at Viceregal Lodge, now the Indian Institute of Advanced Studies, between the resident Viceroy and leaders of the freedom struggle finally won the country its Independence on 15th August, 1947.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>An engineering marvel, the Kalka-Shimla railway line with 102 tunnels constructed between 1898 to 1903 has been recognised by UNESCO as World Heritage mountain railway site. The Ridge and The Mall are still popular landmarks just as they were in the pre-Independence era. The imperial Viceregal Lodge, the graceful Christ Church, Gaiety Theatre, Gorton Castle, Barnes Court and several buildings are part of the colonial architectural heritage of the town.</p>\n<!-- /wp:paragraph -->', 'Shimla', '', 'inherit', 'closed', 'closed', '', '49-revision-v1', '', '', '2020-05-17 12:16:42', '2020-05-17 12:16:42', '', 49, 'http://restaurant.extrapowers.in/2020/05/17/49-revision-v1/', 0, 'revision', '', 0),
(59, 1, '2020-05-17 12:21:51', '2020-05-17 12:21:51', '<!-- wp:paragraph -->\n<p>A gift of the Himalayas to the world, Manali is a beautiful township nestled in the picturesque Beas River valley. It is a rustic enclave known for its cool climate and snow-capped mountains, offering respite to tourists escaping scorching heat of the plains. The tourism industry in Manali started booming only in the early 20th century, mainly because of its natural bounties and salubrious climate.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Once a sleepy village, the modern town cocooned in its rich cultural heritage and age-old traditions is now one of the most popular destinations of India. The place is a classic blend of peace and tranquility which makes it a haven for nature lovers and adventure enthusiasts, who want to get off the main tourist trails and experience nature up close.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>The glacial water of River Beas after rushing down the slopes of Rohtang Pass allows adventure sport activities of rowing, white water rafting and river crossing as it meanders through the valley from Manali to Kullu.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>The glacial water of River Beas after rushing down the slopes of Rohtang Pass allows adventure sport activities of rowing, white water rafting and river crossing as it meanders through the valley from Manali to Kullu.</p>\n<!-- /wp:paragraph -->', 'Manali', '', 'publish', 'open', 'open', '', 'manali', '', '', '2020-05-17 12:22:10', '2020-05-17 12:22:10', '', 0, 'http://restaurant.extrapowers.in/?p=59', 0, 'post', '', 0),
(60, 1, '2020-05-17 12:18:04', '2020-05-17 12:18:04', '', 'shareiq_1334473534.145534', '', 'inherit', 'open', 'closed', '', 'shareiq_1334473534-145534', '', '', '2020-05-17 12:18:04', '2020-05-17 12:18:04', '', 56, 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/shareiq_1334473534.145534.jpg', 0, 'attachment', 'image/jpeg', 0),
(61, 1, '2020-05-17 12:20:10', '2020-05-17 12:20:10', '', 'manali-river-beas', '', 'inherit', 'open', 'closed', '', 'manali-river-beas', '', '', '2020-05-17 12:20:10', '2020-05-17 12:20:10', '', 59, 'http://restaurant.extrapowers.in/wp-content/uploads/2020/05/manali-river-beas.jpg', 0, 'attachment', 'image/jpeg', 0),
(62, 1, '2020-05-17 12:20:14', '2020-05-17 12:20:14', '<!-- wp:paragraph -->\n<p>Lying on the banks of River Jhelum with deep and mesmerizing valleys cascaded in sky scraping mountains and evergreen beauty, Srinagar blends together the tints of nature, beauty, harmony and romance.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>With deep and mesmerising valleys cascaded in sky-scraping mountains and evergreen beauty, this heaven on Earth leaves you absolutely mesmerised. Right from Chashm-E-Shahi to the exotic Shalimar garden, Srinagar offers bountiful of places to visit. Surrounded by mountains for the adventurous lot to lakes for photoholics to shopping markets for the spendthrifts, Srinagar does not disappoint anyone.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>The snow clad peaks in the Himalaya and the undulated hilly mountainous regions are perfectly suitable for all types of trekking expeditions. Sonamarg is the base camp for many trekking expeditions. The major treks passing through various mountain lakes such as Gangabal, Vishansar, Gadsar, Satsar and Kishansar has its base at Sonamarg.</p>\n<!-- /wp:paragraph -->', 'Srinagar', '', 'inherit', 'closed', 'closed', '', '56-revision-v1', '', '', '2020-05-17 12:20:14', '2020-05-17 12:20:14', '', 56, 'http://restaurant.extrapowers.in/2020/05/17/56-revision-v1/', 0, 'revision', '', 0),
(63, 1, '2020-05-17 12:21:51', '2020-05-17 12:21:51', '<!-- wp:paragraph -->\n<p>A gift of the Himalayas to the world, Manali is a beautiful township nestled in the picturesque Beas River valley. It is a rustic enclave known for its cool climate and snow-capped mountains, offering respite to tourists escaping scorching heat of the plains. The tourism industry in Manali started booming only in the early 20th century, mainly because of its natural bounties and salubrious climate.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Once a sleepy village, the modern town cocooned in its rich cultural heritage and age-old traditions is now one of the most popular destinations of India. The place is a classic blend of peace and tranquility which makes it a haven for nature lovers and adventure enthusiasts, who want to get off the main tourist trails and experience nature up close.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>The glacial water of River Beas after rushing down the slopes of Rohtang Pass allows adventure sport activities of rowing, white water rafting and river crossing as it meanders through the valley from Manali to Kullu.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>The glacial water of River Beas after rushing down the slopes of Rohtang Pass allows adventure sport activities of rowing, white water rafting and river crossing as it meanders through the valley from Manali to Kullu.</p>\n<!-- /wp:paragraph -->', 'Manali', '', 'inherit', 'closed', 'closed', '', '59-revision-v1', '', '', '2020-05-17 12:21:51', '2020-05-17 12:21:51', '', 59, 'http://restaurant.extrapowers.in/2020/05/17/59-revision-v1/', 0, 'revision', '', 0),
(64, 1, '2020-05-17 12:25:18', '0000-00-00 00:00:00', '{\n    \"polite::nav_menu_locations[social]\": {\n        \"value\": -5238668351695649000,\n        \"type\": \"theme_mod\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 12:25:18\"\n    },\n    \"nav_menu[-5238668351695649000]\": {\n        \"value\": {\n            \"name\": \"Social Menu\",\n            \"description\": \"\",\n            \"parent\": 0,\n            \"auto_add\": false\n        },\n        \"type\": \"nav_menu\",\n        \"user_id\": 1,\n        \"date_modified_gmt\": \"2020-05-17 12:25:18\"\n    }\n}', '', '', 'auto-draft', 'closed', 'closed', '', 'c1e41cf0-a634-4ca6-a85d-53eb6029feb2', '', '', '2020-05-17 12:25:18', '0000-00-00 00:00:00', '', 0, 'http://restaurant.extrapowers.in/?p=64', 0, 'customize_changeset', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rest_termmeta`
--

CREATE TABLE `rest_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rest_terms`
--

CREATE TABLE `rest_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rest_terms`
--

INSERT INTO `rest_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Uncategorized', 'uncategorized', 0),
(2, 'Main Menu', 'main-menu', 0),
(3, 'Uttrakhand', 'uttrakhand', 0),
(4, 'Himachal Pradesh', 'himachal-pradesh', 0),
(5, 'Jammu &amp; Kashmir', 'jammu-kashmir', 0),
(6, 'Karnataka', 'karnataka', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rest_term_relationships`
--

CREATE TABLE `rest_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rest_term_relationships`
--

INSERT INTO `rest_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(13, 2, 0),
(27, 2, 0),
(21, 3, 0),
(28, 2, 0),
(29, 2, 0),
(30, 2, 0),
(37, 3, 0),
(42, 3, 0),
(48, 3, 0),
(49, 4, 0),
(56, 5, 0),
(59, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rest_term_taxonomy`
--

CREATE TABLE `rest_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rest_term_taxonomy`
--

INSERT INTO `rest_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 0),
(2, 2, 'nav_menu', '', 0, 5),
(3, 3, 'category', '', 0, 4),
(4, 4, 'category', '', 0, 2),
(5, 5, 'category', '', 0, 1),
(6, 6, 'category', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rest_usermeta`
--

CREATE TABLE `rest_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rest_usermeta`
--

INSERT INTO `rest_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'admin'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'rest_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'rest_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', 'theme_editor_notice'),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:1:{s:64:\"ef5837b108cdb8bab4c1771be423fcbada7ae8622fbe02edc8e4f586510e31df\";a:4:{s:10:\"expiration\";i:1590899970;s:2:\"ip\";s:10:\"47.9.95.66\";s:2:\"ua\";s:105:\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36\";s:5:\"login\";i:1589690370;}}'),
(17, 1, 'rest_dashboard_quick_press_last_post_id', '4'),
(18, 1, 'community-events-location', 'a:1:{s:2:\"ip\";s:9:\"47.9.95.0\";}'),
(19, 1, 'managenav-menuscolumnshidden', 'a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),
(20, 1, 'metaboxhidden_nav-menus', 'a:10:{i:0;s:20:\"add-post-type-series\";i:1;s:19:\"add-post-type-comic\";i:2;s:12:\"add-post_tag\";i:3;s:10:\"add-genres\";i:4;s:15:\"add-series_tags\";i:5;s:15:\"add-collections\";i:6;s:12:\"add-chapters\";i:7;s:14:\"add-comic_tags\";i:8;s:19:\"add-comic_locations\";i:9;s:20:\"add-comic_characters\";}'),
(21, 1, 'rest_user-settings', 'libraryContent=browse'),
(22, 1, 'rest_user-settings-time', '1589713290'),
(23, 1, 'nav_menu_recently_edited', '2');

-- --------------------------------------------------------

--
-- Table structure for table `rest_users`
--

CREATE TABLE `rest_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rest_users`
--

INSERT INTO `rest_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', '$P$BkYGNXcOFwCyi2nsLwPE0sfJwTcl3x/', 'admin', 'shreya.infotrench@gmail.com', 'http://restaurant.extrapowers.in', '2020-05-17 04:39:12', '', 0, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rest_commentmeta`
--
ALTER TABLE `rest_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `rest_comments`
--
ALTER TABLE `rest_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `rest_links`
--
ALTER TABLE `rest_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `rest_options`
--
ALTER TABLE `rest_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`),
  ADD KEY `autoload` (`autoload`);

--
-- Indexes for table `rest_postmeta`
--
ALTER TABLE `rest_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `rest_posts`
--
ALTER TABLE `rest_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `rest_termmeta`
--
ALTER TABLE `rest_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `rest_terms`
--
ALTER TABLE `rest_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `rest_term_relationships`
--
ALTER TABLE `rest_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `rest_term_taxonomy`
--
ALTER TABLE `rest_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `rest_usermeta`
--
ALTER TABLE `rest_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `rest_users`
--
ALTER TABLE `rest_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rest_commentmeta`
--
ALTER TABLE `rest_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rest_comments`
--
ALTER TABLE `rest_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rest_links`
--
ALTER TABLE `rest_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rest_options`
--
ALTER TABLE `rest_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `rest_postmeta`
--
ALTER TABLE `rest_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `rest_posts`
--
ALTER TABLE `rest_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `rest_termmeta`
--
ALTER TABLE `rest_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rest_terms`
--
ALTER TABLE `rest_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rest_term_taxonomy`
--
ALTER TABLE `rest_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rest_usermeta`
--
ALTER TABLE `rest_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rest_users`
--
ALTER TABLE `rest_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

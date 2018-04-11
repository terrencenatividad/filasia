-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2017 at 06:14 PM
-- Server version: 5.6.35-1+deb.sury.org~xenial+0.1
-- PHP Version: 5.6.31-4+ubuntu16.04.1+deb.sury.org+4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filipinas`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companycode` varchar(15) NOT NULL,
  `companyname` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contactname` char(45) DEFAULT NULL,
  `contactrole` char(25) DEFAULT NULL,
  `address` longtext,
  `businesstype` varchar(50) DEFAULT NULL,
  `businessline` char(30) DEFAULT NULL,
  `accountingyear` char(20) DEFAULT NULL,
  `currencycode` varchar(10) DEFAULT NULL,
  `postalcode` char(4) DEFAULT NULL,
  `tin` char(15) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `fax` char(15) DEFAULT NULL,
  `mobile` char(15) DEFAULT NULL,
  `billingemail` varchar(50) DEFAULT NULL,
  `stat` enum('active','inactive') DEFAULT 'active',
  `companyimage` varchar(100) DEFAULT NULL,
  `enteredby` varchar(20) DEFAULT NULL,
  `entereddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(20) DEFAULT NULL,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateprogram` varchar(100) DEFAULT NULL,
  `rdo_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companycode`, `companyname`, `email`, `contactname`, `contactrole`, `address`, `businesstype`, `businessline`, `accountingyear`, `currencycode`, `postalcode`, `tin`, `phone`, `fax`, `mobile`, `billingemail`, `stat`, `companyimage`, `enteredby`, `entereddate`, `updateby`, `updatedate`, `updateprogram`, `rdo_code`) VALUES
('CID', 'Cid Systems Solution Services', 'lumeng.lim@cid-systems.com', 'Lumeng Lim', 'Manager', 'U1410 Cityland Herrera Tower, 98 V. A. Rufino ST. Cor. Valero St. Salcedo Village, Makati City, Philippines', 'Computer Software /', '', 'calendar', 'PHP', '1700', '123-456-789-000', '+63 (2) 753.18.', '+63 (2) 751.08.', '091234567890', 'lumeng.lim@cid-systems.com', 'active', '9421222559.png', 'admin', '2017-08-30 06:41:37', 'cid_mark', '2017-08-30 06:41:37', 'Company|mod_view', '105');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `companycode` varchar(25) NOT NULL,
  `email` varchar(250) NOT NULL,
  `number` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `enteredby` varchar(25) NOT NULL,
  `entereddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateby` varchar(25) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateprogram` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `companycode`, `email`, `number`, `subject`, `message`, `enteredby`, `entereddate`, `updateby`, `updatedate`, `updateprogram`) VALUES
(1, 'CID', 'natividadter@gmail.com', '09178431790', 'Hello', 'Head ups', '', '2017-10-23 08:36:07', '', '0000-00-00 00:00:00', ''),
(3, 'CID', 'terski.nati@gmail.com', '09276651790', 'hello', 'hii', '', '2017-10-23 08:38:47', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `companycode` varchar(25) NOT NULL,
  `mission_content` varchar(10000) NOT NULL,
  `vision_content` varchar(10000) NOT NULL,
  `commitment_content` varchar(10000) NOT NULL,
  `tech_content` varchar(10000) NOT NULL,
  `enteredby` varchar(25) NOT NULL,
  `entereddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateby` varchar(25) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateprogram` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `companycode`, `mission_content`, `vision_content`, `commitment_content`, `tech_content`, `enteredby`, `entereddate`, `updateby`, `updatedate`, `updateprogram`) VALUES
(1, 'CID', 'To provide high quality and world class products to our valued clients. We also aim to support our country\'s economy by providing jobs to those in need.', 'FILIPINAS ASIA SHUTTER DOOR CORP will lead the way in manufacturing, discribution, and installation of high quality steel and polycarbonate roll-up shutter doors, metal flush doors & metal louvers for Filipino homes and businesses.', 'We are committed to deliver world-class products, solely using high quality materials and the latest technology while considering the safety of the consumer and the environment. We will continue to employ and develop competent, experienced, and skilled personnel to assure our clients that all products are made and installed perfectly according to standards.', 'We at FILIPINAS ASIA SHUTTER DOOR CORP only use proven, time-tested, and the latest manufacturing technologies. Our manufacturing processes go through rigid checks to ensure that quality is delivered.', 'terens', '2017-09-26 02:04:07', 'terens', '2017-10-19 08:03:08', 'Contents|mod_edit');

-- --------------------------------------------------------

--
-- Table structure for table `highlights`
--

CREATE TABLE `highlights` (
  `id` int(11) NOT NULL,
  `companycode` varchar(20) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `enteredby` varchar(20) DEFAULT NULL,
  `entereddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(20) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateprogram` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `highlights`
--

INSERT INTO `highlights` (`id`, `companycode`, `image`, `title`, `content`, `enteredby`, `entereddate`, `updateby`, `updatedate`, `updateprogram`) VALUES
(1, 'CID', '5fb3047.jpg', 'Philippine Arena', 'Philippine arena made by the INC', 'terens', '2017-10-22 03:36:42', '', '0000-00-00 00:00:00', 'Highlights|mod_add'),
(2, 'CID', 'e0a751d.jpg', 'Youtube', 'Youtube Highlights by Google', 'terens', '2017-10-22 03:38:05', '', '0000-00-00 00:00:00', 'Highlights|mod_add'),
(3, 'CID', '4921a20.jpg', 'Facebook', 'Facebook Highlights', 'terens', '2017-10-22 03:38:23', '', '0000-00-00 00:00:00', 'Highlights|mod_add');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `companycode` varchar(25) NOT NULL,
  `image` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `price` int(100) NOT NULL,
  `enteredby` varchar(25) NOT NULL,
  `entereddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateby` varchar(25) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateprogram` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `companycode`, `image`, `name`, `description`, `price`, `enteredby`, `entereddate`, `updateby`, `updatedate`, `updateprogram`) VALUES
(1, 'CID', '513fb51.jpg', 'Door', 'Door so durable, it keeps you inside your home for a month', 190033, 'terens', '2017-10-20 04:05:29', 'terens', '2017-10-20 07:58:39', 'Product|mod_edit'),
(2, 'CID', 'ce34ad6.jpg', 'Window Glass', 'Window, unbreakable. Unlike your ex.', 1000, 'terens', '2017-10-20 07:14:20', 'terens', '2017-10-23 01:59:56', 'Product|mod_edit'),
(3, 'CID', '1d57ead.jpg', 'Bulletproof Door', 'b', 25000, 'terens', '2017-10-23 02:08:31', '', '0000-00-00 00:00:00', 'Product|mod_add'),
(4, 'CID', '3cff316.png', 'Bulletproof Door', 'Bulletproof nothing to lose', 25000, 'terens', '2017-10-23 02:10:09', '', '0000-00-00 00:00:00', 'Product|mod_add');

-- --------------------------------------------------------

--
-- Table structure for table `projects_and_clients`
--

CREATE TABLE `projects_and_clients` (
  `id` int(11) NOT NULL,
  `companycode` varchar(15) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `enteredby` varchar(20) DEFAULT NULL,
  `entereddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updateby` varchar(20) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateprogram` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_and_clients`
--

INSERT INTO `projects_and_clients` (`id`, `companycode`, `image`, `title`, `content`, `enteredby`, `entereddate`, `updateby`, `updatedate`, `updateprogram`) VALUES
(1, 'CID', 'b87101c.jpg', 'SM Aura', 'SM Aura sa Taguig City', 'terens', '2017-10-22 08:06:18', '', '0000-00-00 00:00:00', 'Projects|mod_add'),
(3, 'CID', 'd94d470.jpg', 'Youtube', 'One of the best clients', 'terens', '2017-10-22 08:56:06', '', '0000-00-00 00:00:00', 'Projects|mod_add'),
(4, 'CID', '1fc5ee7.jpg', 'Facebook', 'Facebook created by Mark Zuckerberg', 'terens', '2017-10-22 11:33:27', '', '0000-00-00 00:00:00', 'Projects|mod_add');

-- --------------------------------------------------------

--
-- Table structure for table `wc_admin_logs`
--

CREATE TABLE `wc_admin_logs` (
  `wc_admin_logsid` bigint(255) NOT NULL,
  `companycode` varchar(15) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `timestamps` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `activitydone` mediumtext,
  `ip_address` varchar(255) DEFAULT NULL,
  `browser` varchar(255) DEFAULT NULL,
  `module` char(40) NOT NULL,
  `task` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wc_admin_logs`
--

INSERT INTO `wc_admin_logs` (`wc_admin_logsid`, `companycode`, `username`, `timestamps`, `activitydone`, `ip_address`, `browser`, `module`, `task`) VALUES
(79, 'CID', 'superadmin', '2017-10-19 05:35:55', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(80, 'CID', 'superadmin', '2017-10-19 05:36:19', 'Update User [superadmin]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Users', 'mod_edit'),
(81, 'CID', 'terens', '2017-10-19 05:36:22', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(82, 'CID', 'terens', '2017-10-19 05:47:37', 'Update User Group [superadmin]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Users Group', 'mod_edit'),
(83, 'CID', 'terens', '2017-10-19 05:57:15', 'Update User Group [superadmin]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Users Group', 'mod_edit'),
(84, 'CID', 'terens', '2017-10-19 08:02:58', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(85, 'CID', 'terens', '2017-10-19 08:03:08', 'Update News [1]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Contents', 'mod_edit'),
(86, 'CID', 'terens', '2017-10-19 09:49:46', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(87, 'CID', 'terens', '2017-10-19 09:56:39', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(88, 'CID', 'terens', '2017-10-19 09:56:43', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(89, 'CID', 'terens', '2017-10-19 09:58:01', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(90, 'CID', 'terens', '2017-10-19 09:58:28', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(91, 'CID', 'terens', '2017-10-19 09:59:27', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(92, 'CID', 'terens', '2017-10-19 10:00:38', 'Delete News [0]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_delete'),
(93, 'CID', 'terens', '2017-10-19 10:00:44', 'Delete News [0]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_delete'),
(94, 'CID', 'terens', '2017-10-19 10:00:44', 'Delete News [0]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_delete'),
(95, 'CID', 'terens', '2017-10-19 10:00:44', 'Delete News [0]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_delete'),
(96, 'CID', 'terens', '2017-10-19 10:00:44', 'Delete News [0]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_delete'),
(97, 'CID', 'terens', '2017-10-19 10:00:44', 'Delete News [0]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_delete'),
(98, 'CID', 'terens', '2017-10-19 10:06:32', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(99, 'CID', 'terens', '2017-10-19 10:08:59', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(100, 'CID', 'terens', '2017-10-19 10:10:31', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(101, 'CID', 'terens', '2017-10-20 00:55:16', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(102, 'CID', 'terens', '2017-10-20 01:07:00', 'Delete News [0]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_delete'),
(103, 'CID', 'terens', '2017-10-20 01:07:00', 'Delete News [0]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_delete'),
(104, 'CID', 'terens', '2017-10-20 01:21:39', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(105, 'CID', 'terens', '2017-10-20 03:03:27', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(106, 'CID', 'terens', '2017-10-20 04:03:50', 'Delete Products [0]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_delete'),
(107, 'CID', 'terens', '2017-10-20 04:03:50', 'Delete Products [0]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_delete'),
(108, 'CID', 'terens', '2017-10-20 04:05:29', 'Created Products', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(109, 'CID', 'terens', '2017-10-20 04:05:38', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(110, 'CID', 'terens', '2017-10-20 04:06:22', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(111, 'CID', 'terens', '2017-10-20 04:09:01', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(112, 'CID', 'terens', '2017-10-20 04:13:10', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(113, 'CID', 'terens', '2017-10-20 04:13:36', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(114, 'CID', 'terens', '2017-10-20 04:13:56', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(115, 'CID', 'terens', '2017-10-20 04:20:22', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(116, 'CID', 'terens', '2017-10-20 04:24:09', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(117, 'CID', 'terens', '2017-10-20 04:25:08', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(118, 'CID', 'terens', '2017-10-20 04:25:11', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(119, 'CID', 'terens', '2017-10-20 04:25:28', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(120, 'CID', 'terens', '2017-10-20 04:26:03', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(121, 'CID', 'terens', '2017-10-20 04:29:05', 'Update Products []', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(122, 'CID', 'terens', '2017-10-20 05:29:05', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(123, 'CID', 'terens', '2017-10-20 05:32:48', 'Update Products [1]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(124, 'CID', 'terens', '2017-10-20 05:33:22', 'Update Products [1]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(125, 'CID', 'terens', '2017-10-20 07:13:47', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(126, 'CID', 'terens', '2017-10-20 07:14:20', 'Created Products', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(127, 'CID', 'terens', '2017-10-20 07:57:43', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(128, 'CID', 'terens', '2017-10-20 07:58:14', 'Login', '192.168.100.241', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:56.0) Gecko/20100101 Firefox/56.0', 'Login', 'login'),
(129, 'CID', 'terens', '2017-10-20 07:58:38', 'Created Products', '192.168.100.241', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:56.0) Gecko/20100101 Firefox/56.0', 'Product', 'mod_add'),
(130, 'CID', 'terens', '2017-10-20 07:58:39', 'Update Products [1]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(131, 'CID', 'terens', '2017-10-20 08:07:38', 'Delete Products [3]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_delete'),
(132, 'CID', 'terens', '2017-10-20 09:10:35', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(133, 'CID', 'terens', '2017-10-20 09:11:33', 'Update Products [2]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(134, 'CID', 'terens', '2017-10-23 01:36:32', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(135, 'CID', 'terens', '2017-10-23 01:36:55', 'Update User Group [superadmin]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Users Group', 'mod_edit'),
(136, 'CID', 'terens', '2017-10-23 01:57:13', 'Created Highlights', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Highlights', 'mod_add'),
(137, 'CID', 'terens', '2017-10-23 01:57:17', 'Delete Products [5]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Highlights', 'mod_delete'),
(138, 'CID', 'terens', '2017-10-23 01:59:47', 'Update Products [2]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(139, 'CID', 'terens', '2017-10-23 01:59:56', 'Update Products [2]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_edit'),
(140, 'CID', 'terens', '2017-10-23 02:06:27', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(141, 'CID', 'terens', '2017-10-23 02:08:05', 'Update User Group [superadmin]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Users Group', 'mod_edit'),
(142, 'CID', 'terens', '2017-10-23 02:08:11', 'Update User Group [superadmin]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Users Group', 'mod_edit'),
(143, 'CID', 'terens', '2017-10-23 02:08:31', 'Created Products', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(144, 'CID', 'terens', '2017-10-23 02:10:09', 'Created Products', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Product', 'mod_add'),
(145, 'CID', 'terens', '2017-10-23 03:07:05', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(146, 'CID', 'terens', '2017-10-23 06:08:28', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(147, 'CID', 'terens', '2017-10-23 06:49:08', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(148, 'CID', 'terens', '2017-10-23 07:24:46', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(149, 'CID', 'terens', '2017-10-23 07:25:21', 'Update User Group [superadmin]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Users Group', 'mod_edit'),
(150, 'CID', '', '2017-10-23 07:39:59', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(151, 'CID', '', '2017-10-23 07:45:38', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(152, 'CID', '', '2017-10-23 07:46:45', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(153, 'CID', 'terens', '2017-10-23 07:48:20', 'Update User Group [superadmin]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Users Group', 'mod_edit'),
(154, 'CID', '', '2017-10-23 07:48:35', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(155, 'CID', 'terens', '2017-10-23 07:49:09', 'Update User Group [superadmin]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Users Group', 'mod_edit'),
(156, 'CID', 'terens', '2017-10-23 08:07:23', 'Update User Group [superadmin]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Users Group', 'mod_edit'),
(157, 'CID', '', '2017-10-23 08:11:16', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(158, 'CID', '', '2017-10-23 08:12:55', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(159, 'CID', '', '2017-10-23 08:13:20', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(160, 'CID', '', '2017-10-23 08:15:09', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(161, 'CID', '', '2017-10-23 08:15:54', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(162, 'CID', '', '2017-10-23 08:15:56', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(163, 'CID', '', '2017-10-23 08:16:05', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(164, 'CID', '', '2017-10-23 08:19:12', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(165, 'CID', '', '2017-10-23 08:19:19', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(166, 'CID', '', '2017-10-23 08:36:07', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(167, 'CID', '', '2017-10-23 08:37:52', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(168, 'CID', '', '2017-10-23 08:38:47', 'Created News', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', '', ''),
(169, 'CID', 'terens', '2017-10-23 10:03:37', 'Login', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Login', 'login'),
(170, 'CID', 'terens', '2017-10-23 10:04:03', 'Update User Group [superadmin]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Users Group', 'mod_edit'),
(171, 'CID', 'terens', '2017-10-23 10:05:55', 'Delete Contact [2]', '::1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/61.0.3163.100 Chrome/61.0.3163.100 Safari/537.36', 'Contact', 'mod_delete');

-- --------------------------------------------------------

--
-- Table structure for table `wc_modules`
--

CREATE TABLE `wc_modules` (
  `module_link` varchar(50) NOT NULL,
  `module_name` varchar(30) NOT NULL,
  `module_group` varchar(30) NOT NULL,
  `group_order` smallint(6) NOT NULL,
  `module_order` smallint(6) NOT NULL,
  `label` varchar(30) NOT NULL,
  `folder` varchar(30) NOT NULL,
  `file` varchar(30) NOT NULL,
  `default_function` varchar(30) NOT NULL,
  `show_nav` tinyint(1) UNSIGNED NOT NULL,
  `active` tinyint(1) UNSIGNED NOT NULL,
  `has_add` tinyint(1) NOT NULL,
  `has_view` tinyint(1) NOT NULL,
  `has_edit` tinyint(1) NOT NULL,
  `has_delete` tinyint(1) NOT NULL,
  `has_list` tinyint(1) NOT NULL,
  `has_print` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wc_modules`
--

INSERT INTO `wc_modules` (`module_link`, `module_name`, `module_group`, `group_order`, `module_order`, `label`, `folder`, `file`, `default_function`, `show_nav`, `active`, `has_add`, `has_view`, `has_edit`, `has_delete`, `has_list`, `has_print`) VALUES
('contact/%', 'Contact', 'Contact', 1000, 0, 'Contact', 'contact', 'contact', 'listing', 1, 1, 1, 1, 1, 1, 1, 0),
('contents/%', 'Contents', 'Contents', 1000, 0, 'Contents', 'contents', 'contents', 'listing', 1, 1, 1, 1, 1, 1, 1, 0),
('highlights/%', 'Highlights', 'Highlights', 1000, 0, 'Highlights', 'highlights', 'highlights', 'listing', 1, 1, 1, 1, 1, 1, 1, 0),
('maintenance/user/%', 'Users', 'Maintenance', 1000, 0, 'Maintenance', 'wc_core', 'user', 'listing', 1, 1, 1, 1, 1, 1, 1, 0),
('maintenance/usergroup/%', 'Users Group', 'Maintenance', 1000, 0, 'Maintenance', 'wc_core', 'usergroup', 'listing', 1, 1, 1, 1, 1, 1, 1, 0),
('product/%', 'Product', 'Product', 1000, 0, 'Product', 'product', 'product', 'listing', 1, 1, 1, 1, 1, 1, 1, 0),
('projects/%', 'Projects', 'Projects', 1000, 0, 'Projects', 'projects', 'projects', 'listing', 1, 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wc_module_access`
--

CREATE TABLE `wc_module_access` (
  `module_name` varchar(30) NOT NULL,
  `companycode` varchar(15) NOT NULL,
  `groupname` varchar(25) NOT NULL,
  `mod_add` tinyint(1) UNSIGNED NOT NULL,
  `mod_view` tinyint(1) UNSIGNED NOT NULL,
  `mod_edit` tinyint(1) UNSIGNED NOT NULL,
  `mod_delete` tinyint(1) UNSIGNED NOT NULL,
  `mod_list` tinyint(1) UNSIGNED NOT NULL,
  `mod_print` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wc_module_access`
--

INSERT INTO `wc_module_access` (`module_name`, `companycode`, `groupname`, `mod_add`, `mod_view`, `mod_edit`, `mod_delete`, `mod_list`, `mod_print`) VALUES
('Contact', 'CID', 'superadmin', 0, 1, 0, 1, 1, 0),
('Contents', 'CID', 'superadmin', 0, 1, 1, 0, 1, 0),
('Highlights', 'CID', 'superadmin', 1, 1, 1, 1, 1, 0),
('Product', 'CID', 'superadmin', 1, 1, 1, 1, 1, 0),
('Projects', 'CID', 'superadmin', 1, 1, 1, 1, 1, 0),
('Users', 'CID', 'superadmin', 1, 1, 1, 1, 1, 0),
('Users Group', 'CID', 'superadmin', 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wc_users`
--

CREATE TABLE `wc_users` (
  `username` varchar(20) NOT NULL,
  `companycode` varchar(15) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `stat` enum('active','inactive','deleted') DEFAULT 'active',
  `is_login` varchar(5) DEFAULT NULL,
  `useragent` varchar(255) DEFAULT NULL,
  `groupname` varchar(30) NOT NULL,
  `firstname` char(20) DEFAULT NULL,
  `middleinitial` char(2) DEFAULT NULL,
  `lastname` char(20) DEFAULT NULL,
  `initial` char(5) DEFAULT NULL,
  `phone` char(25) DEFAULT NULL,
  `mobile` char(20) DEFAULT NULL,
  `checktime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `locktime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `enteredby` varchar(20) DEFAULT NULL,
  `entereddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateby` varchar(20) DEFAULT NULL,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateprogram` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `wc_users`
--

INSERT INTO `wc_users` (`username`, `companycode`, `password`, `email`, `stat`, `is_login`, `useragent`, `groupname`, `firstname`, `middleinitial`, `lastname`, `initial`, `phone`, `mobile`, `checktime`, `locktime`, `enteredby`, `entereddate`, `updateby`, `updatedate`, `updateprogram`) VALUES
('terens', 'CID', '$2y$10$XqC7p1aHg9DYookrGrWsDO4kzj92mp3PkQNFeWEazoLPAyXaFsdn6', 'super@admin.com', 'active', '', '', 'superadmin', 'Super', '12', 'Admin', NULL, '123456', '123456', '2017-10-23 10:35:58', '2017-08-30 11:38:16', 'superadmin', '2017-06-15 18:11:11', 'superadmin', '2017-10-19 05:36:19', 'Users|mod_edit');

-- --------------------------------------------------------

--
-- Table structure for table `wc_user_group`
--

CREATE TABLE `wc_user_group` (
  `groupname` varchar(30) NOT NULL,
  `companycode` varchar(15) NOT NULL,
  `description` varchar(255) NOT NULL,
  `enteredby` varchar(25) NOT NULL,
  `entereddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateby` varchar(25) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateprogram` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wc_user_group`
--

INSERT INTO `wc_user_group` (`groupname`, `companycode`, `description`, `enteredby`, `entereddate`, `updateby`, `updatedate`, `updateprogram`) VALUES
('superadmin', 'CID', 'test', 'superadmin', '2017-03-21 23:46:42', 'terens', '2017-10-23 10:04:03', 'Users Group|mod_edit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companycode`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `highlights`
--
ALTER TABLE `highlights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_and_clients`
--
ALTER TABLE `projects_and_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wc_admin_logs`
--
ALTER TABLE `wc_admin_logs`
  ADD PRIMARY KEY (`wc_admin_logsid`,`companycode`),
  ADD KEY `companycode` (`companycode`),
  ADD KEY `username` (`username`) USING BTREE,
  ADD KEY `module` (`module`),
  ADD KEY `task` (`task`);

--
-- Indexes for table `wc_modules`
--
ALTER TABLE `wc_modules`
  ADD PRIMARY KEY (`module_link`),
  ADD UNIQUE KEY `module_name` (`module_name`);

--
-- Indexes for table `wc_module_access`
--
ALTER TABLE `wc_module_access`
  ADD PRIMARY KEY (`module_name`,`companycode`,`groupname`),
  ADD KEY `groupname` (`groupname`,`companycode`),
  ADD KEY `wc_module_access_ibfk_2` (`companycode`,`groupname`);

--
-- Indexes for table `wc_users`
--
ALTER TABLE `wc_users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `companycode` (`companycode`),
  ADD KEY `groupname` (`groupname`),
  ADD KEY `groupname_2` (`groupname`,`companycode`);

--
-- Indexes for table `wc_user_group`
--
ALTER TABLE `wc_user_group`
  ADD PRIMARY KEY (`groupname`,`companycode`),
  ADD KEY `companycode` (`companycode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `highlights`
--
ALTER TABLE `highlights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `projects_and_clients`
--
ALTER TABLE `projects_and_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wc_admin_logs`
--
ALTER TABLE `wc_admin_logs`
  MODIFY `wc_admin_logsid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `wc_module_access`
--
ALTER TABLE `wc_module_access`
  ADD CONSTRAINT `wc_module_access_ibfk_1` FOREIGN KEY (`module_name`) REFERENCES `wc_modules` (`module_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wc_module_access_ibfk_2` FOREIGN KEY (`companycode`,`groupname`) REFERENCES `wc_user_group` (`companycode`, `groupname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wc_users`
--
ALTER TABLE `wc_users`
  ADD CONSTRAINT `wc_users_ibfk_1` FOREIGN KEY (`groupname`,`companycode`) REFERENCES `wc_user_group` (`groupname`, `companycode`) ON UPDATE CASCADE;

--
-- Constraints for table `wc_user_group`
--
ALTER TABLE `wc_user_group`
  ADD CONSTRAINT `wc_user_group_ibfk_1` FOREIGN KEY (`companycode`) REFERENCES `company` (`companycode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2019 at 11:37 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(50) DEFAULT NULL,
  `admin_first_name` varchar(50) DEFAULT NULL,
  `admin_last_name` varchar(50) DEFAULT NULL,
  `admin_email` varchar(50) DEFAULT NULL,
  `admin_pass` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  `last_modify_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`row_id`, `admin_user`, `admin_first_name`, `admin_last_name`, `admin_email`, `admin_pass`, `status`, `create_date`, `create_by`, `last_modify_date`, `last_modify_by`) VALUES
(1, 'admin', '', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(10) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=254 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`row_id`, `country_code`, `country_name`, `active`) VALUES
(1, 'AF', 'AFGHANISTAN', 1),
(2, 'AL', 'ALBANIA', 1),
(3, 'DZ', 'ALGERIA', 1),
(4, 'AS', 'AMERICAN SAMOA', 1),
(5, 'AD', 'ANDORRA', 1),
(6, 'AO', 'ANGOLA', 1),
(7, 'AI', 'ANGUILLA', 1),
(8, 'AQ', 'ANTARCTICA', 1),
(9, 'AG', 'ANTIGUA AND BARBUDA', 1),
(10, 'AR', 'ARGENTINA', 1),
(11, 'AM', 'ARMENIA', 1),
(12, 'AW', 'ARUBA', 1),
(13, 'AU', 'AUSTRALIA', 1),
(14, 'AT', 'AUSTRIA', 1),
(15, 'AZ', 'AZERBAIJAN', 1),
(16, 'BS', 'BAHAMAS', 1),
(17, 'BH', 'BAHRAIN', 1),
(18, 'BD', 'BANGLADESH', 1),
(19, 'BB', 'BARBADOS', 1),
(20, 'BY', 'BELARUS', 1),
(21, 'BE', 'BELGIUM', 1),
(22, 'BZ', 'BELIZE', 1),
(23, 'BJ', 'BENIN', 1),
(24, 'BM', 'BERMUDA', 1),
(25, 'BT', 'BHUTAN', 1),
(26, 'BO', 'BOLIVIA', 1),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 1),
(28, 'BW', 'BOTSWANA', 1),
(29, 'BV', 'BOUVET ISLAND', 1),
(30, 'BR', 'BRAZIL', 1),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 1),
(32, 'BN', 'BRUNEI DARUSSALAM', 1),
(33, 'BG', 'BULGARIA', 1),
(34, 'BF', 'BURKINA FASO', 1),
(35, 'BI', 'BURUNDI', 1),
(36, 'KH', 'CAMBODIA', 1),
(37, 'CM', 'CAMEROON', 1),
(38, 'CA', 'CANADA', 1),
(39, 'CV', 'CAPE VERDE', 1),
(40, 'KY', 'CAYMAN ISLANDS', 1),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 1),
(42, 'TD', 'CHAD', 1),
(43, 'CL', 'CHILE', 1),
(44, 'CN', 'CHINA', 1),
(45, 'CX', 'CHRISTMAS ISLAND', 1),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 1),
(47, 'CO', 'COLOMBIA', 1),
(48, 'KM', 'COMOROS', 1),
(49, 'CG', 'CONGO', 1),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 1),
(51, 'CK', 'COOK ISLANDS', 1),
(52, 'CR', 'COSTA RICA', 1),
(53, 'CI', 'COTE D''IVOIRE', 1),
(54, 'HR', 'CROATIA', 1),
(55, 'CU', 'CUBA', 1),
(56, 'CY', 'CYPRUS', 1),
(57, 'CZ', 'CZECH REPUBLIC', 1),
(58, 'DK', 'DENMARK', 1),
(59, 'DJ', 'DJIBOUTI', 1),
(60, 'DM', 'DOMINICA', 1),
(61, 'DO', 'DOMINICAN REPUBLIC', 1),
(62, 'EC', 'ECUADOR', 1),
(63, 'EG', 'EGYPT', 1),
(64, 'SV', 'EL SALVADOR', 1),
(65, 'GQ', 'EQUATORIAL GUINEA', 1),
(66, 'ER', 'ERITREA', 1),
(67, 'EE', 'ESTONIA', 1),
(68, 'ET', 'ETHIOPIA', 1),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 1),
(70, 'FO', 'FAROE ISLANDS', 1),
(71, 'FJ', 'FIJI', 1),
(72, 'FI', 'FINLAND', 1),
(73, 'FR', 'FRANCE', 1),
(74, 'GF', 'FRENCH GUIANA', 1),
(75, 'PF', 'FRENCH POLYNESIA', 1),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 1),
(77, 'GA', 'GABON', 1),
(78, 'GM', 'GAMBIA', 1),
(79, 'GE', 'GEORGIA', 1),
(80, 'DE', 'GERMANY', 1),
(81, 'GH', 'GHANA', 1),
(82, 'GI', 'GIBRALTAR', 1),
(83, 'GR', 'GREECE', 1),
(84, 'GL', 'GREENLAND', 1),
(85, 'GD', 'GRENADA', 1),
(86, 'GP', 'GUADELOUPE', 1),
(87, 'GU', 'GUAM', 1),
(88, 'GT', 'GUATEMALA', 1),
(89, 'GN', 'GUINEA', 1),
(90, 'GW', 'GUINEA-BISSAU', 1),
(91, 'GY', 'GUYANA', 1),
(92, 'HT', 'HAITI', 1),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 1),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 1),
(95, 'HN', 'HONDURAS', 1),
(96, 'HK', 'HONG KONG', 1),
(97, 'HU', 'HUNGARY', 1),
(98, 'IS', 'ICELAND', 1),
(99, 'IN', 'INDIA', 1),
(100, 'ID', 'INDONESIA', 1),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 1),
(102, 'IQ', 'IRAQ', 1),
(103, 'IE', 'IRELAND', 1),
(104, 'IL', 'ISRAEL', 1),
(105, 'IT', 'ITALY', 1),
(106, 'JM', 'JAMAICA', 1),
(107, 'JP', 'JAPAN', 1),
(108, 'JO', 'JORDAN', 1),
(109, 'KZ', 'KAZAKHSTAN', 1),
(110, 'KE', 'KENYA', 1),
(111, 'KI', 'KIRIBATI', 1),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 1),
(113, 'KR', 'KOREA, REPUBLIC OF', 1),
(114, 'KW', 'KUWAIT', 1),
(115, 'KG', 'KYRGYZSTAN', 1),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 1),
(117, 'LV', 'LATVIA', 1),
(118, 'LB', 'LEBANON', 1),
(119, 'LS', 'LESOTHO', 1),
(120, 'LR', 'LIBERIA', 1),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 1),
(122, 'LI', 'LIECHTENSTEIN', 1),
(123, 'LT', 'LITHUANIA', 1),
(124, 'LU', 'LUXEMBOURG', 1),
(125, 'MO', 'MACAO', 1),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 1),
(127, 'MG', 'MADAGASCAR', 1),
(128, 'MW', 'MALAWI', 1),
(129, 'MY', 'MALAYSIA', 1),
(130, 'MV', 'MALDIVES', 1),
(131, 'ML', 'MALI', 1),
(132, 'MT', 'MALTA', 1),
(133, 'MH', 'MARSHALL ISLANDS', 1),
(134, 'MQ', 'MARTINIQUE', 1),
(135, 'MR', 'MAURITANIA', 1),
(136, 'MU', 'MAURITIUS', 1),
(137, 'YT', 'MAYOTTE', 1),
(138, 'MX', 'MEXICO', 1),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 1),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 1),
(141, 'MC', 'MONACO', 1),
(142, 'MN', 'MONGOLIA', 1),
(143, 'MS', 'MONTSERRAT', 1),
(144, 'MA', 'MOROCCO', 1),
(145, 'MZ', 'MOZAMBIQUE', 1),
(146, 'MM', 'MYANMAR', 1),
(147, 'NA', 'NAMIBIA', 1),
(148, 'NR', 'NAURU', 1),
(149, 'NP', 'NEPAL', 1),
(150, 'NL', 'NETHERLANDS', 1),
(151, 'AN', 'NETHERLANDS ANTILLES', 1),
(152, 'NC', 'NEW CALEDONIA', 1),
(153, 'NZ', 'NEW ZEALAND', 1),
(154, 'NI', 'NICARAGUA', 1),
(155, 'NE', 'NIGER', 1),
(156, 'NG', 'NIGERIA', 1),
(157, 'NU', 'NIUE', 1),
(158, 'NF', 'NORFOLK ISLAND', 1),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 1),
(160, 'NO', 'NORWAY', 1),
(161, 'OM', 'OMAN', 1),
(162, 'PK', 'PAKISTAN', 1),
(163, 'PW', 'PALAU', 1),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 1),
(165, 'PA', 'PANAMA', 1),
(166, 'PG', 'PAPUA NEW GUINEA', 1),
(167, 'PY', 'PARAGUAY', 1),
(168, 'PE', 'PERU', 1),
(169, 'PH', 'PHILIPPINES', 1),
(170, 'PN', 'PITCAIRN', 1),
(171, 'PL', 'POLAND', 1),
(172, 'PT', 'PORTUGAL', 1),
(173, 'PR', 'PUERTO RICO', 1),
(174, 'QA', 'QATAR', 1),
(175, 'RE', 'REUNION', 1),
(176, 'RO', 'ROMANIA', 1),
(177, 'RU', 'RUSSIAN FEDERATION', 1),
(178, 'RW', 'RWANDA', 1),
(179, 'SH', 'SAINT HELENA', 1),
(180, 'KN', 'SAINT KITTS AND NEVIS', 1),
(181, 'LC', 'SAINT LUCIA', 1),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 1),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 1),
(184, 'WS', 'SAMOA', 1),
(185, 'SM', 'SAN MARINO', 1),
(186, 'ST', 'SAO TOME AND PRINCIPE', 1),
(187, 'SA', 'SAUDI ARABIA', 1),
(188, 'SN', 'SENEGAL', 1),
(189, 'CS', 'SERBIA AND MONTENEGRO', 1),
(190, 'SC', 'SEYCHELLES', 1),
(191, 'SL', 'SIERRA LEONE', 1),
(192, 'SG', 'SINGAPORE', 1),
(193, 'SK', 'SLOVAKIA', 1),
(194, 'SI', 'SLOVENIA', 1),
(195, 'SB', 'SOLOMON ISLANDS', 1),
(196, 'SO', 'SOMALIA', 1),
(197, 'ZA', 'SOUTH AFRICA', 1),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 1),
(199, 'ES', 'SPAIN', 1),
(200, 'LK', 'SRI LANKA', 1),
(201, 'SD', 'SUDAN', 1),
(202, 'SR', 'SURINAME', 1),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 1),
(204, 'SZ', 'SWAZILAND', 1),
(205, 'SE', 'SWEDEN', 1),
(206, 'CH', 'SWITZERLAND', 1),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 1),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 1),
(209, 'TJ', 'TAJIKISTAN', 1),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 1),
(211, 'TH', 'THAILAND', 1),
(212, 'TL', 'TIMOR-LESTE', 1),
(213, 'TG', 'TOGO', 1),
(214, 'TK', 'TOKELAU', 1),
(215, 'TO', 'TONGA', 1),
(216, 'TT', 'TRINIDAD AND TOBAGO', 1),
(217, 'TN', 'TUNISIA', 1),
(218, 'TR', 'TURKEY', 1),
(219, 'TM', 'TURKMENISTAN', 1),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 1),
(221, 'TV', 'TUVALU', 1),
(222, 'UG', 'UGANDA', 1),
(223, 'UA', 'UKRAINE', 1),
(224, 'AE', 'UNITED ARAB EMIRATES', 1),
(225, 'GB', 'UNITED KINGDOM', 1),
(226, 'US', 'UNITED STATES', 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 1),
(228, 'UY', 'URUGUAY', 1),
(229, 'UZ', 'UZBEKISTAN', 1),
(230, 'VU', 'VANUATU', 1),
(231, 'VE', 'VENEZUELA', 1),
(232, 'VN', 'VIET NAM', 1),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 1),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 1),
(235, 'WF', 'WALLIS AND FUTUNA', 1),
(236, 'EH', 'WESTERN SAHARA', 1),
(237, 'YE', 'YEMEN', 1),
(238, 'ZM', 'ZAMBIA', 1),
(239, 'ZW', 'ZIMBABWE', 1),
(240, 'RS', 'SERBIA', 1),
(241, 'AP', 'ASIA PACIFIC REGION', 1),
(242, 'ME', 'MONTENEGRO', 1),
(243, 'AX', 'ALAND ISLANDS', 1),
(244, 'BQ', 'BONAIRE, SINT EUSTATIUS AND SABA', 1),
(245, 'CW', 'CURACAO', 1),
(246, 'GG', 'GUERNSEY', 1),
(247, 'IM', 'ISLE OF MAN', 1),
(248, 'JE', 'JERSEY', 1),
(249, 'XK', 'KOSOVO', 1),
(250, 'BL', 'SAINT BARTHELEMY', 1),
(251, 'MF', 'SAINT MARTIN', 1),
(252, 'SX', 'SINT MAARTEN', 1),
(253, 'SS', 'SOUTH SUDAN', 1);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `currency_name` varchar(50) DEFAULT NULL,
  `currency_code` varchar(10) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `currencies`
--


-- --------------------------------------------------------

--
-- Table structure for table `customerproducts`
--

CREATE TABLE IF NOT EXISTS `customerproducts` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `cus_code` varchar(50) DEFAULT NULL,
  `prd_code` varchar(50) DEFAULT NULL,
  `sub_type` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `period` varchar(30) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `billing_date` int(11) DEFAULT NULL,
  `grace_period` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `demo_done` enum('0','1') DEFAULT '0',
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `customerproducts`
--


-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `cus_code` varchar(50) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  `last_modify_by` varchar(50) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`row_id`, `cus_code`, `first_name`, `last_name`, `email`, `password`, `active`, `phone`, `city`, `country`, `create_date`, `create_by`, `last_modify_date`, `last_modify_by`, `deleted`) VALUES
(1, NULL, 'Mohit', 'Garg', 'it.mohitgarg@gmail.com', '123456', 0, '9215633761', 'Ambala Cantt', 'India', '2019-02-23 20:46:13', NULL, NULL, NULL, 1),
(3, NULL, 'Mohit', 'Garg', 'it.mohitgarg1@gmail.com', '123456', 1, '9215633761', '123', '1', '2019-02-23 21:43:03', '1', '2019-02-23 21:43:03', '1', 0),
(4, 'CUST2', 'Mohit', 'Garg', 'riidasiiwe@mgal.com', '123456', 1, '84', '44', '1', '2019-02-23 22:12:16', '1', '2019-02-23 22:12:16', '1', 0),
(5, 'CUST3', 'wewqe', 'wqeqwe', 'adminweq@gmail.com', '123456', 1, '22', 'City', '99', '2019-02-23 22:12:53', '1', '2019-02-23 22:12:53', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hosting`
--

CREATE TABLE IF NOT EXISTS `hosting` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `host_code` varchar(50) DEFAULT NULL,
  `provider_name` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `details` varchar(200) DEFAULT NULL,
  `contract_number` varchar(50) DEFAULT NULL,
  `package_name` varchar(50) DEFAULT NULL,
  `no_of_databases` int(11) DEFAULT NULL,
  `db_used` int(11) DEFAULT NULL,
  `db_available` int(11) DEFAULT NULL,
  `user` varchar(30) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `expiry` datetime DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  `last_modify_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hosting`
--


-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `host_code` varchar(50) DEFAULT NULL,
  `prd_type` varchar(50) DEFAULT NULL,
  `sub_type` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `database_name` varchar(30) DEFAULT NULL,
  `dbo` varchar(30) DEFAULT NULL,
  `dbo_pass` varchar(30) DEFAULT NULL,
  `db_host` varchar(50) DEFAULT NULL,
  `cus_code` varchar(50) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  `last_modify_by` varchar(50) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inventory`
--


-- --------------------------------------------------------

--
-- Table structure for table `invoicedetails`
--

CREATE TABLE IF NOT EXISTS `invoicedetails` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `inv_no` varchar(50) DEFAULT NULL,
  `prd_code` varchar(50) DEFAULT NULL,
  `sub_type` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `period` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `invoicedetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `inv_no` varchar(50) DEFAULT NULL,
  `inv_date` datetime DEFAULT NULL,
  `cus_code` varchar(50) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `net_amount` float DEFAULT NULL,
  `amount_paid` float DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  `last_modify_by` varchar(50) DEFAULT NULL,
  `cancelled` int(1) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `invoices`
--


-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE IF NOT EXISTS `paymentdetails` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `rect_no` varchar(50) DEFAULT NULL,
  `inv_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `paymentdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `rect_no` varchar(50) DEFAULT NULL,
  `cus_code` varchar(50) DEFAULT NULL,
  `rect_date` datetime DEFAULT NULL,
  `pay_mode` varchar(30) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  `last_modify_by` varchar(50) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `paymodes`
--

CREATE TABLE IF NOT EXISTS `paymodes` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `PayMode` varchar(30) DEFAULT NULL,
  `Active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `paymodes`
--


-- --------------------------------------------------------

--
-- Table structure for table `periods`
--

CREATE TABLE IF NOT EXISTS `periods` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `period_name` varchar(30) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `periods`
--


-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE IF NOT EXISTS `productdetails` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `prd_code` varchar(50) DEFAULT NULL,
  `sub_type` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `period` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `productdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `prd_code` varchar(50) DEFAULT NULL,
  `prd_name` varchar(100) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prd_type` varchar(50) DEFAULT NULL,
  `subscription` int(1) DEFAULT NULL,
  `default_price` float DEFAULT NULL,
  `default_period` varchar(30) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  `last_modify_date` datetime DEFAULT NULL,
  `last_modify_by` varchar(50) DEFAULT NULL,
  `cancelled` int(1) DEFAULT NULL,
  `deleted` int(1) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `products`
--


-- --------------------------------------------------------

--
-- Table structure for table `producttypes`
--

CREATE TABLE IF NOT EXISTS `producttypes` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `Prd_type` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `producttypes`
--


-- --------------------------------------------------------

--
-- Table structure for table `sequence`
--

CREATE TABLE IF NOT EXISTS `sequence` (
  `row_id` int(10) NOT NULL AUTO_INCREMENT,
  `doc_type` varchar(50) DEFAULT NULL,
  `format` varchar(100) DEFAULT NULL,
  `next_num` int(11) DEFAULT NULL,
  `increaments` int(11) DEFAULT NULL,
  PRIMARY KEY (`row_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sequence`
--

INSERT INTO `sequence` (`row_id`, `doc_type`, `format`, `next_num`, `increaments`) VALUES
(1, 'cust_code', 'CUST', 3, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

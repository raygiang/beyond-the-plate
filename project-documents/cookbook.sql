-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: project-cookbook.caablfu69mfx.us-east-2.rds.amazonaws.com:3306:3306
-- Generation Time: Apr 20, 2019 at 05:29 AM
-- Server version: 5.6.40-log
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookbook`
--
CREATE DATABASE IF NOT EXISTS `cookbook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cookbook`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(5, 'Breakfast', 0, 1555353417, 1555353417),
(6, 'Brunch', 0, 1555353425, 1555353425),
(7, 'Lunch', 0, 1555353515, 1555353515),
(8, 'Dinner', 0, 1555353517, 1555353517),
(9, 'Party Snacks', 0, 1555353715, 1555353715),
(10, 'Quick and Easy', 0, 1555353725, 1555353725),
(11, 'Desserts', 0, 1555353726, 1555353726),
(12, 'Drinks', 0, 1555353728, 1555353728);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `idCountry` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(45) NOT NULL DEFAULT '',
  `population` varchar(20) DEFAULT NULL,
  `capital` varchar(30) DEFAULT NULL,
  `continentName` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`idCountry`, `countryCode`, `countryName`, `population`, `capital`, `continentName`) VALUES
(1, 'AD', 'Andorra', '84000', 'Andorra la Vella', 'Europe'),
(2, 'AE', 'United Arab Emirates', '4975593', 'Abu Dhabi', 'Asia'),
(3, 'AF', 'Afghanistan', '29121286', 'Kabul', 'Asia'),
(4, 'AG', 'Antigua and Barbuda', '86754', 'St. John\'s', 'North America'),
(5, 'AI', 'Anguilla', '13254', 'The Valley', 'North America'),
(6, 'AL', 'Albania', '2986952', 'Tirana', 'Europe'),
(7, 'AM', 'Armenia', '2968000', 'Yerevan', 'Asia'),
(8, 'AO', 'Angola', '13068161', 'Luanda', 'Africa'),
(9, 'AR', 'Argentina', '41343201', 'Buenos Aires', 'South America'),
(10, 'AS', 'American Samoa', '57881', 'Pago Pago', 'Oceania'),
(11, 'AT', 'Austria', '8205000', 'Vienna', 'Europe'),
(12, 'AU', 'Australia', '21515754', 'Canberra', 'Oceania'),
(13, 'AW', 'Aruba', '71566', 'Oranjestad', 'North America'),
(14, 'AX', 'Åland', '26711', 'Mariehamn', 'Europe'),
(15, 'AZ', 'Azerbaijan', '8303512', 'Baku', 'Asia'),
(16, 'BA', 'Bosnia and Herzegovina', '4590000', 'Sarajevo', 'Europe'),
(17, 'BB', 'Barbados', '285653', 'Bridgetown', 'North America'),
(18, 'BD', 'Bangladesh', '156118464', 'Dhaka', 'Asia'),
(19, 'BE', 'Belgium', '10403000', 'Brussels', 'Europe'),
(20, 'BF', 'Burkina Faso', '16241811', 'Ouagadougou', 'Africa'),
(21, 'BG', 'Bulgaria', '7148785', 'Sofia', 'Europe'),
(22, 'BH', 'Bahrain', '738004', 'Manama', 'Asia'),
(23, 'BI', 'Burundi', '9863117', 'Bujumbura', 'Africa'),
(24, 'BJ', 'Benin', '9056010', 'Porto-Novo', 'Africa'),
(25, 'BM', 'Bermuda', '65365', 'Hamilton', 'North America'),
(26, 'BN', 'Brunei', '395027', 'Bandar Seri Begawan', 'Asia'),
(27, 'BO', 'Bolivia', '9947418', 'Sucre', 'South America'),
(28, 'BR', 'Brazil', '201103330', 'Brasília', 'South America'),
(29, 'BS', 'Bahamas', '301790', 'Nassau', 'North America'),
(30, 'BT', 'Bhutan', '699847', 'Thimphu', 'Asia'),
(31, 'BV', 'Bouvet Island', '0', '', 'Antarctica'),
(32, 'BW', 'Botswana', '2029307', 'Gaborone', 'Africa'),
(33, 'BY', 'Belarus', '9685000', 'Minsk', 'Europe'),
(34, 'BZ', 'Belize', '314522', 'Belmopan', 'North America'),
(35, 'CA', 'Canada', '33679000', 'Ottawa', 'North America'),
(36, 'CC', 'Cocos [Keeling] Islands', '628', 'West Island', 'Asia'),
(37, 'CD', 'Democratic Republic of the Congo', '70916439', 'Kinshasa', 'Africa'),
(38, 'CF', 'Central African Republic', '4844927', 'Bangui', 'Africa'),
(39, 'CG', 'Republic of the Congo', '3039126', 'Brazzaville', 'Africa'),
(40, 'CH', 'Switzerland', '7581000', 'Berne', 'Europe'),
(41, 'CI', 'Ivory Coast', '21058798', 'Yamoussoukro', 'Africa'),
(42, 'CK', 'Cook Islands', '21388', 'Avarua', 'Oceania'),
(43, 'CL', 'Chile', '16746491', 'Santiago', 'South America'),
(44, 'CM', 'Cameroon', '19294149', 'Yaoundé', 'Africa'),
(45, 'CN', 'China', '1330044000', 'Beijing', 'Asia'),
(46, 'CO', 'Colombia', '44205293', 'Bogotá', 'South America'),
(47, 'CR', 'Costa Rica', '4516220', 'San José', 'North America'),
(48, 'CU', 'Cuba', '11423000', 'Havana', 'North America'),
(49, 'CV', 'Cape Verde', '508659', 'Praia', 'Africa'),
(50, 'CX', 'Christmas Island', '1500', 'The Settlement', 'Asia'),
(51, 'CY', 'Cyprus', '1102677', 'Nicosia', 'Europe'),
(52, 'CZ', 'Czechia', '10476000', 'Prague', 'Europe'),
(53, 'DE', 'Germany', '81802257', 'Berlin', 'Europe'),
(54, 'DJ', 'Djibouti', '740528', 'Djibouti', 'Africa'),
(55, 'DK', 'Denmark', '5484000', 'Copenhagen', 'Europe'),
(56, 'DM', 'Dominica', '72813', 'Roseau', 'North America'),
(57, 'DO', 'Dominican Republic', '9823821', 'Santo Domingo', 'North America'),
(58, 'DZ', 'Algeria', '34586184', 'Algiers', 'Africa'),
(59, 'EC', 'Ecuador', '14790608', 'Quito', 'South America'),
(60, 'EE', 'Estonia', '1291170', 'Tallinn', 'Europe'),
(61, 'EG', 'Egypt', '80471869', 'Cairo', 'Africa'),
(62, 'EH', 'Western Sahara', '273008', 'El Aaiún', 'Africa'),
(63, 'ER', 'Eritrea', '5792984', 'Asmara', 'Africa'),
(64, 'ES', 'Spain', '46505963', 'Madrid', 'Europe'),
(65, 'ET', 'Ethiopia', '88013491', 'Addis Ababa', 'Africa'),
(66, 'FI', 'Finland', '5244000', 'Helsinki', 'Europe'),
(67, 'FJ', 'Fiji', '875983', 'Suva', 'Oceania'),
(68, 'FK', 'Falkland Islands', '2638', 'Stanley', 'South America'),
(69, 'FM', 'Micronesia', '107708', 'Palikir', 'Oceania'),
(70, 'FO', 'Faroe Islands', '48228', 'Tórshavn', 'Europe'),
(71, 'FR', 'France', '64768389', 'Paris', 'Europe'),
(72, 'GA', 'Gabon', '1545255', 'Libreville', 'Africa'),
(73, 'GB', 'United Kingdom', '62348447', 'London', 'Europe'),
(74, 'GD', 'Grenada', '107818', 'St. George\'s', 'North America'),
(75, 'GE', 'Georgia', '4630000', 'Tbilisi', 'Asia'),
(76, 'GF', 'French Guiana', '195506', 'Cayenne', 'South America'),
(77, 'GH', 'Ghana', '24339838', 'Accra', 'Africa'),
(78, 'GI', 'Gibraltar', '27884', 'Gibraltar', 'Europe'),
(79, 'GL', 'Greenland', '56375', 'Nuuk', 'North America'),
(80, 'GM', 'Gambia', '1593256', 'Banjul', 'Africa'),
(81, 'GN', 'Guinea', '10324025', 'Conakry', 'Africa'),
(82, 'GP', 'Guadeloupe', '443000', 'Basse-Terre', 'North America'),
(83, 'GQ', 'Equatorial Guinea', '1014999', 'Malabo', 'Africa'),
(84, 'GR', 'Greece', '11000000', 'Athens', 'Europe'),
(85, 'GS', 'South Georgia and the South Sandwich Islands', '30', 'Grytviken', 'Antarctica'),
(86, 'GT', 'Guatemala', '13550440', 'Guatemala City', 'North America'),
(87, 'GU', 'Guam', '159358', 'Hagåtña', 'Oceania'),
(88, 'GW', 'Guinea-Bissau', '1565126', 'Bissau', 'Africa'),
(89, 'GY', 'Guyana', '748486', 'Georgetown', 'South America'),
(90, 'HK', 'Hong Kong', '6898686', 'Hong Kong', 'Asia'),
(91, 'HM', 'Heard Island and McDonald Islands', '0', '', 'Antarctica'),
(92, 'HN', 'Honduras', '7989415', 'Tegucigalpa', 'North America'),
(93, 'HR', 'Croatia', '4491000', 'Zagreb', 'Europe'),
(94, 'HT', 'Haiti', '9648924', 'Port-au-Prince', 'North America'),
(95, 'HU', 'Hungary', '9982000', 'Budapest', 'Europe'),
(96, 'ID', 'Indonesia', '242968342', 'Jakarta', 'Asia'),
(97, 'IE', 'Ireland', '4622917', 'Dublin', 'Europe'),
(98, 'IL', 'Israel', '7353985', '', 'Asia'),
(99, 'IN', 'India', '1173108018', 'New Delhi', 'Asia'),
(100, 'IO', 'British Indian Ocean Territory', '4000', '', 'Asia'),
(101, 'IQ', 'Iraq', '29671605', 'Baghdad', 'Asia'),
(102, 'IR', 'Iran', '76923300', 'Tehran', 'Asia'),
(103, 'IS', 'Iceland', '308910', 'Reykjavik', 'Europe'),
(104, 'IT', 'Italy', '60340328', 'Rome', 'Europe'),
(105, 'JM', 'Jamaica', '2847232', 'Kingston', 'North America'),
(106, 'JO', 'Jordan', '6407085', 'Amman', 'Asia'),
(107, 'JP', 'Japan', '127288000', 'Tokyo', 'Asia'),
(108, 'KE', 'Kenya', '40046566', 'Nairobi', 'Africa'),
(109, 'KG', 'Kyrgyzstan', '5508626', 'Bishkek', 'Asia'),
(110, 'KH', 'Cambodia', '14453680', 'Phnom Penh', 'Asia'),
(111, 'KI', 'Kiribati', '92533', 'Tarawa', 'Oceania'),
(112, 'KM', 'Comoros', '773407', 'Moroni', 'Africa'),
(113, 'KN', 'Saint Kitts and Nevis', '51134', 'Basseterre', 'North America'),
(114, 'KP', 'North Korea', '22912177', 'Pyongyang', 'Asia'),
(115, 'KR', 'South Korea', '48422644', 'Seoul', 'Asia'),
(116, 'KW', 'Kuwait', '2789132', 'Kuwait City', 'Asia'),
(117, 'KY', 'Cayman Islands', '44270', 'George Town', 'North America'),
(118, 'KZ', 'Kazakhstan', '15340000', 'Astana', 'Asia'),
(119, 'LA', 'Laos', '6368162', 'Vientiane', 'Asia'),
(120, 'LB', 'Lebanon', '4125247', 'Beirut', 'Asia'),
(121, 'LC', 'Saint Lucia', '160922', 'Castries', 'North America'),
(122, 'LI', 'Liechtenstein', '35000', 'Vaduz', 'Europe'),
(123, 'LK', 'Sri Lanka', '21513990', 'Colombo', 'Asia'),
(124, 'LR', 'Liberia', '3685076', 'Monrovia', 'Africa'),
(125, 'LS', 'Lesotho', '1919552', 'Maseru', 'Africa'),
(126, 'LT', 'Lithuania', '3565000', 'Vilnius', 'Europe'),
(127, 'LU', 'Luxembourg', '497538', 'Luxembourg', 'Europe'),
(128, 'LV', 'Latvia', '2217969', 'Riga', 'Europe'),
(129, 'LY', 'Libya', '6461454', 'Tripoli', 'Africa'),
(130, 'MA', 'Morocco', '31627428', 'Rabat', 'Africa'),
(131, 'MC', 'Monaco', '32965', 'Monaco', 'Europe'),
(132, 'MD', 'Moldova', '4324000', 'Chişinău', 'Europe'),
(133, 'ME', 'Montenegro', '666730', 'Podgorica', 'Europe'),
(134, 'MG', 'Madagascar', '21281844', 'Antananarivo', 'Africa'),
(135, 'MH', 'Marshall Islands', '65859', 'Majuro', 'Oceania'),
(136, 'MK', 'Macedonia', '2062294', 'Skopje', 'Europe'),
(137, 'ML', 'Mali', '13796354', 'Bamako', 'Africa'),
(138, 'MM', 'Myanmar [Burma]', '53414374', 'Nay Pyi Taw', 'Asia'),
(139, 'MN', 'Mongolia', '3086918', 'Ulan Bator', 'Asia'),
(140, 'MO', 'Macao', '449198', 'Macao', 'Asia'),
(141, 'MP', 'Northern Mariana Islands', '53883', 'Saipan', 'Oceania'),
(142, 'MQ', 'Martinique', '432900', 'Fort-de-France', 'North America'),
(143, 'MR', 'Mauritania', '3205060', 'Nouakchott', 'Africa'),
(144, 'MS', 'Montserrat', '9341', 'Plymouth', 'North America'),
(145, 'MT', 'Malta', '403000', 'Valletta', 'Europe'),
(146, 'MU', 'Mauritius', '1294104', 'Port Louis', 'Africa'),
(147, 'MV', 'Maldives', '395650', 'Malé', 'Asia'),
(148, 'MW', 'Malawi', '15447500', 'Lilongwe', 'Africa'),
(149, 'MX', 'Mexico', '112468855', 'Mexico City', 'North America'),
(150, 'MY', 'Malaysia', '28274729', 'Kuala Lumpur', 'Asia'),
(151, 'MZ', 'Mozambique', '22061451', 'Maputo', 'Africa'),
(152, 'NA', 'Namibia', '2128471', 'Windhoek', 'Africa'),
(153, 'NC', 'New Caledonia', '216494', 'Noumea', 'Oceania'),
(154, 'NE', 'Niger', '15878271', 'Niamey', 'Africa'),
(155, 'NF', 'Norfolk Island', '1828', 'Kingston', 'Oceania'),
(156, 'NG', 'Nigeria', '154000000', 'Abuja', 'Africa'),
(157, 'NI', 'Nicaragua', '5995928', 'Managua', 'North America'),
(158, 'NL', 'Netherlands', '16645000', 'Amsterdam', 'Europe'),
(159, 'NO', 'Norway', '5009150', 'Oslo', 'Europe'),
(160, 'NP', 'Nepal', '28951852', 'Kathmandu', 'Asia'),
(161, 'NR', 'Nauru', '10065', '', 'Oceania'),
(162, 'NU', 'Niue', '2166', 'Alofi', 'Oceania'),
(163, 'NZ', 'New Zealand', '4252277', 'Wellington', 'Oceania'),
(164, 'OM', 'Oman', '2967717', 'Muscat', 'Asia'),
(165, 'PA', 'Panama', '3410676', 'Panama City', 'North America'),
(166, 'PE', 'Peru', '29907003', 'Lima', 'South America'),
(167, 'PF', 'French Polynesia', '270485', 'Papeete', 'Oceania'),
(168, 'PG', 'Papua New Guinea', '6064515', 'Port Moresby', 'Oceania'),
(169, 'PH', 'Philippines', '99900177', 'Manila', 'Asia'),
(170, 'PK', 'Pakistan', '184404791', 'Islamabad', 'Asia'),
(171, 'PL', 'Poland', '38500000', 'Warsaw', 'Europe'),
(172, 'PM', 'Saint Pierre and Miquelon', '7012', 'Saint-Pierre', 'North America'),
(173, 'PN', 'Pitcairn Islands', '46', 'Adamstown', 'Oceania'),
(174, 'PR', 'Puerto Rico', '3916632', 'San Juan', 'North America'),
(175, 'PS', 'Palestine', '3800000', '', 'Asia'),
(176, 'PT', 'Portugal', '10676000', 'Lisbon', 'Europe'),
(177, 'PW', 'Palau', '19907', 'Melekeok - Palau State Capital', 'Oceania'),
(178, 'PY', 'Paraguay', '6375830', 'Asunción', 'South America'),
(179, 'QA', 'Qatar', '840926', 'Doha', 'Asia'),
(180, 'RE', 'Réunion', '776948', 'Saint-Denis', 'Africa'),
(181, 'RO', 'Romania', '21959278', 'Bucharest', 'Europe'),
(182, 'RS', 'Serbia', '7344847', 'Belgrade', 'Europe'),
(183, 'RU', 'Russia', '140702000', 'Moscow', 'Europe'),
(184, 'RW', 'Rwanda', '11055976', 'Kigali', 'Africa'),
(185, 'SA', 'Saudi Arabia', '25731776', 'Riyadh', 'Asia'),
(186, 'SB', 'Solomon Islands', '559198', 'Honiara', 'Oceania'),
(187, 'SC', 'Seychelles', '88340', 'Victoria', 'Africa'),
(188, 'SD', 'Sudan', '35000000', 'Khartoum', 'Africa'),
(189, 'SE', 'Sweden', '9555893', 'Stockholm', 'Europe'),
(190, 'SG', 'Singapore', '4701069', 'Singapore', 'Asia'),
(191, 'SH', 'Saint Helena', '7460', 'Jamestown', 'Africa'),
(192, 'SI', 'Slovenia', '2007000', 'Ljubljana', 'Europe'),
(193, 'SJ', 'Svalbard and Jan Mayen', '2550', 'Longyearbyen', 'Europe'),
(194, 'SK', 'Slovakia', '5455000', 'Bratislava', 'Europe'),
(195, 'SL', 'Sierra Leone', '5245695', 'Freetown', 'Africa'),
(196, 'SM', 'San Marino', '31477', 'San Marino', 'Europe'),
(197, 'SN', 'Senegal', '12323252', 'Dakar', 'Africa'),
(198, 'SO', 'Somalia', '10112453', 'Mogadishu', 'Africa'),
(199, 'SR', 'Suriname', '492829', 'Paramaribo', 'South America'),
(200, 'ST', 'São Tomé and Príncipe', '175808', 'São Tomé', 'Africa'),
(201, 'SV', 'El Salvador', '6052064', 'San Salvador', 'North America'),
(202, 'SY', 'Syria', '22198110', 'Damascus', 'Asia'),
(203, 'SZ', 'Swaziland', '1354051', 'Mbabane', 'Africa'),
(204, 'TC', 'Turks and Caicos Islands', '20556', 'Cockburn Town', 'North America'),
(205, 'TD', 'Chad', '10543464', 'N\'Djamena', 'Africa'),
(206, 'TF', 'French Southern Territories', '140', 'Port-aux-Français', 'Antarctica'),
(207, 'TG', 'Togo', '6587239', 'Lomé', 'Africa'),
(208, 'TH', 'Thailand', '67089500', 'Bangkok', 'Asia'),
(209, 'TJ', 'Tajikistan', '7487489', 'Dushanbe', 'Asia'),
(210, 'TK', 'Tokelau', '1466', '', 'Oceania'),
(211, 'TL', 'East Timor', '1154625', 'Dili', 'Oceania'),
(212, 'TM', 'Turkmenistan', '4940916', 'Ashgabat', 'Asia'),
(213, 'TN', 'Tunisia', '10589025', 'Tunis', 'Africa'),
(214, 'TO', 'Tonga', '122580', 'Nuku\'alofa', 'Oceania'),
(215, 'TR', 'Turkey', '77804122', 'Ankara', 'Asia'),
(216, 'TT', 'Trinidad and Tobago', '1228691', 'Port of Spain', 'North America'),
(217, 'TV', 'Tuvalu', '10472', 'Funafuti', 'Oceania'),
(218, 'TW', 'Taiwan', '22894384', 'Taipei', 'Asia'),
(219, 'TZ', 'Tanzania', '41892895', 'Dodoma', 'Africa'),
(220, 'UA', 'Ukraine', '45415596', 'Kyiv', 'Europe'),
(221, 'UG', 'Uganda', '33398682', 'Kampala', 'Africa'),
(222, 'UM', 'U.S. Minor Outlying Islands', '0', '', 'Oceania'),
(223, 'US', 'United States', '310232863', 'Washington', 'North America'),
(224, 'UY', 'Uruguay', '3477000', 'Montevideo', 'South America'),
(225, 'UZ', 'Uzbekistan', '27865738', 'Tashkent', 'Asia'),
(226, 'VA', 'Vatican City', '921', 'Vatican', 'Europe'),
(227, 'VC', 'Saint Vincent and the Grenadines', '104217', 'Kingstown', 'North America'),
(228, 'VE', 'Venezuela', '27223228', 'Caracas', 'South America'),
(229, 'VG', 'British Virgin Islands', '21730', 'Road Town', 'North America'),
(230, 'VI', 'U.S. Virgin Islands', '108708', 'Charlotte Amalie', 'North America'),
(231, 'VN', 'Vietnam', '89571130', 'Hanoi', 'Asia'),
(232, 'VU', 'Vanuatu', '221552', 'Port Vila', 'Oceania'),
(233, 'WF', 'Wallis and Futuna', '16025', 'Mata-Utu', 'Oceania'),
(234, 'WS', 'Samoa', '192001', 'Apia', 'Oceania'),
(235, 'YE', 'Yemen', '23495361', 'Sanaa', 'Asia'),
(236, 'YT', 'Mayotte', '159042', 'Mamoutzou', 'Africa'),
(237, 'ZA', 'South Africa', '49000000', 'Pretoria', 'Africa'),
(238, 'ZM', 'Zambia', '13460305', 'Lusaka', 'Africa'),
(239, 'ZW', 'Zimbabwe', '11651858', 'Harare', 'Africa');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `recipe_id`, `user_id`, `is_deleted`, `created_date`, `modified_date`) VALUES
(12, 1554816159, 4, 0, 1555419100, 1555419100),
(13, 1554816158, 4, 0, 1555419461, 1555419461),
(14, 1554816161, 1, 0, 1555427593, 1555427593),
(15, 1554816159, 2, 0, 1555722275, 1555722275);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `quantity` float(6,2) NOT NULL,
  `unit_id` int(2) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `recipe_id`, `quantity`, `unit_id`, `is_deleted`, `created_date`, `modified_date`) VALUES
(16, 'Flour', 1554816158, 2.00, 1, 0, 1555353753, 1555353753),
(17, 'Sugar', 1554816158, 2.00, 5, 0, 1555353753, 1555353753),
(18, 'Milk', 1554816158, 2.00, 1, 0, 1555353753, 1555353753),
(19, 'Baking powder', 1554816158, 1.00, 6, 0, 1555353753, 1555353753),
(20, 'New York strip steaks', 1555359154, 12.00, 2, 0, 1555359154, 1555359154),
(21, 'Bread of choice', 1554816159, 2.00, 2, 0, 1555353758, 1555353758),
(22, 'Cheese', 1554816159, 2.00, 2, 0, 1555353758, 1555353758),
(23, 'Ham', 1554816159, 2.00, 2, 0, 1555353758, 1555353758),
(24, 'Smoked Turkey', 1554816159, 2.00, 2, 0, 1555353758, 1555353758),
(25, 'Salmon', 1554816160, 2.00, 7, 0, 1555353777, 1555353777),
(26, ' Fresh flat-leaf parsley', 1554816160, 1.00, 1, 0, 1555353777, 1555353777),
(27, 'Capers', 1554816160, 2.00, 5, 0, 1555353777, 1555353777),
(28, ' Red wine vinegar', 1554816160, 1.00, 5, 0, 1555353777, 1555353777),
(29, 'Lemon juice', 1554816160, 2.00, 5, 0, 1555353777, 1555353777),
(30, 'Extra-virgin Olive Oil', 1554816160, 3.00, 5, 0, 1555353777, 1555353777),
(31, 'Extra-virgin Olive Oil', 1554816161, 1.00, 5, 0, 1555355417, 1555355417),
(32, 'Thyme chopped', 1554816161, 1.00, 6, 0, 1555355417, 1555355417),
(33, 'Garlic', 1554816161, 3.00, 9, 0, 1555355417, 1555355417),
(34, 'Yukon Gold Potatoes ', 1554816161, 1.00, 8, 0, 1555355417, 1555355417),
(35, 'Rosemary', 1554816161, 1.00, 6, 0, 1555355417, 1555355417),
(36, 'Oregano', 1554816161, 1.00, 6, 0, 1555355417, 1555355417),
(37, 'Lean New York Steak strip steaks', 1554816161, 2.00, 7, 0, 1555355417, 1555355417),
(38, 'Flour', 1554816162, 2.00, 1, 0, 1555355679, 1555355679),
(39, 'Baking powder', 1554816162, 1.00, 5, 0, 1555355679, 1555355679),
(40, 'Salt', 1554816162, 0.50, 6, 0, 1555355679, 1555355679),
(41, 'Sugar', 1554816162, 2.00, 5, 0, 1555355679, 1555355679),
(42, 'Eggs', 1554816162, 1.00, 7, 0, 1555355679, 1555355679),
(43, 'Milk', 1554816162, 1.00, 1, 0, 1555355679, 1555355679),
(44, ' Melted butter', 1554816162, 1.25, 1, 0, 1555355679, 1555355679),
(45, 'Whole-grain bread, toasted', 1554816163, 2.00, 2, 0, 1555355680, 1555355680),
(46, 'Mashed avocado', 1554816163, 0.50, 7, 0, 1555355680, 1555355680),
(47, 'Egg ', 1554816163, 1.00, 7, 0, 1555355680, 1555355680),
(48, 'Graham crackers', 1554816174, 2.00, 1, 0, 1555356153, 1555356153),
(49, 'Butter', 1554816174, 0.50, 1, 0, 1555356153, 1555356153),
(50, 'Cream cheese', 1554816174, 5.00, 10, 0, 1555356153, 1555356153),
(51, 'Sugar', 1554816174, 1.00, 1, 0, 1555356153, 1555356153),
(52, 'Eggs', 1554816174, 4.00, 7, 0, 1555356153, 1555356153),
(53, 'Vanilla extract', 1554816174, 1.00, 5, 0, 1555356153, 1555356153),
(54, 'Mango', 1554816175, 2.00, 7, 0, 1555356155, 1555356155),
(55, 'Banana', 1554816175, 1.00, 7, 0, 1555356155, 1555356155),
(56, 'Orange juice', 1554816175, 1.00, 1, 0, 1555356155, 1555356155),
(57, ' Vanilla nonfat yogurt', 1554816175, 1.00, 1, 0, 1555356155, 1555356155),
(58, 'Toor Dal', 1555430167, 1.00, 1, 0, 1555430168, 1555430168),
(59, 'Turmeric Powder', 1555430167, 4.00, 5, 0, 1555430168, 1555430168),
(60, 'Mixed Vegetables', 1555430167, 1.00, 1, 0, 1555430168, 1555430168),
(61, 'Curry Leaves', 1555430167, 6.00, 9, 0, 1555430168, 1555430168),
(62, 'Mustard Seeds', 1555430167, 1.00, 6, 0, 1555430168, 1555430168);

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `details` varchar(200) NOT NULL,
  `step` int(2) NOT NULL,
  `prep_time` int(5) NOT NULL DEFAULT '0',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `recipe_id`, `details`, `step`, `prep_time`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 1554816158, 'Take all ingredients and ..', 1, 0, 0, 1555353753, 1555353753),
(2, 1554816158, 'Bake each waffle', 2, 10, 0, 1555353753, 1555353753),
(3, 1555359154, 'About 20 minutes before grilling, remove the steaks from the refrigerator and let sit, covered, at room temperature.', 1, 20, 0, 1555359154, 1555359154),
(4, 1555359154, 'Heat your grill to high. Brush the steaks on both sides with oil and season liberally with salt and pepper', 2, 0, 0, 1555359154, 1555359154),
(5, 1555359154, 'Mince the shallot and add to a small bowl. Pour the vinegar over the shallots and add a pinch of salt.', 3, 30, 0, 1555359154, 1555359154),
(6, 1554816159, 'Place bread on cookie sheet.', 1, 0, 0, 1555353758, 1555353758),
(7, 1554816159, 'Spread with your desired amount of butter.Place cheese on top of butter.Add ham or turkey.', 2, 0, 0, 1555353758, 1555353758),
(8, 1554816159, 'Broil until tops are bubbly and just beginning to toast.', 3, 7, 0, 1555353758, 1555353758),
(9, 1554816160, 'Preheat the oven to 450 degrees F.', 1, 0, 0, 1555353777, 1555353777),
(10, 1554816160, 'Season salmon with salt and pepper. Place salmon, skin side down, on a non-stick baking sheet or in a non-stick pan with an oven-proof handle. ', 2, 0, 0, 1555353777, 1555353777),
(11, 1554816160, 'Bake until salmon is cooked through.', 3, 20, 0, 1555353777, 1555353777),
(12, 1554816161, 'In a large cast iron skillet over medium high heat, add olive oil and butter, potatoes, garlic, thyme, rosemary and oregano', 1, 0, 0, 1555355417, 1555355417),
(13, 1554816161, 'Turn the skillet to high heat. Add the steaks', 2, 0, 0, 1555355417, 1555355417),
(15, 1554816161, 'Cook the steaks to desired doneness', 3, 20, 0, 1555355417, 1555355417),
(16, 1554816162, 'Preheat the oven to 375 degrees F. Butter muffin pans. Mix the flour, baking powder, salt, and sugar in a large bowl. Add the egg, milk, and butter, stirring only enough to dampen the flour', 1, 0, 0, 1555355679, 1555355679),
(17, 1554816162, ' Spoon into the muffin pans, filling each cup about two-thirds full.', 2, 0, 0, 1555355679, 1555355679),
(18, 1554816162, 'Bake each.', 3, 25, 0, 1555355679, 1555355679),
(21, 1554816163, 'Mash the avocado in a small bowl and season with salt and pepper.', 1, 0, 0, 1555355680, 1555355680),
(22, 1554816163, 'Heat a small nonstick skillet over low heat, spray with oil and gently crack the egg into the skillet. Cook to your preference. ', 2, 5, 0, 1555355680, 1555355680),
(23, 1554816163, 'Place mashed avocado over toast, top with egg, salt and pepper and hot sauce if desired!', 3, 0, 0, 1555355680, 1555355680),
(24, 1554816174, 'Preheat oven to 325 F degrees. ', 1, 0, 0, 1555356153, 1555356153),
(25, 1554816174, 'Add the graham crackers to a food processor and pulse a few times until crumbs form. Add the melted butter and pulse a few more times. ', 2, 0, 0, 1555356153, 1555356153),
(26, 1554816174, 'Beat the cream cheese, sugar, flour, and vanilla in a large bowl until smooth and there are no visible clumps. Mix in the sour cream.', 3, 0, 0, 1555356153, 1555356153),
(27, 1554816174, 'Place the springform pan into a larger roasting pan and fill the pan halfway with boiling water, make sure it doesn\'t go over the foil.', 4, 0, 0, 1555356153, 1555356153),
(28, 1554816174, 'Transfer the big roasting pan into the oven and bake.', 5, 60, 0, 1555356153, 1555356153),
(29, 1554816174, 'Top the cheesecake with the cherry pie filling. Slice and serve.', 6, 0, 0, 1555356153, 1555356153),
(30, 1554816175, 'Mango - peel, seed, and cut into chunks. Peel and chop banana.', 1, 0, 0, 1555356155, 1555356155),
(31, 1554816175, 'Place mango, banana, orange juice, and yogurt in a blender. Blend until smooth.\r\nServe in clear glasses, and drink with a bendy straw! ', 2, 5, 0, 1555356155, 1555356155),
(32, 1555430167, 'Prepare Tamarind Juice, soak 1/2 tablespoon tamarind in 3-tablespoons of hot water for 10-15 minutes, mash it with a spoon and strain it using a sieve and discard the solids.', 1, 15, 0, 1555430167, 1555430167),
(33, 1555430167, 'Add toor dal, turmeric powder and 1 cup water in 3-4 liters capacity steel or aluminum pressure cooker. ', 2, 0, 0, 1555430167, 1555430167),
(34, 1555430167, 'Add mixed vegetables in a small container, place it inside the pressure cooker and close the cooker lid. Pressure cook over medium flame for 3-4 whistles. ', 3, 0, 0, 1555430167, 1555430167),
(35, 1555430167, 'Turn off the flame and allow it to stand until pressure comes down naturally. Open the lid, remove the container of vegetables and mash the dal using spatula or immersion blender.', 4, 0, 0, 1555430167, 1555430167),
(36, 1555430167, 'Heat 1-tablespoon oil in a pan or kadai over medium flame. Add mustard seeds. When they start to splutter, add curry leaves, dry red chilies, asafoetida, and sautÃ© for 10-15 seconds.', 5, 0, 0, 1555430168, 1555430168),
(37, 1555430167, 'Add cooked and mashed dal, boiled vegetables, 1½ cups water and salt.', 6, 0, 0, 1555430168, 1555430168),
(38, 1555430167, 'Turn off the flame. Transfer spicy Sambar into a serving bowl and garnish with finely chopped coriander leaves.', 7, 0, 0, 1555430168, 1555430168);

-- --------------------------------------------------------

--
-- Table structure for table `meal_plans`
--

CREATE TABLE `meal_plans` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL,
  `plan_category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_plans`
--

INSERT INTO `meal_plans` (`id`, `recipe_id`, `date`, `user_id`, `is_deleted`, `created_date`, `modified_date`, `plan_category_id`) VALUES
(1, 1554816158, 1555560000, 1, 0, 1555521461, 1555610659, 4),
(2, 1554816160, 1555905600, 1, 0, 1555616181, 1555616602, 5),
(3, 1554816162, 1556596800, 1, 0, 1555616200, 1555616200, 3),
(4, 1554816161, 1553054400, 1, 0, 1555616230, 1555616230, 3),
(5, 1554816158, 1555473600, 1, 0, 1555616259, 1555616259, 2),
(6, 1554816162, 1558152000, 1, 0, 1555616655, 1555616784, 3),
(7, 1554816163, 1558497600, 1, 0, 1555616765, 1555616765, 1),
(12, 1554816161, 1556337600, 1, 0, 1555624476, 1555624476, 4),
(14, 1554816175, 1556510400, 1, 0, 1555624722, 1555624722, 4),
(16, 1554816161, 1554264000, 1, 1, 1555624743, 1555624743, 3),
(17, 1554816158, 1555646400, 4, 1, 1555625036, 1555625044, 1),
(18, 1554816158, 0, 4, 0, 1555625065, 1555625065, 1),
(19, 1554816158, 1555646400, 4, 0, 1555625083, 1555625083, 1),
(20, 1554816160, 1555473600, 7, 1, 1555634423, 1555634423, 2),
(21, 1554816159, 1554436800, 7, 0, 1555634474, 1555634484, 1),
(22, 1554816162, 1555560000, 7, 0, 1555634520, 1555634520, 1),
(23, 1554816160, 1556337600, 4, 0, 1555715194, 1555715194, 2),
(24, 1554816160, 1555300800, 7, 0, 1555723721, 1555723907, 4),
(25, 1554816160, 1555387200, 7, 0, 1555723800, 1555723810, 4),
(26, 1554816161, 1555387200, 7, 0, 1555723931, 1555723931, 3),
(27, 1554816158, 1557892800, 7, 0, 1555723979, 1555723979, 1),
(28, 1554816160, 1554868800, 7, 1, 1555724352, 1555724352, 1),
(29, 1554816163, 1554868800, 7, 0, 1555724765, 1555724765, 2),
(30, 1555359154, 1555473600, 7, 0, 1555725009, 1555725009, 2);

-- --------------------------------------------------------

--
-- Table structure for table `plan_categories`
--

CREATE TABLE `plan_categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_categories`
--

INSERT INTO `plan_categories` (`id`, `name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Breakfast', 0, 1552696665, 1552696665),
(2, 'Lunch', 0, 1552696665, 1552696665),
(3, 'Dinner', 0, 1552696665, 1552696665),
(4, 'Snacks', 0, 1552696665, 1552696665),
(5, 'Dessert', 0, 1552696665, 1552696665);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` varchar(2000) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `recipe_id`, `user_id`, `rating`, `comment`, `is_deleted`, `created_date`, `modified_date`) VALUES
(6, 1554816175, 4, 5, 'The best mango smoothie I\'ve ever eaten.', 0, 1555624241, 1555624241),
(7, 1554816158, 5, 5, 'I love the recipe. Its so easy to make and taste great!!!', 0, 1555709346, 1555709346),
(8, 1555430167, 5, 4, 'Great Taste', 0, 1555709569, 1555709569);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `category` int(2) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `user_id`, `description`, `category`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1554816158, 'Puff Pastry Waffles', 4, 'Add puff pastry to the list of good things you can snackify in your waffle iron. Although they don\'t puff up as much as oven-baked puff pastry, they turn out crispy on the outside and tender on the inside, and they take only minutes to make. Serve hot or at room temperature with syrup, fruit, Nutella, fruit preserves, or nut butte', 5, 0, 1555353753, 1555353417),
(1554816159, 'Italian French Toast', 4, 'Packed with Italian flavours, this savoury French toast is a nice change from the usual. It makes an excellent brunch or lunch option.', 6, 0, 1555353758, 1555353758),
(1554816160, 'Oven-Baked Salmon', 4, 'Season salmon with salt and pepper. Place salmon, skin side down, on a non-stick baking sheet or in a non-stick pan with an oven-proof handle. Bake until salmon is cooked through, about 12 to 15 minutes. Serve with the Toasted Almond Parsley Salad and squash, if desired.', 7, 0, 1555353777, 1555353777),
(1554816161, 'Skillet Garlic Butter Herb Steak and Potatoes', 4, 'Skillet Garlic Butter Herb Steak and Potatoes is pan seared and cooked to perfection and topped with a garlic herb butter compound.  This is the best steak that I have ever had!!', 8, 0, 1555355417, 1555355417),
(1554816162, 'Best Ever Muffins', 4, 'Start with this basic recipe, and add one of several different ingredients for a variety of different muffins', 9, 0, 1555355679, 1555355679),
(1554816163, 'Avocado Toast', 4, 'Try my avocado sandwich for an exciting flavor twist on grilled cheese. The avocados make them extra creamy', 10, 0, 1555355680, 1555355680),
(1554816174, 'Perfect Cheesecake', 4, 'Perfect Cheesecake does not have to be intimidating! I have created the creamiest, smoothest, easiest cheesecake recipe from scratch that will always turn out perfect. PLUS I have some tips that will guarantee success', 11, 0, 1555356153, 1555356153),
(1554816175, 'Mango Smoothie Recipes', 4, 'This smoothie is so bright, cheerful, and delicious, it is like a blast of sunshine on even the most rainy, windy days!', 12, 0, 1555356155, 1555356155),
(1555359154, 'Perfectly Grilled Steak', 4, 'About 20 minutes before grilling, remove the steaks from the refrigerator and let sit, covered, at room temperature.', 8, 0, 1555359154, 1555359154),
(1555430167, 'Idli Sambhar', 5, 'Type of savoury rice cake with curry', 5, 0, 1555430167, 1555430167);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_images`
--

CREATE TABLE `recipe_images` (
  `id` int(10) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `path` varchar(100) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modied_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_requests`
--

CREATE TABLE `recipe_requests` (
  `id` int(6) NOT NULL,
  `user_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_requests`
--

INSERT INTO `recipe_requests` (`id`, `user_id`, `title`, `description`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 4, 'Apple Pie', 'I am looking for the most delicious apple pie. Sweet\r\n', 0, 1555361566, 1555361566),
(4, 4, 'Tuna Salad', 'I&#39;m looking for the best tuna salad recipe.', 0, 1555381832, 1555381832),
(5, 4, 'Cherry tart', 'I am looking for a cherry tart recipe.', 1, 1555607517, 1555607517),
(6, 4, 'Cherry tart', 'I would like to ..', 0, 1555727206, 1555727206);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `recipe_id`, `user_id`, `comment`, `is_deleted`, `created_date`, `modified_date`) VALUES
(13, 1554816158, 1, 'test', 1, 1555347899, 1555347899),
(14, 1554816158, 1, 'very cools', 1, 1555347903, 1555426493),
(15, 1554816158, 1, 'test', 1, 1555347908, 1555347908),
(16, 1554816158, 1, 'hi', 1, 1555349331, 1555349331),
(17, 1554816158, 1, 'hilo', 0, 1555349386, 1555427366),
(18, 1554816159, 1, 'HAY', 0, 1555349415, 1555349415),
(19, 1554816174, 4, 'Test', 0, 1555380966, 1555380966),
(24, 1554816158, 1, 'hi', 0, 1555423832, 1555423832),
(25, 1554816158, 1, 'Delicious', 0, 1555423908, 1555428037),
(26, 1554816175, 4, 'Test', 1, 1555424021, 1555424021),
(27, 1554816175, 4, 'Test', 1, 1555424258, 1555424258),
(28, 1554816159, 4, 'Muffins', 1, 1555424637, 1555424637),
(29, 1554816158, 1, 'testing again', 0, 1555424792, 1555424792),
(30, 1554816158, 1, 'hay', 0, 1555424903, 1555424903),
(31, 1554816159, 4, 'It&#39;s amazing', 0, 1555431252, 1555431252),
(32, 1554816158, 7, 'test', 0, 1555727454, 1555727454),
(33, 1554816175, 7, 'Test', 0, 1555727479, 1555727479);

-- --------------------------------------------------------

--
-- Table structure for table `result_images`
--

CREATE TABLE `result_images` (
  `id` int(10) NOT NULL,
  `result_id` int(6) NOT NULL,
  `path` varchar(100) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modied_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Cups', 0, 2147483647, 2147483647),
(2, 'Slices', 0, 2147483647, 2147483647),
(3, 'Ml', 0, 2147483647, 2147483647),
(4, 'Grams', 0, 2147483647, 2147483647),
(5, 'Table Spoon', 0, 2147483647, 2147483647),
(6, 'Tea Spoon', 0, 2147483647, 2147483647),
(7, 'Piece', 0, 1555353753, 1555353753),
(8, 'Pound', 0, 1555353777, 1555353777),
(9, 'Nos', 0, 1555353777, 1555353777),
(10, 'Oz', 0, 1555353777, 1555353777);

-- --------------------------------------------------------

--
-- Table structure for table `usermessages`
--

CREATE TABLE `usermessages` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `current_userid` int(11) NOT NULL,
  `user_message` varchar(2000) NOT NULL,
  `sent_date` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usermessages`
--

INSERT INTO `usermessages` (`id`, `author_id`, `current_userid`, `user_message`, `sent_date`) VALUES
(1, 1, 2, 'amann', 1555096135);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `last_login` int(10) NOT NULL,
  `role` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `last_login`, `role`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'johnsmith@testmail.com', '$2y$10$bS9WqPXCx49enGjHnfOU7.ZrR6YQb5oCYiEznnvCECwcyYvBEIa0u', 'John', 'Smith', 1555730230, 1, 0, 2147483647, 2147483647),
(2, 'test@test.com', '$2y$10$uo3MXEaAWqGV/oMeXp0AeOtU5yAZzKiFkfb3NLjkdLNmDu24mTkmG', 'Test', 'Test', 1555722254, 2, 1, 1554906839, 1554906874),
(3, 'tes2@gmail.com', '$2y$10$a4desSbK2kQU18GcOLsSoOCD8MEIfkAt5yM88Z4jkOwYXLQrGgCRO', 'test2', 'test', 1554911883, 2, 0, 1554911853, 1554911853),
(4, 'sam@mail.com', '$2y$10$oL4BYpGDiBLS3RVzfzYileowXHpHBd.7xjqYhKy.y3MsbpwTKx7QG', 'Sam', 'Smith', 1555726358, 2, 0, 1555356280, 1555356280),
(5, 'erbirindersingh@gmail.com', '$2y$10$Mq6ZJ8u9Ozrsy1ztgwLk/eZPG2tSTgN8ZpM3xl0mTDFSS2WubfQly', 'Birinder', 'Singh', 1555730337, 2, 0, 1555356280, 1555356280),
(6, 'test@test3.com', '$2y$10$bOlWTqdwudNaNpjLNPMto.DZMIS/e1Lc5MXK1jMTJFvMyZOtB6IZO', 'Testy', 'Test', 0, 2, 0, 1555604946, 1555604946),
(7, 'bobjim@test.com', '$2y$10$OXJLaVIqcKOOTOl0RmLLBewxDd17e3YX6mnVoeuzHUjtonpfS6upu', 'Bob', 'Jim', 1555719989, 2, 0, 1555634194, 1555634194);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentrecipe` (`recipe_id`),
  ADD KEY `commentauthor` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`idCountry`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favouriterecipe` (`recipe_id`),
  ADD KEY `favouriteuser` (`user_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredientrecipe` (`recipe_id`),
  ADD KEY `ingredientunit` (`unit_id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructionrecipe` (`recipe_id`);

--
-- Indexes for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mealpanrecipe` (`recipe_id`),
  ADD KEY `mealpanuser` (`user_id`),
  ADD KEY `mealplancategory` (`plan_category_id`);

--
-- Indexes for table `plan_categories`
--
ALTER TABLE `plan_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratinguser` (`user_id`),
  ADD KEY `ratingrecipe` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipeauthor` (`user_id`),
  ADD KEY `recipecategory` (`category`);

--
-- Indexes for table `recipe_images`
--
ALTER TABLE `recipe_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipeimagerecipe` (`recipe_id`);

--
-- Indexes for table `recipe_requests`
--
ALTER TABLE `recipe_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requestrecipeuser` (`user_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultrecipe` (`recipe_id`),
  ADD KEY `resultuser` (`user_id`);

--
-- Indexes for table `result_images`
--
ALTER TABLE `result_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultimagesresult` (`result_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermessages`
--
ALTER TABLE `usermessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `idCountry` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `meal_plans`
--
ALTER TABLE `meal_plans`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `plan_categories`
--
ALTER TABLE `plan_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1555430168;

--
-- AUTO_INCREMENT for table `recipe_images`
--
ALTER TABLE `recipe_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe_requests`
--
ALTER TABLE `recipe_requests`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `result_images`
--
ALTER TABLE `result_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usermessages`
--
ALTER TABLE `usermessages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `commentauthor` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `commentrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favouriterecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `favouriteuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredientrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `ingredientunit` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `instructions`
--
ALTER TABLE `instructions`
  ADD CONSTRAINT `instructionrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD CONSTRAINT `mealplancategory` FOREIGN KEY (`plan_category_id`) REFERENCES `plan_categories` (`id`),
  ADD CONSTRAINT `mealplanrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `mealplanuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratingrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `ratinguser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipeauthor` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `recipecategory` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `recipe_images`
--
ALTER TABLE `recipe_images`
  ADD CONSTRAINT `recipeimagerecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `recipe_requests`
--
ALTER TABLE `recipe_requests`
  ADD CONSTRAINT `requestrecipeuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `resultrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `resultuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `result_images`
--
ALTER TABLE `result_images`
  ADD CONSTRAINT `resultimagesresult` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`);
--
-- Database: `innodb`
--
CREATE DATABASE IF NOT EXISTS `innodb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `innodb`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

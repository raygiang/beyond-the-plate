-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 04:23 PM
-- Server version: 10.1.34-MariaDB
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
-- Database: `cookbook`
--

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
(1, 'Salads', 0, 2147483647, 2147483647),
(2, 'Burgers', 0, 2147483647, 2147483647);

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
  `modied_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'India', 1554050741, 11.00, 2, 0, 1554050741, 1554050741),
(2, 'Pakistan', 1554050741, 2.00, 1, 0, 1554050741, 1554050741),
(3, 'Sri Lanka', 1554050741, 5.00, 3, 0, 1554050741, 1554050741),
(4, 'United Arab Emirates', 1554050741, 3.00, 4, 0, 1554050741, 1554050741),
(5, 'Mayotte', 1554050741, 3.00, 5, 0, 1554050741, 1554050741),
(6, 'United States', 1554050741, 3.00, 6, 0, 1554050741, 1554050741),
(7, 'Canada', 1554742010, 2.00, 2, 0, 1554742010, 1554742010),
(8, 'United Arab Emirates', 1554742010, 3.00, 2, 0, 1554742010, 1554742010),
(9, 'Central African Republic', 1554748754, 4.00, 3, 0, 1554748755, 1554748755),
(10, 'India', 1554748807, 4.00, 4, 0, 1554748808, 1554748808),
(11, 'Japan', 1554748807, 4.00, 4, 0, 1554748808, 1554748808),
(12, 'British Indian Ocean Territory', 1554755892, 4.00, 1, 0, 1554755892, 1554755892),
(13, 'Nepal', 1554755892, 4.00, 4, 0, 1554755892, 1554755892),
(14, 'British Indian Ocean Territory', 1554816157, 4.00, 4, 0, 1554816158, 1554816158),
(15, 'Canada', 1554816157, 4.00, 4, 0, 1554816158, 1554816158);

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `details` varchar(200) NOT NULL,
  `step` int(2) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `recipe_id`, `details`, `step`, `is_deleted`, `created_date`, `modified_date`) VALUES
(5, 1554050741, '1st Instruction', 1, 0, 1554050741, 1554050741),
(6, 1554050741, '2nd Instruction', 2, 0, 1554050741, 1554050741),
(7, 1554050741, '3rd instruction', 3, 0, 1554050741, 1554050741),
(8, 1554742010, '1st Instruction', 1, 0, 1554742010, 1554742010),
(9, 1554742010, '2nd Instruction', 2, 0, 1554742010, 1554742010),
(10, 1554742010, '3rd instruction', 3, 0, 1554742010, 1554742010),
(11, 1554748754, '3rd instruction', 1, 0, 1554748754, 1554748754),
(12, 1554748807, '3rd instruction', 1, 0, 1554748807, 1554748807),
(13, 1554755892, '3rd instruction', 1, 0, 1554755892, 1554755892),
(14, 1554755892, '1st Instruction', 2, 0, 1554755892, 1554755892),
(15, 1554816157, '2nd Instruction', 1, 0, 1554816158, 1554816158),
(16, 1554816157, '3rd instruction', 2, 0, 1554816158, 1554816158),
(17, 1554816157, '2nd Instruction', 3, 0, 1554816158, 1554816158),
(18, 1554816157, '1', 4, 0, 1554816158, 1554816158);

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
(1, 'Breakfast', 0, 1552696665, 1552696665);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `rating` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1554050741, 'Test Recipe Test Recipe Test Recipe Test Recipe Test Recipe Test Recipe Test Recipe Test Recipe \r\n', 1, 'Demo Test Recipe', 1, 0, 1554050741, 1554050741),
(1554742010, 'Demo', 1, 'Demo Description', 2, 0, 1554742010, 1554742010),
(1554748754, 'Test', 1, 'Test Description', 1, 0, 1554748754, 1554748754),
(1554748807, 'Test', 1, 'Test Description', 2, 0, 1554748807, 1554748807),
(1554755892, 'Test', 1, 'Test Description', 1, 0, 1554755892, 1554755892),
(1554816157, 'Demo', 1, 'Demo', 2, 0, 1554816157, 1554816157);

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
  `unit_name` varchar(50) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'cups', 0, 2147483647, 2147483647),
(2, 'slices', 0, 2147483647, 2147483647),
(3, 'ml', 0, 2147483647, 2147483647),
(4, 'grams', 0, 2147483647, 2147483647),
(5, 'table spoon', 0, 2147483647, 2147483647),
(6, 'tea spoon', 0, 2147483647, 2147483647);

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
(1, 'johnsmith@testmail.com', '$2y$10$7L03lvIR/dWMy2BkPxFd4OYPSNmp82MmCYIA8F7OUw8EJAavxom1q', 'John', 'Smith', 1554903987, 2, 0, 2147483647, 2147483647);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `idCountry` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `meal_plans`
--
ALTER TABLE `meal_plans`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan_categories`
--
ALTER TABLE `plan_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1554816158;

--
-- AUTO_INCREMENT for table `recipe_images`
--
ALTER TABLE `recipe_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipe_requests`
--
ALTER TABLE `recipe_requests`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result_images`
--
ALTER TABLE `result_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

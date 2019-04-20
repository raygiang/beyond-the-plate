
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

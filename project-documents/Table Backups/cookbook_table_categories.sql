
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

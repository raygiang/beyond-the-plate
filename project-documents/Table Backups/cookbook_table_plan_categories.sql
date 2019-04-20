
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

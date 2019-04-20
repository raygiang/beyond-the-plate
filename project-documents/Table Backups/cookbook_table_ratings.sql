
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

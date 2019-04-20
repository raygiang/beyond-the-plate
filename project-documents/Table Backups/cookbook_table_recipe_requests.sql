
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

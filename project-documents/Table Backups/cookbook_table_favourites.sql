
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

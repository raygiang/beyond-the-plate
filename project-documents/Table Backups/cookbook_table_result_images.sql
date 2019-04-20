
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

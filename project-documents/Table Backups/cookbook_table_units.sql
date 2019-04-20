
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


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


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
(1, 'johnsmith@testmail.com', '$2y$10$bS9WqPXCx49enGjHnfOU7.ZrR6YQb5oCYiEznnvCECwcyYvBEIa0u', 'John', 'Smith', 1555730230, 1, 0, 2147483647, 2147483647),
(2, 'test@test.com', '$2y$10$uo3MXEaAWqGV/oMeXp0AeOtU5yAZzKiFkfb3NLjkdLNmDu24mTkmG', 'Test', 'Test', 1555722254, 2, 1, 1554906839, 1554906874),
(3, 'tes2@gmail.com', '$2y$10$a4desSbK2kQU18GcOLsSoOCD8MEIfkAt5yM88Z4jkOwYXLQrGgCRO', 'test2', 'test', 1554911883, 2, 0, 1554911853, 1554911853),
(4, 'sam@mail.com', '$2y$10$oL4BYpGDiBLS3RVzfzYileowXHpHBd.7xjqYhKy.y3MsbpwTKx7QG', 'Sam', 'Smith', 1555726358, 2, 0, 1555356280, 1555356280),
(5, 'erbirindersingh@gmail.com', '$2y$10$Mq6ZJ8u9Ozrsy1ztgwLk/eZPG2tSTgN8ZpM3xl0mTDFSS2WubfQly', 'Birinder', 'Singh', 1555730337, 2, 0, 1555356280, 1555356280),
(6, 'test@test3.com', '$2y$10$bOlWTqdwudNaNpjLNPMto.DZMIS/e1Lc5MXK1jMTJFvMyZOtB6IZO', 'Testy', 'Test', 0, 2, 0, 1555604946, 1555604946),
(7, 'bobjim@test.com', '$2y$10$OXJLaVIqcKOOTOl0RmLLBewxDd17e3YX6mnVoeuzHUjtonpfS6upu', 'Bob', 'Jim', 1555719989, 2, 0, 1555634194, 1555634194);

-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 02:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cookbook`
--

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
(1, 'Salads', 0, 2147483647, 2147483647),
(2, 'Burgers', 0, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `recipe_id`, `comment`, `user_id`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 1, 'It\'s amazing!', 1, 0, 2147483647, 2147483647);

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
  `modied_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`id`, `recipe_id`, `user_id`, `is_deleted`, `created_date`, `modied_date`) VALUES
(1, 2, 1, 0, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `quantity` float(6,2) NOT NULL,
  `unit_id` int(2) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `recipe_id`, `quantity`, `unit_id`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Lettuce', 2, 2.00, 1, 0, 2147483647, 2147483647),
(2, 'Cheese', 1, 2.00, 2, 0, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `details` varchar(200) NOT NULL,
  `step` int(2) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `recipe_id`, `details`, `step`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 2, 'Wash the lettuce.', 1, 0, 8388607, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `meal_plans`
--

CREATE TABLE `meal_plans` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `date` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL,
  `plan_category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_plans`
--

INSERT INTO `meal_plans` (`id`, `recipe_id`, `date`, `user_id`, `is_deleted`, `created_date`, `modified_date`, `plan_category_id`) VALUES
(1, 1, 1553167228, 1, 0, 1553167228, 1553167228, 3),
(2, 2, 1552021200, 1, 0, 1552029628, 1553298831, 1),
(3, 1, 1547787600, 1, 0, 1550793733, 1553298934, 2),
(4, 1, 1550224933, 1, 1, 1550793733, 1550793733, 2),
(5, 2, 1553140800, 1, 0, 1553167228, 1553300126, 2),
(6, 1, 1553167228, 1, 0, 1553167228, 1553167228, 1),
(7, 1, 1543744933, 1, 0, 1543744933, 1543744933, 3),
(8, 2, 1551330000, 1, 0, 1553299664, 1553299685, 2),
(9, 2, 1555387200, 1, 0, 1553299685, 1553299707, 2);

-- --------------------------------------------------------

--
-- Table structure for table `plan_categories`
--

CREATE TABLE `plan_categories` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan_categories`
--

INSERT INTO `plan_categories` (`id`, `category`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Breakfast', 0, 1552696665, 1552696665),
(2, 'Lunch', 0, 1552029628, 1552029628),
(3, 'Dinner', 0, 1552029628, 1552029628);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(6) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `rating` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `recipe_id`, `user_id`, `rating`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 1, 1, 5, 0, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `category` int(2) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `user_id`, `description`, `category`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'Cheeseburger', 1, 'Burger with cheese', 2, 0, 2147483647, 2147483647),
(2, 'Caesar Salad', 1, 'Lots of vegetables.', 1, 0, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_images`
--

CREATE TABLE `recipe_images` (
  `id` int(10) NOT NULL,
  `recipe_id` int(10) NOT NULL,
  `path` varchar(100) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modied_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_images`
--

INSERT INTO `recipe_images` (`id`, `recipe_id`, `path`, `is_deleted`, `created_date`, `modied_date`) VALUES
(1, 1, 'images/recipes/cheeseburger.jpg', 0, 2147483647, 2147483647);

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
(1, 1, 'Chicken Noodle Soup', 'I would like a recipe for some delicious chicken noodle soup.', 0, 2147483647, 2147483647);

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
(1, 2, 1, 'My Results!', 0, 2147483647, 2147483647);

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

--
-- Dumping data for table `result_images`
--

INSERT INTO `result_images` (`id`, `result_id`, `path`, `is_deleted`, `created_date`, `modied_date`) VALUES
(1, 1, 'images/results/salad01.jpg', 0, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(2) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_date` int(10) NOT NULL,
  `modified_date` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `is_deleted`, `created_date`, `modified_date`) VALUES
(1, 'cups', 0, 2147483647, 2147483647),
(2, 'slices', 0, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
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
(1, 'johnsmith@testmail.com', 'password', 'John', 'Smith', 2147483647, 1, 0, 2147483647, 2147483647),
(2, 'bobjim@testmail.ca', 'testpass', 'Bob', 'Jim', 1550793733, 2, 0, 1550793733, 1550793733);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentrecipe` (`recipe_id`),
  ADD KEY `commentauthor` (`user_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favouriterecipe` (`recipe_id`),
  ADD KEY `favouriteuser` (`user_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ingredientrecipe` (`recipe_id`),
  ADD KEY `ingredientunit` (`unit_id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructionrecipe` (`recipe_id`);

--
-- Indexes for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mealpanrecipe` (`recipe_id`),
  ADD KEY `mealpanuser` (`user_id`),
  ADD KEY `mealplancategory` (`plan_category_id`);

--
-- Indexes for table `plan_categories`
--
ALTER TABLE `plan_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratinguser` (`user_id`),
  ADD KEY `ratingrecipe` (`recipe_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipeauthor` (`user_id`),
  ADD KEY `recipecategory` (`category`);

--
-- Indexes for table `recipe_images`
--
ALTER TABLE `recipe_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipeimagerecipe` (`recipe_id`);

--
-- Indexes for table `recipe_requests`
--
ALTER TABLE `recipe_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requestrecipeuser` (`user_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultrecipe` (`recipe_id`),
  ADD KEY `resultuser` (`user_id`);

--
-- Indexes for table `result_images`
--
ALTER TABLE `result_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultimagesresult` (`result_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meal_plans`
--
ALTER TABLE `meal_plans`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plan_categories`
--
ALTER TABLE `plan_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recipe_images`
--
ALTER TABLE `recipe_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recipe_requests`
--
ALTER TABLE `recipe_requests`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result_images`
--
ALTER TABLE `result_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `commentauthor` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `commentrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favouriterecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `favouriteuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredientrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `ingredientunit` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `instructions`
--
ALTER TABLE `instructions`
  ADD CONSTRAINT `instructionrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD CONSTRAINT `mealplancategory` FOREIGN KEY (`plan_category_id`) REFERENCES `plan_categories` (`id`),
  ADD CONSTRAINT `mealplanrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `mealplanuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratingrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `ratinguser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipeauthor` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `recipecategory` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `recipe_images`
--
ALTER TABLE `recipe_images`
  ADD CONSTRAINT `recipeimagerecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`);

--
-- Constraints for table `recipe_requests`
--
ALTER TABLE `recipe_requests`
  ADD CONSTRAINT `requestrecipeuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `resultrecipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  ADD CONSTRAINT `resultuser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `result_images`
--
ALTER TABLE `result_images`
  ADD CONSTRAINT `resultimagesresult` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

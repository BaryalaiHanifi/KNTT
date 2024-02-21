-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 12:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(20, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(22, 'Baryalai', 'baryalaihanif', '249a0fde4dee485fe60e3ea6ade299f5'),
(25, 'Haseb', 'Hasib123', '1adbb3178591fd5bb0c248518f39bf6d');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `recipe_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `image_name`, `featured`, `recipe_id`) VALUES
(7, 'Italian-Bruschetta', 'Difficulty:Easy\r\nCalories:213\r\nFat:14gr\r\nCarbs:20gr\r\nProtein:4gr', 'Food_Name_1921.jpeg', 'Yes', 17),
(9, 'French-Tart', 'Difficulty:Hard\r\nCalories:400\r\nFat:12gr\r\nCholesterol:6mg\r\nSugar:100gr', 'Food_Name_2197.jpeg', 'Yes', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foodrecipe`
--

CREATE TABLE `tbl_foodrecipe` (
  `id` int(11) NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ingridents` text DEFAULT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_foodrecipe`
--

INSERT INTO `tbl_foodrecipe` (`id`, `title`, `description`, `ingridents`, `food_id`) VALUES
(20, 'Italian-Bruschetta', 'Bruschetta is one of the simplest and quickest things in the world to make, yet it can be fantastically delicious if you use high-quality ingredients.', 'Ingredients(serves four) 2 to 3 tomatoes(good quality and ripe, or cherry tomatoes:chopped).4 tablespoons olive oil(high-quality).4 slices of Tuscan bread (or any other rustic).1 clove garlic (peeled, sliced in half).Garnish: salt(coarse, flaky; to taste).Prep: 15 min Cook: 5 min Total: 20 min', 7),
(22, 'Spanish Migas', 'Some discription', 'some ingridents', 9),
(23, 'lajdlfkj lobia', 'adfjslkdfjldkjf', 'romi ,pyas', 10),
(24, '', 'some test', 'test', 9),
(25, '', 'some test', 'test', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recipe`
--

CREATE TABLE `tbl_recipe` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_recipe`
--

INSERT INTO `tbl_recipe` (`id`, `title`, `image_name`, `featured`) VALUES
(18, 'Main-Courses', 'Food_Category_655.jpeg', 'Yes'),
(19, 'Desserts', 'Food_Category_940.jpeg', 'Yes'),
(20, 'Main Course', 'Food_Category_111.jpeg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_step`
--

CREATE TABLE `tbl_step` (
  `id` int(11) NOT NULL,
  `step` text DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `foodrecipe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_step`
--

INSERT INTO `tbl_step` (`id`, `step`, `image`, `foodrecipe_id`) VALUES
(6, '01.Gather the ingredients.', 'Food_Step_104.webp', 20),
(7, '02. Combine the chopped tomatoes and half of the olive oil in a bowl and toss, marinate the tomatoies for about 10 minutes at room temprature.', 'Food_Step_966.webp', 20),
(9, '03. Toast the bread slices on a charcoal grill until golden-brown and lightly marked with grill lines, you can also toast them in an oven or toaster, or on al griddle or grill pan, if charcoal grilling is not possible.', 'Food_Step_604.webp', 20),
(10, '04. Gently rub the grilled slices of bread with the cut end of the raw garlic clove.', 'Food_Step_538.webp', 20),
(13, '01.This step is for check        				', 'Food_Step_935.jpeg', 22),
(14, '        romi tota kn				', 'Food_Step_429.png', 23),
(15, 'roghan parto', 'Food_Step_142.png', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_name`, `user_email`, `message`) VALUES
(4, 'abdulrouf', 'baryalai.hanifi2000@gmail.com', 'some messages'),
(5, 'Hasib', 'hasib123@gmail.com', 'lobia tan kharab ast'),
(6, 'aldfj', 'baryalai.hanifi2000@gmail.com', 'dfasdfsdfsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_foodrecipe`
--
ALTER TABLE `tbl_foodrecipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_recipe`
--
ALTER TABLE `tbl_recipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_step`
--
ALTER TABLE `tbl_step`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_foodrecipe`
--
ALTER TABLE `tbl_foodrecipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_recipe`
--
ALTER TABLE `tbl_recipe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_step`
--
ALTER TABLE `tbl_step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

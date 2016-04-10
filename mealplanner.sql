-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2016 at 05:03 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mealplanner`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`) VALUES
(1, 'Ben Kenawell', 'bjk5377@psu.edu'),
(2, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_meal`
--

CREATE TABLE IF NOT EXISTS `customer_meal` (
`id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer_meal`
--

INSERT INTO `customer_meal` (`id`, `customer_id`, `food_id`) VALUES
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `food_ingredient`
--

CREATE TABLE IF NOT EXISTS `food_ingredient` (
`id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `ingredient_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `food_ingredient`
--

INSERT INTO `food_ingredient` (`id`, `food_id`, `amount`, `ingredient_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 1, 1, 4),
(5, 2, 1, 5),
(6, 2, 1, 6),
(7, 2, 1, 7),
(8, 2, 1, 8),
(9, 3, 1, 9),
(10, 3, 1, 13),
(11, 3, 1, 10),
(12, 3, 3, 11),
(13, 3, 2, 12),
(14, 3, 1, 3),
(15, 3, 1, 4),
(16, 4, 2, 14),
(17, 4, 1, 15),
(18, 4, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
`id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ingredient`
--

INSERT INTO `ingredient` (`id`, `name`) VALUES
(1, 'hot dog'),
(2, 'hot dog bun'),
(3, 'ketchup'),
(4, 'mustard (optional)'),
(5, 'pizza dough'),
(6, 'tomato sauce'),
(7, 'mozzarella cheese'),
(8, 'pepperoni (optional)'),
(9, 'hamburger'),
(10, 'cheese (optional)'),
(11, 'lettuce'),
(12, 'tomato slice'),
(13, 'hamburger bun'),
(14, 'bread slice'),
(15, 'peanut butter'),
(16, 'jelly');

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE IF NOT EXISTS `meal` (
`id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `photo_path` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `name`, `photo_path`) VALUES
(1, 'Hot Dog', 'hotdog.jpg'),
(2, 'Pizza', 'pizza.jpg'),
(3, 'Burger', 'burger.jpg'),
(4, 'Peanut Butter and Jelly', 'pbj.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_meal`
--
ALTER TABLE `customer_meal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_ingredient`
--
ALTER TABLE `food_ingredient`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_meal`
--
ALTER TABLE `customer_meal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `food_ingredient`
--
ALTER TABLE `food_ingredient`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

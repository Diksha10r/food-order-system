-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2021 at 06:57 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(18, 'Diksha Rawat', 'diksha10', 'e2fb889d6376a095a9d634d8520482ed');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(24, 'Noodles', 'Food_Category_583.jpg', 'Yes', 'Yes'),
(28, 'Pasta', 'Food_Category_694.jpg', 'Yes', 'Yes'),
(26, 'Burger', 'Food_Category_857.jpg', 'Yes', 'Yes'),
(27, 'Drinks', 'Food_Category_385.jpg', 'Yes', 'Yes'),
(29, 'Pizza', 'Food_Category_538.jpg', 'Yes', 'Yes'),
(30, 'Momos', 'Food_Category_132.jpg', 'Yes', 'Yes'),
(31, 'Biryani', 'Food_Category_224.jpg', 'Yes', 'Yes'),
(32, 'Fried Chicken', 'Food_Category_296.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(15, 'Chicken Noodles', 'Smoky Chicken with Hot and Spicy Noodles', '120', 'Food-Name-958.jpg', 24, 'Yes', 'Yes'),
(14, 'Jajangmyeon', 'Korean Spicy Black Bean Noodles', '220', 'Food-Name-1604.jpg', 24, 'Yes', 'Yes'),
(17, 'Japanese Ramen', 'Authentic Japanese Ramen with egg, pork, mushrooms and lot of vegetables', '400', 'Food-Name-5985.jpg', 24, 'Yes', 'Yes'),
(18, 'Jjamppong', 'Like sea food and Noodles too!! try authentic Korean sea food noodles.', '323', 'Food-Name-9011.jpg', 24, 'Yes', 'Yes'),
(19, 'Paneer Noodles', 'Spicy grilled paneer maggie noodles.', '200', 'Food-Name-2815.JPG', 24, 'Yes', 'Yes'),
(20, 'Baked Pasta', 'Red sauce, Cheese and veggies', '230', 'Food-Name-9243.jpeg', 28, 'Yes', 'Yes'),
(25, 'Chicken Alfredo Pasta', 'Chicken Pieces with white sauce', '220', 'Food-Name-931.jpg', 28, 'Yes', 'Yes'),
(26, 'Four Cheese Pasta', 'Pasta made with four different types of cheese - Parmesan, Cheddar, Brie and Emmental.', '280', 'Food-Name-746.jpg', 28, 'Yes', 'Yes'),
(27, 'Lasagna', 'Layer after layer of cheesy explosion and delicious meat, this comes quite close to heaven.', '300', 'Food-Name-640.jpg', 28, 'Yes', 'Yes'),
(28, 'Red Sauce Pasta', 'The Classic, spicy and hot Red Sauce Pasta ', '100', 'Food-Name-988.jpg', 28, 'Yes', 'Yes'),
(29, 'White Sauce Pasta', 'The classic white sauce pasta with lots of cheese.', '120', 'Food-Name-12.jpg', 28, 'Yes', 'Yes'),
(30, 'Bacon Burger on Brioche Buns', 'The burger is a custom blend of ground prime rib, brisket, skirt steak and tenderloin, topped with Nueskeâ€™s bacon and Cowgirl Creameryâ€™s triple-cream Mt. Tam cheese.', '200', 'Food-Name-682.jfif', 26, 'Yes', 'Yes'),
(31, 'Umami Burger', 'Resist the urge to pile on any of the usual toppingsâ€”lettuce, tomato, ketchup.', '220', 'Food-Name-154.jpg', 26, 'Yes', 'Yes'),
(32, 'Green-Chile Burgers with Fried Eggs', 'The green chile adds a touch of exciting flavor to these burgers with sunny side-up egg and chicken tikki.', '250', 'Food-Name-570.jpg', 26, 'Yes', 'Yes'),
(33, 'Beef Burger with Peanut-Chipotle Barbecue Sauce', 'extremely good barbecue sauce, smoky chile-ancho chile powder and chipotle in adobo sauce and peanut butter for sweetness.', '190', 'Food-Name-589.jpg', 26, 'Yes', 'Yes'),
(34, 'Chile-Stuffed Cheese Burger', 'The gooey filling is made with melted cheese and roasted chiles.', '160', 'Food-Name-435.jpg', 26, 'Yes', 'Yes'),
(35, 'Margarita', 'A sour cocktail consisting of tequila, triple sec and lime or lemon juice.', '100', 'Food-Name-823.jpg', 27, 'Yes', 'Yes'),
(36, 'Long Island Iced Tea', 'tequila, light rum, gin and cola that gives it a nice and soothing amber hue.', '200', 'Food-Name-917.jpg', 27, 'Yes', 'Yes'),
(37, 'Soju', 'Clear, colorless distilled alcoholic beverage, alcohol content 16.8% to 53%', '300', 'Food-Name-11.jpg', 27, 'Yes', 'Yes'),
(38, 'Sake', 'Light in colour, is noncarbonated, has a sweet flavour, and contains about 14 to 16 percent alcohol.', '300', 'Food-Name-944.jpg', 27, 'Yes', 'Yes'),
(39, 'Beer', 'An alcoholic beverage made by brewing and fermentation from cereals, usually malted barley, and flavored with hops and the like for a slightly bitter taste.', '200', 'Food-Name-750.jfif', 27, 'Yes', 'Yes'),
(40, 'Chicago Thin Crust Pizza', 'spicy sauce, large amounts of meat, and is cut into strips or squares with crispiest crust', '200', 'Food-Name-554.png', 29, 'Yes', 'Yes'),
(41, 'Greek Style Pizza', 'Greek ingredients, such as feta, artichokes, and kalamata olives, as well as an oregano-heavy tomato sauce', '290', 'Food-Name-642.jpg', 29, 'Yes', 'Yes'),
(42, 'The Original Neapolitan', 'The crust is thin, crunchy, and baked in a wood-fired oven, with San Marzano tomato sauce, buffalo mozzarella cheese, and basil', '230', 'Food-Name-115.jpg', 29, 'Yes', 'Yes'),
(43, 'Margarita Pizza', 'The classic Margarita Pizza with cheese and thin crust', '180', 'Food-Name-6.jpg', 29, 'Yes', 'Yes'),
(44, 'Steamed Momo', 'Lots of veggies and served with tomato sauce and green chutney', '100', 'Food-Name-151.jpg', 30, 'Yes', 'Yes'),
(45, 'Fried Momo', 'Veg pan fried momos served with salad and green chutney', '130', 'Food-Name-206.jpg', 30, 'Yes', 'Yes'),
(46, 'Tandoori Momo', 'Veg tandoori momo served with green chutney and salad', '150', 'Food-Name-369.jpg', 30, 'Yes', 'Yes'),
(47, 'Green Momo', 'Green Momo is served with mayonnaise.', '150', 'Food-Name-957.jpg', 30, 'Yes', 'Yes'),
(48, 'Chicken Momo', 'Chicken Momo served with hot and spicy Chilli sauce', '130', 'Food-Name-694.jpg', 30, 'Yes', 'Yes'),
(49, 'Hyderabadi Biryani', 'made from the raw marinated chicken placed between the layers of basmati rice infused with saffron, onions and dried fruits, cooked over charcoal fire, which results in rich, aromatic and punchy biryani.', '280', 'Food-Name-316.jpg', 31, 'Yes', 'Yes'),
(50, 'Lucknowi Biryani', 'The chicken infused with spices is partially cooked separately from rice, which is flavoured with saffron, star anise and cinnamon.', '259', 'Food-Name-149.jpg', 31, 'Yes', 'Yes'),
(51, 'Tehari Biryani', 'Consists of potatoes, carrots, several veggies and an array of spices, making the taste hearty and savoury.', '299', 'Food-Name-343.jpg', 31, 'Yes', 'Yes'),
(52, 'Egg Roast Biryani', 'Very flavorful with an uniques aroma that comes from a blend of kerala spices topped with roasted eggs', '300', 'Food-Name-127.jpg', 31, 'Yes', 'Yes'),
(53, 'Ramen-Crusted Fried Chicken', 'Ramen-crusted chicken served with a pile of thinly shredded cabbage and a lemon wedge for squeezing with chilli sauce.', '289', 'Food-Name-415.jpg', 32, 'Yes', 'Yes'),
(54, 'Korean Fried Chicken', 'korean styled spicy fried chicken coated with spicy, hot and tangy chilli sauce and topped with sesame seeds', '320', 'Food-Name-425.jpg', 32, 'Yes', 'Yes'),
(55, 'Chicken Schnitzel', 'served with  creamy mushroom gravy and drizzled with bit of freshly squeezed lemon juice.', '205', 'Food-Name-717.jpg', 32, 'Yes', 'Yes'),
(56, 'Chipotle Popcorn Chicken', 'Served with mayonnaise and salad', '195', 'Food-Name-312.jpg', 32, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

DROP TABLE IF EXISTS `ordertable`;
CREATE TABLE IF NOT EXISTS `ordertable` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(4, 'momos', '124.00', 3, '372.00', '2021-03-14 05:46:41', 'Delivered', 'Riya negi', '1234567899', 'riya1998r@gmail.com', 'Surveyinger Nagar Pune 32'),
(3, 'pizza', '32.00', 2, '64.00', '2021-03-14 05:43:14', 'Cancelled', 'Barkha Rawat', '1234567888', 'bark8r@gmail.com', 'Surfhfd hh ),Tinger Nagar Pune 32'),
(5, 'Baked Pasta', '230.00', 3, '690.00', '2021-04-11 05:37:31', 'Ordered', 'Diksha Rawat', '8736452987', 'diksharawat@gmail.com', 'Survey no. 1/2, Plot number 2, Road number 1,Sangam Nagar Pune 15');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

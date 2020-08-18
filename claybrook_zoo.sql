-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2020 at 09:25 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `claybrook_zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `amphibians`
--

DROP TABLE IF EXISTS `amphibians`;
CREATE TABLE IF NOT EXISTS `amphibians` (
  `amphibian_id` int(200) NOT NULL AUTO_INCREMENT,
  `amphibian_category_id` int(200) NOT NULL,
  `amphibian_name` varchar(200) NOT NULL,
  `amphibian_given_name` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(200) NOT NULL,
  `life_span` varchar(200) NOT NULL,
  `foods_and_foraging` varchar(200) NOT NULL,
  `natural_habit` varchar(200) NOT NULL,
  `global_population` varchar(200) NOT NULL,
  `arrived_on_zoo` date NOT NULL,
  `size_and_weight` varchar(200) NOT NULL,
  `gestational_period` varchar(200) NOT NULL,
  `amphibian_author` varchar(200) NOT NULL,
  `amphibian_image` text NOT NULL,
  `reproduction_type` varchar(200) NOT NULL,
  `average_number_of_offspring` varchar(200) NOT NULL,
  `average_clutch_size` varchar(200) NOT NULL,
  PRIMARY KEY (`amphibian_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amphibians`
--

INSERT INTO `amphibians` (`amphibian_id`, `amphibian_category_id`, `amphibian_name`, `amphibian_given_name`, `date_of_birth`, `gender`, `life_span`, `foods_and_foraging`, `natural_habit`, `global_population`, `arrived_on_zoo`, `size_and_weight`, `gestational_period`, `amphibian_author`, `amphibian_image`, `reproduction_type`, `average_number_of_offspring`, `average_clutch_size`) VALUES
(6, 7, 'Puerto Rican crested toads', 'Toads', '2016-03-07', 'Male', '10 years', 'Ants, beetles, crickets, and spiders.', 'Puerto Rico', 'Less than 3,000', '2018-02-05', 'Two to five inches', '8 to 24 days ', 'Raqeeb', 'toads.jpg', 'Egg layer', 'Toads is Egg Layer', ' Up to 15,000 eggs'),
(7, 7, 'A Congo Caecilian', 'Caecilian', '2019-03-05', 'Female', 'Unknown', 'insects and other invertebrates.', 'Central and South America to Central Africa and Southeast Asia.', 'Unknown', '2019-09-09', 'From 3.5 inches to nearly 5 feet', '9-11 months', 'Raqeeb', 'cacecilian.jpg', 'Egg layer', 'Caecilian is Egg Layer', ' Up to 15,000 eggs'),
(5, 7, 'Tiger Salamander', 'Salamander', '2010-02-04', 'Female', '12 to 15 Years', 'Earth worms, crickets, hornworms, silkworms, super worms, waxworms, roaches, night crawlers, and pinkies', 'United States, southern Canada, and eastern mexico', 'Unavailable', '2017-03-04', 'SIZE: 7 to 14 inches , WEIGHT: 4.4 ounces', '3-4 weeks', 'Raqeeb', 'salamander.jpg', 'Egg layer', 'Salamander is Egg Layer', 'average of 421');

-- --------------------------------------------------------

--
-- Table structure for table `animals_categories`
--

DROP TABLE IF EXISTS `animals_categories`;
CREATE TABLE IF NOT EXISTS `animals_categories` (
  `cat_id` int(200) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(200) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animals_categories`
--

INSERT INTO `animals_categories` (`cat_id`, `cat_title`) VALUES
(1, ' Mammal - Primate'),
(2, 'Fish'),
(7, 'Amphibians'),
(4, 'Birds'),
(6, 'Reptiles'),
(8, 'Mammal - Ungulates');

-- --------------------------------------------------------

--
-- Table structure for table `birds`
--

DROP TABLE IF EXISTS `birds`;
CREATE TABLE IF NOT EXISTS `birds` (
  `bird_id` int(200) NOT NULL AUTO_INCREMENT,
  `bird_category_id` int(200) NOT NULL,
  `bird_name` varchar(200) NOT NULL,
  `bird_given_name` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(200) NOT NULL,
  `life_span` varchar(200) NOT NULL,
  `foods_and_foraging` varchar(200) NOT NULL,
  `natural_habit` varchar(200) NOT NULL,
  `global_population` varchar(200) NOT NULL,
  `arrived_on_zoo` date NOT NULL,
  `size_and_weight` varchar(200) NOT NULL,
  `gestational_period` varchar(200) NOT NULL,
  `bird_author` varchar(200) NOT NULL,
  `bird_image` text NOT NULL,
  `clutch_size` varchar(200) NOT NULL,
  `wing_span` varchar(200) NOT NULL,
  `ability_to_fly` varchar(200) NOT NULL,
  PRIMARY KEY (`bird_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birds`
--

INSERT INTO `birds` (`bird_id`, `bird_category_id`, `bird_name`, `bird_given_name`, `date_of_birth`, `gender`, `life_span`, `foods_and_foraging`, `natural_habit`, `global_population`, `arrived_on_zoo`, `size_and_weight`, `gestational_period`, `bird_author`, `bird_image`, `clutch_size`, `wing_span`, `ability_to_fly`) VALUES
(1, 4, 'Scarlet Macaw', 'Red  bird', '2005-02-02', 'Male', '40 to 50 years', 'Nuts, leaves, berries and seeds', 'Humid evergreen forests', 'Fewer than 1,500', '2010-04-04', 'Length - 33 inch , Size - 1kg', '24 to 25 days    ', 'raqeeb', 'scarlet macaw.jpg', '2 to 4', 'Roughly 3 feet    ', 'Yes    '),
(2, 4, 'Marabou Stork', 'White Stork', '2002-04-05', 'Male', '35 To 40 Years', 'carrion ,  waste food and insects', 'Africa, Asia, and Europe', 'Estimated at 700,000-704,000', '2007-05-07', 'Height - 2 to 5 feet ,  Weight - ', 'About 31 days', 'raqeeb', 'stork.jpg', '2-3', '2.2 - 2.9 m', 'Yes'),
(3, 4, 'Emu', 'Tall Bird', '2012-09-07', 'Female', '10 To 20 Years', 'Fruits, seeds, growing shoots of plants and insects', ' Australia', 'Between 625,000â€“725,000', '2015-03-05', 'Height - 139 to 164 cm , Weight - 36 â€“ 40 kg', '56 days  ', 'raqeeb', 'Emu_female_bird.jpg', 'Five to Fifteen', 'Around 20 cm  ', 'No  ');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `cost` varchar(255) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `user_id`, `username`, `age`, `email`, `date`, `cost`) VALUES
(6, 1, 'raqeeb', '25', 'raqeebgiri78@gmail.com', '2020-06-14', 'Adult-$5'),
(5, 5, 'video', '12', 'ritesh12@gmail.com', '2020-06-15', 'Children-$2');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

DROP TABLE IF EXISTS `cost`;
CREATE TABLE IF NOT EXISTS `cost` (
  `cost_id` int(11) NOT NULL AUTO_INCREMENT,
  `cost` varchar(200) NOT NULL,
  PRIMARY KEY (`cost_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`cost_id`, `cost`) VALUES
(1, 'Adult-$5'),
(3, 'Children-$2');

-- --------------------------------------------------------

--
-- Table structure for table `fish`
--

DROP TABLE IF EXISTS `fish`;
CREATE TABLE IF NOT EXISTS `fish` (
  `fish_id` int(200) NOT NULL AUTO_INCREMENT,
  `fish_category_id` int(200) NOT NULL,
  `fish_name` varchar(200) NOT NULL,
  `fish_given_name` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(200) NOT NULL,
  `life_span` varchar(200) NOT NULL,
  `foods_and_foraging` varchar(200) NOT NULL,
  `natural_habit` varchar(200) NOT NULL,
  `global_population` varchar(200) NOT NULL,
  `arrived_on_zoo` date NOT NULL,
  `size_and_weight` varchar(200) NOT NULL,
  `gestational_period` varchar(200) NOT NULL,
  `fish_author` varchar(200) NOT NULL,
  `fish_image` text NOT NULL,
  `average_body_temperature` varchar(200) NOT NULL,
  `water_type` varchar(200) NOT NULL,
  PRIMARY KEY (`fish_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fish`
--

INSERT INTO `fish` (`fish_id`, `fish_category_id`, `fish_name`, `fish_given_name`, `date_of_birth`, `gender`, `life_span`, `foods_and_foraging`, `natural_habit`, `global_population`, `arrived_on_zoo`, `size_and_weight`, `gestational_period`, `fish_author`, `fish_image`, `average_body_temperature`, `water_type`) VALUES
(2, 2, 'White Sturgeon', 'Sharp Fish', '2005-02-04', 'Female', ' 50 to 60 years', 'Fish products, vegetable proteins, fats and carbon hydrates', 'Eurasia and North America', 'Fewer than 29,290', '2009-05-07', 'Length - 2â€“3 metres (7â€“10 feet) , Size -  450 kg', 'About 7 days', 'Raqeeb', 'white_sturgeon.jpg', 'Unfed white sturgeon acclimated to 19Â°C, ranged from 15.0 to 21.8Â°C . After feeding, the median temperature was 18.1Â±0.7Â°C and 17.5Â±0.5Â°C', 'Both salt water  And Fresh Water'),
(5, 2, 'piranha', 'Piranha ', '2015-04-06', 'Female', 'About 10 years', 'insects, crustaceans, worms, carrion, seeds and other plant material', 'South America', 'Unavailable', '2016-06-08', 'Max Size - 2 Feet , Max Weight -  3.9 kg', 'Around 4 to 6 weeks', 'Raqeeb', 'piranha-fish.jpg', '75 to 80 degrees Fahrenheit', 'Fresh Water'),
(6, 2, 'Rainbow Traut', 'Traut Fish', '2017-07-06', 'MAle', 'About 5 years', 'Insects And Fish Products', 'rivers, lakes, ponds, coastal seas, estuaries, and more.', 'Unavailable', '2018-02-02', 'Max Length - 16 inches , Max Size - 12kg', '97 Days', 'Raqeeb', 'Lake-trout.jpg', '20 to 25 degrees F', 'Fresh Water'),
(7, 2, 'Rainbow Traut', 'Traut Fish', '2017-07-06', 'MAle', 'About 5 years', 'Insects And Fish Products', 'rivers, lakes, ponds, coastal seas, estuaries, and more.', 'Unavailable', '2018-02-02', 'Max Length - 16 inches , Max Size - 12kg', '97 Days ', 'Raqeeb', 'Lake-trout.jpg', '20 to 25 degrees F', 'Fresh Water ');

-- --------------------------------------------------------

--
-- Table structure for table `mammals`
--

DROP TABLE IF EXISTS `mammals`;
CREATE TABLE IF NOT EXISTS `mammals` (
  `mammals_id` int(200) NOT NULL AUTO_INCREMENT,
  `mammals_category_id` int(200) NOT NULL,
  `mammals_name` varchar(200) NOT NULL,
  `mammals_given_name` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(200) NOT NULL,
  `life_span` varchar(200) NOT NULL,
  `foods_and_foraging` varchar(200) NOT NULL,
  `natural_habit` varchar(200) NOT NULL,
  `global_population` varchar(200) NOT NULL,
  `arrived_on_zoo` date NOT NULL,
  `size_and_weight` varchar(200) NOT NULL,
  `gestational_period` varchar(200) NOT NULL,
  `mammals_author` varchar(200) NOT NULL,
  `mammals_image` text NOT NULL,
  PRIMARY KEY (`mammals_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mammals`
--

INSERT INTO `mammals` (`mammals_id`, `mammals_category_id`, `mammals_name`, `mammals_given_name`, `date_of_birth`, `gender`, `life_span`, `foods_and_foraging`, `natural_habit`, `global_population`, `arrived_on_zoo`, `size_and_weight`, `gestational_period`, `mammals_author`, `mammals_image`) VALUES
(3, 1, 'Lowland Gorilla', ' Redwell', '1995-04-15', 'Male', '30â€“50 years', 'Green Leaf Matter , Assorted Fruit  ', 'West and Central Africa', '100000', '2007-09-21', 'Height :  1.75 m    Weight:    200 kg ', '8 months    ', 'raqeeb', 'lowlandgorilla.jpg'),
(2, 1, 'Jersey Cow', 'Brown Cow', '2000-01-01', 'Male', ' 18 to 22 years', 'Fresh forage , Alfalfa hay , grass hay or straw', ' savannas, scrub forests, and even desert edges', '296.36 million', '2010-02-02', 'Weight - 540â€“820 kg , Height - 115 Cm', '278 days   ', 'raqeeb', 'jersey_cow.jpg'),
(8, 1, 'African Elephants', 'African Elephants', '2008-04-07', 'MAle', '60 To 70 Years', 'Grasses, small plants, bushes, fruit, twigs, tree bark, and roots.', 'Africa', 'Around 700,000', '2011-05-08', 'Height - 2-5.4 m ,  Weight - 2,500-7,000 kg ', '22 Months', 'Raqeeb', 'african_elephant.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reptiles`
--

DROP TABLE IF EXISTS `reptiles`;
CREATE TABLE IF NOT EXISTS `reptiles` (
  `reptile_id` int(200) NOT NULL AUTO_INCREMENT,
  `reptile_category_id` int(200) NOT NULL,
  `reptile_name` varchar(200) NOT NULL,
  `reptile_given_name` varchar(200) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(200) NOT NULL,
  `life_span` varchar(200) NOT NULL,
  `foods_and_foraging` varchar(200) NOT NULL,
  `natural_habit` varchar(200) NOT NULL,
  `global_population` varchar(200) NOT NULL,
  `arrived_on_zoo` date NOT NULL,
  `size_and_weight` varchar(200) NOT NULL,
  `gestational_period` varchar(200) NOT NULL,
  `reptile_author` varchar(200) NOT NULL,
  `reptile_image` text NOT NULL,
  `reproduction_type` varchar(200) NOT NULL,
  `average_number_of_offspring` varchar(200) NOT NULL,
  `average_clutch_size` varchar(200) NOT NULL,
  PRIMARY KEY (`reptile_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reptiles`
--

INSERT INTO `reptiles` (`reptile_id`, `reptile_category_id`, `reptile_name`, `reptile_given_name`, `date_of_birth`, `gender`, `life_span`, `foods_and_foraging`, `natural_habit`, `global_population`, `arrived_on_zoo`, `size_and_weight`, `gestational_period`, `reptile_author`, `reptile_image`, `reproduction_type`, `average_number_of_offspring`, `average_clutch_size`) VALUES
(3, 6, 'King Cobra', 'King Cobra', '2013-03-06', 'Male', ' 20 years', 'lizards, eggs, and small mammals.', 'India, southern China, and Southeast Asia', 'Unavailable', '2017-03-06', 'SIZE- 13 feet , WEIGHT- Up to 20 pounds', 'Up to 90-day', 'Raqeeb', 'king-cobra.jpg', 'Egg layer', 'King Cobra is Egg Layer', '20 to 40 eggs '),
(4, 6, 'Hawksbill sea turtles', 'Hawksbill sea turtles', '1995-02-05', 'Female', '30 to 50 years', 'mollusks, marine algae, crustaceans,  urchins, and fish.', ' Atlantic, Pacific, and Indian Oceans.', 'Fewer than 25,000 ', '2010-02-06', 'SIZE- 24 to 45 inches , WEIGHT- 100 to 150 pounds', '60 days ', 'Raqeeb', 'hawksbill_turtle.jpg', 'Egg layer', 'Turtle is Egg Layer ', '130 to 160 eggs '),
(8, 6, 'Gharial', 'Gharial', '1995-02-04', 'MAle', '40 to 60 years', 'insects, crustaceans and frogs', 'India and Nepal', 'more than 1250', '2015-04-06', 'SIZE- 12.25 to 15.5 feet , WEIGHT- 2,200 pounds', '97 Days', 'Raqeeb', 'download.jpg', 'Egg layer', 'Gharial is Egg Layer', '20 â€“ 95');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

DROP TABLE IF EXISTS `sponsors`;
CREATE TABLE IF NOT EXISTS `sponsors` (
  `sponsor_id` int(200) NOT NULL AUTO_INCREMENT,
  `clint_or_company_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_no` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `existing_customer` varchar(200) NOT NULL,
  `animal_to_be_sponsor` varchar(200) NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `period_of_agreement` varchar(200) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`sponsor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `clint_or_company_name`, `email`, `phone_no`, `address`, `existing_customer`, `animal_to_be_sponsor`, `total_price`, `period_of_agreement`, `image`) VALUES
(1, 'Zenth  Staybrite Ltd', 'zenth564@gmail.com', '01966 7855121 , 0800 3289395', 'Mrs Jane Woods (Senior Accountant)  45 Blackwood Road Westhills Longbottom North Yorkshire NY12 D454', 'Yes', 'Tiger', 'Â£2500 x 2 (Â£5000)', '1st January 20 11    to   December   31st  201 1 ', 'tiger.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(200) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_firstname` varchar(200) NOT NULL,
  `user_lastname` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_phoneno` varchar(200) NOT NULL,
  `user_role` varchar(200) NOT NULL,
  `user_image` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_phoneno`, `user_role`, `user_image`) VALUES
(1, 'raqeeb', 'snuff1231', 'giri', 'p giri', 'giri56@gmail.com', '9823301979', 'admin', 'avatar.jpg'),
(5, 'ritesh', 'snuff', 'ritesh', 'jha', 'ritesh12@gmail.com', '9823301979', 'subscriber', 'a3.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2015 at 07:19 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `name`, `Email`, `message`) VALUES
(4, 'Aldrin Ramos', 'red@gmail.com', 'asdkasdiu hairweopasodpj'),
(3, 'Kenneth Aboy', 'red@gmail.com', 'awsdasdkjasd'),
(5, 'Kenneth', 'red@gmail.com', 'asdasdas'),
(6, 'Kenneth', 'red@gmail.com', 'haha'),
(7, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `memberID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `price` double(11,2) NOT NULL,
  `total` double(11,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `transaction_code` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `memberID` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` double(11,2) NOT NULL,
  `productID` int(11) NOT NULL,
  `total` double(11,2) NOT NULL,
  `status` varchar(100) NOT NULL,
  `modeofpayment` varchar(100) NOT NULL,
  `transaction_code` varchar(200) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`orderid`, `memberID`, `qty`, `price`, `productID`, `total`, `status`, `modeofpayment`, `transaction_code`) VALUES
(24, 18, 4, 87.00, 18, 348.00, 'Pending', '', ''),
(23, 18, 3, 65.00, 1, 195.00, 'Pending', '', ''),
(6, 17, 1, 87.00, 18, 87.00, 'Delivered', 'Paypal', ''),
(11, 19, 6, 65.00, 1, 390.00, 'Delivered', 'Paypal', ''),
(12, 19, 1, 40.00, 17, 40.00, 'Delivered', 'Paypal', ''),
(10, 18, 1, 40.00, 17, 40.00, 'Delivered', 'Paypal', ''),
(13, 18, 1, 40.00, 17, 40.00, 'Delivered', 'Paypal', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE IF NOT EXISTS `tb_member` (
  `memberID` int(25) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(25) NOT NULL,
  `Lastname` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Contact_Number` varchar(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`memberID`, `Firstname`, `Lastname`, `Email`, `Password`, `Contact_Number`, `address`) VALUES
(19, 'syafiq', 'sazali', 'arepick93@gmail.com', 'qwerty', '0179394957', 'umskal'),
(18, 'abd', 'tasnim', 'abd@yahoo.com', '123', '012312323', 'umskal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_products`
--

CREATE TABLE IF NOT EXISTS `tb_products` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(200) NOT NULL,
  `originated` varchar(500) NOT NULL,
  `price` double(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `location` varchar(500) NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tb_products`
--

INSERT INTO `tb_products` (`productID`, `name`, `description`, `category`, `originated`, `price`, `quantity`, `location`) VALUES
(1, 'Advanced Multimedia', 'Editors:Shojiro Nishio, Fumio Kishino', 'HC12', 'Springer', 65.00, 40, 'upload/advanced multimedia.jpg'),
(17, 'Network Security', 'Editor: Brijendra Sigh', 'HC12', 'PHI Learning Pvt. Ltd', 40.00, 60, 'upload/network security.jpg'),
(21, 'Introduction to Web Development Using HTML 5', 'Author: Kris Jamsa', 'HC13', 'Jones & Bartlett Publishers', 120.00, 5, 'upload/web development.jpg'),
(18, 'Understanding Animation', 'Author: Paul Wells', 'HC12', 'Routledge', 87.00, 30, 'upload/understanding animation.jpg'),
(19, 'Principles of Distributed Database Systems', 'Authors: M. Tamer Ã–zsu, Patrick Valduriez', 'HC13', 'Springer Science & Business Media', 100.00, 20, 'upload/ddms.jpg'),
(20, 'Technopreneurship: Conceptualised', 'Author: Nicholas Kakava', 'HC13', 'Lap Lambert Academic Publishing GmbH KG', 25.00, 10, 'upload/techno.jpg'),
(22, 'Corporate Finance', 'Authors: David Hillier, Stephen A.. Ross', 'HE19', 'McGraw-Hill', 99.00, 15, 'upload/Corporate Finance.jpg'),
(23, 'Financial Accounting', 'Naseem Ahmed', 'HE19', 'Atlantic Publishers & Dist', 249.00, 3, 'upload/financial-accounting.jpeg'),
(24, 'Principles of International Investment Law', 'Authors: Rudolf Dolzer, Christoph Schreuer', 'HE19', 'OUP Oxford', 89.00, 5, 'upload/principle of investment.jpg'),
(25, 'Credit Management', 'Editor: Mr Glen Bullivant', 'HE20', 'Gower Publishing, Ltd.', 120.00, 12, 'upload/9780754692157.png'),
(26, 'Fundamentals of Offshore Banking', 'Author: Walter Tyndale', 'HE20', 'Lulu.com', 49.00, 23, 'upload/offshore bankg.jpg'),
(27, 'Wealth Management in the New Economy', 'Authors: Norbert M. Mindel, Sarah E. Sleight', 'HE20', 'John Wiley & Sons', 70.00, 1, 'upload/wealth.jpg'),
(28, 'Brand Management', 'Author: Saurabh Aggarwal', 'HE21', 'Global India Publications', 67.00, 0, 'upload/brand manegement.jpg'),
(29, 'International Marketing', 'Authors: Pervez N. Ghauri, Philip R. Cateora', 'HE21', 'McGraw-Hill Education', 99.00, 13, 'upload/international marketin.jpg'),
(30, 'Take Charge Product Management', 'Author: Greg Geracie', 'HE21', 'Greg Geracie', 64.00, 1, 'upload/product management.jpg'),
(31, 'International Corporate Finance', 'Author: J. Ashok Robin', 'HE22', 'McGraw-Hill Education', 135.00, 8, 'upload/international corporate finance.jpg'),
(32, 'Integrating National Economies', 'Author: Miles Kahler', 'HE22', 'Brookings Institution Press', 60.00, 4, 'upload/international economic institution.jpg'),
(33, 'International Macroeconomics', 'Author: Peter J. Montiel', 'HE22', 'John Wiley & Sons', 123.00, 9, 'upload/international macro.jpg'),
(34, 'Islamic Accounting', 'Authors: Christopher Napier, Ros Haniffa', 'HE23', 'Edward Elgar', 180.00, 2, 'upload/islamic accountin.jpg'),
(35, 'Principles of Risk Management and Insurance', 'Authors: George E. Rejda, Michael J. McNamara', 'HE23', 'Pearson Education', 124.00, 11, 'upload/risk management.jpg'),
(36, 'Takaful and Mutual Insurance', 'Editor: Serap O. Gonulal', 'HE23', 'World Bank Publications', 70.00, 6, 'upload/takaful_and_mutual_insurance-9780821397244.jpg'),
(37, 'Twilight', 'Author: Stephenie Meyer', 'GENERAL', 'Hachette UK', 67.00, 12, 'upload/zmierzch-cover.jpg'),
(38, 'The Fault in Our Stars', 'Author: John Green', 'GENERAL', 'Penguin', 49.00, 20, 'upload/81N-m6WpExL.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(17, 'admin', 'admin', 'abd', 'tas'),
(18, 'amin_husain', 'qwerty', 'amin', 'husain');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

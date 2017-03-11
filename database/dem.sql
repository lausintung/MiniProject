-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2016 at 03:16 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--
drop database if exists hotel;
create database hotel;
use hotel;

CREATE TABLE `booking` (
  `bookingID` int(10) NOT NULL,
  `checkinDate` date DEFAULT NULL,
  `checkoutDate` date DEFAULT NULL,
  `cm` text,
  `noOfGuest` int(2) DEFAULT NULL,
  `passportNo` varchar(30) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `roomID` int(3) NOT NULL,
  `rating` int(1) DEFAULT NULL,
  `timeforCM` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `checkinDate`, `checkoutDate`, `cm`, `noOfGuest`, `passportNo`, `username`, `roomID`, `rating`, `timeforCM`) VALUES
(1, '2016-12-01', '2016-12-05', '', 1, 'G42063373', 'Alan13', 300, NULL, NULL),
(2, '2016-12-23', '2016-12-26', '', 3, 'G42063373', 'Amy267', 513, NULL, NULL),
(3, '2016-12-08', '2016-12-10', '', 1, 'S79877923', 'Andrea24', 300, NULL, NULL),
(4, '2016-11-30', '2016-12-06', NULL, 1, 'O50962859', 'Chris35', 200, NULL, NULL),
(5, '2016-11-30', '2016-12-01', '', 1, 'L05012389', 'Diane42', 301, NULL, NULL),
(6, '2016-01-20', '2016-01-25', 'good service', 1, 'X99528430', 'Douglas89', 401, 4, '2016-02-09 02:05:00'),
(7, '2016-04-01', '2016-04-03', 'nice view', 1, 'I97101563', 'Fred57', 510, 4, '2016-05-10 04:07:00'),
(8, '2016-06-06', '2016-06-12', 'the sea view is good', 4, 'R35120955', 'Heather105', 514, 5, '2016-07-13 07:44:00'),
(9, '2016-05-10', '2016-05-14', 'love here', 1, 'R21709716', 'Jose92', 500, 4, '2016-08-10 05:22:00'),
(10, '2016-07-11', '2016-07-16', 'the best room ever', 3, 'G83992703', 'Joshua922', 313, 5, '2016-09-22 03:32:00'),
(11, '2016-01-13', '2016-01-16', 'The room is good.', 1, 'S69760449', 'Harold44', 201, 3, '2016-03-07 23:42:00'),
(12, '2016-01-20', '2016-01-25', 'The room is clean.', 1, 'Y48723019', 'Fred57', 101, 3, '2016-01-30 07:48:00'),
(13, '2016-04-01', '2016-04-03', 'only 5 mins walk from station', 3, 'R17300429', 'Jane51', 413, 5, '2016-04-13 21:15:00'),
(14, '2016-06-06', '2016-06-12', 'the breakfast is tasty', 3, 'Q68688911', 'Joyce626', 213, 4, '2016-07-07 23:42:00'),
(15, '2016-05-10', '2016-05-14', 'good', 2, 'R44810223', 'Jeffrey753', 503, 3, '2016-06-08 18:50:00'),
(16, '2016-07-14', '2016-07-16', 'the best room ever', 3, 'A36178452', 'Janice546', 113, 5, '2016-08-01 01:00:00'),
(17, '2016-03-13', '2016-03-16', 'nice', 2, 'D94514902', 'Jane51', 303, 3, '2016-04-01 23:41:00'),
(18, '2016-12-20', '2016-12-25', '', 2, 'E07408451', 'Mark55', 203, NULL, NULL),
(19, '2016-11-01', '2016-11-03', 'love it', 2, 'Z57682870', 'Nicole186', 103, 4, '2016-11-07 06:42:00'),
(20, '2016-07-06', '2016-07-12', 'excellent', 4, 'H16832791', 'Nancy20', 307, 5, '2016-03-05 05:30:00'),
(21, '2016-01-01', '2016-01-05', 'good service', 2, 'C23803940', 'Mary00', 403, 3, '2016-03-18 08:00:00'),
(22, '2016-07-11', '2016-07-16', 'large room so huge!', 3, 'O82569800', 'Paul86', 505, 5, '2016-11-27 18:29:01'),
(23, '2016-06-23', '2016-06-27', 'thank you for the good service!', 2, 'H41463354', 'Juan677', 111, 4, '2016-07-01 05:11:48'),
(24, '2016-06-20', '2016-06-25', NULL, 2, 'L39840704', 'Lois306', 211, NULL, NULL),
(25, '2016-04-01', '2016-04-06', NULL, 2, 'B32063092', 'Mary62', 311, NULL, NULL),
(26, '2016-07-06', '2016-07-11', NULL, 4, 'N26686970', 'Sandra39', 308, NULL, NULL),
(27, '2016-05-10', '2016-06-14', NULL, 2, 'T30488059', 'Roy82', 411, NULL, NULL),
(28, '2016-07-20', '2016-07-26', NULL, 3, 'G15737732', 'Ruby18', 506, NULL, NULL),
(29, '2016-12-26', '2016-12-31', NULL, 2, 'B70582424', 'Sandra71', 512, NULL, NULL),
(30, '2016-01-20', '2016-01-25', 'best experience!', 2, 'O92648561', 'Terry722', 312, 4, '2016-06-21 23:13:00'),
(31, '2016-04-01', '2016-04-03', 'i will come back again:)', 2, 'D64949529', 'Tina08', 112, 5, '2016-09-11 16:13:24'),
(32, '2016-06-06', '2016-06-12', NULL, 4, 'Z11304016', 'Victor13', 309, NULL, NULL),
(33, '2016-05-10', '2016-05-14', NULL, 2, 'A76467387', 'Wayne73', 202, NULL, NULL),
(34, '2016-07-03', '2016-07-06', 'convenient location, and pick up service is very nice', 3, 'F65444559', 'William008', 406, 4, '2016-07-25 13:25:05'),
(35, '2016-01-13', '2016-01-16', NULL, 2, 'Z16977360', 'Willie698', 302, NULL, NULL),
(36, '2016-01-20', '2016-01-25', NULL, 2, 'L16897645', 'Amanda247', 402, NULL, NULL),
(37, '2016-04-01', '2016-04-03', 'good view and nice restaurants', 2, 'N70039799', 'Antonio47', 503, 4, '2016-05-16 07:36:09'),
(38, '2016-06-06', '2016-06-12', NULL, 4, 'W32279025', 'Betty240', 314, NULL, NULL),
(39, '2016-05-10', '2016-05-14', NULL, 2, 'V42419620', 'Bobby80', 504, NULL, NULL),
(40, '2016-12-21', '2016-12-26', NULL, 3, 'F69687267', 'Bruce856', 106, NULL, NULL),
(41, '2016-01-13', '2016-01-16', NULL, 2, 'E36914102', 'Cheryl77', 304, NULL, NULL),
(42, '2016-01-20', '2016-01-25', 'good service', 2, 'D42266331', 'Bobby10', 204, 5, '2016-02-10 10:18:00'),
(43, '2016-04-01', '2016-04-03', 'nice room', 2, 'M41888980', 'Diane42', 104, 4, '2016-04-23 09:15:00'),
(44, '2016-01-13', '2016-01-16', NULL, 2, 'S10238124', 'Jose92', 404, NULL, NULL),
(45, '2016-01-13', '2016-01-16', NULL, 2, 'F38564294', 'Harold44', 504, NULL, NULL),
(46, '2016-06-06', '2016-06-12', 'will recommend my friends to come and stay next time', 4, 'K72233891', 'Chris35', 107, 5, '2016-10-01 16:59:05'),
(47, '2016-01-20', '2016-01-25', 'reasonable price', 2, 'O08585857', 'Fred57', 202, 4, '2016-03-08 06:10:00'),
(48, '2016-05-10', '2016-05-14', NULL, 2, 'H97906620', 'Julie566', 304, NULL, NULL),
(49, '2016-07-12', '2016-07-16', 'nice', 3, 'W56719592', 'Julie824', 406, 3, '2016-09-16 02:38:13'),
(50, '2016-07-11', '2016-07-16', NULL, 3, 'B63920743', 'Joyce882', 306, NULL, NULL),
(51, '2016-09-08', '2016-09-15', NULL, 1, 'G89775740', 'Chris35', 104, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomID` int(3) NOT NULL,
  `price` int(4) DEFAULT NULL,
  `photo` text,
  `description` text,
  `noOfGuest` int(1) DEFAULT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomID`, `price`, `photo`, `description`, `noOfGuest`, `name`) VALUES
(100, 1300, 'c_1s.jpg', 'Comfortable room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Standard Single Room'),
(101, 1300, 'c_1s.jpg', 'Comfortable room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Standard Single Room'),
(102, 1500, 'c_1d.jpg', 'Comfortable room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Standard Double Room'),
(103, 1500, 'c_1d.jpg', 'Comfortable room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Standard Double Room'),
(104, 1500, 'c_2s.jpg', 'Comfortable room with 2 single beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 2, 'Standard Twin Room'),
(105, 1700, 'c_1d1s.jpg', 'Comfortable room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 3, 'Standard Triple Room'),
(106, 1700, 'c_1d1s.jpg', 'Comfortable room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 3, 'Standard Triple Room'),
(107, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(108, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(109, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(110, 1450, 'l_1s.jpg', 'Luxurious, spacious room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Deluxe Single Suite'),
(111, 1650, 'l_1d.jpg', 'Luxurious, spacious room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Deluxe Double Suite'),
(112, 1650, 'l_2s.jpg', 'Luxurious, spacious room with 2 single beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 2, 'Deluxe Twin Suite'),
(113, 1850, 'l_1d1s.jpg', 'Luxurious, spacious room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 3, 'Deluxe Triple Suite'),
(114, 2050, 'l_2d.jpg', 'Luxurious, spacious room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 4, 'Deluxe Family Suite'),
(200, 1300, 'c_1s.jpg', 'Comfortable room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Standard Single Room'),
(201, 1300, 'c_1s.jpg', 'Comfortable room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Standard Single Room'),
(202, 1500, 'c_1d.jpg', 'Comfortable room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Standard Double Room'),
(203, 1500, 'c_1d.jpg', 'Comfortable room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Standard Double Room'),
(204, 1500, 'c_2s.jpg', 'Comfortable room with 2 single beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 2, 'Standard Twin Room'),
(205, 1700, 'c_1d1s.jpg', 'Comfortable room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 3, 'Standard Triple Room'),
(206, 1700, 'c_1d1s.jpg', 'Comfortable room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 3, 'Standard Triple Room'),
(207, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(208, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(209, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(210, 1450, 'l_1s.jpg', 'Luxurious, spacious room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Deluxe Single Suite'),
(211, 1650, 'l_1d.jpg', 'Luxurious, spacious room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Deluxe Double Suite'),
(212, 1650, 'l_2s.jpg', 'Luxurious, spacious room with 2 single beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 2, 'Deluxe Twin Suite'),
(213, 1850, 'l_1d1s.jpg', 'Luxurious, spacious room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 3, 'Deluxe Triple Suite'),
(214, 2050, 'l_2d.jpg', 'Luxurious, spacious room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 4, 'Deluxe Family Suite'),
(300, 1300, 'c_1s.jpg', 'Comfortable room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Standard Single Room'),
(301, 1300, 'c_1s.jpg', 'Comfortable room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Standard Single Room'),
(302, 1500, 'c_1d.jpg', 'Comfortable room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Standard Double Room'),
(303, 1500, 'c_1d.jpg', 'Comfortable room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Standard Double Room'),
(304, 1500, 'c_2s.jpg', 'Comfortable room with 2 single beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 2, 'Standard Twin Room'),
(305, 1700, 'c_1d1s.jpg', 'Comfortable room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 3, 'Standard Triple Room'),
(306, 1700, 'c_1d1s.jpg', 'Comfortable room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 3, 'Standard Triple Room'),
(307, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(308, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(309, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(310, 1600, 'l_1s.jpg', 'Luxurious, spacious room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Deluxe Single Suite'),
(311, 1800, 'l_1d.jpg', 'Luxurious, spacious room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Deluxe Double Suite'),
(312, 1800, 'l_2s.jpg', 'Luxurious, spacious room with 2 single beds. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 2, 'Deluxe Twin Suite'),
(313, 2000, 'l_1d1s.jpg', 'Luxurious, spacious room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 3, 'Deluxe Triple Suite'),
(314, 2200, 'l_2d.jpg', 'Luxurious, spacious room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 4, 'Deluxe Family Suite'),
(400, 1300, 'c_1s.jpg', 'Comfortable room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Standard Single Room'),
(401, 1300, 'c_1s.jpg', 'Comfortable room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Standard Single Room'),
(402, 1500, 'c_1d.jpg', 'Comfortable room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Standard Double Room'),
(403, 1500, 'c_1d.jpg', 'Comfortable room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Standard Double Room'),
(404, 1500, 'c_2s.jpg', 'Comfortable room with 2 single beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 2, 'Standard Twin Room'),
(405, 1700, 'c_1d1s.jpg', 'Comfortable room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 3, 'Standard Triple Room'),
(406, 1700, 'c_1d1s.jpg', 'Comfortable room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 3, 'Standard Triple Room'),
(407, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(408, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(409, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(410, 1600, 'l_1s.jpg', 'Luxurious, spacious room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Deluxe Single Suite'),
(411, 1800, 'l_1d.jpg', 'Luxurious, spacious room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Deluxe Double Suite'),
(412, 1800, 'l_2s.jpg', 'Luxurious, spacious room with 2 single beds. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 2, 'Deluxe Twin Suite'),
(413, 2000, 'l_1d1s.jpg', 'Luxurious, spacious room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 3, 'Deluxe Triple Suite'),
(414, 2200, 'l_2d.jpg', 'Luxurious, spacious room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 4, 'Deluxe Family Suite'),
(500, 1300, 'c_1s.jpg', 'Comfortable room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Standard Single Room'),
(501, 1300, 'c_1s.jpg', 'Comfortable room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Standard Single Room'),
(502, 1500, 'c_1d.jpg', 'Comfortable room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Standard Double Room'),
(503, 1500, 'c_1d.jpg', 'Comfortable room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Standard Double Room'),
(504, 1500, 'c_2s.jpg', 'Comfortable room with 2 single beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 2, 'Standard Twin Room'),
(505, 1700, 'c_1d1s.jpg', 'Comfortable room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 3, 'Standard Triple Room'),
(506, 1700, 'c_1d1s.jpg', 'Comfortable room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 3, 'Standard Triple Room'),
(507, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(508, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(509, 1900, 'c_2d.jpg', 'Comfortable room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking hotel garden. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 4, 'Standard Family Room'),
(510, 1600, 'l_1s.jpg', 'Luxurious, spacious room with 1 single bed. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 1, 'Deluxe Single Suite'),
(511, 1800, 'l_1d.jpg', 'Luxurious, spacious room with 1 double bed. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 2, 'Deluxe Double Suite'),
(512, 1800, 'l_2s.jpg', 'Luxurious, spacious room with 2 single beds. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size beds and spacious wardrobe.', 2, 'Deluxe Twin Suite'),
(513, 2000, 'l_1d1s.jpg', 'Luxurious, spacious room with 1 single bed and 1 double bed. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 3, 'Deluxe Triple Suite'),
(514, 2200, 'l_2d.jpg', 'Luxurious, spacious room with 2 double beds. It is equipped with shower or bathtub with balcony overlooking harbour view. It is air conditioned and has a flat-screen TV with international TV channels, cozy king size bed and spacious wardrobe.', 4, 'Deluxe Family Suite');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `fName` text,
  `lName` text,
  `pwd` text CHARACTER SET latin1 COLLATE latin1_general_cs,
  `creditcard` text,
  `email` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `fName`, `lName`, `pwd`, `creditcard`, `email`) VALUES
('Aaron863', 'Aaron', 'Torres', '453603u', '1633-2793-8776-7766', 'Torres26@gmail.com'),
('Alan13', 'Alan', 'Lawson', '765489P', '8820-0171-0909-0756', 'Lawson7900@gmail.com'),
('Albert415', 'Albert', 'Ortiz', '977311C', '2946-1656-9813-5308', 'Ortiz627@gmail.com'),
('Amanda247', 'Amanda', 'Welch', '292631L', '7921-2583-0082-2389', 'Welch8@gmail.com'),
('Amy267', 'Amy', 'Hart', '608600Y', '1975-7248-5033-5675', 'Hart33@gmail.com'),
('Andrea24', 'Andrea', 'Stanley', '287749s', '3343-9762-1151-5734', 'Stanley39@gmail.com'),
('Ann65', 'Ann', 'King', '012886s', '1375-6289-2296-3140', 'King9@gmail.com'),
('Ann899', 'Ann', 'Henry', '187981g', '6756-1623-0100-7240', 'Henry241@gmail.com'),
('Anne60', 'Anne', 'Watkins', '812767i', '6843-9606-1583-9638', 'Watkins71@gmail.com'),
('Anthony81', 'Anthony', 'Taylor', '940325c', '4873-3183-6845-2626', 'Taylor41@gmail.com'),
('Antonio47', 'Antonio', 'Freeman', '951134k', '0005-8293-0450-4276', 'Freeman4766@gmail.com'),
('Arthur144', 'Arthur', 'Brooks', '041034n', '2502-3658-6587-1360', 'Brooks9034@gmail.com'),
('Arthur22', 'Arthur', 'Hernandez', '096759h', '8291-6272-0442-7999', 'Hernandez2@gmail.com'),
('Arthur47', 'Arthur', 'Perez', '098812z', '5262-3526-9436-7729', 'Perez6@gmail.com'),
('Arthur768', 'Arthur', 'Hughes', '515987v', '3623-7184-1269-9548', 'Hughes3@gmail.com'),
('Betty240', 'Betty', 'Walker', '075255Z', '5136-7680-2029-2670', 'Walker8@gmail.com'),
('Bobby10', 'Bobby', 'Henderson', '057927J', '0431-5488-2128-2416', 'Henderson5@gmail.com'),
('Bobby80', 'Bobby', 'Flores', '529224Y', '0616-7226-2114-8185', 'Flores073@gmail.com'),
('Brandon652', 'Brandon', 'Hughes', '594997x', '5045-7625-4543-3583', 'Hughes807@gmail.com'),
('Brenda208', 'Brenda', 'Mills', '774828d', '9209-8902-9270-6583', 'Mills09@gmail.com'),
('Bruce856', 'Bruce', 'Gordon', '533821F', '2030-8045-6125-6527', 'Gordon97@gmail.com'),
('Carl80', 'Carl', 'Bradley', '029835m', '0053-2057-3448-5538', 'Bradley930@gmail.com'),
('Charles00', 'Charles', 'Davis', '155728X', '8912-3634-4905-0522', 'Davis7612@gmail.com'),
('Charles812', 'Charles', 'Wells', '623588a', '4071-2634-0055-3006', 'Wells8909@gmail.com'),
('Cheryl77', 'Cheryl', 'Alexander', '237743w', '3826-9930-4539-8974', 'Alexander71@gmail.com'),
('Cheryl97', 'Cheryl', 'Pierce', '330919d', '2396-3226-8450-0338', 'Pierce36@gmail.com'),
('Chris073', 'Chris', 'Barnes', '808409j', '2647-2408-2404-4322', 'Barnes16@gmail.com'),
('Chris35', 'Chris', 'Moreno', '357762G', '0396-4466-6420-9232', 'Moreno5886@gmail.com'),
('Christina555', 'Christina', 'Anderson', '988543k', '3847-8667-4958-2283', 'Anderson4749@gmail.com'),
('Christina932', 'Christina', 'Marshall', '001798w', '9643-2189-1650-2255', 'Marshall786@gmail.com'),
('Clarence893', 'Clarence', 'Rodriguez', '495918w', '9853-1036-8168-4594', 'Rodriguez07@gmail.com'),
('Deborah302', 'Deborah', 'Thomas', '510930Y', '7021-2885-9281-8629', 'Thomas1@gmail.com'),
('Deborah430', 'Deborah', 'Oliver', '143411U', '6553-3150-9783-8062', 'Oliver741@gmail.com'),
('Diane42', 'Diane', 'Mcdonald', '777406D', '4014-6826-6772-4923', 'Mcdonald0@gmail.com'),
('Douglas89', 'Douglas', 'Hernandez', '804044f', '7744-6331-5644-2598', 'Hernandez534@gmail.com'),
('Elizabeth58', 'Elizabeth', 'Hughes', '099020V', '1107-2944-0900-1244', 'Hughes26@gmail.com'),
('Elizabeth923', 'Elizabeth', 'Lawrence', '275902X', '2535-9314-5062-0459', 'Lawrence41@gmail.com'),
('Ernest448', 'Ernest', 'Hawkins', '262246x', '9427-2974-6968-5777', 'Hawkins882@gmail.com'),
('Eugene389', 'Eugene', 'Watkins', '218525i', '1255-2231-0178-0851', 'Watkins2189@gmail.com'),
('Frances217', 'Frances', 'Riley', '906761d', '6604-9823-7421-3293', 'Riley7@gmail.com'),
('Fred57', 'Fred', 'Hunter', '727224q', '4730-0926-2802-5766', 'Hunter4517@gmail.com'),
('Harold44', 'Harold', 'Willis', '101874G', '6858-7338-6656-3500', 'Willis0@gmail.com'),
('Heather105', 'Heather', 'Perez', '494651i', '6595-8143-5316-3641', 'Perez670@gmail.com'),
('Jane51', 'Jane', 'Andrews', '607653A', '7789-3198-7041-4526', 'Andrews22@gmail.com'),
('Janice546', 'Janice', 'Moreno', '682535Z', '0292-8950-6563-2107', 'Moreno6175@gmail.com'),
('Jeffrey753', 'Jeffrey', 'Mason', '225487c', '3906-9712-4881-8646', 'Mason180@gmail.com'),
('jenny669', 'Jenny', 'Wong', 'jennyjenny', '2341-2342-4018-2341', 'jenny669@gmail.com'),
('Jonathan62', 'Jonathan', 'Phillips', '379707o', '2794-8973-7982-0435', 'Phillips9@gmail.com'),
('Jose92', 'Jose', 'Hayes', '590210q', '9431-4259-8608-9595', 'Hayes8@gmail.com'),
('Joshua922', 'Joshua', 'Lee', '512784j', '9710-4834-6333-2825', 'Lee1294@gmail.com'),
('Joyce626', 'Joyce', 'Wilson', '449937g', '3150-7397-5472-2487', 'Wilson015@gmail.com'),
('Joyce882', 'Joyce', 'Black', '255019I', '1723-5210-0763-6144', 'Black9@gmail.com'),
('Juan07', 'Juan', 'Foster', '817211L', '9501-7085-5404-4351', 'Foster164@gmail.com'),
('Juan24', 'Juan', 'Graham', '565402L', '8572-2214-5582-6893', 'Graham3509@gmail.com'),
('Juan677', 'Juan', 'Mccoy', '556635d', '6711-9340-9060-1302', 'Mccoy0@gmail.com'),
('Juan913', 'Juan', 'Gibson', '272273d', '7136-9124-7509-3735', 'Gibson4@gmail.com'),
('Julia703', 'Julia', 'Morgan', '791876a', '5088-4580-7099-5650', 'Morgan3316@gmail.com'),
('Julie566', 'Julie', 'Gilbert', '082755j', '1488-7035-7696-2711', 'Gilbert5@gmail.com'),
('Julie824', 'Julie', 'Rodriguez', '860186I', '4623-3953-9134-8089', 'Rodriguez55@gmail.com'),
('Katherine893', 'Katherine', 'Bishop', '139971n', '6771-4489-2734-3397', 'Bishop9@gmail.com'),
('Linda756', 'Linda', 'Nguyen', '831402S', '3306-5738-2144-8481', 'Nguyen8@gmail.com'),
('Lois306', 'Lois', 'Sanders', '698230f', '8781-9654-6317-7448', 'Sanders2572@gmail.com'),
('Mark55', 'Mark', 'Hawkins', '532983Y', '1415-1253-6516-5250', 'Hawkins1075@gmail.com'),
('Mary00', 'Mary', 'Chavez', '647712U', '6697-7716-6141-2792', 'Chavez54@gmail.com'),
('Mary62', 'Mary', 'Wright', '029935g', '0258-4488-6734-4649', 'Wright7@gmail.com'),
('Michael18', 'Michael', 'Vasquez', '332358p', '8748-8240-0234-5107', 'Vasquez5@gmail.com'),
('Michelle785', 'Michelle', 'Romero', '517517J', '3127-4898-7813-2927', 'Romero83@gmail.com'),
('Mildred66', 'Mildred', 'Hayes', '578301C', '3867-8044-5943-2214', 'Hayes8228@gmail.com'),
('Mildred83', 'Mildred', 'Watson', '686314b', '8977-8216-3469-5404', 'Watson12@gmail.com'),
('Nancy20', 'Nancy', 'Thomas', '001456e', '1540-6968-0119-4640', 'Thomas1965@gmail.com'),
('Nicole186', 'Nicole', 'Mason', '364590G', '4531-0109-8478-8877', 'Mason906@gmail.com'),
('Norma154', 'Norma', 'Gardner', '090212e', '2865-9557-9057-1181', 'Gardner1@gmail.com'),
('Paul86', '', '', '1', '---', ''),
('Phyllis52', 'Phyllis', 'Thomas', '693432L', '2640-8121-1431-0052', 'Thomas25@gmail.com'),
('Ralph385', 'Ralph', 'Chavez', '668141j', '3435-8901-2833-7100', 'Chavez86@gmail.com'),
('Raymond701', 'Raymond', 'Mendoza', '068596B', '6988-4715-7566-9799', 'Mendoza0@gmail.com'),
('Rebecca644', 'Rebecca', 'Weaver', '116960d', '5451-9601-1160-8980', 'Weaver0795@gmail.com'),
('Rebecca764', 'Rebecca', 'Kelley', '603513p', '5023-6638-3641-4717', 'Kelley23@gmail.com'),
('Ronald241', 'Ronald', 'Gonzalez', '649879r', '9098-4822-8240-2006', 'Gonzalez142@gmail.com'),
('Ronald90', 'Ronald', 'Grant', '401190F', '0092-8854-2376-2548', 'Grant27@gmail.com'),
('Roy82', 'Roy', 'Frazier', '271258R', '8466-3994-2745-6804', 'Frazier6008@gmail.com'),
('Ruby18', 'Ruby', 'Ryan', '252033E', '4728-2923-1723-2274', 'Ryan1@gmail.com'),
('Russell931', 'Russell', 'Daniels', '353512K', '7637-9138-6632-6701', 'Daniels64@gmail.com'),
('Ryan683', 'Ryan', 'Miller', '396683Q', '6025-9173-5690-3925', 'Miller64@gmail.com'),
('Sandra39', 'Sandra', 'Martinez', '694484S', '4470-6532-1765-0074', 'Martinez8190@gmail.com'),
('Sandra71', 'Sandra', 'Gardner', '196434a', '9386-1587-5471-7638', 'Gardner09@gmail.com'),
('Steven158', 'Steven', 'Fisher', '240093U', '5716-9130-3704-3286', 'Fisher4082@gmail.com'),
('Susan309', 'Susan', 'Andrews', '669394x', '2543-5397-7598-7051', 'Andrews5052@gmail.com'),
('Teresa96', 'Teresa', 'Fisher', '277050Z', '6594-5180-3077-5413', 'Fisher7@gmail.com'),
('Terry722', 'Terry', 'Hunter', '220184H', '0837-3380-8220-1612', 'Hunter00@gmail.com'),
('Timothy34', 'Timothy', 'Riley', '559846U', '9583-1143-9257-0669', 'Riley3@gmail.com'),
('Timothy76', 'Timothy', 'Barnes', '139727b', '7701-9222-3888-5763', 'Barnes8141@gmail.com'),
('Tina08', 'Tina', 'Perkins', '255211S', '1372-2743-1887-0688', 'Perkins2869@gmail.com'),
('Tina29', 'Tina', 'Lawrence', '827830z', '0693-5378-6519-5020', 'Lawrence4@gmail.com'),
('Todd873', 'Todd', 'Long', '874896X', '8746-8767-5179-1795', 'Long3@gmail.com'),
('Victor13', 'Victor', 'Green', '379446j', '5561-2822-3869-8166', 'Green63@gmail.com'),
('Victor51', 'Victor', 'Banks', '730722R', '1962-4640-1859-8961', 'Banks6@gmail.com'),
('Wayne73', 'Wayne', 'Hill', '151418Q', '7289-5859-7937-1124', 'Hill353@gmail.com'),
('William008', 'William', 'Patterson', '342353U', '5103-3413-4608-6790', 'Patterson2134@gmail.com'),
('William362', 'William', 'Bowman', '198659N', '6777-7103-8183-6852', 'Bowman4@gmail.com'),
('Willie698', 'Willie', 'Ross', '239994M', '7226-4657-3050-9820', 'Ross09@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `username` (`username`),
  ADD KEY `roomID` (`roomID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

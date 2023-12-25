-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2023 at 06:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tour_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`admin_id`, `admin_name`, `admin_pass`) VALUES
(10500, 'ShaoFan', '123456'),
(111111, 'user', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `booking_type` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `booking_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `booking_email` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_of_traveller` int(11) NOT NULL,
  `booking_price` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `booking_details` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `booking_status` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `id`, `booking_type`, `booking_name`, `booking_email`, `no_of_traveller`, `booking_price`, `booking_details`, `booking_status`) VALUES
(3, 4534, 'flight', 'alicia', 'alicia@gmail.com', 5, 'RM600', NULL, 'Paid'),
(4, 3, 'train', 'limshaofan', 'limshaofan@outlook.com', 5, 'RM9325', 'JAT_SPECIAL, Train From: Malaysia to England, Train Time: 23:55 -> 13:20 , AC3_TIER, ONE WAY', 'Paid'),
(6, 9100, 'cab', 'alex', 'alex@gmail.com', 2, 'RM1890', 'Compact	, Cab From: Malaysia to Howrah', 'Paid'),
(7, 456011, 'destination', 'hello', 'limshaofan@outlook.com', 3, 'RM135000', 'SINGAPORE, Tour Date: 01-10-2018 , 15 Days/14 Nights, SINGAPORE AIRLINES , GRAND_PACIFIC (4-Star-AC)', 'Paid'),
(8, 48, 'hotel', 'hello', 'limshaofan@outlook.com', 5, 'RM43825', 'MILENNIUM_RESORT, 5STAR, ENGLAND, SINGLE_NON_AC', 'Paid'),
(10, 9102, 'cab', 'hello', 'limshaofan@outlook.com', 4, 'RM3960', 'Compact, Cab From: Malaysia to Airport', 'Paid'),
(11, 9102, 'cab', 'hello', 'limshaofan@outlook.com', 3, 'RM2970', 'Compact, Cab From: Malaysia to Airport', 'Paid'),
(12, 456009, 'destination', 'hello', 'limshaofan@outlook.com', 4, NULL, NULL, 'Unpaid'),
(13, 632503, 'flight', 'hello', 'limshaofan@outlook.com', 3, 'RM2976', 'JET AIRWAYS, Flight From: Malaysia to England ,Flight Time: 06:30 -> 12:15,Premium class, One way', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `cab_search`
--

CREATE TABLE `cab_search` (
  `cab_id` int(10) NOT NULL,
  `cab_class` varchar(20) NOT NULL,
  `cab_from` varchar(50) NOT NULL,
  `cab_to` varchar(50) NOT NULL,
  `cab_price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cab_search`
--

INSERT INTO `cab_search` (`cab_id`, `cab_class`, `cab_from`, `cab_to`, `cab_price`) VALUES
(9100, 'Compact	', 'Malaysia', 'Howrah', 'RM945'),
(9101, 'SUV', 'Malaysia', 'Sealdah', 'RM1279'),
(9102, 'Compact', 'Malaysia', 'Airport', 'RM990'),
(9103, 'SUV', 'Malaysia', 'Howrah', 'RM1267'),
(9104, 'Sedan', 'Malaysia', 'Sealdah', 'RM768'),
(9105, 'SUV', 'Malaysia', 'Digha', 'RM2300'),
(9106, 'Sedan', 'Malaysia', 'Bakhali', 'RM2500'),
(9107, 'Compact', 'Malaysia', 'Haldia', 'RM1678'),
(9108, 'Sedan', 'Malaysia', 'Chitpur', 'RM560');

-- --------------------------------------------------------

--
-- Table structure for table `contact_register`
--

CREATE TABLE `contact_register` (
  `user id` int(20) NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_register`
--

INSERT INTO `contact_register` (`user id`, `u_name`, `email`, `phone`, `message`) VALUES
(70001, 'NILU DAS', 'nilu@gmail.com', '9876543210', 'Plz send a detailed brochure before I book a package.'),
(70002, 'Navina', 'navina@gmail.com', '9876543210', 'I am a cinema hall');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(11) NOT NULL,
  `destination_name` varchar(50) NOT NULL,
  `tour_date` varchar(20) NOT NULL,
  `tour_period` varchar(30) NOT NULL,
  `travel_class` varchar(30) NOT NULL,
  `travel_by` varchar(30) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `hotel_type` varchar(30) NOT NULL,
  `tour_price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `destination_name`, `tour_date`, `tour_period`, `travel_class`, `travel_by`, `hotel_name`, `hotel_type`, `tour_price`) VALUES
(456001, 'EXORTIC KASHMIR', '23-06-2018', '15 Days/14 Nights', 'Economy class', 'HIMGIRI_EXPRESS', 'PINE_VIEW', '3-Star-AC', 'RM18000'),
(456002, 'MAGNIFICENT KERALA', '27-06-2018', '14 Days/13 Nights', 'Business class', 'SPICE JET FLIGHT', 'PANAROMIC_SEA', '3-Star-NON-AC', 'RM20000'),
(456003, 'DAZLING GOA', '30-06-2018', '12 Days/11 Nights', 'Economy class', 'AMARAVATI_EXPRESS', 'NOVOTEL_GOA', '5-Star-AC', 'RM16000'),
(456004, 'CHAR DHAM JATRA', '24-06-2018', '10 Days/9 Nights', 'Economy class', 'PURI_EXPRESS', 'GRAPEVINE', '4-Star-Non-AC', 'RM12000'),
(456005, 'MUMBAI WITH MALABAR', '01-07-2018', '15 Days/14 Nights', 'Business class', 'INDIGO', 'THE_TAJMAHAL_PALACE', '5-Star-AC', 'RM17500'),
(456006, 'INCREDIBLE RAJASTHAN', '10-08-2018', '16 Days/15 Nights', 'Business class', 'AIR INDIA', 'HOTEL_RUBY', '5-Star-Non-AC', 'RM22000'),
(456007, 'SOUTH INDIA', '21-06-2018', '18 Days/17 Nights', 'Business class', 'COROMANDAL_EXPRESS', 'SOMMERSET_GREENWAYS', '4-Star-AC', 'RM25000'),
(456008, 'SILK ROUTE', '27-06-2018', '12 Days/11 Nights', 'Economy class', 'AIR ASIA', 'NEW_ORCHID', '1-Star-Non-AC', 'RM12000'),
(456009, 'KAZIRANGA WITH DOOARS', '30-06-2018', '10 Days/09 Nights', 'Economy class', 'GUWAHATI_EXPRESS', 'GRAND_PALACE', '3-Star-Non-AC', 'RM10000'),
(456010, 'ANDAMAN WITH NICOBAR', '11-10-2018', '19 Days/08 Nights', 'Premium class', 'GO AIR', 'SEA_SHELL', '1-Star-NON_', 'RM32000'),
(456011, 'SINGAPORE', '01-10-2018', '15 Days/14 Nights', 'Business class', 'SINGAPORE AIRLINES', 'GRAND_PACIFIC', '4-Star-AC', 'RM45000'),
(456012, 'THAILAND', '10-09-2018', '11 Days/10 Nights', 'First class', 'JET AIRWAYS', 'THE_EMERALD', '4-Star-AC', 'RM50000'),
(456013, 'AUSTRALIA', '21-06-2018', '18 Days/17 Nights', 'Premium class', 'SILK AIR', 'CANBERRA_REX', '5-Star-AC', 'RM85000'),
(456014, 'PARIS', '27-06-2018', '12 Days/11 Nights', 'Business class', 'AIR FRANCE', 'THE_PENINSULA_PARIS', '5-Star-AC', 'RM56000'),
(456015, 'AMERICA- NEW YORK', '27-10-2018', '12 Days/11 Nights', 'First class', 'ETHIHAD AIRWAYS', 'WELLINGTON', '3-Star-NON_AC', 'RM84000'),
(456016, 'EUROPE', '30-10-2018', '15 Days/14 Nights', 'First class', 'KLM ROYALE DUTCH', 'THE_LANGHAM_LONDON', '5-Star-AC', 'RM120000');

-- --------------------------------------------------------

--
-- Table structure for table `flight_search`
--

CREATE TABLE `flight_search` (
  `flight_id` int(20) NOT NULL,
  `flight_name` varchar(50) NOT NULL,
  `flight_from` varchar(30) NOT NULL,
  `flight_to` varchar(30) NOT NULL,
  `flight_dept_time` varchar(20) NOT NULL,
  `flight_arrival_time` varchar(30) NOT NULL,
  `travel_class` varchar(30) NOT NULL,
  `travel_type` varchar(30) NOT NULL,
  `flight_price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `flight_search`
--

INSERT INTO `flight_search` (`flight_id`, `flight_name`, `flight_from`, `flight_to`, `flight_dept_time`, `flight_arrival_time`, `travel_class`, `travel_type`, `flight_price`) VALUES
(632502, 'INDIGO AIRWAYS', 'Malaysia', 'England', '06:05', '14:20', 'Business class', 'Round trip', 'RM1826'),
(632503, 'JET AIRWAYS', 'Malaysia', 'England', '06:30', '12:15', 'Premium class', 'One way', 'RM992'),
(632504, 'AIR INDIA', 'Malaysia', 'England', '06:50', '13:40', 'Business class', 'One Way', 'RM3982'),
(632505, 'MULTIPLE AIRWAYS', 'Malaysia', 'Kerala', '14:10', '18:40', 'First class', 'Round trip', 'RM1125'),
(632506, 'AIR INDIA', 'Malaysia', 'Kerala', '10:00', '18:30', 'Business class', 'One Way', 'RM735'),
(632507, 'SPICE JET', 'Malaysia', 'Kerala', '13:25', '22:30', 'Economy class', 'Round trip', 'RM500'),
(632509, 'VISTARA', 'Malaysia', 'Goa', '07:05', '13:50', 'Business class', 'Round trip', 'RM2900'),
(632510, 'JET AIRWAYS', 'Malaysia', 'Goa', '08:30', '13:25', 'Premium class', 'One Way', 'RM164'),
(632511, 'INDIGO', 'Malaysia', 'Mumbai', '07:05', '09:56', 'Economy class', 'One Way', 'RM3989'),
(632512, 'GO AIR', 'Malaysia', 'Mumbai', '23:30', '02:15', 'Business class', 'Round trip', 'RM317'),
(632513, 'VISTARA', 'Malaysia', 'Mumbai', '17:00', '23:35', 'Premium class', 'Round trip', 'RM5200'),
(632514, 'JET AIRWAYS', 'Malaysia', 'Rajasthan', '06:00', '08:20', 'Business class', 'Round trip', 'RM2200'),
(632515, 'AIR INDIA', 'Malaysia', 'Bangladesh', '21:00', '23:20', 'Economy class', 'One Way', 'RM3400'),
(632516, 'GO AIR', 'Malaysia', 'Rajasthan', '06:00', '08:20', 'Economy class', 'One Way', 'RM3003'),
(632517, 'SPICE JET', 'Malaysia', 'Chennai', '06:15', '08:40', 'Economy class', 'Round trip', 'RM6137'),
(632518, 'VISTARA', 'Malaysia', 'Chennai', '20:50', '23:15', 'Business class', 'One Way', 'RM6800'),
(632519, 'AIR INDIA', 'Malaysia', 'Chennai', '14:35', '17:50', 'Premium class', 'Round trip', 'RM4200'),
(632520, 'SPICE JET', 'Malaysia', 'Sikkim', '11:05', '12:20', 'Economy class', 'One Way', 'RM989'),
(632521, 'AIR ASIA', 'Malaysia', 'Sikkim', '16:10', '17:25', 'Business class', 'Round trip', 'RM8400'),
(632522, 'JET AIRWAYS', 'Malaysia', 'Sikkim', '07:30', '13:50', 'Economy class', 'One Way', 'RM3700'),
(632523, 'GO AIR', 'Malaysia', 'Andaman & Nicobar', '08:35', '10:55', 'Business class', 'Round trip', 'RM4400'),
(632524, 'VISTARA', 'Malaysia', 'Andaman & Nicobar', '10:25', '12:55', 'First class', 'One Way', 'RM10800'),
(632525, 'AIR INDIA', 'Malaysia', 'Andaman & Nicobar', '05:30', '07:50', 'Economy class', 'One Way', 'RM4099'),
(632526, 'INDIGO', 'Malaysia', 'Singapore', '11:30', '04:40', 'Business class', 'One Way', 'RM2037'),
(632527, 'AIR ASIA', 'Malaysia', 'Singapore', '14:35', '17:55', 'Premium class', 'Round trip', 'RM800'),
(632528, 'SINGAPORE AIRLINES', 'Kolkata', 'Singapore', '23:50', '06:40', 'Business class', 'One Way', 'RM2711'),
(632529, 'INDIGO', 'Kolkata', 'Thailand', '10:20', '14:40', 'Economy class', 'One Way', 'RM5600'),
(632530, '  AIR INDIA', '  Kolkata', '  Thailand', '  16:55', '  7:45', '  Business class', '  One Way', '  RM9350'),
(632531, 'JET AIRWAYS', 'Kolkata', 'Thailand', '20:15', '4:45', 'Premium class', 'Round trip', 'RM5133'),
(632532, 'SINGAPORE AIRLINES', 'Kolkata', 'Australia', '23:50', '22:20', 'Economy class', 'One Way', 'RM3826'),
(632533, 'SILK AIR', 'Kolkata', 'Australia', '23:50', '07:05', 'Economy class', 'Round trip', 'RM8156'),
(632534, 'CATHAY DRAGON', 'Kolkata', 'Australia', '01:15', '10:35', 'Premium class', 'One Way', 'RM1029'),
(632535, 'JET AIRWAYS', 'Kolkata', 'Paris', '21:20', '08:15', 'Economy class', 'Round trip', 'RM3570'),
(632536, 'AIR INDIA', 'Kolkata', 'Paris', '06:05', '18:55', 'Business class', 'One Way', 'RM1099'),
(632537, 'AIR FRANCE', 'Kolkata', 'Paris', '21:10', '10:45', 'Business class', 'Round trip', 'RM3160'),
(632538, 'ETIHAD AIRWAYS', 'Kolkata', 'America', '21:05', '09:10', 'First class', 'One Way', 'RM660'),
(632539, 'AIR INDIA', 'Kolkata', 'America', '06:05', '07:25', 'Business class', 'Round trip', 'RM776'),
(632540, 'JET AIRWAYS', 'Kolkata', 'America', '21:10', '14:20', 'Economy class', 'One Way', 'RM8269'),
(632541, 'JET AIRWAYS', 'Kolkata', 'London', '18:00', '18:20', 'Economy class', 'One Way', 'RM1050'),
(632542, 'AIR INDIA', 'Kolkata', 'London', '16;55', '11:30', 'Business class', 'Round trip', 'RM4155'),
(632543, 'KLM ROYALE DUTCH', 'Kolkata', 'London', '21:20', '17:10', 'First class', 'One Way', 'RM7017');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_search`
--

CREATE TABLE `hotel_search` (
  `hotel_id` int(20) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `hotel_class` varchar(30) NOT NULL,
  `hotel_location` varchar(30) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `room_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hotel_search`
--

INSERT INTO `hotel_search` (`hotel_id`, `hotel_name`, `hotel_class`, `hotel_location`, `room_type`, `room_price`) VALUES
(27, 'CHENNAI_LE_PALACE', '1STAR', 'CHENNAI', 'MULTIROOMS', 'RM2876'),
(28, 'THE_PARK_CHENNAI', '5STAR', 'CHENNAI', 'SINGLE_NON_AC', 'RM5962'),
(29, 'TARA_PALACE', '5STAR', 'SIKKIM', 'DOUBLE_AC', 'RM3390'),
(31, 'RICASA', '3STAR', 'SIKKIM', 'DOUBLE_NONAC', 'RM1324'),
(32, 'NEW_ORCHID', '1STAR', 'SIKKIM', 'SINGLE_NON_AC', 'RM2642'),
(33, 'KIRANSHREE_HOME', '5STAR', 'ASSAM', 'DOUBLE_NONAC', 'RM2602'),
(34, 'PALACIO', '3STAR', 'ASSAM', 'DULUXE', 'RM4508'),
(35, 'GRAND_PALACE', '3STAR', 'KAZIRANGA', 'SINGLE_ROOM_AC', 'RM2862'),
(36, 'RISHIRAJ', '1STAR', 'KAZIRANGA', 'DULUXE', 'RM4689'),
(37, 'SEA_SHELL', '1STAR', 'ANDAMAN', 'MULTIROOMS', 'RM7225'),
(38, 'CORAL_REEF', '4STAR', 'ANDAMAN', 'DULUXE', 'RM7018'),
(39, 'J', '3STAR', 'ANDAMAN', 'SINGLE_ROOM_AC', 'RM3452'),
(40, 'THE_OCEANUS_RESORT', '1STAR', 'ANDAMAN', 'SINGLE_NON_AC', 'RM4563'),
(41, 'SWISSOTEL_THE_STANFORD', '5STAR', 'SINGAPORE', 'DOUBLE_NONAC', 'RM7731'),
(42, 'GRAND_PACIFIC', '4STAR', 'SINGAPORE', 'DULUXE', 'RM7300'),
(43, 'MARRISON_HOTEL', '3STAR', 'SINGAPORE', 'DOUBLE_AC', 'RM5765'),
(44, 'THE_CLAREMONT', '2STAR', 'SINGAPORE', 'SINGLE_NON_AC', 'RM6934'),
(45, 'GRAND_CITY_BANGKOK', '3STAR', 'ENGLAND', 'DOUBLE_NONAC', 'RM1960'),
(46, 'GRAND_HOTEL_PATTAYA', '2STAR', 'ENGLAND', 'DULUXE', 'RM2679'),
(47, 'THE_EMERALD', '4STAR', 'ENGLAND', 'SINGLE_ROOM_AC', 'RM4415'),
(48, 'MILENNIUM_RESORT', '5STAR', 'ENGLAND', 'SINGLE_NON_AC', 'RM8765'),
(49, 'RYDGES_MELBOURNE', '4STAR', 'AUSTRALIA', 'MULTIROOMS', 'RM2678'),
(50, 'CANBERRA_REX', '5STAR', 'AUSTRALIA', 'DULUXE', 'RM4565'),
(51, 'CAMBRIDGE_HOTEL', '3STAR', 'AUSTRALIA', 'DOUBLE_AC', 'RM1509'),
(52, 'DARCYS', '1STAR', 'AUSTRALIA', 'SINGLE_NON_AC', 'RM7434'),
(53, 'HOTEL_DECLIC', '1STAR', 'PARIS', 'MULTIROOMS', 'RM7325'),
(54, 'THE_PENINSULA_PARIS', '5STAR', 'PARIS', 'DULUXE', 'RM5678'),
(55, 'HOTEL_MARCUE', '4STAR', 'PARIS', 'DOUBLE_NONAC', 'RM5502'),
(56, 'REGENT\'S_GARDEN', '4STAR', 'PARIS', 'DOUBLE_AC', 'RM1509'),
(57, 'PARAMOUNT_HOTEL', '4STAR', 'AMERICA', 'MULTIROOMS', 'RM9870'),
(58, 'NEW_YORK_MARRIOT_MARQUIS', '4STAR', 'AMERICA', 'SINGLE_NON_AC', 'RM5466'),
(59, 'WELLINGTON', '3STAR', 'AMERICA', 'DOUBLE_NONAC', 'RM3560'),
(60, 'BELVEDERE_HOTEL', '2STAR', 'AMERICA', 'SINGLEROOM_AC', 'RM4760'),
(61, 'TRAVELODGE_LONDON', '2STAR', 'LONDON', 'MULTIROOMS', 'RM8100'),
(62, 'ROYAL_CAMBRIDGE', '3STAR', 'LONDON', 'DULUXE', 'RM6674'),
(63, 'THE_LANGHAM_LONDON', '5STAR', 'LONDON', 'DOUBLE_AC', 'RM3625'),
(64, 'THE_WASHINGTON_MATFAIR', '4STAR', 'LONDON', 'SINGLE_NON_AC', 'RM6506'),
(1002, 'PINE_VIEW', '3STAR', 'England', 'DULUXE', 'RM7325'),
(1003, 'ASIAN_PARK', '5STAR', 'England', 'SINGLE_AC', 'RM8765'),
(1004, 'THE_LALIT_GRAND_PALACE', '5STAR', 'England', 'MULTIROOMS', 'RM4800'),
(1005, 'SOLAR_RESIDENCY', '4STAR', 'England', 'DOUBLE_AC', 'RM7434'),
(1006, 'PANAROMIC_SEA', '3STAR', 'KERALA', 'DOUBLE_NONAC', 'RM4768'),
(1007, 'HOTEL_HIGHRANGR_INN', '2STAR', 'KERALA', 'SINGLE_NON_AC', 'RM2679'),
(1008, 'TURTLE_ON_THE_BEACH', '5STAR', 'KERALA', 'MULTIROOMS', 'RM6092'),
(1009, 'THE_CENTRAL_REDIDENCY', '4STAR', 'KERALA', 'DULUXE', 'RM4224'),
(1010, 'NOVOTEL_GOA', '5STAR', 'GOA', 'DOUBLE_AC', 'RM7675'),
(1011, 'AMIGO_PLAZA', '2STAR', 'GOA', 'SINGLE_AC', 'RM2061'),
(1012, 'SEASHELL_VILLA', '4STAR', 'GOA', 'DULUXE', 'RM1523'),
(1013, 'BLUE_LILY_BEACH', '4STAR', 'PURI', 'DOUBLE_NONAC', 'RM2818'),
(1014, 'GRAPEVINE', '4STAR', 'VARANASI', 'MULTIROOMS', 'RM4789'),
(1015, 'HERITAGE INN', '3STAR', 'VARANASI', 'DOUBLE_NONAC', 'RM1994'),
(1016, 'NARAYAN_PALACE', '3STAR', 'BADRINATH', 'SINGLE_NON_AC', 'RM4536'),
(1017, 'THE_LALIT_MUMBAI', '5STAR', 'MUMBAI', 'DOUBLE_AC', 'RM11509'),
(1018, 'THE_TAJMAHAL_PALACE', '5STAR', 'MUMBAI', 'DULUXE', 'RM8759'),
(1019, 'FAB_HOTEL_GALAXY', '3STAR', 'MUMBAI', 'DOUBLE_AC', 'RM2918'),
(1020, 'CITY_PALACE', '2STAR', 'MUMBAI', 'SINGLE_NON_AC', 'RM1135'),
(1021, 'HOTEL_MARUTHOR', '1STAR', 'RAJASTHAN', 'DOUBLE_AC', 'RM730'),
(1022, 'HOTEL_PITHLA_HAVELLI', '3STAR', 'RAJASTHAN', 'DULUXE', 'RM1875'),
(1023, 'HOTEL_SHANLKAR_PALACE', '4STAR', 'RAJASTHAN', 'MULTIROOMS', 'RM2878'),
(1024, 'HOTEL_RUBY', '5STAR', 'RAJASTHAN', 'SINGLE_NON_AC', 'RM1904'),
(1025, 'FRANT_TREAT', '2STAR', 'CHENNAI', 'DOUBLE_AC', 'RM1856'),
(1026, 'SOMERSET_GREENWAYS', '4STAR', 'CHENNAI', 'DULUXE', 'RM5913');

-- --------------------------------------------------------

--
-- Table structure for table `tour_register`
--

CREATE TABLE `tour_register` (
  `reg_id` int(10) NOT NULL,
  `reg_name` varchar(50) NOT NULL,
  `reg_email` varchar(30) NOT NULL,
  `reg_phone` varchar(10) NOT NULL,
  `reg_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tour_register`
--

INSERT INTO `tour_register` (`reg_id`, `reg_name`, `reg_email`, `reg_phone`, `reg_pass`) VALUES
(60010, 'user1', 'user@gmail.com', '7896541023', '123456'),
(60017, 'DIPAYAN DAS', 'dipayan@gmail.com', '9876543210', 'dipayan'),
(60018, 'RAGHU SINGH', 'raghupriya345@gmail.com', '7890653412', '1234567'),
(60019, 'alicia', 'alicia@outlook.com', '0124136106', '123456'),
(60021, 'limshaofan', 'limshaofan@outlook.com', '1234567', '123456'),
(60025, 'siti', 'siti@gmail.com', '1212121212', 'fsdsdsdsd'),
(60026, 'alex', 'alex@outlook.com', '0124136106', '123456'),
(60027, 'ahmad', 'ahmad@gmail.com', '0123456789', '123456'),
(60028, 'hello', 'hello@gmail.com', '0123456789', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `train_search`
--

CREATE TABLE `train_search` (
  `train_id` int(20) NOT NULL,
  `train_name` varchar(50) NOT NULL,
  `train_from` varchar(30) NOT NULL,
  `train_to` varchar(30) NOT NULL,
  `train_dept_time` varchar(20) NOT NULL,
  `train_arr_time` varchar(20) NOT NULL,
  `travel_class` varchar(30) NOT NULL,
  `travel_type` varchar(30) NOT NULL,
  `train_price` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `train_search`
--

INSERT INTO `train_search` (`train_id`, `train_name`, `train_from`, `train_to`, `train_dept_time`, `train_arr_time`, `travel_class`, `travel_type`, `train_price`) VALUES
(1, 'JAMMU_TAWAI_EXPRESS', 'Malaysia', 'England', '7.30', '08:30', 'SLEEPER ', 'ONE WAY', 'RM7500'),
(2, 'HIMGIRI_EXPRESS', 'Malaysia', 'England', '23:55', '12:35', 'AC2_TIER', 'ROUNDTRIP', 'RM4200'),
(3, 'JAT_SPECIAL', 'Malaysia', 'England', '23:55', '13:20', 'AC3_TIER', 'ONE WAY', 'RM1865'),
(4, 'ANVY_YUVA', 'Malaysia', 'England', '18:40', '11:20', 'CC', 'ROUNDTRIP', 'RM875'),
(5, 'AMARAVATI_EXPRESS', 'Malaysia', 'Kerala', '23:30', '18:23', 'SLEEPER', 'ONE WAY', 'RM525'),
(6, 'HUMSAFAR_EXPRESS', 'Malaysia', 'Kerala', '12:40', '14:05', 'AC3_TIER', 'ROUNDTRIP', 'RM3400'),
(7, 'KANYAKUMARI_EXPRESS', 'Malaysia', 'Kerala', '14:35', '15:10', 'AC2_TIER', 'ONE WAY', 'RM690'),
(8, 'NS_DMM_EXPRESS', 'Malaysia', 'Kerala', '21:40', '04:35', 'CC', 'ROUNDTRIP', 'RM567'),
(9, 'AMARAVATI_EXPRESS', 'Malaysia', 'GOA', '23:30', '13:55', 'SLEEPER', 'ONE WAY', 'RM750'),
(10, 'NETRAVATI_EXPRESS', 'Malaysia', 'GOA', '11:40', '22:45', 'AC3_TIER', 'ROUNDTRIP', 'RM2050'),
(11, 'GITANJALI_EXPRESS', 'Malaysia', 'GOA', '13:50', '21:20', 'AC2_TIER', 'ONE WAY', 'RM2820'),
(12, 'MANGALORE_EXPRESS', 'Malaysia', 'GOA', '22:02', '07:05', '2S', 'ROUNDTRIP', 'RM840'),
(13, 'RAJDHANI_EXPRESS', 'Malaysia', 'VARANASI', '16:55', '20:45', 'AC1', 'ONE WAY', 'RM2920'),
(14, 'MUMBAI_MAIL', 'Malaysia', 'VARANASI', '22:00', '8:10', 'SLEEPER', 'ROUNDTRIP', 'RM668'),
(15, 'SATABDI_EXPRESS', 'Malaysia', 'Puri', '14:25', '21:55', 'CC', 'ONE WAY', 'RM955'),
(16, 'PURI_EXPRESS', 'Malaysia', 'Puri', '22:35', '07:00', 'SLEEPER', 'ROUNDTRIP', 'RM564'),
(17, 'GITANJALI_EXPRESS', 'Malaysia', 'Mumbai', '8:20', '10:30', 'SLEEPER', 'ONE WAY', 'RM740'),
(18, 'ADI_EXPRESS', 'Malaysia', 'Mumbai', '23:55', '19:00', 'AC3_TIER', 'ROUNDTRIP', 'RM3688'),
(19, 'DEVGIRI_EXPRESS', 'Malaysia', 'Mumbai', '1:50', '7:40', 'AC1', 'ONE WAY', 'RM1150'),
(20, 'AZAD_HIND_EXPRESS', 'Malaysia', 'Mumbai', '21:50', '23:50_NEXT_DAY', 'AC2_TIER', 'ROUNDTRIP', 'RM5690'),
(21, 'MTD-BKN', 'Malaysia', 'England', '23:40', '08:30', 'SLEEPER', 'ONE WAY', 'RM350'),
(22, 'JU_EXPRESS', 'Malaysia', 'Rajasthan', '23:40', '1:05_NEXT_DAY', 'AC3_TIER', 'ROUNDTRIP', 'RM3262'),
(23, 'AF_JP_SATABDI', 'Malaysia', 'Rajasthan', '17:40', '21:20_NEXT_DAY', 'CC', 'ONE WAY', 'RM655'),
(24, 'SALASAR_SUPERFAST', 'Malaysia', 'Rajasthan', '7:05', '17:55', '2S', 'ROUNDTRIP', 'RM410'),
(25, 'COROMANDAL_EXPRESS', 'Malaysia', 'Chennai', '14:50', '17:00_NEXT_DAY', 'AC1', 'ONE WAY', 'RM4345'),
(26, 'NAVJEEVAN_EXPRESS', 'Kolkata', 'Chennai', '09:00', '16:05', 'AC2_TIER', 'ROUNDTRIP', 'RM2016'),
(27, 'HWH_YRP_DURONTO', 'Kolkata', 'Chennai', '10:55', '14:30', 'AC1', 'ONE WAY', 'RM4330'),
(28, 'KANYAKUMARI_EXPRESS', 'Kolkata', 'Chennai', '23:55', '14:05_NEXT_DAY', 'AC3_TIER', 'ROUNDTRIP', 'RM3262'),
(29, 'SARAIGHAT_EXPRESS', 'Kolkata', 'Assam', '15:50', '9:50', 'SLEEPER', 'ONE WAY', 'RM500'),
(31, 'KAMRUP_EXPRESS', 'Kolkata', 'Assam', '17:35', '15:35_NEXT_DAY', 'SLEEPER', 'ONE WAY', 'RM455'),
(32, 'DBRT_RAJDHANI', 'Kolkata', 'Assam', '13:30', '19:50', 'AC1', 'ROUNDTRIP', 'RM4040');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`) USING BTREE;

--
-- Indexes for table `cab_search`
--
ALTER TABLE `cab_search`
  ADD PRIMARY KEY (`cab_id`);

--
-- Indexes for table `contact_register`
--
ALTER TABLE `contact_register`
  ADD PRIMARY KEY (`user id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `flight_search`
--
ALTER TABLE `flight_search`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `hotel_search`
--
ALTER TABLE `hotel_search`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `tour_register`
--
ALTER TABLE `tour_register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `train_search`
--
ALTER TABLE `train_search`
  ADD PRIMARY KEY (`train_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cab_search`
--
ALTER TABLE `cab_search`
  MODIFY `cab_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9110;

--
-- AUTO_INCREMENT for table `contact_register`
--
ALTER TABLE `contact_register`
  MODIFY `user id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70003;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456017;

--
-- AUTO_INCREMENT for table `flight_search`
--
ALTER TABLE `flight_search`
  MODIFY `flight_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=632545;

--
-- AUTO_INCREMENT for table `hotel_search`
--
ALTER TABLE `hotel_search`
  MODIFY `hotel_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1028;

--
-- AUTO_INCREMENT for table `tour_register`
--
ALTER TABLE `tour_register`
  MODIFY `reg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60029;

--
-- AUTO_INCREMENT for table `train_search`
--
ALTER TABLE `train_search`
  MODIFY `train_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

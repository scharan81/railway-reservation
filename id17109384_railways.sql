-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 02:36 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17109384_railways`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `mobile` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `email`, `password`, `age`, `gender`, `mobile`) VALUES
(1, 'charan', 'sricharankasulanati@gmail.com', 'cherry', 20, 'm', '9441714670');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `femail` varchar(50) NOT NULL,
  `trainid` varchar(20) NOT NULL,
  `ticketno` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `comtype` varchar(30) NOT NULL,
  `comstation` varchar(50) NOT NULL,
  `comdiscb` varchar(10000) NOT NULL,
  `cstatus` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `femail`, `trainid`, `ticketno`, `name`, `comtype`, `comstation`, `comdiscb`, `cstatus`) VALUES
(9, 'sricharankasulanati3@gmail.com', '32491', '248', 'b', 'Murder', 'kurnool', 'fuiefefywefywcbcueiruhre ', 'R'),
(10, 'sricharankasulanati3@gmail.com', '32491', '250', 'c', 'Theft', 'xyz', 'A suite case was stolen.', 'S'),
(23, 'sricharankasulanati@gmail.com', '32491', '256', 'charan', 'Theft', 'hyderabad', 'fewojfweijewwg', 'R'),
(24, 'sricharankasulanati3@gmail.com', '32491', '256', 'charan', 'Medical Emergency', 'hyderabad', 'o34j3gu3ggh', 'R'),
(25, 'sricharankasulanati3@gmail.com', '32491', '297', 'abcde', 'Medical Emergency', 'Anantapur', 'Need an ambulance', 'R'),
(26, 'sricharankasulanati3@gmail.com', '32491', '297', 'abcde', 'Medical Emergency', 'Anantapur', 'Need an ambulance', 'R'),
(29, 'sricharankasulanati3@gmail.com', '12567', '299', 'swejf', 'Theft', 'uewgewfgeyfr', 'vreigjig4ij43oih4t34t43', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_details`
--

CREATE TABLE `passenger_details` (
  `ticketno` int(100) NOT NULL,
  `femail` varchar(50) NOT NULL,
  `pname` varchar(40) NOT NULL,
  `page` int(3) NOT NULL,
  `pid` int(15) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `trainid` varchar(11) NOT NULL,
  `dateofjourney` text NOT NULL DEFAULT current_timestamp(),
  `pfrom` varchar(30) NOT NULL,
  `pto` varchar(30) NOT NULL,
  `bstatus` varchar(6) NOT NULL,
  `class` varchar(3) NOT NULL,
  `cost` varchar(10) NOT NULL,
  `cancellation` varchar(2) NOT NULL,
  `jcompleted` varchar(2) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger_details`
--

INSERT INTO `passenger_details` (`ticketno`, `femail`, `pname`, `page`, `pid`, `gender`, `email`, `phone`, `trainid`, `dateofjourney`, `pfrom`, `pto`, `bstatus`, `class`, `cost`, `cancellation`, `jcompleted`) VALUES
(248, 'sricharankasulanati3@gmail.com', 'Anfeheghreugheughrugrhughrei', 1, 1234556, 'm', 'a@gmail.com', '1234567909', '1234567', '2021-06-19', 'visakhapatnam', 'vijayawada', 'WL-3', '', '', 'Y', 'Y'),
(250, 'sricharankasulanati3@gmail.com', 'c', 3, 343767323, 'm', 'c@gmail.com', '1234567909', '1234567', '2021-06-17', 'visakhapatnam', 'vijayawada', 'CON', '', '', 'N', 'Y'),
(251, 'sricharankasulanati3@gmail.com', 'd', 4, 4, 'm', 'd@gmail.com', '1234567909', '1234567', '2021-06-18', 'visakhapatnam', 'vijayawada', 'CON', '', '', 'N', 'Y'),
(270, 'sricharankasulanati3@gmail.com', 'e', 5, 5, 'm', 'd@gmail.com', '1234567909', '32491', '2021-06-23', 'visakhapatnam', 'vijayawada', 'CON', '', '', 'Y', 'Y'),
(271, 'sricharankasulanati3@gmail.com', 'f', 6, 6, 'm', 'd@gmail.com', '1234567909', '1234567', '2021-06-18', 'visakhapatnam', 'vijayawada', 'CON', '', '', 'Y', 'Y'),
(272, 'sricharankasulanati3@gmail.com', 'charan', 23, 12345678, 'm', 'sricharankasulanati3@gmail.com', '9441714670', '32491', '2021-06-23', 'Bangalore', 'Hyderabad', 'CON', '', '', 'N', 'Y'),
(287, 'sricharankasulanati3@gmail.com', 'kqera', 90, 384737358, 'm', 'fhurr@gmail.com', '6789543210', '32491', '2021-06-27', 'Bangalore', 'Hyderabad', 'CON', '', '', 'N', 'Y'),
(288, 'sricharankasulanati3@gmail.com', 'kasu', 90, 2387358, 'f', 'fhurr@gmail.com', '6789543210', '32491', '2021-06-27', 'Bangalore', 'Hyderabad', 'CON', 'AC', '', 'Y', 'Y'),
(289, 'sricharankasulanati3@gmail.com', 'kasu2', 45, 2387358, 'm', 'fhurr@gmail.com', '6789543210', '32491', '2021-06-27', 'Bangalore', 'Hyderabad', 'CON', 'AC', '', 'N', 'Y'),
(290, 'sricharankasulanati3@gmail.com', 'kasu3', 90, 2387358, 'f', 'fhurr@gmail.com', '6789543210', '32491', '2021-06-27', 'Bangalore', 'Hyderabad', 'WL-1', 'AC', '', 'N', 'Y'),
(291, 'sricharankasulanati3@gmail.com', 'kasu4', 90, 2387358, 'm', 'fhurr@gmail.com', '6789543210', '32491', '2021-06-29', 'Hindupur', 'Kurnool', 'CON', '2A', '', 'N', 'Y'),
(292, 'sricharankasulanati3@gmail.com', 'charan1', 12, 23473248, 'm', 'charan1@gmail.com', '9441714670', '32491', '2021-06-28', 'Bangalore', 'Hyderabad', 'CON', 'SL', '', 'N', 'Y'),
(293, 'sricharankasulanati3@gmail.com', 'charan2', 21, 2147483647, 'm', 'charan2@gmail.com', '9441714670', '32491', '2021-06-28', 'Bangalore', 'Hyderabad', 'CON', 'SL', '', 'Y', 'Y'),
(294, 'sricharankasulanati3@gmail.com', 'charanraja2', 23, 2147483647, 'm', 'cha@gmail.com', '9441714670', '32491', '2021-06-29', 'Bangalore', 'Hyderabad', 'CON', 'SL', '100', 'N', 'Y'),
(295, 'sricharankasulanati3@gmail.com', 'cha1', 23, 2147483647, 'm', 'cha1@gmail.com', '9441714670', '32491', '2021-06-29', 'Bangalore', 'Hyderabad', 'CON', 'SL', '100', 'N', 'Y'),
(296, 'sricharankasulanati3@gmail.com', 'kasu', 23, 2147483647, 'm', 'kasu@gmail.com', '9441714670', '53241', '2021-07-12', 'Hyderabad', 'Delhi', 'CON', 'SL', '100', 'N', 'Y'),
(297, 'sricharankasulanati3@gmail.com', 'abcde', 23, 2147483647, 'm', 'abcde@gmail.com', '9441714670', '32491', '2021-07-22', 'Bangalore', 'Hyderabad', 'CON', 'AC', '500', 'N', 'Y'),
(298, 'sricharankasulanati3@gmail.com', 'kasulanati', 45, 2147483647, 'm', 'ksaimaruthasricharan.18.it@anits.edu.in', '9441714670', '32491', '2021-08-14', 'Bangalore', 'Hyderabad', 'CON', 'AC', '500', 'Y', 'Y'),
(299, 'sricharankasulanati3@gmail.com', 'lohit', 21, 2147483647, 'm', 'lohitha@gmail.com', '8374719150', '12567', '2021-08-15', 'Mumbai', 'Hyderabad', 'CON', 'AC', '500', 'N', 'Y'),
(300, 'sricharankasulanati81@gmail.co', 'charan', 21, 2147483647, 'm', 'charan@gmail.com', '9876745678', '78901', '2022-10-31', 'Delhi', 'Hyderabad', 'CON', '3A', '1000', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL,
  `age` int(3) NOT NULL,
  `phone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `password`, `gender`, `age`, `phone`) VALUES
(2, 'Charan k', 'sricharankasulanati3@gmail.com', 'Cherry', 'm', 21, '2147483647'),
(6, 'pooja', 'pooja@gmail.com', 'pooja', 'f', 20, '2147483647'),
(7, 'raju', 'raju@gmail.com', 'raju123', 'm', 21, '1234567890'),
(8, 'gowree', 'gowree@gmail.com', 'gowree', 'f', 20, '2147483647'),
(9, 'charan', 'sricharankasulanati81@gmail.co', 'Cherry', 'm', 21, '9441714670');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `trainid` int(11) NOT NULL,
  `tname` varchar(30) NOT NULL,
  `fromcity` varchar(30) NOT NULL,
  `stage1` varchar(30) NOT NULL,
  `stage2` varchar(30) NOT NULL,
  `stage3` varchar(30) NOT NULL,
  `stage4` varchar(30) NOT NULL,
  `stage5` varchar(30) NOT NULL,
  `tocity` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `trainid`, `tname`, `fromcity`, `stage1`, `stage2`, `stage3`, `stage4`, `stage5`, `tocity`) VALUES
(1, 32491, 'Duranto express', 'Bangalore', 'Hindupur', 'Anantapur', 'Guntakal jn', 'Dharmavaram jn', 'Kurnool', 'Hyderabad'),
(2, 56890, 'Howrah express', 'Bangalore', 'Tirupati', 'Nellore', 'Vijayawada jn', 'Rajahmundry', 'Visakhapatnam', 'Kolkata'),
(3, 93973, 'Udyan', 'Bangalore', 'Guntakal jn', 'Wadi', 'Gangapur rd', 'Solapur', 'Pune', 'Mumbai'),
(4, 79993, 'Kaveri express', 'Bangalore', 'Madhapur', 'Maddur', 'Jolarpettai', 'Ambur', 'Trivellore', 'Chennai'),
(5, 39256, 'Rajdhani express', 'Bangalore', 'Dharmavaram jn', 'Raichur', 'Secundrabad jn', 'Nagpur', 'Jhansi', 'Delhi'),
(6, 63854, 'Kachiguda express', 'Hyderabad', 'Hindupur', 'Dharmavaram jn', 'Guntakal jn', 'Kurnool', 'Mehaboob nagar', 'Bangalore'),
(7, 91243, 'Falaknama expess', 'Hyderabad', 'Vijayawada jn', 'Visakhapatnam', 'Khurda rd', 'Cuttack', 'Kharagpur jn', 'Kolkata'),
(8, 15632, 'Nagpur express', 'Hyderabad', 'Vijayawada jn', 'Secundrabad jn', 'Nanded', 'Parbhani jn', 'Auramgabad', 'Mumbai'),
(9, 54321, 'Chennai express', 'Hyderabad', 'Solapur', 'Wadi', 'Guntakal jn', 'Rajampeta', 'Renigunta jn', 'Chennai'),
(10, 53241, 'Telangana express', 'Hyderabad', 'Secundrabad jn', 'Balharshah jn', 'Nagpore jn', 'Bhopal jn', 'Jhansi jn', 'Delhi'),
(11, 98765, 'Anga express', 'Kolkata', 'Vijayawada jn', 'Viziahnagaram jn', 'Khurda rd', 'Kharagpur jn', 'Kiul jn', 'Bangalore'),
(12, 65382, 'East-coast', 'Kolkata', 'Kharagpur jn', 'Khurda rd', 'Visakhaptanam', 'Rajahmundry', 'Vijayawada jn', 'Hyderabad'),
(13, 51234, 'Gitanjali express', 'Kolkata', 'Tatanagar jn', 'Rourkela', 'Bilaspur jn', 'Nagpur', 'Bhusaval jn', 'Mumbai'),
(14, 51118, 'Coramandal express', 'Kolkata', 'Balasore', 'Bhubaneswar', 'Khurda jn', 'Visakhaptanam jn', 'Vijayawada jn', 'Chennai'),
(15, 99337, 'Poorva express', 'Kolkata', 'Tundla jn', 'Kanpur jn', 'Patna jn', 'Jasindih jn', 'Barddhaman', 'Delhi'),
(16, 93993, 'Vivek express', 'Mumbai', 'Mariani jn', 'Lumbding jn', 'Guwahati', 'Visakhapatnam', 'Trivendram cntl', 'Bangalore'),
(17, 12567, 'Konark express', 'Mumbai', 'Solapur', 'Secundrabad jn', 'Vijayawada jn', 'Visakhapatnama', 'Brahmapur', 'Hyderabad'),
(18, 35297, 'Samarsata express', 'Mumbai', 'Bhusaval jn', 'Badnera jn', 'Nagpur', 'Bilaspur jn', 'Rourkela', 'Kolkata'),
(19, 59374, 'Chennai-mail', 'Mumbai', 'Bangarapet', 'Jolarpettai', 'Katpadi jn', 'Arakkonam ', 'Perambur', 'Chennai'),
(20, 82563, 'Mangaldeep express', 'Mumbai', 'Shoranur jn', 'Manglore jn', 'Madgaan', 'Panvel', 'Nasik rd', 'Delhi'),
(21, 12345, 'Shatabdi express', 'Chennai', 'Chennai cntl', 'Katpadi jn', 'Bangalore caut', 'Bangalore jn', 'Bangalore', 'Bangalore'),
(22, 23456, 'Charminar express', 'Chennai', 'Gudur jn', 'Vijayawada jn', 'Khammam', 'Warangal', 'Secundrabad jn', 'Hyderabad'),
(23, 34567, 'Aronai express', 'Chennai', 'Ranjiya jn', 'Howrah jn', 'Visakhapatnam', 'Coimbattore jn', 'Kollam jn', 'Kolkata'),
(24, 45678, 'Chennai LTT express', 'Chennai', 'Renigunta jn', 'Guntakal jn', 'Wadi', 'Solapur', 'Pune jn', 'Mumbai'),
(25, 56789, 'Tirukkural express', 'Chennai', 'Bhopal jn', 'Nagpur', 'Vijayawada jn', 'Chennai egmore', 'Villupuram jn', 'Delhi'),
(26, 67890, 'Kongu express', 'Delhi', 'Jhansi jn', 'Nagpur', 'Kachiguda', 'Yaswanthpur jn', 'Coimbattore jn', 'Bangalore'),
(27, 78901, 'Dakshin express', 'Delhi', 'Mathura jn', 'Jhansi jn', 'Bhopal jn', 'Nagpur jn', 'Secundrabad jn', 'Hyderabad'),
(28, 89012, 'Sealdah rajdhani express', 'Delhi', 'Asansol jn', 'Dhanbad jn', 'Gaya jn', 'Dd upadyaya jn', 'Kanpur cntl', 'Kolkata'),
(29, 90123, 'Paschim express', 'Delhi', 'Ratlam jn', 'Kota jn', 'New delhi', 'Ambalacaut jn', 'Amritsar jn', 'Mumbai'),
(30, 10565, 'Masgaribrath express', 'Delhi', 'Gwalior', 'Bhopal jn', 'Nagpur', 'Vijayawada jn', 'Gudur jn', 'Chennai');

-- --------------------------------------------------------

--
-- Table structure for table `trains_demo`
--

CREATE TABLE `trains_demo` (
  `train` int(11) NOT NULL,
  `trainid` varchar(10) NOT NULL,
  `tname` varchar(50) NOT NULL,
  `fromcity` varchar(50) NOT NULL,
  `tocity` varchar(50) NOT NULL,
  `dateofjourney` date NOT NULL DEFAULT current_timestamp(),
  `tavailable` varchar(2) NOT NULL DEFAULT 'Y',
  `SLA` int(5) NOT NULL,
  `ACA` int(5) NOT NULL,
  `2AA` int(5) NOT NULL,
  `3AA` int(5) NOT NULL,
  `SL` int(5) NOT NULL,
  `AC` int(5) NOT NULL,
  `2A` int(5) NOT NULL,
  `3A` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trains_demo`
--

INSERT INTO `trains_demo` (`train`, `trainid`, `tname`, `fromcity`, `tocity`, `dateofjourney`, `tavailable`, `SLA`, `ACA`, `2AA`, `3AA`, `SL`, `AC`, `2A`, `3A`) VALUES
(1, '32491', 'Duronto Express', 'Bangalore', 'Hyderabad', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(2, '56890', 'Howrah Express', 'Bangalore', 'Kolkata', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(3, '93973', 'Udyan Express', 'Bangalore', 'Mumbai', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(4, '79993', 'Kaveri Express', 'Bangalore', 'Chennai', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(5, '39256', 'Rajdhani Express', 'Bangalore', 'Delhi', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(6, '63854', 'Kachiguda Express', 'Hyderabad', 'Bangalore', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(7, '91243', 'Falakanuma Express', 'Hyderabad', 'Kolkata', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(8, '15632', 'Nagarsul Express', 'Hyderabad', 'Mumbai', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(9, '54321', 'Chennai Express', 'Hyderabad', 'Chennai', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(10, '53241', 'Telangana Express', 'Hyderabad', 'Delhi', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(11, '98765', 'Anga Express', 'Kolkata', 'Bangalore', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(12, '65382', 'East-Cost Express', 'Kolkata', 'Hyderabad', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(13, '51234', 'Gitanjali Express', 'Kolkata', 'Mumbai', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(14, '51118', 'Coromandal Express', 'Kolkata', 'Chennai', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(15, '99337', 'Poorva Express', 'Kolkata', 'Delhi', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(16, '93993', 'Vivek Express', 'Mumbai', 'Bangalore', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(17, '12567', 'Konark Express', 'Mumbai', 'Hyderabad', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(18, '35297', 'Samarsata Express', 'Mumbai', 'Kolkata', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(19, '59374', 'Chennai Mail', 'Mumbai', 'Chennai', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(20, '82563', 'Mangladweeo Express', 'Mumbai', 'Delhi', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(21, '12345', 'Shatabdi Express', 'Chennai', 'Bangalore', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(22, '23456', 'Charminar Express', 'Chennai', 'Hyderabad', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(23, '34567', 'Aronai Express', 'Chennai', 'Kolkata', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(24, '45678', 'Chennai LLT Express', 'Chennai', 'Mumbai', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(25, '56789', 'Tirukkural Express', 'Chennai', 'Delhi', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(26, '67890', 'Kongu Express', 'Delhi', 'Bangalore', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(27, '78901', 'Dakshin Express', 'Delhi', 'Hyderabad', '2022-10-31', 'Y', 50, 50, 50, 49, 100, 500, 700, 1000),
(28, '89012', 'Sealdah Rjdhani', 'Delhi', 'Kolkata', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(29, '90123', 'Paschim Express', 'Delhi', 'Mumbai', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(30, '10565', 'Mas Garib Rath', 'Delhi', 'Chennai', '2022-10-31', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(31, '32491', 'Duronto Express', 'Bangalore', 'Hyderabad', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(32, '56890', 'Howrah Express', 'Bangalore', 'Kolkata', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(33, '93973', 'Udyan Express', 'Bangalore', 'Mumbai', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(34, '79993', 'Kaveri Express', 'Bangalore', 'Chennai', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(35, '39256', 'Rajdhani Express', 'Bangalore', 'Delhi', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(36, '63854', 'Kachiguda Express', 'Hyderabad', 'Bangalore', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(37, '91243', 'Falakanuma Express', 'Hyderabad', 'Kolkata', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(38, '15632', 'Nagarsul Express', 'Hyderabad', 'Mumbai', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(39, '54321', 'Chennai Express', 'Hyderabad', 'Chennai', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(40, '53241', 'Telangana Express', 'Hyderabad', 'Delhi', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(41, '98765', 'Anga Express', 'Kolkata', 'Bangalore', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(42, '65382', 'East-Cost Express', 'Kolkata', 'Hyderabad', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(43, '51234', 'Gitanjali Express', 'Kolkata', 'Mumbai', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(44, '51118', 'Coromandal Express', 'Kolkata', 'Chennai', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(45, '99337', 'Poorva Express', 'Kolkata', 'Delhi', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(46, '93993', 'Vivek Express', 'Mumbai', 'Bangalore', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(47, '12567', 'Konark Express', 'Mumbai', 'Hyderabad', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(48, '35297', 'Samarsata Express', 'Mumbai', 'Kolkata', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(49, '59374', 'Chennai Mail', 'Mumbai', 'Chennai', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(50, '82563', 'Mangladweeo Express', 'Mumbai', 'Delhi', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(51, '12345', 'Shatabdi Express', 'Chennai', 'Bangalore', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(52, '23456', 'Charminar Express', 'Chennai', 'Hyderabad', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(53, '34567', 'Aronai Express', 'Chennai', 'Kolkata', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(54, '45678', 'Chennai LLT Express', 'Chennai', 'Mumbai', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(55, '56789', 'Tirukkural Express', 'Chennai', 'Delhi', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(56, '67890', 'Kongu Express', 'Delhi', 'Bangalore', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(57, '78901', 'Dakshin Express', 'Delhi', 'Hyderabad', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(58, '89012', 'Sealdah Rjdhani', 'Delhi', 'Kolkata', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(59, '90123', 'Paschim Express', 'Delhi', 'Mumbai', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(60, '10565', 'Mas Garib Rath', 'Delhi', 'Chennai', '2022-11-01', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(61, '32491', 'Duronto Express', 'Bangalore', 'Hyderabad', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(62, '56890', 'Howrah Express', 'Bangalore', 'Kolkata', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(63, '93973', 'Udyan Express', 'Bangalore', 'Mumbai', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(64, '79993', 'Kaveri Express', 'Bangalore', 'Chennai', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(65, '39256', 'Rajdhani Express', 'Bangalore', 'Delhi', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(66, '63854', 'Kachiguda Express', 'Hyderabad', 'Bangalore', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(67, '91243', 'Falakanuma Express', 'Hyderabad', 'Kolkata', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(68, '15632', 'Nagarsul Express', 'Hyderabad', 'Mumbai', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(69, '54321', 'Chennai Express', 'Hyderabad', 'Chennai', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(70, '53241', 'Telangana Express', 'Hyderabad', 'Delhi', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(71, '98765', 'Anga Express', 'Kolkata', 'Bangalore', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(72, '65382', 'East-Cost Express', 'Kolkata', 'Hyderabad', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(73, '51234', 'Gitanjali Express', 'Kolkata', 'Mumbai', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(74, '51118', 'Coromandal Express', 'Kolkata', 'Chennai', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(75, '99337', 'Poorva Express', 'Kolkata', 'Delhi', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(76, '93993', 'Vivek Express', 'Mumbai', 'Bangalore', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(77, '12567', 'Konark Express', 'Mumbai', 'Hyderabad', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(78, '35297', 'Samarsata Express', 'Mumbai', 'Kolkata', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(79, '59374', 'Chennai Mail', 'Mumbai', 'Chennai', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(80, '82563', 'Mangladweeo Express', 'Mumbai', 'Delhi', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(81, '12345', 'Shatabdi Express', 'Chennai', 'Bangalore', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(82, '23456', 'Charminar Express', 'Chennai', 'Hyderabad', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(83, '34567', 'Aronai Express', 'Chennai', 'Kolkata', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(84, '45678', 'Chennai LLT Express', 'Chennai', 'Mumbai', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(85, '56789', 'Tirukkural Express', 'Chennai', 'Delhi', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(86, '67890', 'Kongu Express', 'Delhi', 'Bangalore', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(87, '78901', 'Dakshin Express', 'Delhi', 'Hyderabad', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(88, '89012', 'Sealdah Rjdhani', 'Delhi', 'Kolkata', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(89, '90123', 'Paschim Express', 'Delhi', 'Mumbai', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(90, '10565', 'Mas Garib Rath', 'Delhi', 'Chennai', '2022-11-02', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(91, '32491', 'Duronto Express', 'Bangalore', 'Hyderabad', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(92, '56890', 'Howrah Express', 'Bangalore', 'Kolkata', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(93, '93973', 'Udyan Express', 'Bangalore', 'Mumbai', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(94, '79993', 'Kaveri Express', 'Bangalore', 'Chennai', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(95, '39256', 'Rajdhani Express', 'Bangalore', 'Delhi', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(96, '63854', 'Kachiguda Express', 'Hyderabad', 'Bangalore', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(97, '91243', 'Falakanuma Express', 'Hyderabad', 'Kolkata', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(98, '15632', 'Nagarsul Express', 'Hyderabad', 'Mumbai', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(99, '54321', 'Chennai Express', 'Hyderabad', 'Chennai', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(100, '53241', 'Telangana Express', 'Hyderabad', 'Delhi', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(101, '98765', 'Anga Express', 'Kolkata', 'Bangalore', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(102, '65382', 'East-Cost Express', 'Kolkata', 'Hyderabad', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(103, '51234', 'Gitanjali Express', 'Kolkata', 'Mumbai', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(104, '51118', 'Coromandal Express', 'Kolkata', 'Chennai', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(105, '99337', 'Poorva Express', 'Kolkata', 'Delhi', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(106, '93993', 'Vivek Express', 'Mumbai', 'Bangalore', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(107, '12567', 'Konark Express', 'Mumbai', 'Hyderabad', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(108, '35297', 'Samarsata Express', 'Mumbai', 'Kolkata', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(109, '59374', 'Chennai Mail', 'Mumbai', 'Chennai', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(110, '82563', 'Mangladweeo Express', 'Mumbai', 'Delhi', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(111, '12345', 'Shatabdi Express', 'Chennai', 'Bangalore', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(112, '23456', 'Charminar Express', 'Chennai', 'Hyderabad', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(113, '34567', 'Aronai Express', 'Chennai', 'Kolkata', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(114, '45678', 'Chennai LLT Express', 'Chennai', 'Mumbai', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(115, '56789', 'Tirukkural Express', 'Chennai', 'Delhi', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(116, '67890', 'Kongu Express', 'Delhi', 'Bangalore', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(117, '78901', 'Dakshin Express', 'Delhi', 'Hyderabad', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(118, '89012', 'Sealdah Rjdhani', 'Delhi', 'Kolkata', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(119, '90123', 'Paschim Express', 'Delhi', 'Mumbai', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(120, '10565', 'Mas Garib Rath', 'Delhi', 'Chennai', '2022-11-03', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(121, '32491', 'Duronto Express', 'Bangalore', 'Hyderabad', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(122, '56890', 'Howrah Express', 'Bangalore', 'Kolkata', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(123, '93973', 'Udyan Express', 'Bangalore', 'Mumbai', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(124, '79993', 'Kaveri Express', 'Bangalore', 'Chennai', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(125, '39256', 'Rajdhani Express', 'Bangalore', 'Delhi', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(126, '63854', 'Kachiguda Express', 'Hyderabad', 'Bangalore', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(127, '91243', 'Falakanuma Express', 'Hyderabad', 'Kolkata', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(128, '15632', 'Nagarsul Express', 'Hyderabad', 'Mumbai', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(129, '54321', 'Chennai Express', 'Hyderabad', 'Chennai', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(130, '53241', 'Telangana Express', 'Hyderabad', 'Delhi', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(131, '98765', 'Anga Express', 'Kolkata', 'Bangalore', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(132, '65382', 'East-Cost Express', 'Kolkata', 'Hyderabad', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(133, '51234', 'Gitanjali Express', 'Kolkata', 'Mumbai', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(134, '51118', 'Coromandal Express', 'Kolkata', 'Chennai', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(135, '99337', 'Poorva Express', 'Kolkata', 'Delhi', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(136, '93993', 'Vivek Express', 'Mumbai', 'Bangalore', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(137, '12567', 'Konark Express', 'Mumbai', 'Hyderabad', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(138, '35297', 'Samarsata Express', 'Mumbai', 'Kolkata', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(139, '59374', 'Chennai Mail', 'Mumbai', 'Chennai', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(140, '82563', 'Mangladweeo Express', 'Mumbai', 'Delhi', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(141, '12345', 'Shatabdi Express', 'Chennai', 'Bangalore', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(142, '23456', 'Charminar Express', 'Chennai', 'Hyderabad', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(143, '34567', 'Aronai Express', 'Chennai', 'Kolkata', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(144, '45678', 'Chennai LLT Express', 'Chennai', 'Mumbai', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(145, '56789', 'Tirukkural Express', 'Chennai', 'Delhi', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(146, '67890', 'Kongu Express', 'Delhi', 'Bangalore', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(147, '78901', 'Dakshin Express', 'Delhi', 'Hyderabad', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(148, '89012', 'Sealdah Rjdhani', 'Delhi', 'Kolkata', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(149, '90123', 'Paschim Express', 'Delhi', 'Mumbai', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(150, '10565', 'Mas Garib Rath', 'Delhi', 'Chennai', '2022-11-04', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(151, '32491', 'Duronto Express', 'Bangalore', 'Hyderabad', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(152, '56890', 'Howrah Express', 'Bangalore', 'Kolkata', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(153, '93973', 'Udyan Express', 'Bangalore', 'Mumbai', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(154, '79993', 'Kaveri Express', 'Bangalore', 'Chennai', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(155, '39256', 'Rajdhani Express', 'Bangalore', 'Delhi', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(156, '63854', 'Kachiguda Express', 'Hyderabad', 'Bangalore', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(157, '91243', 'Falakanuma Express', 'Hyderabad', 'Kolkata', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(158, '15632', 'Nagarsul Express', 'Hyderabad', 'Mumbai', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(159, '54321', 'Chennai Express', 'Hyderabad', 'Chennai', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(160, '53241', 'Telangana Express', 'Hyderabad', 'Delhi', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(161, '98765', 'Anga Express', 'Kolkata', 'Bangalore', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(162, '65382', 'East-Cost Express', 'Kolkata', 'Hyderabad', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(163, '51234', 'Gitanjali Express', 'Kolkata', 'Mumbai', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(164, '51118', 'Coromandal Express', 'Kolkata', 'Chennai', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(165, '99337', 'Poorva Express', 'Kolkata', 'Delhi', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(166, '93993', 'Vivek Express', 'Mumbai', 'Bangalore', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(167, '12567', 'Konark Express', 'Mumbai', 'Hyderabad', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(168, '35297', 'Samarsata Express', 'Mumbai', 'Kolkata', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(169, '59374', 'Chennai Mail', 'Mumbai', 'Chennai', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(170, '82563', 'Mangladweeo Express', 'Mumbai', 'Delhi', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(171, '12345', 'Shatabdi Express', 'Chennai', 'Bangalore', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(172, '23456', 'Charminar Express', 'Chennai', 'Hyderabad', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(173, '34567', 'Aronai Express', 'Chennai', 'Kolkata', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(174, '45678', 'Chennai LLT Express', 'Chennai', 'Mumbai', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(175, '56789', 'Tirukkural Express', 'Chennai', 'Delhi', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(176, '67890', 'Kongu Express', 'Delhi', 'Bangalore', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(177, '78901', 'Dakshin Express', 'Delhi', 'Hyderabad', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(178, '89012', 'Sealdah Rjdhani', 'Delhi', 'Kolkata', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(179, '90123', 'Paschim Express', 'Delhi', 'Mumbai', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(180, '10565', 'Mas Garib Rath', 'Delhi', 'Chennai', '2022-11-05', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(181, '32491', 'Duronto Express', 'Bangalore', 'Hyderabad', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(182, '56890', 'Howrah Express', 'Bangalore', 'Kolkata', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(183, '93973', 'Udyan Express', 'Bangalore', 'Mumbai', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(184, '79993', 'Kaveri Express', 'Bangalore', 'Chennai', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(185, '39256', 'Rajdhani Express', 'Bangalore', 'Delhi', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(186, '63854', 'Kachiguda Express', 'Hyderabad', 'Bangalore', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(187, '91243', 'Falakanuma Express', 'Hyderabad', 'Kolkata', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(188, '15632', 'Nagarsul Express', 'Hyderabad', 'Mumbai', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(189, '54321', 'Chennai Express', 'Hyderabad', 'Chennai', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(190, '53241', 'Telangana Express', 'Hyderabad', 'Delhi', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(191, '98765', 'Anga Express', 'Kolkata', 'Bangalore', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(192, '65382', 'East-Cost Express', 'Kolkata', 'Hyderabad', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(193, '51234', 'Gitanjali Express', 'Kolkata', 'Mumbai', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(194, '51118', 'Coromandal Express', 'Kolkata', 'Chennai', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(195, '99337', 'Poorva Express', 'Kolkata', 'Delhi', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(196, '93993', 'Vivek Express', 'Mumbai', 'Bangalore', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(197, '12567', 'Konark Express', 'Mumbai', 'Hyderabad', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(198, '35297', 'Samarsata Express', 'Mumbai', 'Kolkata', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(199, '59374', 'Chennai Mail', 'Mumbai', 'Chennai', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(200, '82563', 'Mangladweeo Express', 'Mumbai', 'Delhi', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(201, '12345', 'Shatabdi Express', 'Chennai', 'Bangalore', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(202, '23456', 'Charminar Express', 'Chennai', 'Hyderabad', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(203, '34567', 'Aronai Express', 'Chennai', 'Kolkata', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(204, '45678', 'Chennai LLT Express', 'Chennai', 'Mumbai', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(205, '56789', 'Tirukkural Express', 'Chennai', 'Delhi', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(206, '67890', 'Kongu Express', 'Delhi', 'Bangalore', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(207, '78901', 'Dakshin Express', 'Delhi', 'Hyderabad', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(208, '89012', 'Sealdah Rjdhani', 'Delhi', 'Kolkata', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(209, '90123', 'Paschim Express', 'Delhi', 'Mumbai', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000),
(210, '10565', 'Mas Garib Rath', 'Delhi', 'Chennai', '2022-11-06', 'Y', 50, 50, 50, 50, 100, 500, 700, 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger_details`
--
ALTER TABLE `passenger_details`
  ADD PRIMARY KEY (`ticketno`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trains_demo`
--
ALTER TABLE `trains_demo`
  ADD PRIMARY KEY (`train`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `passenger_details`
--
ALTER TABLE `passenger_details`
  MODIFY `ticketno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `trains_demo`
--
ALTER TABLE `trains_demo`
  MODIFY `train` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

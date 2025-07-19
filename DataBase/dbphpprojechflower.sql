-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 07:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbphpprojechflower`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart_item`
--

CREATE TABLE `tblcart_item` (
  `P_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) DEFAULT NULL,
  `UNAME` varchar(50) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcart_item`
--

INSERT INTO `tblcart_item` (`P_ID`, `ITEM_ID`, `UNAME`, `QUANTITY`) VALUES
(2, 6, 'hetvivamja', 1),
(4, 35, 'divyaghori', 3),
(5, 11, 'smit', 2),
(6, 36, 'smit', 1),
(7, 2, 'divyaghori', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(11) NOT NULL,
  `NAME` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `NAME`) VALUES
(1, 'flower'),
(2, 'bouquet'),
(3, 'decore'),
(4, 'single flower bouquet'),
(5, 'flower jewellery'),
(6, 'harmala'),
(7, 'home decore');

-- --------------------------------------------------------

--
-- Table structure for table `tblcolor`
--

CREATE TABLE `tblcolor` (
  `COLOR_ID` int(11) NOT NULL,
  `COLORNAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcolor`
--

INSERT INTO `tblcolor` (`COLOR_ID`, `COLORNAME`) VALUES
(16, 'baby pink'),
(17, 'black'),
(8, 'blue'),
(1, 'dark red'),
(4, 'light orange'),
(10, 'light pink'),
(11, 'light yellow'),
(14, 'lvory orange white'),
(13, 'lvory pink'),
(12, 'lvory white'),
(15, 'margenda pink'),
(3, 'orange'),
(6, 'pink'),
(9, 'purple'),
(2, 'red'),
(7, 'white'),
(5, 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `tbldeliveryboy`
--

CREATE TABLE `tbldeliveryboy` (
  `D_ID` int(11) NOT NULL,
  `S_USERNAME` varchar(30) DEFAULT NULL,
  `O_ID` int(11) DEFAULT NULL,
  `DELIVERYDATE` date NOT NULL,
  `DELIVERYSTATUS` varchar(30) NOT NULL,
  `Earning` float NOT NULL,
  `ORDERTRACK` varchar(15) NOT NULL DEFAULT 'Received'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldeliveryboy`
--

INSERT INTO `tbldeliveryboy` (`D_ID`, `S_USERNAME`, `O_ID`, `DELIVERYDATE`, `DELIVERYSTATUS`, `Earning`, `ORDERTRACK`) VALUES
(1, 'sujan', 2, '2024-11-29', 'Done', 570, 'Received'),
(2, 'kevin', 9, '2024-11-30', 'Done', 160, 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `tbldeliveryboyregistration`
--

CREATE TABLE `tbldeliveryboyregistration` (
  `USERNAME` varchar(30) NOT NULL,
  `NAME` text NOT NULL,
  `GENDER` char(1) NOT NULL,
  `DOB` date NOT NULL,
  `CNO` bigint(20) DEFAULT NULL,
  `EMAIL_ID` varchar(40) DEFAULT NULL,
  `DESIGNATION` varchar(20) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `CITY` varchar(20) NOT NULL,
  `PINCODE` int(6) NOT NULL,
  `PHOTO` varchar(400) NOT NULL,
  `SALARY` int(10) NOT NULL,
  `STATUS` varchar(15) DEFAULT 'Active',
  `DATEADDED` date NOT NULL DEFAULT current_timestamp(),
  `PASSWORD` varchar(256) NOT NULL,
  `pincodefordelivery` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldeliveryboyregistration`
--

INSERT INTO `tbldeliveryboyregistration` (`USERNAME`, `NAME`, `GENDER`, `DOB`, `CNO`, `EMAIL_ID`, `DESIGNATION`, `ADDRESS`, `CITY`, `PINCODE`, `PHOTO`, `SALARY`, `STATUS`, `DATEADDED`, `PASSWORD`, `pincodefordelivery`) VALUES
('ayush', 'ayush patoliya', 'M', '1960-03-12', 7790128245, 'ayush@gmail.com', 'delivery boy', '120-g,sanskrit residency,jakatnaka,surat', 'surat', 395006, 'images/male.png', 13500, 'Active', '2024-11-29', '$2y$10$oDXQyGm.dYMldKhAHYZBWO25C0GYgrntbtcdFLB8XVorgGVFXAVJm', ' 395210,395220,3954221'),
('dharmik', 'dharmik vachhani', 'M', '1990-01-10', 7790345676, 'dharmik@gmail.com', 'deliveryboy', 'd-201,sanskrit residency,surat', 'surat', 395006, 'images/male.png', 20000, 'Active', '2024-11-29', '$2y$10$kPpunZHbmCvAXhtRrtSZYeiZJ41Ky3voQbjdD9rawzKEB/jKcLOyK', '395001,3950019,395003,395004'),
('kevin', 'kevin singala', 'M', '1980-06-11', 9090213456, 'kevin@gmail.com', 'delivery boy', '12,shyam society,mota varachha,surat', 'surat', 395006, 'images/male.png', 25000, 'Active', '2024-11-29', '$2y$10$f84Cht2WTN9K76Y83BBLYuW172EjSO.6.5XpqHhM1CZMToirBjY7a', '395007,395008,395009,395010,395013'),
('preet', 'preet gadhiya', 'M', '1970-03-03', 8867094571, 'preet@gmail.com', 'delivery boy', '102,mira residency ,viti nagar,surat', 'surat', 395006, 'images/male.png', 5000, 'Active', '2024-11-29', '$2y$10$.S8l1uU/wnR4joM/kqe0O.cgLHWGZILLh2a5NmgNydqr34f3YhM2m', '395005,395006'),
('sujan', 'sujan rakholoya', 'M', '1990-11-11', 8756778859, 'sujan@gmail.com', 'deliveryboy', '201,mira residency,viti nagar,surat', 'surat', 395006, 'images/male.png', 15000, 'Active', '2024-11-29', '$2y$10$FYenirlEU4GbxNdrH7I3EO7eVDzNRwR.2ca.dGLqSsKNiaJo0GkUC', '394107,394150,394180');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `F_ID` int(11) NOT NULL,
  `UNAME` varchar(30) DEFAULT NULL,
  `P_ID` int(11) DEFAULT NULL,
  `RATING` int(11) DEFAULT NULL,
  `COMMENT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`F_ID`, `UNAME`, `P_ID`, `RATING`, `COMMENT`) VALUES
(1, 'hetvivamja', 6, 5, 'very very nice services and product,thank you!'),
(2, 'smit', 36, 3, 'thank you'),
(3, 'smit', 36, 4, 'thank you');

-- --------------------------------------------------------

--
-- Table structure for table `tblflower`
--

CREATE TABLE `tblflower` (
  `F_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `P_ID` int(11) DEFAULT NULL,
  `NAME` text NOT NULL,
  `COLOR_ID` int(11) DEFAULT NULL,
  `DESCRIPTION` varchar(70) NOT NULL,
  `PRICE` float NOT NULL,
  `PHOTO` varchar(400) NOT NULL,
  `STOCKQUANTITY` int(11) NOT NULL,
  `SEASON_ID` int(11) DEFAULT NULL,
  `DATEADDED` date NOT NULL DEFAULT current_timestamp(),
  `STATUS` varchar(20) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblflower`
--

INSERT INTO `tblflower` (`F_ID`, `CATEGORY_ID`, `P_ID`, `NAME`, `COLOR_ID`, `DESCRIPTION`, `PRICE`, `PHOTO`, `STOCKQUANTITY`, `SEASON_ID`, `DATEADDED`, `STATUS`) VALUES
(1, 1, 5, 'dark red rose', 1, 'dark red rose flower', 15, 'images/rose.jfif', 770, 1, '2024-11-28', 'Available'),
(2, 1, 1, 'red rose', 2, 'red rose flower', 12, 'images/redrose.jpg', 770, 1, '2024-11-28', 'Available'),
(3, 1, 1, 'white rose', 7, 'white rose flower', 33, 'images/whiterose.jpg', 760, 1, '2024-11-28', 'Available'),
(4, 1, 1, 'pink rose', 6, 'pink rose flower', 33, 'images/lpinkrose.jpg', 780, 1, '2024-11-28', 'Available'),
(5, 1, 1, 'light pink rose', 10, 'light pink rose flower ', 45, 'images/lprose.jpg', 550, 1, '2024-11-28', 'Available'),
(6, 1, 1, 'light orange rose', 4, 'light orange rose flower', 56, 'images/lorose.jpg', 800, 1, '2024-11-28', 'Available'),
(7, 1, 1, 'orange rose', 3, 'orange rose flower', 55, 'images/orangerose.jpg', 800, 1, '2024-11-28', 'Available'),
(8, 1, 1, 'yellow rose', 5, 'yellow rose flower', 45, 'images/yellowrosef.jpg', 800, 1, '2024-11-28', 'Available'),
(9, 1, 1, 'light yellow', 11, 'light yellow rose flower', 45, 'images/yellowrose.jpg', 800, 1, '2024-11-28', 'Available'),
(10, 1, 1, 'lvory white ', 14, 'lvory white orange flower', 60, 'images/whiteorangerose.jpeg', 800, 1, '2024-11-28', 'Available'),
(11, 1, 5, 'lvory pink ', 13, 'lvory pink flower', 50, 'images/lvorypink.jpeg', 500, 1, '2024-11-28', 'Available'),
(12, 1, 5, 'blue archid', 8, 'blue archid flower', 100, 'images/blueorchid.jpg', 0, 3, '2024-11-28', 'Available'),
(13, 1, 5, 'white gypsy', 7, 'white gypsy flower', 100, 'images/jipsywhite.jpeg', 1600, 1, '2024-11-28', 'Available'),
(14, 1, 5, 'puple gypsy', 9, 'purple gypsy flower', 120, 'images/purplejipsy.jpeg', 120, 1, '2024-11-28', 'Available'),
(15, 1, 5, 'pink gypsy', 6, 'pink gypsy flower', 2100, 'images/pinkjipsy.jpeg', 220, 1, '2024-11-28', 'Available'),
(16, 1, 5, 'yellow flower', 5, 'yellow flower', 50, 'images/yellowflower.jpeg', 5000, 1, '2024-11-28', 'Available'),
(17, 1, 5, 'baby pink rose', 16, 'baby pink rose flower', 500, 'images/babypinkrose.jpeg', 50, 1, '2024-11-28', 'Available'),
(18, 1, 5, 'magenda pink rose', 15, 'magenda pink rose flower', 60, 'images/magendapinkrose.jpeg', 660, 1, '2024-11-28', 'Available'),
(19, 1, 5, 'white lily', 7, 'white lilly flower', 20, 'images/whitelily.jpeg', 800, 1, '2024-11-28', 'Available'),
(20, 1, 5, 'light pink lilly', 10, 'light pink lilly flower', 34, 'images/lightpinklily.jpeg', 450, 1, '2024-11-28', 'Available'),
(21, 1, 5, 'pink lilly', 6, 'pink lilly flower', 34, 'images/pinklily.jpeg', 450, 1, '2024-11-28', 'Available'),
(22, 1, 1, 'dark pink orchid', 6, 'dark pink orchid flower', 130, 'images/darkpinkorchid.jpeg', 0, 3, '2024-11-28', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tblitem`
--

CREATE TABLE `tblitem` (
  `ITEM_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) DEFAULT NULL,
  `NAME` text NOT NULL,
  `DESCRIPTION` varchar(50) NOT NULL,
  `PRICE` float NOT NULL,
  `PHOTO` varchar(400) NOT NULL,
  `STOCKQUANTITY` int(11) NOT NULL,
  `DATEADDED` date NOT NULL DEFAULT current_timestamp(),
  `TYPE_ID` int(11) DEFAULT NULL,
  `STATUS` varchar(20) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblitem`
--

INSERT INTO `tblitem` (`ITEM_ID`, `CATEGORY_ID`, `NAME`, `DESCRIPTION`, `PRICE`, `PHOTO`, `STOCKQUANTITY`, `DATEADDED`, `TYPE_ID`, `STATUS`) VALUES
(1, 2, 'orchid bouquet', 'dark pink orchid bouquet sepecial for summer', 500, 'images/Bouquet-of-Purple-Orchidsbday.jpg', 12, '2024-11-28', 1, 'Available'),
(2, 2, 'blue orchid bouquet', 'blue orchid bouquet sepecial for summer', 500, 'images/fdays3b.jpg', 18, '2024-11-28', 1, 'Available'),
(3, 2, 'pink rose bouquet', 'pink rose bouquet ', 200, 'images/lproseb.jpg', 12, '2024-11-28', 1, 'Available'),
(4, 2, 'red rose bouquet', 'red rose bouquet', 300, 'images/mday4b.jpg', 33, '2024-11-28', 6, 'Available'),
(5, 2, 'pink rose bouquet', 'pink rose bouquet ', 300, 'images/pinkroseb.jpg', 23, '2024-11-28', 4, 'Available'),
(6, 2, 'pink rose bouquet', 'pink rose bouquet ', 500, 'images/pinkrosebdayb.jpeg', 23, '2024-11-28', 2, 'Available'),
(7, 2, 'red rose bouquet', 'red rose bouquet ', 500, 'images/redroseb.webp', 23, '2024-11-28', 6, 'Available'),
(8, 2, 'red rose bouquet', 'red rose bouquet for valentine day', 500, 'images/rroseb.avif', 23, '2024-11-28', 7, 'Available'),
(9, 2, 'red rose bouquet', 'red rose bouquet for marraige gift', 500, 'images/specialredroseb.jpg', 23, '2024-11-28', 3, 'Available'),
(10, 2, 'white rose bouquet', 'white rose flower bouquet for birthday', 500, 'images/whiterosebdayb.jpg', 23, '2024-11-28', 2, 'Available'),
(11, 2, 'pink rose bouquet', 'pink rose bouquet for birthday', 800, 'images/specialb.webp', 12, '2024-11-28', 2, 'Available'),
(12, 2, 'yellow rose bouquet', 'yellow rose bouquet', 400, 'images/yellowrosebdayb.jpg', 56, '2024-11-28', 1, 'Available'),
(13, 2, 'white lilly bouquet', 'white lilly bouquet ', 300, 'images/whitelillyBouquet.jpeg', 12, '2024-11-28', 1, 'Available'),
(14, 2, 'white lilly bouquet', 'white lilly simple bouquet  ', 300, 'images/whitelillyBouquets.jpeg', 12, '2024-11-28', 1, 'Available'),
(15, 2, 'light pink lilly bouquet', 'light pink lilly bouquet', 600, 'images/lightpinklillyBouquet.jpeg', 12, '2024-11-28', 1, 'Available'),
(16, 2, 'white rose bouquet', 'white rose flower bouquet', 400, 'images/whiterosssBouquet.jpeg', 34, '2024-11-28', 4, 'Available'),
(17, 2, 'white rose bouquet', 'white rose flower simple bouquet', 400, 'images/whiterosssBouquets.jpeg', 34, '2024-11-28', 1, 'Available'),
(18, 2, 'light pink rose bouquet', 'light baby pink rose bouquet ', 450, 'images/lightbabypinkBouquet.jpeg', 12, '2024-11-28', 1, 'Available'),
(19, 2, 'light pink rose bouquet', 'light baby pink rose bouquet for mother day', 450, 'images/pinklightbouquet.jpeg', 12, '2024-11-28', 5, 'Available'),
(20, 2, 'pink rose bouquet', 'magenda pink rose bouquet', 450, 'images/magendapinkBouquet.jpeg', 23, '2024-11-28', 5, 'Available'),
(21, 2, 'white lilly bouquet', 'white lilly flower bouquet ', 330, 'images/whitelillysimple.jpeg', 12, '2024-11-28', 1, 'Available'),
(22, 2, 'multicolor rose bouquet', 'multicolor rose bouquet ', 2200, 'images/colorfulroseb.jpg', 12, '2024-11-28', 1, 'Available'),
(23, 2, 'orchid bouquet', 'orchid bouquet for father day', 2100, 'images/fday1b.webp', 23, '2024-11-28', 4, 'Not Available'),
(24, 2, 'light pink rose bouquet', 'light pink rose bouquet fro fathers day', 780, 'images/fday2b.webp', 23, '2024-11-28', 4, 'Available'),
(25, 2, 'light pink bouquet', 'light pink rose bouquet fro mothers day', 980, 'images/mday1b.webp', 23, '2024-11-28', 5, 'Available'),
(26, 2, 'multicolor rose bouquet', 'multicolor rose bouquet for motherday ', 990, 'images/mday2b.avif', 33, '2024-11-28', 5, 'Available'),
(27, 2, 'multicolor rose bouquet', 'multicolor rose bouquet for mother day special', 1000, 'images/mday3b.jpg', 33, '2024-11-28', 5, 'Available'),
(28, 2, 'rose bouquet', 'multi pink color rose bouquet', 670, 'images/mday6bs.jpg', 22, '2024-11-28', 1, 'Available'),
(29, 2, 'rose bouquet', 'rose bouquet', 670, 'images/mdayb5.jpg', 22, '2024-11-28', 1, 'Available'),
(30, 2, 'specail rose bouquet', 'special multi color rose bouquet for marraige', 2200, 'images/multicolorroseb.jpg', 2, '2024-11-28', 3, 'Available'),
(31, 2, 'orchid bouquet', 'special multi color orchid bouquet for marraige', 3200, 'images/wedding_flowers_bspecial.jpg', 2, '2024-11-28', 3, 'Available'),
(32, 2, 'red rose bouquet', 'red rose bouquet for valentineday special', 1500, 'images/Screenshot 2024-10-03 010831.png', 13, '2024-11-28', 7, 'Available'),
(33, 4, 'clevedon flower', 'clevedon orange flower bouquet', 500, 'images/sclevedonf.png', 2, '2024-11-28', 1, 'Available'),
(34, 4, 'pink orchid ', 'pink gebric orchid flower bouquet', 550, 'images/sgebrerapinkf.jpeg', 2, '2024-11-28', 1, 'Available'),
(35, 4, 'light orange orchid', 'special oranhe gebric flower bouquet', 560, 'images/sgerbera_pinkf.jpg', 2, '2024-11-28', 1, 'Available'),
(36, 4, 'light pink rose', 'light pink single rose bouquet', 120, 'images/slightpinkrosef.jpg', 12, '2024-11-28', 1, 'Available'),
(37, 4, 'yellow orchid', 'special yellow orchid flower bouquet', 560, 'images/sorchidfyellow.jpg', 12, '2024-11-28', 1, 'Available'),
(38, 4, 'pink rose', 'single pink rose flower bouquet', 220, 'images/specialpinkrosef.webp', 12, '2024-11-28', 1, 'Available'),
(39, 4, 'pink rose', 'pink rose flower bouquet', 120, 'images/spinkf.jpg', 12, '2024-11-28', 1, 'Available'),
(40, 4, 'special pink rose', 'special single pink rose flower bouquet', 330, 'images/spinkrosef.webp', 12, '2024-11-28', 1, 'Available'),
(41, 4, 'red rose', 'single red rose flower bouquet', 120, 'images/sredf.jpg', 12, '2024-11-28', 1, 'Available'),
(42, 4, 'dark red rose', 'single dark red rose flower bouquet', 120, 'images/sredrosef.webp', 12, '2024-11-28', 7, 'Available'),
(43, 4, 'white rose', 'single white rose flower bouquet', 70, 'images/swhiterosef.jpg', 12, '2024-11-28', 1, 'Available'),
(44, 4, 'yellow rose', 'single yellow rose bouquet', 50, 'images/syellowrosef.jpg', 12, '2024-11-28', 1, 'Available'),
(45, 4, 'red rose', 'special red rose bouquet', 200, 'images/redrose.jpeg', 12, '2024-11-28', 7, 'Available'),
(46, 4, 'lvory pink', 'special lvory pink flower bouquet', 230, 'images/lvorypink.jpeg', 2, '2024-11-28', 1, 'Available'),
(47, 4, 'lvory pink flower', 'special lvory pink rose flower bouquet', 270, 'images/lvorypik.jpeg', 2, '2024-11-28', 1, 'Available'),
(48, 4, 'light pink rose', 'light pink rose bouquet', 90, 'images/babypink.jpeg', 21, '2024-11-28', 2, 'Available'),
(49, 4, 'red rose', 'red rose single flower bouquet', 40, 'images/redrose2.jpeg', 34, '2024-11-28', 1, 'Available'),
(50, 4, 'sunflower', 'special single sunflower bouquet', 70, 'images/sunflower.jpeg', 2, '2024-11-28', 1, 'Available'),
(51, 4, 'white orchid', 'single white orchid flower bouquet', 12, 'images/whiteorchid.jpeg', 12, '2024-11-28', 1, 'Available'),
(52, 4, 'pink orchid', 'single pink orchid flower bouquet', 12, 'images/pinkorchid.jpeg', 12, '2024-11-28', 1, 'Available'),
(53, 3, 'pink rose vase', 'pink rose vase for decore', 700, 'images/pinkrosevase.jpg', 12, '2024-11-28', 1, 'Available'),
(54, 3, 'red rose vase', 'red rose vase for decore', 450, 'images/redvase.webp', 3, '2024-11-28', 1, 'Available'),
(55, 3, 'special red rose vase', 'special red rose vase for decore', 780, 'images/specialvase.avif', 12, '2024-11-28', 1, 'Available'),
(56, 3, 'light pink rose vase', 'light pink rose vase for decore', 890, 'images/lightpinkvase.jpg', 3, '2024-11-28', 1, 'Available'),
(57, 3, 'red rose vase', 'only red rose vase for decore', 340, 'images/onlyredvase.jpg', 2, '2024-11-28', 1, 'Available'),
(58, 3, 'light pink rose bouquet', 'light pink rose vase for decore', 780, 'images/lightpinkrosevase.jpg', 3, '2024-11-28', 1, 'Available'),
(59, 3, 'light orange rose vase', 'light orange rose vase for decore', 890, 'images/lightorangevase.jpeg', 3, '2024-11-28', 1, 'Available'),
(60, 3, 'decore of white rose', 'white rose decore for wedding', 1900, 'images/decor.jpg', 3, '2024-11-28', 3, 'Available'),
(61, 3, 'decore for wedding', 'yellow flower for wedding decore', 600, 'images/decorefor wedding.jpg', 3, '2024-11-28', 3, 'Available'),
(62, 3, 'decore for wedding', 'special item of yellow flower for wedding decore', 1000, 'images/decorespecial.jpg', 3, '2024-11-28', 3, 'Available'),
(63, 3, 'yellow flower item', 'item of yellow flower for wedding decore', 1300, 'images/decoreforwedding.jpg', 3, '2024-11-28', 3, 'Available'),
(64, 3, 'flower ladi ', 'white flower ladi with lotus for wedding decore', 700, 'images/decoreladi.jpg', 10, '2024-11-28', 3, 'Available'),
(65, 3, 'colorful flower vase', 'colorful rose flower vase for decore', 2300, 'images/decoremvase.jpg', 3, '2024-11-28', 1, 'Available'),
(66, 3, 'special vase', 'special vase for decore of colorful fresh rose flo', 4500, 'images/decorevase.avif', 3, '2024-11-28', 1, 'Available'),
(67, 3, 'orchid flower', 'decore item of orchid flower', 5000, 'images/decororchid.webp', 3, '2024-11-28', 3, 'Available'),
(68, 6, 'white and red rose harmala', 'two harmala of white and red rose for wedding', 1200, 'images/harmala1.jpeg', 2, '2024-11-28', 3, 'Available'),
(69, 6, 'pink rose harmala', 'two harmala of pink rose for wedding', 1600, 'images/harmala2.jpeg', 2, '2024-11-28', 3, 'Available'),
(70, 6, 'harmala of gypsy', 'two harmala of gypsy for wedding', 2300, 'images/harmala3.jpeg', 2, '2024-11-28', 3, 'Available'),
(71, 6, 'harmala of green gypsy', 'two harmala of green gypsy for wedding', 2300, 'images/harmala4.jpeg', 2, '2024-11-28', 3, 'Available'),
(72, 6, 'light pink rose harmala', 'light pink rose harmala with gypsy for wedding', 3400, 'images/harmala6.jpeg', 2, '2024-11-28', 3, 'Available'),
(73, 6, 'harmala of pink rose and gypsy', 'two harmala of pink rose and gypsy for wedding', 4000, 'images/harmala7.jpeg', 2, '2024-11-28', 3, 'Available'),
(74, 3, 'orange and yellow flower ladi', 'five orange and five yellow flower ladi for decore', 200, 'images/decor1.jpeg', 10, '2024-11-28', 1, 'Available'),
(75, 5, 'hair flower brooch', 'red rose flower hair brooch', 40, 'images/broach.webp', 23, '2024-11-28', 3, 'Available'),
(76, 5, 'rose jewellery', 'rose jewellery with five item', 500, 'images/rosejewelery.jpeg', 5, '2024-11-28', 3, 'Available'),
(77, 5, 'jewellery for haldi', 'yellow flower jewellery with six item for haldi', 880, 'images/haldi.jpeg', 6, '2024-11-28', 3, 'Available'),
(78, 5, 'jewellery of gypsy', 'two jewellery item of gypsy for wedding', 450, 'images/jepsyjeweley.jpeg', 2, '2024-11-28', 3, 'Available'),
(79, 5, 'special item', 'special ten jewellery item of purple flower for we', 3000, 'images/jewelery6.jpeg', 10, '2024-11-28', 3, 'Available'),
(80, 5, 'special haldi item', 'special four jewellery item of for haldi', 1500, 'images/jewelery3.jpeg', 10, '2024-11-28', 3, 'Available'),
(81, 5, 'simple light pink flower jewellery', 'simple two light pink flower jewellery item', 330, 'images/jwellery1.jpg', 2, '2024-11-28', 3, 'Available'),
(82, 5, 'white gypsy bracelet', 'white gypsy bracelet ', 120, 'images/braclet.avif', 21, '2024-11-28', 3, 'Available'),
(83, 5, 'white flower bracelet', 'one white flower bracelet for wedding', 120, 'images/handbraclet.jpg', 12, '2024-11-28', 3, 'Available'),
(84, 5, 'white gypsy brooch', 'three item of white gypsy', 230, 'images/broach3.jpeg', 3, '2024-11-28', 3, 'Available'),
(85, 5, 'single brooch', 'single gypsy brooch ', 120, 'images/broach4.jpeg', 12, '2024-11-28', 3, 'Available'),
(86, 5, 'white flower brooch', 'single white flower brooch for wedding', 220, 'images/broach5.jpeg', 3, '2024-11-28', 3, 'Available'),
(87, 6, 'pink and white rose harmala', 'two light pink and white rose harmala', 450, 'images/harmalapinkwhiteflower.jpg', 2, '2024-11-29', 3, 'Available'),
(88, 6, 'red and yellow rose harmala', 'two red and yellow rose harmala', 550, 'images/harmalaredyellowflower.jpg', 2, '2024-11-29', 3, 'Available'),
(89, 6, 'red and white rose harmala', 'two red and white rose harmala', 1000, 'images/harmalaredrosewhiteflower.jpg', 2, '2024-11-29', 3, 'Available'),
(90, 6, 'red and white rose harmala', 'simple two red and white rose harmala', 450, 'images/harmalaredwhiteflower.jpg', 2, '2024-11-29', 3, 'Available'),
(91, 5, 'light pink and white flower bracelet', 'single light pink and white flower bracelet', 230, 'images/braceletwhiteflr.webp', 2, '2024-11-29', 3, 'Available'),
(92, 5, 'dark red rose bracelet', 'dark red rose flower bracelet bouquet', 330, 'images/darkredrosebracelet.avif', 2, '2024-11-29', 3, 'Available'),
(93, 2, 'light pink rose bouquet', 'light pink rose bouquet for anniversary', 880, 'images/aniversaybouquet.jpeg', 12, '2024-11-29', 6, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tblitem_info`
--

CREATE TABLE `tblitem_info` (
  `S_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) DEFAULT NULL,
  `F_ID` int(11) DEFAULT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblitem_info`
--

INSERT INTO `tblitem_info` (`S_ID`, `ITEM_ID`, `F_ID`, `QUANTITY`) VALUES
(1, 1, 22, 20),
(2, 2, 12, 11),
(3, 3, 4, 20),
(4, 4, 2, 15),
(5, 5, 2, 25),
(6, 6, 4, 22),
(7, 7, 2, 7),
(8, 8, 2, 24),
(9, 9, 2, 9),
(10, 10, 3, 15),
(11, 11, 4, 22),
(12, 12, 8, 7),
(13, 13, 19, 13),
(14, 14, 19, 6),
(15, 15, 20, 10),
(16, 16, 3, 15),
(17, 17, 3, 15),
(18, 18, 17, 17),
(19, 19, 5, 11),
(20, 20, 18, 15),
(21, 21, 19, 13),
(22, 22, 2, 4),
(23, 22, 5, 3),
(24, 22, 7, 4),
(25, 22, 8, 4),
(26, 23, 6, 6),
(27, 24, 5, 9),
(28, 25, 5, 11),
(29, 26, 2, 2),
(30, 26, 8, 1),
(31, 26, 7, 1),
(32, 26, 3, 2),
(33, 26, 5, 3),
(34, 27, 4, 3),
(35, 27, 3, 2),
(36, 27, 8, 2),
(37, 28, 2, 6),
(38, 28, 4, 7),
(39, 28, 9, 5),
(40, 29, 2, 7),
(41, 29, 4, 7),
(42, 30, 2, 11),
(43, 30, 4, 8),
(44, 30, 6, 4),
(45, 30, 8, 5),
(46, 31, 19, 4),
(47, 31, 5, 5),
(48, 32, 2, 30),
(49, 36, 5, 1),
(50, 38, 4, 1),
(51, 38, 4, 1),
(52, 39, 4, 1),
(53, 40, 4, 1),
(54, 41, 2, 1),
(55, 42, 1, 1),
(56, 43, 3, 1),
(57, 44, 8, 1),
(58, 45, 2, 1),
(59, 46, 11, 1),
(60, 47, 11, 1),
(61, 48, 5, 1),
(62, 49, 2, 1),
(63, 53, 4, 15),
(64, 54, 7, 7),
(65, 54, 6, 2),
(66, 55, 2, 11),
(67, 56, 5, 30),
(68, 57, 1, 11),
(69, 58, 5, 12),
(70, 58, 9, 4),
(71, 59, 6, 16),
(72, 60, 3, 40),
(73, 61, 16, 120),
(74, 62, 16, 400),
(75, 62, 16, 400),
(76, 63, 16, 80),
(77, 65, 3, 2),
(78, 65, 7, 2),
(79, 65, 2, 2),
(80, 65, 4, 2),
(81, 65, 8, 2),
(82, 66, 3, 5),
(83, 66, 4, 5),
(84, 66, 2, 5),
(85, 66, 8, 5),
(86, 66, 7, 5),
(87, 67, 22, 15),
(88, 67, 4, 5),
(89, 67, 5, 12),
(90, 68, 1, 12),
(91, 68, 3, 30),
(92, 69, 5, 12),
(93, 70, 14, 12),
(94, 70, 13, 12),
(95, 86, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `ID` int(11) NOT NULL,
  `UNAME` varchar(30) DEFAULT NULL,
  `DUNAME` varchar(30) DEFAULT NULL,
  `Password` varchar(260) NOT NULL,
  `Roll` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`ID`, `UNAME`, `DUNAME`, `Password`, `Roll`) VALUES
(1, 'jelimaniya ', NULL, '$2y$10$UkemSaARmg7yHV/KR1aKSuH/HII77h8//qFg8OgUlE/Qu9pIq0yKK', 'c'),
(2, 'hetvivamja', NULL, '$2y$10$nVLnZK.w1N9CMfWWv4kInenMhnb4fHzuTYRcc3Wc7f3I0T96VP0C.', 'c'),
(3, 'divyaghori', NULL, '$2y$10$/BTQV0.f7I4Ik8NRsXeHEOdVAMNAhlsWXrAJJhuY.vBywZrqdoKaK', 'c'),
(4, 'riyadhorajiya', NULL, '$2y$10$S0hgo569loVHQMHWX3aa6e7QRpQ/YcWNStGYM5jmz6VnF6zTspo2W', 'c'),
(5, 'shrutihansaliya', NULL, '$2y$10$dMY9IQzc/kIwfk8utIv01uZsl.kbuHGGTzniH/ob2ZX6wVmKw74Nm', 'c'),
(6, 'meetghasadiya', NULL, '$2y$10$4U6CzdCEZ6xXnj9XQF.wnOVwAMER4Nfbzxn1y8c6I19mg4p4keNS.', 'c'),
(7, NULL, 'sujan', '$2y$10$FYenirlEU4GbxNdrH7I3EO7eVDzNRwR.2ca.dGLqSsKNiaJo0GkUC', 'd'),
(8, NULL, 'dharmik', '$2y$10$kPpunZHbmCvAXhtRrtSZYeiZJ41Ky3voQbjdD9rawzKEB/jKcLOyK', 'd'),
(9, NULL, 'preet', '$2y$10$.S8l1uU/wnR4joM/kqe0O.cgLHWGZILLh2a5NmgNydqr34f3YhM2m', 'd'),
(10, NULL, 'kevin', '$2y$10$f84Cht2WTN9K76Y83BBLYuW172EjSO.6.5XpqHhM1CZMToirBjY7a', 'd'),
(11, NULL, 'ayush', '$2y$10$oDXQyGm.dYMldKhAHYZBWO25C0GYgrntbtcdFLB8XVorgGVFXAVJm', 'd'),
(12, 'princevasoya', NULL, '$2y$10$pqZ.kRUYHFVCSzN0BnRgP.snUOLgbE59GACEZxIJarbswQfB1KPCK', 'c'),
(13, 'princevasoya', NULL, '$2y$10$RLPJIb.n9sQm0DDgWAigEOArd0VybkzSrCt9puh9E.GPLLguJVcuS', 'c'),
(14, 'smit', NULL, '$2y$10$EKn0OVW7LG0vqGQtrxP24u5nQuIdnn1xElUZYprtx3CsPybAbBH0.', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `O_ID` int(11) NOT NULL,
  `P_ID` int(11) DEFAULT NULL,
  `UNAME` varchar(30) DEFAULT NULL,
  `O_DATE` date NOT NULL DEFAULT current_timestamp(),
  `QUANTITY` int(11) NOT NULL,
  `PRICE` float NOT NULL,
  `TOTAL_PRICE` int(11) NOT NULL,
  `GST` float NOT NULL,
  `DISCOUNT` int(11) NOT NULL,
  `PAY_DATE` date NOT NULL,
  `STATUS` varchar(20) NOT NULL,
  `ORDER_TIME` time NOT NULL DEFAULT current_timestamp(),
  `DELIVERY_CHAEGE` int(11) NOT NULL,
  `P_TYPE` varchar(30) NOT NULL,
  `UNAME_DBOY` varchar(30) DEFAULT NULL,
  `ADDRESS` varchar(200) NOT NULL,
  `DELIVERY_DATE` date NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `ORDER_STATUS` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`O_ID`, `P_ID`, `UNAME`, `O_DATE`, `QUANTITY`, `PRICE`, `TOTAL_PRICE`, `GST`, `DISCOUNT`, `PAY_DATE`, `STATUS`, `ORDER_TIME`, `DELIVERY_CHAEGE`, `P_TYPE`, `UNAME_DBOY`, `ADDRESS`, `DELIVERY_DATE`, `pincode`, `ORDER_STATUS`) VALUES
(2, 6, 'hetvivamja', '2024-11-29', 1, 500, 570, 40, 0, '0000-00-00', 'Done', '13:37:19', 30, 'Cash on delivery', 'sujan', '1202,rajhans,tower,jakatnaka,surat', '2024-11-29', '394107', 'Done'),
(3, 42, 'divyaghori', '2024-11-29', 1, 120, 160, 9.6, 0, '2024-11-29', 'Done', '13:40:52', 30, 'Online', 'preet', '77,lakshmi nagar ,surat', '2024-11-30', '395006', 'Pending'),
(4, 86, 'hetvivamja', '2024-11-29', 1, 220, 268, 17.6, 0, '0000-00-00', 'Pending', '18:28:45', 30, 'Cash on delivery', 'ayush', '1202,rajhans,tower,jakatnaka,surat', '2024-12-01', '395220', 'Pending'),
(8, 35, 'divyaghori', '2024-11-30', 3, 560, 1844, 134.4, 0, '2024-11-30', 'Done', '10:45:46', 30, 'Online', 'kevin', '52,subhashpark,adajan,surat', '2024-12-01', '395007', 'Pending'),
(9, 36, 'smit', '2024-11-30', 1, 120, 160, 9.6, 0, '0000-00-00', 'Done', '10:50:14', 30, 'Cash on delivery', 'kevin', '52,subhashpark,adajan,surat', '2024-11-30', '395007', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `tblpincode`
--

CREATE TABLE `tblpincode` (
  `pincode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpincode`
--

INSERT INTO `tblpincode` (`pincode`) VALUES
('394107'),
('394150'),
('394180'),
('395001'),
('3950019'),
('395003'),
('395004'),
('395005'),
('395006'),
('395007'),
('395008'),
('395009'),
('395010'),
('395013'),
('395210'),
('395220'),
('3954221');

-- --------------------------------------------------------

--
-- Table structure for table `tblprovider`
--

CREATE TABLE `tblprovider` (
  `P_ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `CNO` bigint(20) DEFAULT NULL,
  `EMAIL_ID` varchar(40) DEFAULT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `CITY` varchar(20) NOT NULL,
  `PINCODE` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblprovider`
--

INSERT INTO `tblprovider` (`P_ID`, `NAME`, `CNO`, `EMAIL_ID`, `ADDRESS`, `CITY`, `PINCODE`) VALUES
(1, 'sahil rangpariya', 2147483647, 'sahil12@gmail.com', '11,vaibhav bungalow, viti nagar,surat', 'surat', 395006),
(5, 'sureshbhai patel', 8976667655, 'sureshpatel11@gmail.com', '52,subhashpark,adajan,surat', 'surat', 395006);

-- --------------------------------------------------------

--
-- Table structure for table `tblregistration_customer`
--

CREATE TABLE `tblregistration_customer` (
  `UNAME` varchar(30) NOT NULL,
  `FNAME` text NOT NULL,
  `MNAME` text NOT NULL,
  `LNAME` text NOT NULL,
  `DOB` date NOT NULL,
  `GENDER` char(1) NOT NULL,
  `CNO` bigint(20) DEFAULT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `CITY` varchar(20) NOT NULL,
  `PINCODE` int(6) NOT NULL,
  `EMAILID` varchar(40) DEFAULT NULL,
  `PASSWORD` varchar(260) NOT NULL,
  `DATEADDED` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblregistration_customer`
--

INSERT INTO `tblregistration_customer` (`UNAME`, `FNAME`, `MNAME`, `LNAME`, `DOB`, `GENDER`, `CNO`, `ADDRESS`, `CITY`, `PINCODE`, `EMAILID`, `PASSWORD`, `DATEADDED`) VALUES
('divyaghori', 'divya', 'bhaveshbhai', 'ghori', '2004-09-29', 'F', 7984383824, '77,lakhsmi nagar,navjivan,surat', 'surat', 395006, '22bmiit061@gmail.com', '$2y$10$/BTQV0.f7I4Ik8NRsXeHEOdVAMNAhlsWXrAJJhuY.vBywZrqdoKaK', '2024-11-28'),
('hetvivamja', 'hetu', 'manojbhai', 'vamja', '2005-02-22', 'F', 9856565633, '1202,rajhans,tower,jakatnaka,surat', 'surat', 395006, '22bmiit059@gmail.com', '$2y$10$06aHOJhnUoNahr4sYMYHQu7n01RrkKIqfokWTe.gF2Bp9y4OpohLu', '2024-11-28'),
('jelimaniya ', 'jeli', 'shaileshbhai', 'maniya', '2005-03-07', 'F', 7979843443, '52,subhashpark,adajan,surat', 'surat', 395006, '22bmiitbscit003@gmail.com', '$2y$10$UkemSaARmg7yHV/KR1aKSuH/HII77h8//qFg8OgUlE/Qu9pIq0yKK', '2024-11-28'),
('meetghasadiya', 'meet', 'sanjaybhai', 'ghasadiya', '2004-11-01', 'M', 7754367890, '75,tirupati society,yogi chowk,bapasitaram circle,surat', 'surat', 395006, '22bmiit055@gmail.com', '$2y$10$4U6CzdCEZ6xXnj9XQF.wnOVwAMER4Nfbzxn1y8c6I19mg4p4keNS.', '2024-11-28'),
('princevasoya', 'prince', 'rambhai', 'vasoya', '2007-12-12', 'M', 6755876544, '52,subhashpark,adajan,surat', 'surat', 395006, '22bmiit117@gmail.com', '$2y$10$pqZ.kRUYHFVCSzN0BnRgP.snUOLgbE59GACEZxIJarbswQfB1KPCK', '2024-11-30'),
('riyadhorajiya', 'riya', 'nileshbhai', 'dhorajiya', '2004-05-05', 'F', 9675276890, '75,yogi nagar,yogi chowk,surat', 'surat', 395006, '22bmiit058@gmail.com', '$2y$10$S0hgo569loVHQMHWX3aa6e7QRpQ/YcWNStGYM5jmz6VnF6zTspo2W', '2024-11-28'),
('shrutihansaliya', 'shruti', 'sumantbhai', 'hansaliya', '2005-03-09', 'F', 9537683633, 'E-201,vraj darshan,vraj chowk,simada,surat', 'surat', 395006, '22bmiit060@gmail.com', '$2y$10$dMY9IQzc/kIwfk8utIv01uZsl.kbuHGGTzniH/ob2ZX6wVmKw74Nm', '2024-11-28'),
('smit', 'smit', 'vikrambhai', 'patel', '1980-12-12', 'M', 9078654356, '52,subhashpark,adajan,surat', 'surat', 395007, 'smitpatel@gmail.com', '$2y$10$EKn0OVW7LG0vqGQtrxP24u5nQuIdnn1xElUZYprtx3CsPybAbBH0.', '2024-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `tblseason`
--

CREATE TABLE `tblseason` (
  `SEASON_ID` int(11) NOT NULL,
  `SEASONNAME` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblseason`
--

INSERT INTO `tblseason` (`SEASON_ID`, `SEASONNAME`) VALUES
(1, 'all'),
(3, 'summer'),
(2, 'winter');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `S_ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `GENDER` char(1) NOT NULL,
  `DOB` date NOT NULL,
  `CNO` bigint(20) DEFAULT NULL,
  `EMAIL_ID` varchar(40) DEFAULT NULL,
  `DESIGNATION` varchar(20) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `CITY` varchar(20) NOT NULL,
  `PINCODE` int(6) NOT NULL,
  `PHOTO` varchar(400) NOT NULL,
  `SALARY` int(10) NOT NULL,
  `STATUS` varchar(15) DEFAULT 'Active',
  `DATEADDED` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`S_ID`, `NAME`, `GENDER`, `DOB`, `CNO`, `EMAIL_ID`, `DESIGNATION`, `ADDRESS`, `CITY`, `PINCODE`, `PHOTO`, `SALARY`, `STATUS`, `DATEADDED`) VALUES
(1, 'jemin bhai', 'm', '1979-12-12', 7898765438, 'jemin@gmail.com', 'worker', '23,rivera residency,mota varachha,surat', 'Surat', 395006, 'images/male.png', 10000, 'Inactive', '2024-11-29'),
(2, 'anjali patel', 'f', '1979-11-11', 7676766666, 'anjali@gmail.com', 'worker', '66,rivera residency,mota varachha,surat', 'navsari', 395006, 'images/female.png', 9000, 'Active', '2024-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `tblstockmanagement`
--

CREATE TABLE `tblstockmanagement` (
  `S_ID` int(11) NOT NULL,
  `F_ID` int(11) DEFAULT NULL,
  `RemainingStock` int(11) NOT NULL,
  `UpdatedStock` int(11) NOT NULL,
  `DateAdded` date NOT NULL DEFAULT current_timestamp(),
  `totalstock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstockmanagement`
--

INSERT INTO `tblstockmanagement` (`S_ID`, `F_ID`, `RemainingStock`, `UpdatedStock`, `DateAdded`, `totalstock`) VALUES
(1, 1, 750, 4, '2024-11-29', 726),
(2, 2, 780, 6, '2024-11-29', 341),
(3, 3, 800, 0, '2024-11-29', 404),
(4, 4, 800, 0, '2024-11-29', 544),
(5, 5, 670, 0, '2024-11-29', 280),
(6, 6, 800, 0, '2024-11-29', 686),
(7, 7, 500, 0, '2024-11-29', 473),
(8, 8, 950, 0, '2024-11-29', 795),
(9, 9, 800, 0, '2024-11-29', 869),
(10, 10, 700, 0, '2024-11-29', 700),
(11, 11, 700, 0, '2024-11-29', 678),
(12, 12, 900, 0, '2024-11-29', 878),
(14, 13, 890, 0, '2024-11-29', 878),
(15, 14, 700, 0, '2024-11-29', 700),
(17, 15, 860, 0, '2024-11-29', 860),
(18, 16, 5000, 0, '2024-11-29', 4000),
(19, 17, 850, 0, '2024-11-29', 782),
(20, 18, 700, 0, '2024-11-29', 625),
(21, 19, 790, 0, '2024-11-29', 693),
(22, 20, 900, 0, '2024-11-29', 860),
(23, 21, 700, 0, '2024-11-29', 700),
(24, 22, 790, 0, '2024-11-29', 690);

-- --------------------------------------------------------

--
-- Table structure for table `tblstockmanagementofitem`
--

CREATE TABLE `tblstockmanagementofitem` (
  `I_ID` int(11) NOT NULL,
  `ITEM_ID` int(11) DEFAULT NULL,
  `RemainingStock` int(11) NOT NULL,
  `UpdatedStock` int(11) NOT NULL,
  `totalstock` int(11) NOT NULL,
  `DateAdded` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstockmanagementofitem`
--

INSERT INTO `tblstockmanagementofitem` (`I_ID`, `ITEM_ID`, `RemainingStock`, `UpdatedStock`, `totalstock`, `DateAdded`) VALUES
(1, 86, 12, 0, 11, '2024-11-29'),
(2, 1, 5, 1, 6, '2024-11-29'),
(3, 2, 2, 0, 2, '2024-11-29'),
(4, 3, 2, 0, 2, '2024-11-29'),
(5, 4, 2, 0, 2, '2024-11-29'),
(6, 5, 3, 0, 3, '2024-11-29'),
(7, 6, 2, 0, 2, '2024-11-29'),
(8, 7, 3, 0, 3, '2024-11-29'),
(9, 8, 3, 0, 3, '2024-11-29'),
(10, 9, 4, 0, 4, '2024-11-29'),
(11, 10, 3, 0, 3, '2024-11-29'),
(12, 11, 3, 0, 3, '2024-11-29'),
(13, 12, 3, 0, 3, '2024-11-29'),
(14, 13, 2, 0, 2, '2024-11-29'),
(15, 14, 1, 0, 1, '2024-11-29'),
(16, 15, 4, 0, 4, '2024-11-29'),
(17, 16, 3, 0, 3, '2024-11-29'),
(18, 17, 3, 0, 3, '2024-11-29'),
(19, 18, 4, 0, 4, '2024-11-29'),
(20, 19, 3, 0, 3, '2024-11-29'),
(21, 20, 5, 0, 5, '2024-11-29'),
(22, 21, 5, 0, 5, '2024-11-29'),
(25, 22, 3, 0, 3, '2024-11-29'),
(27, 23, 2, 0, 2, '2024-11-29'),
(28, 24, 2, 0, 2, '2024-11-29'),
(29, 25, 5, 0, 5, '2024-11-29'),
(34, 26, 1, 0, 1, '2024-11-29'),
(37, 27, 2, 0, 2, '2024-11-29'),
(40, 28, 3, 0, 3, '2024-11-29'),
(42, 29, 3, 0, 3, '2024-11-29'),
(46, 30, 3, 0, 3, '2024-11-29'),
(48, 31, 3, 0, 3, '2024-11-29'),
(49, 32, 4, 0, 4, '2024-11-29'),
(50, 36, 5, 0, 4, '2024-11-29'),
(52, 38, 10, 0, 10, '2024-11-29'),
(53, 39, 10, 0, 10, '2024-11-29'),
(54, 40, 10, 0, 10, '2024-11-29'),
(55, 41, 11, 0, 11, '2024-11-29'),
(56, 42, 11, 0, 11, '2024-11-29'),
(57, 43, 11, 0, 11, '2024-11-29'),
(58, 44, 11, 0, 11, '2024-11-29'),
(59, 45, 11, 0, 11, '2024-11-29'),
(60, 46, 11, 0, 11, '2024-11-29'),
(61, 47, 11, 0, 11, '2024-11-29'),
(62, 48, 12, 0, 12, '2024-11-29'),
(63, 49, 12, 0, 12, '2024-11-29'),
(64, 53, 3, 0, 3, '2024-11-29'),
(66, 54, 3, 0, 3, '2024-11-29'),
(67, 55, 5, 0, 5, '2024-11-29'),
(68, 56, 3, 0, 3, '2024-11-29'),
(69, 57, 4, 0, 4, '2024-11-29'),
(71, 58, 4, 0, 4, '2024-11-29'),
(72, 59, 6, 0, 6, '2024-11-29'),
(73, 60, 3, 0, 3, '2024-11-29'),
(74, 61, 1, 0, 1, '2024-11-29'),
(76, 62, 1, 0, 1, '2024-11-29'),
(77, 63, 1, 0, 1, '2024-11-29'),
(82, 65, 2, 0, 2, '2024-11-29'),
(87, 66, 3, 0, 3, '2024-11-29'),
(90, 67, 3, 0, 3, '2024-11-29'),
(92, 68, 2, 0, 2, '2024-11-29'),
(93, 69, 5, 0, 5, '2024-11-29'),
(95, 70, 1, 0, 1, '2024-11-29'),
(96, 86, 2, 0, 2, '2024-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `tbltype`
--

CREATE TABLE `tbltype` (
  `TYPE_ID` int(11) NOT NULL,
  `TYPE_OCCASION_WISE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltype`
--

INSERT INTO `tbltype` (`TYPE_ID`, `TYPE_OCCASION_WISE`) VALUES
(1, 'all'),
(6, 'anniversary'),
(2, 'birthday'),
(4, 'fatherday'),
(3, 'marraige'),
(5, 'motherday'),
(7, 'valentine day');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcart_item`
--
ALTER TABLE `tblcart_item`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `ITEM_ID` (`ITEM_ID`),
  ADD KEY `UNAME` (`UNAME`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NAME` (`NAME`) USING HASH;

--
-- Indexes for table `tblcolor`
--
ALTER TABLE `tblcolor`
  ADD PRIMARY KEY (`COLOR_ID`),
  ADD UNIQUE KEY `COLORNAME` (`COLORNAME`);

--
-- Indexes for table `tbldeliveryboy`
--
ALTER TABLE `tbldeliveryboy`
  ADD PRIMARY KEY (`D_ID`),
  ADD KEY `S_USERNAME` (`S_USERNAME`),
  ADD KEY `O_ID` (`O_ID`);

--
-- Indexes for table `tbldeliveryboyregistration`
--
ALTER TABLE `tbldeliveryboyregistration`
  ADD PRIMARY KEY (`USERNAME`),
  ADD UNIQUE KEY `CNO` (`CNO`),
  ADD UNIQUE KEY `EMAIL_ID` (`EMAIL_ID`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`F_ID`),
  ADD KEY `P_ID` (`P_ID`),
  ADD KEY `UNAME` (`UNAME`);

--
-- Indexes for table `tblflower`
--
ALTER TABLE `tblflower`
  ADD PRIMARY KEY (`F_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `P_ID` (`P_ID`),
  ADD KEY `COLOR_ID` (`COLOR_ID`),
  ADD KEY `SEASON_ID` (`SEASON_ID`);

--
-- Indexes for table `tblitem`
--
ALTER TABLE `tblitem`
  ADD PRIMARY KEY (`ITEM_ID`),
  ADD KEY `CATEGORY_ID` (`CATEGORY_ID`),
  ADD KEY `TYPE_ID` (`TYPE_ID`);

--
-- Indexes for table `tblitem_info`
--
ALTER TABLE `tblitem_info`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `ITEM_ID` (`ITEM_ID`),
  ADD KEY `F_ID` (`F_ID`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UNAME` (`UNAME`),
  ADD KEY `DUNAME` (`DUNAME`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`O_ID`),
  ADD KEY `P_ID` (`P_ID`),
  ADD KEY `UNAME` (`UNAME`),
  ADD KEY `UNAME_DBOY` (`UNAME_DBOY`),
  ADD KEY `pincode` (`pincode`);

--
-- Indexes for table `tblpincode`
--
ALTER TABLE `tblpincode`
  ADD PRIMARY KEY (`pincode`);

--
-- Indexes for table `tblprovider`
--
ALTER TABLE `tblprovider`
  ADD PRIMARY KEY (`P_ID`),
  ADD UNIQUE KEY `CNO` (`CNO`),
  ADD UNIQUE KEY `EMAIL_ID` (`EMAIL_ID`);

--
-- Indexes for table `tblregistration_customer`
--
ALTER TABLE `tblregistration_customer`
  ADD PRIMARY KEY (`UNAME`),
  ADD UNIQUE KEY `CNO` (`CNO`),
  ADD UNIQUE KEY `EMAILID` (`EMAILID`);

--
-- Indexes for table `tblseason`
--
ALTER TABLE `tblseason`
  ADD PRIMARY KEY (`SEASON_ID`),
  ADD UNIQUE KEY `SEASONNAME` (`SEASONNAME`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`S_ID`),
  ADD UNIQUE KEY `CNO` (`CNO`),
  ADD UNIQUE KEY `EMAIL_ID` (`EMAIL_ID`);

--
-- Indexes for table `tblstockmanagement`
--
ALTER TABLE `tblstockmanagement`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `F_ID` (`F_ID`);

--
-- Indexes for table `tblstockmanagementofitem`
--
ALTER TABLE `tblstockmanagementofitem`
  ADD PRIMARY KEY (`I_ID`),
  ADD KEY `ITEM_ID` (`ITEM_ID`);

--
-- Indexes for table `tbltype`
--
ALTER TABLE `tbltype`
  ADD PRIMARY KEY (`TYPE_ID`),
  ADD UNIQUE KEY `TYPE_OCCASION_WISE` (`TYPE_OCCASION_WISE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcart_item`
--
ALTER TABLE `tblcart_item`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcolor`
--
ALTER TABLE `tblcolor`
  MODIFY `COLOR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbldeliveryboy`
--
ALTER TABLE `tbldeliveryboy`
  MODIFY `D_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblflower`
--
ALTER TABLE `tblflower`
  MODIFY `F_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblitem`
--
ALTER TABLE `tblitem`
  MODIFY `ITEM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tblitem_info`
--
ALTER TABLE `tblitem_info`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblprovider`
--
ALTER TABLE `tblprovider`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblseason`
--
ALTER TABLE `tblseason`
  MODIFY `SEASON_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstockmanagement`
--
ALTER TABLE `tblstockmanagement`
  MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblstockmanagementofitem`
--
ALTER TABLE `tblstockmanagementofitem`
  MODIFY `I_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbltype`
--
ALTER TABLE `tbltype`
  MODIFY `TYPE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcart_item`
--
ALTER TABLE `tblcart_item`
  ADD CONSTRAINT `tblcart_item_ibfk_1` FOREIGN KEY (`ITEM_ID`) REFERENCES `tblitem` (`ITEM_ID`),
  ADD CONSTRAINT `tblcart_item_ibfk_2` FOREIGN KEY (`UNAME`) REFERENCES `tblregistration_customer` (`UNAME`);

--
-- Constraints for table `tbldeliveryboy`
--
ALTER TABLE `tbldeliveryboy`
  ADD CONSTRAINT `tbldeliveryboy_ibfk_1` FOREIGN KEY (`S_USERNAME`) REFERENCES `tbldeliveryboyregistration` (`USERNAME`),
  ADD CONSTRAINT `tbldeliveryboy_ibfk_2` FOREIGN KEY (`O_ID`) REFERENCES `tblorder` (`O_ID`);

--
-- Constraints for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD CONSTRAINT `tblfeedback_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `tblitem` (`ITEM_ID`),
  ADD CONSTRAINT `tblfeedback_ibfk_2` FOREIGN KEY (`UNAME`) REFERENCES `tblregistration_customer` (`UNAME`);

--
-- Constraints for table `tblflower`
--
ALTER TABLE `tblflower`
  ADD CONSTRAINT `tblflower_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `tblcategory` (`ID`),
  ADD CONSTRAINT `tblflower_ibfk_2` FOREIGN KEY (`P_ID`) REFERENCES `tblprovider` (`P_ID`),
  ADD CONSTRAINT `tblflower_ibfk_3` FOREIGN KEY (`COLOR_ID`) REFERENCES `tblcolor` (`COLOR_ID`),
  ADD CONSTRAINT `tblflower_ibfk_4` FOREIGN KEY (`SEASON_ID`) REFERENCES `tblseason` (`SEASON_ID`);

--
-- Constraints for table `tblitem`
--
ALTER TABLE `tblitem`
  ADD CONSTRAINT `tblitem_ibfk_1` FOREIGN KEY (`CATEGORY_ID`) REFERENCES `tblcategory` (`ID`),
  ADD CONSTRAINT `tblitem_ibfk_2` FOREIGN KEY (`TYPE_ID`) REFERENCES `tbltype` (`TYPE_ID`);

--
-- Constraints for table `tblitem_info`
--
ALTER TABLE `tblitem_info`
  ADD CONSTRAINT `tblitem_info_ibfk_1` FOREIGN KEY (`ITEM_ID`) REFERENCES `tblitem` (`ITEM_ID`),
  ADD CONSTRAINT `tblitem_info_ibfk_2` FOREIGN KEY (`F_ID`) REFERENCES `tblflower` (`F_ID`);

--
-- Constraints for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD CONSTRAINT `tbllogin_ibfk_1` FOREIGN KEY (`UNAME`) REFERENCES `tblregistration_customer` (`UNAME`),
  ADD CONSTRAINT `tbllogin_ibfk_2` FOREIGN KEY (`DUNAME`) REFERENCES `tbldeliveryboyregistration` (`USERNAME`);

--
-- Constraints for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD CONSTRAINT `tblorder_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `tblitem` (`ITEM_ID`),
  ADD CONSTRAINT `tblorder_ibfk_2` FOREIGN KEY (`UNAME`) REFERENCES `tblregistration_customer` (`UNAME`),
  ADD CONSTRAINT `tblorder_ibfk_3` FOREIGN KEY (`UNAME_DBOY`) REFERENCES `tbldeliveryboyregistration` (`USERNAME`),
  ADD CONSTRAINT `tblorder_ibfk_4` FOREIGN KEY (`pincode`) REFERENCES `tblpincode` (`pincode`);

--
-- Constraints for table `tblstockmanagement`
--
ALTER TABLE `tblstockmanagement`
  ADD CONSTRAINT `tblstockmanagement_ibfk_1` FOREIGN KEY (`F_ID`) REFERENCES `tblflower` (`F_ID`);

--
-- Constraints for table `tblstockmanagementofitem`
--
ALTER TABLE `tblstockmanagementofitem`
  ADD CONSTRAINT `tblstockmanagementofitem_ibfk_1` FOREIGN KEY (`ITEM_ID`) REFERENCES `tblitem` (`ITEM_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

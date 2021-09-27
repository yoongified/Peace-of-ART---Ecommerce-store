-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2021 at 05:06 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art`
--

-- --------------------------------------------------------

--
-- Table structure for table `addressbook`
--

CREATE TABLE `addressbook` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(25) COLLATE latin1_general_cs NOT NULL,
  `address` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `city` varchar(25) COLLATE latin1_general_cs NOT NULL,
  `mobile` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `addressbook`
--

INSERT INTO `addressbook` (`id`, `customer_id`, `name`, `address`, `city`, `mobile`) VALUES
(16, 910, 'RON1', 'dsfghjkiuytrdfcvbnmjkiuytrdsfgh', 'MLORE', 26543210),
(24, 910, 'qqq', 'aaaa', 'qqq', 1234567),
(25, 910, 'qqq', 'aaaa', 'qqq', 1234567),
(33, 910, 'aaa', ',rrrrrr', 'dddd', 2222222);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `password` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `mobile` varchar(15) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `name`, `email`, `mobile`) VALUES
(1306, 'poa2699', 'RON', 'sron@poa.in', '7777777777'),
(1307, 'iloveyou<3', 'ALEMAN', 'aleman@poa.in', '9482992545'),
(1308, 'sql1695', 'TRIPTI', 'tripz@poa.in', '1111111111'),
(1309, 'pizzapizza21', 'PSQUARE', 'psquare@poa.in', '4444444444');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `stats` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `stats`) VALUES
(101, 'PAINT', 1),
(102, 'PAINT MEDIUM', 1),
(103, 'CANVASES', 0),
(104, 'BRUSHES', 0),
(105, 'TOOLS & ACCESSORIES', 1),
(106, 'EASELS', 1),
(107, 'DRAWING SUPPLIES', 1),
(181, 'PENSsss', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(75) COLLATE latin1_general_cs NOT NULL,
  `mobile` varchar(15) COLLATE latin1_general_cs NOT NULL,
  `comment` text COLLATE latin1_general_cs NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(51, 'sdcvfdsf', 'ascxv2@sdfvbcg.com', '1233445655', 'aSBGF', '2021-09-14 06:35:27'),
(52, 'sadfxcbg', 'asdsf@sfdgdg.in', '0000000000', 'dsfcbgvhjm', '2021-09-14 06:36:12'),
(53, 'dsfxcbgvnh', 'dsfgbvn@dfhdf.com', '7144444444', 'dfhjgvkgyu', '2021-09-14 06:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE `coupon_master` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `coupon_type` varchar(10) COLLATE latin1_general_cs NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `stats` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `coupon_master`
--

INSERT INTO `coupon_master` (`id`, `coupon_code`, `coupon_value`, `coupon_type`, `cart_min_value`, `stats`) VALUES
(2, 'POA500', 500, 'PERCENTAGE', 900, 1),
(3, 'WOHOO690', 690, 'RUPEES', 3000, 0),
(4, 'POA250', 250, 'RUPEES', 2000, 1),
(5, 'WOHOO', 777, 'PERCENTAGE', 6000, 1),
(6, 'WOHOO4', 777, 'PERCENTAGE', 500, 0),
(8, 'POA5004', 4500, 'RUPEES', 6000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `password` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `fname` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `lname` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `mobile` varchar(15) COLLATE latin1_general_cs NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `password`, `fname`, `lname`, `email`, `mobile`, `added_on`) VALUES
(910, 'zz', 'RON', 'WOW', 'peaceofat.official@gmail.com', '9465321564', '2021-08-24 11:14:03'),
(962, 'zz', 'yoongs', 'min', 'shettigar2699@gmail.com', '8765432695', '2021-09-01 03:55:53'),
(963, 'aa', 'wewre', 'wrfetrertr', 'prajna210300@gmail.com', '9432640175', '2021-09-03 09:06:26'),
(968, 'xcvb', 'cxvb v', 'dcvxbfd', 'sdfbcg@gmail.com', '9865326598', '2021-09-14 07:04:13'),
(969, 'ww', 'RON', 'A', 'peaceofart.official@gmail.com', '9865326577', '2021-09-14 07:23:50'),
(971, 'zz', 'SDSF', 'SDFGB', 'peace@gmail.com', '1234567890', '2021-09-15 03:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_images` varchar(250) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `product_images`) VALUES
(3, 111, '271337861_AA12.jpg'),
(4, 112, '225428180_AA22.jpg'),
(5, 113, '184855256_AA32.jpg'),
(6, 114, '222217893_AA44.jpg'),
(7, 114, '216788539_AA43.jpg'),
(8, 114, '270876316_AA42.jpg'),
(9, 115, '133945753_AA54.jpg'),
(10, 115, '603503570_AA53.jpg'),
(11, 115, '926093643_AA52.jpg'),
(12, 116, '426513353_AA62.jpg'),
(13, 118, '665184017_AA83.jpg'),
(14, 118, '862484608_AA82.jpg'),
(15, 119, '341436804_AB23.jpg'),
(16, 119, '346540646_AB22.jpg'),
(17, 124, '747777657_AB75.jpg'),
(18, 124, '257641166_AB74.jpg'),
(19, 124, '279373105_AB73.jpg'),
(20, 124, '847024083_AB72.jpg'),
(21, 127, '397710067_AC32.jpg'),
(22, 128, '783549896_AC42.jpg'),
(23, 129, '585983836_AC52.jpg'),
(24, 130, '667511721_AC62.jpg'),
(25, 131, '353820993_AC72.jpg'),
(26, 132, '976225781_AC83.jpg'),
(27, 132, '244750047_AC82.jpg'),
(28, 133, '358990615_AC93.jpg'),
(29, 133, '282492307_AC92.jpg'),
(30, 134, '652112975_AC103.jpg'),
(31, 134, '473719511_AC102.jpg'),
(32, 135, '912293886_AC112.jpg'),
(33, 145, '328132854_BC12.jpg'),
(34, 145, '463974147_BC13.jpg'),
(35, 147, '231228390_C12.jpg'),
(36, 152, '739466933_EB14.jpg'),
(37, 152, '219753696_EB13.jpg'),
(38, 152, '405900963_EB12.jpg'),
(39, 155, '145554631_EC22.jpg'),
(40, 157, '939354651_EC44.jpg'),
(41, 157, '858969419_EC43.jpg'),
(42, 157, '718741356_EC42.jpg'),
(43, 158, '723266686_ED12.jpg'),
(44, 159, '408860809_ED22.jpg'),
(45, 159, '223629711_ED23.jpg'),
(46, 160, '520630918_ED32.jpg'),
(47, 160, '997380132_ED33.jpg'),
(48, 161, '258009040_ED42.jpg'),
(49, 161, '776059379_ED43.jpg'),
(50, 161, '635704754_ED44.jpg'),
(51, 161, '791628445_ED42.jpg'),
(52, 161, '438723249_ED43.jpg'),
(53, 161, '773246413_ED44.jpg'),
(54, 164, '142783258_EE32.jpg'),
(55, 165, '537491408_EE42.jpg'),
(56, 165, '216544358_EE43.jpg'),
(57, 169, '195504511_F32.jpg'),
(58, 169, '508084980_F33.jpg'),
(59, 170, '359813692_F42.jpg'),
(60, 170, '257030362_F43.jpg'),
(61, 170, '471401060_F44.jpg'),
(62, 170, '169549957_F45.jpg'),
(63, 172, '409435613_F62.jpg'),
(64, 172, '642866786_F63.jpg'),
(65, 173, '888948205_F72.jpg'),
(66, 173, '425718934_F73.jpg'),
(67, 174, '976919473_GA12.jpg'),
(68, 175, '589708309_GA22.jpg'),
(69, 175, '233487990_GA23.jpg'),
(70, 176, '288945162_GA32.jpg'),
(71, 176, '818895408_GA33.jpg'),
(72, 177, '429464897_GA42.jpg'),
(73, 177, '193754298_GA43.jpg'),
(74, 182, '149595285_GB52.jpg'),
(75, 182, '471707101_GB53.jpg'),
(76, 185, '433800404_GC12.jpg'),
(77, 185, '521819420_GC13.jpg'),
(78, 186, '563772451_GC22.jpg'),
(79, 186, '300139016_GC23.jpg'),
(80, 190, '215000067_GD42.jpg'),
(81, 190, '197395116_GD43.jpg'),
(82, 197, '315376178_GE12.jpg'),
(83, 198, '254124412_GE22.jpg'),
(84, 200, '835305711_GE42.png'),
(85, 200, '813023135_GE43.jpg'),
(86, 205, '546933003_GE92.jpg'),
(87, 205, '434291487_GE93.jpg'),
(88, 205, '908137437_GE94.jpg'),
(105, 206, '502133828_GE102.jpg'),
(106, 206, '353615226_GE103.jpg'),
(107, 206, '535622593_GE104.jpg'),
(108, 206, '784790879_GE105.jpg'),
(109, 198, '275916636_'),
(115, 111, '637907951_'),
(116, 111, '484379409_'),
(117, 111, '176731025_'),
(118, 0, '571605954_Untitled2.png'),
(119, 0, '399156607_Untitled.png'),
(121, 310, '568222558_Untitled.png'),
(122, 310, '280348800_Untitled2.png'),
(123, 310, '776396492_Untitled2.png'),
(126, 313, '346427463_product-3.jpg'),
(127, 313, '917469969_product-2.jpg'),
(128, 0, '324195765_team-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` varchar(250) COLLATE latin1_general_cs NOT NULL,
  `zipcode` int(11) NOT NULL,
  `city` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `payment_type` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `coupon_discount` float NOT NULL,
  `total` float NOT NULL,
  `payment_status` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `order_status` int(1) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `address`, `zipcode`, `city`, `mobile`, `payment_type`, `coupon_id`, `coupon_code`, `coupon_discount`, `total`, `payment_status`, `order_status`, `added_on`) VALUES
(12, 910, '2002,4main,hal3rdstage,bangalore-75, Hal 3rd Stage', 560075, 'Bangalore', 2526512700, 'cod', 2, 'POA500', 236.4, 945.6, 'pending', 5, '2021-09-12 04:52:06'),
(14, 910, 'Room No 8, 35, Opp Hamam Hse, Ambalal Doshi Marg, Hutatma Chowk', 400023, 'Mumbai', 2147483647, 'cod', 0, '', 0, 1495, 'pending', 3, '2021-09-12 05:08:51'),
(15, 970, '42/19/20, 2nd Flr, Shreeji Arcade, Panchpakdi, Opp Nitin Casting, Thane (w)', 400602, 'Mumbai', 8660404252, 'cod', 0, '', 0, 6209, 'pending', 1, '2021-09-14 07:49:40'),
(16, 971, '34-50, 34st Cross Lane, NH 48, Pumpwell, Nr Mahaveer Circle, Kankanady', 575002, 'Mangalore', 2225390446, 'cod', 4, 'POA250', 250, 10746, 'pending', 2, '2021-09-15 03:49:52'),
(17, 969, 'Sthree Samaj Compound, G H S Road', 574104, 'Mangalore', 9964012147, 'cod', 0, '', 0, 536, 'pending', 4, '2021-09-15 06:55:06'),
(18, 969, 'Paradigm Plaza, Ground Floor, A B Shetty Circle, Pandeshwar', 575001, 'Mangalore', 8242425884, 'cod', 0, '', 0, 1897, 'pending', 1, '2021-09-20 05:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(11, 12, 311, 1, 123),
(12, 12, 198, 1, 360),
(13, 12, 190, 1, 699),
(14, 14, 146, 5, 299),
(15, 15, 206, 1, 2499),
(16, 15, 205, 1, 2999),
(17, 15, 149, 3, 237),
(18, 16, 206, 2, 2499),
(19, 16, 205, 2, 2999),
(20, 17, 143, 1, 299),
(21, 17, 149, 1, 237),
(22, 18, 118, 2, 749),
(23, 18, 150, 1, 399);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(1) NOT NULL,
  `name` varchar(25) COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Cancelled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) DEFAULT NULL,
  `pname` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `brand` varchar(50) COLLATE latin1_general_cs DEFAULT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `img1` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `short_desc` varchar(2000) COLLATE latin1_general_cs NOT NULL,
  `descr` text COLLATE latin1_general_cs NOT NULL,
  `best_seller` int(11) NOT NULL,
  `meta_title` text COLLATE latin1_general_cs DEFAULT NULL,
  `meta_keyword` varchar(2000) COLLATE latin1_general_cs DEFAULT NULL,
  `stats` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `cat_id`, `subcat_id`, `pname`, `brand`, `mrp`, `price`, `stock`, `img1`, `short_desc`, `descr`, `best_seller`, `meta_title`, `meta_keyword`, `stats`) VALUES
(111, 101, 70, 'Cretacolor Aqua Brique Watercolor Set Of 10', 'Cretacolor', 1485, 1335, 0, 'AA11.jpg', 'This 10 color set of Aqua Brique solid water-soluble blocks by Cretacolor can be applied on various surfaces including paper, cardboard, canvas and wood. Each pocket sized set includes 10 special pigmented color blocks that provide excellent color and an expanding sponge for application. Aqua Brique can be applied wet or dry and can be used in a variety of techniques such as drawing, painting, mixed-media, watercolor, blending and monoprints.', 'This 10 color set of Aqua Brique solid water-soluble blocks by Cretacolor can be applied on various surfaces including paper, cardboard, canvas and wood.\r\n Each pocket sized set includes 10 special pigmented color blocks that provide excellent color and an expanding sponge for application.\r\n Aqua Brique can be applied wet or dry and can be used in a variety of techniques such as drawing, painting, mixed-media, watercolor, blending and monoprints.', 0, 'Cretacolor Aqua Brique Watercolor Set Of 10', '', 1),
(112, 101, 70, 'QoR Introductory 12 Color Set of 5ml Tubes', 'QoR', 5999, 5849, 20, 'AA21.jpg', 'Modern Watercolors. The unique formulation of QoR Watercolors accentuates the luminosity and brilliance of pigments even after drying. QoR provides the subtlety, transparency and flow of a great watercolor, with colors that have as much vibrancy and fire as the best acrylic or oil paint. Twelve – 5 ml tubes – featuring: Nickel Azo Yellow, Hansa Yellow Light, Quinacridone Gold Deep, Quinacridone Magenta, Permanent Alizarin Crimson, Pyrrole Red Light, Phthalo Blue (Green Shade), Ultramarine Blue, Viridian Green, Burnt Sienna (Natural), Paynes Gray, Yellow Ochre (Natural)', 'Modern Watercolors. The unique formulation of QoR Watercolors accentuates the luminosity and brilliance of pigments even after drying. QoR provides the subtlety, transparency and flow of a great watercolor, with colors that have as much vibrancy and fire as the best acrylic or oil paint. Twelve – 5 ml tubes – featuring: Nickel Azo Yellow, Hansa Yellow Light, Quinacridone Gold Deep, Quinacridone Magenta, Permanent Alizarin Crimson, Pyrrole Red Light, Phthalo Blue (Green Shade), Ultramarine Blue, Viridian Green, Burnt Sienna (Natural), Paynes Gray, Yellow Ochre (Natural)', 0, 'QoR Introductory 12 Color Set of 5ml Tubes', '', 0),
(113, 101, 70, 'Qor Introductory 24 Color Set 5 ML Tubes', 'QoR', 9999, 9849, 16, 'AA31.jpg', 'Modern Watercolors. The unique formulation of QoR Watercolors accentuates the luminosity and brilliance of pigments even after drying. QoR provides the subtlety, transparency and flow of a great watercolor, with colors that have as much vibrancy and fire as the best acrylic or oil paint. 24 – 5 ml Tubes – Featuring: Cadmium Yellow Primrose, Nickel Azo Yellow, Quinacridone Gold, Diarylide Yellow, Transparent Pyrrole Orange, Cadmium Red Medium, Permanent Scarlet, Permanent Alizarin Crimson, Quinacridone Magenta, Dioxazine Purple, Ultramarine Blue, Cerulean Blue Chromium, Phthalo Blue (GS), Cobalt Teal, Viridian Green, Sap Green, Green Gold, Raw Sienna (Natural), Burnt Sienna (Natural), Raw Umber (Natural), Van Dyke Brown, Paynes Gray, Neutral Tint, Titanium White.', 'Modern Watercolors. The unique formulation of QoR Watercolors accentuates the luminosity and brilliance of pigments even after drying. QoR provides the subtlety, transparency and flow of a great watercolor, with colors that have as much vibrancy and fire as the best acrylic or oil paint. 24 – 5 ml Tubes – Featuring: Cadmium Yellow Primrose, Nickel Azo Yellow, Quinacridone Gold, Diarylide Yellow, Transparent Pyrrole Orange, Cadmium Red Medium, Permanent Scarlet, Permanent Alizarin Crimson, Quinacridone Magenta, Dioxazine Purple, Ultramarine Blue, Cerulean Blue Chromium, Phthalo Blue (GS), Cobalt Teal, Viridian Green, Sap Green, Green Gold, Raw Sienna (Natural), Burnt Sienna (Natural), Raw Umber (Natural), Van Dyke Brown, Paynes Gray, Neutral Tint, Titanium White.', 1, 'Qor Introductory 24 Color Set 5 ML Tubes', '', 0),
(114, 101, 70, 'Brustro Aquarelle Brush Pen Set of 24', 'Brustro', 999, 849, 54, 'AA41.jpg', '•	Watercolour brush pen with water-based ink, Soft and Flexible brush tip, Refillable,\r\n•	Non-toxic, Odourless, Xylene free\r\n•	Works like real watercolour brushes. Colours can be spread with water and blended together.\r\n•	Shading effects can be obtained by dipping brush pen tip in water or tip to tip touching of tips to create a gradient effect.\r\n•	Ideal for illustrations, modern calligraphy, DIY, designing, manga, scrapbooking, journals, card-making, hand-lettering and others.', 'Watercolour brush pen with water-based ink Soft and Flexible brush tip Refillable Non-toxic Odourless Xylene free Brush tip size: 1-4.5mm 1. Works like real water colour brushes. 2. Colours can be spread with water and blended together. 3. Shading effects can be obtained by dipping brush pen tip in water or tip to tip touching of tips to create gradient effect. 4. Ideal for illustrations, modern calligraphy, DIY, designing, manga, scrapbooking, journals, card-making, hand-lettering and others. Shade Name Lemon Yellow, Gamboge, Orange, Rose, Vermillion, Crimson, Pastel Pink, Fuchsia, Violet, Ultramarine, Cerulean, Cyan, Pastel Blue, Yellow Green, Lime Green, Sap Green, Viridian, Turquoise Green, Yellow Ochre, Deep Flesh Tint, Raw Sienna, Burnt Sienna, Grey, Black.', 0, 'Brustro Aquarelle Brush Pen Set of 24', '', 0),
(115, 101, 70, 'Brustro Artists’ Watercolour Pan – Set of 42 , ( Free Brustro Watercolour paper 14X21 cm worth Rs. 198 )', 'Brustro', 1199, 1049, 42, 'AA51.jpg', '•	Watercolour sponge attached\r\n•	Aqua squeeze brush included. Refillable pans\r\n•	Pigment rich vibrant colours. Foldable design\r\n•	Includes mixing palette\r\n•	Ideal for plain air painting. Set of 42 Pans (Watercolour paper 14X21 cm)', 'Brustro Artists’ Watercolour Pan will change the way you paint with watercolour and give you new possibilities to carry your watercolour set with you wherever you go. This unique foldable design of 25/42 colours allows for easy transportation and will make your field trips more enjoyable. Not only does all sets include colour cards and an integrated watercolour mixing palette, we’ll also give you one Brustro Aqua Squeeze brush pen. Colours are fade-proof, pigment rich and easy to blend to create an endless range of colours to satisfy both the beginner and seasoned artist. Try these sets once and you’ll never go back to a traditional set again, especially if you enjoy plein air painting or want to take your watercolours with you when travelling. Once the trays are empty, refill with watercolour tubes and re-use', 0, 'Brustro Artists’ Watercolour Pan – Set of 42 , ( Free Brustro Watercolour paper 14X21 cm worth Rs. 198 )', '', 0),
(116, 101, 70, 'Brustro Empty Watercolour Full Pans – Pack of 24', 'Brustro', 199, 49, 23, 'AA61.jpg', '• Customize your own watercolor plastic palette fill the empty pans with any color you choose\r\n• Its small size makes it easy to store and does not take up much space within your workspace Bright white allows watercolor artists to differentiate the exact shade of their watercolor paintings\r\n• These full pans fit in most metal tin boxes, but cannot fit in plastic ones', 'Watercolour plastic container Full skillet container. Your own ideal paint set is easy to create with these empty watercolour pans. Just fill the pan tube with your favourite watercolours, let dry, and then rewet when you’re ready to paint. Use colours directly from the tube or mix your own shades.', 0, 'Brustro Empty Watercolour Full Pans – Pack of 24', '', 0),
(117, 101, 70, 'Royal & Langnickel Watercolor Paint, 12-Piece', NULL, 599, 449, 25, 'AA71.jpg', 'ROYAL BRUSH-Royal & Langnickel Essentials Watercolor Set. Essentials Watercolor Paints have good transparency and tinting strength. This set contains twelve 12mL tubes of watercolor paint in a variety of colors and two paintbrushes. Conforms to ASTM D4236. Imported.', 'ROYAL BRUSH-Royal & Langnickel Essentials Watercolor Set. Essentials Watercolor Paints have good transparency and tinting strength. This set contains twelve 12mL tubes of watercolor paint in a variety of colors and two paintbrushes. Conforms to ASTM D4236. Imported.', 0, 'Royal & Langnickel Watercolor Paint, 12-Piece', NULL, 1),
(118, 101, 70, 'Sennelier l’Aquarelle French Artists’ Watercolor Aqua-Mini Set – Metal Box of 8 Half Pans', 'Sennelier', 899, 749, 12, 'AA81.jpg', '•	Sets of Finest French artists’ watercolors.\r\n•Made with the purest pigments. * Highly lightfast and permanent.\r\n•Gum arabic & honey binder. * Rich and brilliant colors.\r\n•Long-lasting, radiant works of art. * A gift for any accomplished watercolorist.\r\n•Made in France. * Set of 8 half pans in a metal case.\r\n•It includes shades:- Primary Yellow, French Vermilion, Cinereous Blue, French Ultramarine Blue, Phthalo Green Light, Sap Green, Burnt Umber, & Payne’s Grey, plus a watercolor brush.', 'Sennelier of France have newly reformulated their line of watercolors, creating the improved l’Aquarelle French Artists’ Watercolors for discerning watercolor artists of any nationality. True to Senneliers roots, the color palette remains that of the Impressionists. Featuring finely ground, lightfast pigments in a smooth gum Arabic and honey binder, these watercolors are luminous, vibrant, free-flowing and lustrous and are now available in convenient sets of either tubes or half pans. These great sets are all-inclusive, with colors, brushes, and even fold-out palettes, and are designed to be easily portable painting studios perfect for travel. Containing an intriguing array of colors, Sennelier brings to you the quality of their French Artist Watercolors in a sweet, budget friendly package. This set boasts eight half pans, & comes with a travel brush in a metal case, is sure to inspire any watercolorist. Perfect for gift giving to the budding artist, and also for travel. It includes Primary Yellow, French Vermilion, Cinereous Blue, French Ultramarine Blue, Phthalo Green Light, Sap Green, Burnt Umber, & Payne’s Grey, plus a watercolor brush.', 0, 'Sennelier l’Aquarelle French Artists’ Watercolor Aqua-Mini Set – Metal Box of 8 Half Pans', '', 1),
(119, 101, 71, 'BRUSTRO Artists’ Oil Colour Set of 18 Colours X 12ML Tubes', 'Brustro', 849, 699, 16, 'AB21.jpg', '•These oil colors have Rich pigments, excellent colour strength\r\n•High lightfastness, These colours are lightfast and have a smooth buttery consistency which can be used straight out of the tube or thinned down to create glazes.\r\n•Offers Great coverage and Excellent durability. made from refined linseed oil and fine artist pigments in high concentration to yield rich, brilliant and permanent result.\r\n•The colours have smooth consistency.\r\n•Available shades -Titanium White, Lemon Yellow, Cadmium Yellow Hue, Cadmium Orange Hue, Alizarin Crimson, Cadmium Red Hue, Vermillion, Ultramarine, Cobalt Blue, Prussian Blue, Purple, Mid Green, Sap Green , Light green, Burnt Sienna, Burnt Umber, Yellow Ochre & Ivory Black.', 'Brustro Artists’ Oil Colours are made from refined linseed oil and fine artist pigments in high concentration to yield rich, brilliant and permanent result. These colours are lightfast and have a smooth buttery consistency which can be used straight out of the tube or thinned down to create glazes. They are inter-mixable and can be used with oil mediums, solvents and varnishes on all conventional oil painting surfaces.', 0, 'BRUSTRO Artists’ Oil Colour Set of 18 Colours X 12ML Tubes', '', 1),
(120, 101, 71, 'WILLIAMSBURG MODERN COLOURS 11 ML SET', 'WILLIAMSBURG', 6771, 6621, 24, 'AB31.jpg', '•Crisp and bright, with the ability to produce strong and clean tints. Modern colors are an excellent choice for painters looking to supplement their traditional colors with higher chroma alternatives and contemporary painters looking to explore a modern palette.\r\n•Modern colors are an excellent choice for painters looking to supplement their traditional colors with higher chroma alternatives and contemporary painters looking to explore a modern palette.\r\n•Set contains 11 ml tubes of: Permanent Yellow Light, Alizarin Orange, Fanchon Red, Permanent Crimson, Egyptian Violet, Phthalo Blue, Phthalo Green, Quinacridone Gold Brown.\r\n', 'Williamsburg is known for its quality and extensive palette of colors including genuine Italian Earth Colors. Since joining the Golden Artist Colors family, the palette has expanded to include French Earth Colors and a range of colors made with Safflower Oil, as well as special edition and custom colors.', 1, 'WILLIAMSBURG MODERN COLOURS 11 ML SET', NULL, 1),
(121, 101, 71, 'WILLIAMSBURG TRADITIONAL COLOURS 11 ML SET', 'WILLIAMSBURG', 6771, 6621, 24, 'AB41.jpg', '•An ideal starting place for artists who are interested in exploring a more traditional range of colors.\r\n•Set contains 11 ml tubes of: Cadmium Lemon, Cadmium Yellow Medium, Cadmium Red Medium, Alizarin Crimson, Ultramarine Blue, Cerulean Blue (Genuine), Raw Sienna, French Raw Umber.\r\n•Plus a 37 ml tube of Titanium White\r\n', 'Williamsburg is known for its quality and extensive palette of colors including genuine Italian Earth Colors. Since joining the Golden Artist Colors family, the palette has expanded to include French Earth Colors and a range of colors made with Safflower Oil, as well as special edition and custom colors.', 0, 'WILLIAMSBURG TRADITIONAL COLOURS 11 ML SET', NULL, 1),
(122, 101, 71, 'WILLIAMSBURG LANDSCAPE COLOURS 11 ML SET', 'WILLIAMSBURG', 6771, 6621, 23, 'AB51.jpg', 'Williamsburg is known for its quality and extensive palette of colors including genuine Italian Earth Colors. Since joining the Golden Artist Colors family, the palette has expanded to include French Earth Colors and a range of colors made with Safflower Oil, as well as special edition and custom colors.', 'Williamsburg is known for its quality and extensive palette of colors including genuine Italian Earth Colors. Since joining the Golden Artist Colors family, the palette has expanded to include French Earth Colors and a range of colors made with Safflower Oil, as well as special edition and custom colors.', 0, 'WILLIAMSBURG LANDSCAPE COLOURS 11 ML SET', NULL, 1),
(123, 101, 71, 'WILLIAMSBURG SIGNATURE COLOURS 11 ML SET', 'WILLIAMSBURG', 6771, 6621, 22, 'AB61.jpg', '•Throughout Williamsburg’s history, exploration and experimentation have led to the development of several unique colors. The Signature Colors set contains 8 colors representative of these discoveries.\r\n•The Signature Colors set contains 8 colors representative of these discoveries.\r\n•Set contains 11 ml tubes of:\r\n•Brilliant Yellow Pale, Alizarin Orange, Persian Rose, King’s Blue, Courbet Green, Italian Lemon Ochre, Stil de Grain, French Ardoise Grey,\r\n•Plus a 37 ml tube of Titanium White.\r\n', 'Williamsburg is known for its quality and an extensive palette of colors including genuine Italian Earth Colors. Since joining the Golden Artist Colors family, the palette has expanded to include French Earth Colors and a range of colours made with Safflower Oil, as well as special edition and custom colors.', 0, 'WILLIAMSBURG SIGNATURE COLOURS 11 ML SET', NULL, 1),
(124, 101, 71, 'Nevskaya Palitra Ladoga Oil Gift Set: 12 x 18 ml Tubes, 2 Nevskaya Palitra Brushes, 120 ml Linseed Oil for Artistic', '', 1969, 1819, 45, 'AB71.jpg', 'LADOGA BRAND Ladoga artistic paints are perfect for those who is only beginning to learn the art of painting, as well as for artists looking for high quality paints at affordable prices. Instead of expensive inorganic pigments (cadmium and cobalt), the Ladoga paints series uses lightfast organic pigments. The tone of analogous pigments (marked “A” on the label) corresponds precisely to the tones of original colours. Manufacturing technologies and monitoring at all stages is similar to those for the manufacture of Master Class series.', 'LADOGA BRAND Ladoga artistic paints are perfect for those who is only beginning to learn the art of painting, as well as for artists looking for high quality paints at affordable prices. Instead of expensive inorganic pigments (cadmium and cobalt), the Ladoga paints series uses lightfast organic pigments. The tone of analogous pigments (marked “A” on the label) corresponds precisely to the tones of original colours. Manufacturing technologies and monitoring at all stages is similar to those for the manufacture of Master Class series. LADOGA OIL GIFT SET Artists’ oil colours «Ladoga» represent a balanced palette of hues for professional education and creative work. Important is that analogs correspond in tone to the original colours. The set contains 12 color tubes, linseed oil for artistic painting and 2 brushes NEVSKAYA PALITRA. The materials are placed in special plastic packaging designed for repeated use and storage of artistic materials. \r\nLADOGA oil gift set 12 x 18 ml tubes contains: ZINK WHITE or TITANIUM WHITE, CADMIUM LEMON (HUE), CADMIUM LEMON LIGHT (HUE)  or CADMIUM LEMON MEDIUM (HUE), CADMIUM RED LIGHT  or CADMIUM RED DEEP (HUE) , RED OCHRE or ENGLISH RED or INDIAN RED ,COBALT BLUE MEDIUM (HUE)  or PHTHALOCYANINE BLUE  or COBALT BLUE LIGHT (HUE), ULTRAMARINE LIGHT, COBALT GREEN DEEP (HUE)  or COBALT GREEN LIGHT (HUE) , VIRIDIAN  or PHTHALOCYANINE GREEN, RAW SIENNA or OCHRE LIGHT  or GOLD OCHRE  RAW UMBER LENINGRAD or BURNT UMBER  or BURNT SIENNA , LAMP BLACK or SHUNGITE, LINSEED OIL FOR ARTISTIC PAINTING 120 ML BRUSHES “NEVSKAYA PALITRA” Nr.2, Nr.3 ,high lightfastness ,medium lightfastness, low lightfastness', 0, 'Nevskaya Palitra Ladoga Oil Gift Set: 12 x 18 ml Tubes, 2 Nevskaya Palitra Brushes, 120 ml Linseed Oil for Artistic', '', 0),
(125, 101, 71, 'Sennelier Oil Bar Set of 6', 'Sennelier', 2350, 2200, 45, 'AB81.jpg', 'A brand known for producing high quality materials, Brustro has come up with most exciting new addition to graffiti and street art. The new Brustro ACRYLIC Marker range offers Fine 2mm Japanese Fibre Nib Tip in 14 brilliant water-based, pigmented, matte acrylic colors that are perfect for both interior and exterior use. The optimum flow control pump valve system allows accurate handling and application. The pigment water-based ink in Brustro Acrylic Markers is lightfast, waterproof, and abrasion-proof, allowing it to be applied to almost any surface, including textile, canvas, Paper, poster, wood, metal, walls, porcelain, plastic and glass. The advanced technology in these pens helps provide colours that are truly opaque, its high grade pigments give excellent coverage even on dark surfaces. Water resistant and UV resistant so you can use it safe in the knowledge it wont fade. The inks can be refilled and the nibs can replaced. Available in Individuals & Sets.', 'A brand known for producing high quality materials, Brustro has come up with most exciting new addition to graffiti and street art. The new Brustro ACRYLIC Marker range offers Fine 2mm Japanese Fibre Nib Tip in 14 brilliant water-based, pigmented, matte acrylic colors that are perfect for both interior and exterior use. The optimum flow control pump valve system allows accurate handling and application. The pigment water-based ink in Brustro Acrylic Markers is lightfast, waterproof, and abrasion-proof, allowing it to be applied to almost any surface, including textile, canvas, Paper, poster, wood, metal, walls, porcelain, plastic and glass. The advanced technology in these pens helps provide colours that are truly opaque, its high grade pigments give excellent coverage even on dark surfaces. Water resistant and UV resistant so you can use it safe in the knowledge it won\'t fade. The inks can be refilled and the nibs can replaced. Available in Individuals & Sets.', 0, 'Sennelier Oil Bar Set of 6', NULL, 0),
(126, 101, 73, 'Brustro Arists’ Acrylic 120ml, 30 Shades (Complete Range)', 'Brustro', 5499, 5349, 56, 'AC11.jpg', '•Brustro acrylics are affordable colours that can be used to paint on all conventional art surfaces such as paper, cardboard, canvasses etc.\r\n•These soft-bodied colours can be used straight from the tube as they wet easily on to the surface or they can be thinned with water.\r\n•All the 30 colours are inter-mixable giving endless colour possibilities.\r\n•Shade contains -Titanium White, Lemon Yellow, Cad Yellow Hue, Cad Yellow Deep Hue, Cad Orange Hue, Alizarin Crimson, Cad Red Hue, Vermillion, Rose Madder, Ultramarine, Cobalt Blue, Prussian Blue, Pthalo Blue, Pthalo Green, Mid Green, Sap Green, Viridian, Violet, Silver, Gold, Burnt Sienna, Burnt Umber, Yellow Ochre, Ivory Black, Fluorescent Yellow, Fluorescent Green, Fluorescent Blue, Fluorescent Orange, Fluorescent Red, Fluorescent Pink,\r\n', 'Brustro acrylics are affordable colours that can be used to paint on all conventional art surfaces such as paper, cardboard, canvasses etc. These soft-bodied colours can be used straight from the tube as they wet easily on to the surface or they can be thinned with water. All the 30 colours are inter-mixable giving endless colour possibilities.', 0, 'Brustro Arists’ Acrylic 120ml, 30 Shades (Complete Range)', NULL, 0),
(127, 101, 73, 'BRUSTRO Artists Acrylic Colour Set of 12 Colours X 12ML Tubes', 'Brustro', 435, 285, 42, 'AC31.jpg', 'Set of 12 premium acrylic colour 12 ml tubes. Adheres to a great variety of surfaces like paper, canvas, wood and earthenware. Best price-quality ratio\r\nThese Acrylic Paints are perfect to create textured effects, brush marks and palette knife impressions.\r\nThe colours are water-based, non-toxic and dries quickly. Colours are inter-mixable, giving endless colour possibilities.', 'Brustro acrylics are affordable colours that can be used to paint on all conventional art surfaces such as paper, cardboard, canvasses etc. These soft bodied colours can be used straight from the tube as they wet easily on to the surface or they can be thinned with water. All the colours are inter-mixable giving endless colour possibilities. Contains Titanium White , Lemon Yellow , Cad. Yellow Deep Hue , Alizarin Crimson, Cad. Red Hue , Cobalt Blue, Prussian Blue, Sap Green, Viridian, Burnt Sienna, Yellow Ochre And Ivory Black', 0, 'BRUSTRO Artists Acrylic Colour Set of 12 Colours X 12ML Tubes', '', 1),
(128, 101, 73, 'Brustro Artists’ Metallic Acrylic Set of 24x12ml', 'Brustro', 999, 849, 36, 'AC41.jpg', '•Includes an assortment of vibrant and classic metallic shades with a reflective look, perfect for adding that extra shine to your pieces giving off an attractive shimmer and bringing paintings to life in the most life-catching way\r\n•Has an extremely smooth, thick, buttery texture with a high metallic pigment content; stays true to tone when dry and is highly pigmented for a truly opaque finish\r\n•Fade-resistant, fast-drying, waterproof, permanent, non-yellowing, non-toxic and suitable for artists at all levels\r\n•Designed for use on a wide range of surfaces like paper, cardboard, glass, rocks, walls, canvas, ceramic, wood, clay\r\n•Versatile paints can be used straight out of the tubes and diluted with water or can be mixed with various acrylic mediums to achieve different results.\r\n•Available shades – Pearl White, Shell Pink, Soft Berry, Coral, Fruit Punch, Magenta, Rustic Red, Amethyst Purple, Ice Blue, Teal Metallic, Electric Blue, Aqua Metallic, Pearl Lime Green, Moss Green, Metallic Chartreuse, Sage Green, Indy Yellow Pearl, Rich Gold, Antique Gold, Copper Shimmer, Bronze Shimmer, Cola Metallic, Silver Metallic& Cosmic Carbon', 'Includes an assortment of vibrant and classic metallic shades with a reflective look, perfect for adding that extra shine to your pieces giving off an attractive shimmer and bringing paintings to life in the most life-catching way. Has an extremely smooth, thick, buttery texture with a high metallic pigment content; stays true to tone when dry and is highly pigmented for a truly opaque finish.\r\nFade-resistant, fast-drying, waterproof, permanent, non-yellowing, non-toxic and suitable for artists at all levels. Designed for use on a wide range of surfaces like paper, cardboard, glass, rocks, walls, canvas, ceramic, wood, clay. Versatile paints can be used straight out of the tubes and diluted with water or can be mixed with various acrylic mediums to achieve different results.', 1, 'Brustro Artists’ Metallic Acrylic Set of 24x12ml', '', 0),
(129, 101, 73, 'Brustro Arists’ Acrylic 120ml, Pack of 2 Shades (Gold & Silver)', 'Brustro', 429, 279, 55, 'AC51.jpg', 'Brustro acrylics are affordable colours that can be used to paint on all conventional art surfaces such as paper, cardboard, canvasses etc. These soft bodied colours can be used straight from the tube as they wet easily on to the surface or they can be thinned with water. All 6 colours in the range have been formulated to give bright clean colours when used in full tone. All the colours are inter-mixable giving endless colour possibilities.', 'Brustro acrylics are affordable colours that can be used to paint on all conventional art surfaces such as paper, cardboard, canvasses etc. These soft bodied colours can be used straight from the tube as they wet easily on to the surface or they can be thinned with water. All 6 colours in the range have been formulated to give bright clean colours when used in full tone. All the colours are inter-mixable giving endless colour possibilities.', 0, 'Brustro Arists’ Acrylic 120ml, Pack of 2 Shades (Gold & Silver)', '', 1),
(130, 101, 73, 'Brustro Artists Acrylic 500ml Ivory Black', 'Brustro', 666, 516, 42, 'AC61.jpg', '•Premium acrylic colour 500 ml. Adheres to a great variety of surfaces like paper, canvas, wood and earthenware.\r\n•Best price-quality ratio. These Acrylic Paints are perfect to create textured effects, brush marks and palette knife impressions.\r\n•The colours are water-based, non-toxic and dry quickly.\r\n•Colours are inter-mixable, giving endless colour possibilities.\r\n•Conform to ASTM D4236', '•Premium acrylic colour 500 ml. Adheres to a great variety of surfaces like paper, canvas, wood and earthenware.\r\n•Best price-quality ratio. These Acrylic Paints are perfect to create textured effects, brush marks and palette knife impressions.\r\n•The colours are water-based, non-toxic and dry quickly.\r\n•Colours are inter-mixable, giving endless colour possibilities.\r\n•Conform to ASTM D4236', 0, 'Brustro Artists Acrylic 500ml Ivory Black', '', 0),
(131, 101, 73, 'Brustro Artists Acrylic 500ml Titanium White', 'Brustro', 666, 516, 75, 'AC71.jpg', '•Premium acrylic colour 500 ml. Adheres to a great variety of surfaces like paper, canvas, wood and earthenware.\r\n•Best price-quality ratio. These Acrylic Paints are perfect to create textured effects, brush marks and palette knife impressions.\r\n•The colours are water-based, non-toxic and dries quickly.\r\n•Colours are inter-mixable, giving endless colour possibilities.\r\n•Conform to ASTM D4236', '•Premium acrylic colour 500 ml. Adheres to a great variety of surfaces like paper, canvas, wood and earthenware.\r\n•Best price-quality ratio. These Acrylic Paints are perfect to create textured effects, brush marks and palette knife impressions.\r\n•The colours are water-based, non-toxic and dries quickly.\r\n•Colours are inter-mixable, giving endless colour possibilities.\r\n•Conform to ASTM D4236', 0, 'Brustro Artists Acrylic 500ml Titanium White', '', 1),
(132, 101, 73, 'Brustro Professional Artists’ Fluid Acrylic 20 ml Down to Earth Pack of 6', 'Brustro', 699, 549, 65, 'AC81.jpg', '•Highly pigmented and intermixable , Excellent light-fastness and UV resistant, High coverage and no fillers, dyes or extenders used.\r\n•Ideal for: Pouring techniques, Dry brush application, Spraying, Fine Brushwork, Staining Techniques, Water media techniques\r\n•Allows smooth flow applications while retaining the colour intensity. Compatible with all acrylic mediums and is a perfect additive to pouring mediums for liquid art\r\n•Appear dark on initial application, but can be easily spread with a brush and diluted with water to reveal colour graduation just like watercolours\r\n•It contains shades-Burnt Sienna, Burnt Umber, Yellow Oxide, Raw Sienna, Unbleached Titanium, Golden Raw Sienna', 'Brustro’s range of Skin and Earth Fluid Acrylics fall seamlessly into an artist’s chromatic region for creating abstract art with earth pigments. Having the same pigment load as Brustro Heavybody, Brustro Fluid Acrylics allow smooth flow applications while retaining the colour intensity. Despite its liquid-like paint texture, each colour is highly pigmented with excellent light-fastness. Brustro Fluid Acrylic is available in 30 different shades.', 0, 'Brustro Professional Artists’ Fluid Acrylic 20 ml Down to Earth Pack of 6', '', 0),
(133, 101, 73, 'Brustro Professional Artists’ Fluid Acrylic 20 ml High Chroma Pack of 6', 'Brustro', 1199, 1049, 56, 'AC91.jpg', '•Highly pigmented and intermixable , Excellent light-fastness and UV resistant, High coverage and no fillers, dyes or extenders used.\r\n•Ideal for: Pouring techniques, Dry brush application, Spraying, Fine Brushwork, Staining Techniques, Water media techniques\r\n•Allows smooth flow applications while retaining the colour intensity. Compatible with all acrylic mediums and is a perfect additive to pouring mediums for liquid art\r\n•Appear dark on initial application, but can be easily spread with a brush and diluted with water to reveal colour graduation just like watercolours\r\n•It contains shades – Cadmium Orange, Cadmium Yellow Medium, Cadmium Red Medium, Cobalt Blue, Dioxazine Purple, Magenta Quinh Violet', 'Brustro’s range of Cadmiums and Cobalt Fluid Acrylics doesn’t just include cadmium and cobalt but also two other exquisite colours that create the best of psychedelic abstract artwork. Having the same pigment load as Brustro Heavybody, Brustro Fluid Acrylics allow smooth flow applications while retaining the colour intensity. Despite its liquid-like paint texture, each colour is highly pigmented with excellent light-fastness.Brustro Fluid Acrylic is available in 30 different shades.', 0, 'Brustro Professional Artists’ Fluid Acrylic 20 ml High Chroma Pack of 6', '', 1),
(134, 101, 73, 'Brustro Professional Artists’ Fluid Acrylic 20 ml Beyond The Blues Pack of 6', 'Brustro', 799, 649, 64, 'AC101.jpg', '•Highly pigmented and intermixable , Excellent light-fastness and UV resistant, High coverage and no fillers, dyes or extenders used.\r\n•Ideal for: Pouring techniques, Dry brush application, Spraying, Fine Brushwork, Staining Techniques, Water media techniques\r\n•Allows smooth flow applications while retaining the colour intensity. Compatible with all acrylic mediums and is a perfect additive to pouring mediums for liquid art\r\n•Appear dark on initial application, but can be easily spread with a brush and diluted with water to reveal colour graduation just like watercolours\r\n•It contains shades – Turquoise, Ultramarine Blue, Zirconian Blue Hue, Paynes Grey, Aqua Green Light, Azure Blue', 'Brustro’s range of Sea and Sky Fluid Acrylics are excellent for creating abstract sky and seascapes. Having the same pigment load as Brustro Heavybody, Brustro Fluid Acrylics allow smooth flow applications while retaining the colour intensity. Despite its liquid-like paint texture, each colour is highly pigmented with excellent light-fastness. Brustro Fluid Acrylic is available in 30 different shades.', 0, 'Brustro Professional Artists’ Fluid Acrylic 20 ml Beyond The Blues Pack of 6', '', 1),
(135, 101, 73, 'Brustro Professional Artists’ Fluid Acrylic 20 ml Tropical Paradise Pack of 6', 'Brustro', 999, 849, 45, 'AC111.jpg', '•Highly pigmented and intermixable , Excellent light-fastness and UV resistant, High coverage and no fillers, dyes or extenders used.\r\n•Ideal for: Pouring techniques, Dry brush application, Spraying, Fine Brushwork, Staining Techniques, Water media techniques\r\n•Allows smooth flow applications while retaining the colour intensity. Compatible with all acrylic mediums and is a perfect additive to pouring mediums for liquid art\r\n•Appear dark on initial application, but can be easily spread with a brush and diluted with water to reveal colour graduation just like watercolours\r\n•It contains shades -Yellow Light Hansa, Chromium Green Oxide, Yellow Green, Brill Aliz, Naphthol Crimson, Permanent Orange', 'Brustro’s range of Flowers and Leaves Fluid Acrylics create beautiful abstract flowers and leave artwork even without having to use a brush. Having the same pigment load as Brustro Heavybody, Brustro Fluid Acrylics allow smooth flow applications while retaining the colour intensity. Despite its liquid-like paint texture, each colour is highly pigmented with excellent light-fastness.Brustro Fluid Acrylic is available in 30 different shades.', 0, 'Brustro Professional Artists’ Fluid Acrylic 20 ml Tropical Paradise Pack of 6', '', 1),
(136, 101, 74, 'MTN Spain Water Based Spray Varnish 300ML – Glossy', 'MTN', 499, 349, 75, 'AD21.jpg', 'Perfect for interior or exterior work.\r\nWaterproof once dry. \r\nDue to its anti-clog valve, the can is suitable for re-use, even over a longer period of not using the can. \r\nThe water-based can is perfect for using indoors. ', 'MTN WATER BASED, is highly recommended for Fine Arts, graffiti and many other professional jobs. Perfect for interior or exterior work. Waterproof once dry. The MTN Water based 300ml is a little smaller then the normal 400ml can, which results in super-b handling and control over the can. Due to its anti-clog valve, the can is suitable for re-use, even over a longer period of not using the can. The water-based can is perfect for using indoors, since its build-out of low odor resins, which are all water-soluble. All pigments are of the highest quality, so you can use this can also for your Fine Art needs. A little extra that makes the MTN WATER BASED 300ml special is the fact that you can remove fresh stains easily. The WATERBASED Paint which is applied within the last 20-25 minutes is gone in a wipe. Just take a damp cloth and rub it off. The colors of the MTN Water based are matching the chromatic needs and references of other Fine Art products, to optimize the compatibilty.MTN Waterbased is suitable for almost every surface, including objects build out of polystyrene: Montana Colors makes products that are supporting Graffiti so don’t worry, the MTN Water Based can also be used for your Graffiti Art Needs, the drying time and output of the paint are made for this. Due to its versatility, water based paint is especially suited for all types of decorative arts and crafts. With this spray can you will be able to paint on: Polystyrene, wood, metal, crystal, cement, etc. Available in 52 colors, including 5 fluorescents, 2 metal colors, 2 semi-transparent, and 2 varnishes. Made in Barcelona, Spain.', 0, 'MTN Spain Water Based Spray Varnish 300ML – Glossy', NULL, 1),
(137, 101, 74, 'MTN 94 Spray Paints 400ML (Fever Red)', 'MTN', 699, 549, 32, 'AD41.jpg', 'MTN 94 is the newest line of spray paint from Montana (MTN) Colors of Spain. The name of this super high quality spray paint is a tribute to the year Montana Colors was founded. The 94 offers an immense range of chromatic combinations thanks to the extensive and organized color spectrum. Each color is formulated with a highly pigmented synthetic resin to produce unique and vivid hues. A Spray that is easy to use due to its low pressure and fast drying time, these characterstics make it an extremly versatile tool for both interior & exterior applications. The valve can be fitted with all types of caps for thin lines & details, and fat caps for large, fast fills and fades.This product is outstanding proof of Montana’s ability to stay on the Cutting edge, and maintain their reputation as one of the world’s top spray paint brands. It’s Designed specifically for graffiti writers. We would especially recommend it for photographic and artistic jobs. May also be used in: DIY, Gardening, Transport, Fine arts, Graffiti, Sign painting, Plumbing, Industry. Walls, steels, canvas, burners, bombing, hyper realism, cold or hot temperature, whatever you do, wherever you are, MTN 94 is simply a 360 degrees product. Available in 155 colors.', 'MTN 94 is the newest line of spray paint from Montana (MTN) Colors of Spain. The name of this super high quality spray paint is a tribute to the year Montana Colors was founded. The 94 offers an immense range of chromatic combinations thanks to the extensive and organized color spectrum. Each color is formulated with a highly pigmented synthetic resin to produce unique and vivid hues. A Spray that is easy to use due to its low pressure and fast drying time, these characterstics make it an extremly versatile tool for both interior & exterior applications. The valve can be fitted with all types of caps for thin lines & details, and fat caps for large, fast fills and fades.This product is outstanding proof of Montana’s ability to stay on the Cutting edge, and maintain their reputation as one of the world’s top spray paint brands. It’s Designed specifically for graffiti writers. We would especially recommend it for photographic and artistic jobs. May also be used in: DIY, Gardening, Transport, Fine arts, Graffiti, Sign painting, Plumbing, Industry. Walls, steels, canvas, burners, bombing, hyper realism, cold or hot temperature, whatever you do, wherever you are, MTN 94 is simply a 360 degrees product. Available in 155 colors.', 0, 'MTN 94 Spray Paints 400ML (Fever Red)', NULL, 1),
(138, 101, 74, 'Montana MTN 94 Spain Speciality Poltergeist Spray Paints 400ml (Glow In The Dark)', NULL, 1497, 1347, 47, 'AD51.jpg', 'MTN 94 is the newest line of spray paint from Montana (MTN) Colors of Spain. The name of this super high quality spray paint is a tribute to the year Montana Colors was founded. The 94 offers an immense range of chromatic combinations thanks to the extensive and organized color spectrum. Each color is formulated with a highly pigmented synthetic resin to produce unique and vivid hues. A Spray that is easy to use due to its low pressure and fast drying time, these characterstics make it an extremly versatile tool for both interior & exterior applications. The valve can be fitted with all types of caps for thin lines & details, and fat caps for large, fast fills and fades.This product is outstanding proof of Montana’s ability to stay on the Cutting edge, and maintain their reputation as one of the world’s top spray paint brands. It’s Designed specifically for graffiti writers. We would especially recommend it for photographic and artistic jobs. MTN 94 is simply a 360 degrees product. Available in 155 colors.', 'MTN 94 is the newest line of spray paint from Montana (MTN) Colors of Spain. The name of this super high quality spray paint is a tribute to the year Montana Colors was founded. The 94 offers an immense range of chromatic combinations thanks to the extensive and organized color spectrum. Each color is formulated with a highly pigmented synthetic resin to produce unique and vivid hues. A Spray that is easy to use due to its low pressure and fast drying time, these characterstics make it an extremly versatile tool for both interior & exterior applications. The valve can be fitted with all types of caps for thin lines & details, and fat caps for large, fast fills and fades.This product is outstanding proof of Montana’s ability to stay on the Cutting edge, and maintain their reputation as one of the world’s top spray paint brands. It’s Designed specifically for graffiti writers. We would especially recommend it for photographic and artistic jobs. MTN 94 is simply a 360 degrees product. Available in 155 colors.', 0, 'Montana MTN 94 Spain Speciality Poltergeist Spray Paints 400ml (Glow In The Dark)', NULL, 1),
(139, 102, 75, 'Sennelier Acrylic Gloss Medium and Varnish 120 ml Pouch', 'Sennelier', 399, 249, 80, 'BA11.jpg', 'Sennelier acrylic acrylic mediun & gloss varnish 4 fl/oz 120ml.It can be used as a varnish and/or as a fluid shiny medium.As a medium: it improves the adhesion of the film and increases the shininess.As a varnish: it protects the work.', 'Sennelier acrylic acrylic mediun & gloss varnish 4 fl/oz 120ml.It can be used as a varnish and/or as a fluid shiny medium.As a medium: it improves the adhesion of the film and increases the shininess.As a varnish: it protects the work.', 0, 'Sennelier Acrylic Gloss Medium and Varnish 120 ml Pouch', NULL, 0),
(140, 102, 76, 'Sennelier Gloss Lacquer with UVLS 75 ml jar', 'Sennelier', 499, 349, 56, 'BB11.jpg', 'Apply with a paintbrush or brush to completely dry surfaces to create a glossy protective film that resists ultraviolet light and scratches. Use in its original form, dilute it with water, or mix with Matte Lacquer to obtain a custom satin finish. Intended for interior or exterior use, it is irreversible, non-yellowing, water-resistant and transparent.', 'Apply with a paintbrush or brush to completely dry surfaces to create a glossy protective film that resists ultraviolet light and scratches. Use in its original form, dilute it with water, or mix with Matte Lacquer to obtain a custom satin finish. Intended for interior or exterior use, it is irreversible, non-yellowing, water-resistant and transparent.', 0, 'Sennelier Gloss Lacquer with UVLS 75 ml jar', NULL, 0),
(141, 102, 76, 'Sennelier Flow’n Dry 75 ml -Alkyd Medium', 'Sennelier', 540, 390, 56, 'BB21.jpg', 'This medium strongly accelerates drying and is very useful for those who like to work quickly.Modified alkyd oil medium gives a slightly gel consistency, improves the thickness of the finish, accelerates drying, liquefies the paste when working thanks to its thixotropic qualities. Gives a gloss finish, resists yellowing, very suitable for glazing and mixes in any proportion with oil colors. Good for general use and Plein Air studies.', 'This medium strongly accelerates drying and is very useful for those who like to work quickly.Modified alkyd oil medium gives a slightly gel consistency, improves the thickness of the finish, accelerates drying, liquefies the paste when working thanks to its thixotropic qualities. Gives a gloss finish, resists yellowing, very suitable for glazing and mixes in any proportion with oil colors. Good for general use and Plein Air studies.', 0, 'Sennelier Flow’n Dry 75 ml -Alkyd Medium', NULL, 1),
(142, 102, 76, 'Brustro Professional Refined Safflower Oil 100ml (75ml + 25ml Free)', 'Brustro', 299, 149, 45, 'BB31.jpg', 'Being a clarified vegetable oil, it has low acidity. High resistance to yellowing and has excellent compatibility with pigments. When added to oil paints, it accentuates their fluidity, transparency, and gloss without altering the hue’s brilliance. However, it dries slower than linseed oil but can be safely mixed with it. Only 25% can be added to the total paint mixture.', 'Being a clarified vegetable oil, it has low acidity. High resistance to yellowing and has excellent compatibility with pigments. When added to oil paints, it accentuates their fluidity, transparency, and gloss without altering the hue’s brilliance. However, it dries slower than linseed oil but can be safely mixed with it. Only 25% can be added to the total paint mixture.', 0, 'Brustro Professional Refined Safflower Oil 100ml (75ml + 25ml Free)', NULL, 1),
(143, 102, 76, 'Brustro Professional Boiled Linseed Oil 100ml (75ml + 25ml Free)', 'Brustro', 299, 149, 23, 'BB41.jpg', '•Boiled linseed oil Liquifies oil colours and speeds up the hardening giving a gloss finish.\r\n•It encourages the paint to dry faster and gives a brilliant amber finish adding texture and roundness to it.\r\n•Excess should be avoided.\r\n', 'Brustro Linseed oil is Boiled linseed oil Liquifies oil colors and speeds up the hardening giving a gloss finish. It encourages the paint to dry faster and gives a brilliant amber finish adding texture and roundness to it. Excess should be avoided.', 0, 'Brustro Professional Boiled Linseed Oil 100ml (75ml + 25ml Free)', NULL, 1),
(144, 102, 76, 'Brustro Professional Clarified Linseed Oil 100ml (75ml + 25ml Free)', 'Brustro', 299, 149, 54, 'BB51.jpg', 'Brustro Linseed oil is Extracted from linseed, it is a purified oil with a natural amber tint. Liquifies oil paints while retaining its original apperance. Dries faster than most other oils and adds body to paint. It is best to be used with dark or slow drying colours as it has a tendency to turn yellow over time. Excess usage should be avoided.', 'Brustro Linseed oil is Extracted from linseed, it is a purified oil with a natural amber tint. Liquifies oil paints while retaining its original apperance. Dries faster than most other oils and adds body to paint. It is best to be used with dark or slow drying colours as it has a tendency to turn yellow over time. Excess usage should be avoided.', 0, 'Brustro Professional Clarified Linseed Oil 100ml (75ml + 25ml Free)', NULL, 1),
(145, 102, 77, 'Brustro Professional Art Masking Fluid 100ml (75ml + 25ml Free)', 'Brustro', 299, 149, 45, 'BC11.jpg', '•Brustro art masking fluid protects the whites of the paper while working with watercolours, inks and gouache.\r\n•To be applied with a brush. It is water-soluble when wet and waterproof on drying.\r\n•Paints are to be applied once the masking fluid dries and to be peeled after the paint dries completely by simply rubbing the gum with fingers or eraser to reveal the masked parts.', 'Brustro art masking fluid protects the whites of the paper while working with watercolors, inks, and gouache. To be applied with a brush. It is water-soluble when wet and waterproof on drying. Paints are to be applied once the masking fluid dries and to be peeled after the paint dries completely by simply rubbing the gum with fingers or eraser to reveal the masked parts.', 0, 'Brustro Professional Art Masking Fluid 100ml (75ml + 25ml Free)', '', 0),
(146, 102, 77, 'Brustro Professional Liquid Gum Arabic 100ml (75ml + 25ml Free)', 'Brustro', 299, 149, 36, 'BC21.jpg', 'Brustro Liquid Gum arabic is a pale coloured solution that slows down the drying time of watercolours allowing for increased workability. It increases its transparency, brilliance, and gloss. It also reduces the staining of pigments making it easy to lift off the washes. It acts as a binder in which the pigments are dispersed to make the watercolor paints.', 'Brustro Liquid Gum arabic is a pale coloured solution that slows down the drying time of watercolours allowing for increased workability. It increases its transparency, brilliance, and gloss. It also reduces the staining of pigments making it easy to lift off the washes. It acts as a binder in which the pigments are dispersed to make the watercolor paints.', 0, 'Brustro Professional Liquid Gum Arabic 100ml (75ml + 25ml Free)', NULL, 1),
(147, 103, NULL, 'Brustro Artists’ Canvas Cut to Size Assorted A4 (Pack of 10)', 'Brustro', 699, 549, 55, 'C11.jpg', '•Comes in an assorted pack of 10 pre-cut canvas cloths in A4 size (21×29.7 cm)\r\n•The pack contains 4 medium grain (70% cotton), 2 medium grain (35%cotton),1 extra fine grain (35% cotton) and 1 super grain (35% cotton) pre-cut canvas cloths\r\n•Contains 1 mixed linen (58% linen, 14% cotton, 28% polycotton) medium grain pre-cut canvas cloth\r\n•Contains 1 black primed (70%cotton)  medium grain pre-cut canvas cloth\r\n•Acid-free, elemental chlorine-free\r\n•Made in Italy\r\n•These canvases are also available in rolls.\r\n', 'Brustro introduces a unique product which is a pack of canvas cloth assortment of 10 A4 sizes giving the end-users an option to explore 6 variants of different Italian premium canvas. The canvas sheets are easy to tape down on board and are easy to store. Being very cost-effective, they can also be used for practice work as well as final artworks.', 0, 'Brustro Artists’ Canvas Cut to Size Assorted A4 (Pack of 10)', NULL, 1),
(148, 103, NULL, 'Brustro Artists’ Italian Canvas Roll Swatch Book', 'Brustro', 399, 249, 90, 'C21.jpg', '•This swatch book is comprised of all 8 varieties of Italian canvas cloth in the size 4?x 6?\r\n•The first page in the swatch book contains all the information regarding the grain, coatings, size and gsm of all the different canvas roll available.\r\n•The canvas is available in the form of rolls and this swatch book is a handy tool to understand and feel the texture and strength of each variety.\r\n•The swatch book can also be used to make an interesting mini booklet with artworks on canvas cloth.\r\n', 'Brustro is a registered trademark of Creative Hands Art Materials Pvt. Ltd.', 0, 'Brustro Artists’ Italian Canvas Roll Swatch Book', NULL, 1);
INSERT INTO `product` (`product_id`, `cat_id`, `subcat_id`, `pname`, `brand`, `mrp`, `price`, `stock`, `img1`, `short_desc`, `descr`, `best_seller`, `meta_title`, `meta_keyword`, `stats`) VALUES
(149, 105, 81, 'Brustro Kidney Shaped Plain Wooden Palette 40X30CM', 'Brustro', 237, 87, 16, 'EA11.jpg', ' It is ideal for oil, alkyds and acrylics Paints. This allows easy clean up with acrylic colors by means of using water or for oil colors with odorless paint solvents. Perfect buy for artists’ & amateur\'s. While designed to be simple to use, solid, reliable and long-lasting.', 'Brustro’s comprehensive range of artists’ accessories has been selected to offer discerning artists the very finest tools. Brustro has added to its accessories range a wide variety of artists’ palettes. They are suitable for use with all painting media including watercolour, oils, acrylics, tempera, poster Paints. The palettes are made of durable plastic or wood and are easy to store and to clean. All palettes are white (except the transparent & wooden) to ensure that colour mixing is more accurately judged. This traditional-shaped Kidney wooden palette is made from 4mm thick wood, durable & economical, this large palette is ideal for arranging a wide spectrum of colors for comfortable and convenient painting. Measuring a generous 40CMX30CM, the Brustro Kidney Shaped Plain Wooden Palette also features an ergonomic grip thumb hole that sits comfortably in either the right or left hand, simply flip the palette over. It is ideal for oil, alkyds and acrylics Paints. This allows easy clean up with acrylic colors by means of using water or for oil colors with odorless paint solvents. Perfect buy for artists’ & amateurs. While designed to be simple to use, solid, reliable and long-lasting.', 0, 'Brustro Kidney Shaped Plain Wooden Palette 40X30CM', NULL, 1),
(150, 105, 81, 'Brustro ARTISTS’ PORTABLE AIRTIGHT WATERCOLOUR PALETTE 23 WELLS WITH SEPARABLE LID', 'Brustro', 549, 399, 20, 'EA21.jpg', 'Brustro ARTISTS’ PORTABLE AIRTIGHT WATERCOLOUR PALETTE 23 WELLS WITH SEPARABLE LID AIRTIGHT . LEAKPROOF Ideal for watercolour Made of high-impact plastic for durability 23 divided wells with a large central mixing area Lid suffices as an additional palette', 'Brustro ARTISTS’ PORTABLE AIRTIGHT WATERCOLOUR PALETTE 23 WELLS WITH SEPARABLE LID AIRTIGHT . LEAKPROOF Ideal for watercolour Made of high-impact plastic for durability 23 divided wells with a large central mixing area Lid suffices as an additional palette', 0, 'Brustro ARTISTS’ PORTABLE AIRTIGHT WATERCOLOUR PALETTE 23 WELLS WITH SEPARABLE LID', NULL, 1),
(151, 105, 81, 'Brustro Rectangle 20 Well Plastic Palette 32.5X25CM', 'Brustro', 195, 45, 32, 'EA31.jpg', 'Brustro’s comprehensive range of artists’ accessories has been selected to offer discerning artists the very finest tools. Brustro has added to its accessories range a wide variety of artists’ palettes. They are suitable for use with all painting media including watercolour, oils, acrylics, tempera, poster Paints. The palettes are made of durable plastic or wood and are easy to store and to clean. All palettes are white (except the transparent & wooden) to ensure that colour mixing is more accurately judged. This heavy duty Rectangle Plastic Palette has 20-well tray features both large and small mixing wells (8 small round wells, 4 large round wells and 8 square wells), with rounded edges that will not harm brushes. Measuring a generous 32.5CMX25CM, the Brustro Rectangle Shaped 20 wells Palette. It is ideal for both oils, acrylics & watercolours. This allows easy clean up with acrylic & watercolours colors by means of using water or for oil colors with odorless paint solvents. Perfect buy for artists’ & amateur\'s.', 'Brustro’s comprehensive range of artists’ accessories has been selected to offer discerning artists the very finest tools. Brustro has added to its accessories range a wide variety of artists’ palettes. They are suitable for use with all painting media including watercolour, oils, acrylics, tempera, poster Paints. The palettes are made of durable plastic or wood and are easy to store and to clean. All palettes are white (except the transparent & wooden) to ensure that colour mixing is more accurately judged. This heavy duty Rectangle Plastic Palette has 20-well tray features both large and small mixing wells (8 small round wells, 4 large round wells and 8 square wells), with rounded edges that will not harm brushes. Measuring a generous 32.5CMX25CM, the Brustro Rectangle Shaped 20 wells Palette. It is ideal for both oils, acrylics & watercolours. This allows easy clean up with acrylic & watercolours colors by means of using water or for oil colors with odorless paint solvents. Perfect buy for artists’ & amateur\'s..', 0, 'Brustro Rectangle 20 Well Plastic Palette 32.5X25CM', NULL, 1),
(152, 105, 82, 'BRUSTRO Artists’ Palette Knives (Set of 5)', 'Brustro', 499, 349, 32, 'EB11.jpg', '•Great assortment of 5 palette knives for Mixing, Spreading and Scumbling,\r\n•Also excellent for thick painting techniques. Apply paints and pigments directly on the canvas.\r\n•These high-quality knives have been crafted with the finest stainless steel blade that resists all wear and corrosion from any media including acrylics.\r\n•The ergonomically designed wooden handle adds increased comfort and grip to every application.', 'The ergonomically designed handles of Brustro artists’ palette knives add increased comfort and grip to every application. Perfect for professional artists, creative hobbyists, art students and art teachers. This full range of 5 traditional knives offers the right combination of stainless steel resilience and flexible spring to facilitate any painting application like gesso, acrylic paint, modelling paste and texture gels. The bend in handles keeps the artist’s hands off the painting surface.', 0, 'BRUSTRO Artists’ Palette Knives (Set of 5)', '', 0),
(153, 105, 82, 'Brustro Plastic Palette Knives Set of 5', 'Brustro', 150, 150, 38, 'EB31.jpg', 'Brustro has selected the comprehensive range of artists’ accessories to make up a range of essential items to ensure that our customers have all they need to get started. The Simple 5 Palette Knives Set is ideal for all kinds of painting and crafting projects. Safer to use than metal knives, these one-piece molded plastic knives are economical, durable and easy to clean. Ideal to add texture and body to acrylic and oil Paints.', 'Brustro has selected the comprehensive range of artists’ accessories to make up a range of essential items to ensure that our customers have all they need to get started. The Simple 5 Palette Knives Set is ideal for all kinds of painting and crafting projects. Safer to use than metal knives, these one-piece molded plastic knives are economical, durable and easy to clean. Ideal to add texture and body to acrylic and oil Paints.', 0, 'Brustro Plastic Palette Knives Set of 5', NULL, 1),
(154, 105, 83, 'Brustro Artists’ Brush Zip Case', 'Brustro', 297, 147, 30, 'EC11.jpg', '•A good quality black synthetic fabric brush case.\r\n•Neat and compact. * Protects your brushes for storage and transportation.\r\n•Holds up to 16 brushes. * Size (closed) 14 x 37cm.\r\n•Maximum brush length 35cm. * Zip fastener.\r\n•Attached with a hand strap, convenient to carry.\r\n', 'Brustro has selected the comprehensive range of artists’ accessories to make up a range of essential items to ensure that our customers have all they need to get started. This collection of durable and convenient brush case from Brustro are sure to keep your valuable paint brushes organized, accessible and safe, whether you paint in the studio or open air. Pack all your favorite brushes in these sturdy cases whenever you take a trip; they’re great for any artist on the go. These durable cases are covered in a water-resistant synthetic fabric with an edged binding for strength, and feature a one-way zipper enclosure to keep brushes safely inside. The interior of the case has 16 slots for storing brushes of length upto 35cm. When not in use, a zip fastener keeps the wallet closed.', 0, 'Brustro Artists’ Brush Zip Case', NULL, 1),
(155, 105, 83, 'Cretacolor Roll-Up Case, 48 Slots for Artist Pencils and accessoires', 'Cretacolor', 699, 549, 20, 'EC21.jpg', 'CRETACOLOR has a wide assortment of products and supplies to work with a great variety of different techniques and to achieve creative diversity. All products contain extensive know-how and are especially known for its intense colors, a rich and soft upstroke as well as excellent lightfastness ratings. Through that, CRETACOLOR not only manages to stay ahead of competition but serves artists all over the world as a source of inspiration.', 'CRETACOLOR has a wide assortment of products and supplies to work with a great variety of different techniques and to achieve creative diversity. All products contain extensive know-how and are especially known for its intense colors, a rich and soft upstroke as well as excellent lightfastness ratings. Through that, CRETACOLOR not only manages to stay ahead of competition but serves artists all over the world as a source of inspiration.', 0, 'Cretacolor Roll-Up Case, 48 Slots for Artist Pencils and accessoires', '', 1),
(156, 105, 83, 'Copic Wallet for 72 markers', 'Copic', 2520, 2370, 15, 'EC31.jpg', 'Keep your Copic markers and pens organized and ready to use with our custom made stands, cases, and wallets. Choose from clear plastic cases, portable velcro wallets, studio stands, and more.', 'Keep your Copic markers and pens organized and ready to use with our custom made stands, cases, and wallets. Choose from clear plastic cases, portable velcro wallets, studio stands, and more.', 0, 'Copic Wallet for 72 markers', NULL, 1),
(157, 105, 83, 'Brustro Pencil Wrap (48 Slots) Canvas Roll Up Carry Case', 'Brustro', 399, 249, 40, 'EC41.jpg', '•Brustro Pencil wrap (48 Slots) Canvas Roll Up Carry Case for School, Office, Travel, Pencil Roll Organizer for Artists (Pencils not Included)\r\n•Durable, washable canvas pencil wrap, perfect storage holder case for Writing, Drawing, Painting and Sketching pencils. A great gift to friends or students.\r\n•Roll-up and Multi-purpose, won’t take much space when put into a bag, or just buckle it into a circle belt. It organizes your sharpener, erasers and pencils in the same case.\r\n•The edge of the leather part is well protected your pencil nib from damage and secured with faux leather ties make them easy to carry\r\n•High-quality canvas protects your pencils from damage and makes them easy to carry, also keeps things neatly organized and accessible. It is better than your ordinary box cases, when open you can lay it flat to have a full view of all your pencils, making your selection much easier.', 'Incepted in the year 2009, Creative Hands Art materials Pvt takes pride in providing the finest art materials to it’s patrons.Presently, it is the leading importer of Fine Art materials in the country offering the community an unrivalled choice, reeking of exquisite quality. Largely importing from USA, UK, Italy, Germany, France, Austria and other parts of the world too, it has a strong, customer focused approach which continuously endeavors to quench the quest of art enthusiasts. Directed towards supplying materials worth being lauded, it has become a leading name in the line of business.', 0, 'Brustro Pencil Wrap (48 Slots) Canvas Roll Up Carry Case', '', 1),
(158, 105, 84, 'Cretacolor Kneadable Eraser Big (Pack of 4)', 'Cretacolor', 252, 102, 80, 'ED11.jpg', '•The extra soft kneaded eraser is essential for lightening or correcting chalk, charcoal or graphite work.\r\n•By vigorous swabbing and wiping it takes the dust in its mass and thus saves the drawing paper.\r\n•Contaminated parts can be easily plucked out.\r\n•For detail work can be of any form of plasticine.\r\n•Size : Big- Pack of 4 erasers.', 'Cretacolor is a leading dry media manufacturer based in Austria where all its products have been manufactured for decades. Cretacolor?s products are internationally recognised as being of very high quality. The kneaded eraser, also known as putty rubber, is a tool for artists.This extra-soft Kneadable Eraser is an indispensable tool when working with Pastel, Charcoal or Graphite products. It absorbs the chalk dust by blotting and wiping the surface, without damaging the drawing paper. Simply remove rubbings from the eraser when necessary. The Kneadable Eraser can be shaped easily into any form for precision work. These erasers are especially suitable for lightening, correcting and cleaning of drawings but can also be used for adding highlights. The Cretacolor Kneadable Eraser comes in two sizes: Big & Small.', 0, 'Cretacolor Kneadable Eraser Big (Pack of 4)', '', 1),
(159, 105, 84, 'Brustro Slim Battery Operated Automatic Eraser, with 22 Refills and 2 Eraser Holders', 'Brustro', 399, 249, 150, 'ED21.jpg', '•1 slim battery operated electric eraser with a sleek design. Comes with 10 pieces of 2.3mm eraser refills and 12 pieces of 5mm eraser refills. This pack includes 2 eraser holders to hold both 2.3mm and one metal clamp to hold 5mm erasers. The 2.3mm eraser can be used to create tiny parts like hair, small patterns and shapes\r\n•The 5mm eraser can be used to create thicker highlights; selective highlights can be created in existing drawings . The tips allow quick and easy correction of small areas of work without disturbing other parts of the pencil or charcoal drawings\r\n•The tips allow quick and easy correction of small areas of work without disturbing other parts of the pencil or charcoal drawings , Erases with pin-point precision with a powerful motor. The ergonomic circular shape of the handle gives comfort as well as a well-balanced steady control as you refine and correct your work. An ideal tool for artists, professionals Note: Requires 2 AAA batteries. ( Batteries not included ).', '•1 slim battery operated electric eraser with a sleek design. Comes with 10 pieces of 2.3mm eraser refills and 12 pieces of 5mm eraser refills. This pack includes 2 eraser holders to hold both 2.3mm and one metal clamp to hold 5mm erasers. The 2.3mm eraser can be used to create tiny parts like hair, small patterns and shapes. •The 5mm eraser can be used to create thicker highlights; selective highlights can be created in existing drawings •The tips allow quick and easy correction of small areas of work without disturbing other parts of the pencil or charcoal drawings •Erases with pin-point precision with a powerful motor •The ergonomic circular shape of the handle gives comfort as well as a well-balanced steady control as you refine and correct your work •An ideal tool for artists, professionals Note: Requires 2 AAA batteries. Batteries not included.', 0, 'Brustro Slim Battery Operated Automatic Eraser, with 22 Refills and 2 Eraser Holders', '', 1),
(160, 105, 84, 'BRUSTRO kneadable art eraser pack of 6', 'Brustro', 216, 66, 54, 'ED31.jpg', '•Brustro extra soft kneadable art erasers are also known as putty rubber and is an indispensable tool for artists while working with pastels, charcoals or graphite powders.\r\n•It absorbs chalk by blotting and wiping the surface without damaging the drawing paper.\r\n•The kneadable eraser can be shaped easily into any form for precision work.\r\n•Specially suitable for lightening, correction of drawings as well as adding highlights.', 'Incepted in the year 2009, Creative Hands Art materials Pvt Ltd. takes pride in providing the finest art materials to it?s patrons.Presently, it is the leading importer of Fine Art materials in the country offering the community an unrivalled choice, reeking of exquisite quality. Largely importing from USA, UK, Italy, Germany, France, Austria and other parts of the world too, it has a strong, customer focused approach which continuously endeavors to quench the quest of art enthusiasts. Directed towards supplying materials worth being lauded, it has become a leading name in the line of business.', 0, 'BRUSTRO kneadable art eraser pack of 6', '', 1),
(161, 105, 84, 'BRUSTRO ECO PVC dust free eraser pack of 10 (Each pack contains 2 erasers)', 'Brustro', 240, 90, 45, 'ED41.jpg', '•Eco PVC eraser, free from harmful phthalates. For clean and smooth dust free erasing.\r\n•Safe for children. While erasing, the dust rolls together.\r\n•Erases graphite gently without damaging paper.\r\n•Ideal for students, artists, designers, engineers and artists. Total – 20 erasers.', 'Incepted in the year 2009, Creative Hands Art materials Pvt Ltd. takes pride in providing the finest art materials to it?s patrons.Presently, it is the leading importer of Fine Art materials in the country offering the community an unrivaled choice, reeking of exquisite quality. Largely importing from USA, UK, Italy, Germany, France, Austria and other parts of the world too, it has a strong, customer focused approach which continuously endeavors to quench the quest of art enthusiasts. Directed towards supplying materials worth being lauded, it has become a leading name in the line of business.', 0, 'BRUSTRO ECO PVC dust free eraser pack of 10 (Each pack contains 2 erasers)', '', 1),
(162, 105, 85, 'MT Washi Japanese Masking Tape Gift Box, 15 mm x 5 mtrs Shade – PASTEL2, (Pack of 5)', NULL, 999, 849, 50, 'EE11.jpg', '•5 rolls contained in a pack (packaged in a box); length 10m, width 15mm\r\n•Can be reused since they are removable and repositionable\r\n•Light-weight and fashionable; very convenient to use, water-proof, kid-friendly (easy to tear by hand)\r\n•Ideal tool for art and craft, the patterns and designs are bound to leave any crafter spellbound\r\n•Perfect for scrapbooking, journaling, party decor, gift wrapping, papercraft, card making, etc.\r\n', 'From the pioneers of masking tape, MT Masking Tape Japan are decorative washi tapes that are made out of highly renewable resources that can be reused since they are reusable and repositionable. With these washi tapes, you can turn everything mundane to creative, be imaginative, have fun and add a splash of colour to your life! The array of colours and patterns will inspire new ideas and help you create your own element and style on your phone, laptops, notebook, projects, scrapbook, planner, calendar, pictures, etc. An ideal tool for art and craft, the patterns and designs are bound to leave any crafter spellbound. No need to wield scissors, these washi tapes are easy to tear by hand which make them kid-friendly as well. You can use assorted washi tapes to craft greeting cards or make adorable gift wraps.', 0, 'MT Washi Japanese Masking Tape Gift Box, 15 mm x 5 mtrs Shade – PASTEL2, (Pack of 5)', NULL, 0),
(163, 105, 85, 'MT Washi Japanese Masking Tape Gift Box, 15 mm x 5 mtrs Shade – POP2, (Pack of 5)', NULL, 999, 849, 65, 'EE21.jpg', '•5 rolls contained in a pack (packaged in a box); length 10m, width 15mm\r\n•Can be reused since they are removable and repositionable\r\n•Light-weight and fashionable; very convenient to use, water-proof, kid-friendly (easy to tear by hand)\r\n•Ideal tool for art and craft, the patterns and designs are bound to leave any crafter spellbound\r\n•Perfect for scrapbooking, journaling, party decor, gift wrapping, papercraft, card making, etc.\r\n', 'From the pioneers of masking tape, MT Masking Tape Japan are decorative washi tapes that are made out of highly renewable resources that can be reused since they are reusable and repositionable. With these washi tapes, you can turn everything mundane to creative, be imaginative, have fun and add a splash of colour to your life! The array of colours and patterns will inspire new ideas and help you create your own element and style on your phone, laptops, notebook, projects, scrapbook, planner, calendar, pictures, etc. An ideal tool for art and craft, the patterns and designs are bound to leave any crafter spellbound. No need to wield scissors, these washi tapes are easy to tear by hand which make them kid-friendly as well. You can use assorted washi tapes to craft greeting cards or make adorable gift wraps.', 0, 'MT Washi Japanese Masking Tape Gift Box, 15 mm x 5 mtrs Shade – POP2, (Pack of 5)', NULL, 1),
(164, 105, 85, 'MT Washi Japanese Masking Tape, 15 mm x 5 mtrs Shade – WAMON (Series 5), Pack of 6', '', 1299, 1149, 45, 'EE31.jpg', '•6 rolls contained in a pack (packaged in a box); length 10m, width 15mm\r\n•Can be reused since they are removable and repositionable\r\n•Light-weight and fashionable; very convenient to use, water-proof, kid-friendly (easy to tear by hand)\r\n•Ideal tool for art and craft, the patterns and designs are bound to leave any crafter spellbound\r\n•Perfect for scrapbooking, journaling, party decor, giftwrapping, papercraft, card making, etc.', 'From the pioneers of masking tape, MT Masking Tape Japan are decorative washi tapes that are made out of highly renewable resources that can be reused since they are reusable and repositionable. With these washi tapes, you can turn everything mundane to creative, be imaginative, have fun and add a splash of colour to your life! The array of colours and patterns will inspire new ideas and help you create your own element and style on your phone, laptops, notebook, projects, scrapbook, planner, calendar, pictures, etc. An ideal tool for art and craft, the patterns and designs are bound to leave any crafter spellbound. No need to wield scissors, these washi tapes are easy to tear by hand which make them kid-friendly as well. You can use assorted washi tapes to craft greeting cards or make adorable gift wraps.', 0, 'MT Washi Japanese Masking Tape, 15 mm x 5 mtrs Shade – WAMON (Series 5), Pack of 6', '', 1),
(165, 105, 85, 'MT Washi Japanese Masking Tape, 7 mm x 10 mtrs Shade – Light & Dark, ( Pack Of 20 )', '', 1899, 1749, 60, 'EE41.jpg', '•20 rolls contained in a pack (packaged in a box); length 10m, width 7mm\r\n•Can be reused since they are removable and repositionable\r\n•Light-weight and fashionable; very convenient to use, water-proof, kid-friendly (easy to tear by hand)\r\n•Ideal tool for art and craft, the patterns and designs are bound to leave any crafter spellbound\r\n•Perfect for scrapbooking, journaling, party decor, gift wrapping, papercraft, card making, etc.', 'From the pioneers of masking tape, MT Masking Tape Japan are decorative washi tapes that are made out of highly renewable resources that can be reused since they are reusable and repositionable. With these washi tapes, you can turn everything mundane to creative, be imaginative, have fun and add a splash of colour to your life! The array of colours and patterns will inspire new ideas and help you create your own element and style on your phone, laptops, notebook, projects, scrapbook, planner, calendar, pictures, etc. An ideal tool for art and craft, the patterns and designs are bound to leave any crafter spellbound. No need to wield scissors, these washi tapes are easy to tear by hand which make them kid-friendly as well. You can use assorted washi tapes to craft greeting cards or make adorable gift wraps.', 0, 'MT Washi Japanese Masking Tape, 7 mm x 10 mtrs Shade – Light & Dark, ( Pack Of 20 )', '', 1),
(166, 105, 85, 'MT Washi-Japanese-Masking Tape Gift Box , 15 mm x 10 mtrs Shade – Monotone 2, ( Pack Of 5 )', NULL, 999, 849, 40, 'EE51.jpg', '•5 rolls contained in a pack (packaged in a box); length 10m, width 15mm\r\n•Can be reused since they are removable and repositionable\r\n•Light-weight and fashionable; very convenient to use, water-proof, kid-friendly (easy to tear by hand)\r\n•Ideal tool for art and craft, the patterns and designs are bound to leave any crafter spellbound\r\n•Perfect for scrapbooking, journaling, party decor, gift wrapping, papercraft, card making, etc.\r\n', 'From the pioneers of masking tape, MT Masking Tape Japan are decorative washi tapes that are made out of highly renewable resources that can be reused since they are reusable and repositionable. With these washi tapes, you can turn everything mundane to creative, be imaginative, have fun and add a splash of colour to your life! The array of colours and patterns will inspire new ideas and help you create your own element and style on your phone, laptops, notebook, projects, scrapbook, planner, calendar, pictures, etc. An ideal tool for art and craft, the patterns and designs are bound to leave any crafter spellbound. No need to wield scissors, these washi tapes are easy to tear by hand which make them kid-friendly as well. You can use assorted washi tapes to craft greeting cards or make adorable gift wraps.', 0, 'MT Washi-Japanese-Masking Tape Gift Box , 15 mm x 10 mtrs Shade – Monotone 2, ( Pack Of 5 )', NULL, 1),
(167, 106, NULL, 'Daler Rowney Lyre Floor Stand Easel', 'Daler Rowney', 3699, 3549, 58, 'F11.jpg', '•High side-poles and adjustable bottom canvas holder.\r\n•Maximum canvas height: 1250mm (49?).\r\n•Weight: 7kg (15.5lb)\r\n', 'Daler-Rowney’s aim is to offer artists of all abilities the complete painting experience.Whilst the large and sturdy Studio easels are great for indoor painting in a spacious area, the light and nimble Field easels are perfect for outdoor painting on the go. Alternatively, our range of Table easels offers a practical, smaller-scale solution; some even incorporate a storage option.', 0, 'Daler Rowney Lyre Floor Stand Easel', NULL, 1),
(168, 106, NULL, 'Brustro Artists’ H-Frame Studio Wooden Easel', 'Brustro', 6999, 6849, 56, 'F21.jpg', 'This heavy-duty studio easel is constructed of beechwood with oil linen finish for good looks and durability. H-frame design provides very rigid support for canvases up to 125 cm high. Features a ratcheted center column for height extension, lower storage tray adjustment, and adjustable upper and lower canvas supports with a solid platform base. Folds flat for storage. Brustro is a registered trademark of Creative Hands Art Materials Pvt. Ltd.', 'This heavy-duty studio easel is constructed of beechwood with oil linen finish for good looks and durability. H-frame design provides very rigid support for canvases up to 125 cm high. Features a ratcheted center column for height extension, lower storage tray adjustment, and adjustable upper and lower canvas supports with a solid platform base. Folds flat for storage. Brustro is a registered trademark of Creative Hands Art Materials Pvt. Ltd.', 0, 'Brustro Artists’ H-Frame Studio Wooden Easel', NULL, 1),
(169, 106, NULL, 'Brustro Aluminum Tabletop Easel Tri-Pod Design', 'Brustro', 449, 299, 45, 'F31.jpg', '•Made of high-quality lightweight aluminium metal.\r\n•Folds to 21? for storage and transport.\r\n•Tri-Pod back leg allows for display angle adjustment and controls slippage\r\n•Works excellent as a display easel for trade shows and business signs\r\n•Works excellent as a display easel. It Holds Canvas to 27?, Total Length: 18?, Weight : 0.25 kg.\r\n', 'Incepted in the year 2009, Creative Hands Art materials Pvt Ltd takes pride in providing the finest art materials to it’s patrons. Brustro is the registered brand of Creative Hands.', 0, 'Brustro Aluminum Tabletop Easel Tri-Pod Design', NULL, 1),
(170, 106, NULL, 'Brustro Portable & Folding Art Easel Tripod Stand with Adjustable Height in a Nylon Carry Case', 'Brustro', 1250, 1100, 25, 'F41.jpg', '•Portable Tripod Stand for Painting Canvases and Board. Adjustable Height from 590mm To 1550mm. Easy to Set Up on Flat or Uneven Outdoor Surfaces.\r\n•3 Telescopic Legs, with Three-Sections in Each Leg and Leg Locks, Can Be Extended or Reduced for Adjusting the Width and Height of the Tripod\r\n•Telescopic Metal Head Extender Controls the Height of the Top Canvas Holder. Spring Loaded Upper Clamp Secures the Canvas. Rubber Caps on Legs for Uneven or Flat Ground. Easily Folds Away.\r\n•Lightweight Body Which is Easy to Carry and Set Up. Aluminum Body and Tough Plastic. Perfect for Outdoor Painting for Landscapes, Gardens Etc\r\n•Capacity: 4kg. Weight: 1.28kg. Can Hold Canvases of Max Height of 735mm. Package Contain Art Easel Tripod Stand in Nylon Waterproof Case with Shoulder Strap.\r\n', 'Whether you are a Fine Art student, an Amateur or a Professional Painter, this Art Easel Tripod Stand will make all the difference to your sketch or painting. While it gives correct posture to the painter, it will hold the painting in place. It is lightweight, strong, easy to carry and easy to set up. It takes little space in the luggage and can be packed in its own waterproof nylon carry case with shoulder strap.\r\nIt has three telescopic legs with leg locks, and three sections in each leg, making it convenient to extend or reduce the height of the tripod or adjust the width of the tripod’s stance. It has a telescopic ratcheted metal head extender with a fold-away hand crank that allows controlling the height of the top canvas holder. Spring loaded upper clamp secures your canvas or boards. Rubber caps on the legs adjust to make the tripod stand firm in uneven outdoor conditions.\r\nMade of lightweight and strong anodized aluminium with tough plastic, it is perfect for outdoor painting i.e. gardens, landscapes, etc. Weighing just 1.28 kg., it is capable of holding canvases of 4 kg and a maximum height of 735mm. The tripod can be extended from 590mm up to 1550mm.\r\n', 0, 'Brustro Portable & Folding Art Easel Tripod Stand with Adjustable Height in a Nylon Carry Case', NULL, 1),
(171, 106, NULL, 'Brustro Tabletop Drawing Painting Easel A3', 'Brustro', 1499, 1349, 30, 'F51.jpg', 'The Fully Adjustable Surface For Drawing And Designing! The Brustro Adjustable Drawing This drawing and designing workspace is made entirely of maple-colored beechwood and then beautifully finished with a clear lacquer protection. The workspace is attached to a wooden base, which allows you to easily adjust the board. The bottom edge of the Brustro Adjustable Drawing Board features a sturdy ledge that can hold art tools, small works of art, sketchbooks, paper, panels or thin canvas.', 'The Fully Adjustable Surface For Drawing And Designing! The Brustro Adjustable Drawing This drawing and designing workspace is made entirely of maple-colored beechwood and then beautifully finished with a clear lacquer protection. The workspace is attached to a wooden base, which allows you to easily adjust the board. The bottom edge of the Brustro Adjustable Drawing Board features a sturdy ledge that can hold art tools, small works of art, sketchbooks, paper, panels or thin canvas.', 0, 'Brustro Tabletop Drawing Painting Easel A3', NULL, 1),
(172, 106, NULL, 'Brustro Artists’ Portable Tabletop Wood Sketchbox Easel With Wooden Drawer ', 'Brustro', 4299, 4149, 15, 'F61.jpg', 'It comes fully assembled and folds down into a box shape so it is easily transportable.\r\nThe innovative design includes an adjustable canvas height, so you can work at your preferred level, and features a side tray, perfect for storing your materials.\r\nTo make it easy to transport, it features a comfortable carrying handle, and Dimensions 42 X 36 X 12cm.”\r\n', 'It comes fully assembled and folds down into a box shape so it is easily transportable.\r\nThe innovative design includes an adjustable canvas height, so you can work at your preferred level, and features a side tray, perfect for storing your materials.\r\nTo make it easy to transport, it features a comfortable carrying handle, and Dimensions 42 X 36 X 12cm.”\r\n', 0, 'Brustro Artists’ Portable Tabletop Wood Sketchbox Easel With Wooden Drawer ', NULL, 1),
(173, 106, NULL, 'Brustro Artists’ Tabletop A-Frame Wooden Easel 12inch', 'Brustro', 299, 149, 65, 'F71.jpg', 'Brustro has selected the comprehensive range of artists’ easels to make up a range of essential items to ensure that our customers have all they need to get started. Choosing an easel is an important decision for any artist. The choice will vary according to the artist’s style, preferred media and quite often availability of space. Wooden easels are a good option for the artist that wants a durable easels. Our range of fine quality wooden artist easels ensures that we meet the specific needs and requirements of any artist, while providing firm support and long lasting service. Brustro Artists’ Tabletop A-Frame Wooden Easel 12?” is made from pinewood, has a bottom canvas support and folding leg to make storage easier. Ideal for creating small-scale paintings or for displaying finished artwork especially it is great for artists and students who enjoy drawing and painting outdoors and in the studio, our Tabletop Easel offers an unbeatable combination of economy and quality. It is special designed for easy traveling light weight, it is easy to use and carry. It holds Canvases upto 10inch in height. while the easel itself can fold to a convenient 30X19X2 cm size for easy transport.', 'Brustro has selected the comprehensive range of artists’ easels to make up a range of essential items to ensure that our customers have all they need to get started. Choosing an easel is an important decision for any artist. The choice will vary according to the artist’s style, preferred media and quite often availability of space. Wooden easels are a good option for the artist that wants a durable easels. Our range of fine quality wooden artist easels ensures that we meet the specific needs and requirements of any artist, while providing firm support and long lasting service. Brustro Artists’ Tabletop A-Frame Wooden Easel 12?” is made from pinewood, has a bottom canvas support and folding leg to make storage easier. Ideal for creating small-scale paintings or for displaying finished artwork especially it is great for artists and students who enjoy drawing and painting outdoors and in the studio, our Tabletop Easel offers an unbeatable combination of economy and quality. It is special designed for easy traveling light weight, it is easy to use and carry. It holds Canvases upto 10inch in height. while the easel itself can fold to a convenient 30X19X2 cm size for easy transport.', 0, 'Brustro Artists’ Tabletop A-Frame Wooden Easel 12inch', NULL, 1),
(174, 107, 86, 'Cretacolor Black & White Box 25 Piece Set', 'Cretacolor', 1735, 1585, 90, 'GA11.jpg', '•Cretacolor’s Black & White Drawing Set features high-quality drawing tools for creating images with tonal range possibilities.\r\n•This set includes 25 pieces for all sketching needs, including Nero and charcoal sketching materials, as well as white chalk pencils and sticks that come in handy for creating values and shading.\r\n•These fine art quality pencils are made in Vienna, Austria and are eco friendly with no rainforest woods or toxins.', 'For more than 200 years, Cretacolor has dedicated itself to creating the finest artist’s charcoal and drawing tools. These fine art quality pencils are made in Vienna, Austria and are eco friendly with no rainforest woods or toxins. includes White Chalk Pencils (soft, medium, oily soft), Nero Pencils (extra soft, medium), Charcoal Pencils (extra soft, medium, hard), Black ChalkPencils, artists’ leads, artists’ sticks in black & white, artists’ chalk, sketching chalk, sharpener and a kneadable eraser.', 0, 'Cretacolor Black & White Box 25 Piece Set', '', 1),
(175, 107, 86, 'Brustro Woodless Charcoal Pencils Set of 6', 'Brustro', 399, 249, 120, 'GA21.jpg', '•Made of compressed charcoal Set of 6 Pre-sharpened Woodless Charcoal Pencils which included 3 soft, 2 medium and 1 hard.\r\n•Smooth blending with rich and dark pigmentation Ideal for sketching, shading, detailing, layering and attaining tonal values. Perfect substitute for compressed charcoal sticksKey Product Features\r\n•Lacquered coating on each pencil for clean handling and comfortable grip Both broad and fine strokes can be attained by placing the pencils at different angles. Can be easily sharpened with a regular sharpener, blade or a sandpaper block.', 'Brustro Woodless Charcoal Pencil – Made of compressed charcoal • Set of 6 Pre-sharpened Woodless Charcoal Pencils which included 3 soft, 2 medium and 1 hard. • Smooth blending with rich and dark pigmentation • Ideal for sketching, shading, detailing, layering and attaining tonal values. • Perfect substitute for compressed charcoal sticks • Lacquered coating on each pencil for clean handling and comfortable grip • Both broad and fine strokes can be attained by placing the pencils at different angles. • Can be easily sharpened with a regular sharpener, blade or a sandpaper block. Fragile- Handle with care', 0, 'Brustro Woodless Charcoal Pencils Set of 6', '', 1),
(176, 107, 86, 'Cretacolor 12 Mega Color Pencils', 'Cretacolor', 1199, 1049, 80, 'GA31.jpg', 'MegaColor pencil can produce bold strokes for intense large-scale application or refined lines for detail work. The secret behind Creatacolor MegaColor Pencils is a highly pigmented 6.4mm-diameter lead core. The core of the lead is glued within the pencil casing to prevent lead breakage. You can easily blend or layer the rich opaque MegaColor Pencils which are creamy and have a slightly waxy finish. Each pencil has a hexagonal pencil body for a better grip. Colored pencil tips conveniently indicate the true color of each pencil.', 'MegaColor pencil can produce bold strokes for intense large-scale application or refined lines for detail work. The secret behind Creatacolor MegaColor Pencils is a highly pigmented 6.4mm-diameter lead core. The core of the lead is glued within the pencil casing to prevent lead breakage. You can easily blend or layer the rich opaque MegaColor Pencils which are creamy and have a slightly waxy finish. Each pencil has a hexagonal pencil body for a better grip. Colored pencil tips conveniently indicate the true color of each pencil.', 0, 'Cretacolor 12 Mega Color Pencils', '', 1),
(177, 107, 86, 'BRUSTRO ARTISTS’ FINEART GRAPHITE PENCIL SET OF 12 (10B-2H)', 'Brustro', 339, 189, 110, 'GA41.jpg', '•Package contains 12 pre-sharpened graphite pencils of different degrees.10B, 8B, 7B, 6B, 5B, 4B, 3B, 2B, B, HB, H, 2H.\r\n•Made of lightweight wood and superior leads of finely ground graphite and clay which are break-resistant. · Hexagonal design gives a comfortable grip.\r\n•Gentle on the paper surface, avoid scratching and easily erasable.\r\n•Ideal for professionals and learners alike. Can be used for photorealistic drawings, creative illustrations and all kinds of sketches.', 'Incepted in the year 2009, Creative Hands Art materials Pvt Ltd. takes pride in providing the finest art materials to its patrons. Presently, it is the leading importer of Fine Art materials in the country offering the community an unrivalled choice, reeking of exquisite quality. Largely importing from USA, UK, Italy, Germany, France, Austria and other parts of the world too, it has a strong, customer-focused approach which continuously endeavours to quench the quest of art enthusiasts. Directed towards supplying materials worth being lauded, it has become a leading name in the line of business.', 0, 'BRUSTRO ARTISTS’ FINEART GRAPHITE PENCIL SET OF 12 (10B-2H)', '', 1),
(178, 107, 87, 'Cretacolor Art Sticks (Sketching Coal)', 'Cretacolor', 527, 377, 75, 'GB11.jpg', 'Cretacolor is a leading dry media manufacturer based in Austria where all its products have been manufactured for decades. Cretacolor products are internationally recognized as being of very high quality. Cretacolors Artists Sticks allow artists to quickly cover large areas while sketching. These extra-wide artists sticks guarantee a top-quality, intensely rich stroke thanks to their high degree of pigmentation. They are also more difficult to break than graphite sticks. They are ideal not only for sketching and drawing but also for experimenting with new techniques and for large-format work. The artist sticks come in packs of 6 and are available in 3 different artist-favorite shades, with several different hardness variations. You can also choose between graphite and oil in certain colors, so with this wide variety, grab your sticks, sketchbooks or paper and start drawing with these professional-grade artist drawing sticks.’', 'Cretacolor is a leading dry media manufacturer based in Austria where all its products have been manufactured for decades. Cretacolor products are internationally recognized as being of very high quality. Cretacolors Artists Sticks allow artists to quickly cover large areas while sketching. These extra-wide artists sticks guarantee a top-quality, intensely rich stroke thanks to their high degree of pigmentation. They are also more difficult to break than graphite sticks. They are ideal not only for sketching and drawing but also for experimenting with new techniques and for large-format work. The artist sticks come in packs of 6 and are available in 3 different artist-favorite shades, with several different hardness variations. You can also choose between graphite and oil in certain colors, so with this wide variety, grab your sticks, sketchbooks or paper and start drawing with these professional-grade artist drawing sticks.’', 0, 'Cretacolor Art Sticks (Sketching Coal)', NULL, 1),
(179, 107, 87, 'Cretacolor Art Sticks 7 X 14MM – Sanguine Dry', 'Cretacolor', 613, 463, 86, 'GB21.jpg', '•A better value than traditional sketching pencils.\r\n•Sketching and Drawing with professional grade graphite blocks.\r\n•Shading and thick strokes are more easily obtained with these .\r\n•5? wide artist sticks helps in adding small detail.\r\n•7 x 14 mm-Available in pack of 6.\r\n', '•A better value than traditional sketching pencils.\r\n•Sketching and Drawing with professional grade graphite blocks.\r\n•Shading and thick strokes are more easily obtained with these .\r\n•5? wide artist sticks helps in adding small detail.\r\n•7 x 14 mm-Available in pack of 6.', 1, 'Cretacolor Art Sticks 7 X 14MM – Sanguine Dry', NULL, 1),
(180, 107, 87, 'Cretacolor Art Sticks 7 X 14MM – Sepia Light Dry', 'Cretacolor', 613, 463, 90, 'GB31.jpg', '•A better value than traditional sketching pencils.\r\n•Sketching and Drawing with professional grade graphite blocks.\r\n•Shading and thick strokes are more easily obtained with these .\r\n•5? wide artist sticks helps in adding small detail.\r\n•7 x 14 mm-Available in pack of 6.\r\n', '•A better value than traditional sketching pencils.\r\n•Sketching and Drawing with professional grade graphite blocks.\r\n•Shading and thick strokes are more easily obtained with these .\r\n•5? wide artist sticks helps in adding small detail.\r\n•7 x 14 mm-Available in pack of 6.\r\n', 0, 'Cretacolor Art Sticks 7 X 14MM – Sepia Light Dry', NULL, 1),
(181, 107, 87, 'Cretacolor Art Sticks 7 X 14MM – White Chalk Dry', 'Cretacolor', 613, 463, 57, 'GB41.jpg', '•A better value than traditional sketching pencils.\r\n•Sketching and Drawing with professional grade graphite blocks.\r\n•Shading and thick strokes are more easily obtained with these .\r\n•5? wide artist sticks helps in adding small detail.\r\n•7 x 14 mm-Available in pack of 6.\r\n', '•A better value than traditional sketching pencils.\r\n•Sketching and Drawing with professional grade graphite blocks.\r\n•Shading and thick strokes are more easily obtained with these .\r\n•5? wide artist sticks helps in adding small detail.\r\n•7 x 14 mm-Available in pack of 6.\r\n', 1, 'Cretacolor Art Sticks 7 X 14MM – White Chalk Dry', NULL, 1),
(182, 107, 87, 'Brustro Artists’ Compressed Charcoal Powder 100 ml', 'Brustro', 299, 149, 80, 'GB51.jpg', '•Artists’ Quality COMPRESSED CHARCOAL POWDER Ideal for large drawings and brush applications\r\n•High pigmentation, Deepest, Richest black tones, Smooth blending, glides easily and smudges perfectly Small and uniform particles\r\n•Great for layering, shading and attaining tonal values. Can be applied with brush, finger, paper stump, etc Can be lifted easily using a kneadable eraser.\r\n•A dust mask is recommended while using the product', 'BRUSTRO Artists’ Quality COMPRESSED CHARCOAL POWDER Ideal for large drawings and brush applications. High Pigmentation Deepest, Richest black tones. Smooth blending, glides easily and smudges perfectly Small and uniform particles Great for layering, shading and attaining tonal values Can be applied with a brush, finger. Can be lifted easily using a kneadable eraser. A dust mask is recommended while using the product.', 0, 'Brustro Artists’ Compressed Charcoal Powder 100 ml', '', 1),
(183, 107, 87, 'Brustro Woodless Charcoal Pencil Set of 6 (3 Soft, 2 Medium, 1 Hard) with Blending stump set And 2 kneadable erasers', 'Brustro', 656, 506, 64, 'GB61.jpg', '•Made of compressed charcoal Set of 6 Pre-sharpened Woodless Charcoal Pencils which included 3 soft, 2 medium and 1 hard. Smooth blending with rich and dark pigmentation Ideal for sketching, shading, detailing, layering and attaining tonal values. Perfect substitute for compressed charcoal sticks\r\n•	Lacquered coating on each pencil for clean handling and comfortable grip Both broad and fine strokes can be attained by placing the pencils at different angles. Can be easily sharpened with a regular sharpener, blade or a sandpaper block.\r\n•Bending Stumps – Soft gray paper, pointed on both ends. Due to their soft, powdery consistency, pastels and charcoal can be easily wiped, either with your fingers or paper blending stumps.\r\n•Simply reshape dirty ends in normal sharpener to guarantee further clean blending Set of 5 Stumps. Stumps are easily kept pointed with sandpaper block pad\r\n•Kneadable eraser – Brustro extra soft kneadable art erasers are also known as putty rubber and is an indispensable tool for artists while working with pastels, charcoals or graphite powders It absorbs chalk by blotting and wiping the surface without damaging the drawing paper The kneadable eraser can be shaped easily into any form for precision work Specially suitable for lightening, correction of drawings as well as adding highlights\r\n', 'Brustro Woodless Charcoal Pencil – Made of compressed charcoal Set of 6 Pre-sharpened Woodless Charcoal Pencils which included 3 soft, 2 medium and 1 hard. Smooth blending with rich and dark pigmentation Ideal for sketching, shading, detailing, layering and attaining tonal values. Perfect substitute for compressed charcoal sticks Lacquered coating on each pencil for clean handling and comfortable grip Both broad and fine strokes can be attained by placing the pencils at different angles. Can be easily sharpened with a regular sharpener, blade or a sandpaper block. Fragile- Handle with care. Bending Stumps – Soft gray paper, pointed on both ends. Due to their soft, powdery consistency, pastels and charcoal can be easily wiped, either with your fingers or paper blending stumps. Kneadable eraser – Brustro extra soft kneadable art erasers are also known as putty rubber and is an indispensable tool for artists while working with pastels, charcoals or graphite powders It absorbs chalk by blotting and wiping the surface without damaging the drawing paper The kneadable eraser can be shaped easily into any form for precision work Specially suitable for lightening, correction of drawings as well as adding highlights.', 0, 'Brustro Woodless Charcoal Pencil Set of 6 (3 Soft, 2 Medium, 1 Hard) with Blending stump set And 2 kneadable erasers', NULL, 1),
(184, 107, 87, 'Cretacolor Art Sticks Large Assorted Set of 8', 'Cretacolor', 999, 849, 60, 'GB71.jpg', 'Cretacolor is a leading dry media manufacturer based in Austria where all its products have been manufactured for decades. Cretacolor products are internationally recognized as being of very high quality. Cretacolor’s Artists Sticks allow artists to quickly cover large areas while sketching. These extra-wide artists sticks guarantee a top quality, intensely rich stroke thanks to their high degree of pigmentation. They are also more difficult to break than graphite sticks. They are ideal not only for sketching and drawing but also for experimenting with new techniques and for large-format work. The Art Sticks Large set of 8 Assorted, contains artists’ favorite shades, with several different hardness variations. So with this wide variety, grab your sticks, sketchbooks or paper and start drawing with these professional grade artist drawing sticks. The set contains 8 sticks, one each of Sepia Dark, Sepia Light Dry, Sanguine Dry, Sanguine Fat, White Chalk Dry, Sketching Coal, Nero Medium & Nero Extra Soft in a cardboard box.', 'Cretacolor is a leading dry media manufacturer based in Austria where all its products have been manufactured for decades. Cretacolor products are internationally recognized as being of very high quality. Cretacolor’s Artists Sticks allow artists to quickly cover large areas while sketching. These extra-wide artists sticks guarantee a top quality, intensely rich stroke thanks to their high degree of pigmentation. They are also more difficult to break than graphite sticks. They are ideal not only for sketching and drawing but also for experimenting with new techniques and for large-format work. The Art Sticks Large set of 8 Assorted, contains artists’ favorite shades, with several different hardness variations. So with this wide variety, grab your sticks, sketchbooks or paper and start drawing with these professional grade artist drawing sticks. The set contains 8 sticks, one each of Sepia Dark, Sepia Light Dry, Sanguine Dry, Sanguine Fat, White Chalk Dry, Sketching Coal, Nero Medium & Nero Extra Soft in a cardboard box.', 0, 'Cretacolor Art Sticks Large Assorted Set of 8', NULL, 1);
INSERT INTO `product` (`product_id`, `cat_id`, `subcat_id`, `pname`, `brand`, `mrp`, `price`, `stock`, `img1`, `short_desc`, `descr`, `best_seller`, `meta_title`, `meta_keyword`, `stats`) VALUES
(185, 107, 88, 'Brustro Artists’ Watercolour Pencil Set of 24', 'Brustro', 699, 549, 75, 'GC11.jpg', '•Artists’ Grade Professional Water Colour Pencils consisting of 24 rich, vibrant shades. Soft, water-soluble; 4mm leads\r\n•Highly pigmented and break-resistant.Unsurpassable light fastness. Blends and layers easily, smooth colour strokes\r\n•Sturdy precision. Excellent colour saturation. Consistent colour when wet or dry\r\n•Non-toxic and environment friendly', 'Every shade combines the control of a pencil with the beauty of watercolour. The high pigmentation and softer formulation transfers intense colours quickly onto paper. Ideal for creating bright, expressive drawings with a translucent ink-like effect, blending and layering, bold strokes and delicate watercolour washes. Shades – Amethyst, Azure Blue, Black, Emerald, Expresso, French Rose, Golden Yellow, Grass Green, Hazelnut, Ivory, Lemon, Lime, Midnight Blue, Orange, Peach Puff, Raspberry, Sap Green, Scarlet, Sky Blue, Toner Grey, Ultramarine, Walnut, White & Yellow Ochre.', 0, 'Brustro Artists’ Watercolour Pencil Set of 24', '', 0),
(186, 107, 88, 'Brustro Artists’ Watercolour Pencil Set of 72 ( In Elegant Tin Box )', 'Brustro', 1899, 1749, 45, 'GC21.jpg', '•Artists’ Grade Professional Water Colour Pencils consisting of 72 rich, vibrant shades. Soft, water-soluble; 4mm leads\r\n•Highly pigmented and break-resistant.Unsurpassable light fastness. Blends and layers easily, smooth colour strokes\r\n•Sturdy precision. Excellent colour saturation. Consistent colour when wet or dry\r\n•Non-toxic and environment friendly', 'Every shade combines the control of a pencil with the beauty of watercolour. The high pigmentation and softer formulation transfer intense colours quickly onto paper. Ideal for creating bright, expressive drawings with a translucent ink-like effect, blending and layering, bold strokes and delicate watercolour washes.', 0, 'Brustro Artists’ Watercolour Pencil Set of 72 ( In Elegant Tin Box )', '', 1),
(187, 107, 89, 'Gallery Artist Oil Pastel-Fluorescent shades', NULL, 400, 250, 78, 'GD11.jpg', 'Brand: Mungyo Set contains: 12 assorted metallic & fluorescent colors High-end Mungyo oil pastels for professional artists made from finest materials', 'Brand: Mungyo Set contains: 12 assorted metallic & fluorescent colors High-end Mungyo oil pastels for professional artists made from finest materials', 0, 'Gallery Artist Oil Pastel-Fluorescent shades', NULL, 1),
(188, 107, 89, 'Sennelier Oil Pastel Set of 24 – Assorted', 'Sennelier', 2699, 2549, 63, 'GD21.jpg', '•Extra fine Artists’ quality. * Creamy, lightfast, opaque, and vibrant & versatile.\r\n•Blend well with other colours. * Can be used on a wide variety of surfaces (Canvas, Papers, Cardboard, Metal, Plastic, Glass etc.).\r\n•Makes use of top-quality pigments, an extremely pure synthetic binding medium, and mineral wax.\r\n•Set of 24 – Assorted in a Cardboard Box.\r\n', 'In 1949, Parisian painter Henri Goetz approached Henri Sennelier, the famous artist materials manufacturer, about creating a wax color stick for his friend Pablo Picasso. Picasso, a long-time Sennelier customer and a frequent visitor to their store across the street from the Louvre museum, was looking for a medium that could be used freely on a variety of surfaces without fading or cracking.Their collaboration produced the incomparable Sennelier oil pastels. The Sennelier Oil Pastel is a product that makes use of the components used in all Sennelier colors — top-quality pigments, an extremely pure synthetic binding medium, and mineral wax. The pigments are ground with an inert, non-siccative binding medium that does not oxidize and that has no effect upon either the film stability or the surface. This base is then mixed with wax (neutral pH). The balance of this mix provides Sennelier oil pastels with a unique unctuousness and a creamy texture that allows for a great deal of freedom in pictorial expression. Sennelier Oil Pastels possess an extraordinarily high pigment content, thus providing them with a high coloring and covering potential, excellent brightness, and a high degree of light stability (with the exception of metallic and fluorescent shades). Note — To protect an oil pastel surface from dirt and dust, apply a fixative 8 to 10 days after the work is completed. The fixative will not dry the work. If desired, a final varnish spray can be applied to seal the surface permanently, but this may adversely affect future restoration possibilities. Set of 24 – Assorted in a Cardboard Box includes: White, Azure Blue, Pale Blue, Reddish Brown Gray, Gray Green, Lemon Yellow, Yellow Deep, Black, Yellow Ochre, Ruby Red, Burnt Umber Raw Umber, Cinnabar Green Yellow, Green Medium, Brown Madder, Mandarin, Geranium Lake Light, Delft Blue, Pine Green, Celadon Green, Celestial Blue, Permanent Intense Red, French Ultramarine Blue, and Red Brown.', 0, 'Sennelier Oil Pastel Set of 24 – Assorted', NULL, 1),
(189, 107, 89, 'Cretacolor Artists Studio Line Pastel Pencil Set of 8 – Still life Basics', 'Cretacolor', 699, 549, 85, 'GD31.jpg', 'Cretacolor is a leading dry media manufacturer based in Austria where all its products have been manufactured for decades. Cretacolor products are internationally recognised as being of very high quality, with high colour intensity, rich colour laydown and superior lightfastness. The ideal complement to the other Cretacolor Studio Line pastel pencil sets, Cretacolor Artists’ Studio Line Pastel Pencil Set contains all the colours featured in the still life picture. Each pastel pencil is enveloped in a protective case of cedar. Rich pigmentation and high lightfastness guarantee brilliant results. Fixing is required. Pencils are pre-sharpened. Each pencil set is conveniently packaged in cardboard boxes. This pastel pencil set of 8 Coloured Pencils.', 'Cretacolor is a leading dry media manufacturer based in Austria where all its products have been manufactured for decades. Cretacolor products are internationally recognised as being of very high quality, with high colour intensity, rich colour laydown and superior lightfastness. The ideal complement to the other Cretacolor Studio Line pastel pencil sets, Cretacolor Artists’ Studio Line Pastel Pencil Set contains all the colours featured in the still life picture. Each pastel pencil is enveloped in a protective case of cedar. Rich pigmentation and high lightfastness guarantee brilliant results. Fixing is required. Pencils are pre-sharpened. Each pencil set is conveniently packaged in cardboard boxes. This pastel pencil set of 8 Coloured Pencils.', 0, 'Cretacolor Artists Studio Line Pastel Pencil Set of 8 – Still life Basics', NULL, 1),
(190, 107, 89, 'Brustro Artists’ Soft Pastels Set of 24', 'Brustro', 699, 549, 75, 'GD41.jpg', '•Assorted set of 24 intense brilliant shades giving delicate effects\r\n•Created using the finest pigments and a minimum binder; square shaped sticks are just ideally soft so they are easy to handle, especially for beginners\r\n•Extremely high pigment concentration resulting in great colour intensity; sticks are rich in texture\r\n•Unmatched softness and consistency; pigments slide off the stick smoothly\r\n•Softness of the pastels permits a beautiful dense application; so soft that a gentle stroke will deliver a solid powerful line of brilliant colour', 'The beauty of Brustro Soft Pastels lies in their ability to be used in various ways. The sides can be used to make broad strokes, the edges are ideal for bold lines and perfect for achieving those fine details. This medium is excellent for blending and smudging which can lead to creating marvellous effects. Make sure to spray your soft pastel drawings with a protective spray to prevent unwanted smearing.', 1, 'Brustro Artists’ Soft Pastels Set of 24', '', 1),
(191, 107, 89, 'Sennelier Extra Soft Pastel Set of 50 – Assorted', 'Sennelier', 11999, 11849, 30, 'GD51.jpg', '•Extra Fine Artist’s Quality. Made from the purest pigments.\r\n•Chosen for their intensity and lightfastness. Handmade and air-dried for four weeks to maintain a uniform softness.\r\n•Grounded with a natural transparent binder.\r\n•They measure 1-1/4? in length and 1/2? in diameter.\r\n•Set of 50 in a wooden box.\r\n', '•Extra Fine Artist’s Quality. Made from the purest pigments.\r\n•Chosen for their intensity and lightfastness. Handmade and air-dried for four weeks to maintain a uniform softness.\r\n•Grounded with a natural transparent binder.\r\n•They measure 1-1/4? in length and 1/2? in diameter.\r\n•Set of 50 in a wooden box.\r\n', 0, 'Sennelier Extra Soft Pastel Set of 50 – Assorted', NULL, 1),
(192, 107, 89, 'Sennelier Extra Soft Pastel Set of 100 – Portrait', 'Sennelier', 21999, 21849, 35, 'GD61.jpg', '•Extra Fine Artist’s Quality. * Made from the purest pigments.\r\n•Chosen for their intensity and lightfastness. * Handmade and air-dried for four weeks to maintain a uniform softness.\r\n•Grounded with a natural transparent binder.\r\n•They measure 1-1/4? in length and 1/2? in diameter.\r\n•Set of 100 – Portrait in a Wooden box.\r\n', 'A Sennelier extra soft pastel is composed of high quality pure pigment grounded with a natural transparent binder. The high quality composition of Extra Soft pastels is the result of a perfect balance between binder & pigment. For gradient shades, increasing amounts of mineral fines are added, ultimately tending towards white. The exceptional brightness is the result of the pigment & of the natural mineral fines discovered by Sennelier in 1905 & that have been used ever since. The manufacturing process of the Sennelier cylindrical pastel does not compress the paste & the pastel dries naturally in open air. The life span of a piece of work is guaranteed by the quality of the pastel, but also by the quality of the substrate. If a lot of overlapping is performed, it is preferable to fix between layers. Avoid, however, fixing the final layer too heavily, as the original vibration of tones will be lost. Set of 100 in a Wooden Box (Includes: Apple Green 5,7,8,9;Blue Violet 1,3,4,5,6;Bright Yellow 1,3,4;Brown Ochre;Brown Ochre 2,4,6;Burnt Madder 7;Cadmium Yellow Deep;Cadmium Yellow Deep 2,3;Cadmium Yellow Light 1;Carmine Brown 6;Chromium Green 2,7,8,9;Chromium Oxide Green 6,8;Cobalt Blue 3,5,6,8,9;Flesh Ochre 3,4,6,9;Golden Ochre 1,2,9;Gray 1,3,4,8,9;Indigo 6;Intense Blue;Intense Blue 5,7,8;Ivory Black;Leaf Green 4;Lemon Yellow 2;Madder Carmine;Madder Carmine 3,7;Madder Violet 1,3,5,9;Magenta Violet 4,5,6;Naples Yellow 2,3,9;Nasturtium Orange 3, 4;Orange Lead 1,3,4,8;Red Brown;Red Brown 1,2,9;Ruby Red;Ruby Red 2,4,6;Scarlet Lake 3,5,7,8;Ultramarine Deep 2,4,5;Venetian Red 3,5;Vermilion 2, 4,6,8;White;Yellow Ochre 6, 7.)', 0, 'Sennelier Extra Soft Pastel Set of 100 – Portrait', NULL, 1),
(193, 107, 89, 'Cretacolor Hard Pastel Carre Brown Set of 12', 'Cretacolor', 737, 587, 50, 'GD71.jpg', '•Brilliant colors and light fastness special features of this fine Sticks.\r\n•The broad side of the chalk is ideal for large-scale work, the edges are ideal for precise works.\r\n•Fully pigmented, dissolved with water, smudged, Application of a fixative is recommended.\r\n•The pastels produce a velvet-soft, glossy-black smear.\r\n•Contains (Square shape 7 x 7 mm) 12 unburnt Brown and Grey Chalks guarantee brilliant, all stored in a handsome cardboard case.\r\n', '•Brilliant colors and light fastness special features of this fine Sticks.\r\n•The broad side of the chalk is ideal for large-scale work, the edges are ideal for precise works.\r\n•Fully pigmented, dissolved with water, smudged, Application of a fixative is recommended.\r\n•The pastels produce a velvet-soft, glossy-black smear.\r\n•Contains (Square shape 7 x 7 mm) 12 unburnt Brown and Grey Chalks guarantee brilliant, all stored in a handsome cardboard case.\r\n', 0, 'Cretacolor Hard Pastel Carre Brown Set of 12', NULL, 1),
(194, 107, 89, 'Cretacolor Hard Pastel Carre Grey Set of 12', 'Cretacolor', 737, 587, 45, 'GD81.jpg', '•Brilliant colors and light fastness are special features of these fine Sticks.\r\n•The broad side of the chalk is ideal for large-scale work, the edges are ideal for precise works.\r\n•Fully pigmented, dissolves with water and can be smudged.\r\n•Application of a fixative is recommended & The pastels produce a velvet-soft, oil-free stroke.\r\n•Contains (Square shape 7 x 7 mm) 12 grey hard pastels, all stored in a handsome cardboard case.\r\n', '•Brilliant colors and light fastness are special features of these fine Sticks.\r\n•The broad side of the chalk is ideal for large-scale work, the edges are ideal for precise works.\r\n•Fully pigmented, dissolves with water and can be smudged.\r\n•Application of a fixative is recommended & The pastels produce a velvet-soft, oil-free stroke.\r\n•Contains (Square shape 7 x 7 mm) 12 grey hard pastels, all stored in a handsome cardboard case.\r\n', 0, 'Cretacolor Hard Pastel Carre Grey Set of 12', NULL, 1),
(195, 107, 89, 'Cretacolor Hard Pastel Carre Portrait Set of 12', 'Cretacolor', 737, 587, 42, 'GD91.jpg', '•Brilliant colors and light fastness special features of this fine chalks.\r\n•The broad side of the chalk is ideal for large-scale work, the edges are ideal for precise works.\r\n•Fully pigmented, dissolved with water, smudged.\r\n•Application of a fixative is recommended.\r\n•The pastels produce a velvet-soft, oil-free stroke.\r\n•Contains (Square shape 7 x 7 mm) in 12 assorted colors, all stored in a handsome cardboard case.\r\n', '•Brilliant colors and light fastness special features of this fine chalks.\r\n•The broad side of the chalk is ideal for large-scale work, the edges are ideal for precise works.\r\n•Fully pigmented, dissolved with water, smudged.\r\n•Application of a fixative is recommended.\r\n•The pastels produce a velvet-soft, oil-free stroke.\r\n•Contains (Square shape 7 x 7 mm) in 12 assorted colors, all stored in a handsome cardboard case.\r\n', 0, 'Cretacolor Hard Pastel Carre Portrait Set of 12', NULL, 1),
(196, 107, 89, 'Cretacolor Hard Pastel Carre Nature Set of 12', 'Cretacolor', 737, 587, 20, 'GD101.jpg', '•Brilliant colors and light fastness special features of this fine chalks.\r\n•Fully pigmented, dissolved with water, smudged.\r\n•The pastels produce a velvet-soft, oil-free stroke.\r\n•Contains (Square shape 7 x 7 mm) in 12 hard pastels , all stored in a cardboard box.\r\n', '•Brilliant colors and light fastness special features of this fine chalks.\r\n•Fully pigmented, dissolved with water, smudged.\r\n•The pastels produce a velvet-soft, oil-free stroke.\r\n•Contains (Square shape 7 x 7 mm) in 12 hard pastels , all stored in a cardboard box.\r\n', 0, 'Cretacolor Hard Pastel Carre Nature Set of 12', NULL, 1),
(197, 107, 90, 'Brustro White Gel Pen (Pack of 1 Pen with 5 Refills)', 'Brustro', 199, 49, 120, 'GE11.jpg', '•Opaque and viscous ink, 1 mm tip\r\n•Metal tip to give consistent lines, Creates unique contrast on dark coloured surfaces\r\n•White juicy lines, perfect for detailed work, Ideal for adding highlights to a drawing, mandala, doodling and scrapbooking\r\n•Shows not only on black paper but also on light coloured papers and toned papers\r\n•Contains 1 pen and 5 refills', 'Brustro White Gel Pen Set creates unique contrast on dark-coloured surfaces, making it a valuable tool for any artist, scrapbooker, cartoonist. Useful for a variety of applications, these white gel pens will help you navigate through a white wonderland. White gel pens marry the visual impact and performance of white ink with the convenience and predictability of a needle-point pen. This makes them accessible for beginners and everyday users while allowing experienced artists to work distraction-free. The combination of Japanese fibre tips clamped in a metal tip and softer writing action makes them easy to use not only with rulers and templates for technical and creating consistent lines but also ideal for writing and sketching. The ink is waterproof and fade-resistant ensuring that your drawings won’t bleed or pool when exposed to water and won’t fade with time or in sunlight. It is Ideal for all your fine inking needs. The pens come in a size of 1mm. These quick-drying, pigment-based gel pens are great for mandala, anime, illustration, details, fine art, design, comics, modelling, and journaling and paper-crafting.', 0, 'Brustro White Gel Pen (Pack of 1 Pen with 5 Refills)', '', 1),
(198, 107, 90, 'Brustro Technical Pen Black Assorted Set of 6', 'Brustro', 36, 210, 52, 'GE21.jpg', '•Archival quality ink for use in acid-free environments.\r\n•Japanese Nibs. Chemically stable, waterproof, and fade resistant.\r\n•No smears, feathers, or bleed-through on most papers. Disposable.\r\n•Ideal for anime, illustration, details, fine art, design, comics, modeling, journaling and papercrafting. * Not evaluated for cosmetic use on skin.\r\n•Assorted Sets of 6 Pens (Includes: 1 each of 0.05mm; 0.1mm; 0.2mm; 0.3mm; 0.5mm; 0.8mm.)', 'A brand known for producing high quality materials, Brustro’s Technical Pens are a reliable, versatile pen, the combination of a long metal tip and softer writing action make them easy to use with rulers and templates for technical and architectural drawing but also ideal for writing and sketching. The disposable technical pen using archival pigmented ink is available in nine point sizes (the biggest range we have.), you can pretty much guarantee every possible use is covered. The ink is waterproof and lightfast, ensuring that your drawings won’t bleed when exposed to water and won’t fade with time or in sunlight. Brustro Technical Pens make an excellent disposable alternative to the more expensive refillable technical pens, so you’d be hard-pressed to tell the difference. Ideal for all of your fine inking needs, Technical Pens begin with a size 0.05mm and work all the way up to our thick Brush pen. These quick-drying, pigment-based ink pens are great for anime, illustration, details, fine art, design, comics, modeling, journaling and papercrafting. Experience smooth, skip-free writing and crisp ink colors that leave consistent lettering and lines every time. Choose from the range of nine nib sizes for precise line widths: 0.05mm; 0.1mm; 0.2mm; 0.3mm; 0.4mm; 0.5mm; 0.6mm; 0.8mm & Brush. They are available both individually but also in a small selection of sets for anyone looking for a range of sizes to start off with. Assorted Sets of 6 Pens (Includes: 1 each of 0.05mm; 0.1mm; 0.2mm; 0.3mm; 0.5mm; 0.8mm.) Brustro is a registered trademark of Creative Hands Art Materials Pvt. Ltd.', 1, 'Brustro Technical Pen Black Assorted Set of 6', 'Brustro', 1),
(199, 107, 90, 'Copic Multiliner Black Set B2', 'COPIC', 1650, 1500, 75, 'GE31.JPG', 'Copic original Multiliner Pens are fine quality inking pens available in nine black sizes, and seven colors in up to five nib sizes. Ideal for all of your fine inking needs, Multiliners begin with a size 0.03mm and work all the way up to our thick Brush Medium pen. These quick-drying, pigment-based ink pens are great for anime, illustration, details, fine art, design, comics, modeling, journaling and papercrafting. Set contains: 0.03mm, 0.05mm, 0.1mm, 0.3mm, 0.5mm, 0.8mm, 1.0mm, Brush Small and Brush Medium.', 'Copic original Multiliner Pens are fine quality inking pens available in nine black sizes, and seven colors in up to five nib sizes. Ideal for all of your fine inking needs, Multiliners begin with a size 0.03mm and work all the way up to our thick Brush Medium pen. These quick-drying, pigment-based ink pens are great for anime, illustration, details, fine art, design, comics, modeling, journaling and papercrafting. Set contains: 0.03mm, 0.05mm, 0.1mm, 0.3mm, 0.5mm, 0.8mm, 1.0mm, Brush Small and Brush Medium.', 0, 'Copic Multiliner Black Set B2', '', 1),
(200, 107, 90, 'Karin brush marker Déco Metallic 10 Colours set', '', 2380, 2230, 65, 'GE41.JPG', '•A set of 10 metallic DécoBrush markers in a durable metal package. The set contains the following colours:\r\n•silver metallic gold metallic copper metallic red gold metallic light green metallic green metallic pink metallic blue metallic violet metallic black metallic\r\n•Ideal For Gouache, Pastels, Metallic , Watercolour And Calligraphy.. 300 GSM Size-A4', 'A set of 10 metallic DécoBrush markers in a durable metal package. The set contains following colours: silver metallic gold metallic copper metallic red gold metallic light green metallic green metallic pink metallic blue metallic violet metallic black metallic DécoBrush markers contain 2.4 ml of non-toxic paint based on metallic pigments. They are perfectly capable of covering both black and white surfaces. They were produced in “liquid ink” technology and thus, as opposed to traditional technology, they enable using all the contents. Metallic paint, after drying out, is permanent, light-resistant and waterproof on surfaces such as: paper, wood, ceramics, glass, metal, plastics. For further details, please go to the Attachments tab. silver metallic gold metallic copper metallic red gold metallic light green metallic green metallic pink metallic blue metallic violet metallic black metallic', 0, 'Karin brush marker Déco Metallic 10 Colours set', '', 1),
(201, 107, 90, 'Copic Markers 6-Piece Sketch Set, Floral Favorites 2', 'COPIC', 2310, 2160, 45, 'GE51.JPG', 'Outstanding Performance And Creative Versatility These Markers Provide the Ultimate Solution to Design Flexibility And Artistic Liberty. Fast Drying, Alcohol Based, Non- Toxic, Refillable, Double-Ended, Marker That Comes in A Vast Variety of Colors. They Are Constructed in A Unique Design For A More Comfortable Grip And So They Will Not Roll Away From You, Fit In to A Special Airbrush System, Durable Polyester Nibs Are Easily Interchangeable And Available in 9 Different Weights And Styles. Electronic Production Guarantees Consistency of Both Color And Output, Precise Colored Capping System Provides For Instant Color Selection. Copic Markers Are Used By Artists And Designers Worldwide. They Are Low-Odor, Blendable, And For Use On Paper, Leather, Wood, Fabric, Faux Fur, Plastics, And More. This Set Includes 6 Markers. Imported.', 'Outstanding Performance And Creative Versatility These Markers Provide the Ultimate Solution to Design Flexibility And Artistic Liberty. Fast Drying, Alcohol Based, Non- Toxic, Refillable, Double-Ended, Marker That Comes in A Vast Variety of Colors. They Are Constructed in A Unique Design For A More Comfortable Grip And So They Will Not Roll Away From You, Fit In to A Special Airbrush System, Durable Polyester Nibs Are Easily Interchangeable And Available in 9 Different Weights And Styles. Electronic Production Guarantees Consistency of Both Color And Output, Precise Colored Capping System Provides For Instant Color Selection. Copic Markers Are Used By Artists And Designers Worldwide. They Are Low-Odor, Blendable, And For Use On Paper, Leather, Wood, Fabric, Faux Fur, Plastics, And More. This Set Includes 6 Markers. Imported.', 1, 'Copic Markers 6-Piece Sketch Set, Floral Favorites 2', NULL, 0),
(202, 107, 90, 'Copic Markers 6-Piece Sketch Set, Secondary Tones', 'COPIC', 2310, 2160, 62, 'GE61.JPG', 'Sketch 6pc Secondary Tones Set. Scores of anime, manga, and comics artists as well as landscape, product, architecture, and fashion designers prefer Copic markers because of their ultra-blendable, low odor, alcohol based inks. Unlike water-based inks, which tend to pill and oversoak the paper while blending, Copic mix on the surface to deliver the wonderfully rich blends they?re known for. This outstanding performance has distinguished Copic markers as the celebrated coloring tool within professional, semi-professional and hobby circles alike.', 'Sketch 6pc Secondary Tones Set. Scores of anime, manga, and comics artists as well as landscape, product, architecture, and fashion designers prefer Copic markers because of their ultra-blendable, low odor, alcohol based inks. Unlike water-based inks, which tend to pill and oversoak the paper while blending, Copic mix on the surface to deliver the wonderfully rich blends they?re known for. This outstanding performance has distinguished Copic markers as the celebrated coloring tool within professional, semi-professional and hobby circles alike.', 0, 'Copic Markers 6-Piece Sketch Set, Secondary Tones', NULL, 0),
(203, 107, 90, 'Copic Markers 6-Piece Sketch Set, Bold Primaries', 'COPIC', 2310, 2160, 36, 'GE71.jpg', 'Scores of anime, manga, and comics artists as well as landscape, product, architecture, and fashion designers prefer Copic markers because of their ultra-blendable, low odor, alcohol based inks. Unlike water-based inks, which tend to pill and oversoak the paper while blending, Copics mix on the surface to deliver the wonderfully rich blends they are known for. This outstanding performance has distinguished Copic markers as the celebrated coloring tool within professional, semi-professional and hobby circles alike.', 'Scores of anime, manga, and comics artists as well as landscape, product, architecture, and fashion designers prefer Copic markers because of their ultra-blendable, low odor, alcohol based inks. Unlike water-based inks, which tend to pill and oversoak the paper while blending, Copics mix on the surface to deliver the wonderfully rich blends they are known for. This outstanding performance has distinguished Copic markers as the celebrated coloring tool within professional, semi-professional and hobby circles alike.', 0, 'Copic Markers 6-Piece Sketch Set, Bold Primaries', NULL, 1),
(204, 107, 90, 'Ciao 36 Piece Marker Set E – Set of 36', 'COPIC', 10080, 9930, 13, 'GE81.jpg', 'Ciao 36pc Set E. Scores of anime, manga, and comics artists as well as landscape, product, architecture, and fashion designers prefer Copic markers because of their ultra-blendable, low odor, alcohol based inks. Unlike water-based inks, which tend to pill and oversoak the paper while blending, Copics mix on the surface to deliver the wonderfully rich blends they are known for. This outstanding performance has distinguished Copic markers as the celebrated coloring tool within professional, semi-professional and hobby circles alike.', 'Ciao 36pc Set E. Scores of anime, manga, and comics artists as well as landscape, product, architecture, and fashion designers prefer Copic markers because of their ultra-blendable, low odor, alcohol based inks. Unlike water-based inks, which tend to pill and oversoak the paper while blending, Copics mix on the surface to deliver the wonderfully rich blends they are known for. This outstanding performance has distinguished Copic markers as the celebrated coloring tool within professional, semi-professional and hobby circles alike.', 0, 'Ciao 36 Piece Marker Set E – Set of 36', NULL, 1),
(205, 107, 90, 'Uni Posca Paint Marker Pen - Set of 15', 'POSCA', 2999, 2849, 95, 'GE91.JPG', '•The water-based pigment ink is non-toxic, lightfast and waterproof\r\n•Excellent for vibrant signs and craft work\r\n•Quality product', '•The water-based pigment ink is non-toxic, lightfast and waterproof\r\n•Excellent for vibrant signs and craft work\r\n•Quality product', 0, 'Uni Posca Paint Marker Pen - Set of 15', '', 1),
(206, 107, 90, 'Ohuhu Double Tipped Chisel & Fine Alcohol-based Art Markers', 'OHUHU', 2499, 2349, 3, 'GE101.JPG', '•DOUBLE TIPPED MARKERS: Broad and fine twin tips for precise highlighting and underlining, for drawing with both thin and thick lines. Allows you to create various styles, sketches and patterns with ease\r\n•40 VIBRANT UNIQUE COLORS + 1 FREE COLORLESS BLENDER: The highly pigmented and vibrant markers are built to last against fading, and blend beautifully for added dimension to your artwork\r\n•FAST DRYING MARKERS: Easily layer and mix different colors without worrying about smudges and blotches\r\n•HIGH QUALITY ART MARKER SET: Marker pens are highly pigmented, allowing you to color in at least 984ft. worth of drawings\r\n•COLOR-CODED CAPS, BONUS CASE, CREAT MOTHER\'S DAY GIFT IDEA: The color-coded caps allow for ease in organization and use in identifying colors; And also, these marker pen set is equipped with a beautiful black carrying case for ease in travelling and storing', '•DOUBLE TIPPED MARKERS: Broad and fine twin tips for precise highlighting and underlining, for drawing with both thin and thick lines. Allows you to create various styles, sketches and patterns with ease\r\n•40 VIBRANT UNIQUE COLORS + 1 FREE COLORLESS BLENDER: The highly pigmented and vibrant markers are built to last against fading, and blend beautifully for added dimension to your artwork\r\n•FAST DRYING MARKERS: Easily layer and mix different colors without worrying about smudges and blotches\r\n•HIGH QUALITY ART MARKER SET: Marker pens are highly pigmented, allowing you to color in at least 984ft. worth of drawings\r\n•COLOR-CODED CAPS, BONUS CASE, CREAT MOTHER\'S DAY GIFT IDEA: The color-coded caps allow for ease in organization and use in identifying colors; And also, these marker pen set is equipped with a beautiful black carrying case for ease in travelling and storing', 0, 'Ohuhu Double Tipped Chisel & Fine Alcohol-based Art Markers', '', 1),
(311, 104, 78, 'EEM', 'dsxfcgbv', 123, -27, 54, '529084841_GE103_11zon.jpg', 'fdcgbvnjm', 'dfgcbvnmj', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `title` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `review` text COLLATE latin1_general_cs NOT NULL,
  `rating` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `stats` tinyint(4) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`review_id`, `product_id`, `customer_id`, `title`, `review`, `rating`, `stats`, `added_on`) VALUES
(57, 147, 910, 'worst', 'Best product. loved it', '4', 0, '2021-09-08 02:47:52'),
(61, 143, 910, 'great', 'good product', '4', 1, '2021-09-08 02:49:14'),
(63, 188, 912, 'wow', 'Totally loved it. Highly recommended', '5', 1, '2021-09-08 02:49:38'),
(64, 161, 910, 'okay', 'Works well with colored pencils', '3', 0, '2021-09-08 03:47:39'),
(67, 146, 700, 'WOHOO', 'amazing ', '5', 1, '2021-09-09 03:36:16'),
(69, 161, 969, 'BBAD', 'worst product. not worth it', '1', 1, '2021-09-15 06:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `stats` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `cat_id`, `subcat_name`, `stats`) VALUES
(70, 101, 'WATER COLORS', 1),
(71, 101, 'OIL COLORS', 1),
(73, 101, 'ACRYLICS', 1),
(74, 101, 'SPRAY PAINTS', 1),
(75, 102, 'FIXATIVE & VARNISHES', 0),
(76, 102, 'OIL MEDIUM', 1),
(77, 102, 'WATERCOLOR MEDIUM', 1),
(78, 104, 'ACRYLIC BRUSHES', 1),
(79, 104, 'OIL BRUSHES', 1),
(80, 104, 'WATERCOLOR BRUSHES', 1),
(81, 105, 'PALETTES', 1),
(82, 105, 'PALETTE KNIVES', 1),
(83, 105, 'MARKER WALLET & PORTFOLIO BAGS', 1),
(84, 105, 'ERASERS', 1),
(85, 105, 'WASHI TAPE', 1),
(86, 107, 'PENCILS', 1),
(87, 107, 'CHARCOAL & GRAPHITE', 1),
(88, 107, 'WATERCOLOR PENCILS', 1),
(89, 107, 'PASTELS', 1),
(90, 107, 'FINELINERS & MARKERS', 1),
(120, 181, 'Bluepen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `customer_id`, `product_id`, `added_on`) VALUES
(6, 910, 1, '2021-08-18 03:49:18'),
(7, 910, 4, '2021-08-18 03:49:20'),
(18, 960, 206, '2021-08-23 09:57:03'),
(19, 960, 203, '2021-08-23 09:57:44'),
(21, 960, 305, '2021-08-23 09:58:03'),
(23, 960, 204, '2021-08-23 10:12:20'),
(24, 960, 194, '2021-08-23 10:12:40'),
(25, 957, 304, '2021-08-23 10:36:17'),
(26, 957, 304, '2021-08-23 11:53:36'),
(28, 961, 204, '2021-08-24 02:32:32'),
(31, 957, 144, '2021-08-28 12:13:20'),
(32, 961, 151, '2021-09-01 08:23:16'),
(34, 961, 153, '2021-09-03 08:43:06'),
(35, 961, 182, '2021-09-03 09:09:28'),
(36, 961, 198, '2021-09-03 09:09:30'),
(42, 910, 146, '2021-09-14 08:47:58'),
(44, 910, 154, '2021-09-14 08:48:07'),
(46, 970, 150, '2021-09-14 07:28:01'),
(47, 970, 149, '2021-09-14 07:28:05'),
(49, 971, 144, '2021-09-15 03:50:21'),
(50, 971, 143, '2021-09-15 03:50:22'),
(51, 969, 146, '2021-09-15 06:56:25'),
(52, 969, 153, '2021-09-16 12:38:47'),
(53, 969, 111, '2021-09-16 02:21:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressbook`
--
ALTER TABLE `addressbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `subcat_id` (`subcat_id`),
  ADD KEY `cat` (`cat_id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `subcat_name` (`subcat_name`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addressbook`
--
ALTER TABLE `addressbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1311;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=972;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `cat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `subcat_id` FOREIGN KEY (`subcat_id`) REFERENCES `subcategory` (`subcat_id`) ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

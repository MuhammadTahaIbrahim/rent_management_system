-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 08:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dressify`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(1, 'MEN\'S', 'Mens.jpg'),
(2, 'BRIDAL', 'Bridal.jpg'),
(3, 'FORMAL', 'Formal.jpg'),
(7, 'DESIGNER', 'd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` int(255) NOT NULL,
  `contact_id` int(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `contact_id`, `sender`, `message`, `sent_at`) VALUES
(3, 1, 'Admin', 'hfg', '2024-07-30 21:48:13.789560');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `c_id` int(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_city` varchar(255) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_postcode` int(255) NOT NULL,
  `c_phone` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_ordernotes` varchar(255) NOT NULL,
  `c_payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`c_id`, `c_name`, `c_city`, `c_address`, `c_postcode`, `c_phone`, `c_email`, `c_ordernotes`, `c_payment`) VALUES
(1, 'taha', 'Quetta', 'hgfh', 466, '655656', 'taha@gmail.com', 'u7i8', 'cash_on_delivery'),
(2, 'taha', 'Faisalabad', 'hgfh', 466, '655656', 'taha@gmail.com', 'tfu', 'cash_on_delivery'),
(3, 'QURAT', 'Karachi', 'house 244', 78500, '09854322', 'qurat12@gmail.com', 'cgfhgfh', 'cash_on_delivery'),
(4, 'taha tm', 'Karachi', 'gulshan e shiraz', 7511, '03150273713', 'muhammadtaha3713@gmail.com', 'place order quickly', 'cash_on_delivery'),
(5, 'taha tm', 'Karachi', 'gulshan e shiraz', 7511, '03150273713', 'muhammadtaha3713@gmail.com', 'pace order quickly', 'cash_on_delivery'),
(6, 'HAMZA', 'Karachi', 'h no 233', 6578, '4566', 'hamzayousufzai12@gmail.com', 'jjhg', 'cash on delivery'),
(7, 'QURATT', 'Karachi', 'h no 555', 75800, '4566', 'quratulainbutt377@gmail.com', 'fgvjhkj', 'cash on delivery'),
(8, 'QURATT', 'Gujranwala', 'sdffghgj', 75800, '234578', 'quratulainbutt377@gmail.com', 'DFGJHK', 'cash on delivery'),
(9, 'QURATT', 'Peshawar', 'hfyjgjh', 6578, '0987654', 'quratulainbutt377@gmail.com', 'SDTFJHK', 'cash on delivery'),
(10, 'QURATT', 'Rawalpindi', 'sdffghgj', 5675, '3456789', 'quratulainbutt377@gmail.com', 'ghj', 'cash on delivery'),
(11, 'QURATT', 'Rawalpindi', 'dfghjhk', 0, '456789', 'quratulainbutt377@gmail.com', 'gvhbjn', 'cash on delivery'),
(12, 'QURATT', 'Rawalpindi', 'dfghjhk', 0, '456789', 'quratulainbutt377@gmail.com', 'gvhbjn', 'cash on delivery'),
(13, 'QURATT', 'Rawalpindi', 'hj', 2345, '0315 6789562', 'quratulainbutt377@gmail.com', 'fgj', 'cash on delivery'),
(14, 'taha', 'Karachi', 'GYGUY', 45678, '45678U', 'taha@gmail.com', 'GVHBKJN', 'cash on delivery'),
(15, 'taha', 'Karachi', 'dfgdfg', 3455, '45678', 'taha@gmail.com', 'nm', 'cash on delivery'),
(16, 'taha', 'Islamabad', 'h no 233', 5678, 'dfghj', 'taha@gmail.com', '', 'cash on delivery'),
(17, 'taha', 'Karachi', 'sdffghgj', 2345, '3456789', 'taha@gmail.com', '', 'cash on delivery'),
(18, 'taha', 'Islamabad', 'h no 233', 43567, '09876', 'taha@gmail.com', '', 'cash on delivery'),
(19, 'taha', 'Karachi', 'h no 233', 75800, '03156789562', 'taha@gmail.com', '', 'cash on delivery'),
(20, 'QURATT', 'Islamabad', 'h no 555', 75660, '2345678', 'quratulainbutt377@gmail.com', '', 'cash on delivery'),
(21, 'QURATT', 'Islamabad', 'sdffghgj', 75800, '456789', 'quratulainbutt377@gmail.com', 'jhgjh', 'cash on delivery');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(255) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(255) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_message`) VALUES
(1, 'quratulain', 'quratulainbutt377@gmail.com', '2377455', 'hyusgyu'),
(2, 'tahaa', 'muhammadtaha3713@gmail.com', '', 'hjh'),
(3, 'Taha', 'muhammadtaha3713@gmail.com', '2377455', 'gjg'),
(4, 'QURATT', 'quratulainbutt377@gmail.com', '12345678909', 'hfh');

-- --------------------------------------------------------

--
-- Table structure for table `lenders`
--

CREATE TABLE `lenders` (
  `l_Id` int(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `l_email` varchar(255) NOT NULL,
  `l_phone` varchar(255) NOT NULL,
  `l_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lenders`
--

INSERT INTO `lenders` (`l_Id`, `l_name`, `l_email`, `l_phone`, `l_img`) VALUES
(1, 'fiza', 'quratulainbutt377@gmail.com', '34567', 'LOGO1.PNG'),
(3, 'fiza', 'quratulainbutt377@gmail.com', '12345678909', 'LOGO1.PNG'),
(4, 'fiza', 'quratulainbutt377@gmail.com', '12345678909', 'LOGO1.PNG');

-- --------------------------------------------------------

--
-- Stand-in structure for view `orderdetailsview`
-- (See below for the actual view)
--
CREATE TABLE `orderdetailsview` (
`order_id` int(255)
,`order_pro` varchar(255)
,`order_quantity` varchar(255)
,`order_price` int(255)
,`order_delivery` varchar(255)
,`order_return` varchar(255)
,`order_cuser` varchar(255)
,`order_status` varchar(255)
,`checkout_id` int(255)
,`c_name` varchar(255)
,`c_city` varchar(255)
,`c_address` varchar(255)
,`c_postcode` int(255)
,`c_phone` varchar(255)
,`c_email` varchar(255)
,`c_ordernotes` varchar(255)
,`c_payment` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `order_pro` varchar(255) NOT NULL,
  `order_quantity` varchar(255) NOT NULL,
  `order_price` int(255) NOT NULL,
  `order_delivery` varchar(255) NOT NULL,
  `order_return` varchar(255) NOT NULL,
  `order_cuser` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `cid_fk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_pro`, `order_quantity`, `order_price`, `order_delivery`, `order_return`, `order_cuser`, `order_status`, `cid_fk`) VALUES
(16, 'Black Velvet', '1', 11000, '2024-08-09', '2024-08-16', 'QURATT', 'Pending', 12),
(17, 'Classic Tap Shoe Cotton Net', '1', 8000, '2024-08-09', '2024-08-16', 'QURATT', 'Pending', 12),
(18, 'Classic Tap Shoe Cotton Net', '1', 8000, '2024-08-09', '2024-08-16', 'QURATT', 'Pending', 13),
(19, 'Black Tropical', '1', 12000, '2024-08-09', '2024-08-16', 'taha', 'Pending', 14),
(21, 'Sartaaj', '1', 60000, '2024-08-15', '2024-08-22', 'taha', 'Pending', 15),
(22, 'Silk Dark Green', '1', 15000, '2024-08-15', '2024-08-22', 'taha', 'Pending', 15),
(23, 'Classic Valima', '1', 55000, '2024-08-15', '2024-08-22', 'taha', 'Pending', 15),
(25, 'Sania Maskatiya', '1', 40000, '2024-08-17', '2024-08-24', 'taha', 'Pending', 17),
(26, 'Green', '1', 12000, '2024-08-17', '2024-08-24', 'taha', 'Pending', 18),
(27, 'AKB22-9', '1', 38000, '2024-08-17', '2024-08-24', 'taha', 'Pending', 18),
(28, 'Gown and Veil', '1', 50000, '2024-08-17', '2024-08-24', 'taha', 'Pending', 19),
(29, 'Sania Maskatiya', '1', 40000, '2024-08-17', '2024-08-24', 'taha', 'Pending', 19),
(30, 'Kashees', '1', 8500, '2024-08-17', '2024-08-24', 'taha', 'Pending', 19),
(31, 'Nazakat', '1', 77000, '2024-08-17', '2024-08-24', 'QURATT', 'Pending', 20),
(32, 'Maheen Ghani', '1', 25, '2024-08-17', '2024-08-24', 'QURATT', 'Pending', 20),
(33, 'Black Tropical', '1', 12000, '2024-08-17', '2024-08-24', 'QURATT', 'Pending', 21);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(255) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_price` int(255) NOT NULL,
  `pro_desc` varchar(255) NOT NULL,
  `pro_size` varchar(255) NOT NULL,
  `pro_img` varchar(255) NOT NULL,
  `pro_catidfk` int(255) NOT NULL,
  `pro_subidfk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_price`, `pro_desc`, `pro_size`, `pro_img`, `pro_catidfk`, `pro_subidfk`) VALUES
(1, 'Waqas Shah', 10500, 'Formal Lengha with Choli', 'S', 'WAQASSHAH_FR-356_720x.jpg', 2, 1),
(2, 'Kashees', 8500, 'Bridal Lehenga Choli', 'S', 'kasheesmhndi.jpg', 2, 1),
(3, 'Sania Maskatiya', 40000, 'Bridal Pink Lehenga choli', 'S', '20_4de353a7-55bd-40bc-b77c-a67261ac0983_720x.jpg', 2, 1),
(4, 'Noor-e-Jahan', 16000, 'Bridal Emberioded Elegant Dress', 'S', 'mehendigreen.jpeg', 2, 1),
(5, 'Emerald Lehenga Choli', 7000, 'The Perfect Emerald Lehenga Choli dress ', 'S', 'mehendigreen2.jpg', 2, 1),
(7, 'Maheen Ghani', 9000, 'A stand out look for festive occasions', 'M', 'IMG_4479.jpg', 2, 1),
(8, 'Ebony Slim Fit Suit', 4000, 'Matching Pajama in the same poly viscose fabric.', 'M', 'FORMALSCAT.JPG', 1, 11),
(9, 'Ivory white jacket ', 10000, 'Perfect fusion of sophistication and contemporary style. ', 'S', 'SHERWANI2.JPG', 1, 10),
(10, 'Traditional Plain Sherwani', 12000, 'Perfect for wedding occasions.', 'S', 'MENSSCATSHERWANI.JPG', 1, 10),
(11, 'Classic Tap Shoe Cotton Net', 8000, 'Perfect for wedding occasions.', 'M', 'sherwani3scat.jpg', 1, 10),
(12, 'Embroidered Sherwani', 9000, 'This sherwani features Amir Adnan signature outfit.', 'L', 'sherwani4.jpg', 1, 10),
(13, 'Beige Scalloped', 10000, 'Machine Embroidered Scallops with Tila and Resham.', 'XS', 'sherwani5.jpg', 1, 10),
(14, 'Black Tropical', 12000, 'Black Woven Fabric', 'XL', 'sherwani6.jpg', 1, 10),
(15, 'Black Velvet', 11000, 'Black Velvet Fabric (Imported)', 'M', 'sherwani7.jpg', 1, 10),
(16, 'Kashmiri Karandi', 13000, 'Paired with Brown Velvet Shawl with Resham.', 'L', 'sherwani8.jpg', 1, 10),
(17, 'F1875', 3800, 'Elegant SilverSaree', 'M', 'saree.jpg', 3, 5),
(18, 'Scintllant (FR-389)', 90000, 'Emerald lehenga radiates with zardosi and luminous pearls, a captivating aura of glamour.', 'XS', 'elan.jpg', 7, 13),
(19, 'Minvera (AB4)', 50000, 'bisque coloured sharara printed with a pearl river border', 'M', 'elan1.jpg', 7, 13),
(20, 'Freya', 40000, 'Perfect for a bride who wants to create a phenomenal statement.', 'L', 'elan2.jpg', 7, 13),
(21, 'Irene', 70000, 'Handcrafted paneled lehnga featuring thousands of metallic threads.', 'XL', 'ELAN3.JPG', 7, 13),
(22, 'Setareh', 55000, 'Dusty rose pink organza angrakha.', 'XS', 'elan4.jpg', 7, 13),
(23, 'Omairah', 35000, 'A net kalidar pishwas with a cherry pink bodice on raw silk embellished with silk and gold.', 'XS', 'elan5.jpg', 7, 13),
(24, 'Cristal Etoile', 80000, 'Cristal Etoile epitomizes luxury with its luxuriously frosted tulle.', 'XS', 'ELAN6.JPG', 7, 13),
(25, 'Esme', 75000, 'Get ready to sparkle in Esme.', 'XS', 'elan7.jpg', 7, 13),
(26, 'Rose Dior', 15000, 'Radiate joy and elegance with Rose Dior.', 'S', 'elan8.jpg', 7, 13),
(27, 'SS24FOR230P2T', 30000, 'Draped in charming hues and feminine aura.', 'S', 'sana1.jpg', 7, 14),
(28, 'SS24FOR229P2T', 15000, 'Murmurs of artistry meander across an ebony landscape, crafting a tapestry of elegance.', 'M', 'sana2.jpg', 7, 14),
(29, 'SS24FOR245P2T', 10000, 'An enticing modern framing accented with exquisite details.', 'L', 'sana3.jpg', 7, 14),
(30, 'SS24FOR232P2T', 22000, 'Meticulous details bestow an air of elegance upon the beautifully printed silhouette.', 'XS', 'sana5.jpg', 7, 14),
(31, 'SS24FOR218P2T', 40000, 'Yards of contemporary finesse whisper visionary allure.', 'XS', 'sana4.jpg', 7, 14),
(32, 'SS24FOR186P3', 23000, 'SS24FOR186P3', 'L', 'sana6.jpg', 7, 14),
(33, 'ZC-3098', 13000, 'Long shirt with an aqua scalloped dupatta and slim-fit pants.', 'S', 'zara.jpg', 7, 15),
(34, 'ZC-3097', 35000, 'Lehenga beautified by dainty details and embroidered with the utmost love and care.', 'L', 'zara2.jpg', 7, 15),
(35, 'ZC-3089', 40000, 'An aqua lehenga beautified by naqshi, zardozi, and golden applique details. ', 'S', 'zara1.jpg', 7, 15),
(36, 'ZC-4003', 18000, ' Silk lehenga, this ensemble features a dupatta', 'S', 'zara3,jpg.webp', 7, 15),
(37, 'ZC-3069', 17000, 'A rose pink organza panel kurta with gazette sleeves.', 'XL', 'zara4.jpg', 7, 15),
(38, 'ZC-3064', 45000, 'A red peshwas with an embroidered chevron pattern along the panels and bodice. ', 'XS', 'zara5.jpg', 7, 15),
(39, 'Jahan', 14000, 'Cream yellow organza shirt with ', 'S', 'suffuse.jpg', 7, 16),
(40, 'Naira', 33000, 'Neckline shirt thats emebllished with pants and Dupatta.', 'XS', 'suffuse1.jpg', 7, 16),
(41, 'Voila', 27000, 'Long lilac organza shirt with pants and Dupatta.', 'S', 'suffuse2.jpg', 7, 16),
(42, 'Ana', 42000, 'Printed Draped Boysenberry Saree.', 'M', 'suffuse3.jpg', 7, 16),
(43, 'Irene', 38000, 'Short Floral Heavy Shirt with net Sharara pants.', 'S', 'suffuse4.jpg', 7, 16),
(44, 'Zofia', 52000, 'Black Long Shirt with Draped Dupata and heavy Belt.', 'XS', 'suffuse5.jpg', 7, 16),
(45, 'Azeen', 66000, 'Peshwas, Dupatta & Lehnga.', 'XS', 'SANIA.JPG', 7, 17),
(46, '', 70000, 'Handcrafted techniques in traditional zardoze and intricate thread and sequin work.', 'M', 'SANIA1.JPG', 7, 17),
(47, 'Huma', 64000, 'Richly crafted in traditional techniques, this mint net peshwas is the embodiment of utmost charm.', 'S', 'SANIA2.JPG', 7, 17),
(48, 'Jazmin', 49000, 'Net dupatta with sequin and zardoze work.', 'XS', 'sania3.jpg', 7, 17),
(49, 'Aarkhe', 67900, 'Crushed lehnga with gold details and a cotton net dupatta.', 'M', 'sania5.jpg', 7, 17),
(50, 'Mira', 100000, 'chunri dupatta in shades of hot pink and red with kamdaani and zardoze work.', 'L', 'sania6.jpg', 7, 17),
(51, 'Evia', 25000, 'An Red elegant pre draped ivory saree.', 'S', 'redsaree.jpg', 3, 5),
(52, 'Layered White', 27000, 'Ivory Net Long Layered Saree.', 'M', 'saree1.jpg', 3, 5),
(53, 'Solid Velvet Luxury Saree', 14000, '\r\nHandwork Embroidered Solid Velvet Luxury Saree | ZEENAT ', 'XS', 'saree3.jpg', 3, 5),
(54, 'SF-PF24-08', 15000, 'Embroidered Organza Saree', 'M', 'saree4.jpg', 3, 5),
(55, 'Vanya', 30000, 'Charming nude net saree with organza frill detailing.', 'XS', 'saree6.jpeg', 3, 5),
(56, 'SHK-1133', 20000, 'Handworked Garara Pink Ensemble.', 'S', 'gharara.jpg', 3, 6),
(57, 'SHK-901', 0, 'Black velvet shirt with silver & gold detailing with jamavar gharara.', 'M', 'gharara1.jpg', 3, 6),
(58, 'SHK-662', 18000, 'Off-White Chikankari Shirt.', 'XS', 'gharara2.jpg', 3, 6),
(59, 'Chandni', 25000, 'The trailing gharara is also adorned with intricate border, motifs & heavy embroidery. ', 'L', 'gharara33.jpg', 3, 6),
(60, 'Rang Mahal', 19000, 'The gharara boasts colorful , making it a captivating choice for any occasion. ', 'XL', 'gharara4.jpg', 3, 6),
(61, 'Isbah', 15000, 'Paired with paneled gharara with details in each panel line with embroidered & detailed border.', 'XL', 'gharara5.jpg', 3, 6),
(62, 'Esme Neue', 15600, ' Paired with a shimmer light peach lehnga and shirt with a mokaish dupatta.', 'S', 'lehenga.jpg', 3, 7),
(63, 'Nehal', 16000, 'Embellished chiffon lehenga choli with dupatta.', 'L', 'lehenga1.jpg', 3, 7),
(64, 'Delal', 17000, 'Embroidered lehnga choli with dupatta', 'M', 'lehenga2.jpg', 3, 7),
(65, 'Saleha', 12000, 'The outfit comes with chiffon dupatta with four sided accent border.', 'M', 'lehenga3.jpg', 3, 7),
(66, 'Suhana', 23000, 'Lehnga, Choli, Dupatta.', 'XS', 'lehenga4.jpg', 3, 7),
(67, 'MH-03', 31000, 'Organza Embroidered hand made lehenga and choli.', 'L', 'lehenga5.jpg', 3, 7),
(68, 'MR24', 14000, 'Indulge in elegance with this stunning outfit', 'XS', 'maxi.jpg', 3, 9),
(69, 'Tierra', 16000, ' Crafted from exquisite Korean raw silk.', 'M', 'maxi1.jpg', 3, 9),
(70, 'FRD2', 2500, 'Elegant White Eastern maxi.', 'L', 'wmaxi.jpg', 3, 9),
(71, 'LFY66', 15000, 'Emberoided long eastern maxi.', 'L', 'maxi0.jpg', 3, 9),
(72, 'FRG99', 33000, 'Elegant long eastern maxi.', 'S', 'maxi3.jpg', 3, 9),
(73, 'Mehreen', 36000, 'Maxi Paired with long embellished dupatta', 'XS', 'max44.jpg', 3, 9),
(74, 'Muntaha', 40000, 'Elegant pishwas, Lehenga, Dupatta for birdal.', 'XS', 'bridal.jpg', 2, 2),
(75, 'Sartaaj', 60000, 'The paneled organza lehnga consists of motifs enhanced with sitara, dabka, and naqshi.', 'S', 'brdal2.jpg', 2, 2),
(76, 'Hera', 65000, 'Three piece stitched outfit including pashwas, lehnga and duppatta. it is in red color.', 'M', 'bridal1.jpg', 2, 2),
(77, 'Royal Sceptre', 90000, 'The shirt is worn with an exquisite lehenga with a beautifully detailed and hand-embellished 3D work.', 'L', 'bridal3.jpg', 2, 2),
(78, 'Jhoomar', 80000, 'Bridal Traditionally Embroidered Lehenga Choli with Dupatta in Net.', 'XS', 'bridal6.jpg', 2, 2),
(79, 'Nazakat', 77000, 'Bridal Embroidered Maroon Lehnga Choli with a Net Dupatta.', 'XL', 'bridal5.jpg', 2, 2),
(80, 'Khuwaab', 60000, 'Off-White Regal Bridal Gown with a Net Veil', 'L', 'valima.jpg', 2, 3),
(81, 'Classic Valima', 55000, 'Embroidered Front-open Gown with a Lehenga.', 'M', 'valima1.jpg', 2, 3),
(82, 'Bulbul', 20000, 'It is layered with Lehnga with exquisite borders and soft silk tissue dupatta.', 'XL', 'valima2.jpg', 2, 3),
(83, 'AKB22-9', 38000, 'Part of the AMMARA KHAN hierloom series.', 'S', 'valima3.jpg', 2, 3),
(84, 'Gown and Veil', 50000, 'Reception Valima Bridal Gown and Veil.', 'XS', 'valima4.jpg', 2, 3),
(85, 'AKR33', 33690, 'Blush Pink and Silver Dreamy Bridal Peshwas Set', 'L', 'VALIMA5.JPG', 2, 3),
(86, 'BR-04A', 15000, 'Ivory and Gold Gharara Set - With Light Dupatta', 'XS', 'NIKAH.JPG', 2, 4),
(87, 'AKB22', 25000, 'Simply beautiful for a Nikah bride.', 'S', 'NIKAH1.JPG', 2, 4),
(88, 'Sapphire', 65000, 'The plum net with chan and a heavily worked Nikah dress.', 'M', 'nikah2.jpg', 2, 4),
(89, '  Imaan Ivory', 75000, 'A timeless nikah bridal, to be loved and cherished for generations to come.', 'L', 'nikah3.jpg', 2, 4),
(90, 'Jahan', 15000, '3 Piece Embroidered nikah dress with emberioded.', 'XL', 'nikah4.jpg', 2, 4),
(91, 'Anya', 45000, 'Paired with a magnificent raw silk pants designed with small motifs over it and a gleaming net dupatta.', 'S', 'NIKAH5.JPG', 2, 4),
(92, 'Blue ', 16000, 'Junaid wears three piece ensemble from JEEM’s formal edit ‘23.', 'XS', 'mformal.jpg', 1, 11),
(93, 'Green', 12000, 'Paired here with mirrored waist coat and Korean raw silk trouser shirt.', 'S', 'mformal1.jpg', 1, 11),
(94, 'Beige', 16000, 'Three piece outfit with gold sequins waist coat and Korean beige trouser shirt.', 'M', 'MFORMAL2.JPG', 1, 11),
(95, 'Silk Dark Green', 15000, 'Weaved Silk Dark Green Straight Cut Mens Kurta Pajama', 'L', 'MFORMAL3.JPG', 1, 11),
(96, 'Dark Brown Georgette', 10000, 'Dark Brown Georgette Embroidered Straight Cut Mens Kurta Pajama.', 'XL', 'mformal4.jpg', 1, 11);

-- --------------------------------------------------------

--
-- Stand-in structure for view `productdata`
-- (See below for the actual view)
--
CREATE TABLE `productdata` (
`pro_id` int(255)
,`pro_name` varchar(255)
,`pro_desc` varchar(255)
,`pro_price` int(255)
,`pro_size` varchar(255)
,`pro_img` varchar(255)
,`cat_id` int(255)
,`cat_name` varchar(255)
,`subid` int(255)
,`subname` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subid` int(255) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `subid_fk` int(255) NOT NULL,
  `subimg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subid`, `subname`, `subid_fk`, `subimg`) VALUES
(1, 'MEHENDI', 2, 'MEHENDISUB.jpeg'),
(2, 'BARAAT', 2, 'baraatscat.jpg'),
(3, 'VALIMAA', 2, 'valimascat.jpeg'),
(4, 'NIKAH', 2, 'nikaahscat.jpg'),
(5, 'SAREES', 3, 'sareeformal.jpg'),
(6, 'GHARARAS', 3, 'ghararasscat.jpeg'),
(7, 'LENHENGAS', 3, 'lehengasscat.jpg'),
(9, 'MAXIS', 3, 'FAIRYTALESCAT.jpeg'),
(10, 'SHERWANI', 1, 'MENSSCATSHERWANI.JPG'),
(11, 'MEN FORMAL', 1, 'FORMALSCAT.JPG'),
(13, 'ELAN', 7, 'CHINYERE_FR-389_720x.jpg'),
(14, 'SANA SAFINAZ', 7, 'sana1.jpg'),
(15, 'ZARA SHAHJAHAN', 7, 'zara.jpg'),
(16, 'SUFFUSE', 7, 'suffuse.jpg'),
(17, 'SANIA MASKATIYA', 7, 'SANIA.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'taha', 'taha@gmail.com', '1111'),
(2, 'QURAT', 'qurat12@gmail.com', '2222'),
(3, 'taha tm', 'muhammadtaha3713@gmail.com', '123'),
(4, 'HAMZA', 'hamzayousufzai12@gmail.com', '1212'),
(5, 'QURATT', 'quratulainbutt377@gmail.com', '1111'),
(6, 'JANNAT', 'jannat@gmail.com', '123');

-- --------------------------------------------------------

--
-- Structure for view `orderdetailsview`
--
DROP TABLE IF EXISTS `orderdetailsview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orderdetailsview`  AS SELECT `o`.`order_id` AS `order_id`, `o`.`order_pro` AS `order_pro`, `o`.`order_quantity` AS `order_quantity`, `o`.`order_price` AS `order_price`, `o`.`order_delivery` AS `order_delivery`, `o`.`order_return` AS `order_return`, `o`.`order_cuser` AS `order_cuser`, `o`.`order_status` AS `order_status`, `o`.`cid_fk` AS `checkout_id`, `c`.`c_name` AS `c_name`, `c`.`c_city` AS `c_city`, `c`.`c_address` AS `c_address`, `c`.`c_postcode` AS `c_postcode`, `c`.`c_phone` AS `c_phone`, `c`.`c_email` AS `c_email`, `c`.`c_ordernotes` AS `c_ordernotes`, `c`.`c_payment` AS `c_payment` FROM (`orders` `o` join `checkout` `c` on(`o`.`cid_fk` = `c`.`c_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `productdata`
--
DROP TABLE IF EXISTS `productdata`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `productdata`  AS SELECT `p`.`pro_id` AS `pro_id`, `p`.`pro_name` AS `pro_name`, `p`.`pro_desc` AS `pro_desc`, `p`.`pro_price` AS `pro_price`, `p`.`pro_size` AS `pro_size`, `p`.`pro_img` AS `pro_img`, `c`.`cat_id` AS `cat_id`, `c`.`cat_name` AS `cat_name`, `s`.`subid` AS `subid`, `s`.`subname` AS `subname` FROM ((`product` `p` join `category` `c` on(`p`.`pro_catidfk` = `c`.`cat_id`)) join `subcategory` `s` on(`p`.`pro_subidfk` = `s`.`subid`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `lenders`
--
ALTER TABLE `lenders`
  ADD PRIMARY KEY (`l_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cid_fk` (`cid_fk`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `pro_catidfk` (`pro_catidfk`),
  ADD KEY `product_ibfk_1` (`pro_subidfk`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subid`),
  ADD KEY `subid_fk` (`subid_fk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `c_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lenders`
--
ALTER TABLE `lenders`
  MODIFY `l_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cid_fk`) REFERENCES `checkout` (`c_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pro_subidfk`) REFERENCES `subcategory` (`subid`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`subid_fk`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

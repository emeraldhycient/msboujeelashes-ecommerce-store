-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 26, 2021 at 03:41 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msboujeelashes`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sendername` text NOT NULL,
  `senderemail` varchar(255) NOT NULL,
  `messages` text NOT NULL,
  `sentOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sendername`, `senderemail`, `messages`, `sentOn`) VALUES
(1, 'timmy tunner', 'fizzygunner@gmail.com', 'how much is the baby girl season v2', '2021-06-24 23:11:23'),
(2, 'timmy tunner', 'fizzygunner@gmail.com', 'how much is the baby girl season v2', '2021-06-24 23:11:28'),
(3, 'christopher sochima', 'christophersochima43@gmail.com', 'i am testing to be sure it works', '2021-06-24 23:14:12'),
(4, 'timmy tunner', 'fizzygunner@gmail.com', 'definitly tesing this again', '2021-06-24 23:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `productid` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `createdAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderid`, `productid`, `productname`, `qty`, `full_address`, `full_name`, `email`, `createdAt`) VALUES
(1, '60d4a577a9ffe', '234', '3dlashes long', 23, '4 edidi street', 'hycient', 'igwezehycient86@gmail.com', '2021-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `createdAt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `userid`, `pname`, `price`, `qty`, `category`, `image1`, `image2`, `image3`, `details`, `createdAt`) VALUES
(1, 'hsyevetdbe', '3d long eye lashes', 2000, 200, '3D_Eyelashes', '60d27db0313fd.png', 'gddhjkbmc.jpg', 'gddhjkbmc.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor', '0002-03-21'),
(3, '60d27b4947284', 'hycient wetfire', 2346, 4, '3D_Eyelashes', '60d28e244e9d2.png', '60d28e244e9dc.png', '60d28e244e9e4.png', '<p>Sed ut perspiciatis unde <strong><em><s>omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit</s></em></strong>, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit q</p>\n', '2021-06-23'),
(4, '60d27b4947284', 'Arinola', 3456787, 23, 'Human_hair', '60d2904a663ee.png', '60d2904a663f7.png', '60d2904a663fb.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>\n', '2021-06-23'),
(5, '60d27b4947284', 'Arinola newly', 3456787, 23, 'Human_hair', '60d290ec1c5a9.png', '60d290ec1c5b8.png', '60d290ec1c5c0.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>\n', '2021-06-23'),
(6, '60d27b4947284', 'Arinola con', 754678, 4, '3D_Eyelashes', '60d2912294f9b.png', '60d2912294fa8.png', '60d2912294fb0.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>\n', '2021-06-23'),
(8, '60d27b4947284', 'olivia 2', 2345678, 34, 'Human_hair', '60d292156e37c.png', '60d292156e39b.png', '60d292156e3a9.png', '<p>Talk about this Great Product in details...Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>\n', '2021-06-23'),
(9, '60d27b4947284', 'hycient wetfire', 43563, 23, 'Human_hair', '60d31e1c6ab59.png', '60d31e1c6ab66.png', '60d31e1c6ab6f.png', '<p><strong>&quot;Lorem&nbsp;ipsum&nbsp;dolor&nbsp;sit&nbsp;amet,&nbsp;co</strong>nsectetur&nbsp;adipiscing&nbsp;elit,&nbsp;sed&nbsp;do&nbsp;eiusmod&nbsp;tempor&nbsp;incididunt&nbsp;ut&nbsp;labore&nbsp;et&nbsp;dolore&nbsp;magna&nbsp;aliqua.&nbsp;Ut&nbsp;enim&nbsp;ad&nbsp;minim&nbsp;veniam,&nbsp;quis&nbsp;nostrud&nbsp;exercitation&nbsp;ullamco&nbsp;laboris&nbsp;nisi&nbsp;ut&nbsp;aliquip&nbsp;ex&nbsp;ea&nbsp;commodo&nbsp;consequat.&nbsp;Duis&nbsp;aute&nbsp;irure&nbsp;dolor</p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;in&nbsp;reprehenderit&nbsp;in&nbsp;voluptate&nbsp;velit&nbsp;esse&nbsp;cillum&nbsp;dolore&nbsp;eu&nbsp;fugiat&nbsp;nulla&nbsp;pariatur.&nbsp;Excepteur&nbsp;sint&nbsp;occaecat&nbsp;cupidatat&nbsp;non&nbsp;proident,&nbsp;sunt&nbsp;in&nbsp;culpa&nbsp;qui&nbsp;officia&nbsp;deserunt&nbsp;mollit&nbsp;anim&nbsp;id&nbsp;est&nbsp;laborum</p>\n', '2021-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `sociallinks`
--

CREATE TABLE `sociallinks` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sociallinks`
--

INSERT INTO `sociallinks` (`id`, `email`, `phone`, `whatsapp`, `facebook`, `instagram`, `userid`) VALUES
(1, 'ms.boujeelasheshair@gmail.com', '+1-202-555-0168', 'mywa.link/03i10z3a', 'https://facebook.com/example.name/', 'https://www.instagram.com/examplename/', '60d27b4947284');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userid`, `email`, `pass`, `createdAt`) VALUES
(1, '60d27b4947284', 'ms.boujeelasheshair@gmail.com', '$2y$10$Eg2mQ/IWB9cdlVu03M.TmunPMDyuJSHTKviS3WwWni0.ASL3ApAoK', '2021-06-21 09:23:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sociallinks`
--
ALTER TABLE `sociallinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sociallinks`
--
ALTER TABLE `sociallinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

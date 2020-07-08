-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 21, 2020 at 01:04 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awesome_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `is_feature` tinyint(1) NOT NULL DEFAULT 0,
  `resource_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `product_id`, `sort`, `is_feature`, `resource_path`) VALUES
(1, 2, 1, 1, 'https://mob4g.com/wp-content/uploads/2019/11/iPhone-11-Pro-600x600.jpeg'),
(2, 3, 1, 1, 'https://www.climaxcomputer.com/wp-content/uploads/2019/11/mbp16touch-space-gallery1-201911_1_1.png'),
(3, 12, 1, 1, 'https://ae01.alicdn.com/kf/H4a9ed718498148e1894d867a629f0ca88/WENYUJH-2020-Elegant-Shoulder-Bag-Women-Designer-Luxury-Handbags-Women-Bags-Plum-Bow-Sweet-Large-Capacity.jpg'),
(4, 11, 1, 0, 'https://i.ytimg.com/vi/_LpYM6f7kuE/maxresdefault.jpg'),
(5, 8, 1, 1, 'https://photos6.spartoo.eu/photos/764/7646428/7646428_1200_A.jpg'),
(6, 10, 1, 1, 'https://res.cloudinary.com/everlane/image/upload/c_scale/c_fill,dpr_3.0,f_auto,g_face:center,q_auto,w_auto:50:412/v1/i/e4da3047_059a.jpg'),
(7, 16, 1, 1, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MLA02?wid=1144&hei=1144&fmt=jpeg&qlt=80&op_usm=0.5,0.5&.v=1564098735372'),
(8, 13, 1, 1, 'https://contestimg.wish.com/api/webimage/5ac46fb62d659f717824ff35-large.jpg?cache_buster=223eede8e3d5ce6f5b1d611d60876b08'),
(9, 15, 1, 1, 'https://i.pinimg.com/originals/be/6c/79/be6c797f1fb6c158df81514d1c428a3b.jpg'),
(10, 7, 1, 0, 'https://wishworthstudio.com/wp-content/uploads/2019/05/Two-Button-Wallet.jpg'),
(11, 14, 1, 0, 'https://images-na.ssl-images-amazon.com/images/I/615JGqIsH-L._AC_SL1094_.jpg'),
(12, 4, 1, 1, 'https://www.brandfield.com/media/catalog/product/cache/image/9df78eab33525d08d6e5fb8d27136e95/1/0/10020-03884-os_01-medium.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `parent_id`) VALUES
(1, 'Electronic', 'laptop.svg', 1),
(2, 'Hand_bags', 'shopping-bag.svg', 2),
(3, 'Wallete', 'wallet.png', 3),
(4, 'Cloth', 'cotton.svg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `description`, `image`) VALUES
(1, 'Shop your designer dresses', 'Ready to wear dereses tailored for you from online. Hurry up while stock tasks.', 'feature.jpg'),
(2, 'Shop your designer dresses', 'Ready to wear dereses tailored for you from online. Hurry up while stock tasks.', 'feature2.jpg'),
(3, 'Shop your designer dresses', 'Ready to wear dereses tailored for you from online. Hurry up while stock tasks.', 'feature3.jpg'),
(4, 'Shop your designer dresses', 'Ready to wear dereses tailored for you from online. Hurry up while stock tasks.', 'feature4.jpg'),
(5, 'Shop your designer dresses', 'Ready to wear dereses tailored for you from online. Hurry up while stock tasks.', 'feature5.jpg'),
(6, 'Shop your designer dresses', 'Ready to wear dereses tailored for you from online. Hurry up while stock tasks.', 'feature6.jpg'),
(7, 'Shop your designer dresses', 'Ready to wear dereses tailored for you from online. Hurry up while stock tasks.', 'feature7.jpg'),
(8, 'Shop your designer dresses', 'Ready to wear dereses tailored for you from online. Hurry up while stock tasks.', 'feature8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `imgID` int(11) NOT NULL AUTO_INCREMENT,
  `imgUrl` varchar(200) NOT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`imgID`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images_content`
--

DROP TABLE IF EXISTS `images_content`;
CREATE TABLE IF NOT EXISTS `images_content` (
  `img_content_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `image_url` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`img_content_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `discount` tinyint(4) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `amount`, `discount`, `description`, `category_id`) VALUES
(2, 'Iphone 11 Max Pro', '1000', 10, 10, 'New', 1),
(3, 'Max Book Pro', '1500', 10, 10, 'New', 1),
(4, 'Bag Series 10020', '50', 20, 15, 'New', 2),
(7, 'Wallet Model 1048', '50', 10, 10, 'New', 3),
(8, 'T-shirt', '10', 10, 5, 'New', 4),
(10, 'Jean', '10', 10, 5, 'New', 4),
(11, 'Wallet Series MSI', '50', 10, 10, 'New', 3),
(12, 'Bag Woman Series Gold', '100', 5, 5, 'New', 2),
(13, 'Bag Man Series 10020', '100', 20, 20, 'New', 2),
(14, 'Wallet Girl Model 1048', '100', 20, 20, 'New', 3),
(15, 'Sport T-shirt', '15', 100, 10, 'New', 4),
(16, 'Magic mouse', '160', 50, 5, 'New', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE IF NOT EXISTS `product_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `written_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_histories`
--

DROP TABLE IF EXISTS `visitor_histories`;
CREATE TABLE IF NOT EXISTS `visitor_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `visiting_page` varchar(50) DEFAULT NULL,
  `impress` varchar(50) DEFAULT NULL,
  `visitor_device` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`id`) REFERENCES `post` (`id`);

--
-- Constraints for table `images_content`
--
ALTER TABLE `images_content`
  ADD CONSTRAINT `images_content_ibfk_1` FOREIGN KEY (`id`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

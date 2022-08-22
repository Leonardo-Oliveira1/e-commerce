-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2022 at 12:24 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(60) NOT NULL,
  `product_image` varchar(60) NOT NULL,
  `product_description` text NOT NULL,
  `product_author` varchar(16) NOT NULL,
  `product_seller` varchar(16) NOT NULL,
  `product_rating` int(3) NOT NULL,
  `product_price` float NOT NULL,
  `product_category` varchar(32) NOT NULL,
  `seller_id` int(4) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_description`, `product_author`, `product_seller`, `product_rating`, `product_price`, `product_category`, `seller_id`) VALUES
(38, 'Harry Potter e a pedra filosofal', '5948123e42f1a7965f0128c2d8eab46e.jpg', 'Detergentes da marca OMO para a venda', ' J.K. Rowling', 'Leonardo', 0, 24, 'Books', 0),
(40, 'RelÃ³gio Led Digital, Champion, Feminino', 'fadfad5bb15c509b745031976f4821d9.jpg', 'a', 'Champion', 'Elister JÃ³ias', 0, 191, 'Accessories', 0),
(44, 'Samsung S21, branco', '3eef79b420f97a99bc13480d8b982bb1.jpg', 'Smart', 'Samsung', 'Igor', 0, 2500, 'Eletronics', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(18) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(64) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `isSeller` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `zipcode`, `isSeller`) VALUES
(1, 'Leonardo', 'oleonardo78@gmail.com', 'leonardo', 'Rua dos Alfeneiros', 59070162, 1),
(2, 'Teste', 'fulano20300@gmail.com', 'testeee', 'kdpvaokdqopvdwqk', 144744154, 1),
(8, 'Teste2', 'teste@gmail.com', 'teste2', 'teste2', 344535, 1),
(9, 'leo', 'leonardo88@gmail.com', '1234', 'R Morro do zÃ©', 59073165, 1),
(10, 'SimSim', 'sim@gmail.com', 'leonardo', 'sssssss', 32453, 0),
(11, 'leo', 'aaaaaaaaa@gmail.com', 'leonardo', 'fdbsfs', 32435, 1),
(12, 'tessteee', 'leonardo99@gmail.com', 'leonardo2006', 'hueuhehue', 535666, 0),
(13, 'leo', 'salveee@gmail.com', 'leonardo', 'kdsaovfkao', 435666, 0),
(14, 'testeaaa', 'testeaaa@gmail.com', 'leonardo', 'leokvopfak', 3245555, 0),
(15, 'testeeee432', 'testeeee432@gmail.com', 'leonardo2006', 'dlpaskdvopwq', 434555, 0),
(16, 'tes4343432543', 'tes4343432543@gmail.com', 'leonardo', 'leonardo', 32435, 0),
(17, 'leoDSA', '4343@gmail.com', 'leonardo2005', 'leokvopfak', 3424535, 0),
(18, 'testeeee432', 'testeeee432testeeee432@gmail.com', 'ldwqkvdwqop', 'leao', 3245435, 0),
(19, 'leo', 'dkwopqvdkopwq@gmail.com', 'lenoardo', 'lewakvoa', 4325345, 0),
(20, 'leo', 'd43kwopqvdkopwq@gmail.com', '3234243', 'lewakvoa', 4325345, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

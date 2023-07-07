-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 06, 2023 at 12:51 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author`, `content`, `slug`, `title`, `created`, `updated`) VALUES
(46, 'Beau van \'t Oever', 'Hey everyone! Today, I want to talk about the Audi RS6, a true masterpiece of automotive engineering. From its stunning design to its impressive performance, this car never fails to leave a lasting impression.\r\n\r\nUnderneath the hood, the Audi RS6 packs a powerful punch. With its twin-turbocharged V8 engine, it unleashes an astonishing amount of horsepower and torque, propelling you from 0 to 60 mph in a matter of seconds. It\'s a thrilling experience that will make your heart race every time you step on the accelerator.\r\n\r\nBut it\'s not just about speed. The Audi RS6 also offers exceptional handling and precise steering, allowing you to navigate corners with confidence and grace. Whether you\'re taking it for a spin on the open road or tackling tight turns on a track, this car delivers an exhilarating driving experience that is second to none.\r\n\r\nWhen it comes to design, the Audi RS6 is a head-turner. Its sleek and aggressive lines, combined with its bold grille and muscular stance, make a statement wherever it goes. Step inside, and you\'ll be greeted by a luxurious and technologically advanced interior that wraps you in comfort and sophistication.\r\n\r\nSo, if you\'re looking for a car that combines power, performance, and style, the Audi RS6 is a fantastic choice. It\'s a true embodiment of automotive excellence that will make every drive an unforgettable experience.', 'audi-rs6-review-beau-van-t-oever', ' Unleashing Power and Style: A Review of the Audi RS6', '2023-06-27 08:59:14', '2023-07-06 09:48:19'),
(49, 'doei;', 'doei', 'doei', 'doei', '2023-07-06 12:19:57', '2023-07-06 12:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(9, 'beau', 'beauvantoever@gmail.com', '$2y$10$g30mz7arq7HvZUTxyITz8umJsES670TjkLUhpaS9GpZhDzdborsAq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

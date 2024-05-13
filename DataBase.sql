-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2024 at 11:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commercephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
                         `id` int NOT NULL,
                         `pseudo` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `email`, `motdepasse`) VALUES
    (77, 'SDKDIEUDEWISHAZON', 'SDK@gmail.com', 'sdk');

-- --------------------------------------------------------

--
-- Table structure for table `paniers`
--

CREATE TABLE `paniers` (
                           `PanierID` int NOT NULL,
                           `UserID` int NOT NULL,
                           `Price` int NOT NULL,
                           `IsValidate` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
                            `productID` int NOT NULL,
                            `Nom` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                            `Image` text NOT NULL,
                            `Description` varchar(256) NOT NULL,
                            `Prix` int NOT NULL,
                            `QuantitéRestante` int NOT NULL,
                            `Is_Enabled` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `Nom`, `Image`, `Description`, `Prix`, `QuantitéRestante`, `Is_Enabled`) VALUES
                                                                                                                  (1, 'Voiture', 'https://api.checkcar.vin/storage/uploads/wysiwyg/3810bd40a23b5a83372e797030ffa432809a.jpg', 'Voiture de qualité en très bon état tkt', 120000, 2, 1),
                                                                                                                  (2, 'Nintengo Sitch', 'https://nintendosoup.com/wp-content/uploads/2020/08/fake-nintendo-switch-pro-aug302020.jpg', 'C\'est une authentique nintendo switch', 820, 3, 1),
(3, 'casque filaire', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIb6mHZUAl37yp6jinZsEKXXkcnT_w79OMEFXczpqo9Q&s', 'bah c\'est un casque quoi tu veux que j\'dise quoi de plus?', 2048, 12, 1),
(4, 'Ce site', 'https://graphiste.com/blog/wp-content/uploads/sites/4/2022/12/world-worst-website-1024x544.png', 'Personne en veux de toute façon même pour le prix :\'(', 1, 1, 1),
                                                                                                                  (7, 'Chronus', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-WicOg8ZV4l-BIIqyUlyqN9T9XmBdqsguaQ&amp;usqp=CAU', 'dgsf', 111, 3, 0),
                                                                                                                  (16, 'chario', 'https://img-0.journaldunet.com/JgOAEEaKp00acGdrktPUB8Y2__8=/1500x/smart/32d90de13a5f411c86709152f70fc67c/ccmcms-jdn/10861192.jpg', 'C&#039;est un chariot pas très cher quoi', 11123, 64, 0),
                                                                                                                  (17, 'article test', 'https://img-0.journaldunet.com/JgOAEEaKp00acGdrktPUB8Y2__8=/1500x/smart/32d90de13a5f411c86709152f70fc67c/ccmcms-jdn/10861192.jpg', 'tewstggtgttghuhgbhnj', 4, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_paniers`
--

CREATE TABLE `products_paniers` (
                                    `userid` int NOT NULL,
                                    `productid` int NOT NULL,
                                    `panierid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `user_id` int NOT NULL,
                        `Name` varchar(256) NOT NULL,
                        `email` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                        `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                        `Admin?` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `Name`, `email`, `password`, `Admin?`) VALUES
                                                                          (1, 'Admin', 'admin@gmail.com', 'admin', 1),
                                                                          (2, 'Client1', 'client1@gmail.com', 'client1', 0),
                                                                          (3, 'Client 2', 'client2@gmail.com', 'client2', 0),
                                                                          (4, 'Client 3', 'client3gmail.com', 'client3', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
    MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `productID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

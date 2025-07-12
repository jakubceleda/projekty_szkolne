-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 12:43 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobbyn_baza`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `newsletter_users`
--

CREATE TABLE `newsletter_users` (
  `id_nlt_usr` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `new_products` tinyint(1) NOT NULL DEFAULT 1,
  `promotions` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter_users`
--

INSERT INTO `newsletter_users` (`id_nlt_usr`, `email`, `new_products`, `promotions`) VALUES
(1, 'test@test', 1, 1),
(2, 'test2@test', 0, 0),
(3, 'test2@test2', 0, 0),
(4, 'test2@test2', 0, 0),
(5, '22@11', 0, 0),
(12, 'test@ewr', 0, 0),
(13, '412@errewt', 0, 0),
(14, '412@errewt', 0, 0),
(15, '23123@34234', 0, 0),
(16, '23123@34234', 0, 0),
(17, '23123@34234', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `prod_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `price` double NOT NULL,
  `rating` double DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `prod_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `name`, `description`, `price`, `rating`, `img`, `img2`, `prod_type`) VALUES
(1, 'Czapyn POPPYN', 'Deskorolska czapka\n\nCzapka z daszkiem. Haftowane logo. Produkowana w Polsce. 100% bawełny, gramatura 400gsm. One size fits all.', 120, 5, 'a_acs_czapapoppyn_front.png', NULL, 'accesories'),
(2, 'Hoodie Recycle ', 'Bluza damska. Grafika wykonana trwałą aplikacją dżetów. Produkowana w Polsce. 95% bawełny, 5% poliestru, gramatura 300gsm.', 250, 4.9, 'f_hoodie_hg_front.png', NULL, 'f_hoodie'),
(3, 'Hoodie A Milli Milli', 'Jak PM Cool Lee z Gdyni\r\n\r\nBluza męska. Nadruk wykonany sitodrukiem. Produkowana w Polsce. 100% bawełny, gramatura 280gsm', 300, 5, 'm_hoodie_amillimilli_front.png', 'm_hoodie_amillimilli_rear.png', 'm_hoodie'),
(4, 'Tees A Milli Milli', 'Zwijam specialties, a nie wodorosty\r\n\r\nKoszulka męska. Nadruk wykonany sitodrukiem. Produkowana w Polsce. 100% bawełny.', 160, 5, 'm_tees_amillimilli_front.png', NULL, 'm_tees'),
(5, 'Tees B.dawg H.A.U.', 'Znowu ktoś chce koszuleczke\r\n\r\nKoszulka męska. Nadruk wykonany sitodrukiem. Produkowana w Polsce. 100% bawełny.\r\n', 160, NULL, 'm_tees_hautee_front.png', 'm_tees_hautee_rear.png', 'm_tees'),
(6, 'Tees Hop On Piekarenka', 'Ide odwiedzić piekarenke, znalazłem klucze no to jestem.\n\nKoszulka męska. Nadruk wykonany sitodrukiem. Produkowana w Polsce. 100% bawełny.', 160, NULL, 'm_tees_piekarenka_black_front.png', NULL, 'm_tees'),
(7, 'Tees Piekarenka', 'Ja odpalam Poppyn merch, jestem jaki jestem\r\n\r\nKoszulka męska. Nadruk wykonany sitodrukiem. Produkowana w Polsce. 100% bawełny.', 160, NULL, 'm_tees_piekarenka_white_front.png', NULL, 'm_tees');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(64) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `passwd` varchar(64) NOT NULL,
  `admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `mail`, `passwd`, `admin`) VALUES
(1, 'ADMIN', 'ADMIN', 'adminadmin', 1),
(2, 'bartek', 'zbartek@bartek.pl', 'bartek', 0),
(3, 'bartek', 'zbartek@bartek.pl', 'bartek', 0),
(4, 'test', 'test@test', '123', 0),
(5, 'dasd', 'zbartek@bartek.pl', '234', 0),
(6, 'dasd', 'zbartek@bartek.pl', '234', 0),
(7, 'dasd', 'zbartek@bartek.pl', '234', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `newsletter_users`
--
ALTER TABLE `newsletter_users`
  ADD PRIMARY KEY (`id_nlt_usr`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsletter_users`
--
ALTER TABLE `newsletter_users`
  MODIFY `id_nlt_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

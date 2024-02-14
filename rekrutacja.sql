-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2024 at 07:00 PM
-- Wersja serwera: 10.4.28-MariaDB
-- Wersja PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekrutacja`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rekrutacja_uczen_tbl`
--

CREATE TABLE `rekrutacja_uczen_tbl` (
  `id` int(11) NOT NULL,
  `pesel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `imie` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `drugie_imie` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `nazwisko` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `kod_pocztowy` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `miejscowosc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `ulica_numer` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `szkola_podstawowa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `jezyk_wiodacy` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `wybor1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `wybor2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `wybor3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `egz_cz_humanistyczna` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `egz_cz_matematyczna` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `egz_cz_jezyk_obcy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `jezyk_polski` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `jezyk_obcy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `historia` varchar(100) DEFAULT NULL,
  `wos` varchar(100) DEFAULT NULL,
  `geografia` varchar(100) DEFAULT NULL,
  `chemia` varchar(100) DEFAULT NULL,
  `biologia` varchar(100) DEFAULT NULL,
  `matematyka` varchar(100) DEFAULT NULL,
  `informatyka` varchar(100) DEFAULT NULL,
  `swiadectwo_z_wyrozn` varchar(100) DEFAULT NULL,
  `osiagniecia` varchar(100) DEFAULT NULL,
  `wolontariat` varchar(100) DEFAULT NULL,
  `profil_akademicki` varchar(100) DEFAULT NULL,
  `profil_prozdrowotny` varchar(100) DEFAULT NULL,
  `profil_mundurowy` varchar(100) DEFAULT NULL,
  `profil_sportowo_turystyczny_sportowy` varchar(100) DEFAULT NULL,
  `profil_matematyczno_inzynieryjny` varchar(100) DEFAULT NULL,
  `profil_logistyczny` varchar(100) DEFAULT NULL,
  `profil_informatyczny` varchar(100) DEFAULT NULL,
  `profil_wielozawodowy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `rekrutacja_uczen_tbl`
--
ALTER TABLE `rekrutacja_uczen_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rekrutacja_uczen_tbl`
--
ALTER TABLE `rekrutacja_uczen_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 05:31 PM
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
  `id` int(255) NOT NULL,
  `pesel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `imie` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `drugie_imie` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `nazwisko` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `kod_pocztowy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `miejscowosc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `ulica_numer` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `szkola_podstawowa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `jezyk_wiodacy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `wybor1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `wybor2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `wybor3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `egz_cz_humanistyczna` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `egz_cz_matematyczna` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `egz_cz_jezyk_obcy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `jezyk_polski` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `jezyk_obcy` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `historia` varchar(100) NOT NULL,
  `wos` varchar(100) NOT NULL,
  `geografia` varchar(100) NOT NULL,
  `chemia` varchar(100) NOT NULL,
  `biologia` varchar(100) NOT NULL,
  `matematyka` varchar(100) NOT NULL,
  `informatyka` varchar(100) NOT NULL,
  `swiadectwo_z_wyrozn` varchar(100) NOT NULL,
  `osiagniecia` varchar(100) NOT NULL,
  `wolontariat` varchar(100) NOT NULL,
  `profil_akademicki` varchar(100) NOT NULL,
  `profil_prozdrowotny` varchar(100) NOT NULL,
  `profil_mundurowy` varchar(100) NOT NULL,
  `profil_sportowo_turystyczny_sportowy` varchar(100) NOT NULL,
  `profil_matematyczno_inzynieryjny` varchar(100) NOT NULL,
  `profil_logistyczny` varchar(100) NOT NULL,
  `profil_informatyczny` varchar(100) NOT NULL,
  `profil_wielozawodowy` varchar(100) NOT NULL
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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

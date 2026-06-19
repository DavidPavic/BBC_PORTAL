-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2026 at 09:57 AM
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
-- Database: `bbc_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'David', 'Pavić', 'david_test', '$2y$10$k.6zDuK4q3upXaSxz0EwkuYI88G0AGVqE/VgLHHNaW9A4e5gE49mW', 1),
(2, 'marko', 'tomic', 'marko_test', '$2y$10$RB2kQk4IRY3HyKPTI7hLz.gICRNWkHNK82.b98T7NyBXOk2uWVlum', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(255) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(255) NOT NULL,
  `kategorija` varchar(50) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(4, '18.06.2026', 'Cvjetna tržnica privukla velik broj posjetitelja', 'Posjetitelji su tijekom vikenda uživali u bogatoj ponudi cvijeća.', 'Posjetitelji su tijekom vikenda uživali u bogatoj ponudi cvijeća.', 'news1.jpg', 'novosti', 0),
(5, '18.06.2026', 'Unatoč digitalnom dobu, novine i dalje imaju čitatelje', 'Unatoč digitalnom dobu, novine i dalje imaju čitatelje', 'Unatoč digitalnom dobu, novine i dalje imaju čitatelje', 'news2.jpg', 'novosti', 0),
(7, '18.06.2026', 'Potražnja za nekretninama nastavlja rasti', 'Potražnja za nekretninama nastavlja rasti', 'Potražnja za nekretninama nastavlja rasti', 'news3.jpg', 'novosti', 0),
(8, '18.06.2026', 'Hrvatska reprezentacija ostvarila važnu pobjedu', 'Hrvatska je u napetoj utakmici ostvarila pobjedu i osvojila važne bodove.', 'Hrvatska reprezentacija ostvarila je važnu pobjedu nakon vrlo zanimljive i neizvjesne utakmice. Igrači su pokazali veliku borbenost i disciplinu tijekom cijelog susreta.\r\n\r\nIzbornik je nakon utakmice pohvalio momčad i istaknuo kako je zajedništvo bilo ključno za uspjeh. Navijači su zadovoljni prikazanom igrom te s optimizmom očekuju sljedeće nastupe reprezentacije.', 'sport3.jpg', 'sport', 0),
(9, '18.06.2026', 'Košarkaši izborili plasman u završnicu prvenstva', 'Odlična igra tijekom cijele sezone donijela je plasman među najbolje ekipe.', 'Košarkaška momčad izborila je plasman u završnicu prvenstva nakon uvjerljive pobjede u posljednjem kolu.\r\n\r\nTrener je naglasio kako su igrači tijekom cijele sezone naporno radili te zasluženo ostvarili ovaj uspjeh. Pred ekipom su sada najvažnije utakmice sezone.', 'sport2.jpg', 'sport', 0),
(10, '18.06.2026', 'Rukometaši ostvarili uvjerljivu pobjedu pred domaćom publikom', 'Domaća rukometna momčad upisala je važnu pobjedu nakon odlične igre tijekom cijelog susreta.', 'Rukometaši su pred ispunjenim tribinama ostvarili uvjerljivu pobjedu i pokazali odličnu formu uoči nastavka prvenstva. Tijekom cijele utakmice kontrolirali su rezultat te nisu dopustili protivnicima ozbiljniji povratak.\r\n\r\nPosebno se istaknuo vratar koji je obranio nekoliko ključnih udaraca, dok je napad predvodio najbolji strijelac momčadi s osam pogodaka. Trener je nakon susreta pohvalio zalaganje igrača i zahvalio navijačima na velikoj podršci.\r\n\r\nOvom pobjedom momčad je napravila važan korak prema vrhu prvenstvene ljestvice te s velikim optimizmom očekuje sljedeće utakmice.', 'sport1.jpg', 'sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

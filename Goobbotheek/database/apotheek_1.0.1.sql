-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 okt 2017 om 20:18
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotheek`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `aantal`
--

CREATE TABLE `aantal` (
  `medicijn` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `aantal`
--

INSERT INTO `aantal` (`medicijn`, `aantal`) VALUES
(1, 100),
(2, 100),
(3, 100),
(4, 100),
(5, 100),
(6, 100),
(7, 100),
(8, 100),
(9, 100),
(10, 100),
(11, 90),
(12, 90),
(13, 90),
(14, 90),
(15, 90),
(16, 90),
(17, 90),
(18, 90),
(19, 90),
(20, 90),
(21, 80),
(22, 80),
(23, 80),
(24, 80),
(25, 80),
(26, 80),
(27, 80),
(28, 80),
(29, 80),
(30, 80),
(31, 70),
(32, 70),
(33, 70),
(34, 70),
(35, 70),
(36, 70),
(37, 70),
(38, 70),
(39, 70),
(40, 70),
(41, 60),
(42, 60),
(43, 60),
(44, 60),
(45, 60),
(46, 60),
(47, 60),
(48, 60),
(49, 60),
(50, 60),
(51, 50),
(52, 50),
(53, 50),
(54, 50),
(55, 50),
(56, 50),
(57, 50),
(58, 50),
(59, 50),
(60, 50),
(61, 40),
(62, 40),
(63, 40),
(64, 40),
(65, 40),
(66, 40),
(67, 40),
(68, 40),
(69, 40),
(70, 40),
(71, 30),
(72, 30),
(73, 30),
(74, 30),
(75, 30),
(76, 30),
(77, 30),
(78, 30),
(79, 30),
(80, 30),
(81, 20),
(82, 20),
(83, 20),
(84, 20),
(85, 20),
(86, 20),
(87, 20),
(88, 20),
(89, 20),
(90, 20),
(91, 10),
(92, 10),
(93, 10),
(94, 10),
(95, 10),
(96, 10),
(97, 10),
(98, 10),
(99, 10),
(100, 10);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `apotheker`
--

CREATE TABLE `apotheker` (
  `id` int(11) NOT NULL,
  `naam` varchar(45) NOT NULL,
  `adres` varchar(45) NOT NULL,
  `telefoonnummer` varchar(45) NOT NULL,
  `postcode` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `apotheker`
--

INSERT INTO `apotheker` (`id`, `naam`, `adres`, `telefoonnummer`, `postcode`) VALUES
(1, 'Benu', 'Bijlmerplein 544', '234', '1102 DS'),
(2, 'Alphega', 'Annie Romeinplein 34', '895', '1103 JL'),
(3, 'Ganzenhoef', 'Bijlmerdreef 1169', '374', '1103 TT');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `apothekerwachtwoord`
--

CREATE TABLE `apothekerwachtwoord` (
  `apotheker` int(11) NOT NULL,
  `wachtwoord` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `apothekerwachtwoord`
--

INSERT INTO `apothekerwachtwoord` (`apotheker`, `wachtwoord`) VALUES
(1, 'apotheker123'),
(2, 'apotheker246'),
(3, 'apotheker369');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `huisarts`
--

CREATE TABLE `huisarts` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `telefoonnummer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `huisarts`
--

INSERT INTO `huisarts` (`id`, `naam`, `post`, `telefoonnummer`) VALUES
(1, 'De Groot', 'Kroonhorst', '568'),
(2, 'Born', 'Kroonhorst', '569'),
(3, 'Vreendie', 'Huisartsenpost', '612');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `huisartswachtwoord`
--

CREATE TABLE `huisartswachtwoord` (
  `huisarts` int(11) NOT NULL,
  `wachtwoord` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `huisartswachtwoord`
--

INSERT INTO `huisartswachtwoord` (`huisarts`, `wachtwoord`) VALUES
(1, 'huisarts123'),
(2, 'huisarts246'),
(3, 'huisarts369');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medicijn`
--

CREATE TABLE `medicijn` (
  `id` int(11) NOT NULL,
  `naam` varchar(100) NOT NULL,
  `omschrijving` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `medicijn`
--

INSERT INTO `medicijn` (`id`, `naam`, `omschrijving`) VALUES
(1, 'Diclofenac', 'Werkt als ontstekingsremmende\npijnstiller; NSAID\nType: Cataflam, Voltaren'),
(2, 'Amoxicilline', 'Antibioticum\r\nType: Clamoxyl'),
(3, 'Omeprazol', 'Remt productie overvloedig maagzuur\r\nType: Losec-mups'),
(4, 'Doxycycline', 'Antibioticum\r\nType: Vibramycin'),
(5, 'Ibuprofen', 'Pijnstiller\r\nType: Brufen'),
(6, 'Metoprolol', 'Bètablokker welke de bloeddruk verlaagt\r\nType: Selokeen-zoc'),
(7, 'Augmentin', 'Amoxicilline met enzymremmer clavulaanzuur, antiparkinsonmiddel'),
(8, 'Salbutamol', 'Luchtwegverwijders\r\nType: Ventolin'),
(9, 'Simvastatine', 'Cholesterolsyntheseremmer (verlaagt het cholesterol- en vetgehalte in het bloed)\r\nType: Zocor'),
(10, 'Oxazepam', 'Kalmeringsmiddel\r\nType: Seresta'),
(11, 'Codeine', 'Werkt als ontstekingsremmende pijnstiller'),
(12, 'Hydrocortison met overige middelen', 'Type: Daktacort'),
(13, 'Acetylsalicylzuur', 'Pijnstiller\r\n Type: Aspirine-protect'),
(14, 'Overige emollientia en protectiva', '(Levering 2 dagen)'),
(15, 'Triamcinolon', '-'),
(16, 'Nitrofurantoine', 'Type: Furadantine'),
(17, 'Fusidinezuur', 'Type: Fucidin'),
(18, 'Pantoprazol', '(Levering 2 dagen)\r\n Type: Pantazol'),
(19, 'Temazepam', 'Type: Normison'),
(20, 'Carbasalaatcalcium', 'Type: Ascal-cardio'),
(21, 'Macrogol combinatiepreparaten', 'moeten gemaakt\r\nworden: 2 dagen\r\n Type: Movicolon'),
(22, 'Naproxen', 'Type: Naprovite'),
(23, 'Hydrochloorthiazide', '-'),
(24, 'Metformine', '(moeten gemaakt worden: 2 dagen)\r\n Type: Glucophage'),
(25, 'Atorvastatine', 'Type: Lipitor'),
(26, 'Desloratadine', '(levering 3 dagen)\r\n Type: Aerius'),
(27, 'Kunsttranen en andere indifferente preparaten', 'Type: Duratears'),
(28, 'Fluticason', 'Type: Propionaat, Flixonase'),
(29, 'Levocetirizine', 'Type: Xyzal'),
(30, 'Hydrocortison', '-'),
(31, 'Diazepam', 'Type: Stesolid'),
(32, 'Fusidinezuur', 'Type: Fucithalmic'),
(33, 'Salmeterol met andere astma/copd-middelen', 'Type: Seretide'),
(34, 'Prednisolon', 'Type: Diadreson-f'),
(35, 'Azitromycine', 'Type: Zithromax'),
(36, 'Furosemide', 'Type: Lasix'),
(37, 'Claritromycine', 'Type: Klacid'),
(38, 'Mometason', 'Type: Nasonex'),
(39, 'Levothyroxine', 'Type: Thyrax'),
(40, 'Paracetamol combinatiepreparaten exclusief psycholeptica', '-'),
(41, 'Oestrogeen met levonorgestrel', 'Type: Microgynon'),
(42, 'Amlodipine', 'Type: Norvasc'),
(43, 'Tramadol', 'Type: Tramagetic'),
(44, 'Fluticason', 'Type: Flixotide'),
(45, 'Enalapril/enalaprilaat', 'Type: Renitec'),
(46, 'Ketoconazol', '(Levering 2 dagen)\r\n Type: Nizoral'),
(47, 'Esomeprazol', 'Type: Nexium'),
(48, 'Diclofenac combinatiepreparaten', 'Type: Arthrotec'),
(49, 'Acenocoumarol', '-'),
(50, 'Chlooramfenicol', '(moeten gemaakt worden: 2 dagen)\r\n Type: Minims chlooramfenicol'),
(51, 'Betamethason', 'Type: Diprosone'),
(52, 'Miconazol', 'Type: Gyno-daktarin'),
(53, 'Paroxetine', 'Type: Seroxat'),
(54, 'Feneticilline', 'Type: Broxil'),
(55, 'Dexamethason met antimicrobiele middelen', 'Type: Sofradex'),
(56, 'Formoterol met andere astma/copd-middelen', 'Type: Symbicort'),
(57, 'Ciprofloxacine', 'Type: Ciproxin'),
(58, 'Flucloxacilline', 'Type: Floxapen'),
(59, 'Codeine combinatiepreparaten', '-'),
(60, 'Lactulose', 'Type: Legendal'),
(61, 'Ranitidine', 'Type: Zantac'),
(62, 'Cyproteron met oestrogeen', 'Type: Diane-35'),
(63, 'Levocabastine', 'Type: Livocab'),
(64, 'Losartan', 'Type: Cozaar'),
(65, 'Rosuvastatine', 'Type: Crestor'),
(66, 'Trimethoprim', '(Moeten gemaakt worden: 2 dagen)\r\n Type: Monotrim'),
(67, 'Atenolol', 'Type: Tenormin'),
(68, 'Ferrofumaraat', '-'),
(69, 'Bisoprolol', 'Type: Emcor'),
(70, 'Tiotropium', 'Type: Spiriva'),
(71, 'Clobetasol', 'Type: Dermovate'),
(72, 'Calcium met andere middelen', '-'),
(73, 'Pravastatine', '(Moeten gemaakt worden: 3 dagen)\r\n Type: Selektine'),
(74, 'Perindopril', 'Type: Coversyl'),
(75, 'Hydrocortison met antimicrobiele middelen', 'Type: Bacicoline-b'),
(76, 'Triamcinolon', 'Type: Kenacort-a'),
(77, 'Dexamethason samen met antimicrobiele middelen', 'Type: Tobradex'),
(78, 'Nifedipine', 'Type: Adalat-oros'),
(79, 'Isosorbidemononitraat', 'Type: Mono-cedocard'),
(80, 'Lisinopril', 'Type: Seresta'),
(81, 'Metoclopramide', 'Type: Primperan'),
(82, 'Psylliumzaad', 'Type: Metamucil'),
(83, 'Amitriptyline', 'Type: Tryptizol'),
(84, 'Loperamide', 'Werkt tegen diarree\r\n Type: Imodium, Diacure'),
(85, 'Budesonide', 'Type: Rhinocort'),
(86, 'Tamsulosine', 'Type: Omnic-ocas'),
(87, 'Hydrocortisonbutyraat', 'Type: Locoid'),
(88, 'Metronidazol', '(Moeten gemaakt worden: 1 dag)\r\n Type: Flagyl'),
(89, 'Sulfamethoxazol met trimethoprim', 'Type: Bactrimel'),
(90, 'Alendroninezuur', 'Type: Fosamax'),
(91, 'Meloxicam', 'Type: Movicox'),
(92, 'Mebeverine', 'Type: Duspatal'),
(93, 'Citalopram', 'Type: Cipramil'),
(94, 'Glimepiride', 'Type: Amaryl'),
(95, 'Lidocaine', '(moeten gemaakt worden: 3 dagen'),
(96, 'Fluconazol', 'Type: Diflucan'),
(97, 'Etoricoxib', 'Type: Arcoxia'),
(98, 'Norfloxacine', 'Type: Noroxin'),
(99, 'Lidocaine', 'Type: Xylocaine'),
(100, 'Nitroglycerine', 'Type: Nitrolingual');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `patiënt`
--

CREATE TABLE `patiënt` (
  `verzekeringsnummer` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `geboorteplaats` varchar(100) NOT NULL,
  `adres` varchar(100) NOT NULL,
  `telefoonnummer` varchar(45) NOT NULL,
  `postcode` varchar(45) NOT NULL,
  `apotheker` int(11) NOT NULL,
  `huisarts` int(11) NOT NULL,
  `post` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `patiënt`
--

INSERT INTO `patiënt` (`verzekeringsnummer`, `email`, `achternaam`, `geboorteplaats`, `adres`, `telefoonnummer`, `postcode`, `apotheker`, `huisarts`, `post`) VALUES
(311, 'peters@mail.com', 'Peters', 'Amsterdam', 'Dreef 11', '123', '1123 GH', 1, 2, 'Kroonhorst'),
(323, 'mouni@mail.com', 'Mouni', 'Delphi', 'Reigersbos\r\n23', '456', '1189 IJ', 3, 2, 'Kroonhorst'),
(334, 'veen@mail.com', 'Van Veen', 'Amsterdam', 'Made 5', '789', '1190 UJ', 3, 2, 'Kroonhorst'),
(355, 'verwaaij@mail.com', 'Verwaaij', 'Utrecht', 'Vink 14', '900', '1109 AS', 2, 1, 'Kroonhorst'),
(412, 'ketam@mail.com', 'Ketam', 'Kaapstad', 'Dreef 34', '897', '1123 GH', 1, 2, 'Kroonhorst'),
(423, 'sinu@mail.com', 'Sinu', 'Bali', 'Zaan 39', '563', '1187 YU', 2, 3, 'Huisartsenpost'),
(466, 'kauq@mail.com', 'Kauq', 'Ankara', 'Doorloop\r\n45', '566', '1126 CV', 1, 1, 'Kroonhorst');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `recept`
--

CREATE TABLE `recept` (
  `id` int(11) NOT NULL,
  `patient` int(11) NOT NULL,
  `levertijd` time NOT NULL,
  `leverdatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `receptmedicijn`
--

CREATE TABLE `receptmedicijn` (
  `medicijn` int(11) NOT NULL,
  `recept` int(11) NOT NULL,
  `aantalMedicijnen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rol`
--

CREATE TABLE `rol` (
  `rol` int(11) NOT NULL,
  `omschrijving` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `rol`
--

INSERT INTO `rol` (`rol`, `omschrijving`) VALUES
(1, 'patiënt'),
(2, 'huisarts'),
(3, 'apotheker'),
(4, 'koerier');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aantal`
--
ALTER TABLE `aantal`
  ADD PRIMARY KEY (`medicijn`);

--
-- Indexen voor tabel `apotheker`
--
ALTER TABLE `apotheker`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `apothekerwachtwoord`
--
ALTER TABLE `apothekerwachtwoord`
  ADD PRIMARY KEY (`apotheker`);

--
-- Indexen voor tabel `huisarts`
--
ALTER TABLE `huisarts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `huisartswachtwoord`
--
ALTER TABLE `huisartswachtwoord`
  ADD PRIMARY KEY (`huisarts`);

--
-- Indexen voor tabel `medicijn`
--
ALTER TABLE `medicijn`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `patiënt`
--
ALTER TABLE `patiënt`
  ADD PRIMARY KEY (`verzekeringsnummer`),
  ADD KEY `fk_Patient_Huisarts_idx` (`huisarts`),
  ADD KEY `fk_Patient_Apotheker_idx` (`apotheker`);

--
-- Indexen voor tabel `recept`
--
ALTER TABLE `recept`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `receptmedicijn`
--
ALTER TABLE `receptmedicijn`
  ADD PRIMARY KEY (`medicijn`,`recept`),
  ADD KEY `fk_ReceptMedicijn_Recept_idx` (`recept`),
  ADD KEY `medicijn` (`medicijn`);

--
-- Indexen voor tabel `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `apotheker`
--
ALTER TABLE `apotheker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `huisarts`
--
ALTER TABLE `huisarts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `medicijn`
--
ALTER TABLE `medicijn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT voor een tabel `rol`
--
ALTER TABLE `rol`
  MODIFY `rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `aantal`
--
ALTER TABLE `aantal`
  ADD CONSTRAINT `fk_Aantal_Medicijnen` FOREIGN KEY (`medicijn`) REFERENCES `medicijn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `apothekerwachtwoord`
--
ALTER TABLE `apothekerwachtwoord`
  ADD CONSTRAINT `fk_ApothekerWachtwoord_Apotheker` FOREIGN KEY (`apotheker`) REFERENCES `apotheker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `huisartswachtwoord`
--
ALTER TABLE `huisartswachtwoord`
  ADD CONSTRAINT `fk_HuisartsWachtwoord_Huisarts` FOREIGN KEY (`huisarts`) REFERENCES `huisarts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `patiënt`
--
ALTER TABLE `patiënt`
  ADD CONSTRAINT `fk_Patient_Apotheker` FOREIGN KEY (`apotheker`) REFERENCES `apotheker` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Patient_Huisarts` FOREIGN KEY (`huisarts`) REFERENCES `huisarts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `recept`
--
ALTER TABLE `recept`
  ADD CONSTRAINT `fk_Recept_Patient` FOREIGN KEY (`id`) REFERENCES `patiënt` (`verzekeringsnummer`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Beperkingen voor tabel `receptmedicijn`
--
ALTER TABLE `receptmedicijn`
  ADD CONSTRAINT `fk_ReceptMedicijn_Medicijn` FOREIGN KEY (`medicijn`) REFERENCES `medicijn` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ReceptMedicijn_Recept` FOREIGN KEY (`recept`) REFERENCES `recept` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2020 at 11:06 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `s7_ciselnik`
--

CREATE TABLE `s7_ciselnik` (
  `id` int(11) NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `property` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `value` varchar(511) COLLATE utf8mb4_czech_ci NOT NULL,
  `translation` varchar(511) COLLATE utf8mb4_czech_ci NOT NULL,
  `datum_zalozeni` int(11) DEFAULT '0',
  `datum_upravy` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci COMMENT='Tabulka pro překlad jednotlivých stavů';

--
-- Dumping data for table `s7_ciselnik`
--

INSERT INTO `s7_ciselnik` (`id`, `domain`, `property`, `value`, `translation`, `datum_zalozeni`, `datum_upravy`) VALUES
(9, 'inzeratClass', 'typ_nemovitosti', '1', 'Komerční nemovitosti', 0, 1576702980),
(3, 'inzeratClass', 'typ_stavby', '1', 'Rodinný dům', 0, 0),
(4, 'inzeratClass', 'typ_stavby', '2', 'Byt', 0, 0),
(5, 'inzeratClass', 'typ_inzeratu', '1', 'Pronájem', 0, 0),
(6, 'inzeratClass', 'typ_inzeratu', '2', 'Prodej', 0, 0),
(7, 'inzeratClass', 'stav_objektu', '1', 'Velmi dobrý', 0, 0),
(8, 'inzeratClass', 'stav_objektu', '2', 'dobrý', 0, 0),
(10, 'inzeratClass', 'stav_inzeratu', '1', 'Aktivní', 0, 0),
(11, 'inzeratClass', 'stav_objektu', '3', 'Ucházející', 1570966343, 1570966343),
(12, 'inzeratClass', 'penb', '1', 'A - mimořádně úsporná', 1576611273, 1576611273),
(13, 'inzeratClass', 'penb', '2', 'B - Velmi úsporná', 1576611292, 1576611292),
(14, 'inzeratClass', 'penb', '3', 'C - Úsporná', 1576611311, 1576611311),
(15, 'inzeratClass', 'vybavenost', '0', 'Nevybavený', 1576611342, 1576611342),
(16, 'inzeratClass', 'vybavenost', '1', 'Zčásti vybavený', 1576611358, 1576611358),
(17, 'inzeratClass', 'vybavenost', '2', 'Vybavený', 1576611372, 1576611372),
(18, 'inzeratClass', 'typ_vlastnictvi', '0', 'Osobní', 1576611392, 1576611392),
(19, 'inzeratClass', 'typ_vlastnictvi', '1', 'Družstevní', 1576611408, 1576611408),
(20, 'inzeratClass', 'material', '0', 'Cihla', 1576611427, 1576611427),
(21, 'inzeratClass', 'material', '1', 'Panel', 1576611441, 1576611441),
(22, 'inzeratClass', 'material', '2', 'Jiný materiál', 1576611456, 1576611456),
(23, 'inzeratClass', 'typ_nemovitosti', '2', 'Pozemky', 1576702878, 1576702878),
(24, 'inzeratClass', 'typ_nemovitosti', '3', 'Spolubydlení', 1576702910, 1576702910),
(25, 'inzeratClass', 'typ_nemovitosti', '4', 'Pronájem', 1576702939, 1576702939),
(26, 'inzeratClass', 'typ_nemovitosti', '5', 'Prodej', 1576702953, 1576702953);

-- --------------------------------------------------------

--
-- Table structure for table `s7_inzerat`
--

CREATE TABLE `s7_inzerat` (
  `id` int(11) NOT NULL,
  `titulek` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `popis` text COLLATE utf8mb4_czech_ci NOT NULL,
  `typ_nemovitosti` int(11) NOT NULL,
  `typ_stavby` int(11) NOT NULL,
  `typ_inzeratu` int(11) NOT NULL,
  `pocet_mistnosti` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `patro` int(11) NOT NULL,
  `parkovaci_misto` tinyint(1) NOT NULL DEFAULT '0',
  `garaz` tinyint(1) NOT NULL DEFAULT '0',
  `balkon` tinyint(1) NOT NULL DEFAULT '0',
  `vytah` tinyint(1) NOT NULL DEFAULT '0',
  `terasa` tinyint(1) NOT NULL DEFAULT '0',
  `stav_objektu` int(11) NOT NULL,
  `stav_inzeratu` int(11) NOT NULL,
  `vybavenost` int(11) NOT NULL,
  `penb` int(11) NOT NULL,
  `typ_vlastnictvi` int(11) NOT NULL,
  `material` int(11) NOT NULL,
  `podlahova_plocha` int(11) NOT NULL,
  `pozemkova_plocha` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `ulice` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `mesto` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `mestska_cast` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `psc` varchar(63) COLLATE utf8mb4_czech_ci NOT NULL,
  `cp` varchar(63) COLLATE utf8mb4_czech_ci NOT NULL,
  `uzivatel_id` int(11) DEFAULT NULL,
  `top` int(11) NOT NULL DEFAULT '0',
  `cena` int(11) NOT NULL,
  `cena_poznamka` varchar(511) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `datum_upravy` int(11) NOT NULL,
  `datum_zalozeni` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci COMMENT='Tabulka sloužící pro evidenci všech inzerátů';

--
-- Dumping data for table `s7_inzerat`
--

INSERT INTO `s7_inzerat` (`id`, `titulek`, `popis`, `typ_nemovitosti`, `typ_stavby`, `typ_inzeratu`, `pocet_mistnosti`, `patro`, `parkovaci_misto`, `garaz`, `balkon`, `vytah`, `terasa`, `stav_objektu`, `stav_inzeratu`, `vybavenost`, `penb`, `typ_vlastnictvi`, `material`, `podlahova_plocha`, `pozemkova_plocha`, `lat`, `lng`, `ulice`, `mesto`, `mestska_cast`, `psc`, `cp`, `uzivatel_id`, `top`, `cena`, `cena_poznamka`, `datum_upravy`, `datum_zalozeni`) VALUES
(1, 'Prodej bytu 2+1', 'Testovací popisek pro byt. Speciální popisek.', 0, 0, 0, '5', 2, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 55, 150, 50.1609, 14.393, 'Tyršovo Náměstí', 'Roztoky', '', '25264', '45', 1, 1, 30000000, 'Cena bez energií a bez poplatků', 1581022126, 82800),
(2, 'Prodej domu Kladno', 'Velice hezký domek', 0, 0, 0, '5', 2, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 255, 520, 55, 65, 'Tyršova', 'Kladno', '', '25267', '878/85', 2, 1, 0, NULL, 1581022126, 1570312800),
(5, 'Velmi speciální byt', 'Ahoj Mahoj', 0, 0, 0, '3', 2, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 157, 185, 59.847, 65.554, 'Tyršova', 'Suchdol', '', '25262', '88', NULL, 1, 0, NULL, 1581022126, 1570965013),
(6, 'Koloseum', 'Velice hezký a utulný barák', 0, 0, 0, '50', 3, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 450, 1024, 54, 58, 'Bengálská', 'Roztoky', '', '25263', '69', 1, 1, 0, NULL, 1581022126, 1572369605),
(7, 'Bengál Haus', 'Bengál haus jak má být', 0, 0, 0, '3', 2, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 150, 150, 53, 58, 'Ulica', 'Město', '', '25478', '875/85', 2, 0, 0, NULL, 1581022126, 1572369825),
(8, 'Nový byt', 'Bundy fundy', 0, 0, 0, '3', 4, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 25, 25, 8, 4, 't', 't', '', '25263', '87', 3, 1, 0, NULL, 1581022126, 1572369974),
(9, 'Krypl Hacient', 'Krypl hacient', 0, 0, 0, '2', 2, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 15, 15, 55, 55, 's', 's', '', '25263', '88', 3, 1, 0, NULL, 1581022126, 1572370326),
(10, 'Harem', 'Hárám hárám', 4, 1, 1, '5', 5, 0, 1, 0, 0, 0, 3, 1, 0, 3, 1, 0, 25, 25, 45, 45, 'asfsa', 'aga', 'Ufff', '25263', '88', 2, 0, 200, 'Včetně energií a poplatků', 1581023157, 1581721200),
(11, 'Garsoniera 1+1', 'Speciální byteček', 4, 2, 1, '2+1', 2, 1, 1, 1, 1, 1, 2, 1, 1, 3, 1, 0, 25, 35, 50.2609, 14.493, 'Chomáčová', 'Chomutov', 'Chomáč', '25267', '88', 3, 1, 2540, 'za metr čtvereční', 1581022921, 1574463600),
(12, 'Slunný byt 1+1', 'Prodej slunného bytu 1+1 v centru České Lípy. Zrekonstruováný.', 4, 2, 1, '1+1', 3, 1, 0, 1, 1, 0, 3, 1, 1, 3, 1, 0, 34, 34, 50.3609, 14.593, 'Ladova', 'Česká Lípa', 'Chcanec', '25478', '8', 2, 0, 1150000, '+provize RK', 1581022689, 1576710000);

-- --------------------------------------------------------

--
-- Table structure for table `s7_objednavka`
--

CREATE TABLE `s7_objednavka` (
  `id` int(11) NOT NULL,
  `inzerat_id` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `mnozstvi` int(11) NOT NULL,
  `datum_zalozeni` int(11) NOT NULL,
  `datum_upravy` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci COMMENT='Tabulka sloužící pro evidenci všech objednávek';

--
-- Dumping data for table `s7_objednavka`
--

INSERT INTO `s7_objednavka` (`id`, `inzerat_id`, `cena`, `mnozstvi`, `datum_zalozeni`, `datum_upravy`) VALUES
(1, 1, 250, 2, 1572264000, 0),
(2, 2, 100, 5, 1572264000, 1570292892),
(3, 5, 100, 2, 1570965787, 1570965787);

-- --------------------------------------------------------

--
-- Table structure for table `s7_obrazek`
--

CREATE TABLE `s7_obrazek` (
  `id` int(11) NOT NULL,
  `titulek` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `popisek` varchar(511) COLLATE utf8_czech_ci DEFAULT NULL,
  `kod` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `url` varchar(511) COLLATE utf8_czech_ci NOT NULL,
  `inzerat_id` int(11) DEFAULT NULL,
  `front` tinyint(1) DEFAULT '0',
  `datum_upravy` int(11) DEFAULT '0',
  `datum_zalozeni` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Tabulka slouží pro evidenci obrázků navázaných na inzeráty';

--
-- Dumping data for table `s7_obrazek`
--

INSERT INTO `s7_obrazek` (`id`, `titulek`, `popisek`, `kod`, `url`, `inzerat_id`, `front`, `datum_upravy`, `datum_zalozeni`) VALUES
(50, NULL, NULL, 'a2e90eed6bc1a41ef319876150db373f.jpg', '/realsys/wp-content/uploads/system_data/default_a2e90eed6bc1a41ef319876150db373f.jpg', 1, 0, 1572277157, 1572277155),
(36, NULL, NULL, '0315964c0f2b60a893269da2d557bc39.jpg', '/realsys/wp-content/uploads/system_data/default_0315964c0f2b60a893269da2d557bc39.jpg', 1, 0, 1572277157, 1571860034),
(49, NULL, NULL, '7f9934a2c2d03442a20302287631641f.jpg', '/realsys/wp-content/uploads/system_data/default_7f9934a2c2d03442a20302287631641f.jpg', 1, 1, 1572277157, 1572277153),
(39, 'Mrdka', 'Kunda', 'c7aee9e2d875c15f0dfe2c4f5813ec3d.jpg', '/realsys/wp-content/uploads/system_data/default_c7aee9e2d875c15f0dfe2c4f5813ec3d.jpg', 5, 0, 1574886778, 1572266181),
(43, 'Narozeninová párty', 'undefined', 'a1d48196ff5c20dcdf9ad3f52d6edfec.jpg', '/realsys/wp-content/uploads/system_data/default_a1d48196ff5c20dcdf9ad3f52d6edfec.jpg', 5, 0, 1574886778, 1572275721),
(28, NULL, NULL, '221e460c1285b62a4acefe12f757ea82.jpg', '/realsys/wp-content/uploads/system_data/default_221e460c1285b62a4acefe12f757ea82.jpg', NULL, NULL, 1570370468, 1570370468),
(30, NULL, NULL, 'ad952064356affd7e8d210eafbccedfb.jpg', '/realsys/wp-content/uploads/system_data/default_ad952064356affd7e8d210eafbccedfb.jpg', NULL, NULL, 1570372952, 1570372952),
(31, NULL, NULL, '64b8e4bd4078220e196134f4e046d75c.jpg', '/realsys/wp-content/uploads/system_data/default_64b8e4bd4078220e196134f4e046d75c.jpg', NULL, NULL, 1570372953, 1570372953),
(38, NULL, NULL, '2899e373884565d8bb7001c59def6035.jpg', '/realsys/wp-content/uploads/system_data/default_2899e373884565d8bb7001c59def6035.jpg', 1, 0, 1572277157, 1572262496),
(40, NULL, NULL, '9efe4667c2e5f393345bf3016840e092.jpg', '/realsys/wp-content/uploads/system_data/default_9efe4667c2e5f393345bf3016840e092.jpg', 5, 1, 1574886778, 1572266240),
(41, NULL, NULL, '9afc2a34f1851b634a414bad4e9aace2.jpg', '/realsys/wp-content/uploads/system_data/default_9afc2a34f1851b634a414bad4e9aace2.jpg', 5, 0, 1574886778, 1572266382),
(42, NULL, NULL, '6d85c454a2a341fa9fd2de2993164334.jpg', '/realsys/wp-content/uploads/system_data/default_6d85c454a2a341fa9fd2de2993164334.jpg', 5, 0, 1574886778, 1572266988),
(52, NULL, NULL, 'd90bb498daf9d50ac20fbf7f3bbc3ce6.jpg', '/realsys/wp-content/uploads/system_data/default_d90bb498daf9d50ac20fbf7f3bbc3ce6.jpg', 2, 1, 1574886782, 1572348804),
(53, NULL, NULL, 'd582b5d943693cfa13e91bf991b9295c.jpg', '/realsys/wp-content/uploads/system_data/default_d582b5d943693cfa13e91bf991b9295c.jpg', 11, 0, 1572975261, 1572975150),
(54, 'Dnb Explosion', 'Speciální zobrazení', 'ca5be6966a5b602221c32bf5a7aa556e.jpg', '/realsys/wp-content/uploads/system_data/default_ca5be6966a5b602221c32bf5a7aa556e.jpg', 11, 1, 1572975287, 1572649200),
(59, NULL, NULL, '8456925d6366e2c83925bfcab1d18cae.jpg', '/realsys/wp-content/uploads/system_data/default_8456925d6366e2c83925bfcab1d18cae.jpg', 10, 1, 1574886637, 1574886631),
(58, NULL, NULL, '742a8fb086140a4bcf7112d8dc95eb55.jpg', '/realsys/wp-content/uploads/system_data/default_742a8fb086140a4bcf7112d8dc95eb55.jpg', NULL, NULL, 1572977763, 1572977763),
(60, NULL, NULL, 'f837e0c3d04460a007c4310c59f0a46e.jpg', '/realsys/wp-content/uploads/system_data/default_f837e0c3d04460a007c4310c59f0a46e.jpg', 9, 1, 1574886693, 1574886691),
(61, NULL, NULL, '6d9a3f21e0903e4d854a0679d1ee1e56.jpg', '/realsys/wp-content/uploads/system_data/default_6d9a3f21e0903e4d854a0679d1ee1e56.jpg', 8, 1, 1574886711, 1574886709),
(62, NULL, NULL, '88b22258a94d705789b3e62d71877aca.jpg', '/realsys/wp-content/uploads/system_data/default_88b22258a94d705789b3e62d71877aca.jpg', 7, 1, 1574886737, 1574886736),
(63, NULL, NULL, 'dae8a6856c0f31a27be1e58038f9dd12.jpg', '/realsys/wp-content/uploads/system_data/default_dae8a6856c0f31a27be1e58038f9dd12.jpg', 6, 1, 1574886759, 1574886757),
(64, NULL, NULL, '22514986d2351b33fc151b3036bc0e01.jpg', '/realsys/wp-content/uploads/system_data/default_22514986d2351b33fc151b3036bc0e01.jpg', 12, 0, 1576701849, 1576701838),
(65, NULL, NULL, 'c1127cb2a02eab881dcaca434fa888bc.jpg', '/realsys/wp-content/uploads/system_data/default_c1127cb2a02eab881dcaca434fa888bc.jpg', 12, 0, 1576701849, 1576701839),
(66, NULL, NULL, '2c61f08cca5ec53533a3a2e52d242096.jpg', '/realsys/wp-content/uploads/system_data/default_2c61f08cca5ec53533a3a2e52d242096.jpg', 12, 1, 1576701849, 1576701841),
(67, NULL, NULL, '8817de201482c17127628fea94210c17.jpg', '/realsys/wp-content/uploads/system_data/default_8817de201482c17127628fea94210c17.jpg', 12, 0, 1576701849, 1576701842),
(68, NULL, NULL, 'b8f835806df189ec6e8bd997a9e5e0c1.jpg', '/realsys/wp-content/uploads/system_data/default_b8f835806df189ec6e8bd997a9e5e0c1.jpg', 12, 0, 1576701849, 1576701844),
(69, NULL, NULL, '05b8664dbe9507161dfbae500ab3ae43.jpg', '/realsys/wp-content/uploads/system_data/default_05b8664dbe9507161dfbae500ab3ae43.jpg', 12, NULL, 1577620842, 1577620842);

-- --------------------------------------------------------

--
-- Table structure for table `s7_uzivatel`
--

CREATE TABLE `s7_uzivatel` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `prijmeni` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `fbid` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `gmid` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `popis` text COLLATE utf8mb4_czech_ci,
  `stav` int(11) DEFAULT '0',
  `heslo` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `hash` varchar(32) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `datum_zalozeni` int(11) DEFAULT NULL,
  `datum_upravy` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci COMMENT='Tabulka sloužící pro evidenci uživatelů';

--
-- Dumping data for table `s7_uzivatel`
--

INSERT INTO `s7_uzivatel` (`id`, `jmeno`, `prijmeni`, `email`, `telefon`, `fbid`, `gmid`, `avatar`, `popis`, `stav`, `heslo`, `hash`, `datum_zalozeni`, `datum_upravy`) VALUES
(1, 'Jakub', 'Sedmíček', 'jjj@seznam.cz', '724855993', '554dasfa55', '5as4g5dagsd', 'http://localhost/realsys/wp-content/uploads/2019/10/20160817_125720.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pretium, ipsum sit amet tincidunt gravida, neque elit laoreet elit, ut interdum odio magna non purus. Morbi tincidunt libero at vulputate congue. Duis tincidunt est eros, at tincidunt justo ultrices non. Nulla accumsan dapibus sodales. Suspendisse eu faucibus urna. Proin ut turpis bibendum nisi efficitur scelerisque eget ac nunc. Donec enim tortor, gravida nec erat in, tempor varius enim. Morbi eget sapien id nulla convallis faucibus. Ut vel diam rhoncus arcu tincidunt tincidunt. Mauris malesuada libero non nisl faucibus pulvinar. Nulla varius convallis justo, in posuere eros luctus eget. Vestibulum euismod justo ut semper vestibulum. Mauris dapibus ornare velit, in vulputate nibh tincidunt vitae.', 1, NULL, NULL, 1571954400, 1570558287),
(3, 'Roman', 'Harant', 'root@localhost.cz', '777 888 999', 'zmrd', 'zmrd', 'http://localhost/realsys/wp-content/uploads/2019/11/IMG_20191030_212103.jpg', 'Je to rebel', 1, NULL, NULL, 1571090400, 1577634621),
(2, 'Petr', 'Novák', 'Jjj@seznam.cz', '777888999', 'asgfasga5d4g', 'ds54gds4g', 'http://localhost/realsys/wp-content/uploads/2019/10/20160817_125720.jpg', 'Nic moc', 0, NULL, NULL, 1570312800, 1570471267),
(4, 'Jakub', 'Sedmík', 'Alpha7@seznam.cz', '+420 724 855 993', '', '', 'http://localhost/realsys/wp-content/uploads/2019/10/20160817_125720.jpg', 'Nějaký ten popis test', 0, '$2y$10$t2q9I6UkJASHY12V4j56p.Z7qTg7UxF7PL0DLDksDf9ksxInoLITu', NULL, 1571090400, 1577789336),
(11, 'Mrd', 'Dka', 'info@studioseven.cz', '777888999', NULL, NULL, NULL, NULL, 0, '$2y$10$SSxTv9f9V5kVwJ0/9n/3yeJkwzbKkCa5UmCOSwcBfVrwo.9yetLD6', NULL, 1578228749, 1578228749),
(13, 'Test', 'Test', 'root@localhost', '777888999', NULL, NULL, NULL, NULL, 1, '$2y$10$vBBDnItslwfEcycQDX0qseLCoVAYyPBvZ9ZDzuIhdr9WjXTpNQlEO', '', 1578243786, 1578245458),
(14, 'Daniel', 'Gatyás', 'daniel@studioseven.cz', '777888999', NULL, '108157309920114050752', 'https://lh5.googleusercontent.com/-VOxcDT9X6Vo/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rerqAiBveMvm3Rj8rmnf7v9wHnrrg/s96-c/photo.jpg', NULL, NULL, NULL, NULL, 1578253859, 1578253859);

-- --------------------------------------------------------

--
-- Table structure for table `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_comments`
--

INSERT INTO `wp_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'WordPress komentátor', 'wapuu@wordpress.example', 'https://wordpress.org/', '', '2019-08-13 19:11:19', '2019-08-13 17:11:19', 'Zdravím, tohle je komentář.\nChcete-li začít se schvalováním, úpravami a mazáním komentářů, pak si prohlédněte sekci Komentáře na nástěnce.\nProfilové obrázky komentujících vám přináší služba <a href=\"https://gravatar.com\">Gravatar</a>.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_options`
--

INSERT INTO `wp_options` (`option_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/realsys', 'yes'),
(2, 'home', 'http://localhost/realsys', 'yes'),
(3, 'blogname', 'Realsys', 'yes'),
(4, 'blogdescription', 'Další web používající WordPress', 'yes'),
(5, 'users_can_register', '0', 'yes'),
(6, 'admin_email', 'info@studioseven.cz', 'yes'),
(7, 'start_of_week', '1', 'yes'),
(8, 'use_balanceTags', '0', 'yes'),
(9, 'use_smilies', '1', 'yes'),
(10, 'require_name_email', '1', 'yes'),
(11, 'comments_notify', '1', 'yes'),
(12, 'posts_per_rss', '10', 'yes'),
(13, 'rss_use_excerpt', '0', 'yes'),
(14, 'mailserver_url', 'mail.example.com', 'yes'),
(15, 'mailserver_login', 'login@example.com', 'yes'),
(16, 'mailserver_pass', 'password', 'yes'),
(17, 'mailserver_port', '110', 'yes'),
(18, 'default_category', '1', 'yes'),
(19, 'default_comment_status', 'open', 'yes'),
(20, 'default_ping_status', 'open', 'yes'),
(21, 'default_pingback_flag', '0', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'j. n. Y', 'yes'),
(24, 'time_format', 'G:i', 'yes'),
(25, 'links_updated_date_format', 'j. n. Y, G:i', 'yes'),
(26, 'comment_moderation', '0', 'yes'),
(27, 'moderation_notify', '1', 'yes'),
(28, 'permalink_structure', '/%postname%/', 'yes'),
(29, 'rewrite_rules', 'a:89:{s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:18:\"^inzerat/([^/]*)/?\";s:49:\"index.php?pagename=inzerat&inzerat_id=$matches[1]\";s:19:\"^uzivatel/([^/]*)/?\";s:51:\"index.php?pagename=uzivatel&uzivatel_id=$matches[1]\";s:47:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:42:\"category/(.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:44:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:39:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:45:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:40:\"type/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:32:\"feed/(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:27:\"(feed|rdf|rss|rss2|atom)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:27:\"comment-page-([0-9]{1,})/?$\";s:39:\"index.php?&page_id=39&cpage=$matches[1]\";s:41:\"comments/feed/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:36:\"comments/(feed|rdf|rss|rss2|atom)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:44:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:39:\"search/(.+)/(feed|rdf|rss|rss2|atom)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:47:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:42:\"author/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:69:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:56:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:51:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:43:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:38:\"([0-9]{4})/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:40:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:35:\"(.?.+?)/(feed|rdf|rss|rss2|atom)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";s:27:\"[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\"[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:57:\"[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\"[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\"[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"([^/]+)/embed/?$\";s:37:\"index.php?name=$matches[1]&embed=true\";s:20:\"([^/]+)/trackback/?$\";s:31:\"index.php?name=$matches[1]&tb=1\";s:40:\"([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:35:\"([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:43:\"index.php?name=$matches[1]&feed=$matches[2]\";s:28:\"([^/]+)/page/?([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&paged=$matches[2]\";s:35:\"([^/]+)/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?name=$matches[1]&cpage=$matches[2]\";s:24:\"([^/]+)(?:/([0-9]+))?/?$\";s:43:\"index.php?name=$matches[1]&page=$matches[2]\";s:16:\"[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:26:\"[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:46:\"[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:41:\"[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:22:\"[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";}', 'yes'),
(30, 'hack_file', '0', 'yes'),
(31, 'blog_charset', 'UTF-8', 'yes'),
(32, 'moderation_keys', '', 'no'),
(33, 'active_plugins', 'a:0:{}', 'yes'),
(34, 'category_base', '', 'yes'),
(35, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(36, 'comment_max_links', '2', 'yes'),
(37, 'gmt_offset', '0', 'yes'),
(38, 'default_email_category', '1', 'yes'),
(39, 'recently_edited', '', 'no'),
(40, 'template', 'realsys', 'yes'),
(41, 'stylesheet', 'realsys', 'yes'),
(42, 'comment_whitelist', '1', 'yes'),
(43, 'blacklist_keys', '', 'no'),
(44, 'comment_registration', '0', 'yes'),
(45, 'html_type', 'text/html', 'yes'),
(46, 'use_trackback', '0', 'yes'),
(47, 'default_role', 'subscriber', 'yes'),
(48, 'db_version', '44719', 'yes'),
(49, 'uploads_use_yearmonth_folders', '1', 'yes'),
(50, 'upload_path', '', 'yes'),
(51, 'blog_public', '0', 'yes'),
(52, 'default_link_category', '2', 'yes'),
(53, 'show_on_front', 'page', 'yes'),
(54, 'tag_base', '', 'yes'),
(55, 'show_avatars', '1', 'yes'),
(56, 'avatar_rating', 'G', 'yes'),
(57, 'upload_url_path', '', 'yes'),
(58, 'thumbnail_size_w', '150', 'yes'),
(59, 'thumbnail_size_h', '150', 'yes'),
(60, 'thumbnail_crop', '1', 'yes'),
(61, 'medium_size_w', '300', 'yes'),
(62, 'medium_size_h', '300', 'yes'),
(63, 'avatar_default', 'mystery', 'yes'),
(64, 'large_size_w', '1024', 'yes'),
(65, 'large_size_h', '1024', 'yes'),
(66, 'image_default_link_type', 'none', 'yes'),
(67, 'image_default_size', '', 'yes'),
(68, 'image_default_align', '', 'yes'),
(69, 'close_comments_for_old_posts', '0', 'yes'),
(70, 'close_comments_days_old', '14', 'yes'),
(71, 'thread_comments', '1', 'yes'),
(72, 'thread_comments_depth', '5', 'yes'),
(73, 'page_comments', '0', 'yes'),
(74, 'comments_per_page', '50', 'yes'),
(75, 'default_comments_page', 'newest', 'yes'),
(76, 'comment_order', 'asc', 'yes'),
(77, 'sticky_posts', 'a:0:{}', 'yes'),
(78, 'widget_categories', 'a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(79, 'widget_text', 'a:6:{i:1;a:0:{}i:2;a:4:{s:5:\"title\";s:0:\"\";s:4:\"text\";s:410:\"                                <img src=\"http://localhost/realsys/wp-content/themes/realsys/assets/images/images_frontend/footer/logo-white.png\">\r\n                                <p>\r\n                                    Mauris tincidunt sem sed arcu. Temporibus autem quibusdam et aut officiis debitis aut rerum necessit atibus saepe eveniet ut et voluptates repudiandae.\r\n                                </p>\";s:6:\"filter\";b:1;s:6:\"visual\";b:1;}i:3;a:4:{s:5:\"title\";s:7:\"Kontakt\";s:4:\"text\";s:157:\"<p>Mauris tincidunt sem sed arcu. Temporibus autem quibusdam</p>\r\n<span class=\"phone\">+48 777 888 555</span>\r\n<span class=\"mail\">info@szukajmieskac.pl</span>\";s:6:\"filter\";b:1;s:6:\"visual\";b:1;}i:4;a:4:{s:5:\"title\";s:6:\"Účet\";s:4:\"text\";s:219:\"<ul class=\"footer_menu\">\r\n	<li><a href=\"#\">Můj účet</a></li>\r\n 	<li class=\"active\"><a href=\"#\">Moje inzeráty</a></li>\r\n 	<li><a href=\"#\">Nastavení účtu</a></li>\r\n 	<li><a href=\"#\">Přidat inzerát</a></li>\r\n</ul>\";s:6:\"filter\";b:1;s:6:\"visual\";b:1;}i:5;a:4:{s:5:\"title\";s:6:\"O nás\";s:4:\"text\";s:220:\"<ul class=\"footer_menu\">\r\n 	<li><a href=\"#\">Můj účet</a></li>\r\n 	<li><a href=\"#\">Moje inzeráty</a></li>\r\n 	<li><a href=\"#\">Nastavení účtu</a></li>\r\n 	<li class=\"active\"><a href=\"#\">Přidat inzerát</a></li>\r\n</ul>\";s:6:\"filter\";b:1;s:6:\"visual\";b:1;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(80, 'widget_rss', 'a:2:{i:1;a:0:{}s:12:\"_multiwidget\";i:1;}', 'yes'),
(81, 'uninstall_plugins', 'a:0:{}', 'no'),
(82, 'timezone_string', 'Europe/Prague', 'yes'),
(83, 'page_for_posts', '0', 'yes'),
(84, 'page_on_front', '39', 'yes'),
(85, 'default_post_format', '0', 'yes'),
(86, 'link_manager_enabled', '0', 'yes'),
(87, 'finished_splitting_shared_terms', '1', 'yes'),
(88, 'site_icon', '0', 'yes'),
(89, 'medium_large_size_w', '768', 'yes'),
(90, 'medium_large_size_h', '0', 'yes'),
(91, 'wp_page_for_privacy_policy', '3', 'yes'),
(92, 'show_comments_cookies_opt_in', '1', 'yes'),
(93, 'initial_db_version', '44719', 'yes'),
(94, 'wp_user_roles', 'a:5:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:61:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}}', 'yes'),
(95, 'fresh_site', '0', 'yes'),
(96, 'WPLANG', 'cs_CZ', 'yes'),
(97, 'widget_search', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(98, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(99, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(100, 'widget_archives', 'a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(101, 'widget_meta', 'a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(102, 'sidebars_widgets', 'a:6:{s:19:\"wp_inactive_widgets\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:16:\"first_footer_col\";a:1:{i:0;s:6:\"text-2\";}s:17:\"second_footer_col\";a:1:{i:0;s:6:\"text-4\";}s:16:\"third_footer_col\";a:1:{i:0;s:6:\"text-5\";}s:17:\"fourth_footer_col\";a:1:{i:0;s:6:\"text-3\";}s:13:\"array_version\";i:3;}', 'yes'),
(103, 'cron', 'a:5:{i:1581761479;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1581786679;a:4:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1581786688;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1581786689;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}', 'yes'),
(104, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(105, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_nav_menu', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'widget_custom_html', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(114, 'recovery_keys', 'a:0:{}', 'yes'),
(118, 'theme_mods_twentynineteen', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1566929362;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes'),
(122, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:4:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:65:\"https://downloads.wordpress.org/release/cs_CZ/wordpress-5.3.2.zip\";s:6:\"locale\";s:5:\"cs_CZ\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:65:\"https://downloads.wordpress.org/release/cs_CZ/wordpress-5.3.2.zip\";s:10:\"no_content\";b:0;s:11:\"new_bundled\";b:0;s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.3.2\";s:7:\"version\";s:5:\"5.3.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";}i:1;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.3.2.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-5.3.2.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-5.3.2-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-5.3.2-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.3.2\";s:7:\"version\";s:5:\"5.3.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";}i:2;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:65:\"https://downloads.wordpress.org/release/cs_CZ/wordpress-5.3.2.zip\";s:6:\"locale\";s:5:\"cs_CZ\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:65:\"https://downloads.wordpress.org/release/cs_CZ/wordpress-5.3.2.zip\";s:10:\"no_content\";b:0;s:11:\"new_bundled\";b:0;s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.3.2\";s:7:\"version\";s:5:\"5.3.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";s:9:\"new_files\";s:1:\"1\";}i:3;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:65:\"https://downloads.wordpress.org/release/cs_CZ/wordpress-5.2.5.zip\";s:6:\"locale\";s:5:\"cs_CZ\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:65:\"https://downloads.wordpress.org/release/cs_CZ/wordpress-5.2.5.zip\";s:10:\"no_content\";b:0;s:11:\"new_bundled\";b:0;s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.2.5\";s:7:\"version\";s:5:\"5.2.5\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";s:9:\"new_files\";s:1:\"1\";}}s:12:\"last_checked\";i:1581760261;s:15:\"version_checked\";s:5:\"5.2.2\";s:12:\"translations\";a:0:{}}', 'no'),
(123, '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1581760262;s:7:\"checked\";a:2:{s:7:\"realsys\";s:3:\"1.0\";s:14:\"twentynineteen\";s:3:\"1.4\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}', 'no'),
(124, '_site_transient_update_plugins', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1581760261;s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:0:{}}', 'no'),
(132, 'can_compress_scripts', '1', 'no'),
(163, 'recently_activated', 'a:0:{}', 'yes'),
(184, 'current_theme', 'RealSys', 'yes'),
(185, 'theme_mods_realsys', 'a:13:{i:0;b:0;s:18:\"nav_menu_locations\";a:1:{s:15:\"cms_header_menu\";i:2;}s:18:\"custom_css_post_id\";i:-1;s:11:\"custom_logo\";i:54;s:13:\"slider_text_1\";s:67:\"<strong>Najdi si nový domov</strong><br>Bez realitky a bez provize\";s:13:\"slider_text_2\";s:15:\"Nebo Inzeruj...\";s:12:\"cta_hp_title\";s:46:\"NEPLAŤTE PROVIZI REALITCE,<br>KDYŽ NEMUSÍTE\";s:19:\"cta_hp_button1_text\";s:16:\"Přidat Inzerát\";s:19:\"cta_hp_button2_text\";s:12:\"Je to zdarma\";s:21:\"top_nemovitosti_title\";s:16:\"Top Nemovitostii\";s:31:\"top_nemovitosti_nem_button_text\";s:6:\"Detail\";s:28:\"top_nemovitosti_next_ads_url\";s:1:\"/\";s:24:\"top_nemovitosti_next_ads\";s:17:\"Další inzeráty\";}', 'yes'),
(186, 'theme_switched', '', 'yes'),
(284, 'recovery_mode_email_last_sent', '1581020176', 'yes'),
(832, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}', 'yes'),
(1268, '_site_transient_timeout_browser_d065cfce6faf939329d1e9fed273f193', '1581877020', 'no'),
(1269, '_site_transient_browser_d065cfce6faf939329d1e9fed273f193', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:12:\"80.0.3987.87\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'no'),
(1293, '_site_transient_timeout_theme_roots', '1581762061', 'no'),
(1294, '_site_transient_theme_roots', 'a:2:{s:7:\"realsys\";s:7:\"/themes\";s:14:\"twentynineteen\";s:7:\"/themes\";}', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_postmeta`
--

INSERT INTO `wp_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2, 3, '_wp_page_template', 'default'),
(5, 15, '_wp_attached_file', '2019/10/20160827_142457.jpg'),
(6, 15, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:960;s:6:\"height\";i:1280;s:4:\"file\";s:27:\"2019/10/20160827_142457.jpg\";s:5:\"sizes\";a:5:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:27:\"20160827_142457-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:27:\"20160827_142457-225x300.jpg\";s:5:\"width\";i:225;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:28:\"20160827_142457-768x1024.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:1024;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:28:\"20160827_142457-768x1024.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:1024;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"post-thumbnail\";a:4:{s:4:\"file\";s:27:\"20160827_142457-700x500.jpg\";s:5:\"width\";i:700;s:6:\"height\";i:500;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:3:\"2.8\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:8:\"GT-I9300\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:10:\"1472307897\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:3:\"2.5\";s:3:\"iso\";s:3:\"100\";s:13:\"shutter_speed\";s:19:\"0.00051020408163265\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}'),
(7, 16, '_wp_attached_file', '2019/10/20160817_125720.jpg'),
(8, 16, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:2448;s:6:\"height\";i:3264;s:4:\"file\";s:27:\"2019/10/20160817_125720.jpg\";s:5:\"sizes\";a:5:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:27:\"20160817_125720-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:27:\"20160817_125720-225x300.jpg\";s:5:\"width\";i:225;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:28:\"20160817_125720-768x1024.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:1024;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:28:\"20160817_125720-768x1024.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:1024;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"post-thumbnail\";a:4:{s:4:\"file\";s:27:\"20160817_125720-700x500.jpg\";s:5:\"width\";i:700;s:6:\"height\";i:500;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:3:\"2.6\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:8:\"GT-I9300\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:10:\"1471438639\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:3:\"3.7\";s:3:\"iso\";s:2:\"50\";s:13:\"shutter_speed\";s:18:\"0.0020576131687243\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"1\";s:8:\"keywords\";a:0:{}}}'),
(9, 21, '_wp_attached_file', '2019/11/IMG_20191030_212103.jpg'),
(10, 21, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:3000;s:6:\"height\";i:4000;s:4:\"file\";s:31:\"2019/11/IMG_20191030_212103.jpg\";s:5:\"sizes\";a:5:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:31:\"IMG_20191030_212103-150x150.jpg\";s:5:\"width\";i:150;s:6:\"height\";i:150;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:6:\"medium\";a:4:{s:4:\"file\";s:31:\"IMG_20191030_212103-225x300.jpg\";s:5:\"width\";i:225;s:6:\"height\";i:300;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:12:\"medium_large\";a:4:{s:4:\"file\";s:32:\"IMG_20191030_212103-768x1024.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:1024;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:5:\"large\";a:4:{s:4:\"file\";s:32:\"IMG_20191030_212103-768x1024.jpg\";s:5:\"width\";i:768;s:6:\"height\";i:1024;s:9:\"mime-type\";s:10:\"image/jpeg\";}s:14:\"post-thumbnail\";a:4:{s:4:\"file\";s:31:\"IMG_20191030_212103-700x500.jpg\";s:5:\"width\";i:700;s:6:\"height\";i:500;s:9:\"mime-type\";s:10:\"image/jpeg\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:3:\"2.2\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:7:\"Redmi 7\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:10:\"1572470463\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:4:\"3.84\";s:3:\"iso\";s:4:\"1250\";s:13:\"shutter_speed\";s:4:\"0.05\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(38, 26, '_edit_lock', '1573503006:1'),
(39, 28, '_edit_lock', '1573503018:1'),
(40, 30, '_edit_lock', '1573503027:1'),
(41, 32, '_edit_lock', '1573503037:1'),
(42, 34, '_edit_lock', '1573503046:1'),
(43, 36, '_edit_lock', '1573503056:1'),
(50, 39, '_edit_lock', '1573503092:1'),
(51, 41, '_menu_item_type', 'post_type'),
(52, 41, '_menu_item_menu_item_parent', '0'),
(53, 41, '_menu_item_object_id', '39'),
(54, 41, '_menu_item_object', 'page'),
(55, 41, '_menu_item_target', ''),
(56, 41, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(57, 41, '_menu_item_xfn', ''),
(58, 41, '_menu_item_url', ''),
(60, 42, '_menu_item_type', 'post_type'),
(61, 42, '_menu_item_menu_item_parent', '0'),
(62, 42, '_menu_item_object_id', '36'),
(63, 42, '_menu_item_object', 'page'),
(64, 42, '_menu_item_target', ''),
(65, 42, '_menu_item_classes', 'a:1:{i:0;s:3:\"btn\";}'),
(66, 42, '_menu_item_xfn', ''),
(67, 42, '_menu_item_url', ''),
(69, 43, '_menu_item_type', 'post_type'),
(70, 43, '_menu_item_menu_item_parent', '0'),
(71, 43, '_menu_item_object_id', '34'),
(72, 43, '_menu_item_object', 'page'),
(73, 43, '_menu_item_target', ''),
(74, 43, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(75, 43, '_menu_item_xfn', ''),
(76, 43, '_menu_item_url', ''),
(78, 44, '_menu_item_type', 'post_type'),
(79, 44, '_menu_item_menu_item_parent', '0'),
(80, 44, '_menu_item_object_id', '32'),
(81, 44, '_menu_item_object', 'page'),
(82, 44, '_menu_item_target', ''),
(83, 44, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(84, 44, '_menu_item_xfn', ''),
(85, 44, '_menu_item_url', ''),
(87, 45, '_menu_item_type', 'post_type'),
(88, 45, '_menu_item_menu_item_parent', '0'),
(89, 45, '_menu_item_object_id', '30'),
(90, 45, '_menu_item_object', 'page'),
(91, 45, '_menu_item_target', ''),
(92, 45, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(93, 45, '_menu_item_xfn', ''),
(94, 45, '_menu_item_url', ''),
(96, 46, '_menu_item_type', 'post_type'),
(97, 46, '_menu_item_menu_item_parent', '0'),
(98, 46, '_menu_item_object_id', '28'),
(99, 46, '_menu_item_object', 'page'),
(100, 46, '_menu_item_target', ''),
(101, 46, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(102, 46, '_menu_item_xfn', ''),
(103, 46, '_menu_item_url', ''),
(105, 47, '_menu_item_type', 'post_type'),
(106, 47, '_menu_item_menu_item_parent', '0'),
(107, 47, '_menu_item_object_id', '26'),
(108, 47, '_menu_item_object', 'page'),
(109, 47, '_menu_item_target', ''),
(110, 47, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(111, 47, '_menu_item_xfn', ''),
(112, 47, '_menu_item_url', ''),
(113, 49, '_menu_item_type', 'custom'),
(114, 49, '_menu_item_menu_item_parent', '0'),
(115, 49, '_menu_item_object_id', '49'),
(116, 49, '_menu_item_object', 'custom'),
(117, 49, '_menu_item_target', ''),
(118, 49, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(119, 49, '_menu_item_xfn', ''),
(120, 49, '_menu_item_url', 'http://a'),
(122, 50, '_menu_item_type', 'custom'),
(123, 50, '_menu_item_menu_item_parent', '0'),
(124, 50, '_menu_item_object_id', '50'),
(125, 50, '_menu_item_object', 'custom'),
(126, 50, '_menu_item_target', ''),
(127, 50, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(128, 50, '_menu_item_xfn', ''),
(129, 50, '_menu_item_url', '#'),
(131, 51, '_menu_item_type', 'custom'),
(132, 51, '_menu_item_menu_item_parent', '0'),
(133, 51, '_menu_item_object_id', '51'),
(134, 51, '_menu_item_object', 'custom'),
(135, 51, '_menu_item_target', ''),
(136, 51, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(137, 51, '_menu_item_xfn', ''),
(138, 51, '_menu_item_url', '#'),
(140, 52, '_menu_item_type', 'custom'),
(141, 52, '_menu_item_menu_item_parent', '0'),
(142, 52, '_menu_item_object_id', '52'),
(143, 52, '_menu_item_object', 'custom'),
(144, 52, '_menu_item_target', ''),
(145, 52, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(146, 52, '_menu_item_xfn', ''),
(147, 52, '_menu_item_url', '#'),
(149, 53, '_menu_item_type', 'custom'),
(150, 53, '_menu_item_menu_item_parent', '0'),
(151, 53, '_menu_item_object_id', '53'),
(152, 53, '_menu_item_object', 'custom'),
(153, 53, '_menu_item_target', ''),
(154, 53, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(155, 53, '_menu_item_xfn', ''),
(156, 53, '_menu_item_url', '#'),
(158, 54, '_wp_attached_file', '2019/11/logo-bydleni.png'),
(159, 54, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:625;s:6:\"height\";i:146;s:4:\"file\";s:24:\"2019/11/logo-bydleni.png\";s:5:\"sizes\";a:2:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:24:\"logo-bydleni-150x146.png\";s:5:\"width\";i:150;s:6:\"height\";i:146;s:9:\"mime-type\";s:9:\"image/png\";}s:6:\"medium\";a:4:{s:4:\"file\";s:23:\"logo-bydleni-300x70.png\";s:5:\"width\";i:300;s:6:\"height\";i:70;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(160, 55, '_wp_attached_file', '2019/11/cropped-logo-bydleni.png'),
(161, 55, '_wp_attachment_context', 'custom-logo'),
(162, 55, '_wp_attachment_metadata', 'a:5:{s:5:\"width\";i:215;s:6:\"height\";i:50;s:4:\"file\";s:32:\"2019/11/cropped-logo-bydleni.png\";s:5:\"sizes\";a:1:{s:9:\"thumbnail\";a:4:{s:4:\"file\";s:31:\"cropped-logo-bydleni-150x50.png\";s:5:\"width\";i:150;s:6:\"height\";i:50;s:9:\"mime-type\";s:9:\"image/png\";}}s:10:\"image_meta\";a:12:{s:8:\"aperture\";s:1:\"0\";s:6:\"credit\";s:0:\"\";s:6:\"camera\";s:0:\"\";s:7:\"caption\";s:0:\"\";s:17:\"created_timestamp\";s:1:\"0\";s:9:\"copyright\";s:0:\"\";s:12:\"focal_length\";s:1:\"0\";s:3:\"iso\";s:1:\"0\";s:13:\"shutter_speed\";s:1:\"0\";s:5:\"title\";s:0:\"\";s:11:\"orientation\";s:1:\"0\";s:8:\"keywords\";a:0:{}}}'),
(183, 67, '_edit_lock', '1576609029:1'),
(184, 1, '_edit_lock', '1576609508:1'),
(185, 73, '_edit_lock', '1577284846:1'),
(186, 75, '_edit_lock', '1577724615:1'),
(187, 79, '_edit_lock', '1578681123:1'),
(188, 82, '_edit_lock', '1581272233:1');

-- --------------------------------------------------------

--
-- Table structure for table `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_posts`
--

INSERT INTO `wp_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2019-08-13 19:11:19', '2019-08-13 17:11:19', '<!-- wp:paragraph -->\n<p>Vítejte ve WordPressu. Toto je váš první příspěvek. Můžete ho upravit, nebo smazat a postupně pak začít s tvorbou vlastního webu.</p>\n<!-- /wp:paragraph -->', 'Ahoj všichni!', '', 'publish', 'open', 'open', '', 'ahoj-vsichni', '', '', '2019-08-13 19:11:19', '2019-08-13 17:11:19', '', 0, 'http://localhost/realsys/?p=1', 0, 'post', '', 1),
(3, 1, '2019-08-13 19:11:19', '2019-08-13 17:11:19', '<!-- wp:heading --><h2>Kdo jsme</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Naše webová adresa je: http://localhost/realsys.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Jaké shromažďujeme osobní údaje a proč je shromažďujeme</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Komentáře</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Když návštěvníci přidají komentář na tento web, jsou shromažďovány údaje zobrazené ve formuláři pro komentář, dále IP adresa návštěvníka a řetězec user agent definující prohlížeč, což pomáhá k detekci spamu.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Službě Gravatar může být poskytnut anonymní řetězec vytvořený z vaší emailové adresy (nazývaný také hash), díky kterému lze určit jestli tuto službu používáte. Zásady ochrany osobních údajů služby Gravatar jsou k dispozici zde: https://automattic.com/privacy/. Po schválení vašeho komentáře je váš profilový obrázek viditelný pro veřejnost v kontextu vašeho komentáře.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Média</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Pokud nahráváte obrázky na tento web, měli byste se vyhnout nahrávání obrázků s vloženými údaji o poloze (EXIF GPS). Návštěvníci webu mohou stáhnout a zobrazit libovolné data o poloze z obrázků na webu.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Kontaktní formuláře</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Cookies</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Pokud na naše stránky přidáte komentář, můžete povolit uložení jména, emailové adresy a webové stránky do cookies. Tímto způsobem se snažíme zvýšit váš komfort, když budete psát nový komentář už pak nebudete muset tyto údaje znovu vyplňovat. Tyto soubory cookies budou mít životnost jeden rok.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Pokud navštívíte naši přihlašovací stránku, nastavíme dočasné cookies pro ověření, zda váš prohlížeč přijímá soubory cookies. Tento soubor cookies neobsahuje žádná osobní data a při zavření prohlížeče se zruší.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Při přihlašování vám nastavíme také několik souborů cookies pro uložení vašich přihlašovacích údajů a pro nastavení zobrazení obrazovky. Přihlašovací soubory cookies mají životnost dva dny a cookies pro nastavení zobrazení mají životnost jeden rok. Pokud potvrdíte možnost „Zapamatovat si mě“, vaše přihlášení bude trvat dva týdny. Pokud se ze svého účtu odhlásíte, přihlašovací cookies budou odstraněny.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Pokud upravujete nebo publikujete článek, bude ve vašem prohlížeči uložen další cookie. Tento cookie neobsahuje žádná osobní data a jednoduše označuje ID příspěvku, který jste právě upravili. Jeho platnost vyprší po 1 dni.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Vložený obsah z dalších webů</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Příspěvky na těchto stránkách mohou obsahovat vložený obsah (například videa, obrázky, články atd.). Vložený obsah z jiných webových stránek se chová stejným způsobem, jako kdyby návštěvník navštívil jiný web.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Tyto webové stránky mohou shromažďovat data o vás, používat soubory cookies, vkládat další sledování od třetích stran a sledovat vaši interakci s tímto vloženým obsahem, včetně sledování interakce s vloženým obsahem, pokud máte účet a jste přihlášeni na danou webovou stránku.</p><!-- /wp:paragraph --><!-- wp:heading {\"level\":3} --><h3>Analytika</h3><!-- /wp:heading --><!-- wp:heading --><h2>S kým sdílíme vaše údaje</h2><!-- /wp:heading --><!-- wp:heading --><h2>Jak dlouho uchováváme vaše údaje</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Pokud přidáte komentář, komentář a jeho metadata budou uchovávána po dobu neurčitou. Údaje jsou uchovávány za účelem automatického rozpoznání a schválení všech následných komentářů, místo jejich držení ve frontě moderování.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p>Pro uživatele, kteří se registrují na tomto webu (pokud mají tuto možnost), ukládáme také osobní údaje, které uvádějí ve svém uživatelském profilu. Všichni uživatelé mohou kdykoliv vidět, upravovat nebo smazat své osobní údaje (s výjimkou toho, že nemohou změnit své uživatelské jméno). Administrátoři webu mohou také tyto informace zobrazit a upravovat.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Jaká máte práva?</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Pokud máte na tomto webu účet nebo jste zde přidali komentáře, můžete požádat o obdržení souboru s exportem osobních údajů, které o vás uchováváme, včetně všech údajů, které jste nám poskytli. Můžete také požádat o odstranění veškerých osobních údajů, které o vás uchováváme. Tato možnost nezahrnuje údaje, které jsme povinni uchovávat z administrativních, právních nebo bezpečnostních důvodů.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Kam posíláme vaše data?</h2><!-- /wp:heading --><!-- wp:paragraph --><p>Komentáře návštěvníků mohou být kontrolovány prostřednictvím automatizované služby detekce spamu, která může být umístěna v zahraničí.</p><!-- /wp:paragraph --><!-- wp:heading --><h2>Vaše kontaktní údaje</h2><!-- /wp:heading --><!-- wp:heading --><h2>Dodatečné informace</h2><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Jak chráníme vaše osobní údaje</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Jaké máme postupy při úniku informací</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Od kterých třetích stran získáváme osobní údaje?</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Jaké automatizované rozhodnutí provádíme a/nebo profilujeme uživatelská data</h3><!-- /wp:heading --><!-- wp:heading {\"level\":3} --><h3>Informační povinnost regulovaného průmyslu</h3><!-- /wp:heading -->', 'Zásady ochrany osobních údajů', '', 'draft', 'closed', 'open', '', 'ochrana-osobnich-udaju', '', '', '2019-08-13 19:11:19', '2019-08-13 17:11:19', '', 0, 'http://localhost/realsys/?page_id=3', 0, 'page', '', 0),
(15, 1, '2019-10-07 19:54:57', '2019-10-07 17:54:57', '', '20160827_142457', '', 'inherit', 'open', 'closed', '', '20160827_142457', '', '', '2019-10-07 19:54:57', '2019-10-07 17:54:57', '', 0, 'http://localhost/realsys/wp-content/uploads/2019/10/20160827_142457.jpg', 0, 'attachment', 'image/jpeg', 0),
(16, 1, '2019-10-07 20:01:03', '2019-10-07 18:01:03', '', '20160817_125720', '', 'inherit', 'open', 'closed', '', '20160817_125720', '', '', '2019-10-07 20:01:03', '2019-10-07 18:01:03', '', 0, 'http://localhost/realsys/wp-content/uploads/2019/10/20160817_125720.jpg', 0, 'attachment', 'image/jpeg', 0),
(21, 1, '2019-11-05 18:35:46', '2019-11-05 17:35:46', '', 'IMG_20191030_212103', '', 'inherit', 'open', 'closed', '', 'img_20191030_212103', '', '', '2019-11-05 18:35:46', '2019-11-05 17:35:46', '', 0, 'http://localhost/realsys/wp-content/uploads/2019/11/IMG_20191030_212103.jpg', 0, 'attachment', 'image/jpeg', 0),
(26, 1, '2019-11-11 21:12:26', '2019-11-11 20:12:26', '', 'Vyhledat', '', 'publish', 'closed', 'closed', '', 'vyhledat', '', '', '2019-11-11 21:12:26', '2019-11-11 20:12:26', '', 0, 'http://localhost/realsys/?page_id=26', 0, 'page', '', 0),
(27, 1, '2019-11-11 21:12:26', '2019-11-11 20:12:26', '', 'Vyhledat', '', 'inherit', 'closed', 'closed', '', '26-revision-v1', '', '', '2019-11-11 21:12:26', '2019-11-11 20:12:26', '', 26, 'http://localhost/realsys/2019/11/11/26-revision-v1/', 0, 'revision', '', 0),
(28, 1, '2019-11-11 21:12:41', '2019-11-11 20:12:41', '', 'Výpis inzerátů', '', 'publish', 'closed', 'closed', '', 'vypis-inzeratu', '', '', '2019-11-11 21:12:41', '2019-11-11 20:12:41', '', 0, 'http://localhost/realsys/?page_id=28', 0, 'page', '', 0),
(29, 1, '2019-11-11 21:12:41', '2019-11-11 20:12:41', '', 'Výpis inzerátů', '', 'inherit', 'closed', 'closed', '', '28-revision-v1', '', '', '2019-11-11 21:12:41', '2019-11-11 20:12:41', '', 28, 'http://localhost/realsys/2019/11/11/28-revision-v1/', 0, 'revision', '', 0),
(30, 1, '2019-11-11 21:12:48', '2019-11-11 20:12:48', '', 'Ceník', '', 'publish', 'closed', 'closed', '', 'cenik', '', '', '2019-11-11 21:12:48', '2019-11-11 20:12:48', '', 0, 'http://localhost/realsys/?page_id=30', 0, 'page', '', 0),
(31, 1, '2019-11-11 21:12:48', '2019-11-11 20:12:48', '', 'Ceník', '', 'inherit', 'closed', 'closed', '', '30-revision-v1', '', '', '2019-11-11 21:12:48', '2019-11-11 20:12:48', '', 30, 'http://localhost/realsys/2019/11/11/30-revision-v1/', 0, 'revision', '', 0),
(32, 1, '2019-11-11 21:12:59', '2019-11-11 20:12:59', '', 'Jak to funguje', '', 'publish', 'closed', 'closed', '', 'jak-to-funguje', '', '', '2019-11-11 21:12:59', '2019-11-11 20:12:59', '', 0, 'http://localhost/realsys/?page_id=32', 0, 'page', '', 0),
(33, 1, '2019-11-11 21:12:59', '2019-11-11 20:12:59', '', 'Jak to funguje', '', 'inherit', 'closed', 'closed', '', '32-revision-v1', '', '', '2019-11-11 21:12:59', '2019-11-11 20:12:59', '', 32, 'http://localhost/realsys/2019/11/11/32-revision-v1/', 0, 'revision', '', 0),
(34, 1, '2019-11-11 21:13:07', '2019-11-11 20:13:07', '', 'Služby', '', 'publish', 'closed', 'closed', '', 'sluzby', '', '', '2019-11-11 21:13:07', '2019-11-11 20:13:07', '', 0, 'http://localhost/realsys/?page_id=34', 0, 'page', '', 0),
(35, 1, '2019-11-11 21:13:07', '2019-11-11 20:13:07', '', 'Služby', '', 'inherit', 'closed', 'closed', '', '34-revision-v1', '', '', '2019-11-11 21:13:07', '2019-11-11 20:13:07', '', 34, 'http://localhost/realsys/2019/11/11/34-revision-v1/', 0, 'revision', '', 0),
(36, 1, '2019-11-11 21:13:19', '2019-11-11 20:13:19', '', 'Přidat inzerát', '', 'publish', 'closed', 'closed', '', 'pridat-inzerat', '', '', '2019-11-11 21:13:19', '2019-11-11 20:13:19', '', 0, 'http://localhost/realsys/?page_id=36', 0, 'page', '', 0),
(37, 1, '2019-11-11 21:13:19', '2019-11-11 20:13:19', '', 'Přidat inzerát', '', 'inherit', 'closed', 'closed', '', '36-revision-v1', '', '', '2019-11-11 21:13:19', '2019-11-11 20:13:19', '', 36, 'http://localhost/realsys/2019/11/11/36-revision-v1/', 0, 'revision', '', 0),
(39, 1, '2019-11-11 21:13:52', '2019-11-11 20:13:52', '', 'Domů', '', 'publish', 'closed', 'closed', '', 'domu', '', '', '2019-11-11 21:13:52', '2019-11-11 20:13:52', '', 0, 'http://localhost/realsys/?page_id=39', 0, 'page', '', 0),
(40, 1, '2019-11-11 21:13:52', '2019-11-11 20:13:52', '', 'Domů', '', 'inherit', 'closed', 'closed', '', '39-revision-v1', '', '', '2019-11-11 21:13:52', '2019-11-11 20:13:52', '', 39, 'http://localhost/realsys/2019/11/11/39-revision-v1/', 0, 'revision', '', 0),
(41, 1, '2019-11-11 21:14:48', '2019-11-11 20:14:48', ' ', '', '', 'publish', 'closed', 'closed', '', '41', '', '', '2019-11-11 21:15:00', '2019-11-11 20:15:00', '', 0, 'http://localhost/realsys/?p=41', 1, 'nav_menu_item', '', 0),
(42, 1, '2019-11-11 21:14:49', '2019-11-11 20:14:49', ' ', '', '', 'publish', 'closed', 'closed', '', '42', '', '', '2019-11-11 21:15:00', '2019-11-11 20:15:00', '', 0, 'http://localhost/realsys/?p=42', 7, 'nav_menu_item', '', 0),
(43, 1, '2019-11-11 21:14:48', '2019-11-11 20:14:48', ' ', '', '', 'publish', 'closed', 'closed', '', '43', '', '', '2019-11-11 21:15:00', '2019-11-11 20:15:00', '', 0, 'http://localhost/realsys/?p=43', 6, 'nav_menu_item', '', 0),
(44, 1, '2019-11-11 21:14:48', '2019-11-11 20:14:48', ' ', '', '', 'publish', 'closed', 'closed', '', '44', '', '', '2019-11-11 21:15:00', '2019-11-11 20:15:00', '', 0, 'http://localhost/realsys/?p=44', 5, 'nav_menu_item', '', 0),
(45, 1, '2019-11-11 21:14:48', '2019-11-11 20:14:48', ' ', '', '', 'publish', 'closed', 'closed', '', '45', '', '', '2019-11-11 21:15:00', '2019-11-11 20:15:00', '', 0, 'http://localhost/realsys/?p=45', 4, 'nav_menu_item', '', 0),
(46, 1, '2019-11-11 21:14:48', '2019-11-11 20:14:48', ' ', '', '', 'publish', 'closed', 'closed', '', '46', '', '', '2019-11-11 21:15:00', '2019-11-11 20:15:00', '', 0, 'http://localhost/realsys/?p=46', 3, 'nav_menu_item', '', 0),
(47, 1, '2019-11-11 21:14:48', '2019-11-11 20:14:48', ' ', '', '', 'publish', 'closed', 'closed', '', '47', '', '', '2019-11-11 21:15:00', '2019-11-11 20:15:00', '', 0, 'http://localhost/realsys/?p=47', 2, 'nav_menu_item', '', 0),
(49, 1, '2019-11-22 16:52:07', '2019-11-22 15:52:07', '', 'Prodej', '', 'publish', 'closed', 'closed', '', 'prodej', '', '', '2019-12-18 21:58:14', '2019-12-18 20:58:14', '', 0, 'http://localhost/realsys/?p=49', 1, 'nav_menu_item', '', 0),
(50, 1, '2019-11-22 16:52:07', '2019-11-22 15:52:07', '', 'Pronájem', '', 'publish', 'closed', 'closed', '', 'pronajem', '', '', '2019-12-18 21:58:14', '2019-12-18 20:58:14', '', 0, 'http://localhost/realsys/?p=50', 2, 'nav_menu_item', '', 0),
(51, 1, '2019-11-22 16:52:07', '2019-11-22 15:52:07', '', 'Spolubydlení', '', 'publish', 'closed', 'closed', '', 'spolubydleni', '', '', '2019-12-18 21:58:14', '2019-12-18 20:58:14', '', 0, 'http://localhost/realsys/?p=51', 3, 'nav_menu_item', '', 0),
(52, 1, '2019-11-22 16:52:07', '2019-11-22 15:52:07', '', 'Komerční nemovitosti', '', 'publish', 'closed', 'closed', '', 'komercni-nemovitosti', '', '', '2019-12-18 21:58:14', '2019-12-18 20:58:14', '', 0, 'http://localhost/realsys/?p=52', 4, 'nav_menu_item', '', 0),
(53, 1, '2019-11-22 16:52:07', '2019-11-22 15:52:07', '', 'Pozemky', '', 'publish', 'closed', 'closed', '', 'pozemky', '', '', '2019-12-18 21:58:14', '2019-12-18 20:58:14', '', 0, 'http://localhost/realsys/?p=53', 5, 'nav_menu_item', '', 0),
(54, 1, '2019-11-22 16:56:04', '2019-11-22 15:56:04', '', 'logo-bydleni', '', 'inherit', 'open', 'closed', '', 'logo-bydleni', '', '', '2019-11-22 16:56:04', '2019-11-22 15:56:04', '', 0, 'http://localhost/realsys/wp-content/uploads/2019/11/logo-bydleni.png', 0, 'attachment', 'image/png', 0),
(55, 1, '2019-11-22 16:56:19', '2019-11-22 15:56:19', 'http://localhost/realsys/wp-content/uploads/2019/11/cropped-logo-bydleni.png', 'cropped-logo-bydleni.png', '', 'inherit', 'open', 'closed', '', 'cropped-logo-bydleni-png', '', '', '2019-11-22 16:56:19', '2019-11-22 15:56:19', '', 0, 'http://localhost/realsys/wp-content/uploads/2019/11/cropped-logo-bydleni.png', 0, 'attachment', 'image/png', 0),
(67, 1, '2019-12-02 19:42:48', '2019-12-02 18:42:48', '', 'inzerat', '', 'publish', 'closed', 'closed', '', 'inzerat', '', '', '2019-12-16 20:23:36', '2019-12-16 19:23:36', '', 0, 'http://localhost/realsys/?page_id=67', 0, 'page', '', 0),
(68, 1, '2019-12-02 19:42:48', '2019-12-02 18:42:48', '', 'inzerat', '', 'inherit', 'closed', 'closed', '', '67-revision-v1', '', '', '2019-12-02 19:42:48', '2019-12-02 18:42:48', '', 67, 'http://localhost/realsys/2019/12/02/67-revision-v1/', 0, 'revision', '', 0),
(70, 1, '2019-12-16 19:51:58', '2019-12-16 18:51:58', '<!-- wp:paragraph -->\n<p>test</p>\n<!-- /wp:paragraph -->', 'inzerat', '', 'inherit', 'closed', 'closed', '', '67-revision-v1', '', '', '2019-12-16 19:51:58', '2019-12-16 18:51:58', '', 67, 'http://localhost/realsys/67-revision-v1/', 0, 'revision', '', 0),
(71, 1, '2019-12-16 20:23:36', '2019-12-16 19:23:36', '', 'inzerat', '', 'inherit', 'closed', 'closed', '', '67-revision-v1', '', '', '2019-12-16 20:23:36', '2019-12-16 19:23:36', '', 67, 'http://localhost/realsys/67-revision-v1/', 0, 'revision', '', 0),
(73, 1, '2019-12-25 15:43:09', '2019-12-25 14:43:09', '', 'uzivatel', '', 'publish', 'closed', 'closed', '', 'uzivatel', '', '', '2019-12-25 15:43:09', '2019-12-25 14:43:09', '', 0, 'http://localhost/realsys/?page_id=73', 0, 'page', '', 0),
(74, 1, '2019-12-25 15:43:09', '2019-12-25 14:43:09', '', 'uzivatel', '', 'inherit', 'closed', 'closed', '', '73-revision-v1', '', '', '2019-12-25 15:43:09', '2019-12-25 14:43:09', '', 73, 'http://localhost/realsys/73-revision-v1/', 0, 'revision', '', 0),
(75, 1, '2019-12-30 17:52:37', '2019-12-30 16:52:37', '', 'login', '', 'publish', 'closed', 'closed', '', 'login', '', '', '2019-12-30 17:52:37', '2019-12-30 16:52:37', '', 0, 'http://localhost/realsys/?page_id=75', 0, 'page', '', 0),
(76, 1, '2019-12-30 17:52:37', '2019-12-30 16:52:37', '', 'login', '', 'inherit', 'closed', 'closed', '', '75-revision-v1', '', '', '2019-12-30 17:52:37', '2019-12-30 16:52:37', '', 75, 'http://localhost/realsys/75-revision-v1/', 0, 'revision', '', 0),
(79, 1, '2020-01-10 19:34:25', '2020-01-10 18:34:25', '', 'vypis', '', 'publish', 'closed', 'closed', '', 'vypis', '', '', '2020-01-10 19:34:25', '2020-01-10 18:34:25', '', 0, 'http://localhost/realsys/?page_id=79', 0, 'page', '', 0),
(80, 1, '2020-01-10 19:34:25', '2020-01-10 18:34:25', '', 'vypis', '', 'inherit', 'closed', 'closed', '', '79-revision-v1', '', '', '2020-01-10 19:34:25', '2020-01-10 18:34:25', '', 79, 'http://localhost/realsys/79-revision-v1/', 0, 'revision', '', 0),
(82, 1, '2020-02-09 19:17:27', '2020-02-09 18:17:27', '', 'vypismapa', '', 'publish', 'closed', 'closed', '', 'vypismapa', '', '', '2020-02-09 19:17:27', '2020-02-09 18:17:27', '', 0, 'http://localhost/realsys/?page_id=82', 0, 'page', '', 0),
(83, 1, '2020-02-09 19:17:27', '2020-02-09 18:17:27', '', 'vypismapa', '', 'inherit', 'closed', 'closed', '', '82-revision-v1', '', '', '2020-02-09 19:17:27', '2020-02-09 18:17:27', '', 82, 'http://localhost/realsys/82-revision-v1/', 0, 'revision', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_terms`
--

INSERT INTO `wp_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Nezařazené', 'nezarazene', 0),
(2, 'Menu 1', 'menu-1', 0),
(3, 'Kategorie', 'kategorie', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 1, 0),
(41, 2, 0),
(42, 2, 0),
(43, 2, 0),
(44, 2, 0),
(45, 2, 0),
(46, 2, 0),
(47, 2, 0),
(49, 3, 0),
(50, 3, 0),
(51, 3, 0),
(52, 3, 0),
(53, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_term_taxonomy`
--

INSERT INTO `wp_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'nav_menu', '', 0, 7),
(3, 3, 'nav_menu', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_usermeta`
--

INSERT INTO `wp_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'nickname', 'jakubsedmik'),
(2, 1, 'first_name', ''),
(3, 1, 'last_name', ''),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'syntax_highlighting', 'true'),
(7, 1, 'comment_shortcuts', 'false'),
(8, 1, 'admin_color', 'fresh'),
(9, 1, 'use_ssl', '0'),
(10, 1, 'show_admin_bar_front', 'true'),
(11, 1, 'locale', ''),
(12, 1, 'wp_capabilities', 'a:1:{s:13:\"administrator\";b:1;}'),
(13, 1, 'wp_user_level', '10'),
(14, 1, 'dismissed_wp_pointers', 'text_widget_custom_html'),
(15, 1, 'show_welcome_panel', '1'),
(16, 1, 'session_tokens', 'a:1:{s:64:\"ece4cea32d52b895a6564e1ed8e610f089a3816d1fcc66edc3c240b36c7187b1\";a:4:{s:10:\"expiration\";i:1581445020;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.87 Safari/537.36\";s:5:\"login\";i:1581272220;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '81'),
(18, 1, 'wp_user-settings', 'libraryContent=browse&editor=html'),
(19, 1, 'wp_user-settings-time', '1574437244'),
(20, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:\"link-target\";i:1;s:15:\"title-attribute\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";}'),
(21, 1, 'metaboxhidden_nav-menus', 'a:1:{i:0;s:12:\"add-post_tag\";}'),
(22, 1, 'nav_menu_recently_edited', '3');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'jakubsedmik', '$P$BuoMM/vKyyrMakVQS7CVfCYV9Lkjzf/', 'jakubsedmik', 'info@studioseven.cz', '', '2019-08-13 17:11:19', '', 0, 'jakubsedmik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `s7_ciselnik`
--
ALTER TABLE `s7_ciselnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s7_inzerat`
--
ALTER TABLE `s7_inzerat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s7_objednavka`
--
ALTER TABLE `s7_objednavka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s7_obrazek`
--
ALTER TABLE `s7_obrazek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s7_uzivatel`
--
ALTER TABLE `s7_uzivatel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- Indexes for table `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indexes for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`);

--
-- Indexes for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191));

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- Indexes for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- Indexes for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `s7_ciselnik`
--
ALTER TABLE `s7_ciselnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `s7_inzerat`
--
ALTER TABLE `s7_inzerat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `s7_objednavka`
--
ALTER TABLE `s7_objednavka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s7_obrazek`
--
ALTER TABLE `s7_obrazek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `s7_uzivatel`
--
ALTER TABLE `s7_uzivatel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1295;

--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

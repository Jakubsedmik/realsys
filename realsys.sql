-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 05:34 PM
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
(26, 'inzeratClass', 'typ_nemovitosti', '5', 'Prodej', 1576702953, 1576702953),
(27, 'inzeratClass', 'stav_inzeratu', '0', 'Neaktivní', 1582973452, 1582973452),
(28, 'objednavkaClass', 'stav', '0', 'Nezaplacená', 1582996502, 1582996502),
(29, 'objednavkaClass', 'stav', '1', 'Zaplacená', 1582996513, 1582996513);

-- --------------------------------------------------------

--
-- Table structure for table `s7_hlidacipes`
--

CREATE TABLE `s7_hlidacipes` (
  `id` int(11) NOT NULL,
  `uzivatel_id` int(11) NOT NULL,
  `jmeno_psa` varchar(256) COLLATE utf8mb4_czech_ci NOT NULL,
  `posledni_inzeraty` text COLLATE utf8mb4_czech_ci NOT NULL,
  `nastaveni_filtru` text COLLATE utf8mb4_czech_ci NOT NULL,
  `nove_inzeraty_pocet` int(11) NOT NULL DEFAULT '0',
  `posledni_zobrazeni` int(11) NOT NULL DEFAULT '0',
  `premium` tinyint(4) NOT NULL,
  `datum_zalozeni` int(11) NOT NULL,
  `datum_upravy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci COMMENT='Tabulka pro evidenci hlídacích psů';

--
-- Dumping data for table `s7_hlidacipes`
--

INSERT INTO `s7_hlidacipes` (`id`, `uzivatel_id`, `jmeno_psa`, `posledni_inzeraty`, `nastaveni_filtru`, `nove_inzeraty_pocet`, `posledni_zobrazeni`, `premium`, `datum_zalozeni`, `datum_upravy`) VALUES
(1, 4, 'Muj pes', 'a:8:{i:0;s:2:\"39\";i:1;s:1:\"9\";i:2;s:1:\"8\";i:3;s:1:\"7\";i:4;s:1:\"6\";i:5;s:1:\"5\";i:6;s:1:\"1\";i:7;s:2:\"12\";}', 'a:1:{i:0;O:11:\"filterClass\":3:{s:11:\"\0*\0operator\";s:1:\">\";s:9:\"\0*\0value1\";s:16:\"podlahova_plocha\";s:9:\"\0*\0value2\";i:60;}}', 0, 1586773890, 0, 1586512544, 1586773890),
(15, 4, 'Pejseeek', 'a:5:{i:0;s:2:\"39\";i:1;s:1:\"8\";i:2;s:1:\"7\";i:3;s:1:\"6\";i:4;s:1:\"5\";}', 'a:1:{i:0;O:11:\"filterClass\":3:{s:11:\"\0*\0operator\";s:1:\"=\";s:9:\"\0*\0value1\";s:12:\"stav_objektu\";s:9:\"\0*\0value2\";s:1:\"2\";}}', 0, 1588001500, 0, 1586779689, 1588001500),
(18, 4, 'Nový pejsek', 'a:1:{i:0;s:1:\"6\";}', 'a:1:{i:0;O:11:\"filterClass\":3:{s:11:\"\0*\0operator\";s:1:\"=\";s:9:\"\0*\0value1\";s:15:\"typ_nemovitosti\";s:9:\"\0*\0value2\";s:1:\"1\";}}', 0, 1587755612, 1, 1587755601, 1587755612),
(20, 4, 'Nový hlídací pes', 'a:3:{i:0;s:2:\"39\";i:1;s:1:\"7\";i:2;s:1:\"1\";}', 'a:1:{i:0;O:11:\"filterClass\":3:{s:11:\"\0*\0operator\";s:1:\"=\";s:9:\"\0*\0value1\";s:4:\"penb\";s:9:\"\0*\0value2\";s:1:\"2\";}}', 0, 1588001401, 1, 1587924300, 1588001401);

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
(1, 'Prodej bytu 2+1', 'Testovací popisek pro byt. Speciální popisek.', 5, 2, 1, 'Ateliér', 2, 1, 0, 1, 0, 0, 3, 1, 0, 2, 0, 0, 65, 150, 50.1609, 14.393, 'Tyršovo Náměstí', 'Roztoky', 'Praha západ', '25264', '45', 1, 0, 30000000, 'Cena bez energií a bez poplatků', 1587732126, 1587732126),
(2, 'Prodej domu Kladno', 'Velice hezký domek', 5, 2, 2, '1+1', 2, 1, 1, 1, 1, 0, 3, 1, 1, 3, 0, 1, 22, 20, 55, 65, 'Františkova', 'Kladno', 'Doksy', '25267', '878/85', 2, 0, 180000, 'pouze 1/4 podíl', 1586427265, 1570312800),
(5, 'Velmi speciální byt', 'Speciální byt, díky jeho přednostem.', 5, 2, 2, '3+1', 2, 1, 1, 0, 1, 0, 2, 1, 1, 1, 0, 1, 68, 185, 59.847, 65.554, 'Tyršova', 'Suchdol', 'Praha západ', '25262', '88', 14, 0, 1500000, 'Bez daně z nabytí', 1586433627, 1571004000),
(6, 'Koloseum', 'Obrovské koloseum na prodej', 1, 1, 2, '5+kk', 3, 1, 1, 1, 0, 0, 2, 1, 2, 3, 1, 2, 450, 1024, 54, 58, 'Pražská', 'Velké Přílepy', 'Praha západ', '25263', '69', 1, 0, 15000000, 'Provize v ceně', 1583154784, 1572390000),
(7, 'Dům domů', 'Velký dům pro velkou rodinu', 5, 1, 2, '8+kk', 4, 0, 1, 1, 0, 1, 2, 1, 1, 2, 0, 0, 143, 150, 53, 58, 'Václavské Náměstí', 'Praha', 'Praha 2', '12000', '875/85', 2, 0, 28000, 'Bez poplatků', 1583154704, 1572390000),
(8, 'Nový byt', 'Nový byt na pronájem', 4, 2, 1, '3+kk', 2, 1, 1, 1, 0, 1, 2, 1, 1, 3, 0, 1, 80, 85, 8, 4, 'Tyršovo Náměstí', 'Roztoky', 'Praha západ', '25264', '87', 3, 0, 15000, 'bez poplatků', 1583154583, 1572390000),
(9, 'Speciální domeček', 'Speciální domeček na prodej.', 5, 2, 2, '2kk', 2, 1, 1, 1, 0, 0, 3, 1, 1, 3, 1, 0, 85, 85, 55, 55, 'Vodičkova', 'Praha', 'Praha 6', '12000', '45/5', 3, 0, 150, 'bez DPH', 1586425646, 1572390000),
(10, 'Krásný nový byt', 'Krásný nový byt na prodej na Praze 8', 5, 1, 1, '1+1', 5, 0, 1, 1, 0, 0, 3, 1, 0, 3, 1, 0, 25, 25, 45, 45, 'asfsa', 'aga', 'Ufff', '25263', '88', 2, 0, 200000, 'Včetně energií a poplatků', 1583153987, 1581721200),
(12, 'Slunný byt 1+1', 'Prodej slunného bytu 1+1 v centru České Lípy. Zrekonstruováný.', 4, 1, 2, '1+1', 3, 1, 0, 1, 1, 0, 3, 1, 1, 3, 1, 0, 68, 10, 50.0503, 14.4392, 'Na Strži', 'Praha 4', 'Praha 4', '140 62', '65/1702', 4, 1, 1154000, '+provize RK', 1587926364, 1587926364),
(39, 'Prodej bytu 2+1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam congue sed lorem sit amet mattis.', 5, 2, 2, '2+1', 1, 0, 1, 0, 1, 1, 2, 1, 1, 2, 0, 0, 150, 150, 50.1599, 14.3331, 'Příčná', 'Úholičky', 'Test', '25264', '88', 4, 1, 1500000, 'Bez DPH', 1587926139, 1587926139);

-- --------------------------------------------------------

--
-- Table structure for table `s7_objednavka`
--

CREATE TABLE `s7_objednavka` (
  `id` int(11) NOT NULL,
  `uzivatel_id` int(11) NOT NULL COMMENT 'Identifikace uživatele',
  `cena` int(11) NOT NULL COMMENT 'Jakou cenu doopravdy zaplatil',
  `mnozstvi` int(11) NOT NULL COMMENT 'Množství kreditů které za cenu dostal',
  `stav` smallint(6) NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  `datum_zalozeni` int(11) NOT NULL,
  `datum_upravy` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci COMMENT='Tabulka sloužící pro evidenci všech objednávek';

--
-- Dumping data for table `s7_objednavka`
--

INSERT INTO `s7_objednavka` (`id`, `uzivatel_id`, `cena`, `mnozstvi`, `stav`, `hash`, `datum_zalozeni`, `datum_upravy`) VALUES
(1, 1, 250, 2, 0, NULL, 1572264000, 0),
(2, 2, 100, 5, 0, NULL, 1572264000, 1570292892),
(3, 5, 100, 2, 0, NULL, 1571004000, 1582997279),
(13, 4, 100, 20, 1, '3097316521', 1583006786, 1583006802),
(14, 4, 100, 20, 1, '3097438032', 1583155912, 1583155938),
(20, 4, 4, 1, 1, '3101197814', 1587732089, 1587732116),
(21, 4, 8, 2, 1, '3101204418', 1587741714, 1587741829),
(22, 4, 8, 2, 1, '3101220902', 1587755533, 1587755564),
(23, 4, 500, 100, 1, '3101337278', 1587924248, 1587924276);

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
(175, NULL, NULL, 'e70cbb76817e3e4946c45ad0fc875735.jpg', '/wp-content/uploads/system_data/default_e70cbb76817e3e4946c45ad0fc875735.jpg', 5, 0, 1583154890, 1583154879),
(171, NULL, NULL, 'd1677fdae88338e19f8e9f2d43c3d783.jpg', '/wp-content/uploads/system_data/default_d1677fdae88338e19f8e9f2d43c3d783.jpg', 6, 1, 1583154805, 1583154795),
(172, NULL, NULL, '88ba1b63bf524654df51bdb9060e3216.jpg', '/wp-content/uploads/system_data/default_88ba1b63bf524654df51bdb9060e3216.jpg', 6, 0, 1583154805, 1583154796),
(173, NULL, NULL, '66127769c8bdeaac282abd582f17513d.jpg', '/wp-content/uploads/system_data/default_66127769c8bdeaac282abd582f17513d.jpg', 6, 0, 1583154805, 1583154798),
(174, NULL, NULL, '5cb3f71649769d338e5a90cbcbb71dc3.jpg', '/wp-content/uploads/system_data/default_5cb3f71649769d338e5a90cbcbb71dc3.jpg', 6, 0, 1583154805, 1583154798),
(176, NULL, NULL, '5da9bda5a6ae39476fc3f3f3a9d06b66.jpg', '/wp-content/uploads/system_data/default_5da9bda5a6ae39476fc3f3f3a9d06b66.jpg', 5, 0, 1583154890, 1583154880),
(177, NULL, NULL, '8f5dfab0412c32819aaf90d868af8201.jpg', '/wp-content/uploads/system_data/default_8f5dfab0412c32819aaf90d868af8201.jpg', 5, 0, 1583154890, 1583154882),
(178, NULL, NULL, '3f55d770461825ae9a64577dc8742f3c.jpg', '/wp-content/uploads/system_data/default_3f55d770461825ae9a64577dc8742f3c.jpg', 5, 1, 1583154890, 1583154883),
(179, NULL, NULL, '5f17e7814e9f56c36bcbb7c5c8cba85f.jpg', '/wp-content/uploads/system_data/default_5f17e7814e9f56c36bcbb7c5c8cba85f.jpg', 5, 0, 1583154890, 1583154885),
(180, NULL, NULL, 'ef930c09fd8c89d3ec4e4aab15fd70f8.jpg', '/wp-content/uploads/system_data/default_ef930c09fd8c89d3ec4e4aab15fd70f8.jpg', 5, 0, 1583154890, 1583154885),
(181, NULL, NULL, '685f05e1d83e55712d6a870dd26a761d.jpg', '/wp-content/uploads/system_data/default_685f05e1d83e55712d6a870dd26a761d.jpg', 2, 1, 1583154978, 1583154964),
(182, NULL, NULL, '2ef79a1be1ff37eefd86e67e8ac74e3a.jpg', '/wp-content/uploads/system_data/default_2ef79a1be1ff37eefd86e67e8ac74e3a.jpg', 2, 0, 1583154978, 1583154965),
(183, NULL, NULL, '55f3bbe36dd1ff73cec58e26dbbf0f67.jpg', '/wp-content/uploads/system_data/default_55f3bbe36dd1ff73cec58e26dbbf0f67.jpg', 2, 0, 1583154978, 1583154967),
(184, NULL, NULL, 'adb52739f863a41ebee2cc66d54792e1.jpg', '/wp-content/uploads/system_data/default_adb52739f863a41ebee2cc66d54792e1.jpg', 2, 0, 1583154978, 1583154968),
(185, NULL, NULL, '5a2f9c7cd81451493f1a8ab053db1eac.jpg', '/wp-content/uploads/system_data/default_5a2f9c7cd81451493f1a8ab053db1eac.jpg', 2, 0, 1583154978, 1583154969),
(186, NULL, NULL, '3c38d3eb750c2789d8388f51f8f6b371.jpg', '/wp-content/uploads/system_data/default_3c38d3eb750c2789d8388f51f8f6b371.jpg', 2, 0, 1583154978, 1583154970),
(187, NULL, NULL, '8fa67adff16d6029f3ac5884a5f44a5e.jpg', '/wp-content/uploads/system_data/default_8fa67adff16d6029f3ac5884a5f44a5e.jpg', 1, 0, 1583155038, 1583155030),
(188, NULL, NULL, 'daafcf44a32a3305e6b53476f338ceb5.jpg', '/wp-content/uploads/system_data/default_daafcf44a32a3305e6b53476f338ceb5.jpg', 1, 0, 1583155038, 1583155031),
(189, NULL, NULL, '8ac465c1bc4d571e00222431807bd673.jpg', '/wp-content/uploads/system_data/default_8ac465c1bc4d571e00222431807bd673.jpg', 1, 0, 1583155038, 1583155032),
(190, NULL, NULL, '431d995baa68f7fa5075920004879af6.jpg', '/wp-content/uploads/system_data/default_431d995baa68f7fa5075920004879af6.jpg', 1, 0, 1583155038, 1583155033),
(191, NULL, NULL, 'a05fbc6280336a5c26869ee1e393ff6b.jpg', '/wp-content/uploads/system_data/default_a05fbc6280336a5c26869ee1e393ff6b.jpg', 1, 0, 1583155038, 1583155035),
(192, NULL, NULL, '93e5c7e203447335e12ec0effc9308d6.jpg', '/wp-content/uploads/system_data/default_93e5c7e203447335e12ec0effc9308d6.jpg', 1, 1, 1583155038, 1583155035),
(133, NULL, NULL, '6ed235b1995a1f135ebf9ac36ee79c8a.jpg', '/wp-content/uploads/system_data/default_6ed235b1995a1f135ebf9ac36ee79c8a.jpg', 39, 0, 1583153767, 1583153759),
(134, NULL, NULL, '52cf66dd8efc5fe32832724859e2ac82.jpg', '/wp-content/uploads/system_data/default_52cf66dd8efc5fe32832724859e2ac82.jpg', 39, 1, 1583153767, 1583153760),
(135, NULL, NULL, 'dec5b8c89dc8eba4f9726f1882a168b4.jpg', '/wp-content/uploads/system_data/default_dec5b8c89dc8eba4f9726f1882a168b4.jpg', 39, 0, 1583153767, 1583153762),
(136, NULL, NULL, '700a367c5379265eff6adac12844aea0.jpg', '/wp-content/uploads/system_data/default_700a367c5379265eff6adac12844aea0.jpg', 39, 0, 1583153767, 1583153762),
(137, NULL, NULL, '1b70e50f830a673cada29100bb6cb827.jpg', '/wp-content/uploads/system_data/default_1b70e50f830a673cada29100bb6cb827.jpg', 39, 0, 1583153767, 1583153764),
(138, NULL, NULL, '9b276b5f58b2da55b1ae6c5d85611e88.jpg', '/wp-content/uploads/system_data/default_9b276b5f58b2da55b1ae6c5d85611e88.jpg', 39, 0, 1583153767, 1583153765),
(139, NULL, NULL, '41877e6d66068ee2aafab5f716917f2b.jpg', '/wp-content/uploads/system_data/default_41877e6d66068ee2aafab5f716917f2b.jpg', 12, 1, 1583153813, 1583153810),
(140, NULL, NULL, '1374fe7b531b17490a98572d72d434ac.jpg', '/wp-content/uploads/system_data/default_1374fe7b531b17490a98572d72d434ac.jpg', 12, 0, 1583153813, 1583153811),
(141, NULL, NULL, 'b32ff3414800a3f8c4fb9eb230fe3035.jpg', '/wp-content/uploads/system_data/default_b32ff3414800a3f8c4fb9eb230fe3035.jpg', 12, 0, 1583153813, 1583153812),
(142, NULL, NULL, 'd5ced78cd14fe7f4737b026e066afc73.jpg', '/wp-content/uploads/system_data/default_d5ced78cd14fe7f4737b026e066afc73.jpg', 12, 0, 1583153813, 1583153813),
(143, NULL, NULL, 'd231e729434833fe047f156c39b91887.jpg', '/wp-content/uploads/system_data/default_d231e729434833fe047f156c39b91887.jpg', 12, NULL, 1583153815, 1583153815),
(144, NULL, NULL, '237954935b45338b1bbb1ad2a14608e1.jpg', '/wp-content/uploads/system_data/default_237954935b45338b1bbb1ad2a14608e1.jpg', 12, NULL, 1583153815, 1583153815),
(145, NULL, NULL, '1cc1b3c4304f0f7ca444419952cc9dee.jpg', '/wp-content/uploads/system_data/default_1cc1b3c4304f0f7ca444419952cc9dee.jpg', 10, 0, 1583153879, 1583153869),
(146, NULL, NULL, '150c1f9f555ebe0b317722137872fec2.jpg', '/wp-content/uploads/system_data/default_150c1f9f555ebe0b317722137872fec2.jpg', 10, 1, 1583153879, 1583153869),
(147, NULL, NULL, 'c981e4330006188f3f57f2ce469f05d9.jpg', '/wp-content/uploads/system_data/default_c981e4330006188f3f57f2ce469f05d9.jpg', 10, 0, 1583153879, 1583153871),
(148, NULL, NULL, '5486dbe610e2e44e31f02996bbe7cce1.jpg', '/wp-content/uploads/system_data/default_5486dbe610e2e44e31f02996bbe7cce1.jpg', 10, 0, 1583153879, 1583153872),
(149, NULL, NULL, '74f3ae37da904f1546a467960b34a2bb.jpg', '/wp-content/uploads/system_data/default_74f3ae37da904f1546a467960b34a2bb.jpg', 10, 0, 1583153879, 1583153873),
(150, NULL, NULL, 'b264daba34b25a2fbdd6a3b610942914.jpg', '/wp-content/uploads/system_data/default_b264daba34b25a2fbdd6a3b610942914.jpg', 10, 0, 1583153879, 1583153874),
(151, NULL, NULL, '3901ca95d632be39d4433709e0e1729f.jpg', '/wp-content/uploads/system_data/default_3901ca95d632be39d4433709e0e1729f.jpg', 9, 0, 1583153920, 1583153911),
(152, NULL, NULL, '4c6dd4b6bf15bc1bc5a15ff60499db17.jpg', '/wp-content/uploads/system_data/default_4c6dd4b6bf15bc1bc5a15ff60499db17.jpg', 9, 0, 1583153920, 1583153912),
(153, NULL, NULL, '95d42bb7c852c0c124b4c70e5a2022e9.jpg', '/wp-content/uploads/system_data/default_95d42bb7c852c0c124b4c70e5a2022e9.jpg', 9, 0, 1583153920, 1583153913),
(154, NULL, NULL, 'd2aec60b196e9bd3cb4967d9b3ad5332.jpg', '/wp-content/uploads/system_data/default_d2aec60b196e9bd3cb4967d9b3ad5332.jpg', 9, 0, 1583153920, 1583153914),
(155, NULL, NULL, '0a906721c826829b9ea69525ea9eb0aa.jpg', '/wp-content/uploads/system_data/default_0a906721c826829b9ea69525ea9eb0aa.jpg', 9, 0, 1583153920, 1583153915),
(156, NULL, NULL, '291b2ed0f49dece7c5d367b971471c1f.jpg', '/wp-content/uploads/system_data/default_291b2ed0f49dece7c5d367b971471c1f.jpg', 9, 1, 1583153920, 1583153916),
(157, NULL, NULL, '2e52806097d3ff97b798699216ba6cef.jpg', '/wp-content/uploads/system_data/default_2e52806097d3ff97b798699216ba6cef.jpg', 8, 0, 1583154579, 1583154571),
(158, NULL, NULL, '0b1ac17b7a3f957d8de07a144636905e.jpg', '/wp-content/uploads/system_data/default_0b1ac17b7a3f957d8de07a144636905e.jpg', 8, 0, 1583154579, 1583154572),
(159, NULL, NULL, '4f22e7f1fd7e65913d121129888cb4d9.jpg', '/wp-content/uploads/system_data/default_4f22e7f1fd7e65913d121129888cb4d9.jpg', 8, 1, 1583154579, 1583154573),
(160, NULL, NULL, 'c28de6e7601b91f2d578891f2d173f4f.jpg', '/wp-content/uploads/system_data/default_c28de6e7601b91f2d578891f2d173f4f.jpg', 8, 0, 1583154579, 1583154574),
(161, NULL, NULL, '8c2744804634c6aeb1cab1492c2a1ec4.jpg', '/wp-content/uploads/system_data/default_8c2744804634c6aeb1cab1492c2a1ec4.jpg', 8, 0, 1583154579, 1583154575),
(162, NULL, NULL, '6f15cbc3cc11df5a41e1126fec4c7f63.jpg', '/wp-content/uploads/system_data/default_6f15cbc3cc11df5a41e1126fec4c7f63.jpg', 8, 0, 1583154579, 1583154576),
(163, NULL, NULL, 'f3a6c9f9d9390833e6b0ea121ce5bbb5.jpg', '/wp-content/uploads/system_data/default_f3a6c9f9d9390833e6b0ea121ce5bbb5.jpg', 7, 0, 1583154698, 1583154687),
(164, NULL, NULL, '400aa1ccfe420c98c530c3f9def0b357.jpg', '/wp-content/uploads/system_data/default_400aa1ccfe420c98c530c3f9def0b357.jpg', 7, 1, 1583154698, 1583154688),
(165, NULL, NULL, 'b158228c422c9647de4e097a6ba8e9ec.jpg', '/wp-content/uploads/system_data/default_b158228c422c9647de4e097a6ba8e9ec.jpg', 7, 0, 1583154698, 1583154690),
(166, NULL, NULL, '7be4e947f1b4efb9a2175739e4488260.jpg', '/wp-content/uploads/system_data/default_7be4e947f1b4efb9a2175739e4488260.jpg', 7, 0, 1583154698, 1583154691),
(167, NULL, NULL, '9080b9a4c15c131f29eba8caccbe1481.jpg', '/wp-content/uploads/system_data/default_9080b9a4c15c131f29eba8caccbe1481.jpg', 7, 0, 1583154698, 1583154692),
(168, NULL, NULL, '25c6dae6f2b84b1343b402f05dc4dab5.jpg', '/wp-content/uploads/system_data/default_25c6dae6f2b84b1343b402f05dc4dab5.jpg', 7, 0, 1583154698, 1583154693),
(169, NULL, NULL, '48accb7d6786a36354d0a5987e28be16.jpg', '/wp-content/uploads/system_data/default_48accb7d6786a36354d0a5987e28be16.jpg', 6, 0, 1583154805, 1583154793),
(170, NULL, NULL, '3eb3a60a72a819e86d54aaf8d059c4d2.jpg', '/wp-content/uploads/system_data/default_3eb3a60a72a819e86d54aaf8d059c4d2.jpg', 6, 0, 1583154805, 1583154794);

-- --------------------------------------------------------

--
-- Table structure for table `s7_transakce`
--

CREATE TABLE `s7_transakce` (
  `id` int(11) NOT NULL,
  `nazev_sluzby` varchar(255) COLLATE utf8mb4_czech_ci NOT NULL,
  `id_odesilatel` int(11) NOT NULL,
  `id_prijemce` int(11) NOT NULL,
  `mnozstvi` int(11) NOT NULL,
  `accept` int(11) NOT NULL DEFAULT '0',
  `datum_zalozeni` int(11) NOT NULL,
  `datum_upravy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci COMMENT='Tabulka sloužící pro evidenci transakcí v systému';

--
-- Dumping data for table `s7_transakce`
--

INSERT INTO `s7_transakce` (`id`, `nazev_sluzby`, `id_odesilatel`, `id_prijemce`, `mnozstvi`, `accept`, `datum_zalozeni`, `datum_upravy`) VALUES
(2, 'Topování inzerátu. ID inzerátu 4', 4, -1, 20, 1, 1587291739, 1587291739),
(4, 'Testovací služba', 4, -1, 20, 1, 1587584853, 1587584853),
(24, 'Hlídací pes', 4, -1, 2, 1, 1587755437, 1587755437),
(25, 'Hlídací pes', 4, -1, 2, 1, 1587755601, 1587755601),
(26, 'Hlídací pes', 4, -1, 2, 1, 1587924300, 1587924300),
(27, 'Top inzerátu ID: 39', 4, -1, 1, 1, 1587925515, 1587925515),
(28, 'Top inzerátu ID: 12', 4, -1, 1, 1, 1587925549, 1587925549),
(29, 'Top inzerátu ID: 39', 4, -1, 1, 1, 1587926139, 1587926139),
(30, 'Top inzerátu ID: 12', 4, -1, 1, 1, 1587926364, 1587926364);

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
(3, 'Roman', 'Jarolímek', 'root@localhost.cz', '777 888 999', 'duf', 'uf', 'http://localhost/realsys/wp-content/uploads/2019/11/IMG_20191030_212103.jpg', 'Je to rebel', 1, '$2y$10$hk8t96Q8WtmbeXogZBWn0eF8C3QaSpJ61D4W8XWegCY0JyD5zICt2', NULL, 1571090400, 1583155204),
(2, 'Petr', 'Novák', 'Jjj@seznam.cz', '777888999', 'asgfasga5d4g', 'ds54gds4g', 'http://localhost/realsys/wp-content/uploads/2019/10/20160817_125720.jpg', 'Nic moc', 0, NULL, NULL, 1570312800, 1570471267),
(4, 'Jakubisko', 'Sedmík', 'Alpha7@seznam.cz', '+420 724 855 993', '', '', 'http://localhost/realsys/wp-content/uploads/system_data/gallery_6a76516b69e00f5744e5fdeb46a70917.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sollicitudin venenatis arcu et viverra. Pellentesque ac eros sagittis, rhoncus ex eu, varius lectus. Aenean sodales finibus velit eu vestibulum. Vestibulum ut facilisis metus. Nulla blandit, lacus non aliquam hendrerit, pic purus dolor sollicitudin mauris, ut rhoncus dui lacus et dolor. Maecenas mollis, purus sit amet gravida convallis, sapien nunc semper eros, a hendrerit magna ipsum fermentum nisi. Praesent sagittis eget arcu sit amet consectetur. ', 0, '$2y$10$B9G.UT0.JRVhji1c/2whDe1QhKkPIv/MPf7ZvM90QHS6AE8G6aDTG', NULL, 1571090400, 1583079813),
(11, 'Nový', 'Uživatel', 'info@studioseven.cz', '777888999', '', '', '', '', 0, '$2y$10$b/jHErqRKcTgKSCmMmXlAu9ByhQLN3A8ILDdhySEktUYW0QomIy8e', NULL, 1578265200, 1583155134),
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
(79, 'widget_text', 'a:4:{i:1;a:0:{}i:2;a:4:{s:5:\"title\";s:13:\"Masz pytanie?\";s:4:\"text\";s:301:\"<div class=\"footer-contact\">\r\n<a href=\"tel:777888555\"><div class=\"aicon phone\"><span class=\"icon-phone\"></span></div><span>+48 777 888 555</span></a>\r\n	\r\n		<a href=\"mailto:filip@szukamdom.pl\"><div class=\"aicon email\"><span class=\"icon-plane\"></span></div><span>filip@szukamdom.pl</span></a>\r\n	\r\n</div>\";s:6:\"filter\";b:1;s:6:\"visual\";b:1;}i:5;a:4:{s:5:\"title\";s:13:\"Naše služby\";s:4:\"text\";s:473:\"<h3 class=\"footer-sec-title\">Pre majiteľov<br>\r\nnehnutelností</h3>\r\n<ul class=\"menu\">\r\n 	<li><a href=\"#\">Vložit inzerát</a></li>\r\n 	<li><a href=\"#\">Lepší smlouva</a></li>\r\n 	<li><a href=\"#\">Cenová mapa</a></li>\r\n 	<li><a href=\"#\">Realitní průvodce</a></li>\r\n 	<li><a href=\"#\">Ověření bezdlužnosti</a>\r\n</li>\r\n 	<li><a href=\"#\">Profesionální foto</a></li>\r\n 	<li><a href=\"#\">Topování inzerátů</a></li>\r\n 	<li><a href=\"#\">Pojistění plateb</a></li>\r\n</ul>\";s:6:\"filter\";b:1;s:6:\"visual\";b:1;}s:12:\"_multiwidget\";i:1;}', 'yes'),
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
(102, 'sidebars_widgets', 'a:6:{s:19:\"wp_inactive_widgets\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:16:\"first_footer_col\";a:2:{i:0;s:6:\"text-2\";i:1;s:13:\"custom_html-2\";}s:17:\"second_footer_col\";a:1:{i:0;s:10:\"nav_menu-3\";}s:16:\"third_footer_col\";a:1:{i:0;s:6:\"text-5\";}s:17:\"fourth_footer_col\";a:1:{i:0;s:13:\"custom_html-3\";}s:13:\"array_version\";i:3;}', 'yes'),
(103, 'cron', 'a:5:{i:1588003879;a:1:{s:34:\"wp_privacy_delete_old_export_files\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1588007479;a:4:{s:32:\"recovery_mode_clean_expired_keys\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1588007488;a:2:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}s:25:\"delete_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1588007489;a:1:{s:30:\"wp_scheduled_auto_draft_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}s:7:\"version\";i:2;}', 'yes'),
(104, 'widget_pages', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(105, 'widget_calendar', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(106, 'widget_media_audio', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(107, 'widget_media_image', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(108, 'widget_media_gallery', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(109, 'widget_media_video', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(110, 'widget_tag_cloud', 'a:1:{s:12:\"_multiwidget\";i:1;}', 'yes'),
(111, 'widget_nav_menu', 'a:2:{i:3;a:2:{s:5:\"title\";s:12:\"Szukamdom.pl\";s:8:\"nav_menu\";i:3;}s:12:\"_multiwidget\";i:1;}', 'yes'),
(112, 'widget_custom_html', 'a:3:{i:2;a:2:{s:5:\"title\";s:12:\"Obserwuj nas\";s:7:\"content\";s:423:\"<div class=\"footer-soc-icos\">\r\n	<a class=\"social-ico facebook\" href=\"https://www.facebook.com/szukamdompl\">\r\n		<span class=\"icon-facebook\"></span>\r\n	</a>\r\n	<a class=\"social-ico pinterest\" href=\"https://www.pinterest.com/szukamdom.pl\">\r\n		<span class=\"icon-pinterest\"></span>\r\n	</a>\r\n	<a class=\"social-ico instagram\" href=\"https://www.instagram.com/szukamdom.pl/\">\r\n		<span class=\"icon-instagram\"></span>\r\n	</a>\r\n\r\n	\r\n</div>\";}i:3;a:2:{s:5:\"title\";s:0:\"\";s:7:\"content\";s:340:\"<div class=\"footer-spacer\"></div>\r\n<h3 class=\"footer-sec-title\">Pre záujemcov <br>o nehnutelnosti</h3>\r\n<ul class=\"menu\">\r\n 	<li><a href=\"#\">Platba za kontakt</a></li>\r\n 	<li><a href=\"#\">Topování zpráv</a></li>\r\n 	<li><a href=\"#\">Hlídací pes</a></li>\r\n 	<li><a href=\"#\">Hypotéky</a></li>\r\n	<li><a href=\"#\">Stahování</a></li>\r\n</ul>\";}s:12:\"_multiwidget\";i:1;}', 'yes'),
(114, 'recovery_keys', 'a:0:{}', 'yes'),
(118, 'theme_mods_twentynineteen', 'a:2:{s:18:\"custom_css_post_id\";i:-1;s:16:\"sidebars_widgets\";a:2:{s:4:\"time\";i:1566929362;s:4:\"data\";a:2:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}}}}', 'yes'),
(122, '_site_transient_update_core', 'O:8:\"stdClass\":4:{s:7:\"updates\";a:4:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:7:\"upgrade\";s:8:\"download\";s:57:\"https://downloads.wordpress.org/release/wordpress-5.4.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:57:\"https://downloads.wordpress.org/release/wordpress-5.4.zip\";s:10:\"no_content\";s:68:\"https://downloads.wordpress.org/release/wordpress-5.4-no-content.zip\";s:11:\"new_bundled\";s:69:\"https://downloads.wordpress.org/release/wordpress-5.4-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:3:\"5.4\";s:7:\"version\";s:3:\"5.4\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";}i:1;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:57:\"https://downloads.wordpress.org/release/wordpress-5.4.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:57:\"https://downloads.wordpress.org/release/wordpress-5.4.zip\";s:10:\"no_content\";s:68:\"https://downloads.wordpress.org/release/wordpress-5.4-no-content.zip\";s:11:\"new_bundled\";s:69:\"https://downloads.wordpress.org/release/wordpress-5.4-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:3:\"5.4\";s:7:\"version\";s:3:\"5.4\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";s:9:\"new_files\";s:1:\"1\";}i:2;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:65:\"https://downloads.wordpress.org/release/cs_CZ/wordpress-5.3.2.zip\";s:6:\"locale\";s:5:\"cs_CZ\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:65:\"https://downloads.wordpress.org/release/cs_CZ/wordpress-5.3.2.zip\";s:10:\"no_content\";b:0;s:11:\"new_bundled\";b:0;s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.3.2\";s:7:\"version\";s:5:\"5.3.2\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";s:9:\"new_files\";s:1:\"1\";}i:3;O:8:\"stdClass\":11:{s:8:\"response\";s:10:\"autoupdate\";s:8:\"download\";s:65:\"https://downloads.wordpress.org/release/cs_CZ/wordpress-5.2.5.zip\";s:6:\"locale\";s:5:\"cs_CZ\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:65:\"https://downloads.wordpress.org/release/cs_CZ/wordpress-5.2.5.zip\";s:10:\"no_content\";b:0;s:11:\"new_bundled\";b:0;s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"5.2.5\";s:7:\"version\";s:5:\"5.2.5\";s:11:\"php_version\";s:6:\"5.6.20\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"5.3\";s:15:\"partial_version\";s:0:\"\";s:9:\"new_files\";s:1:\"1\";}}s:12:\"last_checked\";i:1588001143;s:15:\"version_checked\";s:5:\"5.2.2\";s:12:\"translations\";a:0:{}}', 'no'),
(124, '_site_transient_update_plugins', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1588001143;s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:0:{}}', 'no'),
(132, 'can_compress_scripts', '1', 'no'),
(163, 'recently_activated', 'a:0:{}', 'yes'),
(184, 'current_theme', 'RealSys', 'yes'),
(185, 'theme_mods_realsys', 'a:16:{i:0;b:0;s:18:\"nav_menu_locations\";a:1:{s:15:\"cms_header_menu\";i:2;}s:18:\"custom_css_post_id\";i:-1;s:11:\"custom_logo\";i:54;s:13:\"slider_text_1\";s:67:\"<strong>Najdi si nový domov</strong><br>Bez realitky a bez provize\";s:13:\"slider_text_2\";s:15:\"Nebo Inzeruj...\";s:12:\"cta_hp_title\";s:46:\"NEPLAŤTE PROVIZI REALITCE,<br>KDYŽ NEMUSÍTE\";s:19:\"cta_hp_button1_text\";s:16:\"Přidat Inzerát\";s:19:\"cta_hp_button2_text\";s:12:\"Je to zdarma\";s:21:\"top_nemovitosti_title\";s:16:\"Top Nemovitostii\";s:31:\"top_nemovitosti_nem_button_text\";s:6:\"Detail\";s:28:\"top_nemovitosti_next_ads_url\";s:7:\"/vypis/\";s:24:\"top_nemovitosti_next_ads\";s:17:\"Další inzeráty\";s:18:\"cta_hp_button1_url\";s:16:\"/pridat-inzerat/\";s:18:\"cta_hp_button2_url\";s:16:\"/pridat-inzerat/\";s:17:\"slider_button_url\";s:16:\"/pridat-inzerat/\";}', 'yes'),
(186, 'theme_switched', '', 'yes'),
(284, 'recovery_mode_email_last_sent', '1583000087', 'yes'),
(832, 'nav_menu_options', 'a:2:{i:0;b:0;s:8:\"auto_add\";a:0:{}}', 'yes'),
(1599, '_site_transient_timeout_browser_952637548dc3e67d2638455ee5804af8', '1588235373', 'no'),
(1600, '_site_transient_browser_952637548dc3e67d2638455ee5804af8', 'a:10:{s:4:\"name\";s:6:\"Chrome\";s:7:\"version\";s:13:\"81.0.4044.122\";s:8:\"platform\";s:7:\"Windows\";s:10:\"update_url\";s:29:\"https://www.google.com/chrome\";s:7:\"img_src\";s:43:\"http://s.w.org/images/browsers/chrome.png?1\";s:11:\"img_src_ssl\";s:44:\"https://s.w.org/images/browsers/chrome.png?1\";s:15:\"current_version\";s:2:\"18\";s:7:\"upgrade\";b:0;s:8:\"insecure\";b:0;s:6:\"mobile\";b:0;}', 'no'),
(1601, '_site_transient_timeout_php_check_0cbcbda5109bcde6b94054595b5c2163', '1588235374', 'no'),
(1602, '_site_transient_php_check_0cbcbda5109bcde6b94054595b5c2163', 'a:5:{s:19:\"recommended_version\";s:3:\"7.3\";s:15:\"minimum_version\";s:6:\"5.6.20\";s:12:\"is_supported\";b:1;s:9:\"is_secure\";b:1;s:13:\"is_acceptable\";b:1;}', 'no'),
(1641, '_site_transient_timeout_theme_roots', '1588002944', 'no'),
(1642, '_site_transient_theme_roots', 'a:2:{s:7:\"realsys\";s:7:\"/themes\";s:14:\"twentynineteen\";s:7:\"/themes\";}', 'no'),
(1643, '_site_transient_update_themes', 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1588001145;s:7:\"checked\";a:2:{s:7:\"realsys\";s:3:\"1.0\";s:14:\"twentynineteen\";s:3:\"1.4\";}s:8:\"response\";a:1:{s:14:\"twentynineteen\";a:6:{s:5:\"theme\";s:14:\"twentynineteen\";s:11:\"new_version\";s:3:\"1.5\";s:3:\"url\";s:44:\"https://wordpress.org/themes/twentynineteen/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/theme/twentynineteen.1.5.zip\";s:8:\"requires\";s:5:\"4.9.6\";s:12:\"requires_php\";s:5:\"5.2.4\";}}s:12:\"translations\";a:0:{}}', 'no');

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
(183, 67, '_edit_lock', '1583145866:1'),
(184, 1, '_edit_lock', '1576609508:1'),
(185, 73, '_edit_lock', '1577284846:1'),
(186, 75, '_edit_lock', '1577724615:1'),
(187, 79, '_edit_lock', '1583155798:1'),
(188, 82, '_edit_lock', '1583155990:1'),
(189, 85, '_edit_lock', '1581762825:1'),
(190, 85, '_wp_page_template', 'cms-template.php'),
(191, 87, '_edit_lock', '1581766517:1'),
(198, 91, '_menu_item_type', 'post_type'),
(199, 91, '_menu_item_menu_item_parent', '0'),
(200, 91, '_menu_item_object_id', '82'),
(201, 91, '_menu_item_object', 'page'),
(202, 91, '_menu_item_target', ''),
(203, 91, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(204, 91, '_menu_item_xfn', ''),
(205, 91, '_menu_item_url', ''),
(207, 92, '_menu_item_type', 'post_type'),
(208, 92, '_menu_item_menu_item_parent', '0'),
(209, 92, '_menu_item_object_id', '79'),
(210, 92, '_menu_item_object', 'page'),
(211, 92, '_menu_item_target', ''),
(212, 92, '_menu_item_classes', 'a:1:{i:0;s:0:\"\";}'),
(213, 92, '_menu_item_xfn', ''),
(214, 92, '_menu_item_url', ''),
(216, 95, '_edit_lock', '1582996447:1'),
(221, 99, '_edit_lock', '1583057147:1'),
(222, 103, '_edit_lock', '1586430874:1');

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
(41, 1, '2019-11-11 21:14:48', '2019-11-11 20:14:48', ' ', '', '', 'publish', 'closed', 'closed', '', '41', '', '', '2020-02-22 10:56:05', '2020-02-22 09:56:05', '', 0, 'http://localhost/realsys/?p=41', 1, 'nav_menu_item', '', 0),
(42, 1, '2019-11-11 21:14:49', '2019-11-11 20:14:49', ' ', '', '', 'publish', 'closed', 'closed', '', '42', '', '', '2020-02-22 10:56:05', '2020-02-22 09:56:05', '', 0, 'http://localhost/realsys/?p=42', 7, 'nav_menu_item', '', 0),
(43, 1, '2019-11-11 21:14:48', '2019-11-11 20:14:48', ' ', '', '', 'publish', 'closed', 'closed', '', '43', '', '', '2020-02-22 10:56:05', '2020-02-22 09:56:05', '', 0, 'http://localhost/realsys/?p=43', 6, 'nav_menu_item', '', 0),
(44, 1, '2019-11-11 21:14:48', '2019-11-11 20:14:48', ' ', '', '', 'publish', 'closed', 'closed', '', '44', '', '', '2020-02-22 10:56:05', '2020-02-22 09:56:05', '', 0, 'http://localhost/realsys/?p=44', 5, 'nav_menu_item', '', 0),
(45, 1, '2019-11-11 21:14:48', '2019-11-11 20:14:48', ' ', '', '', 'publish', 'closed', 'closed', '', '45', '', '', '2020-02-22 10:56:05', '2020-02-22 09:56:05', '', 0, 'http://localhost/realsys/?p=45', 4, 'nav_menu_item', '', 0),
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
(79, 1, '2020-01-10 19:34:25', '2020-01-10 18:34:25', '', 'Výpis inzerátů', '', 'publish', 'closed', 'closed', '', 'vypis', '', '', '2020-02-22 10:54:41', '2020-02-22 09:54:41', '', 0, 'http://localhost/realsys/?page_id=79', 0, 'page', '', 0),
(80, 1, '2020-01-10 19:34:25', '2020-01-10 18:34:25', '', 'vypis', '', 'inherit', 'closed', 'closed', '', '79-revision-v1', '', '', '2020-01-10 19:34:25', '2020-01-10 18:34:25', '', 79, 'http://localhost/realsys/79-revision-v1/', 0, 'revision', '', 0),
(82, 1, '2020-02-09 19:17:27', '2020-02-09 18:17:27', '', 'Mapa', '', 'publish', 'closed', 'closed', '', 'vypismapa', '', '', '2020-03-02 14:30:15', '2020-03-02 13:30:15', '', 0, 'http://localhost/realsys/?page_id=82', 0, 'page', '', 0),
(83, 1, '2020-02-09 19:17:27', '2020-02-09 18:17:27', '', 'vypismapa', '', 'inherit', 'closed', 'closed', '', '82-revision-v1', '', '', '2020-02-09 19:17:27', '2020-02-09 18:17:27', '', 82, 'http://localhost/realsys/82-revision-v1/', 0, 'revision', '', 0),
(85, 1, '2020-02-15 11:11:54', '2020-02-15 10:11:54', '<div class=\"section-title\">\n<h1 class=\"title\">Lorem Ipsum</h1>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.\n\n</div>\n<div class=\"row section-four-blocks\">\n<div class=\"col-md\">\n<h3>Lorem Ipsum</h3>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit.\n\n</div>\n<div class=\"col-md\">\n<h3>Lorem Ipsum</h3>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit.\n\n</div>\n<div class=\"col-md\">\n<h3>Lorem Ipsum</h3>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit.\n\n</div>\n<div class=\"col-md\">\n<h3>Lorem Ipsum</h3>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit.\n\n</div>\n</div>\n<div class=\"section-title\">\n<h2 class=\"title\">Lorem Ipsum</h2>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.\n\n</div>', 'Cms', '', 'publish', 'closed', 'closed', '', 'cms', '', '', '2020-02-15 11:33:56', '2020-02-15 10:33:56', '', 0, 'http://localhost/realsys/?page_id=85', 0, 'page', '', 0),
(86, 1, '2020-02-15 11:11:54', '2020-02-15 10:11:54', '<div class=\"section-title\">\n<h1 class=\"title\">Lorem Ipsum</h1>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.\n\n</div>\n<div class=\"row section-four-blocks\">\n<div class=\"col-md\">\n<h3>Lorem Ipsum</h3>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit.\n\n</div>\n<div class=\"col-md\">\n<h3>Lorem Ipsum</h3>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit.\n\n</div>\n<div class=\"col-md\">\n<h3>Lorem Ipsum</h3>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit.\n\n</div>\n<div class=\"col-md\">\n<h3>Lorem Ipsum</h3>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit.\n\n</div>\n</div>\n<div class=\"section-title\">\n<h2 class=\"title\">Lorem Ipsum</h2>\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lobortis porttitor aliquam. Duis id accumsan velit. Vestibulum dapibus volutpat metus, vel accumsan massa sagittis vel.\n\n</div>', 'Cms', '', 'inherit', 'closed', 'closed', '', '85-revision-v1', '', '', '2020-02-15 11:11:54', '2020-02-15 10:11:54', '', 85, 'http://localhost/realsys/85-revision-v1/', 0, 'revision', '', 0),
(87, 1, '2020-02-15 12:35:23', '2020-02-15 11:35:23', '', 'gopay', '', 'publish', 'closed', 'closed', '', 'gopay', '', '', '2020-02-15 12:35:23', '2020-02-15 11:35:23', '', 0, 'http://localhost/realsys/?page_id=87', 0, 'page', '', 0),
(88, 1, '2020-02-15 12:35:23', '2020-02-15 11:35:23', '', 'gopay', '', 'inherit', 'closed', 'closed', '', '87-revision-v1', '', '', '2020-02-15 12:35:23', '2020-02-15 11:35:23', '', 87, 'http://localhost/realsys/87-revision-v1/', 0, 'revision', '', 0),
(89, 1, '2020-02-22 10:54:41', '2020-02-22 09:54:41', '', 'Výpis inzerátů', '', 'inherit', 'closed', 'closed', '', '79-revision-v1', '', '', '2020-02-22 10:54:41', '2020-02-22 09:54:41', '', 79, 'http://localhost/realsys/79-revision-v1/', 0, 'revision', '', 0),
(90, 1, '2020-02-22 10:55:16', '2020-02-22 09:55:16', '', 'Hledat na mapě', '', 'inherit', 'closed', 'closed', '', '82-revision-v1', '', '', '2020-02-22 10:55:16', '2020-02-22 09:55:16', '', 82, 'http://localhost/realsys/82-revision-v1/', 0, 'revision', '', 0),
(91, 1, '2020-02-22 10:56:05', '2020-02-22 09:56:05', ' ', '', '', 'publish', 'closed', 'closed', '', '91', '', '', '2020-02-22 10:56:05', '2020-02-22 09:56:05', '', 0, 'http://localhost/realsys/?p=91', 2, 'nav_menu_item', '', 0),
(92, 1, '2020-02-22 10:56:05', '2020-02-22 09:56:05', ' ', '', '', 'publish', 'closed', 'closed', '', '92', '', '', '2020-02-22 10:56:05', '2020-02-22 09:56:05', '', 0, 'http://localhost/realsys/?p=92', 3, 'nav_menu_item', '', 0),
(95, 1, '2020-02-29 16:43:28', '2020-02-29 15:43:28', '', 'objednavka', '', 'publish', 'closed', 'closed', '', 'objednavka', '', '', '2020-02-29 16:43:28', '2020-02-29 15:43:28', '', 0, 'http://localhost/realsys/?page_id=95', 0, 'page', '', 0),
(96, 1, '2020-02-29 16:43:28', '2020-02-29 15:43:28', '', 'objednavka', '', 'inherit', 'closed', 'closed', '', '95-revision-v1', '', '', '2020-02-29 16:43:28', '2020-02-29 15:43:28', '', 95, 'http://localhost/realsys/95-revision-v1/', 0, 'revision', '', 0),
(99, 1, '2020-03-01 11:05:56', '2020-03-01 10:05:56', '', 'editace-inzeratu', '', 'publish', 'closed', 'closed', '', 'editace-inzeratu', '', '', '2020-03-01 11:05:56', '2020-03-01 10:05:56', '', 0, 'http://localhost/realsys/?page_id=99', 0, 'page', '', 0),
(100, 1, '2020-03-01 11:05:56', '2020-03-01 10:05:56', '', 'editace-inzeratu', '', 'inherit', 'closed', 'closed', '', '99-revision-v1', '', '', '2020-03-01 11:05:56', '2020-03-01 10:05:56', '', 99, 'http://localhost/realsys/99-revision-v1/', 0, 'revision', '', 0),
(101, 1, '2020-03-02 14:30:15', '2020-03-02 13:30:15', '', 'Mapa', '', 'inherit', 'closed', 'closed', '', '82-revision-v1', '', '', '2020-03-02 14:30:15', '2020-03-02 13:30:15', '', 82, 'http://localhost/realsys/82-revision-v1/', 0, 'revision', '', 0),
(103, 1, '2020-04-09 13:14:44', '2020-04-09 11:14:44', '', 'hlidacipes', '', 'publish', 'closed', 'closed', '', 'hlidacipes', '', '', '2020-04-09 13:14:44', '2020-04-09 11:14:44', '', 0, 'http://localhost/realsys/?page_id=103', 0, 'page', '', 0),
(104, 1, '2020-04-09 13:14:44', '2020-04-09 11:14:44', '', 'hlidacipes', '', 'inherit', 'closed', 'closed', '', '103-revision-v1', '', '', '2020-04-09 13:14:44', '2020-04-09 11:14:44', '', 103, 'http://localhost/realsys/103-revision-v1/', 0, 'revision', '', 0),
(105, 1, '2020-04-23 10:29:34', '0000-00-00 00:00:00', '', 'Automaticky vytvořený koncept', '', 'auto-draft', 'open', 'open', '', '', '', '', '2020-04-23 10:29:34', '0000-00-00 00:00:00', '', 0, 'http://localhost/realsys/?p=105', 0, 'post', '', 0);

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
(49, 3, 0),
(50, 3, 0),
(51, 3, 0),
(52, 3, 0),
(53, 3, 0),
(91, 2, 0),
(92, 2, 0);

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
(16, 1, 'session_tokens', 'a:1:{s:64:\"eca652026c68388bd5fd716566f74fc1b0d017ba8016c51febd434cf0418a987\";a:4:{s:10:\"expiration\";i:1587803373;s:2:\"ip\";s:3:\"::1\";s:2:\"ua\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.122 Safari/537.36\";s:5:\"login\";i:1587630573;}}'),
(17, 1, 'wp_dashboard_quick_press_last_post_id', '105'),
(18, 1, 'wp_user-settings', 'libraryContent=browse&editor=tinymce'),
(19, 1, 'wp_user-settings-time', '1583057094'),
(20, 1, 'managenav-menuscolumnshidden', 'a:4:{i:0;s:11:\"link-target\";i:1;s:15:\"title-attribute\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";}'),
(21, 1, 'metaboxhidden_nav-menus', 'a:1:{i:0;s:12:\"add-post_tag\";}'),
(22, 1, 'nav_menu_recently_edited', '2');

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
-- Indexes for table `s7_hlidacipes`
--
ALTER TABLE `s7_hlidacipes`
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
-- Indexes for table `s7_transakce`
--
ALTER TABLE `s7_transakce`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `s7_hlidacipes`
--
ALTER TABLE `s7_hlidacipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `s7_inzerat`
--
ALTER TABLE `s7_inzerat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `s7_objednavka`
--
ALTER TABLE `s7_objednavka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `s7_obrazek`
--
ALTER TABLE `s7_obrazek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `s7_transakce`
--
ALTER TABLE `s7_transakce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1644;

--
-- AUTO_INCREMENT for table `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

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

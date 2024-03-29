INSERT INTO `s7_ciselnik` (`domain`, `property`, `value`, `translation`, `datum_zalozeni`, `datum_upravy`) VALUES ('inzeratClass', 'typ_stavby', '3', 'Pozemek', '1582996513', '1582996513');
INSERT INTO `s7_ciselnik` (`domain`, `property`, `value`, `translation`, `datum_zalozeni`, `datum_upravy`) VALUES ('inzeratClass', 'typ_stavby', '4', 'Garáž', '1582996513', '1582996513');
INSERT INTO `s7_ciselnik` (`domain`, `property`, `value`, `translation`, `datum_zalozeni`, `datum_upravy`) VALUES ('inzeratClass', 'typ_stavby', '5', 'Kancelář', '1582996513', '1582996513');
INSERT INTO `s7_ciselnik` (`domain`, `property`, `value`, `translation`, `datum_zalozeni`, `datum_upravy`) VALUES ('inzeratClass', 'typ_stavby', '6', 'Nebytový prostor', '1582996513', '1582996513');
INSERT INTO `s7_ciselnik` (`domain`, `property`, `value`, `translation`, `datum_zalozeni`, `datum_upravy`) VALUES ('inzeratClass', 'typ_stavby', '7', 'Chata/Chalupa', '1582996513', '1582996513');

INSERT INTO `s7_ciselnik` (`domain`, `property`, `value`, `translation`, `datum_zalozeni`, `datum_upravy`) VALUES ('inzeratClass', 'typ_inzeratu', '3', 'Spolubydlení', '1582996513', '1582996513');


// 21.6.2020 only on dev
UPDATE s7_transakce SET id_prijemce=0
INSERT INTO `s7_uzivatel` (`id`, `jmeno`, `prijmeni`, `email`, `telefon`, `fbid`, `gmid`, `avatar`, `popis`, `stav`, `heslo`, `hash`, `datum_zalozeni`, `datum_upravy`) VALUES (0, 'admin', 'admin', 'admin@szukajdom.pl', '777888999', NULL, NULL, NULL, NULL, '0', 'admin', 'admin', NULL, NULL)
ALTER TABLE `s7_objednavka` ADD `invoice_link` VARCHAR(512) NULL COMMENT 'Link na fakturu staženou z fakturoid' AFTER `hash`;
ALTER TABLE `s7_objednavka` ADD `invoice_id` INT NULL AFTER `invoice_link`;

// 8.7.2020 only on dev
ALTER TABLE `s7_uzivatel` ADD `anonymous` BOOLEAN NULL DEFAULT NULL AFTER `telefon`;


ALTER TABLE `s7_inzerat` CHANGE `mestska_cast` `mestska_cast` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_czech_ci NULL;
// 1.9.2020 All on prod and dev


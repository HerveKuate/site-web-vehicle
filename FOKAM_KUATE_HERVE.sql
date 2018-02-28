-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 27 Mai 2016 à 21:05
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `f035064f`
--

-- --------------------------------------------------------

--
-- Structure de la table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `search_number` int(5) NOT NULL,
  `user_id` int(3) NOT NULL,
  `vehicle_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`),
  KEY `favorite` (`search_number`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Contenu de la table `result`
--

INSERT INTO `result` (`id`, `search_number`, `user_id`, `vehicle_id`) VALUES
(61, 5, 1, 60),
(62, 5, 1, 65),
(63, 5, 1, 70),
(64, 6, 1, 46),
(65, 6, 1, 52),
(66, 6, 1, 60),
(67, 6, 1, 62),
(68, 7, 1, 46),
(69, 7, 1, 52),
(70, 7, 1, 60),
(71, 7, 1, 62),
(72, 8, 1, 46),
(73, 8, 1, 52),
(74, 8, 1, 60),
(75, 8, 1, 62),
(76, 9, 1, 46),
(77, 9, 1, 52),
(78, 9, 1, 60),
(79, 9, 1, 62),
(80, 10, 1, 46),
(81, 10, 1, 52),
(82, 10, 1, 60),
(83, 10, 1, 62),
(84, 11, 1, 46),
(85, 11, 1, 52),
(86, 11, 1, 60),
(87, 11, 1, 62),
(88, 12, 1, 49);

-- --------------------------------------------------------

--
-- Structure de la table `saved`
--

CREATE TABLE IF NOT EXISTS `saved` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `vehicle_id` int(10) NOT NULL,
  `user_id` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicule_id` (`vehicle_id`),
  KEY `user_id` (`user_id`),
  KEY `vehicle_id` (`vehicle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `saved`
--

INSERT INTO `saved` (`id`, `vehicle_id`, `user_id`) VALUES
(1, 3, 1),
(2, 1, 1),
(3, 1, 1),
(4, 3, 1),
(5, 3, 1),
(6, 3, 1),
(7, 3, 1),
(8, 3, 1),
(9, 3, 1),
(10, 3, 1),
(11, 3, 1),
(12, 3, 1),
(13, 4, 1),
(14, 10, 1),
(15, 7, 1),
(16, 2, 1),
(17, 9, 1),
(18, 8, 1),
(19, 45, 1),
(20, 74, 1),
(21, 74, 1),
(22, 74, 1);

-- --------------------------------------------------------

--
-- Structure de la table `search`
--

CREATE TABLE IF NOT EXISTS `search` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `basic_search` text,
  `year` int(4) unsigned DEFAULT NULL,
  `year_operator` text,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `cc` decimal(4,2) DEFAULT NULL,
  `cc_operator` text,
  `color` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `U_vehicle_year_make_model` (`year`,`make`,`model`),
  KEY `I_vehicle_year` (`year`),
  KEY `I_vehicle_make` (`make`),
  KEY `I_vehicle_model` (`model`),
  KEY `year` (`year`),
  KEY `make` (`make`,`model`,`cc`,`color`),
  KEY `cc` (`cc`,`color`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `search`
--

INSERT INTO `search` (`id`, `user_id`, `basic_search`, `year`, `year_operator`, `make`, `model`, `cc`, `cc_operator`, `color`) VALUES
(1, 1, NULL, 2000, '>', NULL, NULL, NULL, NULL, 'white'),
(15, 1, 'dg aa', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, NULL, NULL, NULL, 'Honda', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `surname` varchar(15) DEFAULT NULL,
  `forename` varchar(15) DEFAULT NULL,
  `email` text,
  `telephone_number` int(11) DEFAULT NULL,
  `address` text,
  `birthday` date DEFAULT NULL,
  `password` text CHARACTER SET latin1 COLLATE latin1_general_cs,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `surname`, `forename`, `email`, `telephone_number`, `address`, `birthday`, `password`) VALUES
(1, 'saikyou', 'zero', 'saikyouzero@gmail.com', 111, 'saikyou', '1996-01-09', 'megaman');

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `year` int(4) unsigned NOT NULL,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(50) NOT NULL,
  `cc` decimal(4,2) NOT NULL DEFAULT '0.00',
  `color` varchar(15) DEFAULT NULL,
  `picture` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `U_vehicle_year_make_model` (`year`,`make`,`model`),
  KEY `I_vehicle_year` (`year`),
  KEY `I_vehicle_make` (`make`),
  KEY `I_vehicle_model` (`model`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Contenu de la table `vehicle`
--

INSERT INTO `vehicle` (`id`, `year`, `make`, `model`, `cc`, `color`, `picture`) VALUES
(1, 1909, 'Ford', 'Model T', '2.90', 'Red', 'http://www.conceptcarz.com/images/Ford/09_Ford_Model_T_Touring_BY_05_MDB_04.jpg'),
(2, 1926, 'Chrysler', 'Imperial', '5.40', 'red', 'https://upload.wikimedia.org/wikipedia/commons/6/66/Chrysler_Imperial_E80_Touring_1926.jpg'),
(3, 1948, 'Citroen', '2CV', '4.70', 'red and black', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Citroen_2CV_-_Flickr_-_mick_-_Lumix.jpg/1024px-Citroen_2CV_-_Flickr_-_mick_-_Lumix.jpg'),
(4, 1950, 'Hillman', 'Minx Magnificent', '1.20', 'White', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/62/Hillman_Minx_Series_V_1592_cc_first_registered_March_1964.JPG/800px-Hillman_Minx_Series_V_1592_cc_first_registered_March_1964.JPG'),
(5, 1953, 'Chevrolet', 'Corvette', '16.40', 'White', 'https://upload.wikimedia.org/wikipedia/commons/a/a2/Chevrolet_Corvette_C7_01.jpg'),
(7, 1954, 'Cadillac', 'Fleetwood', '4.30', 'white', 'https://upload.wikimedia.org/wikipedia/commons/c/c7/1993-1996_Cadillac_Fleetwood_--_11-20-2011.jpg'),
(8, 1955, 'Chevrolet', 'Corvette', '5.70', 'white', 'https://upload.wikimedia.org/wikipedia/commons/a/a2/Chevrolet_Corvette_C7_01.jpg'),
(9, 1955, 'Ford', 'Thunderbird', '6.40', 'green', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1c/T-bird.jpg/1024px-T-bird.jpg'),
(10, 1956, 'Chevrolet', 'Corvette', '3.90', 'blue', 'https://upload.wikimedia.org/wikipedia/commons/a/a5/Chevrolet_Corvette_blue_vr_EMS.jpg'),
(45, 1993, 'Isuzu', 'Rodeo', '3.60', 'red', 'http://media.ed.edmunds-media.com/isuzu/rodeo/1994/oem/1994_isuzu_rodeo_4dr-suv_s_fq_oem_1_500.jpg'),
(46, 1995, 'Dodge', 'Ram 2500 Club', '5.90', 'white', 'https://dxsdcl7y7vn9x.cloudfront.net/285421/C2D14BCD-DC2E-411D-8D55-56DD745C27B3_1.jpg'),
(47, 1996, 'Mazda', 'MX-6', '2.00', 'red', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/1992_Mazda_MX-6_%28GE%29_coupe_%2820028616534%29.jpg/800px-1992_Mazda_MX-6_%28GE%29_coupe_%2820028616534%29.jpg'),
(48, 1996, 'Nissan', '200SX', '1.60', 'red', 'http://media.ed.edmunds-media.com/nissan/200sx/1996/oem/1996_nissan_200sx_coupe_se_fq_oem_1_500.jpg'),
(49, 1996, 'Honda', 'Civic', '1.60', 'red', 'http://media.ed.edmunds-media.com/honda/civic/1996/oem/1996_honda_civic_coupe_ex_fq_oem_1_500.jpg'),
(50, 1997, 'Lexus', 'LX', '4.50', 'white', 'http://media.ed.edmunds-media.com/lexus/lx-450/1997/oem/1997_lexus_lx-450_4dr-suv_base_fq_oem_1_500.jpg'),
(51, 1997, 'Holden', 'Commodore', '6.20', 'red', 'http://images.hgmsites.net/hug/2010-chevrolet-camaro-2-door-coupe-1ss-angular-front-exterior-view_100244040_h.jpg'),
(52, 1997, 'Dodge', 'Dakota Club', '3.90', 'red', 'http://media.ed.edmunds-media.com/dodge/dakota/1997/oem/1997_dodge_dakota_extended-cab-pickup_sport_rq_oem_1_500.jpg'),
(53, 1998, 'Volkswagen', 'Jetta', '2.80', 'white', 'https://static.cargurus.com/images/site/2009/06/25/16/26/1998-volkswagen-jetta-4-dr-glx-vr6-sedan-pic-4084-1600x1200.jpeg'),
(54, 1998, 'Buick', 'LeSabre', '3.80', 'black', 'http://media.ed.edmunds-media.com/buick/lesabre/1998/oem/1998_buick_lesabre_sedan_custom_fq_oem_1_500.jpg'),
(55, 1999, 'Jeep', 'Wrangler', '2.50', 'blue', 'http://media.ed.edmunds-media.com/jeep/wrangler/1997/oem/1997_jeep_wrangler_convertible-suv_sport_rq_oem_1_500.jpg'),
(56, 1999, 'Volvo', 'C70', '2.40', 'white', 'http://media.ed.edmunds-media.com/volvo/c70/2002/oem/2002_volvo_c70_coupe_ht_f_oem_1_500.jpg'),
(57, 2000, 'GMC', 'Jimmy', '4.30', 'red', 'http://media.ed.edmunds-media.com/gmc/jimmy/1999/oem/1999_gmc_jimmy_2dr-suv_sls-sport_fq_oem_1_500.jpg'),
(58, 2001, 'Audi', 'A6', '2.80', 'black', 'http://media.ed.edmunds-media.com/audi/a6/2000/oem/2000_audi_a6_sedan_42-quattro_fq_oem_1_500.jpg'),
(59, 2002, 'Mazda', 'Protege', '2.00', 'red', 'http://media.ed.edmunds-media.com/mazda/protege/2002/oem/2002_mazda_protege_sedan_es_fq_oem_1_500.jpg'),
(60, 2002, 'Dodge', 'Neon', '2.00', 'red', 'http://media.ed.edmunds-media.com/dodge/neon/2001/oem/2001_dodge_neon_sedan_highline-rt_fq_oem_1_500.jpg'),
(61, 2002, 'Toyota', 'Prius', '2.60', 'blue', 'http://car-pictures.cars.com/images/?IMG=USB20TOC161A0101.png&WIDTH=624&HEIGHT=300&AUTOTRIM=1'),
(62, 2003, 'Saab', '9-5', '3.60', 'white', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/1997-2001_Saab_9-5_SE_sedan_02.jpg/800px-1997-2001_Saab_9-5_SE_sedan_02.jpg'),
(63, 2004, 'BMW', '745', '6.00', 'white', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/BMW_F01_front_20081213.jpg/800px-BMW_F01_front_20081213.jpg'),
(64, 2004, 'HUMMER', 'H2', '6.00', 'black', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/04/Hummer_H2_black.JPG/800px-Hummer_H2_black.JPG'),
(65, 2006, 'Ferrari', 'F430 Spider', '4.30', 'red', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Ferrari_F430_-_Flickr_-_Alexandre_Pr%C3%A9vot_%2825%29_%28cropped%29.jpg/800px-Ferrari_F430_-_Flickr_-_Alexandre_Pr%C3%A9vot_%2825%29_%28cropped%29.jpg'),
(66, 2006, 'Spyker Cars', 'C8', '2.40', 'black', 'https://upload.wikimedia.org/wikipedia/commons/c/ca/Broughtonsspyker.jpg'),
(67, 2006, 'Saturn', 'Ion', '2.20', 'white', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Saturn_Ion_--_07-09-2009.jpg/800px-Saturn_Ion_--_07-09-2009.jpg'),
(68, 2006, 'Lotus', 'Exige', '1.80', 'yellow', 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Lotus_EXIGE_dutch_licence_registration_01-HXR-9_pic1.JPG/798px-Lotus_EXIGE_dutch_licence_registration_01-HXR-9_pic1.JPG'),
(69, 2008, 'Lincoln', 'Town Car', '4.90', 'white', 'https://upload.wikimedia.org/wikipedia/en/thumb/8/8d/LTC_Signature_1998-2002.png/800px-LTC_Signature_1998-2002.png'),
(70, 2008, 'Suzuki', 'Reno', '2.40', 'red', 'http://car-pictures.cars.com/images/?IMG=USB80SZC081A0101.png&WIDTH=624&HEIGHT=300&AUTOTRIM=1'),
(71, 2008, 'Land Rover', 'LR3', '4.50', 'white0', 'https://static.cargurus.com/images/site/2008/02/20/23/16/2008_land_rover_lr3-pic-22355-1600x1200.jpeg'),
(72, 2008, 'Kia', 'Amanti', '3.80', 'white', 'http://images.hgmsites.net/med/2008-kia-amanti-4dr-sdn-white_100052848_m.jpg'),
(73, 2008, 'Jaguar', 'XJ', '2.90', 'white', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/36/Jaguar_XJ_3.0_D-S_Supersport_%28X351%29_%E2%80%93_Frontansicht%2C_30._Juni_2013%2C_M%C3%BCnster.jpg/799px-Jaguar_XJ_3.0_D-S_Supersport_%28X351%29_%E2%80%93_Frontansicht%2C_30._Juni_2013%2C_M%C3%BCnster.jpg'),
(74, 2010, 'Infiniti', 'G', '2.60', 'white', 'http://images.hgmsites.net/lrg/infiniti_100303298_l.jpg'),
(75, 2012, 'Scion', 'iQ', '1.30', 'white', 'http://img3.vast.com/t/560x480/3518514595153447089_2'),
(76, 2012, 'Scion', 'xD', '1.80', 'blue', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Scion_tC_in_Kielce_-_rear.jpg/800px-Scion_tC_in_Kielce_-_rear.jpg'),
(77, 2013, 'Volkswagen', 'CC', '2.80', 'black', 'http://media.caranddriver.com/images/12q1/447419/2013-volkswagen-cc-photo-449735-s-986x603.jpg');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FORIEGN` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `saved`
--
ALTER TABLE `saved`
  ADD CONSTRAINT `hh` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vb` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `search`
--
ALTER TABLE `search`
  ADD CONSTRAINT `tg` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

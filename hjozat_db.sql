-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 07:14 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hjozat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `phone1` varchar(30) NOT NULL,
  `phone2` varchar(30) NOT NULL,
  `phone3` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `insUser` int(11) NOT NULL DEFAULT '0',
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `companyid` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone1`, `phone2`, `phone3`, `email`, `insUser`, `insDate`, `companyid`) VALUES
(1, 'محمد', '0504020305', '0508090605', '0508090605', 'mhd@gmail.com', 0, '2019-06-30 17:30:58', 1),
(2, 'أحمد', '020020202', '020020202', '0508090605', 'm@gmail.com', 0, '2019-07-01 15:34:37', 1),
(3, 'حسن', '0990202020', '0508090605', '0508090605', 'm@gmail.com', 0, '2019-07-01 15:35:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `logo` varchar(600) DEFAULT NULL,
  `taxFlag` tinyint(1) NOT NULL,
  `taxNumber` varchar(50) DEFAULT NULL,
  `taxRatio` decimal(10,0) DEFAULT NULL,
  `insUser` int(11) NOT NULL,
  `insDate` date NOT NULL,
  `taxDesc` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `logo`, `taxFlag`, `taxNumber`, `taxRatio`, `insUser`, `insDate`, `taxDesc`) VALUES
(1, 'مسارات', NULL, 1, '18198165', '5', 1, '2019-06-12', 'قيمة مضافة 2');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `toDate` date NOT NULL,
  `depId` int(11) NOT NULL,
  `perId` int(11) DEFAULT NULL,
  `clientId` int(11) NOT NULL,
  `reservValue` decimal(10,0) NOT NULL,
  `taxValue` decimal(10,0) NOT NULL,
  `totalValue` decimal(10,0) NOT NULL,
  `serviceValue` decimal(10,0) NOT NULL,
  `note` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `insUser` int(11) NOT NULL DEFAULT '0',
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `companyid` int(11) NOT NULL DEFAULT '1',
  `reservType` varchar(20) CHARACTER SET utf8 NOT NULL,
  `fix` int(11) NOT NULL DEFAULT '0',
  `cancel` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_contract` (`date`,`depId`,`perId`),
  KEY `depId` (`depId`,`perId`,`clientId`,`companyid`),
  KEY `depId_2` (`depId`),
  KEY `perId` (`perId`),
  KEY `clientId` (`clientId`),
  KEY `companyid` (`companyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `date`, `toDate`, `depId`, `perId`, `clientId`, `reservValue`, `taxValue`, `totalValue`, `serviceValue`, `note`, `insUser`, `insDate`, `companyid`, `reservType`, `fix`, `cancel`) VALUES
(1, '2019-07-02', '2019-07-02', 10, 7, 1, '10000', '10000', '10000', '10000', NULL, 0, '2019-07-03 07:47:14', 1, '0', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contract_service`
--

CREATE TABLE IF NOT EXISTS `contract_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contractId` int(11) NOT NULL,
  `serviceId` int(11) NOT NULL,
  `value` decimal(10,0) NOT NULL,
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `contractId` (`contractId`,`serviceId`),
  KEY `serviceId` (`serviceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `insUser` int(11) NOT NULL DEFAULT '0',
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `companyId` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `companyId` (`companyId`),
  KEY `companyId_2` (`companyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `insUser`, `insDate`, `companyId`) VALUES
(10, 'صالة شرقية', 0, '2019-06-29 16:45:36', 1),
(11, 'صالة غربية', 0, '2019-07-01 15:21:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `moneyorg`
--

CREATE TABLE IF NOT EXISTS `moneyorg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `insUser` int(11) NOT NULL DEFAULT '0',
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `companyId` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `companyId` (`companyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `moneyorg`
--

INSERT INTO `moneyorg` (`id`, `name`, `insUser`, `insDate`, `companyId`) VALUES
(6, 'بنك بيمو', 0, '2019-07-01 15:22:16', 1),
(7, 'بنك عودة', 0, '2019-07-01 15:22:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE IF NOT EXISTS `period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `value` decimal(10,0) NOT NULL,
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insUser` int(11) NOT NULL DEFAULT '0',
  `companyId` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `companyId` (`companyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id`, `name`, `value`, `insDate`, `insUser`, `companyId`) VALUES
(7, 'صباحي', '50000', '2019-06-29 18:40:12', 0, 1),
(8, 'مسائي', '60000', '2019-07-01 15:21:33', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `recepetvoucher`
--

CREATE TABLE IF NOT EXISTS `recepetvoucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `payMethod` varchar(4) CHARACTER SET utf8 NOT NULL,
  `payValue` decimal(10,0) NOT NULL,
  `note` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insUser` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client` (`client`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `recepetvoucher`
--

INSERT INTO `recepetvoucher` (`id`, `client`, `payMethod`, `payValue`, `note`, `insDate`, `insUser`, `date`) VALUES
(2, 1, 'بنك', '5000', 'test', '2019-06-30 21:00:00', 0, '1899-11-01'),
(3, 1, 'نقدي', '5000', NULL, '2019-07-01 18:40:23', 0, '2019-07-01'),
(4, 1, 'بنك', '6000', NULL, '2019-07-03 05:21:23', 0, '2019-07-03'),
(5, 2, 'بنك', '70000', NULL, '2019-07-03 05:22:16', 0, '2019-07-03'),
(6, 1, 'بنك', '600', NULL, '2019-07-09 15:30:16', 0, '2019-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `value` decimal(10,0) NOT NULL,
  `insDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insUser` int(11) NOT NULL DEFAULT '0',
  `companyId` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `companyId` (`companyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `value`, `insDate`, `insUser`, `companyId`) VALUES
(2, 'إضاءة إضافية', '4000', '2019-07-03 06:26:54', 0, 1),
(3, 'سيارة ليموزين', '20000', '2019-07-03 17:02:50', 0, 1),
(4, 'سيارة همر', '30000', '2019-07-03 17:02:59', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(23) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `password`) VALUES
(2, 'Hasan2', '1234567');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_client_id` FOREIGN KEY (`clientId`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `contract_compny_fk` FOREIGN KEY (`companyid`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `contract_dep_fk` FOREIGN KEY (`depId`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `contract_per_fk` FOREIGN KEY (`perId`) REFERENCES `period` (`id`);

--
-- Constraints for table `contract_service`
--
ALTER TABLE `contract_service`
  ADD CONSTRAINT `fk_contract` FOREIGN KEY (`contractId`) REFERENCES `contract` (`id`),
  ADD CONSTRAINT `fk_service` FOREIGN KEY (`serviceId`) REFERENCES `services` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `company_depapartment_fk` FOREIGN KEY (`companyId`) REFERENCES `company` (`id`);

--
-- Constraints for table `moneyorg`
--
ALTER TABLE `moneyorg`
  ADD CONSTRAINT `company_moneyorg_fk` FOREIGN KEY (`companyId`) REFERENCES `company` (`id`);

--
-- Constraints for table `period`
--
ALTER TABLE `period`
  ADD CONSTRAINT `company_Period_fk` FOREIGN KEY (`companyId`) REFERENCES `company` (`id`);

--
-- Constraints for table `recepetvoucher`
--
ALTER TABLE `recepetvoucher`
  ADD CONSTRAINT `recept_voucher_fk` FOREIGN KEY (`client`) REFERENCES `clients` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `service_compny_fk` FOREIGN KEY (`companyId`) REFERENCES `company` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

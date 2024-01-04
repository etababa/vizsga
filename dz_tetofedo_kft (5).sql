-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 10:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dz_tetofedo_kft`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessory`
--

CREATE TABLE `accessory` (
  `accessoryID` int(11) NOT NULL,
  `accessoryName` varchar(45) NOT NULL,
  `materialID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `accessory`
--

INSERT INTO `accessory` (`accessoryID`, `accessoryName`, `materialID`) VALUES
(1, 'huzalszeg 100', 1),
(2, 'alátétlemez', 1),
(3, 'ácskapocs', 1),
(4, 'hófogó', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `materialID` int(11) NOT NULL,
  `materialName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`materialID`, `materialName`) VALUES
(2, 'cserép'),
(1, 'kiegészítő'),
(5, 'szerkezet'),
(6, 'teraszburkolat'),
(4, 'tetőlemez'),
(3, 'zsindely');

-- --------------------------------------------------------

--
-- Table structure for table `roofplate`
--

CREATE TABLE `roofplate` (
  `roofplateID` int(11) NOT NULL,
  `roofplateType` varchar(100) NOT NULL,
  `roofplateColor` varchar(45) NOT NULL,
  `roofplateManufacturer` varchar(100) NOT NULL,
  `roofplateCategoryID` int(11) NOT NULL,
  `materialID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `roofplate`
--

INSERT INTO `roofplate` (`roofplateID`, `roofplateType`, `roofplateColor`, `roofplateManufacturer`, `roofplateCategoryID`, `materialID`) VALUES
(1, 'RAL7016 matt', 'antracit', 'ZEN', 2, 4),
(2, 'RAL300', 'piros', 'ZEN', 2, 4),
(3, 'OMEGA', 'világosszürke', 'BALCANIC', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `roofplate_category`
--

CREATE TABLE `roofplate_category` (
  `roofplateCategoryID` int(11) NOT NULL,
  `roofplateCategoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `roofplate_category`
--

INSERT INTO `roofplate_category` (`roofplateCategoryID`, `roofplateCategoryName`) VALUES
(2, 'cserepes'),
(1, 'trapéz');

-- --------------------------------------------------------

--
-- Table structure for table `shingle`
--

CREATE TABLE `shingle` (
  `shingleID` int(11) NOT NULL,
  `shingleType` varchar(100) NOT NULL,
  `shingleColor` varchar(100) NOT NULL,
  `shingleManufacturer` varchar(100) NOT NULL,
  `shingleCategoryID` int(11) NOT NULL,
  `materialID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `shingle`
--

INSERT INTO `shingle` (`shingleID`, `shingleType`, `shingleColor`, `shingleManufacturer`, `shingleCategoryID`, `materialID`) VALUES
(1, 'Classic 6T', 'vörös', 'Bardoline', 3, 3),
(2, 'Classic 3T', 'fekete', 'Bardoline', 5, 3),
(3, 'Classic 3T', 'zöld', 'Bardoline', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shingle_category`
--

CREATE TABLE `shingle_category` (
  `shingleCategoryID` int(11) NOT NULL,
  `shingleCategoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `shingle_category`
--

INSERT INTO `shingle_category` (`shingleCategoryID`, `shingleCategoryName`) VALUES
(3, 'hódfarkú'),
(1, 'laminált'),
(4, 'méhsejt'),
(5, 'téglány'),
(2, 'öntapadós');

-- --------------------------------------------------------

--
-- Table structure for table `structure`
--

CREATE TABLE `structure` (
  `structureID` int(11) NOT NULL,
  `structureCategoryID` int(11) NOT NULL,
  `wood` varchar(100) NOT NULL,
  `thickness` varchar(45) NOT NULL,
  `width` varchar(45) NOT NULL,
  `length` varchar(45) NOT NULL,
  `treatment` tinyint(1) NOT NULL,
  `materialID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `structure`
--

INSERT INTO `structure` (`structureID`, `structureCategoryID`, `wood`, `thickness`, `width`, `length`, `treatment`, `materialID`) VALUES
(1, 4, 'lucfenyő', '44', '74', '2000', 0, 5),
(2, 2, 'lucfenyő', '19', '74', '2000', 0, 5),
(3, 2, 'szibériai vörösfenyő', '21', '120', '2000', 0, 5),
(4, 1, 'lucfenyő', '70', '70', '2400', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `structure_category`
--

CREATE TABLE `structure_category` (
  `structureCategoryID` int(11) NOT NULL,
  `structureCategoryName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `structure_category`
--

INSERT INTO `structure_category` (`structureCategoryID`, `structureCategoryName`) VALUES
(2, 'deszka'),
(1, 'gerenda'),
(3, 'szarufa'),
(4, 'tetőléc');

-- --------------------------------------------------------

--
-- Table structure for table `terracefloor`
--

CREATE TABLE `terracefloor` (
  `terracefloorID` int(11) NOT NULL,
  `terracefloorCategoryID` int(11) NOT NULL,
  `thickness` varchar(45) NOT NULL,
  `width` varchar(45) NOT NULL,
  `length` varchar(45) NOT NULL,
  `terracefloorColor` varchar(45) NOT NULL,
  `materialID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `terracefloor`
--

INSERT INTO `terracefloor` (`terracefloorID`, `terracefloorCategoryID`, `thickness`, `width`, `length`, `terracefloorColor`, `materialID`) VALUES
(1, 1, '270', '144', '3000', 'zöld', 6),
(2, 2, '210', '145', '3000', 'antracit', 6),
(3, 2, '210', '145', '3000', 'világosszürke', 6),
(4, 2, '210', '145', '2000', 'világostölgy', 6);

-- --------------------------------------------------------

--
-- Table structure for table `terracefloor_category`
--

CREATE TABLE `terracefloor_category` (
  `terracefloorCategoryID` int(11) NOT NULL,
  `terracefloorCategoryName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `terracefloor_category`
--

INSERT INTO `terracefloor_category` (`terracefloorCategoryID`, `terracefloorCategoryName`) VALUES
(2, 'WPC'),
(1, 'fa');

-- --------------------------------------------------------

--
-- Table structure for table `tile`
--

CREATE TABLE `tile` (
  `tileID` int(11) NOT NULL,
  `tileType` varchar(100) NOT NULL,
  `tileColor` varchar(100) NOT NULL,
  `tileManufacturer` varchar(100) NOT NULL,
  `tileCategoryID` int(11) NOT NULL,
  `materialID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tile`
--

INSERT INTO `tile` (`tileID`, `tileType`, `tileColor`, `tileManufacturer`, `tileCategoryID`, `materialID`) VALUES
(1, 'Renova Plus', 'fekete', 'Terrán', 2, 2),
(2, 'Contiton 9 Nativa', 'natúr téglavörös', 'Tondach', 2, 2),
(3, 'Toscana Basic', 'avanti', 'Leier', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tile_category`
--

CREATE TABLE `tile_category` (
  `tileCategoryID` int(11) NOT NULL,
  `tileCategoryName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tile_category`
--

INSERT INTO `tile_category` (`tileCategoryID`, `tileCategoryName`) VALUES
(1, 'beton'),
(2, 'égetett agyag');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `password`, `status`) VALUES
(1, 'dodi', '21975489ea8b325cdb5338c86968b8cabdeb7c40', NULL),
(2, 'zoli', '41f160885592673a727cd4539f1f56e86f057a07', 0),
(3, 'eta', '697861782d3084269bc7c1066209f3437764809a', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessory`
--
ALTER TABLE `accessory`
  ADD PRIMARY KEY (`accessoryID`),
  ADD UNIQUE KEY `accessoryName_UNIQUE` (`accessoryName`),
  ADD KEY `materialID` (`materialID`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`materialID`),
  ADD UNIQUE KEY `materialName_UNIQUE` (`materialName`);

--
-- Indexes for table `roofplate`
--
ALTER TABLE `roofplate`
  ADD PRIMARY KEY (`roofplateID`),
  ADD KEY `roofplateCategoryID` (`roofplateCategoryID`),
  ADD KEY `materialID` (`materialID`);

--
-- Indexes for table `roofplate_category`
--
ALTER TABLE `roofplate_category`
  ADD PRIMARY KEY (`roofplateCategoryID`),
  ADD UNIQUE KEY `roofplateCategoryName_UNIQUE` (`roofplateCategoryName`);

--
-- Indexes for table `shingle`
--
ALTER TABLE `shingle`
  ADD PRIMARY KEY (`shingleID`),
  ADD KEY `shingleCategoryID` (`shingleCategoryID`),
  ADD KEY `materialID` (`materialID`);

--
-- Indexes for table `shingle_category`
--
ALTER TABLE `shingle_category`
  ADD PRIMARY KEY (`shingleCategoryID`),
  ADD UNIQUE KEY `shingleCategoryName_UNIQUE` (`shingleCategoryName`);

--
-- Indexes for table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`structureID`),
  ADD KEY `structureCategoryID` (`structureCategoryID`),
  ADD KEY `materialID` (`materialID`);

--
-- Indexes for table `structure_category`
--
ALTER TABLE `structure_category`
  ADD PRIMARY KEY (`structureCategoryID`),
  ADD UNIQUE KEY `structureCategoryName_UNIQUE` (`structureCategoryName`);

--
-- Indexes for table `terracefloor`
--
ALTER TABLE `terracefloor`
  ADD PRIMARY KEY (`terracefloorID`),
  ADD KEY `terracefloorCategoryID` (`terracefloorCategoryID`),
  ADD KEY `materialID` (`materialID`);

--
-- Indexes for table `terracefloor_category`
--
ALTER TABLE `terracefloor_category`
  ADD PRIMARY KEY (`terracefloorCategoryID`),
  ADD UNIQUE KEY `terracefloorCategoryName_UNIQUE` (`terracefloorCategoryName`);

--
-- Indexes for table `tile`
--
ALTER TABLE `tile`
  ADD PRIMARY KEY (`tileID`),
  ADD KEY `tileCategoryID` (`tileCategoryID`),
  ADD KEY `materialID` (`materialID`);

--
-- Indexes for table `tile_category`
--
ALTER TABLE `tile_category`
  ADD PRIMARY KEY (`tileCategoryID`),
  ADD UNIQUE KEY `tileCategoryName_UNIQUE` (`tileCategoryName`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userName_UNIQUE` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessory`
--
ALTER TABLE `accessory`
  MODIFY `accessoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `materialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roofplate`
--
ALTER TABLE `roofplate`
  MODIFY `roofplateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roofplate_category`
--
ALTER TABLE `roofplate_category`
  MODIFY `roofplateCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shingle`
--
ALTER TABLE `shingle`
  MODIFY `shingleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shingle_category`
--
ALTER TABLE `shingle_category`
  MODIFY `shingleCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `structure`
--
ALTER TABLE `structure`
  MODIFY `structureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `structure_category`
--
ALTER TABLE `structure_category`
  MODIFY `structureCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terracefloor`
--
ALTER TABLE `terracefloor`
  MODIFY `terracefloorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terracefloor_category`
--
ALTER TABLE `terracefloor_category`
  MODIFY `terracefloorCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tile`
--
ALTER TABLE `tile`
  MODIFY `tileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tile_category`
--
ALTER TABLE `tile_category`
  MODIFY `tileCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessory`
--
ALTER TABLE `accessory`
  ADD CONSTRAINT `accessory_ibfk_1` FOREIGN KEY (`materialID`) REFERENCES `material` (`materialID`) ON DELETE NO ACTION;

--
-- Constraints for table `roofplate`
--
ALTER TABLE `roofplate`
  ADD CONSTRAINT `roofplate_ibfk_1` FOREIGN KEY (`roofplateCategoryID`) REFERENCES `roofplate_category` (`roofplateCategoryID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `roofplate_ibfk_2` FOREIGN KEY (`materialID`) REFERENCES `material` (`materialID`) ON DELETE NO ACTION;

--
-- Constraints for table `shingle`
--
ALTER TABLE `shingle`
  ADD CONSTRAINT `shingle_ibfk_1` FOREIGN KEY (`shingleCategoryID`) REFERENCES `shingle_category` (`shingleCategoryID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `shingle_ibfk_2` FOREIGN KEY (`materialID`) REFERENCES `material` (`materialID`) ON DELETE NO ACTION;

--
-- Constraints for table `structure`
--
ALTER TABLE `structure`
  ADD CONSTRAINT `structure_ibfk_1` FOREIGN KEY (`structureCategoryID`) REFERENCES `structure_category` (`structureCategoryID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `structure_ibfk_2` FOREIGN KEY (`materialID`) REFERENCES `material` (`materialID`) ON DELETE NO ACTION;

--
-- Constraints for table `terracefloor`
--
ALTER TABLE `terracefloor`
  ADD CONSTRAINT `terracefloor_ibfk_1` FOREIGN KEY (`terracefloorCategoryID`) REFERENCES `terracefloor_category` (`terracefloorCategoryID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `terracefloor_ibfk_2` FOREIGN KEY (`materialID`) REFERENCES `material` (`materialID`) ON DELETE NO ACTION;

--
-- Constraints for table `tile`
--
ALTER TABLE `tile`
  ADD CONSTRAINT `tile_ibfk_1` FOREIGN KEY (`tileCategoryID`) REFERENCES `tile_category` (`tileCategoryID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `tile_ibfk_2` FOREIGN KEY (`materialID`) REFERENCES `material` (`materialID`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE SCHEMA `dz_tetofedo_kft` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;

use `dz_tetofedo_kft` ;

CREATE TABLE `dz_tetofedo_kft`.`material` (
  `materialID` INT NOT NULL AUTO_INCREMENT,
  `materialName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`materialID`),
  UNIQUE INDEX `materialName_UNIQUE` (`materialName` ASC) );
  
INSERT INTO `dz_tetofedo_kft`.`material` (`materialID`, `materialName`) VALUES ('1', 'kiegészítő');
INSERT INTO `dz_tetofedo_kft`.`material` (`materialID`, `materialName`) VALUES ('2', 'cserép');
INSERT INTO `dz_tetofedo_kft`.`material` (`materialID`, `materialName`) VALUES ('3', 'zsindely');
INSERT INTO `dz_tetofedo_kft`.`material` (`materialID`, `materialName`) VALUES ('4', 'tetőlemez');
INSERT INTO `dz_tetofedo_kft`.`material` (`materialID`, `materialName`) VALUES ('5', 'szerkezet');
INSERT INTO `dz_tetofedo_kft`.`material` (`materialID`, `materialName`) VALUES ('6', 'teraszburkolat');

CREATE TABLE `dz_tetofedo_kft`.`accessory` (
  `accessoryID` INT NOT NULL AUTO_INCREMENT,
  `accessoryName` VARCHAR(45) NOT NULL,
  `materialID` INT NOT NULL,
  PRIMARY KEY (`accessoryID`),
FOREIGN KEY (`materialID`) REFERENCES `material`(`materialID`) ON DELETE NO ACTION,
  UNIQUE INDEX `accessoryName_UNIQUE` (`accessoryName` ASC) );

INSERT INTO `dz_tetofedo_kft`.`accessory` (`accessoryID`, `accessoryName`, `materialID`) VALUES ('1', 'huzalszeg 100', '1');
INSERT INTO `dz_tetofedo_kft`.`accessory` (`accessoryID`, `accessoryName`, `materialID`) VALUES ('2', 'alátétlemez', '1');
INSERT INTO `dz_tetofedo_kft`.`accessory` (`accessoryID`, `accessoryName`, `materialID`) VALUES ('3', 'ácskapocs', '1');
INSERT INTO `dz_tetofedo_kft`.`accessory` (`accessoryID`, `accessoryName`, `materialID`) VALUES ('4', 'hófogó', '1');

CREATE TABLE `dz_tetofedo_kft`.`tile_category` (
  `tileCategoryID` INT NOT NULL AUTO_INCREMENT,
  `tileCategoryName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`tileCategoryID`),
  UNIQUE INDEX `tileCategoryName_UNIQUE` (`tileCategoryName` ASC) );
  
INSERT INTO `dz_tetofedo_kft`.`tile_category` (`tileCategoryID`, `tileCategoryName`) VALUES ('1', 'beton');
INSERT INTO `dz_tetofedo_kft`.`tile_category` (`tileCategoryID`, `tileCategoryName`) VALUES ('2', 'égetett agyag');

CREATE TABLE `dz_tetofedo_kft`.`tile` (
  `tileID` INT NOT NULL AUTO_INCREMENT,
  `tileType` VARCHAR(100) NOT NULL,
  `tileColor` VARCHAR(100) NOT NULL,
  `tileManufacturer` VARCHAR(100) NOT NULL,
  `tileCategoryID` INT NOT NULL,
  `materialID` INT NOT NULL,
  PRIMARY KEY (`tileID`), 
FOREIGN KEY (`tileCategoryID`) REFERENCES `tile_category`(`tileCategoryID`) ON DELETE NO ACTION,
FOREIGN KEY (`materialID`) REFERENCES `material`(`materialID`)ON DELETE NO ACTION );
  
INSERT INTO `dz_tetofedo_kft`.`tile` (`tileID`, `tileType`, `tileColor`, `tileManufacturer`, `tileCategoryID`, `materialID`) VALUES ('1', 'Renova Plus', 'fekete', 'Terrán', '2', '2');
INSERT INTO `dz_tetofedo_kft`.`tile` (`tileID`, `tileType`, `tileColor`, `tileManufacturer`, `tileCategoryID`, `materialID`) VALUES ('2', 'Contiton 9 Nativa', 'natúr téglavörös', 'Tondach', '2', '2');
INSERT INTO `dz_tetofedo_kft`.`tile` (`tileID`, `tileType`, `tileColor`, `tileManufacturer`, `tileCategoryID`, `materialID`) VALUES ('3', 'Toscana Basic', 'avanti', 'Leier', '1', '2');
  
  CREATE TABLE `dz_tetofedo_kft`.`shingle_category` (
  `shingleCategoryID` INT NOT NULL AUTO_INCREMENT,
  `shingleCategoryName` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`shingleCategoryID`),
  UNIQUE INDEX `shingleCategoryName_UNIQUE` (`shingleCategoryName` ASC) );
  

INSERT INTO `dz_tetofedo_kft`.`shingle_category` (`shingleCategoryID`, `shingleCategoryName`) VALUES ('1', 'laminált');
INSERT INTO `dz_tetofedo_kft`.`shingle_category` (`shingleCategoryID`, `shingleCategoryName`) VALUES ('2', 'öntapadós');
INSERT INTO `dz_tetofedo_kft`.`shingle_category` (`shingleCategoryID`, `shingleCategoryName`) VALUES ('3', 'hódfarkú');
INSERT INTO `dz_tetofedo_kft`.`shingle_category` (`shingleCategoryID`, `shingleCategoryName`) VALUES ('4', 'méhsejt');
INSERT INTO `dz_tetofedo_kft`.`shingle_category` (`shingleCategoryID`, `shingleCategoryName`) VALUES ('5', 'téglány');

CREATE TABLE `dz_tetofedo_kft`.`shingle` (
  `shingleID` INT NOT NULL AUTO_INCREMENT,
  `shingleType` VARCHAR(100) NOT NULL,
  `shingleColor` VARCHAR(100) NOT NULL,
  `shingleManufacturer` VARCHAR(100) NOT NULL,
  `shingleCategoryID` INT NOT NULL,
  `materialID` INT NOT NULL,
  PRIMARY KEY (`shingleID`),
FOREIGN KEY (`shingleCategoryID`) REFERENCES `shingle_category`(`shingleCategoryID`) ON DELETE NO ACTION,
FOREIGN KEY (`materialID`) REFERENCES `material`(`materialID`)ON DELETE NO ACTION );
  

INSERT INTO `dz_tetofedo_kft`.`shingle` (`shingleID`, `shingleType`, `shingleColor`, `shingleManufacturer`, `shingleCategoryID`, `materialID`) VALUES ('1', 'Classic 6T', 'vörös', 'Bardoline', '3', '3');
INSERT INTO `dz_tetofedo_kft`.`shingle` (`shingleID`, `shingleType`, `shingleColor`, `shingleManufacturer`, `shingleCategoryID`, `materialID`) VALUES ('2', 'Classic 3T', 'fekete', 'Bardoline', '5', '3');
INSERT INTO `dz_tetofedo_kft`.`shingle` (`shingleID`, `shingleType`, `shingleColor`, `shingleManufacturer`, `shingleCategoryID`, `materialID`) VALUES ('3', 'Classic 3T', 'zöld', 'Bardoline', '5', '3');

CREATE TABLE `dz_tetofedo_kft`.`structure_category` (
  `structureCategoryID` INT NOT NULL AUTO_INCREMENT,
  `structureCategoryName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`structureCategoryID`),
  UNIQUE INDEX `structureCategoryName_UNIQUE` (`structureCategoryName` ASC) );
  
INSERT INTO `dz_tetofedo_kft`.`structure_category` (`structureCategoryID`, `structureCategoryName`) VALUES ('1', 'gerenda');
INSERT INTO `dz_tetofedo_kft`.`structure_category` (`structureCategoryID`, `structureCategoryName`) VALUES ('2', 'deszka');
INSERT INTO `dz_tetofedo_kft`.`structure_category` (`structureCategoryID`, `structureCategoryName`) VALUES ('3', 'szarufa');
INSERT INTO `dz_tetofedo_kft`.`structure_category` (`structureCategoryID`, `structureCategoryName`) VALUES ('4', 'tetőléc');

CREATE TABLE `dz_tetofedo_kft`.`structure` (
  `structureID` INT NOT NULL AUTO_INCREMENT,
  `structureCategoryID` INT NOT NULL,
  `wood` VARCHAR(100) NOT NULL,
  `thickness` VARCHAR(45) NOT NULL,
  `width` VARCHAR(45) NOT NULL,
  `length` VARCHAR(45) NOT NULL,
  `treatment` TINYINT(1) NOT NULL,
  `materialID` INT NOT NULL,
  PRIMARY KEY (`structureID`),
FOREIGN KEY (`structureCategoryID`) REFERENCES `structure_category`(`structureCategoryID`)ON DELETE NO ACTION,
FOREIGN KEY (`materialID`) REFERENCES `material`(`materialID`)ON DELETE NO ACTION
);

INSERT INTO `dz_tetofedo_kft`.`structure` (`structureID`, `structureCategoryID`, `wood`, `thickness`, `width`, `length`, `treatment`, `materialID`) VALUES ('1', '4', 'lucfenyő', '44', '74', '2000', '0', '5');
INSERT INTO `dz_tetofedo_kft`.`structure` (`structureID`, `structureCategoryID`, `wood`, `thickness`, `width`, `length`, `treatment`, `materialID`) VALUES ('2', '2', 'lucfenyő', '19', '74', '2000', '0', '5');
INSERT INTO `dz_tetofedo_kft`.`structure` (`structureID`, `structureCategoryID`, `wood`, `thickness`, `width`, `length`, `treatment`, `materialID`) VALUES ('3', '2', 'szibériai vörösfenyő', '21', '120', '2000', '0', '5');
INSERT INTO `dz_tetofedo_kft`.`structure` (`structureID`, `structureCategoryID`, `wood`, `thickness`, `width`, `length`, `treatment`, `materialID`) VALUES ('4', '1', 'lucfenyő', '70', '70', '2400', '1', '5');

CREATE TABLE `dz_tetofedo_kft`.`terracefloor_category` (
  `terracefloorCategoryID` INT NOT NULL AUTO_INCREMENT,
  `terracefloorCategoryName` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`terracefloorCategoryID`),
  UNIQUE INDEX `terracefloorCategoryName_UNIQUE` (`terracefloorCategoryName` ASC) );


INSERT INTO `dz_tetofedo_kft`.`terracefloor_category` (`terracefloorCategoryID`, `terracefloorCategoryName`) VALUES ('1', 'fa');
INSERT INTO `dz_tetofedo_kft`.`terracefloor_category` (`terracefloorCategoryID`, `terracefloorCategoryName`) VALUES ('2', 'WPC');

CREATE TABLE `dz_tetofedo_kft`.`terracefloor` (
  `terracefloorID` INT NOT NULL AUTO_INCREMENT,
  `terracefloorCategoryID` INT NOT NULL,
  `thickness` VARCHAR(45) NOT NULL,
  `width` VARCHAR(45) NOT NULL,
  `length` VARCHAR(45) NOT NULL,
  `terracefloorColor` VARCHAR(45) NOT NULL,
  `materialID` INT NOT NULL,
  PRIMARY KEY (`terracefloorID`),
FOREIGN KEY (`terracefloorCategoryID`) REFERENCES `terracefloor_category`(`terracefloorCategoryID`) ON DELETE NO ACTION,
FOREIGN KEY (`materialID`) REFERENCES `material`(`materialID`)ON DELETE NO ACTION
);

INSERT INTO `dz_tetofedo_kft`.`terracefloor` (`terracefloorID`, `terracefloorCategoryID`, `thickness`, `width`, `length`, `terracefloorColor`, `materialID`) VALUES ('1', '1', '270', '144', '3000', 'zöld', '6');
INSERT INTO `dz_tetofedo_kft`.`terracefloor` (`terracefloorID`, `terracefloorCategoryID`, `thickness`, `width`, `length`, `terracefloorColor`, `materialID`) VALUES ('2', '2', '210', '145', '3000', 'antracit', '6');
INSERT INTO `dz_tetofedo_kft`.`terracefloor` (`terracefloorID`, `terracefloorCategoryID`, `thickness`, `width`, `length`, `terracefloorColor`, `materialID`) VALUES ('3', '2', '210', '145', '3000', 'világosszürke', '6');
INSERT INTO `dz_tetofedo_kft`.`terracefloor` (`terracefloorID`, `terracefloorCategoryID`, `thickness`, `width`, `length`, `terracefloorColor`, `materialID`) VALUES ('4', '2', '210', '145', '2000', 'világostölgy', '6');




CREATE TABLE `dz_tetofedo_kft`.`roofplate_category` (
  `roofplateCategoryID` INT NOT NULL AUTO_INCREMENT,
  `roofplateCategoryName` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`roofplateCategoryID`),
  UNIQUE INDEX `roofplateCategoryName_UNIQUE` (`roofplateCategoryName` ASC) );
  
  INSERT INTO `dz_tetofedo_kft`.`roofplate_category` (`roofplateCategoryID`, `roofplateCategoryName`) VALUES ('1', 'trapéz');
INSERT INTO `dz_tetofedo_kft`.`roofplate_category` (`roofplateCategoryID`, `roofplateCategoryName`) VALUES ('2', 'cserepes');


CREATE TABLE `dz_tetofedo_kft`.`roofplate` (
  `roofplateID` INT NOT NULL AUTO_INCREMENT,
  `roofplateType` VARCHAR(100) NOT NULL,
  `roofplateColor` VARCHAR(45) NOT NULL,
  `roofplateManufacturer` VARCHAR(100) NOT NULL,
  `roofplateCategoryID` INT NOT NULL,
  `materialID` INT NOT NULL,
  PRIMARY KEY (`roofplateID`),
FOREIGN KEY (`roofplateCategoryID`) REFERENCES `roofplate_category`(`roofplateCategoryID`)ON DELETE NO ACTION,
FOREIGN KEY (`materialID`) REFERENCES `material`(`materialID`) ON DELETE NO ACTION 
  );
  

INSERT INTO `dz_tetofedo_kft`.`roofplate` (`roofplateID`, `roofplateType`, `roofplateColor`, `roofplateManufacturer`, `roofplateCategoryID`, `materialID`) VALUES ('1', 'RAL7016 matt', 'antracit', 'ZEN', '2', '4');
INSERT INTO `dz_tetofedo_kft`.`roofplate` (`roofplateID`, `roofplateType`, `roofplateColor`, `roofplateManufacturer`, `roofplateCategoryID`, `materialID`) VALUES ('2', 'RAL300', 'piros', 'ZEN', '2', '4');
INSERT INTO `dz_tetofedo_kft`.`roofplate` (`roofplateID`, `roofplateType`, `roofplateColor`, `roofplateManufacturer`, `roofplateCategoryID`, `materialID`) VALUES ('3', 'OMEGA', 'világosszürke', 'BALCANIC', '2', '4');

CREATE TABLE `dz_tetofedo_kft`.`user` (
  `userID` INT NOT NULL AUTO_INCREMENT,
  `userName` VARCHAR(100) NULL,
  `password` VARCHAR(100) NULL,
  `status` TINYINT(1) NULL,
  PRIMARY KEY (`userID`),
  UNIQUE INDEX `userName_UNIQUE` (`userName` ASC) 
  );
  
  INSERT INTO `dz_tetofedo_kft`.`user` (`userID`, `userName`, `password`) VALUES ('1', 'dodi', '21975489ea8b325cdb5338c86968b8cabdeb7c40', '1');
INSERT INTO `dz_tetofedo_kft`.`user` (`userID`, `userName`, `password`, `status`) VALUES ('2', 'zoli', '41f160885592673a727cd4539f1f56e86f057a07', '0');

INSERT INTO `dz_tetofedo_kft`.`user` (`userID`, `userName`, `password`) VALUES ('3', 'eta', '697861782d3084269bc7c1066209f3437764809a', '0');
  



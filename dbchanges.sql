ALTER TABLE `crm_customers` ADD `Sotk` VARCHAR(50) NULL AFTER `ngaythem`;
ALTER TABLE `crm_customers` ADD `DiaChi` VARCHAR(150) NULL AFTER `Sotk`;

CREATE TABLE `networks` (
 `Id` int NOT NULL AUTO_INCREMENT,
  `Ten` VARCHAR(124) NULL ,
   `DayDauSo` VARCHAR(255) NULL , 
   PRIMARY KEY (`Id`)
   ) ;

INSERT INTO `networks` (`Id`, `Ten`, `DayDauSo`) VALUES (NULL, 'Vietel', '086,096,097,098,032,033,034,035,036,037,038,039');
INSERT INTO `networks` (`Id`, `Ten`, `DayDauSo`) VALUES (NULL, 'Mobiphone', '089,090,093,070,079,077,076,078,089');
INSERT INTO `networks` (`Id`, `Ten`, `DayDauSo`) VALUES (NULL, 'VinaPhone', '081,082,083,084,088,085,091,094');
INSERT INTO `networks` (`Id`, `Ten`, `DayDauSo`) VALUES (NULL, 'Mobi-Vina', '081,082,083,084,085,091,094,089,090,093,070,079,077,076,078,088');
INSERT INTO `networks` (`Id`, `Ten`, `DayDauSo`) VALUES (NULL, 'Khac', '092,052,056,058,099,059,087');

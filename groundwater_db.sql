/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50525
Source Host           : localhost:3306
Source Database       : groundwater_db

Target Server Type    : MYSQL
Target Server Version : 50525
File Encoding         : 65001

Date: 2014-10-07 15:06:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `block`
-- ----------------------------
DROP TABLE IF EXISTS `block`;
CREATE TABLE `block` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `district_id` int(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of block
-- ----------------------------
INSERT INTO `block` VALUES ('1', '1', 'Zawlnuam', '1896', null, null);
INSERT INTO `block` VALUES ('2', '1', 'West Phaileng', '1897', null, null);
INSERT INTO `block` VALUES ('3', '1', 'Reiek', '1898', null, null);

-- ----------------------------
-- Table structure for `delivery`
-- ----------------------------
DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of delivery
-- ----------------------------
INSERT INTO `delivery` VALUES ('1', 'HP Mark II');
INSERT INTO `delivery` VALUES ('2', 'HP Mark III');
INSERT INTO `delivery` VALUES ('3', 'Submersible Pump');

-- ----------------------------
-- Table structure for `district`
-- ----------------------------
DROP TABLE IF EXISTS `district`;
CREATE TABLE `district` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of district
-- ----------------------------
INSERT INTO `district` VALUES ('1', 'Mamit', '281', null, null);
INSERT INTO `district` VALUES ('2', 'Kolasib', '282', null, null);
INSERT INTO `district` VALUES ('3', 'Aizawl', '283', null, null);
INSERT INTO `district` VALUES ('4', 'Champhai', '284', null, null);
INSERT INTO `district` VALUES ('5', 'Serchhip', '285', null, null);
INSERT INTO `district` VALUES ('6', 'Lunglei', '286', null, null);
INSERT INTO `district` VALUES ('7', 'Lawngtlai', '287', null, null);
INSERT INTO `district` VALUES ('8', 'Saiha', '288', null, null);

-- ----------------------------
-- Table structure for `lithology`
-- ----------------------------
DROP TABLE IF EXISTS `lithology`;
CREATE TABLE `lithology` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tubewell_id` int(10) DEFAULT NULL,
  `depthFrom` varchar(10) DEFAULT NULL,
  `depthTo` varchar(10) DEFAULT NULL,
  `soilClass` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lithology
-- ----------------------------

-- ----------------------------
-- Table structure for `location`
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `district_id` int(10) DEFAULT NULL,
  `block_id` int(10) DEFAULT NULL,
  `panchayat_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of location
-- ----------------------------

-- ----------------------------
-- Table structure for `office_circle`
-- ----------------------------
DROP TABLE IF EXISTS `office_circle`;
CREATE TABLE `office_circle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `office_zone_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of office_circle
-- ----------------------------
INSERT INTO `office_circle` VALUES ('1', '1', 'Rural Cirlce', null, null);
INSERT INTO `office_circle` VALUES ('2', '1', 'Champhai Circle', null, null);
INSERT INTO `office_circle` VALUES ('3', '1', 'Aizawl Circle', null, null);
INSERT INTO `office_circle` VALUES ('4', '2', 'Lunglei Circle', null, null);

-- ----------------------------
-- Table structure for `office_division`
-- ----------------------------
DROP TABLE IF EXISTS `office_division`;
CREATE TABLE `office_division` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `office_zone_id` int(10) DEFAULT NULL,
  `office_circle_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of office_division
-- ----------------------------
INSERT INTO `office_division` VALUES ('1', '1', '1', 'Champhai Watan Division', null, null);
INSERT INTO `office_division` VALUES ('2', '1', '2', 'Khawzawl Watsan Division', null, null);
INSERT INTO `office_division` VALUES ('3', '1', '1', 'Kolasib Watsan Divison', null, null);
INSERT INTO `office_division` VALUES ('4', '1', '3', 'AWDD South', null, null);
INSERT INTO `office_division` VALUES ('5', '2', '4', 'RWD, Lunglei', null, null);

-- ----------------------------
-- Table structure for `office_section`
-- ----------------------------
DROP TABLE IF EXISTS `office_section`;
CREATE TABLE `office_section` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `office_zone_id` int(10) DEFAULT NULL,
  `office_circle_id` int(10) DEFAULT NULL,
  `office_division_id` int(10) DEFAULT NULL,
  `office_sub_division_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of office_section
-- ----------------------------
INSERT INTO `office_section` VALUES ('1', '1', '1', '1', '1', 'Khuangleng', null, null);
INSERT INTO `office_section` VALUES ('2', '1', '1', '1', '2', 'Champhai Section - III', null, null);
INSERT INTO `office_section` VALUES ('3', '1', '1', '1', '2', 'Hnahlan', null, null);

-- ----------------------------
-- Table structure for `office_sub_division`
-- ----------------------------
DROP TABLE IF EXISTS `office_sub_division`;
CREATE TABLE `office_sub_division` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `office_zone_id` int(10) DEFAULT NULL,
  `office_circle_id` int(10) DEFAULT NULL,
  `office_division_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of office_sub_division
-- ----------------------------
INSERT INTO `office_sub_division` VALUES ('1', '1', '1', '1', 'Khawbung WATSAN Sub Division', null, null);
INSERT INTO `office_sub_division` VALUES ('2', '1', '1', '1', 'Champhai Project Sub Division', null, null);
INSERT INTO `office_sub_division` VALUES ('3', '1', '2', '2', 'Khawzawl', null, null);

-- ----------------------------
-- Table structure for `office_zone`
-- ----------------------------
DROP TABLE IF EXISTS `office_zone`;
CREATE TABLE `office_zone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of office_zone
-- ----------------------------
INSERT INTO `office_zone` VALUES ('1', 'CE Zone-I', null, null);
INSERT INTO `office_zone` VALUES ('2', 'CE Zone-II', null, null);

-- ----------------------------
-- Table structure for `panchayat`
-- ----------------------------
DROP TABLE IF EXISTS `panchayat`;
CREATE TABLE `panchayat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `district_id` int(10) DEFAULT NULL,
  `block_id` int(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of panchayat
-- ----------------------------
INSERT INTO `panchayat` VALUES ('1', '1', '1', 'Kanhmun', '271013', null, null);
INSERT INTO `panchayat` VALUES ('2', '1', '1', 'Luimawi', '271014', null, null);
INSERT INTO `panchayat` VALUES ('3', '1', '1', 'Bajirungpaveng', '271015', null, null);
INSERT INTO `panchayat` VALUES ('4', '1', '1', 'Thinghlun', '271016', null, null);
INSERT INTO `panchayat` VALUES ('5', '1', '1', 'Kolalian', '271017', null, null);
INSERT INTO `panchayat` VALUES ('6', '1', '1', 'Hriphaw', '271018', null, null);
INSERT INTO `panchayat` VALUES ('7', '1', '1', 'Bungthuam', '271019', null, null);
INSERT INTO `panchayat` VALUES ('8', '1', '1', 'Zawlpui', '271020', null, null);
INSERT INTO `panchayat` VALUES ('9', '1', '1', 'Zamuang', '271021', null, null);
INSERT INTO `panchayat` VALUES ('10', '1', '1', 'Rengdil', '271022', null, null);
INSERT INTO `panchayat` VALUES ('11', '1', '1', 'Kawrthah', '271024', null, null);
INSERT INTO `panchayat` VALUES ('12', '1', '1', 'Tumpanglui', '271025', null, null);
INSERT INTO `panchayat` VALUES ('13', '1', '1', 'Sotapa Veng', '271026', null, null);
INSERT INTO `panchayat` VALUES ('14', '1', '1', 'Mualthuam', '271027', null, null);
INSERT INTO `panchayat` VALUES ('15', '1', '1', 'Darlak', '271028', null, null);
INSERT INTO `panchayat` VALUES ('16', '1', '1', 'Kawrtethawveng', '271029', null, null);
INSERT INTO `panchayat` VALUES ('17', '1', '1', 'Serhmun', '271030', null, null);
INSERT INTO `panchayat` VALUES ('18', '1', '1', 'W.Bunghmun', '271033', null, null);
INSERT INTO `panchayat` VALUES ('19', '1', '1', 'Dampui', '271040', null, null);
INSERT INTO `panchayat` VALUES ('20', '1', '1', 'Nalzawl', '271041', null, null);
INSERT INTO `panchayat` VALUES ('21', '1', '1', 'Bawngva', '271042', null, null);
INSERT INTO `panchayat` VALUES ('22', '1', '1', 'Phaizau', '271043', null, null);
INSERT INTO `panchayat` VALUES ('23', '1', '1', 'K. Sarali', '271045', null, null);
INSERT INTO `panchayat` VALUES ('24', '1', '1', 'Chilui', '271046', null, null);
INSERT INTO `panchayat` VALUES ('25', '1', '1', 'N.Sabual', '271047', null, null);
INSERT INTO `panchayat` VALUES ('26', '1', '1', 'N.Tlangkhang', '271048', null, null);
INSERT INTO `panchayat` VALUES ('27', '1', '1', 'Sihthiang', '271049', null, null);
INSERT INTO `panchayat` VALUES ('28', '1', '1', 'Kananthar', '271055', null, null);
INSERT INTO `panchayat` VALUES ('29', '1', '1', 'Suarhliap', '271056', null, null);
INSERT INTO `panchayat` VALUES ('30', '1', '1', 'Saikhawthlir', '271057', null, null);
INSERT INTO `panchayat` VALUES ('31', '1', '1', 'Chuhvel', '271058', null, null);
INSERT INTO `panchayat` VALUES ('32', '1', '1', 'Belkhai', '271061', null, null);
INSERT INTO `panchayat` VALUES ('33', '1', '1', 'Khantlang', '271062', null, null);
INSERT INTO `panchayat` VALUES ('34', '1', '1', 'Zomuantlang', '271063', null, null);
INSERT INTO `panchayat` VALUES ('35', '1', '1', 'Tuipuibari', '271064', null, null);
INSERT INTO `panchayat` VALUES ('36', '1', '1', 'Rajivnagar', '271065', null, null);
INSERT INTO `panchayat` VALUES ('37', '1', '1', 'Andermanik', '271068', null, null);
INSERT INTO `panchayat` VALUES ('38', '1', '1', 'Tuidam', '271071', null, null);
INSERT INTO `panchayat` VALUES ('39', '1', '1', 'New Eden', '271072', null, null);
INSERT INTO `panchayat` VALUES ('40', '1', '1', 'Thaidawr ', '271074', null, null);
INSERT INTO `panchayat` VALUES ('41', '1', '1', 'Vawngawnzo', '271076', null, null);
INSERT INTO `panchayat` VALUES ('42', '1', '1', 'Damdiai', '271077', null, null);
INSERT INTO `panchayat` VALUES ('43', '1', '1', 'Tiauzau', '271078', null, null);
INSERT INTO `panchayat` VALUES ('44', '1', '2', 'Damparengpui', '271080', null, null);
INSERT INTO `panchayat` VALUES ('45', '1', '2', 'Khawhnai', '271084', null, null);
INSERT INTO `panchayat` VALUES ('46', '1', '2', 'Tuirum', '271085', null, null);
INSERT INTO `panchayat` VALUES ('47', '1', '2', 'Salem Boarding', '271086', null, null);
INSERT INTO `panchayat` VALUES ('48', '1', '2', 'Teirei Forest', '271087', null, null);
INSERT INTO `panchayat` VALUES ('49', '1', '2', 'W.Phaileng', '271088', null, null);
INSERT INTO `panchayat` VALUES ('50', '1', '2', 'Kawnmawi', '271089', null, null);
INSERT INTO `panchayat` VALUES ('51', '1', '2', 'N.Chhippui', '271090', null, null);
INSERT INTO `panchayat` VALUES ('52', '1', '2', 'Lallen', '271091', null, null);
INSERT INTO `panchayat` VALUES ('53', '1', '2', 'Saithah', '271093', null, null);
INSERT INTO `panchayat` VALUES ('54', '1', '2', 'Parvatui', '271097', null, null);
INSERT INTO `panchayat` VALUES ('55', '1', '2', 'Phuldungsei', '271098', null, null);
INSERT INTO `panchayat` VALUES ('56', '1', '2', 'Zopui', '271102', null, null);
INSERT INTO `panchayat` VALUES ('57', '1', '2', 'W.Phulpui', '271104', null, null);
INSERT INTO `panchayat` VALUES ('58', '1', '2', 'Lokisuri', '271105', null, null);
INSERT INTO `panchayat` VALUES ('59', '1', '2', 'Silsuri', '271106', null, null);
INSERT INTO `panchayat` VALUES ('60', '1', '2', 'Pukzing', '271107', null, null);
INSERT INTO `panchayat` VALUES ('61', '1', '2', 'Pukzing vengthar', '271108', null, null);
INSERT INTO `panchayat` VALUES ('62', '1', '2', 'Hnahva', '271109', null, null);
INSERT INTO `panchayat` VALUES ('63', '1', '2', 'Hruiduk', '271110', null, null);
INSERT INTO `panchayat` VALUES ('64', '1', '2', 'Marpara North', '271111', null, null);
INSERT INTO `panchayat` VALUES ('65', '1', '3', 'Saitlaw', '271112', null, null);
INSERT INTO `panchayat` VALUES ('66', '1', '3', 'W.Serzawl', '271114', null, null);
INSERT INTO `panchayat` VALUES ('67', '1', '3', 'Hmunpui', '271115', null, null);
INSERT INTO `panchayat` VALUES ('68', '1', '3', 'Dilzawl', '271116', null, null);
INSERT INTO `panchayat` VALUES ('69', '1', '3', 'Rawpuichhip', '271117', null, null);
INSERT INTO `panchayat` VALUES ('70', '1', '3', 'Lengte', '271118', null, null);
INSERT INTO `panchayat` VALUES ('71', '1', '3', 'Nghalchawm', '271119', null, null);
INSERT INTO `panchayat` VALUES ('72', '1', '3', 'Tuahzawl', '271120', null, null);
INSERT INTO `panchayat` VALUES ('73', '1', '3', 'Dapchhuah (Tutphai)', '271121', null, null);
INSERT INTO `panchayat` VALUES ('74', '1', '3', 'Rulpuihlim', '271122', null, null);
INSERT INTO `panchayat` VALUES ('75', '1', '3', 'Chungtlang', '271123', null, null);
INSERT INTO `panchayat` VALUES ('76', '1', '3', 'Reiek', '271124', null, null);
INSERT INTO `panchayat` VALUES ('77', '1', '3', 'Ailawng', '271125', null, null);
INSERT INTO `panchayat` VALUES ('78', '1', '3', 'W.Lungdar', '271126', null, null);
INSERT INTO `panchayat` VALUES ('79', '1', '3', 'Khawrihnim', '271127', null, null);
INSERT INTO `panchayat` VALUES ('80', '1', '3', 'N. Kanghmun', '271128', null, null);
INSERT INTO `panchayat` VALUES ('81', '1', '3', 'Bawlte', '271129', null, null);
INSERT INTO `panchayat` VALUES ('82', '1', '3', 'Bawngthah', '271130', null, null);
INSERT INTO `panchayat` VALUES ('83', '1', '3', 'Darlung', '271131', null, null);
INSERT INTO `panchayat` VALUES ('84', '1', '3', 'S.Sabual', '271132', null, null);
INSERT INTO `panchayat` VALUES ('85', '1', '3', 'Lungphun', '271134', null, null);
INSERT INTO `panchayat` VALUES ('86', '1', '3', 'Hreichuk', '271135', null, null);

-- ----------------------------
-- Table structure for `tubewell`
-- ----------------------------
DROP TABLE IF EXISTS `tubewell`;
CREATE TABLE `tubewell` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tubewellCode` varchar(100) DEFAULT NULL,
  `delivery_id` int(10) DEFAULT NULL,
  `district_id` int(10) DEFAULT NULL,
  `block_id` int(10) DEFAULT NULL,
  `panchayat_id` int(10) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `sub_location` varchar(255) DEFAULT NULL,
  `landmark` varchar(255) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `allevation` varchar(30) DEFAULT NULL,
  `office_zone_id` int(10) DEFAULT NULL,
  `office_circle_id` int(10) DEFAULT NULL,
  `office_division_id` int(10) DEFAULT NULL,
  `office_sub_division_id` int(10) DEFAULT NULL,
  `office_section_id` int(10) DEFAULT NULL,
  `depthSWL` varchar(20) DEFAULT NULL,
  `depthBoring` varchar(20) DEFAULT NULL,
  `sizeBoring` varchar(20) DEFAULT NULL,
  `drillingDate` date DEFAULT NULL,
  `commissionDate` date DEFAULT NULL,
  `discharge` varchar(20) DEFAULT NULL,
  `platform` varchar(10) DEFAULT NULL,
  `wellStatus` varchar(30) DEFAULT NULL,
  `wellStatusDate` date DEFAULT NULL,
  `wellStatusNote` varchar(255) DEFAULT NULL,
  `wellStatusNatureDamage` varchar(255) DEFAULT NULL,
  `wellStatusAction` varchar(30) DEFAULT NULL,
  `wellStatusRepairedDate` date DEFAULT NULL,
  `wellStatusRepairedBy` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tubewell
-- ----------------------------
INSERT INTO `tubewell` VALUES ('3', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2014-10-06 14:12:42', '2014-10-06 14:12:42');
INSERT INTO `tubewell` VALUES ('4', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2014-10-06 14:13:44', '2014-10-06 14:13:44');
INSERT INTO `tubewell` VALUES ('5', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2014-10-06 14:14:13', '2014-10-06 14:14:13');
INSERT INTO `tubewell` VALUES ('6', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2014-10-06 14:14:47', '2014-10-06 14:14:47');
INSERT INTO `tubewell` VALUES ('7', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2014-10-06 14:15:59', '2014-10-06 14:15:59');
INSERT INTO `tubewell` VALUES ('8', '123', '1', '0', '0', '0', '', '', '', '12', '21', '211', '0', '0', '0', '0', '0', '2121', '212', '21121', '0000-00-00', '0000-00-00', '2121', 'Yes', 'In Use', null, null, null, null, null, null, '2014-10-06 15:05:34', '2014-10-06 14:16:16');
INSERT INTO `tubewell` VALUES ('9', '123', '1', '3', '3', '77', 's', 'sss', 'ssss', '12', '21', '211', '1', '3', '4', '2', '3', '2121', '212', '21121', '0000-00-00', '0000-00-00', '2121', 'Yes', null, null, null, null, null, null, null, '2014-10-06 14:16:56', '2014-10-06 14:16:56');
INSERT INTO `tubewell` VALUES ('10', '123', '1', '3', '3', '77', 's', 'sss', 'ssss', '12', '21', '211', '1', '3', '4', '2', '3', '2121', '212', '21121', '0000-00-00', '0000-00-00', '2121', 'Yes', null, null, null, null, null, null, null, '2014-10-06 14:20:14', '2014-10-06 14:20:14');
INSERT INTO `tubewell` VALUES ('11', '123', '1', '3', '3', '77', 's', 'sss', 'ssss', '12', '21', '211', '1', '3', '4', '2', '3', '2121', '212', '21121', '0000-00-00', '0000-00-00', '2121', 'Yes', null, null, null, null, null, null, null, '2014-10-06 14:22:15', '2014-10-06 14:22:15');
INSERT INTO `tubewell` VALUES ('12', '123', '1', '3', '3', '77', 's', 'sss', 'ssss', '12', '21', '211', '1', '3', '4', '2', '3', '2121', '212', '21121', '0000-00-00', '0000-00-00', '2121', 'Yes', 'In Use', null, null, null, null, null, null, '2014-10-06 15:04:27', '2014-10-06 14:24:40');

-- ----------------------------
-- Table structure for `water_quality`
-- ----------------------------
DROP TABLE IF EXISTS `water_quality`;
CREATE TABLE `water_quality` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tubewell_id` int(10) DEFAULT NULL,
  `ph` varchar(10) DEFAULT NULL,
  `colour` varchar(10) DEFAULT NULL,
  `odour` varchar(20) DEFAULT NULL,
  `taste` varchar(20) DEFAULT NULL,
  `turbidity` varchar(10) DEFAULT NULL,
  `caco3` varchar(10) DEFAULT NULL,
  `amonia` varchar(10) DEFAULT NULL,
  `iron` varchar(10) DEFAULT NULL,
  `chlorides` varchar(10) DEFAULT NULL,
  `freeResidual` varchar(10) DEFAULT NULL,
  `dissolvedSolid` varchar(10) DEFAULT NULL,
  `calcium` varchar(10) DEFAULT NULL,
  `magnesium` varchar(10) DEFAULT NULL,
  `copper` varchar(10) DEFAULT NULL,
  `manganese` varchar(10) DEFAULT NULL,
  `sulphate` varchar(10) DEFAULT NULL,
  `nitrates` varchar(10) DEFAULT NULL,
  `fluoride` varchar(10) DEFAULT NULL,
  `phenolic` varchar(10) DEFAULT NULL,
  `mercury` varchar(10) DEFAULT NULL,
  `cadmium` varchar(10) DEFAULT NULL,
  `selenium` varchar(10) DEFAULT NULL,
  `arsenic` varchar(10) DEFAULT NULL,
  `cyanide` varchar(10) DEFAULT NULL,
  `lead` varchar(10) DEFAULT NULL,
  `zinc` varchar(10) DEFAULT NULL,
  `anionic` varchar(10) DEFAULT NULL,
  `chromium` varchar(10) DEFAULT NULL,
  `ploynuclear` varchar(10) DEFAULT NULL,
  `mineralOil` varchar(10) DEFAULT NULL,
  `pesticides` varchar(10) DEFAULT NULL,
  `radioactive` varchar(10) DEFAULT NULL,
  `alkalinity` varchar(10) DEFAULT NULL,
  `aluminium` varchar(10) DEFAULT NULL,
  `baron` varchar(10) DEFAULT NULL,
  `nickel` varchar(10) DEFAULT NULL,
  `ecoli` varchar(10) DEFAULT NULL,
  `testedBy` varchar(100) DEFAULT NULL,
  `testDate` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of water_quality
-- ----------------------------

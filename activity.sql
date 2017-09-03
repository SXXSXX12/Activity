/*
Navicat MySQL Data Transfer

Source Server         : bowdb
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : activity

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-08 15:28:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `activity`
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `act_id` int(7) NOT NULL AUTO_INCREMENT,
  `act_name` varchar(255) NOT NULL,
  `act_datestart` date NOT NULL,
  `act_dateend` date NOT NULL,
  `start_time` time NOT NULL,
  `act_hour` int(2) NOT NULL,
  `act_location` varchar(255) NOT NULL,
  `act_number` int(7) NOT NULL,
  `rec_date` date NOT NULL,
  `respon` int(7) NOT NULL,
  `status_respon` int(1) NOT NULL,
  `year1` int(1) NOT NULL,
  `year2` int(1) NOT NULL,
  `year3` int(1) NOT NULL,
  `year4` int(1) NOT NULL,
  PRIMARY KEY (`act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('1', 'hgg', '2017-06-30', '2017-06-30', '00:00:00', '10', 'comcenter', '50', '2017-06-30', '0', '0', '1', '1', '0', '0');
INSERT INTO `activity` VALUES ('2', 'ads', '2017-07-06', '2017-07-14', '00:00:00', '12', 'comcenter', '13', '2017-07-11', '0', '0', '1', '0', '1', '1');
INSERT INTO `activity` VALUES ('3', 'อบรม php (edit)', '2017-07-14', '2017-07-15', '07:00:00', '12', 'ห้องประชุมทางไกล', '50', '2017-07-14', '2', '2', '1', '0', '0', '1');
INSERT INTO `activity` VALUES ('4', 'อบรมabc', '2017-07-19', '2017-07-20', '07:00:00', '10', 'ห้องประชุมทางไกล', '50', '2017-07-18', '1', '2', '1', '1', '0', '0');

-- ----------------------------
-- Table structure for `code_activity`
-- ----------------------------
DROP TABLE IF EXISTS `code_activity`;
CREATE TABLE `code_activity` (
  `code_id` int(7) NOT NULL AUTO_INCREMENT,
  `gencode` varchar(255) NOT NULL,
  `act_id` int(7) NOT NULL,
  `checkcode` int(1) NOT NULL,
  `std_code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`code_id`)
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of code_activity
-- ----------------------------
INSERT INTO `code_activity` VALUES ('1', '492232', '4', '0', null);
INSERT INTO `code_activity` VALUES ('2', '469142', '4', '0', null);
INSERT INTO `code_activity` VALUES ('3', '470869', '4', '0', null);
INSERT INTO `code_activity` VALUES ('4', '415896', '4', '0', null);
INSERT INTO `code_activity` VALUES ('5', '486201', '4', '0', null);
INSERT INTO `code_activity` VALUES ('6', '424834', '4', '0', null);
INSERT INTO `code_activity` VALUES ('7', '461937', '4', '0', null);
INSERT INTO `code_activity` VALUES ('8', '460446', '4', '0', null);
INSERT INTO `code_activity` VALUES ('9', '487728', '4', '0', null);
INSERT INTO `code_activity` VALUES ('10', '484413', '4', '0', null);
INSERT INTO `code_activity` VALUES ('11', '436658', '4', '0', null);
INSERT INTO `code_activity` VALUES ('12', '433101', '4', '0', null);
INSERT INTO `code_activity` VALUES ('13', '482751', '4', '0', null);
INSERT INTO `code_activity` VALUES ('14', '465066', '4', '0', null);
INSERT INTO `code_activity` VALUES ('15', '448468', '4', '0', null);
INSERT INTO `code_activity` VALUES ('16', '488549', '4', '0', null);
INSERT INTO `code_activity` VALUES ('17', '412208', '4', '0', null);
INSERT INTO `code_activity` VALUES ('18', '498981', '4', '0', null);
INSERT INTO `code_activity` VALUES ('19', '415806', '4', '0', null);
INSERT INTO `code_activity` VALUES ('20', '466477', '4', '0', null);
INSERT INTO `code_activity` VALUES ('21', '442036', '4', '0', null);
INSERT INTO `code_activity` VALUES ('22', '493345', '4', '0', null);
INSERT INTO `code_activity` VALUES ('23', '482108', '4', '0', null);
INSERT INTO `code_activity` VALUES ('24', '431574', '4', '0', null);
INSERT INTO `code_activity` VALUES ('25', '423172', '4', '0', null);
INSERT INTO `code_activity` VALUES ('26', '490345', '4', '0', null);
INSERT INTO `code_activity` VALUES ('27', '475813', '4', '0', null);
INSERT INTO `code_activity` VALUES ('28', '493526', '4', '0', null);
INSERT INTO `code_activity` VALUES ('29', '431555', '4', '0', null);
INSERT INTO `code_activity` VALUES ('30', '487170', '4', '0', null);
INSERT INTO `code_activity` VALUES ('31', '450358', '4', '0', null);
INSERT INTO `code_activity` VALUES ('32', '447021', '4', '0', null);
INSERT INTO `code_activity` VALUES ('33', '498121', '4', '0', null);
INSERT INTO `code_activity` VALUES ('34', '436007', '4', '0', null);
INSERT INTO `code_activity` VALUES ('35', '414180', '4', '0', null);
INSERT INTO `code_activity` VALUES ('36', '491746', '4', '0', null);
INSERT INTO `code_activity` VALUES ('37', '428808', '4', '0', null);
INSERT INTO `code_activity` VALUES ('38', '424043', '4', '0', null);
INSERT INTO `code_activity` VALUES ('39', '420717', '4', '0', null);
INSERT INTO `code_activity` VALUES ('40', '422389', '4', '0', null);
INSERT INTO `code_activity` VALUES ('41', '434554', '4', '0', null);
INSERT INTO `code_activity` VALUES ('42', '493465', '4', '0', null);
INSERT INTO `code_activity` VALUES ('43', '478406', '4', '0', null);
INSERT INTO `code_activity` VALUES ('44', '438638', '4', '0', null);
INSERT INTO `code_activity` VALUES ('45', '411296', '4', '0', null);
INSERT INTO `code_activity` VALUES ('46', '461462', '4', '0', null);
INSERT INTO `code_activity` VALUES ('47', '460685', '4', '0', null);
INSERT INTO `code_activity` VALUES ('48', '425180', '4', '0', null);
INSERT INTO `code_activity` VALUES ('49', '479971', '4', '0', null);
INSERT INTO `code_activity` VALUES ('50', '460221', '4', '0', null);
INSERT INTO `code_activity` VALUES ('51', '332164', '3', '0', null);
INSERT INTO `code_activity` VALUES ('52', '388945', '3', '0', null);
INSERT INTO `code_activity` VALUES ('53', '332818', '3', '0', null);
INSERT INTO `code_activity` VALUES ('54', '373009', '3', '0', null);
INSERT INTO `code_activity` VALUES ('55', '342393', '3', '0', null);
INSERT INTO `code_activity` VALUES ('56', '361951', '3', '0', null);
INSERT INTO `code_activity` VALUES ('57', '366162', '3', '0', null);
INSERT INTO `code_activity` VALUES ('58', '390576', '3', '0', null);
INSERT INTO `code_activity` VALUES ('59', '327836', '3', '0', null);
INSERT INTO `code_activity` VALUES ('60', '333376', '3', '0', null);
INSERT INTO `code_activity` VALUES ('61', '317064', '3', '0', null);
INSERT INTO `code_activity` VALUES ('62', '332030', '3', '0', null);
INSERT INTO `code_activity` VALUES ('63', '386931', '3', '0', null);
INSERT INTO `code_activity` VALUES ('64', '322906', '3', '0', null);
INSERT INTO `code_activity` VALUES ('65', '351462', '3', '0', null);
INSERT INTO `code_activity` VALUES ('66', '374558', '3', '0', null);
INSERT INTO `code_activity` VALUES ('67', '393117', '3', '0', null);
INSERT INTO `code_activity` VALUES ('68', '395229', '3', '0', null);
INSERT INTO `code_activity` VALUES ('69', '320294', '3', '0', null);
INSERT INTO `code_activity` VALUES ('70', '380348', '3', '0', null);
INSERT INTO `code_activity` VALUES ('71', '354829', '3', '0', null);
INSERT INTO `code_activity` VALUES ('72', '390032', '3', '0', null);
INSERT INTO `code_activity` VALUES ('73', '389497', '3', '0', null);
INSERT INTO `code_activity` VALUES ('74', '346587', '3', '0', null);
INSERT INTO `code_activity` VALUES ('75', '325507', '3', '0', null);
INSERT INTO `code_activity` VALUES ('76', '372004', '3', '0', null);
INSERT INTO `code_activity` VALUES ('77', '320008', '3', '0', null);
INSERT INTO `code_activity` VALUES ('78', '315462', '3', '0', null);
INSERT INTO `code_activity` VALUES ('79', '313587', '3', '0', null);
INSERT INTO `code_activity` VALUES ('80', '360830', '3', '0', null);
INSERT INTO `code_activity` VALUES ('81', '367766', '3', '0', null);
INSERT INTO `code_activity` VALUES ('82', '374162', '3', '0', null);
INSERT INTO `code_activity` VALUES ('83', '372506', '3', '0', null);
INSERT INTO `code_activity` VALUES ('84', '331200', '3', '0', null);
INSERT INTO `code_activity` VALUES ('85', '383707', '3', '0', null);
INSERT INTO `code_activity` VALUES ('86', '384874', '3', '0', null);
INSERT INTO `code_activity` VALUES ('87', '330703', '3', '0', null);
INSERT INTO `code_activity` VALUES ('88', '392801', '3', '0', null);
INSERT INTO `code_activity` VALUES ('89', '353769', '3', '0', null);
INSERT INTO `code_activity` VALUES ('90', '344785', '3', '0', null);
INSERT INTO `code_activity` VALUES ('91', '331615', '3', '0', null);
INSERT INTO `code_activity` VALUES ('92', '340319', '3', '0', null);
INSERT INTO `code_activity` VALUES ('93', '398890', '3', '0', null);
INSERT INTO `code_activity` VALUES ('94', '386083', '3', '0', null);
INSERT INTO `code_activity` VALUES ('95', '383679', '3', '0', null);
INSERT INTO `code_activity` VALUES ('96', '373443', '3', '0', null);
INSERT INTO `code_activity` VALUES ('97', '325007', '3', '0', null);
INSERT INTO `code_activity` VALUES ('98', '325954', '3', '0', null);
INSERT INTO `code_activity` VALUES ('99', '360333', '3', '0', null);
INSERT INTO `code_activity` VALUES ('100', '376860', '3', '0', null);
INSERT INTO `code_activity` VALUES ('101', '243057', '2', '0', null);
INSERT INTO `code_activity` VALUES ('102', '286588', '2', '0', null);
INSERT INTO `code_activity` VALUES ('103', '260015', '2', '0', null);
INSERT INTO `code_activity` VALUES ('104', '270257', '2', '1', '2147483647');
INSERT INTO `code_activity` VALUES ('105', '248979', '2', '0', null);
INSERT INTO `code_activity` VALUES ('106', '285171', '2', '0', null);
INSERT INTO `code_activity` VALUES ('107', '246161', '2', '0', null);
INSERT INTO `code_activity` VALUES ('108', '228322', '2', '0', null);
INSERT INTO `code_activity` VALUES ('109', '273709', '2', '0', null);
INSERT INTO `code_activity` VALUES ('110', '263890', '2', '0', null);
INSERT INTO `code_activity` VALUES ('111', '227210', '2', '0', null);
INSERT INTO `code_activity` VALUES ('112', '260743', '2', '0', null);
INSERT INTO `code_activity` VALUES ('113', '213186', '2', '0', null);
INSERT INTO `code_activity` VALUES ('114', '119934', '1', '0', null);
INSERT INTO `code_activity` VALUES ('115', '156598', '1', '0', null);
INSERT INTO `code_activity` VALUES ('116', '152206', '1', '0', null);
INSERT INTO `code_activity` VALUES ('117', '178345', '1', '0', null);
INSERT INTO `code_activity` VALUES ('118', '185489', '1', '0', null);
INSERT INTO `code_activity` VALUES ('119', '152764', '1', '0', null);
INSERT INTO `code_activity` VALUES ('120', '122400', '1', '0', null);
INSERT INTO `code_activity` VALUES ('121', '175126', '1', '0', null);
INSERT INTO `code_activity` VALUES ('122', '177744', '1', '0', null);
INSERT INTO `code_activity` VALUES ('123', '169144', '1', '0', null);
INSERT INTO `code_activity` VALUES ('124', '136012', '1', '0', null);
INSERT INTO `code_activity` VALUES ('125', '134466', '1', '0', null);
INSERT INTO `code_activity` VALUES ('126', '138885', '1', '0', null);
INSERT INTO `code_activity` VALUES ('127', '124177', '1', '0', null);
INSERT INTO `code_activity` VALUES ('128', '122730', '1', '0', null);
INSERT INTO `code_activity` VALUES ('129', '132302', '1', '0', null);
INSERT INTO `code_activity` VALUES ('130', '156101', '1', '0', null);
INSERT INTO `code_activity` VALUES ('131', '161300', '1', '0', null);
INSERT INTO `code_activity` VALUES ('132', '147240', '1', '0', null);
INSERT INTO `code_activity` VALUES ('133', '199571', '1', '0', null);
INSERT INTO `code_activity` VALUES ('134', '181578', '1', '0', null);
INSERT INTO `code_activity` VALUES ('135', '198950', '1', '0', null);
INSERT INTO `code_activity` VALUES ('136', '139231', '1', '0', null);
INSERT INTO `code_activity` VALUES ('137', '142211', '1', '0', null);
INSERT INTO `code_activity` VALUES ('138', '122505', '1', '0', null);
INSERT INTO `code_activity` VALUES ('139', '110565', '1', '0', null);
INSERT INTO `code_activity` VALUES ('140', '163390', '1', '0', null);
INSERT INTO `code_activity` VALUES ('141', '171160', '1', '0', null);
INSERT INTO `code_activity` VALUES ('142', '111068', '1', '0', null);
INSERT INTO `code_activity` VALUES ('143', '174583', '1', '0', null);
INSERT INTO `code_activity` VALUES ('144', '149405', '1', '0', null);
INSERT INTO `code_activity` VALUES ('145', '182355', '1', '0', null);
INSERT INTO `code_activity` VALUES ('146', '144455', '1', '0', null);
INSERT INTO `code_activity` VALUES ('147', '174440', '1', '0', null);
INSERT INTO `code_activity` VALUES ('148', '161962', '1', '0', null);
INSERT INTO `code_activity` VALUES ('149', '116734', '1', '0', null);
INSERT INTO `code_activity` VALUES ('150', '174855', '1', '0', null);
INSERT INTO `code_activity` VALUES ('151', '118574', '1', '0', null);
INSERT INTO `code_activity` VALUES ('152', '130750', '1', '0', null);
INSERT INTO `code_activity` VALUES ('153', '140234', '1', '0', null);
INSERT INTO `code_activity` VALUES ('154', '199453', '1', '0', null);
INSERT INTO `code_activity` VALUES ('155', '150424', '1', '0', null);
INSERT INTO `code_activity` VALUES ('156', '120456', '1', '0', null);
INSERT INTO `code_activity` VALUES ('157', '193792', '1', '0', null);
INSERT INTO `code_activity` VALUES ('158', '170438', '1', '0', null);
INSERT INTO `code_activity` VALUES ('159', '188425', '1', '0', null);
INSERT INTO `code_activity` VALUES ('160', '150767', '1', '0', null);
INSERT INTO `code_activity` VALUES ('161', '173347', '1', '0', null);
INSERT INTO `code_activity` VALUES ('162', '174997', '1', '0', null);
INSERT INTO `code_activity` VALUES ('163', '196017', '1', '0', null);

-- ----------------------------
-- Table structure for `educate`
-- ----------------------------
DROP TABLE IF EXISTS `educate`;
CREATE TABLE `educate` (
  `educate_id` int(7) NOT NULL AUTO_INCREMENT,
  `educate_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`educate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of educate
-- ----------------------------
INSERT INTO `educate` VALUES ('1', 'มัธยมศึกษาตอนต้น(ม3)');
INSERT INTO `educate` VALUES ('2', 'มัธยมศึกษาตอนปลาย(ม6)/ปวช');
INSERT INTO `educate` VALUES ('3', 'อนุปริญญา/ปวส');
INSERT INTO `educate` VALUES ('4', 'ปริญญาตรี');

-- ----------------------------
-- Table structure for `education`
-- ----------------------------
DROP TABLE IF EXISTS `education`;
CREATE TABLE `education` (
  `edu_id` int(2) NOT NULL AUTO_INCREMENT,
  `edu_level` int(1) NOT NULL,
  `std_code` varchar(10) NOT NULL,
  `major` varchar(255) NOT NULL,
  `intiute` varchar(255) NOT NULL,
  `endyear` varchar(4) NOT NULL,
  PRIMARY KEY (`edu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of education
-- ----------------------------
INSERT INTO `education` VALUES ('1', '3', '5740248136', 'วิทยาการคอมพิวเตอร์', 'ม.เลย', '2561');
INSERT INTO `education` VALUES ('2', '2', '5740248233', 'asdfgh', '][poo', '2545');
INSERT INTO `education` VALUES ('3', '1', '', 'วทบ ', 'มลย', '2559');
INSERT INTO `education` VALUES ('4', '2', '', 'comsci ', 'lru', '2555');
INSERT INTO `education` VALUES ('5', '3', '', 'comsci ', 'lru', '2546');
INSERT INTO `education` VALUES ('6', '3', '', 'comsci ', 'lru', '2558');
INSERT INTO `education` VALUES ('7', '3', '', 'dd ', 'aa', '2530');
INSERT INTO `education` VALUES ('8', '3', '5740248136', 'ฟฟ ', 'พพ', '2549');
INSERT INTO `education` VALUES ('9', '3', '5740248108', 'lk-k ', 'นาน', '2558');
INSERT INTO `education` VALUES ('10', '4', '5740248108', 'comsci  ', 'พพdff', '2549');
INSERT INTO `education` VALUES ('12', '0', '5740248136', ' ', '', '');

-- ----------------------------
-- Table structure for `group`
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `group_id` int(2) NOT NULL AUTO_INCREMENT,
  `year` varchar(1) NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group
-- ----------------------------

-- ----------------------------
-- Table structure for `history_act`
-- ----------------------------
DROP TABLE IF EXISTS `history_act`;
CREATE TABLE `history_act` (
  `his_id` int(7) NOT NULL AUTO_INCREMENT,
  `std_code` varchar(10) NOT NULL,
  `act_id` int(7) NOT NULL,
  `status_regis` int(1) NOT NULL,
  `code_id` int(7) DEFAULT NULL,
  PRIMARY KEY (`his_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of history_act
-- ----------------------------
INSERT INTO `history_act` VALUES ('1', '5740248233', '3', '1', null);
INSERT INTO `history_act` VALUES ('2', '5740248233', '2', '2', '104');

-- ----------------------------
-- Table structure for `portfolio`
-- ----------------------------
DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE `portfolio` (
  `portfolio_id` int(2) NOT NULL AUTO_INCREMENT,
  `std_code` varchar(10) NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `portfolio` varchar(255) NOT NULL,
  `portyear` varchar(4) NOT NULL,
  PRIMARY KEY (`portfolio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of portfolio
-- ----------------------------

-- ----------------------------
-- Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `q_id` int(7) NOT NULL AUTO_INCREMENT,
  `sex` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(1) DEFAULT NULL,
  `act_id` int(7) NOT NULL,
  `q1` int(1) NOT NULL,
  `q2` int(1) NOT NULL,
  `q3` int(1) NOT NULL,
  `q4` int(1) NOT NULL,
  `q5` int(1) NOT NULL,
  `q6` int(1) NOT NULL,
  `q7` int(1) NOT NULL,
  `q8` int(1) NOT NULL,
  `q9` int(1) NOT NULL,
  `q10` int(1) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('1', '<', '<', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '');
INSERT INTO `question` VALUES ('2', '1', '2', '0', '5', '4', '3', '2', '1', '5', '4', '3', '2', '1', 'ดีมากค่ะ');
INSERT INTO `question` VALUES ('3', '1', '1', '0', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '');
INSERT INTO `question` VALUES ('4', '1', '1', '0', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '');
INSERT INTO `question` VALUES ('5', '1', '1', '0', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', 'fffff');

-- ----------------------------
-- Table structure for `student`
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `std_id` int(7) NOT NULL AUTO_INCREMENT,
  `pname` int(1) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `std_code` varchar(10) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `dateofbirth` date NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('2', '0', 'แคท', '    กนก  ', '5740248108', '174  M.8  B. Nasomvang P.nongbourlampho', '    098078', '1996-01-18', '    bow1239@hotmail.com');
INSERT INTO `student` VALUES ('3', '0', 'สวนีย์', '    กนก  ', '5740248136', '174  M.8  B. Nasomvang P.nongbourlampho', '    098078', '1996-01-18', '    bow1239@hotmail.com');
INSERT INTO `student` VALUES ('4', '0', 'สุธิดา', '   แก้ว', '5740248107', '174  M.8  B. Nasomvang P.nongbourlampho', '    098078', '1996-01-18', ' suttida_1946@hotmail.com');
INSERT INTO `student` VALUES ('5', '0', 'สุดารัตน์', '    พลซา', '5740248106', '174  M.8  B. Nasomvang P.nongbourlampho', '    098078', '1996-01-18', ' bow1239@hotmail.com');
INSERT INTO `student` VALUES ('6', '0', 'ระวีวรรณ  ', ' โพธิ์อุดม', '5740248105', '174  M.8  B. Nasomvang P.nongbourlampho', '    098078', '1996-01-18', ' ra12345@gmail.com');
INSERT INTO `student` VALUES ('8', '0', 'cat', '  pho ', '5740248233', '22 M.7 B. punpu P.loei', '  09878675', '1995-01-01', '  rawee@gmail.com');
INSERT INTO `student` VALUES ('9', '0', 'รังสินี ', ' หลี ', '5740248110', '22 M.7 B. punpu P.loei', ' 098767890', '2017-06-26', ' nat@gmail.com');

-- ----------------------------
-- Table structure for `teacher`
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `teach_id` int(7) NOT NULL AUTO_INCREMENT,
  `teach_name` varchar(255) NOT NULL,
  `teach_lname` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`teach_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', 'sawanee', 'sri', '0997733839', 'bb.bow12@gmail.com');
INSERT INTO `teacher` VALUES ('2', 'raweewun', 'phou', '0844482365', 'ra@gmail.com');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `User_id` int(7) NOT NULL AUTO_INCREMENT,
  `std_code` varchar(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Status_user` int(2) NOT NULL,
  `Rec_date` date NOT NULL,
  `Status_us` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`User_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '5740248136', 'bow1239@hotmail.com', '1234', '3', '2017-05-30', null);
INSERT INTO `user` VALUES ('2', '5740248136', 'bow1239@hotmail.com', '1234', '2', '2017-05-31', null);
INSERT INTO `user` VALUES ('3', '5740248136', 'bow1239@hotmail.com', '4321', '3', '2017-05-31', null);
INSERT INTO `user` VALUES ('4', '5740248136', 'bow1239@hotmail.com', '4321', '3', '2017-05-31', null);
INSERT INTO `user` VALUES ('5', '5740248227', 'ra12345@gmail.com', '12345', '3', '2017-05-31', null);
INSERT INTO `user` VALUES ('6', '5740248236', 'suda123@gmail.com', '1234', '3', '2017-06-01', null);
INSERT INTO `user` VALUES ('7', '5740248136', 'sudarutcs1995@gmail.com', '1234', '3', '2017-06-07', null);
INSERT INTO `user` VALUES ('8', '5740248137', 'beam@gmail.com', '1234', '3', '2017-06-14', null);
INSERT INTO `user` VALUES ('9', '5740248233', 'admin@gmail.com', '1234', '1', '2017-07-19', null);
INSERT INTO `user` VALUES ('10', '', '', '', '3', '2017-07-26', null);

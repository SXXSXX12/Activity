/*
 Navicat Premium Data Transfer

 Source Server         : prewdb
 Source Server Type    : MySQL
 Source Server Version : 50626
 Source Host           : localhost:3306
 Source Schema         : activity

 Target Server Type    : MySQL
 Target Server Version : 50626
 File Encoding         : 65001

 Date: 19/10/2017 19:42:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `std_id` int(7) NOT NULL AUTO_INCREMENT,
  `pname` int(1) NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `std_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `dateofbirth` date NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`std_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 71 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (1, 0, 'กฤษติยาภรณ์ ', ' นนมุต ', '6040248101', '', '  ', '0000-11-30', '  ', NULL);
INSERT INTO `student` VALUES (2, 2, 'กันตพร ', '  ปัดชาเขียว ', '6040248102', '', '   9890659', '0000-11-30', '   gun@gmail.com', NULL);
INSERT INTO `student` VALUES (3, 0, 'กิตติพงษ์ ', 'หาญลี ', '6040248103', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (4, 0, 'คณิต ', 'วิจิตรปัญญา ', '6040248104', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (5, 0, 'จักรพันธ์ ', 'สุวรรณบล ', '6040248105', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (6, 0, 'ชัยพร ', 'ตัวงาม ', '6040248107', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (7, 0, 'ณัฐพงษ์ ', 'แสนสมบัติ ', '6040248108', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (8, 0, 'ณัฐพล ', ' พันธ์แจ้ง ', '6040248109', '', '  ', '0000-11-30', '  ', NULL);
INSERT INTO `student` VALUES (9, 0, 'ณัฐวัฒน์ ', ' เกษเกษร ', '6040248110', '', '  ', '0000-11-30', '  ', NULL);
INSERT INTO `student` VALUES (10, 0, 'ทศพล ', 'วงศ์ลา ', '6040248111', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (11, 0, 'ทัพราช ', 'ผาลี ', '6040248112', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (12, 0, 'ธนพงษ์ ', 'วงศ์ปัญญา ', '6040248113', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (13, 0, 'ธานินทร์ ', 'ไสยันต์ ', '6040248114', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (14, 0, 'ธีระพัฒน์ ', 'สิมมา ', '6040248115', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (15, 1, 'นนทชัย ', '  อุ่มทุม ', '6040248116', '', '   0909865', '0000-11-30', '  non@gmail.com', NULL);
INSERT INTO `student` VALUES (16, 0, 'เบน ', 'ไลสเนอร์ ', '6040248117', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (17, 0, 'พีระพล ', 'ภุมมา ', '6040248118', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (18, 0, 'มลธกานต์ ', 'ใจภักดี ', '6040248119', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (19, 0, 'ยุทธพร ', 'พรมวงศ์ ', '6040248120', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (20, 0, 'รัฐพล ', 'ทวิตชาติ ', '6040248121', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (21, 0, 'ฤทธิรงค์ ', 'ษรจันทร์ศรี ', '6040248122', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (22, 0, 'ศิริชัย ', '    สิงห์ลา', '6040248123', '', '   ', '0000-11-30', '   ', NULL);
INSERT INTO `student` VALUES (23, 0, 'สุนิตา ', 'อาคะปัญญา ', '6040248124', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (24, 0, 'อดิสร ', 'โครตวงค์ ', '6040248125', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (25, 0, 'อติวิชญ์ ', ' อัมพวรรณ์ ', '6040248126', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (26, 0, 'เอกวี ', 'จันทร์สนิท ', '6040248127', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (27, 0, 'อภิญญา ', 'สารีมา ', '6040248128', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (28, 0, 'ธนากร ', ' วอสวัสดิ์ ', '6040248129', '', '  ', '0000-11-30', '  ', NULL);
INSERT INTO `student` VALUES (29, 0, 'กฤษณะ ', '  พวงมาลา ', '5940248101', '', '   ', '0000-11-30', '   ', NULL);
INSERT INTO `student` VALUES (30, 0, 'กฤษณะ ', 'ศรีบุตรดา ', '5940248102', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (31, 0, 'กิตติภูม ', ' จิตรเสงี่ยม ', '5940248104', '', '  ', '0000-11-30', '  ', NULL);
INSERT INTO `student` VALUES (32, 0, 'เกศรินทร์ ', 'ศรีสารากร ', '5940248105', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (33, 0, 'กชกร ', 'ชื่นนอก ', '5840248101', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (34, 0, 'กัญธิญา ', 'เฉียบแหลม ', '5840248103', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (35, 0, 'เกริกชัย ', ' ศรีศิลป์', '5840248104', '', '  ', '0000-11-30', '  ', NULL);
INSERT INTO `student` VALUES (36, 0, 'เกษกานดา ', 'กุลสิม ', '5840248105', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (37, 0, 'จักรกฤษณ์ ', 'เกตุทอง ', '5840248107', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (38, 0, 'ฐิติวรรณ ', 'ดวงบุบผา ', '5840248110', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (39, 0, 'ณัฐตรา ', 'ไฟรถแสง ', '5840248111', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (40, 0, 'ณัฐสิทธิ์ ', 'พาภักดี ', '5840248113', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (41, 0, 'ทศพร ', 'บุญประสงค์ ', '5840248114', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (42, 0, 'ทศวรรษ ', 'พรหมรักษา ', '5840248115', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (43, 0, 'ทัศนะ ', 'แก้วสีหา ', '5840248116', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (44, 0, 'ทินกร ', 'ประทุมบาล ', '5840248117', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (45, 0, 'ธราธร ', 'ชอบไร่ ', '5840248118', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (46, 1, 'นนทชัย ', 'เลิศขามป้อม ', '5840248119', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (47, 0, 'น้ำอ้อย ', 'เรืองมี ', '5840248122', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (48, 0, 'นิติพงษ์ ', 'อินทร์สกุล ', '5840248123', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (49, 0, 'นิภาภรณ์ ', 'อ่ำนาเพียง ', '5840248124', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (50, 0, 'ปวีณา ', 'คำจันทร์ ', '5840248126', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (51, 0, 'ปิยะพงษ์ ', ' บรรพลา ', '5840248127', '', '  ', '0000-11-30', '  ', NULL);
INSERT INTO `student` VALUES (52, 0, 'พรระติชัย ', 'ไวโรจนะพุทธะ ', '5840248128', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (53, 0, 'พัชริดา ', 'ชัยแสง ', '5840248129', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (54, 0, 'พัทธ์ธีรา ', 'แก้วพิภพ ', '5840248130', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (55, 0, 'ภาณุเดช ', ' มินทะขัด ', '5840248132', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (56, 0, 'ภานุพงศ์ ', 'แสนสะนา ', '5840248133', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (57, 0, 'วัชราพร ', 'ศิลาสัย ', '5840248134', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (58, 0, 'วัฒนา ', 'สร้อยสาวะ ', '5840248135', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (59, 0, 'วิทยา ', 'สารมโน ', '5840248137', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (60, 0, 'ศิริรัตน์ ', 'จัดนอก ', '5840248138', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (61, 0, 'ศุภกิตติ์ ', 'โกศรีวงศ์ ', '5840248139', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (62, 0, 'สมเกียรติ ', 'สายวัน ', '5840248140', '', ' ', '0000-00-00', ' ', NULL);
INSERT INTO `student` VALUES (64, 0, 'สันติ ', '  บงแก้ว ', '5840248141', '', '   ', '0000-11-30', '   ', NULL);
INSERT INTO `student` VALUES (65, 1, 'สิทธิศักดิ์ ', '   กัลยา ', '5840248142', '', '    ', '1900-12-28', '    ', NULL);
INSERT INTO `student` VALUES (66, 0, 'สวนีย์', ' ศรีณะอารังค์', '5740248136', 'aaa', '0909098787', '2017-08-16', 'bow@gmail.com', NULL);
INSERT INTO `student` VALUES (67, 2, 'สุดาดารัตน์', ' พลซาซา', '5740248236', '123', '  09814841', '1995-07-19', ' sudarutcs1995@gmail.com', NULL);
INSERT INTO `student` VALUES (68, 2, 'สุทธิดา', 'แก้วตาดวงใจ', '5740248137', 'abc', '  09875687', '2017-09-13', 'beam@gmail.com', NULL);
INSERT INTO `student` VALUES (69, 2, 'อำพร ', ' สมใจ ', '6040248123', '234', ' 098453657', '2017-09-21', ' ', '20-09-201711419445611296129571133441116568272n.jpg');
INSERT INTO `student` VALUES (70, 1, 'หมอป่า ', '   ป่าป่า ', '5740248123', '643', '   0895847', '2017-10-05', '  doctor@gmail.com', '19-10-20171doctor.jpg');

SET FOREIGN_KEY_CHECKS = 1;

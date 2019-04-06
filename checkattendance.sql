/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50562
 Source Host           : localhost:3306
 Source Schema         : checkattendance

 Target Server Type    : MySQL
 Target Server Version : 50562
 File Encoding         : 65001

 Date: 06/04/2019 13:29:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for attence
-- ----------------------------
DROP TABLE IF EXISTS `attence`;
CREATE TABLE `attence`  (
  `aid` int(50) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `sno` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `roomname` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_late` tinyint(4) NOT NULL,
  PRIMARY KEY (`aid`) USING BTREE,
  INDEX `sno`(`sno`) USING BTREE,
  INDEX `roomname`(`roomname`) USING BTREE,
  CONSTRAINT `roomname` FOREIGN KEY (`roomname`) REFERENCES `classroom` (`roomname`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sno` FOREIGN KEY (`sno`) REFERENCES `student` (`sno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of attence
-- ----------------------------
INSERT INTO `attence` VALUES (2, '2019-02-02 19:18:17', '5', '8-201', 1);
INSERT INTO `attence` VALUES (3, '2019-02-06 19:19:18', '2', '8-212', 1);
INSERT INTO `attence` VALUES (4, '2019-02-08 19:19:48', '6', '10-306', 1);
INSERT INTO `attence` VALUES (5, '2019-02-14 19:22:05', '2', '8-201', 1);
INSERT INTO `attence` VALUES (6, '2019-02-15 19:22:58', '4', '8-505', 0);
INSERT INTO `attence` VALUES (7, '2019-02-16 19:23:42', '8', '8-212', 1);
INSERT INTO `attence` VALUES (8, '2019-02-05 15:33:59', '2', '10-305', 0);
INSERT INTO `attence` VALUES (9, '2019-02-22 19:24:30', '6', '8-201', 1);
INSERT INTO `attence` VALUES (10, '2019-02-22 19:25:03', '15', '8-505', 1);
INSERT INTO `attence` VALUES (11, '2019-02-26 19:26:16', '4', '8-212', 1);
INSERT INTO `attence` VALUES (12, '2019-02-28 19:27:12', '6', '8-505', 0);
INSERT INTO `attence` VALUES (13, '2019-02-04 19:18:48', '4', '8-505', 1);
INSERT INTO `attence` VALUES (15, '2019-02-12 19:20:55', '2', '10-306', 1);
INSERT INTO `attence` VALUES (16, '2019-02-24 19:27:56', '5', '8-505', 0);
INSERT INTO `attence` VALUES (18, '2019-02-08 09:54:33', '7', '10-306', 1);
INSERT INTO `attence` VALUES (19, '2019-02-16 09:54:56', '8', '8-505', 1);
INSERT INTO `attence` VALUES (20, '2019-02-22 09:55:26', '6', '10-306', 0);
INSERT INTO `attence` VALUES (21, '2019-02-16 09:55:48', '5', '10-305', 1);
INSERT INTO `attence` VALUES (22, '2019-02-10 09:56:23', '4', '8-201', 1);
INSERT INTO `attence` VALUES (23, '2019-03-10 09:56:47', '3', '10-306', 0);
INSERT INTO `attence` VALUES (24, '2019-02-14 09:57:10', '8', '8-201', 1);
INSERT INTO `attence` VALUES (26, '2019-02-16 09:58:21', '7', '8-505', 1);
INSERT INTO `attence` VALUES (27, '2019-02-17 09:58:47', '8', '10-306', 1);
INSERT INTO `attence` VALUES (28, '2019-02-18 09:59:09', '3', '8-212', 0);
INSERT INTO `attence` VALUES (30, '2019-04-03 08:40:10', '5', '8-405', 1);
INSERT INTO `attence` VALUES (31, '2019-04-03 08:40:36', '9', '8-212', 1);
INSERT INTO `attence` VALUES (32, '2019-04-20 08:40:53', '4', '10-305', 1);
INSERT INTO `attence` VALUES (33, '2019-04-10 08:41:11', '2', '10-305', 0);
INSERT INTO `attence` VALUES (35, '2019-04-08 08:41:45', '3', '8-502', 1);
INSERT INTO `attence` VALUES (36, '2019-05-10 09:42:04', '7', '10-306', 0);
INSERT INTO `attence` VALUES (37, '2019-05-18 08:42:25', '4', '1-221', 1);
INSERT INTO `attence` VALUES (38, '2019-05-12 08:42:45', '8', '8-201', 0);
INSERT INTO `attence` VALUES (39, '2019-05-09 08:43:06', '9', '8-212', 1);
INSERT INTO `attence` VALUES (40, '2019-04-22 08:43:27', '7', '1-210', 0);
INSERT INTO `attence` VALUES (44, '2019-03-12 21:09:21', '4', '1-221', 1);
INSERT INTO `attence` VALUES (46, '2019-03-16 21:09:54', '6', '10-306', 1);
INSERT INTO `attence` VALUES (48, '2019-05-13 21:10:31', '7', '10-305', 1);
INSERT INTO `attence` VALUES (49, '2019-05-10 21:10:49', '8', '1-221', 1);
INSERT INTO `attence` VALUES (50, '2019-05-02 21:11:05', '1', '8-505', 1);

-- ----------------------------
-- Table structure for classroom
-- ----------------------------
DROP TABLE IF EXISTS `classroom`;
CREATE TABLE `classroom`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `roomname` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `roomname`(`roomname`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of classroom
-- ----------------------------
INSERT INTO `classroom` VALUES (9, '1-210');
INSERT INTO `classroom` VALUES (8, '1-221');
INSERT INTO `classroom` VALUES (3, '10-305');
INSERT INTO `classroom` VALUES (4, '10-306');
INSERT INTO `classroom` VALUES (1, '8-201');
INSERT INTO `classroom` VALUES (2, '8-212');
INSERT INTO `classroom` VALUES (7, '8-405');
INSERT INTO `classroom` VALUES (6, '8-502');
INSERT INTO `classroom` VALUES (5, '8-505');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sno` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `class` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `academy` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mac_address` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sno`(`sno`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (1, '1', '张无忌', '123456', '计科161', '数信', '1234');
INSERT INTO `student` VALUES (2, '2', '张衡', '123456', '高材162', '材纺', '12345');
INSERT INTO `student` VALUES (3, '3', '张仪', '12345', '数学161', '数信', '1234');
INSERT INTO `student` VALUES (4, '4', '张飞', '123456', '软件162', '数信', '1234');
INSERT INTO `student` VALUES (5, '5', '张之洞', '123456', '高材161', '材纺', '1234');
INSERT INTO `student` VALUES (6, '6', '张居正', '123456', '网络162', '数信', '1234');
INSERT INTO `student` VALUES (7, '7', '张骞', '12345', '计科161', '数信', '1234');
INSERT INTO `student` VALUES (8, '8', '张仲景', '123456', '医本162', '医学院', '1234');
INSERT INTO `student` VALUES (9, '9', '张九龄', '12345', '护理161', '医学院', '1234');
INSERT INTO `student` VALUES (10, '10', '张三丰', '123456', '计科162', '数信', '1234');
INSERT INTO `student` VALUES (18, '11', '张九龄', '1234', '信计161', '数信', '1234');
INSERT INTO `student` VALUES (19, '12', '张公瑾', '1234', '高材162', '材纺', '1234');
INSERT INTO `student` VALUES (20, '13', '张英', '1234', '医学162', '医学院', '1234');
INSERT INTO `student` VALUES (21, '14', '张恒', '1234', '计科161', '数信', '1234');
INSERT INTO `student` VALUES (22, '15', '张謇', '1234', '纺卓161', '材纺', '1234');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'zqq', 'e10adc3949ba59abbe56e057f20f883e', '15657318057', '3666697623@qq.com');
INSERT INTO `user` VALUES (2, 'qq', 'e10adc3949ba59abbe56e057f20f883e', '15657318057', '3466697623@qq.com');

SET FOREIGN_KEY_CHECKS = 1;

/*
 Navicat Premium Data Transfer

 Source Server         : tp
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : tp

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 08/12/2021 17:04:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `admin_username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `admin_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('admin', 'admin');

-- ----------------------------
-- Table structure for cms_menu
-- ----------------------------
DROP TABLE IF EXISTS `cms_menu`;
CREATE TABLE `cms_menu`  (
  `menu_id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menuname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `parentid` smallint(6) NOT NULL DEFAULT 0,
  `modulename` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `controller` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `method` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `data` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `listorder` smallint(6) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`menu_id`) USING BTREE,
  INDEX `listorder`(`listorder`) USING BTREE,
  INDEX `parentid`(`parentid`) USING BTREE,
  INDEX `module`(`modulename`, `controller`, `method`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 48 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cms_menu
-- ----------------------------
INSERT INTO `cms_menu` VALUES (12, '12', 12, '12', '12', '12', '12', 0, 1, 1);
INSERT INTO `cms_menu` VALUES (46, '25', 0, '315', '513', '135', '246', 0, 1, 1);
INSERT INTO `cms_menu` VALUES (47, '6', 6, '1', '1', '1', '1', 9, 1, 2);

-- ----------------------------
-- Table structure for dingdan
-- ----------------------------
DROP TABLE IF EXISTS `dingdan`;
CREATE TABLE `dingdan`  (
  `dingdan_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mai3` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mai4` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shangpin_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shuliang` int(255) NULL DEFAULT NULL,
  `shangpin_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `qq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `zhuangtai` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mai3qq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `goumaishijian` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `wanchengshijian` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`dingdan_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of dingdan
-- ----------------------------
INSERT INTO `dingdan` VALUES ('16355604502216', 'bobo', 'zheng', 'zheng_99', 1, '图', '/public/uploads/20211029/a9f9f9a2c40bc9749eecc93ab2fe7466.jpg', '10', '15632333661', '已完成', '146648344', '2021-10-30 10:20:50', '2021-10-30 10:22:14');
INSERT INTO `dingdan` VALUES ('16389530037442', 'zheng', 'bobo', '99999', 3, '测试', '/public/uploads/20211030/3e58f12c96319d9b23967ed3bf778031.jpg', '5', '146648344', '已完成', '15632333661', '2021-12-08 16:43:23', '2021-12-08 17:00:13');
INSERT INTO `dingdan` VALUES ('16354859053985', 'bobo', 'zheng', 'zheng_123', 1, '热水壶', '/public/uploads/20211028/409ed18c74cb4cafe881bf7da3c1df97.jpg', '15', '15632333661', '已完成', '146648344', '2021-10-29 13:38:25', '2021-10-29 13:49:56');

-- ----------------------------
-- Table structure for fenlei
-- ----------------------------
DROP TABLE IF EXISTS `fenlei`;
CREATE TABLE `fenlei`  (
  `fenlei` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`fenlei`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of fenlei
-- ----------------------------
INSERT INTO `fenlei` VALUES ('fenlei1');
INSERT INTO `fenlei` VALUES ('fenlei2');
INSERT INTO `fenlei` VALUES ('fenlei3');
INSERT INTO `fenlei` VALUES ('fenlei4');

-- ----------------------------
-- Table structure for think_admin
-- ----------------------------
DROP TABLE IF EXISTS `think_admin`;
CREATE TABLE `think_admin`  (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `admin_passwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of think_admin
-- ----------------------------
INSERT INTO `think_admin` VALUES (1, 'admin', 'admin');

-- ----------------------------
-- Table structure for think_shangpin
-- ----------------------------
DROP TABLE IF EXISTS `think_shangpin`;
CREATE TABLE `think_shangpin`  (
  `shangpin_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `shangpin_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `qq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shuliang` int(255) NULL DEFAULT NULL,
  `yesno` int(11) NULL DEFAULT NULL,
  `shenhe` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fenlei` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`shangpin_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of think_shangpin
-- ----------------------------
INSERT INTO `think_shangpin` VALUES ('nie_1', '书本', '/public/uploads/20211026/fbb87cf3f962de7f9dfadf3ca9057c8e.jpg', '10', 'nie', '21978654', 0, 1, '同意发布', 'fenlei1');
INSERT INTO `think_shangpin` VALUES ('chang_1', '课本', '/public/uploads/20211026/5b38a8b02b38c9164ea87800afb85cca.jpg', '100', 'chang', '35075422', 1, 1, '同意发布', 'fenlei2');
INSERT INTO `think_shangpin` VALUES ('bobo_1', '肉', '/public/uploads/20211026/a045b185c6cf9c6de7811435225b978b.jpg', '50', 'bobo', '146648344', 1, 1, '同意发布', 'fenlei1');
INSERT INTO `think_shangpin` VALUES ('bobo_2', '交大美景图', '/public/uploads/20211026/7549a1f11718197455e40992547a0635.jpg', '1', 'bobo', '146648344', 0, 1, '同意发布', 'fenlei2');
INSERT INTO `think_shangpin` VALUES ('chang_7', '湖图', '/public/uploads/20211029/9150055d301446de3fdbb73485b8698e.jpg', '1', 'chang', '35075422', 10, 0, '拒绝发布', 'fenlei2');
INSERT INTO `think_shangpin` VALUES ('bobo_10', '茶茶茶', '/public/uploads/20211028/5b21a5ad1fb8aea6aeda1e20943375d1.jpg', '5', 'bobo', '146648344', 3, 0, '拒绝发布', 'fenlei2');
INSERT INTO `think_shangpin` VALUES ('bobo_3', '茶具', '/public/uploads/20211028/0b087939a36305626dc74ab363d04fae.jpg', '30', 'bobo', '146648344', 1, 1, '同意发布', 'fenlei1');
INSERT INTO `think_shangpin` VALUES ('zheng_123', '热水壶', '/public/uploads/20211028/409ed18c74cb4cafe881bf7da3c1df97.jpg', '15', 'zheng', '15632333661', 7, 1, '同意发布', 'fenlei1');
INSERT INTO `think_shangpin` VALUES ('bobo_100', '美景', '/public/uploads/20211030/071f748a6390a3d211088d4b4b0e30c4.jpg', '5', 'bobo', '146648344', 5, 1, '同意发布', 'fenlei4');
INSERT INTO `think_shangpin` VALUES ('zheng_99', '图', '/public/uploads/20211029/a9f9f9a2c40bc9749eecc93ab2fe7466.jpg', '10', 'zheng', '15632333661', 9, 1, '同意发布', 'fenlei1');
INSERT INTO `think_shangpin` VALUES ('99999', '测试', '/public/uploads/20211030/3e58f12c96319d9b23967ed3bf778031.jpg', '5', 'bobo', '146648344', 2, 1, '同意发布', 'fenlei1');
INSERT INTO `think_shangpin` VALUES ('000000000000000', '000000000000000', '/public/uploads/20211208/7714ce51879ccdbbba785aca71c3b224.jpg', '9', 'bobo', '146648344', 9, 0, '未审核', 'fenlei1');

-- ----------------------------
-- Table structure for think_user
-- ----------------------------
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user`  (
  `user_id` int(11) NULL DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_passwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `qq` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sex` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_name`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of think_user
-- ----------------------------
INSERT INTO `think_user` VALUES (NULL, 'bobo', '123', '146648344', '男', '8栋');
INSERT INTO `think_user` VALUES (NULL, 'zheng', '123', '15632333661', '男', '9栋');
INSERT INTO `think_user` VALUES (NULL, 'nie', '123', '21978654', '女', '9栋');
INSERT INTO `think_user` VALUES (NULL, 'chang', '123', '35075422', '男', '23栋');
INSERT INTO `think_user` VALUES (NULL, 'yan', '123', NULL, NULL, NULL);
INSERT INTO `think_user` VALUES (NULL, 'jia', '123', NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;

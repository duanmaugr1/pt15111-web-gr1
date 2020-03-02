/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pt15111-web-gr1

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-03-02 15:41:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `create_at` datetime DEFAULT NULL,
  `food_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `food_id` (`food_id`),
  CONSTRAINT `comment_food` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for foods
-- ----------------------------
DROP TABLE IF EXISTS `foods`;
CREATE TABLE `foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `image` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `price` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `address` varchar(255) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of foods
-- ----------------------------

-- ----------------------------
-- Table structure for food_place
-- ----------------------------
DROP TABLE IF EXISTS `food_place`;
CREATE TABLE `food_place` (
  `place_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  PRIMARY KEY (`place_id`,`food_id`),
  KEY `place_id` (`place_id`),
  KEY `food_id` (`food_id`),
  CONSTRAINT `food_place_f` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `food_place_p` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of food_place
-- ----------------------------

-- ----------------------------
-- Table structure for food_type
-- ----------------------------
DROP TABLE IF EXISTS `food_type`;
CREATE TABLE `food_type` (
  `type_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  PRIMARY KEY (`type_id`,`food_id`),
  KEY `type_id` (`type_id`),
  KEY `food_id` (`food_id`),
  CONSTRAINT `food_type-t` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `food_type_f` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of food_type
-- ----------------------------

-- ----------------------------
-- Table structure for places
-- ----------------------------
DROP TABLE IF EXISTS `places`;
CREATE TABLE `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of places
-- ----------------------------
INSERT INTO `places` VALUES ('2', 'test_demo');

-- ----------------------------
-- Table structure for ratings
-- ----------------------------
DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` int(11) NOT NULL,
  `food_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `food_id` (`food_id`),
  CONSTRAINT `rating_food` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rating_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of ratings
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Superadmin', '\0');
INSERT INTO `roles` VALUES ('2', 'Quản trị', '');
INSERT INTO `roles` VALUES ('3', 'Thành viên', '');
INSERT INTO `roles` VALUES ('4', 'Biên tập viên', '');

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', 'Món khai vị');
INSERT INTO `types` VALUES ('2', 'Món ăn chính');
INSERT INTO `types` VALUES ('3', 'Món tráng miệng');
INSERT INTO `types` VALUES ('4', 'Món ăn nhẹ');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `phone_number` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `role_id` int(11) NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'1',
  `image` varchar(255) CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Nguyễn Huy Hoàng', '$2y$10$1F6V487nZ0hBFkPD50I8uu0eB0z47MahPVvAePVoJJXbMNakPJhUi', 'hoangnh@gmail.com', '0326972525', '2', '', 'public/images/5e5951c190a2d-75224619_p0_master1200.jpg');
INSERT INTO `users` VALUES ('2', 'demo', '$2y$10$Nfy8NNJ.SOoEz7PdntKM0utYzrlJJl8YVbelDL4V.sK573CxlOI82', 'thienth@gmail.com', '0936191231', '2', '', 'public/images/5e59466387945-__kiana_kaslana_and_kiana_kaslana_honkai_impact_3rd_and_etc_drawn_by_pomu_formula__fb21b435a2da95b48eae2334c6973832.jpg');
INSERT INTO `users` VALUES ('3', 'demo2', '$2y$10$2Gz382L0hXMl31Y3M45ZG.MK57uNJqIICu7kxLYGCLd26BDNHVIBy', 'demo@gmail.com', '1234567890', '3', '', 'public/images/5e594b5cae1f6-53186325_p0_master1200.jpg');

/*
 Navicat Premium Data Transfer

 Source Server         : DB Estetica
 Source Server Type    : MySQL
 Source Server Version : 50562
 Source Host           : sql5.freemysqlhosting.net:3306
 Source Schema         : sql5425622

 Target Server Type    : MySQL
 Target Server Version : 50562
 File Encoding         : 65001

 Date: 22/07/2021 20:06:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `correo` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `telefono` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `direccion` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES (1, 'lulu', 'lulu@gmail.com', '6546546545', 'zzzzzz', '2021-07-21 22:03:31', 2);
INSERT INTO `clientes` VALUES (2, 'lalo', 'lalo@gmail.com', '6546546544', 'xxxxxxx', '2021-07-21 22:03:46', 1);
INSERT INTO `clientes` VALUES (3, 'pepe', 'pepe@gmail.com', '9879879877', 'cccccc', '2021-07-21 22:04:32', 1);
INSERT INTO `clientes` VALUES (4, 'juan', 'juan@gmail.com', '7417417417', 'aaaaa', '2021-07-21 22:04:45', 1);
INSERT INTO `clientes` VALUES (5, 'chon', 'chon@gmail.com', '7417418529', 'wwwww', '2021-07-21 22:49:12', 1);

-- ----------------------------
-- Table structure for empleados
-- ----------------------------
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `email` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `password` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `tipo` int(1) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `Puesto`(`tipo`) USING BTREE,
  CONSTRAINT `Puesto` FOREIGN KEY (`tipo`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of empleados
-- ----------------------------
INSERT INTO `empleados` VALUES (1, 'cristian', 'cris@gmail.com', '123', 1, 1);
INSERT INTO `empleados` VALUES (2, 'andy', 'andy@gmail.com', '123', 1, 0);
INSERT INTO `empleados` VALUES (4, 'Francisco', 'Francisco@gmail.com', '123456', 1, 0);
INSERT INTO `empleados` VALUES (5, 'jorge', 'cristian.mendoza.s@gmail.com', '123', 4, 0);
INSERT INTO `empleados` VALUES (6, 'ale', 'alejandro@gmail.com', '123', 1, 0);
INSERT INTO `empleados` VALUES (7, 'Amairany', 'cristian.mendoza.026@gmail.com', '123', 4, 0);

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `puesto` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rol
-- ----------------------------
INSERT INTO `rol` VALUES (1, 'Estilista', 1, '2021-07-21 08:35:41');
INSERT INTO `rol` VALUES (2, 'Manicurista', 2, '2021-07-21 08:35:51');
INSERT INTO `rol` VALUES (3, 'Cortador de cabello', 3, '2021-07-21 08:37:00');
INSERT INTO `rol` VALUES (4, 'Administrador', 4, '2021-07-21 08:37:34');

-- ----------------------------
-- Table structure for servicios
-- ----------------------------
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `precio` float(8, 2) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of servicios
-- ----------------------------
INSERT INTO `servicios` VALUES (1, 'Manicure', 200.00, 0);
INSERT INTO `servicios` VALUES (2, 'Corte de dama', 70.00, 0);
INSERT INTO `servicios` VALUES (3, 'tinte de cabello', 120.00, 0);

-- ----------------------------
-- Table structure for visitas
-- ----------------------------
DROP TABLE IF EXISTS `visitas`;
CREATE TABLE `visitas`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cliente_id` int(1) NOT NULL DEFAULT 0,
  `servicio_id` int(1) NOT NULL DEFAULT 0,
  `empleado_id` int(1) NOT NULL DEFAULT 0,
  `registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cita` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of visitas
-- ----------------------------
INSERT INTO `visitas` VALUES (1, 1, 3, 2, '2021-07-22 01:23:40', '2021-07-24');
INSERT INTO `visitas` VALUES (2, 1, 3, 2, '2021-07-22 01:24:00', '2021-08-05');
INSERT INTO `visitas` VALUES (51, 2, 2, 1, '2021-07-22 00:56:50', '2021-08-21');
INSERT INTO `visitas` VALUES (52, 3, 1, 3, '2021-07-22 00:58:44', '2021-08-21');
INSERT INTO `visitas` VALUES (53, 1, 1, 2, '2021-07-22 22:37:18', '2021-08-21');
INSERT INTO `visitas` VALUES (54, 4, 3, 1, '2021-07-23 00:57:14', '2021-08-22');

SET FOREIGN_KEY_CHECKS = 1;

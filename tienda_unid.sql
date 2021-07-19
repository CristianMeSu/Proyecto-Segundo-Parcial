/*
 Navicat Premium Data Transfer

 Source Server         : Servidor Local
 Source Server Type    : MySQL
 Source Server Version : 100419
 Source Host           : localhost:3306
 Source Schema         : tienda_unid

 Target Server Type    : MySQL
 Target Server Version : 100419
 File Encoding         : 65001

 Date: 15/06/2021 22:19:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'juguetes', '#4799f0');
INSERT INTO `categorias` VALUES (4, 'Ropa deportiva', '#00a841');
INSERT INTO `categorias` VALUES (5, 'Productos de Limpieza', '#c8c214');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `codigo` bigint NOT NULL,
  `descripcion` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int NOT NULL,
  `cantidad_min` int NOT NULL DEFAULT 5,
  `id_categoria` int NOT NULL,
  `activo` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `categorias`(`id_categoria`) USING BTREE,
  CONSTRAINT `categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of productos
-- ----------------------------
INSERT INTO `productos` VALUES (1, 'Lego', 8676817, 'juguetes niños 3-7 años piezas armables', 'rojo', 150, 10, 15, 1, 0);
INSERT INTO `productos` VALUES (2, 'Oso de peluche', 65468767, 'osito de felpa para ninos de 3-5', 'cafe', 120, 10, 5, 1, 0);
INSERT INTO `productos` VALUES (3, 'avion', 53460, 'avion de plastico 10cm fijo', 'blanco', 50, 8, 10, 1, 0);
INSERT INTO `productos` VALUES (12, 'Fabuloso', 8546486, 'Limpiador Multiusos aroma lavanda', 'morado', 20, 50, 15, 5, 0);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefono` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_registro` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `unique`(`correo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (2, 'Erick', 'erick@outlook.com', '9898989898', '1234', '2021-05-30 19:06:22.945996', 1);
INSERT INTO `usuarios` VALUES (6, 'Lourdes', 'lomesu@live.mx', '9879871212', '1122', '2021-06-08 17:54:16.265978', 1);
INSERT INTO `usuarios` VALUES (30, 'juan', 'juan@gmail.com', '1231234455', '123', '2021-06-10 18:30:43.563184', 1);
INSERT INTO `usuarios` VALUES (31, 'Eduardo', 'lalo@gmail.com', '9879874455', '1111', '2021-06-13 17:59:42.401805', 1);
INSERT INTO `usuarios` VALUES (32, 'Amairany', 'may@gmail.com', '9898989897', '1234', '2021-06-13 18:12:51.400033', 1);
INSERT INTO `usuarios` VALUES (33, 'Cristian', 'mesu@gmail.com', '9879874466', '1234', '2021-06-13 18:13:36.916041', 1);

SET FOREIGN_KEY_CHECKS = 1;

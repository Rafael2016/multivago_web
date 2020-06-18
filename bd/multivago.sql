/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : multivago

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-06-16 15:36:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_participante`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_participante`;
CREATE TABLE `tbl_participante` (
  `codParticipante` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codViagem` int(10) unsigned NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `telefone` varchar(12) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pagamento` varchar(20) DEFAULT '',
  `frmPgto` varchar(50) DEFAULT NULL,
  `dtRegistro` date NOT NULL,
  PRIMARY KEY (`codParticipante`),
  KEY `fk_CodViagem` (`codViagem`) USING BTREE,
  CONSTRAINT `fk_CodViagem` FOREIGN KEY (`codViagem`) REFERENCES `tbl_trip` (`codViagem`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_participante
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_trip`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_trip`;
CREATE TABLE `tbl_trip` (
  `codViagem` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codUsuario` int(10) unsigned NOT NULL,
  `uf` int(11) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL,
  `saida` date NOT NULL,
  `retorno` date NOT NULL,
  `numParticipantes` tinyint(4) NOT NULL,
  `vlrHospedagem` decimal(10,2) NOT NULL,
  `vlrLogistica` decimal(10,2) NOT NULL,
  `dtRegistro` date NOT NULL,
  PRIMARY KEY (`codViagem`),
  KEY `fk_codUsuario` (`codUsuario`),
  CONSTRAINT `fk_codUsuario` FOREIGN KEY (`codUsuario`) REFERENCES `tbl_usuario` (`codUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tbl_trip
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_usuario`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE `tbl_usuario` (
  `codUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `email` varchar(150) DEFAULT '',
  `status` tinyint(1) NOT NULL,
  `dtRegistro` date NOT NULL,
  PRIMARY KEY (`codUsuario`),
  UNIQUE KEY `login_unique` (`login`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tbl_usuario
-- ----------------------------
INSERT INTO `tbl_usuario` VALUES ('3', 'Rafael Luz', 'admin', '$argon2i$v=19$m=65536,t=4,p=1$L2tIRTF4ZDNRN0VnV3d4Wg$vlwhPRd+/4Pro5y1nX/GCWoE6gxr71AJBFot7Adf9F0', 'rafaelcrescer@gmail.com', '1', '2020-06-15');
INSERT INTO `tbl_usuario` VALUES ('4', 'Luz', 'Teste', '$argon2i$v=19$m=65536,t=4,p=1$RHJkUE1scGI0OExkaDZPZQ$7t/a2nf9NwuWFxe3FpMFJ9B8gx7j1E3tUrdcfz/Rz7I', 'rafaelcrescer@gmail.com', '1', '2020-06-15');

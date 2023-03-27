CREATE TABLE IF NOT EXISTS `pedido` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `pedidos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `pedido_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod`)
)
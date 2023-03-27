CREATE TABLE IF NOT EXISTS `produto` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `preco` decimal(9,2) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `produto_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod`)
)
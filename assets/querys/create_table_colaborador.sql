USE appdb;
CREATE TABLE IF NOT EXISTS `colaborador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `sexo` varchar(12) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(13) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `endereco` longtext DEFAULT NULL CHECK (json_valid(`endereco`)),
  `tipo` char(1) DEFAULT NULL,
  `colab_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
)
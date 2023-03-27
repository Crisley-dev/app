CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `bloqueado` varchar(45) DEFAULT NULL,
  `data_bloqueio` datetime DEFAULT NULL,
  `tentativas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
)
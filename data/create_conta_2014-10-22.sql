CREATE TABLE `sabino_dev_gonsv`.`conta` (
  `conta_id` INT NOT NULL AUTO_INCREMENT,
  `pessoa_id` INT NOT NULL,
  `nome` VARCHAR(120) NULL,
  `email` VARCHAR(200) NULL,
  `senha` VARCHAR(45) NULL,
  `tipo` TINYINT NOT NULL,
  PRIMARY KEY (`conta_id`));

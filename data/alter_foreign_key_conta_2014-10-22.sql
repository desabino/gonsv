ALTER TABLE `sabino_dev_gonsv`.`conta` 
ADD INDEX `tipo_conta_idx` (`tipo` ASC);
ALTER TABLE `sabino_dev_gonsv`.`conta` 
ADD CONSTRAINT `tipo_conta`
  FOREIGN KEY (`tipo`)
  REFERENCES `sabino_dev_gonsv`.`conta_tipo` (`conta_tipo_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

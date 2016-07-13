# teste_minutrade

Criar tabela

CREATE TABLE  `client` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 100 ) NOT NULL ,
`email` VARCHAR( 100 ) NOT NULL ,
`cpf` VARCHAR( 100 ) NOT NULL,
`phone` VARCHAR( 100 ) NOT NULL,
`address` VARCHAR( 100 ) NOT NULL,
`maritalstatus` VARCHAR( 50 ) NOT NULL
) ENGINE = INNODB;
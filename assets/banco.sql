CREATE TABLE usuario (
id INT NOT NULL AUTO_INCREMENT,
usuario VARCHAR(45) NOT NULL,
rg INT NOT NULL,
data_nascimento DATE NOT NULL,
senha VARCHAR(200) NOT NULL,
PRIMARY KEY (`id`));

CREATE TABLE funcionario (
id int auto_increment PRIMARY KEY,
nome varchar(255),
login varchar(255),
senha varchar(255),
tipo enum('admin','usuario'),
status enum('ativo','inativo')
)

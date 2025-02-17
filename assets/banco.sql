CREATE DATABASE sislogin;
use sislogin;

CREATE TABLE funcionario (
id int auto_increment PRIMARY KEY,
nome varchar(255),
login varchar(255),
senha varchar(255),
tipo_funcionario int,
FOREIGN KEY (tipo_funcionario) REFERENCES tipo_funcionario(id),
status enum('ativo','inativo')
);
 
CREATE TABLE tipo_funcionario (
id int auto_increment PRIMARY KEY,
tipo varchar (255)
);

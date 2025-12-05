-- 	BANCO DE DADOS
CREATE DATABASE dbSkulltec;

USE dbSkulltec;

Create table tbFuncionario(
IdUsuario int primary key auto_increment, 
Nome varchar(40) not null, 
Email varchar(40) not null,  
Senha varchar(40) not null 
); 

CREATE TABLE tbCurriculo(
cpf_t bigint(11) primary key,
nome_t varchar(40) not null,
emai_t varchar(40) not null,
sexo_t char(1) not null,
experiencia_t longtext not null,
formacao_t varchar(200) not null
);

select * from tbCurriculo;
select * from tbFuncionario;

insert into tbFuncionario (Nome, Email, Senha) 
values ('admin','admin@gmail.com','1234');
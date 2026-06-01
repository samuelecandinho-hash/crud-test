/* criação do banco de dados */
CREATE DATABASE sistema_simples_m1;

/* usa o sistema criado */
USE sistema_simples_m1;

/* criação da tabela */
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(87) NOT NULL,
    senha VARCHAR(255) NOT NULL
);
/* usuario colocado de forma manual para poder acessar o site para ver se está funcionando o login */
INSERT INTO usuarios (usuario, senha) VALUES ('admin','123');
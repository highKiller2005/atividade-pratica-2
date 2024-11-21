CREATE DATABASE atividade_thiago CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE atividade_thiago;

CREATE TABLE cliente (
  id INT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(255),
  nome VARCHAR(255),
  cpf VARCHAR(11),
  telefone vARCHAR(50)
);

CREATE TABLE funcionario (
  id INT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(255),
  nome VARCHAR(255)
);

CREATE TABLE pedido (
  id INT PRIMARY KEY AUTO_INCREMENT,
  data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status VARCHAR(20),
  urgencia VARCHAR(20),
  descricao TEXT,
  cliente_id INT,
  funcionario_id INT,
  FOREIGN KEY (cliente_id) REFERENCES cliente(id),
  FOREIGN KEY (funcionario_id) REFERENCES funcionario(id)
  ON DELETE SET NULL
  ON UPDATE CASCADE
);


-- Cria o banco com nome correto
CREATE DATABASE IF NOT EXISTS educacaofinanceira;

-- Seleciona o banco
USE educacaofinanceira;

-- Remove a tabela antiga se existir
DROP TABLE IF EXISTS usuarios;

-- Cria a tabela corretamente
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  telefone VARCHAR(25),
  data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir um registro de teste
INSERT INTO usuarios (nome, email, senha, telefone)
VALUES (
  'Ana Beatriz Gilarde Portela',
  'anabeatrizprotela897@gmail.com',
  '$2y$10$PZKHAa7kMRa1SJifRVPAr.4LoSjiGq./C3OW6xdAfVjtDXkRfb.ly',
  '213213'
);
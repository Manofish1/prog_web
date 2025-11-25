-- 1. Cria o banco de dados se ele não existir
CREATE DATABASE IF NOT EXISTS biblioteca_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- 2. Seleciona o banco de dados para criar as tabelas
USE biblioteca_db;

-- (Opcional, mas recomendado para garantir que as tabelas sejam recriadas limpas)
DROP TABLE IF EXISTS livros;
DROP TABLE IF EXISTS autores;
DROP TABLE IF EXISTS editoras;


-- 3. Tabela Autores
CREATE TABLE autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

-- 4. Tabela Editoras
CREATE TABLE editoras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

-- 5. Tabela Livros (depende de Editoras e Autores)
-- Contém as chaves estrangeiras com a regra ON DELETE RESTRICT
CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    ano_publicacao YEAR,
    editora_id INT, -- Criação da coluna editora_id
    autor_id INT,   -- Criação da coluna autor_id
    
    -- Chave Estrangeira para Editoras
    FOREIGN KEY (editora_id) REFERENCES editoras(id)
        ON DELETE RESTRICT 
        ON UPDATE CASCADE,
        
    -- Chave Estrangeira para Autores
    FOREIGN KEY (autor_id) REFERENCES autores(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);
🗒️ README – Sistema de Cadastro de Carros (PHP + MySQL)
📘 Descrição

Este projeto é um sistema simples de cadastro, listagem, edição e exclusão de carros desenvolvido em PHP com MySQL.
Ele utiliza a extensão mysqli para conectar-se ao banco de dados e permite o gerenciamento de informações de veículos (modelo e ano).

⚙️ Arquivos do projeto
Arquivo	Função
conexao.php	Responsável por conectar o PHP ao banco de dados MySQL.
index.php	Página principal: exibe o formulário de cadastro e a lista de carros cadastrados.
update.php	Página para editar os dados de um carro já cadastrado.
delete.php	Página para excluir um carro do banco de dados.
🧩 Funcionalidades

Criar tabela carros automaticamente, caso não exista.

Inserir novos carros com modelo e ano.

Exibir todos os carros cadastrados em uma tabela.

Editar informações de um carro existente.

Excluir um carro do banco de dados.

Mostrar o total de carros cadastrados.

🧰 Requisitos

Servidor local com XAMPP, WAMP ou Laragon.

PHP 7.4 ou superior.

MySQL em execução.

🚀 Como usar

Copie todos os arquivos do projeto para a pasta htdocs (no XAMPP).
Exemplo:

C:\xampp\htdocs\cadastro_carros


Inicie o Apache e o MySQL no painel do XAMPP.

Crie o banco de dados executando o SQL abaixo no phpMyAdmin.

Acesse no navegador:

http://localhost/cadastro_carros/index.php

💾 Código SQL para criação do banco e tabela
-- Criar o banco de dados
CREATE DATABASE IF NOT EXISTS teste_formulario;
USE teste_formulario;

-- Criar a tabela de carros
CREATE TABLE IF NOT EXISTS carros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(255) NOT NULL,
    ano INT NOT NULL
);

💡 Observações

As credenciais padrão do MySQL (usadas em conexao.php) são:

$servername = "localhost";
$username = "root";
$password = "Senai@118";
$dbname = "teste_formulario";


Se a senha ou nome do banco for diferente, altere no arquivo conexao.php.

O sistema cria automaticamente a tabela carros se ela não existir, mas você pode executar o SQL acima manualmente para garantir.

👨‍💻 Autor

Desenvolvido por Pedro de Oliveira

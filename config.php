<?php
// Define as informações de conexão com o banco de dados
define("DB_HOST", "localhost");
define("DB_NAME", "registros");
define("DB_USER", "phpmyadmin");
define("DB_PASS", "H3C#w]E;b/`5Q3Pq");

// Tenta criar uma conexão com o banco de dados utilizando PDO
try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8mb4", DB_USER, DB_PASS);
    // Configura o PDO para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Desabilita o modo emulador de prepared statements do PDO
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch(PDOException $e) {
    // Se ocorrer um erro na conexão com o banco de dados, exibe a mensagem de erro
    die("Erro ao conectar com o banco de dados: " . $e->getMessage());
}

// Define uma constante para o caminho absoluto da aplicação
define("ROOT_PATH", __DIR__);



// aqui foi editado por lucas 
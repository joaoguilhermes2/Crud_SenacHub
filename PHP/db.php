<?php
$host = 'localhost';
$db = 'crud_senac2';
$user = 'root';
$pass = '';

// Bloco try-catch para tentar conectar ao banco de dados.
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass); // Cria uma nova instância de PDO para a conexão com o MySQL.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura o PDO para lançar exceções em caso de erro.
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage()); // Caso ocorra um erro, exibe a mensagem de erro e encerra o script.
}
?>
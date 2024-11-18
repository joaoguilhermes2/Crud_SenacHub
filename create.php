<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['name' => $name, 'email' => $email]);
        echo "Usuário adicionado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao adicionar usuário: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
</head>
<body>
    <h1>Criar Usuário</h1>
    <form action="create.php" method="POST">
        <label for="name">Nome:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit">Salvar</button>
        <a href="read.php">Voltar</a>
    </form>
</body>
</html>
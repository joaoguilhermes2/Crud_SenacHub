<?php
require 'db.php';

$id = $_GET['id']; // Obtém o ID do usuário da URL.
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]); // Executa a consulta, passando o ID como parâmetro.
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Se o formulário foi enviado, atualiza os dados do usuário.
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['name' => $name, 'email' => $email, 'id' => $id]); // Executa a atualização no banco de dados.
        echo "Usuário atualizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao atualizar usuário: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form action="update.php?id=<?php echo $user['id']; ?>" method="POST">
        <label for="name">Nome:</label><br>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>

        <button type="submit">Salvar Alterações</button>
        <a href="read.php">Voltar</a>
    </form>
</body>
</html>

<?php
require 'db.php';

// Verifique se o ID foi passado na URL
if (!isset($_GET['id'])) {
    die("ID não fornecido.");
}

$id = $_GET['id'];

// Busca os dados do usuário com base no ID
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC); // Recupera os dados obtidos

if (!$user) {
    die("Usuário não encontrado."); // Se o usuário não for encontrado, encerra o script.
}

// Se o método for POST, tente excluir o usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute(['id' => $id]);
        echo "Usuário excluído com sucesso!";
        echo "<a href='read.php'>Voltar para lista de usuários</a>";
        exit;
    } catch (PDOException $e) {
        echo "Erro ao excluir usuário: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Usuário</title>
</head>
<body>
    <h1>Excluir Usuário</h1>
    <p>Tem certeza que deseja excluir o usuário <strong><?php echo htmlspecialchars($user['name']); ?></strong>?</p>
    <form action="delete.php?id=<?php echo $user['id']; ?>" method="POST">
        <button type="submit">Sim, excluir</button>
        <a href="read.php">Cancelar</a>
    </form>
</body>
</html>
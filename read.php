<?php
require 'db.php';

$sql = "SELECT * FROM users";
$stmt = $pdo->query($sql);

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <?php echo $user['name']; ?> (<?php echo $user['email']; ?>)
                <a href="update.php?id=<?php echo $user['id']; ?>">Editar</a>
                <a href="delete.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Tem certeza?');">Excluir</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
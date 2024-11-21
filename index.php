<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            width: 100%;
            padding: 1rem 0;
            text-align: center;
        }

        h1 {
            margin: 0;
        }

        nav {
            margin: 2rem 0;
        }

        nav a {
            display: inline-block;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            margin: 0.5rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #45a049;
        }

        footer {
            margin-top: auto;
            background-color: #4CAF50;
            color: white;
            width: 100%;
            text-align: center;
            padding: 1rem 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bem-vindo ao CRUD</h1>
    </header>
    <nav>
        <a href="create.php">Criar Novo Usuário</a>
        <a href="read.php">Listar Usuários</a>
        <a href="update.php">Atualizar Usuários</a>
        <a href="delete.php">Deletar Usuários</a>
    </nav>
    <footer>
        Desenvolvido por João Guilherme &copy; 2024 <!-- &copy Habilita o icone de copyright -->
    </footer>
</body>
</html>
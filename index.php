<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Inicial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .menu {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #2c3e50;
        }

        .menu-container {
            text-align: center;
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .menu-container a {
            display: block;
            margin: 10px 0;
            padding: 10px 20px;
            background: #2980b9;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .menu-container a:hover {
            background: #3498db;
        }
    </style>
</head>
<body>
    <div class="menu">
        <div class="menu-container">
            <h1>Menu Inicial</h1>
            <a href="cadastro_disciplina.php">Cadastro de Disciplina</a>
            <a href="cadastro_professor.php">Cadastro de Professor</a>
            <a href="visualizatudo.php">Horários</a>
        </div>
    </div>
</body>
</html>

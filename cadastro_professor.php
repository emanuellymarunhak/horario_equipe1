<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Professores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .form-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #333333;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #2980b9;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #3498db;
        }

        .success, .error {
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .success {
            background: #2ecc71;
            color: #ffffff;
        }

        .error {
            background: #e74c3c;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Cadastro de Professores</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Dados do formulário
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            // Validações simples
            if (empty($nome) || empty($email) || empty($senha)) {
                echo "<div class='error'>Todos os campos são obrigatórios.</div>";
            } else {
                try {
                    // Configuração do banco de dados
                    $dsn = "mysql:host=localhost;dbname=sesi;charset=utf8";
                    $usuario = "root";
                    $senha_db = "";

                    // Conexão ao banco
                    $pdo = new PDO($dsn, $usuario, $senha_db);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Inserir no banco
                    $sql = "INSERT INTO professores (nome, email, senha) VALUES (:nome, :email, :senha)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':nome' => $nome,
                        ':email' => $email,
                        ':senha' => password_hash($senha, PASSWORD_DEFAULT), // Hash da senha
                    ]);

                    echo "<div class='success'>Professor cadastrado com sucesso!</div>";
                } catch (PDOException $e) {
                    echo "<div class='error'>Erro ao cadastrar professor: " . htmlspecialchars($e->getMessage()) . "</div>";
                }
            }
        }
        ?>
        <form method="POST" action="">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite o e-mail" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" placeholder="Digite a senha" required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>

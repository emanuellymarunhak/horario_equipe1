<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Disciplinas</title>
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

        form input, form select {
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
        <h1>Cadastro de Disciplinas</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Dados do formulário
            $nome = $_POST['nome'] ?? '';
            $professor_id = $_POST['professor'] ?? '';

            // Validações simples
            if (empty($nome) || empty($professor_id)) {
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
                    $sql = "INSERT INTO disciplinas (nome, descricao) VALUES (:nome, :professor_id)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':nome' => $nome,
                        ':professor_id' => $professor_id,
                    ]);

                    echo "<div class='success'>Disciplina cadastrada com sucesso!</div>";
                } catch (PDOException $e) {
                    echo "<div class='error'>Erro ao cadastrar disciplina: " . htmlspecialchars($e->getMessage()) . "</div>";
                }
            }
        }
        ?>
        <form method="POST" action="">
            <label for="nome">Nome da Disciplina:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome da disciplina" required>

            <label for="professor">Selecione o Professor:</label>
            <select id="professor" name="professor" required>
                <option value="">-- Escolha um Professor --</option>
                <?php
                try {
                    // Configuração do banco de dados
                    $dsn = "mysql:host=localhost;dbname=sesi;charset=utf8";
                    $usuario = "root";
                    $senha_db = "";

                    // Conexão ao banco
                    $pdo = new PDO($dsn, $usuario, $senha_db);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Consulta para listar professores
                    $sql = "SELECT id, nome FROM professores ORDER BY nome";
                    $stmt = $pdo->query($sql);

                    // Popular o select com professores
                    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$linha['id']}'>{$linha['nome']}</option>";
                    }
                } catch (PDOException $e) {
                    echo "<option value=''>Erro ao carregar professores</option>";
                }
                ?>
            </select>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>

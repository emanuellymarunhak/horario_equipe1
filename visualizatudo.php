<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Horários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 800px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background: #2980b9;
            color: #ffffff;
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
    <div class="container">
        <h1>Cadastro de Horários</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Dados do formulário
            $id_professor = $_POST['id_professor'] ?? '';
            $id_turma = $_POST['id_turma'] ?? '';
            $inicio_horario = $_POST['inicio_horario'] ?? '';
            $fim_horario = $_POST['fim_horario'] ?? '';

            // Validações simples
            if (empty($id_professor) || empty($id_turma) || empty($inicio_horario) || empty($fim_horario)) {
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
                    $sql = "INSERT INTO horarios (id_professor, id_turma, inicio_horario, fim_horario)
                            VALUES (:id_professor, :id_turma, :inicio_horario, :fim_horario)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':id_professor' => $id_professor,
                        ':id_turma' => $id_turma,
                        ':inicio_horario' => $inicio_horario,
                        ':fim_horario' => $fim_horario,
                    ]);

                    echo "<div class='success'>Horário cadastrado com sucesso!</div>";
                } catch (PDOException $e) {
                    echo "<div class='error'>Erro ao cadastrar horário: " . htmlspecialchars($e->getMessage()) . "</div>";
                }
            }
        }
        ?>

        <!-- Formulário de Cadastro -->
        <form method="POST" action="">
            <label for="id_professor">Professor:</label>
            <select id="id_professor" name="id_professor" required>
                <option value="">-- Escolha um Professor --</option>
                <?php
                try {
                    $pdo = new PDO("mysql:host=localhost;dbname=sesi;charset=utf8", "root", "");
                    $stmt = $pdo->query("SELECT id, nome FROM professores ORDER BY nome");
                    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$linha['id']}'>{$linha['nome']}</option>";
                    }
                } catch (PDOException $e) {
                    echo "<option value=''>Erro ao carregar professores</option>";
                }
                ?>
            </select>

            <label for="id_turma">Turma:</label>
            <select id="id_turma" name="id_turma" required>
                <option value="">-- Escolha uma Turma --</option>
                <?php
                try {
                    $stmt = $pdo->query("SELECT id, nome FROM disciplinas ORDER BY nome");
                    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$linha['id']}'>{$linha['nome']}</option>";
                    }
                } catch (PDOException $e) {
                    echo "<option value=''>Erro ao carregar turmas</option>";
                }
                ?>
            </select>

            <label for="inicio_horario">Início do Horário:</label>
            <input type="time" id="inicio_horario" name="inicio_horario" required>

            <label for="fim_horario">Fim do Horário:</label>
            <input type="time" id="fim_horario" name="fim_horario" required>

            <button type="submit">Cadastrar</button>
        </form>

        <!-- Exibição dos Resultados -->
        <h2>Horários Cadastrados</h2>
        <table>
            <thead>
                <tr>
                    <th>Professor</th>
                    <th>Turma</th>
                    <th>Início</th>
                    <th>Fim</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    $sql = "SELECT 
                                h.inicio_horario, 
                                h.fim_horario, 
                                p.nome AS professor, 
                                t.nome AS disciplinas
                            FROM horarios h
                            INNER JOIN professores p ON h.id_professor = p.id
                            INNER JOIN disciplinas t ON h.id_turma = t.id";
                    $stmt = $pdo->query($sql);
                    while ($linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>
                                <td>{$linha['professor']}</td>
                                <td>{$linha['turma']}</td>
                                <td>{$linha['inicio_horario']}</td>
                                <td>{$linha['fim_horario']}</td>
                            </tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='4'>Erro ao carregar horários: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

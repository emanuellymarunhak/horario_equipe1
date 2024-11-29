<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro de Disciplina</title>
</head>
<body>

    <div class="container">
        <h2>Cadastro de Disciplina</h2>
        <form action="processar_disciplina.php" method="POST">
            <div class="form-group">
                <label for="nome_disciplina">Nome da Disciplina:</label>
                <input type="text" id="nome_disciplina" name="nome_disciplina" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="professores">Selecione os Professores:</label>
                <?php
                    echo '<select name="professores[]" id="professores">';
                    echo '<option value="">Selecione os Professores</option>';

                    // Preencher o select com os professores
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nome']) . '</option>';
                    }

                    echo '</select>';
                ?>
            </div>

            <input type="submit" value="Cadastrar Disciplina">
        </form>

        <div class="footer">
            <hr>
            <a href="cadastro_professor.html">Cadastrar Novo Professor</a>
        </div>
    </div>

</body>
</html>

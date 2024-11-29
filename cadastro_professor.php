<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Cadastro de Professor</title>
</head>
<body>

    <div class="container">
        <h2>Cadastro de Professor</h2>
        <form action="processar_professor.php" method="POST">
            <div class="form-group">
                <label for="nome_professor">Nome do Professor:</label>
                <input type="text" id="nome_professor" name="nome_professor" required>
            </div>

            <div class="form-group">
                <label for="email_professor">Email do Professor:</label>
                <input type="email" id="email_professor" name="email_professor" required>
            </div>

            <div class="form-group">
                <label for="senha_professor">Senha:</label>
                <input type="text" id="senha_professor" name="senha_professor" required>
            </div>

            <input type="submit" value="Cadastrar Professor">
        </form>

        <div class="footer">
            <hr>
            <a href="cadastro_disciplina.html">Cadastrar Nova Disciplina</a>
        </div>
    </div>

</body>
</html>
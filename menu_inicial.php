<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Disciplina</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: left;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Cadastro de Disciplina</h2>
        <form action="cadastro_disciplina_submit.php" method="POST">
            <label for="nome">Nome da Disciplina:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="codigo">Código da Disciplina:</label>
            <input type="text" id="codigo" name="codigo" required>

            <label for="carga">Carga Horária (em horas):</label>
            <input type="number" id="carga" name="carga" required>

            <button type="submit">Cadastrar Disciplina</button>
        </form>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Professor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: left;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Cadastro de Professor</h2>
        <form action="cadastro_professor_submit.php" method="POST">
            <label for="nome">Nome do Professor:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>

            <label for="disciplina">Disciplina:</label>
            <select id="disciplina" name="disciplina" required>
                <option value="Matematica">Matemática</option>
                <option value="Portugues">Português</option>
                <option value="Historia">História</option>
                <option value="Geografia">Geografia</option>
                <!-- Adicione mais opções conforme necessário -->
            </select>

            <button type="submit">Cadastrar Professor</button>
        </form>
    </div>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entrada = $_POST['entrada'];
    $saida = $_POST['saida'];

    // Aqui você pode adicionar lógica para salvar os dados em um banco de dados, se necessário
    echo "<p>Cadastro realizado com sucesso!</p>";
    echo "<p>Entrada: " . htmlspecialchars($entrada) . "</p>";
    echo "<p>Saída: " . htmlspecialchars($saida) . "</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Horários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-size: 1rem;
            color: #333;
        }
        input[type="time"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            font-size: 1.2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Horários</h2>
        <form method="POST">
            <div class="form-group">
                <label for="entrada">Hora de Entrada</label>
                <input type="time" id="entrada" name="entrada" required>
            </div>
            <div class="form-group">
                <label for="saida">Hora de Saída</label>
                <input type="time" id="saida" name="saida" required>
            </div>
            <button type="submit">Cadastrar Horário</button>
        </form>
    </div>
</body>
</html>

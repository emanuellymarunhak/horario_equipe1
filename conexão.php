<?php
$host = 'localhost'; // endereço do servidor
$db = 'escola'; // nome do banco de dados
$user = 'root'; // nome de usuário do banco de dados
$pass = ''; // senha do banco de dados

// Criando a conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtendo os dados do formulário
$nome_disciplina = $_POST['nome_disciplina'];
$descricao = $_POST['descricao'];
$professores = $_POST['professores']; // array com os IDs dos professores selecionados

// Inserindo a disciplina no banco de dados
$sql = "INSERT INTO disciplinas (nome, descricao) VALUES ('$nome_disciplina', '$descricao')";

if ($conn->query($sql) === TRUE) {
    // Obtendo o ID da nova disciplina
    $disciplina_id = $conn->insert_id;

    // Associando os professores à disciplina
    foreach ($professores as $professor_id) {
        $sql_assoc = "INSERT INTO professores_disciplinas (professor_id, disciplina_id) VALUES ('$professor_id', '$disciplina_id')";
        $conn->query($sql_assoc);
    }

    echo "Disciplina cadastrada com sucesso!";
} else {
    echo "Erro ao cadastrar disciplina: " . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
<?php
$host = 'localhost'; // endereço do servidor
$db = 'escola'; // nome do banco de dados
$user = 'root'; // nome de usuário do banco de dados
$pass = ''; // senha do banco de dados

// Criando a conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtendo os dados do formulário
$nome_professor = $_POST['nome_professor'];
$email_professor = $_POST['email_professor'];
$telefone_professor = $_POST['telefone_professor'];
$disciplinas = $_POST['disciplinas']; // array com os IDs das disciplinas selecionadas

// Inserindo o professor no banco de dados
$sql = "INSERT INTO professores (nome, email, telefone) VALUES ('$nome_professor', '$email_professor', '$telefone_professor')";

if ($conn->query($sql) === TRUE) {
    // Obtendo o ID do novo professor
    $professor_id = $conn->insert_id;

    // Associando o professor às disciplinas
    foreach ($disciplinas as $disciplina_id) {
        $sql_assoc = "INSERT INTO professores_disciplinas (professor_id, disciplina_id) VALUES ('$professor_id', '$disciplina_id')";
        $conn->query($sql_assoc);
    }

    echo "Professor cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar professor: " . $conn->error;
}

// Fechando a conexão
$conn->close();
?>
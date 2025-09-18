<?php // Incluido o arquivo de conexão com o bd
include("../conexao/conexao.php");

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? '');
    $data_nascimento = $_POST["data_nascimento"] ?? '';
    $id_turma = $_POST["id_turma"] ?? '';
    $id_disciplina = $_POST["id_disciplina"] ?? '';
    $id_situação = $_POST["id_situacao"] ?? '';

    if (empty($nome) || empty($data_nascimento) || empty(id_turma) || empty(id_disciplina) || empty(id_situacao)) {
        $mensagem = "Todos os campos são obrigatório.";
    } else {
        $sql = "INSERT INTO alunos (nome, data_nascimento, id_turma, id_disciplina, id_situacao) VALUES (?, ?, ?, ?, ?)";
        $inserindo = $conn->prepare($sql);
        $inserindo->bind_param("ssiii", $nome, $data_nascimento, $id_turma, $id_disciplina, $id_situação);

        if ($inserindo->execute()) {
            $mensagem = "Aluno adicionado com sucesso!";
        } else {
            $mensagem = "Erro ao adicionar aluno.";
        }

        $inserindo->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Aluno</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h1>Adicionar Aluno</h1>

    <?php if (!empty($mensagem)) : ?>
        <p><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <form action="adicionar.php" method="POST">
        <label for="nome">Nome do aluno:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="data_nascimento">Data de nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required><br><br>

        <label for="id_turma">Turma:</label>
        <input type="text" id="id_turma" name="id_turma" required><br><br>

        <label for="id_disciplina">Disciplina:</label>
        <input type="text" id="id_disciplina" name="id_disciplina" required><br><br>

        <label for="id_situacao">Situação:</label>
        <input type="text" id="id_situacao" name="id_situacao" required><br><br>

        <button type="submit">Adicionar</button>
    </form>

    <br>
    <a href="../public/index.php">Voltar</a>
</body>
</html>


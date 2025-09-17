<?php
include("../conexao/conexao.php");

$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? '');

    if (empty($nome)) {
        $mensagem = "O nome da disciplina é obrigatório.";
    } else {
        $sql = "INSERT INTO disciplinas (nome) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nome);

        if ($stmt->execute()) {
            $mensagem = "Disciplina adicionada com sucesso!";
        } else {
            $mensagem = "Erro ao adicionar disciplina.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Disciplina</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h1>Adicionar Disciplina</h1>

    <?php if (!empty($mensagem)) : ?>
        <p><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <form action="adicionar.php" method="POST">
        <label for="nome">Nome da disciplina:</label>
        <input type="text" id="nome" name="nome" required>
        <button type="submit">Adicionar</button>
    </form>

    <br>
    <a href="../public/index.php">Voltar</a>
</body>
</html>

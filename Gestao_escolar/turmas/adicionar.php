<?php
include("../conexao/conexao.php");

$mensagem = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"] ?? '');

    if (empty($nome)) {
        $mensagem = "O nome da turma é obrigatório.";
    } else {
        $sql = "INSERT INTO turmas (nome) VALUES (?)";
        $inserindo = $conn->prepare($sql);
        $inserindo->bind_param("s", $nome);

        if ($inserindo->execute()) {
            $mensagem = "Turma adicionada com sucesso!";
        } else {
            $mensagem = "Erro ao adicionar Turma.";
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
    <title>Adicionar Turma</title>
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body>
    <h1>Adicionar Turma</h1>

    <?php if (!empty($mensagem)) : ?>
        <p><?= htmlspecialchars($mensagem) ?></p>
    <?php endif; ?>

    <form action="adicionar.php" method="POST">
        <label for="nome">Nome da Turma:</label>
        <input type="text" id="nome" name="nome" required>
        <button type="submit">Adicionar</button>
    </form>

    <br>
    <a href="../public/index.php">Voltar</a>
    
</body>
</html>

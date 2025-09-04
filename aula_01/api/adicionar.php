<?php
/**
 * Define que a resposta do servidor será enviada no formato JSON,
 * para que o JavaScript saiba interpretar os dados.
 */
header("Content-Type: application/json");

/**
 * Inclui o arquivo de conexão com o banco de dados,
 * que contém as credenciais e a configuração do objeto $conn.
 */
include("../conxa0/conexao.php");

/**
 * Lê o corpo da requisição HTTP (enviado via fect no JavaScript)
 * e converte de JSON para array associativo em PHP.
 */
$dados = json_decode(file_get_contents("php://input"), true);

/**
 * Extrai o campo "titulo" do array recebido e aplica uma
 * proteção contra SQL Injection, escapando caracteres perigosos.
 */
$titulo = $conn->real_escape_string($dados["titulo"]);

// Monta o comando SQL para inserir o novo título na tabela tarefas.
$sql = "INSERT INTO tarefas (titulo) VALUES ('$titulo')";
// Execulta o comando SQL no banco de dados.
$conn->query($sql);

/**
 * Retorna para o JavaScript um JSON com as dados da
 * tarefa recém-criada: o ID gerado automaticamente (insert_id),
 * o titulo salvo e o status "concluida", inicialmente 0 (falso).
 */
echo json_encode(["id" => $conn->insert_id, "titulo" => $titulo, "concluida" => 0]);
?>
<?php
header("Content-Type: application/json");
include("../conexao/conexao.php");

$dados = json_decode(file_get_contents("php://input"), true);

$sql = "INSERT INTO alunos (nome, idade, turma ";
$conn->query($sql);

echo json_encode(["status" => "ok"]);
?>
 
<?php
header("Content_Type: application/json");
ibclude("../conexao/cobexao.php");

$dados = json_decode(file_get_contents("php://input"), true);

/**
 * Extrai os valores id e concluida do array e força a conversão para inteiros,
 * evitando inserção de valores invalidos ou maliciosos.
 */
$id = (int)$dados["id"];
$concluida = (int)$dados["concluida"];

/**
 * Monta a instrução SQL que atualiza a coluna concluída na tabela tarefas
 * para o registro cujo id corresponde ao informado.
 */
$sql = "UPDATE tarefas SET concluida = $concluida WHERE id = $id";
$conn->query($sql);

//Retorna uma resposta JSON ao cliente indicando que a operação foi concluida com sucesso.
echo json_encode(["status" => "ok"]);
?>
<?php
// Configurações de conexão
$host = "localhost";    //Servidor de banco
$user = "root";         //Usuário (padrão do Xampp)
$pass = "";             // Senha (vazia no xampp por padrão)
$db = "tarefas_db";     // Nome do banco

// Cria a conexão
$conn = new mysqli($host, $user, $pass, $db);

// Verificar se ocorreu algum erro
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

<?php
$servername = "localhost"; // Nome do servidor, geralmente 'localhost'
$username = "root";        // Nome de usuário do MySQL
$password = "";            // Senha do MySQL
$dbname = "millenium_db";  // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meu_banco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["erro" => "Conexão falhou: " . $conn->connect_error]));
}

$idade = isset($_GET['idade']) ? (int)$_GET['idade'] : '';

$sql = "SELECT nome, cpf, data_nascimento, idade, peso, email FROM usuarios";
if (!empty($idade)) {
    $sql .= " WHERE idade = " . $idade;
}

$result = $conn->query($sql);

$usuarios = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($usuarios, JSON_UNESCAPED_UNICODE);
$conn->close();
?>

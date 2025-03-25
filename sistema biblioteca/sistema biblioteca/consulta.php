<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meu_banco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$idade = isset($_GET['idade']) ? (int)$_GET['idade'] : '';
$cidade = isset($_GET['cidade']) ? $_GET['cidade'] : '';

$sql = "SELECT nome, cpf, data_nascimento, idade, peso, email, cidade FROM usuarios WHERE 1";
if (!empty($idade)) {
    $sql .= " AND idade = " . $idade;
}
if (!empty($cidade)) {
    $sql .= " AND cidade LIKE '%" . $conn->real_escape_string($cidade) . "%'";
}
$result = $conn->query($sql);

$usuarios = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($usuarios);
$conn->close();
?>

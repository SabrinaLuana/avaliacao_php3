<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meu_banco";  // Nome do banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obter os dados do formulário
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$dataNascimento = $_POST['dataNascimento'];
$idade = $_POST['idade'];
$peso = $_POST['peso'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);  // Senha criptografada

// Inserir dados no banco
$sql = "INSERT INTO usuarios (nome, cpf, data_nascimento, idade, peso, email, senha)
VALUES ('$nome', '$cpf', '$dataNascimento', '$idade', '$peso', '$email', '$senha')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro salvo com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

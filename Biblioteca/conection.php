<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblioteca";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$datapublicaçao = $_POST['datapublicaçao'];
$datachegada = $_POST['datachegada'];
$genero = $_POST['genero'];
$sinopse = $_POST['sinopse'];


$sql = "INSERT INTO livros (titulo, autor, data_publicacao, data_chegada, genero, sinopse)
VALUES ('$titulo', '$autor', '$datapublicaçao', '$datachegada', '$genero', '$sinopse')";

if ($conn->query($sql) === TRUE) {
    echo "Cadastro salvo com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>
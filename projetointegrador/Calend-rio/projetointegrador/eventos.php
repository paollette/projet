<?php
$servername = "localhost";
$username = "paolla";
$password = "123456";
$dbname = "calendario_db";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Adicionar evento
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adicionar'])) {
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO eventos (titulo, data, descricao) VALUES ('$titulo', '$data', '$descricao')";
    if ($conn->query($sql) === TRUE) {
        echo "Evento adicionado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Alterar evento
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['alterar'])) {
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE eventos SET titulo='$titulo', data='$data', descricao='$descricao' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Evento alterado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

// Deletar evento
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deletar'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM eventos WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Evento deletado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

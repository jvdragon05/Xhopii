<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xhopii";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "UPDATE `clientes` SET `senha`='$senha' WHERE `email` LIKE '$email'";


if ($conn->query($sql) === TRUE) {
    header("location: index.html");
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}


$conn->close();
?>
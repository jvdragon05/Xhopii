<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xhopii";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
$cad = $_POST["cad"];

if($cad == "cad_cli"){
    $nome = $_POST["nome"];
    $sobre = $_POST["sobrenome"];
    $data = $_POST["data"];
    $cpf = $_POST["CPF"];
    $tel = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO clientes (`nome`, `sobrenome`, `cpf`, `datanasc`, `telefone`, `email`, `senha`) VALUES ('$nome', '$sobre', '$cpf', '$data', '$tel', '$email', '$senha')";


if ($conn->query($sql) === TRUE) {
    header("location: index.html");
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}
}elseif($cad == "cad_prod"){
    $nome = $_POST["nome"];
    $fabricante = $_POST["fabricante"];
    $preco = $_POST["preco"];
    $descricao = $_POST["desc"];
    $qtd = $_POST["quantidade"];

    $sql = "INSERT INTO produtos (`nome_prod`, `preco`, `fabricante`, `descricao`, `quantidade`) VALUES ('$nome', '$preco', '$fabricante', '$descricao', '$qtd')";


if ($conn->query($sql) === TRUE) {
    header("location: index.html");
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}
}elseif($cad == "cad_func"){
    $nome = $_POST["nome"];
    $sobre = $_POST["sobre"];
    $data = $_POST["data"];
    $cpf = $_POST["cpf"];
    $tel = $_POST["telefone"];
    $cargo = $_POST["cargo"];
    $salario = $_POST["sal"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "INSERT INTO funcionarios (`nome`, `sobrenome`, `cpf`, `datanasc`, `telefone`, `cargo`, `salario`, `email`, `senha`) VALUES ('$nome', '$sobre', '$cpf', '$data', '$tel', '$cargo', '$salario', '$email', '$senha')";


if ($conn->query($sql) === TRUE) {
    header("location: index.html");
} else {
    echo "Erro ao inserir registro: " . $conn->error;
}
}
$conn->close();
?>
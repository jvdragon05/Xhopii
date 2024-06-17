<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xhopii";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}


function lerImagem($caminhoImagem) {
    return file_get_contents($caminhoImagem);
}


if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $imagemCaminho = $_FILES['imagem']['tmp_name'];
    $imagemBinaria = lerImagem($imagemCaminho);
} else {
    die("Erro ao enviar a imagem.");
}

    $nome = $_POST["nome"];
    $sobre = $_POST["sobre"];
    $data = $_POST["data"];
    $cpf = $_POST["cpf"];
    $tel = $_POST["telefone"];
    $cargo = $_POST["cargo"];
    $salario = $_POST["sal"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $insere = "INSERT INTO `usuarios`(`nome`, `sobrenome`, `cpf`, `dataNasc`, `telefone`, `cargo`, `salario`, `email`, `senha`, `foto`, `tipoUsuario`) VALUES ('$nome', '$sobre', '$cpf', '$data', '$tel', '$cargo', '$salario', '$email', '$senha', '$imagemBinaria', 'cliente')";



if ($conn->query($insere) == TRUE) {
    header("location: ../");
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}



$conn->close();
?>

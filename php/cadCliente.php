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


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

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
    $email = $_POST["email"];
    $senha = $_POST["senha"];


    $stmt = $conn->prepare("INSERT INTO usuarios (nome, sobrenome, cpf, dataNasc, telefone, email, senha, foto, tipoUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'cliente')");
    $stmt->bind_param("ssssssds", $nome, $sobre, $cpf, $data, $tel, $email, $senha, $imagemBinaria);


    if ($stmt->execute()) {
        header("Location: ../");
        exit();
    } else {
        echo "Erro ao inserir registro: " . $stmt->error;
    }


    $stmt->close();
}

$conn->close();
?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xhopii";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Função para ler a imagem
function lerImagem($caminhoImagem) {
    return file_get_contents($caminhoImagem);
}

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se a imagem foi enviada
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagemCaminho = $_FILES['imagem']['tmp_name'];
        $imagemBinaria = lerImagem($imagemCaminho);
    } else {
        die("Erro ao enviar a imagem.");
    }

    // Capturar os dados do formulário
    $nome = $_POST["nome"];
    $sobre = $_POST["sobre"];
    $data = $_POST["data"];
    $cpf = $_POST["cpf"];
    $tel = $_POST["telefone"];
    $cargo = $_POST["cargo"];
    $salario = $_POST["sal"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Prepara a consulta SQL
    $stmt = $conn->prepare("INSERT INTO usuarios (nome, sobrenome, cpf, dataNasc, telefone, cargo, salario, email, senha, foto, tipoUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'funcionario')");
    $stmt->bind_param("ssssssdsss", $nome, $sobre, $cpf, $data, $tel, $cargo, $salario, $email, $senha, $imagemBinaria);

    // Inserir o registro no banco de dados
    if ($stmt->execute()) {
        header("Location: ../");
        exit();
    } else {
        echo "Erro ao inserir registro: " . $stmt->error;
    }

    // Fechar a conexão
    $stmt->close();
}

$conn->close();
?>

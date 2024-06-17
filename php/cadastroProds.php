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

// Verificar se a imagem foi enviada
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $imagemCaminho = $_FILES['imagem']['tmp_name'];
    $imagemBinaria = lerImagem($imagemCaminho);
} else {
    die("Erro ao enviar a imagem.");
}

$nome = $_POST["nome"];
$fabricante = $_POST["fabricante"];
$preco = $_POST["preco"];
$descricao = $_POST["desc"];
$qtd = $_POST["quantidade"];

// Prepara a consulta SQL
$stmt = $conn->prepare("INSERT INTO produtos (nome_prod, preco, fabricante, descricao, quantidade, imagem) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sdssis", $nome, $preco, $fabricante, $descricao, $qtd, $imagemBinaria);

// Inserir o registro no banco de dados
if ($stmt->execute()) {
    header("Location: ../");
} else {
    echo "Erro ao inserir registro: " . $stmt->error;
}

// Fechar a conexão
$stmt->close();
$conn->close();
?>

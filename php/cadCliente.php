<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "xhopii";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Função para ler imagem e retornar dados binários
function lerImagem($caminhoImagem) {
    return file_get_contents($caminhoImagem);
}

// Verificar se é um POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verificar se o arquivo de imagem foi enviado corretamente
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
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Preparar a declaração SQL para inserir os dados na tabela 'usuarios'
    $stmt = $conn->prepare("INSERT INTO clientes (nome, sobrenome, cpf, dataNasc, telefone, email, senha, foto, tipoUsuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'cliente')");

    // Verificar se a preparação da query foi bem-sucedida
    if (!$stmt) {
        die('Erro na preparação da query SQL: ' . $conn->error);
    }

    // Bind dos parâmetros à query SQL
    $stmt->bind_param("ssssssss", $nome, $sobre, $cpf, $data, $tel, $email, $senha, $imagemBinaria);

    // Executar a query SQL
    if ($stmt->execute()) {
        // Redirecionar após inserção bem-sucedida
        header("Location: ../");
        exit(); // Terminar o script após redirecionamento
    } else {
        echo "Erro ao inserir registro: " . $stmt->error;
    }

    // Fechar a declaração preparada
    $stmt->close();
}

// Fechar a conexão com o banco de dados
$conn->close();
?>

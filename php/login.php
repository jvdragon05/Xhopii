<?php 
if(isset($_POST["login"]) && isset($_POST["senha"])){
    $conexao = new mysqli("localhost", "root", "", "xhopii");

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $busca = $conexao->prepare("SELECT `email`, `senha` FROM `usuarios` WHERE `email` = ? AND `senha` = ?");
    $busca->bind_param("ss", $login, $senha);

    $busca->execute();
    $resul = $busca->get_result();

    if ($resul->num_rows > 0) {
        $row = $resul->fetch_assoc();

        session_start();

        $_SESSION["usuario"] = $row["login"];
        $_SESSION["senha"] = $row["senha"];

        header("location:../");
    }else{
        header("location:../login.html");
    }

    $conexao->close();
}else{
    header("location:../");
}
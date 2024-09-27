<?php
require_once 'app/models/Usuario.php';

class LoginController {
    public function loginForm() {
        require 'app/views/login/form.php';
    }

    public function login() {
        $email = $_POST['login'];
        $senha = $_POST['senha'];

        $usuario = Usuario::login($email, $senha);

        if ($usuario) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            header('Location: /');
        } else {
            echo "Usuário ou senha inválidos.";
        }
    }
}
?>

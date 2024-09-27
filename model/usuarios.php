<?php
require_once '../controller/banco.php';

class Usuario {
    public static function login($email, $senha) {
        $conn = dbConnect();
        $query = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $email, $senha);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>

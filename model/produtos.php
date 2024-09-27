<?php
require_once '../controller/banco.php';

class Produto {
    public static function find($id) {
        $conn = dbConnect();
        $query = "SELECT id, nome_prod, preco, fabricante, descricao, quantidade, imagem FROM produtos WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>

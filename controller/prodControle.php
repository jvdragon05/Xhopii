<?php
require_once '../model/produtos.php';

class ProdutoController {
    public function show($id) {
        $produto = Produto::find($id);
        if ($produto) {
            require 'app/views/produto/show.php';
        } else {
            echo "Produto não encontrado.";
        }
    }
}
?>

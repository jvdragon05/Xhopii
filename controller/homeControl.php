<?php

class HomeController {
    public function index() {
        // Incluir o modelo de Produto
        require_once '../model/produtos.php';
        $produtoModel = new ProdutoModel();

        // Obter os produtos
        $produtos = $produtoModel->getProdutos();

        // Incluir a view com os produtos
        require_once 'app/views/home/index.php';
    }
}

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $produto['nome_prod'] ?></title>
    <link rel="stylesheet" href="/css/produto.css">
</head>
<body>
    <header>
        <!-- Cabeçalho aqui -->
    </header>
    <main>
        <section class="corpo">
            <div class="conteudo">
                <img src="data:image/jpeg;base64,<?= base64_encode($produto['imagem']) ?>" alt="Imagem do Produto" class="produto-princ">
                <div class="desc">
                    <h2 class="titulo"><?= $produto['nome_prod'] ?></h2>
                    <p class="preco">Preço: R$<?= $produto['preco'] ?></p>
                    <p class="estoque"><?= $produto['quantidade'] ?> Peça(s) Disponíveis</p>
                    <div class="compra">
                        <form action="/comprar" method="POST">
                            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                            <input type="submit" value="Comprar Agora" class="btn-buy">
                        </form>
                        <form action="/addCarrinho" method="POST">
                            <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                            <input type="submit" value="Adicionar ao Carrinho" class="btn-buy">
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <!-- Rodapé aqui -->
    </footer>
</body>
</html>

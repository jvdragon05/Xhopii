<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xhopii - Home</title>
    <link rel="icon" href="icones/favicon.ico">
    <link rel="stylesheet" href="css/produto.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <header>
        <section class="head_1">
            <section class="logo">
                <img src="img/logo.png" class="logotipo">
                <h2>Xhopii</h2>
            </section>
            <section class="sair">
                <a href="index.html">Sair</a>
            </section>
        </section>
        <section class="head_2">
            <a href="index.php">Home</a>
            <a href="cadcliente.html">Cadastro de Clientes</a>
            <a href="cadfunc.html">Cadastro de Funcionários</a>
            <a href="cadprod.html">Cadastro de Produtos</a>
            <a href="#">Ver Cliente</a>
            <a href="#">Ver Funcionário</a>
            <a href="visproduto.html">Ver Produtos</a>
        </section>
    </header>
    <main>
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "xhopii";

            $conect = new mysqli($servername, $username, $password, $dbname);

            if ($conect->connect_error) {
                die("Erro: " . $conect->connect_error);
            }
            $id = $_POST['id'];

            $puxar = "SELECT id, nome_prod, preco, fabricante, descricao, quantidade, imagem FROM produtos WHERE `id` LIKE '$id'";
            $resul = $conect->query($puxar);

            if ($resul->num_rows > 0) {
                $row = $resul->fetch_assoc();
            } else {
                echo "Nenhum produto encontrado.";
            }

            $conect->close();
        ?>
        <section class="corpo">
            <div class="conteudo">
                <!--<div class="menu-lado">
                    <img src="img/produto1.png" class="foto-lado">
                    <img src="img/produto2.png" class="foto-lado">
                    <img src="img/produto3.png" class="foto-lado">
                    <img src="img/produto4.png" class="foto-lado">
                    <img src="img/produto5.png" class="foto-lado">
                </div> -->
                <?php echo "<img src='data:image/jpeg;base64," . base64_encode($row['imagem']) . "' alt='Imagem do Produto' class='produto-princ'>";?>
                <div class="desc">
                    <?php echo "<h2 class='titulo'>" . $row['nome_prod'] . "</h2>";?>
                    <?php echo "<p class='preco'>Preço: R$" . $row['preco'] . "</p>";?>
                    <?php echo "<p class='estoque'>" . $row['quantidade'] . " Peça(s) Disponíveis</p>";?>
                    <h4>Modelos:</h4>
                    <!--<div class="btns">
                        <button class="btn-modelo">Preto</button>
                        <button class="btn-modelo">Azul</button>
                        <button class="btn-modelo">Verde</button>
                        <button class="btn-modelo">Cinza</button>
                        <button class="btn-modelo">Rosa</button>
                    </div>
                    <h4>Tamanhos:</h4>
                    <div class="btns">
                        <button class="btn-tam">P</button>
                        <button class="btn-tam">M</button>
                        <button class="btn-tam">G</button>
                        <button class="btn-tam">GG</button>
                    </div>
                    <p>Tamanho Selecionado: P</p> -->
                    <div class="compra">
                        <form action="php/comprar.php" method="POST"><input type="hidden" name="id" value="<?php $row['id'] ?>"> <input type="submit" value="Comprar Agora" class="btn-buy"></form>
                        <form action="php/addCarrinho.php" method="POST"><input type="hidden" name="id" value="<?php $row['id'] ?>"> <input type="submit" value="Adicionar ao Carrinho" class="btn-buy"></form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <section class="fot_top">
            <section class="fot_c">
                <h5>Atendimento ao Cliente</h5>
                <a href="#">Central de Ajuda</a>
                <a href="#">Como Comprar</a>
                <a href="#">Métodos de Pagamento</a>
                <a href="#">Garantia Xhopii</a>
                <a href="#">Devolução e Reembolso</a>
                <a href="#">Fale Conosco</a>
                <a href="#">Ouvidoria</a>
            </section>
            <section class="fot_c">
                <h5>Sobre a Xhopii</h5>
                <a href="#">Sobre Nós</a>
                <a href="#">Políticas Xhopii</a>
                <a href="#">Política de Privacidade</a>
                <a href="#">Programa de Aliados da Xhopii</a>
                <a href="#">Seja um Entregador Xhopii</a>
                <a href="#">Ofertas Relâmpago</a>
                <a href="#">Xhopii Blog</a>
                <a href="#">Empresa</a>
            </section>
            <section class="fot_c">
                <h5>Pagamento</h5>
                <div class="grid">
                    <div class="item"><img src="img/pix.png"></div>
                    <div class="item"><img src="img/boleto.png"></div>
                    <div class="item"><img src="img/amex.png"></div>
                    <div class="item"><img src="img/visa.png"></div>
                    <div class="item"><img src="https://down-br.img.susercontent.com/file/95d849253f75d5e6e6b867af4f7c65aa"></div>
                    <div class="item"><img src="img/hipercard.png"></div>
                    <div class="item"><img src="img/elo.png"></div>
                </div>
            </section>
            <section class="fot_c">
                <h5>Siga-Nos</h5>
                <div class="linha_rede"><a href="#"><img src="img/Instagram.png" class="redes" alt="abc">Instagram</a></div>
                <div class="linha_rede"><a href="#"><img src="img/Twitter.png" class="redes" alt="abc">Twitter</a></div>
                <div class="linha_rede"><a href="#"><img src="img/Facebook.png" class="redes" alt="abc">Facebook</a></div>
                <div class="linha_rede"><a href="#"><img src="img/Youtube.png" class="redes" alt="abc">Youtube</a></div>
                <div class="linha_rede"><a href="#"><img src="img/Linkedin.png" class="redes" alt="abc">Linkedin</a></div>
            </section>
            <section class="fot_c">
                <h5>Atendimento ao Cliente</h5>
                <section class="at_cli">
                    <img src="img/qr-code.png" class="qr">
                    <img src="img/g_play.png" class="lolja">
                    <img src="img/app_store.png" class="lolja">
                </section>
            </section>
        </section>
        <section class="fot_bx"><p>©2024 Xhopii. Todos os direitos acadêmicos reservados</p></section>
    </footer>
</body>
</html>
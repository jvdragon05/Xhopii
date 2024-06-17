<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xhopii - Cadastro de Produtos</title>
    <link rel="icon" href="icones/favicon.ico">
    <link rel="stylesheet" href="css/cadprod.css">
</head>
<body>
<header>
        <section class="head_1">
            <section class="logo">
                <img src="img/logo.png" class="logotipo">
                <h2>Xhopii</h2>
            </section>
            <section class="sair">
                <?php
                    session_start();
                    if (isset($_SESSION["usuario"])) {
                        if ($_SESSION["usuario"] == "") {
                            echo
                            "<a href='login.php' class='sair2'>
                                <button class='sair2'>
                                    Cadastro/Login
                                </button>
                            </a>";
                        } elseif ($_SESSION["usuario"] != "") {
                            echo
                            "<a href='conta.php' class='sair2'>
                                <button class='sair2'>
                                    Conta
                                </button>
                            </a>";
                        }
                    } else {
                        echo
                            "<a href='login.php' class='sair2'>
                                <button class='sair2'>
                                    Cadastro/Login
                                </button>
                            </a>";
                    }
                ?>
            </section>
        </section>

        <section class="head_2">
            <a href="index.php">Home</a>
            <a href="cadcliente.php">Cadastro de Clientes</a>
            <a href="cadfunc.php">Cadastro de Funcionários</a>
            <a href="cadprod.php">Cadastro de Produtos</a>
            <a href="php/clientes.php">Ver Cliente</a>
            <a href="php/funcionarios.php">Ver Funcionário</a>
            <a href="php/visproduto.html">Ver Produtos</a>
        </section>
    </header>
    <main>
        <section class="secform">
            <h1 class="cadprod">Cadastrar Produto</h1>
            <form action="php/cadastroProds.php" class="form" enctype="multipart/form-data" method="post">
                <div class="cad">
                    <input type="text" class="nome" placeholder="Nome" name="nome">
                    <input type="text" class="fabricante" placeholder="Fabricante" name="fabricante">
                    <input type="text" class="desc" placeholder="Descrição" name="desc">
                    <input type="number" class="valor" placeholder="Valor" name="preco">
                    <input type="number" class="quant" placeholder="Quantidade" name="quantidade">
                    <p class="selecfoto">Selecionar foto do produto</p>
                    <input type="file" name="imagem" class="imagem" accept="image/*" required><br>
                    <button class="cadastrar">CADASTRAR</button>
                </div>
            </form>
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
                    <div class="item"><img src="img/mastercard.png"></div>
                    <div class="item"><img src="img/hipercard.png"></div>
                    <div class="item"><img src="img/elo.png"></div>
                </div>
            </section>
            <section class="fot_c">
                <h5>Siga-Nos</h5>
                <div class="linha_rede"><a href="#"><img src="img/Instagram.png" class="redes" alt="abc">Facebook</a></div>
                <div class="linha_rede"><img src="img/Twitter.png" class="redes" alt="abc">Instagram</div>
                <div class="linha_rede"><img src="img/Facebook.png" class="redes" alt="abc">Linkedin</div>
                <div class="linha_rede"><img src="img/Youtube.png" class="redes" alt="abc">Youtube</div>
                <div class="linha_rede"><img src="img/Linkedin.png" class="redes" alt="abc">Instagram</div>
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
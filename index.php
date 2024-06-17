<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xhopii - Home</title>
    <link rel="icon" href="icones/favicon.ico">
    <link rel="stylesheet" href="css/index2.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                            "<a href='login.html'>
                                <button>
                                    Cadastro/Login
                                </button>
                            </a>";
                        } elseif ($_SESSION["usuario"] != "") {
                            echo
                            "<a href='conta.php'>
                                <button>
                                    Conta
                                </button>
                            </a>";
                        }
                    } else {
                        echo
                            "<a href='login.html'>
                                <button>
                                    Cadastro/Login
                                </button>
                            </a>";
                    }
                ?>
            </section>
        </section>

        <section class="head_2">
            <a href="home.html">Home</a>
            <a href="cadcliente.html">Cadastro de Clientes</a>
            <a href="cadfunc.html">Cadastro de Funcionários</a>
            <a href="cadprod.html">Cadastro de Produtos</a>
            <a href="php/clientes.php">Ver Cliente</a>
            <a href="php/funcionarios.php">Ver Funcionário</a>
            <a href="php/visproduto.html">Ver Produtos</a>
        </section>
    </header>
    <main>
        <section>
            <div class="carrossel">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="img/carousel-1.jpg" class="d-block w-80" alt="Carousel 1">
                  </div>
                  <div class="carousel-item">
                    <img src="img/carousel-2.jpg" class="d-block w-80" alt="Carousel 2">
                  </div>
                  <div class="carousel-item">
                    <img src="img/carousel-3.jpg" class="d-block w-80" alt="Carousel 3">
                  </div>
                  <div class="carousel-item">
                    <img src="img/carousel-4.jpg" class="d-block w-80" alt="Carousel 4">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          
            <img src="img/home-promocao.png" alt="Promoção" class="promo">
          
            <section class="container">
                <p class="h4">PRODUTOS</p>
                <div class="gridProd">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "xhopii";

                        $conect = new mysqli($servername, $username, $password, $dbname);

                        if ($conect->connect_error) {
                            die("Erro: " . $conect->connect_error);
                        }

                        $puxar = "SELECT id, nome_prod, preco, fabricante, descricao, quantidade, imagem FROM produtos";
                        $resul = $conect->query($puxar);

                        if ($resul->num_rows > 0) {
                            while ($row = $resul->fetch_assoc()) {
                                echo "<form action='produto.php' method='POST'>";
                                    echo "<div class='box-produto'>";
                                        echo "<img src='data:image/jpeg;base64," . base64_encode($row['imagem']) . " alt='Imagem do Produto' class='imagem'>";
                                        echo "<p class='titulo'>" . $row['nome_prod'] . "</p>";
                                        echo "<p class='fabricante'> " . $row['fabricante'] . "</p>";
                                        echo "<p class='descricao'> " . $row['descricao'] . "</p>";
                                        echo "<div class='preco-disponibilidade'>";
                                            echo "<p class='preco'>Preço: R$" . $row['preco'] . "</p>";
                                            echo "<p class='disponivel'>Disponibilidade: " . $row['quantidade'] . "</p>";
                                        echo "</div>";
                                        echo "<input type='submit' value='Abrir Pagina' class='ver'>";
                                    echo "</div>";
                                    echo "<input type='hidden' value='" . $row['id'] . "' name='id'>";
                                echo "</form>";
                            }
                        } else {
                            echo "Nenhum produto encontrado.";
                        }

                        $conect->close();
                    ?>
                </div>
            </section>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
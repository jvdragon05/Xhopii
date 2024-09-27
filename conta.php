<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xhopii - Home</title>
    <link rel="icon" href="icones/favicon.ico">
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
            <a href="php/clientes.php">Ver Cliente</a>
            <a href="php/funcionarios.php">Ver Funcionário</a>
            <a href="php/visproduto.html">Ver Produtos</a>
        </section>
    </header>
    <main>

        <?php
            $servername = "localhost";
            $username = "root"; // ou outro usuário se configurado
            $password = ""; // a senha do usuário do MySQL
            $dbname = "xhopii";

            // Criar conexão
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Checar conexão
            if ($conn->connect_error) {
                die("Conexão falhou: " . $conn->connect_error);
            }

            // Selecionar dados
            $sql = "SELECT nome, email FROM clientes";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Exibir dados
                while($row = $result->fetch_assoc()) {
                    echo "<div>
                        <h2>Nome: " . $row["nome"]. "</h2>
                        <h2>E-mail: " . $row["email"]. "</h2>
                      </div>";
                }
            } else {
                echo "<p>Nenhum cliente encontrado.</p>";
            }
            $conn->close();
        ?>

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

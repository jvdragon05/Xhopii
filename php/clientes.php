<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca na Tabela</title>
    <link rel="stylesheet" href="css/index2.css">
</head>
<body>
<header>
        <section class="head_1">
            <section class="logo">
                <img src="img/logo.png" class="logotipo">
                <h2>Xhopii</h2>
            </section>
            <section class="sair">
                <a href="#">Sair</a>
            </section>
        </section>
        <section class="head_2">
            <a href="index.php">Home</a>
            <a href="cadcliente.php">Cadastro de Clientes</a>
            <a href="cadfunc.php">Cadastro de Funcionários</a>
            <a href="cadprod.php">Cadastro de Produtos</a>
            <a href="#" onclick="enviarDados('cliente')">Ver Cliente</a>
            <a href="#" onclick="enviarDados('funcionario')">Ver Funcionário</a>
            <a href="#" onclick="enviarDados('produtos')">Ver Produtos</a>
            <a href="login.php">Login</a>
        </section>
    </header>
    <main>
    <section class="tabela">
    <input type="text" id="searchInput" placeholder="Digite sua pesquisa">
    <br><br>
    <div class="tabela_scroll">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["busca"])) {
        $busca = $_POST["busca"];
        $conexao = new mysqli("localhost", "root", "", "xhopii");
        if ($conexao->connect_error) {
            die("Erro de conexão: " . $conexao->connect_error);
        }

        echo "<table id='dataTable'>";
        echo "<tr>";
        echo "<th>Nome</th>";
        echo "<th>Telefone</th>";
        echo "<th>Email</th>";
        echo "</tr>";
                
                    
                    
        $consulta = "SELECT `nome`, `telefone`, `email` FROM clientes ORDER BY `id` ASC";
        $resultado = $conexao->query($consulta);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Nenhum resultado encontrado</td></tr>";
        }

        $conexao->close();
        
        } else {
            echo "Erro: 'busca' não definido.";
    }
}
        ?>
    </table></section></div>

    <script>
        const searchInput = document.getElementById("searchInput");
        const dataTable = document.getElementById("dataTable");
        const rows = dataTable.getElementsByTagName("tr");

        searchInput.addEventListener("input", () => {
            const searchTerm = searchInput.value.toLowerCase();

            for (let i = 1; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName("td");
                let found = false;

                for (let j = 0; j < cells.length; j++) {
                    const cell = cells[j];
                    if (cell.textContent.toLowerCase().includes(searchTerm)) {
                        found = true;
                        break;
                    }
                }

                if (found) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        });
        function enviarDados(valor) {
    
    var formulario = document.createElement("form");
    formulario.setAttribute("method", "post");
    formulario.setAttribute("action", "ver_infos.php"); 

    
    var campo = document.createElement("input");
    campo.setAttribute("type", "hidden");
    campo.setAttribute("name", "busca");
    campo.setAttribute("value", valor);

    
    formulario.appendChild(campo);

    
    document.body.appendChild(formulario);

    
    formulario.submit();
        }
    </script>
    </main>
    <footer>
        <section class="fot_top">
            <section class="fot_c">
                <h5>Atendimento ao Cliente</h5>
                <ul>
                    <li><a href="#">Central de Ajuda</a></li>
                    <li><a href="#">Como Comprar</a></li>
                    <li><a href="#">Métodos de Pagamento</a></li>
                    <li><a href="#">Garantia Xhopii</a></li>
                    <li><a href="#">Devolução e Reembolso</a></li>
                    <li><a href="#">Fale Conosco</a></li>
                    <li><a href="#">Ouvidoria</a></li>
                </ul>
            </section>
            <section class="fot_c">
                <h5>Sobre a Xhopii</h5>
                <ul>
                    <li><a href="#">Sobre Nós</a></li>
                    <li><a href="#">Políticas Xhopii</a></li>
                    <li><a href="#">Política de Privacidade</a></li>
                    <li><a href="#">Programa de Aliados da Xhopii</a></li>
                    <li><a href="#">Seja um Entregador Xhopii</a></li>
                    <li><a href="#">Ofertas Relâmpago</a></li>
                    <li><a href="#">Xhopii Blog</a></li>
                    <li><a href="#">Empresa</a></li>
                </ul>
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
                <div class="linha_rede"><a href="#"><img src="img/Instagram.png" class="redes" alt="abc">Instagram</a></div>
                <div class="linha_rede"><img src="img/Twitter.png" class="redes" alt="abc">Twitter</div>
                <div class="linha_rede"><img src="img/Facebook.png" class="redes" alt="abc">Facebook</div>
                <div class="linha_rede"><img src="img/Youtube.png" class="redes" alt="abc">Youtube</div>
                <div class="linha_rede"><img src="img/Linkedin.png" class="redes" alt="abc">Linkedin</div>
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

<!DOCTYPE html>
<html>
<head>
    <title>Produtos</title>
    <style>
        div {
            border: 1px solid #ddd;
            margin: 10px;
            padding: 10px;
        }
        img {
            max-width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
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
            echo "<div>";
            echo "<h2>" . $row['nome_prod'] . "</h2>";
            echo "<p>Preço: " . $row['preco'] . "</p>";
            echo "<p>Fabricante: " . $row['fabricante'] . "</p>";
            echo "<p>Descrição: " . $row['descricao'] . "</p>";
            echo "<p>Quantidade: " . $row['quantidade'] . "</p>";
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagem']) . '" alt="Imagem do Produto">';
            echo "</div>";
        }
    } else {
        echo "Nenhum produto encontrado.";
    }

    $conect->close();
    ?>
</body>
</html>
<script>
        document.addEventListener("DOMContentLoaded", function() {
            var boxProdutos = document.querySelectorAll(".box-produto");
            boxProdutos.forEach(function(boxProduto) {
                boxProduto.addEventListener("click", function() {
                    window.location.href = "produto.html";
                });
            });
        });
    </script>  
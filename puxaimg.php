<?php

    $conect = new mysqli('localhost', 'root', '', 'xhopii');

    if($conect->connect_error){
        die("Erro: " . $conect->connect_error);
    }

    $puxar = "SELECT * FROM produtos";

    $resul = $conect->query($puxar);
    if($resul->num_rows > 0){
        while($row = $resul->fetch_assoc()){
            echo "<img src='" . $row['imagem'] . "'>";
        }
    }
?>
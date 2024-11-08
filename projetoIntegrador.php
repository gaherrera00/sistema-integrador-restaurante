<?php
require_once 'cardapio.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <!-- navegacao -->
</header>

<body>
    <div class="container">
        <?php
        //contador para percorrer o array   
        $contador = 0;

        //foreach para montar o card
        foreach ($pratoPrincipal as $pratop) {
            echo '
            <a href="pratos.php?codigoprato=' . $contador . '" class="card">
                    <div class="info">
                        <h3>' . $pratop['nome'] . '</h3>
                        <p>' . $pratop['resumo'] . '</p>
                        <b class="preco"> ' . $pratop['preco'] . '</b  >
                    </div>
                    <div class="img">
                        <img src="./imagem/' . $pratop['imagem'] . '">
                    </div>     
                </a>';
            $contador++;
        }
        ?>
    </div>
</body>

</html>
<style>
    body {
        background-color: rgb(242, 236, 190);
    }

    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 50px;
        margin-top: 50px;
        max-width: 1200px;
        width: 100%;
        margin: auto;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .card {
        display: flex;
        background-color: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        text-decoration: none;
        color: black;
        width: 470px;
        height: 180px;
        background-color: rgb(226, 199, 153);
    }


    .card img {
        width: 150px;
        height: 150px;
        border-radius: 5px;
        margin-top: 15px;

    }

    .info {
        margin-left: 15px;
        width: 290px;
    }

    <
</style>
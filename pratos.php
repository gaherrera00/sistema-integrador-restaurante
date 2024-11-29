<!-- pagina de detalhes do prato -->
<?php
require_once 'cardapio.php';
$codigo = $_GET['codigoprato'];
$categoria = $_GET['categoria'];

// verificando a categoria selecionada e enviando pro array correspondente
if ($categoria == 'entrada') {
    $prato = $entrada[$codigo];
} elseif ($categoria == 'principal') {
    $prato = $pratoPrincipal[$codigo];
} elseif ($categoria == 'acompanhamento') {
    $prato = $acompanhamento[$codigo];
} elseif ($categoria == 'bebida') {
    $prato = $bebidas[$codigo];
} else {
    $prato = $drinks[$codigo];
}
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        print $prato['nome'];
        ?>
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- inicio do style -->
    <style>
        .info {
            margin-left: 30px;
            width: 450px;

        }

        img {
            width: 400px;
            height: 350px;
            border-radius: 15px;
        }

        body {
            background-color: rgb(242, 236, 190);
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding-left: 500px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(192, 130, 97, 0.16);
            padding: 40px;
            width: 810px;
            border-radius: 35px;
            margin-top: 40px;
        }

        .voltar {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: transparent;
            color: rgb(154, 59, 59);
            border: none;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        .voltar:hover {
            text-decoration: underline;
        }

        .voltar i {
            margin-right: 8px;
        }
    </style>
</head>
<header>
    <!-- navegacao -->
</header>

<body>
    <!-- botao de voltar -->
    <a href="secao1.php"><button class="voltar"><i class="fa-solid fa-angle-left"></i>Voltar</button></a>

    <!-- card com detalhes do prato -->
    <div class="container">
        <div class="img">
            <img src="./imagem/<?php print $prato['imagem']; ?>">
        </div>
        <div class="info">
            <h1><?php print $prato['nome']; ?></h1>
            <b class="preco"><?php print $prato['preco']; ?></b>
            <p><?php print $prato['ingredientes']; ?></p>
        </div>
    </div>
</body>

</html>
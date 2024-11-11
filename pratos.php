<?php
require_once 'cardapio.php';
$codigo = $_GET['codigoprato'];

$pratop = $pratoPrincipal[$codigo];
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php


        print $pratoPrincipal['nome'];
    ?>
    </title>
    <style>

    .info{
        margin-left: 30px;
        
    }
    img{
        width:400px;
        height: 350px;
    }
    body{
        background-color: rgb(242, 236, 190);
    }
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
    button{
        width: 890px;
        height: 40px;
        border-radius:10px;
        margin-bottom: 30px;
        background-color:rgb(242, 236, 190);
        color:rgb(154, 59, 59);
        cursor: pointer;
        outline-width: 0.5px;
    }

    .botao1{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
</head>
<header>
    <!-- navegacao -->
</header>
<body>
    <div class="botao1">
        <a href="projetointegrador.php"><button>Voltar</button></a>
    </div>
    <div class="container">
    <div class="img">
    <img src="./imagem/<?php print $pratop['imagem']; ?>">
    </div>

    <div class="info">
    <h1><?php print $pratop['nome'];?></h1>
    <b class="preco"><?php print $pratop['preco'];?></b>
    <p><?php print $pratop['resumo'];?></p>
    </div>
    
    
    </div>
</body>
</html>

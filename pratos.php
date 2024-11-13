<?php
require_once 'cardapio.php';
$codigo = $_GET['codigoprato'];
$categoria = $_GET['categoria'];

if($categoria=='entrada') {
    $prato = $entrada[$codigo];
}
elseif ($categoria=='principal') {
    $prato = $pratoPrincipal[$codigo];}

elseif ($categoria=='acompanhamento') {
    $prato = $acompanhamento[$codigo];}

elseif ($categoria=='bebida') {
    $prato = $bebidas[$codigo];}

else{
    $prato = $drinks[$codigo];}
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
    <style>

    .info{
        margin-left: 30px;
        width: 450px;
        
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
    <img src="./imagem/<?php print $prato['imagem']; ?>">
    </div>

    <div class="info">
    <h1><?php print $prato['nome'];?></h1>
    <b class="preco"><?php print $prato['preco'];?></b>
    <p><?php print $prato['resumo'];?></p>
    </div>
    
    
    
    </div>
</body>
</html>

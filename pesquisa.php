<?php
require_once 'cardapio.php';

//combinar os arrays
$itens = array_merge($entrada, $pratoPrincipal, $acompanhamento, $bebidas, $drinks);

//verificar se há uma query
$query = isset($_GET['query']) ? strtolower(trim($_GET['query'])) : '';

//filtrar os resultados
$filteredItems = [];
if ($query) {
    foreach ($itens as $item) {
        if (
            strpos(strtolower($item['nome']), $query) !== false ||
            strpos(strtolower($item['resumo']), $query) !== false
        ) {
            $filteredItems[] = $item;
        }
    }
}

//mostrar os resultados
if (count($filteredItems) > 0) {
    foreach ($filteredItems as $item) {
        echo "
        <div class='card' id='cardpesquisa'>      
        <img class='imagempesquisa' src='./imagem/{$item['imagem']}' alt='{$item['nome']}'>
        <div class='informacoes'>
        <h3 class='titulopesquisa'>{$item['nome']}</h3>
        <p class='resumopesquisa'>{$item['resumo']}</p>  
        </div>
        </div>
       <style>
       #cardpesquisa{
       width: 500px;
       height: 150px;
       background-color: floralwhite;
       border-style: solid;
       border-color: #9A3B3B;
       display: flex;
       align-items: center;
       gap: 20px;
       margin: 30px auto;
       padding: 10px;
    }
       
    }
    .imagempesquisa{
       width: 120px;
       height: auto;
       border-radius: 8px;
       object-fit: cover;
    }
       .informacoes{
       display: flex;
       flex-direction: column;
       justify-content: center ;
       text-align: left;
       flex: 1;
    } 
       .titulopesquisa{
       font-size: 20px;
       margin-bottom: 5px;
    }
       .resumopesquisa{
       justify-content: center;
       padding: 1px 20px 10px;
       font-size: 15px;
    }
       </style>
        ";
    }
} else {
    echo "<p>Nenhum resultado foi encontrado.</p>";
}
?>
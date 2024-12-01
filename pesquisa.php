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
 if (count($filteredItems) >0) {
    foreach ($filteredItems as $item) {
        echo "
        <div class='card'>
        
        <img src='{$item['imagem']}' alt='{$item['nome']}'>
        <h3>{$item ['nome']}</h3>
        <p>{$item['resumo']}</p>
        
        </div>
        ";
    }
} else {
    echo "<p>Nenhum resultado foi encontrado.</p>";
}
?>
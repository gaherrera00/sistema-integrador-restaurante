<?php
// Arrays com dados (poderia ser substituído por um banco de dados)
$frutas = [
    ["name" => "Maçã", "description" => "Fruta vermelha e saudável", "image" => "https://via.placeholder.com/150?text=Maçã"],
    ["name" => "Banana", "description" => "Fruta amarela rica em potássio", "image" => "https://via.placeholder.com/150?text=Banana"],
];
$vegetais = [
    ["name" => "Cenoura", "description" => "Vegetal laranja e crocante", "image" => "https://via.placeholder.com/150?text=Cenoura"],
    ["name" => "Alface", "description" => "Folha verde e crocante", "image" => "https://via.placeholder.com/150?text=Alface"],
];

// Combinar os arrays
$items = array_merge($frutas, $vegetais);

// Verificar se há uma query
$query = isset($_GET['query']) ? strtolower(trim($_GET['query'])) : '';

// Filtrar os resultados
$filteredItems = [];
if ($query) {
    foreach ($items as $item) {
        if (
            strpos(strtolower($item['name']), $query) !== false || 
            strpos(strtolower($item['description']), $query) !== false
        ) {
            $filteredItems[] = $item;
        }
    }
} else {
    // Se não houver busca, mostra todos os itens
    $filteredItems = $items;
}

// Mostrar os resultados
if (count($filteredItems) > 0) {
    foreach ($filteredItems as $item) {
        echo "
        <div class='card'>
            <img src='{$item['image']}' alt='{$item['name']}'>
            <h3>{$item['name']}</h3>
            <p>{$item['description']}</p>
        </div>
        ";
    }
} else {
    echo "<p>Nenhum resultado encontrado.</p>";
}
?>

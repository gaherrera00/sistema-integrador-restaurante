<?php
require_once 'cardapio.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nome = $_POST['titulo'];
    $resumo = $_POST['resumo'];
    $ingredientes = $_POST['ingredientes'];

    $novoPrato = [
        'nome' => $titulo,
        'imagem' => '',
        'resumo' => $resumo,
        'ingredientes' => $ingredientes,
    ];
    array_push($ingredientes, $novoPrato);

    $_SESSION['ingredientes'] = $ingredientes;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, eligendi. Fuga, excepturi delectus officiis beatae
    dolorem fugiat placeat odio et fugit facere repellendus amet libero pariatur reiciendis quisquam? Repudiandae,
    consectetur?
</body>

</html>
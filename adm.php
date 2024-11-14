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
    array_push($ingredientes,$novoPrato);

    $_SESSION['ingredientes'] = $ingredientes;
}
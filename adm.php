<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(242, 236, 190);
            color: rgb(154, 59, 59);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgb(226, 199, 153);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            color: rgb(154, 59, 59);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 94.5%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid rgb(192, 130, 97);
            border-radius: 4px;
            background-color: #fff;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: rgb(154, 59, 59);
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            left: 50%;
        }

        input[type="submit"]:hover {
            background-color: rgb(192, 130, 97);
        }

        select {
            width: 100%;
            padding: 12px 15px;
            border-radius: 5px;
            border: 1px solid rgb(154, 59, 59);
            background-color: #fff;
            color: rgb(154, 59, 59);
            font-size: 16px;
            font-family: Arial, sans-serif;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        select :hover,
        select :focus {
            border-color: rgb(192, 130, 97);
            background-color: rgb(242, 236, 190);
        }

        select option:first-child {
            color: #999;
        }

        select option {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="adm.php" method="$_POST">
            <label for="text">Nome:</label>
            <input type="text" name="titulo" required>

            <label for="text">Resumo:</label>
            <input type="text" name="resumo" required>

            <label for="text">Ingredientes:</label>
            <input type="text" name="ingredientes" required>

            <select name="categoria">
                <option value="">Escolha uma categoria</option>
                <option value="$entrada">Entradas</option>
                <option value="$pratoPrincipal">Prato principal</option>
                <option value="$acompanhamento">Acompanhamentos</option>
                <option value="$bebidas">Bebidas</option>
                <option value="$drinks">Drinks</option>
            </select>
    </div>
    </form>
</body>
<?php
session_start();
require_once 'cardapio.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $nome = $_POST['titulo'];
    $resumo = $_POST['resumo'];
    $ingredientes = $_POST['ingredientes'];
    $categoria = $_POST['categoria'];
    if (!isset($_SESSION['ingredientes'])) {
        $_SESSION['ingredientes'] = [];
    }
    $novoPrato = [
        'nome' => $nome,
        'imagem' => '',
        'resumo' => $resumo,
        'ingredientes' => $ingredientes,
    ];
    array_push($_SESSION['ingredientes'], $novoPrato);
}
?>

</html>
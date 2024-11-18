<?php
session_start();

// Se a sessão de pratos não existir, inicialize como um array vazio
if (!isset($_SESSION['pratos'])) {
    $_SESSION['pratos'] = [];
}

// Adicionar prato
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];
    $resumo = $_POST['resumo'];
    $ingredientes = $_POST['ingredientes'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    $novoPrato = [
        'nome' => $nome,
        'resumo' => $resumo,
        'ingredientes' => $ingredientes,
        'preco' => $preco,
        'categoria' => $categoria,
        'imagem' => '' // Placeholder para a imagem
    ];
    $_SESSION['pratos'][] = $novoPrato;
}

// Excluir prato
if (isset($_GET['excluir'])) {
    $index = $_GET['excluir'];
    unset($_SESSION['pratos'][$index]);
    $_SESSION['pratos'] = array_values($_SESSION['pratos']); // Reindexa o array
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração de Cardápio</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

        /* Estilo do body */
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

        /* Contêiner principal */
        .container {
            background-color: rgb(226, 199, 153);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
        }

        /* Cabeçalho */
        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            color: rgb(154, 59, 59);
            font-size: 24px;
        }

        /* Título da seção */
        h2 {
            font-size: 20px;
            color: rgb(154, 59, 59);
            margin-bottom: 15px;
        }

        /* Formulário */
        form input,
        form textarea,
        form select,
        form button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid rgb(192, 130, 97);
            border-radius: 6px;
            background-color: #fff;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        form input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid rgb(192, 130, 97);
            border-radius: 6px;
            background-color: #fff;
            font-size: 14px;
        }

        form select {
            background-color: #fff;
        }

        form input[type="text"]:focus,
        form textarea:focus,
        form input[type="number"]:focus {
            border-color: rgb(154, 59, 59);
        }

        form button {
            background-color: rgb(154, 59, 59);
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: rgb(192, 130, 97);
        }

        /* Estilo da lista de pratos */
        .lista-pratos ul {
            list-style-type: none;
            padding-left: 0;
        }

        .lista-pratos li {
            margin: 10px 0;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .lista-pratos a.excluir {
            color: rgb(154, 59, 59);
            text-decoration: none;
            font-weight: 600;
            position: relative;
        }

        /* Estilo do link "voltar" */
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

        .segundo {
            margin-top: 7px;
        }

        .segundo a {
            color: rgb(154, 59, 59, 0.5);
            padding: 7px;
        }
    </style>
    <script>
        // Função para formatar o preço
        function formatarPreco(input) {
            let valor = input.value;
        }
    </script>

</head>

<body>
    <div class="container">
        <header>
            <h1>Administração de Cardápio</h1>
            <nav class="segundo">
                <a href="index.php">Adicionar Prato</a>
                <a href="index.php">Visualizar Cardápio</a>
            </nav>
        </header>

        <!-- Formulário de Adição de Prato -->
        <section class="formulario">
            <h2>Adicionar Novo Prato</h2>
            <form action="index.php" method="POST">
                <label for="text">Usuário:</label>
                <input type="text" name="nome" placeholder="Nome do prato" value="bajdb" required>

                <textarea name="resumo" placeholder="Resumo do prato" required></textarea>

                <textarea name="ingredientes" placeholder="Ingredientes" required></textarea>

                <label for="preco">Preço:</label>
                <input type="text" id="preco" name="preco" value="R$ " required oninput="formatarPreco(this)">

                <select name="categoria">
                    <option value="entrada">Entrada</option>
                    <option value="pratoPrincipal">Prato Principal</option>
                    <option value="bebida">Bebida</option>
                </select>
                <button type="submit" name="adicionar">Adicionar Prato</button>
            </form>
        </section>

        <!-- Lista de Pratos Existentes -->
        <section class="lista-pratos">
            <h2>Pratos Cadastrados</h2>
            <?php if (count($_SESSION['pratos']) > 0): ?>
                <ul>
                    <?php foreach ($_SESSION['pratos'] as $index => $prato): ?>
                        <li>
                            <strong><?= $prato['nome'] ?></strong> - <?= $prato['categoria'] ?><br>
                            <small><?= $prato['resumo'] ?></small><br>
                            <strong>Preço: R$ <?= $prato['preco'] ?></strong>
                            <a href="index.php?excluir=<?= $index ?>" class="excluir">Excluir</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Não há pratos cadastrados.</p>
            <?php endif; ?>
        </section>

    </div>
</body>

</html>
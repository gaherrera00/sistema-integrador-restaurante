<?php
session_start();

// Se a sessão de pratos não existir, inicialize como um array vazio
if (!isset($_SESSION['pratos'])) {
    $_SESSION['pratos'] = [];
}
// print_r($_POST);
// Adicionar prato
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];
    $resumo = $_POST['resumo'];
    $ingredientes = $_POST['ingredientes'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    //$imagem = $_FILES['imagem'];
    //formatar o formato de reais
    $preco = str_replace('R$ ', '', $preco);
    $preco = str_replace(',', '.', $preco); // Substitui vírgula por ponto para evitar erro no PHP

    $dir = "imagem/";

    $imagem = $dir . basename($_FILES["imagem"]["name"]);

    $caminho = $dir;

    $nomearquivo = basename($imagem);

    // print 'imagem:'.$imagem;
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $imagem)) {

        echo "O arquivo" . htmlspecialchars($nomearquivo) . "foi enviado com sucesso . (" . $caminho . ")";

    } else {
        echo "erro";
    }

    $novoPrato = [
        'nome' => $nome,
        'resumo' => $resumo,
        'ingredientes' => $ingredientes,
        'preco' => $preco,
        'imagem' => $nomearquivo
    ];

    if ($categoria == 'entrada') {
        array_push($_SESSION['entrada'], $novoPrato);
    } else if ($categoria == 'pratoPrincipal') {
        array_push($_SESSION['pratoPrincipal'], $novoPrato);
    } else if ($categoria == 'acompanhamento') {
        array_push($_SESSION['acompanhamento'], $novoPrato);
    } else if ($categoria == 'bebidas') {
        array_push($_SESSION['bebidas'], $novoPrato);
    } else {
        array_push($_SESSION['drinks'], $novoPrato);
    }


}

// Excluir prato
if (isset($_GET['excluir'])) {
    $index = $_GET['excluir'];
    unset($_SESSION['pratos'][$index]);
    $_SESSION['pratos'] = array_values($_SESSION['pratos']);
}
;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Administração de Cardápio</title>
    <!-- incio do style -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-decoration: none;
        }

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
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            color: rgb(154, 59, 59);
            font-size: 24px;
        }

        h2 {
            font-size: 20px;
            color: rgb(154, 59, 59);
            margin-bottom: 15px;
        }

        form input,
        form textarea,
        form select,
        form button,
        form input[type="file"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid rgb(192, 130, 97);
            border-radius: 6px;
            background-color: #fff;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        form input[type="text"] {
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

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: bold;
            color: rgb(154, 59, 59);
        }

        form input[type="text"]:focus,
        form textarea:focus,
        form select:focus,
        form input[type="file"]:focus {
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

        textarea {
            min-height: 100px;
            resize: vertical;
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

        .segundo {
            padding: 7px;
        }

        .segundo a {
            color: rgb(154, 59, 59, 0.8);
            padding-inline: 7px;
        }

        input[type="file"] {
            padding: 10px;
            background-color: rgb(226, 199, 153);
            border: 1px solid rgb(192, 130, 97);
            cursor: pointer;
            font-size: 14px;
        }

        input[type="file"]:hover {
            border-color: rgb(154, 59, 59);
        }

        input[type="file"]::-webkit-file-upload-button {
            background-color: rgb(154, 59, 59);
            color: white;
            border: none;
            padding: 10px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 6px;
        }

        input[type="file"]::-webkit-file-upload-button:hover {
            background-color: rgb(192, 130, 97);
        }

        .caixinha {
            position: fixed;
            top: 20px;
            left: 20px;
            width: 150px;
            height: 100px;
            background-color: rgb(154, 59, 59);
            color: white;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
        }

        /* Estilo do botão de Logout */
        .logout-btn {
            width: 100%;
            /* Botão ocupa toda a largura da caixinha */
            padding: 8px;
            background-color: #fff;
            /* Fundo branco para o botão */
            color: rgb(154, 59, 59);
            /* Cor do texto do botão */
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-btn:hover {
            background-color: rgb(192, 130, 97);
            /* Cor de fundo quando o mouse passa em cima */
            color: white;
            /* Cor do texto fica branca quando o botão é hover */
        }
    </style>
    <script>
        function formatarPreco(input) {
            let valor = input.value.replace('R$ ', '').replace(/\D/g, '');
            if (valor.length > 2) {
                valor = valor.slice(0, -2) + ',' + valor.slice(-2);
            }
            input.value = 'R$ ' + valor;
        }
    </script>
</head>

<body>
    <div class="container">
        <header>
            <h1>Administração de Cardápio</h1>
            <nav class="segundo">
                <a href="index.php">Adicionar Prato</a>
                <a href="projetoIntegrador.php">Visualizar Cardápio</a>
            </nav>
        </header>

        <!-- formulario de adicao de prato -->
        <section class="formulario">
            <h2>Adicionar Novo Prato</h2>
            <form action="adm.php" method="POST" enctype="multipart/form-data">
                <label for="nome">Nome do Prato:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="resumo">Resumo do Prato:</label>
                <textarea id="resumo" name="resumo" required></textarea>

                <label for="ingredientes">Ingredientes:</label>
                <textarea id="ingredientes" name="ingredientes" required></textarea>

                <label for="preco">Preço:</label>
                <input type="text" id="preco" placeholder="00,00" name="preco" value="R$ " required
                    oninput="formatarPreco(this)">

                <label for="imagem">Selecione um arquivo:</label>
                <input type="file" name="imagem" required>

                <label for="categoria">Categoria:</label>
                <select name="categoria" id="categoria">
                    <option value="entrada">Entrada</option>
                    <option value="pratoPrincipal">Prato Principal</option>
                    <option value="acompanhamento">Acompanhamento</option>
                    <option value="bebidas">Bebida</option>
                    <option value="drinks">Drinks</option>
                </select>

                <button type="submit" name="adicionar">Adicionar Prato</button>
            </form>

        </section>

        <!-- lista de pratos adcionados -->
        <section class="lista-pratos">
            <h2>Pratos Cadastrados</h2>
            <?php if (count($_SESSION['pratos']) > 0): ?>
                <ul>
                    <?php foreach ($_SESSION['pratos'] as $index => $prato): ?>
                        <li>
                            <strong><?= $prato['nome'] ?></strong> - <?= $prato['categoria'] ?><br>
                            <small><?= $prato['resumo'] ?></small><br>
                            <strong>Preço: R$ <?= number_format($prato['preco'], 2, ',', '.') ?></strong>
                            <a href="adm.php?excluir=<?= $index ?>" class="excluir">Excluir</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Não há pratos cadastrados.</p>
            <?php endif; ?>
        </section>
        <div class="caixinha">
        <i class="fa-solid fa-user"></i>
        <button class="logout-btn" onclick=<?php session_start();session_destroy();?>>Logout</button>
        </div>
    </div>
</body>

</html>
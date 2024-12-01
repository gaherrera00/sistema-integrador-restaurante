<?php
require_once 'cardapio.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- comeco do style -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap');

        body {
            background-color: rgb(242, 236, 190);
            margin: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        /* tag do primeiro titulo pra dar um espacamento diferente */

        .cardapio {
            font-family: Cormorant Garamond;
            font-size: 60px;
        }

        hr.solid {
            border-top: 3px solid;
            margin-left: 120px;
            margin-right: 120px;
            color: darkred;
            opacity: 0.5;
        }

        .primeiro {
            color: rgb(154, 59, 59);
            text-align: center;
            font-size: 40px;
            margin-bottom: 25px;
            margin-top: 100px;
        }

        h1 {
            color: rgb(154, 59, 59);
            text-align: center;
            font-size: 50px;
            margin-top: 150px;
            margin-bottom: 50px;
        }

        h3 {
            color: rgb(154, 59, 59);
            text-align: center;
            font-size: 30px;
            margin-bottom: 15px;
        }

        footer {
            width: 100%;
            margin-top: 100px;
            background-color: darkred;
        }

        .footertext {
            background-color: rgb(226, 199, 153);
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .links {
            margin-top: 10px;
            color: white;
            margin: 0 10px;
            text-decoration: none;
            cursor: pointer;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 50px;
            max-width: 1200px;
            width: 100%;
            margin: 50px auto;
        }

        .card {
            display: flex;
            background-color: rgb(226, 199, 153);
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: black;
            width: 470px;
            height: 180px;
        }

        .card img {
            width: 150px;
            height: 150px;
            border-radius: 5px;
            margin-top: 15px;
        }

        .info {
            margin-left: 15px;
            width: 300px;
        }

        .ancora {
            position: relative;
            transition: top 0.3s;
            width: 675px;
            height: 55px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgb(242, 236, 190);
            padding: 10px 30px;
            border-radius: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .fixed {
            position: fixed;
            top: 0;
            z-index: 1000;
        }

        .ancora ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 15px;
        }

        .ancora li {
            display: inline;
        }

        .ancora a {
            text-decoration: none;
            color: white;
            background-color: rgb(154, 59, 59);
            padding: 10px 20px;
            border-radius: 25px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .ancora a:hover {
            background-color: rgb(175, 60, 60);
            transform: scale(1.05);
        }

        .caixinha {
            display: flex;
            position: fixed;
            top: 80px;
            left: 20px;
            width: 175px;
            height: 75px;
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

        .caxinha-btn {
            width: 80%;
            padding: 2px;
            margin: 4px;
            background-color: #fff;
            color: rgb(154, 59, 59);
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .caxinha-btn:hover {
            background-color: rgb(192, 130, 97);
            color: white;
        }

        .caixaBotao {
            margin-left: 20px;
        }

        .caixaImagem {
            margin-left: 4px;
        }

        

        .search {
            width: 100%;
            position: relative;
            display: inline;
        }

        .searchTerm {
            width: 100%;
            border: 1px solid #ffff;
            border-right: none;
            padding: 5px;
            
            height: 20px;
            border-radius: 5px 0 0 5px;
            outline: none;
            color: #ddd;
        }

        .searchTerm:focus {
            color: #C76C53;
        }

        .searchButton {
            width: 40px;
            height: 36px;
            border: 1px solid #C76C53;
            text-align: center;
            color: #C76C53;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 20px;

        }
        

        .wrap {
            width: 30%;
            display: flex;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<header>
    <!-- navegacao -->
</header>

<body>
    <!-- botao dea administrador -->
    <?php
    if (isset($_SESSION) && isset($_SESSION['loggedin']) == 'ADM') {
        echo '<div class="caixinha">
            <div class="caixaImagem"> <i class="fa-solid fa-user"></i></div>
            <div class="caixaBotao">
                  <a href="logout.php"><button class="caxinha-btn">Logout</button></a>
                <a href="adm.php"><button class="caxinha-btn">Administração</button></a>
            </div>
          </div>';
    } else {
        echo '<br>';
    }
    ?>
    <!-- navegacao entre as categorias -->
    <h1 class="cardapio">Cardápio</h1>
    <hr class="solid"> <br><br><br>

    <div class="ancora" id="ancora">
        <ul>
            <li><a href="#entrada">Entradas</a></li>
            <li><a href="#principal">Pratos Principais</a></li>
            <li><a href="#acompanhamento">Acompanhamentos</a></li>
            <li><a href="#bebida">Bebidas</a></li>
            <li><a href="#drink">Drinks</a></li>
        </ul>
    </div>

    <!--barra de pesquisa - adicionei o wrap e o search, mudei o botão-->
    <br>
    <div class="wrap">
        <div class="search">
            <form id="searchForm" method="GET" action="">
                <input type="text" class="searchTerm" name="query" placeholder="Pesquise por nome ou descrição..." />
                <button type="submit" class="searchButton"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <div class="results">
        <?php include 'pesquisa.php'; ?>
    </div>

    <h1 class="primeiro"><a name="entrada"></a>Entradas</h1>
    <div class="container">
        <?php
        //contador para percorrer o array
        $contador1 = 0;

        //foreach para montar o card  das entradas
        foreach ($entrada as $entra) {
            echo '
            <a href="pratos.php?categoria=entrada&codigoprato=' . $contador1 . '" class="card">
                    <div class="info">
                        <h3>' . $entra['nome'] . '</h3>
                        <p>' . $entra['resumo'] . '</p>
                        <b class="preco"> ' . $entra['preco'] . '</b  >
                    </div>
                    <div class="img">
                        <img src="./imagem/' . $entra['imagem'] . '">
                    </div>     
                </a>';
            $contador1++;
        }
        ?>
    </div>
    <h1><a name="principal"></a>Pratos Principais</h1>
    <div class="container">
        <?php
        //contador para percorrer o array   
        $contador2 = 0;

        //foreach para montar o card dos pratos principais 
        foreach ($pratoPrincipal as $princ) {
            echo '
            <a href="pratos.php?categoria=principal&codigoprato=' . $contador2 . '" class="card">
                    <div class="info">
                        <h3>' . $princ['nome'] . '</h3>
                        <p>' . $princ['resumo'] . '</p>
                        <b class="preco"> ' . $princ['preco'] . '</b  >
                    </div>
                    <div class="img">
                        <img src="./imagem/' . $princ['imagem'] . '">
                    </div>     
                </a>';
            $contador2++;
        }
        ?>
    </div>
    <h1><a name="acompanhamento"></a>Acompanhamentos</h1>
    <div class="container">
        <?php
        //contador para percorrer o array   
        $contador3 = 0;

        //foreach para montar o card dos acompanhamentos
        foreach ($acompanhamento as $acomp) {
            echo '
            <a href="pratos.php?categoria=acompanhamento&codigoprato=' . $contador3 . '" class="card">
                    <div class="info">
                        <h3>' . $acomp['nome'] . '</h3>
                        <p>' . $acomp['resumo'] . '</p>
                        <b class="preco"> ' . $acomp['preco'] . '</b  >
                    </div>
                    <div class="img">
                        <img src="./imagem/' . $acomp['imagem'] . '">
                    </div>     
                </a>';
            $contador3++;
        }
        ?>
    </div>
    <h1><a name="bebida"></a>Bebidas</h1>
    <div class="container">
        <?php
        //contador para percorrer o array   
        $contador4 = 0;

        //foreach para montar o card das bebidas
        foreach ($bebidas as $bebid) {
            echo '
            <a href="pratos.php?categoria=bebida&codigoprato=' . $contador4 . '" class="card">
                    <div class="info">
                        <h3>' . $bebid['nome'] . '</h3>
                        <p>' . $bebid['resumo'] . '</p>
                        <b class="preco"> ' . $bebid['preco'] . '</b  >
                    </div>
                    <div class="img">
                        <img src="./imagem/' . $bebid['imagem'] . '">
                    </div>     
                </a>';
            $contador4++;
        }
        ?>
    </div>
    <h3><a name="drink"></a>Drinks:</h3>
    <div class="container">
        <?php
        //contador para percorrer o array   
        $contador5 = 0;

        foreach ($drinks as $drink) {
            echo '
            <a href="pratos.php?categoria=drinks&codigoprato=' . $contador5 . '" class="card">
                    <div class="info">
                        <h3>' . $drink['nome'] . '</h3>
                        <p>' . $drink['resumo'] . '</p>
                        <b class="preco"> ' . $drink['preco'] . '</b  >
                    </div>
                    <div class="img">
                        <img src="./imagem/' . $drink['imagem'] . '">
                    </div>     
                </a>';
            $contador5++;
        }
        ?>
    </div>
    <footer>
        <div class="footertext">
            <p>&copy; 2024 Gusteau's. Todos os direitos reservados.</p>
            <p>Endereço: R. Santo André, 680 - Boa Vista, São Caetano do Sul-SP</p>
            <p>Telefone: (11) 4227-7450 | Email: contato@restaurante.com.br</p>
            <div class="links">
                <i class="fa-brands fa-instagram" href="https://www.instagram.com/senai.sp/" style="padding:7px;"></i>
                <i class="fa-brands fa-x-twitter" href="https://www.twitter.com/seutwitter" style="padding:7px;"></i>
                <i class="fa-brands fa-facebook" href="https://www.facebook.com/seufacebook" style="padding:7px;"></i>
            </div>
        </div>

    </footer>

    <!-- inicio do js -->
    <script>
        window.onload = function () {
            window.scrollTo(100, 0);
        };
    </script>

    <script>
        // Obtém a referência à navbar
        var ancora = document.getElementById('ancora');
        var sticky = ancora.offsetTop;
        // alert(ancora);

        function stickyNavbar() {
            if (window.pageYOffset > sticky) {
                ancora.classList.add("fixed");
                // alert();
            } else {
                ancora.classList.remove("fixed");
            }
        }

        // Adiciona ou remove a classe "fixed" conforme a rolagem
        window.onscroll = function () { stickyNavbar() };

    </script>
</body>

</html>
<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barra de Pesquisa no PHP</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    #searchForm {
      margin-bottom: 20px;
    }

    .results {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .card {
      width: 200px;
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 15px;
      text-align: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .card img {
      width: 100%;
      border-radius: 8px;
    }

    .card h3 {
      margin: 10px 0;
      font-size: 18px;
    }

    .card p {
      color: #555;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <h1>Barra de Pesquisa com PHP</h1>

  <!-- Formulário de pesquisa -->
  <form id="searchForm" method="GET" action="">
    <input type="text" name="query" placeholder="Pesquise por nome ou descrição..." />
    <button type="submit">Buscar</button>
  </form>

  <!-- Contêiner para os resultados -->
  <div class="results">
    <?php include 'tesste2.php'; ?>
  </div>
</body>
</html>



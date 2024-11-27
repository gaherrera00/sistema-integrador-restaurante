<!-- pagina para receber os dados do formulario e redirecionar o usuario para a pagina correspondente -->
<?php
session_start();
$senha = $_POST['senha'];
$usuario = $_POST['user'];
// pagina de administracao
if ($usuario == "ADM" && $senha == "123") {
    $_SESSION['loggedin'] = 'ADM';
    header('Location: adm.php');
}
// pagina de avaliacao para o cliente
else {
    $_SESSION['loggedin'] = 'USER';
    header('Location: user.php');

}
?>
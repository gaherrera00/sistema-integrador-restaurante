<?php
session_start();
$senha = $_POST['senha'];
$usuario = $_POST['user'];

if($usuario == "ADM" && $senha == "123"){
    $_SESSION['loggedin'] = 'ADM';
    header('Location: adm.php');
}
else{
    $_SESSION['loggedin'] = '';
    header('Location: user.html');

}
?>

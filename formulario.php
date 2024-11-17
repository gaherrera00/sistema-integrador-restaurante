<?php
$senha = $_POST['senha'];
$usuario = $_POST['user'];

if($usuario == "ADM" && $senha == "123"){
    include 'adm.php';
}
else{
    include 'user.html';
}
?>

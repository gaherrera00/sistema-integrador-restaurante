<?php
session_start();
$senha = $_POST['senha'];
$usuario = $_POST['user'];
print_r($_POST);
if($usuario == "ADM" && $senha == "123"){
    $_SESSION['loggedin'] = 'ADM';
    header('Location: adm.php');
}
else{
    $_SESSION['loggedin'] = 'USER';
    header('Location: user.html');

}
print_r($_SESSION);

?>

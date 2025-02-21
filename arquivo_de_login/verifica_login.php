
<?php
session_start();

if (!$_SESSION['nome']) {

    header('Location:tela_inicial_login.php');
    exit();
}
?>
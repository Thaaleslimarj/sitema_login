<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <?php
    include('arquivo_de_login/verifica_login.php');
    ?>    

<h3>Olá,<?php echo $_SESSION['usuario'];?>! <br>

<a href="arquivo_de_login/logout.php">Encerrar Sessão</a></h3>
<br><hr>

<a href="funcionarios">Consultar funcionario</a>
</b>

<br><hr>
<h4>&copy; Thales LTDA</h4>
<hr>


</body>
</html>
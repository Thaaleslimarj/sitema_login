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



<h2>Olá,<?php echo $_SESSION['usuario'];?> <a href="arquivo_de_login/logout.php">Encerrar Sessão</a></h2>
<br>
<hr>

<div class="principal">
<div class="interna">
    <h3>DASHBOARD DO USUÁRIO:</h3>
</div>
<hr>
</div>
<hr>
<br>
<h4>&copy; Thales LTDA</h4>
<hr>


</body>
</html>
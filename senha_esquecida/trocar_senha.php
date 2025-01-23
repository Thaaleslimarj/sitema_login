<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trocar senha</title>
</head>
<body>
    <hr>
    <h1>Trocar Senha:</h1>
    <hr>


    <div class="senha">
    <form action="cadastra_nova_senha.php" method="POST">
    <input type="text" name="usuario" placeholder="Digite o Usuário:" require> <br>
    <input type="numer" name="rg" placeholder="Digite o RG:" require> <br>
    <label for="data">Data de Nascimento:</label><br>
    <input type="date" id="data" name="data_nascimento"  require> <br>
    <input type="password" name="senha" placeholder="Digite nova senha:" require> <br>
    <input type="password" name="conf_senha" placeholder="Confirme nova senha:" require> <br>
    <hr>
    <hr>
    <input class="botao" type="submit" value="Cadastrar nova Senha">

    
    </form>
    </div>
    
</body>
</html>
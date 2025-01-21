<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<style>

body{
background-color: #008080;
}

.login{
    width: 300px;
    height: 200px;
    margin-left: 38%;
    margin-top: 5%;
}

input{
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    font-size: 20px;
    box-sizing: border-box;
}
h3{
margin-left: 35%;
color: white;
}

a{
font-size: 20px;
}

a:hover{
color: white;
}

.erro{
color: white;
width: 100%;
height: 30px;
background-color: red;
}

.botao:hover{
background-color: #DEB887;
cursor: pointer;
}

input:focus{
border:2px solid blue;
outline: none;
}


</style>
</head>
<body>


<h3>LOGIN</h3>
<hr>

<div class="erro">
<h3>Erro: Usuário ou senha Inválidos.</h3>
</div>

<div class="login">
<form action="login.php" method="POST">
<input type="text" name="usuario" placeholder="Usuário:">
<input type="password" name="senha" placeholder="Senha:">
<input class="botao" type="submit" value="ENTRAR"><br><br>

<a href="cad_usuario.php">Cadastra-se</a><br><br>

<a href="senha_esquecida/trocar_senha.php">Esqueceu a senha</a><hr>



</form>
</div>
</body>
</html>
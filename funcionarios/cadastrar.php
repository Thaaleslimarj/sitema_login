<!DOCTYPE html>  
<html lang="pt-br">  

<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Cadastro de Funcionário</title>  
</head>  

<body>  

    <h3>Cadastro de Funcionário</h3>  
    <form action="./include/gravarFuncionario.php" method="post" name="cadastro">  

        <label for="nome">Nome:</label>  
        <input type="text" id="nome" name="nome" required><br><br>  
        
        <label for="nome">Login</label>  
        <input type="text" id="login" name="login" required><br><br>  
        
        <label for="nome">Senha</label>  
        <input type="password" name="senha" required><br><br>  
       
        Tipo: 
        <select name="tipo" id="tipo">
            <option value="admin">Administrador</option>
            <option value="usuario">Usuário</option>
        </select> <br><br>
        
        
        Status:  
        <select name="status" id="status">
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select> <br><br>

        <input type="submit" value="Enviar" /> <p></p>

    </form>  

</body>  

</html>

<a href="index.php">Página Inicial</a>
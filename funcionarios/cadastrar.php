<?php  
session_start();   
$sql = "SELECT * FROM funcionario WHERE id = " . $_SESSION['id'];  
?>  

<!DOCTYPE html>  
<html lang="pt-br">  

<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Cadastro de Funcionário</title>  

    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 20px;  
        }  

        h3 {  
            text-align: center;  
            color: #333;  
        }  

        form {  
            max-width: 400px;  
            margin: 0 auto;  
            background: #fff;  
            padding: 20px;  
            border-radius: 5px;  
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);  
        }  

        label {  
            display: block;  
            margin-bottom: 8px;  
            font-weight: bold;  
        }  

        input[type="text"],  
        input[type="password"],  
        select {  
            width: 100%;  
            padding: 10px;  
            margin-bottom: 15px;  
            border: 1px solid #ccc;  
            border-radius: 4px;  
            box-sizing: border-box; /* Para incluir padding e border no width total */  
        }  

        input[type="submit"] {  
            background-color: #5cb85c;  
            color: white;  
            border: none;  
            padding: 10px;  
            border-radius: 4px;  
            cursor: pointer;  
            font-size: 16px;  
            width: 100%;  
        }  

        input[type="submit"]:hover {  
            background-color: #4cae4c;  
        }  

        p {  
            text-align: center;  
        }  

        a {  
            text-decoration: none;  
            color: #007bff;  
            display: block;  
            text-align: center;  
            margin-top: 20px;  
        }  

        a:hover {  
            text-decoration: underline;  
        }  
    </style>  

</head>  

<body>  

    <h3>Cadastro de Funcionário</h3>  
    <form action="./include/gravarFuncionario.php" method="post" name="cadastro">  

        <label for="nome">Nome:</label>  
        <input type="text" id="nome" name="nome" required><br>  
        
        <label for="login">Login:</label>  
        <input type="text" id="login" name="login" required><br>  
        
        <label for="senha">Senha:</label>  
        <input type="password" id="senha" name="senha" required><br>  
       
        <label for="tipo">Tipo:</label>  
        <select name="tipo_funcionario" id="tipo" required>  
            <option value="admin">Administrador</option>  
            <option value="usuario">Usuário</option>  
        </select> <br>  
        
        <label for="status">Status:</label>  
        <select name="status" id="status" required>  
            <option value="ativo">Ativo</option>  
            <option value="inativo">Inativo</option>  
        </select> <br>  

        <input type="submit" value="Enviar" />   
    </form>  

    <p><a href="./index.php">Página Inicial</a></p>  

</body>  

</html>
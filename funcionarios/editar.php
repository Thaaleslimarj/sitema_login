<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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

    <?php
    include_once '../conexao.php';
    $id = $_GET["id"];

    $sql = "select * from funcionario where id = " . $id;
    $result = mysqli_query($conn, $sql);
    // linha a linha do banco
    $row = mysqli_fetch_array($result);
    ?>

    <h3>Editar funcionário</h3>

    <form action="include/atualizarFuncionario.php" method="post">
        <input type="hidden" readonly="true" name="id" value="<?php echo $row["id"] ?>" />
        
        Nome:<Br />
        <input type="text" name="nome" value="<?php echo $row["nome"] ?>" /><br />
        
        login:<Br />
        <input type="text" name="login" value="<?php echo $row["login"] ?>" /><br />
        
        senha:<Br />
        <input type="password" name="senha" value="<?php echo ($row["senha"]) ?>" /><br />

        Tipo: <br>
        <select name="tipo_funcionario" id="tipo_funcionario">
            <option value="admin">Administrador</option>
            <option value="usuario">Usuário</option>
        </select>
        <br>

        Status:<br />
        <select name="status" id="status">
            <option value="ativo">Ativo</option>
            <option value="inativo">Inativo</option>
        </select>

        <br><br>
        <input type="submit" value="Enviar" />

    </form>

</body>

</html>

<br />
<a href="index.php">Página Inicial</a>
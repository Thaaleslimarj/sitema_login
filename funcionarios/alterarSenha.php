<?php  
include_once '../conexao.php';  
$id = ($_GET["id"]);  

$sql = "SELECT * FROM funcionario WHERE id = " . $id;  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_array($result);  
?>  

<!DOCTYPE html>  
<html lang="pt-br">  

<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
    <title>Alterar Senha</title>  
   
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

        .form-container {  
            max-width: 400px;  
            margin: 20px auto;  
            background: #fff;  
            padding: 20px;  
            border-radius: 8px;  
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);  
        }  

        label {  
            font-weight: bold;  
            margin-bottom: 5px;  
        }  

        input[type="password"], input[type="submit"] {  
            width: 100%;  
            padding: 12px;  
            margin-bottom: 15px;  
            border-radius: 4px;  
            transition: border-color 0.3s;  
        }  

        input[type="password"] {  
            border: 1px solid #ccc;  
        }  

        input[type="password"]:focus {  
            border-color: #80bdff;  
            outline: none;  
        }  

        input[type="submit"] {  
            background-color: #28a745;  
            color: white;  
            border: none;  
            cursor: pointer;  
            font-size: 16px;  
            transition: background-color 0.3s;  
        }  

        input[type="submit"]:hover {  
            background-color: #218838;  
        }  

        a {  
            text-decoration: none;  
            color: #007bff;  
            text-align: center;  
            display: block;  
            margin-top: 20px;  
            transition: color 0.3s;  
        }  

        a:hover {  
            color: #0056b3;  
        }  
    </style>  
</head>  

<body>  

    <h3>Alterar Senha:</h3>  

    <div class="form-container">  
        <form action="include/atualizarSenha.php" method="post">  
            <input type="hidden" readonly="true" name="id" value="<?php echo $row["id"] ?>" />  

            <div>  
                <label for="senha">Nova Senha:</label>  
                <input type="password" name="senha" required/>  
            </div>    
            
            <div>  
                <label for="confirmar_senha">Confirmar Senha:</label>  
                <input type="password" name="confirmar_senha" required/>  
            </div>    
            
            <input type="submit" value="Enviar" class="btn btn-success mt-2"/>  
        </form>  
    </div>  

    <a href="index.php">Página Inicial</a>  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  
</body>  
</html>  
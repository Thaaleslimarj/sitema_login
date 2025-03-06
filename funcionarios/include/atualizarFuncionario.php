<?php  
include '../../conexao.php';  

$id = $_POST['id'];  
$nome = $_POST['nome'];  
$login = $_POST['login'];  
$tipo_funcionario = $_POST['tipo_funcionario'];   
$status = $_POST['status'] ?? 'ativo';   

if ($tipo_funcionario == 'admin') {  
    $tipo_funcionario = 1;  
} elseif ($tipo_funcionario == 'usuario') {  
    $tipo_funcionario = 2;  
} else {  
    $tipo_funcionario = 0;  
}  


$sql = "UPDATE funcionario SET   
            nome = '" . $nome . "', 
            login = '" . $login . "', 
            tipo_funcionario = '" . $tipo_funcionario . "' , 
            status = '" . $status . "'  
            WHERE id = " . $id;  

if (mysqli_query($conn, $sql)) {  
    $mensagem = "Registro atualizado com sucesso! ";  
    $tipoMensagem = "successo";  
}  

mysqli_close($conn);  
?>  

<!DOCTYPE html>  
<html lang="pt-br">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Atualização de Registro</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 20px;  
        }  

        .container {  
            max-width: 600px;  
            margin: auto;  
            background-color: #ffffff;  
            border-radius: 5px;  
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);  
            padding: 20px;  
        }  

        .alert {  
            padding: 15px;  
            border-radius: 5px;  
        }  

        .success {  
            background-color: #d4edda;  
            color: #155724;  
            border: 1px solid #c3e6cb;  
        }  

        .error {  
            background-color: #f8d7da;  
            color: #721c24;  
            border: 1px solid #f5c6cb;  
        }  

        a {  
            display: block;  
            text-align: center;  
            margin-top: 20px;  
            text-decoration: none;  
            background-color: #3498db;  
            color: white;  
            padding: 10px;  
            border-radius: 5px;  
        }  

        a:hover {  
            background-color: #2980b9;  
        }  
    </style>  
</head>  
<body>  

<div class="container">  
    <?php if ($mensagem): ?>  
        <div class="alert <?php echo $tipoMensagem; ?>">  
            <?php echo $mensagem; ?>  
        </div>  
    <?php endif; ?>  

    <a href="../index.php">Voltar</a>  
</div>  

</body>  
</html>  
<?php  
include '../../conexao.php';  

// Prepara os dados para prevenir SQL Injection  
$nome = mysqli_real_escape_string($conn, $_POST['nome']);  
$login = mysqli_real_escape_string($conn, $_POST['login']);  
$senha = mysqli_real_escape_string($conn, $_POST['senha']);  
$status = mysqli_real_escape_string($conn, $_POST['status']);  
   
$tipo_string = mysqli_real_escape_string($conn, $_POST['tipo_funcionario']);  
$tipo_funcionario = 0;   

if ($tipo_string === 'admin') {  
    $tipo_funcionario = 1;  
} elseif ($tipo_string === 'usuario') {  
    $tipo_funcionario = 2;   
}   

$senhaHash = md5($senha);  

$sql = "INSERT INTO funcionario (nome, login, senha, tipo_funcionario, status) VALUES ('$nome', '$login', '$senhaHash', '$tipo_funcionario', '$status')";  

if (mysqli_query($conn, $sql)) {  
    $mensagem = "Cadastro realizado com sucesso!";  
    $tipoMensagem = "success";  
} else {  
    $mensagem = "Erro ao cadastrar: " . mysqli_error($conn);  
    $tipoMensagem = "error";  
}  

mysqli_close($conn);  
?>  

<!DOCTYPE html>  
<html lang="pt-br">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Cadastro de Funcionário</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 20px;  
        }  
        .container {  
            max-width: 500px;  
            margin: auto;  
            background-color: #fff;  
            border-radius: 8px;  
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);  
            padding: 20px;  
        }  
        .alert {  
            padding: 15px;  
            border-radius: 5px;  
            margin-bottom: 20px;  
            display: none;  
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
            transition: background-color 0.3s;  
        }  
        a:hover {  
            background-color: #2980b9;  
        }  
    </style>  
</head>  
<body>  

<div class="container">  
    <?php if (isset($mensagem)): ?>  
        <div class="alert <?php echo ($tipoMensagem == "success") ? "success" : "error"; ?>" style="display: block;">  
            <?php echo $mensagem; ?>  
        </div>  
    <?php endif; ?>  

    <a href="../index.php">Página Inicial</a>  
</div>  

</body>  
</html>  
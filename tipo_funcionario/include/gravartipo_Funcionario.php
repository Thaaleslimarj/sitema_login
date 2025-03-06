<?php  
include '../../conexao.php';  

$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);  
$status = mysqli_real_escape_string($conn, $_POST['status']);  

// Remova esta linha, pois $tipo_string já está definido como $tipo  
// $tipo_string = mysqli_real_escape_string($conn, $_POST['tipo']);  

$tipo_funcionario = 0;  

if ($tipo === 'admin') {  
    $tipo_funcionario = 1;  
} elseif ($tipo === 'usuario') {  
    $tipo_funcionario = 2;  
}  

$sql = "INSERT INTO tipo_funcionario (tipo, status) VALUES ('$tipo', '$status')";  

if (mysqli_query($conn, $sql)) {  
    $msg = "Cadastro realizado com sucesso!";  
    $msg_class = "success"; 
}  

mysqli_close($conn);  
?>  

<!DOCTYPE html>  
<html lang="pt-BR">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Cadastro de Tipo de Funcionário</title>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
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
            background-color: #fff;  
            padding: 20px;  
            border-radius: 8px;  
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
        }  
        h4 {  
            margin-top: 20px;  
        }  
        a {  
            color: #007bff;  
            text-decoration: none;  
        }  
        a:hover {  
            text-decoration: underline;  
        }  
        .message {  
            margin-bottom: 15px;  
            padding: 12px;  
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
    </style>  
</head>  
<body>  
    <div class="container">  
        <?php if (isset($msg)): ?>  
            <div class="message <?php echo $msg_class; ?>">  
                <?php echo $msg; ?>  
            </div>  
        <?php endif; ?>  

        <h4>  
            <a href="../index.php">Voltar</a>  
        </h4>  
    </div>  
</body>  
</html>  
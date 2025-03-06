<?php  
include '../../conexao.php';  
session_start();  

$msg = ""; 

if (isset($_POST['id'])) {  
    $id = $_POST['id'];  
    $tipo = $_POST['tipo'];  
    $status = $_POST['status'];  

    $tipo = mysqli_real_escape_string($conn, $tipo);  
    $status = mysqli_real_escape_string($conn, $status);  

    $sql = "UPDATE tipo_funcionario SET  
                tipo = '$tipo',  
                status = '$status'  
            WHERE id = $id"; 

    if (mysqli_query($conn, $sql)) {  
        $msg = "Atualizado com sucesso!";  
    } else {  
        $msg = "Erro ao atualizar: " . mysqli_error($conn); 
    }  
} else {  
    $msg = "Nenhum ID recebido."; 
}  
?>  

<!DOCTYPE html>  
<html lang="pt-BR">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Atualização de Tipo de Funcionário</title>  
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
        <?php if (!empty($msg)): ?>  
            <div class="message <?php echo (strpos($msg, 'sucesso') !== false) ? 'success' : 'error'; ?>">  
                <?php echo $msg; ?>  
            </div>  
        <?php endif; ?>  

        <h4>  
            <a href="../index.php">Voltar</a>  
        </h4>  
    </div>  
</body>  
</html>  
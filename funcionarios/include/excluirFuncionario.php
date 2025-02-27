<?php  
$id = $_GET["id"];  

include_once '../../conexao.php';  

$sql = "DELETE FROM funcionario WHERE id=" . intval($id);   

if (mysqli_query($conn, $sql)) {  
    $message = "Deletado com sucesso!";  
    $messageType = "success";  
} else {  
    $message = "Erro ao deletar!";  
    $messageType = "error"; 
}  
mysqli_close($conn);  
?>  

<!DOCTYPE html>  
<html lang="pt-br">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
    <title>Resultado da Exclusão</title>  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 20px;  
        }  

        .message-container {  
            background-color: #ffffff;  
            border-radius: 5px;  
            padding: 20px;  
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);  
            margin-bottom: 20px;  
            text-align: center;   
        }  

        .message {  
            font-size: 18px;  
            margin: 0; 
        }  

        .success {  
            color: #27ae60; 
        }  

        .error {  
            color: #c0392b; 
        }  

        a {  
            text-decoration: none; 
            color: #3498db; 
            font-weight: bold;  
        }  

        a:hover {  
            color: #2980b9;  
        }  
        
        h4 {  
            margin-top: 20px; 
        }  
    </style>  
</head>  
<body>  

<div class="message-container">  
    <p class="message <?php echo $messageType; ?>">  
        <?php echo $message; ?>  
    </p>  
</div>  

<div>  
    <h4>  
        <a href="../../funcionarios/">Voltar</a>  
    </h4>  
</div>  

</body>  
</html>  
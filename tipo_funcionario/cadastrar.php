<?php  
include '../conexao.php';  
session_start();  

// Inserindo novo tipo de funcionário  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
    $nome = $_POST['tipo'];  
    $sql = "INSERT INTO tipo_funcionario (tipo) VALUES ('$tipo')";  
    
    if (mysqli_query($conn, $sql)) {  
        echo "Tipo de funcionário cadastrado com sucesso!";  
        header('Location: index.php');  
        exit();  
    } else {  
        echo "Erro: " . mysqli_error($conn);  
    }  
}  
?>  

<!DOCTYPE html>  
<html lang="pt-br">  
<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
    <style>  
        body {  
            background-color: rgb(243, 243, 243);  
            padding: 20px;  
        }  
    </style>  
</head>  
<body>  

<h3>Cadastrar Tipo de Funcionário</h3>  
<div class="text-center">  
    <form method="post">  
        Nome: <input type="text" name="nome" required class="form-control d-inline w-50" />  
        <input type="submit" value="Cadastrar" class="btn btn-success mt-2">  
    </form>  
</div>  

<div class="text-center mt-4">  
    <a href="index.php" class="btn btn-secondary">Voltar</a>  
</div>  

</body>  
</html>
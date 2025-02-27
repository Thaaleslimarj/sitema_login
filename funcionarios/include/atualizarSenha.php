<?php 
include '../../conexao.php';

$id = $_POST['id'];  
$senha = $_POST['senha'];   
$confirmar_senha = $_POST['confirmar_senha'];

$mensagem = "";  
$tipoMensagem = "";  

if (empty($senha) || empty($confirmar_senha)) {  
    $mensagem = "As senhas não podem ser vazias.";  
    $tipoMensagem = "error";  
} elseif ($senha !== $confirmar_senha) {  
    $mensagem = "As senhas não coincidem.";  
    $tipoMensagem = "error";   
} else {  
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);  

    $sql = "UPDATE funcionario SET senha = $senhaHash WHERE id = $id";  
    
    if ($stmt = mysqli_prepare($conn, $sql)) {  
        mysqli_stmt_bind_param($stmt, 'si', $senhaHash, $id); 

        if (mysqli_stmt_execute($stmt)) {  
            $mensagem = "Senha alterada com sucesso!";  
            $tipoMensagem = "success";  
        } else {  
            $mensagem = "Erro ao alterar a senha: " . mysqli_stmt_error($stmt);  
            $tipoMensagem = "error";  
        }  

        mysqli_stmt_close($stmt);  
    } else {  
        $mensagem = "Erro na preparação da consulta: " . mysqli_error($conn);  
        $tipoMensagem = "error";  
    }  
}  

mysqli_close($conn);  

// Redireciona de volta com uma mensagem  
header("Location: ../index.php?mensagem=" . urlencode($mensagem) . "&tipo=" . urlencode($tipoMensagem));  
exit();  
?>  

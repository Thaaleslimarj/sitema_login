<?php   
include '../../conexao.php';  
session_start();


if (isset($_POST['id'])) {  
    $id = $_POST['id'];  
    $tipo = $_POST['tipo'];  
    $status = $_POST['status']; 

$sql = "UPDATE tipo_funcionario SET
            tipo = '" . $tipo . "', status = '" . $status . "'
            where id = " . $id;
            
if (mysqli_query($conn, $sql)) {  
    echo "Tipo de funcionário atualizado com sucesso!";  
    header('Location: index.php');
    exit();  
} else {  
    echo "Erro: " . mysqli_error($conn);  
}  
} else {  
echo "ID do tipo de funcionário não foi enviado.";  
}  
?> 

<br>
<a href="../index.php">Página inicial</a>
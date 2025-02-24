<?php   
session_start();

include '../../conexao.php';  

if ($_SESSION['tipo'] !== '1') {  
    echo "Acesso negado. Você não tem permissão para realizar esta operação.";  
    exit;  
}  

$id = $_POST['id'];
$tipo = $_POST['tipo'];
$status = $_POST['status'];

$sql = "UPDATE tipo_funcionario SET
            tipo = '" . $tipo . "', status = '" . $status . "'
            where id = " . $id;
            
if (mysqli_query($conn, $sql)){
    echo "Registrado com sucesso";
} else { 
    echo "Erro ao atualizar registro" . mysqli_error($conn);
}

mysqli_close($conn);
?>

<br>
<a href="../index.php">Página inicial</a>
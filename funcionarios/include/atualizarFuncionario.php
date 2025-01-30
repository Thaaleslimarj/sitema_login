<?php  
include '../../config/conn.php';

// Dados do funcionário a serem atualizados  
$id = $_POST['id']; 
$nome = $_POST['nome']; 
$login = $_POST['login']; 
$senha = $_POST['senha']; 
$tipo = $_POST['tipo']; 
$status = $_POST['status']; 

// SQL para atualização  
$sql = "update funcionario set 
            nome = '".$nome."', login = '".$login."', senha = '".$senha."' , tipo = '".$tipo."' , status = '".$status."'
            where id = ".$id;  

if (mysqli_query($conn, $sql)) {  
    echo "Registro atualizado com sucesso!";  
} else {  
    echo "Erro ao atualizar registro: " . mysqli_error($conn);  
}  

// Fechar conexão  
mysqli_close($conn);  
?>

<br/>
<a href="../index.php">Página Inicial</a
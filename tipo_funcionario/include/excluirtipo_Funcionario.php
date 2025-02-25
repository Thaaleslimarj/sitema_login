<?php 
$id = $_GET['id'];

include_once '../../conexao.php';

$sql = "delete from tipo_funcionario where id" . $id;

if(mysqli_query($conn, $id)){
    echo "Deletado com sucesso!";
} else {
    echo "Erro ao deletar!";
}
mysqli_close($conn);
?>

<div>
    <a href="../../tipo_funcionario/">Páginal inicial:</a>
</div>
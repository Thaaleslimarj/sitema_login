<?php
$id = $_GET["id"];

include_once '../../conexao.php';

$sql = "delete from funcionario where id=" . $id;

if (mysqli_query($conn, $sql)) {
    echo "Deletado com sucesso!";
} else {
    echo "Erro ao deletar!";
}
mysqli_close($conn);
?>

<div>
    <h4>
        <a href="../../funcionarios/">Página inicial</a>
    </h4>
</div>
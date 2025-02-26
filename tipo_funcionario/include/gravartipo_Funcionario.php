<?php 
include'../../conexao.php';

$tipo =mysqli_real_escape_string($conn, $_POST['tipo']);
$status =mysqli_real_escape_string($conn, $_POST['status']);

$tipo_string = mysqli_real_escape_string($conn, $_POST['tipo']);
$tipo_funcionario = 0;

if($tipo_string === 'admin'){
    $tipo_funcionario = 1;
} elseif ($tipo_string === 'usuario'){
    $tipo_funcionario = 2;
}

$sql ="INSERT INTO tipo_funcionario (tipo, status) VALUES ('$tipo', '$status')";

if (mysqli_query($conn, $sql)) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<div>
    <h4>
        <a href="../index.php">Voltar</a>
    </h4>
</div>

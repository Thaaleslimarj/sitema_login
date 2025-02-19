<?php
include '../../conexao.php';

// Dados do funcionário a serem atualizados  
$id = $_POST['id'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$tipo_funcionario = $_POST['tipo_funcionario'];
$status = $_POST['status'];

if ($tipo_funcionario == 'admin') {
    $tipo_funcionario = 1; // Defina 1 como 'admin'
} elseif ($tipo_funcionario == 'usuario') {
    $tipo_funcionario = 2; // Defina 2 como 'usuario'
} else {
    $tipo_funcionario = 0; // Valor default, ou se precisar, defina outro valor
}

// SQL para atualização  
$sql = "update funcionario set 
            nome = '" . $nome . "', login = '" . $login . "', senha = '" . $senha . "' , tipo_funcionario = '" . $tipo_funcionario . "' , status = '" . $status . "'
            where id = " . $id;

if (mysqli_query($conn, $sql)) {
    echo "Registro atualizado com sucesso!";
} else {
    echo "Erro ao atualizar registro: " . mysqli_error($conn);
}

// Fechar conexão  
mysqli_close($conn);
?>

<br />
<a href="../index.php">Página Inicial</a
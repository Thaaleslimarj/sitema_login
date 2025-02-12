<?php  
include '../../conexao.php';  

// Testar as informações que estão passando (opcional)  
// echo '<pre>';  
// print_r($_POST);  
// die();  

// Prepara os dados para prevenir SQL Injection  
$nome = mysqli_real_escape_string($conn, $_POST['nome']);  
$login = mysqli_real_escape_string($conn, $_POST['login']);  
$senha = mysqli_real_escape_string($conn, $_POST['senha']);   

// Mapeia o tipo de funcionário para um valor inteiro  
$tipo_string = mysqli_real_escape_string($conn, $_POST['tipo_funcionario']);  
$tipo_funcionario = 0; // valor padrão, se não houver correspondência  

if ($tipo_string === 'admin') {  
    $tipo_funcionario = 1; // Mapeia 'admin' para 1  
} elseif ($tipo_string === 'usuario') {  
    $tipo_funcionario = 2; // Mapeia 'funcionario' para 2  
} // Adicione mais mapeamentos conforme necessário  

$status = mysqli_real_escape_string($conn, $_POST['status']);  

// Hash da senha  
$senhaHash = md5($senha);  

// SQL para inserir os dados no banco  
$sql = "INSERT INTO funcionario (nome, login, senha, tipo_funcionario, status) VALUES ('$nome', '$login', '$senhaHash', '$tipo_funcionario', '$status')";   

// Executa a query e verifica o resultado  
if (mysqli_query($conn, $sql)) {   
    echo "Cadastro realizado com sucesso!";  
} else {  
    echo "Erro ao cadastrar: " . mysqli_error($conn);  
}  

// Fecha a conexão  
mysqli_close($conn);  
?>   

<br/>  
<a href="../index.php">Página Inicial</a>
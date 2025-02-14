<?php
session_start();
include('conexao.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: tela_inicial_login.php');
    exit();
}

$usuario = htmlspecialchars($_POST['usuario']);
$senha = htmlspecialchars($_POST['senha']);
$senhaHash = md5($senha);

$sql_login = "SELECT 
                    nome, senha, tipo_funcionario, id
                FROM funcionario 
                where login = '$usuario'";
$retorno_login = $conn->query($sql_login);

//numero de registro retornou nessa função \/
$num_registro = $retorno_login->num_rows;

if ($num_registro > 0) {
    $dados_login = $retorno_login->fetch_assoc();

    // echo '<pre>';
    // print_r($dados_login);
    // die;

    if ($senhaHash == $dados_login['senha']) {
        $_SESSION['nome'] = $dados_login['nome'];
        $_SESSION['tipo'] = $dados_login['tipo_funcionario'];
        $_SESSION['id'] = $dados_login['id'];
        
        header('Location: painel_logado.php');
        exit();
    } else {

        $_SESSION['nao_autenticado'] = true;
        header('Location: tela_inicial_login.php');
    }
} else {
    echo "<h2>Usuário não cadastrado!</h2>";
    echo "<hr>";
    echo "<a href='tela_inicial_login.php'>Tela de Login</a>";
}

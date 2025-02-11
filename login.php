<?php 
session_start();
include('conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('Location: tela_inicial_login.php');
    exit();
}

$usuario = htmlspecialchars($_POST['usuario']);
$senha = htmlspecialchars($_POST['senha']);

$sql_usuario = "SELECT usuario from usuario where usuario = '$usuario'";
$retorno = $conn->query($sql_usuario);

//numero de registro retornou nessa função \/
$num_registro = $retorno->num_rows;

        if($num_registro>0){
            $sql_senha = "SELECT senha from usuario where usuario = '$usuario'";
            $retorno_de_senha = $conn->query($sql_senha);

            $senha_no_banco = $retorno_de_senha->fetch_assoc();

                        if(password_verify($senha, $senha_no_banco['senha'])){

                            $_SESSION['usuario']=$usuario;
                            header('Location: painel_logado.php');
                            exit();

                        }else{

                            $_SESSION['nao_autenticado'] = true;
                            header('Location: tela_inicial_login.php');
                           

                        }

                    }else{ 

                        echo "<h2>Usuário não cadastrado!</h2>";
                        echo "<hr>";
                        echo "<a href='tela_inicial_login.php'>Tela de Login</a>";



        }




?>
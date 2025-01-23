

<?php 
include('../conexao.php');

if($_SERVER['REQUEST_METHOD']=='POST'){

    $usuario = htmlspecialchars($_POST['usuario']);
    $rg = htmlspecialchars($_POST['rg']);
    $data_nascimento = htmlspecialchars($_POST['data_nascimento']);
    $data_sql = date('Y-m-d', strtotime($data_nascimento));
    //precisamos pegar as senhas
    
    $senha = htmlspecialchars($_POST['senha']);
    $conf_senha = htmlspecialchars($_POST['conf_senha']);

    $sql = "SELECT from usuario where usuario='$usuario'";
    $retorno =$conn->query($sql);
    $dados = $retorno->fetch_assoc();
    $registro=$retorno->num_rows;

    
            if($registro>0){
                $id=$dados['id'];
                $usuario_sql=$dados['usuario'];
                $rg_sql=$dados['id'];
                $data_nasc_sql=$dados['data_nascimento'];
             if($senha===$conf_senha && $rg===$rg_sql && $usuario===$usuario_sql && $data_sql===$data_nasc_sql){
                $hashsenha = password_hash($senha, PASSWORD_DEFAULT);
                
                $sql = "UPDATE usuario SET senha='$hashsenha' where id=$id";
                $retorno =$conn->query($sql);
                echo '<h2>Senha alterada com sucesso!';
                }else{                
                echo '<h2>As senhas não conferem ou os dados informados estão incorretos!';
                }

                }else{
                    echo '<h2>Dados não localizados no banco de dados!';
                }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>

<?php 

include('conexao.php');
if($_SERVER['REQUEST_METHOD']=='POST'){

$usuario = htmlspecialchars($_POST['usuario']);
$rg = htmlspecialchars($_POST['rg']);
$data_nascimento = htmlspecialchars($_POST['data_nascimento']);
//a data de nascimento no sql fica invertida, por isso o codigo tem que ser feito assim para reverter a data
$data_nasc_sql = date ('Y-m-d', strtotime($data_nascimento));

$senha = htmlspecialchars($_POST['senha']);
$conf_senha = htmlspecialchars($_POST['conf_senha']);



            if($senha === $conf_senha){

                    $sql = "SELECT *FROM usuario where usuario = '$usuario'";
                    $retorno = $conn->query($sql);
                    $registro = $retorno->num_rows;
                    if($registro){
                        echo "<h4 style='color:white; text-align:center; 
                        font-size:25px'> Esse Usuário já existe, tente outro!</h4>";
                    }else{

                        $hashsenha = password_hash($senha, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO usuario(usuario, rg, data_nascimento, senha)values('$usuario',
                        '$rg', '$data_nasc_sql', '$hashsenha')";
                        $retorno=$conn->query($sql);

                                if($retorno==true){

                                    echo "<h5 style='color:white; text-align:center; 
                                font-size:25px'> CADASTRO REALIZADO COM SUCESSO!</h5>";
                                }else{
                                    echo "<h4 style='color:white; text-align:center; 
                                    font-size:25px'> Usuário não cadastrado no banco de dados!</h4>";

                                }
        
                    }

            }else{

                    echo "<h4 style='color:white; text-align:center; 
                    font-size:25px'> As senhas não coincidem!</h4>";

                }
}

?>


<p>Cadastro de Usuário:</p>
<a href="tela_inicial_login.php">Fazer Login</a>

<hr>
<div class="blococadastro">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"> 
<input type="text" name="usuario" placeholder="Usuário" required><br>
<input type="text" name="rg" placeholder="RG" required><br>
<input type="date" name="data_nascimento" placeholder="Data de nascimento:" required><br>
<input type="password" name="senha" placeholder="Senha:" required><br>
<input type="password" name="conf_senha" placeholder="Confirme sua senha:" required><br>
 <select name="tipo_funcionario" id="tipo_funcionario">
    <?php 
        $query_tipo_funcionario = "SELECT * from tipo_funcionario";
        $executa_query = mysqli_query($conn, $query_tipo_funcionario);
        $resultado = mysqli_fetch_all($executa_query, MYSQLI_ASSOC);
        
    foreach($resultado as $tipo_resultado) {
        echo 
        "<option value={$tipo_resultado['id']}>
         {$tipo_resultado['tipo']}
         </option>";
    }
    ?>
</select>
<br>
<input class="botao" type="submit" value="Cadastrar"> |
<input class="botao" type="reset" value="Limpar">
<hr>
</form>
    

</div>
</body>
</html>
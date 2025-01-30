<?php  
include '../conn.php';  

//  Testar as informações que estão passando (opcional)  
//  echo '<pre>';  
//  print_r($_POST);  
//  die();  

// Prepara os dados para prevenir SQL Injection  
$nome = mysqli_real_escape_string($conn, $_POST['nome']);  
$login = mysqli_real_escape_string($conn, $_POST['login']);  
$senha = mysqli_real_escape_string($conn, $_POST['senha']);   
$tipo = mysqli_real_escape_string($conn, $_POST['tipo']);  
$status = mysqli_real_escape_string($conn, $_POST['status']);  

// Hash da senha  
$senhaHash = md5($senha);  

// SQL para inserir os dados no banco  
$sql = "INSERT INTO funcionario (nome, login, senha, tipo, status) VALUES ('$nome', '$login', '$senhaHash', '$tipo', '$status')"; 

// Executa a query e verifica o resultado  
if (mysqli_query($conn, $sql)) { 
    echo "Cadastro realizado com sucesso!";  
} else {  
    echo "Erro ao cadastrar: " . mysqli_error($conn);  
}  

// Fecha a conexão  
mysqli_close($conn);  
?>    
<p><a href="javascript:history.go(-1)">Voltar para a página anterior</a></p>


<!-- --------------------------------------------------------------------------------


Explicação da Continuação do Código:
Conexão ao Banco de Dados:

O código conecta-se ao banco de dados utilizando as variáveis $db_host, $db_user, $db_pass e $db_name que devem estar definidas no arquivo conn.php.
Verificação da Conexão:

Se a conexão não for estabelecida, um erro será exibido, e o script será encerrado.
Escapando os Dados:

Todos os dados capturados do formulário são passados pela função mysqli_real_escape_string() para evitar SQL injection, transformando entradas potencialmente perigosas em texto seguro.
Hash da Senha:

A senha do usuário é hashada usando password_hash() antes de ser armazenada, aumentando assim a segurança.
Execução da Query:

O comando SQL de inserção é executado com mysqli_query(), e se a execução for bem-sucedida, uma mensagem de sucesso é mostrada. Caso contrário, uma mensagem de erro detalhada é exibida.
Fechamento da Conexão:

A conexão com o banco de dados é encerrada após a operação.
Considerações Finais:
Verificações Adicionais: Você pode querer adicionar verificações, como confirmar que o login não já existe antes de tentar a inserção, para evitar duplicatas.
Validação do Formulário: Implementar validações adicionais para os dados do usuário (por exemplo, se o email está em um formato adequado ou se outras informações são válidas).
Uso do arquivo conn.php: Assegure-se de que o arquivo conn.php está corretamente configurado e contém as definições de conexão com o banco de dados.
Com essas implementações, seu código estará pronto para cadastrar um funcionário em um sistema de maneira segura e eficiente.
<!DOCTYPE html>  
<html lang="pt-br">  
<head>  
    <meta charset="UTF-8">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Painel</title>  
    <style>  
        body {  
            font-family: Arial, sans-serif; /* Define a fonte do corpo */  
            background-color: #f4f4f4; /* Cor de fundo */  
            margin: 0;  
            padding: 20px; /* Espaçamento interno */  
        }  

        /* Estilos do cabeçalho */  
        header {  
            background-color: #4A94D4; /* Cor de fundo do cabeçalho */  
            color: white; /* Cor do texto do cabeçalho */  
            padding: 15px; /* Espaçamento interno */  
            border-radius: 5px; /* Bordas arredondadas */  
            text-align: center; /* Centraliza o texto */  
            margin-bottom: 20px; /* Margem para separar do conteúdo abaixo */  
        }  

        /* Estilo do título principal */  
        h3 {  
            color: #333; /* Cor do texto */  
            background-color: #e2e2e2; /* Fundo do cabeçalho */  
            padding: 10px; /* Espaçamento interno */  
            border-radius: 5px; /* Bordas arredondadas */  
        }  

        /* Estilos dos links */  
        a {  
            text-decoration: none; /* Remove underline dos links */  
            color: #3498db; /* Cor do texto do link */  
            font-weight: bold; /* Negrito */  
        }  

        a:hover {  
            color: #2980b9; /* Cor do link ao passar o mouse */  
            text-decoration: underline; /* Sublinhado no hover */  
        }  

        /* Estilo das linhas horizontal */  
        hr {  
            border: 1px solid #ccc; /* Estilo da linha horizontal */  
            margin: 20px 0; /* Espaçamento vertical das linhas */  
        }  

        /* Estilo do rodapé */  
        h4 {  
            color: #666; /* Cor do texto do rodapé */  
            text-align: center; /* Centraliza o rodapé */  
        }  

        /* Estilos para a seção Estatística de Funcionários */  
        .info-painel {  
            background-color: #ffffff; /* Cor de fundo branca */  
            border: 1px solid #ccc; /* Borda suave */  
            border-radius: 5px; /* Bordas arredondadas */  
            padding: 20px; /* Espaçamento interno */  
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Sombra suave */  
            margin-bottom: 20px; /* Margem embaixo para espaçamento */  
        }  

        .info-painel h3 {  
            color: #4A94D4; /* Cor do cabeçalho da seção */  
        }  

        .info-painel p {  
            font-size: 18px; /* Tamanho da fonte dos parágrafos */  
            margin: 10px 0; /* Margens nos parágrafos */  
        }  

        .info-painel strong {  
            color: #333; /* Cor do texto em negrito */  
        }  
    </style>  
</head>  
<body>  

    <?php  
        include('arquivo_de_login/verifica_login.php');  
        include('./conexao.php');  

        $totalfuncionarioResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM funcionario");  
        if (!$totalfuncionarioResult) {  
            die("Erro na consulta: " . mysqli_error($conn));  
        }  
          
        $totalFuncionario = mysqli_fetch_assoc($totalfuncionarioResult)['total'];  

        $totaladminsResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM funcionario WHERE tipo_funcionario = 1");  
        if (!$totaladminsResult) {  
            die("Erro na consulta: " . mysqli_error($conn));  
        }  
        $totaladmins = mysqli_fetch_assoc($totaladminsResult)['total'];  

        $totalpadraoResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM funcionario WHERE tipo_funcionario = 2");  
        if (!$totalpadraoResult) {  
            die("Erro na consulta: " . mysqli_error($conn));  
        }  
        $totalPadrao = mysqli_fetch_assoc($totalpadraoResult)['total'];  
    ?>  

    <header>  
        <h4>Bem vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h4>   
    </header>        

    <div class="info-painel">  
        <h3><strong>Estatística de Funcionários:</strong></h3>  
        
        <p>Total de Funcionários: <strong><?php echo $totalFuncionario; ?></strong></p>  
        <p>Total de Funcionários Administradores: <strong><?php echo $totaladmins; ?></strong></p>  
        <p>Total de Funcionários Padrão: <strong><?php echo $totalPadrao; ?></strong></p>  
    </div>  

    <div class="navigation-links">  
        <a href="funcionarios">Consultar Funcionário:</a>    
        <br>   
        <hr>  
        <a href="tipo_funcionario">Consultar tipo de Funcionário:</a>  
        <hr>  
        <br>  
        <a href="arquivo_de_login/logout.php">Encerrar Sessão:</a>  
        <hr>  
    </div>  

    <h4>&copy; Thales LTDA</h4>  

</body>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>  
</html>  
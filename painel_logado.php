<!DOCTYPE html>  
<html lang="pt-br">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Painel</title>  
    <style>  
        body {  
            font-family: Arial, sans-serif; /* Define a fonte do corpo */  
            background-color: #f4f4f4; /* Cor de fundo */  
            margin: 0;  
            padding: 20px; /* Espaçamento interno */  
        }  
        
        h3 {  
            color: #333;  /* Cor do texto */  
            background-color: #e2e2e2; /* Fundo do cabeçalho */  
            padding: 10px; /* Espaçamento interno */  
            border-radius: 5px; /* Bordas arredondadas */  
        }  

        a {  
            text-decoration: none; /* Remove underline dos links */  
            color: #3498db; /* Cor do texto do link */  
            font-weight: bold; /* Negrito */  
        }  

        a:hover {  
            color: #2980b9; /* Cor do link ao passar o mouse */  
            text-decoration: underline; /* Sublinhado no hover */  
        }  

        hr {  
            border: 1px solid #ccc; /* Estilo da linha horizontal */  
            margin: 20px 0; /* Espaçamento vertical das linhas */  
        }  

        h4 {  
            color: #666; /* Cor do texto do rodapé */  
            text-align: center; /* Centraliza o rodapé */  
        }  
    </style>  
</head>  
<body>  
    <?php  
    include('arquivo_de_login/verifica_login.php');  
    ?>  

    <h3>Olá, <?php echo $_SESSION['nome']; ?>! <br>  
        <a href="arquivo_de_login/logout.php">Encerrar Sessão</a>  
    </h3>  
    <br>  
    <hr>  

    <a href="funcionarios">Consultar funcionário</a>  
    
    <br>  
    <hr>  
    <h4>&copy; Thales LTDA</h4>  
    <hr>  
</body>  
</html>
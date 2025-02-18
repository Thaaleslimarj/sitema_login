<?php  
include '../conexao.php';  
session_start();


?>  
<!DOCTYPE html>  
<html lang="pt-br">  

<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
    <style>  
        body {  
            background-color:rgb(243, 243, 243); /* Fundo claro */  
            padding: 20px;  
        }  
        
        h3 {  
            margin-bottom: 20px;  
            text-align: center;  
        }  
        
        table {  
            width: 100%;   
            margin-top: 20px;  
            background-color: white; 
            border-radius: 0.5rem;   
            overflow: hidden;   
        }  
        
        th, td {  
            text-align: center;  
            padding: 12px;  
            border: 1px solid #dee2e6;   
        }  
        
        th {  
            background-color: #007bff; 
            color: white;   
        }  
        
        .btn-secondary {  
            margin-top: 10px;  
        }  
        
        .table-container {  
            max-width: 900px;   
            margin: auto;  
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);   
            border-radius: 0.5rem; 
        }  
    </style>  

    <script>  
        function excluir(id) {  
            if (confirm('Deseja realmente excluir?')) {  
                location.href = 'include/excluirFuncionario.php?id=' + id;  
            }  
        }  
    </script>  
</head>  

<body>  

    <h3>Consultar Funcionário</h3>  

    <form action="index.php" method="get" class="text-center">  
        <label for="text">Nome:</label>  
        <input type="text" name="nome" class="form-control d-inline w-50" />  
        <button type="button" class="btn btn-secondary">Enviar</button>  
    </form>  

    <hr />  

    <div class="table-container">  
        <?php  
        $nome = '';  
        if (isset($_GET["nome"])) {  
            $nome = $_GET["nome"];  
        }  

        $sql = "select * from funcionario where nome like '" . mysqli_real_escape_string($conn, $nome) . "%' ";  
        $result = mysqli_query($conn, $sql);  
        $totalregistros = mysqli_num_rows($result);  

        if ($totalregistros > 0) {  
            echo "<table>  
                       <tr>  
                            <th>Id</th>  
                            <th>Nome</th>  
                            <th>Login</th>  
                            <th>Tipo</th>  
                            <th>Status</th>  
                            <th>Editar</th>  
                            <th>Excluir</th>  
                       </tr>";  

                       $tiposFuncionarios = [  
                        1 => "admin",  
                        2 => "Usuário",  
                    ];  
                    
                    while ($row = mysqli_fetch_array($result)) {  
                    ?>  
                        <tr>  
                            <td><?= $row["id"] ?> </td>  
                            <td><?= $row["nome"] ?></td>  
                            <td><?= $row["login"] ?></td>  
                            <td><?= isset($tiposFuncionarios[$row["tipo_funcionario"]]) ? $tiposFuncionarios[$row["tipo_funcionario"]] : 'Desconhecido' ?></td>  
                            <td><?= $row["status"] ?></td>  
                    
                            <?php  
                            if ($_SESSION['tipo'] == 1) {  
                            ?>  
                                <td><a href="editar.php?id=<?= $row["id"] ?>" class="btn btn-warning">Editar</a></td>  
                                <td><a href="#" onclick="excluir(<?= $row["id"] ?>)" class="btn btn-danger">X</a></td>  
                            <?php  
                            } else {  
                                echo "<td></td><td></td>";  
                            }  
                            ?>  
                        </tr>  
                    <?php  
                    }   

            echo "</table>";  
            echo "<p class='text-center'>Total de registros: $totalregistros</p>"; // Centraliza o total  
        } else {  
            echo "<p class='text-center'>Nenhum funcionário cadastrado</p>";  
        }  
        ?>  
    </div>  

    <br>  
    <div class="text-center">  
        <a href="cadastrar.php" class="btn btn-success">Cadastrar Funcionário</a>  
        <br>  
        <a href="../painel_logado.php">Página Inicial</a>  
    </div>  

</body>  

</html>
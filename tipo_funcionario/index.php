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
            background-color: rgb(243, 243, 243);  
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

        th,  
        td {  
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
        function excluir(tipo) {  
            if (confirm('Deseja realmente excluir?')) {  
                location.href = 'include/excluirTipoFuncionario.php?id=' + id;  
            }  
        }  
    </script>  
</head>  

<body>  
    <h3>Consultar Tipo de Funcionário</h3>  

    <form action="tipo_funcionario.php" method="get" class="text-center">  
        <label for="text">Tipo:</label>  
        <input type="text" name="tipo" class="form-control d-inline w-50" />  
        <button type="submit" class="btn btn-secondary">Enviar</button>  
    </form>  

    <hr />  

    <div class="table-container">  
        <?php  
        $tipo = '';  
        if (isset($_GET["tipo"])) {  
            $tipo = $_GET["tipo"];  
        }  

        $sql = "SELECT * FROM tipo_funcionario WHERE tipo LIKE '" . mysqli_real_escape_string($conn, $tipo) . "%'";  
        $result = mysqli_query($conn, $sql);  
        $totalregistros = mysqli_num_rows($result);  

        if ($totalregistros > 0) {  
            echo "<table>  
                       <tr>  
                            <th>Id</th>  
                            <th>Tipo</th>  
                            <th>Editar</th>  
                            <th>Excluir</th>  
                       </tr>";  

            while ($row = mysqli_fetch_array($result)) {  
                $tipoFuncionario = $row["tipo"];   
                $tipoId = $row["tipo"];   
                ?>  
                <tr>  
                    <td><?= $row["id"] ?> </td>  
                    <td><?= $row["tipo"] ?></td>  
                    
                    <td><a href="editartipo_funcionario.php?id=<?= $row["id"] ?>" class="btn btn-warning">Editar</a></td>  
                    
                    <?php  
                    // Verifica se o tipo é admin ou usuário para não permitir exclusão  
                    if ($tipoFuncionario != 'admin' && $tipoFuncionario != 'usuário') {  
                    ?>  
                        <td><a href="#" onclick="excluir(<?= $row["id"] ?>)" class="btn btn-danger">X</a></td>  
                    <?php  
                    } else {  
                        echo "<td></td>";   
                    }  
                    ?>  
                </tr>  
                <?php  
            }  

            echo "</table>";  
            echo "<p class='text-center'>Total de registros: $totalregistros</p>";   
        } else {  
            echo "<p class='text-center'>Nenhum tipo de funcionário cadastrado</p>";  
        }  
        ?>  
    </div>  

    <br>  
    <div class="text-center">  
        <br>  
        <a href="cadastrarTipoFuncionario.php" class="btn btn-success">Cadastrar Tipo de Funcionário</a>  
        <br>  
        <a href="../painel_logado.php">Página Inicial</a>  
    </div>  
</body>  
</html>
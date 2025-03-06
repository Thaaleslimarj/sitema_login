<?php  
include_once '../conexao.php';  
session_start();  
$sql = "SELECT * FROM funcionario WHERE id = " . $_SESSION['id'];  
$result = mysqli_query($conn, $sql);  
$permissao = mysqli_fetch_array($result);  

if ($permissao['tipo_funcionario'] != 1) {  
    header("Location: ../sem_acesso.php");  
    exit();  
}  
?>  

<!DOCTYPE html>  
<html lang="pt-br">  

<head>  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />  

    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 20px;  
        }  

        h3 {  
            text-align: center;  
            color: #333;  
        }  

        form {  
            max-width: 400px;  
            margin: 0 auto;  
            background: #fff;  
            padding: 20px;  
            border-radius: 5px;  
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);  
        }  

        label {  
            display: block;  
            margin-bottom: 8px;  
            font-weight: bold;  
        }  

        input[type="text"],  
        input[type="password"],  
        select {  
            width: 100%;  
            padding: 10px;  
            margin-bottom: 15px;  
            border: 1px solid #ccc;  
            border-radius: 4px;  
            box-sizing: border-box;  
        }  

        input[type="submit"] {  
            background-color: #5cb85c;  
            color: white;  
            border: none;  
            padding: 10px;  
            border-radius: 4px;  
            cursor: pointer;  
            font-size: 16px;  
            width: 100%;  
        }  

        input[type="submit"]:hover {  
            background-color: #4cae4c;  
        }  

        p {  
            text-align: center;  
        }  

        a {  
            text-decoration: none;  
            color: #007bff;  
            display: block;  
            text-align: center;  
            margin-top: 20px;  
        }  

        a:hover {  
            text-decoration: underline;  
        }  

        .select2-container--default .select2-selection--single .select2-selection__rendered {  
            color: #777;  
            line-height: 28px;  
            padding-top: 0.2em  
        }  

        .select2-container--default .select2-selection--single .select2-selection__arrow b {  
            margin-left: -20px;  
            left: unset;  
            right: 1em;  
        }  

        .select2-container--default .select2-selection--single .select2-selection__arrow {  
            position: unset;  
        }  

        .select2-container .select2-selection--single {  
            box-sizing: border-box;  
            display: block;  
            height: calc(1.5em + 0.75rem + 2px);  
            width: 100%;  
            color: #495057;  
            border: 1px solid #ced4da;  
            border-radius: 0.25rem;  
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;  
            user-select: none;  
            -webkit-user-select: none;  
        }  

        [type=search] {  
            outline-offset: 0;  
            -webkit-appearance: none;  
            outline-color: #aaa  
        }  
    </style>  

</head>  

<script>  
    document.addEventListener("DOMContentLoaded", function(event) {  
        $('.select2').select2({});  

    });  
</script>  

<body>  

    <h3>Cadastro de Funcionário</h3>  
    <form action="./include/gravarFuncionario.php" method="post" name="cadastro">  

        <div>  
            <label for="nome">Nome:</label>  
            <input type="text" id="nome" name="nome" required><br>  
        </div>  

        <div>  
            <label for="login">Login:</label>  
            <input type="text" id="login" name="login" required><br>  

        </div>  

        <div>  
            <label for="senha">Senha:</label>  
            <input type="password" id="senha" name="senha" required><br>  
        </div>  

        <div class="pt-3">  
            <label for="tipo_funcionario">Tipo</label>  
            <select name="tipo_funcionario" class="form-control select2" id="tipo" required>  
                <?php  
                $sql_tipos = "SELECT id, tipo FROM tipo_funcionario";  
                $result_tipos = mysqli_query($conn, $sql_tipos);  

                if ($result_tipos) {  
                    while ($row_tipo = mysqli_fetch_assoc($result_tipos)) {  
                        echo '<option value="' . $row_tipo['id'] . '">' . $row_tipo['tipo'] . '</option>';  
                    }  
                }  
                ?>  
            </select>  
        </div>  

        <div class="pt-3">  
            <label for="status">Status:</label>  
            <select name="status" class="form-control select2" id="status" required>  
                <option value="ativo">Ativo</option>  
                <option value="inativo">Inativo</option>  
            </select>  
        </div>  

        <input type="submit" value="Enviar" class="btn btn-success mt-2" />  
    </form>  

    <p><a href="./index.php">Página Inicial</a></p>  

</body>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>  

</html>  
<?php
include '../conexao.php';
session_start();

// Inserindo novo tipo de funcionário  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['tipo_funcionario'];
    $sql = "INSERT INTO tipo_funcionario (tipo) VALUES ('$tipo')";


    if (mysqli_query($conn, $sql)) {
        echo "Tipo de funcionário cadastrado com sucesso!";
        header('Location: index.php');
        exit();
    } else {
        echo "Erro: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

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
            /* Para incluir padding e border no width total */
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
  document.addEventListener("DOMContentLoaded", function (event) {
    $('.select2').select2({});

    });
</script>

<body>

    <h3>Cadastrar Tipo de Funcionário</h3>
    <form action="./include/gravartipo_Funcionario.php" method="post" name="cadastro">

        <div>
            <label for="tipo">Tipo de funcionário:</label>
            <input type="text" class="form-control" name="tipo" id="tipo" required>
        </div>

        <label for="status">Status:</label>
        <select name="status" class="form-control select2" id="status">
            <option value="ativo">Ativo</option>    
            <option value="inativo">Inativo</option>    
            
        </select>

        <input type="submit" value="Cadastrar" class="btn btn-success mt-2">  
        <div class="text-center mt-4">  
        <a href="index.php" class="btn btn-secondary">Voltar</a>  
        </div>  
</form> 

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</html>
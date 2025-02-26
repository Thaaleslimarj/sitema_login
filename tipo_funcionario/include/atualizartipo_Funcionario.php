<?php   
include '../../conexao.php';  
session_start();


    if (isset($_POST['id'])) {  
        $id = $_POST['id'];  
        $tipo = $_POST['tipo'];  
        $status = $_POST['status']; 

        $sql = "UPDATE tipo_funcionario SET
                    tipo = '" . $tipo . "', status = '" . $status . "' 
                    where id = " . $id;
            
        if (mysqli_query($conn, $sql)) {  
            $msg = "Atualizado com sucesso!";
        } else {  
            echo "Erro: " . mysqli_error($conn);  
        }  
        }  
        echo $msg;
        ?> 

    <div>
        <h4>   
            <a   href="../index.php">Voltar</a>
        </h4>
    </div>
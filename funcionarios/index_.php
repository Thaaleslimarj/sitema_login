<table>
    <tr>
        <th>Login</th>
        <th>Tipo</th>
        <th>Status</th>
    </tr>
        <?php
        include '../conexao.php';
        $sql = "SELECT usuario, rg, data_nascimento FROM usuario";
        $retornoQuery = mysqli_query($conn, "$sql");
        
        while($dadosTabela = mysqli_fetch_assoc($retornoQuery)){
            echo "<tr>";
            echo "<td>{$dadosTabela['usuario']}</td>";
            ?> 
                <td><?= $dadosTabela['rg'] ?></td>
                <td><?= $dadosTabela['data_nascimento'] ?></td>
            <?php
            echo "</tr>";

        }
        
        ?>
        
    </tr>
</table>
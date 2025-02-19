<?php
$host = "localhost"; // ou seu host  
$usuario = "root"; // seu usuário do banco  
$senha = ""; // sua senha do banco  
$database = "sislogin"; // nome do banco 


$conn = mysqli_connect('localhost', 'root', '', 'sislogin');

// Verifica a conexão  
if (!$conn) {
    die("Conexão falhou");
}

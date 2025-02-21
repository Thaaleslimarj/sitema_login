<?php
$host = "localhost";  
$usuario = "root";  
$senha = ""; 
$database = "sislogin"; 


$conn = mysqli_connect('localhost', 'root', '', 'sislogin');

if (!$conn) {
    die("Conexão falhou");
}

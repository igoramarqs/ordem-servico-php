<?php    
    
    $host = 'localhost';
    $port = '3306';
    $user = 'root';
    $pass = '';
    $dbname = 'ordem_servico'; 

    $mysqli = new mysqli($host, $user, $pass, $dbname);

    if($mysqli->error) {
        die("Falha ao conectar ao banco de dados: " . $mysqli->error);
    }

?>
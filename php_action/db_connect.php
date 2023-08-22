<?php
$servername = 'localhost';
$db_name = 'concept';
$username = 'postgres';
$password = '101510';

try{
    $connect = new PDO("pgsql:host=$servername;port=5432;dbname=$db_name", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //echo "Conexão efetuado com sucesso";
}catch(PDOException $e){
    echo "Falha na conexão. <br/>";
    die($e->getMessage());
}

?>
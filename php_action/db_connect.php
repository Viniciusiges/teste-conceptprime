<?php
$servername = 'containers-us-west-159.railway.app';
$db_name = 'railway';
$username = 'postgres';
$password = 'JZWxg9tcFvi47YfgU3PZ';

try{
    $connect = new PDO("pgsql:host=$servername;port=6288;dbname=$db_name", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    //echo "Conexão efetuado com sucesso";
}catch(PDOException $e){
    echo "Falha na conexão. <br/>";
    die($e->getMessage());
}

?>
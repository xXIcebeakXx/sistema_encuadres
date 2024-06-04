<?php

$db = 'sistema_cursos';
$user = 'root';
$pass = '';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ut8',
);

try{
    $conn = new PDO($db, $user, $pass, $option);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo 'error de conexion: ' . $e->getMessage();
}

?>
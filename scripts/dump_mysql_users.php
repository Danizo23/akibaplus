<?php
$host='127.0.0.1'; $db='Akibaplus'; $user='root'; $pass='';
$dsn="mysql:host=$host;dbname=$db;charset=utf8mb4";
try{
    $pdo=new PDO($dsn,$user,$pass, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    $stmt=$pdo->query('SELECT id,name,email,role FROM users');
    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($rows, JSON_PRETTY_PRINT);
}catch(Exception $e){ echo $e->getMessage(); }

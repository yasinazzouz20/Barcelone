<?php

function getConnection(){
    $con=new PDO("mysql:host=localhost;dbname=graille", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $con;
}

function selectEmployees($query){
    $pdo= getConnection();
    
    $stmt=$pdo->query($query);
    return $stmt->fetchAll(); 
}

function updateEmployees($query){
    $pdo=getConnection();
    
    $stmt=$pdo->prepare($query);
    return $stmt->execute();
}

?>
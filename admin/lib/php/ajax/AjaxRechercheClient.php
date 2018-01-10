<?php
header('Content-type: application/json');
require '../dbConnect.php';
require '../classes/Connexion.class.php';
require '../classes/Socio.class.php';
require '../classes/SocioDB.class.php';
$cnx= Connexion::getInstance($dsn, $user, $pass);

try{
    
    $recherche= new ClientDB($cnx);
    $retour=$recherche->getClientJson($_GET['email']);
    print json_encode($retour);
    
} catch (PDOException $e) {
    
    print $e->getMessage();

}




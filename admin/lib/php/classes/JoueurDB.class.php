<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClientDB
 *
 * @author HP
 */
class JoueurDB extends Jouer {

    private $_db;
    private $_clientArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

 

    public function addJoueur(array $data) {
//en commentaire : appel d'une fonction plpgsql stockée dans Postgresql, avec récupération
//de la valeur retournée
        
        $query = "insert into equipe (ID,nom,age,image)"
                . " values (:ID,:nom,:age,:image)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':ID', $data['id'], PDO::PARAM_INT);
            $resultset->bindValue(':nom', $data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':age', $data['age'], PDO::PARAM_STR);
            $resultset->bindValue(':image', $data['image'], PDO::PARAM_STR);
            
            $resultset->execute();
            //$retour = $resultset->fetchColumn(0);
            //return $retour;
        } catch (PDOException $e) {
            print "<br/>Echec de l'insertion";
            print $e->getMessage();
        }
    }

    //put your code here
}

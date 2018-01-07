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
class SocioDB extends Socio {

    private $_db;
    private $_clientArray = array();

    public function __construct($cnx) {
        $this->_db = $cnx;
    }

    public function getClient($email) {
        $query = "select * from socio where email_client=:email_client";
        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':email_client', $email, PDO::PARAM_STR);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                //$_clientArray[] = new Client ($data);
                $_clientArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_clientArray;
    }

    public function addClient(array $data) {
//en commentaire : appel d'une fonction plpgsql stockée dans Postgresql, avec récupération
//de la valeur retournée
        
        $query = "insert into socio (NOM_CLIENT,PRENOM_CLIENT,EMAIL_CLIENT,TELEPHONE,ID)"
                . " values (:nom_client,:prenom_client,:email_client,:telephone,id)";

        try {
            $resultset = $this->_db->prepare($query);
            $resultset->bindValue(':nom_client', $data['nom'], PDO::PARAM_STR);
            $resultset->bindValue(':prenom_client', $data['prenom'], PDO::PARAM_STR);
            $resultset->bindValue(':email_client', $data['email1'], PDO::PARAM_STR);
            $resultset->bindValue(':telephone', $data['telephone'], PDO::PARAM_STR);
            $resultset->bindValue(':id',$data['id'], PDO::PARAM_INT);
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

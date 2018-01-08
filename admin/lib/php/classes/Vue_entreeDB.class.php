<?php
class Vue_entreeDB {
    private $_db;
    function __construct($_db) {
        $this->_db = $_db;
    }
    
    //afficher toutes les compet
    function getVue_entreeType($id){
         try {            
            $query = "SELECT * FROM VUE_ENTREE where ID_TYPE_ENTREE=:id_type_entree";
            $resultset = $this->_db->prepare($query);  
            $resultset->bindValue(':id_type_entree',$id);
            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
    
//pour les tableaux dynamiques
    function getVue_(){
         try {
            $query = "SELECT * FROM VUE_ENTREE order by TYPE_MATCH,NOM_MATCH";
            $resultset = $this->_db->prepare($query);  
            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
    //afficher le match
    function getVue_entree($id){
         try {            
            $query = "SELECT * FROM  vue_entree  where ID_ENTREE=:id_entree";
            $resultset = $this->_db->prepare($query);  
            $resultset->bindValue(':id_entree',$id);
            $resultset->execute();
            $data = $resultset->fetchAll();
            //var_dump($data);
            $resultset->execute();
        } catch (PDOException $e) {
            print $e->getMessage();
        }

        while ($data = $resultset->fetch()) {
            try {
                $_infoArray[] = $data;
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }
        return $_infoArray;
    }
}


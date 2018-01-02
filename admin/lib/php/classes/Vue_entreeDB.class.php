<?php
class Vue_entreeDB {
    private $_db;
    function __construct($_db) {
        $this->_db = $_db;
    }
    
    
    function getVue_entreeType($id){
         try {            
            $query = "SELECT * FROM VUE_ENTREE where id_type_entree=:id_type_entree";
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
    

    function getVue_(){
         try {
            $query = "SELECT * FROM VUE_ENTREE order by type_match,nom_match";
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
    
    function getVue_entree($id){
         try {            
            $query = "SELECT * FROM VUE_ENTREE where id_entree=:id_entree";
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

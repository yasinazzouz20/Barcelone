<?php
class Vue_barcelone {
    private $_db;
    function __construct($_db) {
        $this->_db = $_db;
    }
    
    
    

    function getVue_joueurs(){
         try {
            $query = "SELECT * FROM EQUIPE order by nom,age";
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
    
    
}


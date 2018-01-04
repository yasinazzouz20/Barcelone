<?php

$types = new Type_entreeDB($cnx);
$tabTypes = $types->getType_entree();
$nbrTypes = count($tabTypes);

if(isset($_GET['choix_type'])){
    print $_GET['id_type_entree'];
    $cake = new Vue_entreeDB($cnx);
    $liste = $cake->getVue_entreeType($_GET['id_type_entree']);
    //var_dump($liste);
    $nbrCakes = count($liste);
}    
?>

<div class="container">
    <form action="<?php print $_SERVER['PHP_SELF'];?>" method="get">
    <div class="row">
        <div class="col-sm-2">
            <h5 id="produit"><span class="txtGras">Nos produits&nbsp;:</span><h5/>
        </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-sm-3">
            <select name="id_type_entree" id="id_type_entree">
                <option value=""></option>
                
                <?php
                    for($i=0;$i<$nbrTypes;$i++){
                ?>
                <option value="<?php print $tabTypes[$i]->id_type_entree;  ?>"><?php print utf8_decode($tabTypes[$i]->type_entree);  ?></option>
                <?php
                    
                
                    }
                ?>
            </select>
        </div>
           <div class="col-sm-2">
            <input type="submit" name="choix_type" value="Choisir" id="choix_type"/>
        </div>
    </div>         
</form>
</div>
<br /><br/><br/><br/>

<div class="container">
    <?php
        if(isset($liste)){
            if($nbrCakes>0){
                
            
            
        
    ?>
            <div class="row">
                <div class="col-sm-12 ">
   
                         <h6 id="taitres">RAPPEL DU GENRE DE PRODUIT SELECTIONNE :</h6>  
                         <h6 id="traitres"><?php print $liste[0]['type_match'];?></h6>
                             
   
                         <br/><br/><br/>
                </div>                             
            </div>
                <?php
                    for($i=0;$i<$nbrCakes;$i++){
                ?>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class=zoom>
                        <div class=produit>
                        <img class="boxeurss" src="admin/images/<?php print $liste[$i]['IMAGE'];?>"  alt="image"/>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">                        
                        
                        
                            
                                
                                    <h3 id="boxeurs"><?php print $liste[$i]['nom_match'];?></h3><br/>               
                                    <h5 id="boxeurs"><?php print $liste[$i]['prix_unitaire'];?>$</h5><br/> 
                                                         
                        
                        
                           
                                <br/>
                                    <a href="index.php?page=commande.php&id=<?php print $liste[$i]['id_entree'] ?>"/>
                                        Commander
                                    </a>    
                                <br/>
                                                       
                        
                    </div>
                    </div><br/><br/><br/><br/><br/><br/>
                    <?php } ?>
                
 </div>           
 <?php
            }}//fin if du debut 
 ?>
</div>

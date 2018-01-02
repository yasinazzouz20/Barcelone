<h2 id="titres">Boxeurs du Mayweather Boxing Club</h2>
<?php

    $cake = new Vue_barcelone($cnx);
    $liste = $cake->getVue_joueurs();
    $nbrCakes = count($liste);
    
?> 
  
<br /><br /><br /><br /><br />
<div class="container">
  
    <?php
        if(isset($liste)){
            if($nbrCakes>0){       
    ?>

    <?php
        for($i=0;$i<$nbrCakes;$i++){
    ?>
    <div class="row">
        <div class="col-sm-12 col-md-6">
                <img class="boxeurss" src="admin/images/<?php print $liste[$i]['image'];?>" alt="image" />
        </div>
        
        <div class="col-md-4 text-center">
            
            <h3 id="boxeurs">NUMERO :&nbsp;<?php print $liste[$i]['ID'];?></h3><br/>           
            <h5 id="boxeurs">
            NOM :&nbsp;<?php print $liste[$i]['nom'];?></h5>            
            <h6 id="boxeurs">AGE :&nbsp;<?php print $liste[$i]['age'];?> ans</h6>
            
            
            
        </div>
        
    </div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <?php } ?> 
</div>

<?php
        }}//fin if du début
?>
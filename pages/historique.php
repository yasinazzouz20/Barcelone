
<?php
$info = new InfoClientDB($cnx);
$texte = $info->getInfoClient("historique");
?>


<div class="col-sm-10">
    
        <?php
        print utf8_encode($texte[0]->TEXTE);
        ?>
    
</div>
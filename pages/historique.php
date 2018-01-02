
<?php
$info = new InfoClientDB($cnx);
$texte = $info->getInfoClient("historique");
?>


<div class="col-sm-4">
    <?php
    print $texte[0]->TEXTE;
    ?>

</div>
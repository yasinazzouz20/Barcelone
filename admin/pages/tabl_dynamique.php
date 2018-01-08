
<h2 id="titre">Tableau dynamique</h2>
<a href ="../admin/pages/imprimer.php"><img src="../admin/images/pdf.jpg" alt="PDF"/></a>
<?php
$obj = new Vue_entreeDB($cnx);
$liste = $obj->getVue_();
$nbrG = count($liste);
//var_dump($liste);
?>

<table class="table-responsive">
    <tr>
        <th class="ecart">Id</th>
        <th class="ecart">Thème</th>
        <th class="ecart">Nom</th>
        <th class="ecart">Prix</th>
    </tr>
    <?php
    for ($i = 0; $i < $nbrG; $i++) {
        ?>
        <tr>
            <td class="ecart"><?php print $liste[$i]['ID_ENTREE']; ?></td>
            <td class="ecart"><?php print utf8_encode($liste[$i]['TYPE_MATCH']); ?></td>
            <td>
<span contenteditable="true" name="nom_match" class="ecart" id="<?php print $liste[$i]['ID_ENTREE']; ?>">
                    <?php print utf8_encode($liste[$i]['NOM_MATCH']); ?>
</span>
            </td>
            <td>
<span contenteditable="true" name="prix_unitaire" class="ecart" id="<?php print $liste[$i]['ID_ENTREE']; ?>">
                <?php print $liste[$i]['PRIX_UNITAIRE']; ?>
</span>
            </td>
        </tr>
        <?php
    }
    ?>
</table>  

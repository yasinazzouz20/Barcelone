
<h2 id="titre">Tableau dynamique</h2>
<a href ="../admin/pages/imprimer2.php"><img src="../admin/images/pdf.jpg" alt="PDF"/></a>
<?php
$obj = new Vue_barcelone($cnx);
$liste = $obj->getVue_joueurs();
$nbrG = count($liste);
//var_dump($liste);
?>
 

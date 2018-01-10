<h2>Voici les matchs</h2>
<a href ="../admin/pages/imprimer.php"><img src="../admin/images/pdf.jpg" alt="PDF"/></a>
<?php
$obj = new Vue_entreeDB($cnx);
$liste = $obj->getVue_();
$nbrG = count($liste);
//var_dump($liste);
?>
  

<h2 id="titre">Joueurs du Futbol Club Barcelone</h2>
<?php
$cake = new Vue_barcelone($cnx);
$liste = $cake->getVue_joueurs();
$nbrCakes = count($liste);
?> 

<br /><br /><br /><br /><br />
<div class="container">
    <div class="col-sm-12 col-md-6" id="gt_carousel" class="activecarousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">

                <?php
                if (isset($liste)) {
                    if ($nbrCakes > 0) {
                        ?>

                        <?php
                        for ($i = 0; $i < $nbrCakes; $i++) {
                            ?>
                            <div class="row">

                                <div class="col-sm-12 col-md-6" id="gt_carousel" class="activecarousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="admin/images/<?php print $liste[$i]['image']; ?>" alt="image" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 text-center">

                                    <h3 id="joueurs">NUMERO :&nbsp;<?php print $liste[$i]['ID']; ?></h3><br/>           
                                    <h5 id="joueurs">
                                        NOM :&nbsp;<?php print $liste[$i]['nom']; ?></h5>            
                                    <h6 id="joueurs">AGE :&nbsp;<?php print $liste[$i]['age']; ?> ans</h6>



                                </div>

                            </div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                        <?php } ?> 
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}//fin if du début
?>
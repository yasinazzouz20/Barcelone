<?php
if (isset($_GET['commander'])) {
    //extrait les champs du tableau $_GET pour simplifier
    //ecriture
    //var_dump($_GET);
    extract($_GET, EXTR_OVERWRITE);
          //  if (empty($ID) || empty($nom) || empty($age) || empty($image)) {}

        $client = new JoueurDB($cnx);
        $client->addJoueur($_GET);
        //var_dump($_GET);
    
    
}
?>








<?php
//si formulaire pas complet
if (isset($erreur)) {
    //&& $erreur!=""

    print $erreur;
}
?>

</div>
</div>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">

    <div class="row">
        <div class="col-sm-3"><label for="id"><h6 id="blanc">Dorsal</h6></label></div>
        <div class="col-sm-4">
            <input type="text" name="id" id="id"/>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3"><label for="nom"><h6 id="blanc">Nom</h6></label></div>
        <div class="col-sm-4">
            <input type="text" name="nom" id="nom" />
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"><label for="age"><h6 id="blanc">Age</h6></label></div>
        <div class="col-sm-4">
            <input type="text" name="age" id="age" />
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3"><label for="id"><h6 id="blanc">Image</h6></label></div>
        <div class="col-sm-4">
            <input type="text" name="image" id="image" placeholder="xxxxx.jpg"/>
        </div>
    </div>



</div>
<br/>
<div class="row">
    <div class="col-sm-4">
        <input type="submit" class="btn" name="commander" id="commander" value="Finaliser ma commande" class="pull-right"/>&nbsp;           
        <input type="reset"  class="btn" id="reset" class="pull-left" value="Annuler" onclick="document.location.href = 'http://localhost/Barcelone/index.php?page=tiquet';"/>
    </div>
</div>
</form>
</div>


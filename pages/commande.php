<h6 id="barca">Commande</h6>
<?php
//si aucun id de gateau dans url
if (!isset($_GET['id']) && !isset($_SESSION['id_commande'])) {
    ?>
    <p><h4 id="txtw">Pour commander, dirigez-vous sur notre page ticket ou cliquer : <input type="button" class="btn" id="ici" value="ICI" onclick="document.location.href = 'http://localhost/barcelone/index.php?page=tiquet';" /></h4></p>
    <?php
} else if (isset($_GET['id'])) {
    //on vient de la page produit
    $_SESSION['id_commande'] = $_GET['id'];
}

if (isset($_SESSION['id_commande'])) {
    $cake = new Vue_entreeDB($cnx);
    $liste = $cake->getVue_entree($_SESSION['id_commande']);


    //traitement formulaire
    if (isset($_GET['commander'])) {
        //extrait les champs du tableau $_GET pour simplifier
        //ecriture
        //var_dump($_GET);
        extract($_GET, EXTR_OVERWRITE);
        if (empty($email1) || empty($email2) || empty($nom) || empty($prenom) || empty($telephone)) {
            print "Vide";
        }
        //$erreur = "Veuillez remplir tous les champs";
        else {
            //$erreur="";
            $client = new SocioDB($cnx);
            $client->addClient($_GET);
            //var_dump($_GET);
        }
    }
    ?>
    <div class="row">

        <div class ="col-sm-4">
            <img src="./admin/images/<?php print $liste [0]['IMAGE']; ?>" alt="barca"/>

        </div>
        <div class="col-sm-8">
            <br/><h5 id="blanc"><?php print $liste[0]['NOM_MATCH']; ?></h5>
            <br/><br/>
    <h5 id="blanc"><?php print $liste[0]['PRIX_UNITAIRE']; ?> &euro;</h5>
        </div>
    </div>





    <div class="container">
        <div class="row">
            <div class="col-sm-4 erreur">
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
                <div class="col-sm-3"><label for="email1"><h6 id="blanc">Email</h6></label></div>
                <div class="col-sm-4">
                    <input type="email" id="email1" name="email1" placeholder="aaa@aaa.aa"/>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3"><label for="email2"><h6 id="blanc">Confirmez votre email</label></div>
                <div class="col-sm-4">
                    <input type="email" id="email2" name="email2" placeholder="aaa@aaa.aa"/>
                </div>
            </div> 

            <div class="row">
                <div class="col-sm-3"><label for="nom"><h6 id="blanc">Nom</h6></label></div>
                <div class="col-sm-4">
                    <input type="text" name="nom" id="nom" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"><label for="prenom"><h6 id="blanc">Prénom</h6></label></div>
                <div class="col-sm-4">
                    <input type="text" name="prenom" id="prenom" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"><label for="telephone"><h6 id="blanc">Téléphone</h6></label></div>
                <div class="col-sm-4">
                    <input type="text" name="telephone" id="telephone" placeholder="0xxx/xx.xx.xx"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 txtBleu"><label for="id"><h6 id="blanc">Id de l'entree</h6></label></div>
                <div class="col-sm-4">
                    <select name="id" id="id">
                        <option value="<?php print $liste[0]['ID_ENTREE'] ?>" ><?php print $liste[0]['ID_ENTREE'] ?> </option>
                    </select>
                </div>
            </div>



    </div>
    <br/>
    <div class="row">
        <div class="col-sm-4">
            <input type="submit" class="btn" name="commander" id="commander" value="Finaliser ma commande" class="pull-right"/>&nbsp;           
            <input type="reset"  class="btn" id="reset" class="pull-left" value="Annuler" onclick="document.location.href='http://localhost/Barcelone/index.php?page=tiquet';"/>
        </div>
    </div>
    </form>
    </div>

    <?php
}


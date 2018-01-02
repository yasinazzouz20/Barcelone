<h2>Commande</h2>
<?php
//si aucun id de gateau dans url
if (!isset($_GET['id']) && !isset($_SESSION['ID_COMMANDE'])) {
    ?>
    <p><h4 id="txtw">Pour commander, Rendez-sur notre page Catalogue <input type="button" class="btn" id="ici" value="ICI" onclick="document.location.href='http://localhost/barcelone/index.php?page=tiquet';" /></h4></p>
    <?php
} else if(isset ($_GET['id'])) {
    //on vient de la page produit
    $_SESSION['ID_COMMANDE'] = $_GET['id'];
}
if(isset($_SESSION['ID_COMMANDE'])){
    $foot = new Vue_GateauDB($cnx);
    $liste = $foot ->getVue_gateauProduit($_SESSION['id_commande']);
    
    
    
    //traitement formulaire
    if(isset($_GET['commander'])){
        //extrait les champs du tableau $_GET pour simplifier
        //ecriture
        //var_dump($_GET);
        extract($_GET, EXTR_OVERWRITE);
       if (empty($email1) || empty($email2)||empty($password) || empty($nom) || empty($prenom)||empty($telephone) || empty($adresse) || empty($numero)||empty($codepostal)||empty($localite)) {
            print "Vide";
        }
            //$erreur = "Veuillez remplir tous les champs";
        
        else{
            //$erreur="";
            $client = new ClientDB($cnx);
            $client->addClient($_GET);
        }
    }
    ?>
    <div class="row">
        
        <div class ="col-sm-4">
            <img src="./admin/images/<?php print $liste [0]['IMAGE'];?>" alt="Gateau"/>
            
        </div>
        <div class="col-sm-5">
            <br/><?php print $liste[0]['NOM_GATEAU'];?>
            <br/><br/>
            <?php print $liste[0]['PRIX_UNITAIRE'];?> &euro;
        </div>
    </div>





    <div class="container">
        <div class="row">
            <div class="col-sm-4 erreur">
                <?php
                //si formulaire pas complet
                if (isset($erreur)){
                    //&& $erreur!=""
                    
                    print $erreur;
                }
                
                ?>
                
            </div>
        </div>
        <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_commande">

            <div class="row">
                <div class="col-sm-3"><label for="email1">Email</label></div>
                <div class="col-sm-4">
                    <input type="email" id="email1" name="email1" placeholder="aaa@aaa.aa"/>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3"><label for="email2">Confirmez votre email</label></div>
                <div class="col-sm-4">
                    <input type="email" id="email2" name="email2" placeholder="aaa@aaa.aa"/>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-3"><label for="pasword">Password</label></div>
                <div class="col-sm-4">
                    <input type="password" name="password" id="password" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"><label for="nom">Nom</label></div>
                <div class="col-sm-4">
                    <input type="text" name="nom" id="nom" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"><label for="prenom">Prénom</label></div>
                <div class="col-sm-4">
                    <input type="text" name="prenom" id="prenom" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"><label for="telephone">Téléphone</label></div>
                <div class="col-sm-4">
                    <input type="text" name="telephone" id="telephone" placeholder="xxx/xx.xx.xx"/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"><label for="adresse">Adresse</label></div>
                <div class="col-sm-4">
                    <input type="text" name="adresse" id="adresse" />
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-3"><label for="numero">Numéro</label></div>
                <div class="col-sm-4">
                    <input type="text" name="numero" id="numero" />
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-3"><label for="codepostal">Code postal</label></div>
                <div class="col-sm-4">
                    <input type="text" name="codepostal" id="codepostal" />
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"><label for="localite">Localité</label></div>
                <div class="col-sm-4">
                    <input type="text" name="localite" id="localite" />
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-sm-4">
                    <input type="submit" name="commander" id="commander" value="Finaliser ma commande" class="pull-right"/>&nbsp;           
                    <input type="reset" id="reset" value="Annuler" class="pull-left"/>
                </div>
            </div>
        </form>
    </div>

    <?php
}

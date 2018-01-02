<!DOCTYPE html>
<?php
include('admin/lib/php/admin_liste_include.php');
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Site officiel Barelone </title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../Barcelone/admin/lib/css/Style.css"></link> 
        <script src="admin/lib/js/dist/jquery.validate.js"></script>
        <script src="admin/lib/js/gt_functions.js"></script>
        <script src="admin/lib/js/gt_functionsVal.js"></script>
        <script src="admin/lib/js/gt_functionsAjax.js"></script>



    </head>
    <body> 
        <div class="container">
            <header>
                <img src="images/barcelone.jpg" alt="Barca"/>


            </header>


        </div>
        <div class="container">

            <div class="row">
                <div class="col-sm-2">

                    <nav>
                        <?php
                        if (file_exists("./lib/php/b_menu.php")) {

                            include ("./lib/php/b_menu.php");
                        }
                        ?>  
                    </nav>
                </div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-11"> <a href="./admin/index.php" class="float-right">Administration</a></div>
                    </div>
                    <section>

                        <?php
                        if (!isset($_SESSION['page'])) {

                            $_SESSION['page'] = "accueil";
                        }
//on a cliqué sur un lien du menu
                        if (isset($_GET['page'])) {

                            $_SESSION['page'] = $_GET['page'];
                        }
                        $path = "./pages/" . $_SESSION['page'] . ".php";

                        if (file_exists($path)) {

                            include ($path);
                        } else {
                            print "Oupssss";
                        }
                        ?>
                    </section>
                    <footer> 

                        <?php
                        if (file_exists("./lib/php/b_footer.php"))
                            include("./lib/php/b_footer.php");
                        ?>

                    </footer>
                </div>

            </div>

        </div>

    </body>
</html>

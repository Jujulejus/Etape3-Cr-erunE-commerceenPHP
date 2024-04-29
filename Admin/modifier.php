<?php
global $ProductID, $mesproduits;
require_once('../config/connexion.php');
session_start();
$getData = $_GET['pdt'];
$lesproduit = $_GET['Image'];

if(!isset($_SESSION['admin'])){
    header('location: http://localhost/Etape3.3/login/login.php');
}
if(empty($_SESSION['admin'])) {
    header('location: http://localhost/Etape3.3/login/login.php');
}
//if(isset($_GET['pdt'])) {
//    header("location: display.php");
//}
//if(!empty($_GET['pdt']) AND !is_numeric($_GET['pdt'])){
//    header("location: display.php");
//}
require("../config/commandes.php") ?>


    <!DOCTYPE html>
    <html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <title>Modifier un article sur WishAzon</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navigation WishAzon</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="http://localhost/Etape3.3/index.php?">Acceuil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Etape3.3/Admin/indexadmin.php">Ajouter un article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Etape3.3/Admin/supprimer.php">Supprimer un article</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/Etape3.3/Admin/display.php">Liste des produits</a>
                    </li>
                </ul>
                <div style="display: flex; justify-content: flex-end;">
                    <a href="http://localhost/Etape3.3/login/logout.php" class="btn btn-danger">Se déconnecter</a>

                </div>
            </div>
        </div>
    </nav>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <form method="post">
                    <div class="mb-3">
                        <h1>Modifier Un Produit</h1>
                        <label for="exampleInputEmail1" class="form-label">Lien vers l'image du produit</label>
                        <input type="name" class="form-control" name="image" required value="<?php echo $getData ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nom du produit</label>
                        <input type="text" class="form-control" name="Nom" required value="<?php echo $getData ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Prix</label>
                        <input type="number" class="form-control" name="Prix" required value="<?php echo $getData ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description du produit</label>
                        <textarea class="form-control" name="Description" required > <?php echo $getData ?></textarea>
                    </div>
                    <div>
                        <label for="exampleInputPassword1" class="form-label">Quantité Restante</label>
                        <input type="number" class="form-control" name="QuantitéRestante" required value="<?php echo $getData ?>">
                    </div><br><br><br><br>
                    <button type="submit" class="btn btn-primary" name="valider">Mettre à jour ce produit</button>
                    <button type="button" class="btn btn-primary" id="quitter">Quitter</button>
                    <script> document.getElementById("quitter").addEventListener("click", redirect);
                        function redirect(){ window.location = "http://localhost/Etape3.3/index.php?"; }</script>
                </form>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


                </div>



            </div></div>


    </body>
    </html>
<?php
if(isset($_POST['valider'])){
    if(isset($_POST['image']) AND isset($_POST['Nom']) AND isset($_POST['Prix']) AND isset($_POST['Description'])AND isset($_POST['QuantitéRestante'])){
        if(!empty($_POST['image']) AND !empty($_POST['Nom']) AND !empty($_POST['Prix']) AND !empty($_POST['Description']) AND !empty($_POST['QuantitéRestante'])){
            $image = htmlspecialchars(strip_tags($_POST['image']));
            $nom = htmlspecialchars(strip_tags($_POST['Nom']));
            $prix = htmlspecialchars(strip_tags($_POST['Prix']));
            $description = htmlspecialchars(strip_tags($_POST['Description']));
            $QuatitéRestante= htmlspecialchars(strip_tags($_POST['QuantitéRestante']));
            try {
                modifier($image, $nom, $prix, $description, $QuatitéRestante);
                redirectToUrl('http://localhost/Etape3.3/index.php?');}
            catch(Exception $e) {
                $e->getMessage();
            }

        }
    }
}
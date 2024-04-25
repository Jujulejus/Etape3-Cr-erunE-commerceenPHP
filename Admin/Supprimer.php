<?php
session_start();

if(!isset($_SESSION['admin'])){
    header('location: http://localhost/Etape3.3/login/login.php');
}
if(empty($_SESSION['admin'])) {
    header('location: http://localhost/Etape3.3/login/login.php');
}

require("../config/commandes.php");

$mesproduits=afficher();?>

    <!DOCTYPE html>
    <html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <title></title>
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


                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ID Produit</label>
                        <input type="number" class="form-control" name="IDProduit" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="valider">Supprimer ce produit :'(</button>
                        <button type="button" class="btn btn-primary" id="quitter">Quitter</button>
                </form>
                <script> document.getElementById("quitter").addEventListener("click", redirect);
                    function redirect(){ window.location = "http://localhost/Etape3.3/index.php?"; }</script>


                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


                </div>



            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div>

            <?php foreach($mesproduits as $produits): ?>
            <div class="album py-5 bg-body-tertiary">
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                            <div class="col">
                                <div class="card shadow-sm">
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $produits->Nom ?></text><img src="<?= $produits -> Image ?>"></svg>
                                    <h3>ID DU PRODUIT : <?= $produits->productID ?></h3>
                                    <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>




        </div></div>


    </body>
    </html>
<?php
if(isset($_POST['valider'])){
    if(isset($_POST['IDProduit'])){
        if(!empty($_POST['IDProduit']) AND is_numeric($_POST['IDProduit'])){
            $IDProduit = htmlspecialchars(strip_tags($_POST['IDProduit']));
            try {
                supprimer($IDProduit);
                redirectToUrl('http://localhost/Etape3.3/index.php?');}
            catch(Exception $e) {
                $e->getMessage();
            }

        }
    }
}
?>
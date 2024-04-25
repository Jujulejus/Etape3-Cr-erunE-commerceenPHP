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
                        <a class="nav-link" href="http://localhost/Etape3.3/Admin/supprimer.php">Supprimer un article</a>
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

                <script> document.getElementById("quitter").addEventListener("click", redirect);
                    function redirect(){ window.location = "http://localhost/Etape3.3/index.php?"; }</script>


                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID article</th>
                            <th scope="col">Images</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Description</th>
                            <th scope="col">Quantité Restante</th>
                            <th scope="col">Modifier</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($mesproduits as $produit):?>
                        <tr>
                            <th scope="row"><?= $produit->productID ?> </th>
                            <td><img src="<?= $produit->Image?>" style="width: 100%"></td>
                            <td><?= $produit->Nom?></td>
                            <td style="font-weight: bold; color:green"><?= $produit->Prix?>€</td>
                            <td><?= $produit->Description?></td>
                            <td><?= $produit->QuantitéRestante?></td>
                            <td>
                                <a href="http://localhost/Etape3.3/Admin/modifier.php?pdt=<?= $produit-> productID ?>">Modifier Le Produit ;)</a>
                            </td>
                        </tr>

                        <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>



            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3"></div>





    </div></div>


    </body>
    </html>
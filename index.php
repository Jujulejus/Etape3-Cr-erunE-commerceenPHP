<?php
require_once ("config/commandes.php");
$mesproduits=afficher();



?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head><script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Articles Disponibles - WishAzon</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }
        tr {
            border-width: 2px}

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
        table,th,tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>


</head>
<body>
<?php if(!isset($_SESSION['admin'])){
    $_SESSION['admin'] = array();{
        echo "";}}?>
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
    </symbol>
</svg>

<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            id="bd-theme"
            type="button"
            aria-expanded="false"
            data-bs-toggle="dropdown"
            aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                Light
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                Dark
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
                Auto
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
    </ul>
</div>


<header data-bs-theme="dark">
    <div class="collapse text-bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4>A propos du site</h4>
                    <p class="text-body-secondary">Nous vendons des produits de qualité ! Promis et en plus, ce site n'est pas du tout inspiré d'un autre site e-commerce ! enfin presque...</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4>Connexion</h4>
                    <ul class="list-unstyled">

                        <li><a href="Admin/indexadmin.php" class="text-white">Ajoutez votre produit !</a></li>
                        <li><a href="http://localhost/Etape3.3/Admin/supprimer.php" class="text-white">Supprimer Un Produit</a></li>
                        <li><a href="http://localhost/Etape3.3/login/login.php" class="text-white">Se connecter</a></li>
                        <li><a href="#" class="text-white">S'inscrire</a></li>
                        <li><a href="http://localhost/Etape3.3/login/logout.php" class="text-white">Se déconnecter</a></li>
                        <li><a href="http://localhost/Etape3.3/Admin/Panier.php" class="text-white">Accéder Au Panier</a></li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                <strong>WishAzon</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

<main>
    <?php foreach($mesproduits as $produits): ?>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title><?= $produits->Nom ?></title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?= $produits->Nom ?></text><img src="<?= $produits -> Image ?>"></svg>
                        <div class="card-body">
                            <p class="card-text"><?= substr($produits->Description, 0,150) ?></p>
                            <FONT COLOR="#C7050E"><p class="card-text" >Quantité Restante : <?= ($produits->QuantitéRestante) ?></p></FONT>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="add" href=http://localhost/Etape3.3/Admin/Panier.php?pdt=<?= $produits-> productID ?>>Ajouter Au Panier</button>
                                </div>
                                <small class="text-body-secondary"><?= $produits->Prix ?><?php echo "€" ?></small>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>
    <?php if(isset($_POST['add'])){
        if(isset($_SESSION['panier'])){
            $item_array_id = array_column($_SESSION['panier'], 'productID');
            if(!in_array($_GET['productID'], $item_array_id)){
                $count = count($_SESSION['panier']);
                $item_array = array(
                    'productID' => $_GET['productID'],
                    'Nom' => $_POST['nom'],
                    'Prix' => $_POST['prix'],
                    'QuantitéVoulu' => $_POST['QuantitéVoulu'],
                );
                $_SESSION['panier'][$count] = $item_array;
                echo '<script>window.location="cart.php"</script>';
            }
            else {
                $item_array = array(
                    'productID' => $_GET['productID'],
                    'Nom' => $_POST['nom'],
                    'Prix' => $_POST['prix'],
                    'QuantitéVoulu' => $_POST['QuantitéVoulu'],
                );
                $_SESSION['panier'][0] = $item_array;
            }
        }
        if(isset($_GET['action'])){
            if($_GET['action'] == 'delete'){
                foreach($_SESSION['panier'] as $mesproduits => $produits){
                    if($produits['productID'] == $_GET["productID"]){
                        unset($_SESSION['panier'][$mesproduits]);
                        echo '<script>alert("le produit à été retiré!") </script>';
                        echo '<script>window.location="cart.php"</script>';
                    };
                }
            }
        }
    } ?>
    <div style="clear: both"></div>
    <h3 class="title2">Détail Du Panier</h3>
    <div class="table table-bordered"></div>
    <table><tr>
        <th width="30%">Nom Du Produit   </th>
        <th width="13%">Prix   </th>
            <th width="10%">Description   </th>
        <th width="10%">Quantité Restante   </th>
        <th width="10%">Prix Total   </th>
        <th width="17%">Supprimer   </th>
    </tr>
    <?php if(!empty($_SESSION['panier'])){
        $total = 0;
        foreach($_SESSION['panier'] as $mesproduits => $produits){
        }
    }?>
        <?php foreach($mesproduits as $produits): ?><tr>
        <td><?php echo $produits -> Nom;?></td>
        <td><?php echo $produits -> Prix;?></td>
        <td><?php echo $produits -> Description;?></td>
        <td><?php echo $produits -> QuantitéRestante;?></td>
<!--        <td>--><?php //echo $produits -> QuantitéVoulu;?><!--</td>-->
<!--        <td>--><?php //echo number_format($produits -> Prix * $produits -> Prix,2); ?><!-- </td>-->
        <td><?php echo $produits -> Prix ?> </td>
        <td><button><a href="http://localhost/Etape3.3/Admin/supprimer.php">Supprimer l'article</a></button></td><?php endforeach ?>

        <td><a href="Cart.php?action=detete&id=<?php echo $produits['productID']; ?>"><span class="text-danger">Supprimer l'article :(</span></a></td>
    </tr>
    <?php
    $total = $total + ($produits['QuantitéVoulu'] * $produits['Prix']);
    ?>
    <tr>
        <td colspan="3" align="right">Total</td>
        <th align="right"><?php echo number_format($produits,2); ?></th>
    </tr></table>
    <?php ?>
</main>

<footer class="text-body-secondary py-5">
    <p>WishAzon par SDK</p>
    </div>
</footer>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
}
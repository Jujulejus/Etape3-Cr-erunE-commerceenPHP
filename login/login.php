<?php
session_start();
include "../config/commandes.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-widht, initial-">
    <title>Se Connecter à WishAzon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <form method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" style="width: 80%">
                </div>
                <div class="mb-3">
                    <label for="motdepasse" class="form-label">Mot De Passe</label>
                    <input type="password" class="form-control" name="motdepasse" style="width: 80%">
                </div>
                <input type="submit" class="btn btn-primary" name="envoyer" value="Se Connecter">
            </form>

        </div>
        <div class="col-md-3"></div>
    </div>
</div>
</body>
</html>
<?php
if(isset($_POST['envoyer'])){
    if(!empty($_POST['email']) || !empty($_POST['motdepasse'])){
        $email = htmlspecialchars($_POST['email']);
        $motdepasse = htmlspecialchars($_POST['motdepasse']);

        $admin = getadmin($email,$motdepasse);

        if($admin){
            $_SESSION['admin'] = $admin;
            header('Location: http://localhost/Etape3.3/index.php?#');
        }else{
            echo "Echec de la connexion...";
        }
    }
}

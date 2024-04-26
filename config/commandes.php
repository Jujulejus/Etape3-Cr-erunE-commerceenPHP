<?php
function ajouter($Image,$Nom,$Prix,$Description,$QuantitéRestante){
    global $access;
    if(require("connexion.php")){
        // $req = $access->prepare("INSERT INTO products (Image,Nom,Prix,Description,QuantitéRestante, Is_Enable) VALUES ('$Image', '$Nom', $Prix, '$Description', $QuantitéRestante, 0)");
        $req = $access->prepare("INSERT INTO products (Image,Nom,Prix,Description,QuantitéRestante,Is_Enabled) VALUES (?,?,?,?,?,0)");

        $req->execute(array($Image,$Nom,$Prix,$Description,$QuantitéRestante));
        $req->closeCursor();
    }
}
function afficher(){
    global $access;
    if(require("connexion.php")){
        $req=$access->prepare("SELECT productID,Image,Nom,Prix,Description,QuantitéRestante FROM products ORDER BY productID DESC");
        $req->execute();
        $data=$req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
}

function supprimer($ProductID){
    global $access;
    if(require("connexion.php")){
        $req=$access->prepare("DELETE FROM products WHERE productID=?");
        $req->execute(array($ProductID));
    }
}
function modifier($ProductID){
    global $access;
    if (require("connexion.php")){
        $req=$access->prepare("UPDATE products SET Image,Nom,Prix,Description,QuantitéRestante WHERE productID=?");
        $req->execute(array($Image,$Nom,$Prix,$Description,$QuantitéRestante));
        $req->closeCursor();

    }
}
function redirectToUrl($url)
{
    header("Location: {$url}");
    exit();
}
function getadmin($email, $motdepasse){
    global $access;
    if(require("connexion.php")){
        $req = $access->prepare("SELECT * FROM admin WHERE email=? AND motdepasse=?");

        $req->execute(array($email,$motdepasse));

        if($req->rowCount()==1){
            $data=$req->fetch();
            return $data;
        }else{
            return false;
        }
        $req->closeCursor();
    }
}



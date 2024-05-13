<?php
global $ProductID;
$ProductID = $_GET['pdt'];
require_once('../config/commandes.php');
require_once('../config/connexion.php');
function supprimerb($ProductID){
    global $access;
    $req=$access->prepare("DELETE FROM products WHERE productID=?");
    $req->execute(array($ProductID));
    }
supprimerb($ProductID);
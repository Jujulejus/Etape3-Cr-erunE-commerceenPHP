<?php
require_once('../config/connexion.php');
function supprimerb($ProductID){
    global $access;
    if(require("../config/connexion.php")){
        $req=$access->prepare("DELETE FROM products WHERE productID=?");
        $req->execute(array($ProductID));
    }
}
$ProductID = "";
supprimerb($ProductID);
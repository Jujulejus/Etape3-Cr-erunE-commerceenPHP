<?php
if(isset($_GET['pdt'])){
    echo "bien envoyé !";}
else{
    echo "Vous avez pas sélectionné de produits";
}
var_dump($_GET);
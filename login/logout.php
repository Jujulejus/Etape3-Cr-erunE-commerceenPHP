<?php
session_start();
if(isset($_SESSION['admin'])){
    $_SESSION['admin'] = array();

    session_destroy();
    header('location: http://localhost/Etape3.3/index.php?');
}else{
    header('location: http://localhost/Etape3.3/index.php?');
}
?>
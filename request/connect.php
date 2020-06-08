<?php 

$password = 'jmaaT5$G[+33';


try{
    $bdd = new PDO('mysql:host=localhost;dbname=mycave;charset=utf8','root','');
}
catch(Exeption $e){
    die('Erreur : '.$e->getMessage());
}


 ?>
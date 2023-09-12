<?php 

$user='root';
$pass='';

try{ 
    $bdd=new PDO('mysql:host=localhost;dbname=exercice1', $user, $pass); 
}
catch(PDOException $e){ //sinon
    die('Erreur : '. $e->getMessage());
}

?>
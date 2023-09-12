<?php
$user = 'root';
$pass = '';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=exercice1', $user, $pass);
} catch(PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Vérifiez si l'identifiant de la ligne à supprimer a été passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Requête pour supprimer l'élément correspondant de la base de données
    $requete = "DELETE FROM exolexique WHERE id = :id";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();

    // Redirigez l'utilisateur vers une autre page après la suppression
    header("Location: gestion.php");
    exit();
} else {
    // L'identifiant n'a pas été spécifié, redirigez l'utilisateur vers une autre page 
    header("Location: gestion.php");
    exit();
}
?>

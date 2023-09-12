
<div class="entete">
    <div class="saisie-definition">
        SAISIE DES DEFINITIONS
    </div>
</div>

<?php
$user = 'root';
$pass = '';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=exercice1', $user, $pass);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

<?php 
    if (isset($_POST['mot'])) {
        include('controller/traitement_saisie.php');
    }
?>


<div class="formulaire">
    <form method="post" action="#">
        <div class="form1">
            <div class="gauche">Mot :</div>
            <div class="droite"><input type="text" name="mot"></div>
        </div>
        <div class="form1">
            <div class="gauche"><label for="definition">Définition :</label></div>
            <div class="droite"><textarea id="definition" name="definition" rows="5" cols="33"></textarea></div>
        </div>
        <div class="form1">
            <div class="gauche">Catégorie :</div>
            <div class="droite">
                <select name="categorie">
                    <option value="objet">Objet</option>
                    <option value="action">Action</option>
                    <option value="animaux">Animaux</option>
                    <option value="couleur">Couleur</option>
                    <option value="sport">Sport</option>
                    <option value="fruit_et_légume">Fruit et Légume</option>
                    <option value="personnage">Personnage</option>
                    <option value="autre">Autre</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Enregistrez la définition">
    </form>
</div>


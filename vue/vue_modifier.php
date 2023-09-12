<style>
    form {
        padding-top: 20px;
    }

    .formulaire {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form1 {
        display: flex;
        padding-top: 20px;
    }

    .gauche {
        padding-right: 150px;
    }

    input {
        width: 262px;
        height: 25px;
    }

    input[type="submit"] {
        color: aliceblue;
        font-weight: 700;
        text-decoration: none;
        background-color: black;
        margin-top: 30px;
        border: solid 1px black;
        height: 40px;
        width: 200px;
    }
</style>

<?php
$user = 'root';
$pass = '';

try {
    $bdd = new PDO('mysql:host=localhost;dbname=exercice1', $user, $pass);
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_POST['id'], $_POST['mot'], $_POST['definition'], $_POST['categorie'])) {
    // Traitement du formulaire de modification
    $id = $_POST['id'];
    $mot = $_POST['mot'];
    $definition = $_POST['definition'];
    $categorie = $_POST['categorie'];

    // Requête de mise à jour à l'aide d'une requête préparée
    $requete = "UPDATE exolexique SET mot = :mot, definition = :definition, categorie = :categorie WHERE id = :id";
    $req = $bdd->prepare($requete);
    $req->bindValue(':mot', $mot, PDO::PARAM_STR);
    $req->bindValue(':definition', $definition, PDO::PARAM_STR);
    $req->bindValue(':categorie', $categorie, PDO::PARAM_STR);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();

    // Redirection de l'utilisateur vers une autre page
    header("Location: ../index.php?page=3");
    exit();
} else {


    // Vérification si l'identifiant de la ligne à modifier a été passé en paramètre dans l'URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

    // Requête pour récupérer les données de la ligne à modifier
    $requete = "SELECT * FROM exolexique WHERE id = :id";
    $req = $bdd->prepare($requete);
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $row = $req->fetch(PDO::FETCH_ASSOC);

    // Vérification si la requête a renvoyé des résultats
    if ($row) {
        $mot = $row['mot'];
        $definition = $row['definition'];
        $categorie = $row['categorie'];

        // Affichage du formulaire pré-rempli avec les données actuelles
        ?>

        <form action="vue_modifier.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="mot">Mot :</label>
            <input type="text" name="mot" value="<?php echo $mot; ?>"><br>
            <label for="definition">Définition :</label>
            <textarea name="definition"><?php echo $definition; ?></textarea><br>
            <label for="categorie">Catégorie :</label>
            <select name="categorie">
                <option value="objet" <?php if ($categorie == 'objet') echo 'selected'; ?>>Objet</option>
                <option value="action" <?php if ($categorie == 'action') echo 'selected'; ?>>Action</option>
                <option value="animaux" <?php if ($categorie == 'animaux') echo 'selected'; ?>>Animaux</option>
                <option value="couleur" <?php if ($categorie == 'couleur') echo 'selected'; ?>>Couleur</option>
                <option value="fruit_et_légume" <?php if ($categorie == 'fruit_et_légume') echo 'selected'; ?>>Fruit et légume</option>
                <option value="personnage" <?php if ($categorie == 'personnage') echo 'selected'; ?>>Personnage</option>
                <option value="sport" <?php if ($categorie == 'sport') echo 'selected'; ?>>Sport</option>
                <option value="autre" <?php if ($categorie == 'autre') echo 'selected'; ?>>Autre</option>
            </select><br>
            <input type="submit" value="Modifier">
        </form>

<?php
    } else {
        // La ligne à modifier n'existe pas, redirigez l'utilisateur vers une autre page
        header("Location: ../index.php?page=3");
        exit();
    }
} else {
    // L'identifiant n'a pas été spécifié, redirigez l'utilisateur vers une autre page
    header("Location: ../index.php?page=3");
    exit();
    }
}
?>

<!-- <?php 
  include('controller/traitement_update.php')
?> -->
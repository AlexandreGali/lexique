
<!-- 
<?php

// Vérifier si une lettre a été spécifiée dans l'URL
if (isset($_GET['letter'])) {
    // Récupérer la lettre depuis l'URL
    $letter = $_GET['letter'];

    // Requête pour récupérer les mots commençant par la lettre spécifiée
    $requete = "SELECT * FROM exolexique WHERE mot LIKE CONCAT(:letter, '%')";
    $req = $bdd->prepare($requete);
    $req->bindValue(':letter', $letter, PDO::PARAM_STR);
    $req->execute();

    // Parcourir les résultats et afficher les mots et les définitions
while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
    $firstLetter = strtoupper(substr($row['mot'], 0, 1));
    $secondLetter = strtolower(substr($row['mot'], 0, 1));
    
    echo  "<p class='test1'>" . $firstLetter . $secondLetter . "<br><br>" . $row['mot'] . "</p><br> " . "<p class='test2'>" . $row['definition'] . "</p>";
}
}
?>
<footer></footer>
</body>
</html> -->

<body>

    <div class="entete">
        <div class="affichage-lexique">
            AFFICHAGE DU LEXIQUE
        </div>
    </div>
    <div class="tableau">
        <table>
<?php
    echo '<tr>';
    for ($letter = 'A'; $letter <= 'Y'; $letter++) {
        echo '<td><a href="index.php?letter=' . $letter . '">' . $letter . '</a></td>';
    }
    echo '</tr>';
?>

        </table>
    </div>

<?php
// Votre code PHP actuel pour la récupération des mots et des définitions

$user='root';
$pass='';

try{ 
    $bdd=new PDO('mysql:host=localhost;dbname=exercice1', $user, $pass); 
}
catch(PDOException $e){ //sinon
    die('Erreur : '. $e->getMessage());
}
// Vérifier si une lettre a été spécifiée dans l'URL
if (isset($_GET['letter'])) {
    // Récupérer la lettre depuis l'URL
    $letter = $_GET['letter'];

    // Requête pour récupérer les mots commençant par la lettre spécifiée
    $requete = "SELECT * FROM exolexique WHERE mot LIKE CONCAT(:letter, '%')";
    $req = $bdd->prepare($requete);
    $req->bindValue(':letter', $letter, PDO::PARAM_STR);
    $req->execute();

    // Vérifier si des résultats sont retournés
    if ($req->rowCount() > 0) {
        ?>
        <div class="accordion" id="accordionExample">
        <?php
        // Compteur pour générer des identifiants uniques
        $counter = 1;
        
        // Parcourir les résultats et afficher les mots et les définitions dans l'accordéon
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $firstLetter = strtoupper(substr($row['mot'], 0, 1));
            $secondLetter = strtolower(substr($row['mot'], 0, 1));
            ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading<?php echo $counter; ?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $counter; ?>">
                        <?php echo $row['mot']; ?>
                    </button>
                </h2>
                <div id="collapse<?php echo $counter; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $counter; ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php echo $row['definition']; ?>
                    </div>
                </div>
            </div>
            <?php
            $counter++;
        }
        ?>
        </div>
        <?php
    } else {
        echo "Aucun mot trouvé.";
    }
}
?>

    <!-- Vos balises de fermeture ici -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
</body>
</html>

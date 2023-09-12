<?php
// saisie des definitions
    function saisieMot($bdd, $mot, $definition, $categorie) {
        $requete = "INSERT INTO exolexique (mot, definition, categorie) VALUES (:mot, :definition, :categorie)";
        $req = $bdd->prepare($requete);
        $req->bindValue(':mot', $mot, PDO::PARAM_STR);
        $req->bindValue(':definition', $definition, PDO::PARAM_STR);
        $req->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $req->execute();
    }

// affichage fonction
    function affichageGestion ($bdd) {
        $requete = "SELECT * FROM exolexique";
        $req = $bdd->prepare($requete);
        $req->execute();

        $tableau_donnees =$req->fetchAll();
        return $tableau_donnees;
    }
?>
<?php 

    if (isset($_POST['mot'], $_POST['definition'], $_POST['categorie'])
    && $_POST['mot'] != NULL
    && $_POST['definition'] != NULL
    && $_POST['categorie'] != NULL
    ) {
    $mot = htmlspecialchars($_POST['mot']);
    $definition = htmlspecialchars($_POST['definition']);
    $categorie = htmlspecialchars($_POST['categorie']);

    saisieMot($bdd, $mot, $definition, $categorie);
    }

    ?>
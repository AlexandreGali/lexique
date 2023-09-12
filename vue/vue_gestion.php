
  <style>
    .header {
      text-align: center;
      padding-top: 30px;
    }

    a {
      color: aliceblue;
      font-weight: 700;
      text-decoration: none;
      background-color: black;
      padding: 10px 20px;
      margin-top: 30px;
      border: solid 1px black;
    }

    a:hover {
      color: black;
      background-color: aliceblue;
    }

    .modif {
      background-color: whitesmoke;
      border-radius: 10px;
      color: black;
      font-weight: 500;
    }

    .modif:hover {
      color: orange;
      border: orange 1px solid;
    }

    .suppr:hover {
      color: red;
      border: red 1px solid;
    }

    .suppr {
      background-color: whitesmoke;
      border-radius: 10px;
      color: black;
      font-weight: 500;
    }

    .entete {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .gestion-definition {
      border: solid 1px black;
      max-width: 80%;
      padding: 15px 600px;
      margin-top: 100px;
      text-align: center;
      font-weight: 600;
    }

    table {
      border-collapse: collapse;
      margin-top: 30px;
      margin-left: 232px;
    }

    td,
    th {
      border: 1px solid black;
      padding: 15px 15px;
    }

    td.image-cell {
      width: 150px;
    }
  </style>


<body>
  
  <div class="entete">
    <div class="gestion-definition">
      GESTION DES DEFINITIONS
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

  <table>
    <thead>
      <tr>
        <th>Photo</th>
        <th>Catégorie</th>
        <th>Mots</th>
        <th>Définitions</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>

<?php 
  include('controller/traitement_gestion.php')
?>

</body>
</html>




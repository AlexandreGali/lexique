<?php 

foreach (affichageGestion($bdd) as $row): ?>
        <tr>
          <td class="image-cell" id="image-cell-<?php echo $row['id']; ?>">
            <?php if (!empty($row['photo'])): ?>
              <img src="<?php echo $row['photo']; ?>" alt="<?php echo $row['mot']; ?>" width="50" height="50">
            <?php endif; ?>
          </td>
          <td><?php echo $row['categorie']; ?></td>
          <td><?php echo $row['mot']; ?></td>
          <td><?php echo $row['definition']; ?></td>
          <td>
            <a href="modifier.php?id=<?php echo $row['id']; ?>" class="modif">Modifier</a>
          </td>
          <td>
            <a href="supprimer.php?id=<?php echo $row['id']; ?>" class="suppr">Supprimer</a>
          </td>
        </tr>
      <?php endforeach; ?>

  <script>
    function genererImages() {
      const accessKey = 'anpbCFFdGnTNjTghg17yoFrN88XHgpDsl0OglEjTlMU';

      <?php foreach ($results as $index => $row): ?>
        const url<?php echo $index; ?> = `https://api.unsplash.com/photos/random?query=${encodeURIComponent('<?php echo addslashes($row['mot']); ?>')}&client_id=${accessKey}`;

        fetch(url<?php echo $index; ?>)
          .then(response => response.json())
          .then(data => {
            if (!data.errors && data.urls && data.urls.small) {
              const imageCell = document.getElementById(`image-cell-<?php echo $row['id']; ?>`);
              const image = new Image();
              image.src = data.urls.small;
              image.alt = '<?php echo addslashes($row['mot']); ?>';
              image.width = 150;
              image.height = 150;
              image.onload = function() {
                imageCell.appendChild(image);
              };
            }
          })
          .catch(error => {
            console.log(error);
          });
      <?php endforeach; ?>
    }

    window.addEventListener('load', function() {
      genererImages();
    });
  </script>
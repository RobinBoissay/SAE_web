<link rel="stylesheet" href="../css/adminAlbum.css">

<section class="content">
    <h2>Albums</h2>
    <form method="POST" action="/admin/albums">
        <input type="text" name="titre" placeholder="Titre de l'album">
        <input type="text" name="annee" placeholder="Année de l'album">
        <select name="artiste_id">
            <?php foreach ($artistes as $artiste) { ?>
                <option value="<?php echo $artiste->getId(); ?>"><?php echo $artiste->getNom().$artiste->getId(); ?></option>
            <?php } ?>
        </select>
        <input type="text" name="image" placeholder="Image de l'album">
        <div class="wrapperGenre">

        
        <?php foreach ($genres as $genre) { ?>
            <div class="inputGenre">
            <input  type="checkbox" name="genres[]" value="<?php echo $genre->getId(); ?>"><?php echo $genre->getNom(); ?><br>
            </div>
        <?php } ?>
        </div>
        
        <input type="hidden" name="_method" value="POST">
        <button type="submit">Ajouter un album</button>
    </form>
    <table>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Année</th>
            <th>Artiste ID</th>
            <th>Image</th>
            <th>Genres</th>
            <th>Date</th>
            <th>Supprimer</th>
            <th>Editer</th>
        </tr>
        <?php
            foreach ($albums as $album) {
                echo "<tr>";
                echo "<td>" . $album->getId() . "</td>";
                echo "<td>" . $album->getTitre() . "</td>";
                echo "<td>" . $album->getAnnee() . "</td>";
                echo "<td>" . $album->getArtiste_Id() . "</td>";
                echo "<td>" . $album->getImage() . "</td>";
                echo "<td>";
                foreach ($albumsGenres[$album->getId()] as $genre) {
                    echo $genre->getNom() . ",<br>";
                } 
                echo "</td>";
                echo "<td>" . $album->getDate() . "</td>";
                echo "<td>
                    <form method='POST' action='/admin/albums'>
                        <input type='hidden' name='id' value='" . $album->getId() . "'>
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type='submit'>Supprimer</button>
                    </form>
                </td>";
                echo "<td>
                    <form method='POST' action='/admin/albums'>
                        <input type='hidden' name='id' value='" . $album->getId() . "'>
                        <input type='text' name='titre' placeholder='Titre de l'album'>
                        <input type='text' name='annee' placeholder='Année de l'album'>";
                        echo "<select name='artiste_id'>";
                        foreach ($artistes as $artiste) {
                            echo "<option value='" . $artiste->getId() . "'>" . $artiste->getNom() . $artiste->getId() . "</option>";
                        }
                        echo "</select>";
                        echo "<input type='text' name='image' placeholder='Image de l'album'>";
                        foreach ($genres as $genre) {
                            echo "<input type='checkbox' name='genres[]' value='" . $genre->getId() . "'>" . $genre->getNom() . "<br>";
                        }
                        
                        echo "<input type='hidden' name='_method' value='PUT'>
                        <button type='submit'>Editer</button>
                    </form>
                </td>";
                echo "</tr>";
            }
        ?>
    </table>
</section>

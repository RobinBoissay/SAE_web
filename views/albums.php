<!-- Bouton pour reset la recherche et renvoyé sur la page albums -->
<a href="/albums"><button>Reset</button></a>

<form action="/albums" method="get">
    <div>
        <label for="artist">Artiste</label>
            <select id="artist" name="artist">
                <option value="">--Choisir un artiste--</option>
                <?php foreach($artistes as $artiste)
                {
                    echo '<option value="'.$artiste->getId().'">'.$artiste->getNom().'</option>';
                }

                ?>
                </option>
            </select>
        <button type="submit">Rechercher par artiste</button>
    </div>
</form>

<form action="/albums" method="get">
    <div>
        <label for="genre">Genre</label>
            <select id="genre" name="genre">
                <option value="">--Choisir un genre--</option>
                <?php foreach($genres as $genre)
                {
                    echo '<option value="'.$genre->getId().'">'.$genre->getNom().'</option>';
                }

                ?>
                </option>
            </select>
        <button type="submit">Rechercher par genre</button>
    </div>
</form>

<form action="/albums" method="get">
    <div>
        <label for="year">Année</label>*
        <select name="year" id="year">
            <option value="">--Choisir une année--</option>
            <?php foreach($annees as $annee)
            {
                echo '<option value="'.$annee.'">'.$annee.'</option>';
            }
            ?>
        </select>
        <button type="submit">Rechercher par année</button>
    </div>
</form>


<div>

    <?php
    foreach($albums as $album)
    {
        echo '<div>';
        echo '<img src="img/'.$album->getImage().'" alt="image de l\'album '.$album->getTitre().'">';
        echo '<h3>'.$album->getTitre().'</h3>';
        echo '<p>'.$album->getAnnee().'</p>';
        echo '</div>';
    }
    ?>

</div>
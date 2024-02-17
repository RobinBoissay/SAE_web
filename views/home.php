<link href="../css/home.css" rel="stylesheet">
<section class="wrapperNouvelleSorties">
    <ul>
        <li class="barreNouvelleSortie">Les nouvelles sorties</li>

        <?php
            foreach ($albumsDerniereSorties as $album) {
                echo '<li>';
                echo '<img src="img/'.$album->getImage().'" alt="image de l\'album '.$album->getTitre().'">';
                echo '<h2>'.$album->getTitre().'</h2>';
                echo '<p>'.$album->getAnnee().'</p>';
                echo '</li>';
            }
        ?>
    </ul>

</section>
<section class="troisGenreAlbums">

    <div class="premierGenre">
        <?php
            echo '<h2>'.$genreAleatoire1->getNom().'</h2>';
            echo '<ul>';
            foreach ($albumsGenre1 as $album) {
                echo '<li>';
                echo '<img src="img/'.$album->getImage().'" alt="image de l\'album '.$album->getTitre().'">';
                echo '<h2>'.$album->getTitre().'</h2>';
                echo '<p>'.$album->getAnnee().'</p>';
                echo '</li>';
            }
            echo '</ul>';

        ?>
        
    </div>
    <div class="deuxiemeGenre">
        <?php
        echo '<h2>'.$genreAleatoire2->getNom().'</h2>';
        echo '<ul>';
        foreach ($albumsGenre2 as $album) {
            echo '<li>';
            echo '<img src="img/'.$album->getImage().'" alt="image de l\'album '.$album->getTitre().'">';
            echo '<h2>'.$album->getTitre().'</h2>';
            echo '<p>'.$album->getAnnee().'</p>';
            echo '</li>';
        }
        echo '</ul>';
        ?>

    </div>
    <div class="troisiemeGenre">
        <?php
        echo '<h2>'.$genreAleatoire3->getNom().'</h2>';
        echo '<ul>';
        foreach ($albumsGenre3 as $album) {
            echo '<li>';
            echo '<img src="img/'.$album->getImage().'" alt="image de l\'album '.$album->getTitre().'">';
            echo '<h2>'.$album->getTitre().'</h2>';
            echo '<p>'.$album->getAnnee().'</p>';
            echo '</li>';
        }
        echo '</ul>';
        ?>
    </div>

</section>

<section class="troisArtistes">
    <div class="premierArtiste"></div>
    <div class="deuxiemeArtiste"></div>
    <div class="troisiemeArtiste"></div>

</section>



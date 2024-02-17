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
    <div class="premierArtiste">
        <?php
        echo '<h2>'.$artiste1->getNom().'</h2>';
        echo '<img src="img/'.$albumArtiste1->getImage().'" alt="image de l\'album '.$albumArtiste1->getTitre().'">';
        echo '<h3>'.$albumArtiste1->getTitre().'</h2>';
        echo '<p>'.$albumArtiste1->getAnnee().'</p>';
        ?>
    </div>
    <div class="deuxiemeArtiste">
        <?php
        echo '<h2>'.$artiste2->getNom().'</h2>';
        echo '<img src="img/'.$albumArtiste2->getImage().'" alt="image de l\'album '.$albumArtiste2->getTitre().'">';
        echo '<h3>'.$albumArtiste2->getTitre().'</h2>';
        echo '<p>'.$albumArtiste2->getAnnee().'</p>';
        ?>
    </div>
        
    <div class="troisiemeArtiste">
        <?php
        echo '<h2>'.$artiste3->getNom().'</h2>';
        echo '<img src="img/'.$albumArtiste3->getImage().'" alt="image de l\'album '.$albumArtiste3->getTitre().'">';
        echo '<h3>'.$albumArtiste3->getTitre().'</h2>';
        echo '<p>'.$albumArtiste3->getAnnee().'</p>';
        ?>
    </div>

</section>



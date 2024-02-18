<link rel="stylesheet" href="../css/artistes.css">
<section class="wrapperSectionArtiste">
    <?php
        
        
        foreach($artistes as $artiste){
            echo '<div>';
            echo '<h2>'.$artiste->getNom().'</h2>';
            echo '<div>';
            foreach($albumsArtiste[$artiste->getId()] as $album){
                echo '<div>';
                echo '<img src="img/'.$album->getImage().'" alt="image de l\'album '.$album->getTitre().'">';
                echo '<h3>'.$album->getTitre().'</h3>';
                echo '<p>'.$album->getAnnee().'</p>';
                echo '</div>';

            }
            echo '</div>';
            echo '</div>';
        }

    ?>
</section>
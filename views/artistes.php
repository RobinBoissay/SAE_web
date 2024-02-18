<?php

    foreach($artistes as $artiste){
        echo '<h2>'.$artiste->getNom().'</h2>';
        foreach($albumsArtiste[$artiste->getId()] as $album){
            echo '<img src="img/'.$album->getImage().'" alt="image de l\'album '.$album->getTitre().'">';
            echo '<h3>'.$album->getTitre().'</h3>';
            echo '<p>'.$album->getAnnee().'</p>';
        }
    }

?>
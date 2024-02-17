<section class="wrapperNouvelleSorties">
    <ul>
        <!-- mon li donc pas touche -->
        <li class="barreNouvelleSortie"></li>
        <!--  -->

        <?php
            # Affiche les 8 derniers albums sortis
            foreach ($albums as $album) {
                echo '<li>';
                echo '<img src="img/'.$album->getImage().'" alt="image de l\'album '.$album->getTitre().'">';
                echo '<p>'.$album->getTitre().'</p>';
                echo '<p>'.$album->getAnnee().'</p>';
                echo '<p>'.$album->getDate().'</p>';
                echo '</li>';
            }


        ?>
        

    </ul>

</section>
<section class="troisGenreAlbums">

    <div class="premierGenre">
        <ul></ul>
    </div>
    <div class="deuxiemeGenre">
        <ul></ul>
    </div>
    <div class="troisiemeGenre">
        <ul></ul>
    </div>

</section>

<section class="troisArtistes">
    <div class="premierArtiste"></div>
    <div class="deuxiemeArtiste"></div>
    <div class="troisiemeArtiste"></div>

</section>



<link href="../css/home.css" rel="stylesheet">
<section class="wrapperNouvelleSorties">
    <ul>
        <li class="barreNouvelleSortie">Les nouvelles sorties</li>

        <?php
            foreach ($albums as $album) {
                echo '<li>';
                echo '<img src="img/'.$album->getImage().'" alt="image de l\'album '.$album->getTitre().'">';
                echo '<h2>'.$album->getTitre().'</h2>';
                echo '<p>'.$album->getAnnee().'</p>';
                echo '<p>'.$album->getDate().'</p>';
                echo '</li>';
            }
        ?>
    </ul>

</section>
<section class="troisGenreAlbums">
    <div class="barTransitionGenre">
        <p class="numGenre"> 3 &nbsp &nbsp<img src="img/headphone.svg" alt="image de casque de musique"> Styles </p>
        <p> aléatoires</p>
    
    </div>
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



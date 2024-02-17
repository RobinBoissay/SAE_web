<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../public/css/header.css" rel="stylesheet" />
    <link href="../public/css/base.css" rel="stylesheet" />
    <link href="../public/css/home.css" rel="stylesheet" />

    <script defer src="../public/js/header.js"></script>
</head>
<body>
    <!--  Partie Header  -->
    <header> 
        <nav class="navigation">
            <div id="menuToggle">

                <input type="checkbox" />
                

                <span></span>
                <span></span>
                <span></span>

                <ul class="cacher">
                    <a href="#"><li>Playlist</li></a>
                    <a href="#"><li>Albums</li></a>
                    <a href="#"><li>Artistes</li></a>
                </ul>
            </div>
        </nav>

        <div class="WrapperSearchBar">
            <form action="">
                <input class="searchBar" type="text">
                <input class="btnSearch" type="submit" value="">
            </form>
        </div>
        
        <div class="connection">
            <button> Se connecter</button>
        </div>

    </header>
    <!-- Fin partie Header  -->

    <main>
        <section class="wrapperNouvelleSorties">
            <ul>
                <!-- mon li donc pas touche -->
                <li class="barreNouvelleSortie"></li>
                <!--  -->

                <!-- Tes 8 li à toi -->
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <!--  -->

                

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
    </main>

</body>
</html>
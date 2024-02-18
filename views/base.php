<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        if(isset($adminNav)){
            echo '<link href="../css/header.css" rel="stylesheet" />';
            echo '<link href="../css/base.css" rel="stylesheet" />';
            echo '<script defer src="../js/header.js"></script>';
        } else{
            echo '<link href="css/header.css" rel="stylesheet" />';
            echo '<link href="css/base.css" rel="stylesheet" />';
            echo '<script defer src="js/header.js"></script>';            
        }
    ?>
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
                <a href="/"><li>Accueil</li></a>
                <!-- <a href="/playlist"><li>Playlist</li></a> -->
                <a href="/albums"><li>Albums</li></a>
                <a href="/artistes"><li>Artistes</li></a>
                </ul>
            </div>
        </nav>

        <div class="WrapperSearchBar">
            <form action="/albums" method="GET">
                <input class="searchBar" type="text" id="search" name="search" placeholder="Rechercher">
                <input class="btnSearch" type="submit" value="">
            </form>
        </div>
        <div><a href="/admin">Admin</a></div>

    </header>
    <main>
        <?= $adminNav ?>
        <?= $content ?>
    </main>


</body>
</html>
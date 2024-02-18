<link rel="stylesheet" href="../css/admin.css">

<section class="dashboard">
    <h1>Dashboard</h1>
    <div class="wrapperDashboard">
        <div class="wrapperDashboardLeft">
            <div class="wrapperDashboardLeftTop">
                <div class="wrapperDashboardLeftTopLeft">
                    <h2>Albums</h2>
                    <p>Nombre d'albums : <?= $nbAlbums ?></p>
                </div>
                <div class="wrapperDashboardLeftTopRight">
                    <h2>Artistes</h2>
                    <p>Nombre d'artistes : <?= $nbArtistes ?></p>
                </div>
            </div>
            <div class="wrapperDashboardLeftBottom">
                <div class="wrapperDashboardLeftBottomLeft">
                    <h2>Genres</h2>
                    <p>Nombre de genres : <?= $nbGenres ?></p>
                </div>
                <div class="wrapperDashboardLeftBottomRight">
                    <h2>Utilisateurs</h2>
                    <p>Nombre d'utilisateurs : <?= $nbUsers ?></p>
                </div>
            </div>
        </div>
        <div class="wrapperDashboardRight">
            <h2>Albums recemment ajoutée</h2>
            <ul>
                <?php
                foreach ($albumsRecents as $album) {
                    echo '<li>';
                    echo '<img src="img/' . $album->getImage() . '" alt="image de l\'album ' . $album->getTitre() . '">';
                    echo '<h2>' . $album->getTitre() . '</h2>';
                    echo '<p>' . $album->getAnnee() . '</p>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
    </div>
</section>
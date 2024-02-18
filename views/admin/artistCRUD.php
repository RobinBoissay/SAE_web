<section class="content">
    <h2>Artistes</h2>
    <form method="POST" action="/admin/artists">
        <input type="text" name="nom" placeholder="Nom de l'artiste">
        <input type="hidden" name="_method" value="POST">
        <button type="submit">Ajouter un artiste</button>
    </form>
    <table>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Supprimer</th>
            <th>Editer</th>
        </tr>
        <?php
            foreach ($artistes as $artiste) {
                echo "<tr>";
                echo "<td>" . $artiste->getId() . "</td>";
                echo "<td>" . $artiste->getNom() . "</td>";
                echo "<td>
                    <form method='POST' action='/admin/artists'>
                        <input type='hidden' name='id' value='" . $artiste->getId() . "'>
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type='submit'>Supprimer</button>
                    </form>
                </td>";
                echo "<td>
                    <form method='POST' action='/admin/artists'>
                        <input type='hidden' name='id' value='" . $artiste->getId() . "'>
                        <input type='text' name='nom' placeholder='" .$artiste->getNom()."'>
                        <input type='hidden' name='_method' value='PUT'>
                        <button type='submit'>Editer</button>
                    </form>
                </td>";
                echo "</tr>";
            }
        ?>
    </table>
</section>
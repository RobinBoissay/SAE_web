<link href="../css/adminArtist.css" rel="stylesheet">
<section class="content">
    <h2>Genres</h2>
    <form method="POST" action="/admin/genres">
        <input type="text" name="nom" placeholder="Nom du genre">
        <input type="hidden" name="_method" value="POST">
        <button type="submit">Ajouter un genre</button>
    </form>
    <table>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Supprimer</th>
            <th>Editer</th>
        </tr>
        <?php
            foreach ($genres as $genre) {
                echo "<tr>";
                echo "<td>" . $genre->getId() . "</td>";
                echo "<td>" . $genre->getNom() . "</td>";
                echo "<td>
                    <form method='POST' action='/admin/genres'>
                        <input type='hidden' name='id' value='" . $genre->getId() . "'>
                        <input type='hidden' name='_method' value='DELETE'>
                        <button type='submit'>Supprimer</button>
                    </form>
                </td>";
                echo "<td>
                    <form method='POST' action='/admin/genres'>
                        <input type='hidden' name='id' value='" . $genre->getId() . "'>
                        <input type='text' name='nom' placeholder='Nom du genre'>
                        <input type='hidden' name='_method' value='PUT'>
                        <button type='submit'>Editer</button>
                    </form>
                </td>";
                echo "</tr>";
            }
        ?>
    </table>
</section>

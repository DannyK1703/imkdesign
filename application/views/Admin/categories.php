<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">Titre</th>
        <th scope="col">Operations</th>

    </tr>
    </thead>
    <tbody>
    <?php
        $i=1;
        foreach ($categ as $cat){
            echo '<tr></tr><th scope="row">'.$i.'</th>
            <td>'.$cat->nomCategorie.'</td>
            <td><a href="">modif</a><a href="">supp</a></tr>';
            $i++;
        }

    ?>

    </tbody>
</table>
<a class="btn btn-outline-secondary btn-lg btn-block" href="<?= site_url('admin/newCategorie');?>">Nouvelle Categorie</a>

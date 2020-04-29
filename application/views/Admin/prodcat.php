<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">Image</th>
        <th scope="col">NomArticle</th>
        <th scope="col">Description</th>
        <th scope="col">Prix</th>
        <th scope="col">etat</th>
        <th scope="col">Operations</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
    foreach ($prods as $art){
        echo '<tr></tr><th scope="row">'.$i.'</th>
            <td><img style="max-width: 50px;max-height: 50px" src="'.base_url('Assets/images/product/"'.$art->imgArticle).'/></td>
            <td>'.$art->NomArticle.'</td>
            <td>'.$art->DescArticle.'</td>
            <td>'.$art->PrixArticle.'</td>
            <td>'.$art->etat.'</td>
            <td><a href="">modif</a><a href="">supp</a></tr>';
        $i++;
    }
    ?>

    </tbody>
</table>
<button class="btn-outline-light"><a href="<?= site_url('admins/newArticle');?>">Nouvel Article</a></button>

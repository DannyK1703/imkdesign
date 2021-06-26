<table class="table" style="max-width: 70%;margin-left: 15%">
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
            <td><img style="min-width:80px;max-width: 80px;max-height: 80px;min-height: 80px" src="'.base_url('Assets/img/product/'.$art->imgArticle).'"/></td>
            <td>'.$art->NomArticle.'</td>
            <td>'.$art->DescArticle.'</td>
            <td>'.$art->PrixArticle.'</td>
            <td>'.$art->etat.'</td>
           
<td><a class="btn btn-outline-primary" href="'.site_url('Admin/modifierArt/'.$art->idArticles).'"><i class="flaticon-edit" ></i></a>
    <a class="btn btn-outline-danger" href="'.site_url('Admin/suppArticle/'.$art->idArticles).'"><i class="flaticon-cancel" ></i></a></tr>';
    $i++;
    }
    ?>

    </tbody>
    </table>
    <a style="max-width: 40%;margin-left: 30%;" class="btn btn-outline-info btn-lg btn-block" href="<?= site_url('Admin/newArticle/'.$cat);?>"><i class="flaticon-add" ></i>Nouvel Article</a>
<?php include('footer.php');?>
<table class="table" style="max-width: 70%;margin-left: 15%">
    <thead class="thead-dark">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">Titre</th>
        <th scope="col">Description</th>
        <th scope="col">Operations</th>

    </tr>
    </thead>
    <tbody>
    <?php
        $i=1;
        foreach ($categ as $cat){
            echo '<tr></tr><th scope="row">'.$i.'</th>
            <td>'.$cat->nomCategorie.'</td>
            <td>'.$cat->descCategorie.'</td>
            <td><a class="btn btn-outline-primary" href="'.site_url('Admin/modifierCat/'.$cat->idcategorie).'"><i class="flaticon-edit" ></i></a>
                <a class="btn btn-outline-danger" href="'.site_url('Admin/suppCat/'.$cat->idcategorie).'"><i class="flaticon-cancel" ></i></a>
                <a class="btn btn-outline-warning" href="'.site_url('Admin/prodCat/'.$cat->idcategorie).'"><i class="flaticon-padnote" ></i></a></tr>';

            $i++;
        }

    ?>

    </tbody>
</table>
<a style="max-width: 40%;margin-left: 30%;" class="btn btn-outline-info btn-lg btn-block" href="<?= site_url('admin/newCategorie');?>"><i class="flaticon-add" ></i>Nouvelle Categorie</a>
<?php include('footer.php');?>
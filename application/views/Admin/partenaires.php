<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">Nom</th>
        <th scope="col">Image</th>
        <th scope="col">SITE</th>
        <th scope="col">Operations</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
    foreach ($part as $mbr){
        echo '<tr></tr><th scope="row">'.$i.'</th>
            <td>'.$mbr->NomPartenaires.'</td>
            <td><img style="max-width: 40px;max-height: 40px" src="'.base_url('Asset/images/membres/'.$mbr->imgPartenaires).'"></td>
           <td>'.$mbr->WebPartenaires.'</td>
            <td><a class="btn btn-outline-primary" href="'.site_url('Admin/modifierPart/'.$mbr->idPartenaires).'"><i class="flaticon-edit" ></i></a>
                <a class="btn btn-outline-danger" href="'.site_url('Admin/suppPart/'.$mbr->idPartenaires).'"><i class="flaticon-cancel" ></i></a></tr>';
            $i++;
    }
    ?>

    </tbody>
</table>
<a style="max-width: 40%;margin-left: 30%;" class="btn btn-outline-info btn-lg btn-block" href="<?= site_url('admin/newPartenaires');?>"><i class="flaticon-add" ></i>Nouveau Partenaire</a>

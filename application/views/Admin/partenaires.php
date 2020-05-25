<table class="table" style="max-width: 70%;margin-left: 15%">
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
            <td><img style="max-width: 80px;max-height: 80px; min-height: 80px; min-width: 80px;" src="'.base_url('Assets/images/part/'.$mbr->imagePartenaires).'"></td>
           <td>'.$mbr->WebPartenaires.'</td>
            <td><a class="btn btn-outline-primary" href="'.site_url('Admin/modifierPart/'.$mbr->idPartenaires).'"><i class="flaticon-edit" ></i></a>
                <a class="btn btn-outline-danger" href="'.site_url('Admin/suppPart/'.$mbr->idPartenaires).'"><i class="flaticon-cancel" ></i></a></tr>';
            $i++;
    }
    ?>

    </tbody>
</table>
<a style="max-width: 40%;margin-left: 30%;" class="btn btn-outline-info btn-lg btn-block" href="<?= site_url('admin/newPartenaire');?>"><i class="flaticon-add" ></i>Nouveau Partenaire</a>

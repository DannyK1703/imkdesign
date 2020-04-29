<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">Nom</th>
        <th scope="col">Desccription</th>
        <th scope="col">Email</th>
        <th scope="col">Image</th>
        <th scope="col">Operations</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
    foreach ($mbres as $mbr){
        echo '<tr></tr><th scope="row">'.$i.'</th>
            <td>'.$mbr->NomMembre.'</td>
            <td>'.$mbr->DescMembre.'</td>
            <td>'.$mbr->email.'</td>
            <td><img style="max-width: 40px;max-height: 40px" src="'.base_url('Asset/images/membres/'.$mbr->imgMembre).'"></td>
            <td><a class="btn btn-outline-primary" href="'.site_url('Admin/modifierMembre/'.$mbr->idMembre).'"><i class="flaticon-edit" ></i></a>
                <a class="btn btn-outline-danger" href="'.site_url('Admin/suppMembre/'.$mbr->idMembre).'"><i class="flaticon-cancel" ></i></a></tr>';
            $i++;
    }
    ?>

    </tbody>
</table>

<a style="max-width: 40%;margin-left: 30%;" class="btn btn-outline-info btn-lg btn-block" href="<?= site_url('admin/newMembre');?>"><i class="flaticon-add" ></i>Nouveau Membre</a>

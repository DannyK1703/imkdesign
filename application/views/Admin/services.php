<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">Nom</th>
        <th scope="col">Description</th>
        <th scope="col">Logo</th>
        <th scope="col">Operations</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
    foreach ($serv as $mbr){
        echo '<tr></tr><th scope="row">'.$i.'</th>
            <td>'.$mbr->NomService.'</td>
            <td>'.$mbr->DescService.'</td>
            <td><img src="'.base_url('Assets/membres/'.$mbr->logoService).'"</td>
            
            <td><a class="btn btn-outline-primary" href="'.site_url('Admin/modifierServ/'.$mbr->idServvice).'"><i class="flaticon-edit" ></i></a>
                <a class="btn btn-outline-danger" href="'.site_url('Admin/suppServ/'.$mbr->idService).'"><i class="flaticon-cancel" ></i></a></tr>';
            $i++;
    }
    ?>

    </tbody>
</table>
<a style="max-width: 40%;margin-left: 30%;" class="btn btn-outline-info btn-lg btn-block" href="<?= site_url('admin/newService');?>"><i class="flaticon-add" ></i>Nouveau Service</a>


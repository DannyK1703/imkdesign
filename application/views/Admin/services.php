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
            
            <td><a href="">modif</a><a href="">supp</a></tr>';
        $i++;
    }
    ?>

    </tbody>
</table>
<button class="btn-outline-light"><a href="<?= site_url('admins/newService');?>">Nouveau Service</a></button>



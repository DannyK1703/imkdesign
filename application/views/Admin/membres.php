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
            <td><img src="'.base_url('Assets/membres/'.$mbr->imgMembre).'"</td>
            <td><a href="">modif</a><a href="">supp</a></tr>';
        $i++;
    }
    ?>

    </tbody>
</table>
<button class="btn-outline-light"><a href="<?= site_url('admins/newMembre');?>">Nouveau Membre</a></button>

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
            <td><img src="'.base_url('Assets/membres/'.$mbr->imagePartenaires).'"</td>
            <td>'.$mbr->WebPartenaires.'</td>
            <td><a href="">modif</a><a href="">supp</a></tr>';
        $i++;
    }
    ?>

    </tbody>
</table>



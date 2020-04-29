<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">Nom</th>
        <th scope="col">Email</th>
        <th scope="col">Image</th>
        <th scope="col">Operations</th>

    </tr>
    </thead>
    <tbody>
    <?php
    $i=0;
    foreach ($adm as $mbr){
        echo '<tr></tr><th scope="row">'.$i.'</th>
            <td>'.$mbr->NomAdmin.'</td>
            <td>'.$mbr->EmailAdmin.'</td>
            <td><img src="'.base_url('Assets/membres/'.$mbr->img).'"</td>
            
            <td><a href="">modif</a><a href="">supp</a></tr>';
        $i++;
    }
    ?>

    </tbody>
</table>



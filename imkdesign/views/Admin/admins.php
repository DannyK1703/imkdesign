<table class="table" style="max-width: 70%;margin-left: 15%">
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
    $i=1;
    $a=$this->session->login;
    foreach ($adm as $mbr){

        echo '<tr></tr><th scope="row">'.$i.'</th>
            <td>'.$mbr->NomAdmin.'</td>
            <td>'.$mbr->EmailAdmin.'</td>
            <td><img style="max-width: 80px;max-height: 80%" src="'.base_url('Assets/images/Admins/'.$mbr->img).'"</td>
            
            
            
<td> <a class="btn btn-outline-danger" href="'.site_url('Admin/suppAdmin/'.$mbr->idAdmin.'/'.$a).'"><i class="flaticon-cancel" ></i></a></tr>';
    $i++;
    }
    ?>

    </tbody>
    </table>
    <a style="max-width: 40%;margin-left: 30%;" class="btn btn-outline-info btn-lg btn-block" href="<?= site_url('Admin/newAdmin');?>"><i class="flaticon-add" ></i>Nouvel Admin</a>

<?php include('footer.php');?>

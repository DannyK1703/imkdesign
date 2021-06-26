<table class="table" style="max-width: 70%;margin-left: 15%">
    <thead class="thead-dark">
    <tr>
        <th scope="col">N°</th>
        <th scope="col">Nom</th>
        <th scope="col">Email</th>
        <th scope="col">Contenu</th>

    </tr>
    </thead>
    <tbody>
<?php
$i=0;
foreach ($qst as $mbr){
    echo '<tr></tr><th scope="row">'.$i.'</th>
            <td>'.$mbr->Nom.'</td>
            <td>'.$mbr->Email.'</td>
            <td>'.$mbr->Message.'</td>';$i++;}?>
<?php include('footer.php');?>

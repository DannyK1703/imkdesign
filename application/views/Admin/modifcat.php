
<form method="post" action="<?=site_url('Admin/modifcat/'.$idcategorie);?>">
     <input type="text" value="<?=$nomCategorie?>" name ="titre">
     <input type="text" value="<?=$descCategorie?>" name="desc">
    <input type="submit" value="valider">
</form>
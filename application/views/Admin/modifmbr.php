
<form method="post" action="<?=site_url('Admin/modifMembre/'.$idMembre);?>">
    <input type="text" value="<?=$NomMembre?>" name ="titre">
    <input type="text" value="<?=$DescMembre?>" name="desc">
    <input type="email" value="<?=$email?>" name="mail">
    <input type="file" value="<?=$imgMembre?>" name="img">
    <input type="submit" value="valider">
</form>
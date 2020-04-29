<?php include('navAdmin.php');?>
<h4 class="h4">Ajouter Article</h4>
<form class="form-group" method="post" action="<?=site_url('admin/AddArticle');?>">
    <input class="" name="nom" type="text"/>
    <textarea class="" name="desc"></textarea>
    <input class="" name="prix" type="text"/>
    <select name="categorie">
        <?php foreach ($categ as $cat){

        echp '<option>''</option>';
    </select>
</form>


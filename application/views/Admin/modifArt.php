<style>
    .form-group{
        max-width: 50%;
        margin-left: 25%;
    }
</style>
<h4 style="text-align: center;margin-bottom: 50px;margin-top: 50px">Modifier Article</h4>

<form action="<?=site_url('Admin/modifArticle/'.$idArticles.'/'.$categorie_idcategorie);?>" method="post" enctype="multipart/form-data">

    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3" value="<?=$NomArticle?>" name ="nom" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3" value="<?=$DescArticle?>" name="desc" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Prix</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3" value="<?=$PrixArticle?>" name="prix" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="exampleInputText3" value="<?=$imgArticle?>" name="img" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Etat</label>
        <div class="col-sm-10">
            <select id="inputState" class="form-control" name="etat" required>
                <option selected name="all" value="all">...</option>
                <option name="Promotion" value="Promotion">Promotion</option>
                <option name="Arrivage" value="Arrivage">Arrivage</option>
            </select>
        </div>

    </div>
    <input style="max-width: 50%;margin-left: 25%;" class="btn btn-outline-primary btn-lg btn-block" type="submit" value="valider">
</form>
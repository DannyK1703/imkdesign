
<style>
    .form-group{
        max-width: 50%;
        margin-left: 25%;
    }
</style>
<h4 style="text-align: center;margin-bottom: 50px;margin-top: 50px">Modifier Partenaire</h4>

    <form action="<?=site_url('Admin/modifPart/'.$idPartenaires);?>" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3" value="<?=$NomPartenaires?>" name ="nom" required>
        </div>
    </div><div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Site Web</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3" value="<?=$WebPartenaires?>" name="web" required>
        </div>
    </div><div class="form-group row">
        <label for="inputFile3" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
    <input type="file" class="form-control" id="exampleInputFile3"value="<?=$imagePartenaires?>" name="img" required>
        </div></div>
    <input style="max-width: 50%;margin-left: 25%;" class="btn btn-outline-primary btn-lg btn-block" type="submit" value="valider">
</form>
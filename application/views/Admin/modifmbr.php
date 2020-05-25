<style>
    .form-group{
        max-width: 50%;
        margin-left: 25%;
    }
</style>
<h4 style="text-align: center;margin-bottom: 50px;margin-top: 50px">Modifier Membre</h4>
    <form action="<?=site_url('Admin/modifMembre/'.$idMembre);?>" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3" value="<?=$NomMembre?>" name ="titre" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3" value="<?=$DescMembre?>" name="desc" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="exampleInputEmail3" value="<?=$email?>" name="mail" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputFile3" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="exampleInputFile3" value="<?=$imgMembre?>" name="img" required>
        </div>
    </div>

    <input style="max-width: 50%;margin-left: 25%;" class="btn btn-outline-primary btn-lg btn-block" type="submit" value="valider">
</form
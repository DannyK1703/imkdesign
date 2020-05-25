<style>
    .form-group{
        max-width: 50%;
        margin-left: 25%;
    }
</style>
<h4 style="text-align: center;margin-bottom: 50px;margin-top: 50px">Ajouter Categorie</h4>
<form method="post" action="<?=site_url('Admin/AddCat');?>">

    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" type="text" class="form-control" id="exampleInputText3"  name ="titre" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" type="text" class="form-control" id="exampleInputText3"  name="desc" required>
        </div>
    </div>

    <input style="max-width: 50%;margin-left: 25%;" class="btn btn-outline-primary btn-lg btn-block" type="submit" value="valider">
</form
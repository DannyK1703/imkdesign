<style>
    .form-group{
        max-width: 50%;
        margin-left: 25%;
    }
</style>
<h4 style="text-align: center;margin-bottom: 50px;margin-top: 50px">Modifier Service</h4>
<form method="post" action="<?=site_url('Admin/modifServ/'.$idService);?>">

    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3" value="<?=$NomService?>" name ="nom" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3" value="<?=$DescService?>" name="desc" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputFile3" class="col-sm-2 col-form-label">Logo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3" value="<?=$logoService?>" name="logo" required>
        </div>
    </div>
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>

    <input style="max-width: 50%;margin-left: 25%;" class="btn btn-outline-primary btn-lg btn-block" type="submit" value="valider">
</form>

<style>
    .form-group{
        max-width: 50%;
        margin-left: 25%;
    }
</style>
<h4 style="text-align: center;margin-bottom: 50px;margin-top: 50px">Ajouter Partenaire</h4>
    <form action="<?=site_url('Admin/AddPart');?>" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3"  name ="nom" required>
        </div>
    </div><div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Site Web</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3"  name="web" required>
        </div>
    </div><div class="form-group row">
        <label for="inputFile3" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="exampleInputFile3" name="img" required>
        </div></div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>

        <input style="max-width: 50%;margin-left: 25%;" class="btn btn-outline-primary btn-lg btn-block" type="submit" value="valider">
</form>
<?php include('footer.php');?>
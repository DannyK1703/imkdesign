<style>
    .form-group{
        max-width: 50%;
        margin-left: 25%;
    }
    .custom-file{
        width: 100%;

    }
</style>
<h4 style="text-align: center;margin-bottom: 50px;margin-top: 50px">Admin Article</h4>

    <form class="was-validated" action="<?=site_url('Admin/AddArticle/'.$idcat);?>" method="post" enctype="multipart/form-data">
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3"  name ="nom" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3"  name="desc" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Prix :$</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3" name="prix" required>
        </div>
    </div>

        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>



        <div class="form-group row" >
            <label for="InputFile3" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
                <input type="file" name="image" class="form-control-file" id="validatedCustomFile" required>
            </div>
        </div>

    <div class="form-group row">
        <label for="inputState" class="col-sm-2 col-form-label">Etat</label>
        <div class="col-sm-10">
            <select id="inputState" class="form-control" name="etat">

                <option selected name="Promotion" value="Promotion">Promotion</option>
                <option name="Arrivage" value="Arrivage">Arrivage</option>
                <option name="Autre" value="Autre">Autre</option>
            </select>
        </div>

    </div>
    <input style="max-width: 50%;margin-left: 25%;" class="btn btn-outline-primary btn-lg btn-block" type="submit" value="valider">
</form>
<?php include('footer.php');?>
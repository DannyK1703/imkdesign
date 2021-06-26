<style>
    .form-group{
        max-width: 50%;
        margin-left: 25%;
    }
</style>
<h4 style="text-align: center;margin-bottom: 50px;margin-top: 50px">Ajouter Membre</h4>
    <form action="<?=site_url('Admin/AddMembre');?>" method="post" enctype="multipart/form-data">

    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3"  name ="nom" required>
        </div>
    </div>
        <div class="form-group row">
            <label for="inputText3" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="exampleInputText3"  name ="phone" value="+243" required>
            </div>
        </div>
    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="exampleInputText3"  name="desc" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="exampleInputEmail3"  name="mail" required>
        </div>
    </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>

        <div class="form-group row">
        <label for="inputFile3" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="exampleInputFile3"  name="img" required>
        </div>
    </div>

    <input style="max-width: 50%;margin-left: 25%;" class="btn btn-outline-primary btn-lg btn-block" type="submit" value="valider">
</form>
<?php include('footer.php');?>
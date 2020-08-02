<style>
    .form-group{
        max-width: 50%;
        margin-left: 25%;
    }
</style>
<h4 style="text-align: center;margin-bottom: 50px;margin-top: 50px">Ajouter Admin</h4>
<form method="post" action="<?=site_url('Admin/AddAdmin');?>" enctype="multipart/form-data">

    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Nom</label>
        <div class="col-sm-10">
            <input type="text" type="text" class="form-control" id="exampleInputText3"  name ="nom" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="text" type="email" class="form-control" id="exampleInputEmail3"  name="mail" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Login</label>
        <div class="col-sm-10">
            <input type="text" type="text" class="form-control" id="exampleInputText3"  name="login" required>
        </div>
    </div>

    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>

    <input style="max-width: 50%;margin-left: 25%;" class="btn btn-outline-primary btn-lg btn-block" type="submit" value="valider">
</form

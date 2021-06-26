<style>
    .form-group{
        max-width: 50%;
        margin-left: 25%;
    }
</style>

<h4 style="text-align: center;margin-bottom: 50px;margin-top: 50px">Modifier Profile</h4>

    <form action="<?=site_url('Admin/ModifAdmin/'.$idAdmin);?>" method="post" enctype="multipart/form-data">

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input  type="email" value="<?= $EmailAdmin?>" class="form-control" id="exampleInputEmail3"  name="mail" required>
            <em><?php echo form_error('mail')?></em>
        </div>
    </div>
        <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>"/>

        <div class="form-group row">
        <label for="inputText3" class="col-sm-2 col-form-label">Login</label>
        <div class="col-sm-10">
            <input type="text" type="text" value="<?= $Login?>"class="form-control" id="exampleInputText3"  name="login" required>
            <em><?php echo form_error('login')?></em>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" value="<?= $Mdp?>" class="col-sm-2 col-form-label">Mdp</label>
        <div class="col-sm-10">
            <input type="text" type="password" class="form-control" id="exampleInputPassword3"  name ="mdp" required>
            <em><?php echo form_error('mdp')?></em>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputFile3" class="col-sm-2 col-form-label">Profile</label>
        <div class="col-sm-10">
            <input  type="file" value="<?= $img?>" class="form-control" id="exampleInputFile3"  name ="userfile" required>
            <em><?php echo form_error('userfile')?></em>
        </div>
    </div>

    <input style="max-width: 50%;margin-left: 25%;" class="btn btn-outline-primary btn-lg btn-block" type="submit" value="valider">
</form

<?php include('footer.php');?>
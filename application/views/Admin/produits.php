<?php
    include('navAdmin.php');
    ?>
<div class="container" style="margin-top: -450px;">
    <div class="card">
        <form class="was-validated">
            <div class=" mb-2">
                <label for="validationServer01">First name</label>
                <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="Mark" required>
                <div class="valid-feedback">
                    Looks good!
                </div>

            </div>
            <div class="mb-3">
                <label for="validationTextarea">Description</label>
                <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                <div class="invalid-feedback">
                    Please enter a message in the textarea.
                </div>
            </div>

            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                <label class="custom-control-label" for="customControlValidation1">White</label>
                <div class="invalid-feedback">Example invalid feedback text</div>
            </div>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customControlValidation4" required>
                <label class="custom-control-label" for="customControlValidation4">Black</label>
                <div class="invalid-feedback">Example invalid feedback text</div>
            </div>

            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                <label class="custom-control-label" for="customControlValidation2">Toggle this custom radio</label>
            </div>
            <div class="custom-control custom-radio mb-3">
                <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" required>
                <label class="custom-control-label" for="customControlValidation3">Or toggle this other custom radio</label>
                <div class="invalid-feedback">More example invalid feedback text</div>
            </div>

            <div class="form-group">
                <select class="custom-select" required>
                    <option value="">Cathegorie</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <div class="invalid-feedback">Example invalid custom select feedback</div>
            </div>

            <div class="custom-file">
                <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                <label class="custom-control-label" for="customSwitch1">Activer</label>
            </div>
        </form>
    </div>
</div>
<?php include('footer.php');?>




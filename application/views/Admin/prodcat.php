<?php
    include ('navbar.php');
?>
<div class="container" style="margin-top: -450px;">
    <div class="card">
        <div class="card-header bg-dark">
            <label for="colFormLabelLg " class="col-sm-3 col-form-label col-form-label-lg text-info">Produits</label>
        </div>
        <div class="card-body">
            <div class="product-item">
                <div class="pi-pic">
                    <div class="tag-new">New</div>
                    <img src="<?=base_url('Assets/img/product/c3y.jpg');?>" alt="">
                    <div class="pi-links">
                        <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                        <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                    </div>
                </div>
                <div class="pi-text">
                    <h6>$35,00</h6>
                    <p>Black and White Stripes Dress</p>
                </div>
            </div>


        </div>
        <div class="card-footer text-muted bg-dark" >
            <button class="" type="submit">exit</button>
        </div>
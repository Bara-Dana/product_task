<?php require_once APPROOT . '/view/includes/header.php'; ?>


<h1>Product List</h1>

<div class="d-flex justify-content-end">

    <a href="<?php echo URLROOT; ?>/add" class="btn btn-primary pull-right">ADD</a>

    <a href="<?php echo URLROOT; ?>/products/deleteProduct" class="btn btn-danger" name= "btn">DELETE</a>
</div>
<hr>

<div class="row">

    <?php foreach ($data as $product) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12  text-sm-center ">
            <div class="card">

                <p><input style="margin-right: 80%" id="checkbox_id" type="checkbox" class="select text-lf-center" name="is_selected[]"
                value="<?php echo $product->getId(); ?>"></p>
                <input type="hidden" name="is_selected" />

                <p class="card-text"> <?php echo $product->getSku(); ?>
                <p class="card-text"> <?php echo $product->getName(); ?>
                <p class="card-text"> <?php echo $product->getPrice(); ?>$
                <p class="card-text"> <?php echo $product->getAttribute()->getDisplayAttributes(); ?> </>
            </div>
        </div>
    <?php endforeach; ?>

</div>


<?php require_once APPROOT . '/view/includes/footer.php'; ?>
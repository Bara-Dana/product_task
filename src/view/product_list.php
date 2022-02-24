<?php require_once APPROOT . '/view/includes/header.php'; ?>



<form name="product-form" method="POST" action="<?php echo URLROOT; ?>/products/deleteProduct">

<h1>Product List</h1>

<div class="d-flex justify-content-end">

    <a href="<?php echo URLROOT; ?>/add" class="btn btn-primary pull-right">ADD</a>

    <button type="submit" class="btn btn-danger">MASS DELETE</button>
</div>
<hr>

<div class="row">

    <?php foreach ($data as $product) : ?>
        <div class="col-lg-3 col-md-6 col-sm-12  text-sm-center ">
            <div class="card">

                <p><input style="margin-right: 80%" id=",delete-checkbox" type="checkbox" class="delete-checkbox" name="is_selected[]"
                value="<?php echo $product->getId(); ?>"></p>

                <p class="card-text"> <?php echo $product->getSku(); ?>
                <p class="card-text"> <?php echo $product->getName(); ?>
                <p class="card-text"> <?php echo $product->getPrice(); ?>$
                <p class="card-text"> <?php echo $product->getAttribute()->getDisplayAttributes(); ?> </>
            </div>
            <br>
        </div>
    <?php endforeach; ?>

</div>

</form>
<?php require_once APPROOT . '/view/includes/footer.php'; ?>
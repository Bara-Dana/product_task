<?php require_once APPROOT . '/view/includes/header.php'; ?>


<h1>Product List</h1>

<div class="d-flex justify-content-end">

    <a href="<?php echo URLROOT; ?>/add" class="btn btn-primary pull-right">Add</a>

    <a href="<?php echo URLROOT; ?>/products/deleteProduct" class="btn btn-danger">DELETE</a>
</div>

<section class="threeColumns">

    <?php foreach ($data as $product) : ?>
        <div class="card-body">
            <p class="card-text"> <?php echo $product->getSku(); ?>
            <p class="card-text"> <?php echo $product->getName(); ?>
            <p class="card-text"> <?php echo $product->getPrice(); ?>
            <p class="card-text"> <?php echo $product->getAttribute()->getDisplayAttributes(); ?> </>
        </div>
    <?php endforeach; ?>

</section>


<?php require_once APPROOT . '/view/includes/footer.php'; ?>
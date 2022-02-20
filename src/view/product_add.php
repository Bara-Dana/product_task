<?php require_once APPROOT . '/view/includes/header.php'; ?>

<h1>Product Add</h1>

<form name="product-form" method="POST" action="<?php echo URLROOT; ?>/add/addProduct">


    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary" >Save</button>
        <button type="submit" class="btn btn-danger">Cancel</button>
    </div>
    <hr>
    <div class="form-group">
        <label for="form-control" class="form-label">SKU</label>
        <input name="sku" type="text" class="form-control" id="sku" placeholder="sku" >
    </div>

    <div class="form-group">
        <label for="form-control" class="form-label">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="name">
        <?php
?>
    </div>

    <div class="form-group">
        <label for="form-control" class="form-label">Price</label>
        <input name="price" type="number" class="form-control" id="price" placeholder="price" >
    </div>

    <div class="form-group">
     <label>Choose Type</label>

        <select class="form-attributes"  name="item" id="type" >
            <option value="">--Choose Type--</option>

            <option value="dvd">DVD</option>
            <option value="furniture">Furniture</option>
            <option value="book">Book</option>
        </select>
</div>
    <div >
        <div class="dvd attributes" style="display: none;">
            <label for="form-group" class="form-label">Size</label>
            <input name="size" type="number" class="form-group"  display="block">
            <p class="card-text">Enter storage capacity of a DVD in megabytes.</p>

        </div>
</div>

    <div>
        <div class="book attributes" style="display: none">
            <label for="form-group" class="form-label">Weight</label>
            <input name="weight" type="number" class="form-group" display="block">
            <p class="card-text">Enter weight of a book in grams</p>

        </div>
</div>

    <div>
        <div class="furniture attributes" style="display: none">
            <label for="form-group" class="form-label">Height</label>
            <input name="height" type="number" class="form-group"  display="block">
            <label for="form-group" class="form-label">Width</label>
            <input name="width" type="number" class="form-group"  display="block">
            <label for="form-group" class="form-label">Lenght</label>
            <input name="lenght" type="number" class="form-group" display="block">
            <p class="card-text">Enter dimensions in millimeters.</p>

        </div>
</div>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("select").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".attributes").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".attributes").hide();
                    }
                });
            }).change();
        });
    </script>

</form>

<?php require_once APPROOT . '/view/includes/footer.php'; ?>
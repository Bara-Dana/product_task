<?php require_once APPROOT . '/view/includes/header.php'; ?>

<h1>Product Add</h1>

<form id="product_form" name="product-form" method="POST" action="<?php echo URLROOT; ?>/add/addProduct">

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Save</button><br> <br>
        <a href="<?php echo URLROOT; ?>" class="btn btn-danger pull-right">Cancel</a>

    </div>
    <hr>
    <div class="form-group" id="sku">
        <label for="form-control" class="form-label">SKU</label>
        <input name="sku" type="text" class="form-control" id="sku" placeholder="sku - must be unique" required>
    </div>

    <div class="form-group" id="name">
        <label for="form-control" class="form-label">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="name" required>
        <?php
        ?>
    </div>

    <div class="form-group" id="price">
        <label for="form-control" class="form-label">Price</label>
        <input name="price" type="number" class="form-control" id="price" placeholder="price" step="0.01" required>
    </div>

    <div class="form-group">
        <label>Choose Type</label>

        <select class="form-attributes" name="item" id="productType" required>
            <option value="">--Choose Type--</option>

            <option value="dvd">DVD</option>
            <option value="furniture">Furniture</option>
            <option value="book">Book</option>
        </select>
    </div>
    <div>
        <div class="dvd attributes" style="display: none;">
            <label for="form-group" class="form-label">Size</label>
            <input id="size" name="size" type="number" class="form-group" display="block" step="0.01">
            <p>Please, provide size</p>
        </div>
    </div>

    <div>
        <div class="book attributes" style="display: none">
            <label for="form-group" class="form-label">Weight</label>
            <input id="weight" name="weight" type="number" class="form-group" display="block" step="0.01">
            <p>Please, provide weight</p>
        </div>
    </div>

    <div>
        <div class="furniture attributes" style="display: none">
            <label for="form-group" class="form-label">Height</label>
            <input id="height" name="height" type="number" class="form-group" display="block" step="0.01">
            <label for="form-group" class="form-label">Width</label>
            <input id="width" name="width" type="number" class="form-group" display="block" step="0.01">
            <label for="form-group" class="form-label">Lenght</label>
            <input id="lenght" name="lenght" type="number" class="form-group" display="block" step="0.01">
            <p>Please, provide dimensions</p>

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
                        $(".attributes").not("." + optionValue).find('input').each(function() {
                            $(this).prop('required', false);
                        })

                        $("." + optionValue).show();
                        $("." + optionValue).find('input').each(function() {
                            $(this).prop('required', true);
                        })
                    } else {
                        $(".attributes").hide();
                    }
                });
            }).change();
        });
    </script>

</form>

<?php require_once APPROOT . '/view/includes/footer.php'; ?>
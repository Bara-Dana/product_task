<?php require_once APPROOT . '/view/includes/header.php'; ?>

<h1>Product Add</h1>

<form name="product-form" method="POST" action="<?php  echo URLROOT; ?>/add/addProduct">


    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="submit" class="btn btn-danger">Cancel</button>
    </div>

    <div class="form-group">
        <label for="form-control" class="form-label">SKU</label>
        <input name="sku" type="text" class="form-control" id="sku" placeholder="sku">
    </div>

    <div class="form-group">
        <label for="form-control" class="form-label">Name</label>
        <input name="name" type="text" class="form-control" id="name" placeholder="name">
    </div>

    <div class="form-group">
        <label for="form-control" class="form-label">Price</label>
        <input name="price" type="number" class="form-control" id="price" placeholder="price">
    </div>

    <div class="form-group">
        <label>Choose Type</label>

        <select class="form-control" name="item" id="type">
            <option value="text" diplay="block">--Type Switcher--</option>

            <option value="dvd">DVD</option>
            <option value="furniture">Furniture</option>
            <option value="book">Book</option>
        </select>
    </div>
    <div>
        <div class="dvd-attributes">
            <label for="form-att" class="form-label">Size</label>
            <input name="size" type="number" class="form-att" display="block">
        </div>
    </div>

    <div>
        <div class="book-attributes">
            <label for="form-att" class="form-label">Weight</label>
            <input name="weight" type="number" class="form-att" display="block">
        </div>
    </div>

    <div>
        <div class="furniture-attributes">
            <label for="form-att" class="form-label">Height</label>
            <input name="height" type="number" class="form-att" display="block">
            <label for="form-att" class="form-label">Width</label>
            <input name="width" type="number" class="form-att" display="block">
            <label for="form-att" class="form-label">Lenght</label>
            <input name="lenght" type="number" class="form-att" display="block">
        </div>
    </div>

    <script type="text/javascript">
 $(document).ready(function() {
                $("select").on('change', function() {
                    $(this).find("option:selected").each(function() {
                        var geeks = $(this).attr("value");
                        if (geeks) {
                            $(".attributes").not("." + geeks).hide();
                            $("." + geeks).show();
                            alert("Radio button " + geeks + " is selected");
                        } else {
                            $(".attributes").hide();
                            alert("Select an Element from Menu");
                        }
  
                    });
                }).change();
            });
    </script>

</form>

<?php require_once APPROOT . '/view/includes/footer.php'; ?>
<?php addNewProduct(); ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="product_title">Product Title</label>
        <input type="text" class="form-control" name="product_title">
    </div>
    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="number" class="form-control" name="product_price">
    </div>
    
    <div class="form-group">
        <label for="product_category_id">Product Category</label>
        <select class="form-control" name="product_category_id" id="">
            <?php getProductCategories(); ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="product_image">Product Image</label>
        <input type="file" class="" name="product_image" required>
    </div>
    
    <div class="form-group">
        <label for="product_details">Product details</label>
        <textarea name="product_details" id="" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_product" Value="Add Product">
    </div>

</form>
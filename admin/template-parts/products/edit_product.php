<?php $product = showProductById(); ?>
<?php editProductById(); ?>
<?php
    if(isset($_GET['status']) && $_GET['status'] == 'updated') {
        echo "<h3>Product Updated</h3>";
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="product_title">Product Title</label>
        <input type="text" class="form-control" name="product_title" value="<?php echo !empty($product['name']) ? $product['name'] : ''; ?>">
    </div>
    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="number" class="form-control" name="product_price" value="<?php echo !empty($product['price']) ? $product['price'] : ''; ?>">
    </div>
    
    <div class="form-group">
        <label for="product_category_id">Product Category</label>
        <select class="form-control" name="product_category_id" id="">
            <?php getProductCategories(); ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="product_image">Product Image</label>
        <img src="../images/<?php echo !empty($product['image']) ? $product['image'] : ''; ?>" alt="" height="50px">
        <input type="file" class="" name="product_image">
    </div>
    
    <div class="form-group">
        <label for="product_details">Product details</label>
        <textarea name="product_details" id="" class="form-control" cols="30" rows="10"><?php echo !empty($product['description']) ? $product['description'] : ''; ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_product_submit" Value="Update Product">
    </div>

</form>
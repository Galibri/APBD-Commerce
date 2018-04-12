<?php
$query = "SELECT * FROM category WHERE id = $edit_cat";
$edit_result = mysqli_query($connection, $query);
?>
<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
        <?php 
        while($row = mysqli_fetch_assoc($edit_result)) {
            $edit_title = $row['category_name'];
        ?>
        <input type="text" value="<?php echo $edit_title ?>" id="cat_title" class="form-control" name="cat_title">
        <?php } ?>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update" value="Update Category">
    </div>
</form>
<?php require_once("template-parts/header.php"); ?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Welcome to admin
            <small>Author</small>
        </h1>
    </div>
    <div class="col-xs-6">
    <?php add_categories(); ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="cat_title">Add Category</label>
                <input type="text" id="cat_title" class="form-control" name="cat_title">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
            </div>
        </form>

        <?php 
            if(isset($_GET['edit'])){
                $edit_cat = $_GET['edit'];

            require_once('template-parts/category/edit_category.php');
            }
        ?>
        <?php update_categories(); ?>
    </div>
    <div class="col-xs-6">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Title</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php showAllCategories(); ?>
            <?php delete_categories(); ?>
            </tbody>
        </table>
    </div>
</div>
<!-- /.row -->
<?php require_once("template-parts/footer.php"); ?>

<?php require_once("template-parts/header.php"); ?>
<div class="row">  
    <div class="col-md-12">
        <?php 
            if(isset($_GET['action'])) {
                $action = $_GET['action'];
            } else {
                $action = "";
            }
            switch ($action) {
                case 'edit_product':
                    require_once("template-parts/products/edit_product.php");
                    break;

                case 'delete_product':
                    require_once("template-parts/products/delete_product.php");
                    break;

                case 'add_product':
                    require_once("template-parts/products/add_new_product.php");
                    break;
                
                default:
                    require_once("template-parts/products/view_all_products.php");
                    break;
            }
        ?>
    </div>
</div>
<?php require_once("template-parts/footer.php"); ?>
